# Slice 19 — End-to-end demo and production gate

Wave: last. One agent, after slices 02–16 and 18.

## Outcome

Playwright runs the first demo from plan.md section 2 against a local Aspire stack. A short gate note says what is still required before a public launch.

## Write paths

- `web/e2e/**`
- `web/package.json` script `test:e2e`
- test-only fixes in slices you are allowed to touch when a demo bug is local: auth, children, play session, focus content, kindness content, scoreboard, avatar
- `pipquiz.com/ai/specs/phases.md` verification notes

## Demo script

1. Register a parent.
2. Add Alex, Sprout, and Sam, Scout.
3. Select Alex. Finish Focus level 1 (three items) with no mistakes. Stars are 3.
4. Reload. Alex’s progress is still there.
5. Select Sam. Sam’s focus stars are 0.
6. As Sam, open Kindness level 1 and submit an accepted choice.
7. Open `/scoreboard` and see both names.
8. `PUT /api/avatar` with a studio-only part returns 403 when the star sum is under 24 or math, memory, or kindness has no cleared level. A starter face and color can be saved before that. Seed stars only through the public play API or a test helper that is not compiled into the client. Do not add a debug endpoint that stays available when `ASPNETCORE_ENVIRONMENT` is Production.

## Gate note

Write `pipquiz.com/src/RELEASE.md` with:

- commands you ran and the results
- known gaps from todos.md
- the sentence: public launch still needs parent email verification that sends mail, password recovery that sends mail, a parent data export, and a legal review of children’s privacy, before any real child is invited
- confirmation there is no billing, no chat, and no public leaderboard

## Acceptance

`pnpm test:e2e` passes once. `dotnet test` still passes. The release note exists.

## Stop if

The demo only passes because a test skipped the server and wrote stars from the browser. Fix the product path.
