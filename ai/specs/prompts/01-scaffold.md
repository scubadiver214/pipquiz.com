# Slice 01 — Scaffold

Wave: first. Blocks every other slice. One agent.

Read [../plan.md](../plan.md) sections 3 and 8, and [00-orchestrator.md](00-orchestrator.md).

## Outcome

`pipquiz.com/src` is a running Aspire app: PostgreSQL, an empty migration runner, a .NET 10 API with `/health`, and a Next.js page that shows `pipquiz-main.png`. No auth and no games yet.

## Write paths

- `pipquiz.com/src/**` only, as the layout in plan.md section 3

## Do not

- Put any file outside `pipquiz.com/`
- Edit or reference `gretas-game-web` or `gretas-game-api`. Those repos are reference only and have nothing directly to do with PipQuiz.
- Add npm packages beyond Next, React, MUI, Emotion, TanStack Query, TypeScript, ESLint, and Vitest
- Add three.js

## Build

1. `global.json` pins SDK `10.0.100` with `rollForward: latestFeature`.
2. Solution projects: `PipQuiz.Api`, `PipQuiz.Migrations`, `PipQuiz.MigrationService`, `PipQuiz.ServiceDefaults`, `PipQuiz.Api.Tests`.
3. Service defaults: a small project with OpenTelemetry and a health check. Write it in `PipQuiz.ServiceDefaults`. Do not copy a project from another repo.
4. API: `AddServiceDefaults`, problem details, Npgsql data source named `pipquiz`, Dapper underscore mapping, `GET /health`. Development-only OpenAPI.
5. Migrations project uses FluentMigrator. No tables yet. The worker runs `MigrateUp` and exits.
6. `apphost.cs`: Postgres 17 container with a volume and pgweb, database `pipquiz`, migrations wait for the database, API waits for migrations, Next app waits for the API, `API_URL` injected. API port 5088. Aspire assigns the web port. Document the port in a one-line comment.
7. Web: `pnpm`, App Router, `output: "standalone"`, `src/app/page.tsx` renders `public/brand/pipquiz-main.png` with alt “PipQuiz”. Copy the file from `pipquiz.com/assets/pipquiz-main.png` and keep that filename. Proxy route stubs `GET/POST/PUT/PATCH/DELETE` and forwards to `API_URL`. Forward the incoming `Cookie` header to the API. On the response, append each value from `getSetCookie()` onto the outgoing headers. Do not assign `upstream.headers` wholesale. Slice 02 is the one that removes `src/app/page.tsx`.
8. README at `pipquiz.com/src/README.md` with the `aspire run` command and the test commands. Nothing else promotional.

## Acceptance

- `aspire run` from `pipquiz.com/src` serves `/` and the API health check.
- `dotnet test` in `api/` passes (a single test that the health endpoint returns 200 is enough).
- `pnpm typecheck` in `web/` passes.

## Stop if

Any new file lands outside `pipquiz.com/`, or a project file references another product.
