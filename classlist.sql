-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 08, 2024 at 10:08 PM
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
-- Table structure for table `new_students`
--

CREATE TABLE `new_students` (
  `id` int(8) NOT NULL,
  `fn` varchar(16) NOT NULL,
  `ln` varchar(16) NOT NULL,
  `photo` varchar(64) DEFAULT NULL,
  `term` int(1) DEFAULT NULL,
  `subject` varchar(16) DEFAULT NULL,
  `memory` varchar(256) DEFAULT NULL,
  `postgrad` varchar(256) DEFAULT NULL,
  `quote` varchar(256) DEFAULT NULL,
  `portfolio` varchar(64) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_students`
--

INSERT INTO `new_students` (`id`, `fn`, `ln`, `photo`, `term`, `subject`, `memory`, `postgrad`, `quote`, `portfolio`, `password`, `email`) VALUES
(1, 'manh', 'ellis', 'cd08920fddb98e53fd065bfd7504c899.jpeg', 4, 'mikescripts', 'nothing', 'job i hope', 'get me out', 'www.manhellis.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com'),
(2, 'john smuth', 'test@bcit.ca', '', 1, 'masdf', 'asdf', 'undefined', 'asdasd', '.com', '$2y$10$s10BRAv5LrkiStIRNlVsGOYmbA.1jL5eBACvhcP8hhMiPGHKignTm', 'test@bcit.ca'),
(3, 'lexi', 'dugo', '57c1844cae8adf0ac29d809a9e370020.gif', 4, 'math', 'boba', 'undefined', 'winning', 'lexidugo.com', '$2y$10$3PQuDBpIHwbFlIksTvRfOuGk3nD37pY84A3BSNNlTCzTgFNmD0erO', 'lexi@bcit.ca'),
(4, 'new', 'me', '', 4, '123', '123123', 'undefined', '12515', 'wwww', '$2y$10$1lfbk5zOSaZtm2HOIPPPdeIyrErQVFtSW2B/nLK04uZpBJOi3fX0.', 'newme@bcit.ca');

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
(1, 'manh', 'ellisTest', NULL, NULL, NULL, NULL, NULL, 'test@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(2, 'john', 'pass1234', '', 'asdf', 'asdf', 'adfasdg', 'adsgasdg', 'john@test.com', '$2y$10$4KYYQypeHQyeyQfDeKfa9uIOI0sJk1J7WLRe25g0mtIYAyHMVbsni'),
(3, 'Alice', 'Smith', '', 'Engineer', 'Dream big', 'Mother', 'Laziness', 'alice@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(4, 'Bob', 'Brown', '', 'Doctor', 'Never give up', 'Father', 'Procrastination', 'bob@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(5, 'Carol', 'Davis', '', 'Artist', 'Create daily', 'Teacher', 'Negativity', 'carol@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(6, 'David', 'Evans', '', 'Writer', 'Write often', 'Friend', 'Dishonesty', 'david@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(7, 'Eve', 'Garcia', '', 'Chef', 'Cook with love', 'Grandmother', 'Messiness', 'eve@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(8, 'Frank', 'Harris', '', 'Musician', 'Play passionately', 'Brother', 'Noise', 'frank@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(9, 'Grace', 'Jones', '', 'Photographer', 'Capture moments', 'Sister', 'Blurred photos', 'grace@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(10, 'Henry', 'Lewis', '', 'Teacher', 'Educate with care', 'Principal', 'Ignorance', 'henry@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(11, 'Ivy', 'Martin', '', 'Designer', 'Design beautifully', 'Colleague', 'Bad design', 'ivy@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa'),
(12, 'Jack', 'Nelson', '', 'Programmer', 'Code smartly', 'Mentor', 'Bugs', 'jack@test.com', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_students`
--
ALTER TABLE `new_students`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `new_students`
--
ALTER TABLE `new_students`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `students_login`
--
ALTER TABLE `students_login`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
