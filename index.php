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

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    switch($_GET["action"]) {
        case "movieList":
            $movieController->findAllMovies();
            break;
        default:
            $homeController->goToHomePage();
    }
} else {
    $homeController->goToHomePage();
}

?>