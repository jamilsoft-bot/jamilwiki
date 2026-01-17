<?php
/**
 * Special page to manage an existing wiki.
 */

namespace Jamilwiki\Core;

use Jamilwiki\Farm\WikiRegistry;
use SpecialPage;

class SpecialManageWiki extends SpecialPage
{
    public function __construct()
    {
        parent::__construct('ManageWiki', 'managewiki');
    }

    public function execute($subPage): void
    {
        $this->setHeaders();
        $output = $this->getOutput();
        $output->setPageTitle('Manage Wiki');

        $registry = new WikiRegistry(__DIR__ . '/../../../config/wikilist.php');
        $wikis = $registry->all();

        if ($this->getRequest()->wasPosted()) {
            $wikiId = $this->getRequest()->getText('wiki_id');
            $status = $this->getRequest()->getText('status');
            $registry->setStatus($wikiId, $status);
            $output->addHTML('<p>Status updated for ' . htmlspecialchars($wikiId) . '.</p>');
        }

        $output->addHTML('<form method="post">');
        $output->addHTML('<label>Wiki <select name="wiki_id">');
        foreach ($wikis as $wiki) {
            $output->addHTML('<option value="' . htmlspecialchars($wiki['id']) . '">' . htmlspecialchars($wiki['name']) . '</option>');
        }
        $output->addHTML('</select></label><br>');
        $output->addHTML('<label>Status <select name="status">');
        $output->addHTML('<option value="active">Active</option>');
        $output->addHTML('<option value="disabled">Disabled</option>');
        $output->addHTML('</select></label><br>');
        $output->addHTML('<button type="submit">Update Status</button>');
        $output->addHTML('</form>');
    }
}
