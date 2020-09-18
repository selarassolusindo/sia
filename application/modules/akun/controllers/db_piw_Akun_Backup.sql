-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 11:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_piw`
--

-- --------------------------------------------------------

--
-- Table structure for table `t01_company`
--

CREATE TABLE `t01_company` (
  `idcompany` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `Group_Kode` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t02_akun`
--

CREATE TABLE `t02_akun` (
  `idakun` int(11) NOT NULL,
  `Kode` varchar(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Induk` int(11) NOT NULL,
  `Urut` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t02_akun`
--

INSERT INTO `t02_akun` (`idakun`, `Kode`, `Nama`, `Induk`, `Urut`, `created_at`, `updated_at`) VALUES
(1, '1', 'AKTIVA', 0, '1000000000', '2020-09-16 17:29:34', '2020-09-18 14:32:33'),
(2, '11', 'AKTIVA LANCAR', 1, '1100000000', '2020-09-16 17:31:51', '2020-09-18 14:32:43'),
(3, '1101', 'KAS', 2, '1101000000', '2020-09-16 17:34:59', '2020-09-18 14:32:50'),
(4, '1101001', 'Kas Surabaya (Rek BCA + Tunai)', 3, '1101001000', '2020-09-16 17:36:18', '2020-09-18 14:33:12'),
(5, '1102', 'BANK', 2, '1102000000', '2020-09-16 17:36:54', '2020-09-18 14:33:18'),
(6, '1101002', 'Kas Karetan (Rek BCA + Tunai)', 3, '1101002000', '2020-09-18 14:27:30', '2020-09-18 14:33:24'),
(7, '1101003', 'Kas MiniShop', 3, '1101003000', '2020-09-18 14:53:17', '2020-09-18 14:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `t02_akunl1`
--

CREATE TABLE `t02_akunl1` (
  `id` int(11) NOT NULL,
  `Kode` varchar(1) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t02_akunl1`
--

INSERT INTO `t02_akunl1` (`id`, `Kode`, `Nama`, `created_at`, `updated_at`) VALUES
(1, '1', 'AKTIVA', '2020-09-15 18:59:28', '2020-09-15 18:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `t03_akunl2`
--

CREATE TABLE `t03_akunl2` (
  `id` int(11) NOT NULL,
  `l1_id` int(11) NOT NULL,
  `Kode` varchar(2) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t03_akunl2`
--

INSERT INTO `t03_akunl2` (`id`, `l1_id`, `Kode`, `Nama`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'AKTIVA LANCAR', '2020-09-15 19:02:33', '2020-09-15 19:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `t04_akunl3`
--

CREATE TABLE `t04_akunl3` (
  `id` int(11) NOT NULL,
  `l1_id` int(11) NOT NULL,
  `l2_id` int(11) NOT NULL,
  `Kode` varchar(2) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t04_akunl3`
--

INSERT INTO `t04_akunl3` (`id`, `l1_id`, `l2_id`, `Kode`, `Nama`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '01', 'KAS', '2020-09-15 19:02:58', '2020-09-15 19:02:58'),
(2, 1, 1, '03', 'PIUTANG', '2020-09-15 19:04:40', '2020-09-15 19:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `t05_akunl4`
--

CREATE TABLE `t05_akunl4` (
  `id` int(11) NOT NULL,
  `l1_id` int(11) NOT NULL,
  `l2_id` int(11) NOT NULL,
  `l3_id` int(11) NOT NULL,
  `Kode` varchar(3) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t05_akunl4`
--

INSERT INTO `t05_akunl4` (`id`, `l1_id`, `l2_id`, `l3_id`, `Kode`, `Nama`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '001', 'Kas Surabaya (Rek BCA + Tunai)', '2020-09-15 19:03:36', '2020-09-15 19:03:36'),
(2, 1, 1, 2, '001', 'Piutang Usaha', '2020-09-15 19:05:15', '2020-09-15 19:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `t06_akunl5`
--

CREATE TABLE `t06_akunl5` (
  `id` int(11) NOT NULL,
  `l1_id` int(11) NOT NULL,
  `l2_id` int(11) NOT NULL,
  `l3_id` int(11) NOT NULL,
  `l4_id` int(11) NOT NULL,
  `Kode` varchar(3) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t06_akunl5`
--

INSERT INTO `t06_akunl5` (`id`, `l1_id`, `l2_id`, `l3_id`, `l4_id`, `Kode`, `Nama`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 2, '001', 'Piutang Paket Tamu asing', '2020-09-15 19:05:45', '2020-09-15 19:05:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t01_company`
--
ALTER TABLE `t01_company`
  ADD PRIMARY KEY (`idcompany`);

--
-- Indexes for table `t02_akun`
--
ALTER TABLE `t02_akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indexes for table `t02_akunl1`
--
ALTER TABLE `t02_akunl1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t03_akunl2`
--
ALTER TABLE `t03_akunl2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `l1_id` (`l1_id`);

--
-- Indexes for table `t04_akunl3`
--
ALTER TABLE `t04_akunl3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `l1_id` (`l1_id`),
  ADD KEY `l2_id` (`l2_id`);

--
-- Indexes for table `t05_akunl4`
--
ALTER TABLE `t05_akunl4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t06_akunl5`
--
ALTER TABLE `t06_akunl5`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t01_company`
--
ALTER TABLE `t01_company`
  MODIFY `idcompany` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t02_akun`
--
ALTER TABLE `t02_akun`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t02_akunl1`
--
ALTER TABLE `t02_akunl1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t03_akunl2`
--
ALTER TABLE `t03_akunl2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t04_akunl3`
--
ALTER TABLE `t04_akunl3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t05_akunl4`
--
ALTER TABLE `t05_akunl4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t06_akunl5`
--
ALTER TABLE `t06_akunl5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
