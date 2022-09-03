-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 12:22 PM
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
(1, 'محمد سعيد', 599912345, 405901234, 8, 2500, '2022-03-06 14:58:01', '2022-06-20 17:34:51', NULL, 2),
(2, 'مؤمن رجب', 592219081, 23456987, 5, 400, '2022-06-20 17:34:48', '2022-06-20 17:34:56', NULL, 4),
(3, 'مصطفى صلاح', 597789654, 789632145, 10, 1200, '2022-06-20 17:34:54', '2022-06-20 17:34:58', NULL, 3),
(4, 'محمد أحمد', 597864231, 785412369, 8, 650, '2022-06-20 17:35:00', '2022-06-20 17:35:02', NULL, 1),
(5, 'عمر منذر', 596321478, 852321654, 15, 1200, '2022-06-20 17:35:04', '2022-06-20 17:35:06', NULL, 5),
(6, 'يحيى محمد', 599602050, 407851234, 8, 2500, '2022-03-06 14:58:01', '2022-06-20 17:34:51', NULL, 2),
(7, 'مازن صبري', 599753186, 23485467, 15, 600, '2022-06-20 17:34:48', '2022-06-20 17:34:56', NULL, 4),
(8, 'عبد الله حسن', 597964754, 775328145, 10, 1200, '2022-06-20 17:34:54', '2022-06-20 17:34:58', NULL, 3),
(9, 'عثمان عدنان', 598364231, 785489654, 8, 650, '2022-06-20 17:35:00', '2022-06-20 17:35:02', NULL, 1),
(10, 'سامي شعبان', 599921478, 852852654, 15, 1200, '2022-06-20 17:35:04', '2022-06-20 17:35:06', NULL, 5),
(11, 'مستفيد', 599178965, 785463219, 8, 600, NULL, NULL, NULL, 1);

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

--
-- Dumping data for table `benefit_categories`
--

