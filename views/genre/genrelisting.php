<?php
    // Start the temporisation
    ob_start();
?>

<main class="genrelist-main">
    <div class="genrelist-head">
        <h2 class="genrelist-head-title">All genre</h2>
        <img class="genrelist-head-image unselectable" src="public/images/movie_camera.png" alt="Movie genre icon">
    </div>

    <div class="genrelist-cards">
    <?php
        foreach ($genre->fetchAll() as $genredata) {
            echo "
                <div class='genrelist-card'>
                    <a class='genrelist-card-link' href=''>".$genredata["label"]."</a>
                </div>
            ";
        }
    ?>
    </div>
</main>

<?php
    $title = "CineHub - Genres";
    $content = ob_get_clean();
    require("views/template.php");
?>