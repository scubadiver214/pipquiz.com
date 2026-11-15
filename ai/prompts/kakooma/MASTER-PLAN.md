Pips Math Puzzle — Master Cursor Planning Prompt
Purpose: Paste this entire document into Cursor's Planning mode using a capable reasoning model. The output should be a reviewed, executable implementation plan, followed by independently testable vertical slices. Do not begin coding until the plan and puzzle-rule decisions are documented.

0. Role and operating instructions
You are the principal game architect, senior full-stack engineer, mathematics/puzzle-systems engineer, child-centered UX designer, QA lead, and AI-agent orchestrator for Pips Math Puzzle, an original browser-based educational math game within the PipQuiz ecosystem.

Think through design choices, inspect the existing repository, identify uncertainties, and produce an architecture and step-by-step work plan that Cursor agents can implement without vague handoffs. Delegate bounded tasks to specialized subagents when available. Maintain explicit ownership boundaries, acceptance criteria, automated tests, risks, and artifacts. Avoid implementing everything in one giant pass.

Reference material (for research and behavioral inspiration, not asset/code copying):
- https://apps.apple.com/us/app/kakooma-math-brain-puzzles/id6746321576
- https://www.youtube.com/shorts/RFAeJpQ1HaY
- https://new.gregtangmath.com/kakooma.html
- https://new.gregtangmath.com/images/Game_Directions.pdf
The original Kakooma-style idea is to find a number in each group that equals the sum or product of two other numbers in the same group; selected answers may form a second-stage final puzzle. Establish Pips Math Puzzle's own layout, progression, icons, feedback language, audio, artwork, and underlying authored content. Do not copy proprietary artwork, trademarks, interface screens, text, copyrighted puzzle packs, or audiovisual assets. Flag legal/IP review before public commercialization. There is already an online Kakooma game, so do not assume this is a never-before-implemented browser concept.
1. Product vision and constraints
Build a responsive, installable-feeling web game that is:
- Immediately fun: A child can start a guest practice round in one click, with a guided first puzzle.
- Educational: Strengthens number sense, addition, later multiplication, mental math and pattern recognition.
- Attention-friendly: One clear task at a time; optional pause; subtle, toggleable animations; no forced timers or punishment loops; sessions can be 3–7 minutes.
- Progressive: Clear difficulty tiers and adaptive skill-based recommendations, never uncontrolled difficulty spikes.
- Rewarding: Positive feedback, collectible original Pip-themed avatar items, stars, badges and level milestones with no loot boxes, paid hints, manipulative streaks or child-targeted advertising.
- Privacy-first: Parent holds the account; child uses a pseudonymous profile/avatar; no public child leaderboards, chat, social comparison, or public profile search.
- Accessible: Keyboard/touch/mouse support; WCAG-oriented contrast and focus; reduced motion; readable numerals and large targets; sound-off by default or user-controlled.
- Integratable: Can run independently and later be embedded in PipQuiz.com without rewriting domain rules, account models, or reward contracts.
Product decisions to validate in the planning phase
1. Default target children ages 4–10, but addition-puzzle mechanics may require scaffolding for the youngest children; do not claim every difficulty is age-appropriate for every age.
2. MVP: responsive solo play, addition first, small-group puzzles, final meta-puzzle, local guest progress, guided tutorial.
3. Second release: multiplication, parent accounts, cloud save, adaptive difficulty, rewards, analytics.
4. Advanced release: teacher/parent insights, curated packs, daily challenges and downloadable reports, with privacy controls.
5. No AI inference is required at runtime for puzzle correctness. Use deterministic arithmetic and a verifier; AI can assist development, instructional copy, and optional later personalization behind review gates.
2. Reference game rules and original adaptation
2.1 Define the mathematical contract before building UI
For a number group G of distinct cells (values may repeat only if explicitly permitted), a valid answer is a cell c for which there are two other distinct cells a and b such that:
- Addition mode: value(a) + value(b) = value(c).
- Multiplication mode: value(a) * value(b) = value(c).
The cells for a, b, and c must be distinct IDs; value equality does not imply cell identity. Unless explicitly designed as a multiple-answer challenge, each generated group must have exactly one valid answer cell. The two operands may admit multiple pairs that produce the same answer; document whether this is acceptable (recommended for MVP: unique answer cell and at least one valid pair; optionally unique operand pair at introductory levels).

