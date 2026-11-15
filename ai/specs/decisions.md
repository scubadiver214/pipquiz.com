# PipQuiz — decisions

Newest first. Reverse a choice by adding a new entry. Do not silently switch.

If an older entry disagrees with the entry below, follow the entry below and [plan.md](plan.md).

## 2026-11-15 — The favicon file is `pipquiz-pq.png`

The user renamed `assets/icon.png` to `assets/pipquiz-pq.png`. It is the same 512×512 pencil-face crop, with a transparent background. Slice 02 copies it to `web/public/brand/pipquiz-pq.png` and keeps that filename. The header logo stays `pipquiz-main.png`. Sentences that still say `icon.png` mean this file.

## 2026-11-15 — First build, fonts, and resume

The user confirmed this before any application code. Slices 06–19 stay written. They do not start until the user asks.

The first build is slices 01 through 05, in this working tree. Finish a slice, stop for review, then start the next. The order is 01, 02, 03, 04, 05. Slice 03 waits until slice 02 has finished, because the auth pages use that shell and both slices share one tree.

Models for that run:

| Slice | Model |
| --- | --- |
| 01 Scaffold | GPT 5.6 Sol |
| 02 Design shell | Gemini 4 Hydrogen |
| 03 Parent auth | Claude Opus 4.7 |
| 04 Child profiles | Claude Opus 4.7 |
| 05 Play contract | Claude Opus 4.7 |

Fonts. Copy Recoleta, GT Walsheim, Flaticon, and Caseicon from `assets/kidza` into the web app. The user confirmed the right to embed those files. Sentences in older entries that name Nunito or Fredoka, or that keep these fonts and icon fonts out of `src/`, are void.

Rewards. Avatar Studio still opens at 24 best stars plus one cleared level in math, memory, and kindness. The six badges and the cosmetic ladder in plan.md stay. Sentences that set the studio at 30 stars, or that drop badges and cosmetics, are void. A finished level still scores 3, 2, or 1. Only the best is kept.

Resume. An unfinished level continues at the same item after a refresh or a later visit. A finished level keeps its best stars. `POST /api/play/sessions` for the same child, activity, and level returns that unfinished session, moves `expires_at` to four hours from now, and does not change `item_index`. An attempt on a session past `expires_at` is 410 until that post renews it. Replaying a finished level starts a new session at the first item.

PipQuiz records stay in this folder. They are not copied into `gretas-game-web/ai/specs/`.

## 2026-11-15 — Kidza is the design template

`pipquiz.com/assets/kidza` is the purchased Kidza theme (Case-Themes 1.0.1). It was bought as the design template for PipQuiz. The site is modeled on that template: layout, color, type, icons, motion, and the decorative graphics in the theme.

Pages are React, not WordPress. Do not run the theme’s PHP. Do copy and use the theme files that are the design: icon fonts, webfonts, decorative SVG and shape images, and the motion in `assets/scss/_effect.scss` and `assets/css/libs/animate.min.css`. The home page follows `assets/kidza/screenshot.png`: scalloped purple bar, hero, cards, icon boxes, orange pills.

This reverses the earlier limit that allowed only three ornament SVGs and kept Flaticon, Caseicon, Recoleta, and GT Walsheim out of the app. Those files ship in the template and are part of the design. Headings are Recoleta. Body text is GT Walsheim. UI icons are Flaticon and Caseicon.

The PipQuiz logo stays `assets/pipquiz-main.png`. Do not use `assets/kidza/assets/img/logo.png`. Do not put the words Kidza or Case-Themes in the public pages. Photographs of people in the theme demo are not PipQuiz art. The hero image is the PipQuiz logo. Play screens keep the template’s buttons, cards, and icons, and they still honor calm mode and reduced motion.

## 2026-11-15 — The favicon is the pencil face from the logo

The favicon is a 512×512 square crop of the pencil face in `assets/pipquiz-main.png`. The page background is transparent. The sticker outline, eraser, eyes, smile, and tip stay. The letters beside the pencil are not in the crop. The file was `assets/icon.png` when this was written. It is now `assets/pipquiz-pq.png`. Slice 02 copies that file to `web/public/brand/pipquiz-pq.png` and does not draw a new icon.

## 2026-11-15 — `pipquiz-main.png` is the site logo

