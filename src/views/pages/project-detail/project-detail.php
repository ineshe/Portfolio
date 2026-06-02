<?php
    /** @var array $projects */
    $slug = $_GET['slug'];
    $project = $projects[$slug];

    // Compute prev/next among visible projects for the pager
    $visibleSlugs = array_keys(array_filter($projects, fn($p) => ($p['visibility'] ?? '0') === '1'));
    $currentIndex = array_search($slug, $visibleSlugs);
    $prevProject = ($currentIndex !== false && $currentIndex > 0)
        ? $projects[$visibleSlugs[$currentIndex - 1]]
        : null;
    $nextProject = ($currentIndex !== false && $currentIndex < count($visibleSlugs) - 1)
        ? $projects[$visibleSlugs[$currentIndex + 1]]
        : null;

    $pageTitle = $project['title'] . ' | Ines Heilmann';
    $pageStyles = [
        '/css/pages/project-detail.css',
        '/css/components/slideshow.css',
    ];
    $pageScripts = [
        '/js/components/slideshow.js',
    ];

    require_once dirname(__DIR__, 3).'/config.php';
?>
<!DOCTYPE html>
<html lang="de">
    <?php include_once dirname(__DIR__, 2).'/layout/head.php'; ?>
    <body>
        <div class="page">
            <?php include(dirname(__DIR__, 2).'/components/header/header.php'); ?>
            <main>
                <article id="project" class="section">
                    <div class="dot-pattern"></div>
                    <div class="content">

                        <nav class="breadcrumb" aria-label="Breadcrumb">
                            <a href="/">Startseite</a>
                            <span class="sep">/</span>
                            <a href="/#projects">Projekte</a>
                            <span class="sep">/</span>
                            <span class="current"><?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?></span>
                        </nav>

                        <?php if (!empty($project['subtitle'])): ?>
                            <p class="project__eyebrow"><?= htmlspecialchars($project['subtitle'], ENT_QUOTES, 'UTF-8') ?></p>
                        <?php endif; ?>

                        <div class="project__grid">
                            <div class="project__title-block">
                                <h2 class="project__title">
                                    <?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?><span class="accent">.</span>
                                </h2>
                                <p class="project__subline"><?= htmlspecialchars($project['shortDescription'], ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                            <?php include("slideshow/slideshow.php"); ?>
                            <div class="project__desc">
                                <?= $project['description'] ?>
                            </div>

                            <aside class="project__info">
                                <?php if (!empty($project['buttons'])): ?>
                                    <div>
                                        <p class="info-block-title">Links</p>
                                        <div class="info__buttons">
                                            <?php foreach ($project['buttons'] as $button): ?>
                                                <?php
                                                    $href   = $button['link']   ?? '';
                                                    $target = $button['target'] ?? '';
                                                    $text   = $button['text']   ?? '';
                                                    $isAccent = $button['accent'] ?? false;
                                                    $rel = '';

                                                    if ($target === '_blank') {
                                                        $host = parse_url($href, PHP_URL_HOST);
                                                        if (is_string($host) && $host !== '') {
                                                            $host = strtolower($host);
                                                            $isOwnDomain = $host === 'ines-heilmann.de'
                                                                || str_ends_with($host, '.ines-heilmann.de');
                                                            $rel = $isOwnDomain ? 'noopener' : 'noopener noreferrer';
                                                        } else {
                                                            $rel = 'noopener';
                                                        }
                                                    }
                                                ?>
                                                <a class="info-btn<?= $isAccent ? ' info-btn--accent' : '' ?>"
                                                   href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>"
                                                   <?= $target ? 'target="' . htmlspecialchars($target, ENT_QUOTES, 'UTF-8') . '"' : '' ?>
                                                   <?= $rel    ? 'rel="'    . htmlspecialchars($rel,    ENT_QUOTES, 'UTF-8') . '"' : '' ?>>
                                                    <span><?= htmlspecialchars($text, ENT_QUOTES, 'UTF-8') ?></span>
                                                    <svg class="arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                                        <?php if ($target === '_blank'): ?>
                                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/>
                                                        <?php else: ?>
                                                            <path d="M5 12h14M12 5l7 7-7 7"/>
                                                        <?php endif; ?>
                                                    </svg>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="info__technologies">
                                    <p class="info-block-title">Technologien</p>
                                    <p class="info__tech-list">
                                        <?php foreach ($project['technologies'] as $i => $tech): ?>
                                            <?php if ($i > 0): ?><span class="sep" aria-hidden="true">·</span><?php endif; ?>
                                            <?= htmlspecialchars($tech, ENT_QUOTES, 'UTF-8') ?>
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                            </aside>
                        </div>

                    </div>

                    <?php if ($prevProject || $nextProject): ?>
                        <nav class="project-pager" aria-label="Projekt-Navigation">
                            <div class="project-pager__inner">
                            <?php if ($prevProject): ?>
                                <a class="project-pager__link prev" href="/project/<?= htmlspecialchars($prevProject['slug'], ENT_QUOTES, 'UTF-8') ?>">
                                    <span class="project-pager__arrow-circle"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M19 12H5M12 5l-7 7 7 7"/></svg></span>
                                    <span class="project-pager__text-block">
                                        <span class="project-pager__label">Vorheriges Projekt</span>
                                        <span class="project-pager__title"><?= htmlspecialchars($prevProject['title'], ENT_QUOTES, 'UTF-8') ?></span>
                                        <?php if (!empty($prevProject['subtitle'])): ?><span class="project-pager__subtitle"><?= htmlspecialchars($prevProject['subtitle'], ENT_QUOTES, 'UTF-8') ?></span><?php endif; ?>
                                    </span>
                                </a>
                            <?php else: ?>
                                <span></span>
                            <?php endif; ?>

                            <?php if ($nextProject): ?>
                                <a class="project-pager__link next" href="/project/<?= htmlspecialchars($nextProject['slug'], ENT_QUOTES, 'UTF-8') ?>">
                                    <span class="project-pager__text-block">
                                        <span class="project-pager__label">Nächstes Projekt</span>
                                        <span class="project-pager__title"><?= htmlspecialchars($nextProject['title'], ENT_QUOTES, 'UTF-8') ?></span>
                                        <?php if (!empty($nextProject['subtitle'])): ?><span class="project-pager__subtitle"><?= htmlspecialchars($nextProject['subtitle'], ENT_QUOTES, 'UTF-8') ?></span><?php endif; ?>
                                    </span>
                                    <span class="project-pager__arrow-circle"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                                </a>
                            <?php endif; ?>
                            </div>
                        </nav>
                    <?php endif; ?>

                </article>
            </main>
        </div>
        <?php
            include_once dirname(__DIR__, 2).'/components/cookie-consent/cookie-consent.php';
            include_once dirname(__DIR__, 2).'/components/footer/footer.php';
        ?>
    </body>
</html>
