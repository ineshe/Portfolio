<?php
    $projects = json_decode(file_get_contents(__DIR__ . "/../../../data/projects.json"), true);
?>

<section id="projects">
    <div class="section-sep"></div>
    <div class="projects-inner">
        <div class="projects-header reveal">
            <p class="section-eyebrow">Ausgewählte Arbeiten</p>
            <h2 class="section-heading">Projekte</h2>
        </div>

        <ul class="project-cards">
            <?php
                if (isset($projects)):
                    foreach ($projects as $project):
                        if ($project['visibility'] == "1"):
                            $techItems = $project['tech'] ?? [];
                            $techJson = htmlspecialchars(json_encode($techItems), ENT_QUOTES, 'UTF-8');
            ?>
            <li class="project-item reveal">
                <article class="project-card" data-href="<?= htmlspecialchars($baseURL . '/project/' . $project['slug']) ?>">
                    <div class="project-img-wrap">
                        <img src="<?= htmlspecialchars($baseURL . $project['mainImage']) ?>"
                             alt="<?= htmlspecialchars($project['title']) ?>"
                             height="200" width="300"
                             loading="eager" decoding="async">
                        <div class="project-img-overlay"></div>
                        <?php if (!empty($techItems)): ?>
                        <div class="project-tech-chips">
                            <?php foreach ($techItems as $t): ?>
                            <span class="tech-chip"><?= htmlspecialchars($t) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="project-body">
                        <?php if (!empty($project['subtitle'])): ?>
                        <p class="project-subtitle"><?= htmlspecialchars($project['subtitle']) ?></p>
                        <?php endif; ?>
                        <h3 class="project-title">
                            <a class="project-link" href="<?= htmlspecialchars($baseURL . '/project/' . $project['slug']) ?>"><?= htmlspecialchars($project['title']) ?></a>
                        </h3>
                        <p class="project-desc"><?= htmlspecialchars($project['shortDescription']) ?></p>
                        <?php if (!empty($project['buttons'])): ?>
                        <div class="project-links">
                            <?php foreach ($project['buttons'] as $btn):
                                $isGit = stripos($btn['text'], 'git') !== false;
                            ?>
                            <a href="<?= htmlspecialchars($btn['link']) ?>"
                               target="<?= htmlspecialchars($btn['target'] ?? '_blank') ?>"
                               rel="noreferrer"
                               class="project-btn <?= $isGit ? 'project-btn--ghost' : 'project-btn--accent' ?>"
                               onclick="event.stopPropagation()">
                                <?php if ($isGit): ?>
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.009-.866-.013-1.7-2.782.603-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0 1 12 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.202 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.163 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
                                <?php else: ?>
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/></svg>
                                <?php endif; ?>
                                <?= htmlspecialchars($btn['text']) ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </article>
            </li>
            <?php
                        endif;
                    endforeach;
                endif;
            ?>
        </ul>

        <div class="projects-more reveal">
            <a href="https://github.com/ineshe" target="_blank" rel="noreferrer" class="projects-more-link">
                Alle Projekte auf GitHub ↗
            </a>
        </div>
    </div>
</section>
