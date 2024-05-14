/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.33 : Database - v_ecommerch
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `about_companies` */

DROP TABLE IF EXISTS `about_companies`;

CREATE TABLE `about_companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `about_us` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `about_companies` */

/*Table structure for table `addresses` */

DROP TABLE IF EXISTS `addresses`;

CREATE TABLE `addresses` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `addresses` */

insert  into `addresses`(`id`,`user_id`,`country`,`district`,`city`,`thana`,`post_code`,`sector`,`road`,`house`,`created_at`,`updated_at`) values (1,1,'Bangladesh','Dhaka','Dhaka','Shyampur','1204',NULL,NULL,NULL,'2021-10-20 22:28:54','2022-04-24 16:52:46');

/*Table structure for table `advertisements` */

DROP TABLE IF EXISTS `advertisements`;

CREATE TABLE `advertisements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed_code` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `advertisements_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `advertisements` */

/*Table structure for table `all_countries` */

DROP TABLE IF EXISTS `all_countries`;

CREATE TABLE `all_countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `all_countries` */

/*Table structure for table `all_countries_company` */

DROP TABLE IF EXISTS `all_countries_company`;

CREATE TABLE `all_countries_company` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `all_countries_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `all_countries_company` */

/*Table structure for table `attribute_items` */

DROP TABLE IF EXISTS `attribute_items`;

