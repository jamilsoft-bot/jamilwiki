# Wiki Farm Model

Jamilwiki implements a classic wiki farm pattern:

- **Shared MediaWiki core** is installed once.
- Each wiki gets its own **database** and **domain/subdomain**.
- Shared extensions and skins are managed centrally.

## Request lifecycle

1. A request arrives on `wiki.example.org`.
2. `farm/bootstrap.php` maps the domain to a wiki entry.
3. The wiki ID and database are defined for MediaWiki to use.
4. MediaWiki loads the correct wiki configuration.

## Per-wiki data isolation

Each wiki uses its own database name (`jamilwiki_<id>`) by default. This isolates user data, pages, and uploads while still sharing code.
