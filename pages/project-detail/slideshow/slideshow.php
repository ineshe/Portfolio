<div class="slideshow-container">
    <div class="slideshow">
        

        <?php
        for($m = 0; $m < count($media); ++$m) {
            if(substr($media[$m], -4) == '.mp4') {
                echo"
                <video class='slide' controls>
                    <source src='$media[$m]' type='video/mp4'>
                </video>";
            } else {
                // echo "<p>" . substr($media[$m], -4) . "</p>";
                echo "<img class='slide' src='$media[$m]' alt=''>";    
            }
        }
        ?>



    </div>

    <?php
        if(count($media) > 1) {
            echo "<button id='prev'>&#10094;</button>";
            echo "<button id='next'>&#10095;</button>";
            
            echo "<div class='dots'>";
            // echo "<span class='dot active'></span>";
            for($d = 0; $d < count($media); ++$d) {
                echo "<span class='dot-container' id='dot-$d'>";
                echo "<span class='dot'></span>";
                echo "</span>";
            }
            echo "</div>";
        }
        ?>
</div>
