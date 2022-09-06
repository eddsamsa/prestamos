-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.26 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para prestamos
CREATE DATABASE IF NOT EXISTS `prestamos` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `prestamos`;

-- Volcando estructura para tabla prestamos.tblpagos
CREATE TABLE IF NOT EXISTS `tblpagos` (
  `idpago` int unsigned NOT NULL AUTO_INCREMENT,
  `numeroCuota` int DEFAULT NULL,
  `montoCapital` float DEFAULT NULL,
  `montoInteres` float DEFAULT NULL,
  `saldoInsolutoCredito` float DEFAULT NULL,
  `idprestamo` int DEFAULT NULL,
  PRIMARY KEY (`idpago`),
  UNIQUE KEY `idpago_UNIQUE` (`idpago`),
  KEY `idprestamo_idx` (`idprestamo`),
  CONSTRAINT `idprestamo` FOREIGN KEY (`idprestamo`) REFERENCES `tblprestamos` (`idprestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prestamos.tblprestamos
CREATE TABLE IF NOT EXISTS `tblprestamos` (
  `idprestamo` int NOT NULL AUTO_INCREMENT,
  `monto` int DEFAULT NULL,
  `tasa` int DEFAULT NULL,
  `plazo` int DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`idprestamo`),
  UNIQUE KEY `idprestamo_UNIQUE` (`idprestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
