<?php
    // Start the temporisation
    ob_start();
?>

<main class="homepage-main">
    <img class="homepage-banner unselectable" src="public/images/home_banner.jpg" alt="A cool home page banner">
    <p class="homepage-text unselectable">Watch all the best movies of the world, on any device in Ultra High Definition !</p>
</main>

<?php
    $title = "CineHub - Home";
    $content = ob_get_clean();
    require("views/template.php");
?>