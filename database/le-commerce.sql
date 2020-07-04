-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for laravel_ecommerce
DROP DATABASE IF EXISTS `laravel_ecommerce`;
CREATE DATABASE IF NOT EXISTS `laravel_ecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `laravel_ecommerce`;

-- Dumping structure for table laravel_ecommerce.banners
DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `h5` text DEFAULT NULL,
  `h1` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table laravel_ecommerce.banners: ~1 rows (approximately)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
REPLACE INTO `banners` (`id`, `name`, `h5`, `h1`, `image`, `button_text`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
	(3, 'Winter Fasion', 'Winter Fasion', 'Fashion Collection 2019', '2NyMi7eE8cnun0M8pZqtUVdOIBVORd.png', 'SHOP NOW', '#', 'Enable', '2020-06-17 16:48:55', '2020-06-17 16:53:48');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.contacts: ~1 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_ecommerce.customers: ~1 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
REPLACE INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `country`, `address`, `postcode`, `city`, `state`, `created_at`, `updated_at`) VALUES
	(120, 'Arbi', 'Pramana', 'arbipram@gmail.com', '081290080600', 'Indonesia', 'Address', '17148', 'Bekasi', 'Jawa Barat', '2020-07-03 12:19:22', '2020-07-03 12:19:22'),
	(121, 'Arbi', 'Pramana', 'arbipram@gmail.com', '081290080600', 'Indonesia', 'Test Address', '17131', 'Bekasi', 'Jawa Barat', '2020-07-03 16:44:18', '2020-07-03 16:44:18');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.medias
DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `file` text NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table laravel_ecommerce.medias: ~1 rows (approximately)
/*!40000 ALTER TABLE `medias` DISABLE KEYS */;
REPLACE INTO `medias` (`id`, `name`, `file`, `created_at`, `updated_at`) VALUES
	(3, 'Test', 'HfyDYynMsxVlAR1mtWvpD296wrEm8d.png', '2020-06-17 17:02:04', '2020-06-17 17:02:04'),
	(5, 'logo', 'ZQDabZhh1q8Tdfw6pWsU9gNlvOdoAt.png', '2020-07-03 14:50:45', '2020-07-03 14:50:45');
/*!40000 ALTER TABLE `medias` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_ecommerce.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.newsletters
DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.newsletters: ~0 rows (approximately)
/*!40000 ALTER TABLE `newsletters` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletters` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'ex : Order June 13, 2020 @ 04:53 AM',
  `date` date DEFAULT NULL,
  `coupon_amount` int(11) DEFAULT NULL,
  `tax_amount` int(11) DEFAULT NULL,
  `shipping_amount` int(11) DEFAULT NULL,
  `total_sales` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.orders: ~2 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
