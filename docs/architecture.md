# Jamilwiki Architecture Overview

Jamilwiki is organized as a shared MediaWiki core plus platform-specific layers that handle wiki creation and routing.

## Layers

1. **Core MediaWiki** (`core/`)
   - Stays close to upstream to simplify upgrades.
   - Used by every wiki.

2. **Platform Extension** (`extensions/JamilwikiCore/`)
   - Adds platform branding.
   - Exposes special pages for dashboard, wiki creation, and management.

3. **Wiki Factory** (`farm/`)
   - `WikiFactory` creates and registers new wiki entries.
   - `WikiRegistry` stores metadata for all wikis.
   - `SiteRouter` resolves incoming domains to the correct wiki.

4. **Admin UI** (`admin/web/`)
   - Basic HTML/PHP admin panel.

5. **Skin** (`skins/JamilwikiSkin/`)
   - Clean, neutral UI with platform branding.

## Multi-wiki configuration

All wikis share a common `LocalSettings.php`, with a small bootstrap to detect which wiki is being served and load per-wiki configuration at runtime.
