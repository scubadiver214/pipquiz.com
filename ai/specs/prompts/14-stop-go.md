# Slice 14 — Stop and Go

Wave: after slice 05, beside other activities.

## Outcome

`/play/stopgo` practices waiting and tapping on purpose. 3 levels × 3 items × 2 bands.

## Write paths

- `Content/stopgo/**`
- `Play/Scoring/StopGoScorer.cs`
- `web/src/features/stopgo/**`
- `web/src/app/play/stopgo/page.tsx`

## Mechanic

Renderer `stop-go`.

- `answer.action` `tap` with `answer.target` (`star` or `heart`). The child taps that picture.
- `answer.action` `wait` with `answer.holdMs` (Sprout 700, Scout 1000). The child does nothing until the screen says “Go” or the item completes. A tap during the hold is a miss and the item resets. Completing the hold sends `{ "action": "wait" }`. The client may send that only after `holdMs`. The server also checks that the clock minus `sessions.item_shown_at` is at least `holdMs - 150ms`. That column is created in slice 05. Do not add a migration.

Level 1: one picture, tap or wait, the instruction matches the picture. Level 2: two pictures, tap the one named. Level 3 Scout only adds a mismatch: the word “star” drawn in a heart shape, and the instruction says “tap the word star”. Sprout level 3 stays with two clear pictures and no mismatch. Do not call this a Stroop test in the UI. The title is “Stop and Go”.

No red flash on a miss. Coaching: “That one was a wait. Let’s try the same one again.”

Sound is a soft click from the Web Audio API if `sound_on` is true. Silent otherwise. No background music loop.

## Tests

API: a wait response posted immediately is incorrect; a wait response with the clock advanced (pass a clock interface) is correct; a tap of the wrong picture is a miss.

## Acceptance

Calm mode still completes a wait item. Nothing on the page strobes.

## Stop if

The activity fails the child for being slow on a `tap` item. Tap items have no deadline.
