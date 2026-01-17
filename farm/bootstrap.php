<?php
/**
 * Jamilwiki farm bootstrap for domain-based routing.
 */

use Jamilwiki\Farm\SiteRouter;
use Jamilwiki\Farm\WikiRegistry;

$registry = new WikiRegistry(__DIR__ . '/../config/wikilist.php');
$router = new SiteRouter($registry);
$domain = $_SERVER['HTTP_HOST'] ?? 'localhost';
$wiki = $router->resolve($domain);

if (!$wiki) {
    header('HTTP/1.1 404 Not Found');
    echo 'Unknown wiki domain.';
    exit;
}

define('WIKI_ID', $wiki['id']);
define('WIKI_DB', $wiki['db']);
