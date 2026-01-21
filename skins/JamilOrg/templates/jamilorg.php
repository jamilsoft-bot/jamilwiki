<?php
$logo = $logo ?? '';
$primaryColor = $primaryColor ?? '#1d4ed8';
$this->html('headelement');
?>
<div class="jamilorg-root" style="--jamilorg-primary: <?php echo htmlspecialchars($primaryColor, ENT_QUOTES); ?>;">
    <a class="sr-only focus:not-sr-only focus:absolute focus:top-3 focus:left-3 focus:bg-white focus:text-blue-700 focus:px-4 focus:py-2 focus:rounded shadow" href="#content">Skip to content</a>

    <header class="jamilorg-header sticky top-0 z-40 bg-white/95 backdrop-blur border-b border-slate-200">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-4 py-3">
                <div class="flex items-center gap-3">
                    <button class="jamilorg-sidebar-toggle md:hidden text-slate-600 hover:text-slate-900" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <a href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'] ?? '#', ENT_QUOTES); ?>" class="flex items-center gap-3">
                        <img src="<?php echo htmlspecialchars($logo, ENT_QUOTES); ?>" alt="<?php $this->text('sitename'); ?> logo" class="h-10 w-10 rounded-full shadow" />
                        <span class="text-xl font-semibold text-slate-900">
                            <?php $this->html('sitename'); ?>
                        </span>
                    </a>
                </div>
                <div class="flex-1 min-w-[240px]">
                    <form action="<?php $this->text('searchaction'); ?>" method="get" role="search" class="relative">
                        <input type="hidden" name="title" value="<?php $this->text('searchtitle'); ?>" />
                        <label class="sr-only" for="jamilorg-search">Search</label>
                        <input
                            id="jamilorg-search"
                            name="search"
                            value="<?php $this->text('search'); ?>"
                            placeholder="Search the knowledge base"
                            class="w-full rounded-full border border-slate-300 bg-slate-50 px-4 py-2 text-sm focus:border-[var(--jamilorg-primary)] focus:ring-2 focus:ring-blue-200"
                        />
                        <button class="absolute right-2 top-1/2 -translate-y-1/2 text-slate-500" type="submit" aria-label="Submit search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="flex items-center gap-4">
                    <nav class="hidden lg:flex items-center gap-3 text-sm text-slate-600" aria-label="Page tools">
                        <?php $this->renderContentNavigation(); ?>
                    </nav>
                    <div class="relative">
                        <button class="jamilorg-user-toggle flex items-center gap-2 rounded-full border border-slate-200 px-3 py-1.5 text-sm text-slate-700 hover:text-slate-900" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-regular fa-user"></i>
                            <span><?php echo htmlspecialchars($this->getSkin()->getUser()->isRegistered() ? $this->getSkin()->getUser()->getName() : $this->msg('userlogin')->text(), ENT_QUOTES); ?></span>
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </button>
                        <div class="jamilorg-user-menu hidden absolute right-0 mt-2 w-56 rounded-lg border border-slate-200 bg-white shadow-lg z-50">
                            <ul class="py-2 text-sm text-slate-700">
                                <?php $this->renderPersonalTools(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="jamilorg-body">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex gap-6 py-6">
                <aside class="jamilorg-sidebar fixed inset-y-0 left-0 w-72 -translate-x-full bg-white shadow-lg border-r border-slate-200 p-6 overflow-y-auto transition-transform md:relative md:translate-x-0 md:shadow-none md:border-0 md:w-64" aria-label="Sidebar navigation">
                    <div class="flex items-center justify-between md:hidden mb-4">
                        <span class="text-sm font-semibold text-slate-700">Navigation</span>
                        <button class="jamilorg-sidebar-close text-slate-600" aria-label="Close navigation">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <?php $this->renderSidebar(); ?>
                </aside>
                <main class="flex-1 min-w-0" id="content">
                    <?php if ($this->data['sitenotice'] ?? ''): ?>
                        <div class="rounded-lg border border-blue-100 bg-blue-50 px-4 py-3 text-sm text-blue-800 mb-4">
                            <?php $this->html('sitenotice'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="jamilorg-breadcrumbs text-sm text-slate-500 mb-2">
                        <?php $this->html('subtitle'); ?>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <div class="flex flex-wrap items-start justify-between gap-4 mb-4">
                            <div>
                                <h1 class="firstHeading text-3xl font-semibold text-slate-900">
                                    <?php $this->html('title'); ?>
                                </h1>
                                <?php if ($this->data['contentSub'] ?? ''): ?>
                                    <div class="text-sm text-slate-500 mt-1">
                                        <?php $this->html('contentSub'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="lg:hidden">
                                <nav class="flex flex-wrap gap-2 text-sm text-slate-600" aria-label="Page tools">
                                    <?php $this->renderContentNavigation(); ?>
                                </nav>
                            </div>
                        </div>

                        <div class="jamilorg-content prose max-w-none">
                            <?php $this->html('bodytext'); ?>
                        </div>

                        <?php if ($this->data['catlinks'] ?? ''): ?>
                            <div class="mt-6 border-t border-slate-200 pt-4 text-sm text-slate-600">
                                <?php $this->html('catlinks'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php $this->html('dataAfterContent'); ?>
                </main>
            </div>
        </div>
    </div>

    <footer class="jamilorg-footer border-t border-slate-200 bg-white">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-slate-500">
            <div class="flex items-center gap-2">
                <img src="<?php echo htmlspecialchars($logo, ENT_QUOTES); ?>" alt="Jamilsoft" class="h-8 w-8 rounded-full" />
                <span>Trusted knowledge platform</span>
            </div>
            <div>
                &copy; 2016&ndash;<?php echo (int)date('Y'); ?> Powered by Jamilsoft Technologies
            </div>
        </div>
    </footer>
</div>
<?php
$this->html('bottomscripts');
$this->html('reporttime');
?>
</body></html>
