<?php
    // Start the temporisation
    ob_start();
?>

<main class="addmovie-main">
    <form class="addmovie-card" action="index.php?action=addingMovie" method="post">
        <h2 class="addmovie-title" >Create a movie</h2>

        <div class="addmovie-element">
            <h3 class="addmovie-element-title" >Title</h3>
            <input class="addmovie-element-input" type="text" id="title" name="title" value="" required>
        </div>

        <div class="addmovie-element">
            <h3 class="addmovie-element-title">Production time</h3>
            <input class="addmovie-element-input" type="text" name="prod_time" id="prod_time" placeholder="2000" required>
        </div>

        <div class="addmovie-element">
            <h3 class="addmovie-element-title">Production time</h3>
            <input class="addmovie-element-input" type="text" name="prod_time" id="prod_time" placeholder="2000" required>
        </div>

        <button class="addmovie-button" type="submit">Submit</button>
    </form>
</main>


<?php
    $title = "CineHub - Add movie";
    $content = ob_get_clean();
    require("views/template.php");
?>