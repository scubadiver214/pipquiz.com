# PipQuiz — architecture and contract

Living plan. Waves live in [phases.md](phases.md). Choices live in [decisions.md](decisions.md). Slice prompts live in [prompts/](prompts/00-orchestrator.md).

Everything for PipQuiz stays under `pipquiz.com/`. `gretas-game-web` and `gretas-game-api` are reference only. They are a different product and have nothing directly to do with this one. Do not add code, specs, or a project reference there.

Agents implement this document. They do not reopen the product shape unless a fact in this plan is wrong.

## 0. One plan

`ai/specs/plan.md` is the build contract. `ai/PipQuiz_MVP_Plan/` is an archive of an earlier pass. That pass assumed PipQuiz would be built inside the Greta’s Games repositories, with EF Core, and with a cyan and gold palette taken from the logo. This folder was written after the workspace was inspected. The merge on 2026-11-15 is recorded in [decisions.md](decisions.md).

Brought in from the archive, because this plan did not already say them:

- A parent can change the password.
- Play screens have a Speak button. The browser reads the prompt when the child asks. The words stay on the screen.
- Sound starts off. A parent turns it on.
- A parent can hide the other children’s stars and see only the child who is playing.
- The archive’s abuse checks are in section 8.
- A public launch also needs a working data export and password recovery. Those sit with email verification and the legal review. They are not part of the first demo.

The archive’s four worlds are the activities already named Pirate Math, Memory Garden, Kindness Table, and Story Dock. Spot-the-difference from its memory outline is the focus activity. Its levels 4 and 5 stay in [todos.md](todos.md).

Rewards follow that archive’s ladder, confirmed when the plans were merged: Avatar Studio opens at 24 best stars and one cleared level in each of math, memory, and kindness. Cosmetics and six badges are in section 2. A finished level still scores 3, 2, or 1 from misses and hints, and only the best is kept. The 10-day certificate waits until after the MVP.

## 1. What was investigated

| Source | What it actually is |
| --- | --- |
| `pipquiz.com/ai/prompts/initial.md` | Build PipQuiz as a responsive educational site: parent login, scores, account, ADHD-friendly short play, levels, avatars, an Avatar Creator earned by progress. Later, paid membership. |
| https://nimorakid.com/en-us on 2026-11-11 | A shop for printable focus workbooks, ages 3–6 and 7–10, about 10 minutes a day. Seven skills: Focus, Memory, Logic, Pencil Power, Two Hands, Shapes & Colors, Stop & Go. PDF about $19.99, printed book about $39.99. The site states it is not a medical or educational treatment. |
| `pipquiz.com/assets/kidza` | The purchased Kidza theme, version 1.0.1. This is the design template for the site: layout, color, type, icons, motion, and decorative graphics. There is no `comps/kidza` folder. |
| `pipquiz.com/assets/pipquiz-main.png` | The only PipQuiz logo. A smiling pencil forms the word PipQuiz. This file is the brand mark on every page. |
| `assets/example1.png`, `assets/unicorn.png` | Island and unicorn mood images. Same files as the archive’s brand references. Not cleared to ship. |
| `ai/PipQuiz_MVP_Plan/` | Earlier plan and prompt kit. Archived 2026-11-15. Examples there are illustrations. They are not content files and they do not match the JSON shape in section 5. |
| `gretas-game-web`, `gretas-game-api` | Reference only, read on 2026-11-11 to pick versions. Not part of PipQuiz. Stack to use here: Next.js 16, React 19, MUI 9, pnpm, Vitest, .NET 10, Dapper, FluentMigrator, Aspire 13, PostgreSQL 17. |

## 2. Product

PipQuiz is a browser site where a parent signs in, adds a child profile, and the child plays short original activities. The feeling to copy from Nimora is the routine: one small task, a clear instruction, a star on a chart, stop after about ten minutes. The feeling to copy from Kidza is the marketing page: bright, roomy, cream and purple and orange, obvious buttons.

