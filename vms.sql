-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 11:44 PM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `vp_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(153, 1, 17, '2024-06-12 21:04:14', '2024-06-12 21:04:14', NULL),
(154, 1, 18, '2024-06-12 21:04:18', '2024-06-12 21:04:18', NULL),
(157, 2, 19, '2024-06-13 20:19:49', '2024-06-13 20:19:49', NULL),
(160, 2, 19, '2024-06-14 10:58:10', '2024-06-14 10:58:10', NULL),
(168, 1, 16, '2024-06-20 18:52:50', '2024-06-20 18:52:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `user_id`) VALUES
(1, 3),
(2, 6),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `name`) VALUES
(1, 'Paris'),
(2, 'New York'),
(3, 'Tokyo'),
(4, 'London'),
(5, 'Rome'),
(6, 'Sydney'),
(7, 'Dubai'),
(8, 'Cairo'),
(9, 'Rio de Janeiro'),
(10, 'Moscow');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_table`
--

CREATE TABLE `inquiry_table` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vp_id` int(11) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `response` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry_table`
--

INSERT INTO `inquiry_table` (`id`, `customer_id`, `vp_id`, `subject`, `message`, `response`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 1, 17, 'Free mai le jao', 'Please Please Please.', 'NHI...', '2024-06-21 14:40:10', '2024-06-21 18:41:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'agency'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `description`) VALUES
(1, 'City Tour'),
(2, 'Airport Transfer'),
(3, 'Hotel Accommodation'),
(4, 'Guided Excursions'),
(5, 'Cruise Package'),
(6, 'Adventure Activities'),
(7, 'Dining Experience'),
(8, 'Shopping Tour'),
(9, 'Cultural Events'),
(10, 'Nightlife Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `travel_agencies`
--

CREATE TABLE `travel_agencies` (
  `travel_agency_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_agencies`
--

INSERT INTO `travel_agencies` (`travel_agency_id`, `user_id`) VALUES
(1, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role_id`, `created_at`, `updated_at`, `deleted_at`, `phone_number`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$Sjkluv41B5ldiL10a3/kzeLbvnJLDIfls9lWFWVxxYA/zCEGvDBQe', 1, '2024-06-11 16:23:25', '2024-06-11 16:23:25', NULL, 0),
(2, 'agency', 'agency@gmail.com', '$2y$10$x0RLFu.G8.pnWxP4wY0zyue5j.YuAKD4dEAHQiFY3wCOr4ZUEh.QK', 2, '2024-06-11 16:35:49', '2024-06-11 16:35:49', NULL, 123123123),
(3, 'user', 'user@gmail.com', '$2y$10$i4oSPW7vzJFleV4NewjPE.7QmlgqUIIn2ej8rIOfLEdkBjNNtG4e6', 3, '2024-06-11 16:36:22', '2024-06-11 16:36:22', NULL, 123123123),
(4, 'agency2', 'agency2@gmail.com', '$2y$10$PHXKAtKNeNoxxV4kJYJXYOuhc48j4tB1bB0u1rWLNBOfgXp0AjwRq', 2, '2024-06-13 20:12:05', '2024-06-13 20:12:05', NULL, 0),
(6, 'user2', 'user2@gmail.com', '$2y$10$U8uykWCHN5Y5thKMJOE38ukKFhtFLPonCdOsC7iBY9TWyJlI8cGs6', 3, '2024-06-13 20:19:31', '2024-06-13 20:19:31', NULL, 123123123),
(7, 'AbdulBari', 'bari@gmail.com', '$2y$10$4LmWgBZcYk1HyEtZiJ1FIujD2hUJ9/5QMERbM.gwnVE7N0nj5aoue', 3, '2024-06-20 14:24:38', '2024-06-20 14:24:38', NULL, 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `vp`
--

CREATE TABLE `vp` (
  `vp_id` int(11) NOT NULL,
  `travel_agency_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `persons` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vp`
--

INSERT INTO `vp` (`vp_id`, `travel_agency_id`, `title`, `description`, `price`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`, `persons`) VALUES
(15, 1, 'Update....', 'Updating Updating Updating UpdatingUpdatingUpdatingUpdating Updating Updating Updating Updating Updating Updating ', 321, '2024-06-22', '2024-06-29', '2024-06-12 11:05:36', '2024-06-21 19:27:27', NULL, 3),
(16, 1, 'Exploring Ancient Rome', 'Discover the wonders of ancient Rome on this historical journey. Visit iconic landmarks such as the Colosseum, Roman Forum, and Vatican City, and indulge in authentic Italian cuisine.', 123, '2024-06-30', '2024-07-10', '2024-06-12 11:08:59', '2024-06-12 11:08:59', NULL, 3),
(17, 1, 'London Sightseeing Experience', 'Immerse yourself in the vibrant culture of London with this sightseeing package. Explore iconic landmarks such as Big Ben, Buckingham Palace, and the Tower of London, and enjoy traditional English afternoon tea.', 123, '2024-06-12', '2024-06-22', '2024-06-12 11:10:19', '2024-06-12 11:10:45', NULL, 4),
(18, 1, 'Trip to Europe', 'Escape to the romantic city of Paris with your loved one. Immerse yourself in the virant culture of London with this sightseeing package.', 123, '2024-06-20', '2024-06-27', '2024-06-12 13:54:34', '2024-06-12 13:54:34', NULL, 2),
(19, 2, 'Family Adventure', 'Experience the epitome of luxury with our exclusive Dubai Escape package. Indulge in a lavish retreat amidst the glittering skyscrapers and pristine beaches of Dubai. This meticulously curated itinerary combines opulent accommodations, private tours of ic', 123, '2024-06-28', '2024-06-22', '2024-06-13 20:18:33', '2024-06-13 20:18:33', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `vp_info`
--

CREATE TABLE `vp_info` (
  `id` int(11) NOT NULL,
  `vp_id` int(11) DEFAULT NULL,
  `services_id` int(11) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vp_info`
--

INSERT INTO `vp_info` (`id`, `vp_id`, `services_id`, `destination_id`) VALUES
(28, 17, 1, 4),
(29, 17, 2, 4),
(30, 17, 3, 4),
(31, 17, 4, 4),
(32, 18, 1, 1),
(33, 18, 1, 4),
(34, 18, 2, 1),
(35, 18, 2, 4),
(36, 18, 3, 1),
(37, 18, 3, 4),
(38, 18, 4, 1),
(39, 18, 4, 4),
(40, 18, 5, 1),
(41, 18, 5, 4),
(42, 18, 6, 1),
(43, 18, 6, 4),
(44, 18, 7, 1),
(45, 18, 7, 4),
(46, 19, 1, 7),
(47, 19, 2, 7),
(48, 19, 3, 7),
(49, 19, 4, 7),
(50, 19, 6, 7),
(51, 19, 7, 7),
(52, NULL, 1, 2),
(53, NULL, 2, 2),
(54, NULL, 3, 2),
(304, 16, 1, 5),
(305, 16, 2, 5),
(306, 16, 3, 5),
(370, 15, 1, 1),
(371, 15, 2, 1),
(372, 15, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vacation_id` (`vp_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`),
  ADD KEY `customers_ibfk_1` (`user_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`),
  ADD UNIQUE KEY `destination_id` (`destination_id`);

--
-- Indexes for table `inquiry_table`
--
ALTER TABLE `inquiry_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `fk_vp_id` (`vp_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_id` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_id` (`service_id`);

--
-- Indexes for table `travel_agencies`
--
ALTER TABLE `travel_agencies`
  ADD PRIMARY KEY (`travel_agency_id`),
  ADD UNIQUE KEY `travel_agency_id` (`travel_agency_id`),
  ADD KEY `travel_agencies_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `users_ibfk_1` (`role_id`);

--
-- Indexes for table `vp`
--
ALTER TABLE `vp`
  ADD PRIMARY KEY (`vp_id`),
  ADD UNIQUE KEY `vp_id` (`vp_id`),
  ADD KEY `vp_ibfk_1` (`travel_agency_id`);

--
-- Indexes for table `vp_info`
--
ALTER TABLE `vp_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `vp_info_ibfk_1` (`vp_id`),
  ADD KEY `vp_info_ibfk_2` (`services_id`),
  ADD KEY `vp_info_ibfk_3` (`destination_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inquiry_table`
--
ALTER TABLE `inquiry_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `travel_agencies`
--
ALTER TABLE `travel_agencies`
  MODIFY `travel_agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vp`
--
ALTER TABLE `vp`
  MODIFY `vp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vp_info`
--
ALTER TABLE `vp_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`vp_id`) REFERENCES `vp` (`vp_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `inquiry_table`
--
ALTER TABLE `inquiry_table`
  ADD CONSTRAINT `fk_vp_id` FOREIGN KEY (`vp_id`) REFERENCES `vp` (`vp_id`),
  ADD CONSTRAINT `inquiry_table_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `travel_agencies`
--
ALTER TABLE `travel_agencies`
  ADD CONSTRAINT `travel_agencies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE;

--
-- Constraints for table `vp`
--
ALTER TABLE `vp`
  ADD CONSTRAINT `vp_ibfk_1` FOREIGN KEY (`travel_agency_id`) REFERENCES `travel_agencies` (`travel_agency_id`) ON DELETE CASCADE;

--
-- Constraints for table `vp_info`
--
ALTER TABLE `vp_info`
  ADD CONSTRAINT `vp_info_ibfk_1` FOREIGN KEY (`vp_id`) REFERENCES `vp` (`vp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vp_info_ibfk_2` FOREIGN KEY (`services_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vp_info_ibfk_3` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
