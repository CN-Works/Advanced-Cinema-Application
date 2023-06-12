<?php

class GenreController {
    public function findAllGenre() {
        $dao = new DAO();

        $sql = "SELECT nom_genre AS label, id_genre AS id FROM genre";
        
        $genre = $dao->executeRequest($sql);

        require "views/genre/genrelisting.php";
    }
}

?>