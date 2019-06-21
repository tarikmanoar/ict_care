-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 02:36 PM
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
(1, 'Home', 'index.php'),
(2, 'About', 'about.php'),
(3, 'Courses', 'courses.php'),
(4, 'Our Team', 'team.php'),
(5, 'Teachers', 'teacher.php'),
(6, 'News', 'news.php'),
(7, 'Event', 'events.php'),
(8, 'Contact', 'contact.php');

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
  `course_validate` varchar(55) NOT NULL,
  `course_benefit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`id`, `course_title`, `course_discription`, `course_icon`, `course_image`, `course_fee`, `course_validate`, `course_benefit`) VALUES
(1, 'Graphics Design', 'In the year of 2015 and date of 1st May ICT Care officially started their journey at the heart of the 1st digital city in Bangladesh which is Jessore. ICT Care located DIG Road, Jessore. From the beginning of its journey ICT Care is working hard to achieve the goal of Bangladesh Government to make the country digital in every way. In this continuation ICT Care is providing many kinds of computer courses, selling personal computers,socialIn the year of 2015 and date of 1st May ICT Care officially<br>\"&gt;', 'fa-camera', 'upload/course/course_5d08d4d7c94516.16248155.jpg', 500, '6', 'In the year of 2015 and date of 1st May ICT Care officially started their journey at the heart of the 1st digital city in Bangladesh which is Jessore. ICT Care located DIG Road, Jessore. From the beginning of its journey ICT Care is working hard to achieve the goal of Bangladesh Government to make the country digital in every way. In this continuation ICT Care is providing many kinds of computer courses, selling personal computers,socialIn the year of 2015 and date of 1st May ICT Care officially'),
(2, 'Web Design & Development ', 'In the year of 2015 and date of 1st May ICT Care officially started their journey at the heart of the 1st digital city in Bangladesh which is Jessore. ICT Care located DIG Road, Jessore. From the beginning of its journey ICT Care is working hard to achieve the goal of Bangladesh Government to make the country digital in every way. In this continuation ICT Care is providing many kinds of computer courses, selling personal computers,socialIn the year of 2015 and date of 1st May ICT Care officially<br>\"&gt;', 'fa-code', 'upload/course/course_5d08d477a4adf5.30104515.jpg', 500, '6', 'In the year of 2015 and date of 1st May ICT Care officially started their journey at the heart of the 1st digital city in Bangladesh which is Jessore. ICT Care located DIG Road, Jessore. From the beginning of its journey ICT Care is working hard to achieve the goal of Bangladesh Government to make the country digital in every way. In this continuation ICT Care is providing many kinds of computer courses, selling personal computers,socialIn the year of 2015 and date of 1st May ICT Care officially');

-- --------------------------------------------------------

--
-- Table structure for table `course_item`
--

CREATE TABLE `course_item` (
  `id` int(11) NOT NULL,
  `courseItem` varchar(255) NOT NULL,
  `courseTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_item`
--

INSERT INTO `course_item` (`id`, `courseItem`, `courseTitle`) VALUES
(1, 'HTML%', 'Web Design & Development '),
(2, 'HTML%', 'Web Design & Development '),
(3, 'Photo Shop', 'Graphics Design');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `phone` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `date`, `location`, `phone`, `mail`, `image`) VALUES
(1, 'event title goes here', 'Event Description goes here', '2019-06-03', 'Jashore', 1945609791, 'wecalah@freehotmail.net', 'upload/event/Teacher_5d0ca37b785094.03875523.png'),
(4, 'event title goes here', 'Event Description goes here', '2019-06-03', 'Jashore', 1945609791, 'wecalah@freehotmail.net', 'upload/event/Teacher_5d0c9c0befa353.46267488.png'),
(5, 'event title goes here 3', 'Event Description goes here', '2019-AUG-03', 'Jashore', 1945609791, 'wecalah@freehotmail.net', 'upload/event/Teacher_5d0ca393ecf336.35658419.png');

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`id`, `title`, `details`, `image`) VALUES
(1, 'EXPAND SKILL DEVELOPMENT', 'The Name of my project is ICT', 'upload/goal/allahmdulliah.png'),
(2, 'EXPAND SKILL DEVELOPMENT', 'The Name of my project is ICT', 'upload/goal/angry baby.jpg');

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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newsTitle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newsTitle`) VALUES
(1, 'The Name Of My College is Jashore Polytechnic Institute I Love my campacs'),
(2, 'IN The following SQL statement selects all customers from the ');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `video` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `video`, `image`) VALUES
(4, 'https://www.youtube.com/results?search_query=Lucifer++trailer', 'upload/review/review_5d0b9d1520fc77.99153130.png'),
(5, 'https://www.youtube.com/', 'upload/review/review_5d0b9d24374d36.75314620.gif'),
(6, 'https://www.youtube.com/results?search_query=Lucifer++trailer', 'upload/review/review_5d0c66ee0c88f8.20120716.png');

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
(5, 'This is WOW', 'HELLO', 'This is WOW', 'yes', 'upload/slider/slider_5d0ccb73315097.61432306.jpg'),
(6, 'Ramadan Offer', 'Limited', 'This is <font face=\"comic sans ms\">LIMITED </font><font face=\"arial\">OFFER!</font>', 'yes', 'upload/slider/slider5cdfd2b45bb2b6.51086586.jpg'),
(7, 'EID MUBARAK', 'ICT CARE', 'EID MUBARAK', 'yes', 'upload/slider/slider_5d0ccd006931f4.85282267.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `behance` varchar(255) NOT NULL,
  `dribble` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `position`, `about`, `images`, `facebook`, `twitter`, `linkedin`, `behance`, `dribble`) VALUES
(2, 'Manoar Boss', 'Full Stack Developer', 'This is manoar.I am working in this field for five years.I\'m happy te teach you guys. ', 'upload/teachers/Teacher_5d0a7a7776fc62.01334686.png', 'https://www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com'),
(3, 'Sabbir Rahman', 'Graphics Designer', 'This is sabbir rahman', 'upload/teachers/Teacher_5d0a7aa22163b0.65781831.png', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`id`, `name`, `position`, `facebook`, `twitter`, `image`) VALUES
(1, 'Md.Tarik Manoar', 'CEO', 'https://www.facebook.com/tarikmanoar', 'https://www.twitter.com/tarikmanoar', 'upload/team/Member_5d0a1327d92331.06928997.png'),
(2, 'Manoar', 'CEO', 'https://www.facebook.com/tarikmanoar', 'https://www.twitter.com/tarikmanoar', 'upload/team/Member_5d0a15f5c17b10.90697143.jpg'),
(4, 'Md.Tarik Manoar', 'CEO', 'https://www.facebook.com/tarikmanoar', 'https://www.twitter.com/tarikmanoar', 'upload/team/Member_5d0a1cc8064e58.13928632.png'),
(5, 'Md.Tarik Manoar', 'CEO', 'https://www.facebook.com/tarikmanoar', 'https://www.twitter.com/tarikmanoar', 'upload/team/Member_5d0a3cd878dfa8.18946567.png');

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
-- Indexes for table `course_item`
--
ALTER TABLE `course_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_item`
--
ALTER TABLE `course_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
