# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

Personal portfolio site of Ines Heilmann: plain PHP (no framework, no templating engine), hand-written CSS and vanilla JS. There is no build step, no test suite and no linter config — files in `public/` are served as-is.

## Commands

```bash
php composer.phar install     # install PHPMailer into vendor/ (composer.phar is committed)
php composer.phar start       # dev server: php -S 127.0.0.1:8000 -t public
php -l <file.php>             # syntax check; the only automated check available
```

Production runs on Apache (netcup); `public/.htaccess` rewrites every non-file request to `public/index.php`. The PHP built-in server does the same fallback locally.

## Architecture

**Request flow:** `public/index.php` is the router — a `switch` on `$_SERVER['REQUEST_URI']` that `require`s a page from `src/views/pages/<name>/<name>.php`. Only the path is matched; the query string is stripped, so `/?utm_source=…` still reaches the home page. New routes need a `case` there.

**Page pattern:** every page sets `$pageTitle`, `$pageStyles` and `$pageScripts` (arrays of paths under `public/`), requires `src/config.php`, then includes `src/views/layout/head.php`, which merges those arrays with the site-wide defaults (normalize, `style.css`, header/footer/cookie-consent CSS; navigation and consent JS) and emits the `<head>`. Pages then `include` components from `src/views/components/<name>/<name>.php`. A component's CSS lives separately in `public/css/components/<name>.css` and must be added to `$pageStyles` by each page that uses it; page-only CSS goes in `public/css/pages/`. `src/views/global-styles.php` is unused legacy — don't extend it.

**`src/config.php`:** loads the gitignored `src/config.local.php` (which `putenv()`s `SMTP_PASSWORD`), starts the session, and sets `$baseURL`, which views prefix onto asset and link URLs.

**Projects:** all project content is in `src/data/projects.json`, keyed by slug (the key must equal the `slug` field — routing checks the key, cards link by `slug`). `visibility` is the string `"1"` to show a project; order in the file is the order on the home page and in the prev/next pager. `description` is echoed unescaped as HTML; the other fields are escaped. Assets go in `public/assets/projects/<slug>/`; `media` entries (images or `.mp4`) feed the slideshow on `/project/<slug>`.

**Contact form:** `home.php` includes `components/contact/mail.php` *before any HTML output* so it can handle the POST and redirect (POST-redirect-GET, 303 to `#contact`, result passed via `$_SESSION['confirm']`). Spam protection is a CSRF token, three honeypot fields, a minimum fill time and a per-session rate limit. Submitting the form locally sends real mail through the netcup SMTP server.

**Styling:** design tokens (OKLCH colours, radii, spacing, `--max-width`) are CSS custom properties on `:root` in `public/style.css` — use them instead of new literal values. Dark theme only. Fonts are self-hosted in `public/assets/fonts/`: Kanit for headings, Karla for body text. Main breakpoint is `max-width: 767px` / `min-width: 768px`. `body` has `overflow-x: hidden`, so content that is too wide is silently cut off instead of producing a scrollbar. Scroll-reveal animations (`.reveal`, `.reveal-left`, `.reveal-right`) are disabled under `prefers-reduced-motion`.

## Constraints

- **Privacy (DSGVO/TDDDG):** no requests to third-party hosts on page load — no font CDNs, embeds or external scripts. Google Analytics (`public/js/components/c-consent.js`) loads only after consent. Any change to cookies, external services or tracking must be mirrored in `src/views/pages/datenschutz/datenschutz.php`, which lists every cookie and processor.
- **Accessibility:** text contrast must meet WCAG AA; keep minimum label/text sizes, visible focus and keyboard handling (e.g. Escape in the cookie banner).
- **Language and tone:** all site content is German (`lang="de"`). Visitors are addressed formally with "Sie"; the legal pages (Impressum, Datenschutz) are written in first person singular. Long German compound words must not break layouts on narrow viewports — check at 360px width.
- **Secrets:** never read, print or edit `src/config.local.php`; it contains the SMTP password. A local PreToolUse hook (`.claude/hooks/protect-secrets.php`) blocks tool calls that name the file, but a recursive `grep` in the shell would still print it — search with the Grep tool, which skips gitignored files.

## Workflow

- Work on `staging`; `main` is updated via pull requests.
- Commit messages are Conventional Commits in English, lowercase and imperative, without scope: `fix: keep long German headings inside narrow viewports`. Types in use: `feat`, `fix`, `chore`.
- For visual changes, verify in the browser via the Playwright MCP server (configured in the gitignored `.mcp.json`; output goes to `.playwright-mcp/`).
