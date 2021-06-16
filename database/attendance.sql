-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 03:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

create database attendance;
use attendance;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_3_g__students`
--

CREATE TABLE `attendance_3_g__students` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `hall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_mark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attendance_mark`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_3_g__students`
--

INSERT INTO `attendance_3_g__students` (`id`, `created_at`, `updated_at`, `course_code`, `date`, `hours`, `hall`, `attendance_mark`) VALUES
(1, '2021-01-08 03:26:10', '2021-01-08 03:26:10', 'CSC304G3', '2021-01-08', 2, 'CUL-1', '[\"2017\\/SP\\/005\",\"2017\\/SP\\/010\",\"2017\\/SP\\/012\",\"2017\\/SP\\/013\",\"2017\\/SP\\/017\"]'),
(3, '2021-01-08 03:26:56', '2021-01-21 23:48:18', 'CSC304G3', '2021-01-08', 2, 'CUL-1', '[\"2017\\/SP\\/005\",\"2017\\/SP\\/012\",\"2017\\/SP\\/013\",\"2017\\/SP\\/017\"]'),
(4, '2021-01-08 03:32:19', '2021-01-08 03:40:49', 'CSC304G3', '2021-01-08', 2, 'CUL-1', '[\"2017\\/SP\\/010\",\"2017\\/SP\\/012\",\"2017\\/SP\\/013\",\"2017\\/SP\\/017\"]');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_3_m__students`
--

CREATE TABLE `attendance_3_m__students` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `hall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_mark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attendance_mark`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_3_m__students`
--

INSERT INTO `attendance_3_m__students` (`id`, `created_at`, `updated_at`, `course_code`, `date`, `hours`, `hall`, `attendance_mark`) VALUES
(1, '2021-01-08 23:34:54', '2021-01-22 00:02:34', 'CSC301M3', '2021-01-05', 1, 'CUL-2', '[\"2017\\/SP\\/002\",\"2017\\/SP\\/006\",\"2017\\/SP\\/008\"]'),
(2, '2021-01-16 21:45:55', '2021-01-16 21:45:55', 'CSC301M3', '2021-01-17', 1, 'CUL-2', '[\"2017\\/SP\\/002\",\"2017\\/SP\\/003\",\"2017\\/SP\\/006\",\"2017\\/SP\\/008\",\"2017\\/SP\\/014\"]');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_3_s__students`
--

CREATE TABLE `attendance_3_s__students` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `hall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_mark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attendance_mark`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_3_s__students`
--

