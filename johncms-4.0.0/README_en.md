# JohnCMS

**Mobile-first content management system** for building community sites optimized for mobile browsers. Output is XHTML Mobile Profile–compliant with small page size.

- **Project:** [johncms.com](http://johncms.com) · **Support:** [gazenwagen.com](http://gazenwagen.com)
- **Version:** 4.0.1

---

## Features

- **Multilingual** — Install/remove interface languages
- **Security** — Access control, IP/user ban, flood protection
- **Forum** — Topics (pinned/closed), polls, file attachments, BBcode
- **Library** — Unlimited nested sections, user submissions, moderation, Java book compilation
- **Download center** — Nested categories, counters, ratings, comments
- **Gallery** — Site-wide and per-user photo albums
- **User profiles** — Extended profile, personal guestbook (wall), private messages with attachments
- **Karma system** — Reputation and voting
- **Admin panel** — User management, modules, security, SEO, ads
- **Themes** — Swappable skins
- **RSS, sitemap** — For news and SEO

---

## Requirements

| Component | Version |
|-----------|---------|
| PHP      | 5.1+ (5.6 recommended; uses legacy `mysql_*` extension) |
| MySQL    | 4.1+    |
| Server   | `.htaccess` support (e.g. Apache with `mod_rewrite`) |

> **Note:** PHP 7+ removed the `mysql_*` extension. Use PHP 5.6 for this release or migrate the codebase to MySQLi/PDO.

---

## Quick start with Docker

**Prerequisites:** Docker and Docker Compose.

```bash
# Optional: copy and edit environment
cp .env.example .env

# Build and run
docker compose up -d --build
```

Open **http://localhost:8080** (or the port set in `APP_PORT`).

**First-time setup:** If you see `Failed opening required 'incfiles/db.php'`, complete the web installer at **http://localhost:8080/install** (see [Installation](#installation) below).

---

## Installation

### Via web installer (Docker or manual)

1. Open **http://your-site/install** in a browser.
2. Follow the installer:
   - Choose language.
   - **Database:**  
     With Docker use host `db`, database `johncms`, user `root` or `johncms`, password `johncms` (or values from your `.env`).
   - Enter site URL, admin email, admin login and password.
3. After installation, **remove the `/install` directory** or avoid accessing it again.
4. **Manual install only:** Set permissions (e.g. `755` for `incfiles/`, `644` for `incfiles/db.php`).

### Docker environment (.env)

| Variable | Default | Description |
|----------|---------|-------------|
| `APP_PORT` | 8080 | Host port mapped to the app |
| `MYSQL_ROOT_PASSWORD` | johncms | MySQL root password |
| `MYSQL_DATABASE` | johncms | Database name |
| `MYSQL_USER` | johncms | MySQL user for JohnCMS |
| `MYSQL_PASSWORD` | johncms | MySQL password |

Persistent data (survives rebuilds): `incfiles/` (includes `db.php`), `files/` (uploads), MySQL data. See `DOCKER.md` for details.

---

## Usage

- **Site:** Open the base URL (e.g. http://localhost:8080).
- **Login:** Use the “Login” link or go to `/login.php`.
- **Admin panel:** Log in with an admin account, then open **http://your-site/panel/** (requires rights ≥ 1).

---

## Project structure (overview)

```
├── index.php          # Front controller
├── incfiles/          # Core (config, classes, head/foot)
├── panel/             # Admin panel
├── forum/             # Forum module
├── download/          # Download center
├── library/           # Library module
├── gallery/           # Gallery
├── users/             # Profiles, albums, guestbook
├── install/           # Web installer (remove after setup)
├── theme/             # Skins (default, oz)
└── files/             # Uploaded files (persisted in Docker)
```

---

## License

JohnCMS is free software. See **LICENSE.txt** for full terms. Summary:

- Free to use; no warranty.
- Official releases only from [johncms.com](http://johncms.com) / [gazenwagen.com](http://gazenwagen.com).
- Do not distribute modified copies as JohnCMS; extensions must target the unmodified base.
- Keep the “Powered by JohnCMS” META tag in `head.php`.
- You may remove the footer copyright link after 3 months; keeping it is appreciated.

---

## Support and links

- **Forum:** [johncms.com](http://johncms.com)
- **Support site:** [gazenwagen.com](http://gazenwagen.com)
- **About / team:** [johncms.com/about](http://johncms.com/about)

---

## Credits

- **Lead developer:** Oleg Kasyanov (AlkatraZ)
- **Team:** Eugene Ryabinin (john77), Dmitry Liseenko (FlySelf)
