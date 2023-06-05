<?php
    // Start the temporisation
    ob_start();
?>

<h2>Liste des films</h2>

<?php

    echo $films->fetchAll();

?>

<?php
    $title = "All movies";
    $content = ob_get_clean();
    require("views/template.php");
?>