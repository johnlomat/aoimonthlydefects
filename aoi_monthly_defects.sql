-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2019 at 11:44 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aoi_monthly_defects`
--

-- --------------------------------------------------------

--
-- Table structure for table `line_defects`
--

CREATE TABLE `line_defects` (
  `id` int(10) NOT NULL,
  `line` varchar(10) NOT NULL,
  `model` varchar(25) NOT NULL,
  `assy` varchar(20) NOT NULL,
  `side` varchar(20) NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `date_added` varchar(20) NOT NULL,
  `time_stamp` varchar(20) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line_defects`
--

INSERT INTO `line_defects` (`id`, `line`, `model`, `assy`, `side`, `added_by`, `date_added`, `time_stamp`, `image_name`) VALUES
(1, 'Line 1', '700-013536-0400', 'MB', 'CS', 'john lomat', '11-22-2019', '03:35:28 PM', '700-013536-0400 MB CS.png');

-- --------------------------------------------------------

--
-- Table structure for table `model_defects`
--

CREATE TABLE `model_defects` (
  `id` int(10) NOT NULL,
  `line` varchar(10) NOT NULL,
  `model` varchar(50) NOT NULL,
  `location` varchar(10) NOT NULL,
  `defect` varchar(20) NOT NULL,
  `january` varchar(10) NOT NULL,
  `february` varchar(10) NOT NULL,
  `march` varchar(10) NOT NULL,
  `april` varchar(10) NOT NULL,
  `may` varchar(10) NOT NULL,
  `june` varchar(10) NOT NULL,
  `july` varchar(10) NOT NULL,
  `august` varchar(10) NOT NULL,
  `september` varchar(10) NOT NULL,
  `october` varchar(10) NOT NULL,
  `november` varchar(10) NOT NULL,
  `december` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model_defects`
--

INSERT INTO `model_defects` (`id`, `line`, `model`, `location`, `defect`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `year`) VALUES
(1, 'Line 1', '700-013536-0400 MB CS', 'R123', 'COLD SOLDER', '', '', '', '', '', '', '', '', '', '', '', '', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `birthdate`, `gender`, `email`, `password`) VALUES
(1, 'john', 'lomat', '03/15/1995', 'Male', 'johnedwardlomat@artesyn.com', 'cess27'),
(2, 'renz wency', 'dela paz', '11/01/2000', 'Male', 'renzwencydelapaz@artesyn.com', 'Ampogiko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `line_defects`
--
ALTER TABLE `line_defects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_defects`
--
ALTER TABLE `model_defects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `line_defects`
--
ALTER TABLE `line_defects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `model_defects`
--
ALTER TABLE `model_defects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
