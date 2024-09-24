-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for db_bukutamu
CREATE DATABASE IF NOT EXISTS `db_bukutamu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_bukutamu`;

-- Dumping structure for table db_bukutamu.tb_bukutamu
CREATE TABLE IF NOT EXISTS `tb_bukutamu` (
  `id_tamu` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `nama_tamu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `bertemu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kepentingan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_bukutamu.tb_bukutamu: ~2 rows (approximately)
REPLACE INTO `tb_bukutamu` (`id_tamu`, `tanggal`, `nama_tamu`, `alamat`, `no_hp`, `bertemu`, `kepentingan`) VALUES
	('zt001', '2024-09-10', 'Riyanto', 'Gombong', '6281291241', 'Pak Azhar', 'Mengurus Surat '),
	('zt002', '2024-09-21', '2111', '2', '2', '22', '222'),
	('zt003', '2024-09-21', '12312', '31231', '3121', '', '312131'),
	('zt004', '2024-09-23', '142', '12121', '41', '4124142', '142142');

-- Dumping structure for table db_bukutamu.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('Super Admin','Operator') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_bukutamu.tb_users: ~3 rows (approximately)
REPLACE INTO `tb_users` (`id_user`, `username`, `password`, `role`) VALUES
	('1', 'admin', '$2y$10$Xss7sOlc77XMQy5hnRQayu9uXT5E1rk215W417jtA9u3YRinUHArW', 'Super Admin'),
	('usr01', '1231212', '$2y$10$kAEDYsEI04MzhRRUAOxEf.Djn/HxJds9F/gT.h3exItHXmU9ZfQsu', 'Super Admin'),
	('usr02', '1', '$2y$10$gK8ZMLMm9sdV7xBF31e6HucORj98w.FJt1kFm5H6BVIXs2ZK5z.7S', 'Super Admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