Ages in the product: Sprout (4–6) and Scout (7–10). A parent picks the band. The product does not ask for a diagnosis and does not say it treats ADHD.

### Activities

| Id | Skill | What the child does | Renderer |
| --- | --- | --- | --- |
| `focus` | Focus | A grid of pictures. Find the one that changed, or the one that matches the target. | `grid-find` |
| `memory` | Memory | Watch a short sequence of colors or shapes, then repeat it. | `sequence` |
| `logic` | Logic | Complete a pattern. Level 3 is a small maze on a grid. | `choose-one`, then `grid-path` |
| `math` | Math | Count, add, and subtract with picture choices on a treasure map of buttons, not a painted island screenshot. | `choose-one` |
| `kindness` | Manners | A dinner-table scene with two or more kind answers. Please, thanks, waiting, listening, asking to leave the table. “Yes ma’am” can be one option. It is never the only correct one. | `manners` |
| `story` | Story | One branching picture story. Choices only. No free typing. | `story` |
| `pencil` | Pencil control | Trace a thick path. The server scores coverage of the stored path. | `path-trace` |
| `hands` | Both hands | Two big buttons. Repeat a left/right pattern. | `dual-tap` |
| `shapes` | Shapes and color | Match a shadow, sort a color, or count shapes. | `choose-one` |
| `stopgo` | Stop and go | The instruction says tap or wait. Waiting is a success. A miss is a calm retry. | `stop-go` |

Content bar for every activity slice except story: both age bands, 3 levels, 3 items each. Story is one shared graph, authored in slice 12, and it is one level for stars. The data model allows 5 levels. Levels 4 and 5 are listed in [todos.md](todos.md), not required to finish the slice. The archive’s level-4 and level-5 themes (skip counting, longer sequences, feelings and boundaries) are that backlog.

| Archive name | Activity id | What moved |
| --- | --- | --- |
| Pirate Math Island | `math` | Count, add, and subtract with picture choices. Slice 10. |
| Unicorn Memory Garden | `memory` and `focus` | Sequences stay on `memory`. Spot-the-difference stays on `focus`. No unicorn file. |
| Kindness Kingdom | `kindness` | Please, thanks, waiting, listening. More than one polite answer can be right. Slice 11. |
| Story Adventures | `story` | One branching picture story. The script is “Pip and the Extra Cookie” in slice 12. |

Sprout items use one short sentence, at most 3 choices, numbers to 10, sequences of length 3, targets at least 64px. Scout items use numbers to 20, sequences of length 5, at most 4 choices. Same mechanics.

### Screens

| Route | Who | Purpose |
| --- | --- | --- |
| `/` | Public | Kidza-style home: `pipquiz-main.png`, what the site is, four steps (sign in, pick a child, play ten minutes, color a star), activity cards |
| `/register`, `/login` | Public | Email, password, parent confirmation on register |
| `/account` | Parent | Display name, children, calm mode, sound, show-family-stars, password change, delete account |
| `/hub` | Parent session, active child | Today’s two activities, the full activity grid, stars, link to switch child |
| `/play/[skill]` | Active child | One activity, one item on screen, Break, Speak |
| `/scoreboard` | Household | This household’s children, or only the active child when family stars are hidden. Stars and badges. |
| `/avatar` | Active child | Starter look and earned cosmetics any time. The rest of the studio opens at 24 stars plus the three tracks. |

### First demo

A parent registers, adds Alex (Sprout) and Sam (Scout), selects Alex, finishes three Focus items, earns server stars, leaves, comes back to the same item, switches to Sam and sees Sam at zero, finishes a Kindness item where two answers both count, opens the household board, and still cannot save a studio-only part until math, memory, and kindness each have a cleared level and the star sum is at least 24. A starter face and color can be saved before that. Refreshing the browser keeps the parent logged in and does not mix the two children.

