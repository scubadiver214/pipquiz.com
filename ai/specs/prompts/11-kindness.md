# Slice 11 — Kindness Table

Wave: after slice 05, beside other activities. Read the manners rule in plan.md twice before writing copy.

## Outcome

`/play/kindness` presents a dinner-table moment with more than one kind response. 3 levels × 3 items × 2 bands.

## Write paths

- `Content/kindness/**`
- `Play/Scoring/MannersScorer.cs`
- `web/src/features/kindness/**`
- `web/src/app/play/kindness/page.tsx`

## Mechanic

Renderer `manners`. `config.scene` is one sentence. `config.choices` has ids and labels. `answer.accepted` lists every kind id.

Levels:

1. Please and thank you.
2. Waiting and taking turns with a shared dish.
3. Listening, and asking to leave the table.

Include one item where “Yes, thank you” and “Yes please” are both accepted. Include one item where “yes ma’am” is present and also accepted, and a plain “yes, please” is accepted too. A rude option (“give me that”) is a miss. Coaching for a miss: “You can ask with ‘please’, or wait until someone offers.” Coaching for a hit: “That was a kind way to say it.”

Sprout labels are shorter. Scout items add one extra polite option so the child reads a bit more. No timers. No points for speed.

Do not invent a rule that children must use “sir” or “ma’am”. The prompt can say “Some families use these words.”

## Tests

API: each id in `accepted` scores correct; the rude id scores a miss; two different accepted ids on the same item both score correct.

## Acceptance

Copy on the page never says a child was bad. A parent reading level 3 would find the scene usable in more than one culture.

## Stop if

An item has only one accepted answer and that answer is “yes ma’am” or “no sir”.
