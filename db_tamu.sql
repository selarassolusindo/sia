-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 05:22 AM
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
-- Database: `db_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `t01_package`
--

CREATE TABLE `t01_package` (
  `idprice` int(11) NOT NULL,
  `PackageName` varchar(50) NOT NULL,
  `PackageCode` varchar(10) NOT NULL,
  `SN3LN` double NOT NULL DEFAULT 0,
  `SN6LN` double NOT NULL DEFAULT 0,
  `SNELN` double NOT NULL DEFAULT 0,
  `PN1LN` double NOT NULL DEFAULT 0,
  `PN1DN` double NOT NULL DEFAULT 0,
  `SN3C` double NOT NULL DEFAULT 0,
  `SN3CP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `SN6C` double NOT NULL DEFAULT 0,
  `SN6CP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `SNEC` double NOT NULL DEFAULT 0,
  `SNECP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `PN3C` double NOT NULL DEFAULT 0,
  `PN3CP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `PN6C` double NOT NULL DEFAULT 0,
  `PN6CP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `PNEC` double NOT NULL DEFAULT 0,
  `PNECP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t01_package`
--

INSERT INTO `t01_package` (`idprice`, `PackageName`, `PackageCode`, `SN3LN`, `SN6LN`, `SNELN`, `PN1LN`, `PN1DN`, `SN3C`, `SN3CP`, `SN6C`, `SN6CP`, `SNEC`, `SNECP`, `PN3C`, `PN3CP`, `PN6C`, `PN6CP`, `PNEC`, `PNECP`, `created_at`, `updated_at`) VALUES
(1, 'STANDARD', 'STD', 625.51, 750, 100, 80, 450000, 385.51, '0.62', 270, '0.36', 20, '0.20', 240, '0.38', 480, '0.64', 80, '0.80', '2020-09-19 13:05:59', '2020-09-21 19:57:00'),
(2, 'DELUXE', 'DEL', 725.03, 930, 166, 95, 550000, 440.03, '0.61', 360, '0.39', 71, '0.43', 285, '0.39', 570, '0.61', 95, '0.57', '2020-09-19 13:22:52', '2020-09-21 16:26:25'),
(3, 'SUPERIOR', 'SUP', 800, 1020, 133, 100, 650000, 500, '0.63', 420, '0.41', 33, '0.25', 300, '0.38', 600, '0.59', 100, '0.75', '2020-09-19 13:23:24', '2020-09-21 13:41:59'),
(4, 'VIP', 'VIP', 850, 1080, 150, 105, 750000, 535, '0.63', 450, '0.42', 45, '0.30', 315, '0.37', 630, '0.58', 105, '0.70', '2020-09-19 13:27:10', '2020-09-19 15:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `t02_tamu`
--

CREATE TABLE `t02_tamu` (
  `idtamu` int(11) NOT NULL,
  `TripNo` varchar(10) NOT NULL,
  `TripTgl` date NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `MFC` varchar(1) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `PackageNight` varchar(5) NOT NULL,
  `PackageType` varchar(3) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Agent` varchar(50) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `DaysStay` tinyint(4) NOT NULL,
  `Price` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t02_tamu`
--

INSERT INTO `t02_tamu` (`idtamu`, `TripNo`, `TripTgl`, `Nama`, `MFC`, `Country`, `PackageNight`, `PackageType`, `CheckIn`, `CheckOut`, `Agent`, `Status`, `DaysStay`, `Price`, `created_at`, `updated_at`) VALUES
(1, 'T-38', '1970-01-01', 'Anthony Paris', 'M', 'OZ', '6N', 'SUP', '1970-01-01', '1970-01-01', 'WS', '1', 6, 14076000, '2020-10-08 12:36:50', '2020-10-08 12:36:50'),
(2, 'T-38', '1970-01-01', 'Anthony Paris', 'M', 'OZ', '6N', 'SUP', '1970-01-01', '1970-01-01', 'WS', '1', 6, 14076000, '2020-10-08 12:37:55', '2020-10-08 12:37:55'),
(3, 'T-39', '1970-01-01', 'Anthony Paris X', 'M', 'OZ', '6N', 'SUP', '1970-01-01', '1970-01-01', 'WS', '1', 6, 14076000, '2020-10-08 12:37:55', '2020-10-08 12:37:55'),
(4, 'T-38', '2019-07-17', 'Anthony Paris', 'M', 'OZ', '6N', 'SUP', '2019-07-19', '2019-07-25', 'WS', '1', 6, 14076000, '2020-10-08 13:23:29', '2020-10-08 13:23:29'),
(5, 'T-38', '2019-12-02', 'Anthony Paris', 'M', 'OZ', '6N', 'SUP', '2019-07-19', '2019-07-25', 'WS', '1', 6, 14076000, '2020-10-08 13:49:45', '2020-10-08 13:49:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t01_package`
--
ALTER TABLE `t01_package`
  ADD PRIMARY KEY (`idprice`);

--
-- Indexes for table `t02_tamu`
--
ALTER TABLE `t02_tamu`
  ADD PRIMARY KEY (`idtamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t01_package`
--
ALTER TABLE `t01_package`
  MODIFY `idprice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t02_tamu`
--
ALTER TABLE `t02_tamu`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
