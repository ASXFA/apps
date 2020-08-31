-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2020 at 08:21 AM
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
(10, 3, 'WjgAbAE9AmxUalc2ADxbPg--.png', '2020-08-30 14:14:06');

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
  `user_jabatan` varchar(50) DEFAULT NULL,
  `user_unit_organisasi` varchar(255) NOT NULL,
  `user_organisasi` varchar(255) NOT NULL,
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

INSERT INTO `users` (`user_id`, `user_nik`, `user_nip`, `user_password`, `user_role`, `user_nama`, `user_email`, `user_jabatan`, `user_unit_organisasi`, `user_organisasi`, `user_kota`, `user_provinsi`, `user_telepon`, `user_ktp`, `user_foto`, `user_status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(3, '1234567890123456', '098765432123456', '$2y$10$.zvgjeA81xwhfDxWh0ZEjO0CI6eppLFrPyZONVXVQNzpL5sr2h9UK', 1, 'Admin', 'admin@example.com', 'TEST JABATANN', 'TETING UNIT ORG', 'Pemerintah Provinsi Jawa Barat', 'Bandung', 'Jawa Barat', '08765765865', '', '', 0, 3, '2020-08-28 08:40:21', NULL, NULL, NULL, NULL),
(4, '3243212321123121', '098823864927372112', '$2y$10$grB8S201JwOgIRbFeqgfpeJFCiK6uPNnPvMgHcg3rsRDAbh5scJxG', 2, 'TESTING 1', 'test1@example.com', 'TEST JABATAN', 'TEST ORG', 'Pemerintah Provinsi Jawa Barat', 'BANDUNG', 'Jawa Barat', '089726362737', NULL, NULL, 0, 3, '2020-08-28 13:26:59', 3, '2020-08-28 19:10:46', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

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
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tte`
--
ALTER TABLE `tte`
  MODIFY `tte_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
