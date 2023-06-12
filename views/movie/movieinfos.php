<?php
    // Start the temporisation
    ob_start();
?>

<main>
    <pre>
        <?php
        var_dump($informations);
        ?>
    </pre>
</main>

<?php
    $title = "CineHub - Informations";
    $content = ob_get_clean();
    require("views/template.php");
?>