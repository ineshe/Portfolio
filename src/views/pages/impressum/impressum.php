<?php
    include(dirname(__DIR__, 3).'/config.php');
?>
<!DOCTYPE html>
<?php
    $pageTitle = 'Impressum | Ines Heilmann';
    $pageStyles = [
        '/css/components/projects.css',
    ];
    $pageScripts = [
        '/js/components/mail-obfuscation.js',
    ];
?>
<html lang="de">
    <?php include_once dirname(__DIR__, 2).'/layout/head.php'; ?>
    <body>
        <div class="page">
            <?php
                include_once dirname(__DIR__, 2).'/components/header/header.php';
            ?>
            <main>
                <article id="project" class="section">
                    <div class="content">
                        <h2 class="section-heading">Impressum</h2>
                        <div class="grid">
                            <h3>Angaben gemäß § 5 DDG</h3>
                            <p>Ines Heilmann<br> 
                                Neugasse 11<br> 
                                09306 Königsfeld<br> 
                            </p>
                            <h3>Kontakt:</h3>
                            <p>
                                Telefon: <a href="tel:+4917655923795">+49 176 55923795</a><br>
                                E-Mail: <span class="js-mail" data-user="tcatnoc" data-domain="ed.nnamlieh-seni"><noscript>contact (at) ines-heilmann.de</noscript></span>
                            </p>
                            <h3>Haftungsausschluss: </h3>
                            <p>

                                <strong>Haftung für Links</strong><br>
                                Mein Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte ich
                                keinen Einfluss habe. Deshalb kann ich für diese fremden Inhalte auch keine
                                Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige
                                Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden
                                zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige
                                Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente
                                inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte
                                einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen
                                werde ich derartige Links umgehend entfernen.<br><br>

                                <strong>Urheberrecht</strong><br>
                                Die von mir erstellten Inhalte und Werke auf diesen Seiten
                                unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung,
                                Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes
                                bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.
                                Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen
                                Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht von mir erstellt
                                wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter
                                als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung
                                aufmerksam werden, bitte ich um einen entsprechenden Hinweis. Bei Bekanntwerden von
                                Rechtsverletzungen werde ich derartige Inhalte umgehend entfernen.<br><br>

                                <strong>Datenschutz</strong><br>
                                Welche personenbezogenen Daten ich zu welchen Zwecken, auf welcher Rechtsgrundlage
                                und für welche Dauer verarbeite, erläutere ich ausführlich in meiner
                                <a href="<?php echo $baseURL?>/datenschutz">Datenschutzerklärung</a>.<br><br>

                                <strong>Widerspruch gegen Werbe-E-Mails</strong><br>
                                Der Nutzung von im Rahmen der Impressumspflicht veröffentlichten Kontaktdaten durch
                                Dritte zur Übersendung von nicht ausdrücklich angeforderter Werbung und
                                Informationsmaterialien wird hiermit ausdrücklich widersprochen. Ich behalte mir
                                ausdrücklich rechtliche Schritte im Falle der unverlangten Zusendung von
                                Werbeinformationen, etwa durch Spam-Mails, vor.<br>
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
                include_once dirname(__DIR__, 2).'/components/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 2).'/components/footer/footer.php';
            ?>
        </div>
    </body>
</html>