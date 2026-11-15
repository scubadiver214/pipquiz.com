# Slice 03 — Parent auth

Wave: with slice 02, after slice 01. One agent. Highest care: this is the trust boundary.

Read plan.md sections 4, 5, and 9.

## Outcome

A parent can register, log in, log out, change the password, reload, and delete the account. The session is an HttpOnly cookie that survives the Next.js proxy.

## Write paths

- `pipquiz.com/src/api/src/PipQuiz.Api/Auth/**`
- `pipquiz.com/src/api/src/PipQuiz.Migrations/*Households*`
- `pipquiz.com/src/api/tests/**` auth tests
- `pipquiz.com/src/web/src/features/auth/**`
- `pipquiz.com/src/web/src/app/(auth)/**`
- `pipquiz.com/src/web/src/app/(app)/layout.tsx` so a parent session is required
- `pipquiz.com/src/web/src/app/(app)/account/page.tsx` as the security stub only
- `pipquiz.com/src/web/src/app/api/[...path]/route.ts` only if slice 01’s cookie forwarding is incomplete
- One `MapAuthEndpoints()` line in `Program.cs`

## Do not

- Add child tables (slice 04)
- Add EF or the full Identity stack
- Store the password anywhere except the hash
- Put the session token in localStorage

## Build

1. Migration for `households` as in plan.md section 4, including `show_family_stars` defaulting to true. `plan` check allows only `free`. Slice 15 is the one that edits that flag.
2. `PasswordHasher<Household>` from `Microsoft.Extensions.Identity.Core`.
3. Cookie `pq_session` issued by the API. 14-day sliding expiration. Secure when `ASPNETCORE_ENVIRONMENT` is Production.
4. Endpoints in the contract table. `parentConfirmed` must be true or the register call is 400.
5. Register and login forms sit in `Shell` from slice 02, so the header logo is `pipquiz-main.png`. Fields: email, password, display name on register, checkbox “I am the parent or guardian”. Errors from problem details shown as text, not only color. After success, go to `/account`. The account page shows the display name from `GET /api/auth/me`, a Log out button, the password form, and delete. Put those controls in `features/auth/AccountSecurity.tsx` and render that component from the account page. Slice 04 will add children to this page and must keep `AccountSecurity`. The signed-in layout uses `Shell`.
6. Delete account asks for the password again. Password change is `POST /api/account/password` with the current password and the new one. A wrong current password is 401 and leaves the hash unchanged.
7. Rate limit auth POSTs to 10 per minute per IP. Trust the forwarded caller IP only from loopback, so the Next proxy is not one shared bucket and a spoofed header from the public internet is ignored.
8. Tests with Testcontainers:
   - register then `GET /api/auth/me` with the cookie
   - wrong password is 401 and does not set a cookie
   - duplicate email is 409
   - delete removes the row
   - password change with the right current password updates the hash; a wrong current password is 401 and keeps the old hash
9. Browser check through the Next origin: register, refresh, `/api/auth/me` is still 200. This proves `Set-Cookie` survived the proxy. Use the running dev servers or a Playwright one-off; record which.

## Acceptance

- The four auth calls match the contract.
- The browser refresh check passed.
- `dotnet test` and `pnpm typecheck` pass.

## Stop if

The cookie is readable from `document.cookie`, or the proxy test fails and the fix would be to call the API on another origin from the browser.
