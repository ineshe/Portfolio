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
        <footer>
            <!-- <a href="/">Bildnachweise</a> -->
            <a href="<?php echo $baseURL . '/pages/impressum/impressum.php'?>">Impressum</a>
        </footer>

        <script>
            function acceptCookies() {
                document.getElementById('cookie-banner').style.display = 'none';
                localStorage.setItem('cookiesAccepted', 'true');
                loadGoogleAnalytics();
            }

            function declineCookies() {
                document.getElementById('cookie-banner').style.display = 'none';
                localStorage.setItem('cookiesAccepted', 'false');
            }

            function loadGoogleAnalytics() {
                var script1 = document.createElement('script');
                script1.src = "https://www.googletagmanager.com/gtag/js?id=G-Y4LB5LLVVS";
                script1.async = true;
                document.head.appendChild(script1);

                script1.onload = function() {
                    var script2 = document.createElement('script');
                    script2.innerHTML = `
                        window.dataLayer = window.dataLayer || [];
                        function gtag(){dataLayer.push(arguments);}
                        gtag('js', new Date());
                        gtag('config', 'G-Y4LB5LLVVS');
                    `;
                    document.head.appendChild(script2);
                };
            }

            window.onload = function() {
                var consent = localStorage.getItem('cookiesAccepted');


                if (consent === 'true') {
                    loadGoogleAnalytics();
                } else if (consent === null) {
                    document.getElementById('cookie-banner').style.display = 'block';
                }
            };
        </script>
    </body>
</html>