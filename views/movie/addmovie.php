<?php
    // Start the temporisation
    ob_start();
?>

<main class="addmovie-main">

</main>


<?php
    $title = "CineHub - Add movie";
    $content = ob_get_clean();
    require("views/template.php");
?>