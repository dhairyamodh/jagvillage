-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 04:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'info@jagvillage.com', 'fcea920f7412b5da7be0cf42b8c93759');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` text DEFAULT NULL,
  `blog_img` text DEFAULT NULL,
  `blog_desc` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_img`, `blog_desc`) VALUES
(1, 'Welcome', 'IMG_1087 (1).JPG', 'There is something comforting about being with others who â€œget itâ€. Grief comes with its own culture, itâ€™s own language, itâ€™s own unique depth of emotions. To be able to share your story and emotions with those who walk the grief road beside and ahead of you is often helpful with the sense of loneliness that can be so overwhelming at times. Have you ever been on vacation overseas and met someone from your own country or even your hometown? In the midst of unfamiliarity, a conversation about the latest Toronto Raptors trade cuts through the air, or a Roots shirt emblazoned with a maple leaf catches your eye. Suddenly there is a sense of home, that these people understand things about your everyday life. You know that they appreciate how frustrating local traffic is, or recognize the name of the best pizza place in town. In a foreign place, even if you acknowledge it for just a moment, you know there is someone else who is like you. JAG Village is a place to connect with people who have the same shared experience of losing a loved one. Although our individual stories of how we got here may be different, our sense of grief, pain and lost love is all the same. As the dream of JAG Village becomes a reality, we welcome you to our community. We are here to listen, cry, remember, and most of all, to always love.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `category_date`
--

CREATE TABLE `category_date` (
  `cate_id` int(11) NOT NULL,
  `service_token` text NOT NULL,
  `category` text NOT NULL,
  `date` text NOT NULL,
  `need` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_date`
--

INSERT INTO `category_date` (`cate_id`, `service_token`, `category`, `date`, `need`, `time`) VALUES
(1, 'bI7Acflngy', 'Meals', '08/20/2020', '', '10am - 11am'),
(2, 'v4yrwy6dY0', 'Meals', '08/26/2020', '', '10am - 11am'),
(3, 'jCSrTcaOqt', 'Yard Work', '09/19/2020', '', '2pm - 3pm'),
(4, 'jCSrTcaOqt', 'Yard Work', '09/26/2020', '', '2pm - 3pm'),
(5, 'leSQ0c9ARK', 'Meals', '09/24/2020', '', '2pm - 3pm');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` mediumtext NOT NULL,
  `sender_name` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_date` text DEFAULT NULL,
  `event_name` text DEFAULT NULL,
  `event_desc` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_date`, `event_name`, `event_desc`) VALUES
(4, '2020-08-30', 'National Grief Awareness Day', '    We are here for you.');

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
(1, 25, 'aman', 'singhaman1035@gmail.com', '101 Bloomsbury Ave', 'Brampton', 'Ontario', 'L6P2X1', '', '', '', '', '', '', '', '', '', '', '', '', 'bI7Acflngy'),
(2, 25, 'aman', 'singhaman1035@gmail.com', '54', 'Brampton', 'Ontario', 'L6R 1P', '', '', '', '', '', '', '', '', '', '', '', '', 'v4yrwy6dY0'),
(3, 26, 'Hardik', 'hp99742@gmail.com', '191', 'Peterborough', 'ON', 'K9J3M4', '', '', '', '', '', '', '', '', '', '', '', '', 'leSQ0c9ARK');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`) VALUES
(24, 'Jodi', 'Gorham', 'jthompson02@hotmail.com', '6f6197e1542831a414eb9e918011a337'),
(25, 'Gurkirat', 'Kaur', 'gurkiratrandhawa99@gmail.com', '3bfaf27a6762bb858aab162854717b66'),
(26, 'Dhruv', 'Maheshwari', 'dmaheshwari97@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759'),
(27, 'Edward', 'Steel', 'ShrineClown89@gmail.com', '4243c76619f85debf8a31a9c6fdfda12'),
(28, 'Jodi', 'Doucet', 'jmbk68@gmail.com', '75bad407766a6ce07f13a6e56085a9bb'),
(29, 'Fname', 'Lname', 'a@a.com', 'fcea920f7412b5da7be0cf42b8c93759');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `token_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `vol_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `vol_fname` text NOT NULL,
  `vol_lname` text NOT NULL,
  `vol_email` text NOT NULL,
  `meal` text NOT NULL,
  `notes` text NOT NULL,
  `remainder_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`vol_id`, `token`, `cate_id`, `date`, `vol_fname`, `vol_lname`, `vol_email`, `meal`, `notes`, `remainder_email`) VALUES
(1, 'jCSrTcaOqt', 3, '09/19/2020', 'Jodi', 'Gorham', 'jthompson02@hotmail.com', 'Yard Work', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category_date`
--
ALTER TABLE `category_date`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`vol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_date`
--
ALTER TABLE `category_date`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `vol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
