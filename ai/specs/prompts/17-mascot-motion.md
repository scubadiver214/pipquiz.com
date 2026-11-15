# Slice 17 — Mascot reactions

Wave: after slice 02, beside activity slices. It must not wait for games, and games must not wait for it.

## Outcome

A small SVG pencil face can sit beside a play card in four moods: `idle`, `cheer`, `think`, `oops`. Calm mode and `prefers-reduced-motion` render a still face.

## Write paths

- `web/src/components/mascot/**`
- `web/src/components/Mascot.tsx`

You may export `Mascot` from `Shell` only by adding an optional prop defaulting to hidden. Do not rearrange the marketing page to depend on moods.

## Do not

- Replace `pipquiz-main.png`, or use the mascot as the header logo
- Animate with a flashing opacity loop
- Add a dependency for animation

## Build

1. `Mascot` props: `mood`, `size` (64 or 120).
2. `idle` gently translates 4px vertically over 2.4s. `cheer` is a single 300ms hop then idle. `think` tilts 8 degrees and holds. `oops` is a 6px shake once, then idle. One animation each, implemented in a CSS module.
3. Eyes are SVG. They do not strobe. `oops` uses a small “o” mouth, not a frown with a failure banner.
4. Slice 05’s play chrome has an empty `side` slot. Render `Mascot` in that slot. If an activity agent is editing `features/play` at the same time, ship the component and leave a one-line note in the phase section instead of editing that file.
5. Reduced motion: `animation: none`.

## Acceptance

The four moods render on a storybook-free demo route `/dev/mascot` that is removed at the end of this slice, **or** they render in unit-less visual check you screenshot into the phase notes and then delete the route. Do not leave `/dev/mascot` in the tree.

## Stop if

The only way to get a face is to slice `pipquiz-main.png`. Draw the face. The header logo stays the full PNG.
