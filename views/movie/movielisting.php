<?php
    // Start the temporisation
    ob_start();
?>

<main class="movielist-main">
    <h2>All movies</h2>

    <div class="movielist-card-part">
        <?php

        foreach ($films->fetchAll() as $movie) {
            echo 
            "<div class='movielist-card'>
                <img class='movielist-banner' src='public/images/default-image.jpg' alt='".$movie["title"]." movie banner image'>
                <p class='movielist-card-title'>".$movie["title"]."</p>
                <p class='movielist-card-description'>".$movie["summary"]."</p>
            </div>";
        }

        ?>
    </div>
</main>


<?php
    $title = "All movies";
    $content = ob_get_clean();
    require("views/template.php");
?>