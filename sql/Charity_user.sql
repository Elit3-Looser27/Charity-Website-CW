-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 ديسمبر 2023 الساعة 19:53
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
-- Database: `resit_user`
--

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Begad', 'Begad@gmail.com', '$2y$10$T8E7tnXNDDr1gw/nVUEvOeaWd0v97Qq.kQJzYWboYg9bGdS/MH0s2'),
(11, 'Amal', 'Amal@gmail.com', '$2y$10$1UTwRKQ3xnD9qiFZuVCrauqbIP0dZvKnklV9LJm/V2JorejrTaQ/e'),
(12, 'Ali', 'ali@gmail.com', '$2y$10$Um6bSztLiqldbqBf7G5YhuErxadLaBuHvKQAjwZKMWv.OMaqsjRu6'),
(13, 'ahmed', 'ahmed@gmail.com', '$2y$10$ysKyoYt6hC2gzBdzBIIHWumr0BbJevcFuuhYEX6Hw7Zd8HJ9hvyzK'),
(14, 'Anass', 'Admin-1@gmail.com', '$2y$10$g.DUBC33/8b6XeKaHoHtYelhvwA4plHy74L2NxtCa2dDZz3UlVM3C'),
(16, 'Kenzy', 'Admin-2@gmail.com', '$2y$10$UHko0b5diBpUmCmOytcf6ub1X6i5YsFWYlETeXt0n4o.2XIB28Y5K'),
(17, 'Fady', 'Admin-3@gmail.com', '$2y$10$aaPkSowmrJ9xpnN53oMwn.Mp/t2jpALEXI.toA4UWBwVuZ7JHs3cO'),
(18, 'Jana', 'Jana-Emp-1@gmail.com', '$2y$10$2Vu7SwASq7MK0GAyNd98quQML4ZE1jafCKV3mwkR.qHRwnMYSIxHm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
