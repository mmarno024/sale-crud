/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.30 : Database - db_adibayu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_adibayu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_adibayu`;

/*Table structure for table `failed_jobs` */

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

/*Data for the table `failed_jobs` */

/*Table structure for table `master_items` */

DROP TABLE IF EXISTS `master_items`;

CREATE TABLE `master_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `master_items_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `master_items` */

insert  into `master_items`(`id`,`code`,`name`,`image`,`price`,`description`,`stock`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'ITEM001','Item 1','uploads/items/item1.jpg',4956.00,'Deskripsi untuk item 1',63,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(2,'ITEM002','Item 2','uploads/items/item2.jpg',3426.00,'Deskripsi untuk item 2',78,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(3,'ITEM003','Item 3','uploads/items/item3.jpg',9470.00,'Deskripsi untuk item 3',53,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(4,'ITEM004','Item 4','uploads/items/item4.jpg',7655.00,'Deskripsi untuk item 4',34,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(5,'ITEM005','Item 5','uploads/items/item5.jpg',2076.00,'Deskripsi untuk item 5',31,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(6,'ITEM006','Item 6','uploads/items/item6.jpg',7567.00,'Deskripsi untuk item 6',43,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(7,'ITEM007','Item 7','uploads/items/item7.jpg',1830.00,'Deskripsi untuk item 7',67,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(8,'ITEM008','Item 8','uploads/items/item8.jpg',5769.00,'Deskripsi untuk item 8',41,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(9,'ITEM009','Item 9','uploads/items/item9.jpg',2934.00,'Deskripsi untuk item 9',7,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(10,'ITEM010','Item 10','uploads/items/item10.jpg',3191.00,'Deskripsi untuk item 10',64,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(11,'ITEM011','Item 11','uploads/items/item11.jpg',9885.00,'Deskripsi untuk item 11',97,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(12,'ITEM012','Item 12','uploads/items/item12.jpg',6102.00,'Deskripsi untuk item 12',8,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(13,'ITEM013','Item 13','uploads/items/item13.jpg',9585.00,'Deskripsi untuk item 13',52,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(14,'ITEM014','Item 14','uploads/items/item14.jpg',4722.00,'Deskripsi untuk item 14',9,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(15,'ITEM015','Item 15','uploads/items/item15.jpg',9014.00,'Deskripsi untuk item 15',18,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(16,'ITEM016','Item 16','uploads/items/item16.jpg',7723.00,'Deskripsi untuk item 16',74,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(17,'ITEM017','Item 17','uploads/items/item17.jpg',3383.00,'Deskripsi untuk item 17',83,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(18,'ITEM018','Item 18','uploads/items/item18.jpg',4287.00,'Deskripsi untuk item 18',97,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(19,'ITEM019','Item 19','uploads/items/item19.jpg',7838.00,'Deskripsi untuk item 19',8,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(20,'ITEM020','Item 20','uploads/items/item20.jpg',4526.00,'Deskripsi untuk item 20',66,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(21,'ITEM021','Item 21','uploads/items/item21.jpg',6836.00,'Deskripsi untuk item 21',78,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(22,'ITEM022','Item 22','uploads/items/item22.jpg',9476.00,'Deskripsi untuk item 22',95,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(23,'ITEM023','Item 23','uploads/items/item23.jpg',2696.00,'Deskripsi untuk item 23',78,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(24,'ITEM024','Item 24','uploads/items/item24.jpg',1256.00,'Deskripsi untuk item 24',9,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(25,'ITEM025','Item 25','uploads/items/item25.jpg',4052.00,'Deskripsi untuk item 25',67,'2024-11-18 08:33:30','2024-11-18 08:33:30',NULL),
(29,'3452345-edit','Pengguna Admin edit 2','uploads/items/1731925246.png',322.00,'fgfgdvfdsfb',2,'2024-11-18 09:58:02','2024-11-18 10:21:35','2024-11-18 10:21:35');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2024_11_18_074816_create_items_table',1),
(8,'2024_11_18_102727_create_sales_table',2),
(9,'2024_11_18_154546_create_sale_item_table',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

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

/*Data for the table `personal_access_tokens` */

/*Table structure for table `sale_item` */

DROP TABLE IF EXISTS `sale_item`;

CREATE TABLE `sale_item` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_item_sale_id_foreign` (`sale_id`),
  KEY `sale_item_item_id_foreign` (`item_id`),
  CONSTRAINT `sale_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `master_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sale_item_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sale_item` */

insert  into `sale_item`(`id`,`sale_id`,`item_id`,`price`,`qty`,`total_price`,`created_at`,`updated_at`) values 
(3,4,11,9885.00,2,19770.00,NULL,NULL),
(4,4,15,9014.00,1,9014.00,NULL,NULL),
(5,4,19,7838.00,5,39190.00,NULL,NULL),
(6,5,2,3426.00,5,17130.00,NULL,NULL),
(7,6,8,5769.00,1,5769.00,NULL,NULL),
(8,6,1,4956.00,2,9912.00,NULL,NULL),
(9,6,2,3426.00,1,3426.00,NULL,NULL),
(10,7,11,9885.00,1,9885.00,NULL,NULL),
(11,7,15,9014.00,1,9014.00,NULL,NULL),
(12,7,16,7723.00,1,7723.00,NULL,NULL),
(13,7,19,7838.00,1,7838.00,NULL,NULL),
(14,8,1,4956.00,2,9912.00,NULL,NULL),
(15,8,7,1830.00,2,3660.00,NULL,NULL),
(16,9,2,3426.00,2,6852.00,NULL,NULL),
(17,9,8,5769.00,2,11538.00,NULL,NULL),
(18,9,9,2934.00,1,2934.00,NULL,NULL),
(19,3,2,3426.00,3,10278.00,NULL,NULL),
(20,3,8,5769.00,1,5769.00,NULL,NULL),
(21,3,1,4956.00,1,4956.00,NULL,NULL),
(22,3,5,2076.00,1,2076.00,NULL,NULL);

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sales` */

