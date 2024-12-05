<?php 
    include_once dirname(__DIR__, 2).'/config.php' ;
    
    if(isset($_GET['slug'])) {
        include_once 'config.php';
        $project = $_GET['slug'];

        if (array_key_exists($project, $projects)) {
            $title = $projects[$project]['title'];
            $subline = $projects[$project]['subline'];
            $media = $projects[$project]['media'];
            $buttons = $projects[$project]['buttons'];
            $description = $projects[$project]['description'];
            $technologies = $projects[$project]['technologies'];
        }
    }
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <title><?php echo $title ?> | Ines Heilmann</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            include_once dirname(__DIR__, 1).'/global-styles.php';

            if ($isDevelopment === true) {
                echo '<script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>';
            }
        ?>
        <link rel="stylesheet" href="<?php echo $baseURL?>/css/project-detail.css">
        <link rel="stylesheet" href="<?php echo $baseURL?>/css/slideshow.css">
        <script src="<?php echo $baseURL?>/js/navigation.js" defer></script>
        <script src="<?php echo $baseURL?>/js/slideshow.js" defer></script>
    </head>
    <body>
        <?php
            include(dirname(__DIR__, 1).'/partials/header/header.php');
        ?>
        <article id="project" class="section">

            <div class="content">
                <div class="grid">
                    <div class="headline">
                        <?php echo "<h2>$title</h2>" ?>
                        <?php echo "<p class='subline'>$subline</p>" ?>
                        <?php include("slideshow/slideshow.php"); ?>                    
                    </div>

                    <div class="col1">
                        <?php echo $description ?>
                    </div>

                    <div class="col2">
                        <?php
                            if(isset($buttons)) {
                                for($b = 0; $b < count($buttons); ++$b) {
                                    $link = $buttons[$b]['link'];
                                    $target = $buttons[$b]['target'];
                                    $text = $buttons[$b]['text'];
                                    echo "
                                    <a class='btn rounded' href='$link' target='$target'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path fill='currentColor' d='M16.5 6v11.5a4 4 0 0 1-4 4a4 4 0 0 1-4-4V5A2.5 2.5 0 0 1 11 2.5A2.5 2.5 0 0 1 13.5 5v10.5a1 1 0 0 1-1 1a1 1 0 0 1-1-1V6H10v9.5a2.5 2.5 0 0 0 2.5 2.5a2.5 2.5 0 0 0 2.5-2.5V5a4 4 0 0 0-4-4a4 4 0 0 0-4 4v12.5a5.5 5.5 0 0 0 5.5 5.5a5.5 5.5 0 0 0 5.5-5.5V6h-1.5Z'/></svg>
                                        <span class'text'>$text</span>
                                    </a>
                                    </br>";
                                }
                            }
                        ?>
                        <h3>Technologien:</h3>
                        <?php echo "<p>$technologies</p>" ?>
                    </div>
                </div>
            </div>
        </article>

        <?php 
            include_once dirname(__DIR__, 1).'/partials/cookie-consent/cookie-consent.php';
            include_once dirname(__DIR__, 1).'/partials/footer/footer.php';
        ?>
        <script src="<?php echo $baseURL?>/js/cookie-consent.js"></script>
    </body>
</html>