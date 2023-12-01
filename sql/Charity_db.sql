-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 ديسمبر 2023 الساعة 19:50
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resit_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `donation_info`
--

CREATE TABLE `donation_info` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `charity` varchar(255) NOT NULL,
  `donation_type` varchar(255) NOT NULL,
  `specify_type` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `card_expiry` date NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `donation_info`
--

INSERT INTO `donation_info` (`id`, `name`, `email`, `gender`, `address`, `phone_number`, `charity`, `donation_type`, `specify_type`, `amount`, `payment_method`, `card_number`, `card_expiry`, `cvv`) VALUES
(47, 'Begad Hatem Diyab', 'hbegadhatem17@gmail.com', 'male', 'Taj City Compound', '+201026088401', 'Egyptian Food Bank', 'funds', '', '2.00', 'cash', 'CASH-64aaea293d9', '0000-00-00', 0),
(48, 'Begad Hatem Diyab', 'hbegadhatem17@gmail.com', 'male', 'Taj City Compound', '+201026088401', 'Egyptian Food Bank', 'funds', '', '2.00', 'cash', 'CASH-64aaeaaf5b8', '0000-00-00', 0),
(49, 'Begad Hatem Diyab', 'hbegadhatem17@gmail.com', 'male', 'Taj City Compound', '01026088401', 'Children Cancer Hospital 57357', 'other-item', 'clothes', '200.00', 'online', '1234567890', '0000-00-00', 123),
(50, 'Begad Hatem Diyab', 'hbegadhatem17@gmail.com', 'male', 'Taj City Compound', '01026088401', 'Ahl Masr Hospital', 'funds', '', '200.00', 'online', '0987761637123', '2027-11-05', 456),
(51, 'ahmed', 'ahmed@gmail.com', 'male', 'cairo', '12345678900', 'Resala Organization', 'other-item', 'clothes', '123.00', 'online', '0099128132940132', '2028-10-09', 123456);

-- --------------------------------------------------------

--
-- بنية الجدول `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `timestamp`) VALUES
(5, 'Begad', 'Begad@gmail.com', 'I Loved The service', '2023-10-19 13:21:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation_info`
--
ALTER TABLE `donation_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_number` (`card_number`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation_info`
--
ALTER TABLE `donation_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
