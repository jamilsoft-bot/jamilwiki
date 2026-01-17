<?php
/**
 * Special page to create a new wiki.
 */

namespace Jamilwiki\Core;

use Jamilwiki\Farm\WikiFactory;
use Jamilwiki\Farm\WikiRegistry;
use SpecialPage;

class SpecialCreateWiki extends SpecialPage
{
    public function __construct()
    {
        parent::__construct('CreateWiki', 'createwiki');
    }

    public function execute($subPage): void
    {
        $this->setHeaders();
        $output = $this->getOutput();
        $output->setPageTitle('Create Wiki');

        if ($this->getRequest()->wasPosted()) {
            $name = $this->getRequest()->getText('name');
            $slug = $this->getRequest()->getText('slug');
            $domain = $this->getRequest()->getText('domain');
            $admin = $this->getRequest()->getText('admin');

            $registry = new WikiRegistry(__DIR__ . '/../../../config/wikilist.php');
            $factory = new WikiFactory($registry);
            $wiki = $factory->createWiki($name, $slug, $domain, $admin);

            $output->addHTML('<p>Created wiki: ' . htmlspecialchars($wiki['name']) . '.</p>');
        }

        $output->addHTML(
            '<form method="post">'
            . '<label>Wiki Name <input name="name" required></label><br>'
            . '<label>Slug <input name="slug" required></label><br>'
            . '<label>Domain <input name="domain" required></label><br>'
            . '<label>Admin User <input name="admin" required></label><br>'
            . '<button type="submit">Create Wiki</button>'
            . '</form>'
        );
    }
}
