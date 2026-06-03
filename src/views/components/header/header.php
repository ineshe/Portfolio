<header class="top-bar">
    <div class="content">
        <button id="hamburger" aria-label="Navigation öffnen" aria-expanded="false">
            <span class="line line-1"></span>
            <span class="line line-2"></span>
            <span class="line line-3"></span>
        </button>
        <nav class="navigation" id="main-nav">
            <ul class="menu">
                <li><a class="menu__link" href="<?php echo $baseURL?>#projects">Projekte</a></li>
                <li><a class="menu__link" href="<?php echo $baseURL?>#about">Über mich</a></li>
                <li><a class="menu__link" href="<?php echo $baseURL?>#skills">Skills</a></li>
                <li><a class="menu__link" href="<?php echo $baseURL?>#contact">Kontakt</a></li>
            </ul>
        </nav>
        <a href="https://github.com/ineshe" target="_blank" rel="noreferrer" class="header-github" aria-label="GitHub">
            <?php include __DIR__ . '/../../../../public/assets/icons/github.svg'; ?>
        </a>
    </div>
</header>
