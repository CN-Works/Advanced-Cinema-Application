<?php
    // Start the temporisation
    ob_start();
?>

<main class="addmovie-main">
    <form class="addmovie-card" action="index.php?action=addingMovie" method="post">
        <h2 class="addmovie-title" >Add a movie to the list</h2>

        <div class="addmovie-element">
            <h3 class="addmovie-element-title" >Title</h3>
            <input class="addmovie-element-input" type="text" id="title" name="title" value="" required>
        </div>

        <div class="addmovie-element">
            <h3 class="addmovie-element-title" >Summary</h3>
            <input class="addmovie-element-input" type="text" id="summary" name="summary" value="" required>
        </div>

        <div class="addmovie-element">
            <h3 class="addmovie-element-title">Year of production</h3>
            <input class="addmovie-element-input" type="date" name="prod_time" id="prod_time" placeholder="2000" required>
        </div>

        <div class="addmovie-element">
            <h3 class="addmovie-element-title">Genre</h3>
            <select class="addmovie-element-select" name="genre" id="genre" required>
                <?php
                    foreach ($availableGenres->fetchAll() as $genreData) {
                        $genreId = $genreData['id'];
                        $genreLabel = $genreData['genre_label'];
                        echo "<option value='".$genreId."'>".$genreLabel."</option>";
                    }
                ?>
            </select>
        </div>

        <button class="addmovie-button" type="submit">Submit</button>
    </form>
</main>


<?php
    $title = "CineHub - Add movie";
    $content = ob_get_clean();
    require("views/template.php");
?>