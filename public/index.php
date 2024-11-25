<?php 
    // include("includes/contact/mail.php");
    // define('MAIN_KEY', '6LendDkbAAAAAA1CvarNjpew0sDXJ1hzLa2wMeal');
    // define('DEV_KEY', '6LcG6T4bAAAAALAUT6mx6aoxEfDzT4GjdFJ3ZUh-');
    require_once dirname(__DIR__, 1).'/src/config.php';
?>

<!DOCTYPE html>

<!-- skillset

Sprachwechsel?

LinkedIn, Github -->

<html lang="de">
    <head>
        <title>Ines Heilmann</title>
        <base href="<?php $baseURL ?>"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo $baseURL?>/css/about-me.css">
        <link rel="stylesheet" href="<?php echo $baseURL?>/css/projects.css">
        <?php
            include_once dirname(__DIR__, 1).'/src/views/global-styles.php';
        
            if ($isDevelopment === true) {
                echo '<script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>';
            }
        ?>
        <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
        <!-- <script src="includes/contact/validation.js" defer></script> -->
        <script src="<?php echo $baseURL?>/js/navigation.js" defer></script>

        
    </head>
    <body>
        <?php             
            include_once dirname(__DIR__, 1).'/src/views/partials/header/header.php';
            include_once dirname(__DIR__, 1).'/src/views/partials/about-me/about-me.php';
            include_once dirname(__DIR__, 1).'/src/views/partials/projects/projects.php';
            include_once dirname(__DIR__, 1).'/src/views/partials/cookie-consent/cookie-consent.php';
            include_once dirname(__DIR__, 1).'/src/views/partials/footer/footer.php';
        ?>
        <script src="<?php echo $baseURL?>/js/cookie-consent.js"></script>
    </body>
</html>