-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2020 at 04:20 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int UNSIGNED NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('admin01', 1, '$2y$10$PJKEyFq/XDLbB.zkM8yvA.Gje3yPdd30fKCs7Jr/lzzp9COhEwuem', 'uogjBwGdCieO9S1jswhqTlXazJZzoFL9ZyReBJeso4gtppKHyEkp9MKJcelT', '2020-09-02 12:08:44', '2020-09-02 12:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `subjectid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`subjectid`, `year`, `term`, `section`, `teacher`, `created_at`, `updated_at`) VALUES
('517212', '2563', '1', '1', 'apisake', NULL, NULL),
('517212', '2563', '1', '2', 'apisake', NULL, NULL),
('517212', '2563', '1', '3', 'apisake', NULL, NULL),
('517212-55', '2563', '1', '1', 'apisake', NULL, NULL),
('ว32217', '2563', '1', '1', 'apisake', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseinfo`
--

CREATE TABLE `courseinfo` (
  `subjectid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thainame` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `englishname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `Info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courseinfo`
--

INSERT INTO `courseinfo` (`subjectid`, `year`, `term`, `section`, `thainame`, `englishname`, `status`, `Info`, `created_at`, `updated_at`) VALUES
('517212', '2563', '1', '1', 'การออกแบบวงจรเชิงตรรก', 'Digital Logic Design', 0, NULL, NULL, NULL),
('517212', '2563', '1', '2', 'การออกแบบวงจรเชิงตรรก', 'Digital Logic Design', 0, NULL, NULL, NULL),
('517212', '2563', '1', '3', 'การออกแบบวงจรเชิงตรรก', 'Digital Logic Design', 0, NULL, NULL, NULL),
('517212-55', '2563', '1', '1', 'การออกแบบวงจรเชิงตรรก', 'Digital Logic Design', 0, NULL, NULL, NULL),
('ว32217', '2563', '1', '1', 'ระบบสมองกลฝังตัวและการประยุกต์ใช้', 'Embedded Systems and Applications', 0, NULL, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_08_23_140711_create_admins_table', 1),
(4, '2020_08_23_140839_create_teachers_table', 1),
(5, '2020_08_24_092453_create_course_table', 1),
(6, '2020_08_24_092508_create_courseinfo_table', 1),
(7, '2020_08_24_092521_create_score_table', 1),
(8, '2020_08_24_092535_create_scoreinfo_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `subjectid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `scoreid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentid` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`subjectid`, `year`, `term`, `section`, `scoreid`, `studentid`, `point`) VALUES
('517212', '2563', '1', '1', '1', '620710031', 16.00),
('517212', '2563', '1', '1', '1', '620710035', 26.25),
('517212', '2563', '1', '1', '1', '620710112', 9.25),
('517212', '2563', '1', '1', '1', '620710113', 22.00),
('517212', '2563', '1', '1', '1', '620710115', 27.25),
('517212', '2563', '1', '1', '1', '620710116', 18.50),
('517212', '2563', '1', '1', '1', '620710117', 28.75),
('517212', '2563', '1', '1', '1', '620710126', 23.00),
('517212', '2563', '1', '1', '1', '620710133', 18.00),
('517212', '2563', '1', '1', '1', '620710135', 18.50),
('517212', '2563', '1', '1', '1', '620710137', 9.00),
('517212', '2563', '1', '1', '1', '620710138', 14.25),
('517212', '2563', '1', '1', '1', '620710288', 5.75),
('517212', '2563', '1', '1', '1', '620710289', 11.25),
('517212', '2563', '1', '1', '1', '620710291', 1.50),
('517212', '2563', '1', '1', '1', '620710294', 4.25),
('517212', '2563', '1', '1', '1', '620710299', 10.25),
('517212', '2563', '1', '1', '1', '620710311', 4.00),
('517212', '2563', '1', '1', '1', '620710314', 6.75),
('517212', '2563', '1', '1', '1', '620710319', 3.00),
('517212', '2563', '1', '1', '1', '620710320', 9.00),
('517212', '2563', '1', '1', '1', '620710321', 14.50),
('517212', '2563', '1', '1', '1', '620710328', 4.50),
('517212', '2563', '1', '1', '1', '620710332', 12.50),
('517212', '2563', '1', '1', '1', '620710333', 6.50),
('517212', '2563', '1', '1', '1', '620710337', 6.25),
('517212', '2563', '1', '1', '1', '620710338', 0.00),
('517212', '2563', '1', '1', '1', '620710340', 11.50),
('517212', '2563', '1', '1', '1', '620710341', 10.25),
('517212', '2563', '1', '1', '1', '620710651', 12.00),
('517212', '2563', '1', '1', '1', '620710663', 17.50),
('517212', '2563', '1', '1', '1', '620710665', 12.25),
('517212', '2563', '1', '1', '1', '620710667', 0.00),
('517212', '2563', '1', '1', '1', '620710675', 6.75),
('517212', '2563', '1', '1', '1', '620710681', 16.25),
('517212', '2563', '1', '1', '1', '620710685', 11.25),
('517212', '2563', '1', '1', '1', '620710686', 14.50),
('517212', '2563', '1', '1', '1', '620710774', 0.75),
('517212', '2563', '1', '2', '1', '07610446', 7.50),
('517212', '2563', '1', '2', '1', '620710036', 13.75),
('517212', '2563', '1', '2', '1', '620710110', 14.00),
('517212', '2563', '1', '2', '1', '620710121', 16.25),
('517212', '2563', '1', '2', '1', '620710124', 16.50),
('517212', '2563', '1', '2', '1', '620710127', 10.00),
('517212', '2563', '1', '2', '1', '620710128', 14.25),
('517212', '2563', '1', '2', '1', '620710130', 2.75),
('517212', '2563', '1', '2', '1', '620710131', 7.50),
('517212', '2563', '1', '2', '1', '620710132', 5.25),
('517212', '2563', '1', '2', '1', '620710134', 6.00),
('517212', '2563', '1', '2', '1', '620710287', 12.25),
('517212', '2563', '1', '2', '1', '620710290', 7.00),
('517212', '2563', '1', '2', '1', '620710293', 9.75),
('517212', '2563', '1', '2', '1', '620710306', 13.75),
('517212', '2563', '1', '2', '1', '620710312', 16.50),
('517212', '2563', '1', '2', '1', '620710313', 20.50),
('517212', '2563', '1', '2', '1', '620710315', 1.75),
('517212', '2563', '1', '2', '1', '620710323', 5.50),
('517212', '2563', '1', '2', '1', '620710325', 12.75),
('517212', '2563', '1', '2', '1', '620710330', 4.50),
('517212', '2563', '1', '2', '1', '620710336', 9.00),
('517212', '2563', '1', '2', '1', '620710339', 8.75),
('517212', '2563', '1', '2', '1', '620710374', 18.75),
('517212', '2563', '1', '2', '1', '620710467', 15.75),
('517212', '2563', '1', '2', '1', '620710648', 11.00),
('517212', '2563', '1', '2', '1', '620710653', 13.75),
('517212', '2563', '1', '2', '1', '620710654', 16.00),
('517212', '2563', '1', '2', '1', '620710655', 8.75),
('517212', '2563', '1', '2', '1', '620710657', 18.75),
('517212', '2563', '1', '2', '1', '620710658', 16.75),
('517212', '2563', '1', '2', '1', '620710660', 5.00),
('517212', '2563', '1', '2', '1', '620710664', 8.75),
('517212', '2563', '1', '2', '1', '620710669', 0.00),
('517212', '2563', '1', '2', '1', '620710670', 14.25),
('517212', '2563', '1', '2', '1', '620710671', 5.50),
('517212', '2563', '1', '2', '1', '620710672', 7.00),
('517212', '2563', '1', '2', '1', '620710678', 1.75),
('517212', '2563', '1', '2', '1', '620710679', 12.75),
('517212', '2563', '1', '2', '1', '620710683', 10.00),
('517212', '2563', '1', '2', '1', '620710689', 7.25),
('517212', '2563', '1', '2', '1', '620710690', 0.00),
('517212', '2563', '1', '2', '1', '620710691', 6.75),
('517212', '2563', '1', '2', '1', '620710771', 8.75),
('517212', '2563', '1', '2', '1', '620710821', 4.25),
('517212', '2563', '1', '3', '1', '620710120', 3.50),
('517212', '2563', '1', '3', '1', '620710122', 1.75),
('517212', '2563', '1', '3', '1', '620710129', 7.75),
('517212', '2563', '1', '3', '1', '620710136', 6.00),
('517212', '2563', '1', '3', '1', '620710298', 0.25),
('517212', '2563', '1', '3', '1', '620710300', 3.00),
('517212', '2563', '1', '3', '1', '620710303', 9.75),
('517212', '2563', '1', '3', '1', '620710305', 3.75),
('517212', '2563', '1', '3', '1', '620710309', 1.00),
('517212', '2563', '1', '3', '1', '620710317', 5.00),
('517212', '2563', '1', '3', '1', '620710326', 4.75),
('517212', '2563', '1', '3', '1', '620710327', 6.00),
('517212', '2563', '1', '3', '1', '620710335', 4.75),
('517212', '2563', '1', '3', '1', '620710650', 21.00),
('517212', '2563', '1', '3', '1', '620710659', 14.25),
('517212', '2563', '1', '3', '1', '620710661', 12.25),
('517212', '2563', '1', '3', '1', '620710666', 2.75),
('517212', '2563', '1', '3', '1', '620710682', 6.50),
('517212', '2563', '1', '3', '1', '620710728', 23.50),
('517212', '2563', '1', '3', '1', '620710766', 6.00),
('517212', '2563', '1', '3', '1', '620710769', 1.00),
('517212', '2563', '1', '3', '1', '620710778', 4.00),
('517212', '2563', '1', '3', '1', '620710779', 7.75),
('517212', '2563', '1', '3', '1', '620710820', 8.00),
('517212', '2563', '1', '3', '1', '620710827', 1.75),
('517212', '2563', '1', '3', '1', '620710832', 6.50),
('517212-55', '2563', '1', '1', '1', '07560001', 15.00),
('517212-55', '2563', '1', '1', '1', '07560462', 21.25),
('517212-55', '2563', '1', '1', '1', '07590494', 14.25),
('517212-55', '2563', '1', '1', '1', '07590514', 5.00),
('517212-55', '2563', '1', '1', '1', '620710120', 3.50),
('517212-55', '2563', '1', '1', '1', '620710122', 1.75),
('517212-55', '2563', '1', '1', '1', '620710129', 7.75),
('517212-55', '2563', '1', '1', '1', '620710136', 6.00),
('517212-55', '2563', '1', '1', '1', '620710298', 0.25),
('517212-55', '2563', '1', '1', '1', '620710300', 3.00),
('517212-55', '2563', '1', '1', '1', '620710303', 9.75),
('517212-55', '2563', '1', '1', '1', '620710305', 3.75),
('517212-55', '2563', '1', '1', '1', '620710309', 1.00),
('517212-55', '2563', '1', '1', '1', '620710317', 5.00),
('517212-55', '2563', '1', '1', '1', '620710326', 4.75),
('517212-55', '2563', '1', '1', '1', '620710327', 6.00),
('517212-55', '2563', '1', '1', '1', '620710335', 4.75),
('517212-55', '2563', '1', '1', '1', '620710650', 21.00),
('517212-55', '2563', '1', '1', '1', '620710659', 14.25),
('517212-55', '2563', '1', '1', '1', '620710661', 12.25),
('517212-55', '2563', '1', '1', '1', '620710666', 2.75),
('517212-55', '2563', '1', '1', '1', '620710682', 6.50),
('517212-55', '2563', '1', '1', '1', '620710728', 23.50),
('517212-55', '2563', '1', '1', '1', '620710766', 6.00),
('517212-55', '2563', '1', '1', '1', '620710769', 1.00),
('517212-55', '2563', '1', '1', '1', '620710778', 4.00),
('517212-55', '2563', '1', '1', '1', '620710779', 7.75),
('517212-55', '2563', '1', '1', '1', '620710820', 8.00),
('517212-55', '2563', '1', '1', '1', '620710827', 1.75),
('517212-55', '2563', '1', '1', '1', '620710832', 6.50),
('ว32217', '2563', '1', '1', '1', '11111', 23.00),
('ว32217', '2563', '1', '1', '2', '11111', 19.00),
('ว32217', '2563', '1', '1', '1', '14018', 24.00),
('ว32217', '2563', '1', '1', '2', '14018', 17.00),
('ว32217', '2563', '1', '1', '1', '14044', 23.00),
('ว32217', '2563', '1', '1', '2', '14044', 18.00),
('ว32217', '2563', '1', '1', '1', '16129', 24.00),
('ว32217', '2563', '1', '1', '2', '16129', 16.00),
('ว32217', '2563', '1', '1', '1', '16130', 25.00),
('ว32217', '2563', '1', '1', '2', '16130', 15.00),
('ว32217', '2563', '1', '1', '1', '16131', 24.00),
('ว32217', '2563', '1', '1', '2', '16131', 16.00),
('ว32217', '2563', '1', '1', '1', '16132', 24.00),
('ว32217', '2563', '1', '1', '2', '16132', 17.00),
('ว32217', '2563', '1', '1', '1', '16133', 24.00),
('ว32217', '2563', '1', '1', '2', '16133', 17.00),
('ว32217', '2563', '1', '1', '1', '16134', 24.00),
('ว32217', '2563', '1', '1', '2', '16134', 15.00),
('ว32217', '2563', '1', '1', '1', '16135', 22.00),
('ว32217', '2563', '1', '1', '2', '16135', 12.00),
('ว32217', '2563', '1', '1', '1', '16136', 23.00),
('ว32217', '2563', '1', '1', '2', '16136', 17.00),
('ว32217', '2563', '1', '1', '1', '16137', 24.00),
('ว32217', '2563', '1', '1', '2', '16137', 15.00),
('ว32217', '2563', '1', '1', '1', '16138', 21.00),
('ว32217', '2563', '1', '1', '2', '16138', 13.00),
('ว32217', '2563', '1', '1', '1', '16139', 24.00),
('ว32217', '2563', '1', '1', '2', '16139', 13.00),
('ว32217', '2563', '1', '1', '1', '16140', 22.00),
('ว32217', '2563', '1', '1', '2', '16140', 16.00),
('ว32217', '2563', '1', '1', '1', '16141', 24.00),
('ว32217', '2563', '1', '1', '2', '16141', 16.00),
('ว32217', '2563', '1', '1', '1', '16142', 23.00),
('ว32217', '2563', '1', '1', '2', '16142', 15.00),
('ว32217', '2563', '1', '1', '1', '16143', 22.00),
('ว32217', '2563', '1', '1', '2', '16143', 14.00),
('ว32217', '2563', '1', '1', '1', '16144', 22.00),
('ว32217', '2563', '1', '1', '2', '16144', 12.00),
('ว32217', '2563', '1', '1', '1', '16145', 23.00),
('ว32217', '2563', '1', '1', '2', '16145', 12.00),
('ว32217', '2563', '1', '1', '1', '16146', 24.00),
('ว32217', '2563', '1', '1', '2', '16146', 14.00),
('ว32217', '2563', '1', '1', '1', '16147', 22.00),
('ว32217', '2563', '1', '1', '2', '16147', 18.00),
('ว32217', '2563', '1', '1', '1', '16148', 22.00),
('ว32217', '2563', '1', '1', '2', '16148', 18.00),
('ว32217', '2563', '1', '1', '1', '16149', 25.00),
('ว32217', '2563', '1', '1', '2', '16149', 18.00),
('ว32217', '2563', '1', '1', '1', '16150', 21.00),
('ว32217', '2563', '1', '1', '2', '16150', 18.00),
('ว32217', '2563', '1', '1', '1', '16151', 24.00),
('ว32217', '2563', '1', '1', '2', '16151', 18.00),
('ว32217', '2563', '1', '1', '1', '16152', 22.00),
('ว32217', '2563', '1', '1', '2', '16152', 18.00),
('ว32217', '2563', '1', '1', '1', '16153', 21.00),
('ว32217', '2563', '1', '1', '2', '16153', 19.00),
('ว32217', '2563', '1', '1', '1', '16154', 22.00),
('ว32217', '2563', '1', '1', '2', '16154', 16.00);

-- --------------------------------------------------------

--
-- Table structure for table `scoreinfo`
--

CREATE TABLE `scoreinfo` (
  `subjectid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `scoreid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scoreinfo`
--

INSERT INTO `scoreinfo` (`subjectid`, `year`, `term`, `section`, `scoreid`, `info`) VALUES
('517212', '2563', '1', '1', '1', 'Midterm (30)'),
('517212', '2563', '1', '2', '1', 'Midterm (30)'),
('517212', '2563', '1', '3', '1', 'Midterm (30)'),
('517212-55', '2563', '1', '1', '1', 'Midterm (30)'),
('ว32217', '2563', '1', '1', '1', 'คะแนนเก็บ (25 คะแนน)'),
('ว32217', '2563', '1', '1', '2', 'คะแนนสอบกลางภาค (20 คะแนน)');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `createby` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `sname`, `username`, `password`, `createby`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'apisake', 'apisake', 'apisake', '$2y$10$1o18v.5HCL69ur7QcFkH0OJL.jEjuDcn7EOtK7AyHEtHuD3JdnKlK', 'admin01', NULL, '2020-09-02 08:18:08', '2020-09-02 08:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `studentid` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thainame` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thailastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `studentid`, `name`, `lastname`, `thainame`, `thailastname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '07560001', 'tai', 'tai', 'ไทย', 'ไทย', 'truank1331dunk1331@gmail.com', '2020-09-02 11:30:57', '$2y$10$LBgYz8pynakv/dDuXeVnEeNEijiJLSuJr5wPHo1hf.ywC69vHX2ym', NULL, '2020-09-02 11:28:55', '2020-09-02 11:30:57'),
(35, '07590494', 'Tanaporn', 'Ruttanapibool', 'ธนพร', 'รัตนพิบูลย์', 'Ruttanapibool_t@silpakorn.edu', '2020-09-18 02:56:03', '$2y$10$Wp96jzIcz2Um0Phi6vHuIOE.LxuUunvmHP/WNCAIGn/xgz/qAD5.y', NULL, '2020-09-18 02:54:30', '2020-09-18 02:56:03'),
(8, '07590514', 'Prattana', 'Jantarat', 'ปรารถนา', 'จันทรัตน์', 'Jantarat_p@silpakorn.edu', '2020-09-18 02:53:14', '$2y$10$Eob2RMMIELz/glgS7WHdXONS3nPAEFLEbPP6s12ExCjtp97CZAhE6', NULL, '2020-09-18 02:52:31', '2020-09-18 02:53:14'),
(1, '07600613', 'Kanisorn', 'Saeiaw', 'คณิศร', 'แซ่เอี๊ยว', 'netflix.ppn@gmail.com', '2020-09-02 00:45:00', '$2y$10$RIrfgcROqAxwdfkFXswFruUG4kmT8WA8wM13cPygHKWKbfO0eQkCi', NULL, '2020-09-02 00:42:57', '2020-09-02 00:45:00'),
(4, '07600666', 'dddd', 'ffff', 'aaaa', 'ssss', 'SAEIAW_K@silpakorn.edu', '2020-09-15 23:31:26', '$2y$10$lvr25/BLmydpltq3vi9J/..hyCKppzv4b0VVWLqoJNg8CDYaKjO36', NULL, '2020-09-15 23:14:06', '2020-09-15 23:31:26'),
(5, '07610613', 'Job', 'Jab', 'จ๊อบ', 'แจ๊บ', 'truank1331dunk1331@hotmail.com', '2020-09-17 02:03:56', '$2y$10$LwdkOrMngOOyKantquTG8eXEzTKlnoQP.WWLS/1IlzCtkXOFtNM3i', NULL, '2020-09-17 02:03:31', '2020-09-17 02:03:56'),
(127, '11111', 'Sirindhorn', 'Silpakorn', 'สิรินทร', 'ศิลปากร', 'hongwitayakorn_a@silpakorn.edu', '2020-09-18 15:05:42', '$2y$10$oqPNYMutw8j2wzfRPwOvvOE6ukzcPjAi2sqrftZt6Zb.eswq3GX6i', NULL, '2020-09-18 15:05:06', '2020-09-18 15:05:42'),
(162, '14018', 'Witsanu', 'Phonphaowanaloed', 'วิษณุ', 'พรภาวนาเลิศ', 'phonphaowanaler_w@silpakorn.edu', NULL, '$2y$10$TapBWCZTZ77xk3Dq7mcpGuz.UgpbY8pn8EF/kf3./3VlzGaywbtJ2', NULL, '2020-09-22 15:13:40', '2020-09-22 15:13:40'),
(144, '14044', 'Sopida', 'Rakprathum', 'โสภิดา', 'รักประทุม', 'rakprathum_s@silpakorn.edu', '2020-09-22 15:04:50', '$2y$10$Mc8wCVogiOfVdwVYvL87xedET5GlsSFf8MAluqEfyBzqoZlv3r/lq', NULL, '2020-09-22 15:01:29', '2020-09-22 15:04:50'),
(140, '16129', 'Khwanchanok', 'Thitawannonate', 'ขวัญชนก', 'ฐิตวรรณโณเนตร์', 'thitawannonate_k@silpakorn.edu', '2020-09-22 15:02:07', '$2y$10$SvgJtGhnV7G71F/kxQoRd.cAO2Iy6fsTBGskbOshwDw8wGGqdNbCG', NULL, '2020-09-22 15:00:55', '2020-09-22 15:02:07'),
(156, '16130', 'Jutaporn', 'Jitrada', 'จุฑาพร', 'จิตรดา', 'jitrada_j@silpakorn.edu', '2020-09-22 15:07:51', '$2y$10$Fm9jsRq2JmiPb9RLe94hJ.pPlb2cil7HzINoE4PkTsBBuBcHYMYR6', NULL, '2020-09-22 15:06:08', '2020-09-22 15:07:51'),
(151, '16131', 'Julaluk', 'Jiemjiraset', 'จุฬาลักษณ์', 'เจียมจิระเศรษฐ์', 'jiemjiraset_j@silpakorn.edu', '2020-09-22 15:06:30', '$2y$10$g8cVabhZy9V5LjDq4HViiuGREzyHKdIbYXEqpZjhb.S0HbUDLy89S', NULL, '2020-09-22 15:04:56', '2020-09-22 15:06:30'),
(145, '16132', 'Chanikan', 'Kodchaplai', 'ชนิกานต์', 'คชพลาย', 'kodchaplai_c@silpakorn.edu', '2020-09-22 15:04:21', '$2y$10$UxLgfsUVIyJI5IdJbEO2p.V1AoNNTWBXtMjMf8dEeM6HMe0bzAwse', NULL, '2020-09-22 15:01:44', '2020-09-22 15:04:21'),
(154, '16133', 'chanyanut', 'promkhan', 'ชัญญานุช', 'พรมขัน', 'promkhan_c@silpakorn.edu', '2020-09-22 15:07:17', '$2y$10$exi8vzkj0NjN96MEomCGa.9gUVUAzbKTWJIr1/Lu2EHkfpbUyyGZS', NULL, '2020-09-22 15:05:54', '2020-09-22 15:07:17'),
(141, '16134', 'Nayada', 'Panyasit', 'ณญาดา', 'ปัญญาสิทธิ์', 'panyasit_n@silpakorn.edu', '2020-09-22 15:02:06', '$2y$10$2iJjnRoOn1IAUw1kBQsEI.oc1HZSXKUYHTx69ye2FWp1JXU32/Xpa', NULL, '2020-09-22 15:01:03', '2020-09-22 15:02:06'),
(146, '16135', 'Natthaphat', 'Prachumsan', 'ณัฐภัทร', 'ประชุมสาร', 'prachumsan_n@silpakorn.edu', '2020-09-22 15:03:40', '$2y$10$OoUVlTHF5be4dmzaeTzeAOE1W7wkrfzSIY9v.1lvIM6v593plClnO', NULL, '2020-09-22 15:02:29', '2020-09-22 15:03:40'),
(143, '16136', 'Thanatcha', 'Kallakul', 'ธนัชชา', 'กัลกุล', 'kallakul_t@silpakorn.edu', '2020-09-22 15:03:15', '$2y$10$7jc2mcYhV22fB22DW2zlcuEumRi8sl0Igr8SkZTY.PheRx1JeMsCW', NULL, '2020-09-22 15:01:27', '2020-09-22 15:03:15'),
(149, '16137', 'Thidarat', 'Promjabok', 'ธิดารัตน์', 'พร้อมจะบก', 'promjabok_t@silpakorn.edu', '2020-09-22 15:07:38', '$2y$10$i9WvqmmYXFaXCiSYp.TwSui4MiWIt72YJV7tBgryqfZ5IkctYpqfG', NULL, '2020-09-22 15:04:08', '2020-09-22 15:07:38'),
(138, '16138', 'Napatsorn', 'Phuhirun', 'นภัสสร', 'พุหิรัญ', 'phuhirun_n@silpakorn.edu', '2020-09-22 15:02:10', '$2y$10$o8g0LvGq4n5VVFQvY/o80e6XUtxeCpy9gkraWO3WGURCZN5kHIduO', NULL, '2020-09-22 15:00:31', '2020-09-22 15:02:10'),
(142, '16139', 'Niracha', 'Hongwengjan', 'นิรชา', 'หงษ์เวียงจันทร์', 'HONGWENGJAN_N@silpakorn.edu', '2020-09-22 15:03:27', '$2y$10$JgYpLpQVZ3DjPTlhtbJn8uhwhqEvf3hPTQ7/z3qw8JfN1LLQ7J4KG', NULL, '2020-09-22 15:01:14', '2020-09-22 15:03:27'),
(147, '16141', 'pattaramon', 'ekamanorat', 'ภัทรมน', 'เอกมโนรัตน์', 'ekamanorat_p@silpakorn.edu', '2020-09-22 15:04:02', '$2y$10$h5WUbjrWpMIYbkgoY9JzoOVOw1XF/s651330dKJm5g550vCRb/Cja', NULL, '2020-09-22 15:02:54', '2020-09-22 15:04:02'),
(137, '16142', 'Raiwinvorada', 'Kiathchanokkul', 'ไรวินท์วรดา', 'เกียรติชนกกุล', 'kiathchanokkul_r@silpakorn.edu', '2020-09-22 15:04:23', '$2y$10$v5U6yrV40hM.iJH7b7KOBOf41zrXQAPXnFk/8as5oL3FaejDsONlK', NULL, '2020-09-22 15:00:26', '2020-09-22 15:04:23'),
(161, '16143', 'Laksika', 'Mingnongao', 'ลักษิกา', 'มิ่งหนองอ้อ', 'mingnongao_l@silpakorn.edu', '2020-09-22 15:09:02', '$2y$10$hRvPihYBxonwp9LPlYf57er6jwaXfMUgq44rmiBwabryfuMwGQaqG', NULL, '2020-09-22 15:07:36', '2020-09-22 15:09:02'),
(139, '16144', 'Watcharamon', 'Suphaphon', 'วัชรมน', 'สุภาผล', 'suphaphon_w@silpakorn.edu', '2020-09-22 15:02:12', '$2y$10$YC3EU9R9Q5aHBwUL6jVG5eCtGL.CvZadjboS6B0CQlA5buvXQ3q5C', NULL, '2020-09-22 15:00:45', '2020-09-22 15:02:12'),
(160, '16145', 'sasima', 'muenchamnan', 'ศศิมาล์', 'หมื่นชำนาญ', 'muenchamnan_s@silpakorn.edu', '2020-09-22 15:08:58', '$2y$10$/Mxc.XSMiD71T9I3jnvquugvlv1XmN9bPT4OvX7sIbEJg9O3DCqrm', NULL, '2020-09-22 15:07:25', '2020-09-22 15:08:58'),
(136, '16146', 'Sarocha', 'Sombutjaroan', 'สโรชา', 'สมบัติเจริญ', 'sombutjaroan@silpakorn.edu', NULL, '$2y$10$pCPJH/UvmAFGrGcPXluTc.ZX76bboRQFv0BCx4lOge9f9WTfhEglS', NULL, '2020-09-22 15:00:25', '2020-09-22 15:00:25'),
(157, '16147', 'Supitcha', 'Wisescharoen', 'สุพิชชา', 'วิเศษเจริญ', 'wisescharoen_s@silpakorn.edu', '2020-09-22 15:06:56', '$2y$10$HsOqL4NdA1xafBhC29veC.RQtiyAVO6lKjlu2VzmirzMvv71gX5/.', NULL, '2020-09-22 15:06:09', '2020-09-22 15:06:56'),
(148, '16148', 'Tanadol', 'Phoyoo', 'ฐนดล', 'โพธิ์อยู่', 'phoyoo_t@silpakorn.edu', '2020-09-22 15:05:24', '$2y$10$ckXwqKxIwziyjD4/j7iu.Og/eguZxQ0Ax0pbxd.8OZDQvLQw2EABW', NULL, '2020-09-22 15:04:03', '2020-09-22 15:05:24'),
(152, '16149', '์Nathawat', 'Chan-iat', 'ณฐวรรต', 'จันทร์เอียด', 'chan-iat_N@silpakorn.edu', '2020-09-22 15:06:56', '$2y$10$0s4h8CMfQfiicjSHJAzXAOMBrlfarcc4GBu..OSxQozEfMJASc6nO', NULL, '2020-09-22 15:05:10', '2020-09-22 15:06:56'),
(159, '16150', 'Napat', 'Cholkuljana', 'ณภัทร', 'ชลกุลจนา', 'cholkuljana_n@silpakorn.edu', '2020-09-22 15:08:05', '$2y$10$7.ojoNvc9bHJW3mJMbHO9e6w9t7A/6AZAqrccdHiKdt9qhbxpv7ki', NULL, '2020-09-22 15:06:43', '2020-09-22 15:08:05'),
(158, '16151', 'nattakit', 'nuangnaowarat', 'ณัฐกิตติ์', 'เนื่องเนาวรัตน์', 'NUANGNAOWARAT_N@silpakorn.edu', '2020-09-22 15:08:40', '$2y$10$ng770rHtB1twHwsa9a0jHOC63Pvj0cwayJhfQzbjV3mHWo6HWI7Ai', NULL, '2020-09-22 15:06:12', '2020-09-22 15:08:40'),
(155, '16152', 'Passakorn', 'Naka', 'ภาสกร', 'นาคา', 'NAKA_P@silpakorn.edu', NULL, '$2y$10$OBjLM2Slw/gFjMUwGweBwOmXNhuFrfjYxpYxdDaW5NWjyTVhgK28a', NULL, '2020-09-22 15:05:56', '2020-09-22 15:05:56'),
(150, '16153', 'Waranon', 'Kaewket', 'วรานนท์', 'แก้วเกตุ', 'kaewket_w@silpakorn.edu', '2020-09-22 15:05:59', '$2y$10$ATL1lIqY1OajpwELJ663nu50j21LB9dvE4WEYZhpfUmin8vuY7xuq', NULL, '2020-09-22 15:04:17', '2020-09-22 15:05:59'),
(153, '16154', 'Supawit', 'Srinithiwat', 'ศุภวิชญ์', 'ศรีนิธิวัฒน์', 'srinithiwat_s@silpakorn.edu', '2020-09-22 15:06:23', '$2y$10$HiMBFdqXwQLUujgPWRObqOzI7fCsxWbCevJ1n9fUVMrieufR8DnSy', NULL, '2020-09-22 15:05:20', '2020-09-22 15:06:23'),
(17, '620710031', 'Teeraphat', 'Bubparam', 'ธีรภัทร', 'บุบผาราม', 'bubparam_t@silpakorn.edu', '2020-09-18 02:54:20', '$2y$10$aog3jDy0d4dMHr9pA8EV..pJlw/F9LhRMkbApOr.P0WUbPVuwedkW', NULL, '2020-09-18 02:52:56', '2020-09-18 02:54:20'),
(15, '620710035', 'Sittidet', 'Pawutinan', 'สิทธิเดช', 'ปวุตินันท์', 'pawutinan_s@silpakorn.edu', '2020-09-18 02:53:44', '$2y$10$LSktYqKUlRTOIKA8zjo8LezUjG8XeaBYMmqz7J05xUj.XEMkaZCTq', NULL, '2020-09-18 02:52:53', '2020-09-18 02:53:44'),
(51, '620710036', 'Apinya', 'Raksri', 'อภิญญา', 'รักษี', 'raksri_a@silpakorn.edu', '2020-09-18 03:29:51', '$2y$10$tfdoIi/tngMdRiMK5OxH7eipHBg/Racsok3Ox4AOi9zCcfwbrm..u', NULL, '2020-09-18 03:27:50', '2020-09-18 03:29:51'),
(55, '620710110', 'Kamonraphu', 'Yenjit', 'นายกมลภู', 'เย็นจิตร์', 'Yenjit_k@silpakorn.edu', '2020-09-18 03:32:15', '$2y$10$Iff.4miHWX2pS8yTFG4yW.krubt7wSVpUnpyi741R9.P2z2bgdbL6', NULL, '2020-09-18 03:31:33', '2020-09-18 03:32:15'),
(36, '620710112', 'Keetaya', 'Aunchokdee', 'คีตยา', 'อุ่นโชคดี', 'aunchokdee_k@silpakorn.edu', '2020-09-18 02:56:17', '$2y$10$3gx51NzSTzJypVvigOvdheXBN4EsaRDyqBoaGaDe.8B6Z8iXQ8cJW', NULL, '2020-09-18 02:55:27', '2020-09-18 02:56:17'),
(22, '620710113', 'Tul', 'Vannasaeng', 'ตุลย์', 'วรรณแสง', 'vannasaeng_t@silpakorn.edu', '2020-09-18 02:53:38', '$2y$10$26gLncANs9lWn5D0NAjKweT.tGFDp3yArOrVi00nEQ8cFW36cvDMG', NULL, '2020-09-18 02:53:10', '2020-09-18 02:53:38'),
(29, '620710115', 'Thanakorn', 'Hemsart', 'ธนกร', 'เหมศาสตร์', 'hemsart_t@silpakorn.edu', '2020-09-18 02:55:32', '$2y$10$U498Cgd5eRB7PqR.MzBBoeCoGkCxj7BCgq0s8RHHlcAcbBhtKz3JO', NULL, '2020-09-18 02:53:30', '2020-09-18 02:55:32'),
(12, '620710116', 'Thanakit', 'Meeyeam', 'ธนกฤต', 'มีแย้ม', 'meeyeam_t@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$k2KGJXYjI5kkpULa7ztPlepkU9cJogAIpPZdtdd2TX3S1VEK9iyee', NULL, '2020-09-18 02:52:53', '2020-09-18 02:52:53'),
(28, '620710117', 'Tanawat', 'Yuwansiri', 'ธนวัฒน์', 'ยุวรรณศิริ', 'yuwansiri_t@silpakorn.edu', '2020-09-18 02:54:04', '$2y$10$lZU/zBsDcCd760t0.yNSCeSoQPpnM66QaoMUGkGATvbI2H2gPATGK', NULL, '2020-09-18 02:53:29', '2020-09-18 02:54:04'),
(69, '620710121', 'Nonthakorn', 'Janchey', 'นนทกร', 'จั่นเชย', 'janchey_n@silpakorn.edu', '2020-09-18 11:26:26', '$2y$10$lsN7SsRutqVMd7B1aNycOucSc12CPfiLrQtLvGh8SKSV1MUq6Wen.', NULL, '2020-09-18 11:22:29', '2020-09-18 11:26:26'),
(108, '620710122', 'Nawanthorn', 'Parunggul', 'นวันธร', 'ภารังกูล', 'parunggul_n@silpakorn.edu', '2020-09-18 14:05:04', '$2y$10$YGsnc8LjMsyAxs2YPh2IiuaSi8ErSwUypycWCWlrg7Pqd861klL2W', NULL, '2020-09-18 14:03:43', '2020-09-18 14:05:04'),
(77, '620710124', 'Pongsakorn', 'Meenut', 'พงศกร', 'มีนุช', 'meenut_p@silpakorn.edu', '2020-09-18 11:23:38', '$2y$10$amSrvIRivxQpEfGrRyva0ultHquJPWBSbCzV6vYfDn.aj/fNGtggK', NULL, '2020-09-18 11:23:12', '2020-09-18 11:23:38'),
(24, '620710126', 'Pattadhon', 'Buaphuen', 'พัทธดนย์', 'บัวเผื่อน', 'bauphuen_p@silpakorn.edu', '2020-09-18 02:53:59', '$2y$10$y0vpi1C0/Vr7ss7yc36/KOTCAvTWXgyWpSkP4ACusJ/L082XP5ram', NULL, '2020-09-18 02:53:13', '2020-09-18 02:53:59'),
(85, '620710127', 'Phuthita', 'Sookhong', 'พุธิตา', 'สุขหงษ์', 'sookhong_p@silpakorn.edu', '2020-09-18 11:26:13', '$2y$10$/3dVs2kA2juAcx/njqju8e4PmLDL7THvW7I7mk2bj7BtfTqBGdj5i', NULL, '2020-09-18 11:24:20', '2020-09-18 11:26:13'),
(50, '620710128', 'Panupong', 'Tonpum', 'ภาณุพงศ์', 'ต้นพุ่ม', 'tonpum_p@silpakorn.edu', '2020-09-18 03:28:56', '$2y$10$WV/QYEoLFk4yYfHyVr2HuuAxsj.tf9A7.5MO0CdXhA9hXdzLDC1H.', NULL, '2020-09-18 03:27:46', '2020-09-18 03:28:56'),
(117, '620710129', 'Wanida', 'Chaiyawong', 'วนิดา', 'ไชยะวงษ์', 'Chaiyawong_w@silpakorn.edu', '2020-09-18 14:07:38', '$2y$10$dX/8WbZPT9/n.oVQEcaOJOcxHbyKyh5VQWNQq0GF9LSrtH.x2DbJ6', NULL, '2020-09-18 14:05:38', '2020-09-18 14:07:38'),
(91, '620710130', 'Wikorn', 'sangsuk', 'วิกรม์', 'แสงสุข', 'sangsuk_w3@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$wrJR.z6OIFzK9xDGqqchyOyGo4CF9Cn3zVGbeiL7xaNta27aCrqiW', NULL, '2020-09-18 11:27:32', '2020-09-18 11:27:32'),
(56, '620710131', 'Winotai', 'Saiyuenyong', 'วิโณทัย', 'สายยืนยง', 'saiyurnyong_w@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$wHrPCQrZ2PqunodNN3mA2.yen.jPF2f8u8BX2uYQVqpZqH8H7xDCy', NULL, '2020-09-18 03:34:41', '2020-09-18 03:34:41'),
(58, '620710132', 'Vipawan', 'Budjana', 'วิภาวรรณ', 'บุจนะ', 'budjana_v@silpakorn.edu', '2020-09-18 03:40:49', '$2y$10$NBldAQptlu.J2b.YF1yb3eF96og15YIqim69sdC73EvQDg.CrQFhu', NULL, '2020-09-18 03:38:59', '2020-09-18 03:40:49'),
(18, '620710133', 'Wutthichai', 'Mahakaew', 'วุฒิชัย', 'มหาแก้ว', 'MAHAKAEW_W@silpakorn.edu', '2020-09-18 02:53:27', '$2y$10$Vq7j9WSQQdGm.r3PpGnTiuv35GhXhag/ZrNrg2I9iiJHZzkd47ruq', NULL, '2020-09-18 02:52:57', '2020-09-18 02:53:27'),
(76, '620710134', 'SASITHORN', 'THIPPHROM', 'ศศิธร', 'ทิพพรหม', 'Thipphrom_s@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$CbztZHo3PrV6jsOSzzV.xOMOGEgcgnLtaPUsFrnGyCPXlqnW33M86', NULL, '2020-09-18 11:23:11', '2020-09-18 11:23:11'),
(11, '620710135', 'Supakarn', 'Yoojongdee', 'ศุภกานต์', 'อยู่จงดี', 'yoojongdee_s@silpakorn.edu', '2020-09-18 02:53:12', '$2y$10$BbRLHUk0ICv5vMFmj5C99.MXt5zPbaq3Jjh9ohac0Sfl07/Gr2Y/K', NULL, '2020-09-18 02:52:49', '2020-09-18 02:53:12'),
(105, '620710136', 'sitthisak', 'srisamran', 'สิทธิศักดิ์', 'ศรีสำราญ', 'srisamran_s5@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$QJiJ8PumdH9uetkzwvcsf.Brfd0LSO3tflc7kKmLuglDZTLNVJk1e', NULL, '2020-09-18 12:55:04', '2020-09-18 12:55:04'),
(34, '620710137', 'Siriwan', 'Amornpipat', 'สิริวรรณ', 'อมรพิพัฒน์', 'amornpipat_s@silpakorn.edu', '2020-09-18 02:55:13', '$2y$10$qh1U9YT8cSdPl9fB4EFuBuZeYO1PwSyupZG5vGSo/FghzOnT.q0iK', NULL, '2020-09-18 02:54:19', '2020-09-18 02:55:13'),
(65, '620710138', 'Harit', 'Phuakphid', 'หฤษฏ์', 'เผือกผุด', 'Phuakphud_H@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$A6oJfnXKTjE2LXceNRZHxery3SUj.jz0dpAzd0/0Ba9ulpgHp6CWe', NULL, '2020-09-18 11:02:32', '2020-09-18 11:02:32'),
(59, '620710287', 'Katanyuta', 'Unchan', 'กตัญญุตา', 'อุ่นจันทร์', 'unchan_k@silpakorn.edu', '2020-09-18 03:40:11', '$2y$10$PSHZtyEWx5aiml9sH/WUHO7Pw6AyFYtHhj1QBHQwkRttMk.FGefuu', NULL, '2020-09-18 03:39:22', '2020-09-18 03:40:11'),
(21, '620710288', 'Kanoknat', 'Chikhunthod', 'กนกนาฎ', 'ชิขุนทด', 'chikhunthod_k@silpakorn.edu', '2020-09-18 02:54:22', '$2y$10$UVutUNFfDOowJtsks7AjLugDGLNwHmbJ3IIFMpHZE/WVGEcrutc8i', NULL, '2020-09-18 02:53:03', '2020-09-18 02:54:22'),
(38, '620710289', 'Kornvanit', 'Panitcharoen', 'กรวณิชช์', 'พานิชเจริญ', 'panicharoen_k@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$pN2s8nW3fp.5E2Ly5YG/wuUa.O44RtucAL0ssZ0g3QlX9uFtrtQgW', NULL, '2020-09-18 03:02:09', '2020-09-18 03:02:09'),
(134, '620710291', 'Kanyanat', 'Pumiwatr', 'กัญาณัฐ', 'ภูมิวัตร', 'PUMIWATR_K@silpakorn.edu', '2020-09-21 14:02:14', '$2y$10$bN3.dcELjL8z6FdlwMLJueh8PBV/ehvEA6SYIKX3gwSnt3AbrB6c2', NULL, '2020-09-21 13:56:42', '2020-09-21 14:02:14'),
(74, '620710293', 'Kittiya', 'Rattanawong', 'กิตติยา', 'รัตนวงศ์', 'RATTANAWONG_K2@silpakron.edu', '2020-09-18 02:53:25', '$2y$10$NSsJUgySnrKUNNVGJ9RPhukp1OmpDGfnTJp8XDadJLpc1.VyobfoS', NULL, '2020-09-18 11:22:46', '2020-09-18 11:22:46'),
(39, '620710294', 'Kriangsak', 'Kanghae', 'เกรียงศักดิ์', 'กังแฮ', 'kanghae_k@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$yjA4qROc405M8JUGr16NR.XUw2SXg94TCpAK4cYOzh7bbUa2Wpo1K', NULL, '2020-09-18 03:04:37', '2020-09-18 03:19:17'),
(103, '620710299', 'Jittarin', 'Thanasintharathip', 'จิตริน', 'ธนะสินธราทิพย์', 'thanasintharath_j@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$FyEl5roOC7hLLyKXpU4M2.PqhuWGNRPTeueNoQ.3c8VETGTI2s3rW', NULL, '2020-09-18 12:24:49', '2020-09-18 12:24:49'),
(131, '620710300', 'Jindapon', 'Khuntha', 'จินดาพร', 'คุณฑา', 'khuntha_j@silpakorn.edu', '2020-09-21 10:04:35', '$2y$10$/PYBq2M/N64HL3U3EA5iDe1S5alQajc5lefpsIB2Qfw1qDD83vVbG', NULL, '2020-09-21 09:54:44', '2020-09-21 10:04:35'),
(106, '620710303', 'Chayanon', 'Is-saard', 'ชญานนท์', 'อิสสอาด', 'issaard_c@silpakorn.edu', '2020-09-18 14:04:21', '$2y$10$eyb846ZMIXjdiUKapFOxUOYgSnopY3Q5SHwh6HZ9MIT3RWcjNUjZW', NULL, '2020-09-18 14:03:35', '2020-09-18 14:04:21'),
(109, '620710305', 'Chonnipa', 'Suwimon', 'ชนม์นิภา', 'สุวิมล', 'suwimon_c@silpakorn.edu', '2020-09-18 14:05:01', '$2y$10$5u0zG7tHuRLsEdsZ9dUR8ORf036B9Ai9qsBXeQVDaE0zXFnuKF2Ni', NULL, '2020-09-18 14:03:44', '2020-09-18 14:05:01'),
(49, '620710306', 'Chonlada', 'Srisook', 'ชลลดา', 'ศรีสุข', 'srisook_c@silpakorn.edu', '2020-09-18 03:29:25', '$2y$10$a1nk0MKIsZ8uq06rQQyYi.J2PygI27swg/RvZZxLujhawL01Uiv9m', NULL, '2020-09-18 03:27:39', '2020-09-18 03:29:25'),
(120, '620710309', 'Nattanon', 'Khomsuea', 'ณัฐนนท์', 'ค่อมเสือ', 'khomsuea_n@silpakorn.edu', '2020-09-18 14:08:58', '$2y$10$7oIoluaaxDChcTvgOAAVYuP9jDirztK4NjfpaR5AAHArp.yu9e62q', NULL, '2020-09-18 14:07:25', '2020-09-18 14:08:58'),
(53, '620710312', 'Taweesak', 'Khumphakdee', 'นายทวีศักดิ์', 'คุ้มภักดี', 'khumphakdee_t@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$B2QfvuFohuwFS6owGyaXQeHN64LHBBuOD77x8Sz/ZvSLSzbb/i.di', NULL, '2020-09-18 03:29:26', '2020-09-18 03:29:26'),
(73, '620710313', 'Naphatsara', 'Thorngsophon', 'นภัสสรา', 'ทองโสภณ', 'thorngsophon_n@silpakorn.edu', '2020-09-18 11:40:09', '$2y$10$.jL0jFvAthv76sNPmMNY1e/seIbtrJWdgZbhCzeAfvdlKTxDRaYXm', NULL, '2020-09-18 11:22:44', '2020-09-18 11:40:09'),
(7, '620710314', 'PATHOMRIT', 'JARUTIKORN', 'ปฐมฤทธิ์', 'จารุทิกร', 'jarutikorn_p@silpakorn.edu', '2020-09-18 02:52:45', '$2y$10$NYRKpuqAoJ8ynFBhTjaPquJNZHSAsitvFJzokHMnoaZEXIosGb01C', NULL, '2020-09-18 02:52:19', '2020-09-18 02:52:45'),
(47, '620710315', 'Papichaya', 'Leardjankajon', 'ปพิชญา', 'เลิศจันทร์ขจร', 'leardjankajon_p@silpakorn.edu', '2020-09-18 03:23:32', '$2y$10$xGBID3OF5xa3lC.ZJCWM0.255PHjDAL.QH5OFTHdH/NxP4/ygojVq', NULL, '2020-09-18 03:22:27', '2020-09-18 03:23:32'),
(119, '620710317', 'Priyaporn', 'Kangam', 'ปรียาภรณ์', 'การงาม', 'kangam_p@silpakorn.edu', '2020-09-18 14:11:40', '$2y$10$ts.aOyDOrdIHyfZRbGJY8O/5PZFsVNMNJX1fpnuoEKWW8ycDO8c4C', NULL, '2020-09-18 14:06:08', '2020-09-18 14:11:40'),
(16, '620710319', 'Piyarut', 'Leawpirot', 'ปิยรัตน์', 'เลี่ยวไพโรจน์', 'LEAWPIROT_P@silpakorn.edu', '2020-09-18 02:54:11', '$2y$10$QFZcH/kIjF6EeviJnQ8sqO1361YYckII1/X2zKjqXLyzGSUgJGQYq', NULL, '2020-09-18 02:52:55', '2020-09-18 02:54:11'),
(26, '620710320', 'Parcharapon', 'Kongjay', 'พชรพล', 'กองจาย', 'kongjay_p@silpakorn.edu', '2020-09-18 02:53:56', '$2y$10$0lh68QjimQGd2p7TceFKAe0TlQTgAfCBb2D8py.XYeCZA6EIuzH3i', NULL, '2020-09-18 02:53:22', '2020-09-18 02:53:56'),
(14, '620710321', 'Pornchanok', 'Onsanit', 'พรชนก', 'อ่อนสนิท', 'onsanit_p@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$2mCvPrUshYp38ort70ar7.D7eAB0Kpp3UcvVyUAFr.BitgCJruLja', NULL, '2020-09-18 02:52:53', '2020-09-18 02:52:53'),
(93, '620710323', 'pannita', 'mingsumdang', 'พัณณิตา', 'มิ่งสำแดง', 'Mingsumdang_p@silpakorn.edu', '2020-09-18 11:32:01', '$2y$10$A76O8loARGwqCKo1lqkYNO1Qwyx8RbUyy7DN3TtpIWJnmgRX3iGDK', NULL, '2020-09-18 11:30:02', '2020-09-18 11:32:01'),
(71, '620710325', 'Peerapong', 'Suwanrit', 'พีรพงษ์', 'สุวรรณฤทธิ์', 'suwanrit_p@silpakorn.edu', '2020-09-18 11:24:32', '$2y$10$0gznY0YUOb/FMJ1WzAiFvedBmgQ02.yg1aWtXMbaIbm76Msqhtcnm', NULL, '2020-09-18 11:22:35', '2020-09-18 11:24:32'),
(122, '620710326', 'Meannaren', 'Sunrat', 'มีนเรนทร์', 'สันรัตน์', 'meannaren@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$Eve4U2H06NWxnhln0o6g9ukPWGmqbwUCwUW58PwojG5Jm91.dTdAm', NULL, '2020-09-18 14:12:02', '2020-09-18 14:12:02'),
(30, '620710328', 'Wachirawit', 'Roongmanie', 'วชิรวิทย์', 'รุ่งมณี', 'roongmanie_w@silpakorn.edu', '2020-09-18 02:56:09', '$2y$10$ZRwvXMVC/o3kHFItvTKmi.DgXjcnydIfwelJeZvmrRxzvoijQV7Eq', NULL, '2020-09-18 02:53:35', '2020-09-18 02:56:09'),
(66, '620710330', 'Waratthayaporn', 'Boonphong', 'วรัทญาพร', 'บุญผ่อง', 'boonphong_w@silpakorn.edu', '2020-09-18 11:18:45', '$2y$10$hPmtTsMLBSD.iUKW6Jxw8upq1vFlKEg/n9p9goGyNpdsEsh33RINC', NULL, '2020-09-18 11:17:48', '2020-09-18 11:18:45'),
(6, '620710332', 'Supakorn', 'Yookack', 'ศุภกร', 'อยู่แขก', 'yookack_s@silpakorn.edu', '2020-09-18 02:55:56', '$2y$10$aJCfWM.TeplGqkiI/Ri2qurQ9qyJBN8UZ3sLKzfIxWZHPJeDFxjK.', NULL, '2020-09-18 02:52:11', '2020-09-18 02:55:56'),
(33, '620710333', 'Supanat', 'Homjan', 'ศุภณัฐ', 'หอมจันทร์', 'homjan_s2@silpakorn.edu', '2020-09-18 02:54:18', '$2y$10$DWPFdy.uLFVix8YEioJhOOiNlI4lz2PE9zqJ9Y2GaOq5voo9dfwBS', NULL, '2020-09-18 02:53:46', '2020-09-18 02:54:18'),
(132, '620710335', 'Saowalak', 'Saro', 'เสาวลักษณ์', 'สระโร', 'saro_s@silpakorn.edu', '2020-09-21 11:42:58', '$2y$10$bEcpxP2PhwZWC0Heig9wnez6.xjWKi65NA8o53MVm14vELBu3WGEG', NULL, '2020-09-21 11:41:09', '2020-09-21 11:42:58'),
(37, '620710336', 'Apiwit', 'Kmai', 'อภิวิชญ์', 'คะมิ', 'kami_a@silpakorn.edu', '2020-09-18 03:02:25', '$2y$10$5QXx/flqQJP40y2JFeJ2H.P0KNUQOrUtlp4UY4dYZRczpOpvBmqm2', NULL, '2020-09-18 03:01:39', '2020-09-18 03:02:25'),
(102, '620710337', 'arinchai', 'sangjun', 'อริญชัย', 'แสงจันทร์', 'sangjun_a@silpakorn.edu', '2020-09-18 12:07:41', '$2y$10$F516odKQz.NVjAF6f4cKv.hUj07xmwM32.n8ZSnJQuJTl4d1wB7sK', NULL, '2020-09-18 12:04:59', '2020-09-18 12:07:41'),
(89, '620710339', 'Anupap', 'Tubtimsan', 'อานุภาพ', 'ทับทิมแสน', 'tubtimsan_a@silpakorn.edu', '2020-09-18 11:26:45', '$2y$10$gsXOwylgdllyGGAjoiVKL.l7021TSscTT94wWV1F6HFwFDb57Dp/a', NULL, '2020-09-18 11:25:28', '2020-09-18 11:26:45'),
(57, '620710340', 'Apapron', 'Pipatpanuwittaya', 'อาภาพรณ์', 'พิพัฒน์ภานุวิทยา', 'Pipatpanuwittay_a@silpakorn.edu', '2020-09-18 03:36:38', '$2y$10$WTi5KYYfjzu6SmZjnElbJOs.ojaza07trbOjJn8lML0mULomTME7a', NULL, '2020-09-18 03:36:09', '2020-09-18 03:36:38'),
(78, '620710374', 'Thatchapol', 'Orsuwan', 'ธัชพล', 'ออสุวรรณ', 'orsuwan_t@silpakorn.edu', '2020-09-18 11:23:40', '$2y$10$JnK9Ck60aOKEyIHIl4cCS.eqWzj4aa/DDCzFoosjP6fGxQ0iYAbfK', NULL, '2020-09-18 11:23:14', '2020-09-18 11:23:40'),
(82, '620710648', 'Klibphaka', 'chakkawachot', 'กลีบผกา', 'จักวาโชติ', 'CHAKKAWACHOT_K@silpakorn.edu', '2020-09-18 11:27:03', '$2y$10$zRm8.PDOkmMVSn0TlKPyIuEubD29yFoqr1was.dxIwwcECZ4i3HVe', NULL, '2020-09-18 11:23:27', '2020-09-18 11:27:03'),
(107, '620710650', 'katakarn', 'supserm', 'คฑากาญจน์', 'ทรัพย์เสริม', 'supserm_k@silpakorn.edu', '2020-09-18 14:05:04', '$2y$10$1LUnXbsT612ZqVlzI2wEauo3h9KyLF8mmYzaGMUGQtm4H8xDXFY8e', NULL, '2020-09-18 14:03:43', '2020-09-18 14:05:04'),
(32, '620710651', 'Jidapa', 'Gondin', 'จิดาภา', 'ก้อนดิน', 'GONDIN_J@silpakorn.edu', '2020-09-18 02:54:30', '$2y$10$fv.hRJD4fAx6WrIN0YiKI.GJAhzuvwm0RW77OMDMZ.AbmidmlDziO', NULL, '2020-09-18 02:53:38', '2020-09-18 02:54:30'),
(101, '620710653', 'chonnigan', 'khamwang', 'ชนนิกานต์', 'คำวัง', 'khamwang_c@silpakorn.edu', '2020-09-18 11:49:11', '$2y$10$vh11oeh4itU.zSJE32TMb.Kdwm6ytMk5Y9rQNlQvqMwWs53yt60pq', NULL, '2020-09-18 11:48:20', '2020-09-18 11:49:11'),
(60, '620710654', 'Chananya', 'Aiamprakhon', 'ชนัญญา', 'เอี่ยมประโคน', 'aiamprakhon_c@silpakorn.edu', '2020-09-18 10:49:06', '$2y$10$uMVF3.UDzMvsj/E8UX2FdOQg4srvcd/6nJES2sBjm4MAsRQ/vm..K', NULL, '2020-09-18 03:40:06', '2020-09-18 10:49:06'),
(81, '620710655', 'chayapat', 'phumyeam', 'ชยพัทธ์', 'พุ่มแย้ม', 'phumyeam_c@silpakorn.edu', '2020-09-18 11:23:54', '$2y$10$MhzyU/uVHTjr8MBAOdqhaO2RTV3OdqmDUoenY3x611m2SA3GfRUkK', NULL, '2020-09-18 11:23:19', '2020-09-18 11:23:54'),
(68, '620710657', 'Natthavut', 'Apinantakun', 'ณัฏฐวุฒิ', 'อภินันทกุล', 'apinantakun_n@silpakorn.edu', '2020-09-18 11:23:14', '$2y$10$1Zz8nkGlhAttvME7Lug78ugNBkT29c3Iztkkt6lTLRGg1zXVAWsLK', NULL, '2020-09-18 11:22:17', '2020-09-18 11:23:14'),
(83, '620710658', 'Nutdanai', 'Dumrongpanichakit', 'ณัฐดนัย', 'ดำรงพาณิชกิจ', 'DUMRONGPANICHAK_N@silpakorn.edu', '2020-09-18 11:25:54', '$2y$10$Bln66z917M8o3G5UjT.1K.8S9ZwUzYd2Qsfn/Qh1H.eSKf5udOQkW', NULL, '2020-09-18 11:23:40', '2020-09-18 11:25:54'),
(114, '620710659', 'Natthapol', 'Kongsagul', 'ณัฐพล', 'คงสกุล', 'kongsagul_n@silpakorn.edu', '2020-09-18 14:09:00', '$2y$10$YUaFqjCtnv2n52O1DMml.uJXRqLmkh03igiM1x2cuj1wz3coMxzG.', NULL, '2020-09-18 14:04:39', '2020-09-18 14:09:00'),
(75, '620710660', 'Thanakrit', 'Na Ubol', 'ธนกฤต', 'ณ อุบล', 'naubol_t@silpakorn.edu', '2020-09-18 11:27:54', '$2y$10$u25qEQJFB1De5GFS2Qz4A./X.g/KVAB4MWrPgAoKw1frP/Adpg48G', NULL, '2020-09-18 11:23:06', '2020-09-18 11:27:54'),
(113, '620710661', 'Tanawat', 'Suebsom', 'ธนวรรษ', 'สืบสม', 'suebsom_t@silpakorn.edu', '2020-09-18 14:06:26', '$2y$10$OzAY3qukmcy5QPrexp/RzusMyPC.3hpJ2JGh7lZi399tLdqdyJQyq', NULL, '2020-09-18 14:04:37', '2020-09-18 14:06:26'),
(19, '620710663', 'Navaphat', 'Phiboon', 'นวพรรษ', 'พิบูลย์', 'phiboon_n@silpakorn.edu', '2020-09-18 02:54:49', '$2y$10$oYl8a5XXp77cI2/SxTZL5edkiHNeLupjwn8NNpWOV5k0ffXR8yaUe', NULL, '2020-09-18 02:52:58', '2020-09-18 02:54:49'),
(70, '620710664', 'Pathapee', 'Tarawet', 'ปฐพี', 'ทาระเวท', 'tarawet_p@silpakorn.edu', '2020-09-18 11:22:54', '$2y$10$dyxG.apHbzOhavL9lpjXTO4feb.VphGFLYA.CI4mM./ZhB8.IGlKi', NULL, '2020-09-18 11:22:33', '2020-09-18 11:22:54'),
(10, '620710665', 'Pongsakorn', 'Kitalreewan', 'พงศกร', 'กิจอารีวรรณ', 'kitalreewan_p@silpakorn.edu', '2020-09-18 02:53:30', '$2y$10$p9f9QQ3i/D2/OJFIFMz1TekALwCghikZKHbSnuiCKwWenBU3Xo0XG', NULL, '2020-09-18 02:52:38', '2020-09-18 02:53:30'),
(116, '620710666', 'Ponlakit', 'Konkrathok', 'พลกิตต์', 'โกนกระโทก', 'KONKRATHOK_P@silpakorn.edu', '2020-09-18 14:07:15', '$2y$10$539il5ZuyAeVopVGGX0hKuaVasvWsCZjTAisa.DLaeEIMPuJcKqHe', NULL, '2020-09-18 14:05:09', '2020-09-18 14:07:15'),
(90, '620710670', 'Peerawit', 'Chinawong', 'พีรวิชญ์', 'ชินาวงษ์', 'CHINAWONG_P@silpakorn.edu', '2020-09-18 11:27:17', '$2y$10$roAD8BSy1JgeYNePZUXHi.mi1bfnXYA5sV95TDle2Bwz5vfHJGk76', NULL, '2020-09-18 11:26:01', '2020-09-18 11:27:17'),
(41, '620710671', 'Phattaranit', 'Bamrungmuang', 'ภัทรานิษฐ์', 'บำรุงเมือง', 'bamrungmuang_p@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$yXpJzOOUoFzh.4OxeGZ4wOjMrW0sQshgsBgj683pRcQGj1zOsWlgi', NULL, '2020-09-18 03:08:43', '2020-09-18 03:08:43'),
(79, '620710672', 'Pasinee', 'Areeaue', 'ภาสินี', 'อารีเอื้อ', 'aree_p@silpakorn.edu', '2020-09-18 11:26:38', '$2y$10$0UmtaogAMl28CZpEctNlGeh6EUbtgaWlsBTMZKOzAIYo1GoKas.We', NULL, '2020-09-18 11:23:16', '2020-09-18 11:26:38'),
(25, '620710675', 'Wanrunee', 'Tanwiboon', 'น.ส.วรรณรุณี', 'แทนวิบูลย์', 'tanwiboon_w@silpakorn.edu', '2020-09-18 02:53:57', '$2y$10$gWZEqZZZaaixwLyeOBTHUeuk/47gG.MUTSsscwEX.NBLZWO3Ztl.6', NULL, '2020-09-18 02:53:15', '2020-09-18 02:53:57'),
(67, '620710678', 'Wutthikorn', 'Ruksinlapadee', 'วุฒิกร', 'รักศิลปดี', 'ruksinlapadee_w@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$o3P9uE1ES9NodioUBFvFvu4Q3pvtuoN8t9ZouPSvtt1.J6hNjqlpu', NULL, '2020-09-18 11:22:03', '2020-09-18 11:22:03'),
(54, '620710679', 'Siraprapa', 'Boonjeem', 'ศิรประภา', 'บุญจีม', 'Boonjeem_s@silpakorn.edu', '2020-09-18 03:30:55', '$2y$10$l.tf8TGjGZecbGp4DoolrutwXNTgihiu6d1HOqhETfNS3DTNNx0Ee', NULL, '2020-09-18 03:30:06', '2020-09-18 03:30:55'),
(31, '620710681', 'Sorawich', 'Nitrat', 'สรวิชญ์', 'นิตรัตน์', 'nitrat_s@silpakorn.edu', '2020-09-18 02:58:09', '$2y$10$hF/C.fANhhyn5cAtWYmtc.Y9x.0I0./yZwdoUv/EabDQSREZlyfnW', NULL, '2020-09-18 02:53:36', '2020-09-18 02:58:09'),
(104, '620710682', 'Sirintip', 'Koomkun', 'สิรินทิพย์', 'คุ้มกัน', 'koomkun_s@silpakorn.edu', '2020-09-18 12:29:04', '$2y$10$dNco6k1dnVALcD1m1K7BD.1PZSI.JFvO5tEAiG/Yl7uyy4yBPQ3B6', NULL, '2020-09-18 12:27:04', '2020-09-18 12:29:04'),
(100, '620710683', 'supitcha', 'Methakijphakhin', 'สุพิชชา', 'เมธากิจภาคิน', 'methakijphakhin_s@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$l0sa3N00SuKSB5HeusUnbOwwhGmJkxppHoRUEKxJ3VmNSRJ5xzqam', NULL, '2020-09-18 11:44:51', '2020-09-18 11:44:51'),
(20, '620710685', 'Suphap', 'Kaewphinij', 'สุภาพ', 'แก้วพินิจ', 'kaewphinij_s@silpakorn.edu', '2020-09-18 02:56:00', '$2y$10$FZnMwPVd3J88PcqNXRUVF.klOCRgl2nunlyYxzIC/K2OzGC./MVI2', NULL, '2020-09-18 02:53:02', '2020-09-18 02:56:00'),
(23, '620710686', 'Suriya', 'Kamseeta', 'สุริยะ', 'คำสีทา', 'kamseeta_s@silpakorn.edu', '2020-09-18 02:54:18', '$2y$10$2fq5gozCcWZnpr1PNgmqQO4imYdPeReXt6q329VHWiDFH9r3ZlAey', NULL, '2020-09-18 02:53:11', '2020-09-18 02:54:18'),
(87, '620710689', 'Atiphong', 'Srijaroenjira', 'อธิพงษ์', 'ศรีเจริญจิระ', 'srijaroenjira_a@silpakorn.edu', '2020-09-18 11:29:42', '$2y$10$SAxAC4y82C3UuiIa1HCVTO4kt7gahtvcRDscHQ79mvTiORKffeKze', NULL, '2020-09-18 11:25:08', '2020-09-18 11:29:42'),
(72, '620710691', 'Anachin', 'Lawhachainam', 'อานาชิน', 'เลาหชัยนาม', 'lawhachainam_a@silpakorn.edu', '2020-09-18 11:24:54', '$2y$10$TtTE2qji5xS1B2U535gcnO7LwcV.cite0JQT.dvzCxtC58cLswEWi', NULL, '2020-09-18 11:22:38', '2020-09-18 11:24:54'),
(86, '620710693', 'Supitcha', 'Methakijphakhin', 'สุพิชชา', 'เมธากิจภาคอน', 'Methakijphakhin_s@silphakorn.edu', '2020-09-18 02:53:25', '$2y$10$hqHrtgnVcXBqj62DxYa.Pu9YuR.KahclAOE6.Lza7yDCss9AnfMoy', NULL, '2020-09-18 11:24:31', '2020-09-18 11:24:31'),
(121, '620710728​', 'Patthamaporn​', 'Euamaneerattanagul', 'ปัทมพร', 'เอื้อมณีรัตนกุล', 'euamaneerattana_p@silpakorn.edu', '2020-09-18 14:11:19', '$2y$10$ItndKDT5bmJWDp5mu9AVretQ8TNvkM.7R9qW4ErAfRbBKWdNoyovG', NULL, '2020-09-18 14:10:32', '2020-09-18 14:11:19'),
(118, '620710766', 'Kaojai', 'Wande', 'กาวใจ', 'หวานดี', 'wande_k@silpakorn.edu', '2020-09-18 14:11:37', '$2y$10$j7EzVYoTqNfJE8.W0d4PXOAXWCDOaYxqejKQC/Iw4FC8w4Df9WPUe', NULL, '2020-09-18 14:05:48', '2020-09-18 14:11:37'),
(88, '620710771', 'Prachaya', 'Suwannasuk', 'ปรัชญา', 'สุวรรณสุข', 'suwannasuk_p@silpakorn.edu', '2020-09-18 11:26:03', '$2y$10$EaPrtz4StPquv9Pzs0Vdyuuh3W7gS/0/xbQY0SKP3wa/OPfrFXGb6', NULL, '2020-09-18 11:25:13', '2020-09-18 11:26:03'),
(27, '620710774', 'Pakkapon', 'tadjamnong', 'ภัคพล', 'ทัตจำนงค์', 'tadjamnong_p@silpakorn.edu', '2020-09-18 02:53:25', '$2y$10$md7aHicAlZr020f6ykyHAu86E2GX7SfhNu.BKZG76Ukh9YdtLBGmS', NULL, '2020-09-18 02:53:27', '2020-09-18 02:53:27'),
(111, '620710778', 'Sararak', 'Lakphet', 'สรารักษ์', 'หลักเพชร', 'lakphet_s@silpakorn.edu', '2020-09-18 14:04:42', '$2y$10$xQPnDf8htqMUx2Xzvu2BH.pMoBgK8JNaa0YPbmFRqTrVotBgbQ3PS', NULL, '2020-09-18 14:04:06', '2020-09-18 14:04:42'),
(112, '620710779', 'Sanhanut', 'Sakulma', 'นายสัณหณัฐ', 'สกุลมา', 'sakulma_s@silpakorn.edu', '2020-09-18 14:08:26', '$2y$10$YvE/s1nuIKhErJAn9H40A.Yo8dtAESE5/gCDsYCjb6RAgzbdklfnG', NULL, '2020-09-18 14:04:07', '2020-09-18 14:08:26'),
(110, '620710820', 'watcharin', 'khamkhotsoon', 'วัชรินทร์', 'คำโคตรสูนย์', 'khamkhotsoon_w@silpakorn.edu', '2020-09-18 14:04:17', '$2y$10$zFzkqkgdgAwS3MlwhPcBhOwQxYwFcKYQfxUwxmC7DFF/171kd0412', NULL, '2020-09-18 14:03:52', '2020-09-18 14:04:17'),
(80, '620710821', 'Akkarapong', 'Sittiampornpun', 'อัคราพงศ์', 'สิทธิอำพรพรรณ', 'sittiampornpun_a@silpakorn.edu', '2020-09-18 11:24:14', '$2y$10$6SgetNxfz/Kqf3vhE6MwpOfSR81vHXf8wDrSUy7169V4QlYo6IK46', NULL, '2020-09-18 11:23:18', '2020-09-18 11:24:14'),
(115, '620710832', 'Mahasamut', 'Chaosamut', 'มหาสมุทร', 'ชาวสมุทร', 'chaosamut_m@silpakorn.edu', '2020-09-18 14:05:56', '$2y$10$gau6c/ZIwMQFEu2BS8txAuuSu4lSALd208fS5Aq2U0B96xCPFV7bu', NULL, '2020-09-18 14:04:49', '2020-09-18 14:05:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`subjectid`,`year`,`term`,`section`,`teacher`),
  ADD KEY `teacher` (`teacher`),
  ADD KEY `subjectid` (`subjectid`,`year`,`term`,`section`);

--
-- Indexes for table `courseinfo`
--
ALTER TABLE `courseinfo`
  ADD PRIMARY KEY (`subjectid`,`year`,`term`,`section`),
  ADD KEY `subjectid` (`subjectid`,`year`,`term`,`section`);

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
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`subjectid`,`year`,`term`,`section`,`studentid`,`scoreid`),
  ADD KEY `Score` (`subjectid`,`year`,`term`,`section`,`scoreid`),
  ADD KEY `StudentID` (`studentid`),
  ADD KEY `scoreidd` (`scoreid`);

--
-- Indexes for table `scoreinfo`
--
ALTER TABLE `scoreinfo`
  ADD PRIMARY KEY (`subjectid`,`year`,`term`,`section`,`scoreid`),
  ADD KEY `subjectid` (`subjectid`,`year`,`term`,`section`),
  ADD KEY `scoreid` (`scoreid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`username`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `createby` (`createby`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`studentid`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `studentid` (`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `teacher` FOREIGN KEY (`teacher`) REFERENCES `teachers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseinfo`
--
ALTER TABLE `courseinfo`
  ADD CONSTRAINT `course` FOREIGN KEY (`subjectid`,`year`,`term`,`section`) REFERENCES `course` (`subjectid`, `year`, `term`, `section`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `scoreidd` FOREIGN KEY (`scoreid`) REFERENCES `scoreinfo` (`scoreid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sssss` FOREIGN KEY (`subjectid`,`year`,`term`,`section`) REFERENCES `scoreinfo` (`subjectid`, `year`, `term`, `section`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scoreinfo`
--
ALTER TABLE `scoreinfo`
  ADD CONSTRAINT `Course2` FOREIGN KEY (`subjectid`,`year`,`term`,`section`) REFERENCES `courseinfo` (`subjectid`, `year`, `term`, `section`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `CreateByAdmin` FOREIGN KEY (`createby`) REFERENCES `admins` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
