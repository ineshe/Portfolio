<?php

// Konfigurationsdatei mit Projekttexten

$projects = array(
    '1' => array(
        'title' => 'DDOptics',
        'subline' => 'Landingpage für Ferngläser, die für die Vogelbeobachtung genutzt werden können.',
        'media' => array(
            '../../../assets/projects/ddoptics/landingpage_wz_s1.jpg',
            '../../../assets/projects/ddoptics/landingpage_wz_s2.jpg',
            '../../../assets/projects/ddoptics/landingpage_wz_s3.jpg',
            '../../../assets/projects/ddoptics/landingpage_wz_s4.jpg',
            '../../../assets/projects/ddoptics/landingpage_wz_s5.jpg'
        ),
        'buttons' => array(
            array(
                'link' => '../../../assets/projects/ddoptics/landingpage_wz.jpg',
                'target' => '_blank',
                'text' => 'Zum Design'
            )
        ),
        'description' => '<p>Während meines zweiwöchigen Praktikums bei DDOptics in Chemnitz erarbeitete ich ein Design für eine Landingpage eines Onlineshops. Auf dieser Seite sollten die Ferngläser des Unternehmens präsentiert werden, welche sich am besten für Vogel- und Naturbeobachtungen eignen. Bei der Umsetzung arbeitete ich mit Shopware.</p>',
        'technologies' => 'HTML, CSS, Javascript, Shopware, Adobe Photoshop'
    ),
    '2' => array(
        'title' => 'Gesine',
        'subline' => 'Webanwendung zur Information und Beratung im Bereich Arbeitsschutz und Gesundheitsmanagement.',
        'media' => array(
            '../../../assets/projects/gesine/gesine-960X540-1.png',
            '../../../assets/projects/gesine/gesine-960X540-2.png'
        ),
        'buttons' => array(
            array(
                'link' => '../../../assets/projects/gesine/praktikumszeugnis-visualworld.pdf',
                'target' => '_blank',
                'text' => 'Praktikumszeugnis'
            ),
            array(
                'link' => '../../../assets/projects/gesine/bedienungsanleitung.pdf',
                'target' => '_blank',
                'text' => 'Handbuch'
            )
        ),
        'description' => '<p>Dieses Projekt wurde von mir während meines Praktikums bei der Visual World GmbH in Chemnitz bearbeitet. Es sollte eine Webanwendung entwickelt werden, welche die Zusammenarbeit zwischen Unternehmen mit ausgebildeten Beratern zum Arbeitsschutz und Gesundheitsmanagement erleichtert. Für  eine Bestandsaufnahme sollten dazu eine Checkliste ausgefüllt  sowie eine Mitarbeiterbefragung durchgeführt werden können. Die  Ergebnisse daraus sollten anschließend zur Ermittlung geeigneter Maßnahmen herangezogen werden.</p> <h3>Ablauf des Praktikums:</h3> <p>Innerhalb des 3-monatigen Praktikums sollten dazu zunächst ein  Logo sowie eine Corporate Identity entwickelt werden. Danach  sollten im Rahmen der Konzeption die Anforderungen ermittelt und  ein Lasten- und Pflichtenheft formuliert werden. Darauf folgte  die Entwicklungsphase des Prototyps mit anschließender Dokumentation durch ein Benutzerhandbuch.</p>',
        'technologies' => 'HTML, SASS, Angular, Typescript, Bootstrap'
    ),
    '3' => array(
        'title' => 'ShepherdSim',
        'subline' => 'Top-Down-Simulationsspiel, bei dem der Spieler in der Rolle des Schäfers seine Herde in den Stall treibt.',
        'media' => array(
            '../../../assets/projects/shepherd/ShepherdSim-2021-05-17.mp4'
        ),
        'buttons' => array(
            array(
                'link' => 'https://github.com/ineshe/ShepherdSim',
                'target' => '_blank',
                'text' => 'Git Repo'
            )
        ),
        'description' => '<p>Dieses Spiel ist das richtige für diejenigen, die gern mal in die Rolle eines Schäfers schlüpfen möchten, der seine Schafe am Abend wieder in den Stall treiben muss. Es handelt sich hierbei um ein Top-Down-Simulationsspiel.</p> <p>Dieses Projekt entstand als Belegarbeit innerhalb meines Studiums. Dabei sollte ein Spielekonzept umgesetzt werden, welches Partikel oder Partikelsysteme enthält.</p> <h3>Funktionsweise:</h3> <p>Zu Spielbeginn erscheinen die Charaktere zufällig auf dem Spielfeld. Die Schafe, welche sich im Ruhezustand befinden, bewegen sich zufällig über die Wiese und bleiben zeitweilig stehen zum Fressen. Halten sich Schäfer oder Hund in ihrer Nähe auf sind sie wachsam und suchen den Schutz der Herde. In diesem Zustand bewegen sie sich schneller und legen keine Pausen zum Fressen ein. Der Schäfer kann die Schafe nun führen, indem er voran läuft. Der Hund ist dem Schäfer dabei eine große Hilfe. Er kann sich schneller bewegen und die Schafe haben Angst vor ihm, wodurch er sie vor sich hertreiben kann.</p> <h3>Steuerung:</h3> <p><span class="primary-3">WASD</span> &rarr; Steuerung Schäfer</p> <p><span class="primary-3">Linke Maustaste</span> &rarr; Steuerung Hund</p> <p><span class="primary-3">P</span> &rarr; Pausieren/Pause beenden</p>',
        'technologies' => 'Processing'
    ),
    '4' => array(
        'title' => 'Permutator',
        'subline' => 'Ein Tool, das alle möglichen Anordungen von Buchstaben eines Wortes findet und anzeigt.',
        'media' => array(
            '../../../assets/projects/permutator/permutator-960X540.png'
        ),
        'buttons' => array(
            array(
                'link' => 'https://github.com/ineshe/Permutator.git',
                'target' => '_blank',
                'text' => 'Git Repo'
            )
        ),
        'description' => ' <p>Was haben Petihanse, Nepathise und Hepenatis gemeinsam? Weder handelt es sich hierbei um die Namen von Medikamenten, noch um ägyptische Pharaonen. Viel mehr handelt es sich um 3 von 181.440 Permutationen die sich aus dem Namen &bdquo;Stephanie&ldquo; bilden lassen. Mit dieser Anwendung kannst du das auch mit deinem eigenen Namen ausprobieren. Viel Spaß!</p>',
        'technologies' => 'JavaScript, HTML, CSS'
    ),
    '5' => array(
        'title' => 'Recines',
        'subline' => 'Webanwendung für die Anzeige von Rezepten.',
        'media' => array(
            '../../../assets/projects/recines/recines-960X540-1.webp',
            '../../../assets/projects/recines/recines-960X540-2.webp',
            '../../../assets/projects/recines/recines-960X540-3.webp',
            '../../../assets/projects/recines/recines-960X540-4.webp'
        ),
        'buttons' => array(
            array(
                'link' => 'https://github.com/ineshe/recipes-manager.git',
                'target' => '_blank',
                'text' => 'Git Repo'
            ),
            array(
                'link' => 'https://recines.ines-heilmann.de',
                'target' => '_blank',
                'text' => 'Zur Seite'
            )
        ),
        'description' => '<p>Recines zeigt Rezepte an. Diese sind Kategorien zugeordnet und mit der integrierten Suchfunktion kann in der Sammlung nach Rezepten gesucht werden, die den Suchbegriff im Titel enthalten oder in der Zutatenliste.</p>',
        'description' => '<p>Diese Webanwendung bietet eine übersichtliche und optisch ansprechende Plattform zur Darstellung von Rezepten. Die Rezepte sind spezifischen Kategorien zugeordnet, die im Hauptmenü gelistet sind. Die Startseite zeigt eine Auswahl aller Rezepte, sodass Besucher schnell auf eine Vielfalt an Ideen zugreifen können.</p><p>Besonders hervorzuheben ist die integrierte Suchfunktion, die Rezepte anhand des Titels oder der Zutatenliste findet – ideal, um schnell Rezepte mit Zutaten zu finden, die bereits zur Hand sind.</p>',
        'technologies' => 'Symfony, Tailwind, MariaDB'
    ),    
);

?>
