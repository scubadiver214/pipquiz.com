# Slice 05 — Play contract

Wave: after slice 04. One agent. This slice freezes the session API. Activity agents will depend on it.

Read plan.md sections 4, 5, and 7.

## Outcome

A sample activity can be started, answered, hinted, and completed. Leaving and coming back returns the same item. Stars are 3, 2, or 1 as in plan.md, and only the best is kept. Ignore any older sentence that sets Avatar Studio at 30 stars. This slice does not open the studio. The sample answer key never appears in a GET body or in the web bundle.

## Write paths

- `api/**/Play/**`
- `api/**/Content/_sample/**`
- session and attempt and progress migration
- `web/src/features/play/**`
- `web/src/app/play/layout.tsx`
- `web/src/app/play/sample/page.tsx`
- one `MapPlayEndpoints()` line in `Program.cs`

## Do not

- Build the real ten activities
- Let the client post a star count
- Change the JSON shape in plan.md

## Build

1. Content loader reads every `*.json` under `Content/`, parses `answer` into a server dictionary, and exposes `config`, `prompt`, `hint`, `renderer`, and ids to the client. Startup throws if an id repeats or `answer` is missing.
2. `Scoring.cs` is a pure function: inputs are item count, misses, hints, completed; output is 1, 2, or 3. Unit tests cover the three bands and a replay that keeps the max. `IItemScorer` scores one item and returns `{ correct, nextNodeId? }`. The session service is the only writer of session rows. It takes a `TimeProvider` and sets `item_shown_at` from that clock. Do not call `DateTime.UtcNow` in the session service. Slice 05 implements `ChooseOneScorer`. Register every `IItemScorer` by scanning the assembly, so later slices can drop in `GridFindScorer.cs`, `SequenceScorer.cs`, `GridPathScorer.cs`, `PathTraceScorer.cs`, `DualTapScorer.cs`, `MannersScorer.cs`, `StoryScorer.cs`, and `StopGoScorer.cs` without editing `Program.cs`.
3. Sessions include nullable `node_id` and `item_shown_at`. A correct linear attempt advances `item_index`. A miss stays on that item. When the scorer returns `nextNodeId`, write it and do not invent a second graph walker. No later slice adds those columns. Do not create `daily_plans` or `unlocks` here.
4. Session rules from plan.md: child comes from `pq_child`; level 1 is open; level N requires `best_stars >= 1` on level N-1; one active session per child, activity, and level; `POST /sessions` resumes that session, slides `expires_at` by four hours, and returns the same item with `resumed: true`; an attempt on a session past `expires_at` is 410 until that post renews it; a finished level starts a new session at the first item; `client_seq` idempotency matches the contract. The last correct attempt writes stars and calls every `IRewardGranter` in that transaction. `POST .../complete` returns 200 when the level is already cleared and 409 when it is not. A hint shares the attempt seq space, counts once, and does not reveal the key. Slice 05 ships the granter interface and the call. It does not grant badges. Slice 16 adds classes under `Play/Rewards/` and does not edit this call.
5. Sample content: activity id `sample`, renderer `choose-one`, one sprout file, one level, three items. Prompt example: “How many pencils?” with picture labels as text, not as external images. `GET /api/play/activities/sample` returns the title and level list only.
6. `usePlaySession(activityId)` posts the session, posts attempts, shows coaching, shows Break (local pause, no request), offers a hint button, and shows Speak. Speak calls `speechSynthesis` with the current prompt text only after the press. It does not speak on load. The chrome has an empty `side` slot for the later mascot. `web/src/app/play/layout.tsx` requires the parent session and renders `Shell`. The sample page uses the hook.
7. Ignore unknown JSON fields on the attempt body so a client cannot sneak `correct` or `stars`.
8. Tests: scoring table; answer key absent from the activity GET; other household’s session id is 403; hint increments the hint count once and a repeated seq does not increment it again; the next perfect run cannot be 3 stars after a hint; a second `POST /sessions` for the same unfinished level returns the same session id and the same item.

## Acceptance

- Sample level can be finished in the browser while logged in with a selected child.
- Refresh mid-level shows the same item, not the first item.
- `dotnet test` covers scoring, resume, and the 403 case.
- A search of `web/` finds no `answer` keys from the sample file.

## Stop if

You are tempted to put content JSON in the web project “for convenience”. Keys stay in the API.
