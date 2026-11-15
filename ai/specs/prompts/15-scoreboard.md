# Slice 15 — Scoreboard and badges

Wave: after slice 06. Overlaps activity slices only if you stay inside the write paths below.

## Outcome

A parent sees each child in the household, stars by skill, and any badges already granted. There is no public board and no certificate.

## Write paths

- `api/**/Progress/Scoreboard.cs`, `FamilyStars.cs`
- `web/src/app/(app)/scoreboard/**`
- `web/src/features/progress/**`
- account page: a short summary component imported from `features/progress`, edited only by adding that component to the page

## Do not

- Add a global leaderboard route
- Show another household’s children
- Rank children as “winner” and “loser”. The heading is “Your family”.
- Grant badges. Slice 16 inserts `unlocks` rows. This slice creates the empty `unlocks` table if it does not exist, and reads it. Do not add a second `MapProgressEndpoints()` line.

## Build

1. `GET /api/scoreboard` returns `{ children: [{ id, displayName, starsBySkill: { focus: 4 }, totalStars, badges: ["first-math"] }] }`. When `show_family_stars` is false, the list contains only the active child.
2. `/scoreboard` lists names, star totals, and badge names. A parent control, “Show everyone’s stars,” patches `PATCH /api/account` with `{ showFamilyStars }`.
3. Account summary: total stars and “Avatar Studio opens at 24 stars, after a level in Math, Memory, and Kindness,” with the current total and which of those three are done.
4. Tests: household B’s cookie gets only B’s children; a badge row for household A is absent from B’s board; with family stars hidden, the board returns the active child only, and the account list still returns every child.

## Acceptance

Alex and Sam appear together for their parent and for nobody else.

## Stop if

You add sorting that publishes a rank to an unauthenticated GET.
