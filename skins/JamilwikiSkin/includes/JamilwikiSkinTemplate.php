<?php
/**
 * Template for JamilwikiSkin.
 */

class JamilwikiSkinTemplate extends BaseTemplate
{
    public function execute(): void
    {
        $this->html('headelement');
        ?>
        <div class="jw-wrapper">
            <header class="jw-header">
                <div class="jw-logo">Jamilwiki</div>
                <div class="jw-title"><?php $this->html('sitename'); ?></div>
            </header>
            <div class="jw-content">
                <aside class="jw-sidebar">
                    <?php $this->html('navigation'); ?>
                </aside>
                <main class="jw-main">
                    <h1 class="firstHeading"><?php $this->html('title'); ?></h1>
                    <div class="mw-body-content">
                        <?php $this->html('bodytext'); ?>
                    </div>
                </main>
            </div>
            <footer class="jw-footer">
                <span>Powered by MediaWiki</span>
                <span>Jamilwiki Platform</span>
            </footer>
        </div>
        <?php
        $this->html('dataAfterContent');
        $this->html('bottomscripts');
        $this->html('reporttime');
        ?></body></html>
        <?php
    }
}
