-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2021 at 06:22 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfq`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `stud_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groups_project_id_foreign` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `project_id`, `stud_count`, `created_at`, `updated_at`) VALUES
(1, 'Test [group 1]', 1, 3, '2021-02-28 16:08:54', '2021-02-28 16:12:35'),
(2, 'Test [group 2]', 1, 2, '2021-02-28 16:08:54', '2021-02-28 16:15:06'),
(3, 'Test [group 3]', 1, 0, '2021-02-28 16:08:54', '2021-02-28 16:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2021_02_17_080507_create_projects_table', 1),
(6, '2021_02_17_141138_create_groups_table', 1),
(7, '2021_02_21_133425_create_students_table', 1),
(8, '2021_02_22_171825_create_status_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numGroups` int(10) UNSIGNED NOT NULL,
  `numStudentsInEach` int(10) UNSIGNED NOT NULL,
  `studentsTotal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `numGroups`, `numStudentsInEach`, `studentsTotal`, `created_at`, `updated_at`) VALUES
(1, 'Test', 3, 3, 5, '2021-02-28 16:08:54', '2021-02-28 16:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_message`, `created_at`, `updated_at`) VALUES
(1, 'The new project of 3 groups was just created: Test.', '2021-02-28 16:08:54', '2021-02-28 16:08:54'),
(2, 'Rokas has just been added to a project Test.', '2021-02-28 16:10:47', '2021-02-28 16:10:47'),
(3, 'Romas has just been added to a project Test.', '2021-02-28 16:11:57', '2021-02-28 16:11:57'),
(4, 'Rimas has just been added to a project Test.', '2021-02-28 16:12:35', '2021-02-28 16:12:35'),
(5, 'Saulius has just been added to a project Test.', '2021-02-28 16:13:35', '2021-02-28 16:13:35'),
(6, 'Darius has just been added to a project Test.', '2021-02-28 16:15:07', '2021-02-28 16:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `project_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'Rokas', 1, 1, '2021-02-28 16:10:47', '2021-02-28 16:10:47'),
(2, 'Romas', 1, 1, '2021-02-28 16:11:57', '2021-02-28 16:11:57'),
(3, 'Rimas', 1, 1, '2021-02-28 16:12:35', '2021-02-28 16:12:35'),
(4, 'Saulius', 1, 2, '2021-02-28 16:13:35', '2021-02-28 16:13:35'),
(5, 'Darius', 1, 2, '2021-02-28 16:15:06', '2021-02-28 16:15:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
