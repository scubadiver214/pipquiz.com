# Slice 16 — Avatar Studio

Wave: after slice 15. The empty `unlocks` table already exists. Do not edit scoreboard files.

## Outcome

A child can save a starter face and color immediately, wear a cosmetic when its star line is crossed, and open the rest of the studio only when the rule in plan.md section 2 is met: 24 best stars, plus one cleared level in each of math, memory, and kindness.

## Write paths

- `api/**/Avatar/**`
- `api/**/Play/Rewards/**`
- no new migration if slice 15 already created `unlocks`
- `web/src/features/avatar/**`
- `web/src/app/(app)/avatar/**`
- one `MapAvatarEndpoints()` line in `Program.cs`

## Do not

- Upload photos
- Call an image model
- Store free-text appearance descriptions
- Use the island or unicorn PNG
- Change 24, the three tracks, or the cosmetic lines without a decision entry
- Edit the `IRewardGranter` scan in slice 05. Add a class under `Play/Rewards/` and let the scan find it.

## Build

1. Catalog in the API. Always allowed: face `smile`; hat, cape, sticker, glasses, and template `none`; colors `#F15F25`, `#6754E9`, `#3DB7FF`, `#FFD23F`. Check contrast and set the label color per swatch to `#16161F` or white.
2. Cosmetics, original SVG, from plan.md: `hat-captain` at 3, `cape-blue` at 9, `sticker-star` at 15, `glasses-star` at 21. `template-pencil` at 30 and only when the studio is open. Studio-only faces and hats: `wink`, `freckles`, `bow`, `crown`.
3. The granter runs inside the slice 05 transaction. On a level clear it updates `best` progress’s related `unlocks` rows and `children.clear_streak`. On session start, if the previous session for that child is unfinished, it sets `clear_streak` to 0. Grants are unique on (`child_id`, `kind`, `code`). Badges are the six codes in plan.md. A second grant does not insert a second row.
4. `PUT /api/avatar` writes `children.avatar` jsonb `{ face, hat, color, cape, sticker, glasses, template }`. A starter save works at 0 stars. An unearned cosmetic is 403. A studio-only part is 403 with title “Keep playing to open the studio” until the rule is met. Direct navigation to `/avatar` still loads; locked parts are visible and disabled.
5. The studio draws a new pencil kid in SVG, using the pencil colors from `pipquiz-main.png`, plus the chosen parts. It is not a crop of the logo. The header still shows `pipquiz-main.png`.
6. The hub shows the avatar when set, the badges, and “N stars to go” plus the missing track names while the studio is closed.
7. Tests: 23 stars with all three tracks rejects `wink`; 24 stars with no kindness level rejects `wink`; 24 stars and all three tracks saves `wink`; 3 stars saves `hat-captain` and 2 stars rejects it; granting `first-math` twice leaves one row; another household’s child id is 403.

## Acceptance

A child who has opened the studio can leave, come back, and see the same avatar on the hub. A child with 3 stars can wear the captain’s hat before the studio opens.

## Stop if

The implementation wants the island or unicorn PNG as a hat or a sticker. Parts are the SVG presets above.