INSERT INTO `attendance_3_s__students` (`id`, `created_at`, `updated_at`, `course_code`, `date`, `hours`, `hall`, `attendance_mark`) VALUES
(1, '2020-12-25 00:17:56', '2020-12-25 00:17:56', 'CSC304S3', '2020-12-25', 1, 'CUL-2', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/002\",\"2017\\/CSC\\/003\",\"2017\\/CSC\\/004\",\"2017\\/CSC\\/005\",\"2017\\/CSC\\/006\",\"2017\\/CSC\\/007\",\"2017\\/CSC\\/008\",\"2017\\/CSC\\/009\",\"2017\\/CSC\\/010\",\"2017\\/CSC\\/011\",\"2017\\/CSC\\/012\",\"2017\\/CSC\\/013\",\"2017\\/CSC\\/014\",\"2017\\/CSC\\/015\",\"2017\\/CSC\\/016\",\"2017\\/CSC\\/017\",\"2017\\/CSC\\/018\",\"2017\\/CSC\\/019\",\"2017\\/CSC\\/020\",\"2017\\/CSC\\/021\",\"2017\\/CSC\\/022\",\"2017\\/CSC\\/023\",\"2017\\/CSC\\/024\",\"2017\\/CSC\\/025\",\"2017\\/CSC\\/026\",\"2017\\/CSC\\/027\",\"2017\\/CSC\\/028\",\"2017\\/CSC\\/029\",\"2017\\/CSC\\/030\",\"2017\\/CSC\\/031\",\"2017\\/CSC\\/032\",\"2017\\/CSC\\/033\",\"2017\\/CSC\\/034\",\"2017\\/CSC\\/035\",\"2017\\/CSC\\/036\",\"2017\\/CSC\\/037\",\"2017\\/CSC\\/038\",\"2017\\/CSC\\/040\",\"2017\\/CSC\\/043\",\"2017\\/CSC\\/044\",\"2017\\/CSC\\/045\",\"2017\\/CSC\\/046\",\"2017\\/CSC\\/047\",\"2017\\/CSC\\/048\",\"2017\\/CSC\\/FS\\/\"]'),
(2, '2020-12-25 03:43:52', '2020-12-25 04:27:26', 'CSC304S3', '2020-12-27', 2, 'LAB-1', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/002\",\"2017\\/CSC\\/003\",\"2017\\/CSC\\/004\",\"2017\\/CSC\\/005\",\"2017\\/CSC\\/006\",\"2017\\/CSC\\/007\",\"2017\\/CSC\\/008\",\"2017\\/CSC\\/009\",\"2017\\/CSC\\/010\",\"2017\\/CSC\\/011\",\"2017\\/CSC\\/012\",\"2017\\/CSC\\/013\",\"2017\\/CSC\\/014\",\"2017\\/CSC\\/015\",\"2017\\/CSC\\/016\",\"2017\\/CSC\\/017\",\"2017\\/CSC\\/018\",\"2017\\/CSC\\/019\",\"2017\\/CSC\\/020\",\"2017\\/CSC\\/021\",\"2017\\/CSC\\/022\",\"2017\\/CSC\\/023\",\"2017\\/CSC\\/024\",\"2017\\/CSC\\/025\",\"2017\\/CSC\\/026\",\"2017\\/CSC\\/027\"]'),
(5, '2020-12-25 04:29:09', '2021-01-05 04:22:42', 'CSC101S3', '2020-12-02', 3, 'LAB-1', '[\"2017\\/CSC\\/005\",\"2017\\/CSC\\/031\",\"2017\\/CSC\\/032\",\"2017\\/CSC\\/048\",\"2017\\/CSC\\/FS\\/\"]'),
(6, '2020-12-25 04:29:23', '2020-12-25 04:29:23', 'CSC101S3', '2020-12-02', 2, 'CUL-2', '[\"2017\\/CSC\\/017\",\"2017\\/CSC\\/018\",\"2017\\/CSC\\/031\"]'),
(7, '2020-12-25 04:31:35', '2021-01-21 23:38:43', 'CSC304S3', '2020-12-25', 1, 'CUL-2', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/004\",\"2017\\/CSC\\/007\",\"2017\\/CSC\\/010\"]'),
(8, '2020-12-25 04:49:39', '2020-12-25 04:49:39', 'CSC304S3', '2020-12-02', 1, 'CUL-1', NULL),
(9, '2020-12-27 00:35:09', '2020-12-27 00:35:09', 'CSC304S3', '2020-12-27', 2, 'CSL', '[\"2017\\/CSC\\/044\",\"2017\\/CSC\\/045\",\"2017\\/CSC\\/046\",\"2017\\/CSC\\/047\",\"2017\\/CSC\\/048\",\"2017\\/CSC\\/FS\\/\"]'),
(10, '2020-12-27 05:43:26', '2021-01-05 04:23:03', 'CSC304S3', '2020-12-21', 5, 'CSL', '[\"2017\\/CSC\\/004\",\"2017\\/CSC\\/005\",\"2017\\/CSC\\/006\"]'),
(12, '2021-01-04 00:57:51', '2021-01-04 00:57:51', 'CSC306S3', '2021-01-04', 4, 'CUL-1', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/002\",\"2017\\/CSC\\/004\",\"2017\\/CSC\\/005\",\"2017\\/CSC\\/007\",\"2017\\/CSC\\/008\",\"2017\\/CSC\\/010\",\"2017\\/CSC\\/011\",\"2017\\/CSC\\/013\",\"2017\\/CSC\\/014\",\"2017\\/CSC\\/016\",\"2017\\/CSC\\/017\",\"2017\\/CSC\\/019\",\"2017\\/CSC\\/022\",\"2017\\/CSC\\/023\",\"2017\\/CSC\\/025\",\"2017\\/CSC\\/026\",\"2017\\/CSC\\/028\",\"2017\\/CSC\\/029\",\"2017\\/CSC\\/031\",\"2017\\/CSC\\/032\",\"2017\\/CSC\\/034\",\"2017\\/CSC\\/035\",\"2017\\/CSC\\/037\",\"2017\\/CSC\\/038\",\"2017\\/CSC\\/043\",\"2017\\/CSC\\/044\",\"2017\\/CSC\\/046\",\"2017\\/CSC\\/047\",\"2017\\/CSC\\/FS\\/\"]'),
(13, '2021-01-05 00:39:26', '2021-01-05 23:20:30', 'CSC306S3', '2021-01-12', 1, 'CSL', '[\"2017\\/CSC\\/004\",\"2017\\/CSC\\/005\"]'),
(14, '2021-01-06 00:18:40', '2021-01-06 00:18:40', 'CSC306S3', '2021-01-07', 2, 'CUL-2', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/002\",\"2017\\/CSC\\/009\",\"2017\\/CSC\\/010\",\"2017\\/CSC\\/014\",\"2017\\/CSC\\/019\",\"2017\\/CSC\\/026\",\"2017\\/CSC\\/030\",\"2017\\/CSC\\/032\",\"2017\\/CSC\\/034\",\"2017\\/CSC\\/044\",\"2017\\/CSC\\/048\"]'),
(15, '2021-01-06 00:54:13', '2021-01-06 00:54:48', 'CSC308S3', '2021-01-06', 3, 'CUL-2', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/004\",\"2017\\/CSC\\/007\",\"2017\\/CSC\\/010\",\"2017\\/CSC\\/013\",\"2017\\/CSC\\/015\",\"2017\\/CSC\\/016\",\"2017\\/CSC\\/018\",\"2017\\/CSC\\/019\",\"2017\\/CSC\\/021\",\"2017\\/CSC\\/022\",\"2017\\/CSC\\/024\",\"2017\\/CSC\\/025\",\"2017\\/CSC\\/027\",\"2017\\/CSC\\/028\",\"2017\\/CSC\\/031\",\"2017\\/CSC\\/032\",\"2017\\/CSC\\/034\",\"2017\\/CSC\\/035\",\"2017\\/CSC\\/037\",\"2017\\/CSC\\/038\",\"2017\\/CSC\\/043\",\"2017\\/CSC\\/044\",\"2017\\/CSC\\/046\",\"2017\\/CSC\\/FS\\/\"]'),
(16, '2021-01-06 03:08:58', '2021-01-06 19:25:03', 'CSC309S3', '2021-01-07', 1, 'LAB-1', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/004\",\"2017\\/CSC\\/005\",\"2017\\/CSC\\/007\",\"2017\\/CSC\\/008\",\"2017\\/CSC\\/009\",\"2017\\/CSC\\/011\",\"2017\\/CSC\\/012\",\"2017\\/CSC\\/015\",\"2017\\/CSC\\/021\",\"2017\\/CSC\\/023\",\"2017\\/CSC\\/024\",\"2017\\/CSC\\/025\",\"2017\\/CSC\\/026\",\"2017\\/CSC\\/027\",\"2017\\/CSC\\/028\",\"2017\\/CSC\\/029\",\"2017\\/CSC\\/031\"]'),
(17, '2021-01-06 19:23:59', '2021-01-06 19:23:59', 'CSC308S3', '2021-01-07', 1, 'CUL-2', '[\"2017\\/CSC\\/037\",\"2017\\/CSC\\/038\",\"2017\\/CSC\\/040\"]'),
(18, '2021-01-08 03:33:47', '2021-01-09 05:15:52', 'CSC308S3', '2021-01-07', 1, 'CUL-2', NULL),
(19, '2021-01-08 03:37:52', '2021-01-08 03:37:52', 'CSC309S3', '2021-01-09', 1, 'CUL-1', NULL),
(20, '2021-01-15 21:22:38', '2021-01-15 21:22:38', 'CSC304S3', '2021-01-17', 2, 'CUL-1', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/003\",\"2017\\/CSC\\/008\",\"2017\\/CSC\\/009\",\"2017\\/CSC\\/010\",\"2017\\/CSC\\/011\",\"2017\\/CSC\\/016\",\"2017\\/CSC\\/018\",\"2017\\/CSC\\/020\",\"2017\\/CSC\\/022\",\"2017\\/CSC\\/025\",\"2017\\/CSC\\/030\",\"2017\\/CSC\\/033\",\"2017\\/CSC\\/034\",\"2017\\/CSC\\/037\",\"2017\\/CSC\\/044\",\"2017\\/CSC\\/047\"]'),
(21, '2021-01-15 21:23:32', '2021-01-15 21:23:32', 'CSC304S3', '2021-01-18', 2, 'CUL-1', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/005\",\"2017\\/CSC\\/009\",\"2017\\/CSC\\/016\",\"2017\\/CSC\\/020\",\"2017\\/CSC\\/024\",\"2017\\/CSC\\/FS\\/\"]'),
(22, '2021-01-15 21:24:06', '2021-01-15 21:24:06', 'CSC304S3', '2021-01-17', 1, NULL, '[\"2017\\/CSC\\/003\",\"2017\\/CSC\\/004\",\"2017\\/CSC\\/005\",\"2017\\/CSC\\/006\",\"2017\\/CSC\\/007\"]'),
(23, '2021-01-15 21:30:00', '2021-01-15 21:30:00', 'CSC304S3', '2021-01-23', 1, 'CUL-1', '[\"2017\\/CSC\\/011\",\"2017\\/CSC\\/014\",\"2017\\/CSC\\/017\",\"2017\\/CSC\\/023\",\"2017\\/CSC\\/029\"]'),
(24, '2021-01-15 21:30:29', '2021-01-15 21:30:29', 'CSC304S3', '2021-01-23', 2, 'CUL-1', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/005\",\"2017\\/CSC\\/009\",\"2017\\/CSC\\/011\",\"2017\\/CSC\\/013\"]'),
(25, '2021-01-16 00:25:15', '2021-01-16 00:25:15', 'CSC304S3', '2021-01-30', 1, 'CUL-1', '[\"2017\\/CSC\\/008\",\"2017\\/CSC\\/017\",\"2017\\/CSC\\/020\"]'),
(26, '2021-01-21 01:11:54', '2021-01-21 01:15:43', 'CSC304S3', '2021-01-21', 2, 'CUL-1', '[\"2017\\/CSC\\/001\",\"2017\\/CSC\\/007\",\"2017\\/CSC\\/010\",\"2017\\/CSC\\/013\",\"2017\\/CSC\\/016\",\"2017\\/CSC\\/017\",\"2017\\/CSC\\/019\",\"2017\\/CSC\\/020\",\"2017\\/CSC\\/022\",\"2017\\/CSC\\/025\",\"2017\\/CSC\\/028\",\"2017\\/CSC\\/031\",\"2017\\/CSC\\/034\"]'),
(27, '2021-01-21 23:39:45', '2021-01-21 23:39:45', 'CSC304S3', '2021-01-22', 1, 'CUL-1', '[\"2017\\/CSC\\/004\",\"2017\\/CSC\\/005\"]');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lect_id` bigint(20) UNSIGNED NOT NULL,
  `assistant_lect_id` bigint(20) UNSIGNED NOT NULL,
  `semester` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `course_level`, `lect_id`, `assistant_lect_id`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'CSC101S3', 'Foundations of Computer Science', '1S', 5, 11, '1', NULL, NULL),
(2, 'CSC102S3', 'Computer Programming I', '1S', 10, 12, '1', NULL, NULL),
(3, 'CSC103S3', 'Introduction to Computer Systems', '1S', 3, 12, '1', NULL, NULL),
(4, 'CSC104S2', 'Mathematics for Computing I', '1S', 2, 11, '1', NULL, NULL),
(5, 'CSC105S3', 'Statistics for Computing I', '1S', 4, 12, '1', NULL, NULL),
(6, 'CSC106S3', 'Human Computer Interaction', '1S', 6, 12, '2', NULL, NULL),
(7, 'CSC107S2', 'Multimedia Technologies', '1S', 7, 12, '1', NULL, NULL),
(8, 'CSC108S2', 'Design of Algorithms', '1S', 1, 11, '2', NULL, NULL),
(9, 'CSC109S2', 'Introduction to Computer Security and Cryptography', '1S', 2, 11, '2', NULL, NULL),
(10, 'CSC110S2', 'Organisational Behaviour', '1S', 10, 11, '1', NULL, NULL),
(11, 'CSC111S2', 'Mathematics for Computing II', '1S', 7, 12, '2', NULL, NULL),
(12, 'CSC112S3', 'Statistics for Computing II', '1S', 6, 11, '2', NULL, NULL),
(13, 'CSC101G3', 'Foundations of Computer Science', '1G', 5, 12, '1', NULL, NULL),
(14, 'CSC102G3', 'Computer Programming I', '1G', 10, 11, '1', NULL, NULL),
(15, 'CSC103G2', 'Multimedia Technologies', '1G', 7, 12, '1', NULL, NULL),
(16, 'CSC104G2', 'Design of Algorithms', '1G', 1, 11, '2', NULL, NULL),
(17, 'CSC201S2', 'Database Systems Concepts and Design', '2S', 10, 12, '1', NULL, NULL),
(18, 'CSC202S2', 'Computer Programming II', '2S', 1, 11, '1', NULL, NULL),
(19, 'CSC203S2', 'Operating Systems', '2S', 7, 12, '2', NULL, NULL),
(20, 'CSC204S2', 'Data Structures & Algorithms', '2S', 1, 11, '2', NULL, NULL),
(21, 'CSC205S2', 'Software Engineering', '2S', 10, 12, '1', NULL, NULL),
(22, 'CSC206S2', 'Mathematics for Computing III', '2S', 5, 11, '1', NULL, NULL),
(23, 'CSC207S4', 'Computer Architecture', '2S', 3, 11, '1', NULL, NULL),
(24, 'CSC208S3', 'Concepts of Programming Languages', '2S', 2, 11, '1', NULL, NULL),
(25, 'CSC209S3', 'Bioinformatics', '2S', 6, 12, '2', NULL, NULL),
(26, 'CSC210S3', 'Web Technologies', '2S', 10, 12, '2', NULL, NULL),
(27, 'CSC211S3', 'Emerging Trends in Computer Science', '2S', 10, 11, '2', NULL, NULL),
(28, 'CSC212S2', 'Professional Practice', '2S', 4, 11, '2', NULL, NULL),
(29, 'CSC201G2', 'Database Systems Concepts and Design', '2G', 6, 12, '1', NULL, NULL),
(30, 'CSC202G2', 'Computer Programming II', '2G', 1, 11, '1', NULL, NULL),
(31, 'CSC203G2', 'Operating Systems', '2G', 7, 12, '2', NULL, NULL),
(32, 'CSC204G2', 'Data Structures & Algorithms', '2G', 1, 11, '2', NULL, NULL),
(33, 'CSC205G2', 'Software Engineering', '2G', 10, 12, '1', NULL, NULL),
(34, 'CSC301S3', 'Rapid Application Development', '3S', 10, 11, '1', NULL, NULL),
(35, 'CSC302S2', 'Computer Programming III', '3S', 1, 12, '1', NULL, NULL),
(36, 'CSC303S2', 'Data Communication and Computer Networks', '3S', 4, 11, '1', NULL, NULL),
(37, 'CSC304S3', 'Team Software Project', '3S', 2, 12, '2', NULL, NULL),
(38, 'CSC305S2', 'Graphics and Visual Computing', '3S', 1, 11, '1', NULL, NULL),
(39, 'CSC306S3', 'Advanced Database Design and Systems', '3S', 3, 11, '2', NULL, NULL),
(40, 'CSC307S3', 'Advanced Topics in Computer Networks', '3S', 4, 12, '1', NULL, NULL),
(41, 'CSC308S3', 'Artificial Intelligence', '3S', 2, 11, '2', NULL, NULL),
(42, 'CSC309S3', 'High Performance Computing', '3S', 1, 12, '2', NULL, NULL),
(43, 'CSC310S3', 'Image Processing and Computer Vision', '3S', 5, 11, '1', NULL, NULL),
(44, 'CSC311S3', 'Machine Learning', '3S', 5, 12, '2', NULL, NULL),
(45, 'CSC312S3', 'Mobile Computing', '3S', 4, 11, '2', NULL, NULL),
(46, 'CSC301G3', 'Rapid Application Development', '3G', 10, 12, '1', NULL, NULL),
(47, 'CSC302G2', 'Computer Programming III', '3G', 1, 11, '1', NULL, NULL),
(48, 'CSC303G2', 'Data Communication and Computer Networks', '3G', 4, 11, '1', NULL, NULL),
(49, 'CSC304G3', 'Team Software Project', '3G', 2, 12, '2', '0000-00-00 00:00:00', NULL),
(50, 'CSC305G2', 'Graphics and Visual Computing', '3G', 1, 11, '1', NULL, NULL),
(51, 'CSC301M3', 'Advanced Database Design and Systems', '3M', 3, 11, '2', NULL, NULL),
(52, 'CSC302M3', 'Advanced Topics in Computer Networks', '3M', 4, 12, '1', NULL, NULL),
(53, 'CSC303M3', 'Artificial Intelligence', '3M', 2, 11, '2', NULL, NULL),
(54, 'CSC304M3', 'High Performance Computing', '3M', 1, 12, '2', NULL, NULL),
(55, 'CSC305M3', 'Image Processing and Computer Vision', '3M', 5, 11, '1', NULL, NULL),
(56, 'CSC306M3', 'Machine Learning', '3M', 5, 12, '2', NULL, NULL),
(57, 'CSC307M3', 'Mobile Computing', '3M', 4, 11, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `lect_id` bigint(20) UNSIGNED NOT NULL,
  `lect_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lect_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lect_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lect_id`, `lect_title`, `lect_name`, `lect_email`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', ' S. Suthakar', 'sosuthakar@univ.jfn.ac.lk', 'HOD,lecturer', NULL, NULL),
(2, 'Dr.', 'S. Mahesan', 'mahesans@univ.jfn.ac.lk', 'lecturer', NULL, NULL),
(3, 'Dr.', 'E. Y. A. Charles', 'charles.ey@univ.jfn.ac.lk', 'lecturer', NULL, NULL),
(4, 'Dr.', 'K. Thabotharan', 'thabo@univ.jfn.ac.lk', 'lecturer', NULL, NULL),
(5, 'Dr.', 'A. Ramanan', 'a.ramanan@univ.jfn.ac.lk', 'lecturer', NULL, NULL),
(6, 'Dr.', '(Mrs). B. Mayurathan', 'barathym@univ.jfn.ac.lk', 'lecturer', NULL, NULL),
(7, 'Dr.', 'M. Siyamalan', 'siyam@univ.jfn.ac.lk', 'lecturer', NULL, NULL),
(8, 'Mr.', 'K. Sarveswaran ', 'sarves@univ.jfn.ac.lk', 'lecturer', NULL, NULL),
(9, 'Mr.', ' S. Shriparen', 'shriparens@univ.jfn.ac.lk', 'lecturer', NULL, NULL),
(10, 'Miss.', 'J. Samantha Tharani', 'samantha@univ.jfn.ac.lk', 'lecturer', NULL, NULL),
(11, 'Mrs.', 'J. Janani', 'janani7@gmail.com', 'assistentlecturer', NULL, NULL),
(12, 'Mrs.', ' K. Tharmini', 'tharmin7@gmail.com', 'assistentlecturer', NULL, NULL);

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
(137, '2020_12_11_040925_create_student_table', 1),
(192, '2014_10_12_000000_create_users_table', 2),
(193, '2014_10_12_100000_create_password_resets_table', 2),
(194, '2019_08_19_000000_create_failed_jobs_table', 2),
(195, '2020_12_04_185425_create_lecturers_table', 2),
(196, '2020_12_10_032640_create_courses_table', 2),
(197, '2020_12_11_070116_create_students_table', 2),
(198, '2020_12_23_143129_create_attendance_3_s__students_table', 3),
(199, '2020_12_24_044901_create_attendance_3_s__students_table', 4),
(200, '2020_12_25_051813_create_attendance_3_s__students_table', 5),
(202, '2021_01_08_024431_create_attendance_3_g__students_table', 6),
(203, '2021_01_08_111448_create_attendance_3_m__students_table', 7),
(204, '2021_01_25_182717_create_semesters_table', 8),
(205, '2021_01_25_183443_create_semesters_table', 9),
(206, '2021_01_26_043807_create_variables_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$rWo1pMZr.hSVK.pI7UBvCOSzHmPlmSDXGFzUKccDyUfjuR/HJpEYm', '2021-01-12 02:35:48'),
('srijathee@gmail.com', '$2y$10$g2zsr7gEg10yCol8ksuGseL.eQPnka6P2xy0hmUi9cLwzon4cEI2y', '2021-01-20 04:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `st_id` bigint(20) UNSIGNED NOT NULL,
  `st_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st_regno` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st_acyear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st_fid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`st_id`, `st_name`, `st_regno`, `st_level`, `st_acyear`, `st_fid`, `created_at`, `updated_at`) VALUES
(1, 'Dhanushkar R', '2019/CSC/001', '1S', '2018/2019', NULL, NULL, NULL),
(2, ' Dilakshan V.', '2019/CSC/002', '1S', '2018/2019', NULL, NULL, NULL),
(3, 'Edirisinghe O.A.C.P', '2019/CSC/003', '1S', '2018/2019', NULL, NULL, NULL),
(4, 'Fernando W.A.D.', '2019/CSC/004', '1S', '2018/2019', NULL, NULL, NULL),
(5, 'Hansika W.A.C.', '2019/CSC/005', '1S', '2018/2019', NULL, NULL, NULL),
(6, 'Ilham M.H.M.', '2019/SP/001', '1G', '2018/2019', NULL, NULL, NULL),
(7, ' Inshaf M.I.M.', '2019/SP/002', '1G', '2018/2019', NULL, NULL, NULL),
(8, 'Janadari E.S.', '2019/SP/003', '1G', '2018/2019', NULL, NULL, NULL),
(9, 'Jayasekara H.M.S.H.', '2019/SP/004', '1G', '2018/2019', NULL, NULL, NULL),
(10, 'Jenthan T.', '2019/SP/005', '1G', '2018/2019', NULL, NULL, NULL),
(11, 'Abishayani L.', '2018/CSC/001', '2S', '2018/2019', NULL, NULL, NULL),
(12, 'Afra M.A.F.', '2018/CSC/002', '2S', '2018/2019', NULL, NULL, NULL),
(13, 'Ajanthan R.', '2018/CSC/003', '2S', '2018/2019', NULL, NULL, NULL),
(14, 'Chainee S.S.', '2018/CSC/004', '2S', '2018/2019', NULL, NULL, NULL),
(15, 'De Silva T.S.A.T.A.', '2018/CSC/005', '2S', '2018/2019', NULL, NULL, NULL),
(16, 'Vipooshanan R.', '2018/SP/001', '2G', '2018/2019', NULL, NULL, NULL),
(17, 'Amarasinghe N.M.A', '2018/SP/002', '2G', '2018/2019', NULL, NULL, NULL),
(18, 'Chandrasekara H.C.A.R.R.', '2018/SP/003', '2G', '2018/2019', NULL, NULL, NULL),
(19, 'Dayarathna D.S.P.', '2018/SP/004', '2G', '2018/2019', NULL, NULL, NULL),
(20, 'Dharmarajah R', '2018/SP/005', '2G', '2018/2019', NULL, NULL, NULL),
(21, 'Janani Kangesan', '2017/CSC/001', '3S', '2018/2019', NULL, NULL, NULL),
(22, 'Dissanayaka Mudiyanselage Shalika Harshani Dissanayaka', '2017/CSC/002', '3S', '2018/2019', NULL, NULL, NULL),
(23, 'Krishnamoorthy Thanushan', '2017/CSC/003', '3S', '2018/2019', NULL, NULL, NULL),
(24, 'Supasthika Amirthalingam', '2017/CSC/004', '3S', '2018/2019', NULL, NULL, NULL),
(25, 'Srikaran Jatheesan', '2017/CSC/005', '3S', '2018/2019', NULL, NULL, NULL),
(26, 'Divya Varatharajan', '2017/CSC/006', '3S', '2018/2019', NULL, NULL, NULL),
(27, 'Samarasinghage Kavindya Sathsarani', '2017/CSC/007', '3S', '2018/2019', NULL, NULL, NULL),
(28, 'Sinthuja Arumainayagam', '2017/CSC/008', '3S', '2018/2019', NULL, NULL, NULL),
(29, 'Rathnayakage Amila Saranga Rathnayaka', '2017/CSC/009', '3S', '2018/2019', NULL, NULL, NULL),
(30, 'Abdul Gaffar Mohamed Fawzy', '2017/CSC/010', '3S', '2018/2019', NULL, NULL, NULL),
(31, 'Yaleen Mohamed Silhan', '2017/CSC/011', '3S', '2018/2019', NULL, NULL, NULL),
(32, 'Niranga Sithara Athauda Arachchi', '2017/CSC/012', '3S', '2018/2019', NULL, NULL, NULL),
(33, 'hanganna Gamage Tharindu Prasad Ranaweera', '2017/CSC/013', '3S', '2018/2019', NULL, NULL, NULL),
(34, 'Samarakoon Jayasekara Mudiyanselage Imila Maheshan Bandara Samarakoon', '2017/CSC/014', '3S', '2018/2019', NULL, NULL, NULL),
(35, 'Musthafa Lebbe Mohamed Sanoos', '2017/CSC/015', '3S', '2018/2019', NULL, NULL, NULL),
(36, 'Aluthgamaralalage Isuru Lakmal', '2017/CSC/016', '3S', '2018/2019', NULL, NULL, NULL),
(37, 'Mohommadhu Abdhul Rahoof Rifath Muhammadh', '2017/CSC/017', '3S', '2018/2019', NULL, NULL, NULL),
(38, 'Elackshana Manivannan', '2017/CSC/018', '3S', '2018/2019', NULL, NULL, NULL),
(39, 'Mohammed Hilmy Mohammed Himaz', '2017/CSC/019', '3S', '2018/2019', NULL, NULL, NULL),
(40, 'Mohamed Ismail Ahamed Aneeque', '2017/CSC/020', '3S', '2018/2019', NULL, NULL, NULL),
(41, 'Mohommadhu Hanifa Mohommadhu Hisham', '2017/CSC/021', '3S', '2018/2019', NULL, NULL, NULL),
(42, 'Dilki Hasara Wickramasinghe', '2017/CSC/022', '3S', '2018/2019', NULL, NULL, NULL),
(43, 'Mathusha Mathiyalagan', '2017/CSC/023', '3S', '2018/2019', NULL, NULL, NULL),
(44, 'Mapa Mudiyanselage Madhawa Heshan Thilakarathne', '2017/CSC/024', '3S', '2018/2019', NULL, NULL, NULL),
(45, 'Pahala Bathjala Walavve Lahiru Madusanka', '2017/CSC/025', '3S', '2018/2019', NULL, NULL, NULL),
(46, 'Wijesundara lekamlage Chamika Sandaruwan Wijesundara', '2017/CSC/026', '3S', '2018/2019', NULL, NULL, NULL),
(47, 'Panadura Acharige Wijesundara Gunathilaka Ramesh Perera', '2017/CSC/027', '3S', '2018/2019', NULL, NULL, NULL),
(48, 'Dissanayaka Mudiyanselage Sudula Kumara Dissanayaka', '2017/CSC/028', '3S', '2018/2019', NULL, NULL, NULL),
(49, 'Uthumalebbe Mohamed Afrid', '2017/CSC/029', '3S', '2018/2019', NULL, NULL, NULL),
(50, 'Kishani Kandasamy', '2017/CSC/030', '3S', '2018/2019', NULL, NULL, NULL),
(51, 'Lansakara Herath Mudiyanselage Bisak Sampath Bandara', '2017/CSC/031', '3S', '2018/2019', NULL, NULL, NULL),
(52, 'Prathaban Kavin', '2017/CSC/032', '3S', '2018/2019', NULL, NULL, NULL),
(53, 'Pushpakantha Ajanthasiri Gamage', '2017/CSC/033', '3S', '2018/2019', NULL, NULL, NULL),
(54, 'Vetharsana Thangarajah', '2017/CSC/034', '3S', '2018/2019', NULL, NULL, NULL),
(55, 'Hewa Puwakdandawage Isuru Madushan', '2017/CSC/035', '3S', '2018/2019', NULL, NULL, NULL),
(56, 'Ekanayake Mudiyanselage Charith Gihan Ekanayake', '2017/CSC/036', '3S', '2018/2019', NULL, NULL, NULL),
(57, 'Panojah Nadarasa', '2017/CSC/037', '3S', '2018/2019', NULL, NULL, NULL),
(58, 'Meiyalagan Yathushanan', '2017/CSC/038', '3S', '2018/2019', NULL, NULL, NULL),
(59, 'Karthikesu Kogul', '2017/CSC/040', '3S', '2018/2019', NULL, NULL, NULL),
(60, 'Selvakumar Ranjithamalar', '2017/CSC/043', '3S', '2018/2019', NULL, NULL, NULL),
(61, 'mallawa Arachchige Heshan Nayanajith mallawarachchi', '2017/CSC/044', '3S', '2018/2019', NULL, NULL, NULL),
(62, 'Zahir Mohamed Ardil', '2017/CSC/045', '3S', '2018/2019', NULL, NULL, NULL),
(63, 'Sethukavalan Lokavanilavan', '2017/CSC/046', '3S', '2018/2019', NULL, NULL, NULL),
(64, 'Rathnayaka Mudiyanselage Lukshan kavinda', '2017/CSC/047', '3S', '2018/2019', NULL, NULL, NULL),
(65, 'Herath Mudiyanselage Cathuranga Sanjeewa rathnayake', '2017/CSC/048', '3S', '2018/2019', NULL, NULL, NULL),
(66, 'Nawab Yousufi', '2017/CSC/FS/049', '3S', '2018/2019', NULL, NULL, NULL),
(67, 'Sithamparanadesan Kumareasan', '2017/SP/005', '3G', '2018/2019', NULL, NULL, NULL),
(68, 'Sathiyaseelan Kosika', '2017/SP/010', '3G', '2018/2019', NULL, NULL, NULL),
(69, 'Mageswaran Janarthanan', '2017/SP/012', '3G', '2018/2019', NULL, NULL, NULL),
(70, 'Thuvaraka Thiraviyarasa', '2017/SP/013', '3G', '2018/2019', NULL, NULL, NULL),
(71, 'Nanthakumar Pakirathan', '2017/SP/017', '3G', '2018/2019', NULL, NULL, NULL),
(72, 'Vishnuga Sivakumaran', '2017/SP/002', '3M', '2018/2019', NULL, NULL, NULL),
(73, 'Thirisika Pragalathanan', '2017/SP/003', '3M', '2018/2019', NULL, NULL, NULL),
(74, 'Nishani Poovalingam', '2017/SP/006', '3M', '2018/2019', NULL, NULL, NULL),
(75, 'Nagaraja Senthuran', '2017/SP/008', '3M', '2018/2019', NULL, NULL, NULL),
(76, 'Mithusa Thillaivasan', '2017/SP/014', '3M', '2018/2019', NULL, NULL, NULL),
(77, 'Samsudeen Munawwar Ahamed', '2016/CSC/001', '4S', '2018/2019', NULL, NULL, NULL),
(78, 'Mohamed Ahamed Arham', '2016/CSC/002', '4S', '2018/2019', NULL, NULL, NULL),
(79, 'A.A.S.N.Athauda', '2016/CSC/003', '4S', '2018/2019', NULL, NULL, NULL),
(80, 'S.A.Samila Chanuka', '2016/CSC/004', '4S', '2018/2019', NULL, NULL, NULL),
(81, 'R.H.S.L.Dilshan', '2016/CSC/005', '4S', '2018/2019', NULL, NULL, NULL),
(82, 'Ketheeswaran Abiram', '2016/SP/002', '4M', '2018/2019', NULL, NULL, NULL),
(83, 'Kesavi Kanesalingam', '2016/SP/051', '4M', '2018/2019', NULL, NULL, NULL),
(84, 'Sivananthan Marujan', '2016/SP/072', '4M', '2018/2019', NULL, NULL, NULL),
(85, 'Lavanya Ratnabala', '2016/SP/102', '4M', '2018/2019', NULL, NULL, NULL),
(86, 'Luxana Sivakumaran', '2016/SP/116', '4M', '2018/2019', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 1, '$2y$10$bLD9v4Llf9NG07IHvbOlwus1HnEcSFVSoBSC3rIPno8OQniaaNwJ2', NULL, '2020-12-18 04:19:43', '2020-12-18 04:19:43'),
(2, 'User', 'user@gmail.com', NULL, 0, '$2y$10$vVjdN6fyhhOevIhw1SPVzeEFr0t3z2C1JYr0yklYIPOqckA15UDFK', NULL, '2020-12-18 04:19:43', '2020-12-18 04:19:43'),
(3, 'Jatheesan', 'srijathee@gmail.com', NULL, 0, '$2y$10$0jGCnCjrdZ5UmROsJDhle.cqvBtLr0RhsMnXFE19Qv3iRo.0WNoqK', NULL, '2021-01-12 06:21:52', '2021-01-12 06:21:52'),
(4, 'Jatheesan', 'srijathees@gmail.com', NULL, 0, '$2y$10$pfJJkFDam6dQ7Knp0nVFWu.SPVI602Gwl0JWY0GLxUGqttp7hofKm', NULL, '2021-01-12 06:24:47', '2021-01-12 06:24:47'),
(5, 'ramanan', 'a.ramanan@univ.jfn.ac.lk', NULL, 0, '$2y$10$a6yZtqTxoY4skmKuVDy1I.cb5dyg33FLbuJnBzWEj2lHVbJdXUybq', NULL, '2021-01-18 00:10:30', '2021-01-20 08:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`id`, `name`, `value`) VALUES
(1, 'semester', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_3_g__students`
--
ALTER TABLE `attendance_3_g__students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_3_m__students`
--
ALTER TABLE `attendance_3_m__students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_3_s__students`
--
ALTER TABLE `attendance_3_s__students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `courses_course_code_unique` (`course_code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`lect_id`),
  ADD UNIQUE KEY `lecturers_lect_email_unique` (`lect_email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`st_id`),
  ADD UNIQUE KEY `students_st_regno_unique` (`st_regno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_3_g__students`
--
ALTER TABLE `attendance_3_g__students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance_3_m__students`
--
ALTER TABLE `attendance_3_m__students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance_3_s__students`
--
ALTER TABLE `attendance_3_s__students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `lect_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `st_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
