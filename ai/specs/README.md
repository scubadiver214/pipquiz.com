# PipQuiz.com

Educational play site for ages 4–10. Short activities that practice focus, memory, logic, visual skills, self-control, math, and manners. A parent owns the account. Children are profiles on that account. PipQuiz is practice and play. It is not a medical treatment and it does not diagnose ADHD.

The product front door is [../../README.md](../../README.md). This folder is the build contract.

**Status: plan only.** No application code yet. Source will live in `pipquiz.com/src`.

## Where this product lives

Plans, prompts, assets, the Kidza reference theme, and future source all stay under `pipquiz.com/`.

`gretas-game-web` and `gretas-game-api` are reference only. They have nothing directly to do with PipQuiz. Do not add PipQuiz pages, tables, specs, or projects to either repo. Do not take a project reference on them. Do not share their database or their deploy.

## Read in this order

1. [plan.md](plan.md) — findings, architecture, frozen API, design, file ownership
2. [phases.md](phases.md) — waves, what can run in parallel, done criteria
3. [decisions.md](decisions.md) — choices already made
4. [todos.md](todos.md) — work still open
5. [bugs.md](bugs.md) — defects
6. [prompts/00-orchestrator.md](prompts/00-orchestrator.md) — prompt that launches the build
7. `prompts/01` through `prompts/19` — one prompt per slice, safe to hand to a separate agent
8. [../briefs/elementary-principal.md](../briefs/elementary-principal.md) — the one-page note for a school leader. Public claims stay inside it.

`ai/PipQuiz_MVP_Plan/` is the earlier kit. It was merged into this folder on 2026-11-15. Use this folder.

## Snapshot

| | |
| --- | --- |
| Product | PipQuiz.com |
| Code (planned) | `pipquiz.com/src/api` and `pipquiz.com/src/web` |
| Stack | Next.js 16, React 19, MUI 9, .NET 10 Minimal API, Dapper, FluentMigrator, Aspire 13, PostgreSQL 17 |
| Identity | Parent email and password. Children are profiles on that account. |
| Design template | `pipquiz.com/assets/kidza` (layout, type, icons, motion, ornaments) |
| Site logo | `pipquiz.com/assets/pipquiz-main.png` on every page |
| Inspiration | [nimorakid.com/en-us](https://nimorakid.com/en-us) skill list, rebuilt as original browser activities |
