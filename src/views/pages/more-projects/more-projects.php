<?php 
    $projects = json_decode(file_get_contents(__DIR__ . "/../../../data/projects.json"));

    $pageTitle = 'Weitere Projekte | Ines Heilmann – Full-Stack Webentwicklerin';
    $pageStyles = [
        '/css/components/projects.css',
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
                        <div class="project-cards">
                            <?php if(isset($projects)): ?>
                                <?php foreach ($projects as $project): ?>
                                    <?php if ($project->visibility == "0"): ?>

                                        <section class="project">
                                            <a href="<?= $baseURL . '/project/' . $project->slug ?>">
                                                <img class="card-img" src="<?= $baseURL . $project->mainImage ?>" alt="" style="background-color: white;">
                                                <div class="card-text">
                                                    <h3 class="project-title"><?= $project->title ?></h3>
                                                    <p><?= $project->technologies ?></p>
                                                </div>
                                            </a>
                                        </section>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div> 
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