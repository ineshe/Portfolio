<?php 
    $projects = json_decode(file_get_contents(__DIR__ . "/../../data/projects.json"));
?>
<!DOCTYPE html>

<html lang="de">
    <head>
        <title>Weitere Projekte | Ines Heilmann – Full-Stack Webentwicklerin</title>
        <base href="<?php $baseURL ?>"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            include_once dirname(__DIR__, 1).'/global-styles.php';
        
            if ($isDevelopment === true) {
                echo '<script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>';
            }
        ?>
        <link rel="stylesheet" href="<?= $baseURL ?>/css/projects.css">
        <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
        <!-- <script src="includes/contact/validation.js" defer></script> -->
        <script src="<?= $baseURL ?>/js/navigation.js" defer></script>
        <script src="<?= $baseURL ?>/js/cookie-consent.js" defer></script>
    </head>
    <body>
        <div class="page">
            <?php include_once dirname(__DIR__, 1).'/partials/header/header.php'; ?>
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
                include_once dirname(__DIR__, 1).'/partials/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 1).'/partials/footer/footer.php';
            ?>
        </div>
    </body>
</html>