insert  into `sales`(`id`,`sale_id`,`total`,`created_at`,`updated_at`,`deleted_at`) values 
(3,'SALE-673B684DB0CCA',23079.00,'2024-08-08 16:16:13','2024-11-19 01:58:12','2024-11-19 01:58:12'),
(4,'SALE-20241118161710',67974.00,'2024-08-28 16:17:10','2024-08-28 16:17:10',NULL),
(5,'SALE-20241118-171445',17130.00,'2024-09-09 17:14:45','2024-09-09 17:14:45',NULL),
(6,'SALE-20241118-171507',19107.00,'2024-10-22 17:15:07','2024-10-22 17:15:07',NULL),
(7,'SALE-20241118-171545',34460.00,'2024-10-30 17:15:45','2024-10-30 17:15:45',NULL),
(8,'SALE-20241118-171608',13572.00,'2024-11-05 17:16:08','2024-11-05 17:16:08',NULL),
(9,'SALE-20241118-171636',21324.00,'2024-11-18 17:16:36','2024-11-18 17:16:36',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`address`,`phone`,`gender`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Administrator','admin@mail.com',NULL,'$2y$10$j3Tp2DigPxcPGgkllC.tj.92V/nJOqBKq6LsXJLJf4GSkFGL.LHUS','Jl. Raya Yogyakarta','081234567890','Laki-laki',NULL,'2024-11-18 08:33:28','2024-11-18 08:33:28',NULL),
(2,'Pengguna Admin edit 2','admin@techvill.net',NULL,'$2y$10$D4BgUw4Yu54UFqFz7n89fe3sn.5Hbn5ajTV72sboio2313Vyv1bye','Jalan Raya Wates Purworjo Seling','08122942024','Perempuan',NULL,'2024-11-18 09:12:56','2024-11-18 10:03:12',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
