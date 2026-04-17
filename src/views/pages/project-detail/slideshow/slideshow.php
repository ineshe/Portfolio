<div class="slideshow-container">

    <div class="slideshow">
        <?php $media = $project->media; ?>

        <?php foreach ($media as $index => $medium): ?>    
            <?php if(substr($medium, -4) == ".mp4"): ?>
                <video class="slide" controls preload="metadata">
                    <source src="<?= $medium ?>" type="video/mp4">
                </video>
            <?php else: ?>
                <img class="slide" src="<?= $medium ?>" alt="" width="960" height="540" loading="<?= $index === 0 ? 'eager' : 'lazy' ?>" decoding="async" fetchpriority="<?= $index === 0 ? 'high' : 'auto' ?>">
            <?php endif; ?>
        <?php endforeach; ?>

    </div>

    <?php if(count($media) > 1): ?>
        <button id="prev">&#10094;</button>
        <button id="next">&#10095;</button>

        <div class="dots">
            <?php for($d = 0; $d < count($media); ++$d): ?>
                <span class="dot-container" id="dot-<?= $d ?>">
                    <span class="dot"></span>
                </span>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

</div>