### Rewards

The star on a finished level is the rule in [decisions.md](decisions.md): 3, 2, or 1 from misses and hints, best score kept. Unlocks use the sum of `best_stars`. A replay adds only the improvement.

Avatar Studio is open when both are true. The constant is `Rewards:AvatarStudioStars = 24`.

- The sum of best stars is at least 24.
- `math`, `memory`, and `kindness` each have one level with `best_stars` of at least 1.

Every activity’s stars count toward the 24, including story. The other activities do not replace those three tracks.

Cosmetics are original SVG parts. They can be worn as soon as the sum reaches the line, before the studio opens. The archive’s unicorn sticker is a star sticker. The unicorn file stays out.

| Code | Stars | Slot |
| --- | --- | --- |
| `hat-captain` | 3 | hat |
| `cape-blue` | 9 | cape |
| `sticker-star` | 15 | sticker |
| `glasses-star` | 21 | glasses |
| `template-pencil` | 30, and the studio is open | template |

A starter save is always allowed: face `smile`, hat `none`, cape `none`, sticker `none`, glasses `none`, template `none`, and one of the four colors. Parts marked studio-only stay rejected until the studio rule is met.

Badges grant once. The unique key is the child and the code.

| Code | When |
| --- | --- |
| `first-math` | First cleared math level |
| `first-memory` | First cleared memory level |
| `first-kindness` | First cleared kindness level |
| `story-star` | A cleared story level |
| `three-in-a-row` | Three finished levels in a row. Break does not reset it. Starting a new session while the previous one is unfinished does. It is not a count of calendar days. |
| `practice-10` | The child’s clear count reaches 10 |

Nothing takes a star, a badge, or a cosmetic away. A missed day does not reset them. `children.clear_streak` is the counter for `three-in-a-row`. Slice 05 calls `IRewardGranter` when a session starts and when a level clears. Slice 16’s granter is the only writer of that counter and of `unlocks`.

## 3. Repository layout

```text
pipquiz.com/src/apphost.cs
pipquiz.com/src/global.json                 SDK 10.0.100, rollForward latestFeature
pipquiz.com/src/api/PipQuiz.sln
pipquiz.com/src/api/src/PipQuiz.Api
pipquiz.com/src/api/src/PipQuiz.Migrations
pipquiz.com/src/api/src/PipQuiz.MigrationService
pipquiz.com/src/api/src/PipQuiz.ServiceDefaults
pipquiz.com/src/api/tests/PipQuiz.Api.Tests
pipquiz.com/src/web                         Next.js app, package manager pnpm
```

AppHost resource names: `postgres`, database `pipquiz`, `migrations`, `api` on a local http port, `web` via `AddNextJsApp("web", "web")` with pnpm, `API_URL` set from the api endpoint. The host lives in `pipquiz.com/src/apphost.cs`. API listens on 5088 so it can run beside other local apps. Aspire assigns the web port.

Web scripts: `dev`, `build`, `start`, `lint`, `typecheck`, `test`. `output: "standalone"`. `reactStrictMode: true`.

### Web folders

```text
web/src/app/(marketing)/page.tsx
web/src/app/(auth)/login/page.tsx
web/src/app/(auth)/register/page.tsx
web/src/app/(app)/layout.tsx              requires parent session
web/src/app/(app)/account/page.tsx
web/src/app/(app)/hub/page.tsx
web/src/app/(app)/scoreboard/page.tsx
web/src/app/(app)/avatar/page.tsx
web/src/app/play/layout.tsx                parent session and Shell; slice 05
web/src/app/play/[skill]/page.tsx         thin file that renders features/<skill>
web/src/app/api/[...path]/route.ts
web/src/theme.ts
web/src/components/                         shell, mascot, buttons
web/src/features/play/                      session hook and shared item chrome only
web/src/features/<skill>/                   one folder per activity
```

Play pages stay 2D. Do not add three.js, React Three Fiber, or Phaser.

