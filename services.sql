-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 01:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jagvillage`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipent_name` text NOT NULL,
  `recipent_email` text NOT NULL,
  `recipent_address` text NOT NULL,
  `recipent_city` text NOT NULL,
  `recipent_state` text NOT NULL,
  `recipent_postal` text NOT NULL,
  `recipent_phone` text NOT NULL,
  `category` text NOT NULL,
  `needed` text NOT NULL,
  `dates` text NOT NULL,
  `adult_cook` text NOT NULL,
  `kids_cook` text NOT NULL,
  `delivery_time` text NOT NULL,
  `cancer_status` text NOT NULL,
  `instuction` mediumtext NOT NULL,
  `favorite_meals` mediumtext NOT NULL,
  `least_meals` mediumtext NOT NULL,
  `allergies` mediumtext NOT NULL,
  `service_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `user_id`, `recipent_name`, `recipent_email`, `recipent_address`, `recipent_city`, `recipent_state`, `recipent_postal`, `recipent_phone`, `category`, `needed`, `dates`, `adult_cook`, `kids_cook`, `delivery_time`, `cancer_status`, `instuction`, `favorite_meals`, `least_meals`, `allergies`, `service_token`) VALUES
(1, 1, 'fdgdf', 'dfgdfg@gmail.com', 'dsgfdhg', 'dsjfh', 'sdjfh', 'sdjhfj', 'jfdhgj', '', '', '', '', '', '', '', '', '', '', '', 'lVzl7Ild98'),
(2, 1, 'fdgdfg', 'dfgfdg@gmail.com', 'dfg', 'dfg', 'dg', 'dfg', 'dfg', 'Child Support', 'dfgfdg', '06/20/2020,06/25/2020,06/24/2020', '', '', '9pm - 10pm', '', '', '', '', 'dfg', 'Df2k9RarIR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
