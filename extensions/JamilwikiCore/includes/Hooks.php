<?php
/**
 * Hook handlers for JamilwikiCore.
 */

namespace Jamilwiki\Core;

use OutputPage;
use Skin;

class Hooks
{
    /**
     * Add Jamilwiki platform links to the sidebar.
     *
     * @param Skin $skin
     * @param array<string, array<string, mixed>> &$bar
     */
    public static function onSkinBuildSidebar(Skin $skin, array &$bar): void
    {
        $bar['Jamilwiki'] = [
            [
                'text' => 'Jamilwiki Dashboard',
                'href' => $skin->getTitle()->newFromText('Special:JamilwikiDashboard')->getLocalURL(),
                'id' => 'n-jamilwiki-dashboard',
            ],
            [
                'text' => 'Create Wiki',
                'href' => $skin->getTitle()->newFromText('Special:CreateWiki')->getLocalURL(),
                'id' => 'n-jamilwiki-create',
            ],
            [
                'text' => 'Manage Wiki',
                'href' => $skin->getTitle()->newFromText('Special:ManageWiki')->getLocalURL(),
                'id' => 'n-jamilwiki-manage',
            ],
        ];
    }

    /**
     * Inject platform branding into the footer.
     *
     * @param OutputPage $out
     * @param Skin $skin
     */
    public static function onBeforePageDisplay(OutputPage $out, Skin $skin): void
    {
        $out->addFooterLink('places', 'Jamilwiki Platform');
        $out->addFooterLink('places', 'Powered by MediaWiki');
    }
}
