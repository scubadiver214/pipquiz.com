# Slice 09 — Logic Lagoon

Wave: after slice 05, beside other activities.

## Outcome

`/play/logic` has pattern items on levels 1 and 2, and a small maze on level 3. Both bands, 3 items per level.

## Write paths

- `Content/logic/**`
- `Play/Scoring/GridPathScorer.cs` (levels 1–2 use the existing `ChooseOneScorer`)
- `web/src/features/logic/**`
- `web/src/app/play/logic/page.tsx`

## Mechanic

Levels 1–2 use renderer `choose-one`. Prompt shows a pattern as text tokens (“circle, square, circle, ?”). Three or four choices. Sprout patterns are ABAB. Scout patterns grow (1, 2, 3, ?).

Level 3 uses renderer `grid-path`. `config` is `{ "cols": 4, "rows": 4, "walls": [1, 2], "start": 0, "goal": 15 }` with indexes in row-major order. Walls are cells the child cannot enter. The child moves with arrows or swipe. Response on goal: `{ "path": [0, 4, 8, 12, 13, 14, 15] }`. `answer.path` is any path that reaches the goal without entering a wall; the server accepts every legal path, not only one painted route. Store `answer.goal` and `answer.walls` and check the submitted path against those.

Maze cells are at least 48px on Scout and 64px on Sprout. A “Map” list of move buttons sits under the grid for keyboard and switch users.

## Tests

API: a path through a wall fails; a longer legal path passes; a `choose-one` miss returns coaching and does not clear the level.

## Acceptance

Both renderers appear in one level select on the page (level picker shows 1–3, locked until the previous best star is at least 1). Locking is the server’s job from slice 05; the page just handles 403/400 copy: “Finish the last level first.”

## Stop if

The maze needs a physics library or a canvas. A CSS grid is enough.
