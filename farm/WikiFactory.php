<?php
/**
 * Jamilwiki wiki creation logic.
 */

namespace Jamilwiki\Farm;

class WikiFactory
{
    private WikiRegistry $registry;

    public function __construct(WikiRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Create a new wiki entry and register it.
     *
     * @param string $name
     * @param string $slug
     * @param string $domain
     * @param string $adminUser
     * @return array<string, mixed>
     */
    public function createWiki(string $name, string $slug, string $domain, string $adminUser): array
    {
        $wikiId = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '_', $slug));
        $wikiId = trim($wikiId, '_');

        $wiki = [
            'id' => $wikiId,
            'name' => $name,
            'db' => 'jamilwiki_' . $wikiId,
            'domain' => $domain,
            'status' => 'active',
            'admins' => [ $adminUser ],
            'extensions' => [ 'JamilwikiCore' ],
            'skin' => 'JamilwikiSkin',
        ];

        $this->registry->register($wiki);

        return $wiki;
    }
}
