<?php
    // Start the temporisation
    ob_start();
?>

<main class="genrelist-main">
    <div class="genrelist-head">
        <p class="genrelist-head-title">All Genre</p>
        <img class="genrelist-head-image" src="public/images/movie_camera.png" alt="Movie genre icon">
    </div>

    <div class="genrelist-cards">
    <?php
        foreach ($genre->fetchAll() as $genredata) {
            echo $genredata["label"];
        }
    ?>
    </div>
</main>

<?php
    $title = "CineHub - Genre";
    $content = ob_get_clean();
    require("views/template.php");
?>