<?php
    $pageTitle = 'Ines Heilmann – Full-Stack Webentwicklerin';
    $pageStyles = [
        '/css/components/hero.css',
        '/css/components/about-me.css',
        '/css/components/projects.css',
        '/css/components/skills.css',
        '/css/components/contact.css',
        '/css/components/sidebar.css',
    ];
    $pageScripts = [
        '/js/components/scroll-reveal.js',
    ];
?>
<html lang="de">
    <?php include_once dirname(__DIR__, 2).'/layout/head.php'; ?>
    <body>
        <div class="page">
            <?php include_once dirname(__DIR__, 2).'/components/header/header.php'; ?>
            <?php include_once dirname(__DIR__, 2).'/components/sidebar/sidebar.php'; ?>
            <main>
                <?php
                    include_once dirname(__DIR__, 2).'/components/hero/hero.php';
                    include_once dirname(__DIR__, 2).'/components/about-me/about-me.php';
                    include_once dirname(__DIR__, 2).'/components/projects/projects.php';
                    include_once dirname(__DIR__, 2).'/components/skills/skills.php';
                    include_once dirname(__DIR__, 2).'/components/contact/contact.php';
                ?>
            </main>
            <?php
                include_once dirname(__DIR__, 2).'/components/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 2).'/components/footer/footer.php';
            ?>
        </div>
    </body>
</html>
