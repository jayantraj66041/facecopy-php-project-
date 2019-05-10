-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 01:17 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facecopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL,
  `user` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `edu` varchar(200) DEFAULT NULL,
  `work` varchar(200) DEFAULT NULL,
  `hometown` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `pin` varchar(200) DEFAULT NULL,
  `img` varchar(200) NOT NULL DEFAULT 'nobody_m.original.jpg',
  `c_img` varchar(200) NOT NULL DEFAULT 'default_cover.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `user`, `address`, `edu`, `work`, `hometown`, `state`, `city`, `pin`, `img`, `c_img`) VALUES
(1, 'rajeev.rock', 'Shastri Nagar, Sipahi Tola', 'BCA', 'I am still studying...', 'Purnea', 'Bihar', 'Purnea', '854301', 'jayantwhatsapp.jpg', 'ravi bhaiya.png'),
(3, '007jayantraj@gmail.com', 'Purnea', '12 th', 'Study', 'Purnea', 'Jharkhand', 'Purnea', '854301', 'New Doc 2018-05-17_1.jpg', 'abstract-business-code-270348.jpg'),
(4, 'harshraj@gmail.com', 'Purneaddd', '', 'Studying...', '', '', 'Patna', '854311', '34700735_2200341323518564_3807741962514071552_n.jpg', 'achievement-agreement-arms-1068523.jpg'),
(5, 'bijay@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nobody_m.original.jpg', 'default_cover.jpg'),
(6, 'avinash.anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nobody_m.original.jpg', 'default_cover.jpg'),
(7, 'ashish.kumar', 'gulabbagh', 'BCA', 'Studying...', 'Purnea', 'Bihar', 'Purnea', '854301', 'LEGO-The-Movie-Minifigure-Dr.-McScrubs-Male-Doctor-Hospital-Surgeon-Nurse-0.jpg', 'blur-branches-daylight-355296.jpg'),
(8, 'abhishek.kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nobody_m.original.jpg', 'default_cover.jpg'),
(9, 'shukanya.kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nobody_m.original.jpg', 'default_cover.jpg'),
(10, 'suraj.kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nobody_m.original.jpg', 'default_cover.jpg'),
(11, 'manoj.kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nobody_m.original.jpg', 'default_cover.jpg'),
(12, 'rajputashish9162@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nobody_m.original.jpg', 'default_cover.jpg'),
(13, 'aman.ujjwal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nobody_m.original.jpg', 'default_cover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `contact1` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gender` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fname`, `lname`, `contact1`, `email`, `password`, `dob`, `doc`, `gender`) VALUES
(1, 'Jayant', 'Raj', '9060201899', '007jayantraj@gmail.com', 'jayant', '2000-04-02', '2018-11-21 03:53:49', 'Male'),
(2, 'Harsh', 'Raj', '7322866041', 'harshraj@gmail.com', 'harsh', '2003-03-30', '2018-11-21 05:51:25', 'Male'),
(3, 'Bijay', 'Kumar', '9534413758', 'bijay@hotmail.com', 'bijay', '1967-07-01', '2018-11-21 11:45:10', 'Male'),
(4, 'Rajeev ', 'Kumar', '4464161', 'rajeev.rock', 'rajeev', '2000-04-02', '2018-11-23 18:10:27', 'Female'),
(5, 'Avinash', 'Anand', '4623956230', 'avinash.anand', 'avinash', '2332-03-12', '2018-11-24 09:34:42', 'Male'),
(6, 'Ashish', 'Kumar', '5445565645', 'ashish.kumar', 'ashish', '1997-10-16', '2018-11-29 04:09:23', 'Male'),
(7, 'Abhishek', 'Kumar', '415412115', 'abhishek.kumar', 'abhishek', '1989-11-12', '2018-12-03 11:31:48', 'Male'),
(8, 'Shukanya', 'Kumari', '4512520', 'shukanya.kumari', 'shukanya', '41121-12-06', '2018-12-04 04:35:32', 'Female'),
(9, 'Suraj', 'Kumar', '8877788724', 'suraj.kumar', 'suraj', '2000-04-15', '2019-01-16 05:43:32', 'Male'),
(10, 'Manoj', 'Kumar', '56567646', 'manoj.kumar', 'manoj', '2232-03-23', '2019-01-16 11:32:54', 'Male'),
(11, 'Ashish', 'Rajput', '7690973704', 'rajputashish9162@gmail.com', '770796848988', '2001-12-02', '2019-01-27 12:06:46', 'Male'),
(12, 'Aman', 'Ujjwal', '5454475454', 'aman.ujjwal', 'aman', '2000-04-02', '2019-02-08 07:16:23', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(200) NOT NULL,
  `c_p_id` varchar(200) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `c_doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `c_title`, `c_p_id`, `c_email`, `c_doc`) VALUES
(1, 'Doctor', '6', 'harshraj@gmail.com', '2018-11-24 16:52:58'),
(2, 'wowow', '7', 'harshraj@gmail.com', '2018-11-24 16:58:20'),
(3, 'djfsjf', '7', 'harshraj@gmail.com', '2018-11-24 16:59:13'),
(4, 'Wow bro.... Hero lg rha hai', '4', 'harshraj@gmail.com', '2018-11-24 17:06:12'),
(5, 'Eeee ka', '', 'harshraj@gmail.com', '2018-11-24 17:14:57'),
(6, 'eee ka', '', 'harshraj@gmail.com', '2018-11-24 17:15:28'),
(7, 'wowow', '', 'harshraj@gmail.com', '2018-11-24 17:16:45'),
(8, 'wowo my feb', '2', 'harshraj@gmail.com', '2018-11-24 17:18:28'),
(9, 'aree ree eree ree', '7', '007jayantraj@gmail.com', '2018-11-24 17:21:58'),
(10, 'Aree wahh', '2', '007jayantraj@gmail.com', '2018-11-24 17:34:38'),
(11, 'jayant', '7', '007jayantraj@gmail.com', '2018-11-24 17:38:54'),
(12, 'harsh', '7', '007jayantraj@gmail.com', '2018-11-24 17:43:30'),
(13, 'wow', '5', '007jayantraj@gmail.com', '2018-11-24 17:44:48'),
(14, 'hero', '1', '007jayantraj@gmail.com', '2018-11-24 17:45:29'),
(15, 'shubham', '3', '007jayantraj@gmail.com', '2018-11-25 09:29:56'),
(16, 'hattt', '7', '007jayantraj@gmail.com', '2018-11-26 04:42:26'),
(17, 'waaaaaaah', '7', '007jayantraj@gmail.com', '2018-11-26 04:43:16'),
(18, 'Aree hero', '4', 'bijay@hotmail.com', '2018-11-26 10:36:25'),
(19, 'waaah', '5', 'bijay@hotmail.com', '2018-11-27 06:47:15'),
(20, 'waaaah', '6', 'bijay@hotmail.com', '2018-11-27 06:49:23'),
(21, 'hero lg rha hai', '4', 'ashish.kumar', '2018-11-29 04:12:17'),
(22, 'wowo', '8', 'abhishek.kumar', '2018-12-03 11:32:24'),
(23, 'wow tasty', '8', 'shukanya.kumari', '2018-12-04 14:06:04'),
(24, 'wow', '8', 'shukanya.kumari', '2018-12-04 14:10:11'),
(25, 'fantastic', '8', 'shukanya.kumari', '2018-12-04 14:14:46'),
(26, 'wow', '8', 'shukanya.kumari', '2018-12-04 14:15:47'),
(27, 'ek no', '5', 'abhishek.kumar', '2018-12-12 11:15:01'),
(28, 'waaah', '3', 'abhishek.kumar', '2018-12-12 11:19:11'),
(29, 'woooow', '7', 'abhishek.kumar', '2018-12-12 11:35:24'),
(30, 'wooow', '5', 'abhishek.kumar', '2018-12-12 11:35:46'),
(31, 'ek no', '7', 'abhishek.kumar', '2018-12-12 12:01:15'),
(32, 'wow', '7', 'abhishek.kumar', '2018-12-12 12:01:20'),
(33, 'hero mera bhai', '4', 'abhishek.kumar', '2018-12-12 12:01:47'),
(34, 'wow', '6', 'manoj.kumar', '2019-01-16 11:33:59'),
(35, 'wow', '8', 'rajputashish9162@gmail.com', '2019-01-27 12:32:45'),
(36, 'haker', '8', '1', '2019-01-28 10:47:46'),
(37, 'aree wahhh', '7', 'aman.ujjwal', '2019-02-08 07:17:22'),
(38, 'fjdsfk', '9', '007jayantraj@gmail.com', '2019-02-28 08:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `messege`
--

CREATE TABLE IF NOT EXISTS `messege` (
  `m_id` int(11) NOT NULL,
  `m_to` varchar(200) NOT NULL,
  `m_from` varchar(200) NOT NULL,
  `m_msg` varchar(250) NOT NULL,
  `m_doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messege`
--

INSERT INTO `messege` (`m_id`, `m_to`, `m_from`, `m_msg`, `m_doc`) VALUES
(12, 'abhishek.kumar', '007jayantraj@gmail.com', 'Hii', '2018-12-12 13:17:32'),
(13, '007jayantraj@gmail.com', 'abhishek.kumar', 'Hii..', '2018-12-12 13:17:45'),
(14, '007jayantraj@gmail.com', 'abhishek.kumar', 'Kaisa hai??', '2018-12-12 13:17:53'),
(15, 'abhishek.kumar', '007jayantraj@gmail.com', 'Thik hai', '2018-12-12 13:21:01'),
(16, '007jayantraj@gmail.com', 'abhishek.kumar', 'Abcd', '2018-12-12 13:26:37'),
(17, 'abhishek.kumar', '007jayantraj@gmail.com', 'jdfskj', '2018-12-12 13:28:41'),
(18, 'abhishek.kumar', '007jayantraj@gmail.com', 'fdjsjf', '2018-12-12 13:29:58'),
(19, 'rajeev.rock', '007jayantraj@gmail.com', 'hiii', '2018-12-13 06:44:31'),
(20, '007jayantraj@gmail.com', 'bijay@hotmail.com', 'hii', '2018-12-13 06:45:20'),
(21, 'bijay@hotmail.com', 'manoj.kumar', 'hi', '2019-01-16 11:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(200) NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_user` varchar(200) NOT NULL,
  `p_email` varchar(200) NOT NULL,
  `p_doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `p_title`, `p_img`, `p_user`, `p_email`, `p_doc`) VALUES
(1, 'â˜ºâ˜ºâ˜º', 'jayantwhatsapp.jpg', '', 'harshraj@gmail.com', '0000-00-00 00:00:00'),
(2, 'Tom and Jerrey', '42269264_541462799647791_1187721429878046720_n.jpg', '', 'harshraj@gmail.com', '0000-00-00 00:00:00'),
(3, 'Cartoon', 'cartoon-doctor-man-and-women-3d-model-animated-rigged-max-fbx-c4d-ma-mb.jpg', '', '007jayantraj@gmail.com', '0000-00-00 00:00:00'),
(4, '#Hero', '24296435_154170115202757_5051444436518426277_n.jpg', '', '007jayantraj@gmail.com', '0000-00-00 00:00:00'),
(5, 'wowowoow', 'download (2).jpg', '', '007jayantraj@gmail.com', '0000-00-00 00:00:00'),
(6, 'doctor', 'LEGO-The-Movie-Minifigure-Dr.-McScrubs-Male-Doctor-Hospital-Surgeon-Nurse-0.jpg', '', 'harshraj@gmail.com', '0000-00-00 00:00:00'),
(7, 'yoo', 'download.jpg', '', 'bijay@hotmail.com', '2018-11-22 05:31:37'),
(8, 'WOwwoow', 'beef-bowl-cooking-262897.jpg', '', 'ashish.kumar', '2018-11-29 04:11:35'),
(9, 'wahhh\r\n', 'abstract-business-code-270348.jpg', '', 'aman.ujjwal', '2019-02-08 07:18:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `messege`
--
ALTER TABLE `messege`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `messege`
--
ALTER TABLE `messege`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
