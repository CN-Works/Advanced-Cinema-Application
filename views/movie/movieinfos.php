<?php
    // Start the temporisation
    ob_start();
?>

<main class="movieinfo-main">
    <?php
        if (isset($informations["image_movie"])) {
            $image = $informations["image_movie"];
        } else {
            $image = "public/images/default-image.png";
        }
    ?>
    <div class="movieinfo-card">
        <img class="movieinfo-banner unselectable" src="<?php echo $image ?>" alt="Movie banner of the movie <?php echo $informations["title"] ?>">
        <h2><?php echo $informations["title"]; ?></h2>
        <h3>Produced by <?php echo $informations["producer_firstname"]." ".$informations["producer_lastname"]; ?> in <?php echo $informations["year_production"] ?></h3>
        <h4>Duration : <?php echo $informations["duration"]; ?> minutes</h4>
        <p class="movieinfo-summary">"<?php echo $informations["summary"]; ?>"</p>

        <?php
        foreach ($genres->fetchAll() as $info) {
            echo $info["genre_name"];
        }
        ?>
    </div>
</main>

<?php
    $title = "CineHub - Informations";
    $content = ob_get_clean();
    require("views/template.php");
?>