Do not conflate three separate concepts: the two operand cells, the sum/product answer cell, and a value appearing in several places. Decide whether the player clicks only the answer (recommended quick-play mode) or first selects the two operands and then the answer (recommended learning mode). Both use the same rule engine.
2.2 Multi-stage puzzle
A Pip Puzzle consists of N number groups. For each group, the child finds the target result. Those N results populate a second-stage Pip Finale puzzle in fixed, clearly indicated positions. The child solves the final group using the same selected arithmetic operation (or another explicitly indicated operation).

Critical generation order: Generate/validate the finale first, then construct each feeder group around its required result. This ensures the finale is solvable and prevents unrelated, accidentally impossible groups. Do not simply generate eight arbitrary groups and hope their answers form a meaningful finale.

MVP proposed configurations (all subject to mathematically verified feasibility):
- Tiny Pips: 2–4 feeder groups with 4 cells each; small values, addition; explicit visual scaffolds.
- Little Pips: 4 feeder groups with 4–5 cells; addition to 20; final 4-cell cross or simple card.
- Brainy Pips: 4–6 feeder groups with 5–6 cells; addition to 50 and optional multiplication.
- Master Pips: 6–8 feeder groups with 6–9 cells; larger numbers, mixed operations only when clearly signposted.
The final puzzle's unique-answer constraint must be tested independently. If target numbers collide or create accidental second solutions, reject and regenerate. Avoid layouts that overload a phone screen: display one feeder group at a time and show a compact meta-puzzle progress indicator; allow an overview on desktop.
2.3 Example tutorial case
For the values [2, 3, 5, 9] in addition mode, the unique resulting number is 5, because 2 + 3 = 5. Verify programmatically that no other value in the group is a sum of two distinct other cells. The tutorial should animate or otherwise clearly indicate 2 + 3 → 5, offer a replay button, then allow an immediate independent example.
2.4 Input and fairness policies
- Wrong selections: brief, encouraging feedback; no lost coins; retain puzzle state.
- Hints: tier 1 highlights relevant subset; tier 2 reveals one operand; tier 3 explains the equation. Record hints separately from score.
- Timer: off in default practice; optional in challenge mode; user-controlled pause.
- Score: prefer accuracy, completion, independent solving, and skill growth over raw response speed for young children.
- Save/resume at logical puzzle boundaries; support page refresh and temporary network loss.
- Avoid infinite retries through a max-attempt generator budget, with deterministic fallback seed puzzles and telemetry on generator rejection.
3. Recommended engineering stack
First inspect the actual repo and match existing PipQuiz conventions. If the repo is greenfield, propose:
Area	Default	Design note
Language	TypeScript, strict mode	Share typed rules across layers
Frontend	Next.js App Router + React	Browser rendering for game interactions
Styling	Tailwind CSS + accessible component primitives	Custom original visual system
Animations	CSS and lightweight animation primitives	Respect prefers-reduced-motion
State	Pure game-state reducer + lightweight UI store	Avoid hidden mutable timer logic
Validation	Zod or equivalent	Validate all incoming save payloads
Database	PostgreSQL + Prisma or existing ORM	Only when cloud profiles are added
Authentication	Existing PipQuiz parent auth or established provider	No direct child account/email required
Testing	Vitest + React Testing Library + Playwright	Unit, component, E2E, accessibility
Observability	Privacy-safe structured logs + metrics	Never capture child names or raw free text
Deployment	Existing PipQuiz hosting and CI/CD	Do not invent AWS/Azure setup if already configured


Prefer a pure puzzle-engine package that does not import React, Next, persistence, random browser globals or the ORM.

Suggested initial module structure:
/apps/web/
  app/games/pips-math-puzzle/
  components/pips/
  features/pips-game/
/packages/pips-engine/
  src/types.ts
  src/operations.ts
  src/solver.ts
  src/generator.ts
  src/difficulty.ts
  src/seeded-rng.ts
  src/serialization.ts
  test/
