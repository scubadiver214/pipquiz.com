# Slice 04 — Child profiles

Wave: after slice 03. One agent.

Read plan.md sections 4 and 5.

## Outcome

A logged-in parent adds up to six children, edits the display name and age band, sets calm mode and sound, selects who is playing, and deletes a profile. The selected child is the `pq_child` cookie.

## Write paths

- `api/**/Children/**`
- children migration
- child tests
- `web/src/features/children/**`
- `web/src/app/(app)/account/page.tsx`
- one `MapChildrenEndpoints()` line in `Program.cs`

## Do not

- Collect birth date, diagnosis, school, photo, or email for the child
- Let a child record exist without `household_id`
- Build games

## Build

1. Table and endpoints from the contract, including `clear_streak`. `household_id` cascades on household delete. Every query includes `household_id` from the session. A child id from another household is 403, including select and delete. `/api/hub` does not exist yet. Do not call it. Selecting a child sets `pq_child`.
2. Age band control is two big choices: Sprout (ages 4–6) and Scout (ages 7–10). Copy on the form: “Pick the band that fits right now. You can change it later.”
3. Account page lists the children, a select button, edit, and delete with a confirm step that names the child. Sound starts off. The control copy is “Sound off” until the parent turns it on.
4. Selecting posts to `/api/children/{id}/select` and shows “Playing as {name}” in the app header. The header logo is `Logo` from slice 02, rendering `pipquiz-main.png`. Do not replace it with text or another image. Slice 02 owns `Shell.tsx`. Add `web/src/features/children/ActiveChild.tsx` and render it from the account page and the app layout. You may edit `web/src/app/(app)/layout.tsx` to mount that component. Keep the session gate and `AccountSecurity` that slice 03 put on the account page. Do not restyle the marketing shell.
5. Tests: parent A cannot select parent B’s child; the seventh child is 400; deleting the active child clears `pq_child`.

## Acceptance

- Two children can be created and switched.
- Cross-household test passes.
- `dotnet test` and `pnpm typecheck` pass.

## Stop if

The active child is stored only in zustand or localStorage. The server cookie is the source of truth.
