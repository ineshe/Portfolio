<?php 
    include("php/mail.php");
    define('MAIN_KEY', '6LendDkbAAAAAA1CvarNjpew0sDXJ1hzLa2wMeal');
    define('DEV_KEY', '6LcG6T4bAAAAALAUT6mx6aoxEfDzT4GjdFJ3ZUh-');
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <title>Ines Heilmann</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/normalize.css">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/nav.css">
        <link rel="stylesheet" href="styles/about.css">
        <link rel="stylesheet" href="styles/projects.css">
        <link rel="stylesheet" href="styles/contact.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="navigation.js" defer></script>
        <script src="validation.js" defer></script>
    </head>
    <body>
        <header>
            <div id="header-content">
                <h1>Ines&nbsp;Heilmann - Frontend Entwicklung</h1>
                <input id="hamburger" type="image" src="data/hamburger.png"/>
                <nav>
                    <a href="#about-me">Über&nbsp;mich</a>
                    <a href="#projects">Projekte</a>
                    <a href="#contact">Kontakt</a>
                </nav>
            </div>
        </header>
        <article id="about-me">
            <img class="picture" src="data/dummy/cv-picture.png" alt="">
            <h2>Ines Heilmann<br>Frontend Entwicklerin</h2>
            <p>Guten Tag! Mein Name ist Ines und ich beschäftige mich 
                seit meinem Abschluss im Fach &bdquo;Medieninformatik&ldquo; an der 
                Hochschule Mittweida mit der Entwicklung von Webanwendungen. 
                Dank meiner Ausbildung als &bdquo;gestaltungstechnische Assistentin&ldquo;
                bringe ich dafür neben dem technischen Know&#8209;how auch ein 
                Gespür für gutes Design mit. Das Lösen von Programmierproblemen
                gehört so wie das Lösen von Kreuzworträtseln in meiner Freizeit 
                zu meinen Leidenschaften.</p>
        </article>
        <article id="projects">
            <div id="projects-num-info">Projekte (3)</div>
            <div id="projects-content">
                <section>
                    <a href="projects/gesine.html">
                    <img class="picture border" src="data/gesine/gesine-300X200.png" alt="">
                    <h2>Gesine</h2>
                    <p>Dieses Projekt wurde von mir während meines Praktikums bei der
                        Visual World GmbH in Chemnitz bearbeitet. Es sollte eine 
                        Webanwendung entwickelt werden, welche die Zusammenarbeit 
                        zwischen Unternehmen mit ausgebildeten Beratern zum 
                        Arbeitsschutz und Gesundheitsmanagement erleichtert. Für 
                        eine Bestandsaufnahme sollten dazu eine Checkliste ausgefüllt 
                        sowie eine Mitarbeiterbefragung durchgeführt werden können. Die 
                        Ergebnisse daraus sollten anschließend zur Ermittlung geeigneter 
                        Maßnahmen herangezogen werden.</p>
                    </a>
                </section>
                <section>
                    <a href="projects/shepherd.html">
                    <img class="picture" src="data/shepherd/shepherd-300X200.png" alt="">
                    <h2>ShepherdSim</h2>
                    <p>Dieses Spiel ist das richtige für diejenigen, die gern mal in die
                        Rolle eines Schäfers schlüpfen möchten, der seine Schafe am Abend
                        wieder in den Stall treiben muss. Es handelt sich hierbei um ein 
                        Top-Down-Simulationsspiel.</p>
                    <!-- <span class="btn-demo">+ Live Demo</span> -->
                    </a>
                </section>  
                <section>
                    <a href="projects/permutator.html">
                    <img class="picture" src="data/permutator/permutator-300X200.png" alt="">
                    <h2>Permutator</h2>
                    <p>Was haben Petihanse, Nepathise und Hepenatis gemeinsam?
                        Weder handelt es sich hierbei um die Namen von Medikamenten,
                        noch um ägyptische Pharaonen. Viel mehr handelt es sich um
                        3 von 181.440 Permutationen die sich aus dem Namen 
                        &bdquo;Stephanie&ldquo; bilden lassen. Mit dieser Anwendung
                        kannst du das auch mit deinem eigenen Namen ausprobieren.
                        Viel Spaß!</p>
                    </a>    
                    <a class="source" href='https://de.freepik.com/fotos/werkzeuge'>Foto: azerbaijan_stockers - de.freepik.com</a>  
                </section>              
                

                <!-- <section>
                    <img class="picture" src="data/dummy2-228X152.png" alt="">
                    <h2>Titel Projekt</h2>
                    <p>Li nov lingua franca va esser plu simplic e regulari quam 
                        li existent Europan lingues. It va esser tam simplic quam 
                        Occidental in fact, it va esser Occidental. A un Angleso 
                        it va semblar.</p>
                </section>
                <section>
                    <img class="picture" src="data/dummy3-228X152.png" alt="">
                    <h2>Titel Projekt</h2>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                        sed diam nonumy eirmod tempor invidunt ut labore.</p>
                </section>
                <section>
                    <img class="picture" src="data/dummy1-228X152.png" alt="">
                    <h2>Titel Projekt</h2>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                        sed diam nonumy eirmod tempor invidunt ut labore. Li 
                        Europan lingues es membres del sam familie. Lor separat 
                        existentie es un myth. Por scientie, musica, sport etc, 
                        litot Europa usa li sam vocabular.</p>
                </section>
                <section>
                    <img class="picture" src="data/dummy2-228X152.png" alt="">
                    <h2>Titel Projekt</h2>
                    <p>Li nov lingua franca va esser plu simplic e regulari quam 
                        li existent Europan lingues. It va esser tam simplic quam 
                        Occidental in fact, it va esser Occidental. A un Angleso 
                        it va semblar.</p>
                </section>
                <section>
                    <img class="picture" src="data/dummy3-228X152.png" alt="">
                    <h2>Titel Projekt</h2>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                        sed diam nonumy eirmod tempor invidunt ut labore.</p>
                </section> -->                 
            </div>
        </article>
        <article id="contact">
            <h2>Kontakt</h2>
            <form action="" method="POST" novalidate>
                <div class="radio-buttons">
                    <label for="male">Herr
                        <input type="radio" id="male" name="salutation" value="Herr">
                        <span class="my-radio"></span>
                    </label>
                    <label for="female">Frau
                        <input type="radio" id="female" name="salutation" value="Frau">
                        <span class="my-radio"></span>
                    </label>
                </div>

                <p class="error">Errormessage wird hier ausgegeben.</p>
                <label for="fname">Vorname*:</label><!-- 
             --><input type="text" id= "fname" name="fname" required pattern='^[^0-9!"§$%&/()=?²³{}\[\]\\@€~#<>|,;.:_*-+]{1,30}$'>
                
                <p class="error">Errormessage wird hier ausgegeben.</p>
                <label for="lname">Nachname*:</label><!-- 
             --><input type="text" id= "lname" name="lname" required pattern='^[^0-9!"§$%&/()=?²³{}\[\]\\@€~#<>|,;.:_*-+]{1,30}$'>
                
                <p class="error">Errormessage wird hier ausgegeben.</p>
                <label for="email">E-Mail*:</label><!-- 
             --><input type="email" id="email" name="email" required>                    

                <p class="error">Errormessage wird hier ausgegeben.</p>
                <label for="message">Nachricht*:</label><!-- 
             --><textarea id="message" name="message" rows="5" required></textarea>
                
                <button class="btn g-recaptcha" type="submit" name="submitBtn" 
                    data-sitekey="<?php echo DEV_KEY; ?>" data-callback='onSubmit' data-action='homepage'>Senden</button>
                <?php
                    if (isset($_SESSION['confirm'])) {
                        echo $_SESSION['confirm'];
                        unset($_SESSION['confirm']);
                    }
                ?>
            </form>
        </article>
    </body>
</html>