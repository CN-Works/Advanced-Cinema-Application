<?php
    // Start the temporisation
    ob_start();
?>


<main class="movielist-main">
    <div class="movielist-head">
        <h2 class="movielist-head-title">All movies</h2>
        <img class="movielist-head-image unselectable" src="public/images/movie_camera.png" alt="Modern movie camera image/icon">
    </div>

    <div class="movielist-card-part">
        <?php

        $lorem = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor reiciendis aspernatur unde mollitia pariatur ipsa qui eligendi consequatur facilis rem porro magnam officiis, eaque provident numquam modi dolores aliquid eos.";
        foreach ($films->fetchAll() as $movie) {
            // Setting up a default image when image is NULL is the database
            if (isset($movie["image_film"])) {
                $image = $movie["image_film"];
            } else {
                $image = "public/images/default-image.png";
            }

            // Getting the date and date format
            $movie_date = date_create($movie["publish_date"]);
            $movie_date = date_format($movie_date,"Y");

            echo 
            "<div class='movielist-card'>
                <img class='movielist-banner unselectable' src='".$image."' alt='".$movie["titre"]." movie banner image'>
                <p class='movielist-card-title'>".$movie["titre"]." (".$movie_date."),</p>
                <p class='movielist-card-description'>".$movie["summary"]."</p>
            </div>";
        }

        ?>
    </div>
</main>


<?php
    $title = "CineHub - Movies";
    $content = ob_get_clean();
    require("views/template.php");
?>