### API folders

```text
Auth/           register, login, logout, me, delete
Children/       CRUD, select active child
Play/           catalog, session, attempt, complete  (slice 05 only)
Progress/       hub summary, scoreboard, daily plan
Avatar/         read parts, save parts the child has earned
Rewards/        badge and cosmetic grants, called from play after a level clears
Content/        JSON files, one subfolder per skill
```

`Program.cs` maps those groups. After slice 05, activity work adds JSON under `Content/<skill>/` and does not edit `Program.cs`.

Slice 05 also ships `IItemScorer` and a startup scan that registers every implementation. `choose-one` is included. An activity slice that needs another renderer adds one new file, `Play/Scoring/<Renderer>Scorer.cs`, and does not edit the scanner, the DTOs, or the session service.

Slice 05 ships the same kind of scan for `IRewardGranter`, and calls each one after a level clear, in the same transaction as the progress write. Slice 16 adds the grant classes under `Play/Rewards/`. No later slice edits the scanner.

## 4. Data

FluentMigrator classes, timestamp prefix `yyyyMMddHHmm`. Names below are the contract.

`households`

- `id uuid pk`
- `email text` unique, stored lowercased
- `password_hash text`
- `display_name text` 1–40 chars
- `plan text` default `free` check (`free`)
- `show_family_stars bool` default true
- `consent_at timestamptz`
- `created_at timestamptz`

`children`

- `id uuid pk`
- `household_id uuid fk`
- `display_name text` 1–20 chars
- `age_band text` check (`sprout`, `scout`)
- `calm_mode bool` default false
- `sound_on bool` default false
- `clear_streak int` default 0
- `avatar jsonb` nullable, presets only
- `created_at timestamptz`

`sessions`

- `id uuid pk`
- `child_id uuid fk`
- `activity_id text`
- `level int`
- `item_index int`
- `node_id text` nullable, for the story graph
- `item_shown_at timestamptz`, set when the current item is issued (Stop and Go uses it)
- `status text` check (`active`, `completed`)
- `misses int`, `hints int`
- `started_at`, `completed_at`
- `expires_at` (start + 4 hours, slid forward when that unfinished session is resumed)
- at most one `active` row for a given child, activity, and level

`attempts`

- `id uuid pk`
- `session_id uuid fk`
- `client_seq int`
- `response jsonb`
- `correct bool`
- `created_at`
- unique (`session_id`, `client_seq`)

`progress`

- `child_id`, `activity_id`, `level` pk
- `best_stars int` 0–3
- `clears int`
- `first_cleared_at`, `last_cleared_at`

`daily_plans`

- `child_id`, `plan_date date` pk
- `activity_ids text[]` length 2
- `completed bool`

`unlocks`

- `child_id uuid`
- `kind text` check (`badge`, `cosmetic`)
- `code text`
- `granted_at timestamptz`
- primary key (`child_id`, `kind`, `code`)

Deleting a household deletes its children and their rows. Foreign keys use `ON DELETE CASCADE`: households to children; children to sessions, progress, daily plans, and unlocks; sessions to attempts. Index `children.household_id` and `sessions.child_id`. The 10-day certificate is not in this schema.

`daily_plans` is created by slice 06. `unlocks` is created by slice 15, empty of grants. Slice 16 is the only writer of grant rows. Slice 05 does not create either table. Until `unlocks` exists, hub reads treat badges as an empty list.

## 5. HTTP contract

Cookie `pq_session`: HttpOnly, SameSite=Lax, Path=/, Secure in production. Sliding 14 days.

Cookie `pq_child`: HttpOnly, SameSite=Lax, Path=/. Value is a child id that belongs to the household. Cleared if the child is deleted.

Errors use problem details: `title`, `status`, `detail`. Validation failures are 400. Missing auth is 401. Another household’s child is 403. Unknown ids are 404. A repeated `client_seq` with the same response returns the stored result. A repeated `client_seq` with a different response is 409.

