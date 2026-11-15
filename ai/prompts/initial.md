Note, 2026-11-15: The working plan is [../specs/plan.md](../specs/plan.md). Kidza is at `pipquiz.com/assets/kidza`. PipQuiz stays in this directory. `gretas-game-web` and `gretas-game-api` are reference only.

Background -

PipQuiz.com — Educational Game MVP Build Kit

The vision: A responsive educational gaming platform where children learn math, memory, attention, social skills, and good manners through illustrated adventures, unlockable characters, and progressive challenges.

The build kit will use your PipQuiz logo and visual references, with your existing gretas-game-api and gretas-game-web projects as the architectural foundation.

For the MVP, I've chosen these connected experiences:
- Pirate Math Island: Math puzzles, treasure hunting, and level progression.
- Unicorn Memory Garden: Pattern recognition, sequencing, and attention challenges.
- Kindness Kingdom: Interactive dinner-table manners, polite conversation, and social decision-making.
- Story Adventures: Short, branching educational stories where children make decisions and earn rewards.
Children will have individual profiles, persistent scores, a private leaderboard, collectible avatars, and a special Avatar Creator Studio they can unlock through progress.
- Fun Kids Stories & Cartoons: Follows characters like Nimora (a tiny fairy) and friends on whimsical adventures. [[1](https://www.youtube.com/watch?v=9vfPu2dgSJk), [2](https://www.facebook.com/NimoraKidsStories/), [3](https://www.instagram.com/p/DeNCxvwkSDa/)]
- Early Learning & Education: Teaches young children math, weather, kindness, sharing, and basic to advanced English vocabulary through engaging stories. [[1](https://www.facebook.com/NimoraKidsStories/), [2](https://www.youtube.com/watch?v=9vfPu2dgSJk)]
- Personalized Children’s Books: Allows parents to create custom, AI-powered illustrated stories where their own child becomes the hero of the book with personalized characters and themes.
- A section for kids to do math problems as puzzles in a game format where the goal is for kids to have fun while in the learning process.
- A section for kids to learn manners; at a dinner table, please and thank you's, yes ma'am and no sir decorum. 

For ADHD-friendly design, the kit emphasizes short activities, clear instructions, optional breaks, adjustable sensory stimulation, and encouraging feedback. These align with CDC educational support guidance. PipQuiz should initially be presented as an educational experience, not a clinically validated ADHD treatment. 

Task -

Investigate and build pipquiz.com based on https://nimorakid.com/en-us - nimorakid is a site with games that are not directly available online but instead you have to buy the games for home use - your job is to build the equivalent of the games on this site into pipquiz.com.

This educational site will need a basic login, scoreboards, account details. This educational game site should be fully responsive.

Create a detailed planning prompt, slices of work that can be done in parallel by different models and sub agents.

pipquiz.com - i have attached a logo for the site that will be used throughout as the site. The basis for this online gaming / educational site targets children with ADHD - the goal is for this site is to build stronger attention skills in kids and for them to have fun in the process. A progressive learning approach where kids can advance levels, collect avatars and a grand prize for them to create their own avatars. 

For pipquiz.com use /Users/mattmozer/Dev/scubadiver214/Game Dev/pipquiz.com/comps/kidza as the design. this site is written in php but the design, assets, css can all be extrapolated to build pipquiz.com based on this. I can provide screenshots but this is a template i purchased online that i would like to use.

the main image for popquiz is this: /Users/mattmozer/Dev/scubadiver214/Game Dev/pipquiz.com/assets/pipquiz-main.png this image will be used throughout and even an animated version could be used when users complete levels, score correct answers and show up when users keep getting incorrect answers. You will need to create different sizes, shapes of this image and create animations of it.

This site will ultimately be a paid membership but that can happen in later stages and the iteration process evolves. The plan is to grow this into a small business and to genuinely help children with attention deficit problems to improve their memory, attention skills and to be more proficient in the learning process. 

I have included a site called "kidza" for the basis of the design - it is written in PHP but i want to use the tech stack already established in gretas-game-api and gretas-game-web using react / nextjs, aspire, .net and postgres.

the source code for pipquiz.com will live here: /Users/mattmozer/Dev/scubadiver214/Game Dev/pipquiz.com/src

Please be as detailed as possible when writing out instructions for building a feature write educational application for this MVP.
