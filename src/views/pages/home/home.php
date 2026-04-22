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
            <?php include_once dirname(__DIR__, 2).'/partials/header/header.php'; ?>
            <main>
                <?php 
                    include_once dirname(__DIR__, 2).'/partials/about-me/about-me.php';
                    include_once dirname(__DIR__, 2).'/partials/projects/projects.php';
                ?>
            </main>
            <?php 
                include_once dirname(__DIR__, 2).'/partials/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 2).'/partials/footer/footer.php';
            ?>
        </div>
    </body>
</html>