`pipquiz.com/assets/pipquiz-main.png` is the only PipQuiz logo. It is the brand mark on every page of the site: the public home, login, register, account, hub, play, scoreboard, and avatar. The header on each of those pages shows this file and links home.

The web app copies it to `web/public/brand/pipquiz-main.png` and keeps that filename. It is not renamed to `pipquiz.png`, redrawn, or replaced by the Kidza logo, a text title, or `archive/PipQuiz_MVP_Plan/brand/pipquiz-logo-original.png`.

A favicon is the pencil face cropped from this same file: `pipquiz.com/assets/pipquiz-pq.png`, copied to `web/public/brand/pipquiz-pq.png`. The crop does not change the letterforms. The small reaction face in slice 17 sits beside a play card. It is not a second logo, and it does not replace `pipquiz-main.png` in the header.

## 2026-11-15 — Rewards follow the kit ladder

The merge entry above left Avatar Studio at 30 best stars and left badges and cosmetics out. That choice is reversed. The confirmed reward path is the earlier kit’s ladder, with this product’s star math kept.

- A finished level still scores 3, 2, or 1 from misses and hints. Only the best is kept. The kit’s “3 of 4 first tries” rule is not used, because each level has 3 items.
- Avatar Studio opens when the sum of best stars is at least 24 and `math`, `memory`, and `kindness` each have one cleared level. The constant is `Rewards:AvatarStudioStars`.
- Cosmetics unlock at 3, 9, 15, 21, and 30 stars, as listed in [plan.md](plan.md). They are original SVG parts. The unicorn sticker from the kit is a star sticker.
- Six badges, granted once: `first-math`, `first-memory`, `first-kindness`, `story-star`, `three-in-a-row`, `practice-10`.
- A starter face and color can be saved before the studio opens. Studio-only parts cannot.
- The 10-day certificate is after the MVP. The daily plan of two activities stays. Finishing it does not print a certificate in this version.

## 2026-11-15 — The two plans are one contract

`ai/specs/plan.md` is the only build contract. `ai/PipQuiz_MVP_Plan/` stays on disk as an archive. Agents do not implement from it.

The archive was written before this workspace was inspected. It told agents to put PipQuiz inside `gretas-game-web` and `gretas-game-api`, to use EF Core, and to color the site from the logo. This folder already had the inspected stack, the ten activities, the star rule, and the HTTP contract. Those stay.

Brought in from the archive:

- `POST /api/account/password` so a parent can change the password.
- A Speak button on play screens. Browser speech, only after a press, with the prompt still visible.
- `children.sound_on` defaults to false.
- `households.show_family_stars` defaults to true. When false, the scoreboard returns the active child only.
- Abuse checks in plan.md section 8: cross-household ids, a changed `client_seq` body, forged scores, and no answer keys in logs or GET bodies.
- Public launch adds data export and password recovery next to email verification and the legal review. The first demo does not include them.

The archive’s four worlds map onto activities that already had names: Pirate Math (`math`), Memory Garden (`memory`), Kindness Table (`kindness`), Story Dock (`story`). Spot-the-difference is `focus`. The story script stays “Pip and the Extra Cookie.” Levels 4 and 5 stay on the backlog.

Rejected from the archive:

- Greta’s Games as the host repositories, EF Core, Phaser, and `/api/v1` routes that put the child id in the path.
- The cyan and gold palette.
- Age bands 4–5, 6–7, and 8–10. The bands stay Sprout (4–6) and Scout (7–10).
- Loading the archive’s example JSON as content. The shape does not match plan.md section 5.

Void, same day, by the reward entry and the first-build entry: this merge also rejected a 24-star studio and rejected badges and cosmetics, and it told agents to use Nunito and Fredoka and to keep Recoleta, GT Walsheim, Flaticon, and Caseicon out of `src/`. Those sentences are not instructions. The studio opens at 24 stars plus the three tracks. Badges and cosmetics stay. The theme fonts are copied in.

Kidza lives at `pipquiz.com/assets/kidza` (theme 1.0.1). There is no `comps/kidza` directory. Pages are new React. PHP, theme CSS, photographs, and the Kidza logo stay out of `src/`.

