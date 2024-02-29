-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 05:59 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate_license`
--

CREATE TABLE `certificate_license` (
  `certificate_license_id` int(11) NOT NULL,
  `license_type` varchar(255) NOT NULL,
  `company_option` varchar(255) NOT NULL,
  `valid_from` varchar(255) NOT NULL,
  `valid_till` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `license_no` varchar(255) NOT NULL,
  `validity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `certificate_license`
--

INSERT INTO `certificate_license` (`certificate_license_id`, `license_type`, `company_option`, `valid_from`, `valid_till`, `class`, `license_no`, `validity`) VALUES
(2, 'General', 'ID Sign', '2024-02-28', '2025-02-28', 'Class 2', '10', '1'),
(3, 'General', 'ID Sign', '2024-02-28', '2026-02-28', 'Class 3', '40', '2'),
(4, 'Combo', 'ID Sign', '', '', 'Class Two', '502', '2'),
(5, 'General', 'Penta Sign', '', '', 'Class Two', '100', '1');

-- --------------------------------------------------------

--
-- Table structure for table `delivered_dsc`
--

CREATE TABLE `delivered_dsc` (
  `delivery_id` int(255) NOT NULL,
  `awb_no` varchar(255) NOT NULL,
  `courier_comp` varchar(255) NOT NULL,
  `license_no` varchar(255) NOT NULL,
  `dsc_use_id` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `delivered_dsc`
--

INSERT INTO `delivered_dsc` (`delivery_id`, `awb_no`, `courier_comp`, `license_no`, `dsc_use_id`, `status`) VALUES
(2, 'Arihantr', 'company', '123456789', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dsc_use`
--

CREATE TABLE `dsc_use` (
  `dsc_use_id` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `license_no` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dsc_use`
--

INSERT INTO `dsc_use` (`dsc_use_id`, `product`, `options`, `token`, `license_no`, `serial_no`, `certificate`, `quantity`, `status`) VALUES
(1, 'Product 1', '', 'Token 1', '123456789', '1234567890', 'certificate 1', '1', '2'),
(2, 'Product 2', '', 'Token 2', 'License 2', 'Serial 2', 'certificate 2', '1', '2'),
(3, 'Product 3', '', 'Token 3', 'License 3', 'Serial 3', 'certificate 3', '1', '1'),
(4, 'Product 2', '', 'Token 2', 'License 2', 'Serial 2', 'certificate 2', '1', '2'),
(5, 'Ahdahs', 'USB', 'sdfg', 'sdfg', 'sdg', 'wsg', '1', '2'),
(6, 'Ahdahs', 'USB', 'sdfg', 'sdfg', 'sdg', 'wsg', '1', '2'),
(7, 'Ahdahs', 'USB', 'sdfg', 'sdfg', 'sdg', 'wsg', '1', '2'),
(8, 'Ahdahs', 'USB', 'sdfg', 'sdfg', 'sdg', 'wsg', '1', '2'),
(9, 'Ahdahs', 'USB', 'sdfg', 'sdfg', 'sdg', 'wsg', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `license_record`
--

CREATE TABLE `license_record` (
  `license_record_id` int(11) NOT NULL,
  `certificate_license_id` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `valid_from` varchar(255) NOT NULL,
  `valid_till` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `license_record`
--

INSERT INTO `license_record` (`license_record_id`, `certificate_license_id`, `issue`, `valid_from`, `valid_till`) VALUES
(5, '3', '5', '2024-02-28', '2026-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `no_of_license`
--

CREATE TABLE `no_of_license` (
  `id` int(11) NOT NULL,
  `no_of_license` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `no_of_license`
--

INSERT INTO `no_of_license` (`id`, `no_of_license`) VALUES
(1, '642');

-- --------------------------------------------------------

--
-- Table structure for table `stockout_form`
--

CREATE TABLE `stockout_form` (
  `id` int(11) NOT NULL,
  `no_of_license` varchar(255) NOT NULL,
  `dsc_token_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `connector_code` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `token_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stockout_form`
--

INSERT INTO `stockout_form` (`id`, `no_of_license`, `dsc_token_id`, `order_id`, `lead_id`, `connector_code`, `remarks`, `token_option`) VALUES
(3, 'dsfgh', '', '34', '6677', '7', 'sdg', 'Only Certificate License'),
(4, '', '100', '25142', '11526', '256338', 'tfr', 'Only DSC Token'),
(8, '12', '101', '12', '12', '12', '13sfvdg', 'Both'),
(9, '1', 'Select Option', '52151', '5555', '44444', '', 'Only No. of License'),
(10, '10', 'Select Option', 'saddf', '2', '235', 'wrg', 'Only License');

-- --------------------------------------------------------

--
-- Table structure for table `usb_token`
--

CREATE TABLE `usb_token` (
  `usb_token_id` int(11) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `token_option` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `available` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usb_token`
--

INSERT INTO `usb_token` (`usb_token_id`, `manufacturer`, `token_option`, `serial`, `available`) VALUES
(1, 'arihasf', 'Proxy Key', '100', 1),
(2, 'arihasf', 'Proxy Key', '101', 0),
(3, 'arihasf', 'Proxy Key', '110', 1),
(4, 'arihasf', 'Proxy Key', '103', 1),
(5, 'arihasf', 'Proxy Key', '104', 1),
(6, 'china', 'Proxy Key', '4152251542154152', 1),
(7, 'china', 'Proxy Key', '4152251542154153', 1),
(8, 'china', 'Proxy Key', '4152251542154154', 1),
(9, 'china', 'Proxy Key', '4152251542154155', 1),
(10, 'china', 'Proxy Key', '4152251542154156', 1),
(11, 'china', 'Proxy Key', '4152251542154157', 1),
(12, 'china', 'Proxy Key', '4152251542154158', 1),
(13, 'china', 'Proxy Key', '4152251542154159', 1),
(14, 'china', 'Proxy Key', '4152251542154160', 1),
(15, 'china', 'Proxy Key', '4152251542154161', 1),
(16, 'china', 'Proxy Key', '4152251542154162', 1),
(17, 'china', 'Proxy Key', '4152251542154163', 1),
(18, 'china', 'Proxy Key', '4152251542154164', 1),
(19, 'china', 'Proxy Key', '4152251542154165', 1),
(20, 'china', 'Proxy Key', '4152251542154166', 1),
(21, 'china', 'Proxy Key', '4152251542154167', 1),
(22, 'china', 'Proxy Key', '4152251542154168', 1),
(23, 'china', 'Proxy Key', '4152251542154169', 1),
(24, 'china', 'Proxy Key', '4152251542154170', 1),
(25, 'china', 'Proxy Key', '4152251542154171', 1),
(26, 'china', 'Proxy Key', '4152251542154172', 1),
(27, 'china', 'Proxy Key', '4152251542154173', 1),
(28, 'china', 'Proxy Key', '4152251542154174', 1),
(29, 'china', 'Proxy Key', '4152251542154175', 1),
(30, 'china', 'Proxy Key', '4152251542154176', 1),
(31, 'china', 'Proxy Key', '4152251542154177', 1),
(32, 'china', 'Proxy Key', '4152251542154178', 1),
(33, 'china', 'Proxy Key', '4152251542154179', 1),
(34, 'china', 'Proxy Key', '4152251542154180', 1),
(35, 'china', 'Proxy Key', '4152251542154181', 1),
(36, 'china', 'Proxy Key', '4152251542154182', 1),
(37, 'china', 'Proxy Key', '4152251542154183', 1),
(38, 'china', 'Proxy Key', '4152251542154184', 1),
(39, 'china', 'Proxy Key', '4152251542154185', 1),
(40, 'china', 'Proxy Key', '4152251542154186', 1),
(41, 'china', 'Proxy Key', '4152251542154187', 1),
(42, 'china', 'Proxy Key', '4152251542154188', 1),
(43, 'china', 'Proxy Key', '4152251542154189', 1),
(44, 'china', 'Proxy Key', '4152251542154190', 1),
(45, 'china', 'Proxy Key', '4152251542154191', 1),
(46, 'china', 'Proxy Key', '4152251542154192', 1),
(47, 'china', 'Proxy Key', '4152251542154193', 1),
(48, 'china', 'Proxy Key', '4152251542154194', 1),
(49, 'china', 'Proxy Key', '4152251542154195', 1),
(50, 'china', 'Proxy Key', '4152251542154196', 1),
(51, 'china', 'Proxy Key', '4152251542154197', 1),
(52, 'china', 'Proxy Key', '4152251542154198', 1),
(53, 'china', 'Proxy Key', '4152251542154199', 1),
(54, 'china', 'Proxy Key', '4152251542154200', 1),
(55, 'china', 'Proxy Key', '4152251542154201', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate_license`
--
ALTER TABLE `certificate_license`
  ADD PRIMARY KEY (`certificate_license_id`);

--
-- Indexes for table `delivered_dsc`
--
ALTER TABLE `delivered_dsc`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `dsc_use`
--
ALTER TABLE `dsc_use`
  ADD PRIMARY KEY (`dsc_use_id`);

--
-- Indexes for table `license_record`
--
ALTER TABLE `license_record`
  ADD PRIMARY KEY (`license_record_id`);

--
-- Indexes for table `no_of_license`
--
ALTER TABLE `no_of_license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockout_form`
--
ALTER TABLE `stockout_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usb_token`
--
ALTER TABLE `usb_token`
  ADD PRIMARY KEY (`usb_token_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate_license`
--
ALTER TABLE `certificate_license`
  MODIFY `certificate_license_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivered_dsc`
--
ALTER TABLE `delivered_dsc`
  MODIFY `delivery_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dsc_use`
--
ALTER TABLE `dsc_use`
  MODIFY `dsc_use_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `license_record`
--
ALTER TABLE `license_record`
  MODIFY `license_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `no_of_license`
--
ALTER TABLE `no_of_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stockout_form`
--
ALTER TABLE `stockout_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usb_token`
--
ALTER TABLE `usb_token`
  MODIFY `usb_token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
