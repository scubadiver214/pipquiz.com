You are a senior game developer and product engineer working in my existing PipQuiz educational website repository.

Build a polished, playable game called Pip’s Pattern Lab, inspired by physical pattern-matching block puzzles. Players select, rotate, and arrange patterned blocks to recreate a target picture.

Use original PipQuiz artwork, puzzles, and presentation. The reference is https://theuzzle.com/products/the-uzzle-2 for the general gameplay concept.

1. Inspect the existing project

Before implementing:

Read repository instructions and inspect the application structure.
Identify the existing framework, routing, styling, authentication, child profiles, game catalog, rewards, and persistence conventions.
Reuse existing components and services.
Integrate this as a game within PipQuiz.
Use existing PipQuiz branding and the purple pencil mascot where assets are available.
Briefly explain your implementation plan, then proceed with development.

2. Core gameplay

Show three main areas:

A clearly visible target pattern.
A workspace with outlined placement slots.
A tray containing the available patterned blocks.
The player must arrange the blocks so the resulting picture matches the target.

Each block:

Has a stable identity.
Displays an original geometric pattern.
Can rotate in 90-degree increments.
Can move between the tray and workspace.
Can be returned to the tray.
May be used only once.
For the first release, represent blocks as square tiles viewed from above. Each tile contains a 2×2 matrix of colored symbols. Rotating a tile must rotate both its cell positions and any directional symbols correctly.

Use this explicit 2D interaction model for the MVP. Additional block faces can be a later extension.

Support:

Drag and drop with mouse and touch.
Tap a block, then tap a destination.
Visible clockwise and counterclockwise rotation buttons.
Keyboard selection, placement, rotation, and cancellation.
Undo, reset puzzle, hint, pause, and exit.
Invalid drops return the block to its previous position. Occupied slots must have consistent, documented behavior.

Automatically recognize completion after each valid change. Give friendly feedback and let the player choose when to continue.

3. Puzzle correctness

Separate the puzzle engine from rendering.

Represent:

Tile definitions and patterns.
Tile placements and rotations.
Board geometry and required slots.
Target patterns.
Difficulty and puzzle metadata.
Evaluate the final rendered pattern rather than requiring one specific arrangement of tile IDs. Accept alternative arrangements when they create the correct picture.

Generate puzzles from known valid arrangements:

Select available tiles.
Arrange and rotate them into a valid solution.
Derive the target from that solution.
Move the tiles into the tray.
Verify that the puzzle is solvable and does not begin completed.
Use seeded generation for reproducibility. Reject malformed puzzles and avoid obvious repeat targets during a session.

Do not claim generated puzzles have unique solutions unless a solver verifies that property.

4. Learning progression

Design for children approximately ages 4–12, with difficulty chosen by ability.

Provide four tiers:

Starter: 2–3 tiles, simple patterns, orientation guides.
Explorer: 4 tiles with rotations.
Builder: 5 tiles, varied layouts, fewer guides.
Master: 6–8 tiles with more similar patterns and greater spatial complexity.
Increase challenge through pattern complexity, rotation, and arrangement.

The puzzle itself is the learning activity. Keep the focus on observation, mental rotation, matching, and planning.

Default to untimed play. Offer an optional timed challenge after the core game works.

5. Helpful, calm feedback

Create a short interactive tutorial that teaches:

Selecting a tile.
Placing it.
Rotating it.
Completing a pattern.
Use concise instructions and a replayable demonstration.

Hints should progress from:

Highlighting a useful target region.
Identifying a helpful tile.
Demonstrating one correct placement.
Track hint use without shaming the player or removing earned rewards.

Include:

Large controls and readable labels.
Color plus symbols so puzzles do not depend on color alone.
Reduced-motion support.
Sound toggle.
No flashing effects.
A clean screen with one clear task at a time.
Encouraging retry messages.
6. PipQuiz integration and progress

Add a game catalog entry and route following repository conventions.

Reuse the existing active child profile and rewards system.

Save:

Completed puzzles and unlocked tiers.
Best results by mode.
Tutorial completion.
Accessibility and sound preferences.
In-progress puzzle state.
Earned game badges.
Resume the same puzzle, including tile positions and rotations, after refresh.

Use existing backend persistence where available. If it does not exist, implement a versioned, profile-scoped local persistence adapter and document its limitations.

Prevent duplicate completion rewards after refresh, retry, or repeated completion events. Keep guest progress separate from signed-in profiles.

Suggested original badges:

First Pattern
Rotation Rookie
Pattern Explorer
Puzzle Builder
Pattern Master
7. Visual direction

Make the game feel like a tactile toy table:

Rounded tiles with subtle depth.
Crisp, readable geometric patterns.
Purple PipQuiz accents and bright supporting colors.
Gentle snapping and rotation animations.
A brief celebration on completion.
Supportive mascot reactions where assets exist.
Keep the target visible while playing on mobile. Ensure tiles remain large enough to manipulate comfortably.

Use SVG or the existing rendering approach for precise patterns. Prefer a lightweight implementation that fits the repository.

8. Build in working slices

Implement sequentially:

Slice 1 — First playable
One original puzzle with selection, placement, rotation, reset, and correct completion detection.

Slice 2 — Puzzle engine
Data-driven tiles, seeded solvable generation, four difficulty tiers, and meaningful engine tests.

Slice 3 — Child-friendly experience
Tutorial, progressive hints, touch and keyboard controls, responsive layout, and accessibility settings.

Slice 4 — PipQuiz integration
Catalog entry, profile progress, saved puzzle resume, badges, and duplicate-reward prevention.

Slice 5 — Polish and validation
Animations, sound controls, edge cases, and browser verification.

Finish each slice with a usable result before starting the next. Continue through all slices unless a genuine blocker requires information.

9. Acceptance criteria

Verify that:

Four quarter-turn rotations restore the original tile.
Directional patterns rotate correctly.
Tiles cannot be duplicated or placed outside valid slots.
Undo restores the complete previous board state.
Visually equivalent solutions are accepted.
Generated puzzles are solvable.
Hints preserve solvability.
Refresh restores the active puzzle.
Completion rewards are granted once.
Child profiles retain separate progress.
The core flow works with mouse, touch, and keyboard.
Reduced-motion and sound settings work.
Existing repository checks pass.
Deliver the working implementation, a concise explanation of the main changes, verification results, and any remaining limitations.

Start by inspecting the repository, then build the first playable slice.