Earlier entries that say `comps/kidza`, `ai/specs/pipquiz/`, or `PipQuiz_ChatGPT_MVP_Kit` are corrected here. The archive folder is `ai/PipQuiz_MVP_Plan/`.

## 2026-11-14 — Root README is the product front door

`pipquiz.com/README.md` is the public entry: mission, audience, activities, planned stack, privacy, and the fact that application code is not written yet. Deeper contracts stay in [plan.md](plan.md). Public claims match [../briefs/elementary-principal.md](../briefs/elementary-principal.md). The README names major versions only. Patch versions stay in the 2026-11-11 stack decision below.

## 2026-11-14 — Principal brief states the public claims

`ai/briefs/elementary-principal.md` is the high-level note for an elementary school leader. It is feedback-seeking, not an adoption offer. Public claims stay inside that brief: practice for ages 4–10, about ten minutes, parent-owned accounts, no public child ranking, no diagnosis, no treatment claim, and no promise that in-app gains transfer to the classroom until that is studied. The first product has no teacher login and no school-held student records. A later school collaboration is a conversation, not a committed feature.

## 2026-11-11 — PipQuiz stays in pipquiz.com

Every plan, prompt, asset, and line of product code for this site lives under `/Users/mattmozer/Dev/scubadiver214/Game Dev/pipquiz.com`.

`gretas-game-web` and `gretas-game-api` are reference only. They are a separate game and have nothing directly to do with PipQuiz. Reading them can show one way to host Next.js with Aspire. That reading does not make them part of this product. No shared code, database, spec folder, or deployment.

## 2026-11-11 — This spec replaces the ChatGPT kit

The kit in `pipquiz.com/ai/PipQuiz_ChatGPT_MVP_Kit/` says the Kidza theme was not supplied and treats Nimora as a vague story brand. Both are wrong for this workspace: the Kidza theme is in `pipquiz.com/comps/kidza`, and Nimora Kid’s live site sells printable workbooks. Agents follow `ai/specs/pipquiz/`.

## 2026-11-11 — New product tree

PipQuiz code lives at `pipquiz.com/src`:

```text
pipquiz.com/src/
  apphost.cs
  global.json
  api/     .NET 10 solution: Api, Migrations, MigrationService, ServiceDefaults, tests
  web/     Next.js 16 app
```

Aspire runs from `pipquiz.com/src` and points `AddNextJsApp` at `web/`. The web app proxies `/api/*` to `API_URL`. The proxy must forward every `Set-Cookie` from `getSetCookie()`, because the Fetch `Headers` API drops or collapses that header.

PipQuiz’s own stack: Minimal API, Dapper, FluentMigrator, Aspire AppHost, Testcontainers xUnit, pnpm, Vitest, MUI, TanStack Query, `output: "standalone"`.

Versions to target, noted while reading the reference apps on 2026-11-11: Next 16.3.5, React 19.2.8, MUI 9.4, pnpm 11.18, .NET SDK 10.0.100, Aspire 13.6.4, PostgreSQL 17. Those numbers are a starting point for PipQuiz’s own projects. They are not a link to the other repos.

## 2026-11-11 — Parent is the only login

Accounts are parents. A child is a row scoped by `household_id`. The active child is an HttpOnly cookie set by the API, so two browsers in one household can play as different children. There is no child password and no public child profile.

Store the parent email, password hash, display name, and `consent_at`. Store the child’s display name and age band (`sprout` ages 4–6, `scout` ages 7–10). Do not store a birth date, a diagnosis, a photo, or a school.

Password hashing uses `PasswordHasher<T>` from `Microsoft.Extensions.Identity.Core`. Persistence stays Dapper plus FluentMigrator. Full ASP.NET Identity with EF was rejected so the API keeps one data access style.

Registration includes a required checkbox: the adult confirms they are the parent or guardian. Email delivery of a verification link is post-MVP. The production gate refuses a real-child launch until a lawyer has reviewed consent and a verifier is actually sending mail.

## 2026-11-11 — Server owns answers, stars, and unlocks

Answer keys live only in `pipquiz.com/src/api` content files. The web app renders prompts the API returns. Clients send an attempt body. The server decides correct or not, writes stars, and advances checkpoints.

Stars for a finished level, kept as the best score, never summed across replays:

