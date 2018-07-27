-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2018 at 03:54 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubagaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` int(10) UNSIGNED NOT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_cl` int(11) NOT NULL,
  `staff_od` int(11) NOT NULL,
  `staff_permission` int(11) NOT NULL,
  `staff_late_register` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_semester_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `academic_year`, `academic_semester`, `staff_cl`, `staff_od`, `staff_permission`, `staff_late_register`, `created_at`, `updated_at`, `academic_semester_start`) VALUES
(1, '2018-06-28', 'even', 20, 10, 2, 2, '2018-07-04 09:50:07', '2018-07-07 00:56:41', '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `classsubjects`
--

CREATE TABLE `classsubjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_modified` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub8` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub9` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub10` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub11` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub12` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classsubjects`
--

INSERT INTO `classsubjects` (`id`, `degree`, `department`, `year`, `semester`, `section`, `last_modified`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`, `sub10`, `sub11`, `sub12`, `created_at`, `updated_at`) VALUES
(1, 'be', 'ece', '1', '3', 'a', 'null', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '2018-07-09 07:11:50', '2018-07-09 07:11:50'),
(2, 'be', 'ece', '1', '1', 'a', 'null', 'nvn', 'nhv', 'hvn', 'vn', 'vhnh', 'hnv', 'nhv', 'vn', 'vhn', 'vnh', 'vhn', 'vhn', '2018-07-09 07:12:26', '2018-07-09 07:12:26'),
(3, 'be', 'ece', '1', '1', 'a', 'null', 'nvn', 'nhv', 'hvn', 'vn', 'vhnh', 'hnv', 'nhv', 'null', 'vh', 'null', 'null', 'null', '2018-07-09 07:18:18', '2018-07-09 07:18:18');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2018_06_06_125134_create_roles_table', 1),
(12, '2018_06_06_125355_create_role_user_table', 1),
(13, '2018_06_07_062225_add_staffprofile_datas', 2),
(15, '2018_06_11_071324_create_students_table', 3),
(16, '2018_06_19_110132_create_staff_attendance_table', 4),
(18, '2018_06_21_112623_create_staff_attendance_record_table', 5),
(21, '2018_06_26_085802_student_attendance', 6),
(22, '2018_06_26_085816_student_attendance_record', 6),
(24, '2018_06_26_123430_add_degree_to_students_stable', 7),
(26, '2018_06_28_121701_add_status_to_students_table', 8),
(27, '2018_07_02_141956_create_staffapprovals_table', 9),
(29, '2018_07_03_095204_add_date_to_staffapprovals_table', 10),
(30, '2018_07_03_132025_add_department_to_staffapprovals_table', 11),
(31, '2018_07_04_061146_add_attempt_to_staffapprovals_table', 12),
(32, '2018_07_04_081856_create_academics_table', 13),
(33, '2018_07_05_075502_create_timetables_table', 14),
(34, '2018_07_05_112037_add_department_to_timetables_table', 15),
(35, '2018_07_05_134741_add_datas_to_student_attendance_record_table', 16),
(37, '2018_07_06_054658_create_classsubjects_table', 17),
(38, '2018_07_07_060408_add_startsemester_to_academics_table', 18),
(39, '2018_07_07_105437_add_date_status_tostaff_attendance_table', 19),
(40, '2018_07_07_112558_create_staffat_overall_table', 20),
(41, '2018_07_07_124135_add_academic_year_to_staffat_overall_table', 21),
(47, '2018_07_09_114053_create_student_overall_table', 22),
(48, '2018_07_09_150219_add_day_to_student_attendance_table', 22),
(49, '2018_07_09_164850_create_student_attendance_overall_table', 22),
(50, '2018_07_10_115506_add_sem_start_to_student_attendance_table', 23),
(51, '2018_07_10_120113_add_sem_start_to_student_attendance_overall_table', 23),
(52, '2018_07_11_062104_add_fields_to_users_table', 24),
(54, '2018_07_18_092633_add_alteration_staff_to_approvals_table', 25),
(55, '2018_07_20_115034_add_newfields_to_student_attendance_table', 26),
(56, '2018_07_20_165527_add_yearstart_to_staffattendance_table', 27),
(57, '2018_07_21_055744_add_semstart_to_staff_at_record_table', 28);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super admin role will have all possibilities to use dashboard for principal', '2018-06-06 07:35:57', '2018-06-06 07:35:57'),
(2, 'admin', 'Admin role preffered for Hod', '2018-06-06 07:35:57', '2018-06-06 07:35:57'),
(3, 'staff', 'Admin role preffered for Staffs', '2018-06-06 07:35:57', '2018-06-06 07:35:57'),
(4, 'substaff', 'Admin role preffered for Sub Staffs', '2018-06-06 07:35:57', '2018-06-06 07:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(13, 2, 10),
(14, 1, 11),
(15, 2, 12),
(16, 3, 13),
(17, 3, 14),
(18, 3, 15),
(19, 3, 16),
(20, 3, 17),
(21, 3, 18),
(22, 3, 19),
(23, 3, 20),
(24, 3, 21),
(25, 3, 22),
(26, 3, 23),
(27, 3, 24),
(28, 3, 25),
(29, 3, 26),
(30, 3, 27),
(31, 3, 28),
(32, 3, 29),
(33, 2, 28),
(34, 3, 12),
(35, 2, 12),
(36, 3, 12),
(37, 2, 12),
(38, 3, 30),
(39, 3, 31),
(40, 3, 32),
(41, 3, 33),
(42, 3, 34),
(43, 3, 35),
(44, 3, 36),
(45, 3, 37),
(46, 3, 38),
(47, 3, 39),
(48, 3, 40),
(49, 3, 41),
(50, 3, 42),
(51, 3, 43),
(52, 3, 44),
(53, 3, 45),
(54, 3, 46),
(55, 3, 47),
(56, 3, 48),
(57, 3, 49),
(58, 3, 50),
(59, 3, 51),
(60, 3, 52),
(61, 3, 53),
(62, 3, 54),
(63, 3, 55),
(64, 3, 56),
(65, 3, 57);

-- --------------------------------------------------------

--
-- Table structure for table `staffapprovals`
--

CREATE TABLE `staffapprovals` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `approvalfor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `approvedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempt` int(11) NOT NULL,
  `alteration_staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alteration_staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffapprovals`
--

INSERT INTO `staffapprovals` (`id`, `staff_id`, `approvalfor`, `description`, `status`, `approvedby`, `created_at`, `updated_at`, `date`, `department`, `attempt`, `alteration_staff_id`, `alteration_staff_name`) VALUES
(23, 54, 'cpl', 'vfvf', 0, NULL, '2018-07-04 01:44:31', '2018-07-11 01:21:51', '2018-07-06', 'civil', 1, '', ''),
(34, 1, 'od', 'gbfbgb', 3, NULL, '2018-07-18 06:06:17', '2018-07-18 06:06:17', '2018-07-22', 'ece', 0, '17', 'Mr. K. Ashok kumar'),
(35, 1, 'od', 'gbgfbfgb', 3, NULL, '2018-07-18 06:08:45', '2018-07-18 06:08:45', '2018-07-23', 'ece', 0, '15', 'Mr. P. Kanakarajan'),
(36, 1, 'od', 'gbgfbfgb', 3, NULL, '2018-07-18 06:08:56', '2018-07-18 06:08:56', '2018-07-23', 'ece', 0, '15', 'Mr. P. Kanakarajan'),
(37, 1, 'od', 'vdfvdfv', 3, NULL, '2018-07-18 06:09:58', '2018-07-18 06:09:58', '2018-07-24', 'ece', 0, '20', 'Mr. S. Soundararajan'),
(38, 1, 'cl', 'hello i need a casual leave', 3, NULL, '2018-07-18 06:49:36', '2018-07-18 06:49:36', '2018-07-26', 'ece', 0, '34', 'Dr. D.Rameshkumar'),
(39, 1, 'cl', 'ygtyr', 3, NULL, '2018-07-21 02:50:53', '2018-07-21 02:50:53', '2018-07-22', 'ece', 0, '13', 'Dr. R. Ramesh Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `staffat_overall`
--

CREATE TABLE `staffat_overall` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `present` int(11) NOT NULL,
  `absent` int(11) NOT NULL,
  `cl` int(11) NOT NULL,
  `cpl` int(11) NOT NULL,
  `pp` int(11) NOT NULL,
  `pl` int(11) NOT NULL,
  `od` int(11) NOT NULL,
  `sod` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffat_overall`
--

INSERT INTO `staffat_overall` (`id`, `staff_id`, `present`, `absent`, `cl`, `cpl`, `pp`, `pl`, `od`, `sod`, `created_at`, `updated_at`, `academic_year`) VALUES
(6, 12, 0, 0, 0, 2, 0, 0, 0, 1, '2018-07-07 06:49:58', '2018-07-07 07:28:01', '2018-06-28'),
(7, 13, 0, 0, 0, 0, 0, 2, 0, 1, '2018-07-07 06:50:34', '2018-07-07 07:26:42', '2018-06-28'),
(8, 1, 1, 0, 0, 0, 1, 0, 0, 0, '2018-07-11 01:11:32', '2018-07-21 00:34:36', '2018-06-28'),
(9, 10, 0, 0, 0, 1, 0, 0, 1, 0, '2018-07-11 01:11:41', '2018-07-20 09:46:08', '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `attendanceDate` date NOT NULL,
  `eid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dateStatus` int(11) NOT NULL,
  `year_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`id`, `staff_id`, `attendanceDate`, `eid`, `created_at`, `updated_at`, `dateStatus`, `year_start`) VALUES
(16, 1, '2018-07-10', 'KSRCE01', '2018-07-10 08:08:00', '2018-07-10 08:08:00', 0, ''),
(17, 1, '2018-07-11', 'KSRCE01', '2018-07-11 01:10:10', '2018-07-11 01:11:32', 1, ''),
(18, 1, '2018-07-13', 'KSRCE01', '2018-07-11 01:20:45', '2018-07-11 01:29:18', 1, ''),
(19, 1, '2018-07-15', 'KSRCE01', '2018-07-11 02:00:44', '2018-07-11 02:00:44', 0, ''),
(20, 1, '2018-07-22', 'KSRCE01', '2018-07-11 02:01:42', '2018-07-11 02:01:42', 0, ''),
(21, 1, '2018-07-20', 'KSRCE01', '2018-07-11 02:03:45', '2018-07-11 02:03:45', 0, ''),
(22, 1, '2018-07-19', 'KSRCE01', '2018-07-18 23:09:08', '2018-07-18 23:09:08', 0, ''),
(23, 1, '2018-07-21', 'KSRCE01', '2018-07-20 11:30:15', '2018-07-20 11:30:15', 0, '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance_record`
--

CREATE TABLE `staff_attendance_record` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendanceDate` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `eid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_attendance_record`
--

INSERT INTO `staff_attendance_record` (`id`, `attendanceDate`, `staff_id`, `eid`, `status`, `created_at`, `updated_at`, `year_start`) VALUES
(51, '2018-06-28', 12, 'CEAE02', 'cpl', '2018-07-07 06:49:58', '2018-07-07 06:49:58', ''),
(52, '2018-06-28', 13, 'CEAE07', 'present-late', '2018-07-07 06:50:34', '2018-07-07 06:50:34', ''),
(53, '2018-06-29', 12, 'CEAE02', 'cpl', '2018-07-07 06:50:52', '2018-07-07 06:50:52', ''),
(54, '2018-06-29', 13, 'CEAE07', 'present-late', '2018-07-07 06:50:58', '2018-07-07 06:50:58', ''),
(55, '2018-07-01', 12, 'CEAE02', 'od', '2018-07-07 07:26:37', '2018-07-07 07:28:01', ''),
(56, '2018-07-01', 13, 'CEAE07', 'sod', '2018-07-07 07:26:42', '2018-07-07 07:26:42', ''),
(57, '2018-07-11', 1, 'KSRCE01', 'present-permission', '2018-07-11 01:11:32', '2018-07-11 01:11:32', ''),
(58, '2018-07-11', 10, 'KSRCE02', 'od', '2018-07-11 01:11:41', '2018-07-11 01:11:41', ''),
(59, '2018-07-13', 1, 'KSRCE01', 'CPL', '2018-07-11 01:29:18', '2018-07-11 01:58:36', ''),
(60, '2018-07-14', 1, 'KSRCE01', 'CPL', '2018-07-11 02:00:17', '2018-07-11 02:00:17', ''),
(61, '2018-07-20', 1, 'KSRCE01', 'CL', '2018-07-11 02:03:28', '2018-07-11 02:03:28', ''),
(62, '2018-07-15', 1, 'KSRCE01', 'CL', '2018-07-11 02:54:44', '2018-07-11 02:54:44', ''),
(63, '2018-07-20', 10, 'KSRCE02', 'cpl', '2018-07-20 09:46:08', '2018-07-20 09:46:08', ''),
(64, '2018-07-21', 1, 'KSRCE01', 'present', '2018-07-21 00:34:36', '2018-07-21 00:34:36', '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gurdian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `register_no`, `batch`, `department`, `phone`, `address`, `gurdian_name`, `year`, `section`, `semester`, `created_at`, `updated_at`, `degree`, `status`) VALUES
(6, 'AKILLESH T', '1713002@student.com', '1713002', '2017 to 2021', 'cse', '00000000000', '--------------', '--------------', '2', 'a', '3', '2018-07-10 04:03:20', '2018-07-10 04:03:20', 'be', 'current'),
(7, 'AKSHAYKUMAR V', '1713003@student.com', '1713003', '2017 to 2021', 'cse', '00000000000', '-----------', '--------------', '2', 'a', '3', '2018-07-10 04:04:17', '2018-07-10 04:04:17', 'be', 'current'),
(8, 'ANANTHI V', '1713004@student.com', '1713004', '2017 to 2021', 'cse', '00000000000', '-----------', '--------------', '2', 'a', '3', '2018-07-10 04:19:48', '2018-07-10 04:19:48', 'be', 'current'),
(9, 'ASWATHRAM A', '1713005@student.com', '1713005', '2017 to 2021', 'cse', '00000000000', '-------', '--------------', '2', 'a', '3', '2018-07-10 04:21:13', '2018-07-10 04:21:13', 'be', 'current'),
(10, 'ubakara Samy', 'smuba4@gmail.com', '23232323', '2012 to 2016', 'ece', '09629344731', 'narayana pillai street', 'sagayaraj', '1', 'a', '1', '2018-07-17 00:47:02', '2018-07-17 00:47:02', 'be', 'current');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `attendancedate` date NOT NULL,
  `staff_eid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateStatus` int(11) NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sem_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `staff_id`, `attendancedate`, `staff_eid`, `created_at`, `updated_at`, `day`, `dateStatus`, `degree`, `department`, `section`, `year`, `semester`, `sem_start`) VALUES
(34, 1, '2018-07-02', 'KSRCE01', '2018-07-20 09:24:21', '2018-07-20 09:24:21', 'mon', 0, 'be', 'cse', 'a', '2', '3', '2018-06-28'),
(35, 1, '2018-07-03', 'KSRCE01', '2018-07-20 09:26:56', '2018-07-20 09:26:56', 'tue', 0, 'be', 'cse', 'a', '2', '3', '2018-06-28'),
(36, 1, '2018-07-21', 'KSRCE01', '2018-07-21 01:47:17', '2018-07-21 01:47:17', 'fri', 0, 'be', 'cse', 'a', '2', '3', '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance_overall`
--

CREATE TABLE `student_attendance_overall` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `mon1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sem_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendance_overall`
--

INSERT INTO `student_attendance_overall` (`id`, `student_id`, `mon1`, `mon2`, `mon3`, `mon4`, `mon5`, `mon6`, `mon7`, `tue1`, `tue2`, `tue3`, `tue4`, `tue5`, `tue6`, `tue7`, `wed1`, `wed2`, `wed3`, `wed4`, `wed5`, `wed6`, `wed7`, `thu1`, `thu2`, `thu3`, `thu4`, `thu5`, `thu6`, `thu7`, `fri1`, `fri2`, `fri3`, `fri4`, `fri5`, `fri6`, `fri7`, `created_at`, `updated_at`, `sem_start`) VALUES
(33, 6, '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-07-20 09:26:16', '2018-07-20 09:27:29', '2018-06-28'),
(34, 7, '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-07-20 09:26:16', '2018-07-20 09:27:29', '2018-06-28'),
(35, 8, '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-07-20 09:26:17', '2018-07-20 09:27:30', '2018-06-28'),
(36, 9, '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-07-20 09:26:17', '2018-07-20 09:27:30', '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance_record`
--

CREATE TABLE `student_attendance_record` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendancedate` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `regno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hrspresent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sem_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendance_record`
--

INSERT INTO `student_attendance_record` (`id`, `attendancedate`, `student_id`, `regno`, `hrspresent`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`, `created_at`, `updated_at`, `degree`, `department`, `year`, `section`, `semester`, `sem_start`) VALUES
(84, '2018-07-02', 6, '1713002', '0', 'absent', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-20 09:26:16', '2018-07-20 09:26:25', 'be', 'cse', '2', 'a', '3', '2018-06-28'),
(85, '2018-07-02', 7, '1713003', '1', 'present', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-20 09:26:17', '2018-07-20 09:26:17', 'be', 'cse', '2', 'a', '3', '2018-06-28'),
(86, '2018-07-02', 8, '1713004', '1', 'present', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-20 09:26:17', '2018-07-20 09:26:17', 'be', 'cse', '2', 'a', '3', '2018-06-28'),
(87, '2018-07-02', 9, '1713005', '1', 'present', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-20 09:26:17', '2018-07-20 09:26:17', 'be', 'cse', '2', 'a', '3', '2018-06-28'),
(88, '2018-07-03', 6, '1713002', '7', 'present', 'present', 'present', 'present', 'present', 'present', 'present', '2018-07-20 09:27:03', '2018-07-20 09:27:29', 'be', 'cse', '2', 'a', '3', '2018-06-28'),
(89, '2018-07-03', 7, '1713003', '7', 'present', 'present', 'present', 'present', 'present', 'present', 'present', '2018-07-20 09:27:08', '2018-07-20 09:27:29', 'be', 'cse', '2', 'a', '3', '2018-06-28'),
(90, '2018-07-03', 8, '1713004', '7', 'present', 'present', 'present', 'present', 'present', 'present', 'present', '2018-07-20 09:27:08', '2018-07-20 09:27:30', 'be', 'cse', '2', 'a', '3', '2018-06-28'),
(91, '2018-07-03', 9, '1713005', '7', 'present', 'present', 'present', 'present', 'present', 'present', 'present', '2018-07-20 09:27:08', '2018-07-20 09:27:30', 'be', 'cse', '2', 'a', '3', '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `student_overall`
--

CREATE TABLE `student_overall` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `sub1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s1_total` int(11) NOT NULL,
  `sub2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s2_total` int(11) NOT NULL,
  `sub3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s3_total` int(11) NOT NULL,
  `sub4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s4_total` int(11) NOT NULL,
  `sub5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s5_total` int(11) NOT NULL,
  `sub6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s6_total` int(11) NOT NULL,
  `sub7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s7_total` int(11) NOT NULL,
  `sub8` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s8_total` int(11) NOT NULL,
  `sub9` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s9_total` int(11) NOT NULL,
  `sub10` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s11_total` int(11) NOT NULL,
  `sub12` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s12_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(10) UNSIGNED NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_modified` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `degree`, `year`, `semester`, `section`, `last_modified`, `mon1`, `mon2`, `mon3`, `mon4`, `mon5`, `mon6`, `mon7`, `tue1`, `tue2`, `tue3`, `tue4`, `tue5`, `tue6`, `tue7`, `wed1`, `wed2`, `wed3`, `wed4`, `wed5`, `wed6`, `wed7`, `thu1`, `thu2`, `thu3`, `thu4`, `thu5`, `thu6`, `thu7`, `fri1`, `fri2`, `fri3`, `fri4`, `fri5`, `fri6`, `fri7`, `created_at`, `updated_at`, `department`) VALUES
(4, 'be', '2', '3', 'a', 'null', 'ec', 'bme', 'net-lab', 'pst', 'ep', 'em-1', 'ec', 'ep', 'te-1', 'em-1', 'bme', 'eg-lab', 'EG-LAB', 'EG-LAB', 'bce', 'ph/ch-lab', 'PH/CH-LAB', 'PH/CH-LAB', 'EM-1/HH', 'PST', 'te-1', 'te-1', 'pst', 'ec', 'em-1', 'ep', 'bce', 'te-1', 'em-1', 'cppsl-lab', 'CPPSL-LAB', 'CPPSL-LAB', 'pst', 'ec', 'ep', '2018-07-10 02:56:56', '2018-07-10 02:56:56', 'cse'),
(5, 'be', '1', '1', 'a', 'null', 'ec', 'bme', 'net-lab', 'pst', 'g', 'em-1', 'ec', 'ep', 'te-1', 'em-1', 'bme', 'eg-lab', 'EG-LAB', 'EG-LAB', 'bce', 'ph/ch-lab', 'a', 'PH/CH-LAB', 'EM-1/HH', 'PST', 'te-1', 'te-1', 'pst', 'ec', 'em-1', 'ep', 'bce', 'te-1', 'em-1', 'test', 'CPPSL-LAB', 'CPPSL-LAB', 'pst', 'ec', 'ep', '2018-07-11 03:07:19', '2018-07-11 03:07:19', 'ece');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mojoined` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departmentFor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mastersFor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `department`, `mojoined`, `eid`, `departmentFor`, `mastersFor`) VALUES
(1, 'Super Admin', 'superadmin@app.com', '$2y$10$LBQrY3EUSg9l.W/VgAGXae9ZTVWkf0cA//PpWODgMfs8QGVO6NPM.', 'professor', 'l3i3KeoVYjFtwIQNPKjX6VYK1fV3TtP71ZtegZZb0ZYQpAav3SBTDcdqMrcR', '2018-06-06 07:35:58', '2018-07-09 05:55:15', 'ece', NULL, 'KSRCE01', NULL, NULL),
(10, 'Admin', 'admin@app.com', '$2y$10$MiNbdL1vlvWge759cJaRSeZyk17WQ5sl83pnZrP8uSxiikGy1BbhO', 'professor', NULL, '2018-06-19 06:21:18', '2018-06-19 06:21:18', 'ece', NULL, 'KSRCE02', NULL, NULL),
(12, 'Dr. R. Venkatachalam', 'CEAE02@ksrce.com', '$2y$10$gLvFEceHXCtj0t9PPpD/SuzhjukBL4/CLo7EO/m6ujRy1pKeGeu7i', 'hod', NULL, '2018-06-22 09:40:30', '2018-06-22 10:03:53', 'automobile', '----', 'CEAE02', NULL, NULL),
(13, 'Dr. R. Ramesh Kumar', 'CEAE07@ksrce.com', '$2y$10$bXX8NIhRIDVu9gQPizmUMuKt575Lm0nGo3KaMSeG/BBU.34vA2JCK', 'professor', NULL, '2018-06-22 09:41:10', '2018-06-22 09:41:10', 'automobile', '----', 'CEAE07', NULL, NULL),
(14, 'Dr. M. Sivakumar', 'CEAE05@ksrce.com', '$2y$10$1je22NiQx.TLjnz.GSYK/e5BL8KZw2Xxdgm3ZFIRskQ1gtXmOk3lW', 'assocprofessor', NULL, '2018-06-22 09:44:28', '2018-06-22 09:44:28', 'automobile', '----', 'CEAE05', NULL, NULL),
(15, 'Mr. P. Kanakarajan', 'CEAE03@ksrce.com', '$2y$10$7ytm3bfN1FfvX6o82FSaX.jiCcZXrbFwRElbYgEOOnzx/NzkqFrzy', 'assocprofessor', NULL, '2018-06-22 09:45:03', '2018-06-22 09:45:03', 'automobile', '----', 'CEAE03', NULL, NULL),
(16, 'Mr. P. Varatharaju', 'CEAE09@ksrce.com', '$2y$10$vrn..u6cymIRDcMz9hlogOEReF//5sCS/3pi2uy/NMQWkqJAhHu7i', 'assocprofessor', NULL, '2018-06-22 09:45:39', '2018-06-22 09:45:39', 'automobile', '----', 'CEAE09', NULL, NULL),
(17, 'Mr. K. Ashok kumar', 'CERD03@ksrce.com', '$2y$10$/myl1jokbWrWXKsjxEHGYeuNJ4DqK.QJ3eQ5bmZhxj26rblcxjOZC', 'asstprofessor', NULL, '2018-06-22 09:46:18', '2018-06-22 09:46:18', 'automobile', '----', 'CERD03', NULL, NULL),
(18, 'Mr. M. Syed Thasthagir', 'CEAE11@ksrce.com', '$2y$10$JkbZIGj28RhjQkQip400neOue8I0VfgOsD9MgwGW48Bhr1NzW5YK2', 'asstprofessor', NULL, '2018-06-22 09:47:52', '2018-06-22 09:47:52', 'automobile', '----', 'CEAE11', NULL, NULL),
(19, 'Mr. S. Neelamegan', 'CEAE13@ksrce.com', '$2y$10$U76Kv7DcSHibhcNuDOllwe04C2RONQv9I/AfnIY8s.3Q7dBICVnE.', 'asstprofessor', NULL, '2018-06-22 09:48:29', '2018-06-22 09:48:29', 'automobile', '----', 'CEAE13', NULL, NULL),
(20, 'Mr. S. Soundararajan', 'CEAE15@app.com', '$2y$10$1ImGzQJSpZlcUyHoD70U6uSu0ry0WY1U2INrb0lhxN7vZQXvFb.qG', 'asstprofessor', NULL, '2018-06-22 09:49:25', '2018-06-22 09:49:25', 'automobile', '----', 'CEAE15', NULL, NULL),
(21, 'Mr. M. Loganathan', 'CEAE12@ksrce.com', '$2y$10$vNDT4nOSag8K1KHogAgHn.WjvNIZmy7YPTg8rgm9AFm9Ehq9HHxJq', 'asstprofessor', NULL, '2018-06-22 09:50:26', '2018-06-22 09:50:26', 'automobile', '----', 'CEAE12', NULL, NULL),
(22, 'Mr. S. Imthiyas', 'CEAE16@ksrce.com', '$2y$10$gGRcFqstzGBtRnScdwi1nOC7.JKVyy9NyIuvTmp1GaMzv6SXQvKo2', 'asstprofessor', NULL, '2018-06-22 09:51:02', '2018-06-22 09:51:02', 'automobile', '----', 'CEAE16', NULL, NULL),
(23, 'Mr. A.P. Kalidas', 'CEAE19@ksrce.com', '$2y$10$0z29ULXMxDx0Ypq.oK.0sOS6WrQrlFvV9df3uyL4pF5E06pBTRZJu', 'asstprofessor', NULL, '2018-06-22 09:51:33', '2018-06-22 09:51:33', 'automobile', '----', 'CEAE19', NULL, NULL),
(24, 'Mr. C. Gogulan', 'CEAE22@ksrce.com', '$2y$10$Mi6lHvhL/P6p6jaCZAPtoeuHrHcPzBbss8fiflmmmmyY1Jto1WhZa', 'asstprofessor', NULL, '2018-06-22 09:52:09', '2018-06-22 09:52:09', 'automobile', '----', 'CEAE22', NULL, NULL),
(25, 'Mr. B. Rajkumar', 'CEAE17@ksrce.com', '$2y$10$8gB6s.sr3dddNeEnFPWntexKS/XupkSZaVIu17DY5dekOwt0v2KrS', 'asstprofessor', NULL, '2018-06-22 09:52:47', '2018-06-22 09:52:47', 'automobile', '----', 'CEAE17', NULL, NULL),
(26, 'Mr. M. Dinakaran', 'CEAE21@ksrce.com', '$2y$10$LRVNatLNYYIZnTvF.y7jNOY1ZO.5yuYKLxKqwWglunZ9zYzFlipwy', 'asstprofessor', NULL, '2018-06-22 09:53:26', '2018-06-22 09:53:26', 'automobile', '----', 'CEAE21', NULL, NULL),
(27, 'Mr.P. Loganathan', 'CEAE25@ksrce.com', '$2y$10$KF/ozbIDh2Ao1SHdhq1YzubfWt5GiJYiMw0N8bgx6fr7e61oqWwQ.', 'asstprofessor', NULL, '2018-06-22 09:54:05', '2018-06-22 09:54:05', 'automobile', '----', 'CEAE25', NULL, NULL),
(28, 'Dr. V. Revathi', 'CECV01@ksrce.com', '$2y$10$YLsT4nbDXfWLePinKWHujugLMXY3ADIIGOxHJs/.KtfwrBNwLjt1K', 'hod', NULL, '2018-06-22 09:54:51', '2018-06-22 09:56:10', 'civil', '----', 'CECV01', NULL, NULL),
(29, 'Dr. N. Muralimohan', 'CECV07@ksrce.com', '$2y$10$RNzpj1Dtkro91gkjooBezukye/ewDmUSy2JG9tbksy7A5.2CmWTGK', 'assocprofessor', NULL, '2018-06-22 09:55:56', '2018-06-22 09:55:56', 'me-ce&m', '----', 'CECV07', NULL, NULL),
(30, 'Dr. M. Gunasekaran', 'CECV31@ksrce.com', '$2y$10$QtlHEvZyZfBMVDDeR9NeCuWXaiYIHor2Xk355otysFHcIiXASI3OO', 'assocprofessor', NULL, '2018-06-22 10:04:49', '2018-06-22 10:04:49', 'civil', '----', 'CECV31', NULL, NULL),
(31, 'Mr. S. Balasubramaniyan', 'CECV55@ksrce.com', '$2y$10$/Oqa/YMfgzlBdOE.C60OruSKOwN01FjiStNEj8rqJjmIdExgdmDZO', 'assocprofessor', NULL, '2018-06-22 10:05:41', '2018-06-22 10:05:41', 'civil', '----', 'CECV55', NULL, NULL),
(32, 'Dr. P. Sudha', 'CECV06@ksrce.com', '$2y$10$XKoEW7X8.ttmKQSUOC17me1K2KJVjgLg2UnGXGcX5TKlaBPrdWLdG', 'asstprofessor', NULL, '2018-06-22 10:06:12', '2018-06-22 10:06:12', 'civil', '----', 'CECV06', NULL, NULL),
(33, 'Dr. N. Sudharsan', 'CECV28@ksrce.com', '$2y$10$1rBjdcQclrAydlq35nroFuje12NpoDBhhPQS9v71CPfgDPtuXRNS.', 'asstprofessor', NULL, '2018-06-22 10:06:44', '2018-06-22 10:06:44', 'civil', '----', 'CECV28', NULL, NULL),
(34, 'Dr. D.Rameshkumar', 'CECV24@ksrce.com', '$2y$10$yQI7fH7zP33y7ClHo5xkLOnL8PFDwumnx0Q3lFdkDo3.ohBJLxebG', 'asstprofessor', NULL, '2018-06-22 10:07:14', '2018-06-22 10:07:14', 'civil', '----', 'CECV24', NULL, NULL),
(35, 'Mrs. P. Prasanthni', 'CECV15@ksrce.com', '$2y$10$q.mtfcgSvujX9u0zg8hxn.Chb2rIjPnlXSc27t50HQfLfM2nyPtkC', 'asstprofessor', NULL, '2018-06-22 10:07:41', '2018-06-22 10:07:41', 'civil', '----', 'CECV15', NULL, NULL),
(36, 'Mrs. K.P.Vishalakshi', 'CECV19@ksrce.com', '$2y$10$CWoxuM1TPZa5isxMU7SjbOOlnmvbevNHiuIEfcM8BNXJpYNn333KK', 'asstprofessor', NULL, '2018-06-22 10:08:14', '2018-06-22 10:08:14', 'civil', '----', 'CECV19', NULL, NULL),
(37, 'Mrs. V.C. Prabha', 'CECV40@ksrce.com', '$2y$10$3bW4x6jNQ5Gg8tFfLXU3Vu7G9o2EL/2gGlzrsSD83/3f3CGWQbYZa', 'asstprofessor', NULL, '2018-06-22 10:08:42', '2018-06-22 10:08:42', 'civil', '----', 'CECV40', NULL, NULL),
(38, 'Mr. M. Logesh Kumar', 'CECV26@ksrce.com', '$2y$10$UN5v.poWwntZA4hMwbIAHejOQGzuGWi6JXkj4ijGTrJs1hFbFlIHu', 'asstprofessor', NULL, '2018-06-22 10:09:11', '2018-06-22 10:09:11', 'civil', '----', 'CECV26', NULL, NULL),
(39, 'Mrs. G. Tamilarasi', 'CECV38@ksrce.com', '$2y$10$HT2IVrjACN/83LR2wGYVuOwStoNo3lb4HjuJsfzQwbEjdkpAx9jTm', 'asstprofessor', NULL, '2018-06-22 10:09:39', '2018-06-22 10:09:39', 'civil', '----', 'CECV38', NULL, NULL),
(40, 'Mr. M. Senthilkumar', 'CECV32@ksrce.com', '$2y$10$Y/mE5476cUX80WoElBHAjOPTKI4zh5AH/kGM2iPB9uoLKx9E68nuK', 'asstprofessor', NULL, '2018-06-22 10:10:24', '2018-06-22 10:10:24', 'civil', '----', 'CECV32', NULL, NULL),
(41, 'Mr. T. Senthilkumar', 'CECV16@ksrce.com', '$2y$10$b.nURanb7aZjuwLrrlj1h.KKXqPp/QhKHku3PNd7vtZ.9xQzgwp9K', 'asstprofessor', NULL, '2018-06-22 10:10:57', '2018-06-22 10:10:57', 'civil', '----', 'CECV16', NULL, NULL),
(42, 'Mr. S. Southamirajan', 'CECV54@ksrce.com', '$2y$10$7ndnQk.EmWxELJH8Ax6z5OHE1rPppO4oDy2IvNMYOmaUDUutt5eve', 'asstprofessor', NULL, '2018-06-22 10:11:31', '2018-06-22 10:11:31', 'civil', '----', 'CECV54', NULL, NULL),
(43, 'Mr. D. Kanagaraj', 'CECV44@ksrce.com', '$2y$10$Tr/9G0VCM.vWOthLJMfPuOK.kM6GjpDtFDhvjOUOaryJb7Gb2XNjC', 'asstprofessor', NULL, '2018-06-22 10:12:13', '2018-06-22 10:12:13', 'civil', '----', 'CECV44', NULL, NULL),
(44, 'Mr. S. Elango', 'CECV53@ksrce.com', '$2y$10$cFazTrRWLW/q53nNhktkQOM3emRcGnnca4WNaiCWRtJx88ks8aL6S', 'asstprofessor', NULL, '2018-06-22 10:12:42', '2018-06-22 10:12:42', 'civil', '----', 'CECV53', NULL, NULL),
(45, 'Mr. K. Selvakumar', 'CECV52@ksrce.com', '$2y$10$84fuezycJFyyFyhjqbs5Bemd3dRG1M8G3YMo6SjCgFdgVJia4Tsu.', 'asstprofessor', NULL, '2018-06-22 10:13:06', '2018-06-22 10:13:06', 'civil', '----', 'CECV52', NULL, NULL),
(46, 'Mr. B. Suresh', 'CECV56@ksrce.com', '$2y$10$jkIvuhvbx4GBfbTa5Dy98uzr43t/YVPrwnAjUN92sCzKmN4caFTrO', 'asstprofessor', NULL, '2018-06-22 10:13:35', '2018-06-22 10:13:35', 'civil', '----', 'CECV56', NULL, NULL),
(47, 'Mr. S. Saravana Ganesh', 'CECV58@ksrce.com', '$2y$10$Qv9vv02QeG2uNv3ndqsate20bqTeADDyAlUSiLTbwHjrvorO71nh.', 'asstprofessor', NULL, '2018-06-22 10:14:04', '2018-06-22 10:14:04', 'civil', '----', 'CECV58', NULL, NULL),
(48, 'Mr. T. Vijayashankar', 'CECV57@ksrce.com', '$2y$10$jhRqlYjdE/1zWLPxwkquSOGz30LmSE1WCbRDcoamPXXVREXfW5pJi', 'asstprofessor', NULL, '2018-06-22 10:14:47', '2018-06-22 10:14:47', 'civil', '----', 'CECV57', NULL, NULL),
(49, 'Mr. S. Dineshkumar', 'CECV60@ksrce.com', '$2y$10$uYApdJ/PT7FCFMTk8l3P2OG69/Gz6/oMHIMh5uGi1ld2yv2bhgfvK', 'asstprofessor', NULL, '2018-06-22 10:15:17', '2018-06-22 10:15:17', 'civil', '----', 'CECV60', NULL, NULL),
(50, 'Mr. M. Prabahar', 'CECV59@ksrce.com', '$2y$10$tYUQuKNtd5ZCxGSB32eg3u2GxMm72hjieYU.hbnVllnazkoRCipBS', 'asstprofessor', NULL, '2018-06-22 10:15:47', '2018-06-22 10:15:47', 'civil', '----', 'CECV59', NULL, NULL),
(51, 'Mrs. G. Gokila', 'CECV63@ksrce.com', '$2y$10$lASNWH9JXXfFfYXSl3C5CemIbzZLhDspg60M5s2v7kcndJRgmEGxC', 'asstprofessor', NULL, '2018-06-22 10:16:16', '2018-06-22 10:16:16', 'civil', '----', 'CECV63', NULL, NULL),
(52, 'Mr. P. Karthick', 'CECV66@ksrce.com', '$2y$10$ZXuBRLT9Zj5VoYxWtNNYyOCdAi26xGH4qBZSPxQlUazA1q8M8joLS', 'asstprofessor', NULL, '2018-06-22 10:16:49', '2018-06-22 10:16:49', 'civil', '----', 'CECV66', NULL, NULL),
(53, 'Mr. S. Yuvaraj', 'CECV67@ksrce.com', '$2y$10$ku73WZDBZk8QXiL4nYbaOevlAGVw6a6o.VucLFzDD9vI9bkGI78Xq', 'asstprofessor', NULL, '2018-06-22 10:17:18', '2018-06-22 10:17:18', 'civil', '----', 'CECV67', NULL, NULL),
(54, 'I am a staff', 'iamstaff@app.com', '$2y$10$a0lWd9GEom7T3jcOLwLi3.PC5qyAarExBNRkOneuBMNR2mBQXioXW', 'professor', NULL, '2018-07-04 01:42:44', '2018-07-04 01:42:44', 'civil', '----', 'KSRCE000', NULL, NULL),
(55, 'ubakarasamy edit', 'smuba4@gmail.com', '$2y$10$J4tkPW2QkLhocedPAOHe0OoX7D6v58EyO706bNzP/cC4az1NliLrC', 'professor', NULL, '2018-07-07 03:53:50', '2018-07-07 03:54:15', 'me-vlsi', '----', 'UBA123', NULL, NULL),
(56, 'teststaff', 'teststaff@app.com', '$2y$10$3VSvG1kX5W32egySbIaO7up.ScfTmuVMXHe3cBx6IiRHbEZLP8aDW', 'asstprofessor', 'BQsD4HH0nNnUbZwgFWIBFnU6GnHEieMQpCWxz4wVIYo8cfekmpziVyII8Jc6', '2018-07-10 07:55:18', '2018-07-10 07:55:18', 'ece', '----', 'KSRCE123', NULL, NULL),
(57, 'testt', 'testt@app.com', '$2y$10$eYJBxtWU/jadLhg/UYRC8eW2lm6yw4EYXggY9MPk0uiu5Wm0ONvEe', 'professor', NULL, '2018-07-21 00:40:50', '2018-07-21 00:40:50', 'ece', '----', '454fdf', 'eee', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classsubjects`
--
ALTER TABLE `classsubjects`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffapprovals`
--
ALTER TABLE `staffapprovals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffat_overall`
--
ALTER TABLE `staffat_overall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendance_record`
--
ALTER TABLE `staff_attendance_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_register_no_unique` (`register_no`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance_overall`
--
ALTER TABLE `student_attendance_overall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance_record`
--
ALTER TABLE `student_attendance_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_overall`
--
ALTER TABLE `student_overall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
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
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classsubjects`
--
ALTER TABLE `classsubjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `staffapprovals`
--
ALTER TABLE `staffapprovals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `staffat_overall`
--
ALTER TABLE `staffat_overall`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `staff_attendance_record`
--
ALTER TABLE `staff_attendance_record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `student_attendance_overall`
--
ALTER TABLE `student_attendance_overall`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `student_attendance_record`
--
ALTER TABLE `student_attendance_record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `student_overall`
--
ALTER TABLE `student_overall`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
