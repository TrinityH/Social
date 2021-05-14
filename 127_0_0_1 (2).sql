-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 05:07 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groupproject`
--
DROP DATABASE IF EXISTS `groupproject`;
CREATE DATABASE IF NOT EXISTS `groupproject` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `groupproject`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `userName` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `userName`, `image`) VALUES
(12, 'milk', 'man', 'aa@aa.aa', '$2y$10$DRXN3CB.PAKU6uUb.KfEFuXL3qgYmMsuVOpsPU2H1qXWUbEMq7J.e', 'milkman', 'default.png'),
(13, 'milk', 'man', 'bb@bb.bb', '$2y$10$v5k/P/yEMgi.8oDLyFs2i./ekuRFl8dvPzgOemUAuwF3N2UKwpf8u', 'agasg', 'default.png'),
(14, 'Dave', 'Chizinal', 'ch@ch.ch', '$2y$10$R21QuOg3ou8OtsM.o2E2F.eaVD8xdoxZlj9OG5v1dfBmkRTmola8K', 'Chizzy', 'default.png'),
(15, 'Van', 'Gerwin', 'mvg@mvg.mvg', '$2y$10$W6f0Zvv8li1GRd1HonRkouDUgzoIfRgxM1SkZ3J1WW6jYL162WLLy', 'MVG', 'default.png'),
(16, 'Iceman', 'Iceman', 'ice@ice.ice', '$2y$10$Kx/iNV35FZAWzKFszEhG.u5xEcF.l50itv6cRlsW9J8x3flNk9llW', 'Iceman', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
