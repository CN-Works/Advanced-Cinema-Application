<?php
    // Start the temporisation
    ob_start();
?>

<main class="producerlisting-main">
    <div class="producerlisting-head">
        <h2 class="producerlisting-head-title">All producers</h2>
        <img class="producerlisting-head-image unselectable" src="public/images/director.png" alt="A director icon">
    </div>
    <div class='producerlisting-cards'>
        <?php
            foreach ($producers->fetchAll() as $producerdata) {
                echo "
                <div class='producerlisting-card'>
                    <a class='producerlisting-card-link' href=''>".$producerdata["firstname"]." ".$producerdata["lastname"]."</a>
                </div>
                ";
            }
        ?>
    </div>
</main>

<?php
    $title = "CineHub - Producers";
    $content = ob_get_clean();
    require("views/template.php");
?>