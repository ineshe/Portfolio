<!DOCTYPE html>

<html lang="de">
    <head>
        <title>Weitere Projekte | Ines Heilmann – Full-Stack Webentwicklerin</title>
        <base href="<?php $baseURL ?>"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            include_once dirname(__DIR__, 1).'/global-styles.php';
        
            if ($isDevelopment === true) {
                echo '<script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>';
            }
        ?>
        <link rel="stylesheet" href="<?= $baseURL ?>/css/projects.css">
        <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
        <!-- <script src="includes/contact/validation.js" defer></script> -->
        <script src="<?= $baseURL ?>/js/navigation.js" defer></script>
        <script src="<?= $baseURL ?>/js/cookie-consent.js" defer></script>
    </head>
    <body>
        <div class="page">
            <?php include_once dirname(__DIR__, 1).'/partials/header/header.php'; ?>
            <main>
                <section id="projects" class="section">
                    <div class="content">
                        <h2 class="section-title"> Weitere Projekte</h2>
                        <div class="project-cards">
                            <section class="project">
                                <a href="<?php echo $baseURL?>/project/ddoptics">
                                    <img class="card-img" src="<?php echo $baseURL?>/assets/projects/ddoptics/vogel-300X200.png" alt="">
                                    <div class="card-text">
                                        <h3 class="project-title">DDOptics</h3>
                                        <p>Landingpage für Ferngläser, die für die Vogelbeobachtung genutzt werden können.</p>
                                    </div>
                                </a>
                            </section>
                            <section class="project">
                                <a href="<?php echo $baseURL?>/project/gesine">
                                    <img class="card-img white" src="<?php echo $baseURL?>/assets/projects/gesine/gesine-300X200.png" alt="">
                                    <div class="card-text">
                                        <h3 class="project-title">Gesine</h3>
                                        <p>Webanwendung zur Information und Beratung im Bereich Arbeitsschutz und Gesundheitsmanagement.</p>
                                    </div>
                                </a>
                            </section>
                            <section class="project">
                                <a href="<?php echo $baseURL?>/project/shepherd-sim">
                                    <img class="card-img" src="<?php echo $baseURL?>/assets/projects/shepherd/shepherd-300X200.png" alt="">
                                    <div class="card-text">
                                        <h3 class="project-title">ShepherdSim</h3>
                                        <p>Top-Down-Simulationsspiel, bei dem der Spieler in der Rolle des Schäfers seine Herde in den Stall treibt.</p>
                                    </div>    
                                </a>
                            </section>  
                            <section class="project">
                                <a href="<?php echo $baseURL?>/project/permutator">
                                    <img class="card-img" src="<?php echo $baseURL?>/assets/projects/permutator/permutator-300X200.png" alt="">
                                    <div class="card-text">
                                        <h3 class="project-title">Permutator</h3>
                                        <p>Ein Tool, das alle möglichen Anordungen von Buchstaben eines Wortes findet und anzeigt.</p>
                                    </div>
                                </a> 
                                <a class="source" href='https://de.freepik.com/fotos/werkzeuge'>Foto: azerbaijan_stockers - de.freepik.com</a>
                            </section>
                        </div> 
                    </div>
                </section>
            </main>
            <?php 
                include_once dirname(__DIR__, 1).'/partials/cookie-consent/cookie-consent.php';
                include_once dirname(__DIR__, 1).'/partials/footer/footer.php';
            ?>
        </div>
    </body>
</html>