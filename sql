-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2025 at 06:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assets_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','subadmin','employee') NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `role`) VALUES
(2, 'admin', 'admin123', 'admin'),
(3, 'sub_admin', 'subadmin123', 'subadmin'),
(4, 'employee', 'emppass123', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `approval_requests`
--

CREATE TABLE `approval_requests` (
  `id` int(11) NOT NULL,
  `request_type` varchar(50) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `request_data` text DEFAULT NULL,
  `requested_by` int(11) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approval_requests`
--

INSERT INTO `approval_requests` (`id`, `request_type`, `target_id`, `request_data`, `requested_by`, `status`, `approved_by`, `approved_at`, `created_at`) VALUES
(38, 'update', 5162, '{\"id\":\"5162\",\"user_name\":\"JYyyyy00\",\"designation\":\"\",\"department\":\"F\",\"employee_id\":\"3539\",\"email_id\":\"\",\"mobile_number\":\"\",\"location\":\"\",\"sub_location\":\"\",\"change_reason\":\"\",\"mac_id\":\"\",\"ip_address\":\"\",\"network_type\":\"\",\"device_type\":\"\",\"pc_name\":\"\",\"cpu_make\":\"\",\"cpu_model\":\"\",\"cpu_serial_number\":\"\",\"Processor\":\"\",\"Gen\":\"\",\"RAM\":\"\",\"bit\":\"\",\"os\":\"\",\"HDD\":\"\",\"SDD\":\"\",\"monitor_make\":\"\",\"monitor_model\":\"\",\"monitor_serial_number\":\"\",\"printer_scanner_Type\":\"\",\"printer_scanner_make\":\"\",\"printer_scanner_model\":\"\",\"printer_scanner_serial_number\":\"\",\"keyboard_Type\":\"\",\"keyboard_make\":\"\",\"keyboard_model\":\"\",\"keyboard_serial_number\":\"\",\"mouse_Type\":\"\",\"mouse_make\":\"\",\"mouse_model\":\"\",\"mouse_serial_number\":\"\",\"laptop_adaptor_serial_number\":\"\",\"date_of_issue\":\"\",\"po_number\":\"\",\"vendor_name\":\"reyesrty\",\"warranty_status\":\"\",\"AMC\":\"\",\"created_at\":\"2025-08-14 07:10:46\",\"status\":\"active\"}', 0, 'approved', 0, '2025-09-03 06:46:47', '2025-09-03 04:36:53'),
(39, 'update', 4910, '{\"id\":\"4910\",\"user_name\":\"SHAM \",\"designation\":\"gj\",\"department\":\"hu\",\"employee_id\":\"4785\",\"email_id\":\"\",\"mobile_number\":\"\",\"location\":\"\",\"sub_location\":\"\",\"change_reason\":\"\",\"mac_id\":\"\",\"ip_address\":\"\",\"network_type\":\"\",\"device_type\":\"\",\"pc_name\":\"\",\"cpu_make\":\"\",\"cpu_model\":\"\",\"cpu_serial_number\":\"\",\"Processor\":\"\",\"Gen\":\"\",\"RAM\":\"\",\"bit\":\"\",\"os\":\"\",\"HDD\":\"\",\"SDD\":\"\",\"monitor_make\":\"\",\"monitor_model\":\"\",\"monitor_serial_number\":\"\",\"printer_scanner_Type\":\"\",\"printer_scanner_make\":\"\",\"printer_scanner_model\":\"\",\"printer_scanner_serial_number\":\"\",\"keyboard_Type\":\"\",\"keyboard_make\":\"\",\"keyboard_model\":\"\",\"keyboard_serial_number\":\"\",\"mouse_Type\":\"\",\"mouse_make\":\"\",\"mouse_model\":\"\",\"mouse_serial_number\":\"\",\"laptop_adaptor_serial_number\":\"\",\"date_of_issue\":\"\",\"po_number\":\"\",\"vendor_name\":\"\",\"warranty_status\":\"\",\"AMC\":\"\",\"created_at\":\"2025-09-03 07:52:22\",\"status\":\"active\"}', 0, 'approved', 0, '2025-09-03 08:47:00', '2025-09-03 06:12:45'),
(40, 'update', 4910, '{\"id\":\"4910\",\"user_name\":\"SHAM s\",\"designation\":\"gj\",\"department\":\"hu\",\"employee_id\":\"4785\",\"email_id\":\"\",\"mobile_number\":\"\",\"location\":\"\",\"sub_location\":\"\",\"change_reason\":\"\",\"mac_id\":\"\",\"ip_address\":\"\",\"network_type\":\"\",\"device_type\":\"\",\"pc_name\":\"\",\"cpu_make\":\"\",\"cpu_model\":\"\",\"cpu_serial_number\":\"\",\"Processor\":\"\",\"Gen\":\"\",\"RAM\":\"\",\"bit\":\"\",\"os\":\"\",\"HDD\":\"\",\"SDD\":\"\",\"monitor_make\":\"\",\"monitor_model\":\"\",\"monitor_serial_number\":\"\",\"printer_scanner_Type\":\"\",\"printer_scanner_make\":\"\",\"printer_scanner_model\":\"\",\"printer_scanner_serial_number\":\"\",\"keyboard_Type\":\"\",\"keyboard_make\":\"\",\"keyboard_model\":\"\",\"keyboard_serial_number\":\"\",\"mouse_Type\":\"\",\"mouse_make\":\"\",\"mouse_model\":\"\",\"mouse_serial_number\":\"\",\"laptop_adaptor_serial_number\":\"\",\"date_of_issue\":\"\",\"po_number\":\"\",\"vendor_name\":\"\",\"warranty_status\":\"\",\"AMC\":\"\",\"created_at\":\"2025-09-03 07:52:22\",\"status\":\"active\"}', 0, 'approved', 0, '2025-09-03 08:46:58', '2025-09-03 06:46:10'),
(41, 'update', 4910, '{\"id\":\"4910\",\"user_name\":\"SHAM si\",\"designation\":\"gj\",\"department\":\"hu\",\"employee_id\":\"4785\",\"email_id\":\"\",\"mobile_number\":\"\",\"location\":\"\",\"sub_location\":\"\",\"change_reason\":\"\",\"mac_id\":\"\",\"ip_address\":\"\",\"network_type\":\"\",\"device_type\":\"\",\"pc_name\":\"\",\"cpu_make\":\"\",\"cpu_model\":\"\",\"cpu_serial_number\":\"\",\"Processor\":\"\",\"Gen\":\"\",\"RAM\":\"\",\"bit\":\"\",\"os\":\"\",\"HDD\":\"\",\"SDD\":\"\",\"monitor_make\":\"\",\"monitor_model\":\"\",\"monitor_serial_number\":\"\",\"printer_scanner_Type\":\"\",\"printer_scanner_make\":\"\",\"printer_scanner_model\":\"\",\"printer_scanner_serial_number\":\"\",\"keyboard_Type\":\"\",\"keyboard_make\":\"\",\"keyboard_model\":\"\",\"keyboard_serial_number\":\"\",\"mouse_Type\":\"\",\"mouse_make\":\"\",\"mouse_model\":\"\",\"mouse_serial_number\":\"\",\"laptop_adaptor_serial_number\":\"\",\"date_of_issue\":\"\",\"po_number\":\"\",\"vendor_name\":\"\",\"warranty_status\":\"\",\"AMC\":\"\",\"created_at\":\"2025-09-03 07:52:22\",\"status\":\"active\"}', 0, 'approved', 0, '2025-09-03 09:34:01', '2025-09-03 07:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `seq_id` int(255) UNSIGNED NOT NULL,
  `id` varchar(20) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `sub_location` varchar(100) DEFAULT NULL,
  `mac_id` varchar(100) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `network_type` enum('Static','DHCP') DEFAULT 'DHCP',
  `device_type` enum('desktop','laptop','Printer','Monitor') NOT NULL,
  `pc_name` varchar(100) DEFAULT NULL,
  `cpu_make` varchar(100) DEFAULT NULL,
  `cpu_model` varchar(100) DEFAULT NULL,
  `cpu_serial_number` varchar(100) DEFAULT NULL,
  `Processor` varchar(100) DEFAULT NULL,
  `Gen` varchar(100) DEFAULT NULL,
  `RAM` varchar(100) DEFAULT NULL,
  `bit` varchar(100) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `HDD` varchar(100) DEFAULT NULL,
  `SDD` varchar(100) DEFAULT NULL,
  `monitor_make` varchar(100) DEFAULT NULL,
  `monitor_model` varchar(100) DEFAULT NULL,
  `monitor_serial_number` varchar(100) DEFAULT NULL,
  `printer_scanner_Type` enum('Static','DHCP') DEFAULT 'DHCP',
  `printer_scanner_make` varchar(100) DEFAULT NULL,
  `printer_scanner_model` varchar(100) DEFAULT NULL,
  `printer_scanner_serial_number` varchar(100) DEFAULT NULL,
  `keyboard_make` varchar(100) DEFAULT NULL,
  `keyboard_model` varchar(100) DEFAULT NULL,
  `keyboard_serial_number` varchar(100) DEFAULT NULL,
  `mouse_make` varchar(100) DEFAULT NULL,
  `mouse_model` varchar(100) DEFAULT NULL,
  `mouse_serial_number` varchar(100) DEFAULT NULL,
  `laptop_adaptor_serial_number` varchar(100) DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `po_number` varchar(100) DEFAULT NULL,
  `vendor_name` varchar(100) DEFAULT NULL,
  `warranty_status` varchar(100) DEFAULT NULL,
  `AMC` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'Assigned',
  `assets_uuid` char(36) DEFAULT uuid()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`seq_id`, `id`, `user_name`, `designation`, `department`, `employee_id`, `email_id`, `mobile_number`, `location`, `sub_location`, `mac_id`, `ip_address`, `network_type`, `device_type`, `pc_name`, `cpu_make`, `cpu_model`, `cpu_serial_number`, `Processor`, `Gen`, `RAM`, `bit`, `os`, `HDD`, `SDD`, `monitor_make`, `monitor_model`, `monitor_serial_number`, `printer_scanner_Type`, `printer_scanner_make`, `printer_scanner_model`, `printer_scanner_serial_number`, `keyboard_make`, `keyboard_model`, `keyboard_serial_number`, `mouse_make`, `mouse_model`, `mouse_serial_number`, `laptop_adaptor_serial_number`, `date_of_issue`, `po_number`, `vendor_name`, `warranty_status`, `AMC`, `created_at`, `status`, `assets_uuid`) VALUES
(45, '4910', 'SHAM si', 'gj', 'hu', '4785', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '2025-09-03 02:22:22', 'active', '1e6b12aa-8e09-11f0-9d9d-6451062a39d2');

-- --------------------------------------------------------

--
-- Table structure for table `asset_assignments`
--

CREATE TABLE `asset_assignments` (
  `id` int(11) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `assigned_to` varchar(100) NOT NULL,
  `assigned_date` datetime DEFAULT current_timestamp(),
  `returned_date` datetime DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_assignments`
--

INSERT INTO `asset_assignments` (`id`, `asset_id`, `assigned_to`, `assigned_date`, `returned_date`, `remark`, `status`) VALUES
(72, '4910', 'sahuu', '2025-09-04 11:01:32', '2025-09-04 11:02:17', '', 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

CREATE TABLE `asset_categories` (
  `name` varchar(255) NOT NULL,
  `type` varchar(200) NOT NULL,
  `Asset` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_categories`
--

INSERT INTO `asset_categories` (`name`, `type`, `Asset`) VALUES
('cpu', 'asset', 100),
('cpu', 'asset', 100);

-- --------------------------------------------------------

--
-- Table structure for table `asset_logs`
--

CREATE TABLE `asset_logs` (
  `id` bigint(20) NOT NULL,
  `asset_id` bigint(20) NOT NULL,
  `action_type` varchar(30) NOT NULL,
  `old_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`old_data`)),
  `new_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`new_data`)),
  `changed_by` varchar(100) NOT NULL,
  `change_reason` text DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_logs`
--

INSERT INTO `asset_logs` (`id`, `asset_id`, `action_type`, `old_data`, `new_data`, `changed_by`, `change_reason`, `changed_on`, `created_at`) VALUES
(22, 5162, 'Updated', '{\"seq_id\":33,\"id\":\"5162\",\"user_name\":\"JYyyyy00\",\"designation\":\"\",\"department\":\"F\",\"employee_id\":\"3539\",\"email_id\":\"\",\"mobile_number\":\"\",\"location\":\"\",\"sub_location\":\"\",\"mac_id\":\"\",\"ip_address\":\"\",\"network_type\":\"\",\"device_type\":\"\",\"pc_name\":\"\",\"cpu_make\":\"\",\"cpu_model\":\"\",\"cpu_serial_number\":\"\",\"Processor\":\"\",\"Gen\":\"\",\"RAM\":\"\",\"bit\":\"\",\"os\":\"\",\"HDD\":\"\",\"SDD\":\"\",\"monitor_make\":\"\",\"monitor_model\":\"\",\"monitor_serial_number\":\"\",\"printer_scanner_Type\":\"\",\"printer_scanner_make\":\"\",\"printer_scanner_model\":\"\",\"printer_scanner_serial_number\":\"\",\"keyboard_make\":\"\",\"keyboard_model\":\"\",\"keyboard_serial_number\":\"\",\"mouse_make\":\"\",\"mouse_model\":\"\",\"mouse_serial_number\":\"\",\"laptop_adaptor_serial_number\":\"\",\"date_of_issue\":\"0000-00-00\",\"po_number\":\"\",\"vendor_name\":\"reyesrty\",\"warranty_status\":\"\",\"AMC\":\"\",\"created_at\":\"2025-08-14 07:10:46\",\"status\":\"active\"}', '{\"seq_id\":33,\"id\":\"5162\",\"user_name\":\"JYyyyy0\",\"designation\":\"\",\"department\":\"F\",\"employee_id\":\"3539\",\"email_id\":\"\",\"mobile_number\":\"\",\"location\":\"\",\"sub_location\":\"\",\"mac_id\":\"\",\"ip_address\":\"\",\"network_type\":\"\",\"device_type\":\"\",\"pc_name\":\"\",\"cpu_make\":\"\",\"cpu_model\":\"\",\"cpu_serial_number\":\"\",\"Processor\":\"\",\"Gen\":\"\",\"RAM\":\"\",\"bit\":\"\",\"os\":\"\",\"HDD\":\"\",\"SDD\":\"\",\"monitor_make\":\"\",\"monitor_model\":\"\",\"monitor_serial_number\":\"\",\"printer_scanner_Type\":\"\",\"printer_scanner_make\":\"\",\"printer_scanner_model\":\"\",\"printer_scanner_serial_number\":\"\",\"keyboard_make\":\"\",\"keyboard_model\":\"\",\"keyboard_serial_number\":\"\",\"mouse_make\":\"\",\"mouse_model\":\"\",\"mouse_serial_number\":\"\",\"laptop_adaptor_serial_number\":\"\",\"date_of_issue\":\"0000-00-00\",\"po_number\":\"\",\"vendor_name\":\"reyesrty\",\"warranty_status\":\"\",\"AMC\":\"\",\"created_at\":\"2025-08-14 07:10:46\",\"status\":\"active\"}', 'admin', '', '2025-09-03 07:20:03', '2025-09-03 07:20:03'),
(24, 4910, 'Updated', '{\"seq_id\":45,\"id\":\"4910\",\"user_name\":\"SHAM ss\",\"designation\":\"gj\",\"department\":\"hu\",\"employee_id\":\"4785\",\"email_id\":\"\",\"mobile_number\":\"\",\"location\":\"\",\"sub_location\":\"\",\"mac_id\":\"\",\"ip_address\":\"\",\"network_type\":\"\",\"device_type\":\"\",\"pc_name\":\"\",\"cpu_make\":\"\",\"cpu_model\":\"\",\"cpu_serial_number\":\"\",\"Processor\":\"\",\"Gen\":\"\",\"RAM\":\"\",\"bit\":\"\",\"os\":\"\",\"HDD\":\"\",\"SDD\":\"\",\"monitor_make\":\"\",\"monitor_model\":\"\",\"monitor_serial_number\":\"\",\"printer_scanner_Type\":\"\",\"printer_scanner_make\":\"\",\"printer_scanner_model\":\"\",\"printer_scanner_serial_number\":\"\",\"keyboard_make\":\"\",\"keyboard_model\":\"\",\"keyboard_serial_number\":\"\",\"mouse_make\":\"\",\"mouse_model\":\"\",\"mouse_serial_number\":\"\",\"laptop_adaptor_serial_number\":\"\",\"date_of_issue\":\"0000-00-00\",\"po_number\":\"\",\"vendor_name\":\"\",\"warranty_status\":\"\",\"AMC\":\"\",\"created_at\":\"2025-09-03 07:52:22\",\"status\":\"active\"}', '{\"seq_id\":45,\"id\":\"4910\",\"user_name\":\"SHAM s\",\"designation\":\"gj\",\"department\":\"hu\",\"employee_id\":\"4785\",\"email_id\":\"\",\"mobile_number\":\"\",\"location\":\"\",\"sub_location\":\"\",\"mac_id\":\"\",\"ip_address\":\"\",\"network_type\":\"\",\"device_type\":\"\",\"pc_name\":\"\",\"cpu_make\":\"\",\"cpu_model\":\"\",\"cpu_serial_number\":\"\",\"Processor\":\"\",\"Gen\":\"\",\"RAM\":\"\",\"bit\":\"\",\"os\":\"\",\"HDD\":\"\",\"SDD\":\"\",\"monitor_make\":\"\",\"monitor_model\":\"\",\"monitor_serial_number\":\"\",\"printer_scanner_Type\":\"\",\"printer_scanner_make\":\"\",\"printer_scanner_model\":\"\",\"printer_scanner_serial_number\":\"\",\"keyboard_make\":\"\",\"keyboard_model\":\"\",\"keyboard_serial_number\":\"\",\"mouse_make\":\"\",\"mouse_model\":\"\",\"mouse_serial_number\":\"\",\"laptop_adaptor_serial_number\":\"\",\"date_of_issue\":\"0000-00-00\",\"po_number\":\"\",\"vendor_name\":\"\",\"warranty_status\":\"\",\"AMC\":\"\",\"created_at\":\"2025-09-03 07:52:22\",\"status\":\"active\"}', 'admin', '', '2025-09-03 07:32:31', '2025-09-03 07:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `#` int(50) NOT NULL,
  `company` varchar(200) NOT NULL,
  `Asset` int(255) NOT NULL,
  `Assigned` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`#`, `company`, `Asset`, `Assigned`) VALUES
(32, 'sd', 56, 76),
(33, 'hvhjjhgb', 86, 44),
(35, 'seml', 414, 76);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approval_requests`
--
ALTER TABLE `approval_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`seq_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `assets_uuid` (`assets_uuid`);

--
-- Indexes for table `asset_assignments`
--
ALTER TABLE `asset_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_logs`
--
ALTER TABLE `asset_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_asset_logs_changed_on` (`changed_on`),
  ADD KEY `idx_asset_logs_asset_id` (`asset_id`),
  ADD KEY `idx_asset_logs_changed_by` (`changed_by`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`#`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `approval_requests`
--
ALTER TABLE `approval_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `seq_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `asset_assignments`
--
ALTER TABLE `asset_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `asset_logs`
--
ALTER TABLE `asset_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `#` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
