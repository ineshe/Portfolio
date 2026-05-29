<?php
    require_once dirname(__DIR__, 3).'/config.php';
    $pageTitle = '404 – Seite nicht gefunden | Ines Heilmann';
    $pageStyles = [];
?>
<!DOCTYPE html>
<html lang="de">
    <?php include_once dirname(__DIR__, 2).'/layout/head.php'; ?>
    <body>
        <div class="page">
            <?php include_once dirname(__DIR__, 2).'/components/header/header.php'; ?>
            <main>
                <article class="section">
                    <div class="content">
                        <p class="section-eyebrow">404</p>
                        <h2>Seite nicht gefunden<span class="accent">.</span></h2>
                        <p>Die gesuchte Seite existiert nicht oder wurde verschoben.</p>
                        <a class="btn-primary" href="/" style="margin-top:2rem">
                            Zur Startseite
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>
            </main>
            <?php
                include_once dirname(__DIR__, 2).'/components/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 2).'/components/footer/footer.php';
            ?>
        </div>
    </body>
</html>
