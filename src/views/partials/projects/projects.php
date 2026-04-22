<?php 
    $projects = json_decode(file_get_contents(__DIR__ . "/../../../data/projects.json"));
?>

<section id="projects" class="section">
    <div class="content">
        <h2 class="section-title">Projekte</h2>
        <ul class="project-cards">
            <?php 
                if(isset($projects)):
                    foreach ($projects as $project):
                        if ($project->visibility == "1"): 
            ?>
                <li class="project-item">
                    <article class="project">
                        <img class="white" src="<?= $baseURL . $project->mainImage ?>" alt="" height="200" width="300" loading="eager" decoding="async" fetchpriority="high">
                        <div class="project-content">
                            <h3 class="project-title">
                                <a href="<?= $baseURL . '/project/' . $project->slug ?>"><?= $project->title ?></a>
                            </h3>
                            <p class="project-technologies"><?= $project->technologies ?></p>
                        </div>
                    </article>
                </li>
            <?php 
                        endif;
                    endforeach;
                endif;
            ?>
            <li class="project-item">
                <article class="project">
                    <img class="card-img" src="<?php echo $baseURL?>/assets/projects/more-projects.png" alt="Weiter" height="200" width="300" loading="eager" decoding="async" fetchpriority="high">
                    <div class="project-content">
                        <h3 class="project-title">
                            <a href="<?php echo $baseURL?>/more-projects">Mehr Projekte ansehen</a>
                        </h3>
                    </div>
                </article>
            </li>
        </ul> 
    </div>
</section>