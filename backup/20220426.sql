-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 10:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seven_sanabil_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `national_id` int(11) NOT NULL,
  `family_member` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `committee_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `name`, `phone`, `national_id`, `family_member`, `income`, `created_at`, `updated_at`, `deleted_at`, `committee_id`) VALUES
(1, 'المستفيد الأول', 599912345, 405901234, 8, 2500, '2022-03-06 16:58:01', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `benefit_categories`
--

CREATE TABLE `benefit_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `benefit_request_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benefit_requests`
--

CREATE TABLE `benefit_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `required_quantity` int(11) NOT NULL,
  `remaining_quantity` int(11) NOT NULL,
  `amount_spent` int(11) NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `donation_request_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefit_requests`
--

INSERT INTO `benefit_requests` (`id`, `title`, `status`, `image`, `description`, `quantity`, `required_quantity`, `remaining_quantity`, `amount_spent`, `beneficiary_id`, `created_at`, `updated_at`, `deleted_at`, `donation_request_id`) VALUES
(1, 'ملابس للاطفال', 2, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec tempor elit. Quisque iaculis ligula eget ex cursus volutpat sed aliquet lorem. Mauris ornare fermentum ultrices. Aliquam ut leo rhoncus leo aliquet feugiat. Fusce tempus dapibus elit vel condimentum. Fusce velit ipsum, pretium pharetra imperdiet tempor, lobortis nec tellus. Cras tincidunt metus eu lacinia dictum. Pellentesque vel volutpat libero.', 3, 0, 0, 3, 1, NULL, '2022-04-26 04:58:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `name`, `location`, `manager`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'لجنة زكاة رقم 1', 'غزة-تل الهوا', 'احمد', 'لجنة زكاة رقم 1', NULL, NULL, NULL),
(2, 'لجنة12', 'تل الهواا', 'علي', 'لجنة زكاة رقم 2', NULL, NULL, NULL),
(3, 'لجنة زكاة 3', 'الزيتون', 'Ahmad', 'لجنة زكاة رقم3', NULL, NULL, NULL),
(4, 'لجنة زكاة2', 'الزيتون', 'محمد', 'لجنة زكاة رقم 2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donation_categories`
--

CREATE TABLE `donation_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donation_request_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation_requests`
--

