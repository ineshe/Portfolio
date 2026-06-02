<?php
$skills = [
    'E-Commerce & Backend'  => ['Shopware', 'Symfony', 'PHP', 'MySQL'],
    'Frontend' => ['React', 'JavaScript', 'TypeScript', 'HTML', 'Twig', 'CSS', 'Tailwind CSS', 'Bootstrap'],
    'Tools'    => ['Git', 'Docker', 'Adobe Photoshop']
];
?>

<section id="skills">
    <div class="section-sep"></div>
    <div class="skills-inner">
        <div class="skills-header reveal">
            <p class="section-eyebrow">Technologien</p>
            <h2 class="section-heading">Skills</h2>
        </div>

        <div class="skills-grid">
            <?php foreach ($skills as $category => $items): ?>
            <div class="skill-card reveal">
                <div class="skill-card-top-line"></div>
                <h3 class="skill-category"><?= htmlspecialchars($category) ?></h3>
                <div class="skill-pills">
                    <?php foreach ($items as $item): ?>
                    <span class="skill-pill"><?= htmlspecialchars($item) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
