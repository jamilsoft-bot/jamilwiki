<?php
/**
 * Central wiki registry for Jamilwiki.
 *
 * This file is intentionally simple and designed for small deployments.
 * Larger installations should replace this with a database-backed registry.
 */
return [
    'main' => [
        'id' => 'main',
        'name' => 'Main Wiki',
        'db' => 'jamilwiki_main',
        'domain' => 'localhost',
        'status' => 'active',
        'admins' => [ 'AdminUser' ],
        'extensions' => [
            'JamilwikiCore',
        ],
        'skin' => 'JamilwikiSkin',
    ],
];