CREATE TABLE `donation_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `available_quantity` int(11) NOT NULL,
  `donor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_requests`
--

INSERT INTO `donation_requests` (`id`, `title`, `status`, `image`, `description`, `quantity`, `available_quantity`, `donor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ملابس أطفال', '2', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec tempor elit. Quisque iaculis ligula eget ex cursus volutpat sed aliquet lorem. Mauris ornare fermentum ultrices. Aliquam ut leo rhoncus leo aliquet feugiat. Fusce tempus dapibus elit vel condimentum. Fusce velit ipsum, pretium pharetra imperdiet tempor, lobortis nec tellus. Cras tincidunt metus eu lacinia dictum. Pellentesque vel volutpat libero.', 5, 5, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` int(11) NOT NULL,
  `national_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `committee_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `phone`, `national_id`, `deleted_at`, `created_at`, `updated_at`, `name`, `status`, `committee_id`) VALUES
(1, 592797156, 222222222, NULL, NULL, NULL, 'متبرع2', 2, NULL),
(2, 592797156, 648454544, NULL, NULL, '2022-04-05 15:16:03', 'donor2', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_02_11_093640_create_sessions_table', 1),
(7, '2022_02_13_121528_create_permission_tables', 1),
(8, '2022_02_20_163654_create_beneficiaries_table', 1),
(9, '2022_02_20_164703_create_benefit_requests_table', 1),
(10, '2022_02_20_164851_create_categories_table', 1),
(11, '2022_02_20_165154_create_committees_table', 1),
(12, '2022_02_20_170452_create_donors_table', 1),
(13, '2022_02_20_173834_create_user_levels_table', 1),
(14, '2022_02_20_181607_create_benefit_categories_table', 1),
(15, '2022_02_20_181759_create_donation_requests_table', 1),
(16, '2022_02_20_182524_create_donation_categories_table', 1),
(17, '2022_02_20_182546_create_quantities_spent_table', 1),
(18, '2022_02_22_122504_add_three_foreign_key_column_in_users_table', 1),
(19, '2022_02_22_123209_add_three_foreign_key_column_in_roles_table', 1),
(20, '2022_03_03_091053_add_deleted_at_column_on_users_table', 1),
(21, '2022_03_18_145008_add_two_column_in_donors_table', 2),
(22, '2022_04_06_080547_add_location_column_on_beneficiaries_table', 3),
(23, '2022_04_06_081214_add_foreign_key_column_on_beneficiaries_table', 4),
(24, '2022_04_12_114543_change_status_column_on_benefit_requests_table', 5),
(25, '2022_04_12_115215_add_foreign_key_column_on_benefit_requests_table', 5),
(26, ' 2022_04_11_210438_add_committee_id_column_as_forign_key_in_donors_table', 5),
(27, '2022_04_11_210438_add_committee_id_column_as_forign_key_in_donors_table', 6),
(28, '2022_04_25_202156_add_foreign_key_column_on_permission_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_level_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `user_level_id`) VALUES
(1, 'Create Role', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 1),
(2, 'Edit Role', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 1),
(3, 'View Roles', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 1),
(4, 'Disable Role', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 1),
(5, 'Activate Role', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 1),
(6, 'Create User', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 3),
(7, 'Edit User', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 3),
(8, 'View Users', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 3),
(9, 'Disable User', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 3),
(10, 'Activate User', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 3),
(11, 'Create Committee', 'web', '2022-04-05 11:45:54', '2022-04-05 11:45:54', 1),
(12, 'Edit Committee', 'web', '2022-04-05 11:45:54', '2022-04-05 11:45:54', 1),
(13, 'View Committees', 'web', '2022-04-05 11:45:54', '2022-04-05 11:45:54', 1),
(14, 'Disable Committee', 'web', '2022-04-05 11:45:55', '2022-04-05 11:45:55', 1),
(15, 'Activate Committee', 'web', '2022-04-05 11:45:55', '2022-04-05 11:45:55', 1),
(16, 'Create Donor', 'web', '2022-04-05 11:53:05', '2022-04-05 11:53:05', 2),
(17, 'Edit Donor', 'web', '2022-04-05 11:53:05', '2022-04-05 11:53:05', 2),
(18, 'View Donors', 'web', '2022-04-05 11:53:05', '2022-04-05 11:53:05', 2),
(19, 'Reject Donor', 'web', '2022-04-05 11:53:05', '2022-04-05 11:53:05', 2),
(20, 'Approve Donor', 'web', '2022-04-05 11:53:05', '2022-04-05 11:53:05', 2),
(22, 'View Categories', 'web', '2022-04-06 04:50:24', '2022-04-06 04:50:24', 2),
(23, 'Create Category', 'web', '2022-04-06 04:50:24', '2022-04-06 04:50:24', 2),
(24, 'Edit Category', 'web', '2022-04-06 04:50:24', '2022-04-06 04:50:24', 2),
(25, 'Disable Category', 'web', '2022-04-06 04:50:24', '2022-04-06 04:50:24', 2),
(26, 'Activate Category', 'web', '2022-04-06 04:50:24', '2022-04-06 04:50:24', 2),
(27, 'View Beneficiaries', 'web', '2022-04-06 05:01:41', '2022-04-06 05:01:41', 2),
(28, 'Edit Beneficiary', 'web', '2022-04-06 09:09:12', '2022-04-06 09:09:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quantities_spent`
--

CREATE TABLE `quantities_spent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donation_request_id` bigint(20) UNSIGNED NOT NULL,
  `benefit_request_id` bigint(20) UNSIGNED NOT NULL,
  `amount_spent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `committee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donor_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `user_level_id`, `committee_id`, `donor_id`) VALUES
