-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 10:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_nick_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoimntment_statuses`
--

CREATE TABLE `appoimntment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appoimntment_statuses`
--

INSERT INTO `appoimntment_statuses` (`id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Booked', NULL, NULL, NULL),
(2, 'Completed', NULL, NULL, NULL),
(3, 'Cancelled', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_run` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `notes`, `start_time`, `end_time`, `check_in`, `check_out`, `address`, `city`, `postcode`, `state`, `billing_run`, `created_at`, `updated_at`, `deleted_at`, `status_id`) VALUES
(34, 'saa', '2023-03-27 01:12:32', '2023-03-27 02:12:32', NULL, NULL, NULL, NULL, NULL, 'Victoria', NULL, '2023-03-28 07:12:59', '2023-03-28 10:11:24', '2023-03-28 10:11:24', 2),
(35, 'fdasdf', '2023-03-27 01:15:46', '2023-03-27 02:15:46', NULL, NULL, NULL, NULL, NULL, 'Victoria', NULL, '2023-03-28 07:16:37', '2023-03-28 07:16:37', NULL, 2),
(36, 'some note 123', '2023-03-27 01:10:07', '2023-03-27 04:10:07', NULL, NULL, NULL, NULL, NULL, 'Victoria', NULL, '2023-03-28 10:11:08', '2023-03-28 10:11:24', '2023-03-28 10:11:24', 2),
(37, 'zxcvzcxv', '2023-03-27 01:11:31', '2023-03-27 02:10:07', NULL, NULL, NULL, NULL, NULL, 'Victoria', NULL, '2023-03-28 10:11:44', '2023-04-03 08:58:12', NULL, 1),
(38, 'asfd', '2023-04-17 01:30:59', '2023-04-17 02:55:59', NULL, NULL, NULL, NULL, NULL, 'Victoria', NULL, '2023-04-03 06:31:46', '2023-04-03 09:00:04', NULL, 1),
(41, '1st user test', '2023-04-17 01:06:38', '2023-04-17 02:06:38', NULL, NULL, NULL, NULL, NULL, 'Victoria', NULL, '2023-04-03 09:09:20', '2023-04-03 09:09:20', NULL, 1),
(42, '2nd test', '2023-04-17 01:09:39', '2023-04-17 02:09:39', NULL, NULL, NULL, NULL, NULL, 'Victoria', NULL, '2023-04-03 09:09:51', '2023-04-03 09:09:51', NULL, 1),
(43, 'mutli 1st test updated', '2023-04-17 01:10:10', '2023-04-17 03:00:00', NULL, NULL, NULL, NULL, NULL, 'Victoria', NULL, '2023-04-03 09:10:40', '2023-04-03 09:10:58', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_crm_customer`
--

CREATE TABLE `appointment_crm_customer` (
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `crm_customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_crm_customer`
--

INSERT INTO `appointment_crm_customer` (`appointment_id`, `crm_customer_id`) VALUES
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 3),
(37, 1),
(37, 3),
(38, 1),
(38, 3),
(41, 1),
(41, 3),
(42, 1),
(42, 3),
(43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_user`
--

CREATE TABLE `appointment_user` (
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_user`
--

INSERT INTO `appointment_user` (`appointment_id`, `user_id`) VALUES
(34, 4),
(35, 1),
(36, 4),
(37, 4),
(38, 1),
(38, 4),
(41, 4),
(42, 4),
(43, 1),
(43, 4);

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(46) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(1, 'audit:updated', 1, 'App\\Models\\User#1', 1, '{\"id\":1}', '127.0.0.1', '2023-03-08 03:23:43', '2023-03-08 03:23:43'),
(2, 'audit:created', 1, 'App\\Models\\StaffAvailability#1', 1, '{\"staff_member_id\":\"1\",\"monday_from\":\"01:00:00\",\"monday_to\":\"03:00:00\",\"tuesday_from\":\"08:00:00\",\"tuesday_to\":\"12:00:00\",\"wednesday_from\":null,\"wednesday_to\":null,\"thursday_from\":null,\"thursday_to\":null,\"friday_from\":null,\"friday_to\":null,\"saturday_from\":\"01:00:00\",\"saturday_to\":\"05:00:00\",\"sunday_from\":\"01:00:00\",\"sunday_to\":\"05:00:00\",\"updated_at\":\"2023-03-08 08:24:53\",\"created_at\":\"2023-03-08 08:24:53\",\"id\":1}', '127.0.0.1', '2023-03-08 03:24:53', '2023-03-08 03:24:53'),
(3, 'audit:created', 1, 'App\\Models\\CrmCustomer#1', 1, '{\"first_name\":\"Arslan\",\"last_name\":\"Ahmed\",\"email\":\"malikzarslan44@gmail.com\",\"phone\":\"03125203544\",\"phone_2\":null,\"address\":null,\"postcode\":null,\"city\":null,\"state\":\"Victoria\",\"status_id\":\"1\",\"updated_at\":\"2023-03-08 08:27:16\",\"created_at\":\"2023-03-08 08:27:16\",\"id\":1}', '127.0.0.1', '2023-03-08 03:27:16', '2023-03-08 03:27:16'),
(4, 'audit:created', 2, 'App\\Models\\CrmCustomer#2', 1, '{\"first_name\":\"Ali\",\"last_name\":\"Ahmed\",\"email\":\"aliahmed@gmail.com\",\"phone\":\"1231231\",\"phone_2\":null,\"address\":null,\"postcode\":null,\"city\":null,\"state\":\"Victoria\",\"status_id\":\"1\",\"updated_at\":\"2023-03-08 08:27:49\",\"created_at\":\"2023-03-08 08:27:49\",\"id\":2}', '127.0.0.1', '2023-03-08 03:27:49', '2023-03-08 03:27:49'),
(5, 'audit:created', 3, 'App\\Models\\CrmCustomer#3', 1, '{\"first_name\":\"abdullah\",\"last_name\":\"Ibrar\",\"email\":\"abdullahIbrar@gmail.com\",\"phone\":\"12341234\",\"phone_2\":null,\"address\":null,\"postcode\":null,\"city\":null,\"state\":\"Victoria\",\"status_id\":\"1\",\"updated_at\":\"2023-03-08 08:28:13\",\"created_at\":\"2023-03-08 08:28:13\",\"id\":3}', '127.0.0.1', '2023-03-08 03:28:13', '2023-03-08 03:28:13'),
(6, 'audit:created', 1, 'App\\Models\\Appointment#1', 1, '{\"notes\":\"first appointment\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":1,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(7, 'audit:created', 1, 'App\\Models\\Invoice#1', 1, '{\"total_amount\":53.33333333333333,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"first appointment\",\"status\":\"in-progress\",\"appointment_id\":1,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":1}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(8, 'audit:created', 1, 'App\\Models\\InvoiceDetail#1', 1, '{\"invoice_id\":1,\"user_id\":\"2\",\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":1}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(9, 'audit:created', 2, 'App\\Models\\InvoiceDetail#2', 1, '{\"invoice_id\":1,\"user_id\":\"3\",\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":2}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(10, 'audit:created', 2, 'App\\Models\\Invoice#2', 1, '{\"total_amount\":53.33333333333333,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"first appointment\",\"status\":\"in-progress\",\"appointment_id\":1,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":2}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(11, 'audit:created', 3, 'App\\Models\\InvoiceDetail#3', 1, '{\"invoice_id\":2,\"user_id\":\"2\",\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":3}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(12, 'audit:created', 4, 'App\\Models\\InvoiceDetail#4', 1, '{\"invoice_id\":2,\"user_id\":\"3\",\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":4}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(13, 'audit:created', 3, 'App\\Models\\Invoice#3', 1, '{\"total_amount\":53.33333333333333,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"first appointment\",\"status\":\"in-progress\",\"appointment_id\":1,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":3}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(14, 'audit:created', 5, 'App\\Models\\InvoiceDetail#5', 1, '{\"invoice_id\":3,\"user_id\":\"2\",\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":5}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(15, 'audit:created', 6, 'App\\Models\\InvoiceDetail#6', 1, '{\"invoice_id\":3,\"user_id\":\"3\",\"updated_at\":\"2023-03-08 08:29:00\",\"created_at\":\"2023-03-08 08:29:00\",\"id\":6}', '127.0.0.1', '2023-03-08 03:29:00', '2023-03-08 03:29:00'),
(16, 'audit:created', 1, 'App\\Models\\Expense#1', 1, '{\"date\":\"17\\/03\\/2023\",\"decscription\":\"expense 1\",\"group_expense\":\"0\",\"appointment_id\":\"1\",\"ammount\":\"34\",\"updated_at\":\"2023-03-08 08:31:16\",\"created_at\":\"2023-03-08 08:31:16\",\"id\":1,\"receipt_photo\":null,\"media\":[]}', '127.0.0.1', '2023-03-08 03:31:16', '2023-03-08 03:31:16'),
(17, 'audit:created', 1, 'App\\Models\\ExpenseDetail#1', 1, '{\"expense_id\":1,\"client_id\":\"1\",\"updated_at\":\"2023-03-08 08:31:16\",\"created_at\":\"2023-03-08 08:31:16\",\"id\":1}', '127.0.0.1', '2023-03-08 03:31:16', '2023-03-08 03:31:16'),
(18, 'audit:created', 4, 'App\\Models\\Invoice#4', 1, '{\"total_amount\":\"34\",\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"expense 1\",\"status\":\"in-progress\",\"appointment_id\":\"1\",\"client_id\":1,\"expense_id\":1,\"updated_at\":\"2023-03-08 08:31:16\",\"created_at\":\"2023-03-08 08:31:16\",\"id\":4}', '127.0.0.1', '2023-03-08 03:31:16', '2023-03-08 03:31:16'),
(19, 'audit:created', 7, 'App\\Models\\InvoiceDetail#7', 1, '{\"invoice_id\":4,\"user_id\":2,\"updated_at\":\"2023-03-08 08:31:16\",\"created_at\":\"2023-03-08 08:31:16\",\"id\":7}', '127.0.0.1', '2023-03-08 03:31:16', '2023-03-08 03:31:16'),
(20, 'audit:created', 8, 'App\\Models\\InvoiceDetail#8', 1, '{\"invoice_id\":4,\"user_id\":3,\"updated_at\":\"2023-03-08 08:31:16\",\"created_at\":\"2023-03-08 08:31:16\",\"id\":8}', '127.0.0.1', '2023-03-08 03:31:16', '2023-03-08 03:31:16'),
(21, 'audit:created', 2, 'App\\Models\\Expense#2', 1, '{\"date\":\"09\\/03\\/2023\",\"decscription\":\"expense 2\",\"group_expense\":\"1\",\"appointment_id\":\"1\",\"ammount\":\"70\",\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":2,\"receipt_photo\":null,\"media\":[]}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(22, 'audit:created', 5, 'App\\Models\\Invoice#5', 1, '{\"total_amount\":23.333333333333332,\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"expense 2\",\"status\":\"in-progress\",\"appointment_id\":\"1\",\"client_id\":1,\"expense_id\":2,\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":5}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(23, 'audit:created', 9, 'App\\Models\\InvoiceDetail#9', 1, '{\"invoice_id\":5,\"user_id\":2,\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":9}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(24, 'audit:created', 10, 'App\\Models\\InvoiceDetail#10', 1, '{\"invoice_id\":5,\"user_id\":3,\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":10}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(25, 'audit:created', 6, 'App\\Models\\Invoice#6', 1, '{\"total_amount\":23.333333333333332,\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"expense 2\",\"status\":\"in-progress\",\"appointment_id\":\"1\",\"client_id\":2,\"expense_id\":2,\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":6}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(26, 'audit:created', 11, 'App\\Models\\InvoiceDetail#11', 1, '{\"invoice_id\":6,\"user_id\":2,\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":11}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(27, 'audit:created', 12, 'App\\Models\\InvoiceDetail#12', 1, '{\"invoice_id\":6,\"user_id\":3,\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":12}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(28, 'audit:created', 7, 'App\\Models\\Invoice#7', 1, '{\"total_amount\":23.333333333333332,\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"expense 2\",\"status\":\"in-progress\",\"appointment_id\":\"1\",\"client_id\":3,\"expense_id\":2,\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":7}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(29, 'audit:created', 13, 'App\\Models\\InvoiceDetail#13', 1, '{\"invoice_id\":7,\"user_id\":2,\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":13}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(30, 'audit:created', 14, 'App\\Models\\InvoiceDetail#14', 1, '{\"invoice_id\":7,\"user_id\":3,\"updated_at\":\"2023-03-08 08:32:07\",\"created_at\":\"2023-03-08 08:32:07\",\"id\":14}', '127.0.0.1', '2023-03-08 03:32:07', '2023-03-08 03:32:07'),
(31, 'audit:updated', 7, 'App\\Models\\Invoice#7', 1, '{\"status\":\"invoice-generated\",\"updated_at\":\"2023-03-08 08:32:14\",\"id\":7}', '127.0.0.1', '2023-03-08 03:32:14', '2023-03-08 03:32:14'),
(32, 'audit:created', 2, 'App\\Models\\Appointment#2', 1, '{\"notes\":\"some notes\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(33, 'audit:created', 8, 'App\\Models\\Invoice#8', 1, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"some notes\",\"status\":\"in-progress\",\"appointment_id\":2,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":8}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(34, 'audit:created', 1, 'App\\Models\\InvoiceDetail#1', 1, '{\"invoice_id\":8,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":1}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(35, 'audit:created', 2, 'App\\Models\\InvoiceDetail#2', 1, '{\"invoice_id\":8,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":2}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(36, 'audit:created', 3, 'App\\Models\\InvoiceDetail#3', 1, '{\"invoice_id\":8,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":3}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(37, 'audit:created', 9, 'App\\Models\\Invoice#9', 1, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"some notes\",\"status\":\"in-progress\",\"appointment_id\":2,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":9}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(38, 'audit:created', 4, 'App\\Models\\InvoiceDetail#4', 1, '{\"invoice_id\":9,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":4}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(39, 'audit:created', 5, 'App\\Models\\InvoiceDetail#5', 1, '{\"invoice_id\":9,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":5}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(40, 'audit:created', 6, 'App\\Models\\InvoiceDetail#6', 1, '{\"invoice_id\":9,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":6}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(41, 'audit:created', 10, 'App\\Models\\Invoice#10', 1, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"some notes\",\"status\":\"in-progress\",\"appointment_id\":2,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":10}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(42, 'audit:created', 7, 'App\\Models\\InvoiceDetail#7', 1, '{\"invoice_id\":10,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":7}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(43, 'audit:created', 8, 'App\\Models\\InvoiceDetail#8', 1, '{\"invoice_id\":10,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":8}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(44, 'audit:created', 9, 'App\\Models\\InvoiceDetail#9', 1, '{\"invoice_id\":10,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:37:29\",\"created_at\":\"2023-03-09 00:37:29\",\"id\":9}', '127.0.0.1', '2023-03-08 19:37:29', '2023-03-08 19:37:29'),
(45, 'audit:created', 3, 'App\\Models\\Appointment#3', 1, '{\"notes\":\"some\",\"start_time\":\"13\\/03\\/2023 02:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:38:49\",\"created_at\":\"2023-03-09 00:38:49\",\"id\":3,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:38:49', '2023-03-08 19:38:49'),
(46, 'audit:created', 11, 'App\\Models\\Invoice#11', 1, '{\"total_amount\":20,\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"some\",\"status\":\"in-progress\",\"appointment_id\":3,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:38:49\",\"created_at\":\"2023-03-09 00:38:49\",\"id\":11}', '127.0.0.1', '2023-03-08 19:38:49', '2023-03-08 19:38:49'),
(47, 'audit:created', 10, 'App\\Models\\InvoiceDetail#10', 1, '{\"invoice_id\":11,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:38:49\",\"created_at\":\"2023-03-09 00:38:49\",\"id\":10}', '127.0.0.1', '2023-03-08 19:38:49', '2023-03-08 19:38:49'),
(48, 'audit:created', 12, 'App\\Models\\Invoice#12', 1, '{\"total_amount\":20,\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"some\",\"status\":\"in-progress\",\"appointment_id\":3,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:38:49\",\"created_at\":\"2023-03-09 00:38:49\",\"id\":12}', '127.0.0.1', '2023-03-08 19:38:49', '2023-03-08 19:38:49'),
(49, 'audit:created', 11, 'App\\Models\\InvoiceDetail#11', 1, '{\"invoice_id\":12,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:38:49\",\"created_at\":\"2023-03-09 00:38:49\",\"id\":11}', '127.0.0.1', '2023-03-08 19:38:49', '2023-03-08 19:38:49'),
(50, 'audit:created', 4, 'App\\Models\\Appointment#4', 1, '{\"notes\":\"new\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 02:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:41:29\",\"created_at\":\"2023-03-09 00:41:29\",\"id\":4,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:41:29', '2023-03-08 19:41:29'),
(51, 'audit:created', 13, 'App\\Models\\Invoice#13', 1, '{\"total_amount\":13.333333333333332,\"total_hours_consumed\":1,\"hour_charges\":13.333333333333332,\"description\":\"new\",\"status\":\"in-progress\",\"appointment_id\":4,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:41:29\",\"created_at\":\"2023-03-09 00:41:29\",\"id\":13}', '127.0.0.1', '2023-03-08 19:41:29', '2023-03-08 19:41:29'),
(52, 'audit:created', 12, 'App\\Models\\InvoiceDetail#12', 1, '{\"invoice_id\":13,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:41:29\",\"created_at\":\"2023-03-09 00:41:29\",\"id\":12}', '127.0.0.1', '2023-03-08 19:41:29', '2023-03-08 19:41:29'),
(53, 'audit:created', 14, 'App\\Models\\Invoice#14', 1, '{\"total_amount\":13.333333333333332,\"total_hours_consumed\":1,\"hour_charges\":13.333333333333332,\"description\":\"new\",\"status\":\"in-progress\",\"appointment_id\":4,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:41:29\",\"created_at\":\"2023-03-09 00:41:29\",\"id\":14}', '127.0.0.1', '2023-03-08 19:41:29', '2023-03-08 19:41:29'),
(54, 'audit:created', 13, 'App\\Models\\InvoiceDetail#13', 1, '{\"invoice_id\":14,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:41:29\",\"created_at\":\"2023-03-09 00:41:29\",\"id\":13}', '127.0.0.1', '2023-03-08 19:41:29', '2023-03-08 19:41:29'),
(55, 'audit:created', 15, 'App\\Models\\Invoice#15', 1, '{\"total_amount\":13.333333333333332,\"total_hours_consumed\":1,\"hour_charges\":13.333333333333332,\"description\":\"new\",\"status\":\"in-progress\",\"appointment_id\":4,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:41:29\",\"created_at\":\"2023-03-09 00:41:29\",\"id\":15}', '127.0.0.1', '2023-03-08 19:41:29', '2023-03-08 19:41:29'),
(56, 'audit:created', 14, 'App\\Models\\InvoiceDetail#14', 1, '{\"invoice_id\":15,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:41:29\",\"created_at\":\"2023-03-09 00:41:29\",\"id\":14}', '127.0.0.1', '2023-03-08 19:41:29', '2023-03-08 19:41:29'),
(57, 'audit:created', 5, 'App\\Models\\Appointment#5', 1, '{\"notes\":\"some notes og 3x3\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":5,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(58, 'audit:created', 16, 'App\\Models\\Invoice#16', 1, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"some notes og 3x3\",\"status\":\"in-progress\",\"appointment_id\":5,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":16}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(59, 'audit:created', 15, 'App\\Models\\InvoiceDetail#15', 1, '{\"invoice_id\":16,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":15}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(60, 'audit:created', 16, 'App\\Models\\InvoiceDetail#16', 1, '{\"invoice_id\":16,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":16}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(61, 'audit:created', 17, 'App\\Models\\InvoiceDetail#17', 1, '{\"invoice_id\":16,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":17}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(62, 'audit:created', 17, 'App\\Models\\Invoice#17', 1, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"some notes og 3x3\",\"status\":\"in-progress\",\"appointment_id\":5,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":17}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(63, 'audit:created', 18, 'App\\Models\\InvoiceDetail#18', 1, '{\"invoice_id\":17,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":18}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(64, 'audit:created', 19, 'App\\Models\\InvoiceDetail#19', 1, '{\"invoice_id\":17,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":19}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(65, 'audit:created', 20, 'App\\Models\\InvoiceDetail#20', 1, '{\"invoice_id\":17,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":20}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(66, 'audit:created', 18, 'App\\Models\\Invoice#18', 1, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"some notes og 3x3\",\"status\":\"in-progress\",\"appointment_id\":5,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":18}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(67, 'audit:created', 21, 'App\\Models\\InvoiceDetail#21', 1, '{\"invoice_id\":18,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":21}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(68, 'audit:created', 22, 'App\\Models\\InvoiceDetail#22', 1, '{\"invoice_id\":18,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":22}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(69, 'audit:created', 23, 'App\\Models\\InvoiceDetail#23', 1, '{\"invoice_id\":18,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:42:28\",\"created_at\":\"2023-03-09 00:42:28\",\"id\":23}', '127.0.0.1', '2023-03-08 19:42:28', '2023-03-08 19:42:28'),
(70, 'audit:created', 6, 'App\\Models\\Appointment#6', 1, '{\"notes\":\"1 client 2 staff\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:43:03\",\"created_at\":\"2023-03-09 00:43:03\",\"id\":6,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:43:03', '2023-03-08 19:43:03'),
(71, 'audit:created', 19, 'App\\Models\\Invoice#19', 1, '{\"total_amount\":160,\"total_hours_consumed\":2,\"hour_charges\":80,\"description\":\"1 client 2 staff\",\"status\":\"in-progress\",\"appointment_id\":6,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:43:03\",\"created_at\":\"2023-03-09 00:43:03\",\"id\":19}', '127.0.0.1', '2023-03-08 19:43:03', '2023-03-08 19:43:03'),
(72, 'audit:created', 24, 'App\\Models\\InvoiceDetail#24', 1, '{\"invoice_id\":19,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:43:03\",\"created_at\":\"2023-03-09 00:43:03\",\"id\":24}', '127.0.0.1', '2023-03-08 19:43:03', '2023-03-08 19:43:03'),
(73, 'audit:created', 25, 'App\\Models\\InvoiceDetail#25', 1, '{\"invoice_id\":19,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:43:03\",\"created_at\":\"2023-03-09 00:43:03\",\"id\":25}', '127.0.0.1', '2023-03-08 19:43:03', '2023-03-08 19:43:03'),
(74, 'audit:created', 7, 'App\\Models\\Appointment#7', 1, '{\"notes\":\"3 client 1 staff\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:43:43\",\"created_at\":\"2023-03-09 00:43:43\",\"id\":7,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:43:43', '2023-03-08 19:43:43'),
(75, 'audit:created', 20, 'App\\Models\\Invoice#20', 1, '{\"total_amount\":26.666666666666664,\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"3 client 1 staff\",\"status\":\"in-progress\",\"appointment_id\":7,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:43:43\",\"created_at\":\"2023-03-09 00:43:43\",\"id\":20}', '127.0.0.1', '2023-03-08 19:43:43', '2023-03-08 19:43:43'),
(76, 'audit:created', 26, 'App\\Models\\InvoiceDetail#26', 1, '{\"invoice_id\":20,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:43:43\",\"created_at\":\"2023-03-09 00:43:43\",\"id\":26}', '127.0.0.1', '2023-03-08 19:43:43', '2023-03-08 19:43:43'),
(77, 'audit:created', 21, 'App\\Models\\Invoice#21', 1, '{\"total_amount\":26.666666666666664,\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"3 client 1 staff\",\"status\":\"in-progress\",\"appointment_id\":7,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:43:43\",\"created_at\":\"2023-03-09 00:43:43\",\"id\":21}', '127.0.0.1', '2023-03-08 19:43:43', '2023-03-08 19:43:43'),
(78, 'audit:created', 27, 'App\\Models\\InvoiceDetail#27', 1, '{\"invoice_id\":21,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:43:43\",\"created_at\":\"2023-03-09 00:43:43\",\"id\":27}', '127.0.0.1', '2023-03-08 19:43:43', '2023-03-08 19:43:43'),
(79, 'audit:created', 22, 'App\\Models\\Invoice#22', 1, '{\"total_amount\":26.666666666666664,\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"3 client 1 staff\",\"status\":\"in-progress\",\"appointment_id\":7,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:43:43\",\"created_at\":\"2023-03-09 00:43:43\",\"id\":22}', '127.0.0.1', '2023-03-08 19:43:43', '2023-03-08 19:43:43'),
(80, 'audit:created', 28, 'App\\Models\\InvoiceDetail#28', 1, '{\"invoice_id\":22,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:43:43\",\"created_at\":\"2023-03-09 00:43:43\",\"id\":28}', '127.0.0.1', '2023-03-08 19:43:43', '2023-03-08 19:43:43'),
(81, 'audit:updated', 20, 'App\\Models\\Invoice#20', 1, '{\"status\":\"invoice-generated\",\"updated_at\":\"2023-03-09 00:44:21\",\"id\":20}', '127.0.0.1', '2023-03-08 19:44:21', '2023-03-08 19:44:21'),
(82, 'audit:created', 8, 'App\\Models\\Appointment#8', 1, '{\"notes\":\"new 3 clients 1 staff\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:49:29\",\"created_at\":\"2023-03-09 00:49:29\",\"id\":8,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:49:29', '2023-03-08 19:49:29'),
(83, 'audit:created', 23, 'App\\Models\\Invoice#23', 1, '{\"total_amount\":26.666666666666664,\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"new 3 clients 1 staff\",\"status\":\"in-progress\",\"appointment_id\":8,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:49:29\",\"created_at\":\"2023-03-09 00:49:29\",\"id\":23}', '127.0.0.1', '2023-03-08 19:49:29', '2023-03-08 19:49:29'),
(84, 'audit:created', 29, 'App\\Models\\InvoiceDetail#29', 1, '{\"invoice_id\":23,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:49:29\",\"created_at\":\"2023-03-09 00:49:29\",\"id\":29}', '127.0.0.1', '2023-03-08 19:49:29', '2023-03-08 19:49:29'),
(85, 'audit:created', 24, 'App\\Models\\Invoice#24', 1, '{\"total_amount\":26.666666666666664,\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"new 3 clients 1 staff\",\"status\":\"in-progress\",\"appointment_id\":8,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:49:29\",\"created_at\":\"2023-03-09 00:49:29\",\"id\":24}', '127.0.0.1', '2023-03-08 19:49:29', '2023-03-08 19:49:29'),
(86, 'audit:created', 30, 'App\\Models\\InvoiceDetail#30', 1, '{\"invoice_id\":24,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:49:29\",\"created_at\":\"2023-03-09 00:49:29\",\"id\":30}', '127.0.0.1', '2023-03-08 19:49:29', '2023-03-08 19:49:29'),
(87, 'audit:created', 25, 'App\\Models\\Invoice#25', 1, '{\"total_amount\":26.666666666666664,\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"new 3 clients 1 staff\",\"status\":\"in-progress\",\"appointment_id\":8,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:49:29\",\"created_at\":\"2023-03-09 00:49:29\",\"id\":25}', '127.0.0.1', '2023-03-08 19:49:29', '2023-03-08 19:49:29'),
(88, 'audit:created', 31, 'App\\Models\\InvoiceDetail#31', 1, '{\"invoice_id\":25,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:49:29\",\"created_at\":\"2023-03-09 00:49:29\",\"id\":31}', '127.0.0.1', '2023-03-08 19:49:29', '2023-03-08 19:49:29'),
(89, 'audit:created', 9, 'App\\Models\\Appointment#9', 1, '{\"notes\":\"some\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:52:57\",\"created_at\":\"2023-03-09 00:52:57\",\"id\":9,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:52:57', '2023-03-08 19:52:57'),
(90, 'audit:created', 26, 'App\\Models\\Invoice#26', 1, '{\"total_amount\":\"26.67\",\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"some\",\"status\":\"in-progress\",\"appointment_id\":9,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:52:57\",\"created_at\":\"2023-03-09 00:52:57\",\"id\":26}', '127.0.0.1', '2023-03-08 19:52:57', '2023-03-08 19:52:57'),
(91, 'audit:created', 1, 'App\\Models\\InvoiceDetail#1', 1, '{\"invoice_id\":26,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:52:57\",\"created_at\":\"2023-03-09 00:52:57\",\"id\":1}', '127.0.0.1', '2023-03-08 19:52:57', '2023-03-08 19:52:57'),
(92, 'audit:created', 27, 'App\\Models\\Invoice#27', 1, '{\"total_amount\":\"26.67\",\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"some\",\"status\":\"in-progress\",\"appointment_id\":9,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:52:57\",\"created_at\":\"2023-03-09 00:52:57\",\"id\":27}', '127.0.0.1', '2023-03-08 19:52:57', '2023-03-08 19:52:57'),
(93, 'audit:created', 2, 'App\\Models\\InvoiceDetail#2', 1, '{\"invoice_id\":27,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:52:57\",\"created_at\":\"2023-03-09 00:52:57\",\"id\":2}', '127.0.0.1', '2023-03-08 19:52:57', '2023-03-08 19:52:57'),
(94, 'audit:created', 28, 'App\\Models\\Invoice#28', 1, '{\"total_amount\":\"26.67\",\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"some\",\"status\":\"in-progress\",\"appointment_id\":9,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:52:57\",\"created_at\":\"2023-03-09 00:52:57\",\"id\":28}', '127.0.0.1', '2023-03-08 19:52:57', '2023-03-08 19:52:57'),
(95, 'audit:created', 3, 'App\\Models\\InvoiceDetail#3', 1, '{\"invoice_id\":28,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:52:57\",\"created_at\":\"2023-03-09 00:52:57\",\"id\":3}', '127.0.0.1', '2023-03-08 19:52:57', '2023-03-08 19:52:57'),
(96, 'audit:created', 10, 'App\\Models\\Appointment#10', 1, '{\"notes\":\"ggggg\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 02:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":10,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(97, 'audit:created', 29, 'App\\Models\\Invoice#29', 1, '{\"total_amount\":\"40\",\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"ggggg\",\"status\":\"in-progress\",\"appointment_id\":10,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":29}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(98, 'audit:created', 4, 'App\\Models\\InvoiceDetail#4', 1, '{\"invoice_id\":29,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":4}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(99, 'audit:created', 5, 'App\\Models\\InvoiceDetail#5', 1, '{\"invoice_id\":29,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":5}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(100, 'audit:created', 6, 'App\\Models\\InvoiceDetail#6', 1, '{\"invoice_id\":29,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":6}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(101, 'audit:created', 30, 'App\\Models\\Invoice#30', 1, '{\"total_amount\":\"40\",\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"ggggg\",\"status\":\"in-progress\",\"appointment_id\":10,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":30}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(102, 'audit:created', 7, 'App\\Models\\InvoiceDetail#7', 1, '{\"invoice_id\":30,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":7}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(103, 'audit:created', 8, 'App\\Models\\InvoiceDetail#8', 1, '{\"invoice_id\":30,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":8}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(104, 'audit:created', 9, 'App\\Models\\InvoiceDetail#9', 1, '{\"invoice_id\":30,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":9}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(105, 'audit:created', 31, 'App\\Models\\Invoice#31', 1, '{\"total_amount\":\"40\",\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"ggggg\",\"status\":\"in-progress\",\"appointment_id\":10,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":31}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(106, 'audit:created', 10, 'App\\Models\\InvoiceDetail#10', 1, '{\"invoice_id\":31,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":10}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(107, 'audit:created', 11, 'App\\Models\\InvoiceDetail#11', 1, '{\"invoice_id\":31,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":11}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(108, 'audit:created', 12, 'App\\Models\\InvoiceDetail#12', 1, '{\"invoice_id\":31,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 00:53:54\",\"created_at\":\"2023-03-09 00:53:54\",\"id\":12}', '127.0.0.1', '2023-03-08 19:53:54', '2023-03-08 19:53:54'),
(109, 'audit:deleted', 10, 'App\\Models\\Appointment#10', 1, '{\"id\":10,\"notes\":\"ggggg\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 02:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"billing_run\":null,\"created_at\":\"2023-03-09 00:53:54\",\"updated_at\":\"2023-03-09 00:54:20\",\"deleted_at\":\"2023-03-09 00:54:20\",\"status_id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:54:20', '2023-03-08 19:54:20'),
(110, 'audit:deleted', 9, 'App\\Models\\Appointment#9', 1, '{\"id\":9,\"notes\":\"some\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"billing_run\":null,\"created_at\":\"2023-03-09 00:52:57\",\"updated_at\":\"2023-03-09 00:54:24\",\"deleted_at\":\"2023-03-09 00:54:24\",\"status_id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:54:24', '2023-03-08 19:54:24'),
(111, 'audit:created', 11, 'App\\Models\\Appointment#11', 1, '{\"notes\":\"nnnnn\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 02:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:54:41\",\"created_at\":\"2023-03-09 00:54:41\",\"id\":11,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:54:41', '2023-03-08 19:54:41'),
(112, 'audit:created', 32, 'App\\Models\\Invoice#32', 1, '{\"total_amount\":\"13.333333333333\",\"total_hours_consumed\":1,\"hour_charges\":13.333333333333332,\"description\":\"nnnnn\",\"status\":\"in-progress\",\"appointment_id\":11,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:54:41\",\"created_at\":\"2023-03-09 00:54:41\",\"id\":32}', '127.0.0.1', '2023-03-08 19:54:41', '2023-03-08 19:54:41'),
(113, 'audit:created', 13, 'App\\Models\\InvoiceDetail#13', 1, '{\"invoice_id\":32,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:54:41\",\"created_at\":\"2023-03-09 00:54:41\",\"id\":13}', '127.0.0.1', '2023-03-08 19:54:41', '2023-03-08 19:54:41'),
(114, 'audit:created', 33, 'App\\Models\\Invoice#33', 1, '{\"total_amount\":\"13.333333333333\",\"total_hours_consumed\":1,\"hour_charges\":13.333333333333332,\"description\":\"nnnnn\",\"status\":\"in-progress\",\"appointment_id\":11,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:54:41\",\"created_at\":\"2023-03-09 00:54:41\",\"id\":33}', '127.0.0.1', '2023-03-08 19:54:41', '2023-03-08 19:54:41'),
(115, 'audit:created', 14, 'App\\Models\\InvoiceDetail#14', 1, '{\"invoice_id\":33,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:54:41\",\"created_at\":\"2023-03-09 00:54:41\",\"id\":14}', '127.0.0.1', '2023-03-08 19:54:41', '2023-03-08 19:54:41'),
(116, 'audit:created', 34, 'App\\Models\\Invoice#34', 1, '{\"total_amount\":\"13.333333333333\",\"total_hours_consumed\":1,\"hour_charges\":13.333333333333332,\"description\":\"nnnnn\",\"status\":\"in-progress\",\"appointment_id\":11,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:54:41\",\"created_at\":\"2023-03-09 00:54:41\",\"id\":34}', '127.0.0.1', '2023-03-08 19:54:41', '2023-03-08 19:54:41'),
(117, 'audit:created', 15, 'App\\Models\\InvoiceDetail#15', 1, '{\"invoice_id\":34,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:54:41\",\"created_at\":\"2023-03-09 00:54:41\",\"id\":15}', '127.0.0.1', '2023-03-08 19:54:41', '2023-03-08 19:54:41'),
(118, 'audit:deleted', 11, 'App\\Models\\Appointment#11', 1, '{\"id\":11,\"notes\":\"nnnnn\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 02:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"billing_run\":null,\"created_at\":\"2023-03-09 00:54:41\",\"updated_at\":\"2023-03-09 00:55:02\",\"deleted_at\":\"2023-03-09 00:55:02\",\"status_id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:55:02', '2023-03-08 19:55:02'),
(119, 'audit:created', 12, 'App\\Models\\Appointment#12', 1, '{\"notes\":\"bbb\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:55:21\",\"created_at\":\"2023-03-09 00:55:21\",\"id\":12,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:55:21', '2023-03-08 19:55:21'),
(120, 'audit:created', 35, 'App\\Models\\Invoice#35', 1, '{\"total_amount\":\"26.666666666667\",\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"bbb\",\"status\":\"in-progress\",\"appointment_id\":12,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:55:21\",\"created_at\":\"2023-03-09 00:55:21\",\"id\":35}', '127.0.0.1', '2023-03-08 19:55:21', '2023-03-08 19:55:21'),
(121, 'audit:created', 16, 'App\\Models\\InvoiceDetail#16', 1, '{\"invoice_id\":35,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:55:21\",\"created_at\":\"2023-03-09 00:55:21\",\"id\":16}', '127.0.0.1', '2023-03-08 19:55:21', '2023-03-08 19:55:21'),
(122, 'audit:created', 36, 'App\\Models\\Invoice#36', 1, '{\"total_amount\":\"26.666666666667\",\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"bbb\",\"status\":\"in-progress\",\"appointment_id\":12,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:55:21\",\"created_at\":\"2023-03-09 00:55:21\",\"id\":36}', '127.0.0.1', '2023-03-08 19:55:21', '2023-03-08 19:55:21'),
(123, 'audit:created', 17, 'App\\Models\\InvoiceDetail#17', 1, '{\"invoice_id\":36,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:55:21\",\"created_at\":\"2023-03-09 00:55:21\",\"id\":17}', '127.0.0.1', '2023-03-08 19:55:21', '2023-03-08 19:55:21'),
(124, 'audit:created', 37, 'App\\Models\\Invoice#37', 1, '{\"total_amount\":\"26.666666666667\",\"total_hours_consumed\":2,\"hour_charges\":13.333333333333332,\"description\":\"bbb\",\"status\":\"in-progress\",\"appointment_id\":12,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:55:21\",\"created_at\":\"2023-03-09 00:55:21\",\"id\":37}', '127.0.0.1', '2023-03-08 19:55:21', '2023-03-08 19:55:21'),
(125, 'audit:created', 18, 'App\\Models\\InvoiceDetail#18', 1, '{\"invoice_id\":37,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:55:21\",\"created_at\":\"2023-03-09 00:55:21\",\"id\":18}', '127.0.0.1', '2023-03-08 19:55:21', '2023-03-08 19:55:21'),
(126, 'audit:deleted', 12, 'App\\Models\\Appointment#12', 1, '{\"id\":12,\"notes\":\"bbb\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"billing_run\":null,\"created_at\":\"2023-03-09 00:55:21\",\"updated_at\":\"2023-03-09 00:57:33\",\"deleted_at\":\"2023-03-09 00:57:33\",\"status_id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:57:33', '2023-03-08 19:57:33'),
(127, 'audit:created', 13, 'App\\Models\\Appointment#13', 1, '{\"notes\":\"asdfasdf\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 00:58:08\",\"created_at\":\"2023-03-09 00:58:08\",\"id\":13,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 19:58:08', '2023-03-08 19:58:08'),
(128, 'audit:created', 38, 'App\\Models\\Invoice#38', 1, '{\"total_amount\":26,\"total_hours_consumed\":2,\"hour_charges\":13,\"description\":\"asdfasdf\",\"status\":\"in-progress\",\"appointment_id\":13,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:58:08\",\"created_at\":\"2023-03-09 00:58:08\",\"id\":38}', '127.0.0.1', '2023-03-08 19:58:08', '2023-03-08 19:58:08'),
(129, 'audit:created', 19, 'App\\Models\\InvoiceDetail#19', 1, '{\"invoice_id\":38,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:58:08\",\"created_at\":\"2023-03-09 00:58:08\",\"id\":19}', '127.0.0.1', '2023-03-08 19:58:08', '2023-03-08 19:58:08'),
(130, 'audit:created', 39, 'App\\Models\\Invoice#39', 1, '{\"total_amount\":26,\"total_hours_consumed\":2,\"hour_charges\":13,\"description\":\"asdfasdf\",\"status\":\"in-progress\",\"appointment_id\":13,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:58:08\",\"created_at\":\"2023-03-09 00:58:08\",\"id\":39}', '127.0.0.1', '2023-03-08 19:58:08', '2023-03-08 19:58:08'),
(131, 'audit:created', 20, 'App\\Models\\InvoiceDetail#20', 1, '{\"invoice_id\":39,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:58:08\",\"created_at\":\"2023-03-09 00:58:08\",\"id\":20}', '127.0.0.1', '2023-03-08 19:58:08', '2023-03-08 19:58:08'),
(132, 'audit:created', 40, 'App\\Models\\Invoice#40', 1, '{\"total_amount\":26,\"total_hours_consumed\":2,\"hour_charges\":13,\"description\":\"asdfasdf\",\"status\":\"in-progress\",\"appointment_id\":13,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 00:58:08\",\"created_at\":\"2023-03-09 00:58:08\",\"id\":40}', '127.0.0.1', '2023-03-08 19:58:08', '2023-03-08 19:58:08'),
(133, 'audit:created', 21, 'App\\Models\\InvoiceDetail#21', 1, '{\"invoice_id\":40,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 00:58:08\",\"created_at\":\"2023-03-09 00:58:08\",\"id\":21}', '127.0.0.1', '2023-03-08 19:58:08', '2023-03-08 19:58:08'),
(138, 'audit:created', 18, 'App\\Models\\Appointment#18', 1, '{\"notes\":\"someeeee\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 01:23:38\",\"created_at\":\"2023-03-09 01:23:38\",\"id\":18,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:23:38', '2023-03-08 20:23:38'),
(139, 'audit:created', 41, 'App\\Models\\Invoice#41', 1, '{\"total_amount\":26.6,\"total_hours_consumed\":2,\"hour_charges\":13.3,\"description\":\"someeeee\",\"status\":\"in-progress\",\"appointment_id\":18,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:23:38\",\"created_at\":\"2023-03-09 01:23:38\",\"id\":41}', '127.0.0.1', '2023-03-08 20:23:38', '2023-03-08 20:23:38'),
(140, 'audit:created', 22, 'App\\Models\\InvoiceDetail#22', 1, '{\"invoice_id\":41,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:23:38\",\"created_at\":\"2023-03-09 01:23:38\",\"id\":22}', '127.0.0.1', '2023-03-08 20:23:38', '2023-03-08 20:23:38'),
(141, 'audit:created', 42, 'App\\Models\\Invoice#42', 1, '{\"total_amount\":26.6,\"total_hours_consumed\":2,\"hour_charges\":13.3,\"description\":\"someeeee\",\"status\":\"in-progress\",\"appointment_id\":18,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:23:38\",\"created_at\":\"2023-03-09 01:23:38\",\"id\":42}', '127.0.0.1', '2023-03-08 20:23:38', '2023-03-08 20:23:38'),
(142, 'audit:created', 23, 'App\\Models\\InvoiceDetail#23', 1, '{\"invoice_id\":42,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:23:38\",\"created_at\":\"2023-03-09 01:23:38\",\"id\":23}', '127.0.0.1', '2023-03-08 20:23:38', '2023-03-08 20:23:38'),
(143, 'audit:created', 43, 'App\\Models\\Invoice#43', 1, '{\"total_amount\":26.6,\"total_hours_consumed\":2,\"hour_charges\":13.3,\"description\":\"someeeee\",\"status\":\"in-progress\",\"appointment_id\":18,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:23:38\",\"created_at\":\"2023-03-09 01:23:38\",\"id\":43}', '127.0.0.1', '2023-03-08 20:23:38', '2023-03-08 20:23:38'),
(144, 'audit:created', 24, 'App\\Models\\InvoiceDetail#24', 1, '{\"invoice_id\":43,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:23:38\",\"created_at\":\"2023-03-09 01:23:38\",\"id\":24}', '127.0.0.1', '2023-03-08 20:23:38', '2023-03-08 20:23:38'),
(145, 'audit:deleted', 18, 'App\\Models\\Appointment#18', 1, '{\"id\":18,\"notes\":\"someeeee\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"billing_run\":null,\"created_at\":\"2023-03-09 01:23:38\",\"updated_at\":\"2023-03-09 01:24:56\",\"deleted_at\":\"2023-03-09 01:24:56\",\"status_id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:24:56', '2023-03-08 20:24:56'),
(146, 'audit:deleted', 13, 'App\\Models\\Appointment#13', 1, '{\"id\":13,\"notes\":\"asdfasdf\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"billing_run\":null,\"created_at\":\"2023-03-09 00:58:08\",\"updated_at\":\"2023-03-09 01:25:01\",\"deleted_at\":\"2023-03-09 01:25:01\",\"status_id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:25:01', '2023-03-08 20:25:01'),
(147, 'audit:created', 19, 'App\\Models\\Appointment#19', 1, '{\"notes\":\"ssss\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 01:25:24\",\"created_at\":\"2023-03-09 01:25:24\",\"id\":19,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:25:24', '2023-03-08 20:25:24'),
(148, 'audit:created', 44, 'App\\Models\\Invoice#44', 1, '{\"total_amount\":26.6,\"total_hours_consumed\":2,\"hour_charges\":13.3,\"description\":\"ssss\",\"status\":\"in-progress\",\"appointment_id\":19,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:25:24\",\"created_at\":\"2023-03-09 01:25:24\",\"id\":44}', '127.0.0.1', '2023-03-08 20:25:24', '2023-03-08 20:25:24'),
(149, 'audit:created', 25, 'App\\Models\\InvoiceDetail#25', 1, '{\"invoice_id\":44,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:25:24\",\"created_at\":\"2023-03-09 01:25:24\",\"id\":25}', '127.0.0.1', '2023-03-08 20:25:24', '2023-03-08 20:25:24'),
(150, 'audit:created', 45, 'App\\Models\\Invoice#45', 1, '{\"total_amount\":26.6,\"total_hours_consumed\":2,\"hour_charges\":13.3,\"description\":\"ssss\",\"status\":\"in-progress\",\"appointment_id\":19,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:25:24\",\"created_at\":\"2023-03-09 01:25:24\",\"id\":45}', '127.0.0.1', '2023-03-08 20:25:24', '2023-03-08 20:25:24');
INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(151, 'audit:created', 26, 'App\\Models\\InvoiceDetail#26', 1, '{\"invoice_id\":45,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:25:24\",\"created_at\":\"2023-03-09 01:25:24\",\"id\":26}', '127.0.0.1', '2023-03-08 20:25:24', '2023-03-08 20:25:24'),
(152, 'audit:created', 46, 'App\\Models\\Invoice#46', 1, '{\"total_amount\":26.6,\"total_hours_consumed\":2,\"hour_charges\":13.3,\"description\":\"ssss\",\"status\":\"in-progress\",\"appointment_id\":19,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:25:24\",\"created_at\":\"2023-03-09 01:25:24\",\"id\":46}', '127.0.0.1', '2023-03-08 20:25:24', '2023-03-08 20:25:24'),
(153, 'audit:created', 27, 'App\\Models\\InvoiceDetail#27', 1, '{\"invoice_id\":46,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:25:24\",\"created_at\":\"2023-03-09 01:25:24\",\"id\":27}', '127.0.0.1', '2023-03-08 20:25:24', '2023-03-08 20:25:24'),
(154, 'audit:deleted', 19, 'App\\Models\\Appointment#19', 1, '{\"id\":19,\"notes\":\"ssss\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"billing_run\":null,\"created_at\":\"2023-03-09 01:25:24\",\"updated_at\":\"2023-03-09 01:26:16\",\"deleted_at\":\"2023-03-09 01:26:16\",\"status_id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:26:16', '2023-03-08 20:26:16'),
(155, 'audit:created', 20, 'App\\Models\\Appointment#20', 1, '{\"notes\":\"asdf\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 01:26:40\",\"created_at\":\"2023-03-09 01:26:40\",\"id\":20,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:26:40', '2023-03-08 20:26:40'),
(156, 'audit:created', 47, 'App\\Models\\Invoice#47', 1, '{\"total_amount\":26.66,\"total_hours_consumed\":2,\"hour_charges\":13.33,\"description\":\"asdf\",\"status\":\"in-progress\",\"appointment_id\":20,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:26:40\",\"created_at\":\"2023-03-09 01:26:40\",\"id\":47}', '127.0.0.1', '2023-03-08 20:26:40', '2023-03-08 20:26:40'),
(157, 'audit:created', 28, 'App\\Models\\InvoiceDetail#28', 1, '{\"invoice_id\":47,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:26:40\",\"created_at\":\"2023-03-09 01:26:40\",\"id\":28}', '127.0.0.1', '2023-03-08 20:26:40', '2023-03-08 20:26:40'),
(158, 'audit:created', 48, 'App\\Models\\Invoice#48', 1, '{\"total_amount\":26.66,\"total_hours_consumed\":2,\"hour_charges\":13.33,\"description\":\"asdf\",\"status\":\"in-progress\",\"appointment_id\":20,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:26:40\",\"created_at\":\"2023-03-09 01:26:40\",\"id\":48}', '127.0.0.1', '2023-03-08 20:26:41', '2023-03-08 20:26:41'),
(159, 'audit:created', 29, 'App\\Models\\InvoiceDetail#29', 1, '{\"invoice_id\":48,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:26:41\",\"created_at\":\"2023-03-09 01:26:41\",\"id\":29}', '127.0.0.1', '2023-03-08 20:26:41', '2023-03-08 20:26:41'),
(160, 'audit:created', 49, 'App\\Models\\Invoice#49', 1, '{\"total_amount\":26.66,\"total_hours_consumed\":2,\"hour_charges\":13.33,\"description\":\"asdf\",\"status\":\"in-progress\",\"appointment_id\":20,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:26:41\",\"created_at\":\"2023-03-09 01:26:41\",\"id\":49}', '127.0.0.1', '2023-03-08 20:26:41', '2023-03-08 20:26:41'),
(161, 'audit:created', 30, 'App\\Models\\InvoiceDetail#30', 1, '{\"invoice_id\":49,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:26:41\",\"created_at\":\"2023-03-09 01:26:41\",\"id\":30}', '127.0.0.1', '2023-03-08 20:26:41', '2023-03-08 20:26:41'),
(163, 'audit:created', 22, 'App\\Models\\Appointment#22', 1, '{\"notes\":\"nnnnnnn\",\"start_time\":\"18\\/03\\/2023 01:00:00\",\"end_time\":\"18\\/03\\/2023 04:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":22,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(164, 'audit:created', 50, 'App\\Models\\Invoice#50', 1, '{\"total_amount\":210,\"total_hours_consumed\":3,\"hour_charges\":70,\"description\":\"nnnnnnn\",\"status\":\"in-progress\",\"appointment_id\":22,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":50}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(165, 'audit:created', 31, 'App\\Models\\InvoiceDetail#31', 1, '{\"invoice_id\":50,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":31}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(166, 'audit:created', 32, 'App\\Models\\InvoiceDetail#32', 1, '{\"invoice_id\":50,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":32}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(167, 'audit:created', 33, 'App\\Models\\InvoiceDetail#33', 1, '{\"invoice_id\":50,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":33}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(168, 'audit:created', 51, 'App\\Models\\Invoice#51', 1, '{\"total_amount\":210,\"total_hours_consumed\":3,\"hour_charges\":70,\"description\":\"nnnnnnn\",\"status\":\"in-progress\",\"appointment_id\":22,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":51}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(169, 'audit:created', 34, 'App\\Models\\InvoiceDetail#34', 1, '{\"invoice_id\":51,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":34}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(170, 'audit:created', 35, 'App\\Models\\InvoiceDetail#35', 1, '{\"invoice_id\":51,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":35}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(171, 'audit:created', 36, 'App\\Models\\InvoiceDetail#36', 1, '{\"invoice_id\":51,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":36}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(172, 'audit:created', 52, 'App\\Models\\Invoice#52', 1, '{\"total_amount\":210,\"total_hours_consumed\":3,\"hour_charges\":70,\"description\":\"nnnnnnn\",\"status\":\"in-progress\",\"appointment_id\":22,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":52}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(173, 'audit:created', 37, 'App\\Models\\InvoiceDetail#37', 1, '{\"invoice_id\":52,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":37}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(174, 'audit:created', 38, 'App\\Models\\InvoiceDetail#38', 1, '{\"invoice_id\":52,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":38}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(175, 'audit:created', 39, 'App\\Models\\InvoiceDetail#39', 1, '{\"invoice_id\":52,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 01:29:04\",\"created_at\":\"2023-03-09 01:29:04\",\"id\":39}', '127.0.0.1', '2023-03-08 20:29:04', '2023-03-08 20:29:04'),
(176, 'audit:updated', 52, 'App\\Models\\Invoice#52', 1, '{\"status\":\"invoice-generated\",\"updated_at\":\"2023-03-09 01:29:17\",\"id\":52}', '127.0.0.1', '2023-03-08 20:29:17', '2023-03-08 20:29:17'),
(177, 'audit:updated', 52, 'App\\Models\\Invoice#52', 1, '{\"xero_invoice_id\":\"862159ba-baea-4eb3-bd94-7cf30f0134f7\",\"status\":\"approved\",\"updated_at\":\"2023-03-09 01:31:30\",\"id\":52}', '127.0.0.1', '2023-03-08 20:31:30', '2023-03-08 20:31:30'),
(178, 'audit:deleted', 22, 'App\\Models\\Appointment#22', 1, '{\"id\":22,\"notes\":\"nnnnnnn\",\"start_time\":\"18\\/03\\/2023 01:00:00\",\"end_time\":\"18\\/03\\/2023 04:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"billing_run\":null,\"created_at\":\"2023-03-09 01:29:04\",\"updated_at\":\"2023-03-09 01:32:07\",\"deleted_at\":\"2023-03-09 01:32:07\",\"status_id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:32:07', '2023-03-08 20:32:07'),
(179, 'audit:deleted', 20, 'App\\Models\\Appointment#20', 1, '{\"id\":20,\"notes\":\"asdf\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"billing_run\":null,\"created_at\":\"2023-03-09 01:26:40\",\"updated_at\":\"2023-03-09 01:32:11\",\"deleted_at\":\"2023-03-09 01:32:11\",\"status_id\":2,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:32:11', '2023-03-08 20:32:11'),
(180, 'audit:created', 23, 'App\\Models\\Appointment#23', 1, '{\"notes\":\"asdf\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 01:32:38\",\"created_at\":\"2023-03-09 01:32:38\",\"id\":23,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:32:38', '2023-03-08 20:32:38'),
(181, 'audit:created', 53, 'App\\Models\\Invoice#53', 1, '{\"total_amount\":26.66,\"total_hours_consumed\":2,\"hour_charges\":13.33,\"description\":\"asdf\",\"status\":\"in-progress\",\"appointment_id\":23,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:32:38\",\"created_at\":\"2023-03-09 01:32:38\",\"id\":53}', '127.0.0.1', '2023-03-08 20:32:38', '2023-03-08 20:32:38'),
(182, 'audit:created', 40, 'App\\Models\\InvoiceDetail#40', 1, '{\"invoice_id\":53,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:32:38\",\"created_at\":\"2023-03-09 01:32:38\",\"id\":40}', '127.0.0.1', '2023-03-08 20:32:38', '2023-03-08 20:32:38'),
(183, 'audit:created', 54, 'App\\Models\\Invoice#54', 1, '{\"total_amount\":26.66,\"total_hours_consumed\":2,\"hour_charges\":13.33,\"description\":\"asdf\",\"status\":\"in-progress\",\"appointment_id\":23,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:32:38\",\"created_at\":\"2023-03-09 01:32:38\",\"id\":54}', '127.0.0.1', '2023-03-08 20:32:38', '2023-03-08 20:32:38'),
(184, 'audit:created', 41, 'App\\Models\\InvoiceDetail#41', 1, '{\"invoice_id\":54,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:32:38\",\"created_at\":\"2023-03-09 01:32:38\",\"id\":41}', '127.0.0.1', '2023-03-08 20:32:38', '2023-03-08 20:32:38'),
(185, 'audit:created', 55, 'App\\Models\\Invoice#55', 1, '{\"total_amount\":26.66,\"total_hours_consumed\":2,\"hour_charges\":13.33,\"description\":\"asdf\",\"status\":\"in-progress\",\"appointment_id\":23,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:32:38\",\"created_at\":\"2023-03-09 01:32:38\",\"id\":55}', '127.0.0.1', '2023-03-08 20:32:38', '2023-03-08 20:32:38'),
(186, 'audit:created', 42, 'App\\Models\\InvoiceDetail#42', 1, '{\"invoice_id\":55,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:32:38\",\"created_at\":\"2023-03-09 01:32:38\",\"id\":42}', '127.0.0.1', '2023-03-08 20:32:38', '2023-03-08 20:32:38'),
(187, 'audit:created', 24, 'App\\Models\\Appointment#24', 1, '{\"notes\":\"zzzzzz\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 01:33:06\",\"created_at\":\"2023-03-09 01:33:06\",\"id\":24,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:33:06', '2023-03-08 20:33:06'),
(188, 'audit:created', 56, 'App\\Models\\Invoice#56', 1, '{\"total_amount\":26.66,\"total_hours_consumed\":2,\"hour_charges\":13.33,\"description\":\"zzzzzz\",\"status\":\"in-progress\",\"appointment_id\":24,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:33:06\",\"created_at\":\"2023-03-09 01:33:06\",\"id\":56}', '127.0.0.1', '2023-03-08 20:33:06', '2023-03-08 20:33:06'),
(189, 'audit:created', 43, 'App\\Models\\InvoiceDetail#43', 1, '{\"invoice_id\":56,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 01:33:06\",\"created_at\":\"2023-03-09 01:33:06\",\"id\":43}', '127.0.0.1', '2023-03-08 20:33:06', '2023-03-08 20:33:06'),
(190, 'audit:created', 57, 'App\\Models\\Invoice#57', 1, '{\"total_amount\":26.66,\"total_hours_consumed\":2,\"hour_charges\":13.33,\"description\":\"zzzzzz\",\"status\":\"in-progress\",\"appointment_id\":24,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:33:06\",\"created_at\":\"2023-03-09 01:33:06\",\"id\":57}', '127.0.0.1', '2023-03-08 20:33:06', '2023-03-08 20:33:06'),
(191, 'audit:created', 44, 'App\\Models\\InvoiceDetail#44', 1, '{\"invoice_id\":57,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 01:33:06\",\"created_at\":\"2023-03-09 01:33:06\",\"id\":44}', '127.0.0.1', '2023-03-08 20:33:06', '2023-03-08 20:33:06'),
(192, 'audit:created', 58, 'App\\Models\\Invoice#58', 1, '{\"total_amount\":26.66,\"total_hours_consumed\":2,\"hour_charges\":13.33,\"description\":\"zzzzzz\",\"status\":\"in-progress\",\"appointment_id\":24,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:33:06\",\"created_at\":\"2023-03-09 01:33:06\",\"id\":58}', '127.0.0.1', '2023-03-08 20:33:06', '2023-03-08 20:33:06'),
(193, 'audit:created', 45, 'App\\Models\\InvoiceDetail#45', 1, '{\"invoice_id\":58,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 01:33:06\",\"created_at\":\"2023-03-09 01:33:06\",\"id\":45}', '127.0.0.1', '2023-03-08 20:33:06', '2023-03-08 20:33:06'),
(194, 'audit:created', 25, 'App\\Models\\Appointment#25', 1, '{\"notes\":\"dfg\",\"start_time\":\"13\\/03\\/2023 01:00:00\",\"end_time\":\"13\\/03\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":25,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(195, 'audit:created', 59, 'App\\Models\\Invoice#59', 1, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"dfg\",\"status\":\"in-progress\",\"appointment_id\":25,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":59}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(196, 'audit:created', 1, 'App\\Models\\InvoiceDetail#1', 1, '{\"invoice_id\":59,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":1}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(197, 'audit:created', 2, 'App\\Models\\InvoiceDetail#2', 1, '{\"invoice_id\":59,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":2}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(198, 'audit:created', 3, 'App\\Models\\InvoiceDetail#3', 1, '{\"invoice_id\":59,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":3}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(199, 'audit:created', 60, 'App\\Models\\Invoice#60', 1, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"dfg\",\"status\":\"in-progress\",\"appointment_id\":25,\"client_id\":\"2\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":60}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(200, 'audit:created', 4, 'App\\Models\\InvoiceDetail#4', 1, '{\"invoice_id\":60,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":4}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(201, 'audit:created', 5, 'App\\Models\\InvoiceDetail#5', 1, '{\"invoice_id\":60,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":5}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(202, 'audit:created', 6, 'App\\Models\\InvoiceDetail#6', 1, '{\"invoice_id\":60,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":6}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(203, 'audit:created', 61, 'App\\Models\\Invoice#61', 1, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"dfg\",\"status\":\"in-progress\",\"appointment_id\":25,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":61}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(204, 'audit:created', 7, 'App\\Models\\InvoiceDetail#7', 1, '{\"invoice_id\":61,\"user_id\":\"1\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":7}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(205, 'audit:created', 8, 'App\\Models\\InvoiceDetail#8', 1, '{\"invoice_id\":61,\"user_id\":\"2\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":8}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(206, 'audit:created', 9, 'App\\Models\\InvoiceDetail#9', 1, '{\"invoice_id\":61,\"user_id\":\"3\",\"updated_at\":\"2023-03-09 01:36:16\",\"created_at\":\"2023-03-09 01:36:16\",\"id\":9}', '127.0.0.1', '2023-03-08 20:36:16', '2023-03-08 20:36:16'),
(207, 'audit:created', 3, 'App\\Models\\Expense#3', 1, '{\"date\":\"16\\/03\\/2023\",\"decscription\":\"making invoice for appointment 1\",\"group_expense\":\"1\",\"appointment_id\":\"25\",\"ammount\":\"40\",\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":3,\"receipt_photo\":null,\"media\":[]}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(208, 'audit:created', 62, 'App\\Models\\Invoice#62', 1, '{\"total_amount\":13.333333333333334,\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"making invoice for appointment 1\",\"status\":\"in-progress\",\"appointment_id\":\"25\",\"client_id\":1,\"expense_id\":3,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":62}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(209, 'audit:created', 10, 'App\\Models\\InvoiceDetail#10', 1, '{\"invoice_id\":62,\"user_id\":1,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":10}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(210, 'audit:created', 11, 'App\\Models\\InvoiceDetail#11', 1, '{\"invoice_id\":62,\"user_id\":2,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":11}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(211, 'audit:created', 12, 'App\\Models\\InvoiceDetail#12', 1, '{\"invoice_id\":62,\"user_id\":3,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":12}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(212, 'audit:created', 63, 'App\\Models\\Invoice#63', 1, '{\"total_amount\":13.333333333333334,\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"making invoice for appointment 1\",\"status\":\"in-progress\",\"appointment_id\":\"25\",\"client_id\":2,\"expense_id\":3,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":63}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(213, 'audit:created', 13, 'App\\Models\\InvoiceDetail#13', 1, '{\"invoice_id\":63,\"user_id\":1,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":13}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(214, 'audit:created', 14, 'App\\Models\\InvoiceDetail#14', 1, '{\"invoice_id\":63,\"user_id\":2,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":14}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(215, 'audit:created', 15, 'App\\Models\\InvoiceDetail#15', 1, '{\"invoice_id\":63,\"user_id\":3,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":15}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(216, 'audit:created', 64, 'App\\Models\\Invoice#64', 1, '{\"total_amount\":13.333333333333334,\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"making invoice for appointment 1\",\"status\":\"in-progress\",\"appointment_id\":\"25\",\"client_id\":3,\"expense_id\":3,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":64}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(217, 'audit:created', 16, 'App\\Models\\InvoiceDetail#16', 1, '{\"invoice_id\":64,\"user_id\":1,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":16}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(218, 'audit:created', 17, 'App\\Models\\InvoiceDetail#17', 1, '{\"invoice_id\":64,\"user_id\":2,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":17}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(219, 'audit:created', 18, 'App\\Models\\InvoiceDetail#18', 1, '{\"invoice_id\":64,\"user_id\":3,\"updated_at\":\"2023-03-09 01:37:37\",\"created_at\":\"2023-03-09 01:37:37\",\"id\":18}', '127.0.0.1', '2023-03-08 20:37:37', '2023-03-08 20:37:37'),
(220, 'audit:updated', 60, 'App\\Models\\Invoice#60', 1, '{\"status\":\"invoice-generated\",\"updated_at\":\"2023-03-09 01:38:03\",\"id\":60}', '127.0.0.1', '2023-03-08 20:38:03', '2023-03-08 20:38:03'),
(221, 'audit:updated', 59, 'App\\Models\\Invoice#59', 1, '{\"status\":\"invoice-generated\",\"updated_at\":\"2023-03-09 01:38:07\",\"id\":59}', '127.0.0.1', '2023-03-08 20:38:07', '2023-03-08 20:38:07'),
(222, 'audit:updated', 61, 'App\\Models\\Invoice#61', 1, '{\"status\":\"invoice-generated\",\"updated_at\":\"2023-03-09 01:38:08\",\"id\":61}', '127.0.0.1', '2023-03-08 20:38:08', '2023-03-08 20:38:08'),
(223, 'audit:updated', 63, 'App\\Models\\Invoice#63', 1, '{\"xero_invoice_id\":\"69a6fb09-7e79-44e9-8592-bc4b67f94609\",\"status\":\"approved\",\"updated_at\":\"2023-03-09 01:38:23\",\"id\":63}', '127.0.0.1', '2023-03-08 20:38:23', '2023-03-08 20:38:23'),
(224, 'audit:updated', 62, 'App\\Models\\Invoice#62', 1, '{\"xero_invoice_id\":\"40103bca-ade2-4c07-ba38-6f90bdfd0a78\",\"status\":\"approved\",\"updated_at\":\"2023-03-24 16:03:50\",\"id\":62}', '127.0.0.1', '2023-03-24 11:03:50', '2023-03-24 11:03:50'),
(225, 'audit:created', 4, 'App\\Models\\User#4', 1, '{\"name\":\"Abdul\",\"email\":\"abdulhadi@mail.com\",\"profile_color\":\"white\",\"updated_at\":\"2023-03-24 16:14:54\",\"created_at\":\"2023-03-24 16:14:54\",\"id\":4}', '127.0.0.1', '2023-03-24 11:14:54', '2023-03-24 11:14:54'),
(226, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-24 11:15:26', '2023-03-24 11:15:26'),
(227, 'audit:updated', 1, 'App\\Models\\User#1', 1, '{\"id\":1}', '127.0.0.1', '2023-03-24 11:23:12', '2023-03-24 11:23:12'),
(228, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-24 11:28:40', '2023-03-24 11:28:40'),
(229, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-24 11:31:38', '2023-03-24 11:31:38'),
(230, 'audit:updated', 1, 'App\\Models\\User#1', 1, '{\"id\":1}', '127.0.0.1', '2023-03-24 11:32:21', '2023-03-24 11:32:21'),
(231, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-24 11:36:24', '2023-03-24 11:36:24'),
(232, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-24 11:40:09', '2023-03-24 11:40:09'),
(233, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-24 13:04:46', '2023-03-24 13:04:46'),
(234, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-24 13:05:07', '2023-03-24 13:05:07'),
(235, 'audit:updated', 3, 'App\\Models\\CrmCustomer#3', 4, '{\"last_name\":\"Ibrarr\",\"updated_at\":\"2023-03-24 18:25:34\",\"id\":3}', '127.0.0.1', '2023-03-24 13:25:34', '2023-03-24 13:25:34'),
(236, 'audit:deleted', 2, 'App\\Models\\CrmCustomer#2', 4, '{\"id\":2,\"first_name\":\"Ali\",\"last_name\":\"Ahmed\",\"email\":\"aliahmed@gmail.com\",\"phone\":\"1231231\",\"phone_2\":null,\"address\":null,\"postcode\":null,\"city\":null,\"state\":\"Victoria\",\"created_at\":\"2023-03-08 08:27:49\",\"updated_at\":\"2023-03-24 18:26:18\",\"deleted_at\":\"2023-03-24 18:26:18\",\"status_id\":1}', '127.0.0.1', '2023-03-24 13:26:18', '2023-03-24 13:26:18'),
(237, 'audit:updated', 1, 'App\\Models\\User#1', 1, '{\"id\":1}', '127.0.0.1', '2023-03-28 02:44:25', '2023-03-28 02:44:25'),
(238, 'audit:created', 26, 'App\\Models\\Appointment#26', 4, '{\"notes\":\"some notess\",\"start_time\":\"03\\/04\\/2023 01:00:00\",\"end_time\":\"03\\/04\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 08:07:41\",\"created_at\":\"2023-03-28 08:07:41\",\"id\":26,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 03:07:41', '2023-03-28 03:07:41'),
(239, 'audit:created', 65, 'App\\Models\\Invoice#65', 4, '{\"total_amount\":80,\"total_hours_consumed\":2,\"hour_charges\":40,\"description\":\"some notess\",\"status\":\"in-progress\",\"appointment_id\":26,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 08:07:41\",\"created_at\":\"2023-03-28 08:07:41\",\"id\":65}', '127.0.0.1', '2023-03-28 03:07:41', '2023-03-28 03:07:41'),
(240, 'audit:created', 19, 'App\\Models\\InvoiceDetail#19', 4, '{\"invoice_id\":65,\"user_id\":\"2\",\"updated_at\":\"2023-03-28 08:07:41\",\"created_at\":\"2023-03-28 08:07:41\",\"id\":19}', '127.0.0.1', '2023-03-28 03:07:41', '2023-03-28 03:07:41'),
(241, 'audit:created', 27, 'App\\Models\\Appointment#27', 4, '{\"notes\":\"slome notes\",\"start_time\":\"27\\/03\\/2023 01:00:00\",\"end_time\":\"27\\/03\\/2023 02:00:00\",\"check_in\":\"28\\/03\\/2023 13:16:35\",\"check_out\":\"28\\/03\\/2023 13:16:36\",\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 08:16:48\",\"created_at\":\"2023-03-28 08:16:48\",\"id\":27,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 03:16:48', '2023-03-28 03:16:48'),
(242, 'audit:created', 66, 'App\\Models\\Invoice#66', 4, '{\"total_amount\":40,\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"slome notes\",\"status\":\"in-progress\",\"appointment_id\":27,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 08:16:48\",\"created_at\":\"2023-03-28 08:16:48\",\"id\":66}', '127.0.0.1', '2023-03-28 03:16:48', '2023-03-28 03:16:48'),
(243, 'audit:created', 1, 'App\\Models\\InvoiceDetail#1', 4, '{\"invoice_id\":66,\"user_id\":\"2\",\"updated_at\":\"2023-03-28 08:16:48\",\"created_at\":\"2023-03-28 08:16:48\",\"id\":1}', '127.0.0.1', '2023-03-28 03:16:48', '2023-03-28 03:16:48'),
(244, 'audit:created', 1, 'App\\Models\\CrmNote#1', 4, '{\"customer_id\":\"1\",\"note\":\"some notes\",\"updated_at\":\"2023-03-28 08:19:46\",\"created_at\":\"2023-03-28 08:19:46\",\"id\":1}', '127.0.0.1', '2023-03-28 03:19:46', '2023-03-28 03:19:46'),
(245, 'audit:created', 1, 'App\\Models\\CrmDocument#1', 4, '{\"customer_id\":\"1\",\"name\":\"rog pic\",\"description\":\"desc of rog pic\",\"updated_at\":\"2023-03-28 08:20:38\",\"created_at\":\"2023-03-28 08:20:38\",\"id\":1,\"document_file\":null,\"media\":[]}', '127.0.0.1', '2023-03-28 03:20:38', '2023-03-28 03:20:38'),
(246, 'audit:created', 4, 'App\\Models\\Expense#4', 4, '{\"date\":\"29\\/03\\/2023\",\"decscription\":\"some expense\",\"group_expense\":\"0\",\"appointment_id\":\"27\",\"ammount\":\"23\",\"updated_at\":\"2023-03-28 09:01:32\",\"created_at\":\"2023-03-28 09:01:32\",\"id\":4,\"receipt_photo\":null,\"media\":[]}', '127.0.0.1', '2023-03-28 04:01:32', '2023-03-28 04:01:32'),
(247, 'audit:created', 1, 'App\\Models\\ExpenseDetail#1', 4, '{\"expense_id\":4,\"client_id\":\"1\",\"updated_at\":\"2023-03-28 09:01:32\",\"created_at\":\"2023-03-28 09:01:32\",\"id\":1}', '127.0.0.1', '2023-03-28 04:01:32', '2023-03-28 04:01:32'),
(248, 'audit:created', 67, 'App\\Models\\Invoice#67', 4, '{\"total_amount\":\"23\",\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"some expense\",\"status\":\"in-progress\",\"appointment_id\":\"27\",\"client_id\":1,\"expense_id\":4,\"updated_at\":\"2023-03-28 09:01:32\",\"created_at\":\"2023-03-28 09:01:32\",\"id\":67}', '127.0.0.1', '2023-03-28 04:01:32', '2023-03-28 04:01:32'),
(249, 'audit:created', 2, 'App\\Models\\InvoiceDetail#2', 4, '{\"invoice_id\":67,\"user_id\":2,\"updated_at\":\"2023-03-28 09:01:32\",\"created_at\":\"2023-03-28 09:01:32\",\"id\":2}', '127.0.0.1', '2023-03-28 04:01:32', '2023-03-28 04:01:32'),
(250, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-28 04:22:28', '2023-03-28 04:22:28'),
(251, 'audit:created', 28, 'App\\Models\\Appointment#28', 4, '{\"notes\":\"some\",\"start_time\":\"27\\/03\\/2023 01:00:00\",\"end_time\":\"27\\/03\\/2023 02:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 09:55:14\",\"created_at\":\"2023-03-28 09:55:14\",\"id\":28,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 04:55:14', '2023-03-28 04:55:14'),
(252, 'audit:created', 68, 'App\\Models\\Invoice#68', 4, '{\"total_amount\":40,\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"some\",\"status\":\"in-progress\",\"appointment_id\":28,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 09:55:14\",\"created_at\":\"2023-03-28 09:55:14\",\"id\":68}', '127.0.0.1', '2023-03-28 04:55:14', '2023-03-28 04:55:14'),
(253, 'audit:created', 3, 'App\\Models\\InvoiceDetail#3', 4, '{\"invoice_id\":68,\"user_id\":\"1\",\"updated_at\":\"2023-03-28 09:55:14\",\"created_at\":\"2023-03-28 09:55:14\",\"id\":3}', '127.0.0.1', '2023-03-28 04:55:14', '2023-03-28 04:55:14'),
(254, 'audit:created', 4, 'App\\Models\\StaffAvailability#4', 1, '{\"staff_member_id\":\"4\",\"monday_from\":\"01:00:00\",\"monday_to\":\"08:00:00\",\"tuesday_from\":null,\"tuesday_to\":null,\"wednesday_from\":null,\"wednesday_to\":null,\"thursday_from\":null,\"thursday_to\":null,\"friday_from\":null,\"friday_to\":null,\"saturday_from\":null,\"saturday_to\":null,\"sunday_from\":null,\"sunday_to\":null,\"updated_at\":\"2023-03-28 10:43:04\",\"created_at\":\"2023-03-28 10:43:04\",\"id\":4}', '127.0.0.1', '2023-03-28 05:43:04', '2023-03-28 05:43:04'),
(255, 'audit:created', 29, 'App\\Models\\Appointment#29', 4, '{\"notes\":\"asdf\",\"start_time\":\"27\\/03\\/2023 01:00:00\",\"end_time\":\"27\\/03\\/2023 02:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 10:46:56\",\"created_at\":\"2023-03-28 10:46:56\",\"id\":29,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 05:46:56', '2023-03-28 05:46:56'),
(256, 'audit:created', 69, 'App\\Models\\Invoice#69', 4, '{\"total_amount\":80,\"total_hours_consumed\":1,\"hour_charges\":80,\"description\":\"asdf\",\"status\":\"in-progress\",\"appointment_id\":29,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 10:46:56\",\"created_at\":\"2023-03-28 10:46:56\",\"id\":69}', '127.0.0.1', '2023-03-28 05:46:56', '2023-03-28 05:46:56'),
(257, 'audit:created', 4, 'App\\Models\\InvoiceDetail#4', 4, '{\"invoice_id\":69,\"user_id\":4,\"updated_at\":\"2023-03-28 10:46:56\",\"created_at\":\"2023-03-28 10:46:56\",\"id\":4}', '127.0.0.1', '2023-03-28 05:46:56', '2023-03-28 05:46:56'),
(258, 'audit:created', 5, 'App\\Models\\InvoiceDetail#5', 4, '{\"invoice_id\":69,\"user_id\":\"4\",\"updated_at\":\"2023-03-28 10:46:56\",\"created_at\":\"2023-03-28 10:46:56\",\"id\":5}', '127.0.0.1', '2023-03-28 05:46:56', '2023-03-28 05:46:56'),
(259, 'audit:created', 30, 'App\\Models\\Appointment#30', 4, '{\"notes\":\"asdf\",\"start_time\":\"27\\/03\\/2023 01:47:21\",\"end_time\":\"27\\/03\\/2023 02:47:21\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 10:47:38\",\"created_at\":\"2023-03-28 10:47:38\",\"id\":30,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 05:47:38', '2023-03-28 05:47:38'),
(260, 'audit:created', 70, 'App\\Models\\Invoice#70', 4, '{\"total_amount\":40,\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"asdf\",\"status\":\"in-progress\",\"appointment_id\":30,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-28 10:47:38\",\"created_at\":\"2023-03-28 10:47:38\",\"id\":70}', '127.0.0.1', '2023-03-28 05:47:38', '2023-03-28 05:47:38'),
(261, 'audit:created', 6, 'App\\Models\\InvoiceDetail#6', 4, '{\"invoice_id\":70,\"user_id\":4,\"updated_at\":\"2023-03-28 10:47:38\",\"created_at\":\"2023-03-28 10:47:38\",\"id\":6}', '127.0.0.1', '2023-03-28 05:47:38', '2023-03-28 05:47:38'),
(262, 'audit:created', 31, 'App\\Models\\Appointment#31', 1, '{\"notes\":\"fg\",\"start_time\":\"27\\/03\\/2023 01:51:27\",\"end_time\":\"27\\/03\\/2023 02:51:27\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 10:51:40\",\"created_at\":\"2023-03-28 10:51:40\",\"id\":31,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 05:51:40', '2023-03-28 05:51:40'),
(263, 'audit:created', 71, 'App\\Models\\Invoice#71', 1, '{\"total_amount\":40,\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"fg\",\"status\":\"in-progress\",\"appointment_id\":31,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 10:51:40\",\"created_at\":\"2023-03-28 10:51:40\",\"id\":71}', '127.0.0.1', '2023-03-28 05:51:40', '2023-03-28 05:51:40'),
(264, 'audit:created', 7, 'App\\Models\\InvoiceDetail#7', 1, '{\"invoice_id\":71,\"user_id\":\"4\",\"updated_at\":\"2023-03-28 10:51:40\",\"created_at\":\"2023-03-28 10:51:40\",\"id\":7}', '127.0.0.1', '2023-03-28 05:51:40', '2023-03-28 05:51:40'),
(265, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-28 06:36:15', '2023-03-28 06:36:15'),
(266, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-28 06:57:52', '2023-03-28 06:57:52'),
(267, 'audit:created', 32, 'App\\Models\\Appointment#32', 4, '{\"notes\":\"asdf\",\"start_time\":\"27\\/03\\/2023 01:58:30\",\"end_time\":\"27\\/03\\/2023 02:58:30\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"3\",\"updated_at\":\"2023-03-28 12:01:59\",\"created_at\":\"2023-03-28 12:01:59\",\"id\":32,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 07:01:59', '2023-03-28 07:01:59'),
(268, 'audit:created', 33, 'App\\Models\\Appointment#33', 4, '{\"notes\":\"asdf\",\"start_time\":\"27\\/03\\/2023 01:07:05\",\"end_time\":\"27\\/03\\/2023 02:07:05\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 12:07:42\",\"created_at\":\"2023-03-28 12:07:42\",\"id\":33,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 07:07:42', '2023-03-28 07:07:42'),
(269, 'audit:created', 72, 'App\\Models\\Invoice#72', 4, '{\"total_amount\":40,\"total_hours_consumed\":1,\"hour_charges\":40,\"description\":\"asdf\",\"status\":\"in-progress\",\"appointment_id\":33,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 12:07:42\",\"created_at\":\"2023-03-28 12:07:42\",\"id\":72}', '127.0.0.1', '2023-03-28 07:07:42', '2023-03-28 07:07:42'),
(270, 'audit:created', 1, 'App\\Models\\InvoiceDetail#1', 4, '{\"invoice_id\":72,\"user_id\":\"4\",\"updated_at\":\"2023-03-28 12:07:42\",\"created_at\":\"2023-03-28 12:07:42\",\"id\":1}', '127.0.0.1', '2023-03-28 07:07:42', '2023-03-28 07:07:42'),
(271, 'audit:created', 34, 'App\\Models\\Appointment#34', 4, '{\"notes\":\"saa\",\"start_time\":\"27\\/03\\/2023 01:12:32\",\"end_time\":\"27\\/03\\/2023 02:12:32\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 12:12:59\",\"created_at\":\"2023-03-28 12:12:59\",\"id\":34,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 07:12:59', '2023-03-28 07:12:59'),
(272, 'audit:created', 73, 'App\\Models\\Invoice#73', 4, '{\"total_amount\":20,\"total_hours_consumed\":1,\"hour_charges\":20,\"description\":\"saa\",\"status\":\"in-progress\",\"appointment_id\":34,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 12:12:59\",\"created_at\":\"2023-03-28 12:12:59\",\"id\":73}', '127.0.0.1', '2023-03-28 07:12:59', '2023-03-28 07:12:59'),
(273, 'audit:created', 1, 'App\\Models\\InvoiceDetail#1', 4, '{\"invoice_id\":73,\"user_id\":\"4\",\"updated_at\":\"2023-03-28 12:12:59\",\"created_at\":\"2023-03-28 12:12:59\",\"id\":1}', '127.0.0.1', '2023-03-28 07:12:59', '2023-03-28 07:12:59'),
(274, 'audit:created', 74, 'App\\Models\\Invoice#74', 4, '{\"total_amount\":20,\"total_hours_consumed\":1,\"hour_charges\":20,\"description\":\"saa\",\"status\":\"in-progress\",\"appointment_id\":34,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-28 12:12:59\",\"created_at\":\"2023-03-28 12:12:59\",\"id\":74}', '127.0.0.1', '2023-03-28 07:12:59', '2023-03-28 07:12:59'),
(275, 'audit:created', 2, 'App\\Models\\InvoiceDetail#2', 4, '{\"invoice_id\":74,\"user_id\":\"4\",\"updated_at\":\"2023-03-28 12:12:59\",\"created_at\":\"2023-03-28 12:12:59\",\"id\":2}', '127.0.0.1', '2023-03-28 07:12:59', '2023-03-28 07:12:59'),
(276, 'audit:created', 35, 'App\\Models\\Appointment#35', 1, '{\"notes\":\"fdasdf\",\"start_time\":\"27\\/03\\/2023 01:15:46\",\"end_time\":\"27\\/03\\/2023 02:15:46\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 12:16:37\",\"created_at\":\"2023-03-28 12:16:37\",\"id\":35,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 07:16:37', '2023-03-28 07:16:37'),
(277, 'audit:created', 75, 'App\\Models\\Invoice#75', 1, '{\"total_amount\":20,\"total_hours_consumed\":1,\"hour_charges\":20,\"description\":\"fdasdf\",\"status\":\"in-progress\",\"appointment_id\":35,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 12:16:37\",\"created_at\":\"2023-03-28 12:16:37\",\"id\":75}', '127.0.0.1', '2023-03-28 07:16:37', '2023-03-28 07:16:37'),
(278, 'audit:created', 3, 'App\\Models\\InvoiceDetail#3', 1, '{\"invoice_id\":75,\"user_id\":\"1\",\"updated_at\":\"2023-03-28 12:16:37\",\"created_at\":\"2023-03-28 12:16:37\",\"id\":3}', '127.0.0.1', '2023-03-28 07:16:37', '2023-03-28 07:16:37'),
(279, 'audit:created', 76, 'App\\Models\\Invoice#76', 1, '{\"total_amount\":20,\"total_hours_consumed\":1,\"hour_charges\":20,\"description\":\"fdasdf\",\"status\":\"in-progress\",\"appointment_id\":35,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-28 12:16:37\",\"created_at\":\"2023-03-28 12:16:37\",\"id\":76}', '127.0.0.1', '2023-03-28 07:16:37', '2023-03-28 07:16:37'),
(280, 'audit:created', 4, 'App\\Models\\InvoiceDetail#4', 1, '{\"invoice_id\":76,\"user_id\":\"1\",\"updated_at\":\"2023-03-28 12:16:37\",\"created_at\":\"2023-03-28 12:16:37\",\"id\":4}', '127.0.0.1', '2023-03-28 07:16:37', '2023-03-28 07:16:37'),
(281, 'audit:created', 5, 'App\\Models\\Expense#5', 1, '{\"date\":\"27\\/03\\/2023\",\"decscription\":\"assdf\",\"group_expense\":\"0\",\"appointment_id\":\"35\",\"ammount\":\"24\",\"updated_at\":\"2023-03-28 12:33:36\",\"created_at\":\"2023-03-28 12:33:36\",\"id\":5,\"receipt_photo\":null,\"media\":[]}', '127.0.0.1', '2023-03-28 07:33:36', '2023-03-28 07:33:36'),
(282, 'audit:created', 1, 'App\\Models\\ExpenseDetail#1', 1, '{\"expense_id\":5,\"client_id\":\"1\",\"updated_at\":\"2023-03-28 12:33:36\",\"created_at\":\"2023-03-28 12:33:36\",\"id\":1}', '127.0.0.1', '2023-03-28 07:33:36', '2023-03-28 07:33:36'),
(283, 'audit:created', 77, 'App\\Models\\Invoice#77', 1, '{\"total_amount\":\"24\",\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"assdf\",\"status\":\"in-progress\",\"appointment_id\":\"35\",\"client_id\":1,\"expense_id\":5,\"updated_at\":\"2023-03-28 12:33:36\",\"created_at\":\"2023-03-28 12:33:36\",\"id\":77}', '127.0.0.1', '2023-03-28 07:33:36', '2023-03-28 07:33:36'),
(284, 'audit:created', 5, 'App\\Models\\InvoiceDetail#5', 1, '{\"invoice_id\":77,\"user_id\":1,\"updated_at\":\"2023-03-28 12:33:36\",\"created_at\":\"2023-03-28 12:33:36\",\"id\":5}', '127.0.0.1', '2023-03-28 07:33:36', '2023-03-28 07:33:36'),
(285, 'audit:created', 6, 'App\\Models\\Expense#6', 1, '{\"date\":\"29\\/03\\/2023\",\"decscription\":\"some desc\",\"group_expense\":\"0\",\"appointment_id\":\"34\",\"ammount\":\"23\",\"updated_at\":\"2023-03-28 12:34:43\",\"created_at\":\"2023-03-28 12:34:43\",\"id\":6,\"receipt_photo\":null,\"media\":[]}', '127.0.0.1', '2023-03-28 07:34:43', '2023-03-28 07:34:43'),
(286, 'audit:created', 2, 'App\\Models\\ExpenseDetail#2', 1, '{\"expense_id\":6,\"client_id\":\"3\",\"updated_at\":\"2023-03-28 12:34:43\",\"created_at\":\"2023-03-28 12:34:43\",\"id\":2}', '127.0.0.1', '2023-03-28 07:34:43', '2023-03-28 07:34:43'),
(287, 'audit:created', 78, 'App\\Models\\Invoice#78', 1, '{\"total_amount\":\"23\",\"total_hours_consumed\":null,\"hour_charges\":null,\"description\":\"some desc\",\"status\":\"in-progress\",\"appointment_id\":\"34\",\"client_id\":3,\"expense_id\":6,\"updated_at\":\"2023-03-28 12:34:43\",\"created_at\":\"2023-03-28 12:34:43\",\"id\":78}', '127.0.0.1', '2023-03-28 07:34:43', '2023-03-28 07:34:43'),
(288, 'audit:created', 6, 'App\\Models\\InvoiceDetail#6', 1, '{\"invoice_id\":78,\"user_id\":4,\"updated_at\":\"2023-03-28 12:34:44\",\"created_at\":\"2023-03-28 12:34:44\",\"id\":6}', '127.0.0.1', '2023-03-28 07:34:44', '2023-03-28 07:34:44'),
(289, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-03-28 08:10:53', '2023-03-28 08:10:53'),
(290, 'audit:created', 1, 'App\\Models\\LeaveApplication#1', 1, '{\"staff_member_id\":\"1\",\"leave_start\":\"30\\/03\\/2023\",\"leave_ends\":\"01\\/04\\/2023\",\"updated_at\":\"2023-03-28 13:16:41\",\"created_at\":\"2023-03-28 13:16:41\",\"id\":1}', '127.0.0.1', '2023-03-28 08:16:41', '2023-03-28 08:16:41'),
(291, 'audit:updated', 1, 'App\\Models\\LeaveApplication#1', 1, '{\"user_notes\":\"dfg\",\"updated_at\":\"2023-03-28 13:17:08\",\"id\":1}', '127.0.0.1', '2023-03-28 08:17:08', '2023-03-28 08:17:08'),
(292, 'audit:created', 2, 'App\\Models\\LeaveApplication#2', 1, '{\"staff_member_id\":\"4\",\"leave_start\":\"08\\/04\\/2023\",\"leave_ends\":\"09\\/04\\/2023\",\"updated_at\":\"2023-03-28 13:17:30\",\"created_at\":\"2023-03-28 13:17:30\",\"id\":2}', '127.0.0.1', '2023-03-28 08:17:30', '2023-03-28 08:17:30'),
(293, 'audit:created', 3, 'App\\Models\\LeaveApplication#3', 1, '{\"staff_member_id\":\"2\",\"leave_start\":\"22\\/03\\/2023\",\"leave_ends\":\"31\\/03\\/2023\",\"user_notes\":\"ggg\",\"updated_at\":\"2023-03-28 13:44:33\",\"created_at\":\"2023-03-28 13:44:33\",\"id\":3}', '127.0.0.1', '2023-03-28 08:44:33', '2023-03-28 08:44:33'),
(294, 'audit:created', 4, 'App\\Models\\LeaveApplication#4', 4, '{\"leave_start\":\"05\\/04\\/2023\",\"leave_ends\":\"07\\/04\\/2023\",\"user_notes\":\"frfr\",\"staff_member_id\":4,\"updated_at\":\"2023-03-28 14:03:05\",\"created_at\":\"2023-03-28 14:03:05\",\"id\":4}', '127.0.0.1', '2023-03-28 09:03:05', '2023-03-28 09:03:05'),
(295, 'audit:updated', 4, 'App\\Models\\LeaveApplication#4', 4, '{\"user_notes\":\"czx\",\"updated_at\":\"2023-03-28 14:04:17\",\"id\":4}', '127.0.0.1', '2023-03-28 09:04:17', '2023-03-28 09:04:17'),
(296, 'audit:updated', 4, 'App\\Models\\LeaveApplication#4', 4, '{\"leave_ends\":\"21\\/04\\/2023\",\"user_notes\":\"ewew\",\"updated_at\":\"2023-03-28 14:05:24\",\"id\":4}', '127.0.0.1', '2023-03-28 09:05:24', '2023-03-28 09:05:24'),
(297, 'audit:deleted', 2, 'App\\Models\\LeaveApplication#2', 4, '{\"id\":2,\"leave_start\":\"08\\/04\\/2023\",\"leave_ends\":\"09\\/04\\/2023\",\"user_notes\":null,\"approved\":0,\"admin_notes\":null,\"editable\":1,\"deleteable\":1,\"created_at\":\"2023-03-28 13:17:30\",\"updated_at\":\"2023-03-28 14:06:27\",\"deleted_at\":\"2023-03-28 14:06:27\",\"staff_member_id\":4}', '127.0.0.1', '2023-03-28 09:06:27', '2023-03-28 09:06:27'),
(298, 'audit:created', 5, 'App\\Models\\StaffAvailability#5', 4, '{\"monday_from\":\"19:32:29\",\"monday_to\":\"22:32:31\",\"tuesday_from\":null,\"tuesday_to\":null,\"wednesday_from\":null,\"wednesday_to\":null,\"thursday_from\":null,\"thursday_to\":null,\"friday_from\":null,\"friday_to\":null,\"saturday_from\":null,\"saturday_to\":null,\"sunday_from\":null,\"sunday_to\":null,\"updated_at\":\"2023-03-28 14:32:35\",\"created_at\":\"2023-03-28 14:32:35\",\"id\":5}', '127.0.0.1', '2023-03-28 09:32:35', '2023-03-28 09:32:35'),
(299, 'audit:deleted', 5, 'App\\Models\\StaffAvailability#5', 1, '{\"id\":5,\"monday_from\":\"19:32:29\",\"monday_to\":\"22:32:31\",\"tuesday_from\":null,\"tuesday_to\":null,\"wednesday_from\":null,\"wednesday_to\":null,\"thursday_from\":null,\"thursday_to\":null,\"friday_from\":null,\"friday_to\":null,\"saturday_from\":null,\"saturday_to\":null,\"sunday_from\":null,\"sunday_to\":null,\"created_at\":\"2023-03-28 14:32:35\",\"updated_at\":\"2023-03-28 14:34:28\",\"deleted_at\":\"2023-03-28 14:34:28\",\"staff_member_id\":null}', '127.0.0.1', '2023-03-28 09:34:28', '2023-03-28 09:34:28'),
(300, 'audit:created', 6, 'App\\Models\\StaffAvailability#6', 4, '{\"monday_from\":\"19:34:22\",\"monday_to\":\"00:34:31\",\"tuesday_from\":null,\"tuesday_to\":null,\"wednesday_from\":null,\"wednesday_to\":null,\"thursday_from\":null,\"thursday_to\":null,\"friday_from\":null,\"friday_to\":null,\"saturday_from\":null,\"saturday_to\":null,\"sunday_from\":null,\"sunday_to\":null,\"staff_member_id\":4,\"updated_at\":\"2023-03-28 14:34:34\",\"created_at\":\"2023-03-28 14:34:34\",\"id\":6}', '127.0.0.1', '2023-03-28 09:34:34', '2023-03-28 09:34:34'),
(301, 'audit:updated', 4, 'App\\Models\\StaffAvailability#4', 4, '{\"monday_to\":\"10:00:00\",\"updated_at\":\"2023-03-28 14:35:00\",\"id\":4}', '127.0.0.1', '2023-03-28 09:35:00', '2023-03-28 09:35:00'),
(302, 'audit:deleted', 4, 'App\\Models\\StaffAvailability#4', 4, '{\"id\":4,\"monday_from\":\"01:00:00\",\"monday_to\":\"10:00:00\",\"tuesday_from\":null,\"tuesday_to\":null,\"wednesday_from\":null,\"wednesday_to\":null,\"thursday_from\":null,\"thursday_to\":null,\"friday_from\":null,\"friday_to\":null,\"saturday_from\":null,\"saturday_to\":null,\"sunday_from\":null,\"sunday_to\":null,\"created_at\":\"2023-03-28 10:43:04\",\"updated_at\":\"2023-03-28 14:35:35\",\"deleted_at\":\"2023-03-28 14:35:35\",\"staff_member_id\":4}', '127.0.0.1', '2023-03-28 09:35:35', '2023-03-28 09:35:35'),
(303, 'audit:created', 1, 'App\\Models\\ClientTag#1', 1, '{\"tags\":\"abc\",\"updated_at\":\"2023-03-28 14:39:10\",\"created_at\":\"2023-03-28 14:39:10\",\"id\":1}', '127.0.0.1', '2023-03-28 09:39:10', '2023-03-28 09:39:10'),
(304, 'audit:updated', 1, 'App\\Models\\ClientTag#1', 4, '{\"tags\":\"abcx\",\"updated_at\":\"2023-03-28 14:41:34\",\"id\":1}', '127.0.0.1', '2023-03-28 09:41:34', '2023-03-28 09:41:34'),
(305, 'audit:created', 4, 'App\\Models\\CrmStatus#4', 4, '{\"name\":\"sds\",\"updated_at\":\"2023-03-28 14:46:50\",\"created_at\":\"2023-03-28 14:46:50\",\"id\":4}', '127.0.0.1', '2023-03-28 09:46:50', '2023-03-28 09:46:50'),
(306, 'audit:updated', 4, 'App\\Models\\CrmStatus#4', 4, '{\"name\":\"sdsassc\",\"updated_at\":\"2023-03-28 14:46:59\",\"id\":4}', '127.0.0.1', '2023-03-28 09:46:59', '2023-03-28 09:46:59'),
(307, 'audit:deleted', 4, 'App\\Models\\CrmStatus#4', 4, '{\"id\":4,\"name\":\"sdsassc\",\"created_at\":\"2023-03-28 14:46:50\",\"updated_at\":\"2023-03-28 14:47:04\",\"deleted_at\":\"2023-03-28 14:47:04\"}', '127.0.0.1', '2023-03-28 09:47:04', '2023-03-28 09:47:04'),
(308, 'audit:created', 5, 'App\\Models\\CrmStatus#5', 1, '{\"name\":\"approved\",\"updated_at\":\"2023-03-28 15:04:14\",\"created_at\":\"2023-03-28 15:04:14\",\"id\":5}', '127.0.0.1', '2023-03-28 10:04:14', '2023-03-28 10:04:14'),
(309, 'audit:updated', 1, 'App\\Models\\CrmCustomer#1', 4, '{\"updated_at\":\"2023-03-28 15:05:23\",\"status_id\":\"5\",\"id\":1}', '127.0.0.1', '2023-03-28 10:05:23', '2023-03-28 10:05:23'),
(310, 'audit:created', 4, 'App\\Models\\CrmCustomer#4', 4, '{\"first_name\":\"Haroon\",\"last_name\":\"Ahmed\",\"email\":\"haroonAhmed@mail.com\",\"phone\":null,\"phone_2\":null,\"address\":null,\"postcode\":null,\"city\":null,\"state\":\"Victoria\",\"status_id\":\"5\",\"updated_at\":\"2023-03-28 15:09:11\",\"created_at\":\"2023-03-28 15:09:11\",\"id\":4}', '127.0.0.1', '2023-03-28 10:09:11', '2023-03-28 10:09:11'),
(311, 'audit:updated', 4, 'App\\Models\\CrmCustomer#4', 4, '{\"first_name\":\"Haroon asdf\",\"updated_at\":\"2023-03-28 15:09:24\",\"id\":4}', '127.0.0.1', '2023-03-28 10:09:24', '2023-03-28 10:09:24');
INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(312, 'audit:deleted', 4, 'App\\Models\\CrmCustomer#4', 4, '{\"id\":4,\"first_name\":\"Haroon asdf\",\"last_name\":\"Ahmed\",\"email\":\"haroonAhmed@mail.com\",\"phone\":null,\"phone_2\":null,\"address\":null,\"postcode\":null,\"city\":null,\"state\":\"Victoria\",\"created_at\":\"2023-03-28 15:09:11\",\"updated_at\":\"2023-03-28 15:09:42\",\"deleted_at\":\"2023-03-28 15:09:42\",\"status_id\":5}', '127.0.0.1', '2023-03-28 10:09:42', '2023-03-28 10:09:42'),
(313, 'audit:updated', 6, 'App\\Models\\StaffAvailability#6', 1, '{\"monday_from\":\"01:00:00\",\"monday_to\":\"23:34:31\",\"updated_at\":\"2023-03-28 15:11:05\",\"id\":6}', '127.0.0.1', '2023-03-28 10:11:05', '2023-03-28 10:11:05'),
(314, 'audit:created', 36, 'App\\Models\\Appointment#36', 4, '{\"notes\":\"some note 123\",\"start_time\":\"27\\/03\\/2023 01:10:07\",\"end_time\":\"27\\/03\\/2023 04:10:07\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 15:11:08\",\"created_at\":\"2023-03-28 15:11:08\",\"id\":36,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 10:11:08', '2023-03-28 10:11:08'),
(315, 'audit:created', 79, 'App\\Models\\Invoice#79', 4, '{\"total_amount\":60,\"total_hours_consumed\":3,\"hour_charges\":20,\"description\":\"some note 123\",\"status\":\"in-progress\",\"appointment_id\":36,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 15:11:08\",\"created_at\":\"2023-03-28 15:11:08\",\"id\":79}', '127.0.0.1', '2023-03-28 10:11:08', '2023-03-28 10:11:08'),
(316, 'audit:created', 7, 'App\\Models\\InvoiceDetail#7', 4, '{\"invoice_id\":79,\"user_id\":\"4\",\"updated_at\":\"2023-03-28 15:11:08\",\"created_at\":\"2023-03-28 15:11:08\",\"id\":7}', '127.0.0.1', '2023-03-28 10:11:08', '2023-03-28 10:11:08'),
(317, 'audit:created', 80, 'App\\Models\\Invoice#80', 4, '{\"total_amount\":60,\"total_hours_consumed\":3,\"hour_charges\":20,\"description\":\"some note 123\",\"status\":\"in-progress\",\"appointment_id\":36,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-28 15:11:08\",\"created_at\":\"2023-03-28 15:11:08\",\"id\":80}', '127.0.0.1', '2023-03-28 10:11:08', '2023-03-28 10:11:08'),
(318, 'audit:created', 8, 'App\\Models\\InvoiceDetail#8', 4, '{\"invoice_id\":80,\"user_id\":\"4\",\"updated_at\":\"2023-03-28 15:11:08\",\"created_at\":\"2023-03-28 15:11:08\",\"id\":8}', '127.0.0.1', '2023-03-28 10:11:08', '2023-03-28 10:11:08'),
(319, 'audit:created', 37, 'App\\Models\\Appointment#37', 4, '{\"notes\":\"zxcvzcxv\",\"start_time\":\"27\\/03\\/2023 01:11:31\",\"end_time\":\"27\\/03\\/2023 03:10:07\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"2\",\"updated_at\":\"2023-03-28 15:11:44\",\"created_at\":\"2023-03-28 15:11:44\",\"id\":37,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-03-28 10:11:44', '2023-03-28 10:11:44'),
(320, 'audit:created', 81, 'App\\Models\\Invoice#81', 4, '{\"total_amount\":20,\"total_hours_consumed\":1,\"hour_charges\":20,\"description\":\"zxcvzcxv\",\"status\":\"in-progress\",\"appointment_id\":37,\"client_id\":\"1\",\"expense_id\":null,\"updated_at\":\"2023-03-28 15:11:44\",\"created_at\":\"2023-03-28 15:11:44\",\"id\":81}', '127.0.0.1', '2023-03-28 10:11:44', '2023-03-28 10:11:44'),
(321, 'audit:created', 9, 'App\\Models\\InvoiceDetail#9', 4, '{\"invoice_id\":81,\"user_id\":\"4\",\"updated_at\":\"2023-03-28 15:11:44\",\"created_at\":\"2023-03-28 15:11:44\",\"id\":9}', '127.0.0.1', '2023-03-28 10:11:44', '2023-03-28 10:11:44'),
(322, 'audit:created', 82, 'App\\Models\\Invoice#82', 4, '{\"total_amount\":20,\"total_hours_consumed\":1,\"hour_charges\":20,\"description\":\"zxcvzcxv\",\"status\":\"in-progress\",\"appointment_id\":37,\"client_id\":\"3\",\"expense_id\":null,\"updated_at\":\"2023-03-28 15:11:44\",\"created_at\":\"2023-03-28 15:11:44\",\"id\":82}', '127.0.0.1', '2023-03-28 10:11:44', '2023-03-28 10:11:44'),
(323, 'audit:created', 10, 'App\\Models\\InvoiceDetail#10', 4, '{\"invoice_id\":82,\"user_id\":\"4\",\"updated_at\":\"2023-03-28 15:11:44\",\"created_at\":\"2023-03-28 15:11:44\",\"id\":10}', '127.0.0.1', '2023-03-28 10:11:44', '2023-03-28 10:11:44'),
(324, 'audit:deleted', 4, 'App\\Models\\LeaveApplication#4', 4, '{\"id\":4,\"leave_start\":\"05\\/04\\/2023\",\"leave_ends\":\"21\\/04\\/2023\",\"user_notes\":\"ewew\",\"approved\":0,\"admin_notes\":null,\"editable\":1,\"deleteable\":1,\"created_at\":\"2023-03-28 14:03:05\",\"updated_at\":\"2023-03-28 15:12:29\",\"deleted_at\":\"2023-03-28 15:12:29\",\"staff_member_id\":4}', '127.0.0.1', '2023-03-28 10:12:29', '2023-03-28 10:12:29'),
(325, 'audit:created', 5, 'App\\Models\\LeaveApplication#5', 4, '{\"leave_start\":\"29\\/03\\/2023\",\"leave_ends\":\"31\\/03\\/2023\",\"user_notes\":\"zwerasdfa\",\"staff_member_id\":4,\"updated_at\":\"2023-03-28 15:12:39\",\"created_at\":\"2023-03-28 15:12:39\",\"id\":5}', '127.0.0.1', '2023-03-28 10:12:39', '2023-03-28 10:12:39'),
(326, 'audit:updated', 5, 'App\\Models\\LeaveApplication#5', 4, '{\"user_notes\":\"rrr\",\"updated_at\":\"2023-03-28 15:13:24\",\"id\":5}', '127.0.0.1', '2023-03-28 10:13:24', '2023-03-28 10:13:24'),
(327, 'audit:deleted', 5, 'App\\Models\\LeaveApplication#5', 4, '{\"id\":5,\"leave_start\":\"29\\/03\\/2023\",\"leave_ends\":\"31\\/03\\/2023\",\"user_notes\":\"rrr\",\"approved\":0,\"admin_notes\":null,\"editable\":1,\"deleteable\":1,\"created_at\":\"2023-03-28 15:12:39\",\"updated_at\":\"2023-03-28 15:13:31\",\"deleted_at\":\"2023-03-28 15:13:31\",\"staff_member_id\":4}', '127.0.0.1', '2023-03-28 10:13:31', '2023-03-28 10:13:31'),
(328, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-04-03 05:10:37', '2023-04-03 05:10:37'),
(329, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"updated_at\":\"2023-04-03 11:03:53\",\"id\":4}', '127.0.0.1', '2023-04-03 06:03:53', '2023-04-03 06:03:53'),
(330, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"updated_at\":\"2023-04-03 11:10:17\",\"id\":4}', '127.0.0.1', '2023-04-03 06:10:17', '2023-04-03 06:10:17'),
(331, 'audit:created', 38, 'App\\Models\\Appointment#38', 1, '{\"notes\":\"asfd\",\"start_time\":\"17\\/04\\/2023 01:30:59\",\"end_time\":\"17\\/04\\/2023 02:30:59\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"1\",\"updated_at\":\"2023-04-03 11:31:46\",\"created_at\":\"2023-04-03 11:31:46\",\"id\":38,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-04-03 06:31:46', '2023-04-03 06:31:46'),
(332, 'audit:updated', 37, 'App\\Models\\Appointment#37', 4, '{\"end_time\":\"27\\/03\\/2023 02:10:07\",\"updated_at\":\"2023-04-03 13:58:12\",\"id\":37,\"photos\":[],\"documents\":[],\"assigned_staffs\":[{\"id\":4,\"name\":\"Abdul\",\"email\":\"abdulhadi@mail.com\",\"email_verified_at\":null,\"profile_color\":\"white\",\"created_at\":\"2023-03-24 16:14:54\",\"updated_at\":\"2023-04-03 11:10:17\",\"deleted_at\":null,\"pivot\":{\"appointment_id\":37,\"user_id\":4}}],\"media\":[]}', '127.0.0.1', '2023-04-03 08:58:12', '2023-04-03 08:58:12'),
(333, 'audit:updated', 38, 'App\\Models\\Appointment#38', 4, '{\"end_time\":\"17\\/04\\/2023 02:55:59\",\"updated_at\":\"2023-04-03 14:00:04\",\"id\":38,\"photos\":[],\"documents\":[],\"assigned_staffs\":[{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@admin.com\",\"email_verified_at\":null,\"profile_color\":\"\",\"created_at\":null,\"updated_at\":null,\"deleted_at\":null,\"pivot\":{\"appointment_id\":38,\"user_id\":1}},{\"id\":4,\"name\":\"Abdul\",\"email\":\"abdulhadi@mail.com\",\"email_verified_at\":null,\"profile_color\":\"white\",\"created_at\":\"2023-03-24 16:14:54\",\"updated_at\":\"2023-04-03 11:10:17\",\"deleted_at\":null,\"pivot\":{\"appointment_id\":38,\"user_id\":4}}],\"media\":[]}', '127.0.0.1', '2023-04-03 09:00:04', '2023-04-03 09:00:04'),
(336, 'audit:created', 41, 'App\\Models\\Appointment#41', 4, '{\"notes\":\"1st user test\",\"start_time\":\"17\\/04\\/2023 01:06:38\",\"end_time\":\"17\\/04\\/2023 02:06:38\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"1\",\"updated_at\":\"2023-04-03 14:09:20\",\"created_at\":\"2023-04-03 14:09:20\",\"id\":41,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-04-03 09:09:20', '2023-04-03 09:09:20'),
(337, 'audit:created', 42, 'App\\Models\\Appointment#42', 4, '{\"notes\":\"2nd test\",\"start_time\":\"17\\/04\\/2023 01:09:39\",\"end_time\":\"17\\/04\\/2023 02:09:39\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"1\",\"updated_at\":\"2023-04-03 14:09:51\",\"created_at\":\"2023-04-03 14:09:51\",\"id\":42,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-04-03 09:09:51', '2023-04-03 09:09:51'),
(338, 'audit:created', 43, 'App\\Models\\Appointment#43', 1, '{\"notes\":\"mutli 1st test\",\"start_time\":\"17\\/04\\/2023 01:10:10\",\"end_time\":\"17\\/04\\/2023 03:00:00\",\"check_in\":null,\"check_out\":null,\"address\":null,\"city\":null,\"postcode\":null,\"state\":\"Victoria\",\"status_id\":\"1\",\"updated_at\":\"2023-04-03 14:10:40\",\"created_at\":\"2023-04-03 14:10:40\",\"id\":43,\"photos\":[],\"documents\":[],\"media\":[]}', '127.0.0.1', '2023-04-03 09:10:40', '2023-04-03 09:10:40'),
(339, 'audit:updated', 43, 'App\\Models\\Appointment#43', 4, '{\"notes\":\"mutli 1st test updated\",\"updated_at\":\"2023-04-03 14:10:58\",\"id\":43,\"photos\":[],\"documents\":[],\"assigned_staffs\":[{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@admin.com\",\"email_verified_at\":null,\"profile_color\":\"\",\"created_at\":null,\"updated_at\":null,\"deleted_at\":null,\"pivot\":{\"appointment_id\":43,\"user_id\":1}},{\"id\":4,\"name\":\"Abdul\",\"email\":\"abdulhadi@mail.com\",\"email_verified_at\":null,\"profile_color\":\"white\",\"created_at\":\"2023-03-24 16:14:54\",\"updated_at\":\"2023-04-03 11:10:17\",\"deleted_at\":null,\"pivot\":{\"appointment_id\":43,\"user_id\":4}}],\"media\":[]}', '127.0.0.1', '2023-04-03 09:10:58', '2023-04-03 09:10:58'),
(340, 'audit:created', 6, 'App\\Models\\LeaveApplication#6', 4, '{\"staff_member_id\":\"4\",\"leave_start\":\"04\\/05\\/2023\",\"leave_ends\":\"05\\/05\\/2023\",\"user_notes\":\"some notes\",\"updated_at\":\"2023-04-03 14:14:43\",\"created_at\":\"2023-04-03 14:14:43\",\"id\":6}', '127.0.0.1', '2023-04-03 09:14:43', '2023-04-03 09:14:43'),
(341, 'audit:created', 7, 'App\\Models\\LeaveApplication#7', 4, '{\"staff_member_id\":\"4\",\"leave_start\":\"04\\/05\\/2023\",\"leave_ends\":\"05\\/05\\/2023\",\"user_notes\":\"applic from hadi 1\",\"updated_at\":\"2023-04-03 14:24:23\",\"created_at\":\"2023-04-03 14:24:23\",\"id\":7}', '127.0.0.1', '2023-04-03 09:24:23', '2023-04-03 09:24:23'),
(342, 'audit:created', 8, 'App\\Models\\LeaveApplication#8', 1, '{\"staff_member_id\":\"1\",\"leave_start\":\"12\\/04\\/2023\",\"leave_ends\":\"14\\/04\\/2023\",\"user_notes\":\"apllica from admin 1\",\"updated_at\":\"2023-04-03 14:24:47\",\"created_at\":\"2023-04-03 14:24:47\",\"id\":8}', '127.0.0.1', '2023-04-03 09:24:47', '2023-04-03 09:24:47'),
(343, 'audit:updated', 7, 'App\\Models\\LeaveApplication#7', 4, '{\"user_notes\":\"applic from hadi 1 updated\",\"updated_at\":\"2023-04-03 14:29:46\",\"id\":7}', '127.0.0.1', '2023-04-03 09:29:46', '2023-04-03 09:29:46'),
(344, 'audit:updated', 8, 'App\\Models\\LeaveApplication#8', 1, '{\"user_notes\":\"apllica from admin 1 updated\",\"updated_at\":\"2023-04-03 14:29:53\",\"id\":8}', '127.0.0.1', '2023-04-03 09:29:53', '2023-04-03 09:29:53'),
(345, 'audit:created', 7, 'App\\Models\\StaffAvailability#7', 4, '{\"staff_member_id\":\"4\",\"monday_from\":\"20:45:55\",\"monday_to\":\"22:45:55\",\"tuesday_from\":null,\"tuesday_to\":null,\"wednesday_from\":null,\"wednesday_to\":null,\"thursday_from\":null,\"thursday_to\":null,\"friday_from\":null,\"friday_to\":null,\"saturday_from\":null,\"saturday_to\":null,\"sunday_from\":null,\"sunday_to\":null,\"updated_at\":\"2023-04-03 14:46:05\",\"created_at\":\"2023-04-03 14:46:05\",\"id\":7}', '127.0.0.1', '2023-04-03 09:46:05', '2023-04-03 09:46:05'),
(346, 'audit:updated', 7, 'App\\Models\\StaffAvailability#7', 4, '{\"monday_to\":\"23:45:55\",\"updated_at\":\"2023-04-03 14:48:37\",\"id\":7}', '127.0.0.1', '2023-04-03 09:48:37', '2023-04-03 09:48:37'),
(347, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-04-03 09:51:09', '2023-04-03 09:51:09'),
(348, 'audit:updated', 4, 'App\\Models\\User#4', 4, '{\"id\":4}', '127.0.0.1', '2023-04-03 09:53:13', '2023-04-03 09:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `client_tags`
--

CREATE TABLE `client_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_tags`
--

INSERT INTO `client_tags` (`id`, `tags`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'abcx', '2023-03-28 09:39:10', '2023-03-28 09:41:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_tag_crm_customer`
--

CREATE TABLE `client_tag_crm_customer` (
  `crm_customer_id` bigint(20) UNSIGNED NOT NULL,
  `client_tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_tag_crm_customer`
--

INSERT INTO `client_tag_crm_customer` (`crm_customer_id`, `client_tag_id`) VALUES
(1, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crm_customers`
--

CREATE TABLE `crm_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_customers`
--

INSERT INTO `crm_customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `phone_2`, `address`, `postcode`, `city`, `state`, `created_at`, `updated_at`, `deleted_at`, `status_id`) VALUES
(1, 'Arslan', 'Ahmed', 'malikzarslan44@gmail.com', '03125203544', NULL, NULL, NULL, NULL, 'Victoria', '2023-03-08 03:27:16', '2023-03-28 10:05:23', NULL, 5),
(2, 'Ali', 'Ahmed', 'aliahmed@gmail.com', '1231231', NULL, NULL, NULL, NULL, 'Victoria', '2023-03-08 03:27:49', '2023-03-24 13:26:18', '2023-03-24 13:26:18', 1),
(3, 'abdullah', 'Ibrarr', 'abdullahIbrar@gmail.com', '12341234', NULL, NULL, NULL, NULL, 'Victoria', '2023-03-08 03:28:13', '2023-03-24 13:25:34', NULL, 1),
(4, 'Haroon asdf', 'Ahmed', 'haroonAhmed@mail.com', NULL, NULL, NULL, NULL, NULL, 'Victoria', '2023-03-28 10:09:11', '2023-03-28 10:09:42', '2023-03-28 10:09:42', 5);

-- --------------------------------------------------------

--
-- Table structure for table `crm_documents`
--

CREATE TABLE `crm_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_documents`
--

INSERT INTO `crm_documents` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`, `customer_id`) VALUES
(1, 'rog pic', 'desc of rog pic', '2023-03-28 03:20:38', '2023-03-28 03:20:38', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crm_notes`
--

CREATE TABLE `crm_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_notes`
--

INSERT INTO `crm_notes` (`id`, `note`, `created_at`, `updated_at`, `deleted_at`, `customer_id`) VALUES
(1, 'some notes', '2023-03-28 03:19:46', '2023-03-28 03:19:46', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crm_statuses`
--

CREATE TABLE `crm_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_statuses`
--

INSERT INTO `crm_statuses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Active', '2023-01-13 17:55:34', '2023-03-28 09:47:10', '2023-03-28 09:47:10'),
(2, 'Inactive', '2023-01-13 17:55:34', '2023-03-28 09:47:10', '2023-03-28 09:47:10'),
(3, 'Deceased', '2023-01-13 17:55:34', '2023-03-28 09:47:10', '2023-03-28 09:47:10'),
(4, 'sdsassc', '2023-03-28 09:46:50', '2023-03-28 09:47:04', '2023-03-28 09:47:04'),
(5, 'approved', '2023-03-28 10:04:14', '2023-03-28 10:04:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `decscription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ammount` decimal(15,2) DEFAULT NULL,
  `group_expense` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `decscription`, `ammount`, `group_expense`, `created_at`, `updated_at`, `deleted_at`, `appointment_id`) VALUES
(5, '2023-03-27', 'assdf', '24.00', 0, '2023-03-28 07:33:36', '2023-03-28 07:33:36', NULL, 35),
(6, '2023-03-29', 'some desc', '23.00', 0, '2023-03-28 07:34:43', '2023-03-28 07:34:43', NULL, 34);

-- --------------------------------------------------------

--
-- Table structure for table `expense_details`
--

CREATE TABLE `expense_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_details`
--

INSERT INTO `expense_details` (`id`, `expense_id`, `client_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 1, '2023-03-28 07:33:36', '2023-03-28 07:33:36', NULL),
(2, 6, 3, '2023-03-28 07:34:43', '2023-03-28 07:34:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(15,2) DEFAULT NULL,
  `total_hours_consumed` decimal(15,2) DEFAULT NULL,
  `hour_charges` decimal(15,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xero_invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('in-progress','invoice-generated','approved') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expense_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `total_amount`, `total_hours_consumed`, `hour_charges`, `description`, `xero_invoice_id`, `status`, `created_at`, `updated_at`, `deleted_at`, `client_id`, `expense_id`, `appointment_id`) VALUES
(73, '20.00', '1.00', '20.00', 'saa', NULL, 'in-progress', '2023-03-28 07:12:59', '2023-03-28 07:12:59', NULL, 1, NULL, 34),
(74, '20.00', '1.00', '20.00', 'saa', NULL, 'in-progress', '2023-03-28 07:12:59', '2023-03-28 07:12:59', NULL, 3, NULL, 34),
(75, '20.00', '1.00', '20.00', 'fdasdf', NULL, 'in-progress', '2023-03-28 07:16:37', '2023-03-28 07:16:37', NULL, 1, NULL, 35),
(76, '20.00', '1.00', '20.00', 'fdasdf', NULL, 'in-progress', '2023-03-28 07:16:37', '2023-03-28 07:16:37', NULL, 3, NULL, 35),
(77, '24.00', NULL, NULL, 'assdf', NULL, 'in-progress', '2023-03-28 07:33:36', '2023-03-28 07:33:36', NULL, 1, 5, 35),
(78, '23.00', NULL, NULL, 'some desc', NULL, 'in-progress', '2023-03-28 07:34:43', '2023-03-28 07:34:43', NULL, 3, 6, 34),
(79, '60.00', '3.00', '20.00', 'some note 123', NULL, 'in-progress', '2023-03-28 10:11:08', '2023-03-28 10:11:08', NULL, 1, NULL, 36),
(80, '60.00', '3.00', '20.00', 'some note 123', NULL, 'in-progress', '2023-03-28 10:11:08', '2023-03-28 10:11:08', NULL, 3, NULL, 36),
(81, '20.00', '1.00', '20.00', 'zxcvzcxv', NULL, 'in-progress', '2023-03-28 10:11:44', '2023-03-28 10:11:44', NULL, 1, NULL, 37),
(82, '20.00', '1.00', '20.00', 'zxcvzcxv', NULL, 'in-progress', '2023-03-28 10:11:44', '2023-03-28 10:11:44', NULL, 3, NULL, 37);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 73, 4, '2023-03-28 07:12:59', '2023-03-28 07:12:59', NULL),
(2, 74, 4, '2023-03-28 07:12:59', '2023-03-28 07:12:59', NULL),
(3, 75, 1, '2023-03-28 07:16:37', '2023-03-28 07:16:37', NULL),
(4, 76, 1, '2023-03-28 07:16:37', '2023-03-28 07:16:37', NULL),
(5, 77, 1, '2023-03-28 07:33:36', '2023-03-28 07:33:36', NULL),
(6, 78, 4, '2023-03-28 07:34:44', '2023-03-28 07:34:44', NULL),
(7, 79, 4, '2023-03-28 10:11:08', '2023-03-28 10:11:08', NULL),
(8, 80, 4, '2023-03-28 10:11:08', '2023-03-28 10:11:08', NULL),
(9, 81, 4, '2023-03-28 10:11:44', '2023-03-28 10:11:44', NULL),
(10, 82, 4, '2023-03-28 10:11:44', '2023-03-28 10:11:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_start` date NOT NULL,
  `leave_ends` date NOT NULL,
  `user_notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `admin_notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editable` tinyint(1) DEFAULT 1,
  `deleteable` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `staff_member_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `leave_start`, `leave_ends`, `user_notes`, `approved`, `admin_notes`, `editable`, `deleteable`, `created_at`, `updated_at`, `deleted_at`, `staff_member_id`) VALUES
(1, '2023-03-30', '2023-04-01', 'dfg', 0, NULL, 1, 1, '2023-03-28 08:16:41', '2023-03-28 08:17:08', NULL, 1),
(2, '2023-04-08', '2023-04-09', NULL, 0, NULL, 1, 1, '2023-03-28 08:17:30', '2023-03-28 09:06:27', '2023-03-28 09:06:27', 4),
(3, '2023-03-22', '2023-03-31', 'ggg', 0, NULL, 1, 1, '2023-03-28 08:44:33', '2023-03-28 08:44:33', NULL, 2),
(4, '2023-04-05', '2023-04-21', 'ewew', 0, NULL, 1, 1, '2023-03-28 09:03:05', '2023-03-28 10:12:29', '2023-03-28 10:12:29', 4),
(5, '2023-03-29', '2023-03-31', 'rrr', 0, NULL, 1, 1, '2023-03-28 10:12:39', '2023-03-28 10:13:31', '2023-03-28 10:13:31', 4),
(6, '2023-05-04', '2023-05-05', 'some notes', 0, NULL, 1, 1, '2023-04-03 09:14:43', '2023-04-03 09:14:43', NULL, 4),
(7, '2023-05-04', '2023-05-05', 'applic from hadi 1 updated', 0, NULL, 1, 1, '2023-04-03 09:24:23', '2023-04-03 09:29:46', NULL, 4),
(8, '2023-04-12', '2023-04-14', 'apllica from admin 1 updated', 0, NULL, 1, 1, '2023-04-03 09:24:47', '2023-04-03 09:29:53', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Expense', 1, 'c528bc0a-0ec3-42e0-bcd2-4c5e948c4386', 'receipt_photo', '640847cd4c3cb_Screenshot 2023-01-22 182309', '640847cd4c3cb_Screenshot-2023-01-22-182309.jpg', 'image/jpeg', 'public', 'public', 180354, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2023-03-08 03:31:16', '2023-03-08 03:31:17'),
(2, 'App\\Models\\Expense', 2, 'b14cca6f-d2fc-4b37-99f7-05a77d4514c1', 'receipt_photo', '6408480039daa_Screenshot 2023-01-22 182309', '6408480039daa_Screenshot-2023-01-22-182309.jpg', 'image/jpeg', 'public', 'public', 180354, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2023-03-08 03:32:07', '2023-03-08 03:32:08'),
(3, 'App\\Models\\Expense', 3, '8eff5077-1734-4b7b-a873-14e83d47f4a5', 'receipt_photo', '6409385e655f7_Screenshot 2023-01-22 182309', '6409385e655f7_Screenshot-2023-01-22-182309.jpg', 'image/jpeg', 'public', 'public', 180354, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2023-03-08 20:37:37', '2023-03-08 20:37:38'),
(4, 'App\\Models\\Appointment', 26, 'f997f8f8-2fff-4a9e-a8f3-3a7ae777d7db', 'photos', '6422a041403de_151 - ROG Wallpaper Challenge - 4K (2)', '6422a041403de_151---ROG-Wallpaper-Challenge---4K-(2).jpg', 'image/jpeg', 'public', 'public', 455032, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2023-03-28 03:07:42', '2023-03-28 03:07:44'),
(5, 'App\\Models\\Appointment', 26, '954a5960-8fe3-4798-9534-4a6332484fce', 'documents', '6422a0441bd1c_163 - ROG Wallpaper Challenge - 1080P', '6422a0441bd1c_163---ROG-Wallpaper-Challenge---1080P.jpg', 'image/jpeg', 'public', 'public', 1552050, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 2, '2023-03-28 03:07:45', '2023-03-28 03:07:45'),
(6, 'App\\Models\\Appointment', 27, 'e6aa9408-12c1-441b-8def-b31320a13820', 'photos', '6422a26d30a0d_130 - ROG Wallpaper Challenge - 4K (2)', '6422a26d30a0d_130---ROG-Wallpaper-Challenge---4K-(2).jpg', 'image/jpeg', 'public', 'public', 1744668, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2023-03-28 03:16:48', '2023-03-28 03:16:49'),
(7, 'App\\Models\\Appointment', 27, '8c11888b-ded1-48ef-b15f-4e45503a5a86', 'documents', '6422a26f089d9_163 - ROG Wallpaper Challenge - 1080P', '6422a26f089d9_163---ROG-Wallpaper-Challenge---1080P.jpg', 'image/jpeg', 'public', 'public', 1552050, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 2, '2023-03-28 03:16:49', '2023-03-28 03:16:50'),
(8, 'App\\Models\\CrmDocument', 1, '50596ee6-3565-46f7-b5a8-fbe36e0e18a7', 'document_file', '6422a34cd1589_148 - ROG Wallpaper Challenge - 4K (2)', '6422a34cd1589_148---ROG-Wallpaper-Challenge---4K-(2).jpg', 'image/jpeg', 'public', 'public', 503790, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2023-03-28 03:20:38', '2023-03-28 03:20:39'),
(9, 'App\\Models\\Expense', 4, '2a395f52-7440-4c64-8276-12c026edfac1', 'receipt_photo', '6422ace4e7e1c_147 - ROG Wallpaper Challenge - 4K (2)', '6422ace4e7e1c_147---ROG-Wallpaper-Challenge---4K-(2).jpg', 'image/jpeg', 'public', 'public', 1182611, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2023-03-28 04:01:33', '2023-03-28 04:01:34'),
(10, 'App\\Models\\Expense', 5, '136f29f2-53c1-4e18-9831-213e138f179c', 'receipt_photo', '6422de7636749_147 - ROG Wallpaper Challenge - 4K (2)', '6422de7636749_147---ROG-Wallpaper-Challenge---4K-(2).jpg', 'image/jpeg', 'public', 'public', 1182611, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2023-03-28 07:33:36', '2023-03-28 07:33:37'),
(11, 'App\\Models\\Expense', 6, '964e2033-334e-45ce-ab5a-fc35a6d3f6ec', 'receipt_photo', '6422ded5ecab9_147 - ROG Wallpaper Challenge - 4K (2)', '6422ded5ecab9_147---ROG-Wallpaper-Challenge---4K-(2).jpg', 'image/jpeg', 'public', 'public', 1182611, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2023-03-28 07:34:44', '2023-03-28 07:34:44');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_02_05_000001_create_audit_logs_table', 1),
(4, '2023_02_05_000002_create_media_table', 1),
(5, '2023_02_05_000003_create_permissions_table', 1),
(6, '2023_02_05_000004_create_roles_table', 1),
(7, '2023_02_05_000005_create_users_table', 1),
(8, '2023_02_05_000006_create_crm_statuses_table', 1),
(9, '2023_02_05_000007_create_crm_customers_table', 1),
(10, '2023_02_05_000008_create_crm_notes_table', 1),
(11, '2023_02_05_000009_create_crm_documents_table', 1),
(12, '2023_02_05_000010_create_user_alerts_table', 1),
(13, '2023_02_05_000011_create_appointments_table', 1),
(14, '2023_02_05_000012_create_photos_table', 1),
(15, '2023_02_05_000013_create_appoimntment_statuses_table', 1),
(16, '2023_02_05_000014_create_client_tags_table', 1),
(17, '2023_02_05_000015_create_leave_applications_table', 1),
(18, '2023_02_05_000016_create_staff_availabilities_table', 1),
(19, '2023_02_05_000017_create_expenses_table', 1),
(20, '2023_02_05_000018_create_invoices_table', 1),
(21, '2023_02_05_000019_create_permission_role_pivot_table', 1),
(22, '2023_02_05_000020_create_role_user_pivot_table', 1),
(23, '2023_02_05_000021_create_client_tag_crm_customer_pivot_table', 1),
(24, '2023_02_05_000022_create_user_user_alert_pivot_table', 1),
(25, '2023_02_05_000023_create_appointment_crm_customer_pivot_table', 1),
(26, '2023_02_05_000024_create_appointment_user_pivot_table', 1),
(27, '2023_02_05_000027_add_relationship_fields_to_crm_customers_table', 1),
(28, '2023_02_05_000028_add_relationship_fields_to_crm_notes_table', 1),
(29, '2023_02_05_000029_add_relationship_fields_to_crm_documents_table', 1),
(30, '2023_02_05_000030_add_relationship_fields_to_appointments_table', 1),
(31, '2023_02_05_000031_add_relationship_fields_to_photos_table', 1),
(32, '2023_02_05_000032_add_relationship_fields_to_leave_applications_table', 1),
(33, '2023_02_05_000033_add_relationship_fields_to_staff_availabilities_table', 1),
(34, '2023_02_05_000034_add_relationship_fields_to_expenses_table', 1),
(35, '2023_02_05_000035_create_qa_topics_table', 1),
(36, '2023_02_05_000036_create_qa_messages_table', 1),
(37, '2023_03_02_192922_create_xero_tokens_table', 1),
(38, '2023_03_03_111945_add_relationship_fields_to_invoices_table', 1),
(39, '2023_03_06_114526_create_invoice_details_table', 1),
(40, '2023_03_06_141408_create_expense_details_table', 1);

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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'basic_c_r_m_access', NULL, NULL, NULL),
(18, 'crm_status_create', NULL, NULL, NULL),
(19, 'crm_status_edit', NULL, NULL, NULL),
(20, 'crm_status_show', NULL, NULL, NULL),
(21, 'crm_status_delete', NULL, NULL, NULL),
(22, 'crm_status_access', NULL, NULL, NULL),
(23, 'crm_customer_create', NULL, NULL, NULL),
(24, 'crm_customer_edit', NULL, NULL, NULL),
(25, 'crm_customer_show', NULL, NULL, NULL),
(26, 'crm_customer_delete', NULL, NULL, NULL),
(27, 'crm_customer_access', NULL, NULL, NULL),
(28, 'crm_note_create', NULL, NULL, NULL),
(29, 'crm_note_edit', NULL, NULL, NULL),
(30, 'crm_note_show', NULL, NULL, NULL),
(31, 'crm_note_delete', NULL, NULL, NULL),
(32, 'crm_note_access', NULL, NULL, NULL),
(33, 'crm_document_create', NULL, NULL, NULL),
(34, 'crm_document_edit', NULL, NULL, NULL),
(35, 'crm_document_show', NULL, NULL, NULL),
(36, 'crm_document_delete', NULL, NULL, NULL),
(37, 'crm_document_access', NULL, NULL, NULL),
(38, 'audit_log_show', NULL, NULL, NULL),
(39, 'audit_log_access', NULL, NULL, NULL),
(40, 'user_alert_create', NULL, NULL, NULL),
(41, 'user_alert_show', NULL, NULL, NULL),
(42, 'user_alert_delete', NULL, NULL, NULL),
(43, 'user_alert_access', NULL, NULL, NULL),
(44, 'configuration_access', NULL, NULL, NULL),
(45, 'appointment_create', NULL, NULL, NULL),
(46, 'appointment_edit', NULL, NULL, NULL),
(47, 'appointment_show', NULL, NULL, NULL),
(48, 'appointment_delete', NULL, NULL, NULL),
(49, 'appointment_access', NULL, NULL, NULL),
(50, 'photo_create', NULL, NULL, NULL),
(51, 'photo_edit', NULL, NULL, NULL),
(52, 'photo_show', NULL, NULL, NULL),
(53, 'photo_delete', NULL, NULL, NULL),
(54, 'photo_access', NULL, NULL, NULL),
(55, 'appoimntment_status_create', NULL, NULL, NULL),
(56, 'appoimntment_status_edit', NULL, NULL, NULL),
(57, 'appoimntment_status_show', NULL, NULL, NULL),
(58, 'appoimntment_status_delete', NULL, NULL, NULL),
(59, 'appoimntment_status_access', NULL, NULL, NULL),
(60, 'client_tag_create', NULL, NULL, NULL),
(61, 'client_tag_edit', NULL, NULL, NULL),
(62, 'client_tag_show', NULL, NULL, NULL),
(63, 'client_tag_delete', NULL, NULL, NULL),
(64, 'client_tag_access', NULL, NULL, NULL),
(65, 'leave_application_create', NULL, NULL, NULL),
(66, 'leave_application_edit', NULL, NULL, NULL),
(67, 'leave_application_show', NULL, NULL, NULL),
(68, 'leave_application_delete', NULL, NULL, NULL),
(69, 'leave_application_access', NULL, NULL, NULL),
(70, 'administration_access', NULL, NULL, NULL),
(71, 'staff_availability_create', NULL, NULL, NULL),
(72, 'staff_availability_edit', NULL, NULL, NULL),
(73, 'staff_availability_show', NULL, NULL, NULL),
(74, 'staff_availability_delete', NULL, NULL, NULL),
(75, 'staff_availability_access', NULL, NULL, NULL),
(76, 'expense_create', NULL, NULL, NULL),
(77, 'expense_edit', NULL, NULL, NULL),
(78, 'expense_show', NULL, NULL, NULL),
(79, 'expense_delete', NULL, NULL, NULL),
(80, 'expense_access', NULL, NULL, NULL),
(81, 'billing_run_create', NULL, NULL, NULL),
(82, 'billing_run_edit', NULL, NULL, NULL),
(83, 'billing_run_show', NULL, NULL, NULL),
(84, 'billing_run_delete', NULL, NULL, NULL),
(85, 'billing_run_access', NULL, NULL, NULL),
(86, 'leave_approval_create', NULL, NULL, NULL),
(87, 'leave_approval_edit', NULL, NULL, NULL),
(88, 'leave_approval_show', NULL, NULL, NULL),
(89, 'leave_approval_delete', NULL, NULL, NULL),
(90, 'leave_approval_access', NULL, NULL, NULL),
(91, 'billing_access', NULL, NULL, NULL),
(92, 'invoice_create', NULL, NULL, NULL),
(93, 'invoice_edit', NULL, NULL, NULL),
(94, 'invoice_show', NULL, NULL, NULL),
(95, 'invoice_delete', NULL, NULL, NULL),
(96, 'invoice_access', NULL, NULL, NULL),
(97, 'profile_password_edit', NULL, NULL, NULL),
(98, 'leave_application_status', NULL, NULL, NULL),
(99, 'generate_invoice', NULL, NULL, NULL),
(100, 'multiple_approval_request', NULL, NULL, NULL),
(101, 'approve_invoice', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 1),
(2, 27),
(2, 17),
(2, 69),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 44),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 70),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101);

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_messages`
--

CREATE TABLE `qa_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_topics`
--

CREATE TABLE `qa_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff_availabilities`
--

CREATE TABLE `staff_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `monday_from` time DEFAULT NULL,
  `monday_to` time DEFAULT NULL,
  `tuesday_from` time DEFAULT NULL,
  `tuesday_to` time DEFAULT NULL,
  `wednesday_from` time DEFAULT NULL,
  `wednesday_to` time DEFAULT NULL,
  `thursday_from` time DEFAULT NULL,
  `thursday_to` time DEFAULT NULL,
  `friday_from` time DEFAULT NULL,
  `friday_to` time DEFAULT NULL,
  `saturday_from` time DEFAULT NULL,
  `saturday_to` time DEFAULT NULL,
  `sunday_from` time DEFAULT NULL,
  `sunday_to` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `staff_member_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_availabilities`
--

INSERT INTO `staff_availabilities` (`id`, `monday_from`, `monday_to`, `tuesday_from`, `tuesday_to`, `wednesday_from`, `wednesday_to`, `thursday_from`, `thursday_to`, `friday_from`, `friday_to`, `saturday_from`, `saturday_to`, `sunday_from`, `sunday_to`, `created_at`, `updated_at`, `deleted_at`, `staff_member_id`) VALUES
(1, '01:00:00', '03:00:00', '08:00:00', '12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '01:00:00', '05:00:00', '01:00:00', '05:00:00', '2023-03-08 03:24:53', '2023-03-08 03:24:53', NULL, 1),
(2, '01:00:00', '03:00:00', '08:00:00', '12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '01:00:00', '05:00:00', '01:00:00', '05:00:00', '2023-03-08 03:24:53', '2023-03-08 03:24:53', NULL, 2),
(3, '01:00:00', '03:00:00', '08:00:00', '12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '01:00:00', '05:00:00', '01:00:00', '05:00:00', '2023-03-08 03:24:53', '2023-03-08 03:24:53', NULL, 3),
(4, '01:00:00', '10:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-28 05:43:04', '2023-03-28 09:35:35', '2023-03-28 09:35:35', 4),
(5, '19:32:29', '22:32:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-28 09:32:35', '2023-03-28 09:34:28', '2023-03-28 09:34:28', NULL),
(6, '01:00:00', '23:34:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-28 09:34:34', '2023-03-28 10:11:05', NULL, 4),
(7, '20:45:55', '23:45:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-03 09:46:05', '2023-04-03 09:48:37', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `profile_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$.OtA0wox4PUlQ6V2FXhEteyKSv2qvq57hvhiWhjlxw1BCJxgMVQWq', 'jDx7swEFEnSxw4AIOwGQqwDMG5o7dswpBhpeiRw4kLKhCiACvi34bm6SIQS5', '', NULL, NULL, NULL),
(2, 'Nick', 'info@totalterminals.com.au', NULL, '$2y$10$JX0KFEnWSjfQCrjdzhxux.ymdxxDBsDTCdncS67tg3szbyi0Hf77K', NULL, 'blue', NULL, NULL, NULL),
(3, 'Dane', 'dane@totalterminals.com.au', NULL, '$2y$10$E/8g.WSe0xlVgz08zDEa2OADO9ofSB.ZnfsIN2.RhDbvMttlxK2D6', NULL, 'green', NULL, NULL, NULL),
(4, 'Abdul', 'abdulhadi@mail.com', NULL, '$2y$10$/cTkzzNWtFWBI1sQNu59luFvVcXGiAh/YRvjqxOuyGp./7FH92OsK', 'bZo0P9sXw4TXjefxRtXaxmS8KAR881ntWsJwz0vMOuN0jAXbQHGvwSNQP1ue', 'white', '2023-03-24 11:14:54', '2023-04-03 06:10:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alert_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xero_tokens`
--

CREATE TABLE `xero_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_event_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date_utc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date_utc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xero_tokens`
--

INSERT INTO `xero_tokens` (`id`, `id_token`, `access_token`, `expires_in`, `token_type`, `refresh_token`, `scopes`, `auth_event_id`, `tenant_id`, `tenant_type`, `tenant_name`, `created_date_utc`, `updated_date_utc`, `created_at`, `updated_at`) VALUES
(1, 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjFDQUY4RTY2NzcyRDZEQzAyOEQ2NzI2RkQwMjYxNTgxNTcwRUZDMTkiLCJ0eXAiOiJKV1QiLCJ4NXQiOiJISy1PWm5jdGJjQW8xbkp2MENZVmdWY09fQmsifQ.eyJuYmYiOjE2Nzk2NzQwMTksImV4cCI6MTY3OTY3NDMxOSwiaXNzIjoiaHR0cHM6Ly9pZGVudGl0eS54ZXJvLmNvbSIsImF1ZCI6IjBEMDg0QkE2RDdEMTRDOTM4NThGM0ZFNDRFNDY2MTQ0IiwiaWF0IjoxNjc5Njc0MDE5LCJhdF9oYXNoIjoiVXNzOUJBOWFZNEdWWFlZaWhwdlRGUSIsInN1YiI6IjkxYTA1Y2FhNzI5MjUyMDM5ODU5NDYwZDhlNDVkYjRhIiwiYXV0aF90aW1lIjoxNjc5NjczNzczLCJ4ZXJvX3VzZXJpZCI6IjI3ZDFlZGUwLTI3OGQtNDcxYS04YjcwLWIwMDFhZTFlMGU0MSIsImdsb2JhbF9zZXNzaW9uX2lkIjoiNjExNjVhOTk3OTU0NGNiM2I2YWJjNGY5M2FjMzE5ZDAiLCJzaWQiOiI2MTE2NWE5OTc5NTQ0Y2IzYjZhYmM0ZjkzYWMzMTlkMCIsInByZWZlcnJlZF91c2VybmFtZSI6Im1hbGlremFyc2xhbjQ0QGdtYWlsLmNvbSIsImVtYWlsIjoibWFsaWt6YXJzbGFuNDRAZ21haWwuY29tIiwiZ2l2ZW5fbmFtZSI6IkFyc2xhbiIsImZhbWlseV9uYW1lIjoiQWhtZWQiLCJuYW1lIjoiQXJzbGFuIEFobWVkIiwiYW1yIjpbInB3ZCJdfQ.rKxzORL7-9QUkN_MO6sEqwNTqPE85IKxBkKGsHLR4WKhao_7G-gs3PVOKwWfJVNNX8fYNqWF23JDPEOTJjL8L4Z6XmTxJS8AOqivQnbSzz_TxbLpWnMJfp4G2lhzRg26Ju_4t4VlAjyPz1sO-CBRPaWD3rF4-tKqcqxfFWFarBgpHoVONsscbD4xVEJnSl6QBtJ0VTRCekejuJoVT9ifov4ZbTFxtjC9ptU68PaDwympWa7ywHERJDedsTA8zRUQqYv1OLYfLpes7Fmzb2-hczARl7nWqKFcZdJy2CjviCIwCydHxkIiietqzMoV-zFTJQcjqgljY3c0VasIJeR8nw', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjFDQUY4RTY2NzcyRDZEQzAyOEQ2NzI2RkQwMjYxNTgxNTcwRUZDMTkiLCJ0eXAiOiJKV1QiLCJ4NXQiOiJISy1PWm5jdGJjQW8xbkp2MENZVmdWY09fQmsifQ.eyJuYmYiOjE2Nzk2NzQwMTksImV4cCI6MTY3OTY3NTgxOSwiaXNzIjoiaHR0cHM6Ly9pZGVudGl0eS54ZXJvLmNvbSIsImF1ZCI6Imh0dHBzOi8vaWRlbnRpdHkueGVyby5jb20vcmVzb3VyY2VzIiwiY2xpZW50X2lkIjoiMEQwODRCQTZEN0QxNEM5Mzg1OEYzRkU0NEU0NjYxNDQiLCJzdWIiOiI5MWEwNWNhYTcyOTI1MjAzOTg1OTQ2MGQ4ZTQ1ZGI0YSIsImF1dGhfdGltZSI6MTY3OTY3Mzc3MywieGVyb191c2VyaWQiOiIyN2QxZWRlMC0yNzhkLTQ3MWEtOGI3MC1iMDAxYWUxZTBlNDEiLCJnbG9iYWxfc2Vzc2lvbl9pZCI6IjYxMTY1YTk5Nzk1NDRjYjNiNmFiYzRmOTNhYzMxOWQwIiwic2lkIjoiNjExNjVhOTk3OTU0NGNiM2I2YWJjNGY5M2FjMzE5ZDAiLCJqdGkiOiI2RjEzOTM4Rjc1MTNFQzIwMzFEMTE0MTY2NjRGNDM1MiIsImF1dGhlbnRpY2F0aW9uX2V2ZW50X2lkIjoiNmY2MTY2MTgtN2JiNi00MzBhLWE2MzMtOTU1ZDE0ZDk4OGE5Iiwic2NvcGUiOlsiZW1haWwiLCJwcm9maWxlIiwib3BlbmlkIiwiYWNjb3VudGluZy5zZXR0aW5ncyIsImFjY291bnRpbmcudHJhbnNhY3Rpb25zIiwiYWNjb3VudGluZy5jb250YWN0cyIsIm9mZmxpbmVfYWNjZXNzIl0sImFtciI6WyJwd2QiXX0.AaiNui8BZ7WG_xrhav7HggPIrd619kysVYMLZSMxXybHDZClIZHp6UT97L7yqPJomifD0u3pGYlrUTyIFKmUJ8Rd2_GgpSH6jsDtcvZsWVMw7pt_lFUJOvv8-61UE-sUxahU-6OuaigS-3hRlWL6Ulfls_P77wRPFrf5R9B3a4yRySUxW0MY6UiDYTkMwd7hK6xAzY2qrs9ToLwJvBhp5Cfra_6uz0Nt5Jtj0HNAwl8iTyyYdOThUzcGYjvPq5UORu5BXC7hR-ljsgiIPSZvweHX_z0O4NUqgL97aXz60XXAmqM-X9TXxL6Pj8LmcTuMQwJdKu-OQrWcVqmlaZQpYQ', '1800', 'Bearer', 'x2rSUkMVAcbm_kkEghzgmTS4xFYTKsCZn2IbqvfL0R0', 'email profile openid accounting.settings accounting.transactions accounting.contacts offline_access', '9f5b11fa-7ac9-4978-a1a1-1aecd72aed84', '7f485e56-113e-46ad-9e2c-012092c73220', 'ORGANISATION', 'Demo Company (Global)', '2023-03-02T22:18:00.7324790', '2023-03-03T15:04:32.7771010', '2023-03-24 11:03:18', '2023-03-24 11:07:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoimntment_statuses`
--
ALTER TABLE `appoimntment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_fk_7872088` (`status_id`);

--
-- Indexes for table `appointment_crm_customer`
--
ALTER TABLE `appointment_crm_customer`
  ADD KEY `appointment_id_fk_7872064` (`appointment_id`),
  ADD KEY `crm_customer_id_fk_7872064` (`crm_customer_id`);

--
-- Indexes for table `appointment_user`
--
ALTER TABLE `appointment_user`
  ADD KEY `appointment_id_fk_7872087` (`appointment_id`),
  ADD KEY `user_id_fk_7872087` (`user_id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_tags`
--
ALTER TABLE `client_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_tag_crm_customer`
--
ALTER TABLE `client_tag_crm_customer`
  ADD KEY `crm_customer_id_fk_7872094` (`crm_customer_id`),
  ADD KEY `client_tag_id_fk_7872094` (`client_tag_id`);

--
-- Indexes for table `crm_customers`
--
ALTER TABLE `crm_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_fk_7871904` (`status_id`);

--
-- Indexes for table `crm_documents`
--
ALTER TABLE `crm_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fk_7871921` (`customer_id`);

--
-- Indexes for table `crm_notes`
--
ALTER TABLE `crm_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fk_7871915` (`customer_id`);

--
-- Indexes for table `crm_statuses`
--
ALTER TABLE `crm_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_fk_7872132` (`appointment_id`);

--
-- Indexes for table `expense_details`
--
ALTER TABLE `expense_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_details_expense_id_foreign` (`expense_id`),
  ADD KEY `client_fk_7872267` (`client_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_fk_7872160` (`client_id`),
  ADD KEY `expense_fk_7872162` (`expense_id`),
  ADD KEY `appointment_fk_7872169` (`appointment_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_fk_7872260` (`invoice_id`),
  ADD KEY `user_fk_7872261` (`user_id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_member_fk_7872103` (`staff_member_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_7871882` (`role_id`),
  ADD KEY `permission_id_fk_7871882` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_fk_7872070` (`client_id`),
  ADD KEY `appointment_fk_7872119` (`appointment_id`);

--
-- Indexes for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_messages_topic_id_foreign` (`topic_id`),
  ADD KEY `qa_messages_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_topics_creator_id_foreign` (`creator_id`),
  ADD KEY `qa_topics_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_7871891` (`user_id`),
  ADD KEY `role_id_fk_7871891` (`role_id`);

--
-- Indexes for table `staff_availabilities`
--
ALTER TABLE `staff_availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_member_fk_7949556` (`staff_member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD KEY `user_alert_id_fk_7871940` (`user_alert_id`),
  ADD KEY `user_id_fk_7871940` (`user_id`);

--
-- Indexes for table `xero_tokens`
--
ALTER TABLE `xero_tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoimntment_statuses`
--
ALTER TABLE `appoimntment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT for table `client_tags`
--
ALTER TABLE `client_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crm_customers`
--
ALTER TABLE `crm_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crm_documents`
--
ALTER TABLE `crm_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crm_notes`
--
ALTER TABLE `crm_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crm_statuses`
--
ALTER TABLE `crm_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expense_details`
--
ALTER TABLE `expense_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_messages`
--
ALTER TABLE `qa_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_topics`
--
ALTER TABLE `qa_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_availabilities`
--
ALTER TABLE `staff_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xero_tokens`
--
ALTER TABLE `xero_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `status_fk_7872088` FOREIGN KEY (`status_id`) REFERENCES `appoimntment_statuses` (`id`);

--
-- Constraints for table `appointment_crm_customer`
--
ALTER TABLE `appointment_crm_customer`
  ADD CONSTRAINT `appointment_id_fk_7872064` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `crm_customer_id_fk_7872064` FOREIGN KEY (`crm_customer_id`) REFERENCES `crm_customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_user`
--
ALTER TABLE `appointment_user`
  ADD CONSTRAINT `appointment_id_fk_7872087` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_7872087` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_tag_crm_customer`
--
ALTER TABLE `client_tag_crm_customer`
  ADD CONSTRAINT `client_tag_id_fk_7872094` FOREIGN KEY (`client_tag_id`) REFERENCES `client_tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `crm_customer_id_fk_7872094` FOREIGN KEY (`crm_customer_id`) REFERENCES `crm_customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `crm_customers`
--
ALTER TABLE `crm_customers`
  ADD CONSTRAINT `status_fk_7871904` FOREIGN KEY (`status_id`) REFERENCES `crm_statuses` (`id`);

--
-- Constraints for table `crm_documents`
--
ALTER TABLE `crm_documents`
  ADD CONSTRAINT `customer_fk_7871921` FOREIGN KEY (`customer_id`) REFERENCES `crm_customers` (`id`);

--
-- Constraints for table `crm_notes`
--
ALTER TABLE `crm_notes`
  ADD CONSTRAINT `customer_fk_7871915` FOREIGN KEY (`customer_id`) REFERENCES `crm_customers` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `appointment_fk_7872132` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`);

--
-- Constraints for table `expense_details`
--
ALTER TABLE `expense_details`
  ADD CONSTRAINT `client_fk_7872267` FOREIGN KEY (`client_id`) REFERENCES `crm_customers` (`id`),
  ADD CONSTRAINT `expense_details_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `appointment_fk_7872169` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `client_fk_7872160` FOREIGN KEY (`client_id`) REFERENCES `crm_customers` (`id`),
  ADD CONSTRAINT `expense_fk_7872162` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_fk_7872260` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_fk_7872261` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD CONSTRAINT `staff_member_fk_7872103` FOREIGN KEY (`staff_member_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_7871882` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_7871882` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `appointment_fk_7872119` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `client_fk_7872070` FOREIGN KEY (`client_id`) REFERENCES `crm_customers` (`id`);

--
-- Constraints for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD CONSTRAINT `qa_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_messages_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `qa_topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD CONSTRAINT `qa_topics_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_topics_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_7871891` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_7871891` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_availabilities`
--
ALTER TABLE `staff_availabilities`
  ADD CONSTRAINT `staff_member_fk_7949556` FOREIGN KEY (`staff_member_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD CONSTRAINT `user_alert_id_fk_7871940` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_7871940` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
