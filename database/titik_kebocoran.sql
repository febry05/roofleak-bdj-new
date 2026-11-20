/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : kebocoran_atap

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 17/11/2026 13:43:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for titik_kebocoran
-- ----------------------------
DROP TABLE IF EXISTS `titik_kebocoran`;
CREATE TABLE `titik_kebocoran`  (
  `id_titik` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alias_survei` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kode_zona` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `latitude` decimal(9, 6) NULL DEFAULT NULL,
  `longitude` decimal(9, 6) NULL DEFAULT NULL,
  `pos_x` smallint(0) NULL DEFAULT NULL,
  `pos_y` smallint(0) NULL DEFAULT NULL,
  `jumlah_survei` tinyint(0) NULL DEFAULT 1,
  `asal` enum('survei','baru') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'survei',
  `dibuat` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_titik`) USING BTREE,
  INDEX `kode_zona`(`kode_zona`) USING BTREE,
  CONSTRAINT `titik_kebocoran_ibfk_1` FOREIGN KEY (`kode_zona`) REFERENCES `zona` (`kode_zona`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of titik_kebocoran
-- ----------------------------
INSERT INTO `titik_kebocoran` VALUES ('T01', 'Titik 01', 'Titik 01', 'kanan', -3.437210, 114.762249, 771, 578, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T02', 'Titik 02', 'Titik 02', 'kanan', -3.437216, 114.762063, 719, 550, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T03', 'Titik 03', 'Titik 03, Titik 04, Titik 05', 'kanan', -3.436954, 114.761968, 734, 495, 3, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T06', 'Titik 06', 'Titik 06, Titik 07', 'kanan', -3.436729, 114.761829, 710, 428, 2, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T08', 'Titik 08', 'Titik 08', 'kanan', -3.436539, 114.761676, 698, 360, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T09', 'Titik 09', 'Titik 09', 'kanan', -3.436296, 114.761492, 677, 322, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T10', 'Titik 10', 'Titik 10', 'airside', -3.437570, 114.759428, 127, 347, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T11', 'Titik 11', 'Titik 11', 'airside', -3.437561, 114.759572, 185, 455, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T12', 'Titik 12', 'Titik 12, Titik 13', 'airside', -3.437960, 114.760268, 218, 479, 2, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T14', 'Titik 14', 'Titik 14', 'airside', -3.438015, 114.760495, 249, 503, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T15', 'Titik 15', 'Titik 15, Titik 16', 'airside', -3.437809, 114.760520, 265, 469, 2, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T17', 'Titik 17', 'Titik 17', 'airside', -3.437930, 114.760888, 334, 500, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T18', 'Titik 18', 'Titik 18', 'airside', -3.438099, 114.760884, 364, 595, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T19', 'Titik 19', 'Titik 19', 'airside', -3.438006, 114.761168, 442, 608, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T20', 'Titik 20', 'Titik 20', 'tengah', -3.436038, 114.760442, 529, 253, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T21', 'Titik 21', 'Titik 21', 'kiri', -3.436375, 114.759939, 371, 192, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T22', 'Titik 22', 'Titik 22', 'kiri', -3.436422, 114.759933, 349, 222, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T23', 'Titik 23', 'Titik 23', 'kiri', -3.436582, 114.759941, 326, 262, 1, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T24', 'Titik 24', 'Titik 24, Titik 25', 'kiri', -3.436792, 114.759935, 218, 215, 2, 'survei', '2026-11-17 09:28:53');
INSERT INTO `titik_kebocoran` VALUES ('T26', 'Titik 26', 'Titik 26, Titik 27, Titik 28', 'kiri', -3.436788, 114.759379, 163, 200, 3, 'survei', '2026-11-17 09:28:53');

SET FOREIGN_KEY_CHECKS = 1;