| Method | Path | Body | Result |
| --- | --- | --- | --- |
| POST | `/api/auth/register` | `{ email, password, displayName, parentConfirmed: true }` | 201 + session cookie. 409 if email exists. |
| POST | `/api/auth/login` | `{ email, password }` | 204 + cookie. 401 if wrong. |
| POST | `/api/auth/logout` | | 204, clears both cookies |
| GET | `/api/auth/me` | | `{ id, email, displayName, plan }` |
| DELETE | `/api/account` | `{ password }` | 204 after delete |
| POST | `/api/account/password` | `{ currentPassword, newPassword }` | 204. 401 if the current password is wrong. |
| PATCH | `/api/account` | `{ showFamilyStars }` | 200 `{ showFamilyStars }` |
| GET | `/api/children` | | `{ children: [...] }` |
| POST | `/api/children` | `{ displayName, ageBand }` | 201 child. Max 6 children. |
| PATCH | `/api/children/{id}` | `{ displayName?, ageBand?, calmMode?, soundOn? }` | 200 |
| DELETE | `/api/children/{id}` | | 204 |
| POST | `/api/children/{id}/select` | | 204 + `pq_child` |
| GET | `/api/hub` | | today’s plan, per-activity best stars, studio-open bool, badges, active child |
| GET | `/api/play/activities/{id}` | | `{ activityId, title, levels: [{ level, unlocked, bestStars }] }`. No item and no answer key. |
| POST | `/api/play/sessions` | `{ activityId, level }` | 201 `{ sessionId, item, resumed }`. Level must be 1, or the previous level has `best_stars` of at least 1. Same child, activity, and unfinished level returns that session with `resumed: true` and the current item. |
| POST | `/api/play/sessions/{id}/attempts` | `{ seq, response }` | `{ correct, coaching, item, finishedItem, levelCleared, stars }` |
| POST | `/api/play/sessions/{id}/hint` | `{ seq }` | `{ hint }`. Stores the hint on that `seq`. Does not reveal the raw key. |
| POST | `/api/play/sessions/{id}/complete` | | 200 if the level is already cleared. 409 if it is not. Idempotent when cleared. |
| GET | `/api/scoreboard` | | children in this household, stars by skill, badge codes |
| GET | `/api/avatar` | | `{ studioUnlocked, stars, tracks, badges, cosmetics, partsCatalog, current }` |
| PUT | `/api/avatar` | `{ face, hat, color, cape, sticker, glasses, template }` | 200, or 403 when a part is not earned or is studio-only and the studio is closed |

Rate limits: auth routes 10/minute/IP, play writes 60/minute/IP, using ASP.NET Core `AddRateLimiter`. The Next proxy forwards the caller IP. The API trusts that forwarded IP only from loopback.

Password: 10–72 characters. Email: trimmed, lowercased, must contain `@` and a dot in the domain. Display names: letters, numbers, spaces, `'`, `-`.

### Play sessions

The checkpoint is `item_index` and `node_id` on the unfinished session. `POST /api/play/sessions` resumes it. The last correct attempt of a level, in that same transaction, sets the session completed, writes `progress.best_stars` to the max of the old and new score, and then calls every `IRewardGranter`. `POST .../complete` does not award stars by itself.

A hint uses the same `client_seq` space as attempts. The same seq and the same hint returns the stored hint. The same seq with a different body is 409. A hint increments `sessions.hints` once for that seq.

The session service takes a `TimeProvider`. `item_shown_at` is set from that clock when an item is issued. Later slices must not replace it with `DateTime.UtcNow`.

Starting a different activity or level while another session is still unfinished does not delete that checkpoint. Slice 16’s granter treats that start as a broken clear streak. Resuming the same unfinished session does not.

`IItemScorer` may return `nextNodeId`. The session service writes it and is the only writer of session rows. Linear activities leave it null and advance `item_index` after a correct attempt. A miss stays on the same item.

