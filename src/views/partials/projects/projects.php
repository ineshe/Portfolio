<?php 
    $projects = json_decode(file_get_contents(__DIR__ . "/../../../data/projects.json"));
?>

<section id="projects" class="section">
    <div class="content">
        <h2 class="section-title">Projekte</h2>
        <div class="project-cards">

        <?php if(isset($projects)): ?>
            <?php foreach ($projects as $project): ?>
                <?php if ($project->visibility == "1"): ?>

                    <section class="project">
                        <a href="<?= $baseURL . '/project/' . $project->slug ?>">
                            <img class="card-img" src="<?= $baseURL . $project->mainImage ?>" alt="">
                            <div class="card-text">
                                <h3 class="project-title"><?= $project->title ?></h3>
                                <p><?= $project->shortDescription ?></p>
                            </div>
                        </a>
                    </section>

                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <section class="project">
            <a href="<?php echo $baseURL?>/more-projects">
                <img class="card-img" src="<?php echo $baseURL?>/assets/projects/more-projects.png" alt="Weiter">
                <div class="card-text">
                    <h3 class="project-title">Mehr Projekte ansehen</h3>
                </div>
            </a>
        </section>
        </div> 
    </div>
</section>