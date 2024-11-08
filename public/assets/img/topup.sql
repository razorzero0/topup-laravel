-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Okt 2024 pada 01.31
-- Versi server: 8.0.30
-- Versi PHP: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topup`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `image` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-10-12 00:52:38', '2024-10-12 00:52:38'),
(2, 3, '2024-10-12 00:52:43', '2024-10-12 00:52:43'),
(3, 4, '2024-10-12 00:52:49', '2024-10-12 00:52:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Games', '2024-10-11 08:30:18', '2024-10-11 08:30:18'),
(3, 'E-Money', '2024-10-19 16:16:07', '2024-10-19 16:16:07'),
(4, 'Pulsa', '2024-10-19 16:32:32', '2024-10-19 16:32:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `percent` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'kantong diamond ml', 'images/1728719497.webp', '2024-10-11 08:33:57', '2024-10-12 04:20:09'),
(2, 'banner ff', 'images/1728719511.png', '2024-10-12 00:51:51', '2024-10-12 00:51:51'),
(3, 'banner ml', 'images/1728719521.png', '2024-10-12 00:52:01', '2024-10-12 00:52:01'),
(4, 'banner pubg', 'images/1728719536.png', '2024-10-12 00:52:16', '2024-10-12 00:52:16'),
(5, '1 diamond ml', 'images/1728732042.webp', '2024-10-12 04:20:42', '2024-10-12 04:20:42'),
(6, 'banyak diamond ml', 'images/1728732065.webp', '2024-10-12 04:21:05', '2024-10-12 04:21:05'),
(7, 'diamond ff', 'images/1728732084.webp', '2024-10-12 04:21:24', '2024-10-12 04:21:24'),
(9, '1 token hok', 'images/1728732114.png', '2024-10-12 04:21:54', '2024-10-12 04:21:54'),
(10, 'beberapa token hok', 'images/1728732146.png', '2024-10-12 04:22:26', '2024-10-12 04:22:26'),
(11, 'kanyong token hok', 'images/1728732163.png', '2024-10-12 04:22:43', '2024-10-12 04:22:43'),
(12, 'indosat', 'images/1728732178.png', '2024-10-12 04:22:58', '2024-10-12 04:22:58'),
(13, 'ml weekly pass', 'images/1728732591.webp', '2024-10-12 04:29:51', '2024-10-12 04:29:51'),
(14, 'cek id', 'images/1728732896.png', '2024-10-12 04:34:56', '2024-10-12 04:34:56'),
(15, 'dana', 'images/1729356415.jpg', '2024-10-19 16:46:55', '2024-10-19 16:46:55'),
(16, 'ovo', 'images/1729356427.jpg', '2024-10-19 16:47:07', '2024-10-19 16:47:07'),
(17, 'grab', 'images/1729356441.png', '2024-10-19 16:47:21', '2024-10-19 16:47:21'),
(18, 'shopeepay', 'images/1729356470.png', '2024-10-19 16:47:50', '2024-10-19 16:47:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tripay_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `total_fee` int NOT NULL,
  `amount_received` int NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_items` json NOT NULL,
  `callback_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_time` int DEFAULT NULL,
  `pay_url` longtext COLLATE utf8mb4_unicode_ci,
  `checkout_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` json DEFAULT NULL,
  `qr_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `total_price` bigint UNSIGNED NOT NULL,
  `buyer_sku_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `image` bigint UNSIGNED DEFAULT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `item_name`, `product_id`, `price`, `total_price`, `buyer_sku_code`, `status`, `image`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Legends Cek Username', 1, 1000, 10000, 'mlu', 1, 14, 10, '2024-10-11 08:33:33', '2024-10-12 04:35:32'),
