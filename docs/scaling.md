# Scaling Notes

Jamilwiki scales by separating data per wiki while reusing code.

## Scaling options

- Move the registry to a database for better concurrency.
- Deploy shared object storage for uploads.
- Add caching layers (e.g., Redis, Memcached).
- Use a CDN for static assets.

## Operational guidance

- Automate backups for each wiki database.
- Schedule maintenance scripts per wiki.
- Monitor per-wiki traffic to allocate resources appropriately.
