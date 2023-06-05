<?php

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

    switch($_GET["action"]) {
        case "movieListing":
            $movieController->findAllMovies();
            break;
        default:
            $homeController->goToHomePage();
    }
} else {
    $homeController->goToHomePage();
}

?>