(2, 'Mobile Legends 5 Diamond', 1, 990, 9900, 'ml5', 1, 5, 10, '2024-10-12 04:24:20', '2024-10-19 17:07:12'),
(3, 'Mobile Legends 12 Diamond', 1, 3400, 34000, 'ml12', 1, 5, 10, '2024-10-12 04:24:37', '2024-10-19 17:08:03'),
(4, 'Mobile Legends 36 Diamond', 1, 9700, 97000, 'ml36', 1, 1, 10, '2024-10-12 04:24:54', '2024-10-19 17:09:02'),
(5, 'MOBILE LEGENDS Weekly Diamond Pass', 1, 26900, 269000, 'mlweek', 1, 13, 10, '2024-10-12 04:25:19', '2024-10-19 17:10:48'),
(6, 'Mobile Legends 112 Diamond', 1, 29900, 299000, 'ml112', 1, 1, 10, '2024-10-12 04:26:06', '2024-10-19 17:13:15'),
(7, 'Free Fire Cek Username', 2, 1000, 10000, 'ffu', 1, 14, 10, '2024-10-12 04:36:37', '2024-10-12 04:38:45'),
(8, 'Free Fire 12 Diamond', 2, 1915, 5745, 'ff12', 1, 7, 3, '2024-10-12 04:36:47', '2024-10-12 04:40:14'),
(9, 'Free Fire 50 Diamond', 2, 7417, 22251, 'ff50', 1, 7, 3, '2024-10-12 04:37:02', '2024-10-12 04:40:48'),
(10, 'Free Fire 140 Diamond', 2, 18395, 36790, 'ff140', 1, 7, 2, '2024-10-12 04:37:18', '2024-10-12 04:41:18'),
(11, 'Free Fire 280 Diamond', 2, 36167, 72334, 'ff280', 1, 7, 2, '2024-10-12 04:37:58', '2024-10-12 04:42:15'),
(12, 'Free Fire 355 Diamond', 2, 45775, 91550, 'ff355', 1, 7, 2, '2024-10-12 04:38:16', '2024-10-12 04:42:25'),
(13, 'Honor of Kings 16 Tokens', 3, 2430, 12150, 'hok16', 1, 9, 5, '2024-10-12 04:45:55', '2024-10-12 04:47:37'),
(14, 'Honor of Kings 25 Tokens', 3, 4651, 18604, 'hok25', 1, 9, 4, '2024-10-12 04:46:12', '2024-10-12 04:48:10'),
(15, 'Honor of Kings 80 Tokens', 3, 10813, 21626, 'hok80', 1, 10, 2, '2024-10-12 04:46:25', '2024-10-12 04:48:32'),
(16, 'Honor of Kings 240 Tokens', 3, 34480, 68960, 'hok240', 1, 10, 2, '2024-10-12 04:46:39', '2024-10-12 04:49:01'),
(17, 'Honor of Kings 400 Tokens', 3, 57330, 114660, 'hok400', 1, 11, 2, '2024-10-12 04:46:49', '2024-10-12 04:49:35'),
(25, 'DANA 10.000', 6, 10150, 20300, 'dana10', 1, 15, 2, '2024-10-19 16:45:21', '2024-10-19 16:50:43'),
(26, 'DANA 20.000', 6, 20150, 40300, 'dana20', 1, 15, 2, '2024-10-19 16:46:07', '2024-10-19 16:50:43'),
(27, 'DANA 30.000', 6, 30150, 60300, 'dana30', 1, 15, 2, '2024-10-19 16:46:22', '2024-10-19 16:50:43'),
(28, 'DANA 50.000', 6, 50150, 100300, 'dana50', 1, 15, 2, '2024-10-19 16:46:32', '2024-10-19 16:48:49'),
(29, 'SHOPEE PAY 10.000', 7, 11000, 22000, 'spay10', 1, 18, 2, '2024-10-19 16:51:55', '2024-10-19 16:53:44'),
(30, 'SHOPEE PAY 25.000', 7, 26000, 52000, 'spay25', 1, 18, 2, '2024-10-19 16:52:08', '2024-10-19 16:53:58'),
(31, 'SHOPEE PAY 40.000', 7, 40480, 80960, 'spay40', 1, 18, 2, '2024-10-19 16:52:20', '2024-10-19 16:53:04'),
(32, 'SHOPEE PAY 50.000', 7, 50415, 100830, 'spay50', 1, 18, 2, '2024-10-19 16:52:28', '2024-10-19 16:54:03'),
(33, 'OVO 10.000', 8, 10755, 21510, 'ovo1o', 1, 16, 2, '2024-10-19 16:55:24', '2024-10-19 16:57:04'),
(34, 'OVO 25.000', 8, 25760, 51520, 'ovo25', 1, 16, 2, '2024-10-19 16:55:38', '2024-10-19 16:57:04'),
(35, 'OVO 50.000', 8, 50775, 101550, 'ovo50', 1, 16, 2, '2024-10-19 16:56:12', '2024-10-19 16:57:04'),
(36, 'Grab penumpang 20.000', 9, 20000, 40000, 'grab20', 1, 17, 2, '2024-10-19 16:57:34', '2024-10-19 16:58:10'),
(37, 'Grab penumpang 50.000', 9, 50000, 100000, 'grab50', 1, 17, 2, '2024-10-19 16:57:47', '2024-10-19 16:58:23'),
(38, 'Indosat 5.000', 10, 5795, 11590, 'i5', 1, 12, 2, '2024-10-19 16:58:49', '2024-10-19 17:00:53'),
(39, 'Indosat 10.000', 10, 10795, 21590, 'i10', 1, 12, 2, '2024-10-19 16:59:02', '2024-10-19 17:01:11'),
(40, 'Indosat 20.000', 10, 19895, 39790, 'i20', 1, 12, 2, '2024-10-19 16:59:20', '2024-10-19 17:01:35'),
(41, 'Indosat 25.000', 10, 24865, 49730, 'i25', 1, 12, 2, '2024-10-19 16:59:39', '2024-10-19 17:01:53'),
(42, 'Indosat 30.000', 10, 29710, 59420, 'i30', 1, 12, 2, '2024-10-19 16:59:58', '2024-10-19 17:02:08'),
(43, 'Indosat 40.000', 10, 39715, 79430, 'i40', 1, 12, 2, '2024-10-19 17:00:15', '2024-10-19 17:02:24'),
(44, 'Indosat 50.000', 10, 49458, 98916, 'i50', 1, 12, 2, '2024-10-19 17:00:29', '2024-10-19 17:02:38'),
(45, 'MOBILELEGEND - 296 Diamond', 1, 76379, 458274, 'ml296', 1, 6, 6, '2024-10-19 17:12:12', '2024-10-19 17:14:02'),
(46, 'MOBILELEGEND - 355 Diamond', 1, 91000, 455000, 'ml355', 1, 6, 5, '2024-10-19 17:12:26', '2024-10-19 17:14:19'),
(47, 'MOBILELEGEND - 408 Diamond', 1, 103180, 515900, 'ml408', 1, 6, 5, '2024-10-19 17:12:40', '2024-10-19 17:14:38'),
(49, 'MOBILELEGEND - 716 Diamond', 1, 178730, 893650, 'ml716', 1, 6, 5, '2024-10-19 17:13:33', '2024-10-19 17:14:58'),
(50, 'Free Fire 500 Diamond', 2, 61600, 308000, 'ff500', 1, 7, 5, '2024-10-19 17:22:55', '2024-10-19 17:25:07'),
(51, 'Free Fire 635 Diamond', 2, 78740, 393700, 'ff636', 1, 7, 5, '2024-10-19 17:23:10', '2024-10-19 17:25:30'),
(52, 'Free Fire 720 Diamond', 2, 86852, 347408, 'ff720', 1, 7, 4, '2024-10-19 17:23:21', '2024-10-19 17:26:00'),
(53, 'Honor of Kings 560 Tokens', 3, 79950, 159900, 'hok560', 1, 11, 2, '2024-10-19 17:27:07', '2024-10-19 17:27:51'),
(54, 'Honor of Kings 800 Tokens', 3, 109777, 219554, 'hok800', 1, 11, 2, '2024-10-19 17:27:17', '2024-10-19 17:28:05'),
(55, 'Honor of Kings 1.200 Tokens', 3, 175628, 351256, 'hok12000', 1, 11, 2, '2024-10-19 17:27:28', '2024-10-19 17:28:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

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
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_04_111848_create_invoices_table', 1),
(5, '2024_09_08_162103_create_files_table', 1),
(6, '2024_09_20_071136_create_personal_access_tokens_table', 1),
(7, '2024_09_24_045450_create_permission_tables', 1),
(8, '2024_09_24_122815_create_transactions_table', 1),
(9, '2024_09_25_120701_create_categories_table', 1),
(10, '2024_09_25_121000_create_products_table', 1),
(11, '2024_09_25_145600_create_items_table', 1),
(12, '2024_09_26_044628_create_coupons_table', 1),
(13, '2024_10_07_202415_create_populars_table', 1),
(14, '2024_10_07_202515_create_banners_table', 1),
(15, '2024_10_10_215925_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `populars`
--

CREATE TABLE `populars` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `populars`
--

INSERT INTO `populars` (`id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-10-12 00:05:38', '2024-10-12 00:05:38'),
(2, 2, '2024-10-12 00:05:43', '2024-10-12 00:05:43'),
(3, 3, '2024-10-12 00:05:48', '2024-10-12 00:05:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `slug`, `category_id`, `name`, `company`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'mobile-legends', 1, 'MOBILE LEGENDS', 'Moonton', 'images/1728718977.webp', '<p><strong>Langkah-langkah Top-Up Mobile Legends di Algoora :</strong></p><ol><li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li><li>Input ID game, format: ID Pengguna + Zone ID, misal 1490345(6532) menjadi <strong>14903456532</strong></li><li>Pilih jumlah diamond.</li><li>Pilih metode pembayaran.</li><li>Masukkan kode kupon (opsional).</li><li>Klik \"Beli Sekarang.\"</li></ol>', '2024-10-11 08:30:43', '2024-10-12 05:24:10'),
(2, 'free-fire', 1, 'FREE FIRE', 'Garena', 'images/1728718931.jpg', '<p><strong>Langkah-langkah Top-Up Free Fire di Algoora :</strong></p><ol><li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li><li>Input ID game (ID Pengguna) anda.</li><li>Pilih jumlah diamond.</li><li>Pilih metode pembayaran.</li><li>Masukkan kode kupon (opsional).</li><li>Klik \"Beli Sekarang.\"</li></ol>', '2024-10-11 23:58:40', '2024-10-12 05:33:21'),
(3, 'honor-of-kings', 1, 'Honor of Kings', 'Tencent Games', 'images/1728718742.webp', '<p><strong>Langkah-langkah Top-Up Token Honor of Kings di Algoora :</strong></p><ol><li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li><li>Input ID game (ID Pengguna) anda.</li><li>Pilih jumlah token.</li><li>Pilih metode pembayaran.</li><li>Masukkan kode kupon (opsional).</li><li>Klik \"Beli Sekarang.\"</li></ol>', '2024-10-12 00:01:42', '2024-10-12 05:33:05'),
(6, 'dana', 3, 'DANA', 'PT Espay Debit Indonesia Koe', 'images/1729354925.jpg', '<p><strong>Langkah-langkah Top-Up DANA di Algoora :</strong></p>\r\n<ol>\r\n<li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>\r\n<li>Input nomer tujuan/hp di akun DANA anda.</li>\r\n<li>Pilih jumlah saldo DANA.</li>\r\n<li>Pilih metode pembayaran.</li>\r\n<li>Masukkan kode kupon (opsional).</li>\r\n<li>Klik \"Beli Sekarang.\"</li>\r\n</ol>', '2024-10-19 16:17:12', '2024-10-19 16:44:52'),
(7, 'shopee-pay', 3, 'SHOPEE PAY', 'PT Shopee International Indonesia', 'images/1729355071.png', '<p><strong>Langkah-langkah Top-Up ShopeePay di Algoora :</strong></p>\r\n<ol>\r\n<li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>\r\n<li>Input nomer tujuan/hp di akun ShopeePay anda.</li>\r\n<li>Pilih jumlah Saldo ShopeePay.</li>\r\n<li>Pilih metode pembayaran.</li>\r\n<li>Masukkan kode kupon (opsional).</li>\r\n<li>Klik \"Beli Sekarang.\"</li>\r\n</ol>', '2024-10-19 16:24:31', '2024-10-19 16:35:43'),
(8, 'ovo', 3, 'OVO', 'PT Visionet International', 'images/1729355359.jpg', '<p><strong>Langkah-langkah Top-Up OVO di Algoora :</strong></p>\r\n<ol>\r\n<li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>\r\n<li>Input nomer tujuan/hp di akun OVO anda.</li>\r\n<li>Pilih jumlah saldo OVO.</li>\r\n<li>Pilih metode pembayaran.</li>\r\n<li>Masukkan kode kupon (opsional).</li>\r\n<li>Klik \"Beli Sekarang.\"</li>\r\n</ol>', '2024-10-19 16:29:19', '2024-10-19 16:36:22'),
(9, 'grab', 3, 'GRAB', 'PT Grab Teknologi Indonesia', 'images/1729355489.png', '<p><strong>Langkah-langkah Top-Up GRAB di Algoora :</strong></p>\r\n<ol>\r\n<li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>\r\n<li>Input nomer tujuan/hp di akun GRAB anda.</li>\r\n<li>Pilih jumlah saldo GRAB.</li>\r\n<li>Pilih metode pembayaran.</li>\r\n<li>Masukkan kode kupon (opsional).</li>\r\n<li>Klik \"Beli Sekarang.\"</li>\r\n</ol>', '2024-10-19 16:31:29', '2024-10-19 16:37:13'),
(10, 'indosat', 4, 'INDOSAT', 'Indosat Ooredoo Hutchison', 'images/1729355606.png', '<p><strong>Langkah-langkah Top-Up pulsa Indosat di Algoora :</strong></p>\r\n<ol>\r\n<li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>\r\n<li>Input nomer tujuan/hp&nbsp; anda.</li>\r\n<li>Pilih jumlah pulsa Indosat.</li>\r\n<li>Pilih metode pembayaran.</li>\r\n<li>Masukkan kode kupon (opsional).</li>\r\n<li>Klik \"Beli Sekarang.\"</li>\r\n</ol>', '2024-10-19 16:33:26', '2024-10-19 16:38:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-10-19 16:11:46', '2024-10-19 16:11:46'),
(2, 'user', 'web', '2024-10-19 16:11:46', '2024-10-19 16:11:46'),
(3, 'guest', 'web', '2024-10-19 16:11:46', '2024-10-19 16:11:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('brZbYWRchrtvhEtrW7bkUy91Hbyt6u6TreMc0NEk', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMHRNQnZ6alR0MWN3dUJmTUw5SEVZVW9nTkhwRENYRnVyRlV1ZmRpdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6InN0YXRlIjtzOjQwOiJBbDVVZzA2NzZFVEJSQWdMVW1yRVZPeXpsTm1PeVVjWFVnb0o5MndOIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1729387821);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_pengguna` bigint UNSIGNED DEFAULT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_sku_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Created',
  `buyer_last_saldo` int DEFAULT NULL,
  `sn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'guest', 'guest@gmail.com', '2024-10-19 16:11:46', '$2y$12$TPO1EkDY4fCVJjHUbVC9i.fdKacgThd12cT7Y6gEjs0nU4zysctlK', 'YYLK6ADXDo', '2024-10-19 16:11:47', '2024-10-19 16:11:47'),
(2, 'admin', 'muhainun059@gmail.com', '2024-10-19 16:11:47', '$2y$12$Be6aoBS11bFXiCrrxN2Ryu0wLva.qtrYlQGRL17arT.lazt4eH.EK', 'OGWMpSlPbx', '2024-10-19 16:11:47', '2024-10-19 16:11:47'),
(3, 'user', 'muhainun058@gmail.com', '2024-10-19 16:11:47', '$2y$12$8hcDeG9Fg3C84G1O/ZSUiu/gbu/Md6rI9bdxnZE1vSdi.TG1CH93W', 'vfIMoACntV', '2024-10-19 16:11:48', '2024-10-19 16:11:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_image_foreign` (`image`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_item_id_foreign` (`item_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_product_id_foreign` (`product_id`),
  ADD KEY `items_image_foreign` (`image`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `populars`
--
ALTER TABLE `populars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `populars_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_kode_pengguna_foreign` (`kode_pengguna`),
  ADD KEY `transactions_invoice_id_foreign` (`invoice_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `populars`
--
ALTER TABLE `populars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_image_foreign` FOREIGN KEY (`image`) REFERENCES `files` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_image_foreign` FOREIGN KEY (`image`) REFERENCES `files` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `populars`
--
ALTER TABLE `populars`
  ADD CONSTRAINT `populars_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transactions_kode_pengguna_foreign` FOREIGN KEY (`kode_pengguna`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
