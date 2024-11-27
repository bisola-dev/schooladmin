/*
 Navicat Premium Dump SQL

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 90001 (9.0.1)
 Source Host           : localhost:3306
 Source Schema         : schooladmin

 Target Server Type    : MySQL
 Target Server Version : 90001 (9.0.1)
 File Encoding         : 65001

 Date: 27/11/2024 16:40:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fulln` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hemal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hpazz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `passupdat` int NOT NULL DEFAULT '0',
  `ket` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
BEGIN;
INSERT INTO `admin` (`id`, `fulln`, `schname`, `admail`, `logo`, `addy`, `hemal`, `hpazz`, `fon`, `role`, `created_at`, `updated_at`, `passupdat`, `ket`) VALUES (1, 'bisola Makinwa', NULL, NULL, NULL, NULL, '213713a7735abe8ccd091ad1ca4c93fb ', '8ab0198b1ea66ff63b10fd05bef7f9c3', NULL, '1', NULL, '2024-09-21 21:03:38', 1, 0);
INSERT INTO `admin` (`id`, `fulln`, `schname`, `admail`, `logo`, `addy`, `hemal`, `hpazz`, `fon`, `role`, `created_at`, `updated_at`, `passupdat`, `ket`) VALUES (2, 'Oreofe Muyiwa', 'Oreofe Nursery and primary school', 'Oreofeschools@yahoo.com', '202409212135_202408021350_2.jpg', '12,kenya express way iju,Ishaga', '4e7c17e383f06db83499acc58692929a', 'e965bca2d76c157ff01b483a6bc4113f', '08057516152', '1', '2024-09-21 21:12:32', '2024-09-21 22:06:06', 1, 0);
INSERT INTO `admin` (`id`, `fulln`, `schname`, `admail`, `logo`, `addy`, `hemal`, `hpazz`, `fon`, `role`, `created_at`, `updated_at`, `passupdat`, `ket`) VALUES (3, 'Oreofe Muyiwaz', NULL, 'Oreofeschools@yahoo.com', NULL, NULL, '4e7c17e383f06db83499acc58692929a', '2165d8b4afb5b5124b91392d3ca6adac', NULL, '1', '2024-09-21 21:37:21', '2024-09-21 22:24:48', 0, 0);
INSERT INTO `admin` (`id`, `fulln`, `schname`, `admail`, `logo`, `addy`, `hemal`, `hpazz`, `fon`, `role`, `created_at`, `updated_at`, `passupdat`, `ket`) VALUES (4, 'Segun', NULL, 'segun@yahoo.com', NULL, NULL, '5e812fa50fe08661594a065507445174', 'e965bca2d76c157ff01b483a6bc4113f', NULL, '3', '2024-11-20 13:49:20', '2024-11-20 13:50:29', 1, 0);
INSERT INTO `admin` (`id`, `fulln`, `schname`, `admail`, `logo`, `addy`, `hemal`, `hpazz`, `fon`, `role`, `created_at`, `updated_at`, `passupdat`, `ket`) VALUES (5, 'Gbenga Yakubu', NULL, 'Mryaks@yahoo.com', NULL, NULL, '9a16d5cc205a5526f942c3bfe6a42c81', '7b15ac9642f049be2123a8958ced34e5', NULL, '1', '2024-11-27 15:38:03', '2024-11-27 15:38:03', 0, 0);
COMMIT;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for classrm
-- ----------------------------
DROP TABLE IF EXISTS `classrm`;
CREATE TABLE `classrm` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of classrm
-- ----------------------------
BEGIN;
INSERT INTO `classrm` (`id`, `classname`, `created_at`, `updated_at`, `admail`) VALUES (1, 'jss  1a', '2024-09-21 22:12:24', '2024-09-22 09:56:19', 'created byOreofeschools@yahoo.com');
INSERT INTO `classrm` (`id`, `classname`, `created_at`, `updated_at`, `admail`) VALUES (2, 'Jss 2', '2024-09-21 22:12:51', '2024-09-21 22:12:51', 'created byOreofeschools@yahoo.com');
INSERT INTO `classrm` (`id`, `classname`, `created_at`, `updated_at`, `admail`) VALUES (5, 'Jss 3', '2024-09-22 09:36:55', '2024-09-22 09:36:55', 'created byOreofeschools@yahoo.com');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of job_batches
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (65, '2019_08_19_000000_create_failed_jobs_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (66, '2019_12_14_000001_create_personal_access_tokens_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (67, '2024_08_01_123657_create_admin_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (68, '2024_08_02_104404_create_user_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (69, '2024_08_09_150506_create_subby_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (70, '2024_08_12_142522_create_students_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (71, '2024_08_14_132258_create_payyy_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (72, '2024_08_14_134005_create_paymenttype_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (73, '2024_08_18_142323_create_seszion_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (74, '2024_08_23_173718_recreate_tezz_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (75, '2024_08_30_152652_create_ova_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (76, '2024_09_04_165659_add_sessid_and_termid_to_students_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (77, '2024_09_08_171934_recreate_payyy_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (78, '2024_09_09_111035_change_parentno_column_type_in_students_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (79, '2024_09_09_111221_change_parentno_back_to_string_in_students_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (83, '2024_09_21_204247_add_columns_to_admin_table', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (84, '2024_09_09_163157_modify_tezz_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (85, '2024_09_21_202038_update_admin_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (86, '2024_09_21_215344_create_classrm_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (87, '2024_09_21_221035_add_admail_to_classrm_table', 5);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (88, '2024_09_22_113831_add_parentemail_to_student_table', 6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (89, '2024_09_22_125315_add_studimg_to_student_table', 7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (90, '2024_11_27_153218_create_sessions_table', 8);
COMMIT;

-- ----------------------------
-- Table structure for ova
-- ----------------------------
DROP TABLE IF EXISTS `ova`;
CREATE TABLE `ova` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `classid` bigint unsigned NOT NULL,
  `termid` tinyint unsigned NOT NULL,
  `sessid` bigint unsigned NOT NULL,
  `scori` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ova
-- ----------------------------
BEGIN;
INSERT INTO `ova` (`id`, `classid`, `termid`, `sessid`, `scori`, `created_at`, `updated_at`) VALUES (1, 1, 1, 4, 1200, '2024-09-22 10:40:59', '2024-09-22 10:41:48');
INSERT INTO `ova` (`id`, `classid`, `termid`, `sessid`, `scori`, `created_at`, `updated_at`) VALUES (2, 2, 1, 4, 1400, '2024-09-22 10:41:16', '2024-09-22 10:42:06');
INSERT INTO `ova` (`id`, `classid`, `termid`, `sessid`, `scori`, `created_at`, `updated_at`) VALUES (3, 5, 1, 4, 1600, '2024-09-22 10:41:36', '2024-09-22 10:41:36');
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for paymenttype
-- ----------------------------
DROP TABLE IF EXISTS `paymenttype`;
CREATE TABLE `paymenttype` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `paymenttype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of paymenttype
-- ----------------------------
BEGIN;
INSERT INTO `paymenttype` (`id`, `paymenttype`, `created_at`, `updated_at`) VALUES (2, 'Excursion fees', '2024-09-21 21:51:25', '2024-09-21 21:51:25');
INSERT INTO `paymenttype` (`id`, `paymenttype`, `created_at`, `updated_at`) VALUES (3, 'ICT Bills', '2024-09-21 21:51:33', '2024-09-21 21:51:33');
INSERT INTO `paymenttype` (`id`, `paymenttype`, `created_at`, `updated_at`) VALUES (4, 'School fees', '2024-09-21 22:49:50', '2024-09-21 22:49:50');
COMMIT;

-- ----------------------------
-- Table structure for payyy
-- ----------------------------
DROP TABLE IF EXISTS `payyy`;
CREATE TABLE `payyy` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `classid` int NOT NULL,
  `invoiceid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studid` int NOT NULL,
  `amt` decimal(8,2) NOT NULL,
  `sessid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payid` int NOT NULL,
  `termid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of payyy
-- ----------------------------
BEGIN;
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (1, 1, NULL, 11, 35000.00, '4', 2, '1', '2024-09-22 13:34:10', '2024-09-23 14:48:38');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (2, 1, NULL, 12, 45000.00, '4', 2, '1', '2024-09-22 13:34:10', '2024-09-22 13:34:10');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (3, 1, NULL, 13, 45000.00, '4', 2, '1', '2024-09-22 13:34:10', '2024-09-22 13:34:10');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (4, 1, NULL, 14, 45000.00, '4', 2, '1', '2024-09-22 13:34:10', '2024-09-22 13:34:10');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (5, 1, NULL, 23, 45000.00, '4', 2, '1', '2024-09-22 13:34:10', '2024-09-22 13:34:10');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (6, 1, NULL, 24, 45000.00, '4', 2, '1', '2024-09-22 13:34:10', '2024-09-22 13:34:10');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (7, 2, NULL, 15, 56000.00, '4', 2, '1', '2024-09-22 13:34:45', '2024-09-22 13:34:45');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (8, 2, NULL, 16, 56000.00, '4', 2, '1', '2024-09-22 13:34:45', '2024-09-22 13:34:45');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (9, 2, NULL, 21, 56000.00, '4', 2, '1', '2024-09-22 13:34:45', '2024-09-22 13:34:45');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (10, 2, NULL, 22, 56000.00, '2', 2, '1', '2024-09-22 13:34:45', '2024-09-22 13:57:58');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (11, 5, NULL, 17, 78000.00, '4', 4, '1', '2024-09-22 13:35:16', '2024-09-22 13:35:16');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (12, 5, NULL, 18, 78000.00, '4', 4, '1', '2024-09-22 13:35:16', '2024-09-22 13:35:16');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (13, 5, NULL, 26, 78000.00, '4', 4, '1', '2024-09-22 13:35:16', '2024-09-22 13:35:16');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (14, 1, NULL, 11, 56000.00, '4', 4, '1', '2024-09-22 13:36:09', '2024-09-22 13:36:09');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (15, 1, NULL, 12, 56000.00, '4', 4, '1', '2024-09-22 13:36:09', '2024-09-22 13:36:09');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (16, 1, NULL, 13, 56000.00, '4', 4, '1', '2024-09-22 13:36:09', '2024-09-22 13:36:09');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (17, 1, NULL, 14, 56000.00, '4', 4, '1', '2024-09-22 13:36:09', '2024-09-22 13:36:09');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (18, 1, NULL, 23, 56000.00, '4', 4, '1', '2024-09-22 13:36:09', '2024-09-22 13:36:09');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (19, 1, NULL, 24, 56000.00, '4', 4, '1', '2024-09-22 13:36:09', '2024-09-22 13:36:09');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (20, 1, NULL, 11, 56000.00, '4', 4, '1', '2024-09-22 13:36:26', '2024-09-22 13:36:26');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (21, 1, NULL, 12, 56000.00, '4', 4, '1', '2024-09-22 13:36:26', '2024-09-22 13:36:26');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (22, 1, NULL, 13, 56000.00, '4', 4, '1', '2024-09-22 13:36:26', '2024-09-22 13:36:26');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (23, 1, NULL, 14, 56000.00, '4', 4, '1', '2024-09-22 13:36:26', '2024-09-22 13:36:26');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (24, 1, NULL, 23, 56000.00, '4', 4, '1', '2024-09-22 13:36:26', '2024-09-22 13:36:26');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (25, 1, NULL, 24, 56000.00, '4', 4, '1', '2024-09-22 13:36:26', '2024-09-22 13:36:26');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (26, 5, NULL, 17, 80000.00, '4', 3, '1', '2024-09-22 13:37:27', '2024-09-22 13:37:27');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (28, 5, NULL, 26, 25000.00, '4', 2, '1', '2024-09-22 13:59:21', '2024-09-22 14:01:34');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (29, 1, NULL, 11, 32000.00, '4', 2, '1', '2024-09-23 14:45:45', '2024-09-23 14:45:45');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (30, 1, NULL, 12, 32000.00, '4', 2, '1', '2024-09-23 14:45:45', '2024-09-23 14:45:45');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (31, 1, NULL, 13, 32000.00, '4', 2, '1', '2024-09-23 14:45:45', '2024-09-23 14:45:45');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (32, 1, NULL, 14, 32000.00, '4', 2, '1', '2024-09-23 14:45:45', '2024-09-23 14:45:45');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (33, 1, NULL, 23, 32000.00, '4', 2, '1', '2024-09-23 14:45:45', '2024-09-23 14:45:45');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (34, 1, NULL, 24, 32000.00, '4', 2, '1', '2024-09-23 14:45:45', '2024-09-23 14:45:45');
INSERT INTO `payyy` (`id`, `classid`, `invoiceid`, `studid`, `amt`, `sessid`, `payid`, `termid`, `created_at`, `updated_at`) VALUES (35, 1, NULL, 11, 32000.00, '4', 2, '1', '2024-09-23 14:48:03', '2024-09-23 14:48:03');
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('fii0TOgjASABXLAMNIblJFI0vJJZrxL1cPaDZlhU', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiUUdrdjlXbGxMYjJNbWNOc0JBcXJFTnU2bWxnT1B5QmlFbndKT2RPMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jcmVhdGVhZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjI6ImlkIjtpOjE7czo2OiJhZG1haWwiO047czo1OiJmdWxsbiI7czoxNDoiYmlzb2xhIE1ha2lud2EiO3M6Nzoic2NobmFtZSI7TjtzOjQ6InJvbGUiO3M6MToiMSI7fQ==', 1732721883);
COMMIT;

-- ----------------------------
-- Table structure for seszion
-- ----------------------------
DROP TABLE IF EXISTS `seszion`;
CREATE TABLE `seszion` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sessname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `seszion_sessname_unique` (`sessname`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of seszion
-- ----------------------------
BEGIN;
INSERT INTO `seszion` (`id`, `sessname`, `created_at`, `updated_at`) VALUES (2, '20242025', '2024-09-21 22:51:01', '2024-09-22 09:55:20');
INSERT INTO `seszion` (`id`, `sessname`, `created_at`, `updated_at`) VALUES (3, '20252026', '2024-09-21 22:51:20', '2024-09-22 09:47:53');
INSERT INTO `seszion` (`id`, `sessname`, `created_at`, `updated_at`) VALUES (4, '20232024', '2024-09-22 09:50:05', '2024-09-22 10:58:10');
COMMIT;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `classid` int NOT NULL,
  `sname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onames` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `parentno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sessid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termid` int DEFAULT NULL,
  `parentemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of students
-- ----------------------------
BEGIN;
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (11, 1, 'gloria', 'anozie', '12,durosinmi street,shomolu', '2020-11-05', '08067541234', 'Mr&Mrs Gloria', NULL, '2024-09-22 11:59:54', '2024-09-22 11:59:54', '4', 1, 'bisola@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (12, 1, 'jimi', 'kabiri', '11,thema street,mushin-Lagos', '2021-08-09', '08067541212', 'Mr&Mrs Jimi', NULL, '2024-09-22 11:59:54', '2024-09-22 11:59:54', '4', 1, 'nirudeen12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (13, 1, 'Eva', 'truth', '22,durosinmi street,shomolu', '2022-11-05', '08067541890', 'Mr&Mrs Eva', NULL, '2024-09-22 12:04:05', '2024-09-22 12:04:05', '4', 1, 'bisola12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (14, 1, 'rita', 'kabiri', '21,thema street,mushin-Lagos', '2022-08-09', '08067541768', 'Mr&Mrs Rita', NULL, '2024-09-22 12:04:05', '2024-09-22 12:04:05', '4', 1, 'nirudeen12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (15, 2, 'tunji', 'truth', '22,durosinmi street,shomolu', '2022-11-05', '08067541890', 'Mr&Mrs Eva', NULL, '2024-09-22 12:08:30', '2024-09-22 12:55:41', '4', 1, 'bisola12@yahoo.com', '9GKTEPiGgsLj2R0CLDi1k67ao2zeUsZApA5FIbaB.jpg');
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (16, 2, 'rpelumi', 'kabiri', '21,thema street,mushin-Lagos', '2022-08-09', '08067541768', 'Mr&Mrs Rita', NULL, '2024-09-22 12:08:30', '2024-09-22 12:55:52', '4', 1, 'nirudeen12@yahoo.com', 'kIYN09vAsvANFP3GMz0aRk9USkZ9R98SWRQJwyDH.png');
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (17, 5, 'shobowale', 'truth', '22,durosinmi street,shomolu', '2022-11-05', '08067541890', 'Mr&Mrs Shobowale', NULL, '2024-09-22 12:10:05', '2024-09-23 14:44:04', '4', 1, 'bisola12@yahoo.com', 'BSJ0t0IgFkXpScqtNKHXCsdi7Koj4ZI4X7dHqBqg.png');
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (18, 5, 'ammonia', 'kabiri', '21,thema street,mushin-Lagos', '2022-08-09', '08067541768', 'Mr&Mrs Rita', NULL, '2024-09-22 12:10:05', '2024-09-22 12:10:05', '4', 1, 'nirudeen12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (19, 1, 'segun', 'truth', '22,durosinmi street,shomolu', '2022-11-05', '08067541890', 'Mr&Mrs Eva', NULL, '2024-09-22 12:12:39', '2024-09-22 12:12:39', '2', 1, 'bisola12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (20, 1, 'olagedo', 'kabiri', '21,thema street,mushin-Lagos', '2022-08-09', '08067541768', 'Mr&Mrs Rita', NULL, '2024-09-22 12:12:39', '2024-09-22 12:12:39', '2', 1, 'nirudeen12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (21, 2, 'babatunde', 'adeyi', '22,durosinmi street,shomolu', '2022-11-05', '08067541890', 'Mr&Mrs Eva', NULL, '2024-09-22 12:19:58', '2024-09-22 12:45:05', '4', 1, 'bisola12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (22, 2, 'Sefiu', 'adams', '21,onyeka street,mushin-Lagos', '2022-08-09', '08067541768', 'Mr&Mrs sefiu', NULL, '2024-09-22 12:19:58', '2024-09-22 12:45:40', '4', 1, 'Sefiushapat12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (23, 1, 'segun', 'truth', '22,durosinmi street,shomolu', '2022-11-05', '08067541890', 'Mr&Mrs Eva', NULL, '2024-09-22 12:23:11', '2024-09-22 12:23:11', '4', 1, 'bisola12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (24, 1, 'olagedo', 'kabiri', '21,thema street,mushin-Lagos', '2022-08-09', '08067541768', 'Mr&Mrs Rita', NULL, '2024-09-22 12:23:11', '2024-09-22 12:23:11', '4', 1, 'nirudeen12@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (25, 2, 'Olabode', 'hassan', '12,palmgroove estate,kukoyi street', '2019-08-01', '08067541234', 'Mr&Mrs Olabode', NULL, '2024-09-22 12:24:50', '2024-09-22 12:45:55', '3', 1, 'olabode@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (26, 5, 'hannah', 'sui', '12,laduga street mushin-Lagos', '2018-09-02', '08076543210', 'Mr&Mrs hannah', NULL, '2024-09-22 12:44:04', '2024-09-22 12:44:04', '4', 1, 'hannahM@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (27, 5, 'balikis', 'thelma', '12,onadeyi street,shimolu-Lagos', '2020-02-10', '08023145612', 'Mr&Mrs Balikis', NULL, '2024-09-23 14:41:28', '2024-09-23 14:41:28', '4', 1, 'bisola@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (28, 5, 'yetunde', 'ladun', '34,oladeyin street,ketu-Lagos', '2021-08-12', '08067541231', 'Mr&Mrs Yetunde', NULL, '2024-09-23 14:41:28', '2024-09-23 14:41:28', '4', 1, 'yetunde_ladun@yahoo.com', NULL);
INSERT INTO `students` (`id`, `classid`, `sname`, `onames`, `addy`, `dob`, `parentno`, `parentname`, `ppass`, `created_at`, `updated_at`, `sessid`, `termid`, `parentemail`, `studimg`) VALUES (29, 5, 'oyewunmi', 'hannah', '11,kenya express way iju,Ishaga', '2021-06-18', '08037123456', 'Mr&Mrs Oyewunmi', NULL, '2024-09-23 14:42:55', '2024-09-23 14:42:55', '4', 1, 'oyewunmi12@yahoo.com', NULL);
COMMIT;

-- ----------------------------
-- Table structure for subby
-- ----------------------------
DROP TABLE IF EXISTS `subby`;
CREATE TABLE `subby` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of subby
-- ----------------------------
BEGIN;
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (1, 'English Language', '2024-09-22 10:46:47', '2024-09-22 10:46:47');
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (2, 'Mathematics', '2024-09-22 10:46:52', '2024-09-22 10:46:52');
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (3, 'Physics', '2024-09-22 10:46:57', '2024-09-22 10:46:57');
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (4, 'chemistry', '2024-09-22 10:47:03', '2024-09-22 10:47:03');
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (6, 'Economics', '2024-09-22 10:47:19', '2024-09-22 10:47:19');
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (7, 'Health Education', '2024-09-22 10:49:23', '2024-09-22 10:49:23');
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (8, 'Geography', '2024-09-22 10:49:27', '2024-09-22 10:49:27');
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (9, 'Science Education', '2024-09-22 10:49:50', '2024-09-22 10:49:50');
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (10, 'FurtherMathematics', '2024-09-22 10:50:02', '2024-09-22 10:50:02');
INSERT INTO `subby` (`id`, `subjectname`, `created_at`, `updated_at`) VALUES (11, 'Biology', '2024-09-22 11:04:52', '2024-09-22 11:04:52');
COMMIT;

-- ----------------------------
-- Table structure for tezz
-- ----------------------------
DROP TABLE IF EXISTS `tezz`;
CREATE TABLE `tezz` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `classid` bigint unsigned NOT NULL,
  `subid` bigint unsigned NOT NULL,
  `studid` int NOT NULL,
  `testscore` int NOT NULL,
  `sessid` bigint unsigned NOT NULL,
  `termid` bigint unsigned NOT NULL,
  `examscore` int DEFAULT NULL,
  `toal` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tezz
-- ----------------------------
BEGIN;
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (1, 1, 1, 19, 23, 2, 1, NULL, NULL, '2024-09-22 14:11:32', '2024-09-22 14:11:32');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (2, 1, 1, 20, 25, 2, 1, NULL, NULL, '2024-09-22 14:11:32', '2024-09-22 14:11:32');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (3, 1, 2, 11, 26, 4, 1, 49, 75, '2024-09-22 14:12:52', '2024-09-22 14:32:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (4, 1, 2, 12, 30, 4, 1, 50, 80, '2024-09-22 14:12:52', '2024-09-22 14:32:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (5, 1, 2, 13, 22, 4, 1, 60, 82, '2024-09-22 14:12:52', '2024-09-22 14:32:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (6, 1, 2, 14, 22, 4, 1, 70, 92, '2024-09-22 14:12:52', '2024-09-22 14:32:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (7, 1, 2, 23, 24, 4, 1, 48, 72, '2024-09-22 14:12:52', '2024-09-22 14:32:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (8, 1, 2, 24, 26, 4, 1, 55, 81, '2024-09-22 14:12:53', '2024-09-22 14:32:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (9, 1, 3, 11, 25, 4, 1, 44, 69, '2024-09-22 14:14:38', '2024-09-22 14:35:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (10, 1, 3, 12, 24, 4, 1, 56, 80, '2024-09-22 14:14:38', '2024-09-22 14:35:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (11, 1, 3, 13, 23, 4, 1, 66, 89, '2024-09-22 14:14:38', '2024-09-22 14:35:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (12, 1, 3, 14, 22, 4, 1, 48, 70, '2024-09-22 14:14:38', '2024-09-22 14:35:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (13, 1, 3, 23, 26, 4, 1, 50, 76, '2024-09-22 14:14:38', '2024-09-22 14:35:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (14, 1, 3, 24, 26, 4, 1, 60, 86, '2024-09-22 14:14:38', '2024-09-22 14:35:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (15, 1, 4, 11, 23, 4, 1, 48, 71, '2024-09-22 14:15:22', '2024-09-22 14:37:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (16, 1, 4, 12, 25, 4, 1, 45, 70, '2024-09-22 14:15:22', '2024-09-22 14:37:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (17, 1, 4, 13, 26, 4, 1, 55, 81, '2024-09-22 14:15:22', '2024-09-22 14:37:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (18, 1, 4, 14, 27, 4, 1, 59, 86, '2024-09-22 14:15:22', '2024-09-22 14:37:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (19, 1, 4, 23, 28, 4, 1, 60, 88, '2024-09-22 14:15:22', '2024-09-22 14:37:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (20, 1, 4, 24, 30, 4, 1, 44, 74, '2024-09-22 14:15:22', '2024-09-22 14:37:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (21, 1, 6, 11, 23, 4, 1, 48, 71, '2024-09-22 14:15:56', '2024-09-22 14:38:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (22, 1, 6, 12, 25, 4, 1, 49, 74, '2024-09-22 14:15:56', '2024-09-22 14:38:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (23, 1, 6, 13, 28, 4, 1, 50, 78, '2024-09-22 14:15:56', '2024-09-22 14:38:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (24, 1, 6, 14, 27, 4, 1, 60, 87, '2024-09-22 14:15:56', '2024-09-22 14:38:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (25, 1, 6, 23, 26, 4, 1, 55, 81, '2024-09-22 14:15:56', '2024-09-22 14:38:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (26, 1, 6, 24, 28, 4, 1, 58, 86, '2024-09-22 14:15:56', '2024-09-22 14:38:36');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (27, 1, 7, 11, 23, 4, 1, 49, 72, '2024-09-22 14:18:54', '2024-09-22 14:39:33');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (28, 1, 7, 12, 26, 4, 1, 48, 74, '2024-09-22 14:18:54', '2024-09-22 14:39:33');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (29, 1, 7, 13, 27, 4, 1, 46, 73, '2024-09-22 14:18:54', '2024-09-22 14:39:33');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (30, 1, 7, 14, 28, 4, 1, 50, 78, '2024-09-22 14:18:54', '2024-09-22 14:39:33');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (31, 1, 7, 23, 28, 4, 1, 55, 83, '2024-09-22 14:18:54', '2024-09-22 14:39:33');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (32, 1, 7, 24, 28, 4, 1, 58, 86, '2024-09-22 14:18:54', '2024-09-22 14:39:33');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (33, 1, 8, 11, 28, 4, 1, 30, 58, '2024-09-22 14:20:00', '2024-09-22 14:40:57');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (34, 1, 8, 12, 26, 4, 1, 50, 76, '2024-09-22 14:20:00', '2024-09-22 14:40:57');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (35, 1, 8, 13, 27, 4, 1, 58, 85, '2024-09-22 14:20:00', '2024-09-22 14:40:57');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (36, 1, 8, 14, 28, 4, 1, 47, 75, '2024-09-22 14:20:00', '2024-09-22 14:40:57');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (37, 1, 8, 23, 28, 4, 1, 58, 86, '2024-09-22 14:20:00', '2024-09-22 14:40:57');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (38, 1, 8, 24, 26, 4, 1, 56, 82, '2024-09-22 14:20:00', '2024-09-22 14:40:57');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (39, 1, 9, 11, 26, 4, 1, 34, 60, '2024-09-22 14:20:50', '2024-09-22 14:41:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (40, 1, 9, 12, 27, 4, 1, 65, 92, '2024-09-22 14:20:50', '2024-09-22 14:41:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (41, 1, 9, 13, 28, 4, 1, 62, 90, '2024-09-22 14:20:50', '2024-09-22 14:41:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (42, 1, 9, 14, 27, 4, 1, 61, 88, '2024-09-22 14:20:50', '2024-09-22 14:41:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (43, 1, 9, 23, 29, 4, 1, 57, 86, '2024-09-22 14:20:50', '2024-09-22 14:41:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (44, 1, 9, 24, 23, 4, 1, 54, 77, '2024-09-22 14:20:50', '2024-09-22 14:41:56');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (45, 1, 10, 11, 23, 4, 1, NULL, NULL, '2024-09-22 14:21:39', '2024-09-22 14:21:39');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (46, 1, 10, 12, 24, 4, 1, NULL, NULL, '2024-09-22 14:21:39', '2024-09-22 14:21:39');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (47, 1, 10, 13, 26, 4, 1, NULL, NULL, '2024-09-22 14:21:39', '2024-09-22 14:21:39');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (48, 1, 10, 14, 27, 4, 1, NULL, NULL, '2024-09-22 14:21:39', '2024-09-22 14:21:39');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (49, 1, 10, 23, 28, 4, 1, NULL, NULL, '2024-09-22 14:21:39', '2024-09-22 14:21:39');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (50, 1, 10, 24, 26, 4, 1, NULL, NULL, '2024-09-22 14:21:39', '2024-09-22 14:21:39');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (51, 1, 11, 11, 23, 4, 1, NULL, NULL, '2024-09-22 14:22:31', '2024-09-22 14:22:31');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (52, 1, 11, 12, 24, 4, 1, NULL, NULL, '2024-09-22 14:22:31', '2024-09-23 14:51:15');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (53, 1, 11, 13, 26, 4, 1, NULL, NULL, '2024-09-22 14:22:31', '2024-09-23 14:51:15');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (54, 1, 11, 14, 27, 4, 1, NULL, NULL, '2024-09-22 14:22:31', '2024-09-23 14:51:15');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (55, 1, 11, 23, 28, 4, 1, NULL, NULL, '2024-09-22 14:22:31', '2024-09-23 14:51:15');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (56, 1, 11, 24, 29, 4, 1, NULL, NULL, '2024-09-22 14:22:31', '2024-09-22 14:22:31');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (57, 1, 2, 19, 23, 2, 1, NULL, NULL, '2024-09-22 14:22:58', '2024-09-22 14:22:58');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (58, 1, 1, 11, 26, 4, 1, 60, 86, '2024-09-22 14:32:01', '2024-09-23 14:53:09');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (59, 1, 1, 12, 24, 4, 1, 56, 80, '2024-09-22 14:32:01', '2024-09-22 14:34:41');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (60, 1, 1, 13, 25, 4, 1, 49, 74, '2024-09-22 14:32:01', '2024-09-22 14:34:41');
INSERT INTO `tezz` (`id`, `classid`, `subid`, `studid`, `testscore`, `sessid`, `termid`, `examscore`, `toal`, `created_at`, `updated_at`) VALUES (62, 1, 1, 23, 26, 4, 1, 47, 73, '2024-09-22 14:32:01', '2024-09-22 14:34:41');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`),
  KEY `user_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
