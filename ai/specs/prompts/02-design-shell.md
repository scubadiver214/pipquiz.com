# Slice 02 — Design shell

Wave: with slice 03, after slice 01. One agent.

Read plan.md sections 2 and 6.

## Outcome

The public home page is modeled on `pipquiz.com/assets/kidza`: cream page, purple scalloped top, the `pipquiz-main.png` logo, orange pills, hero, icon boxes, activity cards, and the template’s hover motion. Logged-out header links to `/login` and `/register` (pages can be placeholders until slice 03). The same logo file is the header mark on every later page.

## Write paths

- `pipquiz.com/src/web/src/theme.ts`
- `pipquiz.com/src/web/src/components/Logo.tsx`
- `pipquiz.com/src/web/src/components/Shell.tsx`
- `pipquiz.com/src/web/src/components/Scallop.tsx`
- `pipquiz.com/src/web/src/app/(marketing)/**`
- `pipquiz.com/src/web/src/app/layout.tsx` (fonts and theme provider only)
- delete `pipquiz.com/src/web/src/app/page.tsx` so `/` is only the marketing page
- `pipquiz.com/src/web/public/brand/**`
- `pipquiz.com/src/web/src/fonts/**` for the Recoleta and GT Walsheim copies

## Do not

- Copy PHP or the Kidza logo out of `pipquiz.com/assets/kidza`
- Ship the theme’s photographs of people
- Replace `pipquiz-main.png` with another logo
- Build play mechanics, auth forms, or the hub
- Edit the API
- Put the words Kidza or Case-Themes in the page

## Build

1. MUI theme with the tokens in plan.md. Headings are Recoleta and text is GT Walsheim, copied from `assets/kidza/assets/fonts/` and loaded with `next/font/local`. The newest decision records the user’s permission to embed those fonts and the Flaticon and Caseicon files. Buttons are the template’s pills, min height 52 on marketing pages. Child controls are not on this page. Delete `src/app/page.tsx` from slice 01 once `(marketing)/page.tsx` serves `/`.
2. Copy the Flaticon and Caseicon files into `web/public/brand/kidza/icons/`. Use them for the header, cards, and footer. Copy the decorative SVGs and shape images the home page needs into `web/public/brand/kidza/ornament/`. Fix the `curentColor` fill in the star SVG copy.
3. `Logo` renders `/brand/pipquiz-main.png` and nothing else. `Shell` follows the theme header: purple bar, scallop, white header row, main, footer, and `Logo` linking to `/`. The orange button says “Start playing” and points at `/register`. Card and button hover follows `_effect.scss`. `prefers-reduced-motion` disables it.
4. Home sections, in the screenshot’s order: hero (“Short games that help kids practice focus”), a row of three facts (about 10 minutes, two age bands, stars stay in the family), a card grid with one card per activity id in plan.md (title, one sentence, a theme icon, no play button that pretends the game exists — the card links to `/register`), a four-step row (parent signs in, picks a child, plays, colors a star).
5. Footer sentence: “PipQuiz is practice and play. It is not a medical treatment and it does not diagnose ADHD.”
6. Logo widths: 160 in the header and 280 in the hero. Both use `pipquiz-main.png`. Copy `pipquiz.com/assets/pipquiz-pq.png` to `web/public/brand/pipquiz-pq.png` for the favicon. That file is the pencil-face crop. Do not crop or redraw it again. Keep the filename.
7. At 390px the header links collapse into a single “Menu” button that opens the same links. Cards stack in one column.

## Acceptance

- Home renders at 390 and 1280 without horizontal scroll.
- The header image source is `/brand/pipquiz-main.png`.
- View source of the page does not mention Kidza, Nimora, or Case-Themes.
- `pnpm typecheck` and `pnpm lint` pass.

## Stop if

The layout needs a photograph of a person or the Kidza logo. Use `pipquiz-main.png`, the template icons, and the template ornaments. Do not draw a replacement logo or a second icon set.
