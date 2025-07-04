<!DOCTYPE html>
<?php 
    include(dirname(__DIR__, 2).'/config.php');
?>
<html lang="de">
    <head>
        <title>Impressum | Ines Heilmann</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            include_once dirname(__DIR__, 1).'/global-styles.php';
        
            if ($isDevelopment === true) {
                echo '<script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>';
            }
        ?>
        <link rel="stylesheet" href="<?= $baseURL ?>/css/projects.css">
        <script src="<?= $baseURL ?>/js/navigation.js" defer></script>
        <script src="<?= $baseURL ?>/js/cookie-consent.js" defer></script>
    </head>
    <body>
        <div class="page">
            <?php
                include_once dirname(__DIR__, 1).'/partials/header/header.php';
            ?>
            <main>
                <article id="project" class="section">
                    <div class="content">
                        <h2>Impressum</h2>
                        <div class="grid">
                            <h3>Angaben gemäß § 5 TMG</h3>
                            <p>Ines Heilmann<br> 
                                Waldstraße 8<br> 
                                12487 Berlin<br> 
                            </p>
                            <p><h3>Vertreten durch:</h3>
                                Ines Heilmann
                            </p>
                            <p><h3>Kontakt:</h3>
                                Telefon: +49 176 55923795<br>
                                E-Mail: <a href='mailto:contact@ines-heilmann.de'>contact@ines-heilmann.de</a></br>
                            </p>
                            <p><h3>Haftungsausschluss: </h3>

                                <strong>Haftung für Links</strong><br>
                                Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir
                                keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine
                                Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige
                                Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden
                                zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige
                                Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente
                                inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte
                                einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen
                                werden wir derartige Links umgehend entfernen.<br><br>

                                <strong>Urheberrecht</strong><br>
                                Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten
                                unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung,
                                Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes
                                bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.
                                Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen
                                Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt
                                wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter
                                als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung
                                aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von
                                Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.<br><br>

                                <strong>Datenschutz</strong><br>
                                Die Nutzung unserer Webseite ist in der Regel ohne Angabe personenbezogener Daten
                                möglich. Soweit auf unseren Seiten personenbezogene Daten (beispielsweise Name,
                                Anschrift oder eMail-Adressen) erhoben werden, erfolgt dies, soweit möglich,
                                stets auf freiwilliger Basis. Diese Daten werden ohne Ihre ausdrückliche Zustimmung
                                nicht an Dritte weitergegeben.<br>
                                Wir weisen darauf hin, dass die Datenübertragung im Internet (z.B. bei der
                                Kommunikation per E-Mail) Sicherheitslücken aufweisen kann. Ein lückenloser
                                Schutz der Daten vor dem Zugriff durch Dritte ist nicht möglich.<br>
                                Der Nutzung von im Rahmen der Impressumspflicht veröffentlichten Kontaktdaten durch
                                Dritte zur Übersendung von nicht ausdrücklich angeforderter Werbung und
                                Informationsmaterialien wird hiermit ausdrücklich widersprochen. Die Betreiber der
                                Seiten behalten sich ausdrücklich rechtliche Schritte im Falle der unverlangten
                                Zusendung von Werbeinformationen, etwa durch Spam-Mails, vor.<br>
                            </p>
                            <p>
                                Website Impressum erstellt durch 
                                <a href="https://www.impressum-generator.de">impressum-generator.de</a> von der
                                <a href="https://www.kanzlei-hasselbach.de/" rel="nofollow">Kanzlei Hasselbach</a>
                            </p>
                        </div>
                    </div>
                </article>
            </main>
            <?php 
                include_once dirname(__DIR__, 1).'/partials/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 1).'/partials/footer/footer.php';
            ?>
        </div>
    </body>
</html>