<?php
/**
 * JamilwikiSkin main skin class.
 */

class SkinJamilwikiSkin extends SkinTemplate
{
    public $skinname = 'jamilwikis';
    public $stylename = 'JamilwikiSkin';
    public $template = 'JamilwikiSkinTemplate';

    public function initPage(OutputPage $out): void
    {
        parent::initPage($out);
        $out->addModuleStyles('skins.jamilwikiskin.styles');
    }
}
