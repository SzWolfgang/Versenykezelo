-- --------------------------------------------------------
-- Hoszt:                        127.0.0.1
-- Szerver verzió:               10.4.32-MariaDB - mariadb.org binary distribution
-- Szerver OS:                   Win64
-- HeidiSQL Verzió:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Adatbázis struktúra mentése a versenykezelodb.
CREATE DATABASE IF NOT EXISTS `versenykezelodb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `versenykezelodb`;

-- Struktúra mentése tábla versenykezelodb. felhasznalok
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `nev` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefonszam` varchar(20) DEFAULT NULL,
  `lakcim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla versenykezelodb. fordulok
CREATE TABLE IF NOT EXISTS `fordulok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `verseny_nev` varchar(100) NOT NULL,
  `verseny_ev` year(4) NOT NULL,
  `nev` varchar(100) NOT NULL,
  `kezdes_idopont` datetime NOT NULL,
  `zaras_idopont` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `verseny_nev` (`verseny_nev`,`verseny_ev`),
  CONSTRAINT `fordulok_ibfk_1` FOREIGN KEY (`verseny_nev`, `verseny_ev`) REFERENCES `versenyek` (`nev`, `ev`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla versenykezelodb. versenyek
CREATE TABLE IF NOT EXISTS `versenyek` (
  `nev` varchar(100) NOT NULL,
  `ev` year(4) NOT NULL,
  `elerheto_nyelvek` varchar(100) NOT NULL,
  `pontko_jo` int(11) DEFAULT 0,
  `pontok_rossz` int(11) DEFAULT 0,
  `pontok_ures` int(11) DEFAULT 0,
  PRIMARY KEY (`nev`,`ev`),
  UNIQUE KEY `nev` (`nev`,`ev`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla versenykezelodb. versenyzok
CREATE TABLE IF NOT EXISTS `versenyzok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fordulo_id` int(11) NOT NULL,
  `felhasznalo_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fordulo_id` (`fordulo_id`),
  KEY `felhasznalo_id` (`felhasznalo_id`),
  CONSTRAINT `versenyzok_ibfk_1` FOREIGN KEY (`fordulo_id`) REFERENCES `fordulok` (`id`) ON DELETE CASCADE,
  CONSTRAINT `versenyzok_ibfk_2` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalok` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Az adatok exportálása nem lett kiválasztva.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
