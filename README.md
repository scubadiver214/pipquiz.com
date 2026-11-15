# PipQuiz

PipQuiz is a browser site where children ages 4 to 10 practice attention, memory, and the habits of learning in short sessions that feel like play. A parent holds the account. The child meets one clear task at a time, can pause, and keeps a private record of effort.

The goal is a better ten minutes: practice encouraging enough that a child comes back tomorrow.

PipQuiz is an educational activity. It does not diagnose ADHD or any other condition, and it is not a medical treatment. Families do not enter a diagnosis to use it. Gains inside an activity are not claimed to transfer to the classroom until that has been studied.

## Status

The product is designed and not yet built. Plans, prompts, brand art, and the visual reference live in this directory. Application code will live in `src/` when the first slice is built. There is no install or run step yet.

## Mission

PipQuiz helps children practice noticing, remembering, holding back, and trying again, inside activities that stop while the child still wants another turn. A parent can see what was practiced. Stars stay inside the household.

Success for the first version is modest. A child finishes a short session and wants to do another tomorrow. PipQuiz does not replace teaching, intervention, or a clinician.

The first product is for families. The family owns the account. There is no teacher login and no school-held student records. A paid membership can come later. The first households are free.

A one-page note for a school leader is in [ai/briefs/elementary-principal.md](ai/briefs/elementary-principal.md).

## Who it is for

Families with children from about age 4 through 10. A parent picks the band. The activities stay the same. The load changes.

| Band | Ages | Load |
| --- | --- | --- |
| Sprout | 4–6 | One short sentence, at most 3 choices, numbers to 10, sequences of length 3 |
| Scout | 7–10 | Numbers to 20, sequences of length 5, at most 4 choices |

The design suits children who do better when a task is short, the instruction is plain, and the session has a visible end. That includes many children with attention difficulties, and children who simply need a calmer way to practice.

## What a session is

A parent signs in, picks a child, and the child plays for about ten minutes. The hub offers two activities for the day. Stars record the best effort on a finished level. A hard moment coaches the next try, and stars stay where they are.

Avatar Studio opens at 24 best stars, after a cleared level in math, memory, and kindness. Hats and other parts unlock along the way. The scoreboard lists only the children in that household.

Every play screen has a Break button and a Speak button. A parent can turn on calm mode: less motion, no confetti. Sound stays off until a parent turns it on.

## Activities

| Skill | What the child does |
| --- | --- |
| Focus | Find the picture that changed, or the one that matches the target |
| Memory | Watch a short sequence of colors or shapes, then repeat it |
| Logic | Complete a pattern, then walk a small maze |
| Math | Count, add, and subtract with picture choices |
| Kindness | Choose a respectful response at a dinner table. More than one polite answer can be right |
| Story | Follow one short branching picture story. Choices only |
| Pencil control | Trace a thick path on the screen |
| Both hands | Repeat a left and right pattern on two large buttons |
| Shapes and color | Match a shadow, sort a color, or count shapes |
| Stop and go | Tap when the instruction says tap, and wait when it says wait |

## Tech stack

These are the targets for PipQuiz’s own projects. Nothing in this list is installed yet. Starting patch versions are recorded in [ai/specs/decisions.md](ai/specs/decisions.md).

| Layer | Choice |
| --- | --- |
| Web | Next.js 16, React 19, TypeScript, `output: "standalone"` |
| UI | MUI 9, Recoleta for headings, GT Walsheim for text, Kidza icons |
| Data fetching | TanStack Query |
| Package manager | pnpm |
| Web tests | Vitest, then Playwright for the demo path |
| API | .NET 10 Minimal API |
| Data access | Dapper and FluentMigrator |
| Auth | Parent email and password. Cookie session. `PasswordHasher` from Identity.Core |
| Database | PostgreSQL 17, database name `pipquiz` |
| Local host | .NET Aspire 13 (`src/apphost.cs`) |
| API tests | xUnit and Testcontainers |

The API grades every answer, writes stars, and decides unlocks. The browser renders the prompt the API returns. Answer keys stay on the server.

A child is a profile on the parent’s household: a display name and an age band. There is no child password and no public child profile. The product has no chat and no advertising.

## Repository

PipQuiz is its own product in this directory. Plans, code, and data stay here.

```text
pipquiz.com/
  README.md          this file
  assets/            brand art; pipquiz-main.png is the site logo, pipquiz-pq.png is the favicon
  assets/kidza/      purchased Kidza theme, the design template
  ai/briefs/         notes for people outside the build
  ai/specs/          architecture, phases, decisions, and slice prompts
  ai/prompts/        earlier briefs and later game ideas
  src/               application code, not created yet
    apphost.cs       Aspire host: Postgres, migrations, API, web
    api/             .NET solution
    web/             Next.js app
```

The logo on every page is `assets/pipquiz-main.png`. The design template is `assets/kidza`, the purchased Kidza theme. Layout, color, type, icons, animation, and decorative graphics are modeled on that folder. The site is React, not the theme’s PHP. Demo photographs of people stay in the theme folder.

When `src/` exists, the checks are:

```sh
cd src/api && dotnet test
cd src/web && pnpm typecheck && pnpm lint && pnpm test
```

## Privacy

Progress stays in the household. Two children in one family each keep their own stars. The product stores a parent email, a password hash, a display name, and each child’s display name and age band. It does not store a birth date, a diagnosis, a photo, or a school.

## Read next

1. [Mission note for a school leader](ai/briefs/elementary-principal.md)
2. [Spec index](ai/specs/README.md)
3. [Architecture and API contract](ai/specs/plan.md)
4. [Decisions](ai/specs/decisions.md)
5. [Build phases](ai/specs/phases.md)
