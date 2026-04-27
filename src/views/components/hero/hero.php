<section id="hero">
    <div class="hero-bg-grid"></div>
    <div class="hero-glow-orb"></div>

    <div class="hero-inner">
        <div class="hero-text reveal-left">
            <p class="hero-eyebrow">Full-Stack Webentwicklerin</p>
            <h1 class="hero-name">
                <span class="hero-name-first">Ines</span>
                <span class="hero-name-last">Heilmann</span>
            </h1>
            <p class="hero-desc">
                Ich entwickle durchdachte Web&shy;anwendungen — von der Idee bis zur fertigen Lösung, mit Blick für Design und Nutzererfahrung.
            </p>
            <div class="hero-ctas">
                <a href="<?php echo $baseURL?>#projects" class="btn-primary">
                    Projekte ansehen
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="<?php echo $baseURL?>#contact" class="btn-ghost">Kontakt</a>
            </div>
        </div>

        <div class="hero-photo reveal-right">
            <img src="<?php echo $baseURL?>/assets/images/profilbild.webp"
                 alt="Ines Heilmann"
                 width="260" height="260"
                 loading="eager" decoding="async" fetchpriority="high">
        </div>
    </div>

    <div class="hero-scroll-hint" aria-hidden="true">
        <span>SCROLL</span>
        <div class="hero-scroll-line"></div>
    </div>

    <style>
        @keyframes scrollPulse { 0%,100%{opacity:0.3} 50%{opacity:1} }
    </style>
</section>
