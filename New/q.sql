-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 يونيو 2023 الساعة 09:28
-- إصدار الخادم: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admine`
--

CREATE TABLE `admine` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `groupID` int(11) NOT NULL DEFAULT 0,
  `pic` varchar(500) NOT NULL,
  `truststatus` int(11) NOT NULL DEFAULT 0,
  `ragstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `admine`
--

INSERT INTO `admine` (`userID`, `username`, `password`, `email`, `fullname`, `groupID`, `pic`, `truststatus`, `ragstatus`) VALUES
(1, 'abc', '601f1889667efaebb33b8c12572835da3f027f78', 'abood@gmail.com', 'Abood', 1, '', 0, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Sex` enum('Male','Female') NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `number_of_voites` int(11) NOT NULL,
  `election_place_id` int(11) DEFAULT NULL,
  `ragstatus` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`userID`, `username`, `Nationality`, `Sex`, `Age`, `number_of_voites`, `election_place_id`, `ragstatus`, `date`) VALUES
(143, 'عبدالعزيز', 'يمني', 'Male', 23, 0, NULL, 1, '2023-06-19'),
(144, 'رهف', 'سوريا', 'Female', 25, 0, NULL, 1, '2023-06-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admine`
--
ALTER TABLE `admine`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admine`
--
ALTER TABLE `admine`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`election_place_id`) REFERENCES `election_place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
