-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 06:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moodster`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultant`
--

CREATE TABLE `consultant` (
  `id_consultant` int(11) NOT NULL,
  `image` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultant`
--

INSERT INTO `consultant` (`id_consultant`, `image`, `name`, `profession`, `status`) VALUES
(1, '1.jpg', 'Dr. Jill Valentine, M.Psi', 'Psychologist', 'Online'),
(2, '2.jpg', 'Dr. Claire Redfield, Sp.KJ', 'Psychiatrist', 'Online'),
(3, '3.jpg', 'Dr. Ada Wong, S.Kom., M.Pd., Kons', 'Counselor', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `diaries`
--

CREATE TABLE `diaries` (
  `id_diary` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `diary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diaries`
--

INSERT INTO `diaries` (`id_diary`, `id_user`, `date`, `diary`) VALUES
(10, 1, '0000-00-00', 'hawewo'),
(11, 1, '0000-00-00', 'test123'),
(12, 1, '0000-00-00', 'asdf'),
(13, 1, '0000-00-00', 'asdfgghjkl'),
(14, 1, '0000-00-00', 'asfbsdfv'),
(15, 1, '0000-00-00', 'asfbsdfv'),
(16, 1, '0000-00-00', 'asfbsdfv'),
(17, 1, '0000-00-00', 'asfbsdfv'),
(18, 1, '0000-00-00', 'asfbsdfv'),
(19, 1, '0000-00-00', 'asfbsdfv'),
(20, 1, '0000-00-00', 'asfbsdfv'),
(21, 1, '0000-00-00', 'asdgvasdv'),
(22, 1, '0000-00-00', 'asdgvasdv'),
(23, 1, '0000-00-00', 'asdgvasdv'),
(24, 1, '0000-00-00', 'asdgvasdv'),
(25, 1, '0000-00-00', 'asdgvasdv'),
(26, 1, '0000-00-00', 'asdgvasdv'),
(27, 1, '0000-00-00', 'asdgvasdv'),
(28, 1, '0000-00-00', 'asdgvasdv');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`) VALUES
(1, 'imron', 'imron123@gmail.com', '$2y$10$BhljpXUR3im7.b85MWTk..z8dYTylnqRmbDuyUe0aL9GiDbK/Snn6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultant`
--
ALTER TABLE `consultant`
  ADD PRIMARY KEY (`id_consultant`);

--
-- Indexes for table `diaries`
--
ALTER TABLE `diaries`
  ADD PRIMARY KEY (`id_diary`),
  ADD KEY `diaries_ibfk_1` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultant`
--
ALTER TABLE `consultant`
  MODIFY `id_consultant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diaries`
--
ALTER TABLE `diaries`
  MODIFY `id_diary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diaries`
--
ALTER TABLE `diaries`
  ADD CONSTRAINT `diaries_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