- 3 — finished with no misses and no hints
- 2 — finished, and misses plus hints are at most the item count
- 1 — finished otherwise

A wrong answer coaches and stays on that item. Nothing takes stars away. No fail timer. Scout may see “that took N seconds” after the fact. Sprout does not.

Void: this entry used to unlock Avatar Studio at 30 stars and a certificate after 10 days. The studio rule is 24 best stars plus one cleared level in math, memory, and kindness. The certificate waits until after the MVP. The 3, 2, and 1 star bands above still hold.

The daily plan is two activities, different skills, matching the child’s age band, stable for that child and UTC date.

## 2026-11-11 — Nimora skills become original activities

Nimora’s public product (fetched 2026-11-11 from https://nimorakid.com/en-us) is a PDF or printed workbook: about 10 minutes a day, two age editions, seven skills (Focus, Memory, Logic, Pencil Power, Two Hands, Shapes & Colors, Stop & Go). The site says it is not a medical or educational treatment.

PipQuiz builds original browser activities for those skills, plus the math island, manners table, and one branching story from `pipquiz.com/ai/prompts/initial.md`. Do not copy Nimora page layouts, characters, names, worksheets, or the YouTube, Facebook, and Instagram material linked in that prompt.

Pencil Power becomes a thick on-screen path the child traces. Two Hands becomes two large buttons and a left/right pattern. Physical cross-crawl and occupational-therapy worksheets stay out. The screen cannot coach real handwriting or bilateral body exercises, and copying a therapy protocol would overclaim.

## 2026-11-11 — Kidza is a look, not a codebase

`pipquiz.com/comps/kidza` is the Case-Themes Kidza WordPress theme the user purchased (style header: version 1.0.1, GPL-2.0+, ThemeForest). Use it as a visual reference:

- pale cream page
- purple utility bar with a scalloped lower edge
- dark headlines, muted body text
- orange pill buttons
- white rounded cards
- a hero with type on one side and art on the other
- a simple footer

Observed theme hexes in `comps/kidza/assets/scss/_options.scss`: ink `#070713`, muted `#4B5563`, orange `#F15F25`, purple `#6754E9`, deep blue `#385469`, page `#fff`. The homepage screenshot is cream rather than pure white. PipQuiz tokens are in [plan.md](plan.md). They are close to that palette on purpose.

Do not copy Kidza PHP, JavaScript, demo photographs, or the Kidza logo into `src/`. Write new React components. No stock photos of children. The later Kidza entry reverses the font and icon-font ban: Recoleta, GT Walsheim, Flaticon, and Caseicon are copied in. The path in this entry (`comps/kidza`) is void. The theme is at `assets/kidza`.

## 2026-11-11 — One production illustration

`pipquiz.com/assets/pipquiz-main.png` is the logo: a pencil character forming the word PipQuiz. Use that file for the brand. `assets/example1.png` (island) and `assets/unicorn.png` are mood only, same rule as `PipQuiz_ChatGPT_MVP_Kit/brand/ASSET_USAGE.md`. Do not ship them as maps or characters until the owner confirms commercial rights.

In-game reactions use a small original SVG pencil face (idle, cheer, think, oops). CSS can bounce the wordmark. The raster logo’s eyes cannot blink, because they are baked into the PNG.

## 2026-11-11 — Payments, AI books, and cartoons wait

The business may charge for membership later. MVP households are free. Schema includes `households.plan` defaulting to `free`. No Stripe, no price page that takes a card.

Personalized AI storybooks, a cartoon library, open chat, public leaderboards, teacher accounts, and ads are out of the MVP. One authored branching story ships now.

## 2026-11-11 — Game pages do not share a registry file

Each activity owns `web/src/features/<skill>/` and `web/src/app/play/<skill>/page.tsx`. Each calls the shared session hook from slice 05. Content JSON is loaded by scanning `api/PipQuiz.Api/Content/<skill>/`. Parallel agents must not edit `Program.cs`, the session DTO files, or a central renderer map.

## 2026-11-11 — Cookies through the Next proxy

The Fetch `Headers` API drops or collapses `Set-Cookie` when headers are copied wholesale. PipQuiz’s proxy must forward every value from `upstream.headers.getSetCookie()`. The auth slice owns that inside `pipquiz.com/src/web` only.
