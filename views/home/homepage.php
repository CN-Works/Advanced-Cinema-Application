<?php
    // Start the temporisation
    ob_start();
?>

<main class="homepage-main">
    <img class="homepage-banner" src="public/images/home_banner.jpg" alt="A cool home page banner">
    <p class="homepage-text">Watch all the best movies of the world, on Ultra High Definition !</p>
</main>

<?php
    $title = "CineHub - Home";
    $content = ob_get_clean();
    require("views/template.php");
?>