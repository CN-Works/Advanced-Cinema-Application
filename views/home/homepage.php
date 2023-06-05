<?php
    // Start the temporisation
    ob_start();
?>

<h2>Fromage frais acceuil</h2>

<?php
    $title = "Home Page";
    $content = ob_get_clean();
    require("views/template.php");
?>