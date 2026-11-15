# Slice 12 — Story Dock

Wave: after slice 05, beside other activities.

## Outcome

`/play/story` plays one original branching story, “Pip and the Extra Cookie.” Both bands share the graph. Sprout uses `config.textSprout`. Scout uses `config.textScout`. 8 nodes. Choices only.

## Write paths

- `Content/story/**`
- `Play/Scoring/StoryScorer.cs`
- `web/src/features/story/**`
- `web/src/app/play/story/page.tsx`

## Mechanic

Renderer `story`. Add `Play/Scoring/StoryScorer.cs` only. `sessions.node_id` already exists. Each node is an item. `answer.accepted` lists the kind or curious choice ids. `config.next` maps choice id → item id. On a correct choice the scorer returns `nextNodeId`. The session service from slice 05 writes it. A miss returns no `nextNodeId`.

Story beats: Pip baked two cookies; a friend has none; the child chooses to share or to keep both; they count the cookies (one math beat: 2 cookies, give 1, how many are left); they say thank you at the table; the end shows two stars and returns to the hub. Side branch: keeping both leads to a gentle beat where the friend looks sad, then offers the choice again. That second chance is not a second miss if the first choice was selfish — count it as one miss, then a success.

No free-text box. No mention of Nimora, fairies named Nimora, or videos.

Art: CSS cards and `pipquiz-main.png`. The pencil face from slice 17 may be absent; use the site logo if `Mascot` is not merged yet.

## Tests

API: the share choice moves to the counting node; the selfish choice stays on the node or moves to the sad beat as authored; the count `1` is the only accepted math choice.

## Acceptance

A reader can finish the story as Sprout and as Scout and land on a final node that completes the session with stars.

## Stop if

The script needs a paragraph copied from another site. Write a short original script, under 40 words per node.
