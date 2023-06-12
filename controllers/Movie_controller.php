<?php

require_once("db/DAO.php");

class MovieController {
    public function findAllMovies() {
        $dao = new DAO();

        $sql_request = "SELECT id_film, image_film, titre_film AS titre, synopsis_film AS summary, annee_film AS publish_date FROM film";

        $films = $dao->executeRequest($sql_request);

        require("views/movie/movielisting.php");
    }

    public function getMovieInformations($movieId) {
        $dao = new DAO();
        
        // Get movie informations
        $filmSql = "SELECT f.id_film AS id_movie, re.id_realisateur AS id_producer, f.image_film AS image_movie,
                    f.titre_film AS title, YEAR(f.annee_film) AS year_production, pe.prenom AS producer_firstname,
                    pe.nom AS producer_lastname, f.duree_film AS duration, f.synopsis_film AS summary 
                    FROM film f
                    INNER JOIN realisateur re ON f.id_realisateur = re.id_realisateur
                    INNER JOIN personne pe ON re.id_personne = pe.id_personne
                    WHERE f.id_film = :movieId";
    
        $params = array(':movieId' => $movieId);
        $movieinfos = $dao->executeRequest($filmSql, $params);

        $informations = array();

        // Setting up data in a usable array (because of PDO object)
        foreach ($movieinfos->fetchAll() as $info) {
            $informations["title"] = $info["title"];
            $informations["id_movie"] = $info["id_movie"];
            $informations["id_producer"] = $info["id_producer"];
            $informations["image_movie"] = $info["image_movie"];
            $informations["year_production"] = $info["year_production"];
            $informations["producer_lastname"] = $info["producer_lastname"];
            $informations["producer_firstname"] = $info["producer_firstname"];
            $informations["duration"] = $info["duration"];
            $informations["summary"] = $info["summary"];
        }
    
    
        require "views/movie/movieinfos.php";
    }
}

?>