The shared play chrome has a `side` slot. Slice 05 leaves it empty. Slice 17 renders `Mascot` there and does not redesign the chrome.

### Activity JSON

Files: `Content/<skill>/<band>-level-<n>.json`. Loaded at startup. A test fails the build if two files share an `activityId` + level + band, or if an answer key is empty.

```json
{
  "activityId": "focus",
  "ageBand": "sprout",
  "level": 1,
  "title": "Find the star",
  "items": [
    {
      "id": "focus-sprout-1-a",
      "renderer": "grid-find",
      "prompt": "Tap the yellow star.",
      "hint": "It has five points.",
      "config": { "cells": ["star", "moon", "star-dim", "moon"] },
      "answer": { "index": 0 }
    }
  ]
}
```

`config` is sent to the client. `answer` is not. For `sequence`, the client needs the sequence in order to show it, so `config.sequence` is public and `answer` repeats it. Send one item, not the rest of the level.

`path-trace` answer is `{ "points": [[0,0],[10,40]], "tolerance": 24, "coverage": 0.7 }`. The client sends `{ "points": [[x,y], ...] }` in the viewBox. The server accepts when enough of the target path has a sample within `tolerance`. The client does not send `correct: true`.

`manners` and `story` answers are `{ "accepted": ["a", "c"] }`. Coaching for an accepted choice is warm. Coaching for a rude choice explains a kinder next step and lets them try again. Rude choices are misses. Accepted choices are correct. There is no single “most polite culture” key.

`stop-go` answer is `{ "action": "wait", "holdMs": 700 }` or `{ "action": "tap", "target": "star" }`. A tap during wait is a miss. The pictures and the instruction words go in `config`. `action`, `target`, and `holdMs` stay in `answer`.

For `grid-find`, the tapped cell is `answer.index`. `config.cells` is the grid the child sees. Do not put the answer index in `config`.

### Coaching copy

One sentence. Names the next action. Does not say “wrong”, “you failed”, or “streak broken”. Example: “The yellow star is still there. Try that one.”

### Break

Every play screen has a Break button. It pauses locally and shows “Take a breath. Press Ready when you want to play.” The server checkpoint does not move. Calm mode, set by the parent, forces reduced motion, hides the bouncing mascot, and turns confetti off. `prefers-reduced-motion` does the same even if calm mode is off.

Every play screen has a Speak button. It calls the browser speech API on the current prompt when the child presses it. It does not speak on load. The prompt text stays visible if speech is missing or declined. Calm mode does not remove Speak. Sound effects follow `sound_on`, which starts off.

When `show_family_stars` is false, `GET /api/scoreboard` returns only the active child. With no child selected, that list is empty. The account page still lists every child in the household.

## 6. Design

`pipquiz.com/assets/kidza` is the design template for PipQuiz. The theme was purchased for this site. Model the interface on it: layout, color, type, icons, animation, and the decorative graphics in the folder. Read `screenshot.png`, `assets/scss/_options.scss`, `assets/scss/header.scss`, `assets/scss/elements/buttons.scss`, `assets/scss/_effect.scss`, and `assets/css/libs/animate.min.css` before drawing a screen.

Build the pages as React components. Do not install WordPress or copy the theme’s PHP into `src/`. Do copy the template assets the screen needs into `web/public/brand/kidza/` and load the fonts from the copies under `web/src/fonts/`.

Use from the template:

