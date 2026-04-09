-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.43 - MySQL Community Server - GPL
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


-- Dumping database structure for profil_kepegawaian
CREATE DATABASE IF NOT EXISTS `profil_kepegawaian` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `profil_kepegawaian`;

-- Dumping structure for table profil_kepegawaian.master_agama
CREATE TABLE IF NOT EXISTS `master_agama` (
  `id_agama` int unsigned NOT NULL AUTO_INCREMENT,
  `agama` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_diklat
CREATE TABLE IF NOT EXISTS `master_diklat` (
  `id_jenis_diklat` int unsigned NOT NULL AUTO_INCREMENT,
  `jenis_diklat` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_diklat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_divisi
CREATE TABLE IF NOT EXISTS `master_divisi` (
  `id_unit_kerja` int unsigned NOT NULL AUTO_INCREMENT,
  `unit_kerja` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_unit_kerja`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_golongan
CREATE TABLE IF NOT EXISTS `master_golongan` (
  `id_gol` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_pangkat` varchar(100) NOT NULL,
  `kode_gol` varchar(10) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_gol`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_hub_kel
CREATE TABLE IF NOT EXISTS `master_hub_kel` (
  `id_hub_kel` int unsigned NOT NULL AUTO_INCREMENT,
  `hub_kel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_hub_kel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_jabatan
CREATE TABLE IF NOT EXISTS `master_jabatan` (
  `id_jabatan` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) NOT NULL,
  `jenis_jabatan` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_jenis_kelamin
CREATE TABLE IF NOT EXISTS `master_jenis_kelamin` (
  `id_jenis_kelamin` int unsigned NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(10) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_kelamin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_jenjang_pend
CREATE TABLE IF NOT EXISTS `master_jenjang_pend` (
  `id_jenjang_pend` int unsigned NOT NULL AUTO_INCREMENT,
  `jenjang_pend` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_jenjang_pend`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_kabupaten
CREATE TABLE IF NOT EXISTS `master_kabupaten` (
  `id_kabupaten` int NOT NULL AUTO_INCREMENT,
  `nama_kabupaten` varchar(100) NOT NULL,
  `jenis` enum('Kabupaten','Kota') NOT NULL,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=InnoDB AUTO_INCREMENT=496 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_predikat_skp
CREATE TABLE IF NOT EXISTS `master_predikat_skp` (
  `id_predikat_skp` int unsigned NOT NULL AUTO_INCREMENT,
  `predikat_skp` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_predikat_skp`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.master_status_perkawinan
CREATE TABLE IF NOT EXISTS `master_status_perkawinan` (
  `id_status_perkawinan` int unsigned NOT NULL AUTO_INCREMENT,
  `status_perkawinan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_status_perkawinan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.password_reset
CREATE TABLE IF NOT EXISTS `password_reset` (
  `id_reset` int unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int unsigned NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired_at` datetime NOT NULL,
  `used_at` datetime NOT NULL,
  PRIMARY KEY (`id_reset`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `password_reset_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` char(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_pegawai` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tmt_cpns` date NOT NULL,
  `tmt_pns` date NOT NULL,
  `no_telp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_jenis_kelamin` int unsigned NOT NULL,
  `id_agama` int unsigned NOT NULL,
  `id_status_perkawinan` int unsigned NOT NULL,
  `id_gol` int unsigned NOT NULL,
  `id_unit_kerja` int unsigned NOT NULL,
  `tipe_karyawan` varchar(10) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nip`),
  UNIQUE KEY `UNIQUE` (`nip`) USING BTREE,
  KEY `id_jenis_kelamin` (`id_jenis_kelamin`),
  KEY `id_agama` (`id_agama`),
  KEY `id_status_perkawinan` (`id_status_perkawinan`),
  KEY `id_gol` (`id_gol`),
  KEY `id_unit_kerja` (`id_unit_kerja`),
  CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `master_jenis_kelamin` (`id_jenis_kelamin`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_agama`) REFERENCES `master_agama` (`id_agama`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`id_status_perkawinan`) REFERENCES `master_status_perkawinan` (`id_status_perkawinan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pegawai_ibfk_4` FOREIGN KEY (`id_gol`) REFERENCES `master_golongan` (`id_gol`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pegawai_ibfk_5` FOREIGN KEY (`id_unit_kerja`) REFERENCES `master_divisi` (`id_unit_kerja`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.riwayat_diklat
CREATE TABLE IF NOT EXISTS `riwayat_diklat` (
  `id_riwayat_diklat` int unsigned NOT NULL AUTO_INCREMENT,
  `nip` char(18) NOT NULL,
  `id_jenis_diklat` int unsigned NOT NULL,
  `nama_diklat` varchar(100) NOT NULL,
  `tahun` year NOT NULL,
  PRIMARY KEY (`id_riwayat_diklat`),
  KEY `nip` (`nip`),
  KEY `id_jenis_diklat` (`id_jenis_diklat`),
  CONSTRAINT `riwayat_diklat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_diklat_ibfk_2` FOREIGN KEY (`id_jenis_diklat`) REFERENCES `master_diklat` (`id_jenis_diklat`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.riwayat_golongan
CREATE TABLE IF NOT EXISTS `riwayat_golongan` (
  `id_riwayat_gol` int unsigned NOT NULL AUTO_INCREMENT,
  `nip` char(18) NOT NULL,
  `id_gol` int unsigned NOT NULL,
  `tmt_golongan` date NOT NULL,
  PRIMARY KEY (`id_riwayat_gol`),
  KEY `nip` (`nip`),
  KEY `id_gol` (`id_gol`),
  CONSTRAINT `riwayat_golongan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_golongan_ibfk_2` FOREIGN KEY (`id_gol`) REFERENCES `master_golongan` (`id_gol`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.riwayat_jabatan
CREATE TABLE IF NOT EXISTS `riwayat_jabatan` (
  `id_riwayat_jabatan` int unsigned NOT NULL AUTO_INCREMENT,
  `nip` char(18) NOT NULL,
  `id_jabatan` int unsigned NOT NULL,
  `id_unit_kerja` int unsigned NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `tmt_akhir` date DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_jabatan`),
  KEY `nip` (`nip`),
  KEY `id_jabatan` (`id_jabatan`),
  KEY `id_unit_kerja` (`id_unit_kerja`),
  CONSTRAINT `riwayat_jabatan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_jabatan_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `master_jabatan` (`id_jabatan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_jabatan_ibfk_3` FOREIGN KEY (`id_unit_kerja`) REFERENCES `master_divisi` (`id_unit_kerja`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.riwayat_kehormatan
CREATE TABLE IF NOT EXISTS `riwayat_kehormatan` (
  `id_riwayat_kehormatan` int unsigned NOT NULL AUTO_INCREMENT,
  `nip` char(18) NOT NULL,
  `nama_penghargaan` varchar(100) NOT NULL,
  `tahun` year NOT NULL,
  PRIMARY KEY (`id_riwayat_kehormatan`),
  KEY `nip` (`nip`),
  CONSTRAINT `riwayat_kehormatan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.riwayat_keluarga
CREATE TABLE IF NOT EXISTS `riwayat_keluarga` (
  `id_riwayat_kel` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_keluarga` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_telp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nip` char(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_hub_kel` int unsigned NOT NULL,
  `jumlah` int DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_kel`),
  KEY `nip` (`nip`),
  KEY `id_hub_kel` (`id_hub_kel`),
  CONSTRAINT `riwayat_keluarga_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_keluarga_ibfk_2` FOREIGN KEY (`id_hub_kel`) REFERENCES `master_hub_kel` (`id_hub_kel`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.riwayat_pendidikan
CREATE TABLE IF NOT EXISTS `riwayat_pendidikan` (
  `id_riwayat_pend` int unsigned NOT NULL AUTO_INCREMENT,
  `nip` char(18) NOT NULL,
  `id_jenjang_pend` int unsigned NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `tahun_lulus` year NOT NULL,
  PRIMARY KEY (`id_riwayat_pend`),
  KEY `nip` (`nip`),
  KEY `id_jenjang_pend` (`id_jenjang_pend`),
  CONSTRAINT `riwayat_pendidikan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_pendidikan_ibfk_2` FOREIGN KEY (`id_jenjang_pend`) REFERENCES `master_jenjang_pend` (`id_jenjang_pend`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.riwayat_skp
CREATE TABLE IF NOT EXISTS `riwayat_skp` (
  `id_riwayat_skp` int unsigned NOT NULL AUTO_INCREMENT,
  `nip` char(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_predikat_skp` int unsigned NOT NULL,
  `rerata_nilai` int NOT NULL,
  `tahun` year NOT NULL,
  PRIMARY KEY (`id_riwayat_skp`),
  KEY `nip` (`nip`),
  KEY `id_predikat_skp` (`id_predikat_skp`),
  CONSTRAINT `riwayat_skp_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_skp_ibfk_2` FOREIGN KEY (`id_predikat_skp`) REFERENCES `master_predikat_skp` (`id_predikat_skp`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table profil_kepegawaian.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int unsigned NOT NULL AUTO_INCREMENT,
  `nip` char(18) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `role` enum('admin','pegawai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pegawai',
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `UNIQUE` (`username`) USING BTREE,
  UNIQUE KEY `UNIQUE1` (`email`) USING BTREE,
  KEY `nip` (`nip`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
