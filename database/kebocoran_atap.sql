-- Database monitoring kebocoran atap Bandara Syamsudin Noor (MySQL 8+)
CREATE DATABASE IF NOT EXISTS kebocoran_atap_new CHARACTER SET utf8mb4;
USE kebocoran_atap_new;
CREATE TABLE zona (kode_zona VARCHAR(10) PRIMARY KEY, nama_zona VARCHAR(40) NOT NULL, prioritas TINYINT NOT NULL);
CREATE TABLE status_ref (kode TINYINT PRIMARY KEY, nama VARCHAR(30) NOT NULL);
CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(40) NOT NULL UNIQUE, nama VARCHAR(80) NOT NULL, role ENUM('admin','user') NOT NULL DEFAULT 'user', password_hash VARCHAR(255) NOT NULL, aktif TINYINT(1) NOT NULL DEFAULT 1, last_login DATETIME NULL, dibuat DATETIME DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE titik_kebocoran (id_titik VARCHAR(12) PRIMARY KEY, nama VARCHAR(60) NOT NULL, alias_survei VARCHAR(120), kode_zona VARCHAR(10) NOT NULL, latitude DECIMAL(9,6) NULL, longitude DECIMAL(9,6) NULL, pos_x SMALLINT, pos_y SMALLINT, jumlah_survei TINYINT DEFAULT 1, asal ENUM('survei','baru') DEFAULT 'survei', dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (kode_zona) REFERENCES zona(kode_zona));
CREATE TABLE penanganan (id_titik VARCHAR(12) PRIMARY KEY, status TINYINT NOT NULL DEFAULT 0, pic VARCHAR(80), target_selesai DATE NULL, catatan TEXT, diperbarui DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, FOREIGN KEY (id_titik) REFERENCES titik_kebocoran(id_titik) ON DELETE CASCADE, FOREIGN KEY (status) REFERENCES status_ref(kode));
CREATE TABLE riwayat_status (id INT AUTO_INCREMENT PRIMARY KEY, id_titik VARCHAR(12) NOT NULL, status TINYINT NOT NULL, waktu DATETIME DEFAULT CURRENT_TIMESTAMP, oleh VARCHAR(60), FOREIGN KEY (id_titik) REFERENCES titik_kebocoran(id_titik) ON DELETE CASCADE);
CREATE VIEW v_monitoring AS SELECT t.id_titik, t.nama, z.nama_zona, z.prioritas, s.nama AS status, p.pic, p.target_selesai, p.catatan, p.diperbarui, (p.target_selesai < CURDATE() AND p.status < 3) AS lewat_target FROM titik_kebocoran t JOIN zona z USING (kode_zona) JOIN penanganan p USING (id_titik) JOIN status_ref s ON s.kode = p.status;
INSERT INTO zona VALUES ('airside','Airside / Atap Datar',1),('tengah','Tengah-Atas',1),('kanan','Sayap Kanan',2),('kiri','Sayap Kiri',3);
INSERT INTO status_ref VALUES (0,'Belum Ditangani'),(1,'Dijadwalkan'),(2,'Dalam Perbaikan'),(3,'Selesai');
INSERT INTO titik_kebocoran (id_titik,nama,alias_survei,kode_zona,latitude,longitude,pos_x,pos_y,jumlah_survei) VALUES
('T01','Titik 01','Titik 01','kanan',-3.437210,114.762249,771,578,1),
('T02','Titik 02','Titik 02','kanan',-3.437216,114.762063,719,550,1),
('T03','Titik 03','Titik 03, Titik 04, Titik 05','kanan',-3.436954,114.761968,734,495,3),
('T06','Titik 06','Titik 06, Titik 07','kanan',-3.436729,114.761829,710,428,2),
('T08','Titik 08','Titik 08','kanan',-3.436539,114.761676,698,360,1),
('T09','Titik 09','Titik 09','kanan',-3.436296,114.761492,677,322,1),
('T10','Titik 10','Titik 10','airside',-3.437570,114.759428,127,347,1),
('T11','Titik 11','Titik 11','airside',-3.437561,114.759572,185,455,1),
('T12','Titik 12','Titik 12, Titik 13','airside',-3.437960,114.760268,218,479,2),
('T14','Titik 14','Titik 14','airside',-3.438015,114.760495,249,503,1),
('T15','Titik 15','Titik 15, Titik 16','airside',-3.437809,114.760520,265,469,2),
('T17','Titik 17','Titik 17','airside',-3.437930,114.760888,334,500,1),
('T18','Titik 18','Titik 18','airside',-3.438099,114.760884,364,595,1),
('T19','Titik 19','Titik 19','airside',-3.438006,114.761168,442,608,1),
('T20','Titik 20','Titik 20','tengah',-3.436038,114.760442,529,253,1),
('T21','Titik 21','Titik 21','kiri',-3.436375,114.759939,371,192,1),
('T22','Titik 22','Titik 22','kiri',-3.436422,114.759933,349,222,1),
('T23','Titik 23','Titik 23','kiri',-3.436582,114.759941,326,262,1),
('T24','Titik 24','Titik 24, Titik 25','kiri',-3.436792,114.759935,218,215,2),
('T26','Titik 26','Titik 26, Titik 27, Titik 28','kiri',-3.436788,114.759379,163,200,3);
INSERT INTO penanganan (id_titik) SELECT id_titik FROM titik_kebocoran;
INSERT INTO users (username,nama,role,password_hash) VALUES ('admin','Administrator','admin','$2y$10$uEfdN1b6nqivBX9Dqe2Ry.vvtShqyro6AcrPGHPBqhh1IBnTNOQQS'),('user','Pengguna (hanya lihat)','user','$2y$10$0h07ygoGI8L92.7DXkeKB.2Q3tczvSC88/eijMHZnG6W6QDrPdaea');