- Layout. A short purple bar with a scalloped lower edge, a white header, a hero with type on one side and art on the other, white rounded cards, icon boxes, orange pill buttons, and a simple footer. The home section order follows the screenshot.
- Color. The tokens below match `_options.scss`. The page is the cream in the screenshot, `#F6F3E6`, rather than the SCSS default `#fff`.
- Type. Recoleta for headings and GT Walsheim for text, from `assets/kidza/assets/fonts/`. Load them with `next/font/local`.
- Icons. Flaticon and Caseicon, from `assets/kidza/assets/fonts/flaticon` and `assets/kidza/assets/fonts/caseicon`. Use these for UI icons. Do not draw a second icon set.
- Motion. Card and button hovers from `_effect.scss`, and the entrance motion in `animate.min.css`, on marketing pages. `prefers-reduced-motion` and calm mode turn that motion off.
- Decorative graphics. The SVG and shape images under `assets/kidza/assets/img/` that are ornaments, masks, borders, stars, and arrows. `star-ic.svg` has the misspelled fill `curentColor`. Set that fill to `currentColor` in the copy so it paints.

The site logo is `pipquiz-main.png`, not `assets/kidza/assets/img/logo.png`. Public pages do not contain the words Kidza, Case-Themes, or Nimora. Demo photographs of people stay in the theme folder. They are not hero images and they are not activity art.

The archive’s cyan, gold, and plum palette is not the site chrome.

### Tokens

Implement in `web/src/theme.ts` with MUI `cssVariables: true`.

| Token | Value | Use |
| --- | --- | --- |
| `bg` | `#F6F3E6` | page |
| `paper` | `#FFFFFF` | cards |
| `ink` | `#16161F` | headlines |
| `muted` | `#4B5563` | body |
| `orange` | `#F15F25` | primary button |
| `purple` | `#6754E9` | bar, links |
| `navy` | `#385469` | footer |
| `radius` | 28 | cards |
| `pill` | 999 | buttons |
| `touch` | 64px min height | child controls |

Shell:

- Top purple bar, short, with a scalloped SVG along its bottom edge. Right side: Account when logged in, Log in when not.
- White header row: the site logo linking home, text links (Activities, How it works), orange pill (Start playing / Go to hub). The signed-in shell uses the same logo.
- Main column max 1120px.
- Footer in navy type on cream: one line that this is practice, not a clinic, plus privacy and contact placeholders.

Child play chrome is calmer than the marketing page: paper card, prompt, one control group, mascot at the side, Break, and a star row. No autoplay video and no marquee. Earned badges show on the hub and the scoreboard, not as a popup on the play screen.

### Site logo

`pipquiz.com/assets/pipquiz-main.png` is the PipQuiz logo for the whole site. Copy it to `web/public/brand/pipquiz-main.png` and keep that filename. One `Logo` component renders it. The public shell and the signed-in shell both use that component, so home, login, register, account, hub, play, scoreboard, and avatar show the same file. `alt` text is “PipQuiz”. Display widths: 280 on the home hero, 160 in the header, 64 where a compact mark is required. Do not redraw the letterforms or swap in the Kidza logo.

Favicon: `pipquiz.com/assets/pipquiz-pq.png` is the square crop of the pencil face, 512×512, with a transparent background. Slice 02 copies that file to `web/public/brand/pipquiz-pq.png` and keeps that filename. It does not crop the logo again and it does not redraw the face. The header still uses the full `pipquiz-main.png`.

## 7. Ownership

Only the slice named here writes these paths. Shared files listed under slice 05 stay frozen while activity slices run.

