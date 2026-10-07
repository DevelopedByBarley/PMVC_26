# Coding Standards

> Conventions for this project: a custom PHP 8.4 MVC (core in `core/`) built on
> Illuminate components, served by XAMPP Apache with MySQL. Keep new code in the
> shape of the existing code.

## PHP

- `declare(strict_types=1);` at the top of every PHP file
- Type every parameter, return value, and property where PHP allows it
- PSR-4 namespaces from `composer.json`: `App\` -> `app/`, `Core\` -> `core/`,
  `Database\` -> `database/`. Run `composer dump-autoload` after adding a namespace root
- Global helpers live in `core/functions.php` (`config()`, `env()`, `db()`,
  `router()`, `validator()`, `old()`, `errors()`, `csrf()`, `abort()`, `e()`).
  Reuse them before adding new ones; wrap new helpers in `function_exists`
- No framework scaffolder and no full Laravel: add an `illuminate/*` or other
  Composer package only when a current requirement needs it

## Request flow

- Front controller: root `.htaccess` -> `public/index.php` -> `bootstrap/app.php`
  (dotenv, database, logger, validator) -> `routes/web.php`
- Routes: `routes/web.php` for public routes, one file per area under `routes/`
  (for example `routes/admin/*.php`), each pulled in with `require`
- Name every route (`->name('area.action')`); protect admin routes with
  `->middleware('admin')`. Middleware lives in `app/Http/Middlewares/`
- Controllers extend `App\Http\Controllers\Controller` and return a Symfony
  `Response` via `$this->view()`, `$this->redirect()`, or `$this->json()`
- Keep controllers thin; put multi-step business logic in `app/Services/`

## Views and UI

- Views are plain PHP templates: `resources/views/pages/<area>/<name>.view.php`,
  shared parts in `resources/views/components/`, layouts in `resources/views/layouts/`
- `$this->view('pages.home', [...])` resolves dot paths to those files and wraps
  them in `layouts.layout-view` unless another layout (or `null`) is passed
- Escape every dynamic value with `e()`; never echo raw user input
- Styling: Bootstrap 5 from CDN, plus Tailwind CDN with the `tw-` prefix and
  preflight disabled. Page CSS and JS go in `resources/css/` and `resources/js/`
  and are passed to the layout as `styles` / `scripts`
- No build step and no bundler. Any new external script or style must also be
  allowed by the Content-Security-Policy in `public/index.php`

## Languages

- Bilingual Hungarian and English. Text lives in `resources/lang/{hu,en}/<file>.php`
  and is read with `Core\Language::load('<file>')`; `Core\Language::current()`
  gives the active language, switched through `/lang/{lang}`
- Add every user-facing string to both languages in the same change
- Validation messages come from `resources/lang/{hu,en}/validation.php`

## Database

- Illuminate Database (Capsule) through `db()`; models extend `App\Models\Model`
  (Eloquent, `$guarded = []`), so whitelist input fields in the controller or
  service before saving
- Schema changes only through new timestamped files in `database/migrations/`
  (`YYYY_MM_DD_HHMMSS_<action>.php`, anonymous class implementing
  `Database\Migration` with `up()` and `down()`). Never edit a migration that
  has already run; add a new one
- Seeders go in `database/seeders/` and are registered in `database/DatabaseSeeder.php`
- See `docs/DATABASE.md` for the full workflow

## Validation, security, and errors

- Validate request input with `validator()` (Illuminate Validation) and throw
  `Core\ValidationException` so the form shows `errors()` and `old()` values
- Every state-changing form posts `csrf()`; the base controller checks it for
  POST/PUT/PATCH/DELETE. Use a named token (`$csrfTokenId`) when a form uses one
- Rate-limit public write endpoints with `Core\RateLimiter`
- Report outcomes to the user through `$this->toast()` or `$this->alert()`
  (flashed via `Core\Session`); log unexpected failures with `Core\Log`
- Use `abort(403|404)` for access and missing-resource errors
- Secrets only in `.env`, never committed; document new keys in `.env.example`
  and read them through `config/*.php`

## Naming

- Classes: PascalCase, one class per file, file named after the class
- Methods and variables: camelCase
- Constants: SCREAMING_SNAKE_CASE
- Views and assets: kebab-case (`admin-navbar.view.php`, `admin.css`)
- Database tables and columns: snake_case, plural table names

## Language of code and docs

- Identifiers in English. Code comments and project docs (`docs/`) are written in
  Hungarian, matching the existing code

## Testing

The blueprint installs no test runner; testing is opt-in at the project level,
because the overlay can't know your stack. Adding unit testing is an explicit
setup task the AI can do through the normal workflow, either as a build-plan item
or with `/tests`. The setup should choose the stack-native runner, wire the
scripts or commands, add a small example test, and update the Commands section
of `AGENTS.md`.

When `AGENTS.md` declares a `Verify` command, treat it as the umbrella automated
gate. It combines only the checks this project actually has, in this order when
available: typecheck, tests, then build. The command does not enable an absent
test runner or replace focused evidence. It gives local work and optional CI one
exact command to run. `/ci` owns Verify and CI setup. `/tests` adds the real test
command to Verify when it already exists, but never creates CI only because
testing was configured.

**The opt-in switch is one signal: a `test` command in the Commands section of
`AGENTS.md`.** Declare one and **tests become a gate for logic-bearing steps**,
not an optional extra; leave it out and the loop verifies logic with the evidence
it already uses (run it, a screenshot, the build). Adding the runner is itself a
deliberate step, never a silent mid-step install. This is the single definition
of the switch; the skills and `ai-interaction.md` only point back here.

- **What to test (the scope rule):** pure logic where a wrong answer is possible -
  parsers, formatters, validators, id/slug builders, services. These have
  assertable inputs and outputs and real edge cases (empty, missing, malformed).
- **What not to test:** UI components and integration-level surfaces (render or
  export routes, anything driving a real browser or external service). Verify those
  with a screenshot and the build, not brittle unit tests.
- **The gate (when a runner is configured):** a build step that adds in-scope logic
  must ship a passing test in the same reviewable diff. The project's test command
  must be green before the step is approved, before any checkpoint commit, and
  before `/complete` merges. UI and integration-only steps are exempt and ride on
  screenshot plus build evidence.
- **When it's named:** the `/feature` spec's Testing section predicts the coverage,
  `/implement` writes the test with the step, and if a step surfaces logic the spec
  didn't foresee, add a focused test then.
- An empty suite should fail, not pass, so "no tests ran" never looks like "passed".
- Test file location follows the runner chosen by `/tests` (for PHPUnit, a `tests/` folder).
- Run them via the project's test command (see Commands in `AGENTS.md`), not a
  hardcoded tool name.

Stack binding: no test runner is configured yet. For this PHP project, `/tests`
would normally add PHPUnit through Composer.

## Browser Verification

For UI and integration behavior, prefer real browser evidence over reading the
code and assuming it works.

- Browser automation is separately opt-in through `/tests browser`. That setup
  reuses a compatible runner or prefers Playwright for supported projects, then
  documents the exact command as `Browser tests` in `AGENTS.md`.
- When `Browser tests` is declared, add focused coverage for stable behavioral
  done-whens when it is proportionate, and run the documented command during
  `/check`. Do not assume it proves visual fidelity, real authenticated-profile
  behavior, browser chrome, or another claim the test does not observe.
- If no Browser tests command is declared, do not add a runner silently in the
  middle of an unrelated feature. Use the available dev server, browser
  screenshots, build output, API output, or manual evidence instead.
- Browser tests are not part of the default Verify command or CI unless the user
  separately chooses that slower gate.
- Browser evidence is especially important for flows that click, type, submit,
  navigate, download files, render complex layouts, or depend on client-side
  state.

## Code Quality

- No commented-out code unless specified
- No unused imports or variables
- Keep functions under 50 lines when possible

## Comments

Write code that explains itself; comment only what the code cannot say.
Over-commenting is a common AI tell, so resist it.

- Comment the **why**, not the **what**. Delete any comment that restates the code.
- No banner/header blocks, section dividers, or step-by-step narration of obvious
  code. A file does not need a comment announcing each region.
- A comment earns its place only when it captures something the code can't: a
  non-obvious decision, a gotcha or workaround, why a value is what it is, or a
  link to a spec or issue.
- Prefer self-documenting names and small functions over explanatory comments.
- Keep doc comments minimal: a one-line purpose on an exported type or function is
  plenty; don't write JSDoc that just repeats the signature.
- When in doubt, leave the comment out.

## Writing

- No em dashes (U+2014) in generated content: docs, comments, commit messages,
  READMEs, specs. They read as AI-generated.
- Use a hyphen for `term - description` separators; rephrase prose with commas,
  parentheses, or a colon. Avoid en dashes and the ellipsis character too.
