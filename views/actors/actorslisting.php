<?php
    // Start the temporisation
    ob_start();
?>

<main class="actorpage-main">
    <div class="actorpage-head">
        <h2 class="actorpage-head-title">All actors</h2>
        <img class="actorpage-head-image unselectable" src="public/images/actors.png" alt="Mask icon">
    </div>
    <?php
        foreach ($actors->fetchAll() as $actordata) {
            if ($actordata["sex"] == "m") {
                $image = "public/images/man.png";
                $pronoun = "He";
            } else {
                $image = "public/images/woman.png";
                $pronoun = "She";
            }

            // Getting the birth date and date format
            $actor_dob = date_create($actordata["dob"]);
            $actor_dob = date_format($actor_dob,"l d F Y");

            echo "
            <div class='actorpage-card'>
                <img class='actor-card-image' src=".$image." alt='person image'>
                <div class='actorpage-card-texts'>
                    <p>".$actordata["firstname"]." ".$actordata["lastname"]."</p>
                    <p class='actorpage-card-dob'>".$pronoun." was born on ".$actor_dob."</p>
                </div>
            </div>
            ";
        }
    ?>
</main>



<?php
    $title = "CineHub - Actors";
    $content = ob_get_clean();
    require("views/template.php");
?>