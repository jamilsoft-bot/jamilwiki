<?php
/**
 * Jamilwiki dashboard special page.
 */

namespace Jamilwiki\Core;

use Jamilwiki\Farm\WikiRegistry;
use SpecialPage;

class SpecialJamilwikiDashboard extends SpecialPage
{
    public function __construct()
    {
        parent::__construct('JamilwikiDashboard');
    }

    public function execute($subPage): void
    {
        $this->setHeaders();
        $output = $this->getOutput();
        $output->setPageTitle('Jamilwiki Dashboard');

        $registry = new WikiRegistry(__DIR__ . '/../../../config/wikilist.php');
        $wikis = $registry->all();

        $output->addHTML('<p>Welcome to the Jamilwiki platform dashboard.</p>');
        $output->addHTML('<h2>Registered Wikis</h2>');
        $output->addHTML('<ul>');
        foreach ($wikis as $wiki) {
            $output->addHTML(
                '<li>' . htmlspecialchars($wiki['name']) . ' (' . htmlspecialchars($wiki['domain']) . ')</li>'
            );
        }
        $output->addHTML('</ul>');
    }
}
