# Security Considerations

Jamilwiki inherits MediaWiki security behavior and adds new responsibilities for the platform layer.

## Recommendations

- Restrict access to `admin/web/` with HTTP authentication or VPN.
- Validate and sanitize user-provided wiki metadata when integrating with a database-backed registry.
- Ensure database credentials in `config/db.php` are not world-readable.
- Use HTTPS for all public domains.
- Keep the MediaWiki core and extensions updated.

## Future improvements

- Role-based admin panel access.
- Audit logging for wiki creation and status changes.
