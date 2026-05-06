<?php
/** @var array $project */
$media = $project['media']; $count = count($media);
?>
<div class="slideshow-container" aria-roledescription="carousel">

    <div class="slideshow">
        <?php foreach ($media as $index => $medium): ?>
            <?php if (substr($medium, -4) === '.mp4'): ?>
                <video class="slide<?= $index === 0 ? ' active' : '' ?>" controls preload="metadata">
                    <source src="<?= htmlspecialchars($medium, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                </video>
            <?php else: ?>
                <img class="slide<?= $index === 0 ? ' active' : '' ?>"
                     src="<?= htmlspecialchars($medium, ENT_QUOTES, 'UTF-8') ?>"
                     alt="" width="960" height="540"
                     loading="<?= $index === 0 ? 'eager' : 'lazy' ?>"
                     decoding="async"
                     fetchpriority="<?= $index === 0 ? 'high' : 'auto' ?>">
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <?php if ($count > 1): ?>
        <div class="slideshow-controls">
            <span class="slideshow-controls__counter">
                <strong id="slide-cur">1</strong> / <span id="slide-tot"><?= $count ?></span>
            </span>
            <div class="slideshow-controls__center">
                <div class="dots" role="tablist">
                    <?php for ($d = 0; $d < $count; ++$d): ?>
                        <button class="dot-container<?= $d === 0 ? ' active' : '' ?>" aria-label="Bild <?= $d + 1 ?>">
                            <span class="dot"></span>
                        </button>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="slideshow-controls__nav">
                <button class="slide-nav" id="prev" aria-label="Vorheriges Bild">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
                </button>
                <button class="slide-nav" id="next" aria-label="Nächstes Bild">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
                </button>
            </div>
        </div>
    <?php endif; ?>

</div>
