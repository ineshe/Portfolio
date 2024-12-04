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
            include_once dirname(__DIR__, 1).'/global-styles.php';
        
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
            include_once dirname(__DIR__, 1).'/partials/header/header.php';
            include_once dirname(__DIR__, 1).'/partials/about-me/about-me.php';
            include_once dirname(__DIR__, 1).'/partials/projects/projects.php';
            include_once dirname(__DIR__, 1).'/partials/cookie-consent/cookie-consent.php';
            include_once dirname(__DIR__, 1).'/partials/footer/footer.php';
        ?>
        <script src="<?php echo $baseURL?>/js/cookie-consent.js"></script>
    </body>
</html>