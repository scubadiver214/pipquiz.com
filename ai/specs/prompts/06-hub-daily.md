# Slice 06 — Hub and daily plan

Wave: after slice 05. May run beside slices 07–14 and 17.

Read plan.md sections 2 and 5 (`GET /api/hub`).

## Outcome

`/hub` shows the active child, today’s two activities, and a grid of every activity the content loader knows about. The plan is stable for the UTC date.

## Write paths

- `api/**/Progress/DailyPlan.cs` and hub endpoint
- `daily_plans` migration if slice 05 did not create it
- `web/src/app/(app)/hub/**`
- `web/src/features/hub/**`
- one `MapProgressEndpoints()` line only if it does not exist. If slice 15 might also add it, this slice adds the line and slice 15 adds methods to the same static class only after this slice merges. Prefer this slice to create `ProgressEndpoints.cs` with hub only.

## Do not

- Build the scoreboard page (slice 15)
- Edit activity feature folders
- Pick two activities of the same skill

## Build

1. Plan generator: hash of `childId + utcDate` selects two distinct `activityId`s that have content for the child’s age band. Persist the ids. Later calls that day return the row.
2. Hub payload: `{ child, plan: [{ activityId, title, href, done }], activities: [{ activityId, title, bestStars, levelsCleared }], studioUnlocked, badges }`. `studioUnlocked` is the rule in plan.md: sum of best stars at least 24, and math, memory, and kindness each have a cleared level. `badges` is `[]` until slice 16 creates `unlocks`. Do not create that table here. A plan activity is `done` when `progress.last_cleared_at` falls on that UTC date. When both are done, set `daily_plans.completed` true. There is no certificate. This slice creates the `daily_plans` migration.
3. Hub UI: “Today for {name}”, two large cards linking to `/play/{activityId}`, then the full grid. When the plan is complete, the heading adds “Today is done.” Empty content (only `sample`) still renders without crashing. A line under the title: “About ten minutes. You can stop whenever you want.”
4. If no child is selected, the page links to `/account` and does not call play.
5. Test the generator: same inputs, same ids; the two ids differ; a child with only one published skill gets that skill once and a second id only if another skill exists, otherwise one card.

## Acceptance

- Hub renders for a parent with a selected child.
- Reloading does not change today’s pair.
- `dotnet test` includes the generator tests.

## Stop if

The plan is computed in the browser from a full content dump. The server chooses it.