REPLACE INTO `orders` (`id`, `name`, `date`, `coupon_amount`, `tax_amount`, `shipping_amount`, `total_sales`, `customer_id`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
	(103, 'Order202007031', '2020-07-03', NULL, NULL, NULL, 419000, 120, 'Direct Bank Transfer', 'Pending Payment', '2020-07-03 12:19:22', '2020-07-03 12:19:22'),
	(104, 'Order20200703104', '2020-07-03', NULL, NULL, NULL, 299000, 121, 'Cash On Delivery', 'Pending Payment', '2020-07-03 16:44:18', '2020-07-03 16:44:18');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.orders_meta
DROP TABLE IF EXISTS `orders_meta`;
CREATE TABLE IF NOT EXISTS `orders_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.orders_meta: ~2 rows (approximately)
/*!40000 ALTER TABLE `orders_meta` DISABLE KEYS */;
REPLACE INTO `orders_meta` (`id`, `orders_id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
	(154, 103, 'data', '{"product_id":["41","40"],"price":["120000","299000"],"qty":["1","1"],"total":["120000","299000"]}', '2020-07-03 12:19:22', '2020-07-03 12:19:22'),
	(155, 104, 'data', '{"product_id":[40],"price":[299000],"qty":["1"],"total":[299000]}', '2020-07-03 16:44:18', '2020-07-03 16:44:18');
/*!40000 ALTER TABLE `orders_meta` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.pages
DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.pages: ~3 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
REPLACE INTO `pages` (`id`, `title`, `slug`, `content`, `image`, `author`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Test', 'test', '', '1vv0mDzwN9Js4auTNuUaoZUTi5AM4d.png', NULL, 'Publish', '2020-06-18 05:14:08', '2020-06-18 05:14:08'),
	(4, 'About', 'about', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'uIBYS5MUcmShHsvTbLfRVaTb0VtMtT.png', NULL, 'Publish', '2020-07-02 12:01:08', '2020-07-02 12:01:08'),
	(5, 'FAQ', 'faq', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'uIBYS5MUcmShHsvTbLfRVaTb0VtMtT.png', NULL, 'Publish', '2020-07-02 12:01:08', '2020-07-02 12:01:08');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_ecommerce.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.payment_confirmations
DROP TABLE IF EXISTS `payment_confirmations`;
CREATE TABLE IF NOT EXISTS `payment_confirmations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table laravel_ecommerce.payment_confirmations: ~0 rows (approximately)
/*!40000 ALTER TABLE `payment_confirmations` DISABLE KEYS */;
REPLACE INTO `payment_confirmations` (`id`, `order_no`, `email`, `bank`, `amount`, `order_date`, `note`, `file`, `created_at`, `updated_at`) VALUES
	(3, 'Test', 'arbipram@gmail.com', 'BCA 5210666950 a/n Arbi Pramana', 100000, '2020-07-03', 'Test Notes', 'BrbdGmnLZ6nbKmahCOEIusrwXwz41q.png', '2020-07-03 16:15:04', '2020-07-03 16:28:17');
/*!40000 ALTER TABLE `payment_confirmations` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.products: ~5 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
REPLACE INTO `products` (`id`, `author_id`, `name`, `slug`, `description`, `short_description`, `status`, `created_at`, `updated_at`) VALUES
	(36, NULL, 'Sneaker 1', 'sneaker-1', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Publish', '2020-06-26 16:43:26', '2020-06-26 16:43:26'),
	(37, NULL, 'Kemeja 1', 'kemeja-1', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Publish', '2020-06-27 02:44:41', '2020-06-27 02:44:41'),
	(38, NULL, 'Hat 1', 'hat-1', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Publish', '2020-06-27 02:45:23', '2020-06-27 02:45:23'),
	(39, NULL, 'Sweater 1', 'sweater-1', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Publish', '2020-06-27 02:46:28', '2020-06-27 02:46:28'),
	(40, NULL, 'Blazzer 1', 'blazzer-1', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Publish', '2020-06-27 02:47:22', '2020-06-27 02:47:22'),
	(41, NULL, 'Sweater 2', 'sweater-2', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time. ', 'Publish', '2020-06-27 02:48:08', '2020-06-27 02:48:08');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.product_categories
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.product_categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
REPLACE INTO `product_categories` (`id`, `name`, `description`, `slug`, `image`, `created_at`, `updated_at`) VALUES
	(3, 'Category 1', '-', 'category-1', 'A9cwFdSmiRC0X4lyRjqRBhsy2YOcS7.png', '2020-06-26 13:59:15', '2020-06-26 13:59:15'),
	(4, 'Category 2', '-', 'category-2', 'QoJyk3IxLjmaMMuYq94sWJMJF5YFkQ.png', '2020-06-26 13:59:30', '2020-06-26 14:02:51'),
	(5, 'Category 3', '-', 'category-3', '98WRbRq3bNxZWbhK2nX9d2vKuN31ro.png', '2020-06-26 13:59:44', '2020-06-26 13:59:44');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.product_meta
DROP TABLE IF EXISTS `product_meta`;
CREATE TABLE IF NOT EXISTS `product_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `regular_price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `purchase_note` text DEFAULT NULL,
  `categories` int(11) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `image_4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.product_meta: ~6 rows (approximately)
/*!40000 ALTER TABLE `product_meta` DISABLE KEYS */;
REPLACE INTO `product_meta` (`id`, `products_id`, `regular_price`, `sale_price`, `sku`, `qty`, `weight`, `length`, `width`, `height`, `purchase_note`, `categories`, `image_1`, `image_2`, `image_3`, `image_4`, `created_at`, `updated_at`) VALUES
	(202, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-26 14:53:10', '2020-06-26 16:14:44'),
	(209, 36, 99000, 89000, 'SNK-001', 99, 10, 20, 30, 40, 'Purchase Note', 3, 'UmJRi4eBrFQ9gwvuG614wTbZRK27KS.png', NULL, NULL, NULL, '2020-06-26 16:43:26', '2020-07-03 12:13:40'),
	(210, 37, 125000, 120000, 'KMJ-001', 97, NULL, NULL, NULL, NULL, NULL, 4, 'IaSTDnLLSqVK0o7xlaprhbEwXYwcAk.png', NULL, NULL, NULL, '2020-06-27 02:44:41', '2020-07-03 12:13:38'),
	(211, 38, 50000, NULL, 'HAT-001', 100, NULL, NULL, NULL, NULL, NULL, 5, 'C0KbIkzWgYt9QhKmllSQOkrHMKJ8EW.png', NULL, NULL, NULL, '2020-06-27 02:45:23', '2020-06-27 02:45:23'),
	(212, 39, 100000, 89000, 'SWT-001', 94, NULL, NULL, NULL, NULL, NULL, 4, '2RAee3FrmZM8pcZCMvqkOTV5H5HNA3.png', NULL, NULL, NULL, '2020-06-27 02:46:28', '2020-07-03 12:13:38'),
	(213, 40, 300000, 299000, 'BLZ-001', 89, NULL, NULL, NULL, NULL, NULL, 3, 'LPBPVGDubLytoDEgtyQff2U4g9bGPy.png', NULL, NULL, NULL, '2020-06-27 02:47:22', '2020-07-03 16:44:18'),
	(214, 41, 120000, NULL, 'SWT-002', 99, NULL, NULL, NULL, NULL, NULL, 5, 'vjAnuzPIGuTBMaUiTAGDiMLl0GtRSs.png', NULL, NULL, NULL, '2020-06-27 02:48:08', '2020-07-03 12:19:22');
/*!40000 ALTER TABLE `product_meta` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.scripts
DROP TABLE IF EXISTS `scripts`;
CREATE TABLE IF NOT EXISTS `scripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` mediumtext NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table laravel_ecommerce.scripts: ~0 rows (approximately)
/*!40000 ALTER TABLE `scripts` DISABLE KEYS */;
REPLACE INTO `scripts` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
	(3, 'Test', '<script>console.log("Test Ok")</script>', '2020-06-17 16:37:45', '2020-06-17 16:37:45');
/*!40000 ALTER TABLE `scripts` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.settings: ~6 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
REPLACE INTO `settings` (`id`, `type`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
	(3, 'social-media', 'facebook', 'https://facebook.com/arbi.pramana/', '2020-06-21 15:08:18', '2020-07-03 16:31:10'),
	(4, 'social-media', 'instagram', 'https://www.instagram.com/arby.pramana', '2020-06-21 15:08:18', '2020-07-03 16:31:10'),
	(5, 'social-media', 'youtube', 'https://www.youtube.com/channel/UC9zBFd1R4mkiG7VP1zq-Xjw', '2020-06-21 15:08:18', '2020-07-03 16:31:10'),
	(7, 'general', 'site_title', 'Le Commerce', '2020-06-21 15:23:40', '2020-06-21 15:26:33'),
	(8, 'general', 'tag_line', 'Free and Open Source Laravel E-Commerce', '2020-06-21 15:23:40', '2020-06-21 15:23:40'),
	(9, 'general', 'logo', 'http://localhost/le-commerce/public/uploads/ZQDabZhh1q8Tdfw6pWsU9gNlvOdoAt.png', '2020-06-21 15:23:40', '2020-07-03 14:50:58'),
	(10, 'general', 'footer', 'Copyright © 2020 All rights reserved | Design by Arbipram.com', '2020-06-27 03:54:00', '2020-07-03 14:50:17');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.store_settings
DROP TABLE IF EXISTS `store_settings`;
CREATE TABLE IF NOT EXISTS `store_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.store_settings: ~23 rows (approximately)
/*!40000 ALTER TABLE `store_settings` DISABLE KEYS */;
REPLACE INTO `store_settings` (`id`, `type`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
	(1, 'general', 'address_1', 'Ruko Grand Galaxy Pekayon Jaya Bekasi Selatan', '2020-06-19 05:51:55', '2020-06-19 05:51:55'),
	(2, 'general', 'address_2', 'Park RRG 1. No. 20', '2020-06-19 05:51:55', '2020-06-19 05:51:55'),
	(3, 'general', 'city', 'Bekasi', '2020-06-19 05:51:55', '2020-06-19 05:51:55'),
	(5, 'general', 'state', 'Jawa Barat', '2020-06-19 05:51:55', '2020-06-19 06:44:59'),
	(6, 'general', 'postcode', '17148', '2020-06-19 05:51:55', '2020-06-19 05:51:55'),
	(14, 'general', 'country', 'Indonesia', '2020-06-20 14:31:55', '2020-06-20 14:31:55'),
	(15, 'product-general', 'weight_unit', 'kg', '2020-06-20 14:38:08', '2020-06-20 14:38:08'),
	(16, 'product-general', 'dimension_unit', 'cm', '2020-06-20 14:38:08', '2020-06-20 14:38:08'),
	(17, 'product-inventory', 'notification_recipient', 'arbipram@gmail.com', '2020-06-20 14:48:38', '2020-06-20 15:04:40'),
	(18, 'product-inventory', 'low_stock_treshold', '2', '2020-06-20 14:48:38', '2020-06-20 15:04:40'),
	(19, 'product-inventory', 'out_of_stock_treshold', '0', '2020-06-20 14:48:38', '2020-06-20 15:04:40'),
	(20, 'payment-cod', 'status', 'Enable', '2020-06-20 15:14:36', '2020-06-20 15:17:10'),
	(21, 'payment-cod', 'address_cod', 'Daftarkan Lokasi COD di Store Setting', '2020-06-20 15:14:36', '2020-06-20 15:17:10'),
	(103, 'payment-direct-bank-transfer', 'status', 'Enable', '2020-06-20 16:22:52', '2020-06-20 16:22:52'),
	(104, 'payment-direct-bank-transfer', 'bank', 'BCA', '2020-06-20 16:22:52', '2020-06-20 16:22:52'),
	(105, 'payment-direct-bank-transfer', 'bank', 'Mandiri', '2020-06-20 16:22:52', '2020-06-20 16:22:52'),
	(106, 'payment-direct-bank-transfer', 'account_name', 'Arbi Pramana', '2020-06-20 16:22:52', '2020-06-20 16:22:52'),
	(107, 'payment-direct-bank-transfer', 'account_name', 'Arbi Pramana 2', '2020-06-20 16:22:52', '2020-06-20 16:22:52'),
	(108, 'payment-direct-bank-transfer', 'account_number', '5210666950', '2020-06-20 16:22:52', '2020-06-20 16:22:52'),
	(109, 'payment-direct-bank-transfer', 'account_number', '5210666951', '2020-06-20 16:22:52', '2020-06-20 16:22:52'),
	(111, 'general', 'phone_no', '+6281290080600', '2020-06-27 03:40:38', '2020-06-27 03:40:38'),
	(112, 'general', 'email', 'arbipram@gmail.com', '2020-06-27 03:40:38', '2020-06-27 03:40:38'),
	(113, 'general', 'maps', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.8814007468907!2d106.9775983051779!3d-6.250234495475843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc7e6951d6e0b8604!2sDITAMADIGITAL!5e0!3m2!1sid!2sid!4v1593606329121!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>', '2020-07-01 12:26:04', '2020-07-01 12:26:04');
/*!40000 ALTER TABLE `store_settings` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_ecommerce.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Arbi pramana', 'admin@admin.com', NULL, '$2y$10$xg2tegYXFxWCg08KzhxXr.uxtJyH2jB/PwVFWD6vchtGr8BSKKQUa', 1, 'Enable', NULL, '2020-06-18 06:27:46', '2020-06-18 06:27:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.users_meta
DROP TABLE IF EXISTS `users_meta`;
CREATE TABLE IF NOT EXISTS `users_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel_ecommerce.users_meta: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_meta` ENABLE KEYS */;

-- Dumping structure for table laravel_ecommerce.widgets
DROP TABLE IF EXISTS `widgets`;
CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `widget` text NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table laravel_ecommerce.widgets: ~4 rows (approximately)
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
REPLACE INTO `widgets` (`id`, `name`, `widget`, `created_at`, `updated_at`) VALUES
	(3, 'Free Shipping', '<div class="col-lg-3 col-sm-6">\r\n                    <div class="single_shopping_details">\r\n                        <img src="http://localhost/le-commerce/public/winter/img/icon/icon_1.png" alt="">\r\n                        <h4>Free shipping</h4>\r\n                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>\r\n                    </div>\r\n                </div>\r\n', '2020-06-27 03:22:27', '2020-06-27 03:23:54'),
	(4, 'Orders', '<div class="col-lg-3 col-sm-6">\r\n                    <div class="single_shopping_details">\r\n                        <img src="http://localhost/le-commerce/public/winter/img/icon/icon_2.png" alt="">\r\n                        <h4>Orders</h4>\r\n                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>\r\n                    </div>\r\n                </div>', '2020-06-27 03:22:51', '2020-06-27 03:23:42'),
	(5, 'Direct Bank Transfer', '<div class="col-lg-3 col-sm-6">\r\n    <div class="single_shopping_details">\r\n        <img src="http://localhost/le-commerce/public/winter/img/icon/icon_3.png" alt="">\r\n        <h4>Direct Bank Transfer</h4>\r\n        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>\r\n    </div>\r\n</div>', '2020-06-27 03:23:32', '2020-06-27 03:23:32'),
	(6, 'Customer Support', '<div class="col-lg-3 col-sm-6">\r\n                    <div class="single_shopping_details">\r\n                        <img src="http://localhost/le-commerce/public/winter/img/icon/icon_4.png" alt="">\r\n                        <h4>Customer Support 24/7</h4>\r\n                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>\r\n                    </div>\r\n                </div>', NULL, NULL);
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
