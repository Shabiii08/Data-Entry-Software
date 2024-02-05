-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 01:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suppliersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `suppliers_name` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_specs` varchar(300) NOT NULL,
  `extra_products` varchar(300) NOT NULL,
  `url` varchar(200) NOT NULL,
  `address` varchar(150) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`suppliers_name`, `brand_name`, `email`, `reference_number`, `product_name`, `product_specs`, `extra_products`, `url`, `address`, `Date`, `No`) VALUES
('Tayyab Riaz', 'Tayyab Brand', 'mrtayyabriaz@gmail.com', '12345', 'produce name', 'produce specs', 'ext pro', 'https://mrtayyabriaz.netlify.app', 'Chichawatni', '2024-02-05 11:08:09', 1),
('ali', 's', 'aa@gmail.com', 's', 's', 's', 's', 'https://www.efgh.com/', 's', '2024-02-05 11:41:52', 9),
('Sohaib', 'Sohaib', 'ab@gmail.com', 'Sohaib', 'Sohaib', 's', 's', 'https://www.abcd.com/', 's', '2024-02-05 11:42:32', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
