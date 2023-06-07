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

-- Listage de la structure de table cinehub. actor
CREATE TABLE IF NOT EXISTS `actor` (
  `id_actor` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `sex` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_actor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.actor : ~2 rows (environ)
INSERT INTO `actor` (`id_actor`, `name`, `date_birth`, `sex`) VALUES
	(1, 'Hermann Wagner', '1978-11-22', 'm'),
	(2, 'Julie Belmand', '1993-06-02', 'f'),
	(3, 'Jean Raymond', '2004-03-12', 'm'),
	(4, 'Andrea Chernyy', '2001-06-28', 'f');

-- Listage de la structure de table cinehub. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_movie` int NOT NULL,
  `id_role` int NOT NULL,
  `id_actor` int NOT NULL,
  PRIMARY KEY (`id_movie`,`id_role`,`id_actor`),
  KEY `id_role` (`id_role`),
  KEY `id_actor` (`id_actor`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`),
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.casting : ~3 rows (environ)
INSERT INTO `casting` (`id_movie`, `id_role`, `id_actor`) VALUES
	(2, 2, 1),
	(1, 4, 2),
	(4, 5, 4);

-- Listage de la structure de table cinehub. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.genre : ~2 rows (environ)
INSERT INTO `genre` (`id_genre`, `label`) VALUES
	(1, 'Action'),
	(2, 'Science'),
	(3, 'Drama');

-- Listage de la structure de table cinehub. movie
CREATE TABLE IF NOT EXISTS `movie` (
  `id_movie` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_release` date DEFAULT NULL,
  `summary` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_genre` int NOT NULL,
  `id_producer` int NOT NULL,
  PRIMARY KEY (`id_movie`),
  KEY `id_genre` (`id_genre`),
  KEY `id_producer` (`id_producer`),
  CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`id_producer`) REFERENCES `producer` (`id_producer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.movie : ~4 rows (environ)
INSERT INTO `movie` (`id_movie`, `title`, `date_release`, `summary`, `image`, `id_genre`, `id_producer`) VALUES
	(1, 'Spidergirl à la montagne', '2019-05-24', 'Un film cool', NULL, 1, 2),
	(2, 'Batman à la plage', '2022-10-26', 'Batman qui prend le soleil', NULL, 2, 1),
	(3, 'Mr bean en cours de science', '2023-01-02', 'il apprend la chimie', NULL, 2, 3),
	(4, 'La fin', '2023-04-28', 'ça fini là', NULL, 3, 3);

-- Listage de la structure de table cinehub. producer
CREATE TABLE IF NOT EXISTS `producer` (
  `id_producer` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `sex` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_producer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.producer : ~2 rows (environ)
INSERT INTO `producer` (`id_producer`, `name`, `date_birth`, `sex`) VALUES
	(1, 'Jean Daniel', '1980-06-05', 'm'),
	(2, 'Stéphane Marc', '1994-05-27', 'm'),
	(3, 'Laura Michelle', '2001-06-05', 'f');

-- Listage de la structure de table cinehub. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinehub.role : ~2 rows (environ)
INSERT INTO `role` (`id_role`, `name`) VALUES
	(1, 'James Bond'),
	(2, 'Batman'),
	(3, 'Mr Bean'),
	(4, 'Spidergirl'),
	(5, 'Baboop');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
