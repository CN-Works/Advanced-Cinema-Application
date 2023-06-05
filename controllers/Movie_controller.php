<?php

require_once("db/DAO.php");

class MovieController {
    public function findAllMovies() {
        $dao = new DAO();

        $sql_request = "SELECT name FROM actor";

        $films = $dao->executeRequest($sql_request);

        require("views/movie/movielisting.php");
    }
}

?>