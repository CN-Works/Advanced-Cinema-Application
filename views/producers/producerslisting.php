<?php
    // Start the temporisation
    ob_start();
?>

<main class="producerlisting-main">
    <?php
        foreach ($producers->fetchAll() as $producerdata) {
            echo "
                <div class='genrelist-card'>
                    <a class='genrelist-card-link' href=''>".$producerdata["firstname"]." ".$producerdata["lastname"]."</a>
                </div>
            ";
        }
    ?>
</main>

<?php
    $title = "CineHub - Producers";
    $content = ob_get_clean();
    require("views/template.php");
?>