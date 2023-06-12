<?php
    // Start the temporisation
    ob_start();
?>

<?php
    foreach ($movieinfos->fetchAll() as $info) {
        echo $info["title"];
    }
?>

<?php
    $title = "CineHub - Informations";
    $content = ob_get_clean();
    require("views/template.php");
?>