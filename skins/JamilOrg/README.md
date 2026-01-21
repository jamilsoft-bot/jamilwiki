# JamilOrg Skin

A modern, enterprise-grade MediaWiki skin designed for large organizations and multi-wiki environments. It provides a clean blue-on-white interface, responsive layout, accessible navigation, and a production-ready UI without any build step.

## Features
- TailwindCSS via CDN (no build step).
- Font Awesome icons via CDN.
- Sticky header with logo, search, user tools, and page actions.
- Collapsible sidebar for navigation and toolbox.
- Breadcrumbs, site notice area, and well-structured content card.
- Responsive layout optimized for desktop and mobile.

## Installation
1. Copy the `JamilOrg` folder to `skins/JamilOrg` (already in this repo).
2. Enable the skin in your `LocalSettings.php` (or per-wiki settings in a multi-wiki setup):

```php
wfLoadSkin( 'JamilOrg' );
$wgDefaultSkin = 'jamilorg';
```

### Multi-wiki configuration
In a multi-wiki farm, set the defaults globally and override per-wiki as needed:

```php
# Global defaults
wfLoadSkin( 'JamilOrg' );
$wgDefaultSkin = 'jamilorg';
$wgJamilOrgSkinLogo = 'https://jamilsoft.com.ng/assets/images/icon.png';
$wgJamilOrgSkinFavicon = 'https://jamilsoft.com.ng/assets/images/icon.png';
$wgJamilOrgSkinPrimaryColor = '#1d4ed8';

# Per-wiki override example (in a wiki-specific LocalSettings)
$wgJamilOrgSkinPrimaryColor = '#0f4c81';
```

## Configuration options
- `$wgJamilOrgSkinLogo` - Override the header/footer logo (defaults to Jamilsoft icon).
- `$wgJamilOrgSkinFavicon` - Override favicon URL (defaults to Jamilsoft icon).
- `$wgJamilOrgSkinPrimaryColor` - Primary brand color used for accents and focus states.

## Style guide
- **Header:** sticky, contains logo, search, page tools, and user menu.
- **Sidebar:** shows MediaWiki navigation + toolbox; collapsible on mobile.
- **Content:** card layout with title, subtitles, and full body content.
- **Footer:** enterprise summary + dynamic copyright.

## Notes
- TailwindCSS is loaded via CDN to avoid build steps.
- MediaWiki upgrades are safe: skin uses standard SkinTemplate and ResourceLoader conventions.
- All overrides are configurable for multi-wiki environments.
