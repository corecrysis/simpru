/*
Navicat MySQL Data Transfer

Source Server         : stezar
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : simpru_pinjam_its

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2017-12-04 20:15:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keanggotaan` enum('internal','eksternal') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_admin` enum('super_admin','admin_fakultas','admin_jurusan') COLLATE utf8mb4_unicode_ci DEFAULT 'admin_jurusan',
  `id_kategori` int(8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'Stezar Priansya', 'stezarpriansya@gmail.com', '$2y$10$XTOe.CIV8H10hWeNf92zp.lgf8vMkNUS5FcJtG/kNNcEC7s1j017W', 'noRbK0noP52lls9CC43cdkFJt6LPF5vTJLmJw82hQksv2L4MEcVexSe11txS', '5213100131', null, null, 'admin_jurusan', '5', '2017-11-22 08:37:28', '2017-11-22 08:37:28', null);
INSERT INTO `admins` VALUES ('2', 'Pribadi', 'pribadi@gmail.com', '$2y$10$D/LWv3p82EutlX3IoxiPheQ/lSt06nJdACero/nQXmru3PCCkJLCm', 'DyVDXWhYWU54PRTGhMK0LRpC2iPvHFb6spkUq8DW7Ko7tyAnQKhIw58ehNBF', '12345678', null, '0898765432', 'admin_jurusan', null, '2017-11-30 14:31:20', '2017-11-30 14:31:20', null);
INSERT INTO `admins` VALUES ('3', 'Coba', 'coba@gmail.com', '$2y$10$OUIWUL7BEkzPiqhgpmFSHun/cP2wMhAEse/pqAU3N1nMAxct3qSIK', null, '12345678', null, '12345678999', 'admin_jurusan', null, '2017-11-30 14:36:44', '2017-11-30 14:36:44', null);
INSERT INTO `admins` VALUES ('4', 'Lupa', 'lupa@gmail.com', '$2y$10$h7TR53DjKBSXzeJmYJu7/OkmYv6CwVNZkpj2dNt5M6hEoMD5PRPvC', 'seXGpmOqVVdQhf8M4k3srQb3Yt4nGek8VTRIsseS47d3D9hoYt92gXG0AZF2', '123456780', null, '08987654829', 'admin_jurusan', null, '2017-11-30 14:40:09', '2017-11-30 14:40:09', null);
INSERT INTO `admins` VALUES ('5', 'Super Admin', 'yy.nomoe@gmail.com', '$2y$10$Xafw0.lyh7c.SeZyqov8HuoEFkFHRs1lddoCX.LcfhkWmKBBgZyHq', null, null, null, null, 'super_admin', null, '2017-12-04 10:15:58', '2017-12-04 10:17:14', null);

-- ----------------------------
-- Table structure for aturan_ruangan
-- ----------------------------
DROP TABLE IF EXISTS `aturan_ruangan`;
CREATE TABLE `aturan_ruangan` (
  `id_aturan_ruangan` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `id_ruangan` int(8) unsigned NOT NULL,
  `waktu_aturan_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `hari_ruangan` enum('0','1','2','3','4','5','6') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_aturan_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aturan_ruangan
-- ----------------------------
INSERT INTO `aturan_ruangan` VALUES ('1', '1', '08:00:00', '22:00:00', '1', '2017-11-19 19:41:42', '2017-11-19 19:41:44');
INSERT INTO `aturan_ruangan` VALUES ('2', '1', '08:00:00', '22:00:00', '2', '2017-11-19 19:41:42', '2017-11-19 19:41:44');
INSERT INTO `aturan_ruangan` VALUES ('3', '1', '09:00:00', '19:00:00', '0', '2017-11-19 13:16:54', '2017-11-19 13:16:54');
INSERT INTO `aturan_ruangan` VALUES ('4', '1', '07:00:00', '19:00:00', '6', '2017-11-19 13:20:02', '2017-11-19 13:20:02');
INSERT INTO `aturan_ruangan` VALUES ('5', '5', '20:00:00', '22:00:00', '2', '2017-11-26 05:23:07', '2017-11-26 07:39:43');
INSERT INTO `aturan_ruangan` VALUES ('6', '15', '08:00:00', '16:00:00', '1', '2017-11-28 10:45:40', '2017-11-28 10:45:40');

-- ----------------------------
-- Table structure for berkas_peminjaman
-- ----------------------------
DROP TABLE IF EXISTS `berkas_peminjaman`;
CREATE TABLE `berkas_peminjaman` (
  `id_berkas_peminjaman` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `tmp_berkas` text NOT NULL,
  `id_booking` int(20) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_berkas_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of berkas_peminjaman
-- ----------------------------

-- ----------------------------
-- Table structure for blacklist_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `blacklist_pengguna`;
CREATE TABLE `blacklist_pengguna` (
  `id_blacklist` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `nm_blacklist` int(11) NOT NULL,
  `id_pengguna` int(8) unsigned NOT NULL,
  `id_admin` int(8) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_blacklist`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blacklist_pengguna
-- ----------------------------

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id_booking` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `pembayaran` varchar(255) DEFAULT NULL,
  `berkas_peminjaman` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `tujuan_pinjam` text NOT NULL,
  `id_pengguna` int(8) unsigned DEFAULT NULL,
  `id_admin` int(8) unsigned DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES ('1', null, 'GM2A1K_payment_2_1512312259.pdf', 'ITS', 'coba', '2', null, '2017-11-30 21:51:18', '2017-11-30 14:51:18', '2017-12-03 14:44:19');
INSERT INTO `booking` VALUES ('2', null, null, 'asasasa', 'asas', null, '1', '2017-11-30 21:53:54', '2017-11-30 14:53:54', '2017-11-30 14:53:54');
INSERT INTO `booking` VALUES ('3', null, null, 'asas', 'asasas', null, '1', '2017-11-30 22:03:30', '2017-11-30 15:03:30', '2017-11-30 15:03:30');
INSERT INTO `booking` VALUES ('4', null, null, 'asa', 'asas', null, '1', '2017-11-30 22:37:42', '2017-11-30 15:37:42', '2017-11-30 15:37:42');
INSERT INTO `booking` VALUES ('5', null, null, 'ITS', 'coba', '19', null, '2017-12-04 04:21:19', '2017-12-03 21:21:19', '2017-12-03 21:21:19');
INSERT INTO `booking` VALUES ('6', null, null, 'ITS', 'coba', '19', null, '2017-12-04 04:47:50', '2017-12-03 21:47:50', '2017-12-03 21:47:50');
INSERT INTO `booking` VALUES ('11', null, null, 'cek', 'sdmskd', '19', null, '2017-12-04 04:55:44', '2017-12-03 21:55:44', '2017-12-03 21:55:44');
INSERT INTO `booking` VALUES ('12', null, null, 'ITS', 'kuliah', '20', null, '2017-12-04 17:02:29', '2017-12-04 10:02:29', '2017-12-04 10:02:29');

-- ----------------------------
-- Table structure for booking_waktu
-- ----------------------------
DROP TABLE IF EXISTS `booking_waktu`;
CREATE TABLE `booking_waktu` (
  `id_booking_waktu` int(11) NOT NULL AUTO_INCREMENT,
  `id_booking` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `status_verif` enum('0','1','2','3') DEFAULT '0' COMMENT '3 untuk expired',
  `keterangan` text,
  `id_admin_verif` int(8) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_booking_waktu`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booking_waktu
-- ----------------------------
INSERT INTO `booking_waktu` VALUES ('1', '1', '16', '3', null, null, '2017-12-01 08:30:00', '2017-12-01 11:00:00', '2017-11-30 14:51:18', '2017-12-04 03:15:18', null, '2017-12-03 03:10:36');
INSERT INTO `booking_waktu` VALUES ('2', '2', '16', '1', null, '1', '2017-12-01 08:30:00', '2017-12-01 11:00:00', '2017-11-30 14:53:55', '2017-12-04 03:10:45', null, '2017-12-06 03:10:41');
INSERT INTO `booking_waktu` VALUES ('3', '3', '16', '1', null, '1', '2017-12-01 08:30:00', '2017-12-01 11:00:00', '2017-11-30 15:03:30', '2017-12-04 03:10:52', null, '2017-12-06 03:10:46');
INSERT INTO `booking_waktu` VALUES ('4', '4', '16', '0', null, null, '2017-12-01 08:30:00', '2017-12-01 11:00:00', '2017-11-30 15:37:42', '2017-12-04 03:11:00', null, '2017-12-05 03:10:53');
INSERT INTO `booking_waktu` VALUES ('5', '5', '8', '0', null, null, '2017-12-05 02:30:00', '2017-12-05 04:00:00', '2017-12-03 21:21:19', '2017-12-03 21:21:19', null, '2017-12-13 21:21:19');
INSERT INTO `booking_waktu` VALUES ('6', '6', '19', '0', null, null, '2017-12-06 01:00:00', '2017-12-06 04:00:00', '2017-12-03 21:47:50', '2017-12-03 21:47:50', null, '2017-12-13 21:47:50');
INSERT INTO `booking_waktu` VALUES ('11', '11', '17', '0', null, null, '2017-12-07 02:30:00', '2017-12-07 07:30:00', '2017-12-03 21:55:44', '2017-12-03 21:55:44', null, '2017-12-13 21:55:44');
INSERT INTO `booking_waktu` VALUES ('12', '12', '9', '0', null, null, '2017-12-05 02:00:00', '2017-12-05 06:30:00', '2017-12-04 10:02:30', '2017-12-04 10:02:30', null, '2017-12-14 10:02:30');

-- ----------------------------
-- Table structure for foto_ruangan
-- ----------------------------
DROP TABLE IF EXISTS `foto_ruangan`;
CREATE TABLE `foto_ruangan` (
  `id_foto_ruangan` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `tmp_pict` text NOT NULL,
  `id_ruangan` int(8) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_foto_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of foto_ruangan
-- ----------------------------
INSERT INTO `foto_ruangan` VALUES ('1', 'ruang_sidang_utama1.jpg', '5', '2017-11-20 16:16:03', '2017-11-20 16:16:05');
INSERT INTO `foto_ruangan` VALUES ('2', 'ruang_sidang_utama2.jpg', '5', '2017-11-20 16:17:01', '2017-11-20 16:17:03');
INSERT INTO `foto_ruangan` VALUES ('3', 'ruang_sidang_utama3.jpg', '5', '2017-11-20 16:17:31', '2017-11-20 16:17:35');
INSERT INTO `foto_ruangan` VALUES ('4', 'ruang_rapat_pimpinan1.jpg', '9', '2017-11-20 16:18:44', '2017-11-20 16:18:47');
INSERT INTO `foto_ruangan` VALUES ('5', 'ruang_rapat_pimpinan2.jpg', '9', '2017-11-20 16:19:26', '2017-11-20 16:19:29');
INSERT INTO `foto_ruangan` VALUES ('6', 'ruang_rapat_pimpinan3.jpg', '9', '2017-11-20 16:19:59', '2017-11-20 16:20:01');
INSERT INTO `foto_ruangan` VALUES ('7', 'ruang_rapat_pimpinan4.jpg', '9', '2017-11-20 16:20:23', '2017-11-20 16:20:27');
INSERT INTO `foto_ruangan` VALUES ('8', 'ruang_makan1.jpg', '8', '2017-11-20 16:20:57', '2017-11-20 16:20:59');
INSERT INTO `foto_ruangan` VALUES ('9', 'ruang_makan2.jpg', '8', '2017-11-20 16:21:14', '2017-11-20 16:21:16');
INSERT INTO `foto_ruangan` VALUES ('10', 'TheaterA_1.jpg', '11', '2017-11-25 21:14:00', '2017-11-25 21:14:00');
INSERT INTO `foto_ruangan` VALUES ('11', 'TheaterA_2.jpg', '11', '2017-11-25 21:15:00', '2017-11-25 21:15:00');
INSERT INTO `foto_ruangan` VALUES ('12', 'TheaterA_3.jpg', '11', '2017-11-25 21:15:00', '2017-11-25 21:15:00');
INSERT INTO `foto_ruangan` VALUES ('13', 'TheaterB_1.jpg', '12', '2017-11-25 21:16:00', '2017-11-25 21:16:00');
INSERT INTO `foto_ruangan` VALUES ('14', 'TheaterB_2.jpg', '12', '2017-11-25 21:16:00', '2017-11-25 21:16:00');
INSERT INTO `foto_ruangan` VALUES ('15', 'TheaterB_3.jpg', '12', '2017-11-25 21:16:00', '2017-11-25 21:16:00');
INSERT INTO `foto_ruangan` VALUES ('16', 'TheaterB_4.jpg', '12', '2017-11-25 21:16:00', '2017-11-25 21:16:00');
INSERT INTO `foto_ruangan` VALUES ('17', 'TheaterB_5.jpg', '12', '2017-11-25 21:16:00', '2017-11-25 21:16:00');
INSERT INTO `foto_ruangan` VALUES ('18', 'TheaterC_1.jpg', '13', '2017-11-25 21:17:00', '2017-11-25 21:17:00');
INSERT INTO `foto_ruangan` VALUES ('19', 'TheaterC_2.jpg', '13', '2017-11-25 21:17:00', '2017-11-25 21:17:00');
INSERT INTO `foto_ruangan` VALUES ('20', 'TheaterC_3.jpg', '13', '2017-11-25 21:17:00', '2017-11-25 21:17:00');
INSERT INTO `foto_ruangan` VALUES ('21', 'GF101_1.jpg', '23', '2017-11-25 21:18:00', '2017-11-25 21:18:00');
INSERT INTO `foto_ruangan` VALUES ('22', 'GF101_2.jpg', '23', '2017-11-25 21:18:00', '2017-11-25 21:18:00');
INSERT INTO `foto_ruangan` VALUES ('23', 'GF101_3.jpg', '23', '2017-11-25 21:18:00', '2017-11-25 21:18:00');
INSERT INTO `foto_ruangan` VALUES ('24', 'GF102_1.jpg', '24', '2017-11-25 21:19:00', '2017-11-25 21:19:00');
INSERT INTO `foto_ruangan` VALUES ('25', 'GF102_2.jpg', '24', '2017-11-25 21:19:00', '2017-11-25 21:19:00');
INSERT INTO `foto_ruangan` VALUES ('26', 'GF102_3.jpg', '24', '2017-11-25 21:19:00', '2017-11-25 21:19:00');
INSERT INTO `foto_ruangan` VALUES ('27', 'GF102_4.jpg', '24', '2017-11-25 21:19:00', '2017-11-25 21:19:00');
INSERT INTO `foto_ruangan` VALUES ('28', 'GF103_1.jpg', '25', '2017-11-25 21:20:00', '2017-11-25 21:20:00');
INSERT INTO `foto_ruangan` VALUES ('29', 'GF103_2.jpg', '25', '2017-11-25 21:20:00', '2017-11-25 21:20:00');
INSERT INTO `foto_ruangan` VALUES ('30', 'GF103_3.jpg', '25', '2017-11-25 21:20:00', '2017-11-25 21:20:00');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori_ruangan` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(254) NOT NULL,
  `singkatan_kategori` varchar(255) DEFAULT NULL,
  `parent1` int(5) NOT NULL,
  `jenis_kategori` enum('fakultas','departemen','sarpras') NOT NULL DEFAULT 'departemen',
  `status_kategori` enum('aktif','tidak_aktif') NOT NULL DEFAULT 'aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kategori_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('1', 'Fakultas Teknologi Informasi dan Komunikasi', 'FTIK', '0', 'fakultas', 'aktif', '2017-11-27 11:11:21', '2017-11-27 11:11:24');
INSERT INTO `kategori` VALUES ('3', 'Fakultas Teknologi Kelautan', 'FTK', '0', 'fakultas', 'aktif', '2017-10-25 13:10:37', '2017-10-27 15:17:37');
INSERT INTO `kategori` VALUES ('4', 'Fakultas Teknolgi Elektro', 'FTE', '0', 'fakultas', 'aktif', '2017-10-25 14:26:26', '2017-10-25 14:26:40');
INSERT INTO `kategori` VALUES ('5', 'Rektorat', 'Rektorat', '0', 'sarpras', 'aktif', '2017-11-20 14:21:05', '2017-11-20 14:21:05');
INSERT INTO `kategori` VALUES ('6', 'Gedung Teater', 'Gedung Teater', '0', 'sarpras', 'aktif', '2017-11-20 14:21:49', '2017-11-20 14:21:57');
INSERT INTO `kategori` VALUES ('7', 'Gedung Pascasarjana', 'Gedung Pascasarjana', '0', 'sarpras', 'aktif', '2017-11-20 14:24:52', '2017-11-20 14:24:54');
INSERT INTO `kategori` VALUES ('8', 'Departemen Teknik Industri', 'TI', '10', 'departemen', 'aktif', '2017-11-20 14:25:30', '2017-11-20 14:25:32');
INSERT INTO `kategori` VALUES ('9', 'Departemen Teknik Geofisika', 'TG', '11', 'departemen', 'aktif', '2017-11-27 11:09:00', '2017-11-27 11:09:04');
INSERT INTO `kategori` VALUES ('10', 'Fakultas Teknologi Industri', 'FTI', '0', 'fakultas', 'aktif', '2017-12-03 20:55:08', '2017-12-03 20:55:11');
INSERT INTO `kategori` VALUES ('11', 'Fakultas Teknik Sipil, Lingkungan, dan Kebumian', 'FTSLK', '0', 'fakultas', 'aktif', '2017-12-03 20:57:25', '2017-12-03 20:57:29');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_02_02_232450_add_confirmation', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for ruangan
-- ----------------------------
DROP TABLE IF EXISTS `ruangan`;
CREATE TABLE `ruangan` (
  `id_ruangan` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `nm_ruangan` varchar(254) NOT NULL,
  `kapasitas` varchar(4) DEFAULT NULL,
  `detail_ruangan` text,
  `fasilitas_ruangan` text,
  `ketentuan_ruangan` text,
  `lokasi_ruangan` varchar(128) DEFAULT NULL,
  `no_hp_ruangan` varchar(20) DEFAULT NULL,
  `status_ruangan` enum('aktif','non_aktif') NOT NULL DEFAULT 'aktif',
  `id_kategori_ruangan` int(8) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ruangan
-- ----------------------------
INSERT INTO `ruangan` VALUES ('5', 'Ruang Sidang Utama', '150', null, '<ul><li>meja</li> <li>LCD proyektor</li> <li> LCD Layar utama</li> <li>LCD monitor tengah</li> <li>speaker meja</li> <li>podium</li> <li>speaker wireless</li> <li>sofa dan meja</li></ul>', '<ol><li>Pengguna mengajukan surat peminjaman ruangan</li><br><li>kasubbag TU rektorat memeriksa ketersediaan ruang yang akan dipinjam</li><br><li>Apabila ruangan tersedia, diberikan informasi peminjaman dan syarat ketentuan peminjaman </li><br><li>Apabila ruangan tidak tersedia, diberikan informasi bahwa ruang tidak tersedia</li><br><li>Syarat dan ketentuan peminjaman adalah menjaga kebersihan dan meninggalkan ruangan dalam keadaan bersih</li><br><li>Pengguna memakai ruangan sesuai syarat dan ketentuan</li><br><li>Kasubbag TU rektorat membuat monitoring peminjaman ruangan</li><br><li>Ada kebijakan, apabila pimpinan rektorat membutuhkan ruang sidang segera, walaupun ruang telah terpinjam, bisa di batalkan sepihak oleh TU rektorat, dengan memberikan informasi secepatnya</li><ol>', 'Rektorat Lt 1', '8570000', 'aktif', '5', '2017-11-20 16:12:42', '2017-11-20 16:12:45');
INSERT INTO `ruangan` VALUES ('6', 'Ruang Sidang depan', '60', null, '<ul><li>LCD proyektor</li><li>LCD layar utama</li><li>speaker meja></li><li>speaker wireless</li></ul>', '<ol><li>Pengguna mengajukan surat peminjaman ruangan</li><br><li>kasubbag TU rektorat memeriksa ketersediaan ruang yang akan dipinjam</li><br><li>Apabila ruangan tersedia, diberikan informasi peminjaman dan syarat ketentuan peminjaman </li><br><li>Apabila ruangan tidak tersedia, diberikan informasi bahwa ruang tidak tersedia</li><br><li>Syarat dan ketentuan peminjaman adalah menjaga kebersihan dan meninggalkan ruangan dalam keadaan bersih</li><br><li>Pengguna memakai ruangan sesuai syarat dan ketentuan</li><br><li>Kasubbag TU rektorat membuat monitoring peminjaman ruangan</li><br><li>Ada kebijakan, apabila pimpinan rektorat membutuhkan ruang sidang segera, walaupun ruang telah terpinjam, bisa di batalkan sepihak oleh TU rektorat, dengan memberikan informasi secepatnya</li><ol>', 'Rektorat Lt 1', '8570000', 'aktif', '5', '2017-11-20 16:12:47', '2017-11-20 16:12:49');
INSERT INTO `ruangan` VALUES ('7', 'Ruang Teleconference', '25', null, '<ul><li>kursi</li><li>meja melingkar</li><li>telekonferensi</li><li>LCD proyektor</li></ul>', '<ol><li>Pengguna mengajukan surat peminjaman ruangan</li><br><li>kasubbag TU rektorat memeriksa ketersediaan ruang yang akan dipinjam</li><br><li>Apabila ruangan tersedia, diberikan informasi peminjaman dan syarat ketentuan peminjaman </li><br><li>Apabila ruangan tidak tersedia, diberikan informasi bahwa ruang tidak tersedia</li><br><li>Syarat dan ketentuan peminjaman adalah menjaga kebersihan dan meninggalkan ruangan dalam keadaan bersih</li><br><li>Pengguna memakai ruangan sesuai syarat dan ketentuan</li><br><li>Kasubbag TU rektorat membuat monitoring peminjaman ruangan</li><br><li>Ada kebijakan, apabila pimpinan rektorat membutuhkan ruang sidang segera, walaupun ruang telah terpinjam, bisa di batalkan sepihak oleh TU rektorat, dengan memberikan informasi secepatnya</li><ol>', 'Rektorat Lt 1', '8570000', 'aktif', '5', '2017-11-20 16:12:51', '2017-11-20 16:12:54');
INSERT INTO `ruangan` VALUES ('8', 'Ruang Makan', '60', null, '<ul><li>kursi</li><li>meja makan</li><li>piano</li><li>whiteboard</li><li>speaker wireless</li></ul>', '<ol><li>Pengguna mengajukan surat peminjaman ruangan</li><br><li>kasubbag TU rektorat memeriksa ketersediaan ruang yang akan dipinjam</li><br><li>Apabila ruangan tersedia, diberikan informasi peminjaman dan syarat ketentuan peminjaman </li><br><li>Apabila ruangan tidak tersedia, diberikan informasi bahwa ruang tidak tersedia</li><br><li>Syarat dan ketentuan peminjaman adalah menjaga kebersihan dan meninggalkan ruangan dalam keadaan bersih</li><br><li>Pengguna memakai ruangan sesuai syarat dan ketentuan</li><br><li>Kasubbag TU rektorat membuat monitoring peminjaman ruangan</li><br><li>Ada kebijakan, apabila pimpinan rektorat membutuhkan ruang sidang segera, walaupun ruang telah terpinjam, bisa di batalkan sepihak oleh TU rektorat, dengan memberikan informasi secepatnya</li><ol>', 'Rektorat Lt 1', '8570000', 'aktif', '5', '2017-11-20 16:12:56', '2017-11-20 16:12:58');
INSERT INTO `ruangan` VALUES ('9', 'Ruang Rapat pimpinan', '25', null, '<ul><li>kursi</li><li>meja melingkar</li><li>LCD proyektor</li><li>speaker wireless</li><li>meja melingkar</li><li>LCD proyektor</li><li>speaker wireless</li></ul>', '<ol><li>Pengguna mengajukan surat peminjaman ruangan</li><br><li>kasubbag TU rektorat memeriksa ketersediaan ruang yang akan dipinjam</li><br><li>Apabila ruangan tersedia, diberikan informasi peminjaman dan syarat ketentuan peminjaman </li><br><li>Apabila ruangan tidak tersedia, diberikan informasi bahwa ruang tidak tersedia</li><br><li>Syarat dan ketentuan peminjaman adalah menjaga kebersihan dan meninggalkan ruangan dalam keadaan bersih</li><br><li>Pengguna memakai ruangan sesuai syarat dan ketentuan</li><br><li>Kasubbag TU rektorat membuat monitoring peminjaman ruangan</li><br><li>Ada kebijakan, apabila pimpinan rektorat membutuhkan ruang sidang segera, walaupun ruang telah terpinjam, bisa di batalkan sepihak oleh TU rektorat, dengan memberikan informasi secepatnya</li><ol>', 'Rektorat Lt 2', '8570000', 'aktif', '5', '2017-11-20 16:13:00', '2017-11-20 16:13:02');
INSERT INTO `ruangan` VALUES ('10', 'Ruang Sidang senat', '50', null, '<ul><li>kursi</li> <li>meja melingkar</li> <li>LCD proyektor</li> <li>speaker wireless</li> <li>meja melingkar</li> <li>LCD proyektor</li> <li>speaker wireless</li></ul>', '<ol><li>Pengguna mengajukan surat peminjaman ruangan</li><br><li>kasubbag TU rektorat memeriksa ketersediaan ruang yang akan dipinjam</li><br><li>Apabila ruangan tersedia, diberikan informasi peminjaman dan syarat ketentuan peminjaman </li><br><li>Apabila ruangan tidak tersedia, diberikan informasi bahwa ruang tidak tersedia</li><br><li>Syarat dan ketentuan peminjaman adalah menjaga kebersihan dan meninggalkan ruangan dalam keadaan bersih</li><br><li>Pengguna memakai ruangan sesuai syarat dan ketentuan</li><br><li>Kasubbag TU rektorat membuat monitoring peminjaman ruangan</li><br><li>Ada kebijakan, apabila pimpinan rektorat membutuhkan ruang sidang segera, walaupun ruang telah terpinjam, bisa di batalkan sepihak oleh TU rektorat, dengan memberikan informasi secepatnya</li><ol>', 'Rektorat Lt 2', '8570000', 'aktif', '5', '2017-11-20 16:13:05', '2017-11-20 16:13:07');
INSERT INTO `ruangan` VALUES ('11', 'Teater A', '150', null, '<ul><li>Kursi lipat</li><li>LCD proyektor</li><li>White Board</li></ul>', '<ol><li>Pengajuan surat ijin peminjaman ditujukan ke Dir. PPSP</li><br><li>Mematuhi syarat dan ketentuan yang berlaku di DPPSP baik internal maupun eksternal ITS</li></ol>', 'Gedung Teater A', '8570000', 'aktif', '6', '2017-11-20 16:13:09', '2017-11-20 16:13:12');
INSERT INTO `ruangan` VALUES ('12', 'Teater B', '125', null, '<ul><li>Kursi lipat</li><li>LCD proyektor</li><li>White Board</li></ul>', '<ol><li>Pengajuan surat ijin peminjaman ditujukan ke Dir. PPSP</li><br><li>Mematuhi syarat dan ketentuan yang berlaku di DPPSP baik internal maupun eksternal ITS</li></ol>', 'Gedung Teater B', '8570000', 'aktif', '6', '2017-11-20 16:13:14', '2017-11-20 16:13:16');
INSERT INTO `ruangan` VALUES ('13', 'Teater C', '125', null, '<ul><li>Kursi lipat</li><li>LCD proyektor</li><li>White Board</li></ul>', '<ol><li>Pengajuan surat ijin peminjaman ditujukan ke Dir. PPSP</li><br><li>Mematuhi syarat dan ketentuan yang berlaku di DPPSP baik internal maupun eksternal ITS</li></ol>', 'Gedung Teater C', '8570000', 'aktif', '6', '2017-11-20 16:13:19', '2017-11-20 16:13:22');
INSERT INTO `ruangan` VALUES ('14', 'Ruang Auditorium', '-', null, '<ul><li>Kursi lipat</li><li>LCD proyektor</li><li>Speaker wireless</li></ul>', '<ol><li>Pengajuan surat ijin peminjaman ditujukan ke Dir. PPSP</li><br><li>Mematuhi syarat dan ketentuan yang berlaku di DPPSP baik internal maupun eksternal ITS</li></ol>', 'Gedung Pascasarjana Lt.3', '8570000', 'aktif', '7', '2017-11-20 16:13:24', '2017-11-20 16:13:27');
INSERT INTO `ruangan` VALUES ('15', 'Ruang Kelas IE 101', '40', null, '<ul><li>AC</li><li>LCD</li><li>PC</li><li>Speaker</li><li>Whiteboard</li></ul>', 'Syarat Peminjaman : <br><ol><li>Proposal/Surat Kegiatan</li><li>Uang Jaminan Kebersihan 50rb/ruang</li></ol>', 'Teknik Industri', '8570000', 'non_aktif', '8', '2017-11-20 16:13:30', '2017-11-28 10:43:58');
INSERT INTO `ruangan` VALUES ('16', 'Ruang Kelas IE 102', '40', null, '<ul><li>AC</li><li>LCD</li><li>PC</li><li>Speaker</li><li>Whiteboard</li></ul>', 'Syarat Peminjaman : <br><ol><li>Proposal/Surat Kegiatan</li><li>Uang Jaminan Kebersihan 50rb/ruang</li></ol>', 'Teknik Industri', '8570000', 'aktif', '8', '2017-11-20 16:13:36', '2017-11-20 16:13:39');
INSERT INTO `ruangan` VALUES ('17', 'Ruang Kelas IE 103', '40', null, '<ul><li>AC</li><li>LCD</li><li>PC</li><li>Speaker</li><li>Whiteboard</li></ul>', 'Syarat Peminjaman : <br><ol><li>Proposal/Surat Kegiatan</li><li>Uang Jaminan Kebersihan 50rb/ruang</li></ol>', 'Teknik Industri', '8570000', 'aktif', '8', '2017-11-20 16:13:43', '2017-11-20 16:13:45');
INSERT INTO `ruangan` VALUES ('18', 'Ruang Kelas IE 104', '40', null, '<ul><li>AC</li><li>LCD</li><li>PC</li><li>Speaker</li><li>Whiteboard</li></ul>', 'Syarat Peminjaman : <br><ol><li>Proposal/Surat Kegiatan</li><li>Uang Jaminan Kebersihan 50rb/ruang</li></ol>', 'Teknik Industri', '8570000', 'aktif', '8', '2017-11-20 16:13:51', '2017-11-20 16:13:53');
INSERT INTO `ruangan` VALUES ('19', 'Ruang Kelas IE 105', '40', null, '<ul><li>AC</li><li>LCD</li><li>PC</li><li>Speaker</li><li>Whiteboard</li></ul>', 'Syarat Peminjaman : <br><ol><li>Proposal/Surat Kegiatan</li><li>Uang Jaminan Kebersihan 50rb/ruang</li></ol>', 'Teknik Industri', '8570000', 'aktif', '8', '2017-11-20 16:13:56', '2017-11-20 16:13:58');
INSERT INTO `ruangan` VALUES ('20', 'Ruang Kelas IE 106', '40', null, '<ul><li>AC</li><li>LCD</li><li>PC</li><li>Speaker</li><li>Whiteboard</li></ul>', 'Syarat Peminjaman : <br><ol><li>Proposal/Surat Kegiatan</li><li>Uang Jaminan Kebersihan 50rb/ruang</li></ol>', 'Teknik Industri', '8570000', 'aktif', '8', '2017-11-20 16:14:02', '2017-11-20 16:14:04');
INSERT INTO `ruangan` VALUES ('21', 'Ruang Kelas IE 108', '40', null, '<ul><li>AC</li><li>LCD</li><li>PC</li><li>Speaker</li><li>Whiteboard</li></ul>', 'Syarat Peminjaman : <br><ol><li>Proposal/Surat Kegiatan</li><li>Uang Jaminan Kebersihan 50rb/ruang</li></ol>', 'Teknik Industri', '8570000', 'aktif', '8', '2017-11-20 16:14:06', '2017-11-20 16:14:08');
INSERT INTO `ruangan` VALUES ('22', 'Ruang Kelas IE 109', '60', null, '<ul><li>AC</li><li>LCD</li><li>PC</li><li>Speaker</li><li>Whiteboard</li></ul>', 'Syarat Peminjaman : <br><ol><li>Proposal/Surat Kegiatan</li><li>Uang Jaminan Kebersihan 50rb/ruang</li></ol>', 'Teknik Industri', '8570000', 'aktif', '8', '2017-11-20 16:14:10', '2017-11-20 16:14:12');
INSERT INTO `ruangan` VALUES ('23', 'GF 101', '40', null, null, '', 'Geofisika', '8570000', 'aktif', '9', '2017-11-28 12:40:09', '2017-11-28 12:40:16');
INSERT INTO `ruangan` VALUES ('24', 'GF 102', '40', null, null, '', 'Geofisika', '8570000', 'aktif', '9', '2017-11-28 12:40:11', '2017-11-28 12:40:18');
INSERT INTO `ruangan` VALUES ('25', 'GF 103', '60', null, null, '', 'Geofisika', '8570000', 'aktif', '9', '2017-11-28 12:40:13', '2017-11-28 12:40:20');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keanggotaan` enum('internal','eksternal') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'coba', 'asas@skd.com', '$2y$10$ksRA7nM/aEvSbPFplYLkyu3tirpY6iIRZaZtbnXl87FBCyXfIjO9W', 'rw6bjjTzj8sxV1rYpGtFLD0PGbj9vPigmztMTYVukNaOlQXeIsBiRTIfEBFo', null, null, null, '2017-11-25 04:13:03', '2017-11-25 04:13:03', '0', null);
INSERT INTO `users` VALUES ('2', 'Stezar Priansya', 'stezar@gmail.com', '$2y$10$JmRHVPrfU9nPd3s7C72hA.C2nIsEWn51YdYLEgQhvisDdWhACYLqi', 'ygUKJ6WVcAkxbv6RbIsolBT5anaRy8fEwy9b9R3BYbx1LA2ub8oWUlSJVE04', '3578101701960006', 'internal', '081234931717', '2017-12-03 23:01:25', '2017-11-27 06:27:22', '0', null);
INSERT INTO `users` VALUES ('19', 'Stezar Priansya', 'stezarpriansya@gmail.com', '$2y$10$NBZNsRUuPeCWvv/zC7OwT.jeLDwYsWkKqMi.aMfIq9yrT7hGSx1Pa', null, '52131001311', 'eksternal', '083819618578', '2017-12-03 19:16:10', '2017-12-03 21:20:16', '1', null);
INSERT INTO `users` VALUES ('20', 'Yahya', 'yy.nomoe@gmail.com', '$2y$10$JZ1Uuk8ykNXKQRLNlUYe7.X9fX3z/ZlxH5qV2BF47SHysNnDy15mK', null, '918011009', 'eksternal', '123456789', '2017-12-04 09:54:42', '2017-12-04 09:59:56', '1', null);
INSERT INTO `users` VALUES ('21', 'Pri Rezki', 'eki.corecrysis@gmail.com', '$2y$10$tJI3lLHV7afr/HnmHf1re.Pwdm/BcfQMSx42btWYVC6Crq0ixjdJ.', null, '234567891234567', 'eksternal', '12345678989879090', '2017-12-04 09:56:53', '2017-12-04 09:56:53', '0', 'xMolviyOu8rgFMkUIakAxSEBIq6VNr');
SET FOREIGN_KEY_CHECKS=1;
