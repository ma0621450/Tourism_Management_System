-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 08:44 PM
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
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `travel_agencies`
--

CREATE TABLE `travel_agencies` (
  `travel_agency_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `agency_name` varchar(255) NOT NULL,
  `agency_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_agencies`
--

INSERT INTO `travel_agencies` (`travel_agency_id`, `user_id`, `agency_name`, `agency_desc`) VALUES
(1, 2, '', ''),
(2, 4, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `travel_agencies`
--
ALTER TABLE `travel_agencies`
  ADD PRIMARY KEY (`travel_agency_id`),
  ADD UNIQUE KEY `travel_agency_id` (`travel_agency_id`),
  ADD KEY `travel_agencies_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `travel_agencies`
--
ALTER TABLE `travel_agencies`
  MODIFY `travel_agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `travel_agencies`
--
ALTER TABLE `travel_agencies`
  ADD CONSTRAINT `travel_agencies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
