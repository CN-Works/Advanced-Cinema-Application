<?php

session_start();

// Getting all controller files
require_once "controllers/Home_controller.php";
require_once "controllers/Genre_controller.php";
require_once "controllers/Movie_controller.php";
require_once "controllers/Person_controller.php";
require_once "controllers/Role_controller.php";

// Creating instances
$homeController = new HomeController();
$genreController = new GenreController();
$movieController = new MovieCOntroller();
$personController = new PersonController();

// Redirection using GET method
if (isset($_GET["action"])) {

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    switch($_GET["action"]) {
        case "movieList":
            $movieController->findAllMovies();
            break;
        case "movieInformations":
            // Just checking if the movie "id" is not null so it can search in db
            if (isset($_GET["movieId"])) {
                $movieController->getMovieInformations($_GET["movieId"]);
            } else {
                $homeController->goToHomePage();
            }
            break;
        case "addMovie" :
            $movieController->addMovieForm();
            break;
        case "removeMovie" :
            // Just checking if the movie "id" is not null so it can search in db
            if (isset($_GET["movieId"])) {
                $movieController->removeMovie($_GET["movieId"]);
            } else {
                $homeController->goToHomePage();
            }
            break;
        case "updateMovie" :
            // Just checking if the movie "id" is not null so it can search in db
            if (isset($_GET["movieId"])) {
                $movieController->updateMovie($_GET["movieId"]);
            } else {
                $homeController->goToHomePage();
            }
            break;
        case "addingMovie" :
            $movieController->addingMovie();
            break;
        case "actorList":
            $personController->findAllActors();
            break;
        case "genreList":
            $genreController->findAllGenre();
            break;
        case "producerList":
            $personController->findAllProducers();
            break;
        default:
            $homeController->goToHomePage();
    }
} else {
    $homeController->goToHomePage();
}

?>