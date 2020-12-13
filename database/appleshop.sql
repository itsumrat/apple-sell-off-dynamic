-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2020 at 08:00 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appleshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint UNSIGNED NOT NULL,
  `region_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_description`, `brand_icon`, `brand_slug`, `created_at`, `updated_at`) VALUES
(1, 'Arong', 'Arong is the company of brack bank.', '141598937066.jpeg', 'arong', '2020-08-31 23:05:34', '2020-09-03 04:42:27'),
(2, 'Pran', 'Pran Company', '271598937188.jpeg', 'pran', '2020-08-31 23:13:08', '2020-09-05 22:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `main_category_id` int DEFAULT NULL,
  `sub_category_id` int DEFAULT NULL,
  `cc_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cc_type` int DEFAULT NULL,
  `cc_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ccoverimage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_categories`
--

INSERT INTO `child_categories` (`id`, `main_category_id`, `sub_category_id`, `cc_name`, `cc_description`, `cc_type`, `cc_slug`, `ccoverimage`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Hilsha', 'Padma Hilsha', 1, 'hilsha', '601602665724.jpeg', '2020-08-30 22:23:20', '2020-10-14 02:55:25'),
(2, 2, 2, 'Pant', 'Jens Pant', 1, 'pant', '521602665708.jpg', '2020-09-07 04:26:42', '2020-10-14 02:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `region_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_rate` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 'Red', '#FF0000', '2020-10-29 03:43:23', '2020-10-29 03:43:23'),
(2, 'White', '#FFFFFF', '2020-10-29 03:43:32', '2020-10-29 03:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint DEFAULT NULL,
  `bname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bemail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bregion_id` int DEFAULT NULL,
  `bcity_id` int DEFAULT NULL,
  `barea_id` int DEFAULT NULL,
  `baddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sregion_id` int DEFAULT NULL,
  `scity_id` int DEFAULT NULL,
  `sarea_id` int DEFAULT NULL,
  `saddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `customer_id`, `bname`, `bphone`, `bemail`, `bregion_id`, `bcity_id`, `barea_id`, `baddress`, `sname`, `sphone`, `semail`, `sregion_id`, `scity_id`, `sarea_id`, `saddress`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 'Tanvir Hossain', '956355', 'House#45, Nikunja-2, Khilkhet, Dhaka-1229', 1, 2, 1, NULL, 'Tanvir Hossain', '956355', 'House#45, Nikunja-2, Khilkhet, Dhaka-1229', 1, 2, 1, NULL, NULL, NULL, '2020-10-27 23:46:05', '2020-10-28 00:40:27'),
(2, 8, 'Sarwoar Hossain', '937694', 'sarwoar@gmail.com', NULL, NULL, NULL, NULL, 'Sarwoar Hossain', '929322', 'sarwoar@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-28 00:45:08', '2020-10-28 00:45:08'),
(3, 9, 'Sohel Viru', 'null', 'asqwqw1w1 1', 2, 2, 1, NULL, 'Sohel Viru', 'null', 'asqwqw1w1 1', 2, 2, 1, NULL, NULL, NULL, '2020-10-28 00:46:17', '2020-10-28 05:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `graphics_cards`
--

CREATE TABLE `graphics_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `graphics_card_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graphics_card_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `graphics_cards`
--

INSERT INTO `graphics_cards` (`id`, `graphics_card_size`, `graphics_card_sign`, `created_at`, `updated_at`) VALUES
(1, 'Test1 25HM', 'MM', '2020-10-29 03:57:46', '2020-10-29 03:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `hard_drives`
--

CREATE TABLE `hard_drives` (
  `id` bigint UNSIGNED NOT NULL,
  `hard_drive_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hard_drive_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hard_drives`
--

INSERT INTO `hard_drives` (`id`, `hard_drive_size`, `hard_drive_sign`, `created_at`, `updated_at`) VALUES
(1, '500', 'GB', '2020-10-30 09:17:06', '2020-10-30 09:17:06'),
(2, '256', 'GB', '2020-12-07 02:30:05', '2020-12-07 02:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

CREATE TABLE `image_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint DEFAULT NULL,
  `image_gallery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_galleries`
--

INSERT INTO `image_galleries` (`id`, `product_id`, `image_gallery`, `created_at`, `updated_at`) VALUES
(5, 1, '711607318173.png', '2020-12-06 23:16:14', '2020-12-06 23:16:14'),
(6, 1, '591607318174.png', '2020-12-06 23:16:14', '2020-12-06 23:16:14'),
(7, 1, '661607318174.png', '2020-12-06 23:16:14', '2020-12-06 23:16:14'),
(8, 1, '901607318174.png', '2020-12-06 23:16:14', '2020-12-06 23:16:14'),
(9, 2, '941607441946.jpg', '2020-12-08 09:39:07', '2020-12-08 09:39:07'),
(10, 2, '591607441947.jpg', '2020-12-08 09:39:07', '2020-12-08 09:39:07'),
(11, 2, '611607441947.jpg', '2020-12-08 09:39:07', '2020-12-08 09:39:07'),
(12, 2, '961607441947.jpg', '2020-12-08 09:39:07', '2020-12-08 09:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(3, '731604412396.png', 1, '2020-11-03 08:06:36', '2020-11-03 08:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `mc_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mc_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mc_type` int DEFAULT NULL,
  `mc_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcoverimage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mc_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `mc_name`, `mc_description`, `mc_type`, `mc_icon`, `mcoverimage`, `mc_slug`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'Visual Studio Code is a lightweight but powerful source code', 1, '441604135167.png', '271604135167.png', 'laptop', '2020-10-31 03:06:07', '2020-12-06 23:53:15'),
(2, 'iMacs', 'Visual Studio Code is a lightweight but powerful source code', 1, '721604135209.png', '301604135209.jpg', 'imacs', '2020-10-31 03:06:49', '2020-10-31 03:06:49'),
(3, 'Monitors', 'Visual Studio Code is a lightweight but powerful source code', 1, '721604135258.png', '401604135258.png', 'monitors', '2020-10-31 03:07:38', '2020-10-31 03:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_08_23_085603_create_permission_tables', 1),
(9, '2020_08_27_042144_create_main_categories_table', 2),
(10, '2020_08_27_042203_create_sub_categories_table', 2),
(11, '2020_08_27_042320_create_child_categories_table', 2),
(13, '2020_08_31_112644_create_brands_table', 3),
(15, '2020_09_06_113006_create_product_stocks_table', 4),
(16, '2020_09_06_113033_create_image_galleries_table', 4),
(17, '2020_09_10_044958_create_shippings_table', 5),
(18, '2020_09_13_064732_create_regions_table', 6),
(19, '2020_09_13_064945_create_cities_table', 6),
(20, '2020_09_13_064953_create_areas_table', 6),
(23, '2016_06_01_000001_create_oauth_auth_codes_table', 7),
(24, '2016_06_01_000002_create_oauth_access_tokens_table', 7),
(25, '2016_06_01_000003_create_oauth_refresh_tokens_table', 7),
(26, '2016_06_01_000004_create_oauth_clients_table', 7),
(27, '2016_06_01_000005_create_oauth_personal_access_clients_table', 7),
(28, '2020_09_14_110816_create_orders_table', 8),
(29, '2020_09_14_110846_create_order_items_table', 8),
(31, '2020_09_29_083913_create_customer_addresses_table', 9),
(32, '2020_10_21_064104_create_sliders_table', 10),
(36, '2020_10_25_084608_create_offer_banners_table', 14),
(37, '2020_10_25_085746_create_offer_banners_table', 15),
(38, '2020_10_29_055116_create_colors_table', 16),
(39, '2020_10_29_055138_create_sizes_table', 16),
(40, '2020_10_29_055150_create_rams_table', 16),
(41, '2020_10_29_055205_create_hard_drives_table', 16),
(42, '2020_10_29_055232_create_graphics_cards_table', 16),
(43, '2020_10_29_055252_create_processors_table', 16),
(44, '2020_09_06_095655_create_products_table', 17),
(45, '2014_10_12_000000_create_users_table', 18),
(46, '2014_10_12_100000_create_password_resets_table', 18),
(47, '2019_04_13_175531_create_admins_table', 18),
(48, '2019_06_05_094651_add_email_verified_at_column_to_admins_table', 18),
(49, '2020_11_03_053154_create_logos_table', 19),
(50, '2020_12_09_061306_create_product_types_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(3, 'App\\User', 2),
(3, 'App\\User', 3),
(3, 'App\\User', 4),
(3, 'App\\User', 5),
(3, 'App\\User', 6),
(2, 'App\\User', 7),
(3, 'App\\User', 20);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('039052ab423088161644ccea328d26ec389b7e75bedaffaea348019ea28a89e09d6f61806aa0c8b5', 8, 1, 'eShop', '[]', 0, '2020-10-12 05:21:33', '2020-10-12 05:21:33', '2021-10-12 11:21:33'),
('03e759e8cf3552c1a74c7214a3193ce810f215b6a8b20dab2f77366c72a356412ecdcb57d704177f', 9, 1, 'eShop', '[]', 0, '2020-09-20 05:46:15', '2020-09-20 05:46:15', '2021-09-20 11:46:15'),
('04f3e15e841f846c6e7776537bb413bd041d48416fa9c7468976e6b9b01d1462728f72eab771c12f', 8, 1, 'eShop', '[]', 0, '2020-09-22 04:04:55', '2020-09-22 04:04:55', '2021-09-22 10:04:55'),
('0786c4c4ba257a07d48a6dd9a6dba05cb00268df87cda22a3d890843cf5677af2bc7272dcc05b09e', 10, 1, 'eShop', '[]', 0, '2020-10-27 05:25:51', '2020-10-27 05:25:51', '2021-10-27 11:25:51'),
('09d5b58d35bd5223b1757ffab764460c2ddfcc9b1c72fbfdf95a094d8adb9b825699c192368a3b31', 8, 1, 'eShop', '[]', 0, '2020-09-20 04:42:08', '2020-09-20 04:42:08', '2021-09-20 10:42:08'),
('0b1a245c6960dbf40aacaa216247b42e90f3c2c1ad53ab9d7bc49f10ed145e01d4e76c3fdc33c057', 8, 1, 'eShop', '[]', 0, '2020-09-20 05:50:27', '2020-09-20 05:50:27', '2021-09-20 11:50:27'),
('1051bb3627a70bafee83369e8476dd809b2628fd85f36f54119c0a240e853901eb6c26b9c60b8509', 8, 1, 'eShop', '[]', 0, '2020-09-27 22:39:04', '2020-09-27 22:39:04', '2021-09-28 04:39:04'),
('127e759e9f148dded7bd5634cb739315a8a171649acdcc10ac1d29348d5a30943c03506904631141', 8, 1, 'eShop', '[]', 0, '2020-09-20 05:44:49', '2020-09-20 05:44:49', '2021-09-20 11:44:49'),
('12e8136f910dec1b147d9e4af62cbdc85ebb5563b302e490a744688567823e7ba4e8799812a10454', 8, 1, 'eShop', '[]', 0, '2020-09-29 05:00:11', '2020-09-29 05:00:11', '2021-09-29 11:00:11'),
('14894bfe39e889200a13432485d1853a56fdd9b0e0325d85fbfeda21aec684c8cf8929da66dccab3', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:32:09', '2020-09-22 03:32:09', '2021-09-22 09:32:09'),
('160d8c2e8be7fbf30b26d579ebac26ec9f315c4e9a00dcd5cc56696e785ac43e30d625cd2200a819', 10, 1, 'eShop', '[]', 0, '2020-10-27 21:56:02', '2020-10-27 21:56:02', '2021-10-28 03:56:02'),
('1c9ee622bb3fdef9e67b90577ccf852bdfa81ace4fbddab6cfdaf7738039d8fa8508145b8ab96548', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:09:36', '2020-09-22 03:09:36', '2021-09-22 09:09:36'),
('2125cc2cc9d75fbeb0162817f0c5346d0e0c681ccb0627b2f829c106d90f2d01e12b48acbf81f380', 8, 1, 'eShop', '[]', 0, '2020-09-29 21:15:42', '2020-09-29 21:15:42', '2021-09-30 03:15:42'),
('22d196d1567dda2355950209ae92beca3c8a4cf0f673bb319772f0cf80b3399bd61a181e749b77be', 8, 1, 'eShop', '[]', 0, '2020-10-13 21:51:52', '2020-10-13 21:51:52', '2021-10-14 03:51:52'),
('27e700da8467b45cf7762c4502e863503cfe0b5e5a3d9fe5ee24cb7c368098901771859f292895e4', 8, 1, 'eShop', '[]', 0, '2020-09-20 05:53:28', '2020-09-20 05:53:28', '2021-09-20 11:53:28'),
('280cc1c36d55bbac449141c3f35cd67ec418a0ec8969c4e04bbc62443367cb4ecdf5f3e8b564a2a8', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:16:20', '2020-09-22 03:16:20', '2021-09-22 09:16:20'),
('2976ed7728a6b06aff12b2bb075c6c0ce324074954ef55b436dc631c78671900fecdf7c3bbaac763', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:38:06', '2020-09-22 03:38:06', '2021-09-22 09:38:06'),
('2ca48f107d5c57cf0efc3b57f3b0773d6dd48038b21721d9c62b4824b0942f7ada9db0eca930ceb9', 8, 1, 'eShop', '[]', 0, '2020-10-12 23:19:04', '2020-10-12 23:19:04', '2021-10-13 05:19:04'),
('2ceb797c525cb0e0d9c38753e26802bdfa0b92fad01437f8f4b96c7494374ad218374fc16e9715a6', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:34:31', '2020-09-22 03:34:31', '2021-09-22 09:34:31'),
('30c956c06bbb5df5878d23688835d893b427a6fd1127ca19c31fb21a5151e9b2e3adc0f647f482eb', 8, 1, 'eShop', '[]', 0, '2020-09-20 05:14:27', '2020-09-20 05:14:27', '2021-09-20 11:14:27'),
('32e36bcfb6352af2e0dd018954e5565aff963c5f36da3f016abdb4f759f5335cfbe48559d1d70eb3', 8, 1, 'eShop', '[]', 0, '2020-10-12 05:28:03', '2020-10-12 05:28:03', '2021-10-12 11:28:03'),
('35f5c7e717136609b50eb5454c9e000d8ced0c26fb4a7a4e31bb4be4cf14e5766ce02947627eb94f', 8, 1, 'eShop', '[]', 0, '2020-09-23 05:56:35', '2020-09-23 05:56:35', '2021-09-23 11:56:35'),
('363a0c4ca32fbcbc34b6b64d629b5eb817ea2e9f1b5650e84fe690408e3559eea6a24491ad391a29', 8, 1, 'eShop', '[]', 0, '2020-09-21 22:11:55', '2020-09-21 22:11:55', '2021-09-22 04:11:55'),
('364531fdc7f5a1342a5088cd1eadbcfea71c63cffca900a5f2e3a4fdc5c86814f026833ba8a399e5', 8, 1, 'eShop', '[]', 0, '2020-10-13 00:37:41', '2020-10-13 00:37:41', '2021-10-13 06:37:41'),
('386bd82b208c740eba52b2176b38c4b19d5664e9aef057c49ead0ccba75e602399ded649b88149f1', 8, 1, 'eShop', '[]', 0, '2020-10-11 10:08:51', '2020-10-11 10:08:51', '2021-10-11 03:08:51'),
('393b156f589648fe3a94e4da5e586e6aa1716fa2e0a2bfae461666562d76c09b7a8532ff6f905253', 10, 1, 'eShop', '[]', 0, '2020-09-29 05:47:08', '2020-09-29 05:47:08', '2021-09-29 11:47:08'),
('3dad280f7de9ee89c560ade54087ceb26c99099cecfe3579737a4ad774b6ede0be875571d9fe859f', 8, 1, 'eShop', '[]', 0, '2020-09-27 22:07:23', '2020-09-27 22:07:23', '2021-09-28 04:07:23'),
('43b163dfa7cbdebab17ba461c9ba60ddb4e51d3eb73ddcdb4d2c26feb96e2429700b98465151d6db', 8, 1, 'eShop', '[]', 0, '2020-10-06 16:24:33', '2020-10-06 16:24:33', '2021-10-06 09:24:33'),
('44d02045b4f560815cab5a82fffb77a7400b0aa850b6909994b05476094e983e8807e40f7ed666e2', 8, 1, 'eShop', '[]', 0, '2020-09-21 22:44:02', '2020-09-21 22:44:02', '2021-09-22 04:44:02'),
('4da1acc237e1b324ccf38b3628cb4d37cd6c42a83c4946f44b44b84fda9bafeb772046f2984f810c', 8, 1, 'eShop', '[]', 0, '2020-09-21 21:22:51', '2020-09-21 21:22:51', '2021-09-22 03:22:51'),
('4e286f3fd66d52d101577b2afa96fa7212664051114cbc184a8633586eafc5d27f0af1867463d006', 8, 1, 'eShop', '[]', 0, '2020-09-27 23:21:39', '2020-09-27 23:21:39', '2021-09-28 05:21:39'),
('516b03ccc609c883121a6437e677a18d236159b9c36e3dc37a7fe6ed83127e72f6a42de95e1ddbac', 2, 1, 'eShop', '[]', 0, '2020-10-27 23:46:35', '2020-10-27 23:46:35', '2021-10-28 05:46:35'),
('54ff4e175b826f9b9ff4d0f9efd3b4e88d84191b63ab4efc6463dfad33013b424f744b3f07e57c42', 8, 1, 'eShop', '[]', 0, '2020-10-12 21:45:17', '2020-10-12 21:45:17', '2021-10-13 03:45:17'),
('59da6418b37c40064005f2dacab562af927aabfc173ef3281139b6d1a668db5724943fefea102f76', 8, 1, 'eShop', '[]', 0, '2020-10-13 00:46:20', '2020-10-13 00:46:20', '2021-10-13 06:46:20'),
('6687439bc7e88af74739fb85769a25270888e0630e517f5ef443b80e6c7956e83cc6cdac5b789f0c', 8, 1, 'eShop', '[]', 0, '2020-09-20 04:25:47', '2020-09-20 04:25:47', '2021-09-20 10:25:47'),
('669a09f0193a3ce7bdb1b08d8966e79a1cc48b79de415391405ef39a4ee6d7cd53392b62ba891278', 8, 1, 'eShop', '[]', 0, '2020-09-22 04:27:30', '2020-09-22 04:27:30', '2021-09-22 10:27:30'),
('6c370f4385186dd81c65b46d55b764e9f461d1cfdfbaaa26bd697958c8625ff815c069f3c4167389', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:19:01', '2020-09-22 03:19:01', '2021-09-22 09:19:01'),
('6f33413d8279dff7a8868d24bdd06722f2bbd3e04de67060547a64172e8a5966c85c1f3f30f9fb7e', 8, 1, 'eShop', '[]', 0, '2020-09-20 05:13:58', '2020-09-20 05:13:58', '2021-09-20 11:13:58'),
('6fc41753120cf165e750da7652c9530b2c1b855f4f67b45cacdd2fa4e1b5ffefb7033e8320346ec9', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:22:22', '2020-09-22 03:22:22', '2021-09-22 09:22:22'),
('740a0e489de74c22c7423103146a7f0d3b3c84a54a98822ed0c39d6ecaf160aba3a5d9667205100c', 8, 1, 'eShop', '[]', 0, '2020-09-27 22:48:38', '2020-09-27 22:48:38', '2021-09-28 04:48:38'),
('760e16cd37678e11b819c52c8fead94c81bfe5a1db7eb75c1254ccd719c9f30b19a94faad584e259', 8, 1, 'eShop', '[]', 0, '2020-10-13 23:07:50', '2020-10-13 23:07:50', '2021-10-14 05:07:50'),
('76f6bb411cec2a61a7322afb9aca024fa84da7db8e7e2057fb1c8148e2cff0042e24e8e9648ea75d', 8, 1, 'eShop', '[]', 0, '2020-09-20 05:49:06', '2020-09-20 05:49:06', '2021-09-20 11:49:06'),
('7793c3c910c08fbe3a0c2e27023111f97d7aba1a3b2bc95e59f99f894448debded58bed6688a8315', 1, 1, 'eShop', '[]', 0, '2020-09-20 03:39:56', '2020-09-20 03:39:56', '2021-09-20 09:39:56'),
('7ec082cb01c54760fe3412d6e02580863cc2d1eec5161e18bd4afa949e975e65472c602541d4d954', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:02:44', '2020-09-22 03:02:44', '2021-09-22 09:02:44'),
('7fb362967ed03e1aa4003a698e32997cc13b5c5c8548c8d8b11b85372c23c6d58622b427536a20c2', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:14:51', '2020-09-22 03:14:51', '2021-09-22 09:14:51'),
('805c9db2f4e28b3259d0080fc631c693b74ca129bc80a89dd0acca4c74e1e4465057283d2d0e0e8e', 8, 1, 'eShop', '[]', 0, '2020-09-29 05:04:04', '2020-09-29 05:04:04', '2021-09-29 11:04:04'),
('812ba3dee26b8bc7cd1437c7d0db0ea387f97e037d7144ef92ae16a03d41730a11267fdd29c57aa3', 8, 1, 'eShop', '[]', 0, '2020-09-21 22:22:55', '2020-09-21 22:22:55', '2021-09-22 04:22:55'),
('838787963df824d16bc30541addce03c4cb0286a1175bbe46effbfd9f79bea767f3883e138f34b87', 10, 1, 'eShop', '[]', 0, '2020-09-29 23:14:49', '2020-09-29 23:14:49', '2021-09-30 05:14:49'),
('83e47b3a8953f23db4af9699259860366d789f5b890b672ea47c99da38fec5e2f3d7082261c5510b', 8, 1, 'eShop', '[]', 0, '2020-10-08 10:22:17', '2020-10-08 10:22:17', '2021-10-08 03:22:17'),
('865ddde323e85bbd28686d3d4488a6d330c91d7bf2d4af7e1b59bc6fea57e7c5c85b152768d761b5', 8, 1, 'eShop', '[]', 0, '2020-10-13 05:39:24', '2020-10-13 05:39:24', '2021-10-13 11:39:24'),
('87a50e7faa3cc1202a1268a14f181756fd503f482aaf2aaa2af1a907b5515171785eee6f24b0d854', 8, 1, 'eShop', '[]', 0, '2020-10-08 18:00:04', '2020-10-08 18:00:04', '2021-10-08 11:00:04'),
('88c0abb725b527d49a0b322b1155b8f60a0941b93f7c9793afa01ac6281ff3df90f1a81349b3c093', 8, 1, 'eShop', '[]', 0, '2020-10-13 04:52:11', '2020-10-13 04:52:11', '2021-10-13 10:52:11'),
('88eb1f9d6c4c691deb07b7bd228b9b3f62c0e90138d90ce1ea4e2bca0828c3053431396843df7dda', 8, 1, 'eShop', '[]', 0, '2020-10-07 10:19:10', '2020-10-07 10:19:10', '2021-10-07 03:19:10'),
('89c248855bcd847f311afc41051edc3746d16c290b4a4486cf83261412c32f2c76f25057b8cce2ed', 1, 1, 'eShop', '[]', 0, '2020-09-20 03:49:22', '2020-09-20 03:49:22', '2021-09-20 09:49:22'),
('8bdb102b95d20c370346c3c6f7e416e5c679bb5e48c3a980a781ca49fa6da02ee51cec609e556e05', 8, 1, 'eShop', '[]', 0, '2020-10-13 05:12:26', '2020-10-13 05:12:26', '2021-10-13 11:12:26'),
('8d288b5ce2a9bceb8c2869b9250360961b673ae95a61b07f9d90ee7eaa5ee2fb436e5c66a04efdf8', 8, 1, 'eShop', '[]', 0, '2020-09-28 21:08:48', '2020-09-28 21:08:48', '2021-09-29 03:08:48'),
('8fa40d1f9e9e3f2067ca9ecd640c14fb31cb3b75688b9a38fae1f6187570aa4643296ccc2611e7fc', 8, 1, 'eShop', '[]', 0, '2020-10-13 05:11:27', '2020-10-13 05:11:27', '2021-10-13 11:11:27'),
('910396bd8636a83e27ad3f9582b7f72fa841ea982df4a01285f50719e5334a5379402e3639e1e9cb', 8, 1, 'eShop', '[]', 0, '2020-09-28 05:53:29', '2020-09-28 05:53:29', '2021-09-28 11:53:29'),
('916a1c86009ba44440ac9a4a73c3f11f3241a28cf014005f88cb09e83872a9ab18f7588407e27b63', 8, 1, 'eShop', '[]', 0, '2020-09-23 04:15:02', '2020-09-23 04:15:02', '2021-09-23 10:15:02'),
('919043e5c819d9cff8087c484ccfc8bb19ff7689e60a6d8c130bf7235c91bde0c0743eab8b1ec815', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:37:06', '2020-09-22 03:37:06', '2021-09-22 09:37:06'),
('983fa0959fdae7131235821cc0aae94a8f744f975949ec949151d2cc7149fd7a19b9818f67cb2ea8', 8, 1, 'eShop', '[]', 0, '2020-09-22 01:09:49', '2020-09-22 01:09:49', '2021-09-22 07:09:49'),
('9eab890ea6b36273a4b427e6ffaff16534298c1236e9e427bba97e72ca6e93114e4979fda3511652', 8, 1, 'eShop', '[]', 0, '2020-09-20 04:40:10', '2020-09-20 04:40:10', '2021-09-20 10:40:10'),
('a0283e6dff69e566cacc106947df9b251a0acde7c6413a988edb1e452821e856efdfb4dc00994ee0', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:00:29', '2020-09-22 03:00:29', '2021-09-22 09:00:29'),
('a28b6bac92c82c98552ac98e5366c0f70bde553126d717cb8e232b0b4b4d592b4df476907ce7446a', 8, 1, 'eShop', '[]', 0, '2020-09-21 23:10:55', '2020-09-21 23:10:55', '2021-09-22 05:10:55'),
('a31bbee145d9edd7e360db2c3181e5c18da1a9771d9fcb4aa9bdec6b58858fc15e5cf2f027d655e8', 8, 1, 'eShop', '[]', 0, '2020-10-11 18:28:40', '2020-10-11 18:28:40', '2021-10-11 11:28:40'),
('a4b2fd595a9e7cd67dba909aba50dce410a5be2dfd11642408094b7f820a3622d0e4f8b9475aa05e', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:00:56', '2020-09-22 03:00:56', '2021-09-22 09:00:56'),
('a604b8c57047e26e16d81a3694da6b27c4ddb0189a0901a8805787d6129bf071b11c603546d07623', 7, 1, 'eShop', '[]', 0, '2020-10-28 00:35:33', '2020-10-28 00:35:33', '2021-10-28 06:35:33'),
('a6f82de8054176a05ce8a5cc0d676d062c6bec6cd3157716d5aa58d2ddcf7bbf6ade024cb5ae6a83', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:39:09', '2020-09-22 03:39:09', '2021-09-22 09:39:09'),
('abcbb2fc6f8979ebcc565e5758abd4732d086b91e405ca860680a2bb5e24ec14e76d09bbf89b595d', 8, 1, 'eShop', '[]', 0, '2020-09-20 04:56:50', '2020-09-20 04:56:50', '2021-09-20 10:56:50'),
('ada95de79539cfddc22c6a5404c46ef488379af8b05206e7839368b2f86cc9682ccc1695e0608b0e', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:00:19', '2020-09-22 03:00:19', '2021-09-22 09:00:19'),
('b1b2bad58729349471bd086b1d9a53e4db5c70d55aba1efc374abc5b1166056a2060fa7130abf5a6', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:43:09', '2020-09-22 03:43:09', '2021-09-22 09:43:09'),
('b22c99fe986893c025314a84d9e2b9412d652a6a80f638325794c27b217a84d83a609ee92eb1e5a9', 8, 1, 'eShop', '[]', 0, '2020-09-29 22:28:52', '2020-09-29 22:28:52', '2021-09-30 04:28:52'),
('b3f5bdacb41ae2852b9f33bc2c7b87bc8609a250bf58d401b8c2f402925deb9dcacbbbb6f8c07e9d', 8, 1, 'eShop', '[]', 0, '2020-10-06 15:52:43', '2020-10-06 15:52:43', '2021-10-06 08:52:43'),
('b516c1be2afbf13669a50312054486787064fae45d481624f4dedad00cc93b32acc7362ce679c80c', 8, 1, 'eShop', '[]', 0, '2020-09-22 02:13:21', '2020-09-22 02:13:21', '2021-09-22 08:13:21'),
('b7ea961552aa01d05bd60b554fd2701fccfb3323c60e451fdfc19235f9f4b683dc379f30098c7bc0', 8, 1, 'eShop', '[]', 0, '2020-09-29 21:06:53', '2020-09-29 21:06:53', '2021-09-30 03:06:53'),
('bbb72edd1b130cd845c304ac464f13467f176503002e655d3a81971757e9103da7c469fbc1559812', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:57:57', '2020-09-22 03:57:57', '2021-09-22 09:57:57'),
('bc179773e253f61e6e5d1d7bea612166891ec078c9ec939fbdab3f7db2f9841c38dd30153949baa3', 8, 1, 'eShop', '[]', 0, '2020-09-21 23:36:21', '2020-09-21 23:36:21', '2021-09-22 05:36:21'),
('bfced945ee4176df5056f4c41a7c11562475c7c2ac886a1ae64ea82eb0b9facc5fda8ceef24757d7', 10, 1, 'eShop', '[]', 0, '2020-10-08 17:56:08', '2020-10-08 17:56:08', '2021-10-08 10:56:08'),
('c09207f4296a4d61cae2f2f1038d5ee887bf8d2f22acb8ab872728c932355475b6fd39c1ad4e0330', 8, 1, 'eShop', '[]', 0, '2020-09-21 22:32:07', '2020-09-21 22:32:07', '2021-09-22 04:32:07'),
('c3dda36ca974eee1dee5fc6e668470da3f0016d4ed461f1bc6c88ae0bbdc843fbb8c3a32591f3c9b', 8, 1, 'eShop', '[]', 0, '2020-09-20 05:06:55', '2020-09-20 05:06:55', '2021-09-20 11:06:55'),
('c5e8634b09d6749bf6f1dc981aadad690951659ecef1324a5e29a53e2e55111ef21fd9cf27080da9', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:12:26', '2020-09-22 03:12:26', '2021-09-22 09:12:26'),
('c85bd4cfed77c4bf4275de66a0064d120fee72ff6e7337ac52a2fd17ceb3d7960cd02a80b9217876', 1, 1, 'eShop', '[]', 0, '2020-09-20 04:07:44', '2020-09-20 04:07:44', '2021-09-20 10:07:44'),
('c8e335e3bad0477e6b32f3d992ed97c4661ec5bd902011ef0549a6b33774fbe6fad5003c244ce321', 8, 1, 'eShop', '[]', 0, '2020-10-13 23:16:07', '2020-10-13 23:16:07', '2021-10-14 05:16:07'),
('cb4c91c03233559cc961ecbd603269254120995d204f7954c64a160e5571d9e31af733e41ca74ed3', 8, 1, 'eShop', '[]', 0, '2020-09-23 04:17:34', '2020-09-23 04:17:34', '2021-09-23 10:17:34'),
('cbd2db31320ecabf340e122b475cfa5ff998b2b728ccb9942a1d0277eebbbbf267d5a15791dc65cd', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:04:02', '2020-09-22 03:04:02', '2021-09-22 09:04:02'),
('cc4ba9f73b92cb96b7a2f3437fa847940336f5eb3853276333e011f7a70b0b3a252e22ab1e3e544e', 10, 1, 'eShop', '[]', 0, '2020-09-29 21:20:56', '2020-09-29 21:20:56', '2021-09-30 03:20:56'),
('cc4d34fd9e906cc8215e2e816f840203c709a74bf4db0ab5a34bbb5cc222d76f553e7e814d57915d', 8, 1, 'eShop', '[]', 0, '2020-09-20 05:05:09', '2020-09-20 05:05:09', '2021-09-20 11:05:09'),
('d7766f01b2dd85f81c830805a9d5098e0652f3034bd87d8d5cfc052f81397aa01c69035828538d5b', 8, 1, 'eShop', '[]', 0, '2020-09-22 02:50:48', '2020-09-22 02:50:48', '2021-09-22 08:50:48'),
('d776c621cd8ca869d5c6ade061290594b226c53ec63a200a8f86abeb2c174cff38cedd0257300331', 8, 1, 'eShop', '[]', 0, '2020-09-23 02:50:36', '2020-09-23 02:50:36', '2021-09-23 08:50:36'),
('d781268d2549b7c5e24abf807b92d4be60a5664f5acade6fb4c82eb808ca1b492796ef2285f36996', 8, 1, 'eShop', '[]', 0, '2020-09-21 21:24:28', '2020-09-21 21:24:28', '2021-09-22 03:24:28'),
('d7945f4aaf5d857af67b2b676c6f3dee676cbe5767cf009e0efe42c4bdd2cef67223b4a37ac332e0', 8, 1, 'eShop', '[]', 0, '2020-10-13 04:51:07', '2020-10-13 04:51:07', '2021-10-13 10:51:07'),
('d909af4318488ac3904c0aa48d94475c994c71f0daa6b890ddc79c0a69199dec94db49f40bc04c45', 8, 1, 'eShop', '[]', 0, '2020-09-22 02:49:30', '2020-09-22 02:49:30', '2021-09-22 08:49:30'),
('dbe836e2a29a389c2a520b0a6b6d14df672717495dc26629be8879cccaf949eedd25276c2cc94a65', 8, 1, 'eShop', '[]', 0, '2020-09-22 02:58:18', '2020-09-22 02:58:18', '2021-09-22 08:58:18'),
('ddd028802a30404708620bbe9c761713946350f54eaec23f3a1b5baee2ad9ead77724fed975a5d05', 8, 1, 'eShop', '[]', 0, '2020-10-06 12:12:45', '2020-10-06 12:12:45', '2021-10-06 05:12:45'),
('e3fd736026b0284161b89468a95902003d1a4fbf42e83df84e685b79522abd72b5e0f6efa8ebed13', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:08:49', '2020-09-22 03:08:49', '2021-09-22 09:08:49'),
('e8a9f36d180066bd050fdf959221a25cd675644d504bbd423aca0ba0d02c8b0faece6d5d36bc8264', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:48:14', '2020-09-22 03:48:14', '2021-09-22 09:48:14'),
('ed61472b156756f47126c90c23d97401782c2b1e49f3f667c69ae24731458e6acae1060c7001dc56', 1, 1, 'eShop', '[]', 0, '2020-09-20 03:58:42', '2020-09-20 03:58:42', '2021-09-20 09:58:42'),
('ef7e9829ab1b879265acaae7c937355e25670b3ec128d82bbae9882fc105225f2fbab00d70b959bb', 8, 1, 'eShop', '[]', 0, '2020-09-23 21:03:39', '2020-09-23 21:03:39', '2021-09-24 03:03:39'),
('f094a111d21eb43131f94e93b6c82a3e4e250aaeb124185e7d59383e16eb3a099651e9285186892e', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:05:44', '2020-09-22 03:05:44', '2021-09-22 09:05:44'),
('f171cb5705fe296422c19099037868cab36312460a385adf44e3aad78077c505e11475f89cf9ec8e', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:21:21', '2020-09-22 03:21:21', '2021-09-22 09:21:21'),
('f5cc91e365e57d65606bae5e84cdb8fc9099703bd9e0dfcd0bbb6fa1e99911d15c1536e0dfdb22b5', 8, 1, 'eShop', '[]', 0, '2020-09-22 03:41:56', '2020-09-22 03:41:56', '2021-09-22 09:41:56'),
('fe30b69a4f6ba1a2a5e4112c945dc5788e526fe4d98bc55a7a16020e1f84b2d5a3a4cde24bc534b6', 8, 1, 'eShop', '[]', 0, '2020-09-21 22:05:49', '2020-09-21 22:05:49', '2021-09-22 04:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'SSL Eshop Personal Access Client', '0IzatVFvhrbpU5zcoz2l0Zymsp3KYqMAbmBWm7Hk', NULL, 'http://localhost', 1, 0, 0, '2020-09-20 03:00:04', '2020-09-20 03:00:04'),
(2, NULL, 'SSL Eshop Password Grant Client', 'Unr8DxiX5oMl6toLxmlB6ixE8fXlRfGdOydLuMCp', 'users', 'http://localhost', 0, 1, 0, '2020-09-20 03:00:04', '2020-09-20 03:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-20 03:00:04', '2020-09-20 03:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_banners`
--

CREATE TABLE `offer_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` double(8,2) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_banners`
--

INSERT INTO `offer_banners` (`id`, `title`, `description`, `banner`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mega Offer', 'Winter Mega offer 50%', '311603616801.jpg', 50.00, 1, '2020-10-25 03:06:42', '2020-10-25 04:35:40'),
(2, 'Sale Offer', 'Winter sale offer 50%', '461603617516.jpg', 60.00, 1, '2020-10-25 03:18:36', '2020-10-25 04:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint DEFAULT NULL,
  `order_no` bigint DEFAULT NULL,
  `total_count` int DEFAULT NULL,
  `total_price` double(9,2) DEFAULT NULL,
  `shipping_charge` int DEFAULT NULL,
  `order_status` int NOT NULL DEFAULT '0',
  `order_tracking` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint DEFAULT NULL,
  `order_no` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `count` int DEFAULT NULL,
  `unit_price` double(8,2) DEFAULT NULL,
  `sub_price` double(8,2) DEFAULT NULL,
  `order_item_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin-list', 'web', NULL, '2020-08-23 18:36:29', '2020-08-23 18:36:29'),
(2, 'admin-create', 'web', NULL, '2020-08-23 18:36:29', '2020-08-23 18:36:29'),
(3, 'admin-edit', 'web', NULL, '2020-08-23 18:36:29', '2020-08-23 18:36:29'),
(4, 'admin-delete', 'web', NULL, '2020-08-23 18:36:29', '2020-08-23 18:36:29'),
(5, 'manager-list', 'web', NULL, '2020-08-23 18:36:29', '2020-08-23 18:36:29'),
(6, 'manager-create', 'web', NULL, '2020-08-23 18:36:29', '2020-08-23 18:36:29'),
(7, 'manager-edit', 'web', NULL, '2020-08-23 18:36:29', '2020-08-23 18:36:29'),
(8, 'manager-delete', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(9, 'customer-list', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(10, 'customer-create', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(11, 'customer-edit', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(12, 'customer-delete', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(13, 'user-list', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(14, 'user-create', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(15, 'user-edit', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(16, 'user-delete', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(17, 'vendor-list', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(18, 'vendor-create', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(19, 'vendor-edit', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(20, 'vendor-delete', 'web', NULL, '2020-08-23 18:36:30', '2020-08-23 18:36:30'),
(21, 'staff-list', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(22, 'staff-create', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(23, 'staff-edit', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(24, 'staff-delete', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(25, 'role-list', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(26, 'role-create', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(27, 'role-edit', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(28, 'role-delete', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(29, 'permission-list', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(30, 'permission-create', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(31, 'permission-edit', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(32, 'permission-delete', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(33, 'dashboard-list', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(34, 'dashboard-create', 'web', NULL, '2020-08-23 18:36:31', '2020-08-23 18:36:31'),
(35, 'dashboard-edit', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(36, 'dashboard-delete', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(37, 'product-list', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(38, 'product-create', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(39, 'product-edit', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(40, 'product-delete', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(41, 'order-list', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(42, 'order-create', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(43, 'order-edit', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(44, 'order-delete', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(45, 'blog-list', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(46, 'blog-create', 'web', NULL, '2020-08-23 18:36:32', '2020-08-23 18:36:32'),
(47, 'blog-edit', 'web', NULL, '2020-08-23 18:36:33', '2020-08-23 18:36:33'),
(48, 'blog-delete', 'web', NULL, '2020-08-23 18:36:33', '2020-08-23 18:36:33'),
(49, 'category-list', 'web', NULL, '2020-08-31 21:45:33', '2020-08-31 21:45:33'),
(50, 'category-create', 'web', NULL, '2020-08-31 21:45:33', '2020-08-31 21:45:33'),
(51, 'category-edit', 'web', NULL, '2020-08-31 21:45:33', '2020-08-31 21:45:33'),
(52, 'category-delete', 'web', NULL, '2020-08-31 21:45:33', '2020-08-31 21:45:33'),
(53, 'brand-list', 'web', NULL, '2020-08-31 21:46:53', '2020-08-31 21:46:53'),
(54, 'brand-create', 'web', NULL, '2020-08-31 21:46:54', '2020-08-31 21:46:54'),
(55, 'brand-edit', 'web', NULL, '2020-08-31 21:46:54', '2020-08-31 21:46:54'),
(56, 'brand-delete', 'web', NULL, '2020-08-31 21:46:54', '2020-08-31 21:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `processors`
--

CREATE TABLE `processors` (
  `id` bigint UNSIGNED NOT NULL,
  `processors_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processors_description` text COLLATE utf8mb4_unicode_ci,
  `processors_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processors`
--

INSERT INTO `processors` (`id`, `processors_type`, `processors_description`, `processors_sign`, `created_at`, `updated_at`) VALUES
(1, 'Intel Core i5', 'Way of representing a flow of data', 'MMM', '2020-10-30 09:35:42', '2020-10-30 10:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type_id` int DEFAULT NULL,
  `main_category_id` int DEFAULT NULL,
  `size_id` int DEFAULT NULL,
  `processor_id` int DEFAULT NULL,
  `ram_id` int DEFAULT NULL,
  `harddrive_id` int DEFAULT NULL,
  `graphicscard_id` int DEFAULT NULL,
  `color_id` int DEFAULT NULL,
  `stock_status` int DEFAULT NULL,
  `condition` int DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `product_specification` text COLLATE utf8mb4_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `product_type_id`, `main_category_id`, `size_id`, `processor_id`, `ram_id`, `harddrive_id`, `graphicscard_id`, `color_id`, `stock_status`, `condition`, `create_user`, `update_user`, `brand_id`, `year`, `slug`, `tag`, `product_description`, `product_specification`, `feature_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple 11\" MacBook Air (Mid 2012) 1.7GHz Core i5 128GB SSD 4GB A1465 MD224LL/A', 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, NULL, '2019', 'apple_11_macbook_air_mid_2012_17ghz_core_i5_128gb_ssd_4gb_a1465_md224lla', 'swe,343,365,y5,6', '<p><span style=\"color: #212529; font-family: Avenir; font-size: 16px; background-color: #ffffff;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing.</span></p>', '<p><span style=\"color: #212529; font-family: Avenir; font-size: 16px; background-color: #ffffff;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing.</span></p>', '111607318173.png', NULL, '2020-10-31 03:00:23', '2020-12-06 23:16:13'),
(2, 'iPad Pro - Apple', 2, 2, 2, 1, 3, 2, 1, 2, 2, 1, 1, 1, NULL, '2019', 'ipad_pro_apple', NULL, '<p><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">iPad Pro</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;is the ultimate mobile workstation. You can print, project, and send files wirelessly. The USB‑C port lets you connect all types of accessories, like a ...</span></p>', NULL, '131607441946.jpg', NULL, '2020-12-08 09:39:06', '2020-12-08 09:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint DEFAULT NULL,
  `unit_price` double(8,2) DEFAULT NULL,
  `purchase_price` double(8,2) DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `stock_quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `unit_price`, `purchase_price`, `tax`, `discount`, `stock_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 130000.00, 115000.00, 2.00, 3.00, 15, '2020-10-31 03:00:25', '2020-10-31 03:00:25'),
(2, 2, 20000.00, NULL, 3.00, 5.00, 50, '2020-12-08 09:39:07', '2020-12-08 09:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint UNSIGNED NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `product_type`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '2020-12-09 00:33:44', '2020-12-09 00:33:44'),
(2, 'Audio', '2020-12-09 00:33:53', '2020-12-09 00:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `rams`
--

CREATE TABLE `rams` (
  `id` bigint UNSIGNED NOT NULL,
  `ram_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rams`
--

INSERT INTO `rams` (`id`, `ram_size`, `ram_sign`, `created_at`, `updated_at`) VALUES
(1, '8', 'GB', '2020-10-30 11:20:47', '2020-10-30 11:21:10'),
(2, '4', 'GB', '2020-12-07 02:21:36', '2020-12-07 02:21:36'),
(3, '16', 'GB', '2020-12-07 02:21:47', '2020-12-07 02:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-08-23 18:36:40', '2020-08-23 18:36:40'),
(2, 'Manager', 'web', '2020-08-26 22:16:22', '2020-08-26 22:16:22'),
(3, 'Vendor', 'web', '2020-09-06 00:24:28', '2020-09-06 00:24:28'),
(4, 'Staff', 'web', '2020-09-06 00:25:26', '2020-09-06 00:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(37, 2),
(38, 2),
(39, 2),
(41, 2),
(42, 2),
(43, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(53, 2),
(21, 3),
(22, 3),
(23, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(37, 4),
(38, 4),
(39, 4);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint UNSIGNED NOT NULL,
  `shipping_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_price` double(8,2) DEFAULT NULL,
  `shipping_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `shipping_type`, `shipping_description`, `shipping_price`, `shipping_status`, `created_at`, `updated_at`) VALUES
(1, 'Own City', 'Own City rate 50tk', 50.00, 1, '2020-09-09 23:16:11', '2020-09-10 00:02:26'),
(2, 'Out of City', 'Out of City rate 100tk', 100.00, 1, '2020-09-09 23:24:32', '2020-09-09 23:24:32'),
(3, 'Flat Rate', 'All product are flat rate', 80.00, 1, '2020-09-09 23:25:52', '2020-09-09 23:25:52'),
(4, 'Free Shipping', 'All product are free delivery', 0.00, 1, '2020-09-09 23:26:50', '2020-09-09 23:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `size_sign`, `created_at`, `updated_at`) VALUES
(1, '27', 'inch', '2020-10-30 11:39:01', '2020-10-30 11:39:20'),
(2, '20', 'inch', '2020-12-07 00:01:02', '2020-12-07 00:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `slider_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `slider_description`, `slider_url`, `slider_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple Store 1', 'Apple Store 1', 'http://127.0.0.1:8000/slider/createss', '451604252082.jpg', 1, '2020-10-21 04:52:27', '2020-11-01 11:34:43'),
(2, 'Apple Store', 'Apple Store', 'http://127.0.0.1:8000/slider/create', '341604252058.jpg', 1, '2020-10-21 04:53:26', '2020-11-01 11:34:19'),
(4, 'Apple Store 2', 'Apple Store 2', NULL, '321604252112.jpg', 1, '2020-11-01 11:35:13', '2020-11-01 11:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `main_category_id` int DEFAULT NULL,
  `sc_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sc_type` int DEFAULT NULL,
  `sc_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scoverimage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `main_category_id`, `sc_name`, `sc_description`, `sc_type`, `sc_slug`, `scoverimage`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fish', 'sdfdfdfd', 1, 'fish', '951602664077.jpeg', '2020-08-27 04:09:22', '2020-10-14 02:27:57'),
(2, 2, 'Shirt', 'sdf ef er r', 1, 'shirt', '701602664052.jpeg', '2020-08-27 04:27:15', '2020-10-14 02:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `user_type` enum('Admin','Manager','Vendor','Staff','Customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `user_status` int DEFAULT '0',
  `staff_owner` int DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `role_id`, `user_type`, `user_status`, `staff_owner`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, NULL, 1, 'Admin', 1, 1, NULL, '$2y$10$voQgo4nTVfFWPLct7f1cN.QExjS5q8mNkx/H224W6InXvOFWZXnL.', NULL, '2020-08-23 18:36:40', '2020-08-23 18:36:40'),
(2, 'Shamim Ahmmed', 'shamim@subrasystems.com', NULL, '017541554325', 3, 'Vendor', 1, NULL, NULL, '$2y$10$.QxYPRxCH9x9ysrh1uXMFOC0DY7a5iGbIBDAgVm3EinelacTKb8bG', NULL, '2020-10-27 23:46:05', '2020-10-28 00:11:17'),
(3, 'Motaleb Hossain', 'motaleb@gmail.com', NULL, NULL, 3, 'Vendor', 1, NULL, NULL, '$2y$10$nEH7nYKSqsdB2d56TfE/SeTqvx6IwKylhH.kX0tUN8lhJ95npk3vy', NULL, '2020-10-27 23:48:38', '2020-10-28 00:15:45'),
(4, 'Rahat Ali', 'rahat@gmail.com', NULL, NULL, 3, 'Vendor', 1, NULL, NULL, '$2y$10$eho35pyLEXgTHcQvPjFXNOqRn/ZSz8wOj/lT8UYH/LR8USxDeqAS.', NULL, '2020-10-27 23:50:33', '2020-10-28 00:14:18'),
(5, 'Newoyaz Shorif', 'newoyaz@gmail.com', NULL, NULL, 3, 'Vendor', 1, NULL, NULL, '$2y$10$Y1UQugFo.EoSCDxyK/00A.GXtENr17b.um.KD1nGfcAZK7.ysHi9m', NULL, '2020-10-27 23:51:42', '2020-10-28 00:47:58'),
(6, 'Rakib Hossain', 'rakib@gmail.com', NULL, NULL, 3, 'Vendor', 1, NULL, NULL, '$2y$10$/1MdgTLFvrjny1hEYKpLo.djGjL9pmxzOAxInCdYGGT9FMz0lNFwO', NULL, '2020-10-27 23:52:18', '2020-10-28 00:13:42'),
(7, 'Tanvir Hossain', 'tanvir@gmail.com', NULL, NULL, NULL, 'Customer', 1, NULL, NULL, '$2y$10$1wJfjkNrlCKrJwCXmGR5zeXjyVf7lS/FAU9ZyRNObe7C1.bzg6AUa', NULL, '2020-10-27 23:57:14', '2020-10-27 23:57:14'),
(8, 'Sarwoar Hossain', 'sarwoar@gmail.com', NULL, NULL, NULL, 'Customer', 1, NULL, NULL, '$2y$10$bA608TK4O6i1Wi3iATWfzeIiQ4lutoLvczAAs2rHHjJ0ei/ffc46e', NULL, '2020-10-28 00:45:08', '2020-10-28 00:45:08'),
(9, 'Sohel Viru', 'sohel@gmail.com', NULL, NULL, NULL, 'Customer', 1, NULL, NULL, '$2y$10$PYmTU0vUEtq.MxaBnp6BDOuB1lQ6DOy58BYRmTEFAybSbRrGbxzlW', NULL, '2020-10-28 00:46:17', '2020-10-28 00:46:17'),
(10, 'Test 1', 'test@gmail.com', NULL, NULL, NULL, 'Customer', 0, NULL, NULL, '$2y$10$d1HZqkR5QGBd/fLgD1Id/e/sDvmUf/Z08PU7zPbcCYypsDwc8xLBC', NULL, '2020-11-02 11:12:18', '2020-11-02 11:12:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graphics_cards`
--
ALTER TABLE `graphics_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hard_drives`
--
ALTER TABLE `hard_drives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_galleries`
--
ALTER TABLE `image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offer_banners`
--
ALTER TABLE `offer_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processors`
--
ALTER TABLE `processors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rams`
--
ALTER TABLE `rams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `graphics_cards`
--
ALTER TABLE `graphics_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hard_drives`
--
ALTER TABLE `hard_drives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image_galleries`
--
ALTER TABLE `image_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer_banners`
--
ALTER TABLE `offer_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `processors`
--
ALTER TABLE `processors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rams`
--
ALTER TABLE `rams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