| Slice | Writes |
| --- | --- |
| 01 Scaffold | `pipquiz.com/src/**` initial solution, health, blank home |
| 02 Design | `web/src/theme.ts`, `web/src/fonts/**`, `web/src/components/Logo.tsx`, `web/src/app/(marketing)/**`, `web/src/components/Shell.tsx`, `web/public/brand/**`, and it deletes `web/src/app/page.tsx` |
| 03 Auth | `api/**/Auth/**`, auth migration, `web/src/features/auth/**`, `web/src/app/(auth)/**`, `web/src/app/(app)/layout.tsx`, `web/src/app/(app)/account/page.tsx` as the security stub, password change |
| 04 Children | `api/**/Children/**`, children migration, `web/src/features/children/**`, the children section of the account page, `ActiveChild` in the app layout |
| 05 Play contract | `api/**/Play/**`, session migration, `web/src/features/play/**`, `web/src/app/play/layout.tsx`, `Content/_sample/**`, the `IRewardGranter` hook |
| 06 Hub | `api/**/Progress/Daily*.cs`, `web/src/app/(app)/hub/**` |
| 07–14 Activities | `Content/<skill>/**`, `web/src/features/<skill>/**`, `web/src/app/play/<skill>/**`, and if needed one new `Play/Scoring/<Renderer>Scorer.cs` |
| 15 Board | `api/**/Progress/Scoreboard*.cs`, the `unlocks` migration, `web/src/app/(app)/scoreboard/**`, account progress summary, `show_family_stars` toggle |
| 16 Avatar | `api/**/Avatar/**`, `api/**/Play/Rewards/**`, `web/src/app/(app)/avatar/**`, `web/src/features/avatar/**` |
| 17 Mascot | `web/src/components/Mascot.tsx` and `mascot/*.tsx` |
| 18 A11y | CSS and labels on existing screens. No new product behavior. |
| 19 Gate | tests and `web/e2e/**` only, plus fixes for failures those tests find |

`Program.cs` endpoint list is edited by slices 01, 03, 04, 05, 06, and 16, and only to add that slice’s `Map*()` line. Slice 06 adds `MapProgressEndpoints()`. Slice 15 adds methods to that class and does not add a second line. Activity slices do not touch it.

## 8. Tests

API: xUnit. Rules that score an attempt are pure functions with unit tests. One Testcontainers test per auth, child scoping, and star flow: household A cannot read household B; a replay does not increase stars; a forged `correct` field is ignored because it is not in the DTO. A repeated `client_seq` with a different body is 409 and keeps the stored result. Guessing a child id, session id, or avatar route from another household returns 403 and no row. Logs and GET bodies omit password hashes, answer keys, and the raw attempt body.

Web: Vitest for path-coverage math if any of it is duplicated in the client for instant ink. The server copy is authoritative. Playwright is slice 19 only, for the demo script in section 2.

Commands, from the new tree, after slice 01 exists:

```sh
cd pipquiz.com/src/api && dotnet test
cd pipquiz.com/src/web && pnpm typecheck && pnpm lint && pnpm test
```

Record the command and the result in the slice’s phase notes. Do not claim a pass that was not run.

## 9. Risks

| Risk | What we do |
| --- | --- |
| Shipping the Kidza name or Nimora assets | The site logo is `assets/pipquiz-main.png`. Layout, type, icons, motion, and ornaments come from `assets/kidza`. Public pages do not say Kidza or Case-Themes. Demo photographs of people stay in the theme folder. |
| Calling the site therapy | Footer and home copy say practice. No diagnosis field. No before/after medical claims. |
| Public child data | No public board, no shareable child URL, no chat, no ads. |
| Cookie proxy bug | Slice 03 tests login in the browser through the Next origin and checks that `/api/auth/me` stays 200 after refresh. |
| Two agents, one file | Ownership table in section 7. Orchestrator rejects a diff outside the slice paths. |
| Client-trusted scores | Attempts carry a response payload. Stars are computed in `Play/Scoring.cs`. |
| Real children on a half-built site | Slice 19 blocks a public launch until email verification sends mail, password recovery works, a parent can export the household’s data, and a lawyer has reviewed consent. Local demo is fine. Product analytics stay off until that review. |

## 10. How a slice starts

The person running the slice reads [prompts/00-orchestrator.md](prompts/00-orchestrator.md), then only the numbered prompt for that slice, plus this file and the newest entry in [decisions.md](decisions.md). They state the file list, then edit. They update [phases.md](phases.md) and [todos.md](todos.md) in the same session.

The first run stops after slice 05 for review. Docker has to be running before slice 01, because Aspire and the database tests use it.
