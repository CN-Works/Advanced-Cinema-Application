<?php
    // Start the temporisation
    ob_start();
?>


<main class="movielist-main">
    <h2>All movies</h2>

    <div class="movielist-card-part">
        <?php

        $lorem = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor reiciendis aspernatur unde mollitia pariatur ipsa qui eligendi consequatur facilis rem porro magnam officiis, eaque provident numquam modi dolores aliquid eos.";
        foreach ($films->fetchAll() as $movie) {
            echo 
            "<div class='movielist-card'>
                <img class='movielist-banner' src='public/images/default-image.png' alt='".$movie["title"]." movie banner image'>
                <p class='movielist-card-title'>".$movie["title"]."</p>
                <p class='movielist-card-description'>".$lorem."</p>
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