/packages/shared/
/docs/pips-math-puzzle/
  product-requirements.md
  rules-and-invariants.md
  architecture.md
  data-model.md
  ux-spec.md
  test-strategy.md
  implementation-plan.md
  agent-handoffs.md
  decisions.md
Adapt the repository layout rather than imposing an incompatible monorepo.
4. Puzzle engine specification
Define Operation = 'add' | 'multiply', NumberCell, NumberGroup, MetaPuzzle, PuzzleDefinition, DifficultyConfig, PuzzleSolution, PlayerMove, RoundState, ScoreSummary and GeneratorDiagnostics as stable exported types.

Core pure functions:
findValidAnswers(group, operation): SolutionCandidate[]
validateGroup(group, operation, policy): ValidationResult
solveMetaPuzzle(metaPuzzle): SolutionCandidate[]
generateGroupForTarget(target, config, rng): NumberGroup
generatePuzzle(config, seed): PuzzleDefinition
validatePuzzle(puzzle): ValidationResult
applyMove(state, move): RoundState
scoreRound(round, scorePolicy): ScoreSummary
Required engine invariants:
1. Exactly the specified number of cells and unique cell IDs per group.
2. Numeric values within bounds; integers only at launch; configurable zero/negative policy.
3. At least one operand pair with different cell IDs and different ID from target.
4. Exactly one valid answer cell for every group, unless special multi-answer mode is explicitly enabled.
5. The finale contains exactly one valid answer cell.
6. Every feeder group has the exact predetermined answer required at its finale position.
7. Each puzzle has a stable versioned schema and deterministic seed.
8. Repeated seeds/configs yield equivalent puzzles; invalid configs fail with explicit errors.
9. Generator never blocks the UI indefinitely; capped attempts, sensible time budget, fallback puzzles.
10. Score derivation is deterministic and not trusted from client when tied to achievements or rankings.
Proposed generation pseudocode:
validate difficulty configuration
for bounded attempt in attempts:
  generate a mathematically valid finale with a unique answer
  for each finale cell:
    generate a feeder group whose unique answer equals finale cell's value
    validate feeder group exhaustively
  assemble full puzzle
  validate entire two-stage puzzle exhaustively
  if valid: return versioned puzzle with seed + solution proof
