# Slice 08 — Memory Garden

Wave: after slice 05, beside other activities.

## Outcome

`/play/memory` plays a sequence, then the child repeats it. 3 levels × 3 items × 2 bands.

## Write paths

- `Content/memory/**`
- `Play/Scoring/SequenceScorer.cs`
- `web/src/features/memory/**`
- `web/src/app/play/memory/page.tsx`

## Mechanic

Renderer `sequence`. `config.sequence` is an array of tokens (`red`, `blue`, `yellow`, `green`) shown one at a time with a 600ms gap, then the choices appear. Sprout length 2 on level 1, 3 on level 2, 3 on level 3. Scout length 3, 4, and 5. `answer.sequence` matches `config.sequence`.

The child taps tokens in order. Response: `{ "sequence": ["red", "blue"] }`. A miss restores the prompt “Watch again” and replays the same sequence once before counting a second miss. That replay is a hint.

Tokens are filled circles with text labels, not color alone. Calm mode and `prefers-reduced-motion` show the sequence as a static row instead of a flash.

Theme the page as a garden with CSS only: green paper tint, flower-shaped buttons. No unicorn illustration file.

## Tests

API: exact sequence passes; a swapped pair fails; the hint flag is stored when the client calls `/hint` before the attempt.

## Acceptance

Scout level 1 completes and a wrong order does not end the session.

## Stop if

The full level’s sequences are included in the first GET. Return the current item only (the shared session API already does this; do not add a list endpoint).
