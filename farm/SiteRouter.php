<?php
/**
 * Domain/subdomain router for Jamilwiki.
 */

namespace Jamilwiki\Farm;

class SiteRouter
{
    private WikiRegistry $registry;

    public function __construct(WikiRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Resolve a domain to a wiki record.
     *
     * @param string $domain
     * @return array<string, mixed>|null
     */
    public function resolve(string $domain): ?array
    {
        foreach ($this->registry->all() as $wiki) {
            if ($wiki['domain'] === $domain) {
                return $wiki;
            }
        }

        return null;
    }
}
