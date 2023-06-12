<?php
    // Start the temporisation
    ob_start();
?>

<main class="movieinfo-main">
    <img class="movieinfo-banner unselectable" src="<?php echo $informations["image_movie"] ?>" alt="Movie banner of the movie <?php echo $informations["title"] ?>">
    <h2><?php echo $informations["title"]; ?></h2>
    <h3>Produced by <?php echo $informations["producer_firstname"]." ".$informations["producer_lastname"]; ?> in <?php echo $informations["year_production"] ?></h3>
    <h3>Duration : <?php echo $informations["duration"]; ?> minutes</h3>
    <p><?php echo $informations["summary"]; ?></p>
</main>

<?php
    $title = "CineHub - Informations";
    $content = ob_get_clean();
    require("views/template.php");
?>