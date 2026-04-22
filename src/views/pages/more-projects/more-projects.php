<?php 
    $projects = json_decode(file_get_contents(__DIR__ . "/../../../data/projects.json"));

    $pageTitle = 'Weitere Projekte | Ines Heilmann – Full-Stack Webentwicklerin';
    $pageStyles = [
        '/css/components/projects.css',
    ];
    $pageScripts = [
        '/js/components/redundant-card-click.js',
    ];
?>
<!DOCTYPE html>

<html lang="de">
    <?php include_once dirname(__DIR__, 2).'/layout/head.php'; ?>
    <body>
        <div class="page">
            <?php include_once dirname(__DIR__, 2).'/partials/header/header.php'; ?>
            <main>
                <section id="projects" class="section">
                    <div class="content">
                        <h2 class="section-title"> Weitere Projekte</h2>
                        <ul class="project-cards">
                            <?php if(isset($projects)): ?>
                                <?php foreach ($projects as $project): ?>
                                    <?php if ($project->visibility == "0"): ?>

                                        <li class="project-item">
                                            <article class="project js-redundant-click-card">
                                                <img class="card-img white" src="<?= $baseURL . $project->mainImage ?>" alt="" height="200" width="300" loading="eager" decoding="async" fetchpriority="high">
                                                <div class="project-content">
                                                    <h3 class="project-title">
                                                        <a class="js-primary-link" href="<?= $baseURL . '/project/' . $project->slug ?>"><?= $project->title ?></a>
                                                    </h3>
                                                    <p class="project-technologies"><?= $project->technologies ?></p>
                                                </div>
                                            </article>
                                        </li>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul> 
                    </div>
                </section>
            </main>
            <?php 
                include_once dirname(__DIR__, 2).'/partials/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 2).'/partials/footer/footer.php';
            ?>
        </div>
    </body>
</html>