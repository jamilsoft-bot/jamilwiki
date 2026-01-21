<?php
/**
 * JamilOrg main skin class.
 *
 * Provides a clean, enterprise-focused layout while keeping MediaWiki upgrades friendly.
 */
class SkinJamilOrg extends SkinTemplate
{
    public $skinname = 'jamilorg';
    public $stylename = 'JamilOrg';
    public $template = 'JamilOrgTemplate';

    public function initPage(OutputPage $out): void
    {
        parent::initPage($out);

        $config = $this->getConfig();
        $primaryColor = $config->get('JamilOrgSkinPrimaryColor');
        $favicon = $config->get('JamilOrgSkinFavicon');

        // Tailwind configuration must load before the CDN script.
        $out->addHeadItem(
            'jamilorg-tailwind-config',
            '<script>tailwind.config = { theme: { extend: { colors: { primary: ' .
                json_encode($primaryColor) .
                ' } } } };</script>'
        );
        $out->addHeadItem(
            'jamilorg-tailwind',
            '<script src="https://cdn.tailwindcss.com"></script>'
        );
        $out->addHeadItem(
            'jamilorg-fontawesome',
            '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" ' .
                'referrerpolicy="no-referrer">'
        );

        if ($favicon) {
            $out->addLink([
                'rel' => 'icon',
                'href' => $favicon,
                'type' => 'image/png'
            ]);
        }

        $out->addModuleStyles('skins.jamilorg.styles');
        $out->addModules('skins.jamilorg.scripts');
    }
}
