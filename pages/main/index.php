<?php 
    // include("includes/contact/mail.php");
    // define('MAIN_KEY', '6LendDkbAAAAAA1CvarNjpew0sDXJ1hzLa2wMeal');
    // define('DEV_KEY', '6LcG6T4bAAAAALAUT6mx6aoxEfDzT4GjdFJ3ZUh-');

    include(dirname(__DIR__, 2).'/config.php');
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
        <link rel="stylesheet" href="<?php echo $baseURL . '/pages/main/normalize.css'?>">
        <link rel="stylesheet" href="<?php echo $baseURL . '/pages/main/style.css'?>">
        <link rel="stylesheet" href="<?php echo $baseURL . '/pages/main/includes/header/header.css'?>">
        <link rel="stylesheet" href="<?php echo $baseURL . '/pages/main/includes/about-me/about-me.css'?>">
        <link rel="stylesheet" href="<?php echo $baseURL . '/pages/main/includes/projects/projects.css'?>">
        <link rel="stylesheet" href="<?php echo $baseURL . '/pages/main/includes/contact/contact.css'?>">
        <link rel="stylesheet" href="<?php echo $baseURL . '/pages/main/includes/footer/footer.css'?>">
        <link rel="stylesheet" href="<?php echo $baseURL . '/pages/main/includes/cookie-consent/cookie-consent.css'?>">
        <script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="<?php echo $baseURL . '/pages/main/navigation.js'?>" defer></script>

        <!-- <script src="includes/contact/validation.js" defer></script> -->
    </head>
    <body>
        <?php 
            include("includes/header/header.php");
        ?>
        <?php 
            include("includes/about-me/about-me.php");
        ?>
        <?php 
            include("includes/projects/projects.php");
        ?>
        <?php 
            include("includes/cookie-consent/cookie-consent.php");
        ?>
        <?php 
            include("includes/footer/footer.php");
        ?>

        <script src="<?php echo $baseURL . '/pages/main/includes/cookie-consent/cookie-consent.js'?>"></script>
    </body>
</html>