-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 12:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ictcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `page_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `page_link`) VALUES
(1, 'HOME', 'index.php'),
(2, 'About', 'about.php'),
(3, 'Courses', 'courses.php'),
(4, 'Our Team', 'team.php'),
(5, 'Teachers', 'teacher.php'),
(6, 'News', 'news.php'),
(7, 'Events', 'events.php'),
(8, 'Contacts', 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `position` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `about`, `position`) VALUES
(1, 'Tarik Manoar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis dolorum,.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque p', 'client'),
(2, 'Tarik Manoar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis dolorum,.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque p', 'sponcer'),
(3, 'Shouviqur Rahman', 'This is demo text!', 'sponcer'),
(4, 'Shouviqur Rahman', 'This is demo text!', 'client'),
(5, 'Shouviqur Rahman', 'This is demo text!', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_discription` text NOT NULL,
  `course_icon` text NOT NULL,
  `course_image` text NOT NULL,
  `course_fee` int(11) NOT NULL,
  `course_validate` date NOT NULL,
  `course_item` varchar(255) NOT NULL,
  `course_benefit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `history_title` varchar(255) NOT NULL,
  `history_dis` text NOT NULL,
  `tube_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `history_title`, `history_dis`, `tube_link`) VALUES
(1, 'History', 'In the year of 2015 and date of 1st May ICT Care officially started their journey at the heart of the 1st digital city in Bangladesh which is Jessore. ICT Care located DIG Road, Jessore. From the beginning of its journey ICT Care is working hard to achieve the goal of Bangladesh Government to make the country digital in every way. In this continuation ICT Care is providing many kinds of computer courses, selling personal computers,socialIn the year of 2015 and date of 1st May ICT Care officially started their journey at the heart of the 1st digital city in Bangladesh which is Jessore. ICT Care is located at DIG Road, Jessore. From the beginning of its journey ICT Care is working hard to achieve the goal of Bangladesh Government to make the country digital in every way. In this continuation ICT Care is providing many kinds of computer courses,', 'https://www.youtube.com/watch?v=rImGpaxsRrM');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_typer` text NOT NULL,
  `slider_dis` text NOT NULL,
  `slider_show` varchar(255) NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_title`, `slider_typer`, `slider_dis`, `slider_show`, `slider_image`) VALUES
(5, 'This is WOW', 'HELLO', '<font face=\"comic sans ms\"><b>THIS IS AWESOME !</b></font>', 'yes', 'upload/slider/slider5cdbe7446915e0.38019173.jpg'),
(6, 'Ramadan Offer', 'Limited', 'This is <font face=\"comic sans ms\">LIMITED </font><font face=\"arial\">OFFER!</font>', 'yes', 'upload/slider/slider5cdfd2b45bb2b6.51086586.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `image`) VALUES
(1, 'admin', 'support@ictcare.com.bd', 'ictcare15', 'Shouvikur', 'Rahman', 'https://www.logolynx.com/images/logolynx/23/23938578fb8d88c02bc59906d12230f3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
