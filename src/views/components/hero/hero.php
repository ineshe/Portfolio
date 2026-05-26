<section id="hero" class="hero">
    <div class="dot-pattern"></div>
    <div class="hero__glow-orb"></div>

    <div class="hero__inner">
        <div class="hero__text reveal-left">
            <p class="hero__eyebrow">Full-Stack Webentwicklerin</p>
            <h1 class="hero__name">
                <span class="hero__name-first">Ines</span>
                <span class="hero__name-last">Heilmann</span>
            </h1>
            <p class="hero__desc">
                Ich entwickle durchdachte Webanwendungen von der Idee bis zur fertigen Lösung. Mit Blick für Design und Nutzererfahrung.
            </p>
            <div class="hero__action">
                <a href="<?php echo $baseURL?>#projects" class="btn-primary">
                    Projekte ansehen
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        <div class="hero__photo reveal-right">
            <img src="<?php echo $baseURL?>/assets/images/profilbild.webp"
                 alt="Ines Heilmann"
                 width="260" height="260"
                 loading="eager" decoding="async" fetchpriority="high">
        </div>
    </div>

    <div class="hero__scroll-hint" aria-hidden="true">
        <span>SCROLL</span>
        <div class="hero__scroll-line"></div>
    </div>

    <style>
        @keyframes scrollPulse { 0%,100%{opacity:0.3} 50%{opacity:1} }
    </style>
</section>
