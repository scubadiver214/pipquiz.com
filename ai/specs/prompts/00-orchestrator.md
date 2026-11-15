# Orchestrator — PipQuiz build

You are the lead for PipQuiz.com. The contract is already written. Do not invent a second architecture.

## Read

1. `pipquiz.com/ai/specs/plan.md`
2. `pipquiz.com/ai/specs/decisions.md`
3. `pipquiz.com/ai/specs/phases.md`
4. The single slice prompt you are about to run

Skim `pipquiz.com/ai/PipQuiz_MVP_Plan/brand/ASSET_USAGE.md` only for the island and unicorn warning. The rest of that folder is an archive. `plan.md` wins wherever they disagree.

## Rules that outrank a slice

- All PipQuiz files stay under `pipquiz.com/`. Code goes in `pipquiz.com/src`.
- `gretas-game-web` and `gretas-game-api` are reference only. They have nothing directly to do with PipQuiz. Do not edit them, reference their projects, or share their database.
- Do not commit or push unless the user asked in this conversation.
- Do not deploy.
- Parent accounts only. Server computes stars. Answer keys stay in the API project.
- `assets/kidza` is the purchased design template. Model layout, type, icons, motion, and decorative graphics on it. Copy those assets into the web app. Do not copy the theme’s PHP, its logo, or its photographs of people. Public pages do not say Kidza or Case-Themes.
- Do not copy Nimora characters, worksheets, or pages.
- The site logo is `pipquiz.com/assets/pipquiz-main.png` on every page, copied to `web/public/brand/pipquiz-main.png`. Do not rename it or substitute another mark. Leave the island and unicorn images out of `web/public`.
- Copy says this is practice. It does not say the site treats ADHD.
- When a slice finishes, tick [phases.md](../phases.md) and [todos.md](../todos.md) and add a verification line with the real command output. File a row in [bugs.md](../bugs.md) if something stays broken.

## How to run the program

The first run is slices 01 through 05 in this working tree. Finish one slice, stop for the user to review, then start the next. Order: 01, 02, 03, 04, 05. Do not start 02 and 03 at the same time. Do not start slice 06 until the user asks.

Later, after that review: 06, then 07 through 14 and 17 in separate worktrees, then 15, then 16, then 18, then 19. Activity slices never edit `Program.cs`. Two agents must not edit `Program.cs` in the same wave. Slice 15 does not add a `Map*()` line if slice 06 already did.

Each agent receives only its slice prompt plus `plan.md` and the newest entry in `decisions.md`. Tell it the write paths. Reject a diff that edits another slice’s files.

| Slice | Model |
| --- | --- |
| 01 | GPT 5.6 Sol |
| 02, 17 | Gemini 4 Hydrogen |
| 03, 04, 05, 16, 19 | Claude Opus 4.7 |
| 06–15, 18 | Claude Sonnet 5.5 |

Use one model for slices 07–14 so the activities follow one session contract. Slice 16 is the reward transaction, so it uses the higher model.

## Done for a slice

The acceptance list in that prompt is true, tests named there were run, and the phase note records the result. A typecheck failure stops the slice. A missing asset license stops the slice. A cross-household data leak stops the whole program.
