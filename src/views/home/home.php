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
?>
<html lang="de">
    <?php include_once dirname(__DIR__, 1).'/layout/head.php'; ?>
    <body>
        <div class="page">
            <?php include_once dirname(__DIR__, 1).'/partials/header/header.php'; ?>
            <main>
                <?php 
                    include_once dirname(__DIR__, 1).'/partials/about-me/about-me.php';
                    include_once dirname(__DIR__, 1).'/partials/projects/projects.php';
                ?>
            </main>
            <?php 
                include_once dirname(__DIR__, 1).'/partials/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 1).'/partials/footer/footer.php';
            ?>
        </div>
    </body>
</html>