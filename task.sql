-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2018 at 09:29 PM
-- Server version: 5.7.20-log
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `s_table`
--

CREATE TABLE `s_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `senid` int(20) NOT NULL,
  `u_id` int(10) NOT NULL,
  `correct` int(5) NOT NULL,
  `incorrect` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `s_table`
--

INSERT INTO `s_table` (`id`, `senid`, `u_id`, `correct`, `incorrect`) VALUES
(1, 1, 1, 18, 1),
(2, 2, 1, 18, 10),
(3, 3, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_table`
--

CREATE TABLE `t_table` (
  `id` int(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `words` varchar(50) NOT NULL,
  `quiz` varchar(50) NOT NULL DEFAULT 'option'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_table`
--

INSERT INTO `t_table` (`id`, `content`, `words`, `quiz`) VALUES
(1, 'hello, I want to ask you out', '7', 'out'),
(2, 'I like reading more than Diane', '6', 'like'),
(3, ' I like reading more than Diane does', '8', 'reading'),
(4, 'I like reading books more than Diane likes reading books', '10', 'Diane');

-- --------------------------------------------------------

--
-- Table structure for table `u_table`
--

CREATE TABLE `u_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(32) NOT NULL,
  `u_type` enum('user','admin','owner','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='user table';

--
-- Dumping data for table `u_table`
--

INSERT INTO `u_table` (`id`, `u_name`, `u_email`, `u_password`, `u_type`) VALUES
(1, 'admin', 'admin@task.lc', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
(2, 'user', 'user@task.lc', 'c4ca4238a0b923820dcc509a6f75849b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `s_table`
--
ALTER TABLE `s_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_table`
--
ALTER TABLE `t_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u_table`
--
ALTER TABLE `u_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_name` (`u_name`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `s_table`
--
ALTER TABLE `s_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_table`
--
ALTER TABLE `t_table`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `u_table`
--
ALTER TABLE `u_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
