-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 10:50 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_description` text COLLATE utf8mb4_unicode_ci,
  `publication_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `asset_name`, `asset_code`, `asset_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'NON- CURRENT ASSETS', '20', 'Well', 1, '2018-02-20 05:46:51', '2018-08-12 02:01:17'),
(2, 'FIXED ASSETS', '21', 'Well Well', 1, '2018-02-23 23:42:29', '2018-02-28 04:57:39'),
(3, 'CURRENT ASSETS', '23', 'eeeeeee', 1, '2018-02-25 03:35:25', '2018-02-28 04:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `asset_accounts`
--

CREATE TABLE `asset_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(11) NOT NULL,
  `sub_asset_id` int(11) NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_accounts`
--

INSERT INTO `asset_accounts` (`id`, `asset_id`, `sub_asset_id`, `account_name`, `account_code`, `account_description`, `created_at`, `updated_at`) VALUES
(13, 1, 1, 'Executive Chamber Member (BOI)', '200101', 'well well', '2018-03-14 03:14:18', '2018-08-07 03:39:44'),
(14, 1, 1, 'Trade License', '200102', 'well', '2018-03-14 03:14:39', '2018-04-26 02:40:33'),
(15, 1, 1, 'TIN Certificate', '200103', 'well', '2018-03-14 03:52:28', '2018-03-14 03:52:28'),
(16, 1, 1, 'DCCI Membership', '200104', 'well', '2018-03-14 03:52:41', '2018-03-14 03:52:41'),
(17, 1, 1, 'Advertisement', '200105', 'well', '2018-03-14 03:52:53', '2018-07-10 01:56:58'),
(18, 1, 2, 'Salary & Wages', '200201', 'well well well', '2018-03-14 03:53:13', '2018-04-26 01:01:38'),
(19, 1, 2, 'Tours &amp; Travels', '200202', 'well', '2018-03-14 03:53:23', '2018-04-26 02:26:43'),
(20, 1, 2, 'Conveyance', '200203', 'well', '2018-03-14 03:53:46', '2018-03-14 03:53:46'),
(21, 1, 2, 'Stationary & Printing', '200204', 'well', '2018-03-14 03:53:57', '2018-03-14 03:53:57'),
(22, 1, 2, 'Entertainment', '200205', 'well', '2018-03-14 03:54:12', '2018-03-14 03:54:12'),
(23, 1, 2, 'Consultancy Fee For Auditor', '200206', 'well', '2018-03-14 03:54:21', '2018-03-14 03:54:21'),
(24, 1, 2, 'Repair &amp; Maintenance', '200207', 'well', '2018-03-14 03:54:47', '2018-04-26 01:01:48'),
(25, 1, 2, 'Bank Charge', '200208', 'well', '2018-03-14 03:54:58', '2018-03-14 03:54:58'),
(26, 1, 2, 'Audit fees', '200209', 'well', '2018-03-14 03:55:48', '2018-03-14 03:55:48'),
(27, 1, 2, 'Office Expenses', '200210', 'well', '2018-03-14 04:02:32', '2018-03-14 04:02:32'),
(28, 1, 2, 'Other Expenses', '200211', 'well', '2018-03-14 04:02:42', '2018-03-14 04:02:42'),
(29, 2, 3, 'Land', '210101', 'well', '2018-03-14 04:03:06', '2018-03-14 04:03:06'),
(30, 2, 3, 'Building', '210102', 'well', '2018-03-14 04:03:18', '2018-03-14 04:03:18'),
(31, 2, 4, 'Furniture &amp; Fixture &amp; Fittings', '210201', 'well', '2018-03-14 04:03:37', '2018-04-26 02:26:34'),
(32, 2, 4, 'Interior Decoration', '210202', 'well', '2018-03-14 04:03:50', '2018-03-14 04:03:50'),
(33, 2, 5, 'Computer', '210301', 'well', '2018-03-14 04:04:09', '2018-03-14 04:04:09'),
(34, 2, 5, 'Aircondition', '210302', 'well', '2018-03-14 04:04:24', '2018-03-14 04:04:24'),
(35, 2, 5, 'Mobile Set', '210303', 'well', '2018-03-14 04:04:37', '2018-03-14 04:04:37'),
(36, 2, 5, 'Books', '210304', 'well', '2018-03-14 04:04:47', '2018-03-14 04:04:47'),
(37, 2, 5, 'Printer', '210305', 'well', '2018-03-14 04:05:47', '2018-03-14 04:05:47'),
(38, 2, 5, 'Fax & Machine', '210306', 'well', '2018-03-14 04:05:57', '2018-03-14 04:05:57'),
(39, 2, 5, 'Photocopy Machine', '210307', 'well', '2018-03-14 04:06:09', '2018-03-14 04:06:09'),
(40, 2, 5, 'Communication Equipment', '210308', 'well', '2018-03-14 04:06:22', '2018-03-14 04:06:22'),
(41, 2, 5, 'Computer Server Equipment', '210309', 'well', '2018-03-14 04:06:33', '2018-03-14 04:06:33'),
(42, 2, 5, 'Crockeries & Cutleries', '210310', 'well', '2018-03-14 04:06:48', '2018-03-14 04:06:48'),
(43, 2, 5, 'On Fire Resistant Safe', '210311', 'well', '2018-03-14 04:07:03', '2018-03-14 04:07:03'),
(44, 2, 5, 'IPS', '210312', 'well', '2018-03-14 04:07:14', '2018-03-14 04:07:14'),
(45, 2, 5, 'Scanner', '210313', 'well', '2018-03-14 04:07:26', '2018-03-14 04:07:26'),
(46, 2, 5, 'UPS', '210314', 'well', '2018-03-14 04:08:16', '2018-03-14 04:08:16'),
(47, 2, 5, 'Computer Server Battery', '210315', 'well', '2018-03-14 04:08:27', '2018-03-14 04:08:27'),
(48, 2, 5, 'Phone Set & Installation', '210316', 'well', '2018-03-14 04:08:41', '2018-03-14 04:08:41'),
(49, 2, 5, 'Electrical Fan', '210317', 'well', '2018-03-14 04:08:51', '2018-03-14 04:08:51'),
(50, 2, 5, 'Refrigerator', '210318', 'well', '2018-03-14 04:09:05', '2018-03-14 04:09:05'),
(51, 2, 5, 'Water Dispenser', '210319', 'well', '2018-03-14 04:09:14', '2018-03-14 04:09:14'),
(52, 2, 6, 'Generator', '210401', 'well', '2018-03-14 04:09:29', '2018-03-14 04:09:29'),
(53, 2, 7, 'Motor Car', '210501', 'well', '2018-03-14 04:10:44', '2018-03-14 04:10:44'),
(54, 2, 7, 'Motor Cycle', '210502', 'well', '2018-03-14 04:10:56', '2018-03-14 04:10:56'),
(55, 3, 8, 'Debtors', '230101', 'well', '2018-03-14 04:11:15', '2018-03-14 04:11:15'),
(56, 3, 9, 'Receivable from Ordinary customers', '230201', 'well well', '2018-03-14 04:11:50', '2018-04-26 01:02:06'),
(57, 3, 9, 'Receivable from Foreign customers', '230202', 'well', '2018-03-14 04:12:02', '2018-03-14 04:12:02'),
(58, 3, 9, 'Other accounts receivable', '230203', 'well', '2018-03-14 04:12:17', '2018-03-14 04:12:17'),
(59, 3, 10, 'Cash in Hand', '230301', 'well', '2018-03-14 04:14:08', '2018-03-14 04:14:08'),
(60, 3, 10, 'Petty Cash', '230302', 'well', '2018-03-14 04:14:28', '2018-03-14 04:14:28'),
(61, 3, 10, 'Others', '230303', 'well', '2018-03-14 04:15:02', '2018-03-14 04:15:02'),
(62, 3, 11, 'Cash at Bank', '230401', 'well', '2018-03-14 04:15:25', '2018-03-14 04:15:25'),
(63, 3, 12, 'ADV- A/C Payable - Ordinary customers', '230501', 'well', '2018-03-14 04:16:29', '2018-03-14 04:16:29'),
(64, 3, 12, 'ADV- A/C Payable - Foreign customers', '230502', 'well', '2018-03-14 04:16:42', '2018-03-14 04:16:42'),
(65, 3, 12, 'ADV- A/C Payable - Services', '230503', 'well', '2018-03-14 04:17:02', '2018-03-14 04:17:02'),
(66, 3, 12, 'ADV- A/C Payable - C & F and Freight', '230504', 'well', '2018-03-14 04:17:27', '2018-03-14 04:17:27'),
(67, 3, 12, 'Employee Advance', '230505', 'well', '2018-03-14 04:17:40', '2018-03-14 04:17:40'),
(68, 3, 12, 'Value Added Tax (VAT)', '230506', 'well', '2018-03-14 04:18:06', '2018-03-14 04:18:06'),
(69, 3, 12, 'Advance - IT Purchases', '230507', 'well', '2018-03-14 04:18:23', '2018-03-14 04:18:23'),
(70, 3, 12, 'Advance - Rent', '230508', 'well', '2018-03-14 04:18:34', '2018-03-14 04:18:34'),
(71, 3, 12, 'Prepaid Insurance', '230509', 'well', '2018-03-14 04:18:47', '2018-03-14 04:18:47'),
(72, 3, 12, 'Advance Against Salary', '230510', 'well', '2018-03-14 04:18:59', '2018-03-14 04:18:59'),
(73, 3, 12, 'Advance Income Tax', '230511', 'well', '2018-03-14 04:19:10', '2018-03-14 04:19:10'),
(74, 3, 12, 'Advance - Others', '230512', 'well', '2018-03-14 04:19:30', '2018-03-14 04:19:30'),
(75, 3, 13, 'Deposit Against Non Payment of Security', '230601', 'well', '2018-03-14 04:20:32', '2018-03-14 04:20:32'),
(76, 3, 13, 'VAT Penalty Pending Adjustment', '230602', 'well', '2018-03-14 04:20:45', '2018-03-14 04:20:45'),
(77, 3, 13, 'Security Deposit (Office)', '230603', 'well', '2018-03-14 04:20:58', '2018-03-14 04:20:58'),
(78, 3, 13, 'Allowances for doubtful accounts (bad debts)', '230604', 'well', '2018-03-14 04:21:15', '2018-03-14 04:21:15'),
(79, 3, 13, 'Others', '230605', 'well', '2018-03-14 04:21:29', '2018-03-14 04:21:29'),
(80, 3, 14, 'Investments', '230701', 'well', '2018-03-14 04:21:42', '2018-03-14 04:21:42'),
(90, 3, 9, 'Robin Khan', '230204', 'Robin Khan Account Description', '2018-05-28 03:59:40', '2018-05-28 03:59:40'),
(91, 3, 9, 'Samsul Islam', '230205', 'Samsul Islam Account Description', '2018-05-28 04:01:13', '2018-05-28 04:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `bill_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_date` date NOT NULL,
  `due_date` date NOT NULL,
  `bill_total_price` double(10,2) NOT NULL,
  `paid_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `vendor_id`, `bill_number`, `bill_date`, `due_date`, `bill_total_price`, `paid_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2018-08-16', '2018-08-16', 1652.00, 0.00, 'Pending', '2018-08-16 00:36:02', '2018-08-16 00:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `item_id`, `item_name`, `item_description`, `item_quantity`, `item_price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Internet', 'well', 1, 1200.00, '2018-08-16 00:36:02', '2018-08-16 00:36:02'),
