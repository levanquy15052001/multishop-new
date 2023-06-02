-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2023 at 04:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_14_041641_tbl_products', 1),
(6, '2023_04_14_041906_tbl_brands', 1),
(7, '2023_04_14_041924_tbl_categories', 1),
(8, '2023_04_14_092734_tbl_admin', 2),
(9, '2023_04_14_102717_tbl_order', 3),
(10, '2023_04_14_140001_tbl_information', 4),
(11, '2023_04_14_140816_tbl_order_details', 5),
(12, '2023_04_29_064113_tbl_order_offline', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@gmail.com', '$2y$10$/laZujEIkXE04ggBWSH8B.TOpzjy5ZhmbJonRj5Vq1lyiwGbGDxKW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`id`, `name`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asus', 'ASUS_Logo.svg.png', 1, NULL, NULL),
(2, 'MSI', 'msiLogo.png', 1, NULL, NULL),
(3, 'Corsair', 'corsair.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Màn Hinh', 'manhinhcate.jpg', 1, NULL, '2023-04-20 22:37:39'),
(2, 'Lap Top', 'laptopcate.jpg', 1, NULL, '2023-04-20 21:48:09'),
(3, 'Nguồn Pc', 'nguon_logo.png', 1, NULL, '2023-04-20 22:35:51'),
(6, 'Le Quy sasds', '1682150977_70042092_224558688514788_8162764918630645760_n.jpg', 0, '2023-04-22 00:56:57', '2023-05-01 01:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_information`
--

CREATE TABLE `tbl_information` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT '0',
  `admin_id` int DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_information`
--

INSERT INTO `tbl_information` (`id`, `user_id`, `admin_id`, `name`, `address`, `city`, `district`, `ward`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(10, 10, 0, 'Le Van Quy', '120 Lương Ngọc Quyến', 'Tỉnh Bình Định', 'Thành phố Quy Nhơn', 'Phường Đống Đa', '0347026392', 'levanquy15052001@gmail.com', '2023-05-01 22:16:19', '2023-05-01 22:16:19'),
(11, 0, 1, 'Le Van Quy', '120 Lương Ngọc Quyến', 'Tỉnh Bình Định', 'Thành phố Quy Nhơn', 'Phường Đống Đa', '0347026392', 'levanquy15052001@gmail.com', '2023-05-01 22:24:44', '2023-05-01 22:24:44'),
(12, 0, 1, 'testOrderoffline', '120 Luong Ngoc Quyen', 'Thành phố Hồ Chí Minh', 'Quận Gò Vấp', 'Phường 05', '0347026392', 'tiengsaodem15051998@gmail.com', '2023-05-01 22:51:10', '2023-05-01 22:51:10'),
(13, 11, 0, 'TestUser', '120 Luong Ngoc Quyen', 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'Phường Phúc Tân', '0347026922', 'tiengsaodem15051998@gmail.com', '2023-05-15 22:56:46', '2023-05-15 22:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` int DEFAULT NULL,
  `qty` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `product_id`, `price`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(58, 10, 3, 800, 2, 3, '2023-05-01 22:46:27', '2023-05-01 22:48:01'),
(59, 10, 4, 1000, 2, 3, '2023-05-01 22:46:31', '2023-05-01 22:48:01'),
(61, 10, 1, 700, 1, 3, '2023-05-01 22:47:52', '2023-05-01 22:48:01'),
(63, 10, 1, 700, 1, 3, '2023-05-01 22:47:52', '2023-05-15 22:59:41'),
(64, 11, 2, 800, 3, 3, '2023-05-15 22:55:02', '2023-05-15 22:59:50'),
(65, 10, 2, 800, 1, 3, '2023-05-15 22:57:50', '2023-05-15 22:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `order_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(5, 11, 800, 1, '2023-04-14 10:18:03', '2023-04-14 10:18:03'),
(6, 12, 1200, 1, '2023-04-14 10:18:03', '2023-04-14 10:18:03'),
(9, 13, 800, 1, '2023-04-14 10:32:12', '2023-04-14 10:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_offline`
--

CREATE TABLE `tbl_order_offline` (
  `id` bigint UNSIGNED NOT NULL,
  `information_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_offline`
--

INSERT INTO `tbl_order_offline` (`id`, `information_id`, `product_id`, `qty`, `price`, `status`, `created_at`, `updated_at`) VALUES
(14, 11, 4, 1, 1000, 2, '2023-05-01 22:24:49', '2023-05-01 23:47:31'),
(15, 11, 2, 1, 800, 2, '2023-05-01 22:24:52', '2023-05-01 23:47:31'),
(17, 12, 3, 2, 800, 2, '2023-05-01 22:51:27', '2023-05-01 23:46:13'),
(18, 12, 4, 1, 1000, 2, '2023-05-01 22:51:29', '2023-05-01 23:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int NOT NULL,
  `categories_id` int NOT NULL,
  `price` int NOT NULL,
  `price_sale` int NOT NULL DEFAULT '0',
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `img`, `brand_id`, `categories_id`, `price`, `price_sale`, `desc`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lap Top MSI GV62 update', '1681721869_1670826809_Creator-M16-A12U-1583.png', 2, 2, 1000, 700, 'Lap Top MSI GV62 Mo Ta', 'Lap Top MSI GV62 Noi Dung', 1, NULL, '2023-04-17 01:59:54'),
(2, 'Màn Hình Asus 24 In', 'Man-hinh-ASUS-VZ24EHE.png', 1, 1, 800, 0, 'Màn Hình Asus 24 In Mo ta', 'Màn Hình Asus 24 In Nội Dung', 1, NULL, NULL),
(3, ' Màn Hình MSI G24', 'mahinhmsiG24.jpg', 2, 1, 800, 0, ' Mà Hình MSI G24 Mo Ta', ' Mà Hình MSI G24 Noi Dung', 1, NULL, NULL),
(4, 'Lap Top Asus L210', 'laptopAsusl21.jpg', 1, 2, 1500, 1000, 'Lap Top Asus L210 Mo ta', 'Lap Top Asus L210 Noi Dung', 1, NULL, NULL),
(5, 'Corsair Cx550F', '1681716998_corsaircx550f.jpg', 3, 3, 500, 0, 'Corsair Cx550F Mo ta', 'Corsair Cx550F Noi Dung', 1, '2023-04-17 00:36:38', '2023-04-17 00:36:38'),
(6, 'Nguon E500', '1681719329_1680166502_250_41121_10356_e500_3.jpg', 3, 3, 350, 300, 'Nguon E500 Mo ta', 'Nguon E500 noi Dung', 1, '2023-04-17 01:15:29', '2023-04-17 01:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Le Van Quy', 'levanquy15052001@gmail.com', 'levanquy15052001', NULL, '$2y$10$5xwZ0CIkYHPMa4c3hgiPYODvkkih6bNFx8KWOHUrJYIfU1C5InZnK', NULL, '2023-05-01 22:11:21', '2023-05-01 22:11:21'),
(11, 'TestUser', 'tiengsaodem15051998@gmail.com', 'tiengsaodem', NULL, '$2y$10$CjvgnPY2rOY6jTzCc2oadO8TRBOaIivufjYGm/2vXXMQDmZxtzg/m', NULL, '2023-05-15 22:54:14', '2023-05-15 22:54:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_admin_email_unique` (`email`);

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_information`
--
ALTER TABLE `tbl_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_offline`
--
ALTER TABLE `tbl_order_offline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_information`
--
ALTER TABLE `tbl_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order_offline`
--
ALTER TABLE `tbl_order_offline`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
