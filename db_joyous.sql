/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 8.0.30 : Database - db_joyous
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_joyous` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_joyous`;

/*Table structure for table `tb_customer` */

DROP TABLE IF EXISTS `tb_customer`;

CREATE TABLE `tb_customer` (
  `id_customer` int NOT NULL AUTO_INCREMENT,
  `no_reservasi` char(12) DEFAULT '',
  `reservasi_date` datetime DEFAULT NULL,
  `nama_cust` varchar(200) DEFAULT '',
  `nomor_table` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `menu_makan` varchar(50) DEFAULT NULL,
  `telp` char(20) DEFAULT '',
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_customer` */

insert  into `tb_customer`(`id_customer`,`no_reservasi`,`reservasi_date`,`nama_cust`,`nomor_table`,`menu_makan`,`telp`,`email`) values 
(11,'1210','2025-10-14 20:00:00','Kak Joshua','009','2','081234002345','Joshua@gmail.com'),
(12,'1211','2025-11-06 19:04:00','Kak Robin','008','5','081234576449','robin@gmail.com'),
(13,'1211','2025-11-17 00:00:00','Kak Justin','003','5','082341213498','Justin@gmail.com'),
(14,'2012','2025-11-12 00:00:00','Kak Arya','010','5','00000000000','Arya@gmail.com'),
(15,'1213','2025-11-14 14:14:00','Kak Mityu','008','4','082313456788','mityu@gmail.com');

/*Table structure for table `tb_menu` */

DROP TABLE IF EXISTS `tb_menu`;

CREATE TABLE `tb_menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_menu` */

insert  into `tb_menu`(`id_menu`,`nama_menu`) values 
(1,'Breakfast'),
(2,'Lunch'),
(3,'Dinner'),
(4,'Birthday Party'),
(5,'Romantic Dinner');

/*Table structure for table `tb_table` */

DROP TABLE IF EXISTS `tb_table`;

CREATE TABLE `tb_table` (
  `id_table` char(100) NOT NULL,
  `no_table` char(15) DEFAULT NULL,
  `status_table` enum('Tersedia','Dipesan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Tersedia',
  PRIMARY KEY (`id_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_table` */

insert  into `tb_table`(`id_table`,`no_table`,`status_table`) values 
('001','Table01','Tersedia'),
('002','Table02','Tersedia'),
('003','Table03','Tersedia'),
('004','Table04','Tersedia'),
('005','Table05','Tersedia'),
('006','Table06','Tersedia'),
('007','Table07','Tersedia'),
('008','Table08','Tersedia'),
('009','Table09','Tersedia'),
('010','Table10','Tersedia');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
