# Jamilwiki

Jamilwiki is an open-source **multi-wiki platform** (wiki farm) built on top of MediaWiki. It lets you host **many independent wikis** using a **shared MediaWiki core**, while keeping each wiki isolated with its own database, domain, and settings. Jamilwiki is designed for neutral, self-hosted wiki communities and organizations.

**Powered by MediaWiki** — Jamilwiki is not affiliated with or endorsed by the Wikimedia Foundation. Jamilwiki does not use Wikimedia or MediaWiki trademarks.

## How Jamilwiki differs from MediaWiki

MediaWiki is a single-wiki engine. Jamilwiki adds a platform layer that provides:

- Central registry of wikis
- Domain/subdomain routing to the correct wiki
- Per-wiki configuration and database separation
- Shared extensions/skins and upgrade workflow
- A basic admin panel for wiki management

## Directory layout

```
./
├─ core/                # MediaWiki core (unmodified or minimal patches)
├─ extensions/
│  ├─ JamilwikiCore/    # Custom platform extension
│  └─ shared/           # Common extensions
├─ skins/
│  └─ JamilwikiSkin/    # Custom skin
├─ farm/
│  ├─ WikiFactory.php   # Wiki creation logic
│  ├─ WikiRegistry.php  # Wiki metadata (db, domain, status)
│  ├─ SiteRouter.php    # Domain/subdomain → wiki mapping
│  └─ bootstrap.php
├─ admin/
│  └─ web/              # Central admin UI
├─ config/
│  ├─ wikilist.php
│  ├─ db.php
│  └─ globals.php
├─ docs/
├─ README.md
├─ LICENSE
└─ TODO.md
```

## Installation (high level)

1. Install MediaWiki into `core/` (keep it as close to upstream as possible).
2. Configure your web server to route each domain/subdomain to the same MediaWiki entry point.
3. Include `farm/bootstrap.php` from your `core/LocalSettings.php`.
4. Enable the Jamilwiki extension and skin:
   - `extensions/JamilwikiCore`
   - `skins/JamilwikiSkin`
5. Update `config/db.php` with your database credentials.
6. Register your initial wiki in `config/wikilist.php`.

## Creating a wiki

1. Visit `Special:CreateWiki` in any wiki.
2. Provide the name, slug, domain, and admin user.
3. The new wiki is registered in `config/wikilist.php` and can be routed by domain.

## GPL compliance

Jamilwiki is released under the GPL v2 or later. MediaWiki is GPL v2+ software; Jamilwiki preserves that license and attribution. See `LICENSE` and `COPYING` for details.

## Roadmap

See [TODO.md](TODO.md) for planned improvements.
