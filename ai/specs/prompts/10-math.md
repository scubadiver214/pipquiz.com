# Slice 10 — Pirate Math

Wave: after slice 05, beside other activities.

## Outcome

`/play/math` is picture math: count, add, subtract. 3 levels × 3 items × 2 bands. The map is a column of large choice buttons, not a copied island drawing.

## Write paths

- `Content/math/**`
- `web/src/features/math/**`
- `web/src/app/play/math/page.tsx`

## Mechanic

Renderer `choose-one`.

- Sprout L1: count 1–5. L2: count 6–10. L3: add within 5 (`2 + 1`).
- Scout L1: add within 10. L2: subtract within 10. L3: add within 20 with a picture group.

`config.choices` is `[{ "id": "a", "label": "3" }]`. `answer.choiceId` is the right id. Prompt text names the objects (“Count the coins”). Show that many coin dots with CSS, generated from `config.count`, so you do not need image files. Coins are circles. Do not use `example1.png`.

Three choices on Sprout, four on Scout. The right answer is not always the first id. Shuffle is done in the content file, not with `Math.random` at runtime, so retries stay stable.

Hint: “Try counting out loud, one dot at a time.”

## Tests

API: right id passes; wrong id is a miss and the same session can answer again; stars for a clean level are 3.

## Acceptance

A child can finish Sprout level 1 from a phone-width layout without scrolling sideways.

## Stop if

You are about to ship the reference island PNG or draw a treasure map that needs the reference traced.
