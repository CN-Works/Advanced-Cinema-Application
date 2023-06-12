<?php

require_once("db/DAO.php");

class MovieController {
    public function findAllMovies() {
        $dao = new DAO();

        $sql_request = "SELECT image_film, titre_film AS titre, synopsis_film AS summary, annee_film AS publish_date FROM film";

        $films = $dao->executeRequest($sql_request);

        require("views/movie/movielisting.php");
    }
}

?>