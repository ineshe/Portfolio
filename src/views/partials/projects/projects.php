<?php 
    $projects = json_decode(file_get_contents(__DIR__ . "/../../../data/projects.json"));
?>

<section id="projects" class="section">
    <div class="content">
        <h2 class="section-title">Projekte</h2>
        <div class="project-cards">
            <?php 
                if(isset($projects)):
                    foreach ($projects as $project):
                        if ($project->visibility == "1"): 
            ?>
                <a href="<?= $baseURL . '/project/' . $project->slug ?>">                            
                    <article class="project">
                        <img class="white" src="<?= $baseURL . $project->mainImage ?>" alt="" height="200" width="300" loading="eager" decoding="async" fetchpriority="high">
                        <div class="project-content">
                            <h3 class="project-title"><?= $project->title ?></h3>
                            <p><?= $project->technologies ?></p>
                        </div>
                    </article>
                </a>
            <?php 
                        endif;
                    endforeach;
                endif;
            ?>
            <div class="project">
                <a href="<?php echo $baseURL?>/more-projects">
                    <img class="card-img" src="<?php echo $baseURL?>/assets/projects/more-projects.png" alt="Weiter" height="200" width="300" loading="eager" decoding="async" fetchpriority="high">
                    <div class="project-content">
                        <h3 class="project-title">Mehr Projekte ansehen</h3>
                    </div>
                </a>
            </div>
        </div> 
    </div>
</section>