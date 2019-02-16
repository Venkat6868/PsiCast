-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2019 at 05:39 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rab`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` text NOT NULL,
  `collegeid` varchar(30) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `license` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `collegeid`, `aadhar`, `license`, `status`) VALUES
(1, 'Weber', 'gupta@gmail.com', '$2y$10$8HZYElRpxbF5gDrjwK/GbO/Rp', '9848208168', '160', '145', '', 0),
(4, 'Gupta1', 'weber@weberr.com', '123456', '9123456789', '', '0', '', 0),
(5, '4321', 'temp1@temp.com', '$2y$10$mYf.eT5Nn.Xoj5BP9/FJPu4X7', '9123456780', '', '0', '', 0),
(6, 'Temp2', 'temp2@temp.com', '$2y$10$DRO35syrzc9Dy0GCFRditOUrN', '9848208166', '', '0', '', 0),
(7, 'Weber', 'gupta@gmail.com', '12345', '9440120494', '', '0', '', 0),
(8, 'ABC', 'abc@abc.com', 'weber', '91234455678', '', '0', '', 1),
(10, 'psicast', 'psicast@gmail.com', 'psicast', '9123456788', '', '0', '', 0),
(11, 'psicast', 'psicastofficial@gmail.com', 'psicast', '91234567098', '', '0', '', 0),
(12, 'Weber', 'weber@gmail.com', '12345', '9999999999', '', '0', '', 0),
(13, 'Sainath', 'sainadh@gmail.com', 'sainath@', '9191919191', '', '0', '', 0),
(15, 'Gupta Weber', 'gupta@gupta.com', '0829857d24d596d0ab9363f459abc871', '1234567890', '1234567890', '12345678901', '23456', 0),
(16, 'gupta', 'guptapandiri99@gmail.com', 'gupta', '9123456', '', '', '', 0),
(17, 'gupta', 'guptaa@gmail.com', 'gupta', '123456789', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