CREATE TABLE `attribute_items` (
  `id` bigint(20) unsigned NOT NULL,
  `attribute_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'as like #000000 or S,M,XL or 32, 34, 36 or 3'' by 5'' etc',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attribute_items` */

insert  into `attribute_items`(`id`,`attribute_id`,`product_id`,`name`,`image`,`details`,`deleted_at`,`created_at`,`updated_at`) values (48,1,2,'Green',NULL,'#00FF00',NULL,'2021-11-08 03:17:21','2021-11-08 03:17:21'),(49,1,2,'Red',NULL,'#ff0000',NULL,'2021-11-08 03:17:21','2021-11-08 03:17:21'),(50,2,2,'Small',NULL,'22X12X17CM',NULL,'2021-11-08 03:17:21','2021-11-08 03:17:21'),(51,2,2,'Medium',NULL,'31X14X26CM',NULL,'2021-11-08 03:17:21','2021-11-08 03:17:21'),(52,2,2,'Big',NULL,'35X13X29CM',NULL,'2021-11-08 03:17:21','2021-11-08 03:17:21');

/*Table structure for table `attribute_product` */

DROP TABLE IF EXISTS `attribute_product`;

CREATE TABLE `attribute_product` (
  `attribute_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attribute_product` */

insert  into `attribute_product`(`attribute_id`,`product_id`,`created_at`,`updated_at`) values (2,2,NULL,NULL);

/*Table structure for table `attributes` */

DROP TABLE IF EXISTS `attributes`;

CREATE TABLE `attributes` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attributes` */

insert  into `attributes`(`id`,`name`,`created_at`,`updated_at`) values (1,'color','2021-10-20 22:28:53','2021-10-20 22:28:53'),(2,'size','2021-10-20 22:28:53','2021-10-20 22:28:53');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `category_slag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_category_name_unique` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

/*Table structure for table `company_payment` */

DROP TABLE IF EXISTS `company_payment`;

CREATE TABLE `company_payment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `company_payment` */

/*Table structure for table `contact_infos` */

DROP TABLE IF EXISTS `contact_infos`;

CREATE TABLE `contact_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contact_infos` */

/*Table structure for table `customer_supports` */

DROP TABLE IF EXISTS `customer_supports`;

CREATE TABLE `customer_supports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `customer_supports` */

/*Table structure for table `customers_orders` */

DROP TABLE IF EXISTS `customers_orders`;

CREATE TABLE `customers_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double(8,2) NOT NULL,
  `tax` double(8,2) NOT NULL,
  `net_price` double(8,2) NOT NULL,
  `order_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `customers_orders` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `galleries` */

DROP TABLE IF EXISTS `galleries`;

CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `galleries` */

/*Table structure for table `geolocations` */

DROP TABLE IF EXISTS `geolocations`;

CREATE TABLE `geolocations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `geolocations` */

/*Table structure for table `main_banner_scrolls` */

DROP TABLE IF EXISTS `main_banner_scrolls`;

CREATE TABLE `main_banner_scrolls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `main_banner_scrolls_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `main_banner_scrolls` */

/*Table structure for table `menu_sliders` */

DROP TABLE IF EXISTS `menu_sliders`;

CREATE TABLE `menu_sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_sliders` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_08_25_043424_create_roles_table',1),(5,'2020_08_25_060811_create_categories_table',1),(6,'2020_08_25_060857_create_sub_categories_table',1),(7,'2020_08_25_060925_create_products_table',1),(8,'2020_08_25_062203_create_product_colors_table',1),(9,'2020_08_25_062305_create_product_sizes_table',1),(10,'2020_08_27_160712_create_galleries_table',1),(11,'2020_08_27_233757_create_main_banner_scrolls_table',1),(12,'2020_08_28_013240_create_menu_sliders_table',1),(13,'2020_08_29_164859_create_reviews_table',1),(14,'2020_08_30_135952_create_shoppingcart_table',1),(15,'2020_09_18_051821_create_contact_infos_table',1),(16,'2020_09_18_051900_create_customer_supports_table',1),(17,'2020_09_19_103326_create_social_share_links_table',1),(18,'2020_09_20_041958_create_geolocations_table',1),(19,'2020_09_20_071728_create_all_countries_table',1),(20,'2020_09_20_073519_create_companies_table',1),(21,'2020_09_20_080420_create_about_companies_table',1),(22,'2020_09_20_131801_create_all_countries_company_table',1),(23,'2020_09_20_142521_create_customers_orders_table',1),(24,'2020_09_20_142630_create_ordered_products_table',1),(25,'2020_09_20_143845_create_ordered_product_attributes_table',1),(26,'2020_09_28_155550_create_advertisements_table',1),(27,'2020_09_29_055449_create_text_sliders_table',1),(28,'2020_09_29_124601_create_payments_table',1),(29,'2020_09_29_131403_create_company_payment_table',1),(30,'2020_10_05_062120_create_subscribe_by_emails_table',1);

/*Table structure for table `ordered_product_attributes` */

DROP TABLE IF EXISTS `ordered_product_attributes`;

CREATE TABLE `ordered_product_attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ordered_product_id` int(11) NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ordered_product_attributes` */

/*Table structure for table `ordered_products` */

DROP TABLE IF EXISTS `ordered_products`;

CREATE TABLE `ordered_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customers_orders_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ordered_products` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payments` */

/*Table structure for table `product_colors` */

DROP TABLE IF EXISTS `product_colors`;

CREATE TABLE `product_colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_colors` */

/*Table structure for table `product_sizes` */

DROP TABLE IF EXISTS `product_sizes`;

CREATE TABLE `product_sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_sizes` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sub_category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `slag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reviews` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`role`,`created_at`,`updated_at`) values (1,'Super Admin',NULL,NULL);

/*Table structure for table `shoppingcart` */

DROP TABLE IF EXISTS `shoppingcart`;

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`identifier`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `shoppingcart` */

/*Table structure for table `social_share_links` */

DROP TABLE IF EXISTS `social_share_links`;

CREATE TABLE `social_share_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `social_share_links_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_share_links` */

/*Table structure for table `sub_categories` */

DROP TABLE IF EXISTS `sub_categories`;

CREATE TABLE `sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `sub_category_slag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sub_categories` */

/*Table structure for table `subscribe_by_emails` */

DROP TABLE IF EXISTS `subscribe_by_emails`;

CREATE TABLE `subscribe_by_emails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribe_by_emails_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subscribe_by_emails` */

/*Table structure for table `text_sliders` */

DROP TABLE IF EXISTS `text_sliders`;

CREATE TABLE `text_sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `text_sliders` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`role_id`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Super Admin',1,'super-admin@email.com','2023-10-25 12:13:25','$2a$12$U4KsB.WQpPYbWRGvikSvrO2BVW.HffXcNnV5uGjS9fDzdrCKFjDJK',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
