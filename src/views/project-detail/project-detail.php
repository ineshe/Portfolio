<?php 
    $projects = json_decode(file_get_contents(__DIR__ . "/../../data/projects.json"));
    
    if (isset($_GET['slug'])) {
        $slug = $_GET['slug'];
        $project = $projects->$slug;
    }
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <title><?= $project->title ?> | Ines Heilmann</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            include_once dirname(__DIR__, 1).'/global-styles.php';

            if ($isDevelopment === true) {
                echo '<script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>';
            }
        ?>
        <link rel="stylesheet" href="<?= $baseURL ?>/css/project-detail.css">
        <link rel="stylesheet" href="<?= $baseURL ?>/css/slideshow.css">
        <script src="<?= $baseURL ?>/js/navigation.js" defer></script>
        <script src="<?= $baseURL ?>/js/cookie-consent.js" defer></script>
        <script src="<?= $baseURL ?>/js/slideshow.js" defer></script>
    </head>
    <body>
        <div class="page">
            <?php
                include(dirname(__DIR__, 1).'/partials/header/header.php');
            ?>
            <main>
                <article id="project" class="section">
                    <div class="content">
                        <div class="grid">
                            <div class="headline">
                                <h2><?= $project->title ?></h2>
                                <p class='subline'><?= $project->shortDescription ?></p>
                                <?php include("slideshow/slideshow.php"); ?>                    
                            </div>

                            <div class="col1">
                                <?php echo $project->description ?>
                            </div>

                            <div class="col2">
                                <?php if(isset($project->buttons)): ?>
                                    <?php $buttons = $project->buttons; ?>
                                    <?php foreach ($buttons as $button): ?>
                                        <a class='btn rounded' href="<?= $button->link ?>" target="<?= $button->target ?>">
                                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path fill='currentColor' d='M16.5 6v11.5a4 4 0 0 1-4 4a4 4 0 0 1-4-4V5A2.5 2.5 0 0 1 11 2.5A2.5 2.5 0 0 1 13.5 5v10.5a1 1 0 0 1-1 1a1 1 0 0 1-1-1V6H10v9.5a2.5 2.5 0 0 0 2.5 2.5a2.5 2.5 0 0 0 2.5-2.5V5a4 4 0 0 0-4-4a4 4 0 0 0-4 4v12.5a5.5 5.5 0 0 0 5.5 5.5a5.5 5.5 0 0 0 5.5-5.5V6h-1.5Z'/></svg>
                                            <span class="text"><?= $button->text ?></span>
                                        </a></br>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <h3>Technologien:</h3>
                                <p><?= $project->technologies ?></p>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
        <?php 
            include_once dirname(__DIR__, 1).'/partials/cookie-consent/cookie-consent.php';
            include_once dirname(__DIR__, 1).'/partials/footer/footer.php';
        ?>
    </body>
</html>