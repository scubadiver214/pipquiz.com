# Slice 07 — Focus Find

Wave: after slice 05, beside the other activity slices.

Read the `grid-find` row in plan.md and the session hook from slice 05.

## Outcome

`/play/focus` asks the child to tap one cell in a grid. Sprout and Scout each have 3 levels × 3 items.

## Write paths

- `api/PipQuiz.Api/Content/focus/**`
- `api/PipQuiz.Api/Play/Scoring/GridFindScorer.cs`
- `web/src/features/focus/**`
- `web/src/app/play/focus/page.tsx`

## Mechanic

`config.cells` is a list of short labels (`star`, `moon`, `fish`) plus a `changedIndex` story the prompt describes. `answer.index` is the cell to tap. Level 1 is 2×2 with one odd picture. Level 2 is 3×3. Level 3 shows a grid, hides it behind a “Ready” press, then shows the same grid with one cell different. Scout uses 4×4 on level 3 and more similar labels (`star`, `star-dim`).

Response: `{ "index": 0 }`.

Cells are buttons, at least 64px, with a visible focus ring and an accessible name. Arrow keys move a roving tabindex.

Coaching uses the sentence pattern in plan.md. No countdown.

## Tests

One API test loads a focus file and marks the right index correct and a neighbor wrong. Vitest is unnecessary if the component is thin.

## Acceptance

A sprout level can be finished from the hub’s play link using the keyboard only.

## Stop if

You add a speed bonus or a failing timer.
