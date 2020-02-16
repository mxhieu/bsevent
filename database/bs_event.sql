-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2020 at 04:25 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bs_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE `approve` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approve`
--

INSERT INTO `approve` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Đang chờ', 'Cập nhật Đang chờ', 0, '2020-02-04 20:47:21', '2020-02-04 20:52:41'),
(2, 'Đã duyệt', 'trạng thái đã được duyệt', 0, '2020-02-04 20:47:31', '2020-02-04 20:54:24'),
(3, 'Hủy bỏ', NULL, 1, '2020-02-04 20:47:42', '2020-02-04 20:56:40'),
(4, 'Đã hủy', 'Đã hủy', 0, '2020-02-04 21:02:54', '2020-02-04 21:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Ngân hàng Vietcombank', 'Ngân hàng Vietcombank', 0, '2019-12-29 21:04:03', '2020-02-04 20:52:11'),
(2, 'Ngân hàng ACB', 'Ngân hàng ACB', 0, '2019-12-29 21:04:12', '2019-12-29 21:04:12'),
(3, 'Ngân hàng Eximbank', 'Ngân hàng Eximbank', 0, '2019-12-29 21:04:25', '2019-12-29 21:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` enum('1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `taxcode`, `address`, `logo`, `phone`, `email`, `homepage`, `intro`, `created_at`, `updated_at`) VALUES
('1', 'Công Ty A', '234234', 'D16/2/8D, tổ 16, ấp 4b, Võ Văn Vân', '1576048745.jpg', '0936022835', 'mxhieu831997@gmail.com', 'website.com', 'DSADSAD', '2019-12-11 00:19:06', '2019-12-11 00:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `companyrepresentatives`
--

CREATE TABLE `companyrepresentatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companyrepresentatives`
--

INSERT INTO `companyrepresentatives` (`id`, `name`, `taxcode`, `email`, `phone`, `address`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Mai Xuân Hiếu', 'adasad', 'mxhieu831997@gmail.com', '0936022835', 'D16/2/8D, tổ 16, ấp 4b, Võ Văn Vân', 0, '2019-12-11 00:19:13', '2019-12-11 00:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `costcategory`
--

CREATE TABLE `costcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Phòng kế toán', 'Phòng kế toán', 0, '2019-12-08 20:39:25', '2019-12-08 20:39:25'),
(2, 'Phòng quyết toán', 'Phòng quyết toán', 0, '2019-12-08 20:39:38', '2019-12-08 20:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_group`
--

CREATE TABLE `detail_item_group` (
  `detail_item_group_category_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_item_group`
--

INSERT INTO `detail_item_group` (`detail_item_group_category_id`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(4, 4, NULL, NULL),
(5, 1, NULL, NULL),
(5, 2, NULL, NULL),
(5, 3, NULL, NULL),
(5, 4, NULL, NULL),
(6, 1, NULL, NULL),
(7, 2, NULL, NULL),
(7, 3, NULL, NULL),
(8, 1, NULL, NULL),
(8, 2, NULL, NULL),
(8, 3, NULL, NULL),
(8, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_group_category`
--

CREATE TABLE `detail_item_group_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_group_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_item_group_category`
--

INSERT INTO `detail_item_group_category` (`id`, `item_group_id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'DỊCH VỤ VẬN CHUYỂN TRANG THIẾT BỊ + BTC', 'DỊCH VỤ VẬN CHUYỂN TRANG THIẾT BỊ + BTC', 1, '2019-12-08 21:31:21', '2020-02-05 00:48:51'),
(2, 1, 'VĂN HÓA NGHỆ THUẬT - GIẤY PHÉP TỔ CHỨC', 'VĂN HÓA NGHỆ THUẬT - GIẤY PHÉP TỔ CHỨC', 1, '2019-12-08 21:32:53', '2020-02-05 00:44:04'),
(4, 1, 'test 2', 'test 2', 1, '2019-12-09 01:03:50', '2020-02-05 00:43:58'),
(5, 1, 'Cập nhật test 1', 'Cập nhật test 1', 0, '2019-12-11 00:07:30', '2019-12-11 00:12:17'),
(6, 2, 'Hạng mục 1', 'Hạng mục 1', 0, '2019-12-11 00:16:17', '2019-12-11 00:16:17'),
(7, 3, 'Hạng mục teambulding 1', NULL, 0, '2019-12-11 00:26:46', '2019-12-11 00:26:46'),
(8, 1, 'tesst', NULL, 0, '2019-12-12 04:16:07', '2019-12-12 04:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` int(11) NOT NULL COMMENT '0: is accepted, 1: is unaccepted',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '0: is men, 1: is women, 2: is undefined',
  `marital_status` int(11) DEFAULT NULL COMMENT '0: is single, 1: is married, 2: is saparated',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `groupemployee_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `approve`, `email`, `country`, `birthday`, `gender`, `marital_status`, `phone`, `remark`, `department_id`, `position_id`, `groupemployee_id`, `password`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Hiếu Mai', 0, 'mxhieu831997@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, '$2y$10$Q8aUsK/Aeoz5qpkXlDSobe0IuHZ11r8Nn0RF10U.QvmE8mDu4Yh5i', 0, '2019-12-08 20:40:43', '2019-12-08 20:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee_education`
--

CREATE TABLE `employee_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `majors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_job`
--

CREATE TABLE `employee_job` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_skill`
--

CREATE TABLE `employee_skill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evalform`
--

CREATE TABLE `evalform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evalform`
--

INSERT INTO `evalform` (`id`, `code`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'code001', 'tesst', NULL, 0, '2020-02-02 21:04:22', '2020-02-02 21:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `evalformitem`
--

CREATE TABLE `evalformitem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1: is title, 2: is content',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `evalform_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupemployee`
--

CREATE TABLE `groupemployee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `permission` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groupemployee`
--

INSERT INTO `groupemployee` (`id`, `name`, `remark`, `is_deleted`, `status`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Master Admin', 'Master Admin', 0, 1, NULL, '2019-12-08 20:40:27', '2019-12-08 20:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `itemcategory_id` bigint(20) UNSIGNED NOT NULL,
  `lead_time` int(11) NOT NULL,
  `attach_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `code`, `image`, `unit_id`, `itemcategory_id`, `lead_time`, `attach_file`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Vận chuyển hạng mục lắp đặt trang trí - Hợp Sức', 'IT001', '1575863094.jpg', 3, 2, 6, NULL, '1 Xe tải 5 tấn + 1 xe tải 8 tấn, 2 chiều - Đà Nẵng - Huế.', 0, '2019-12-08 20:44:54', '2020-02-02 21:26:39'),
(2, 'Vận chuyển hệ thống âm thanh ánh sáng + cabin dịch', 'IT002', '1575863148.jpg', 1, 1, 6, NULL, '2 Xe tải 5 tấn, 2 chiều  Đà Nẵng - Huế', 0, '2019-12-08 20:45:48', '2019-12-08 20:45:48'),
(3, 'Vận chuyển hệ thống trình chiếu, màn hình - Tứ Đại Nam', 'IT003', '1575863208.jpg', 1, 1, 6, NULL, '2 Xe tải 10 tấn, 2 chiều, đi từ Đà Nẵng - Huế', 0, '2019-12-08 20:46:48', '2019-12-08 20:46:48'),
(4, 'Vận chuyển trang thiết bị của team building 2', 'IT004', '1575874824.jpg', 3, 2, 6, NULL, '2 Chiều, xe tải 5 tấn, đi Đà Nẵng - Huế', 0, '2019-12-09 00:00:24', '2019-12-09 00:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `itemcategory`
--

CREATE TABLE `itemcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemcategory`
--

INSERT INTO `itemcategory` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Logistics', NULL, 0, '2019-12-08 20:43:06', '2019-12-10 21:37:59'),
(2, 'Event', NULL, 0, '2019-12-08 20:43:20', '2019-12-08 20:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `item_group`
--

CREATE TABLE `item_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_group`
--

INSERT INTO `item_group` (`id`, `name`, `code`, `remark`, `is_deleted`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Logistics', 'LG001', 'Vận chuyển', 0, 2, '2019-12-08 20:41:22', '2019-12-08 20:41:22'),
(2, 'Nhóm 1', '001', 'Nhóm 1', 0, 1, '2019-12-11 00:16:00', '2019-12-11 00:16:00'),
(3, 'TEAMBUILDING', '002', 'TEAMBUILDING', 0, 2, '2019-12-11 00:26:26', '2019-12-11 00:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `item_supplier`
--

CREATE TABLE `item_supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `attact_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_capacity` int(11) NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `unit_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preparation_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_supplier`
--

INSERT INTO `item_supplier` (`id`, `supplier_id`, `item_id`, `name`, `code`, `image`, `min_price`, `max_price`, `unit_price`, `discount`, `attact_file`, `min_capacity`, `max_capacity`, `unit_capacity`, `preparation_time`, `status`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Cập nhật Mua 1', 'M001', '1578302085.jpg', '200000', '500000', 'VND', 1, '2449157400.docx', 12, 15, '1', 1, 0, 'GHI CHÚ', 0, '2020-01-06 02:14:45', '2020-02-02 21:01:42'),
(2, 2, 2, 'Cập nhật cabin', 'CB002', '1578304317.jpg', '2000000', '600000', 'VND', 2, '1578304317.jpg', 12, 12, '1', 10, 0, 'ghi chú', 0, '2020-01-06 02:51:57', '2020-01-08 02:12:04'),
(3, 2, 3, 'Màng hình chiếu', 'MHC001', '6700670666.jpg', '2000000', '500000', 'VND', 1, '9930422660.docx', 12, 12, '1', 1, 0, 'ghi chú', 0, '2020-01-08 03:16:35', '2020-01-08 03:16:35'),
(4, 1, 1, 'Vận chuyển', 'VC0001', '2344592967.jpg', '2000000', '500000', 'VND', 1, '4249471988.jpg', 12, 15, '1', 1, 0, 'GHI CHÚ', 0, '2020-01-14 19:20:27', '2020-01-15 00:35:56'),
(5, 2, 4, 'Event - Team building 2', 'EV003', '0482414283.jpg', '2000000', '5000000', 'VND', 1, NULL, 12, 134, '1', 1, 0, 'ghi chú', 0, '2020-01-15 01:21:27', '2020-01-15 01:21:27'),
(6, 1, 1, 'Vận chuyển test', 'VC002', '4240302319.jpg', '2000000', '500000', 'VND', 1, '5394134849.docx', 12, 17, '1', 1, 1, 'GHI CHÚ', 0, '2020-02-02 20:24:18', '2020-02-02 21:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Thị trường Tp.HCM', 'Thị trường Tp.HCM', 0, NULL, '2019-12-29 21:04:44'),
(2, 'Thị trường Hà nội 2', 'Thị trường Hà nội 2', 1, '2019-12-29 20:39:49', '2019-12-29 20:48:42'),
(3, 'Thị trường Hà nội', 'Thị trường Hà nội', 0, '2019-12-29 21:04:56', '2019-12-29 21:04:56'),
(4, 'Thị trường Cần thơ', 'Thị trường Cần thơ', 0, '2019-12-29 21:05:05', '2019-12-29 21:05:05');

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
(114, '2014_09_23_021008_create_position_table', 1),
(115, '2014_10_12_000000_create_users_table', 1),
(116, '2014_10_12_100000_create_password_resets_table', 1),
(117, '2019_08_19_000000_create_failed_jobs_table', 1),
(118, '2019_09_20_032803_create_department_table', 1),
(119, '2019_09_24_042225_create_costcategory_table', 1),
(120, '2019_09_24_044703_create_paymentmethod_table', 1),
(121, '2019_09_24_073216_create_itemcategory_table', 1),
(122, '2019_09_24_075241_create_servicecategory_table', 1),
(123, '2019_09_24_075958_create_approve_table', 1),
(124, '2019_10_08_083541_create_company_table', 1),
(125, '2019_10_08_084014_create_companyrepresentatives_table', 1),
(126, '2019_10_14_063537_create_evalform_table', 1),
(127, '2019_10_14_075926_create_revenuecategory_table', 1),
(128, '2019_10_14_084034_create_profitsharecategory_table', 1),
(129, '2019_10_14_095506_create_bank_table', 1),
(130, '2019_10_14_100731_create_groupemployee_table', 1),
(131, '2019_10_15_031000_create_taxcategory_table', 1),
(132, '2019_10_15_041700_create_unit_table', 1),
(133, '2019_10_21_021855_create_item_table', 1),
(134, '2019_10_21_071310_create_service_table', 1),
(135, '2019_10_21_091755_create_employee_table', 1),
(136, '2019_10_23_045140_create_employee_education_table', 1),
(137, '2019_10_23_045155_create_employee_skill_table', 1),
(138, '2019_10_23_045232_create_employee_job_table', 1),
(139, '2019_10_28_025010_create_evalformitem_table', 1),
(140, '2019_12_06_021409_create_item_group_table', 1),
(141, '2019_12_06_025900_create_detail_item_group_category_table', 1),
(142, '2019_12_06_025914_create_detail_item_group_table', 1),
(143, '2019_12_24_091100_create_supplier_category_table', 2),
(144, '2019_12_29_030954_create_market_table', 3),
(145, '2019_12_29_020954_create_market_table', 4),
(146, '2019_12_30_030030_create_supplier_table', 4),
(148, '2020_01_06_072114_create_item_supplier_table', 5),
(149, '2020_02_05_040445_create_task_status_table', 6);

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
('mxhieu831997@gmail.com', '$2y$10$bO0Nn6RjVQ1f7OhseFwQV.UCwm2OOgPxKyKOvTRoLCIwLq7fSvYy2', '2020-02-03 01:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Nhân viên', 'Nhân viên', 0, '2019-12-08 20:39:54', '2019-12-08 20:39:54'),
(2, 'Quản lý', 'Quản lý', 0, '2019-12-08 20:40:10', '2019-12-08 20:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `profitsharecategory`
--

CREATE TABLE `profitsharecategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenuecategory`
--

CREATE TABLE `revenuecategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `servicecategory_id` bigint(20) UNSIGNED NOT NULL,
  `lead_time` int(11) NOT NULL,
  `attach_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicecategory`
--

CREATE TABLE `servicecategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_category_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `bankaccount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `market_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `logo`, `code`, `supplier_category_id`, `status`, `bank_id`, `bankaccount`, `email`, `phone`, `fax`, `address`, `market_id`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Nhà cung cấp 1', '1577680966.jpg', 'NCC001', 4, 0, 3, '1232121', 'mxhieu831997@gmail.com', '0936022835', '0936022835', 'D16/2/8D, tổ 16, ấp 4b, Võ Văn Vân', '[\"4\",\"3\",\"1\"]', 'ghi chú', 0, '2019-12-29 21:42:46', '2020-01-14 19:11:08'),
(2, 'Nhà cung cấp 2', '1578039252.jpg', 'NC002', 3, 0, 1, '90823473249', 'mxhieu831997@gmail.com', '0936022834', '0936022835', 'D16/2/8D, tổ 16, ấp 4b, Võ Văn Vân', '[\"4\",\"3\",\"1\"]', 'Ghi chú', 0, '2020-01-02 21:13:12', '2020-01-08 03:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_category`
--

CREATE TABLE `supplier_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_category`
--

INSERT INTO `supplier_category` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Nhà cung cấp ánh sáng', 'Nhà cung cấp ánh sáng', 0, '2019-12-24 17:00:00', '2019-12-29 21:05:27'),
(2, 'Loại NCC 2', 'Cập nhậtLoại NCC 2', 1, '2019-12-29 19:13:05', '2019-12-29 19:56:27'),
(3, 'Nhà cung cấp rau củ', 'Nhà cung cấp rau củ', 0, '2019-12-29 21:05:44', '2019-12-29 21:05:44'),
(4, 'Nhà cung cấp trang trí', 'Nhà cung cấp trang trí', 0, '2019-12-29 21:05:55', '2019-12-29 21:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Trạng thái công việc 1', 'Cập nhật', 1, '2020-02-04 21:18:43', '2020-02-04 21:25:35'),
(2, 'Hoàn thành', 'Các công việc được hoàn thành', 0, '2020-02-04 21:25:46', '2020-02-04 21:26:20'),
(3, 'Đã hủy', 'Đã hủy', 0, '2020-02-04 21:25:57', '2020-02-04 21:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `taxcategory`
--

CREATE TABLE `taxcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Chiều', NULL, 0, '2019-12-08 20:42:15', '2019-12-08 20:42:15'),
(2, 'Kg', NULL, 0, '2019-12-08 20:42:21', '2019-12-08 20:42:21'),
(3, 'Met', NULL, 0, '2019-12-08 20:42:26', '2019-12-08 20:42:26'),
(4, '<script>alert(\'dsadsad\')</script>', NULL, 0, '2020-02-05 01:36:41', '2020-02-05 01:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `position_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'xuanhieu', 1, 'mxhieu831997@gmail.com', NULL, '$2y$10$pOUBr.ghBHz.DQ6RG2C0Euk.dV4uc8Yqy8mSoJlSQ9IgnTqr./BcC', 'nL5ytzNIa6k52L4dU4ZqKoBdjUp25SbFxUquqXympiIHZLx7GdwOBZI55AwC', '2020-02-03 01:02:51', '2020-02-03 01:02:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyrepresentatives`
--
ALTER TABLE `companyrepresentatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costcategory`
--
ALTER TABLE `costcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_item_group`
--
ALTER TABLE `detail_item_group`
  ADD PRIMARY KEY (`detail_item_group_category_id`,`item_id`),
  ADD KEY `detail_item_group_item_id_foreign` (`item_id`);

--
-- Indexes for table `detail_item_group_category`
--
ALTER TABLE `detail_item_group_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_item_group_category_item_group_id_foreign` (`item_group_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_department_id_foreign` (`department_id`),
  ADD KEY `employee_position_id_foreign` (`position_id`),
  ADD KEY `employee_groupemployee_id_foreign` (`groupemployee_id`);

--
-- Indexes for table `employee_education`
--
ALTER TABLE `employee_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_education_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_job`
--
ALTER TABLE `employee_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_job_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_skill`
--
ALTER TABLE `employee_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_skill_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `evalform`
--
ALTER TABLE `evalform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evalformitem`
--
ALTER TABLE `evalformitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evalformitem_evalform_id_foreign` (`evalform_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupemployee`
--
ALTER TABLE `groupemployee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_unit_id_foreign` (`unit_id`),
  ADD KEY `item_itemcategory_id_foreign` (`itemcategory_id`);

--
-- Indexes for table `itemcategory`
--
ALTER TABLE `itemcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_group`
--
ALTER TABLE `item_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_group_department_id_foreign` (`department_id`);

--
-- Indexes for table `item_supplier`
--
ALTER TABLE `item_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_supplier_supplier_id_foreign` (`supplier_id`),
  ADD KEY `item_supplier_item_id_foreign` (`item_id`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
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
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profitsharecategory`
--
ALTER TABLE `profitsharecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenuecategory`
--
ALTER TABLE `revenuecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_unit_id_foreign` (`unit_id`),
  ADD KEY `service_servicecategory_id_foreign` (`servicecategory_id`);

--
-- Indexes for table `servicecategory`
--
ALTER TABLE `servicecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_supplier_category_id_foreign` (`supplier_category_id`),
  ADD KEY `supplier_bank_id_foreign` (`bank_id`),
  ADD KEY `supplier_market_id_foreign` (`market_id`);

--
-- Indexes for table `supplier_category`
--
ALTER TABLE `supplier_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxcategory`
--
ALTER TABLE `taxcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_position_id_foreign` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve`
--
ALTER TABLE `approve`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companyrepresentatives`
--
ALTER TABLE `companyrepresentatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `costcategory`
--
ALTER TABLE `costcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_item_group_category`
--
ALTER TABLE `detail_item_group_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_education`
--
ALTER TABLE `employee_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_job`
--
ALTER TABLE `employee_job`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_skill`
--
ALTER TABLE `employee_skill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evalform`
--
ALTER TABLE `evalform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evalformitem`
--
ALTER TABLE `evalformitem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupemployee`
--
ALTER TABLE `groupemployee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `itemcategory`
--
ALTER TABLE `itemcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_group`
--
ALTER TABLE `item_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_supplier`
--
ALTER TABLE `item_supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profitsharecategory`
--
ALTER TABLE `profitsharecategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenuecategory`
--
ALTER TABLE `revenuecategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicecategory`
--
ALTER TABLE `servicecategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_category`
--
ALTER TABLE `supplier_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taxcategory`
--
ALTER TABLE `taxcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_item_group`
--
ALTER TABLE `detail_item_group`
  ADD CONSTRAINT `detail_item_group_detail_item_group_category_id_foreign` FOREIGN KEY (`detail_item_group_category_id`) REFERENCES `detail_item_group_category` (`id`),
  ADD CONSTRAINT `detail_item_group_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `detail_item_group_category`
--
ALTER TABLE `detail_item_group_category`
  ADD CONSTRAINT `detail_item_group_category_item_group_id_foreign` FOREIGN KEY (`item_group_id`) REFERENCES `item_group` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `employee_groupemployee_id_foreign` FOREIGN KEY (`groupemployee_id`) REFERENCES `groupemployee` (`id`),
  ADD CONSTRAINT `employee_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- Constraints for table `employee_education`
--
ALTER TABLE `employee_education`
  ADD CONSTRAINT `employee_education_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `employee_job`
--
ALTER TABLE `employee_job`
  ADD CONSTRAINT `employee_job_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `employee_skill`
--
ALTER TABLE `employee_skill`
  ADD CONSTRAINT `employee_skill_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `evalformitem`
--
ALTER TABLE `evalformitem`
  ADD CONSTRAINT `evalformitem_evalform_id_foreign` FOREIGN KEY (`evalform_id`) REFERENCES `evalform` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_itemcategory_id_foreign` FOREIGN KEY (`itemcategory_id`) REFERENCES `itemcategory` (`id`),
  ADD CONSTRAINT `item_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);

--
-- Constraints for table `item_group`
--
ALTER TABLE `item_group`
  ADD CONSTRAINT `item_group_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `item_supplier`
--
ALTER TABLE `item_supplier`
  ADD CONSTRAINT `item_supplier_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `item_supplier_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_servicecategory_id_foreign` FOREIGN KEY (`servicecategory_id`) REFERENCES `servicecategory` (`id`),
  ADD CONSTRAINT `service_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`),
  ADD CONSTRAINT `supplier_supplier_category_id_foreign` FOREIGN KEY (`supplier_category_id`) REFERENCES `supplier_category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
