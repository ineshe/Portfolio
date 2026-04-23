<?php 
    $projects = json_decode(file_get_contents(__DIR__ . "/../../../data/projects.json"));
    
    if (isset($_GET['slug'])) {
        $slug = $_GET['slug'];
        $project = $projects->$slug;
    }

    $pageTitle = $project->title . ' | Ines Heilmann';
    $pageStyles = [
        '/css/pages/project-detail.css',
        '/css/components/slideshow.css',
    ];
    $pageScripts = [
        '/js/components/slideshow.js',
    ];
?>
<!DOCTYPE html>
<html lang="de">
    <?php include_once dirname(__DIR__, 2).'/layout/head.php'; ?>
    <body>
        <div class="page">
            <?php
                include(dirname(__DIR__, 2).'/components/header/header.php');
            ?>
            <main>
                <article id="project" class="section">
                    <div class="content">
                        <div class="grid">
                            <div class="project__head">
                                <h2><?= $project->title ?></h2>
                                <p class='subline'><?= $project->shortDescription ?></p>
                                <?php include("slideshow/slideshow.php"); ?>                    
                            </div>

                            <div class="project__desc">
                                <?php echo $project->description ?>
                            </div>

                            <div class="project__info">
                                <?php if(isset($project->buttons)): ?>
                                    <div class="info__buttons">
                                        <?php $buttons = $project->buttons; ?>
                                        <?php foreach ($buttons as $button): ?>
                                            <?php
                                                $href = $button->link ?? '';
                                                $target = $button->target ?? '';
                                                $rel = '';

                                                if ($target === '_blank') {
                                                    $host = parse_url($href, PHP_URL_HOST);
                                                    if (is_string($host) && $host !== '') {
                                                        $host = strtolower($host);
                                                        $isOwnDomain = $host === 'ines-heilmann.de' || str_ends_with($host, '.ines-heilmann.de');
                                                        $rel = $isOwnDomain ? 'noopener' : 'noopener noreferrer';
                                                    } else {
                                                        // Relative/local links do not need noreferrer.
                                                        $rel = 'noopener';
                                                    }
                                                }
                                            ?>
                                            <a class='btn' href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>" target="<?= htmlspecialchars($target, ENT_QUOTES, 'UTF-8') ?>"<?= $rel ? ' rel="' . htmlspecialchars($rel, ENT_QUOTES, 'UTF-8') . '"' : '' ?>>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path fill='currentColor' d='M16.5 6v11.5a4 4 0 0 1-4 4a4 4 0 0 1-4-4V5A2.5 2.5 0 0 1 11 2.5A2.5 2.5 0 0 1 13.5 5v10.5a1 1 0 0 1-1 1a1 1 0 0 1-1-1V6H10v9.5a2.5 2.5 0 0 0 2.5 2.5a2.5 2.5 0 0 0 2.5-2.5V5a4 4 0 0 0-4-4a4 4 0 0 0-4 4v12.5a5.5 5.5 0 0 0 5.5 5.5a5.5 5.5 0 0 0 5.5-5.5V6h-1.5Z'/></svg>
                                                <span class="text"><?= htmlspecialchars($button->text ?? '', ENT_QUOTES, 'UTF-8') ?></span>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="info__technologies">
                                    <h3>Technologien:</h3>
                                    <p><?= $project->technologies ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
        <?php 
            include_once dirname(__DIR__, 2).'/components/cookie-consent/cookie-consent.php';
            include_once dirname(__DIR__, 2).'/components/footer/footer.php';
        ?>
    </body>
</html>