INSERT INTO `benefit_categories` (`id`, `benefit_request_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `benefit_requests`
--

CREATE TABLE `benefit_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `benefit_requests` (`id`, `title`, `status`, `description`, `required_quantity`, `remaining_quantity`, `amount_spent`, `beneficiary_id`, `created_at`, `updated_at`, `deleted_at`, `donation_request_id`) VALUES
(1, 'ملابس للاطفال', 3, 'أحتاج ملابس لاطفالي الثلاثة عمر (5، 7، 2) ', 3, 0, 3, 1, NULL, '2022-06-21 07:44:07', NULL, 1),
(2, 'ملابس حريمي', 3, 'احتاج لاي نوع من الملابس لزوجتي بعمر 45 سنة وقياسها XXL', 5, 2, 3, 2, '2022-06-18 18:03:47', '2022-06-28 05:39:39', NULL, 3),
(3, 'ملابس أطفال', 3, 'بحاجة لملابس لاطفالي العشرة لا يوجد لديهم ملابس جيدة كلها تالفة الاعمار ما بين (2 - 12)', 10, 8, 2, 3, '2022-06-18 18:22:48', '2022-06-30 16:27:13', NULL, 1),
(6, 'ملابس', 2, 'ملابس متنوعة من بلايز نص كم وكم وبلاطين لكلا الجنسين', 5, 5, 0, 11, '2022-06-30 16:34:11', '2022-06-30 16:34:11', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `image`, `parent_id`) VALUES
(2, 'ملابس', '2022-05-06 17:26:02', '2022-06-14 13:54:39', NULL, 'uploads/images/categories/6419369156.jpg', NULL),
(3, 'أثاث', NULL, '2022-06-14 13:54:18', NULL, 'uploads/images/categories/5387702591.jpg', NULL),
(4, 'أدوات كهربائية', NULL, '2022-06-14 13:54:03', NULL, 'uploads/images/categories/9847921458.jpg', NULL),
(5, 'حقائب', '2022-06-15 06:27:49', '2022-06-15 06:27:49', NULL, 'uploads/images/categories/10334463243.jpg', NULL),
(6, 'أحذية', '2022-06-20 12:54:21', '2022-06-20 12:54:21', NULL, 'uploads/images/categories/9047706343.jpg', 2),
(7, 'كنب', '2022-06-20 13:04:50', '2022-06-20 13:04:50', NULL, 'uploads/images/categories/10492152024.jpg', 3),
(8, 'أدوات مطبخ', '2022-06-30 16:24:37', '2022-06-30 16:25:00', '2022-06-30 16:25:00', 'uploads/images/categories/3399685494.jpg', NULL);

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
(1, 'لجنة زكاة تل الهوا', 'غزة - تل الهوا', 'احمد', 'جنة زكاة تابعة لوزارة الأوقاف والشؤون الدينية - غزة فلسطين\r\nلجنة زكاة تل الهوا : هي مؤسسة غير ربحية تسعى إلى مساعدة الناس .\r\nتقدم العون والمساعدة للفقراء والمحتاجين والمنكوبين من أهل الحي .\r\nتجمع زكاة المال والصدقات والأضاحي من المقتدرين وتوزعهم على المحتاجين والفقراء من الحي .\r\nالعنوان : فلسطين - غزة - تل الهوا - الأبراج - بجوار مسجد عمار بن ياسر', '2022-06-21 09:18:09', '2022-06-21 06:14:54', NULL),
(2, 'جمعية الزكاة الاسلامية ( لجنة زكاة غزة )', 'غزة - الرمال ش احمد عبد العزيز', 'علي', 'جمعية الزكاة الاسلامية ( لجنة زكاة غزة )\r\nغزة الرمال ش احمد عبد العزيز\r\nهاتف/فاكس: 0097282820300\r\nEmail: feedback@gazazakat.org', '2022-06-21 09:18:12', '2022-06-21 06:13:44', NULL),
(3, 'لجنة زكاة الرمال الشمالي', 'غزة - الرمال الشمالي', 'أحمد', 'لجنة زكاة الرمال الشمالي لجنة خيرية تسعى لمساعدة الأسر المتعففة فى منطقة الرمال الشمالي..\r\nلجنة تابعة للوزارة الأوقاف والشؤون الدينية(الادارة العامة للزكاة) ،تقدم خدمات في نواحي عدة (إغاثي -تنموي –اجتماعي-ثقافي)للمجتمع الفلسطيني عامة والأسر المتعففة والفقيرة خاصة في منطقة الرمال الشمالي وتسعي لتوفير الحياة الكريمة لهم ومساعدتهم من خلال عدة مشاريع للوصول إلي التكافل والتضامن والتماسك الاجتماعي.', '2022-06-21 09:18:14', '2022-06-21 06:10:04', NULL),
(4, 'لجنة زكاة الشاطئ الشمالي والنصر', 'غزة - النصر', 'محمد', 'تأسست اللجنة في 1/6/2015 .. تتبع للإدارة العامة للزكاة في وزارة الأوقاف والشؤون الدينية', '2022-06-21 09:18:16', '2022-06-21 06:08:48', NULL),
(5, 'لجنة زكاة شمال الصبرة', 'غزة - الصبرة', 'إبراهيم', 'مؤسسه غير ربحيه تسعى لمساعدة الفقراء والمحتاحين من هذا الشعب الصابر المحاصر .\r\nلجنة زكاة شمال الصبرة : هي مؤسسة غير ربحيه تسعى الى مساعدة الناس تقدم العون والمساعدات للفقراء والمحتاجين والمنكوبين في المنطقة. تجمع زكاة المال والصدقات والأضاحي من المقتدرين في الداخل والخارج وتوزعهم على المحتاجين في المنطقة .\r\nالعنوان : فلسطين . غزة . شارع السرايا الغربي بجوار اليمامة للنقل السريع .\r\nجوال 00972599416108 _ 00972598806809 بريد إلكتروني /Zakatalsabra@gmail.com', '2022-06-21 06:17:45', '2022-06-21 06:17:45', NULL);

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

--
-- Dumping data for table `donation_categories`
--

INSERT INTO `donation_categories` (`id`, `donation_request_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2022-05-06 17:56:57', '2022-05-06 17:56:57', NULL),
(6, 3, 2, NULL, NULL, NULL),
(7, 4, 2, '2022-06-20 12:51:03', '2022-06-20 12:51:03', NULL),
(8, 5, 6, '2022-06-20 13:02:20', '2022-06-20 13:02:20', NULL),
(9, 6, 7, '2022-06-20 13:05:10', '2022-06-20 13:05:10', NULL),
(10, 7, 7, '2022-06-20 13:05:20', '2022-06-20 13:05:20', NULL),
(11, 8, 3, '2022-06-20 14:54:40', '2022-06-20 14:54:40', NULL),
(12, 11, 3, '2022-06-21 07:09:12', '2022-06-21 07:09:12', NULL),
(13, 9, 7, '2022-06-28 05:35:32', '2022-06-28 05:35:32', NULL),
(14, 9, 7, '2022-06-30 15:15:16', '2022-06-30 15:15:16', NULL),
(15, 9, 7, '2022-06-30 15:54:41', '2022-06-30 15:54:41', NULL),
(16, 9, 7, '2022-06-30 15:57:55', '2022-06-30 15:57:55', NULL),
(17, 9, 7, '2022-06-30 16:26:12', '2022-06-30 16:26:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donation_requests`
--

CREATE TABLE `donation_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `available_quantity` int(11) NOT NULL DEFAULT 0,
  `donor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_requests`
--

INSERT INTO `donation_requests` (`id`, `title`, `status`, `image`, `description`, `quantity`, `available_quantity`, `donor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ملابس أطفال', 1, 'uploads/images/5454332311.jpg', 'ملابس أطفال من عمر (2 - 10) سنوات', 5, 0, 9, '2022-06-21 09:32:56', '2022-06-30 16:27:13', NULL),
(3, 'ملابس حريمي', 1, 'uploads/images/2240142294.jpg', 'ملابس حريمي تتكون من بلايز وبلاطين وشالات وعبايات سوداء', 5, 2, 3, '2022-06-21 09:32:58', '2022-06-28 05:39:38', NULL),
(4, 'ملابس', 1, 'uploads/images/11073020419.jpg', 'ملابس متنوعة من بلايز نص كم وكم وبلاطين لكلا الجنسين', 5, 5, 3, '2022-06-18 16:57:16', '2022-06-20 12:51:03', NULL),
(5, 'احذية', 1, 'uploads/images/10131025087.jpg', 'أحذية رجالي من نمرة (40-45) وحريمي من نمرة(37- 42)', 10, 10, 5, '2022-06-18 16:59:37', '2022-06-20 13:02:20', NULL),
(6, 'كنب كورنر', 1, 'uploads/images/3321466122.jpg', 'كنب جديد غير مستهلك كثيرا لونه بني مع 4 مخدات', 1, 1, 2, '2022-06-18 17:08:00', '2022-06-20 13:05:10', NULL),
(7, 'سرير', 1, 'uploads/images/10267484796.jpg', 'سرير غرفة نوم اطفال', 1, 1, 2, '2022-06-18 17:11:16', '2022-06-20 13:05:20', NULL),
(8, 'خزانة', 1, 'uploads/images/2323240242.jpg', 'خزانة ملابس فيها درج في الاسفل وفي الاعلى مكان للملابس المطوية والوسط للملابس المعلقة ', 2, 2, 2, '2022-06-18 17:13:53', '2022-06-20 14:54:40', NULL),
(9, 'كنب', 1, 'uploads/images/6128011275.jpg', 'كنب غرفة ضيوف 3 مفرد، 2مزوج، 1 كبير', 1, 1, 2, '2022-06-20 11:46:42', '2022-06-30 16:26:29', NULL),
(10, 'كراسي بلاستيك', 1, 'uploads/images/2589833301.jpeg', 'كراسي بنية اللون غير مستهلكة عددها 12', 12, 12, 9, '2022-06-20 14:49:14', '2022-06-21 06:00:02', NULL),
(11, 'تلفاز', 1, 'uploads/images/11512954681.webp', 'تلفاز LG أسود شاشة كبيرة 32 بوصة', 2, 2, 3, '2022-06-21 07:04:06', '2022-06-21 07:09:12', NULL),
(12, 'كراسي خشب', 2, 'uploads/images/6799041818.jpeg', 'كراسي خشب عدد 10', 10, 0, 2, '2022-06-30 16:32:15', '2022-06-30 16:36:41', NULL),
(13, 'ادوات مطبخ', 2, NULL, 'ادوات مطبخ', 10, 0, 6, '2022-06-30 16:35:27', '2022-06-30 16:35:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` int(10) NOT NULL,
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
(1, 592797156, 222222222, NULL, '2022-06-30 06:23:27', '2022-06-30 06:23:32', 'محمد سعيد', 2, 4),
(2, 592797156, 648454544, NULL, '2022-06-30 06:23:06', '2022-06-30 06:23:06', 'منجرة ومشغل السعادة', 1, 1),
(3, 592219081, 789654123, NULL, '2022-06-18 16:55:35', '2022-06-18 16:55:35', 'متجر إحسان', 1, 2),
(4, 592219081, 789654923, NULL, '2022-06-18 16:57:16', '2022-06-18 16:57:16', 'أحمد مصطفى', 2, 2),
(5, 597896541, 789654973, NULL, '2022-06-18 16:59:37', '2022-06-18 16:59:37', 'عبد الرحمن رزق', 1, 4),
(6, 592219123, 789456357, NULL, '2022-06-18 17:07:59', '2022-06-30 16:25:37', 'نور الدين محمد', 1, 1),
(7, 594486321, 159321456, NULL, '2022-06-18 17:11:16', '2022-06-18 17:11:16', 'وسام علي', 2, 3),
(8, 597845632, 852741963, NULL, '2022-06-18 17:13:52', '2022-06-18 17:13:52', 'ملاك شادي', 2, 2),
(9, 597896541, 789654128, NULL, '2022-06-20 14:49:13', '2022-06-30 03:49:32', 'متجر البر', 1, 3);

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
(8, 'App\\Models\\User', 5),
(8, 'App\\Models\\User', 12),
(8, 'App\\Models\\User', 13),
(8, 'App\\Models\\User', 14),
(8, 'App\\Models\\User', 15),
(8, 'App\\Models\\User', 17),
(9, 'App\\Models\\User', 16);

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
(1, 'Create Role', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 1),
(2, 'Edit Role', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 1),
(3, 'View Roles', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 1),
(4, 'Disable Role', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 1),
(5, 'Activate Role', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 1),
(6, 'Create User', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 3),
(7, 'Edit User', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 3),
(8, 'View Users', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 3),
(9, 'Disable User', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 3),
(10, 'Activate User', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 3),
(11, 'Create Committee', 'web', '2022-04-05 08:45:54', '2022-04-05 08:45:54', 1),
(12, 'Edit Committee', 'web', '2022-04-05 08:45:54', '2022-04-05 08:45:54', 1),
(13, 'View Committees', 'web', '2022-04-05 08:45:54', '2022-04-05 08:45:54', 1),
(14, 'Disable Committee', 'web', '2022-04-05 08:45:55', '2022-04-05 08:45:55', 1),
(15, 'Activate Committee', 'web', '2022-04-05 08:45:55', '2022-04-05 08:45:55', 1),
(16, 'Create Donor', 'web', '2022-04-05 08:53:05', '2022-04-05 08:53:05', 2),
(17, 'Edit Donor', 'web', '2022-04-05 08:53:05', '2022-04-05 08:53:05', 2),
(18, 'View Donors', 'web', '2022-04-05 08:53:05', '2022-04-05 08:53:05', 2),
(19, 'Reject Donor', 'web', '2022-04-05 08:53:05', '2022-04-05 08:53:05', 2),
(20, 'Approve Donor', 'web', '2022-04-05 08:53:05', '2022-04-05 08:53:05', 2),
(22, 'View Categories', 'web', '2022-04-06 01:50:24', '2022-04-06 01:50:24', 2),
(23, 'Create Category', 'web', '2022-04-06 01:50:24', '2022-04-06 01:50:24', 2),
(24, 'Edit Category', 'web', '2022-04-06 01:50:24', '2022-04-06 01:50:24', 2),
(25, 'Disable Category', 'web', '2022-04-06 01:50:24', '2022-04-06 01:50:24', 2),
(26, 'Activate Category', 'web', '2022-04-06 01:50:24', '2022-04-06 01:50:24', 2),
(27, 'View Beneficiaries', 'web', '2022-04-06 02:01:41', '2022-04-06 02:01:41', 2),
(28, 'Edit Beneficiary', 'web', '2022-04-06 06:09:12', '2022-04-06 06:09:12', 2),
(29, 'View Benefite Requests', 'web', '2022-05-11 03:36:38', '2022-05-11 03:36:38', 2),
(30, 'Approve Benefite Request', 'web', '2022-05-11 03:40:44', '2022-05-11 03:40:44', 2),
(31, 'Add Quantity to Benefite Request', 'web', '2022-05-11 03:40:44', '2022-05-11 03:40:44', 2),
(32, 'Edit Status of Benefite Request', 'web', '2022-05-11 03:40:44', '2022-05-11 03:40:44', 2),
(33, 'Reject Benefite Request', 'web', '2022-05-11 03:40:44', '2022-05-11 03:40:44', 2),
(34, 'View Donation Requests', 'web', '2022-05-11 06:44:22', '2022-05-11 06:44:22', 2),
(38, 'Approve Donation Request', 'web', '2022-06-20 12:08:48', '2022-06-20 12:08:52', 2),
(39, 'Select Category to Donation Request', 'web', '2022-06-20 12:08:55', '2022-06-20 12:08:56', 2),
(40, 'Edit Status of Donation Request', 'web', '2022-06-20 12:08:58', '2022-06-20 12:09:00', 2),
(41, 'Reject Donation Request', 'web', '2022-06-20 12:09:02', '2022-06-20 12:09:04', 2),
(42, 'Add new Donation', 'web', '2022-06-20 13:46:43', '2022-06-20 13:46:43', 3),
(43, 'Edit Donation Action', 'web', '2022-06-20 17:29:25', '2022-06-20 17:29:23', 2);

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
(1, 'superadmin', 'web', '2022-03-03 05:21:43', '2022-03-03 05:21:43', 1, NULL, NULL),
(7, 'committee', 'web', '2022-04-05 08:45:54', '2022-04-05 08:45:54', 2, NULL, NULL),
(8, 'donor', 'web', '2022-04-05 08:53:04', '2022-04-05 08:53:04', 3, NULL, NULL),
(9, 'رئيس قسم', 'web', '2022-06-30 16:23:30', '2022-06-30 16:23:30', 2, 3, 3);

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
(6, 9),
(7, 1),
(7, 7),
(7, 9),
(8, 1),
(8, 7),
(8, 8),
(8, 9),
(9, 1),
(10, 1),
(11, 1),
(11, 7),
(11, 9),
(12, 1),
(12, 7),
(12, 9),
(13, 1),
(13, 7),
(13, 9),
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
(27, 9),
(28, 1),
(28, 7),
(29, 1),
(29, 7),
(29, 9),
(30, 1),
(30, 7),
(31, 1),
(31, 7),
(32, 1),
(32, 7),
(33, 1),
(33, 7),
(34, 1),
(34, 7),
(34, 8),
(38, 1),
(38, 7),
(39, 1),
(39, 7),
(40, 1),
(40, 7),
(41, 1),
(41, 7),
(42, 1),
(42, 7),
(42, 8),
(43, 1),
(43, 7);

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
('ypJH5yzdwQxs6ttZHMVtwybQmlDc3AaPmeFANEbL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1Z6Zmh6aEtsOFgwblVSampHN0taWHVnaFBTWTRRZ1UzMlpjdFdmeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1656617849);

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
(1, 'أدمن الموقع', 'admin@gmail.com', NULL, '$2y$10$0fFz2kf6Dp7NjSEVkgXPL.Wfe.TknH1iVRUyZufaUjr6OSONXBuou', NULL, NULL, NULL, NULL, 'uploads/images/4737776346.png', '2022-03-03 05:22:14', '2022-06-30 16:20:30', 1, NULL, NULL, NULL),
(4, 'أ. محمد شعبان - مدير اللجنة', 'committee@gmail.com', NULL, '$2y$10$/Vvu1oxxPibiyDaSox/FjeFvdyjHVT8mRwvcDiS5F1L4u8eGygw/S', NULL, NULL, NULL, NULL, 'uploads/images/1857162499.png', '2022-03-06 13:21:32', '2022-03-06 13:21:32', 2, 3, NULL, NULL),
(5, 'محمد إحسان', 'donor@gmail.com', NULL, '$2y$10$0UoZkeMQvPUPMwf4b050N.pd0agX2X/UqZQ9B9sfgD9OPAgOXdkVq', NULL, NULL, NULL, NULL, 'uploads/images/2157601692.png', '2022-03-06 14:58:01', '2022-03-06 14:58:01', 3, 3, 2, NULL),
(12, 'نسمة الشوا', 'alshawanessma@gmail.com', NULL, '$2y$10$8Utvzi11RqXvt.dkvJU4cuqk/67lKhjI9v/vWWvkbILFEIXkb8qH2', NULL, NULL, NULL, NULL, 'uploads/images/11279452790.png', '2022-06-29 03:58:18', '2022-06-29 03:58:18', 3, 5, 3, NULL),
(13, 'شمس النزلي', 'shams@gmail.com', NULL, '$2y$10$9ZydgE5ViBCZ23rSusayvuXGgqv.is9fpp90rKXbPlzVyQnIko.ia', NULL, NULL, NULL, NULL, 'uploads/images/10379749964.png', '2022-06-29 04:00:40', '2022-06-29 04:00:40', 3, 1, NULL, NULL),
(14, 'نور بدوي', 'noor@gmail.com', NULL, '$2y$10$cJXvnbYwVDL5Df91kdUh1uwAUtg.0NMVgjRxprPzRd96AsKrnJIZK', NULL, NULL, NULL, NULL, 'uploads/images/5268091566.png', '2022-06-29 04:03:00', '2022-06-30 03:26:57', 3, 3, 9, NULL),
(15, 'علياء بدوي', 'aliaa@gmail.com', NULL, '$2y$10$fZWQXQlqP9RlCzcVpJEzyOegfXbH.oJNCdOfktSxT4PIxalSG8kNK', NULL, NULL, NULL, NULL, 'uploads/images/4758509852.png', '2022-06-29 04:07:29', '2022-06-29 04:07:29', 3, 5, 3, NULL),
(16, 'إسلام محمد', 'eslam@gmail.com', NULL, '$2y$10$yB3NpOfoW6TElkjIHh8gjuSFmAJjgvbkztscdgVADTmQFDPGsfajG', NULL, NULL, NULL, NULL, 'uploads/images/3750536704.png', '2022-06-30 16:22:26', '2022-06-30 16:28:42', 2, 3, NULL, NULL),
(17, 'محمد', 'moh@gmail.com', NULL, '$2y$10$EutEPpKr0ptwS2.rg9dghOEe5np4jYHq4CGBnAMVAimkeU9WiQtFy', NULL, NULL, NULL, NULL, 'uploads/images/8934709510.png', '2022-06-30 16:31:23', '2022-06-30 16:31:23', 3, 3, 2, NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  ADD KEY `permissions_user_level_id_foreign` (`user_level_id`);

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
  ADD KEY `role_id` (`role_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `benefit_categories`
--
ALTER TABLE `benefit_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benefit_requests`
--
ALTER TABLE `benefit_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donation_categories`
--
ALTER TABLE `donation_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `donation_requests`
--
ALTER TABLE `donation_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

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
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `permission_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_has_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `committee_id` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`),
  ADD CONSTRAINT `donor_id` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`),
  ADD CONSTRAINT `user_level_id` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
