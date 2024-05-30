-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2024 at 08:32 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(8) NOT NULL,
  `fn` varchar(16) NOT NULL,
  `ln` varchar(16) NOT NULL,
  `photo` varchar(64) DEFAULT NULL,
  `job` varchar(32) NOT NULL,
  `words` varchar(256) NOT NULL,
  `inspire` varchar(256) NOT NULL,
  `dislike` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fn`, `ln`, `photo`, `job`, `words`, `inspire`, `dislike`) VALUES
(23, 'Manh', 'Ellis', 'cd08920fddb98e53fd065bfd7504c899.jpeg', 'Web Developer', 'I like rock climbing and not working!! My goal in life is to eat and breathe.', 'The next sunset', 'school'),
(26, 'asgewaew', 'asdaw', '3a9a6cd22ab4eac8bfcee15f065bd272.png', 'asdsa', '2345234523462346', 'adad', 'asd'),
(27, 'erageargreg', 'earbherhbre', '', 'erbreb', 'rebre', 'aergergrre', 'erbreb');

-- --------------------------------------------------------

--
-- Table structure for table `students_login`
--

CREATE TABLE `students_login` (
  `id` int(8) NOT NULL,
  `fn` varchar(16) NOT NULL,
  `ln` varchar(16) NOT NULL,
  `photo` varchar(64) DEFAULT NULL,
  `job` varchar(64) DEFAULT NULL,
  `words` varchar(256) DEFAULT NULL,
  `inspire` varchar(256) DEFAULT NULL,
  `dislike` varchar(256) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_login`
--

INSERT INTO `students_login` (`id`, `fn`, `ln`, `photo`, `job`, `words`, `inspire`, `dislike`, `email`, `password`) VALUES
(1, 'manh', 'ellisTest', NULL, NULL, NULL, NULL, NULL, 'test@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_login`
--
ALTER TABLE `students_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `students_login`
--
ALTER TABLE `students_login`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
