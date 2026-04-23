<!DOCTYPE html>

<!-- skillset

Sprachwechsel?

LinkedIn, Github -->

<?php
    $pageTitle = 'Ines Heilmann – Full-Stack Webentwicklerin';
    $pageStyles = [
        '/css/components/about-me.css',
        '/css/components/projects.css',
    ];
    $pageScripts = [
        '/js/components/redundant-card-click.js',
    ];
?>
<html lang="de">
    <?php include_once dirname(__DIR__, 2).'/layout/head.php'; ?>
    <body>
        <div class="page">
            <?php include_once dirname(__DIR__, 2).'/components/header/header.php'; ?>
            <main>
                <?php 
                    include_once dirname(__DIR__, 2).'/components/about-me/about-me.php';
                    include_once dirname(__DIR__, 2).'/components/projects/projects.php';
                ?>
            </main>
            <?php 
                include_once dirname(__DIR__, 2).'/components/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 2).'/components/footer/footer.php';
            ?>
        </div>
    </body>
</html>