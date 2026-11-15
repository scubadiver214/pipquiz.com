# PipQuiz — phases

Phase 0 is the written plan. Later phases are the build. A phase is done only when its checkboxes are true and the verification line names commands that were actually run.

```text
0 Plan
  → 1 Scaffold
      → 2 Design shell
            → 3 Parent auth
                  → 4 Child profiles
                        → 5 Play contract
                              → 6 Hub and daily plan
                        → 7 Focus ─────────────┐
                        → 8 Memory             │
                        → 9 Logic              │
                        → 10 Math              ├─ parallel, separate folders
                        → 11 Kindness          │
                        → 12 Story             │
                        → 13 Pencil/hands/shapes
                        → 14 Stop & Go         │
                        → 17 Mascot reactions ─┘
                        → 15 Scoreboard (after 6, can overlap 7–14)
                              → 16 Avatar Studio
                                    → 18 A11y pass
                                          → 19 E2E and production gate
```

The first run is sequential in this working tree: slice 01, review, slice 02, review, slice 03, review, slice 04, review, slice 05, review. Do not start slice 06 until the user asks. Slice 02 finishes before slice 03 because they share the tree.

After that review, slices 7–14 and 17 can run together after slice 5. Slice 6 starts after slice 5. Slice 15 waits until slice 6’s daily-plan rows exist and creates the empty `unlocks` table. Slice 16 waits until slice 15 and writes the grant rows. Slice 16 must not edit scoreboard files.

## Phase 0 — Plan

**Done.** 2026-11-11.

- [x] Read `pipquiz.com/ai/prompts/initial.md`
- [x] Fetched https://nimorakid.com/en-us
- [x] Inspected Kidza `style.css`, `_options.scss` colors, and `screenshot.png`
- [x] Noted stack versions from the reference apps. Those repos are not part of PipQuiz.
- [x] Wrote this spec and the slice prompts under `pipquiz.com/ai/specs/`
- [x] Merged `ai/PipQuiz_MVP_Plan/` into this plan on 2026-11-15. Recorded in [decisions.md](decisions.md).

Verification: documents only. No app commands.

## Phase 1 — Scaffold

Slice [01](prompts/01-scaffold.md). One agent.

- [ ] `pipquiz.com/src` builds
- [ ] Aspire starts Postgres, migrations, API, and web
- [ ] `/health` returns success
- [ ] `/` renders `pipquiz-main.png`

## Phase 2 — Design shell

Slice [02](prompts/02-design-shell.md). Parallel with phase 3.

- [ ] Home matches the layout in plan.md section 6 at 390px and 1280px
- [ ] `pipquiz-main.png` and `pipquiz-pq.png` are in `web/public/brand`
- [ ] No Kidza images in `web/`

## Phase 3 — Parent auth

Slice [03](prompts/03-parent-auth.md). Parallel with phase 2.

- [ ] Register, login, logout, password change, delete
- [ ] Refresh keeps the session through the Next proxy
- [ ] Household A cannot use household B’s cookie

## Phase 4 — Child profiles

Slice [04](prompts/04-child-profiles.md).

- [ ] Parent can add, edit, select, and delete a child
- [ ] Age band is `sprout` or `scout` only
- [ ] Sound defaults off
- [ ] Selecting a child sets `pq_child`. `/api/hub` is not part of this slice.

## Phase 5 — Play contract

Slice [05](prompts/05-play-contract.md).

- [ ] Sample activity round-trips: start, attempt, hint, complete
- [ ] A refresh mid-level returns the same item
- [ ] Stars are 3, 2, or 1, and a replay keeps the best
- [ ] Answer keys are absent from the web bundle and from GET responses
- [ ] A second household receives 403

## Phase 6 — Hub and daily plan

Slice [06](prompts/06-hub-daily.md). Parallel with phases 7–14 once phase 5 is merged.

- [ ] Hub lists today’s two skills and the activity grid
- [ ] The same child gets the same plan for the rest of that UTC date
- [ ] Two skills on the plan are different

## Phases 7–14 and 17 — Activities and mascot

Parallel. Prompts 07 through 14 and 17. Each phase is done when:

- [ ] Both age bands, 3 levels, 3 items
- [ ] Server tests cover one correct attempt and one miss
- [ ] The play page works with touch and keyboard
- [ ] Break does not advance the checkpoint
- [ ] Speak reads the prompt only after a press

## Phase 15 — Scoreboard

Slice [15](prompts/15-scoreboard.md).

- [ ] Board shows only this household
- [ ] Hiding family stars leaves only the active child
- [ ] Badges for this household show on the board

## Phase 16 — Avatar Studio

Slice [16](prompts/16-avatar.md).

- [ ] Studio parts stay locked until 24 best stars and a cleared level in math, memory, and kindness
- [ ] An earned cosmetic saves before the studio opens
- [ ] A saved avatar reloads

## Phase 18 — A11y and responsive

Slice [18](prompts/18-a11y.md).

- [ ] 320, 768, and 1280 checked on home, hub, and one play page
- [ ] Keyboard completes a `choose-one` item
- [ ] Reduced motion stops the bounce

## Phase 19 — Demo gate

Slice [19](prompts/19-e2e-gate.md).

- [ ] The first-demo script in plan.md section 2 runs in Playwright
- [ ] Release notes state that public launch still needs email verification, password recovery, a data export, and a legal review
