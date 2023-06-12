-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinehub
CREATE DATABASE IF NOT EXISTS `cinehub` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinehub`;

-- Listage de la structure de table cinehub. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.acteur : ~6 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(2, 2),
	(1, 3),
	(4, 4),
	(3, 5),
	(6, 6),
	(5, 7);

-- Listage de la structure de table cinehub. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `annee_film` date NOT NULL,
  `duree_film` int DEFAULT NULL,
  `titre_film` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `synopsis_film` text COLLATE utf8mb4_general_ci,
  `note_film` decimal(1,1) DEFAULT NULL,
  `id_realisateur` int NOT NULL,
  `image_film` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.film : ~5 rows (environ)
INSERT INTO `film` (`id_film`, `annee_film`, `duree_film`, `titre_film`, `synopsis_film`, `note_film`, `id_realisateur`, `image_film`) VALUES
	(1, '2020-11-15', 95, 'The Building', 'A movie about concrete structure, doors and shells', 0.2, 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3ypuHlO1WZsuzZCd48zybH73scUl2dIJ3Yw&usqp=CAU'),
	(2, '2011-10-18', 120, 'House Keeper', 'Somebody who keeps the house', 0.8, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOjU8Ua85AfzL81AsIvpugefHVXh6-6zpynQ&usqp=CAU'),
	(3, '2022-05-29', 90, 'The killer of town', 'A bad killer, murdering people in a town', 0.9, 1, 'https://media.istockphoto.com/id/1018003726/photo/criminal-or-bandit-holding-a-knife.jpg?s=612x612&w=0&k=20&c=DMg05eZ8UaZTlW4OaBGhpi4-0SooZbDTN8amTUZGUfg='),
	(4, '2015-06-01', 105, 'Go up and down', 'Going up and going down for some reasons.', 0.7, 2, 'https://d23.com/app/uploads/2019/05/1180w-600h_052919_up-anniversary-facts-780x440.jpg'),
	(5, '2019-11-25', 65, 'Two Plus One', 'Someone meeting someone else in a bar and they talk during all the movie', 0.6, 3, NULL);

-- Listage de la structure de table cinehub. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.genre : ~7 rows (environ)
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Drama'),
	(2, 'Natural'),
	(3, 'Science'),
	(4, 'Apocalypse'),
	(5, 'Sport'),
	(6, 'Action'),
	(7, 'Romance');

-- Listage de la structure de table cinehub. jouer
CREATE TABLE IF NOT EXISTS `jouer` (
  `id_film` int NOT NULL,
  `id_role` int NOT NULL,
  `id_acteur` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_role`,`id_acteur`),
  KEY `id_role` (`id_role`),
  KEY `id_acteur` (`id_acteur`),
  CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  CONSTRAINT `jouer_ibfk_3` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.jouer : ~6 rows (environ)
INSERT INTO `jouer` (`id_film`, `id_role`, `id_acteur`) VALUES
	(4, 1, 4),
	(1, 2, 6),
	(2, 3, 5),
	(3, 4, 1),
	(3, 4, 3),
	(5, 5, 2);

-- Listage de la structure de table cinehub. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sexe` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateNaissance` date NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.personne : ~9 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `dateNaissance`) VALUES
	(1, 'Alavesa', 'Alejandro', 'm', '1999-06-10'),
	(2, 'Martin', 'Andrea', 'f', '2001-06-28'),
	(3, 'San-Martino', 'Luigi', 'm', '1985-10-29'),
	(4, 'Ferrinachi', 'Maria', 'f', '1999-03-05'),
	(5, 'Kelnerr', 'Hermann', 'm', '1972-11-26'),
	(6, 'Drugger', 'Felipe', 'm', '2000-09-03'),
	(7, 'Monipal', 'Patricia', 'f', '1980-10-05'),
	(8, 'De Sanchez', 'Oscar', 'm', '1996-01-11'),
	(9, 'Sostamanka', 'Kiryl', 'm', '2001-07-29');

-- Listage de la structure de table cinehub. posseder
CREATE TABLE IF NOT EXISTS `posseder` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `posseder_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `posseder_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.posseder : ~0 rows (environ)

-- Listage de la structure de table cinehub. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.realisateur : ~3 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(3, 5),
	(1, 8),
	(2, 9);

-- Listage de la structure de table cinehub. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.role : ~5 rows (environ)
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Superman'),
	(2, 'Batman'),
	(3, 'Supergirl'),
	(4, 'El matador'),
	(5, 'Wonderwoman');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
