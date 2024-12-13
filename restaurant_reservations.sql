-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2024 at 01:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_reservations`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(45) NOT NULL,
  `contactInfo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `contactInfo`) VALUES
(1, 'Baa kofi', 'baakofi@example.com'),
(2, 'Janet Amoaa', 'janetamoaa@example.com'),
(3, 'Alke Johan', 'alkej@example.com'),
(4, 'Bobby Brown', 'bobbybrown@example.com'),
(5, 'Charlie Jakes', 'charlied@example.com'),
(6, 'Yaa Frimpong', 'yaa@gmail.com'),
(7, 'Edmond Agyemang', 'Edmond@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `diningPreferences`
--

CREATE TABLE `diningPreferences` (
  `preferenceId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `favoriteTable` varchar(45) DEFAULT NULL,
  `dietaryRestrictions` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diningPreferences`
--

INSERT INTO `diningPreferences` (`preferenceId`, `customerId`, `favoriteTable`, `dietaryRestrictions`) VALUES
(1, 1, 'Table 5', 'None'),
(2, 2, 'Table 9', 'Gluten-free'),
(3, 3, 'Table 20', 'Vegetarian'),
(4, 4, 'Table 15', 'No dairy'),
(5, 5, 'Table 1', 'Vegan');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `reservationTime` datetime NOT NULL,
  `numberOfGuests` int(11) NOT NULL,
  `specialRequests` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationId`, `customerId`, `reservationTime`, `numberOfGuests`, `specialRequests`) VALUES
(1, 1, '2024-12-10 19:00:00', 2, 'Window seat preferred'),
(2, 2, '2024-12-10 20:00:00', 4, 'Allergic to peanuts'),
(3, 3, '2024-12-10 18:30:00', 3, 'Celebrating anniversary'),
(4, 4, '2024-12-10 19:45:00', 5, 'Need high chair for a toddler'),
(5, 5, '2024-12-10 20:30:00', 2, 'Vegetarian meal options'),
(6, 7, '2024-12-14 11:40:00', 2, 'Jollof rice \r\n, very spicey ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `diningPreferences`
--
ALTER TABLE `diningPreferences`
  ADD PRIMARY KEY (`preferenceId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationId`),
  ADD KEY `customerId` (`customerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diningPreferences`
--
ALTER TABLE `diningPreferences`
  MODIFY `preferenceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diningPreferences`
--
ALTER TABLE `diningPreferences`
  ADD CONSTRAINT `diningpreferences_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
