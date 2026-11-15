# Slice 13 — Pencil Path, Both Hands, Shape Shop

Wave: after slice 05, beside other activities. One agent, three small games, three separate folders so a later agent can revise one skill without opening the others.

## Outcome

`/play/pencil`, `/play/hands`, and `/play/shapes` each have 3 levels × 3 items × 2 bands.

## Write paths

- `Content/pencil/**`, `Content/hands/**`, `Content/shapes/**`
- `Play/Scoring/PathTraceScorer.cs`, `DualTapScorer.cs` (shapes use `ChooseOneScorer`)
- `web/src/features/pencil/**`, `hands/**`, `shapes/**`
- `web/src/app/play/pencil|hands|shapes/page.tsx`

## Pencil Path

Renderer `path-trace`. A viewBox of 0–100. `answer.points` is a polyline (a hill, a zigzag, a loop across the three levels). `tolerance` 24, `coverage` 0.7. The child draws with pointer events. Stroke is 16px wide. Response sends downsampled points (at most 80). Server measures coverage. Show the target path in light purple and the child’s stroke in orange.

Sprout paths have 3 points. Scout paths have 6. Hint draws a moving dot along the path once.

This is not a handwriting worksheet. Prompts say “Follow the path,” not “Write the letter A.”

## Both Hands

Renderer `dual-tap`. Two buttons, Left and Right, each at least half the screen on a phone, stacked on a narrow screen if needed so both stay tappable. `config.pattern` is `["left","right","left"]`. Sprout length 2–3. Scout length 4. Response `{ "taps": ["left","right","left"] }`. Buttons do not require a keyboard chord. Keyboard: `1` or `A` for left, `2` or `L` for right, shown on the buttons.

Do not instruct the child to cross the midline with their body. The game is the on-screen pattern only.

## Shape Shop

Renderer `choose-one`. Level 1: pick the shape that matches a shadow (same silhouette, gray fill). Level 2: pick the group with N shapes. Level 3: which shape does not belong. Draw shapes as inline SVG (circle, square, triangle). Color is never the only cue: add the name in the accessible label.

## Tests

API, one per skill: path coverage accepts a dense sampling and rejects a dot in the corner; dual-tap rejects a swapped pattern; shape choice accepts only the authored id.

## Acceptance

All three routes finish level 1 on a 390px wide viewport using touch or keyboard.

## Stop if

A prompt asks the child to perform a physical exercise off the device.
