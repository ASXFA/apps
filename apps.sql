-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2020 at 02:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(3) NOT NULL,
  `req_user_id` int(3) NOT NULL,
  `req_surat` int(3) NOT NULL,
  `req_user_to` int(3) NOT NULL,
  `req_message` text NOT NULL,
  `req_specimen` int(3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(3) NOT NULL,
  `role_nama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_nama`) VALUES
(1, 'admin'),
(2, 'verifikator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `se`
--

CREATE TABLE `se` (
  `se_id` int(3) NOT NULL,
  `se_user_id` int(3) NOT NULL,
  `se_tipe` int(3) NOT NULL,
  `se_user_for` varchar(50) NOT NULL,
  `se_filename` varchar(255) NOT NULL,
  `se_status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `se`
--

INSERT INTO `se` (`se_id`, `se_user_id`, `se_tipe`, `se_user_for`, `se_filename`, `se_status`, `created_at`) VALUES
(7, 3, 2, '4', 'UwEBVVdNAVkDGgRjARkFYgARV28KdFBHUUoMRQNUB2IFRgUhURNWAAZMB0NXTgM+WUtSOAQtBVxQUwsYWhkCPFFBWDoFbwRPWQEHa1AzAH5TFQFMV0YBTgMyBEIBFgVjAARXQAoyUFRRWgxjAysHLQUpBShRNVY0', 0, '2020-09-02 03:17:20'),
(9, 3, 2, '4,5', 'AUcANFVEBUFWYFA8AQpQYFRSV1YOdAYXAxsPYFAPDFFXAFNgWR8CUwZPVAABFFFvUEIBe1MyWwsHNQMhCDEMaFBDCUVXJQFPUgoCGQVMBzEBRAA2VWEFX1ZJUCcBM1AaVEZXaQ5jBgwDCA9GUHgMJld7U35ZPQJg', 0, '2020-09-02 13:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `tte`
--

CREATE TABLE `tte` (
  `tte_id` int(3) NOT NULL,
  `tte_user_id` int(3) NOT NULL,
  `tte_filename` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tte`
--

INSERT INTO `tte` (`tte_id`, `tte_user_id`, `tte_filename`, `created_at`) VALUES
(32, 3, 'BGZSPgI_B2kHOQxtWmZaPw--', '2020-09-02 04:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_nik` varchar(16) NOT NULL,
  `user_nip` varchar(18) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` int(3) NOT NULL,
  `user_nama` varchar(225) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pangkat` varchar(255) NOT NULL,
  `user_jabatan` varchar(50) DEFAULT NULL,
  `user_unit_organisasi` varchar(255) NOT NULL,
  `user_organisasi` varchar(255) NOT NULL,
  `user_unit_kerja` varchar(255) NOT NULL,
  `user_kota` varchar(50) NOT NULL,
  `user_provinsi` varchar(50) NOT NULL,
  `user_telepon` varchar(12) NOT NULL,
  `user_ktp` varchar(200) DEFAULT NULL,
  `user_foto` varchar(200) DEFAULT NULL,
  `user_status` int(2) NOT NULL,
  `created_by` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(3) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(3) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_nik`, `user_nip`, `user_password`, `user_role`, `user_nama`, `user_email`, `user_pangkat`, `user_jabatan`, `user_unit_organisasi`, `user_organisasi`, `user_unit_kerja`, `user_kota`, `user_provinsi`, `user_telepon`, `user_ktp`, `user_foto`, `user_status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(3, '1234567890123456', '098765432123456', '$2y$10$.zvgjeA81xwhfDxWh0ZEjO0CI6eppLFrPyZONVXVQNzpL5sr2h9UK', 1, 'Admin', 'admin@example.com', 'test pangkat', 'Test Jabatan', 'TETING UNIT ORG', 'Pemerintah Provinsi Jawa Barat', 'test unit kerja', 'Bandung', 'Jawa Barat', '08765765865', '', '', 0, 3, '2020-08-28 08:40:21', NULL, NULL, NULL, NULL),
(4, '3243212321123121', '098823864927372112', '$2y$10$grB8S201JwOgIRbFeqgfpeJFCiK6uPNnPvMgHcg3rsRDAbh5scJxG', 3, 'TESTING 1', 'test1@example.com', 'test pangkat 1', 'TEST JABATAN', 'TEST ORG', 'Pemerintah Provinsi Jawa Barat', 'test unit kerja 1', 'BANDUNG', 'Jawa Barat', '089726362737', NULL, NULL, 0, 3, '2020-08-28 13:26:59', 3, '2020-09-02 12:44:21', NULL, NULL),
(5, '1234567890987643', '784924827172362173', '$2y$10$rwQMQuhAPj2M.wb8FjKS1O1H4sWBlSaMqyDVlPQw.YHStBapiiIei', 2, 'Testing 2', 'test2@example.com', 'Testing Pangkat 2', 'TEST JABATAN2', 'test unit organisasi', 'Pemerintah Provinsi Jawa Barat', 'test unit kerja', 'Bandung', 'Jawa Barat', '081232454323', NULL, NULL, 0, 3, '2020-09-02 12:41:31', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `se`
--
ALTER TABLE `se`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `tte`
--
ALTER TABLE `tte`
  ADD PRIMARY KEY (`tte_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `se`
--
ALTER TABLE `se`
  MODIFY `se_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tte`
--
ALTER TABLE `tte`
  MODIFY `tte_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
