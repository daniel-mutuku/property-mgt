-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 05:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `house_no` int(11) NOT NULL,
  `client_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_no` int(11) NOT NULL,
  `gender` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending, confirmed, checked-out',
  `payment_status` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending or paid\r\n',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `house_no`, `client_name`, `phone`, `id_no`, `gender`, `email`, `status`, `payment_status`, `created_at`) VALUES
(5, 1, 'Daniel Mutuku', '0717576909', 36474358, 'male', 'mike@gmail.com', 'approved', 'paid', '2021-12-10 21:50:52'),
(6, 2, 'Daniel Mutuku', '0721986489', 36474358, 'female', 'mike@gmail.com', 'checked-out', 'paid', '2021-12-10 21:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_payments`
--

CREATE TABLE `bookings_payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `mode` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings_payments`
--

INSERT INTO `bookings_payments` (`id`, `booking_id`, `amount`, `mode`, `created_at`) VALUES
(1, 6, '150000.00', 'cash', '2021-12-10 21:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `caretakers`
--

CREATE TABLE `caretakers` (
  `id` int(11) NOT NULL,
  `house_no` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_no` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `caretakers`
--

INSERT INTO `caretakers` (`id`, `house_no`, `name`, `phone`, `id_no`, `created_at`) VALUES
(9, 1, 'Duncan Omondih', '082343231314', 23433212, '2021-12-09 02:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `damages`
--

CREATE TABLE `damages` (
  `id` int(11) NOT NULL,
  `house_no` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `status` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unrepaired',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `damages`
--

INSERT INTO `damages` (`id`, `house_no`, `description`, `cost`, `status`, `created_at`) VALUES
(1, 2, ' Broken door handles', '1000.00', 'repaired', '2021-12-09 03:05:13'),
(3, 1, 'Simple repainting required', '150000.00', 'unrepaired', '2021-12-10 02:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `img` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `parking_spaces` int(11) NOT NULL,
  `floor_size` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'available' COMMENT 'available or booked',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `serial_no`, `location`, `price`, `bedrooms`, `bathrooms`, `img`, `parking_spaces`, `floor_size`, `status`, `created_at`) VALUES
(1, 'DSGDJa', 'Kahawa Wendani', '2000000.00', 3, 2, 'default.jpg', 2, '30ft x 40ft', 'available', '2021-12-09 02:00:16'),
(2, 'DJSDNSCS', 'Nairobi, Kenya', '150000.00', 4, 2, 'default.jpg', 2, '40ft by 40 ft', 'available', '2021-12-09 02:47:09'),
(3, 'DJSDNSCSwdj', 'Nairobi, Kenya', '150000.00', 2, 1, 'default.jpg', 2, '40ft by 40 ft', 'available', '2021-12-09 02:51:45'),
(5, 'KAHAWA/30', 'KAHAWA', '4500000.00', 4, 3, 'qc5ip1639045736.jpg', 2, '40ft by 40 ft', 'available', '2021-12-09 10:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `location`, `role`, `password`, `created_at`) VALUES
(298413205, 'Dantez', 'admin@gmail.com', 'Nairobi, Kenya', 'Admin', '9e061dc6c341bfb89f01f5bcd11dc99f', '2021-11-30 12:07:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BookingHouse` (`house_no`);

--
-- Indexes for table `bookings_payments`
--
ALTER TABLE `bookings_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BPaymentsBooking` (`booking_id`);

--
-- Indexes for table `caretakers`
--
ALTER TABLE `caretakers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CaretakerHouse` (`house_no`);

--
-- Indexes for table `damages`
--
ALTER TABLE `damages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DamageHouse` (`house_no`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings_payments`
--
ALTER TABLE `bookings_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `caretakers`
--
ALTER TABLE `caretakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `damages`
--
ALTER TABLE `damages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298413210;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `BookingHouse` FOREIGN KEY (`house_no`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings_payments`
--
ALTER TABLE `bookings_payments`
  ADD CONSTRAINT `BPaymentsBooking` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `caretakers`
--
ALTER TABLE `caretakers`
  ADD CONSTRAINT `CaretakerHouse` FOREIGN KEY (`house_no`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `damages`
--
ALTER TABLE `damages`
  ADD CONSTRAINT `DamageHouse` FOREIGN KEY (`house_no`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