return a separately validated preauthored fallback puzzle
Include a small exhaustive solver that checks all unordered pairs of distinct operand cell IDs and all candidate result cells; never infer uniqueness from number sorting. Explain computational complexity and document generator rejection statistics. Consider avoiding 0 and 1 in early multiplication where they produce trivial or ambiguous patterns. Clearly separate internal solution metadata from serialized browser responses and avoid exposing solution keys in cloud API payloads if competitive modes are added. For offline single-player, avoid false claims that the answer can be hidden from a technically sophisticated browser user.
Automated mathematics test matrix
- Addition and multiplication valid/invalid groups.
- Duplicated numeric values but distinct cell IDs.
- Accidental multiple answer cells.
- Multiple operand-pair possibilities with one answer cell.
- Minimum and maximum values, zero/one, invalid negatives and overflow boundaries.
- Missing/extra feeder group, disconnected meta mapping, mismatched target.
- Arbitrary generated seeds across each difficulty; at least 10,000 generator trials in a non-UI verification suite or justified equivalent.
- Property-based tests with randomized values; reproducible failure seeds.
- Timer never changes puzzle mathematical validity.
- Puzzle remains exactly solvable after serialize/deserialize.
5. Gameplay UI/UX specification
Primary screens
1. Game landing: Pips Math Puzzle title, friendly original Pip character, Play, How to Play, My Progress (account-aware).
2. Mode selection: Practice (default), Challenge (optional clock), Daily Puzzle (later), Family/Teacher (later).
3. Difficulty: Tiny, Little, Brainy, Master, with examples and skill descriptions, not just age labels.
4. Interactive tutorial: Show a sample group, reveal visual addition, invite first click, recover from errors kindly.
5. Puzzle screen: Current number group, clear prompt, progress dots, hint, pause and audio toggles; highly visible active number selection.
6. Finale screen: Feeder answers animate into a final puzzle; distinguish transferred results from operands.
7. Round complete: Cheerful minimal animation, achievement, attempt summary, Play Another, Back to Home.
8. Progress/profile: Parent-managed child avatars, topic mastery, recent play and earned rewards.
9. Parent dashboard (later): Session history, difficulty trends, controls, delete/export data, and privacy settings.
Responsive layouts
- Phone narrow viewport (320–390 CSS px): one group at a time, 44–48px+ touch targets when feasible, no horizontal scrolling.
- Tablet: centered board and compact progress sidebar.
- Desktop: board, finale preview, context help in balanced columns.
- Portrait and landscape; orientation changes preserve progress.
- Accessible keyboard focus and semantic button controls for number cells; screen-reader instructions announce mathematical meaning and progress.
Attention-sensitive interaction principles
- Single salient action per screen and short instructional sentences.
- Calm color palette with vivid accent for selected numbers; do not rely solely on color.
- No flashing, unexpected sound, countdown by default, or overwhelming confetti.
- Clear Try again/`Show me` paths without shame or penalty.
- Optional dots/ten-frames/counters to help younger children reason visually.
- Parent preference for reduced stimulation, larger numbers, and no music.
- Reward effort and correctness without presenting unvalidated claims of treating ADHD or improving clinical outcomes.
6. State machine and data structures
Model explicit round transitions:
idle -> onboarding -> selecting_mode -> playing_group
playing_group -> showing_feedback -> playing_group
playing_group -> finale_ready -> playing_finale
playing_finale -> showing_feedback -> completed
playing_* -> paused -> playing_*
playing_* -> saved -> restored
any_recoverable_state -> recoverable_error -> same_state
Specify actions and guards; do not allow submitting answers after a transition or accidentally advancing two groups on double click. Make timer code independent of React rerender cadence and handle tab backgrounding and visibility changes intentionally.
Illustrative persistence entities
- ParentAccount (only if not provided by PipQuiz)
- ChildProfile (pseudonymous nickname, avatar, settings, parent ownership)
- PuzzleDefinition (optional stored daily/curated puzzles)
- GameSession (profile, difficulty, version, seed, started/ended times, status)
- PuzzleAttempt (group, guess, correctness, optional hint usage, privacy-minimized timestamps)
- SkillProgress (operation, range, attempts, correct, mastery estimate)
- EarnedReward (reward ID, profile ID, earnedAt, trigger)
- ParentPreferences (sound, timers, reduced-motion preference, privacy options)
Define table indexes, migrations, transaction boundaries, retention/deletion behavior, authorization policies and API DTOs. Only build tables needed by the current slice. A guest's local progress should migrate to a parent-owned profile only with clear consent.
7. Security, privacy and compliance
This product targets children, so treat privacy as a release gate, not a backlog nice-to-have:
- Review COPPA obligations and applicable privacy law with qualified counsel before release; do not assume merely avoiding names resolves compliance.
- Parent-mediated signup and adult-facing notice/consent workflow where required.
- No public child identifiers, direct messaging, child behavioral ad profiling or third-party trackers by default.
- Restrict server endpoints to authenticated parent-owned profiles; test cross-account access explicitly.
- CSRF considerations, secure cookies, CSP, output encoding, dependency audit, rate limits and strict input validation.
- Data minimization; define retention and deletion/export workflows.
- Separate anonymous event metrics from profile-specific educational performance where possible.
- No hardcoded credentials; proper secrets/config management.
- Validate provider account requirements, consent and under-13 usage before production.
8. Scoring, adaptation and rewards
MVP scoring proposal
- Completion: primary success signal.
- Accuracy: correctSelections / totalSelections (be precise about retries and denominator).
- Hint independence: recorded separately, not used to punish the player.
- Stars: based on completion and accuracy, optional easy-to-understand thresholds.
- Speed: only in opt-in challenge mode.
Later adaptive difficulty
Use a transparent rules-based recommendation: last K puzzles, independent accuracy, number range, and hints used. Increase complexity after sustained success; ease back after frustration. Never change the active puzzle halfway through. Keep adaptation inspectable by parents and avoid making clinical or diagnosis-based inferences.
Reward design
Original Pip pencil-themed character cosmetics: hats, colors, stickers, shoes, accessories. Small collectibles for completing short sessions and milestones; no gambling, random purchase mechanics or real-money reward pressure. Reward assets and progress must not depend on a paid currency.
9. Multi-agent architecture and concurrency
When Cursor supports subagents, delegate the following bounded deliverables. If agent concurrency is limited, run them sequentially using the same scopes and handoff checklist.
Agent	Responsibility	Owned files / contract
A — Product/UX	PRD, personas, user flows, accessibility checklist	docs/.../product-requirements.md, ux-spec.md
B — Puzzle math	Formal rules, generator/solver contracts, proof tests	packages/pips-engine/**
C — Game UI	Responsive components, state rendering, tutorial	apps/web/components/pips/** and game feature UI
D — Platform/API	Parent profiles, persistence, auth integration (later phase)	schema, API/server files
E — QA/DevEx	Automated testing, CI, accessibility/performance checks	test infrastructure and Playwright scenarios
F — Security/Privacy	Threat model, consent/retention review, authorization test design	docs/.../security-privacy.md, test criteria
Lead architect	Shared contracts, dependencies, integration, decision log, merges	architecture.md, implementation-plan.md, decisions.md


Agent safety rules:
- No two agents edit the same file concurrently.
- Lead agent freezes the shared TypeScript contract before parallel work.
- Each task receives a precise input contract, expected output, paths, explicit acceptance tests and blocked dependencies.
- Each agent reports touched files, tests run, unresolved questions, and integration risks.
- Review every agent diff; do not blindly merge divergent implementations.
- A green build without math proofs and keyboard usability is not done.
10. Vertical slices with gates
Slice 0 — Repository reconnaissance and planning
Dependencies: none.

Deliverables: inspect repo and deployment/auth constraints; document actual architecture; confirm rule details; produce PRD, state model, data flow, threat notes, ADRs, risk register and ordered task board. Include original-IP guardrails and a list of factual unknowns from references.

Acceptance gate: no architecture assumptions contradicted by repo; explicit MVP definition, source ownership and feasibility of final-puzzle mathematical constraints.
Slice 1 — Standalone pure math engine
Dependencies: formal rule contract from Slice 0.

Deliverables: types, exhaustive solver, generated unique-answer groups, deterministic seed RNG, finale-first generator, generator validation and unit/property-based tests.

Acceptance gate: all invariant tests pass; thousands of seeds reliably yield valid, solvable two-stage puzzles; malformed configurations fail safely; reproducible puzzle JSON snapshots.
Slice 2 — First playable browser milestone
Dependencies: engine API from Slice 1.

Deliverables: responsive game route, one addition difficulty, number buttons, correct/wrong states, progress indicator, automatic finale, results screen and play-again loop; guest mode with no signup.

Acceptance gate: a child or tester can start, finish feeder puzzles, complete finale, and replay on phone and desktop; no hardcoded answer paths; keyboard interactions work; UI never loses/duplicates puzzle progress.
Slice 3 — Tutorial, accessible UX and resilient state
Dependencies: Slice 2.

Deliverables: first-play walkthrough, optional operand highlighting, graduated hints, pause/resume, local save/restore, sound/reduced-motion preferences, error recovery, responsive redesign for narrow phones.

Acceptance gate: no critical WCAG-oriented accessibility failures in automated and manual checks; screen-reader labels and focus behavior verified; refresh and orientation changes do not corrupt state.
Slice 4 — Difficulty ladder and math operations
Dependencies: engine test confidence and stable UI.

Deliverables: four tunable tiers, larger groups, multiplication mode, adaptive suggestion prototype, configurable math ranges, instructional scaffolds.

Acceptance gate: validated generated puzzles across tiers and operations; every tier demonstrably differs in difficulty characteristics; no unintentionally trivial multiplication boards; age-sensitive usability test notes.
Slice 5 — PipQuiz account integration and cloud saves
Dependencies: repo auth decision and Slice 3 session schema.

Deliverables: parent-only login integration, child profiles, protected APIs, durable sessions, progress metrics, local-to-account migration strategy, per-profile preferences.

Acceptance gate: cross-account data access denied in integration tests; save/load works across devices; parent can manage child profiles; schema migration and rollback plan documented.
Slice 6 — Rewards, progression and parent insights
Dependencies: Slice 5.

Deliverables: original cosmetic reward assets, achievements, progress reports, mastery analytics, parent privacy controls, clear data deletion workflow.

Acceptance gate: rewards deterministic and abuse-resistant; no public child leaderboard/chat; progress is comprehensible to nontechnical parents; privacy review passed.
Slice 7 — Production readiness
Dependencies: all release-scope slices.

Deliverables: release checklist, CI, load and performance checks, error monitoring, privacy/legal review, threat model completion, mobile browser testing, backups, rollback, analytics governance and deployment docs.

Acceptance gate: agreed functional, security, accessibility, privacy and performance thresholds all met; no blocker bugs; runbook and incident owner identified.
11. Quality gates and definition of done
Every slice must include:
1. User-visible demonstration, screenshots or a reproducible local run path.
2. Updated plan/docs describing what actually shipped.
3. Typed interfaces and no unexplained runtime any.
4. Unit tests for new domain logic; browser tests for critical interactive flows.
5. Error/empty/loading states and relevant accessibility checks.
6. Passing formatter, linter, TypeScript validation and automated test suite.
7. Security/privacy review for any new data collection or endpoint.
8. Diff review and updated agent handoff log.
Release-specific targets to discuss and measure, not pretend have already passed: responsive layout at 320px+, stable input latency on midrange phones, no serious accessibility violations, successful offline recovery of guest progress, generator validity 100% in sampled trials, and automated tests for all major state transitions.
12. Risks, tradeoffs and non-goals
Top risks: unrecognized second solutions, impossible meta puzzles, young children misunderstanding target selection, overwhelming phone layouts, race conditions from double taps, poor math pedagogy, child privacy obligations, copying too closely from existing Tang Math product, overbuilding accounts before gameplay is validated.

MVP non-goals: multiplayer, global child leaderboard, live AI tutor, monetization, in-game purchases, public social/sharing features, expensive game engine, elaborate 3D world, teacher district integrations.

Architecture tradeoffs to document: precomputed puzzle packs vs runtime generation; server-vs-browser challenge validation; single-stage vs two-stage mode for youngest users; saving every move vs puzzle boundaries; independent package vs in-app module; existing auth vs new auth.
13. What to output on the first planning pass
Before writing implementation code, return the following in this order:
1. Repository assessment: real observed stack and conventions; explicitly label missing information.
2. MVP pitch: core gameplay and smallest usable milestone.
3. Formal game rules: example, constraints, selected UX interpretation and proof of finale solvability.
4. Architecture: package/module diagram, dependencies, data flows, state machine, interface contracts.
5. UI wireframe descriptions: landing, tutorial, group, finale, completion at mobile/tablet/desktop sizes.
6. Implementation board: slices 0–7 decomposed into actionable tasks with prerequisites and sizing.
7. Agent delegation map: scopes and parallel-safe work ordering.
8. Testing plan: solver proofs, property tests, integration/E2E, accessibility, auth/security.
9. Risks and open questions: rank by severity; decide sensible defaults rather than stalling.
10. First playable slice instructions: exact ordered tasks, file plan, local commands and acceptance tests.
Create/maintain the files under docs/pips-math-puzzle/. Include task IDs such as PIP-MATH-001 and acceptance criteria written as Given/When/Then. Explicitly show critical path dependencies. Favor small, reviewable pull requests. End your first planning response with the recommended next implementation slice, its exact success criteria and the agents to activate.
14. Instruction to Cursor to begin once planning is approved
After a human has reviewed the generated plan, implement Slice 1 (math engine), then Slice 2 (first playable web milestone). Complete and test each before starting accounts/rewards. Do not claim a feature is complete if code, tests or a runnable demonstration are missing. Maintain a living docs/pips-math-puzzle/implementation-plan.md with statuses todo, in_progress, blocked, and done, plus proof of passing checks.