(2, 1, 6, 'new DEmo', 'well', 1, 452.00, '2018-08-16 00:36:02', '2018-08-16 00:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_account_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `asset_account_id`, `company_name`, `first_name`, `last_name`, `email_address`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 90, 'Squire Cosmetic Limited', 'Robin', 'Khan', 'khan@gmail.com', '01918171615', 'ascass', '2018-05-28 03:59:40', '2018-05-28 03:59:40'),
(2, 91, 'Bashundhara Group', 'Samsul', 'Islam', 'samsul@gmail.com', '01715457812', 'Farmgate', '2018-05-28 04:01:13', '2018-05-28 04:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `expense_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_name`, `expense_code`, `expense_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRATION EXPENSES', '41', 'well', 1, '2018-02-26 01:05:30', '2018-03-04 22:15:58'),
(2, 'FINANCIAL EXPENSES', '43', 'well', 1, '2018-02-26 01:05:36', '2018-03-04 22:16:43'),
(3, 'TAX EXPENSES', '44', 'well', 1, '2018-03-04 22:16:56', '2018-03-04 22:16:56'),
(4, 'Profit & Loss Balances C/D', '45', 'well', 1, '2018-03-04 22:17:09', '2018-03-04 22:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `expense_accounts`
--

CREATE TABLE `expense_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `expense_id` int(11) NOT NULL,
  `sub_expense_id` int(11) NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_accounts`
--

INSERT INTO `expense_accounts` (`id`, `expense_id`, `sub_expense_id`, `account_name`, `account_code`, `account_description`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 'Salary & wages - Admin', '410101', 'well', '2018-03-14 21:43:53', '2018-03-14 21:43:53'),
(8, 1, 1, 'Bonus - Admin', '410102', 'well', '2018-03-14 21:44:00', '2018-03-14 21:44:00'),
(9, 1, 1, 'Overtime - Admin', '410103', 'well', '2018-03-14 21:44:08', '2018-03-14 21:44:08'),
(10, 1, 1, 'Incentive - Admin', '410104', 'well', '2018-03-14 21:44:16', '2018-03-14 21:44:16'),
(11, 1, 1, 'Gratuity - Admin', '410105', 'well', '2018-03-14 21:44:27', '2018-03-14 21:44:27'),
(12, 1, 1, 'Employers Contribution To PF - Admin', '410106', 'well', '2018-03-14 21:44:34', '2018-03-14 21:44:34'),
(13, 1, 1, 'Leave Encashment - Admin', '410107', 'well', '2018-03-14 21:44:43', '2018-03-14 21:44:43'),
(14, 1, 1, 'Group Life Insurance - Admin', '410108', 'well', '2018-03-14 21:44:54', '2018-03-14 21:44:54'),
(15, 1, 1, 'Allowance - Admin', '410109', 'well', '2018-03-14 21:45:03', '2018-03-14 21:45:03'),
(16, 1, 2, 'Repairs Building - Admin', '410201', 'well', '2018-03-14 21:45:30', '2018-03-14 21:45:30'),
(17, 1, 2, 'Repairs Office Equipment - Admin', '410202', 'well', '2018-03-14 21:45:51', '2018-03-14 21:45:51'),
(18, 1, 2, 'Repairs Furniture & Fixtures - Admin', '410203', 'well', '2018-03-14 21:46:01', '2018-03-14 21:46:01'),
(19, 1, 2, 'Repairs Vehicles - Admin', '410204', 'well', '2018-03-14 21:46:11', '2018-03-14 21:46:11'),
(20, 1, 3, 'Amortisation Expenses - Admin', '410301', 'well', '2018-03-14 21:47:07', '2018-03-14 21:47:07'),
(21, 1, 3, 'Books & Periodical - Admin', '410302', 'well', '2018-03-14 21:47:19', '2018-03-14 21:47:19'),
(22, 1, 3, 'Donation - Admin', '410303', 'well', '2018-03-14 21:47:31', '2018-03-14 21:47:31'),
(23, 1, 3, 'Electricity, Gas & Wasa - Admin', '410304', 'well', '2018-03-14 21:47:41', '2018-03-14 21:47:41'),
(24, 1, 3, 'Representation and Entertainment Expense - Admin', '410305', 'well', '2018-03-14 21:47:53', '2018-03-14 21:47:53'),
(25, 1, 3, 'Insurance On Vehicales - Admin', '410306', 'well', '2018-03-14 21:48:04', '2018-03-14 21:48:04'),
(26, 1, 3, 'Legal Expenses - Admin', '410307', 'well', '2018-03-14 21:48:17', '2018-03-14 21:48:17'),
(27, 1, 3, 'Medical Expenses - Admin', '410308', 'well', '2018-03-14 21:48:27', '2018-03-14 21:48:27'),
(28, 1, 3, 'Accommodation Expenses - Admin', '410309', 'well', '2018-03-14 21:48:36', '2018-03-14 21:48:36'),
(29, 1, 3, 'Office Rent - Admin', '410310', 'well', '2018-03-14 21:48:45', '2018-03-14 21:48:45'),
(30, 1, 3, 'Environment Health & Safety - Admin', '410311', 'well', '2018-03-14 21:49:53', '2018-03-14 21:49:53'),
(31, 1, 3, 'Postage and Courier - Admin', '410312', 'well', '2018-03-14 21:50:08', '2018-03-14 21:50:08'),
(32, 1, 3, 'Printing & Stationary - Admin', '410313', 'well', '2018-03-14 21:50:18', '2018-03-14 21:50:18'),
(33, 1, 3, 'Professional Fees - Admin', '410314', 'well', '2018-03-14 21:50:27', '2018-03-14 21:50:27'),
(34, 1, 3, 'Registration & Renewal - Admin', '410315', 'well', '2018-03-14 21:50:37', '2018-03-14 21:50:37'),
(35, 1, 3, 'Rent, Rates and Taxes', '410316', 'well', '2018-03-14 21:50:51', '2018-03-14 21:50:51'),
(36, 1, 3, 'Staff Welfare - Admin', '410317', 'well', '2018-03-14 21:51:00', '2018-03-14 21:51:00'),
(37, 1, 3, 'Telephone, Telex, & Fax - Admin', '410318', 'well', '2018-03-14 21:51:11', '2018-03-14 21:51:11'),
(38, 1, 3, 'Travelling & Conveyance - Admin', '410319', 'well', '2018-03-14 21:52:32', '2018-03-14 21:52:32'),
(39, 1, 3, 'Oil Fuel & lubricant - Admin', '410320', 'well', '2018-03-14 21:52:43', '2018-03-14 21:52:43'),
(40, 1, 3, 'Director\'s Remuneration - Admin', '410321', 'well', '2018-03-14 21:52:53', '2018-03-14 21:52:53'),
(41, 1, 3, 'Carring Charge - Admin', '410322', 'well', '2018-03-14 21:53:04', '2018-03-14 21:53:04'),
(42, 1, 3, 'Office Supplies  - Admin', '410323', 'well', '2018-03-14 21:53:16', '2018-03-14 21:53:16'),
(43, 1, 3, 'News Paper Bill - Admin', '410324', 'well', '2018-03-14 21:53:28', '2018-03-14 21:53:28'),
(44, 1, 3, 'Crockeries & Cutluries - Admin', '410325', 'well', '2018-03-14 21:53:37', '2018-03-14 21:53:37'),
(45, 1, 3, 'Office Maintenance (Others) - Admin', '410326', 'well', '2018-03-14 21:53:47', '2018-03-14 21:53:47'),
(46, 1, 3, 'Mobile bill - Admin', '410327', 'well', '2018-03-14 21:53:57', '2018-03-14 21:53:57'),
(47, 1, 3, 'Insurance - Administration Building', '410328', 'well', '2018-03-14 21:54:23', '2018-03-14 21:54:23'),
(48, 1, 3, 'Security &amp; Guard Expenses - Admin', '410329', 'well', '2018-03-14 21:54:45', '2018-04-26 02:00:23'),
(49, 1, 3, 'Office Maintenance(Cleaning )- Admin', '410330', 'well well', '2018-03-14 21:54:53', '2018-04-26 02:00:17'),
(50, 1, 3, 'Stamp/Non Judicial Stamp - Admin', '410331', 'well', '2018-03-14 21:55:02', '2018-03-14 21:55:02'),
(51, 1, 3, 'Trade Mark Expenses - Admin', '410332', 'well', '2018-03-14 21:55:48', '2018-03-14 21:55:48'),
(52, 1, 3, 'Local Conveyance - Admin', '410333', 'well', '2018-03-14 21:55:59', '2018-03-14 21:55:59'),
(53, 1, 3, 'Internet Bill - Admin', '410334', 'well', '2018-03-14 21:56:11', '2018-03-14 21:56:11'),
(54, 1, 3, 'Comuter Consumables - Admin', '410335', 'well', '2018-03-14 21:56:59', '2018-03-14 21:56:59'),
(55, 1, 3, 'Service Bill ( Audit, VAT & TAX) - Admin', '410336', 'well', '2018-03-14 21:57:12', '2018-03-14 21:57:12'),
(56, 1, 3, 'Training - Admin', '410337', 'well', '2018-03-14 21:57:25', '2018-03-14 21:57:25'),
(57, 1, 3, 'Professional Fees - Admin', '410338', 'well', '2018-03-14 21:57:36', '2018-03-14 21:57:36'),
(58, 1, 3, 'Management Information System - Admin', '410339', 'well', '2018-03-14 21:57:47', '2018-03-14 21:57:47'),
(59, 1, 3, 'Accounting Services - Admin', '410340', 'well', '2018-03-14 21:57:59', '2018-03-14 21:57:59'),
(60, 1, 3, 'Monthly Meeting Stipend paid to Officials - Admin', '410341', 'well', '2018-03-14 21:58:17', '2018-03-14 21:58:17'),
(61, 1, 3, 'Annual Meeting  - Admin', '410342', 'well', '2018-03-14 21:58:26', '2018-03-14 21:58:26'),
(62, 1, 3, 'Business Promotion Expense', '410343', 'well', '2018-03-14 21:58:45', '2018-03-14 21:58:45'),
(63, 1, 4, 'Dep. On Land', '410401', 'well', '2018-03-14 21:59:55', '2018-03-14 21:59:55'),
(64, 1, 4, 'Dep. On Building', '410402', 'well', '2018-03-14 22:00:04', '2018-03-14 22:00:04'),
(65, 1, 4, 'Dep. On Furniture & Fixture & Fittings', '410403', 'well', '2018-03-14 22:00:13', '2018-03-14 22:00:13'),
(66, 1, 4, 'Dep. On Interior Decoration', '410404', 'well', '2018-03-14 22:00:33', '2018-03-14 22:00:33'),
(67, 1, 4, 'Dep. On Computer', '410405', 'well', '2018-03-14 22:00:44', '2018-03-14 22:00:44'),
(68, 1, 4, 'Dep. On Aircondition', '410406', 'well', '2018-03-14 22:00:56', '2018-03-14 22:00:56'),
(69, 1, 4, 'Dep. On Mobile Set', '410407', 'well', '2018-03-14 22:01:08', '2018-03-14 22:01:08'),
(70, 1, 4, 'Dep. On Books', '410408', 'well', '2018-03-14 22:01:19', '2018-03-14 22:01:19'),
(71, 1, 4, 'Dep. On Printer', '410409', 'well', '2018-03-14 22:01:36', '2018-03-14 22:01:36'),
(72, 1, 4, 'Dep. On Fax & Machine', '410410', 'well', '2018-03-14 22:01:57', '2018-03-14 22:01:57'),
(73, 1, 4, 'Dep. On Photocopy Machine', '410411', 'well', '2018-03-14 22:02:09', '2018-03-14 22:02:09'),
(74, 1, 4, 'Dep. On Communication Equipment', '410412', 'well', '2018-03-14 22:02:21', '2018-03-14 22:02:21'),
(75, 1, 4, 'Dep. On Computer Server Equipment', '410413', 'well', '2018-03-14 22:02:39', '2018-03-14 22:02:39'),
(76, 1, 4, 'Dep. On Crockeries & Cutleries', '410414', 'well', '2018-03-14 22:02:52', '2018-03-14 22:02:52'),
(77, 1, 4, 'Dep. On On Fire Resistant Safe', '410415', 'well', '2018-03-14 22:03:07', '2018-03-14 22:03:07'),
(78, 1, 4, 'Dep. On IPS', '410416', 'well', '2018-03-14 22:03:18', '2018-03-14 22:03:18'),
(79, 1, 4, 'Dep. On Scanner', '410417', 'well', '2018-03-14 22:03:36', '2018-03-14 22:03:36'),
(80, 1, 4, 'Dep. On UPS', '410418', 'well', '2018-03-14 22:03:45', '2018-03-14 22:03:45'),
(81, 1, 4, 'Dep. On Computer Server Battery', '410419', 'well', '2018-03-14 22:10:23', '2018-03-14 22:10:23'),
(82, 1, 4, 'Dep. On Phone Set & Installation', '410420', 'well', '2018-03-14 22:10:34', '2018-03-14 22:10:34'),
(83, 1, 4, 'Dep. On Electrical Fan', '410421', 'well', '2018-03-14 22:10:45', '2018-03-14 22:10:45'),
(84, 1, 4, 'Dep. On Refrigerator', '410422', 'well', '2018-03-14 22:10:57', '2018-03-14 22:10:57'),
(85, 1, 4, 'Dep. On Water Dispenser', '410423', 'well', '2018-03-14 22:11:11', '2018-03-14 22:11:11'),
(86, 1, 4, 'Dep. On Generator', '410424', 'well', '2018-03-14 22:11:22', '2018-03-14 22:11:22'),
(87, 1, 4, 'Dep. On Motor Car', '410425', 'well', '2018-03-14 22:11:33', '2018-03-14 22:11:33'),
(88, 1, 4, 'Dep. On Motor Cycle', '410426', 'well', '2018-03-14 22:11:49', '2018-03-14 22:11:49'),
(89, 2, 5, 'Bank Charge', '430101', 'well', '2018-03-14 22:12:13', '2018-03-14 22:12:13'),
(90, 2, 5, 'Overdraft Interest', '430102', 'well', '2018-03-14 22:12:28', '2018-03-14 22:12:28'),
(91, 2, 5, 'Commission', '430103', 'well', '2018-03-14 22:12:39', '2018-03-14 22:12:39'),
(92, 2, 5, 'Long Term Loan Interest', '430104', 'well', '2018-03-14 22:12:52', '2018-03-14 22:12:52'),
(93, 2, 5, 'Short Term Loan Interest', '430105', 'well', '2018-03-14 22:13:04', '2018-03-14 22:13:04'),
(94, 2, 5, 'Mid Term Loan Interest', '430106', 'well', '2018-03-14 22:13:16', '2018-03-14 22:13:16'),
(95, 3, 6, 'Income taxes', '440101', 'well', '2018-03-14 22:13:29', '2018-03-14 22:13:29'),
(96, 4, 7, 'Profit & Loss', '450101', 'well', '2018-03-14 22:13:43', '2018-03-14 22:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `income_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `income_name`, `income_code`, `income_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'INCOME', '30', 'well', 1, '2018-02-25 00:57:58', '2018-03-03 22:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `income_accounts`
--

CREATE TABLE `income_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `income_id` int(11) NOT NULL,
  `sub_income_id` int(11) NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_accounts`
--

INSERT INTO `income_accounts` (`id`, `income_id`, `sub_income_id`, `account_name`, `account_code`, `account_description`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 'Service Income', '300101', 'well', '2018-03-14 05:01:08', '2018-03-14 05:01:08'),
(7, 1, 1, 'Rental Income', '300102', 'well well', '2018-03-14 05:01:18', '2018-04-26 01:59:59'),
(8, 1, 2, 'Bank Interest', '300201', 'well', '2018-03-14 05:01:35', '2018-03-14 05:01:35'),
(9, 1, 2, 'Others', '300202', 'well', '2018-03-14 05:01:42', '2018-03-14 05:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_total_price` float(10,2) NOT NULL,
  `paid_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_id`, `invoice_number`, `purchase_order_number`, `invoice_total_price`, `paid_amount`, `invoice_date`, `due_date`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1212', 16527.00, 16527.00, '2018-08-14', '2018-08-17', 'Complete', '2018-08-14 03:24:32', '2018-08-15 22:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` int(10) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `item_id`, `item_name`, `item_description`, `item_quantity`, `item_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Web App Development PHP', 'Well', 1, 16000.00, '2018-08-14 03:24:32', '2018-08-14 03:24:32'),
(2, 1, 2, 'Bollpan', 'Well Bollpan', 1, 75.00, '2018-08-14 03:24:32', '2018-08-14 03:24:32'),
(3, 1, 6, 'new DEmo', 'well', 1, 452.00, '2018-08-14 03:24:32', '2018-08-14 03:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `journal_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `journal_date` date NOT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `debit` int(11) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `transaction_id`, `voucher_id`, `journal_id`, `journal_date`, `account_code`, `description`, `debit`, `credit`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'inv-1', '2018-08-14', '230204', 'Invoice No - 1 Description', 16527, 0, '2018-08-14 03:24:32', '2018-08-14 03:24:32'),
(2, NULL, NULL, 'inv-1', '2018-08-14', '300101', 'Well', 0, 16000, '2018-08-14 03:24:32', '2018-08-14 03:24:32'),
(3, NULL, NULL, 'inv-1', '2018-08-14', '300101', 'Well Bollpan', 0, 75, '2018-08-14 03:24:32', '2018-08-14 03:24:32'),
(4, NULL, NULL, 'inv-1', '2018-08-14', '300101', 'well', 0, 452, '2018-08-14 03:24:33', '2018-08-14 03:24:33'),
(5, 1, 1, 'inv-1', '2018-08-14', '230204', 'Invoice No - 1 Description', 0, 10000, '2018-08-14 03:26:15', '2018-08-14 03:26:15'),
(6, 1, 1, 'inv-1', '2018-08-14', '230302', 'Invoice No - 1 Description', 10000, 0, '2018-08-14 03:26:15', '2018-08-14 03:26:15'),
(7, 2, 2, 'inv-1', '2018-08-14', '230204', 'Invoice No - 1 Description', 0, 5000, '2018-08-14 03:27:10', '2018-08-14 03:27:10'),
(8, 2, 2, 'inv-1', '2018-08-14', '230401', 'Invoice No - 1 Description', 5000, 0, '2018-08-14 03:27:10', '2018-08-14 03:27:10'),
(9, 3, 3, 'inv-1', '2018-08-14', '230204', 'Invoice No - 1 Description', 0, 1527, '2018-08-14 03:28:55', '2018-08-15 22:47:24'),
(10, 3, 3, 'inv-1', '2018-08-14', '230303', 'Invoice No - 1 Description', 1527, 0, '2018-08-14 03:28:56', '2018-08-15 22:47:24'),
(11, 4, 4, 'inc-4', '2018-08-16', 'Service Income', 'Income No - 4 Description', 0, 3000, '2018-08-15 23:02:13', '2018-08-16 00:29:56'),
(12, 4, 4, 'inc-4', '2018-08-16', '230301', 'Income No - 4 Description', 3000, 0, '2018-08-15 23:02:13', '2018-08-16 00:29:56'),
(13, 5, 6, 'exp-5', '2018-08-21', 'Allowance - Admin', 'Expense No - 5 Description', 20000, 0, '2018-08-16 00:35:29', '2018-08-16 00:35:29'),
(14, 5, 6, 'exp-5', '2018-08-21', '230302', 'Expense No - 5 Description', 0, 20000, '2018-08-16 00:35:29', '2018-08-16 00:35:29'),
(15, NULL, NULL, 'bil-1', '2018-08-16', '140408', 'Bill No - 1 Description', 0, 1652, '2018-08-16 00:36:02', '2018-08-16 00:36:02'),
(16, NULL, NULL, 'bil-1', '2018-08-16', '410334', 'well', 1200, 0, '2018-08-16 00:36:02', '2018-08-16 00:36:02'),
(17, NULL, NULL, 'bil-1', '2018-08-16', '410302', 'well', 452, 0, '2018-08-16 00:36:02', '2018-08-16 00:36:02'),
(18, 6, 7, 'pav-6', '2018-08-16', '230301', 'ttttttttt', 0, 90, '2018-08-16 00:44:57', '2018-08-16 00:44:57'),
(19, 6, 7, 'pav-6', '2018-08-16', '410303', 'yyyyyyyyyyyy', 100, 0, '2018-08-16 00:44:57', '2018-08-16 00:44:57'),
(20, 7, 7, 'pav-7', '2018-08-16', '230303', 'iiiiiiiiiiii', 0, 10, '2018-08-16 00:44:57', '2018-08-16 00:44:57'),
(21, 8, 8, 'crv-8', '2018-08-16', '230302', 'adsd', 80, 0, '2018-08-16 04:32:10', '2018-08-16 04:32:10'),
(22, 8, 8, 'crv-8', '2018-08-16', '300102', 'asdasdasd', 0, 120, '2018-08-16 04:32:10', '2018-08-16 04:32:10'),
(23, 9, 8, 'crv-9', '2018-08-16', '230303', 'ascascas', 20, 0, '2018-08-16 04:32:10', '2018-08-16 04:32:10'),
(24, 10, 8, 'crv-10', '2018-08-16', '230301', 'asca', 20, 0, '2018-08-16 04:32:10', '2018-08-16 04:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `liabilities`
--

CREATE TABLE `liabilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `liabilitie_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liabilitie_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liabilitie_description` text COLLATE utf8mb4_unicode_ci,
  `publication_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `liabilities`
--

INSERT INTO `liabilities` (`id`, `liabilitie_name`, `liabilitie_code`, `liabilitie_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'SHAREHOLDER\'S EQUITY', '10', 'WEll dfgdfgdf', 1, '2018-02-24 01:00:43', '2018-02-27 02:17:41'),
(2, 'RESERVES & SURPLUS', '11', 'new', 1, '2018-02-24 01:00:57', '2018-02-27 03:49:00'),
(3, 'ACCUMULATED DEPRECIATION', '12', 'Notes Payable', 1, '2018-02-25 04:31:56', '2018-02-27 03:49:22'),
(4, 'NON- CURRENT LIABILITIES', '13', 'wewe', 1, '2018-02-27 02:18:26', '2018-02-27 03:49:28'),
(5, 'CURRENT LIABILITIES', '14', 'sdasd', 1, '2018-02-27 02:18:43', '2018-02-27 03:49:35'),
(6, 'PROVISIONS', '15', 'asdasd', 1, '2018-02-27 02:19:02', '2018-02-27 03:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `liabilitie_accounts`
--

CREATE TABLE `liabilitie_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `liabilitie_id` int(11) NOT NULL,
  `sub_liabilitie_id` int(11) NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `liabilitie_accounts`
--

INSERT INTO `liabilitie_accounts` (`id`, `liabilitie_id`, `sub_liabilitie_id`, `account_name`, `account_code`, `account_description`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 'Mr. X', '100101', 'well', '2018-03-14 04:24:11', '2018-04-26 01:59:16'),
(9, 1, 1, 'Mr. Y', '100102', 'well', '2018-03-14 04:24:20', '2018-03-14 04:24:20'),
(10, 1, 1, 'Mr. Z', '100103', 'well', '2018-03-14 04:24:29', '2018-03-14 04:24:29'),
(11, 1, 2, 'Adv. Against Capital- Mr. X', '100201', 'well', '2018-03-14 04:24:48', '2018-03-14 04:24:48'),
(12, 1, 2, 'Adv. Against Capital- Mr. Y', '100202', 'well', '2018-03-14 04:24:57', '2018-03-14 04:24:57'),
(13, 1, 2, 'Adv. Against Capital- Mr. Z', '100203', 'well', '2018-03-14 04:25:06', '2018-03-14 04:25:06'),
(14, 2, 3, 'General Reserve', '110101', 'well', '2018-03-14 04:25:41', '2018-03-14 04:25:41'),
(15, 2, 4, 'Profit & Loss Account', '110201', 'well', '2018-03-14 04:26:13', '2018-03-14 04:26:13'),
(16, 2, 4, 'Others', '110202', 'well', '2018-03-14 04:26:25', '2018-03-14 04:26:25'),
(17, 2, 5, 'Reserve', '110301', 'well', '2018-03-14 04:26:50', '2018-03-14 04:26:50'),
(18, 3, 6, 'Acc. Dep. On Building', '120101', 'well', '2018-03-14 04:27:10', '2018-03-14 04:27:10'),
(19, 3, 6, 'Acc. Dep. On Furniture & Fixture & Fittings', '120102', 'well', '2018-03-14 04:28:32', '2018-03-14 04:28:32'),
(20, 3, 6, 'Acc. Dep. On Interior Decoration', '120103', 'well', '2018-03-14 04:28:41', '2018-03-14 04:28:41'),
(21, 3, 6, 'Acc. Dep. On Computer', '120104', 'well', '2018-03-14 04:28:59', '2018-03-14 04:28:59'),
(22, 3, 6, 'Acc. Dep. On Aircondition', '120105', 'well', '2018-03-14 04:29:09', '2018-03-14 04:29:09'),
(23, 3, 6, 'Acc. Dep. On Mobile Set', '120106', 'well', '2018-03-14 04:29:27', '2018-03-14 04:29:27'),
(24, 3, 6, 'Acc. Dep. On Books', '120107', 'well', '2018-03-14 04:29:36', '2018-03-14 04:29:36'),
(25, 3, 6, 'Acc. Dep. On Printer', '120108', 'well', '2018-03-14 04:29:49', '2018-03-14 04:29:49'),
(26, 3, 6, 'Acc. Dep. On Fax & Machine', '120109', 'well', '2018-03-14 04:30:00', '2018-03-14 04:30:00'),
(27, 3, 6, 'Acc. Dep. On Photocopy Machine', '120110', 'well', '2018-03-14 04:30:14', '2018-03-14 04:30:14'),
(28, 3, 6, 'Acc. Dep. On Communication Equipment', '120111', 'well', '2018-03-14 04:30:25', '2018-03-14 04:30:25'),
(29, 3, 6, 'Acc. Dep. On Computer Server Equipment', '120112', 'well', '2018-03-14 04:30:37', '2018-03-14 04:30:37'),
(30, 3, 6, 'Acc. Dep. On Crockeries & Cutleries', '120113', 'well', '2018-03-14 04:30:56', '2018-03-14 04:30:56'),
(31, 3, 6, 'Acc. Dep. On On Fire Resistant Safe', '120114', 'well', '2018-03-14 04:32:06', '2018-03-14 04:32:06'),
(32, 3, 6, 'Acc. Dep. On IPS', '120115', 'well', '2018-03-14 04:32:14', '2018-03-14 04:32:14'),
(33, 3, 6, 'Acc. Dep. On Scanner', '120116', 'well', '2018-03-14 04:32:23', '2018-03-14 04:32:23'),
(34, 3, 6, 'Acc. Dep. On UPS', '120117', 'well', '2018-03-14 04:32:31', '2018-03-14 04:32:31'),
(35, 3, 6, 'Acc. Dep. On Computer Server Battery', '120118', 'well', '2018-03-14 04:32:41', '2018-03-14 04:32:41'),
(36, 3, 6, 'Acc. Dep. On Phone Set & Installation', '120119', 'well', '2018-03-14 04:32:53', '2018-03-14 04:32:53'),
(37, 3, 6, 'Acc. Dep. On Electrical Fan', '120120', 'well', '2018-03-14 04:33:05', '2018-03-14 04:33:05'),
(38, 3, 6, 'Acc. Dep. On Refrigerator', '120121', 'well', '2018-03-14 04:33:16', '2018-03-14 04:33:16'),
(39, 3, 6, 'Acc. Dep. On Water Dispenser', '120122', 'well', '2018-03-14 04:33:27', '2018-03-14 04:33:27'),
(40, 3, 6, 'Acc. Dep. On Generator', '120123', 'well', '2018-03-14 04:33:37', '2018-03-14 04:33:37'),
(41, 3, 6, 'Acc. Dep. On Motor Car', '120124', 'well', '2018-03-14 04:33:47', '2018-03-14 04:33:47'),
(42, 3, 6, 'Acc. Dep. On Motor Cycle', '120125', 'well', '2018-03-14 04:33:58', '2018-03-14 04:33:58'),
(43, 4, 7, 'Long Term Loans', '130101', 'well', '2018-03-14 04:34:27', '2018-03-14 04:34:27'),
(44, 4, 8, 'Long Term Loans', '130201', 'well', '2018-03-14 04:34:40', '2018-03-14 04:34:40'),
(45, 4, 9, 'Long Term Loans', '130301', 'well', '2018-03-14 04:35:57', '2018-03-14 04:35:57'),
(46, 4, 10, 'Provosion For Gratuity', '130401', 'well', '2018-03-14 04:36:13', '2018-03-14 04:36:13'),
(47, 4, 10, 'Employees Provident Fund', '130402', 'well', '2018-03-14 04:36:28', '2018-03-14 04:36:28'),
(48, 5, 11, 'Chairman', '140101', 'well', '2018-03-14 04:40:51', '2018-03-14 04:40:51'),
(49, 5, 11, 'Managing Director', '140102', 'well', '2018-03-14 04:41:21', '2018-03-14 04:41:21'),
(50, 5, 11, 'Loan from bank', '140103', 'well', '2018-03-14 04:41:35', '2018-03-14 04:41:35'),
(51, 5, 11, 'Others', '140104', 'well', '2018-03-14 04:41:48', '2018-03-14 04:41:48'),
(52, 5, 12, 'Current Account', '140201', 'well', '2018-03-14 04:42:41', '2018-03-14 04:42:41'),
(53, 5, 13, 'Creditors', '140301', 'well', '2018-03-14 04:43:02', '2018-03-14 04:43:02'),
(54, 5, 14, 'A/C Payables Services', '140401', 'well', '2018-03-14 04:43:21', '2018-03-14 04:43:21'),
(55, 5, 14, 'A/C Payables C & F', '140402', 'well', '2018-03-14 04:43:38', '2018-03-14 04:43:38'),
(56, 5, 15, 'Security Deposit', '140501', 'well', '2018-03-14 04:44:05', '2018-03-14 04:44:05'),
(57, 5, 15, 'Salary', '140502', 'well', '2018-03-14 04:44:46', '2018-03-14 04:44:46'),
(58, 5, 15, 'Salary Tax Payable', '140503', 'well', '2018-03-14 04:44:56', '2018-03-14 04:44:56'),
(59, 5, 15, 'Income Tax Payable', '140504', 'well', '2018-03-14 04:45:06', '2018-03-14 04:45:06'),
(60, 5, 15, 'Legal Advisors Fee', '140505', 'well', '2018-03-14 04:45:37', '2018-03-14 04:45:37'),
(61, 5, 16, 'TDS - General', '140601', 'well', '2018-03-14 04:45:55', '2018-03-14 04:45:55'),
(62, 5, 16, 'TDS -Employees', '140602', 'well', '2018-03-14 04:46:07', '2018-03-14 04:46:07'),
(63, 5, 16, 'TDS -Account Receivables', '140603', 'well', '2018-03-14 04:46:31', '2018-03-14 04:46:31'),
(64, 5, 16, 'TDS - Rent', '140604', 'well', '2018-03-14 04:47:21', '2018-03-14 04:47:21'),
(65, 5, 16, 'TDS - Professional Charges', '140605', 'well', '2018-03-14 04:47:33', '2018-03-14 04:47:33'),
(66, 5, 16, 'TDS - Advertising', '140606', 'well', '2018-03-14 04:47:52', '2018-03-14 04:47:52'),
(67, 5, 16, 'TDS - Account Payable Services', '140607', 'well', '2018-03-14 04:48:06', '2018-03-14 04:48:06'),
(68, 5, 16, 'TDS - C & F and Freight', '140608', 'well', '2018-03-14 04:48:17', '2018-03-14 04:48:17'),
(69, 5, 17, 'VDS - General', '140701', 'well', '2018-03-14 04:48:38', '2018-03-14 04:48:38'),
(70, 5, 17, 'VDS - Account Payable Service', '140702', 'well', '2018-03-14 04:48:52', '2018-03-14 04:48:52'),
(71, 5, 17, 'VDS - Advertising', '140703', 'well', '2018-03-14 04:49:04', '2018-03-14 04:49:04'),
(72, 5, 17, 'VDS - Professional Charges', '140704', 'well', '2018-03-14 04:49:13', '2018-03-14 04:49:13'),
(73, 5, 17, 'VDS - Rent', '140705', 'well', '2018-03-14 04:49:22', '2018-03-14 04:49:22'),
(74, 5, 18, 'Int. Div. - Mr.X', '140801', 'well', '2018-03-14 04:49:36', '2018-03-14 04:49:36'),
(75, 5, 18, 'Int. Div. - Y', '140802', 'well', '2018-03-14 04:49:49', '2018-03-14 04:49:49'),
(76, 5, 18, 'Int. Div. - Z', '140803', 'well', '2018-03-14 04:50:02', '2018-03-14 04:50:02'),
(77, 6, 19, 'Provisions For Salaries & wages', '150101', 'well', '2018-03-14 04:51:32', '2018-03-14 04:51:32'),
(78, 6, 19, 'Provisions For Electricity bill', '150102', 'well', '2018-03-14 04:51:43', '2018-03-14 04:51:43'),
(79, 6, 19, 'Provisions For Gas bill', '150103', 'well', '2018-03-14 04:51:52', '2018-03-14 04:51:52'),
(80, 6, 19, 'Provisions For Office Rent', '150104', 'well', '2018-03-14 04:52:01', '2018-03-14 04:52:01'),
(81, 6, 19, 'Provisions For Water Supply', '150105', 'well', '2018-03-14 04:52:12', '2018-03-14 04:52:12'),
(82, 6, 19, 'Provisions For Telephone', '150106', 'well', '2018-03-14 04:52:25', '2018-03-14 04:52:25'),
(83, 6, 19, 'Provisions For Annual Bonus', '150107', 'well', '2018-03-14 04:52:34', '2018-03-14 04:52:34'),
(84, 6, 19, 'Provisions For Special Bonus', '150108', 'well', '2018-03-14 04:52:59', '2018-03-14 04:52:59'),
(85, 6, 19, 'Provisions For Professional Charge', '150109', 'well', '2018-03-14 04:53:07', '2018-03-14 04:53:07'),
(86, 6, 19, 'Provisions For Monthly Special Commission', '150110', 'well', '2018-03-14 04:53:17', '2018-03-14 04:53:17'),
(87, 6, 20, 'Provisions For Income Taxes', '150201', 'well', '2018-03-14 04:53:31', '2018-03-14 04:53:31'),
(93, 5, 14, 'Collol Group', '140408', 'Collol Group Account Description', '2018-05-28 04:04:15', '2018-05-28 04:04:15'),
(94, 5, 14, 'Partex Star Group', '140409', 'Partex Star Group Account Description', '2018-05-28 04:04:39', '2018-05-28 04:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `manual_journals`
--

CREATE TABLE `manual_journals` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` double(10,2) NOT NULL,
  `credit` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2018_02_20_113000_create_assets_table', 2),
(4, '2018_02_24_063929_create_liabilities_table', 3),
(5, '2018_02_25_053147_create_owners_equities_table', 4),
(6, '2018_02_25_064822_create_incomes_table', 5),
(7, '2018_02_25_072132_create_expens_table', 6),
(8, '2018_02_25_094204_create_asset_accounts_table', 7),
(9, '2018_02_25_100811_create_liabilitie_accounts_table', 8),
(10, '2018_02_25_112432_create_owners_equity_accounts_table', 9),
(11, '2018_02_26_031534_create_income_accounts_table', 10),
(12, '2018_02_26_032538_create_expens_accounts_table', 11),
(13, '2018_02_25_072132_create_expenses_table', 12),
(14, '2018_02_26_070203_create_expenses_table', 13),
(15, '2018_02_27_073957_create_sub_liabilities_table', 14),
(16, '2018_02_28_054606_create_sub_assets_table', 15),
(17, '2018_03_04_043414_create_sub_incomes_table', 16),
(18, '2018_03_04_064818_create_sub_expenses_table', 17),
(19, '2018_03_05_044920_create_sub_owners_equities_table', 18),
(20, '2018_03_06_083919_create_customers_table', 19),
(21, '2018_03_06_092854_create_products_table', 20),
(22, '2018_03_11_103005_create_invoices_table', 21),
(23, '2018_03_11_103052_create_invoice_details_table', 21),
(24, '2018_03_13_042352_create_vendors_table', 22),
(25, '2018_03_13_064226_create_bills_table', 23),
(26, '2018_03_13_064253_create_bill_details_table', 23),
(27, '2018_03_14_083734_create_journals_table', 24),
(28, '2018_03_19_102048_create_transactions_table', 25),
(29, '2018_04_01_090207_create_manual_journals_table', 26),
(30, '2018_04_15_061615_create_roles_table', 27),
(31, '2018_04_15_062301_create_user_role_table', 27),
(32, '2018_04_15_062533_create_role_routes_table', 27),
(33, '2018_08_01_104155_create_vouchers_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `owners_equities`
--

CREATE TABLE `owners_equities` (
  `id` int(10) UNSIGNED NOT NULL,
  `owners_equity_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owners_equity_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owners_equity_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners_equities`
--

INSERT INTO `owners_equities` (`id`, `owners_equity_name`, `owners_equity_code`, `owners_equity_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Owners Investment / Drawings', '50', 'well', 1, '2018-05-16 05:45:24', '2018-05-16 05:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `owners_equity_accounts`
--

CREATE TABLE `owners_equity_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `owners_equity_id` int(11) NOT NULL,
  `sub_owners_equity_id` int(11) NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners_equity_accounts`
--

INSERT INTO `owners_equity_accounts` (`id`, `owners_equity_id`, `sub_owners_equity_id`, `account_name`, `account_code`, `account_description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Owners Investment / Drawings', '500101', 'well', '2018-05-16 05:47:24', '2018-05-16 05:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `income_account_id` int(11) DEFAULT NULL,
  `expense_account_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `product_price` double(10,2) NOT NULL,
  `sell_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `income_account_id`, `expense_account_id`, `product_name`, `product_description`, `product_price`, `sell_status`, `buy_status`, `created_at`, `updated_at`) VALUES
(1, 6, NULL, 'Web App Development PHP', 'Well', 16000.00, '1', NULL, '2018-05-27 01:03:24', '2018-05-27 01:03:24'),
(2, 6, NULL, 'Bollpan', 'Well Bollpan', 75.00, '1', NULL, '2018-05-28 03:40:49', '2018-05-28 03:40:49'),
(3, NULL, 54, 'Computer', 'Well', 35000.00, NULL, '1', '2018-05-28 03:41:21', '2018-05-28 03:41:21'),
(4, NULL, 53, 'Internet', 'well', 1200.00, NULL, '1', '2018-05-28 03:42:05', '2018-05-28 03:42:05'),
(5, 6, NULL, 'Mobile', 'well mobile', 45000.00, '1', NULL, '2018-05-28 03:42:51', '2018-05-28 03:42:51'),
(6, 6, 21, 'new DEmo', 'well', 452.00, '1', '1', '2018-07-01 04:44:56', '2018-07-01 04:44:56'),
(7, 7, NULL, 'wwwwwwwwwwww', 'dasdasdas', 2345.00, '1', NULL, '2018-08-16 03:25:46', '2018-08-16 03:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Role One', 'well', '2018-04-15 01:33:39', '2018-04-15 01:33:39'),
(2, 'Admin', 'well admin', '2018-04-15 01:40:43', '2018-04-15 01:40:43'),
(3, 'Main Admin', 'well main admin', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(4, 'View', 'welllll', '2018-04-15 02:43:20', '2018-04-15 02:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_routes`
--

CREATE TABLE `role_routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_routes`
--

INSERT INTO `role_routes` (`id`, `role_id`, `role_name`, `route_name`, `created_at`, `updated_at`) VALUES
(15, 3, 'Main Admin', 'view-asset', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(16, 3, 'Main Admin', 'new-asset', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(17, 3, 'Main Admin', 'edit-asset', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(18, 3, 'Main Admin', 'update-asset', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(19, 3, 'Main Admin', 'create-sub-asset-code', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(20, 3, 'Main Admin', 'new-sub-asset', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(21, 3, 'Main Admin', 'edit-sub-asset', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(22, 3, 'Main Admin', 'update-sub-asset', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(23, 3, 'Main Admin', 'view-liabilities', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(24, 3, 'Main Admin', 'new-liabilities', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(25, 3, 'Main Admin', 'edit-liabilities', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(26, 3, 'Main Admin', 'update-liabilities', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(27, 3, 'Main Admin', 'create-sub-liabilitie-code', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(28, 3, 'Main Admin', 'new-sub-liabilities', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(29, 3, 'Main Admin', 'edit-sub-liabilities', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(30, 3, 'Main Admin', 'update-sub-liabilities', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(31, 3, 'Main Admin', 'chart-of-account', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(32, 3, 'Main Admin', 'create-asset-account-code', '2018-04-15 01:45:14', '2018-04-15 01:45:14'),
(33, 3, 'Main Admin', 'new-asset-account', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(34, 3, 'Main Admin', 'create-liabilitie-account-code', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(35, 3, 'Main Admin', 'new-liabilitie-account', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(36, 3, 'Main Admin', 'create-owners-equity-account-code', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(37, 3, 'Main Admin', 'new-owners-equity-account', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(38, 3, 'Main Admin', 'create-income-account-code', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(39, 3, 'Main Admin', 'new-income-account', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(40, 3, 'Main Admin', 'create-expense-account-code', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(41, 3, 'Main Admin', 'new-expense-account', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(42, 3, 'Main Admin', 'asset-account-name-update', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(43, 3, 'Main Admin', 'asset-account-code-update', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(44, 3, 'Main Admin', 'asset-account-description-update', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(45, 3, 'Main Admin', 'owners-equity', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(46, 3, 'Main Admin', 'new-owners-equity', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(47, 3, 'Main Admin', 'edit-owners-equity', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(48, 3, 'Main Admin', 'update-owners-equity', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(49, 3, 'Main Admin', 'create-sub-owners-equity-code', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(50, 3, 'Main Admin', 'new-sub-owners-equity', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(51, 3, 'Main Admin', 'edit-sub-owners-equity', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(52, 3, 'Main Admin', 'update-sub-owners-equity', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(53, 3, 'Main Admin', 'view-income', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(54, 3, 'Main Admin', 'new-income', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(55, 3, 'Main Admin', 'edit-income', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(56, 3, 'Main Admin', 'update-income', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(57, 3, 'Main Admin', 'create-sub-income-code', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(58, 3, 'Main Admin', 'new-sub-income', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(59, 3, 'Main Admin', 'edit-sub-income', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(60, 3, 'Main Admin', 'update-sub-income', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(61, 3, 'Main Admin', 'view-expense', '2018-04-15 01:45:15', '2018-04-15 01:45:15'),
(62, 3, 'Main Admin', 'new-expense', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(63, 3, 'Main Admin', 'edit-expense', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(64, 3, 'Main Admin', 'update-expense', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(65, 3, 'Main Admin', 'create-sub-expense-code', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(66, 3, 'Main Admin', 'new-sub-expense', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(67, 3, 'Main Admin', 'edit-sub-expense', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(68, 3, 'Main Admin', 'update-sub-expense', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(69, 3, 'Main Admin', 'invoice-info', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(70, 3, 'Main Admin', 'create-invoice', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(71, 3, 'Main Admin', 'select-customer-info', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(72, 3, 'Main Admin', 'select-invoice-product-info', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(73, 3, 'Main Admin', 'new-invoice', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(74, 3, 'Main Admin', 'customer-info', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(75, 3, 'Main Admin', 'new-customer', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(76, 3, 'Main Admin', 'product-info', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(77, 3, 'Main Admin', 'new-product', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(78, 3, 'Main Admin', 'bill-info', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(79, 3, 'Main Admin', 'create-bill', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(80, 3, 'Main Admin', 'select-vendor-info', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(81, 3, 'Main Admin', 'select-bill-product-info', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(82, 3, 'Main Admin', 'new-bill', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(83, 3, 'Main Admin', 'vendor-info', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(84, 3, 'Main Admin', 'new-vendor', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(85, 3, 'Main Admin', 'add-transaction', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(86, 3, 'Main Admin', 'select-income-account', '2018-04-15 01:45:16', '2018-04-15 01:45:16'),
(87, 3, 'Main Admin', 'select-expense-account', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(88, 3, 'Main Admin', 'select-cash-bank-account', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(89, 3, 'Main Admin', 'new-income-transaction', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(90, 3, 'Main Admin', 'new-expense-transaction', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(91, 3, 'Main Admin', 'select-invoice-info', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(92, 3, 'Main Admin', 'select-bill-info', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(93, 3, 'Main Admin', 'new-transaction', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(94, 3, 'Main Admin', 'journal-transaction', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(95, 3, 'Main Admin', 'add-journal-transaction', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(96, 3, 'Main Admin', 'select-asset-account', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(97, 3, 'Main Admin', 'select-liabilities-account', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(98, 3, 'Main Admin', 'select-journal-income-account', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(99, 3, 'Main Admin', 'select-journal-expense-account', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(100, 3, 'Main Admin', 'select-journal-owners-equity-account', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(101, 3, 'Main Admin', 'new-journal-transaction', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(102, 3, 'Main Admin', 'edit-manual-journal', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(103, 3, 'Main Admin', 'update-journal-transaction', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(104, 3, 'Main Admin', 'balance-sheet', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(105, 3, 'Main Admin', 'add-user', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(106, 3, 'Main Admin', 'manage-user', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(107, 3, 'Main Admin', 'add-role', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(108, 3, 'Main Admin', 'new-role', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(109, 3, 'Main Admin', 'manage-role', '2018-04-15 01:45:17', '2018-04-15 01:45:17'),
(110, 4, 'View', 'view-asset', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(111, 4, 'View', 'view-liabilities', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(112, 4, 'View', 'chart-of-account', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(113, 4, 'View', 'view-income', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(114, 4, 'View', 'invoice-info', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(115, 4, 'View', 'bill-info', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(116, 4, 'View', 'select-invoice-info', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(117, 4, 'View', 'select-bill-info', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(118, 4, 'View', 'journal-transaction', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(119, 4, 'View', 'select-liabilities-account', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(120, 4, 'View', 'select-journal-income-account', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(121, 4, 'View', 'select-journal-expense-account', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(122, 4, 'View', 'select-journal-owners-equity-account', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(123, 4, 'View', 'balance-sheet', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(124, 4, 'View', 'manage-user', '2018-04-15 02:43:20', '2018-04-15 02:43:20'),
(125, 1, 'Role One', 'view-asset', '2018-04-24 02:55:32', '2018-04-24 02:55:32'),
(126, 1, 'Role One', 'new-asset', '2018-04-24 02:55:32', '2018-04-24 02:55:32'),
(127, 2, 'Admin', 'balance-sheet', '2018-04-25 01:43:49', '2018-04-25 01:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `sub_assets`
--

CREATE TABLE `sub_assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_asset_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_asset_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_assets`
--

INSERT INTO `sub_assets` (`id`, `asset_id`, `sub_asset_name`, `sub_asset_code`, `created_at`, `updated_at`) VALUES
(1, '1', 'PRELIMINARY EXPENSES', '2001', '2018-02-28 23:21:40', '2018-02-28 23:21:40'),
(2, '1', 'PRE- OPERATING EXPENSES', '2002', '2018-02-28 23:22:03', '2018-02-28 23:22:03'),
(3, '2', 'LAND & BUILDING', '2101', '2018-02-28 23:22:25', '2018-02-28 23:22:25'),
(4, '2', 'FURNITURE & FITTINGS', '2102', '2018-02-28 23:22:33', '2018-02-28 23:22:33'),
(5, '2', 'OFFICE EQUIPMENT', '2103', '2018-02-28 23:22:44', '2018-02-28 23:22:44'),
(6, '2', 'Tools & Machinary', '2104', '2018-02-28 23:22:57', '2018-02-28 23:22:57'),
(7, '2', 'TRANSPORT & VEHICLES', '2105', '2018-02-28 23:23:05', '2018-02-28 23:23:05'),
(8, '3', 'SUNDRY DEBTORS', '2301', '2018-03-14 03:03:41', '2018-03-14 03:03:41'),
(9, '3', 'ACCOUNTS RECEIVABLES', '2302', '2018-03-14 03:03:54', '2018-03-14 03:03:54'),
(10, '3', 'CASH', '2303', '2018-03-14 03:04:05', '2018-03-14 03:04:05'),
(11, '3', 'BANKS', '2304', '2018-03-14 03:04:18', '2018-03-14 03:04:18'),
(12, '3', 'LOANS & ADVANCES', '2305', '2018-03-14 03:05:29', '2018-03-14 03:05:29'),
(13, '3', 'DEPOSIT', '2306', '2018-03-14 03:05:35', '2018-03-14 03:05:35'),
(14, '3', 'INVESTMENTS', '2307', '2018-03-14 03:05:53', '2018-03-14 03:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `sub_expenses`
--

CREATE TABLE `sub_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `expense_id` int(11) NOT NULL,
  `sub_expense_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_expense_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_expenses`
--

INSERT INTO `sub_expenses` (`id`, `expense_id`, `sub_expense_name`, `sub_expense_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'SALARIES & WAGES - ADMIN', '4101', '2018-03-04 22:20:30', '2018-03-04 22:20:30'),
(2, 1, 'REPAIR & MAINTENANCE - ADMIN', '4102', '2018-03-04 22:20:48', '2018-03-04 22:20:48'),
(3, 1, 'OTHER EXPENSES - ADMIN', '4103', '2018-03-04 22:20:55', '2018-03-04 22:20:55'),
(4, 1, 'DEPRECIATION - ADMIN', '4104', '2018-03-04 22:21:13', '2018-03-04 22:21:13'),
(5, 2, 'FINANCIAL CHARGES', '4301', '2018-03-04 22:21:28', '2018-03-04 22:21:28'),
(6, 3, 'INCOME TAXES', '4401', '2018-03-04 22:21:40', '2018-03-04 22:21:40'),
(7, 4, 'PROFIT & LOSS BALANCE C/D', '4501', '2018-03-04 22:21:50', '2018-03-04 22:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `sub_incomes`
--

CREATE TABLE `sub_incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `income_id` int(11) NOT NULL,
  `sub_income_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_income_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_incomes`
--

INSERT INTO `sub_incomes` (`id`, `income_id`, `sub_income_name`, `sub_income_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'SOURCE OF INCOME', '3001', '2018-03-03 22:46:20', '2018-03-03 22:46:20'),
(2, 1, 'OTHER INCOME', '3002', '2018-03-03 22:46:45', '2018-03-03 23:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `sub_liabilities`
--

CREATE TABLE `sub_liabilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `liabilitie_id` int(11) NOT NULL,
  `sub_liabilitie_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_liabilitie_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_liabilities`
--

INSERT INTO `sub_liabilities` (`id`, `liabilitie_id`, `sub_liabilitie_name`, `sub_liabilitie_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'SHARE CAPITAL', '1001', '2018-02-27 02:03:54', '2018-02-27 04:12:57'),
(2, 1, 'ADVANCE AGAINST SHARE CAPITAL', '1002', '2018-02-27 04:21:11', '2018-02-27 04:21:11'),
(3, 2, 'RESERVES & SURPLUS', '1101', '2018-02-27 05:15:52', '2018-02-27 05:15:52'),
(4, 2, 'RETAINED EARNINGS', '1102', '2018-02-27 05:16:03', '2018-02-27 05:16:03'),
(5, 2, 'TAX HOLIDAY RESERVE', '1103', '2018-02-27 05:16:20', '2018-02-27 05:16:20'),
(6, 3, 'ACCUMULATED DEPRECIATION', '1201', '2018-02-28 00:31:06', '2018-02-28 00:31:06'),
(7, 4, 'LONG TERM LOANS- SECURED', '1301', '2018-02-28 00:31:49', '2018-02-28 00:31:49'),
(8, 4, 'LONG TERM LOANS- UNSECURED', '1302', '2018-02-28 00:32:02', '2018-02-28 00:32:02'),
(9, 4, 'OTHER NON - CURRENT LIABILITIES', '1303', '2018-02-28 00:32:26', '2018-02-28 00:32:26'),
(10, 4, 'PROV. FOR END OF SERVICE BENEFITS', '1304', '2018-02-28 00:33:26', '2018-02-28 00:33:26'),
(11, 5, 'SHORT TERM LOANS', '1401', '2018-03-14 04:37:37', '2018-03-14 04:37:37'),
(12, 5, 'CURRENT ACCOUNT WITH BANKS', '1402', '2018-03-14 04:38:01', '2018-03-14 04:38:01'),
(13, 5, 'SUNDRY CREDITORS', '1403', '2018-03-14 04:38:12', '2018-03-14 04:38:12'),
(14, 5, 'ACCOUNTS PAYABLE', '1404', '2018-03-14 04:38:24', '2018-03-14 04:38:24'),
(15, 5, 'OTHER CURRENT LIABILITIES', '1405', '2018-03-14 04:38:34', '2018-03-14 04:38:34'),
(16, 5, 'TDS', '1406', '2018-03-14 04:39:07', '2018-03-14 04:39:07'),
(17, 5, 'VDS', '1407', '2018-03-14 04:39:16', '2018-03-14 04:39:16'),
(18, 5, 'DIVIDEND PAYABLE', '1408', '2018-03-14 04:39:26', '2018-03-14 04:39:26'),
(19, 6, 'PROVISIONS FOR EXPENSES', '1501', '2018-03-14 04:39:37', '2018-03-14 04:39:37'),
(20, 6, 'PROVISIONS FOR TAXES', '1502', '2018-03-14 04:39:48', '2018-03-14 04:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `sub_owners_equities`
--

CREATE TABLE `sub_owners_equities` (
  `id` int(10) UNSIGNED NOT NULL,
  `owners_equity_id` int(11) NOT NULL,
  `sub_owners_equity_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_owners_equity_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_owners_equities`
--

INSERT INTO `sub_owners_equities` (`id`, `owners_equity_id`, `sub_owners_equity_name`, `sub_owners_equity_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Owners Investment / Drawings', '5001', '2018-05-16 05:46:25', '2018-05-16 05:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `transaction_date` date NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `voucher_id`, `transaction_date`, `payment_amount`, `payment_type`, `payment_account`, `account_category`, `payment_description`, `verification_status`, `created_at`, `updated_at`) VALUES
(1, 'inv-1', 1, '2018-08-14', 10000.00, 'Cash', '230302', 'Invoice Payment', 'first payment for this invoice.........', 0, '2018-08-14 03:26:15', '2018-08-14 03:26:15'),
(2, 'inv-1', 2, '2018-08-14', 5000.00, 'Paypal', '230401', 'Invoice Payment', 'second payment', 0, '2018-08-14 03:27:10', '2018-08-14 03:27:10'),
(3, 'inv-1', 3, '2018-08-14', 1527.00, 'Bank Payment', '230303', 'Invoice Payment', 'rest of the payment for this invoice...', 0, '2018-08-14 03:28:55', '2018-08-15 22:47:24'),
(4, 'inc-4', 4, '2018-08-16', 3000.00, 'Cash', '230301', 'Service Income', 'wwwwwwwwwww', 0, '2018-08-15 23:02:12', '2018-08-16 00:29:56'),
(5, 'exp-5', 6, '2018-08-21', 20000.00, 'Cash', '230302', 'Allowance - Admin', 'well', 0, '2018-08-16 00:35:29', '2018-08-16 00:35:29'),
(6, 'pav-7', 7, '2018-08-16', 90.00, 'Credit Cart', '230301', 'Payment Voucher', 'wwweeeeeeelllllllll', 0, '2018-08-16 00:44:57', '2018-08-16 00:44:57'),
(7, 'pav-7', 7, '2018-08-16', 10.00, 'Credit Cart', '230303', 'Payment Voucher', 'wwweeeeeeelllllllll', 0, '2018-08-16 00:44:57', '2018-08-16 00:44:57'),
(8, 'crv-8', 8, '2018-08-16', 80.00, 'Cash', '230302', 'Credit Voucher', 'dfsdfsdfsdf', 0, '2018-08-16 04:32:09', '2018-08-16 04:32:09'),
(9, 'crv-8', 8, '2018-08-16', 20.00, 'Cash', '230303', 'Credit Voucher', 'dfsdfsdfsdf', 0, '2018-08-16 04:32:10', '2018-08-16 04:32:10'),
(10, 'crv-8', 8, '2018-08-16', 20.00, 'Cash', '230301', 'Credit Voucher', 'dfsdfsdfsdf', 0, '2018-08-16 04:32:10', '2018-08-16 04:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `admin_status`, `created_at`, `updated_at`) VALUES
(6, 'bitBirds Solutions', 'info@bitbirds.com', '$2y$10$nW3eLgpw1wLh66Ld2U6UUOv9q575NYnCCG/P.Sa1IdA5jV9QIOfD6', 'AmjonyJH9v9pHb3AXox0b8jw2rnBgnOtKH41dTgEjPT1P859nVoa84rzRDAs', 1, '2018-04-15 02:35:56', '2018-04-15 02:35:56'),
(8, 'habib', 'habib@bitbirds.com', '$2y$10$VsZVbdejW7ELl4YWFrCqkuygw39H5AhWuufDTS9cpTA6pGvlj7/n6', '8UpvoVpUcBbMTZiuFpndA0gtEqc4zPML2b3BGHvE72DcMTMtMcVdNB5lRx00Tz462Iy8RY', NULL, '2018-04-25 01:51:21', '2018-04-25 04:08:39'),
(9, 'new user', 'new-user@bitbirds.com', '$2y$10$7iqGEmK0S6nKfXkKBoWlRe7RJ0sStKfFh1D7heDEa5Hn8S4ETLUMW', 'Khy7govmlxrDQftWlFeGXHIb17eb3DWnoFm6wC4CJl0p67DOOuNC1CT8MaJhUVmU3k0ggF', NULL, '2018-04-25 02:14:20', '2018-04-25 04:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 6, 3, NULL, NULL),
(6, 9, 1, NULL, NULL),
(7, 8, 1, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 8, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_liabilitie_id` int(11) DEFAULT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_liabilitie_id`, `vendor_name`, `email_address`, `phone_number`, `address`, `account_number`, `created_at`, `updated_at`) VALUES
(1, 93, 'Collol Group', 'info@collol.com', '01515451245', 'Malibagh', '012501233333', '2018-05-28 04:04:15', '2018-05-28 04:04:15'),
(2, 94, 'Partex Star Group', 'admin@partex.com', '01815141215', 'Motijhil', '125.125.14.110012', '2018-05-28 04:04:39', '2018-05-28 04:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `voucher_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `voucher_date` datetime DEFAULT NULL,
  `total_amount` float(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `voucher_type`, `description`, `voucher_date`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'Invoice Voucher', 'first payment for this invoice.........', '2018-08-14 00:00:00', 10000.00, '2018-08-14 03:26:15', '2018-08-14 03:26:15'),
(2, 'Invoice Voucher', 'second payment', '2018-08-14 00:00:00', 5000.00, '2018-08-14 03:27:10', '2018-08-14 03:27:10'),
(3, 'Invoice Voucher', 'rest of the payment for this invoice...', '2018-08-14 00:00:00', 1527.00, '2018-08-14 03:28:55', '2018-08-15 22:47:24'),
(4, 'Income Voucher', 'wwwwwwwwwww', '2018-08-16 00:00:00', 3000.00, '2018-08-15 23:02:12', '2018-08-16 00:29:56'),
(6, 'Expense Voucher', 'well', '2018-08-21 00:00:00', 20000.00, '2018-08-16 00:35:29', '2018-08-16 00:35:29'),
(7, 'Payment Voucher', 'wwweeeeeeelllllllll', '2018-08-16 00:00:00', 100.00, '2018-08-16 00:44:57', '2018-08-16 00:44:57'),
(8, 'Credit Voucher', 'dfsdfsdfsdf', '2018-08-16 00:00:00', 120.00, '2018-08-16 04:32:09', '2018-08-16 04:32:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_accounts`
--
ALTER TABLE `asset_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_accounts`
--
ALTER TABLE `expense_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_accounts`
--
ALTER TABLE `income_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liabilitie_accounts`
--
ALTER TABLE `liabilitie_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_journals`
--
ALTER TABLE `manual_journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners_equities`
--
ALTER TABLE `owners_equities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners_equity_accounts`
--
ALTER TABLE `owners_equity_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_routes`
--
ALTER TABLE `role_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_assets`
--
ALTER TABLE `sub_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_expenses`
--
ALTER TABLE `sub_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_incomes`
--
ALTER TABLE `sub_incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_liabilities`
--
ALTER TABLE `sub_liabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_owners_equities`
--
ALTER TABLE `sub_owners_equities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `asset_accounts`
--
ALTER TABLE `asset_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `expense_accounts`
--
ALTER TABLE `expense_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `income_accounts`
--
ALTER TABLE `income_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `liabilities`
--
ALTER TABLE `liabilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `liabilitie_accounts`
--
ALTER TABLE `liabilitie_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `manual_journals`
--
ALTER TABLE `manual_journals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `owners_equities`
--
ALTER TABLE `owners_equities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `owners_equity_accounts`
--
ALTER TABLE `owners_equity_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role_routes`
--
ALTER TABLE `role_routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `sub_assets`
--
ALTER TABLE `sub_assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sub_expenses`
--
ALTER TABLE `sub_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sub_incomes`
--
ALTER TABLE `sub_incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_liabilities`
--
ALTER TABLE `sub_liabilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sub_owners_equities`
--
ALTER TABLE `sub_owners_equities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