(1, 'superadmin', 'web', '2022-03-03 07:21:43', '2022-03-03 07:21:43', 1, NULL, NULL),
(7, 'committee', 'web', '2022-04-05 11:45:54', '2022-04-05 11:45:54', 2, NULL, NULL),
(8, 'donor', 'web', '2022-04-05 11:53:04', '2022-04-05 11:53:04', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
(6, 7),
(6, 8),
(7, 1),
(7, 7),
(8, 1),
(8, 7),
(8, 8),
(9, 1),
(10, 1),
(11, 1),
(11, 7),
(12, 1),
(12, 7),
(13, 1),
(13, 7),
(14, 1),
(14, 7),
(15, 1),
(15, 7),
(16, 1),
(16, 7),
(16, 8),
(17, 1),
(17, 7),
(17, 8),
(18, 1),
(18, 7),
(18, 8),
(19, 1),
(19, 7),
(19, 8),
(20, 1),
(20, 7),
(20, 8),
(22, 1),
(22, 7),
(23, 1),
(23, 7),
(24, 1),
(24, 7),
(25, 1),
(25, 7),
(26, 1),
(26, 7),
(27, 1),
(27, 7),
(28, 1),
(28, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5Sj9fQf614V6TURB9eU9gDyXTyHhHwZ9wxEKnaxf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZmN0elJielJHcHdRdURhaEloSWJwQlNTMEpnZEVRVTk4M3M1c1g3cyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQwZkZ6MmtmNkRwN05qU0VWa2dYUEwuV2ZlLlRrbkgxaVZSVXladWZhVWpyNk9TT05YQnVvdSI7fQ==', 1650960031);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `committee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `user_level_id`, `committee_id`, `donor_id`, `deleted_at`) VALUES
(1, 'أدمن', 'admin@gmail.com', NULL, '$2y$10$0fFz2kf6Dp7NjSEVkgXPL.Wfe.TknH1iVRUyZufaUjr6OSONXBuou', NULL, NULL, NULL, NULL, NULL, '2022-03-03 07:22:14', '2022-03-03 07:22:14', 1, NULL, NULL, NULL),
(4, 'لجنة زكاة', 'committee@gmail.com', NULL, '$2y$10$/Vvu1oxxPibiyDaSox/FjeFvdyjHVT8mRwvcDiS5F1L4u8eGygw/S', NULL, NULL, NULL, NULL, 'uploads/images/1857162499.png', '2022-03-06 15:21:32', '2022-03-06 15:21:32', 2, 3, NULL, NULL),
(5, 'متبرع', 'donor@gmail.com', NULL, '$2y$10$0UoZkeMQvPUPMwf4b050N.pd0agX2X/UqZQ9B9sfgD9OPAgOXdkVq', NULL, NULL, NULL, NULL, 'uploads/images/2157601692.png', '2022-03-06 16:58:01', '2022-03-06 16:58:01', 3, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `name`) VALUES
(1, 'أدمن'),
(2, 'لجنة زكاة'),
(3, 'متبرع');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beneficiaries_national_id_unique` (`national_id`),
  ADD KEY `beneficiaries_committee_id_foreign` (`committee_id`);

--
-- Indexes for table `benefit_categories`
--
ALTER TABLE `benefit_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `benefit_categories_benefit_request_id_foreign` (`benefit_request_id`),
  ADD KEY `benefit_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `benefit_requests`
--
ALTER TABLE `benefit_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `benefit_requests_beneficiary_id_foreign` (`beneficiary_id`),
  ADD KEY `benefit_requests_donation_request_id_foreign` (`donation_request_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_categories`
--
ALTER TABLE `donation_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_categories_donation_request_id_foreign` (`donation_request_id`),
  ADD KEY `donation_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_requests_donor_id_foreign` (`donor_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donors_national_id_unique` (`national_id`),
  ADD KEY `donors_committee_id_foreign` (`committee_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  ADD KEY `permissions_user_level_id_foreign` (`user_level_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quantities_spent`
--
ALTER TABLE `quantities_spent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quantities_spent_donation_request_id_foreign` (`donation_request_id`),
  ADD KEY `quantities_spent_benefit_request_id_foreign` (`benefit_request_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`),
  ADD KEY `roles_user_level_id_foreign` (`user_level_id`),
  ADD KEY `roles_committee_id_foreign` (`committee_id`),
  ADD KEY `roles_donor_id_foreign` (`donor_id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_level_id_foreign` (`user_level_id`),
  ADD KEY `users_committee_id_foreign` (`committee_id`),
  ADD KEY `users_donor_id_foreign` (`donor_id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benefit_categories`
--
ALTER TABLE `benefit_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `benefit_requests`
--
ALTER TABLE `benefit_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donation_categories`
--
ALTER TABLE `donation_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation_requests`
--
ALTER TABLE `donation_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quantities_spent`
--
ALTER TABLE `quantities_spent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD CONSTRAINT `beneficiaries_committee_id_foreign` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `benefit_categories`
--
ALTER TABLE `benefit_categories`
  ADD CONSTRAINT `benefit_categories_benefit_request_id_foreign` FOREIGN KEY (`benefit_request_id`) REFERENCES `benefit_requests` (`id`),
  ADD CONSTRAINT `benefit_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `benefit_requests`
--
ALTER TABLE `benefit_requests`
  ADD CONSTRAINT `benefit_requests_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`),
  ADD CONSTRAINT `benefit_requests_donation_request_id_foreign` FOREIGN KEY (`donation_request_id`) REFERENCES `donation_requests` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `donation_categories`
--
ALTER TABLE `donation_categories`
  ADD CONSTRAINT `donation_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `donation_categories_donation_request_id_foreign` FOREIGN KEY (`donation_request_id`) REFERENCES `donation_requests` (`id`);

--
-- Constraints for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD CONSTRAINT `donation_requests_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`);

--
-- Constraints for table `donors`
--
ALTER TABLE `donors`
  ADD CONSTRAINT `donors_committee_id_foreign` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_user_level_id_foreign` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `quantities_spent`
--
ALTER TABLE `quantities_spent`
  ADD CONSTRAINT `quantities_spent_benefit_request_id_foreign` FOREIGN KEY (`benefit_request_id`) REFERENCES `benefit_requests` (`id`),
  ADD CONSTRAINT `quantities_spent_donation_request_id_foreign` FOREIGN KEY (`donation_request_id`) REFERENCES `donation_requests` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_committee_id_foreign` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `roles_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `roles_user_level_id_foreign` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_committee_id_foreign` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_user_level_id_foreign` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
