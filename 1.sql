/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.6-MariaDB : Database - idol
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`uphqvjhnhs` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `uphqvjhnhs`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`cat_id`,`cat_name`) values 
(1,'Vlogger'),
(2,'YouTubers'),
(3,'Actors'),
(4,'Comedians'),
(5,'TikTok'),
(6,'Creators'),
(7,'Gamers'),
(8,'Influencers'),
(9,'Twitch'),
(10,'Streamers'),
(11,'Models'),
(12,'Magicians'),
(13,'Dancers'),
(14,'Stylists'),
(15,'TV Hosts'),
(16,'Musicians'),
(17,'Singers'),
(18,'Kpop'),
(19,'Entrepreneurs'),
(20,'Cosplay'),
(21,'For Kids'),
(22,'Sports Stars'),
(23,'ASMR'),
(24,'Mukbang'),
(25,'Ulzzang'),
(26,'Oppa');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `idol_info` */

DROP TABLE IF EXISTS `idol_info`;

CREATE TABLE `idol_info` (
  `idol_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idol_user_id` bigint(20) DEFAULT NULL,
  `idol_cat_id` int(5) DEFAULT NULL,
  `idol_full_name` varchar(255) DEFAULT NULL,
  `idol_user_name` varchar(255) DEFAULT NULL,
  `idol_email` varchar(255) DEFAULT NULL,
  `idol_phone` varchar(255) DEFAULT NULL,
  `idol_bio` text DEFAULT NULL,
  `idol_photo` varchar(125) DEFAULT NULL,
  `idol_banner` varchar(125) DEFAULT NULL,
  `idol_fans` int(10) DEFAULT 0,
  `idol_rating` double DEFAULT 0,
  `idol_status` tinyint(5) DEFAULT 1 COMMENT '0=>deactive, 1=>active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `idol_info` */

insert  into `idol_info`(`idol_id`,`idol_user_id`,`idol_cat_id`,`idol_full_name`,`idol_user_name`,`idol_email`,`idol_phone`,`idol_bio`,`idol_photo`,`idol_banner`,`idol_fans`,`idol_rating`,`idol_status`,`created_at`,`updated_at`) values 
(19,13,6,'Idol1','Idol1','idol1@gmail.com','12346','fdsa','actor.png','actor1.png',0,0,1,'2021-06-10 18:58:27','2021-06-11 01:58:27');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_100000_create_password_resets_table',1),
(2,'2019_04_15_191331679173_create_1555355612601_permissions_table',1),
(3,'2019_04_15_191331731390_create_1555355612581_roles_table',1),
(4,'2019_04_15_191331779537_create_1555355612782_users_table',1),
(5,'2019_04_15_191332603432_create_1555355612603_permission_role_pivot_table',1),
(6,'2019_04_15_191332791021_create_1555355612790_role_user_pivot_table',1),
(7,'2019_04_15_191441675085_create_1555355681975_products_table',1),
(8,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `occasions` */

DROP TABLE IF EXISTS `occasions`;

CREATE TABLE `occasions` (
  `occasion_id` int(11) NOT NULL AUTO_INCREMENT,
  `occasion_name` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`occasion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `occasions` */

insert  into `occasions`(`occasion_id`,`occasion_name`) values 
(1,'Encouragement'),
(2,'Birthday'),
(3,'Gift'),
(4,'Advice'),
(5,'Congrats'),
(6,'Valentine’s'),
(7,'Other'),
(8,'None');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_idol_id` bigint(20) DEFAULT NULL,
  `order_fans_id` bigint(20) DEFAULT NULL,
  `order_who_for` tinyint(5) DEFAULT NULL,
  `order_to` varchar(125) DEFAULT NULL,
  `order_occasion` int(10) DEFAULT NULL,
  `order_lang` tinyint(5) DEFAULT NULL COMMENT '1=>English,2=>K, 3=>Mix',
  `order_introduction` text DEFAULT NULL,
  `order_payment_method` tinyint(5) DEFAULT NULL COMMENT '1=>stripe, 2=>paypal',
  `order_price` double DEFAULT NULL,
  `order_fee` double DEFAULT NULL,
  `order_total_price` double DEFAULT NULL,
  `order_status` tinyint(5) DEFAULT 0 COMMENT '0=>pending, 1=>completed, 2=>paidout, 3=>decline, 4=>expired, 5=>recent',
  `order_video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `orders` */

insert  into `orders`(`order_id`,`order_idol_id`,`order_fans_id`,`order_who_for`,`order_to`,`order_occasion`,`order_lang`,`order_introduction`,`order_payment_method`,`order_price`,`order_fee`,`order_total_price`,`order_status`,`order_video`,`created_at`,`updated_at`) values 
(37,13,5,2,'John',1,1,'I want to video',1,190,9.5,199.5,1,'WIN_20210604_03_36_35_Pro.mp4','2021-06-07 16:04:51','2021-06-07 23:04:51'),
(38,13,5,2,'John',1,3,'I want to video',1,190,9.5,199.5,1,'WIN_20210604_03_36_35_Pro.mp4','2021-06-07 16:07:05','2021-06-07 23:07:05'),
(44,13,2,2,'etrwe',1,1,'tre',1,190,9.5,199.5,3,NULL,'2021-06-14 03:19:27','2021-06-14 10:19:27'),
(45,13,5,2,'adf',1,1,'fdsaf',1,190,9.5,199.5,3,NULL,'2021-06-14 03:19:59','2021-06-14 10:19:59'),
(46,13,5,2,'rewqer',1,1,'rewr',1,190,9.5,199.5,3,NULL,'2021-06-14 03:20:42','2021-06-14 10:20:42'),
(47,13,5,2,'fdsaf',1,3,'fdsafds',2,190,9.5,199.5,0,NULL,'2021-06-14 08:48:17','2021-06-14 08:48:17');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  KEY `permission_role_role_id_foreign` (`role_id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`role_id`,`permission_id`) values 
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,10),
(1,11),
(1,12),
(1,13),
(1,14),
(1,15),
(1,16),
(1,17),
(1,18),
(1,19),
(1,20),
(1,21),
(2,17),
(2,18),
(2,19),
(2,20),
(2,21);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`title`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'user_management_access','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(2,'permission_create','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(3,'permission_edit','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(4,'permission_show','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(5,'permission_delete','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(6,'permission_access','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(7,'role_create','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(8,'role_edit','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(9,'role_show','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(10,'role_delete','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(11,'role_access','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(12,'user_create','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(13,'user_edit','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(14,'user_show','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(15,'user_delete','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(16,'user_access','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(17,'product_create','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(18,'product_edit','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(19,'product_show','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(20,'product_delete','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL),
(21,'product_access','2019-04-15 19:14:42','2019-04-15 19:14:42',NULL);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `review_id` int(10) NOT NULL AUTO_INCREMENT,
  `review_idol_id` int(10) DEFAULT NULL,
  `review_fans_id` int(10) DEFAULT NULL,
  `review_rating` int(5) DEFAULT 0,
  `review_feedback` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `reviews` */

insert  into `reviews`(`review_id`,`review_idol_id`,`review_fans_id`,`review_rating`,`review_feedback`,`created_at`,`updated_at`) values 
(1,13,5,3,'This is very excellent','2021-06-10 21:29:54','2021-06-10 21:29:54'),
(2,13,5,0,'Test','2021-06-10 23:37:49','2021-06-10 23:37:49');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`user_id`,`role_id`) values 
(1,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`title`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Admin','2019-04-15 19:13:32','2019-04-15 19:13:32',NULL),
(2,'User','2019-04-15 19:13:32','2019-04-15 19:13:32',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `where_find` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `followers` int(10) DEFAULT 0,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(5) DEFAULT NULL COMMENT '3=>admin, 2=>fans, 1=>idols',
  `is_setup` tinyint(4) DEFAULT 0 COMMENT '0=>no, 1=>yes',
  `cat_id` int(5) DEFAULT NULL,
  `fandom_lists` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_card_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `master_card_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credits` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(5) DEFAULT 1 COMMENT '0=>deactive,1=>active',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`phone`,`birth`,`photo`,`where_find`,`handle_name`,`followers`,`info`,`role`,`is_setup`,`cat_id`,`fandom_lists`,`visa_card_token`,`master_card_token`,`credits`,`created_at`,`status`,`updated_at`,`deleted_at`) values 
(1,'Admin','admin@admin.com',NULL,'$2y$10$imU.Hdz7VauIT3LIMCMbsOXvaaTQg6luVqkhfkBcsUd.SJW2XSRKO',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,3,0,NULL,NULL,NULL,NULL,0,'2019-04-15 19:13:32',1,'2019-04-15 19:13:32',NULL),
(2,'user1','user1@gmail.com',NULL,'$2y$10$e9D9QPQ7d4QQkh8PJrlY7.gwtBE4JWaQ2z4QXZKYb5LMn84N8vTky',NULL,'98465132','10/06/2021',NULL,NULL,NULL,0,'Test',2,0,NULL,'[13]',NULL,'cus_JfHB4mmXwoSMZR',0,'2021-06-02 22:58:30',1,'2021-06-14 08:50:39',NULL),
(5,'user2','user2@gmail.com',NULL,'$2y$10$kyO20FujgmNhFGAtEOi7dev.3ZdETP521rJmTwSJfaRhBDXiCiAlC',NULL,'7498561','17/06/2021','1111.png',NULL,NULL,0,'Test',2,0,NULL,'','cus_JfGUYs6jXxz8SX','cus_JfGe3xarXoRJUB',0,'2021-06-02 23:52:06',1,'2021-06-14 08:17:25',NULL),
(13,'idol1','idol1@gmail.com',NULL,'$2y$10$GUy71k1O0FmDYfv4easaheeOfjhIXg9kypQmoTlC0wLKTQpGuU1K2',NULL,'1654156',NULL,NULL,'facebook','idol1',10,'10',1,1,NULL,NULL,NULL,NULL,0,'2021-06-07 23:02:33',1,'2021-06-11 01:58:27',NULL),
(24,'idol2','idol2@gmail.com',NULL,'$2y$10$t37WNv0Bv7KAVwlFe3zg5OckryCwkDjvt5jWAAWHZOa2Mn7/Hd8G2',NULL,'2342',NULL,NULL,'facebook','idol2',10,'fdsaf',1,0,15,NULL,NULL,NULL,0,'2021-06-13 06:34:25',1,'2021-06-13 06:34:25',NULL),
(25,'fans1','fans1@gmail.com',NULL,'$2y$10$tYGSqbhQSjEg6i0vLhBBnOH1vWMTVZ1DzS/.j8vep9yjUkLcrUmbu',NULL,'451632',NULL,'3333.png',NULL,NULL,0,'fdsafdsafdsa',2,0,NULL,NULL,NULL,NULL,0,'2021-06-13 08:29:34',1,'2021-06-13 08:29:34',NULL),
(26,'fans1','fans1@gmail.com',NULL,'$2y$10$5ZvW8DJDCLUmBLRcGuvgj.FKRu31cyD83txsO/Ty1qA5BfT7bhlTS',NULL,'798465',NULL,'3333.png',NULL,NULL,0,'fdsafdsa',2,0,NULL,NULL,NULL,NULL,0,'2021-06-13 08:34:30',1,'2021-06-13 08:34:30',NULL),
(27,'sdfsa','dfsaf@gmail.com',NULL,'$2y$10$z72BiLAlQP2qFTWh4897WuGLLrfvrkUGaEGumAzh8Qma2ePlrTw9y',NULL,'7894651',NULL,NULL,'facebook','fffffffdsa',50000,'fdsafdsafdsaf',1,0,6,NULL,NULL,NULL,0,'2021-06-13 10:11:11',1,'2021-06-13 10:11:11',NULL);

/*Table structure for table `video_request` */

DROP TABLE IF EXISTS `video_request`;

CREATE TABLE `video_request` (
  `request_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `request_idol_id` bigint(20) DEFAULT NULL,
  `request_lang` tinyint(5) DEFAULT 1 COMMENT '1=>English,2=>Korean,3=>Mix',
  `request_video_price` double DEFAULT 0,
  `request_vocation` tinyint(4) DEFAULT 0 COMMENT '0=>false,1=>true',
  `request_video` varchar(255) DEFAULT NULL,
  `request_payment_method` tinyint(5) DEFAULT 1 COMMENT '1=>stripe',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `video_request` */

insert  into `video_request`(`request_id`,`request_idol_id`,`request_lang`,`request_video_price`,`request_vocation`,`request_video`,`request_payment_method`,`created_at`,`updated_at`) values 
(15,19,2,190,0,'WIN_20210604_03_36_35_Pro.mp4',1,'2021-06-10 18:58:27','2021-06-11 01:58:27');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
