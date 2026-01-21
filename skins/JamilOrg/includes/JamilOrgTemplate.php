<?php
/**
 * Template for JamilOrg.
 */
class JamilOrgTemplate extends BaseTemplate
{
    public function execute(): void
    {
        $config = $this->getSkin()->getConfig();
        $logo = $config->get('JamilOrgSkinLogo') ?: ($this->data['logopath'] ?? '');
        $primaryColor = $config->get('JamilOrgSkinPrimaryColor');
        $templateFile = __DIR__ . '/../templates/jamilorg.php';
        include $templateFile;
    }

    private function renderSidebar(): void
    {
        foreach ($this->getSidebar() as $boxName => $box) {
            if (empty($box)) {
                continue;
            }
            $header = is_numeric($boxName) ? $box['header'] : $boxName;
            ?>
            <section class="mb-6">
                <h2 class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-3">
                    <?php echo htmlspecialchars($this->getSkin()->msg($header)->text(), ENT_QUOTES); ?>
                </h2>
                <ul class="space-y-2 text-sm text-slate-700">
                    <?php foreach ($box['content'] as $item): ?>
                        <?php $itemClass = 'flex items-center gap-2 rounded-md px-2 py-1 hover:bg-blue-50 hover:text-[var(--jamilorg-primary)]'; ?>
                        <?php if (!empty($item['class'])) {
                            $itemClass .= ' ' . $item['class'];
                        } ?>
                        <li>
                            <a class="<?php echo htmlspecialchars($itemClass, ENT_QUOTES); ?>" href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES); ?>"<?php echo empty($item['id']) ? '' : ' id="' . htmlspecialchars($item['id'], ENT_QUOTES) . '"'; ?>>
                                <i class="fa-regular fa-circle-dot text-xs text-blue-400"></i>
                                <span><?php echo htmlspecialchars($item['text'], ENT_QUOTES); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
            <?php
        }
    }

    private function renderPersonalTools(): void
    {
        foreach ($this->data['personal_urls'] as $key => $item) {
            $itemClass = 'block px-4 py-2 hover:bg-blue-50 hover:text-[var(--jamilorg-primary)]';
            if (!empty($item['class'])) {
                $itemClass .= ' ' . $item['class'];
            }
            ?>
            <li>
                <a class="<?php echo htmlspecialchars($itemClass, ENT_QUOTES); ?>" href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES); ?>">
                    <?php echo htmlspecialchars($item['text'], ENT_QUOTES); ?>
                </a>
            </li>
            <?php
        }
    }

    private function renderContentNavigation(): void
    {
        $sections = $this->data['content_navigation'] ?? [];
        foreach (['namespaces', 'views', 'actions'] as $section) {
            if (empty($sections[$section])) {
                continue;
            }
            foreach ($sections[$section] as $key => $tab) {
                $classes = 'rounded-full border border-slate-200 px-3 py-1 text-xs font-medium hover:bg-blue-50 hover:text-[var(--jamilorg-primary)]';
                if (!empty($tab['class']) && strpos($tab['class'], 'selected') !== false) {
                    $classes .= ' bg-blue-50 text-[var(--jamilorg-primary)]';
                }
                ?>
                <a class="<?php echo htmlspecialchars($classes, ENT_QUOTES); ?>" href="<?php echo htmlspecialchars($tab['href'], ENT_QUOTES); ?>"<?php echo empty($tab['id']) ? '' : ' id="' . htmlspecialchars($tab['id'], ENT_QUOTES) . '"'; ?>>
                    <?php echo htmlspecialchars($tab['text'], ENT_QUOTES); ?>
                </a>
                <?php
            }
        }
    }
}
