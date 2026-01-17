<?php
/**
 * Jamilwiki registry for all managed wikis.
 */

namespace Jamilwiki\Farm;

class WikiRegistry
{
    private string $registryPath;

    public function __construct(string $registryPath)
    {
        $this->registryPath = $registryPath;
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function all(): array
    {
        return $this->load();
    }

    /**
     * @param string $wikiId
     * @return array<string, mixed>|null
     */
    public function get(string $wikiId): ?array
    {
        $wikis = $this->load();

        return $wikis[$wikiId] ?? null;
    }

    /**
     * @param array<string, mixed> $wiki
     */
    public function register(array $wiki): void
    {
        $wikis = $this->load();
        $wikis[$wiki['id']] = $wiki;
        $this->persist($wikis);
    }

    public function setStatus(string $wikiId, string $status): void
    {
        $wikis = $this->load();
        if (!isset($wikis[$wikiId])) {
            return;
        }

        $wikis[$wikiId]['status'] = $status;
        $this->persist($wikis);
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function load(): array
    {
        if (!file_exists($this->registryPath)) {
            return [];
        }

        /** @var array<string, array<string, mixed>> $registry */
        $registry = require $this->registryPath;

        return $registry;
    }

    /**
     * @param array<string, array<string, mixed>> $registry
     */
    private function persist(array $registry): void
    {
        $export = var_export($registry, true);
        $contents = "<?php\nreturn {$export};\n";
        file_put_contents($this->registryPath, $contents);
    }
}
