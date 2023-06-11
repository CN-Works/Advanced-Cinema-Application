<?php
    // Start the temporisation
    ob_start();
?>

<p>test</p>
<pre>
<?php
    foreach ($actors->fetchAll() as $actordata) {
        echo $actordata["firstname"];
    }
?>
</pre>



<?php
    $title = "CineHub - Actors";
    $content = ob_get_clean();
    require("views/template.php");
?>