-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2025 at 03:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property1910032`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Parking', '2025-03-19 19:37:19', '2025-03-19 19:37:19'),
(3, 'Children\'s play area', '2025-03-19 19:37:30', '2025-03-19 19:37:30'),
(4, 'Study room', '2025-03-19 19:37:37', '2025-03-19 19:37:37'),
(5, 'Green space', '2025-03-19 19:37:43', '2025-03-19 19:37:43'),
(6, 'Air conditioning', '2025-03-19 19:37:48', '2025-03-19 19:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tags` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `title`, `slug`, `meta_description`, `description`, `image`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'Home Haven: Navigating the Real Estate Landscape', 'home-haven:-navigating-the-real-estate-landscape', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; line-height: 1.3; font-size: 23.68px; font-family: Inter, sans-serif; color: rgb(0, 0, 0); word-break: break-word; background-color: rgb(255, 255, 255);\">Why do we use it?</h4><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; line-height: 1.3; font-size: 23.68px; font-family: Inter, sans-serif; color: rgb(0, 0, 0); word-break: break-word; background-color: rgb(255, 255, 255);\">Where does it come from?</h4><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'application/public/upload/blog/1835251659374717.png', 'property,sell,buy', 1, '2025-06-18 01:39:32', '2025-06-18 01:39:32'),
(5, 1, 2, 'Investing in Tomorrow: The Ultimate Property Investment Blog', 'investing-in-tomorrow:-the-ultimate-property-investment-blog', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; line-height: 1.3; font-size: 23.68px; font-family: Inter, sans-serif; color: rgb(0, 0, 0); word-break: break-word; background-color: rgb(255, 255, 255);\">Why do we use it?</h4><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; line-height: 1.3; font-size: 23.68px; font-family: Inter, sans-serif; color: rgb(0, 0, 0); word-break: break-word; background-color: rgb(255, 255, 255);\">Where does it come from?</h4><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'application/public/upload/blog/1835251748069154.png', 'property,investing', 1, '2025-06-18 01:40:56', '2025-06-18 01:40:56'),
(6, 1, 3, 'Unlocking Real Estate Riches: A Property Enthusiast\'s Guide', 'unlocking-real-estate-riches:-a-property-enthusiast\'s-guide', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; line-height: 1.3; font-size: 23.68px; font-family: Inter, sans-serif; color: rgb(0, 0, 0); word-break: break-word; background-color: rgb(255, 255, 255);\">Why do we use it?</h4><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; line-height: 1.3; font-size: 23.68px; font-family: Inter, sans-serif; color: rgb(0, 0, 0); word-break: break-word; background-color: rgb(255, 255, 255);\">Where does it come from?</h4><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'application/public/upload/blog/1835251802395073.png', 'Property,guide', 1, '2025-06-18 01:41:48', '2025-06-18 01:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home improvement', 'home-improvement', NULL, 1, '2025-06-03 12:42:00', '2025-06-03 12:42:00'),
(2, 'Architecture', 'architecture', NULL, 1, '2025-06-03 12:46:00', '2025-06-03 12:46:00'),
(3, 'Tips and advice', 'tips-and-advice', NULL, 1, '2025-06-03 12:48:04', '2025-06-03 12:48:04'),
(4, 'Interior', 'interior', NULL, 1, '2025-06-03 12:48:16', '2025-06-03 12:48:16'),
(5, 'Real Estate', 'real-estate', NULL, 1, '2025-06-03 12:48:26', '2025-06-03 12:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `blog_id`, `parent_id`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, 'Test Subject', 'Test Message', '2025-06-18 08:26:58', NULL),
(2, 1, 5, NULL, 'Investing in Tomorrow:', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', '2025-06-18 08:34:27', NULL),
(3, 1, 5, 2, 'Thanks for wow', 'I will Contact with you', '2025-06-18 11:39:44', NULL),
(4, 1, 5, 1, NULL, 'Test Mesaage Reply', '2025-06-18 12:05:57', NULL),
(5, 1, 7, NULL, 'Order competition rate', 'NEW', '2025-10-04 12:23:59', NULL),
(6, 1, 7, 5, 'a', 'Nice', '2025-10-09 07:11:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compares`
--

INSERT INTO `compares` (`id`, `user_id`, `property_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2025-08-21 12:19:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Shahriar Hosen', 'sahariar4820@gmail.com', '01798066672', 'Order competition rate', 'b', '2025-10-06 06:08:08', NULL),
(2, 'Shahriar Hosen', 'sahariar480@gmail.com', '01854210867', 'Order competition rate', 'dd', '2025-10-09 06:47:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `facility_name` varchar(255) DEFAULT NULL,
  `distance` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `property_id`, `facility_name`, `distance`, `created_at`, `updated_at`) VALUES
(15, 6, 'SuperMarket', '0.5', '2025-03-20 07:56:09', '2025-03-20 07:56:09'),
(16, 6, 'Entertainment', '0.5', '2025-03-20 07:56:10', '2025-03-20 07:56:10'),
(17, 6, 'Pharmacy', '0.5', '2025-03-20 07:56:10', '2025-03-20 07:56:10'),
(18, 6, 'Beach', '0.5', '2025-03-20 07:56:10', '2025-03-20 07:56:10'),
(19, 6, 'Airport', '5', '2025-03-20 07:56:10', '2025-03-20 07:56:10'),
(20, 6, NULL, NULL, '2025-03-20 07:56:10', '2025-03-20 07:56:10'),
(26, 1, 'SuperMarket', '1', '2025-04-08 08:33:15', '2025-04-08 08:33:15'),
(27, 1, 'Bank', '1', '2025-04-08 08:33:15', '2025-04-08 08:33:15'),
(28, 1, 'Pharmacy', '0.5', '2025-04-08 08:33:15', '2025-04-08 08:33:15'),
(29, 1, 'Railways', '2', '2025-04-08 08:33:15', '2025-04-08 08:33:15'),
(30, 1, NULL, NULL, '2025-04-08 08:33:15', '2025-04-08 08:33:15'),
(31, 7, 'Railways', '1', '2025-05-29 14:43:16', '2025-05-29 14:43:16'),
(32, 7, 'School', '1', '2025-05-29 14:43:16', '2025-05-29 14:43:16'),
(33, 7, 'Bank', '1', '2025-05-29 14:43:16', '2025-05-29 14:43:16'),
(34, 7, 'Hospital', '1', '2025-05-29 14:43:16', '2025-05-29 14:43:16'),
(35, 7, NULL, NULL, '2025-05-29 14:43:16', '2025-05-29 14:43:16'),
(36, 8, 'Beach', '3', '2025-05-31 13:54:21', '2025-05-31 13:54:21'),
(37, 8, 'Hospital', '1', '2025-05-31 13:54:21', '2025-05-31 13:54:21'),
(38, 8, 'SuperMarket', '3', '2025-05-31 13:54:21', '2025-05-31 13:54:21'),
(39, 8, 'Mall', '1', '2025-05-31 13:54:21', '2025-05-31 13:54:21'),
(40, 8, 'Bus Stop', '1', '2025-05-31 13:54:21', '2025-05-31 13:54:21'),
(41, 8, NULL, NULL, '2025-05-31 13:54:21', '2025-05-31 13:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_20_092559_create_property_types_table', 1),
(6, '2024_09_20_181958_create_amenities_table', 1),
(7, '2024_09_21_063435_create_properties_table', 1),
(8, '2024_09_21_064719_create_multi_images_table', 1),
(9, '2024_09_21_065316_create_facilities_table', 1),
(10, '2024_10_02_192106_create_package_plans_table', 1),
(11, '2025_04_08_183010_create_wishlists_table', 2),
(12, '2025_04_10_175041_create_compares_table', 3),
(13, '2025_04_14_064615_create_property_messages_table', 4),
(14, '2025_05_31_130256_create_states_table', 5),
(15, '2025_06_01_170006_create_testimonials_table', 6),
(16, '2025_06_03_160230_create_blog_categories_table', 7),
(17, '2025_06_03_160240_create_blogs_table', 7),
(18, '2025_06_18_135309_create_comments_table', 8),
(19, '2025_06_19_131739_create_settings_table', 9),
(20, '2025_06_19_155344_create_permission_tables', 10),
(21, '2025_09_12_055034_create_contacts_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `property_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'application/public/upload/property/multi-img/1827076286259142.jpg', '2025-03-19 19:55:29', '2025-03-19 19:55:29'),
(2, 1, 'application/public/upload/property/multi-img/1827076287516114.jpg', '2025-03-19 19:55:30', '2025-03-19 19:55:30'),
(3, 1, 'application/public/upload/property/multi-img/1827076288949702.jpg', '2025-03-19 19:55:32', '2025-03-19 19:55:32'),
(12, 6, 'application/public/upload/property/multi-img/1827121621679200.jpg', '2025-03-20 07:56:07', '2025-03-20 07:56:07'),
(13, 6, 'application/public/upload/property/multi-img/1827121625627553.jpg', '2025-03-20 07:56:08', '2025-03-20 07:56:08'),
(14, 6, 'application/public/upload/property/multi-img/1827121626887994.jpg', '2025-03-20 07:56:09', '2025-03-20 07:56:09'),
(15, 7, 'application/public/upload/property/multi-img/1833489025046134.jpg', '2025-05-29 14:43:13', '2025-05-29 14:43:13'),
(16, 7, 'application/public/upload/property/multi-img/1833489025543371.jpg', '2025-05-29 14:43:13', '2025-05-29 14:43:13'),
(17, 7, 'application/public/upload/property/multi-img/1833489026552493.jpg', '2025-05-29 14:43:14', '2025-05-29 14:43:14'),
(18, 7, 'application/public/upload/property/multi-img/1833489027493170.jpg', '2025-05-29 14:43:16', '2025-05-29 14:43:16'),
(19, 8, 'application/public/upload/property/multi-img/1833667137165981.jpg', '2025-05-31 13:54:16', '2025-05-31 13:54:16'),
(20, 8, 'application/public/upload/property/multi-img/1833667140169827.jpg', '2025-05-31 13:54:17', '2025-05-31 13:54:17'),
(21, 8, 'application/public/upload/property/multi-img/1833667141017574.jpg', '2025-05-31 13:54:18', '2025-05-31 13:54:18'),
(22, 8, 'application/public/upload/property/multi-img/1833667142423411.jpg', '2025-05-31 13:54:20', '2025-05-31 13:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `package_plans`
--

CREATE TABLE `package_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `package_credits` varchar(255) DEFAULT NULL,
  `package_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_plans`
--

INSERT INTO `package_plans` (`id`, `user_id`, `package_name`, `invoice`, `package_credits`, `package_amount`, `created_at`, `updated_at`) VALUES
(1, 2, 'Buisness', 'PROPERTY37209468', '03', '20', '2025-03-20 04:08:10', '2025-03-20 04:08:10'),
(2, 2, 'Professional', 'PROPERTY85425233', '10', '50', '2025-03-20 04:20:31', '2025-03-20 04:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ptype_id` varchar(255) NOT NULL,
  `amenities_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `property_status` varchar(255) NOT NULL,
  `lower_price` varchar(255) DEFAULT NULL,
  `max_price` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `short_desc` text DEFAULT NULL,
  `long_desc` text DEFAULT NULL,
  `bedrooms` text DEFAULT NULL,
  `bathrooms` text DEFAULT NULL,
  `garage` varchar(255) DEFAULT NULL,
  `garage_size` varchar(255) DEFAULT NULL,
  `property_size` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `neightborhood` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `featured` varchar(255) DEFAULT NULL,
  `hot` varchar(255) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `ptype_id`, `amenities_id`, `name`, `slug`, `property_code`, `property_status`, `lower_price`, `max_price`, `thumbnail`, `short_desc`, `long_desc`, `bedrooms`, `bathrooms`, `garage`, `garage_size`, `property_size`, `video`, `address`, `city`, `state`, `postal_code`, `neightborhood`, `latitude`, `longitude`, `featured`, `hot`, `agent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '5,4,3,2', 'Sunflower Sanctuary', 'sunflower-sanctuary', 'PC001', 'for buy', '60000', '90000', 'application/public/upload/property/thumbnail/1827076284327581.jpg', 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Serene Haven Cottage:</span>&nbsp;Escape to this charming cottage nestled in the heart of nature. Enjoy the tranquility of surrounding meadows and the soothing sounds of a nearby stream. Perfect for those seeking a peaceful retreat.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Pine Ridge Retreat:</span>&nbsp;Embrace the rustic elegance of this retreat surrounded by towering pine trees. Relax on the spacious deck with panoramic views of the mountains. A cozy fireplace awaits you indoors for a perfect mountain getaway.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Sunset Vista Villa:</span>&nbsp;Experience breathtaking sunsets from the comfort of this luxurious villa. Panoramic windows offer unobstructed views of the horizon. Elegant design and modern amenities make this property a true haven.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Whispering Pines Estate:</span>&nbsp;Discover the grandeur of this estate adorned with majestic pines. Stroll through manicured gardens and relax in the shade of ancient trees. This property seamlessly blends natural beauty with timeless elegance.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Tranquil Meadows Manor:</span>&nbsp;Immerse yourself in the serenity of vast meadows surrounding this stately manor. Enjoy leisurely walks through lush gardens or unwind by the private pond. A retreat that combines luxury and nature.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Azure Waterside Residence:</span>&nbsp;Indulge in waterfront living at this contemporary residence. The azure waters provide a stunning backdrop for modern architecture and sleek design. A place where sophistication meets the tranquility of the sea.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Harmony Heights Homestead:</span>&nbsp;Perched atop a hill, this homestead offers panoramic views of the valley below. The landscape is a perfect harmony of rolling hills and picturesque woodlands. A haven for those seeking a balanced and peaceful lifestyle.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Mountain Majesty Mansion:</span>&nbsp;Marvel at the majestic mountains surrounding this opulent mansion. Expansive windows showcase the beauty of nature, while luxurious interiors provide a regal retreat. Experience mountain living at its finest.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Oasis View Bungalow:</span>&nbsp;Escape to an oasis of comfort with stunning views from every angle. The well-manicured garden and private pool create a retreat within a retreat. A bungalow designed for relaxation and rejuvenation.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: hsl(var(--dark)/0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Enchanted Grove Chalet:</span>&nbsp;Step into an enchanted grove surrounding this cozy chalet. The charm of the woods meets modern comforts, creating a magical atmosphere. Perfect for those seeking a fairytale escape.</p>', '8', '8', '4', '132', '1200', 'https://www.youtube.com/embed/dasly3VNOac?si=7vjnPtuBowkGljkk', 'Tokyo Prefecture', 'Tokyo Prefecture', '12', '1229', 'Mirpur', '15.183598', '15.183598', '1', '1', 5, '1', '2025-03-19 19:55:28', '2025-03-19 19:55:28'),
(6, '1', '5,3,2,1', 'Luxury Apartments on California', 'luxury-apartments-on-california', 'PC006', 'for buy', '70000', '70000', 'application/public/upload/property/thumbnail/1827121617840277.jpg', 'Built with love and hard work, for travelers who love nature and need some peace and tranquil. Our heartfelt  .', '<p><span style=\"color: rgba(8, 8, 8, 0.6); font-family: Inter, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">Built with love and hard work, for travelers who love nature and need some peace and tranquil. Our heartfelt endeavor has been to curate and create this one of a kind place in Kalimpong that exudes a vibe of hope and cheer .It is our aspiration to have guests experience the beauty of Kalimpong from a place that feels like home as well as a retreat. also the leap into electronic typesetting, remaining essentially unchanged. It was with the release of Letraset sheets containing Lorem Ipsum passages, and more</span></p>', '12', '12', '12', '200', '400', 'https://www.youtube.com/embed/dasly3VNOac?si=7vjnPtuBowkGljkk', 'David\'s Tea House', 'Mabalacat, Angeles', '13', '1212', 'Philippines', '15.183598', '120.586861', '1', NULL, 2, '1', '2025-03-20 07:56:03', '2025-03-20 07:56:03'),
(7, '1', '6,4,2,1', 'Tranquil Haven Retreat', 'tranquil-haven-retreat', 'PC007', 'for buy', '6500', '7000', 'application/public/upload/property/thumbnail/1833489023386969.jpg', 'Step into an enchanted grove surrounding this cozy chalet. The charm of the woods meets modern comforts.', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Serene Haven Cottage:</span>&nbsp;Escape to this charming cottage nestled in the heart of nature. Enjoy the tranquility of surrounding meadows and the soothing sounds of a nearby stream. Perfect for those seeking a peaceful retreat.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Pine Ridge Retreat:</span>&nbsp;Embrace the rustic elegance of this retreat surrounded by towering pine trees. Relax on the spacious deck with panoramic views of the mountains. A cozy fireplace awaits you indoors for a perfect mountain getaway.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Sunset Vista Villa:</span>&nbsp;Experience breathtaking sunsets from the comfort of this luxurious villa. Panoramic windows offer unobstructed views of the horizon. Elegant design and modern amenities make this property a true haven.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Whispering Pines Estate:</span>&nbsp;Discover the grandeur of this estate adorned with majestic pines. Stroll through manicured gardens and relax in the shade of ancient trees. This property seamlessly blends natural beauty with timeless elegance.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Tranquil Meadows Manor:</span>&nbsp;Immerse yourself in the serenity of vast meadows surrounding this stately manor. Enjoy leisurely walks through lush gardens or unwind by the private pond. A retreat that combines luxury and nature.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Azure Waterside Residence:</span>&nbsp;Indulge in waterfront living at this contemporary residence. The azure waters provide a stunning backdrop for modern architecture and sleek design. A place where sophistication meets the tranquility of the sea.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Harmony Heights Homestead:</span>&nbsp;Perched atop a hill, this homestead offers panoramic views of the valley below. The landscape is a perfect harmony of rolling hills and picturesque woodlands. A haven for those seeking a balanced and peaceful lifestyle.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Mountain Majesty Mansion:</span>&nbsp;Marvel at the majestic mountains surrounding this opulent mansion. Expansive windows showcase the beauty of nature, while luxurious interiors provide a regal retreat. Experience mountain living at its finest.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Oasis View Bungalow:</span>&nbsp;Escape to an oasis of comfort with stunning views from every angle. The well-manicured garden and private pool create a retreat within a retreat. A bungalow designed for relaxation and rejuvenation.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Enchanted Grove Chalet:</span>&nbsp;Step into an enchanted grove surrounding this cozy chalet. The charm of the woods meets modern comforts, creating a magical atmosphere. Perfect for those seeking a fairytale escape.</p>', '5', '5', '5', '132', '1200', 'https://www.youtube.com/watch?v=yGeJ1X8SnOg&ab_channel=GTMA', 'Thailandia', 'Mueang Krabi', '14', '6643', 'Los Angles', '15.183598', '15.183598', '1', '1', 5, '1', '2025-05-29 14:43:12', '2025-05-29 14:43:12'),
(8, '1', '6,5,4,2,1', 'Serene Haven Cottage', 'serene-haven-cottage', 'PC008', 'for rent', '60000', '90000', 'application/public/upload/property/thumbnail/1833667135459771.jpg', 'Azure Waterside Residence: Indulge in waterfront living at this contemporary residence. The azure waters provide a stunning backdrop for modern architecture and sleek design. A place where sophistication meets the tranquility of the sea.', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Serene Haven Cottage:</span>&nbsp;Escape to this charming cottage nestled in the heart of nature. Enjoy the tranquility of surrounding meadows and the soothing sounds of a nearby stream. Perfect for those seeking a peaceful retreat.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Pine Ridge Retreat:</span>&nbsp;Embrace the rustic elegance of this retreat surrounded by towering pine trees. Relax on the spacious deck with panoramic views of the mountains. A cozy fireplace awaits you indoors for a perfect mountain getaway.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Sunset Vista Villa:</span>&nbsp;Experience breathtaking sunsets from the comfort of this luxurious villa. Panoramic windows offer unobstructed views of the horizon. Elegant design and modern amenities make this property a true haven.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Whispering Pines Estate:</span>&nbsp;Discover the grandeur of this estate adorned with majestic pines. Stroll through manicured gardens and relax in the shade of ancient trees. This property seamlessly blends natural beauty with timeless elegance.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Tranquil Meadows Manor:</span>&nbsp;Immerse yourself in the serenity of vast meadows surrounding this stately manor. Enjoy leisurely walks through lush gardens or unwind by the private pond. A retreat that combines luxury and nature.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Azure Waterside Residence:</span>&nbsp;Indulge in waterfront living at this contemporary residence. The azure waters provide a stunning backdrop for modern architecture and sleek design. A place where sophistication meets the tranquility of the sea.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Harmony Heights Homestead:</span>&nbsp;Perched atop a hill, this homestead offers panoramic views of the valley below. The landscape is a perfect harmony of rolling hills and picturesque woodlands. A haven for those seeking a balanced and peaceful lifestyle.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Mountain Majesty Mansion:</span>&nbsp;Marvel at the majestic mountains surrounding this opulent mansion. Expansive windows showcase the beauty of nature, while luxurious interiors provide a regal retreat. Experience mountain living at its finest.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Oasis View Bungalow:</span>&nbsp;Escape to an oasis of comfort with stunning views from every angle. The well-manicured garden and private pool create a retreat within a retreat. A bungalow designed for relaxation and rejuvenation.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: Inter, sans-serif; font-size: 16px; word-break: break-word; color: rgba(8, 8, 8, 0.6); line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-weight: bolder;\">Enchanted Grove Chalet:</span>&nbsp;Step into an enchanted grove surrounding this cozy chalet. The charm of the woods meets modern comforts, creating a magical atmosphere. Perfect for those seeking a fairytale escape.</p>', '8', '6', '8', '132', '1200', 'https://www.youtube.com/watch?v=dasly3VNOac&ab_channel=LearnOnlineVideo', 'La Plăcinte', 'Chișinău', '15', '1229', 'Chișinău', '34.052235', '-118.243683', '1', '1', 9, '1', '2025-05-31 13:54:13', '2025-05-31 13:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `property_messages`
--

CREATE TABLE `property_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `agent_id` varchar(255) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_messages`
--

INSERT INTO `property_messages` (`id`, `user_id`, `agent_id`, `property_id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(3, 2, '2', 6, 'Agent', 'agent@gmail.com', '030 3057 1965', 'Hey,,test message', '2025-05-29 02:19:08', NULL),
(4, 3, '', 1, 'Robert Fred', 'user@gmail.com', '765-934-8683', 'I will buy this property', '2025-05-29 06:16:17', NULL),
(10, 4, '2', 6, 'atik', 'atik@gmail.com', '13234354', 'Please contact...', '2025-05-29 06:49:58', NULL),
(11, 3, '5', NULL, 'Robert Fred', 'user@gmail.com', '765-934-8683', 'Hey..Test Message', '2025-05-30 09:16:36', NULL),
(12, 1, '2', 10, 'Adminhi', 'admin@gmail.com', '030 3057 1965', 'heloo', '2025-09-13 07:33:34', NULL),
(13, 3, '5', 1, 'Robert Fred', 'user@gmail.com', 'fhh', 'hg', '2025-10-05 22:37:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `type_name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Appertment', 'icon-1', '2025-03-19 19:38:28', '2025-03-20 05:47:52'),
(2, 'Commercial', 'icon-2', '2025-03-20 05:08:14', '2025-03-20 05:51:43'),
(3, 'Residential', 'icon-3', '2025-03-20 05:08:23', '2025-03-20 05:51:52'),
(4, 'Industrial', 'icon-4', '2025-03-20 05:08:31', '2025-03-20 05:52:03'),
(5, 'Building Code', 'fas fa-align-center', '2025-03-20 05:08:43', '2025-03-20 05:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(12, 'Los Angeles', 'application/public/upload/property/thumbnail/1833662831159934.jpg', '2025-05-31 12:45:47', '2025-05-31 12:45:47'),
(13, 'San Francisco', 'application/public/upload/property/thumbnail/1833662840216783.jpg', '2025-05-31 12:45:57', '2025-05-31 12:45:57'),
(14, 'Las Vegas', 'application/public/upload/property/thumbnail/1833662851343491.jpg', '2025-05-31 12:46:08', '2025-05-31 12:46:08'),
(15, 'New York City', 'application/public/upload/property/thumbnail/1833662860340710.jpg', '2025-05-31 12:46:16', '2025-05-31 12:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desination` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `desination`, `image`, `short_desc`, `created_at`, `updated_at`) VALUES
(1, 'Robert Fred', 'Senior', 'application/public/upload/property/thumbnail/1833750963115431.jpg', 'Property is a term describing anything that a person or a business has legal title over, affording owners certain enforceable rights over said items. T', '2025-06-01 12:06:37', '2025-06-02 09:10:55'),
(3, 'Michael Johnson', 'CTO, SiliconSpark Inc. (California, USA)', 'application/public/upload/property/thumbnail/1833923168676521.jpg', 'The team delivered exactly what we needed. Their technical skills and communication were top-notch throughout the project', '2025-06-03 09:43:47', '2025-06-03 09:43:47'),
(4, 'Jessica Lee', 'Head of Product, Nova Retail (New York, USA)', 'application/public/upload/property/thumbnail/1833923199201497.jpg', 'Professional, fast, and reliable. We saw a 30% improvement in user engagement after working with them.', '2025-06-03 09:44:15', '2025-06-03 09:44:15'),
(5, 'David Miller', 'Operations Manager, FinLogic Solutions (Texas, USA)', 'application/public/upload/property/thumbnail/1833923238614817.jpg', 'They understood our business goals clearly and translated them into a high-performing web solution.', '2025-06-03 09:44:52', '2025-06-03 09:44:52'),
(6, 'Ashley Thompson', 'Co-founder, GreenNest Living (Oregon, USA)', 'application/public/upload/property/thumbnail/1833923270168493.jpg', 'Working with them was seamless. From UI design to backend integration, everything was spot-on.', '2025-06-03 09:45:22', '2025-06-03 09:45:22'),
(7, 'Olivia Martinez', 'Founder & CEO, SkyBound Travel (Chicago, USA)', 'application/public/upload/property/thumbnail/1833923325080583.jpg', 'Amazing work ethic and dedication. They transformed our vision into a fully functional, scalable platform.', '2025-06-03 09:46:16', '2025-06-03 09:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` enum('admin','agent','user') NOT NULL DEFAULT 'user',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `credit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `image`, `phone`, `address`, `role`, `status`, `credit`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$jGPz3UpAc/14zsFrU3HpA.D6B3ltrL37aZcVt/chwqmncU1yCRuxa', '202510091301Sahariar19.png', '030 3057 1965', '84 St. John Wood High Street, St Johns Wood', 'admin', '1', 0.00, NULL, NULL, '2025-10-09 07:01:53'),
(2, 'Agent', 'agent', 'agent@gmail.com', NULL, '$2y$12$jeSBy/hvFA.FCB1a2OfxuOVT4/zEkOl.iLUmjBdmiL2N.6BE3zZPu', '202505291539jpg', '030 3057 1965', '84 St. John Wood High Street, St Johns Wood', 'agent', '1', 18.00, NULL, NULL, '2025-09-13 06:55:47'),
(3, 'Robert Fred', 'user', 'user@gmail.com', NULL, '$2y$12$EJqJRN3TtazZpsgc6MGDXOQLc3G7evmp5a99qqwKBDnW5YakgiXoK', '202510060435Pet_Supplys_Banner.webp', '765-934-86834', 'Van Buren, Indiana, United States', 'user', '1', 0.00, NULL, NULL, '2025-10-05 22:35:14'),
(4, 'atik', NULL, 'atik@gmail.com', NULL, '$2y$12$nMQwv2yEvAtmwh8WCjGq5ugQ3LR7EhaVna46MMPnxpDP17l/rGYQ2', NULL, '13234354', NULL, 'user', '1', 0.00, NULL, '2025-05-29 06:48:30', '2025-05-29 06:48:30'),
(5, 'Jessica Miller', 'jessica', 'jessica.miller@calihomes.com', NULL, '$2y$12$r3FNuInJ9KGhgmc6x/5VReI5eYRAeef6iGxlgfhZ9org9jcjGfXnK', '202505291539jpg', '+1 (213) 555-0123', 'Cali Homes Realty', 'agent', '1', 0.00, NULL, '2025-05-29 09:31:50', '2025-05-29 09:39:48'),
(6, 'David Thompson', 'David', 'd.thompson@texashousehunters.com', NULL, '$2y$12$hvRBzdkci6PMFYFCUwyPGea.vl21R3B945/fD0CIA5XlDhvRHVFXi', '202505291540jpg', '+1 (512) 555-0198', 'Austin, Texas', 'agent', '1', 0.00, NULL, '2025-05-29 09:32:37', '2025-05-29 09:40:54'),
(7, 'Sophia Rodriguez', 'Sophia', 'sophia@miamilux.com', NULL, '$2y$12$o.HwDp5dsuUqq1Sbumvq5uVloGoCdoh2J.5G5biC0I8gAkG2bt2Cy', '202505291542jpg', '+1 (305) 555-0345', 'Miami, Florida', 'agent', '1', 0.00, NULL, '2025-05-29 09:33:18', '2025-05-29 09:42:12'),
(8, 'Michael Chen', 'Michael', 'michael.chen@gmail.com', NULL, '$2y$12$Y.4WXOFbbqnBcDLloZorBe.OzNqxaZFZlnbtzqvk8URDzDt1iR4z6', '202505291543jpg', '+1 (206) 555-0771', 'Seattle, Washington', 'agent', '1', 0.00, NULL, '2025-05-29 09:34:27', '2025-05-29 09:43:08'),
(9, 'Emily Johnson', 'Emily', 'emily.j@nycmetrorealty.com', NULL, '$2y$12$Wc7lOuOX1XoL3bd0ZL1XHet60mW/93Lng8YM5GUncaXoiCj9Prdvi', '202505291544jpg', '+1 (646) 555-0246', 'New York City, New York', 'agent', '0', 0.00, NULL, '2025-05-29 09:35:13', '2025-10-04 12:24:44'),
(14, 'sahariar480@gmail.com', NULL, 'sahariar480@gmail.com', NULL, '$2y$12$HaZkTmYFoceMqfmOWdHcsupD4St59Wy5Gd5Dm1a1FoTRb/WEvDxdG', NULL, NULL, NULL, 'user', '1', 0.00, NULL, '2025-10-09 07:13:53', '2025-10-09 07:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_plans`
--
ALTER TABLE `package_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_messages`
--
ALTER TABLE `property_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `package_plans`
--
ALTER TABLE `package_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property_messages`
--
ALTER TABLE `property_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

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
