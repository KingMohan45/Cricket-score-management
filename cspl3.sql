-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2021 at 08:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cspl3`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image` varchar(70) NOT NULL,
  `season` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image`, `season`) VALUES
('IMG_20190904_181414.jpg', 3),
('IMG_20190904_181416.jpg', 3),
('IMG_20200224_165601.jpg', 3),
('IMG_20190904_181521.jpg', 3),
('IMG_20200223_171259.jpg', 3),
('2.jpg', 2),
('3.jpg', 2),
('20d3070b31eb9682f672b9a66ed721bd.jpeg', 3),
('sachin_1.jpg', 3),
('VIRAT-KOHLI-13-1024x512.jpg', 3),
('index1.jpeg', 3),
('index.jpeg', 3),
('index3.jpeg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `t1` varchar(30) NOT NULL,
  `t2` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `t1s` varchar(8) NOT NULL DEFAULT '0,0',
  `t2s` varchar(8) NOT NULL DEFAULT '0,0',
  `changed` varchar(2) NOT NULL DEFAULT '0',
  `t1e` int(11) NOT NULL DEFAULT 0,
  `t22` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `t1`, `t2`, `status`, `t1s`, `t2s`, `changed`, `t1e`, `t22`) VALUES
(38, '16', '1', -1, '61,48', '62,48', '1', 0, 0),
(41, '18', '8', -1, '64,48', '64,48', '-1', 0, 0),
(43, '17', '8', -1, '55,48', '56,23', '1', 0, 0),
(47, '1', '2', 0, '6,1', '0,0', '0', 0, 0),
(48, '5', '16', 1, '0,0', '0,0', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `role` enum('Bowler','Batsmen','All-rounder','Wicket-keeper and Batsmen') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `tid`, `name`, `score`, `role`) VALUES
(4, 1, 'Gangi Reddy(C)', NULL, 'Batsmen'),
(5, 1, 'Thirumalesh', NULL, 'Batsmen'),
(6, 1, 'Sumanth(VC)', NULL, 'All-rounder'),
(7, 1, 'Suresh', NULL, 'All-rounder'),
(8, 1, 'Anil Kumar', NULL, 'Batsmen'),
(9, 1, 'Mani Kanta', NULL, 'All-rounder'),
(10, 1, 'Shaiksha Valli', NULL, 'Bowler'),
(11, 1, 'Prasad', NULL, 'Bowler'),
(12, 1, 'Venkatesh', NULL, 'Bowler'),
(13, 1, 'Chandu', NULL, 'Bowler'),
(14, 1, 'Praveen', NULL, 'Bowler'),
(15, 2, 'Aslam Farooq(C)', NULL, 'All-rounder'),
(16, 2, 'Ashok', NULL, 'Bowler'),
(17, 2, 'Shiva', NULL, 'Batsmen'),
(18, 2, 'Bhanu', NULL, 'All-rounder'),
(19, 2, 'Gangadhar', NULL, 'Bowler'),
(20, 2, 'Babu', NULL, 'Batsmen'),
(21, 2, 'Siddu', NULL, 'Batsmen'),
(22, 2, 'Ram Prasad', NULL, 'Bowler'),
(23, 2, 'Harsha(VC)', NULL, 'All-rounder'),
(24, 2, 'Raja Sekhar', NULL, 'Bowler'),
(25, 2, 'Ashok', NULL, 'Batsmen'),
(26, 3, 'Shiva(C)', NULL, 'Bowler'),
(27, 3, 'Gokul', NULL, 'All-rounder'),
(28, 3, 'Anil', NULL, 'Bowler'),
(29, 3, 'Bharat', NULL, 'Batsmen'),
(30, 3, 'Varma', NULL, 'Batsmen'),
(31, 3, 'Anji', NULL, 'Wicket-keeper and Batsmen'),
(32, 3, 'Hrushi', NULL, 'Bowler'),
(33, 3, 'Rakesh', NULL, 'Batsmen'),
(34, 3, 'Hemanth', NULL, 'Batsmen'),
(35, 3, 'Chandu', NULL, 'Batsmen'),
(36, 3, 'Hari Prasad', NULL, 'All-rounder'),
(37, 4, 'Anil(C)', NULL, 'All-rounder'),
(38, 4, 'Srikanth', NULL, 'Batsmen'),
(39, 4, 'Praveen', NULL, 'All-rounder'),
(40, 4, 'Vamsi', NULL, 'All-rounder'),
(41, 4, ' Lokesh', NULL, 'Batsmen'),
(42, 4, ' Deepak', NULL, 'Wicket-keeper and Batsmen'),
(43, 4, ' Kishore', NULL, 'All-rounder'),
(44, 4, ' Vasu ', NULL, 'Bowler'),
(45, 4, 'Jayahari', NULL, 'Bowler'),
(46, 4, ' Sai', NULL, 'Bowler'),
(47, 4, 'Mohammed', NULL, 'Bowler'),
(59, 5, 'B.Baba fakruddin(C)', NULL, 'All-rounder'),
(60, 5, 'K.tejaswar reddy ', NULL, 'All-rounder'),
(61, 5, 'D.A.mahesh ', NULL, 'Batsmen'),
(62, 5, 'S.Amir ', NULL, 'All-rounder'),
(63, 5, 'P.Harsha vardhan reddy', NULL, 'Bowler'),
(64, 5, 'P.jaganadham', NULL, 'Batsmen'),
(65, 5, 'Jaya prakash ', NULL, 'Batsmen'),
(66, 5, 'Vishnu vardhan ', NULL, 'Batsmen'),
(67, 5, 'Eswar', NULL, 'Bowler'),
(68, 5, 'Gowtham', NULL, 'Wicket-keeper and Batsmen'),
(69, 5, 'Naresh', NULL, 'Bowler'),
(70, 7, 'P. Ramesh babu(C) ', NULL, 'All-rounder'),
(71, 7, 'A. Venkataramana', NULL, 'Batsmen'),
(72, 7, ' D.V. Brahmanaidu', NULL, 'Batsmen'),
(73, 7, ' M. Chiranjeevi', NULL, 'Batsmen'),
(74, 7, ' B.Rajendra', NULL, 'Batsmen'),
(75, 7, ' B.Venkateswarlu', NULL, 'Batsmen'),
(76, 7, ' P. Mahesh', NULL, 'Wicket-keeper and Batsmen'),
(77, 7, ' D.Sreekanth', NULL, 'All-rounder'),
(78, 7, ' Shaik Darga ', NULL, 'Batsmen'),
(79, 7, 'G.Malakondaiah', NULL, 'Batsmen'),
(80, 7, ' G.Vasanth', NULL, 'Bowler'),
(81, 7, ' M.Ganesh', NULL, 'Bowler'),
(82, 8, 'P.Ravi Kumar', NULL, 'Batsmen'),
(83, 8, ' Murthy', NULL, 'Wicket-keeper and Batsmen'),
(84, 8, ' Vinod kumar', NULL, 'All-rounder'),
(85, 8, ' Ravindra', NULL, 'All-rounder'),
(86, 8, ' Santhosh kumar', NULL, 'Bowler'),
(87, 8, ' Lokesh', NULL, 'All-rounder'),
(88, 8, '  Naresh ', NULL, 'All-rounder'),
(89, 8, ' Anjan', NULL, 'Bowler'),
(90, 8, ' Chakri', NULL, 'Bowler'),
(91, 8, ' Venky ', NULL, 'Batsmen'),
(92, 8, ' Govardhan', NULL, 'Batsmen'),
(93, 8, '  Bhanu Murthy', NULL, 'All-rounder'),
(94, 9, 'Gowri', NULL, 'Wicket-keeper and Batsmen'),
(95, 9, 'Abhi', NULL, 'Batsmen'),
(96, 9, 'Prem(C)', NULL, 'All-rounder'),
(97, 9, 'Satish', NULL, 'Batsmen'),
(98, 9, 'Balaji', NULL, 'Batsmen'),
(99, 9, 'Robert', NULL, 'Bowler'),
(100, 9, 'Mani Chandra', NULL, 'Batsmen'),
(101, 9, 'Kalyan Jyothula', NULL, 'All-rounder'),
(102, 9, 'Mahesh', NULL, 'Bowler'),
(103, 9, 'Nagendra', NULL, 'Bowler'),
(104, 9, 'Prabhakar', NULL, 'Bowler'),
(105, 10, 'Praveen(C)', NULL, 'Wicket-keeper and Batsmen'),
(106, 10, ' Sai', NULL, 'Batsmen'),
(107, 10, ' Harish', NULL, 'All-rounder'),
(108, 10, ' Hari', NULL, 'Batsmen'),
(109, 10, ' Manu', NULL, 'Batsmen'),
(110, 10, ' Chethan', NULL, 'All-rounder'),
(111, 10, ' Paul', NULL, 'Batsmen'),
(112, 10, ' Steff', NULL, 'Batsmen'),
(113, 10, ' Sowrya', NULL, 'Batsmen'),
(114, 10, ' Narasimha', NULL, 'Batsmen'),
(115, 10, ' Abhid', NULL, 'Batsmen'),
(116, 10, ' Himasekar', NULL, 'Bowler'),
(117, 11, 'Sai(C)', NULL, 'All-rounder'),
(118, 11, 'Kishore', NULL, 'All-rounder'),
(119, 11, 'Mani kumar', NULL, 'Wicket-keeper and Batsmen'),
(120, 11, 'Tharun', NULL, 'Batsmen'),
(121, 11, 'VInay', NULL, 'Batsmen'),
(122, 11, 'Chandu', NULL, 'Batsmen'),
(123, 11, 'Challa', NULL, 'Bowler'),
(124, 11, 'Narasimha', NULL, 'Bowler'),
(125, 11, 'Lakshmi Narayana', NULL, 'Bowler'),
(126, 11, 'Varshan', NULL, 'Bowler'),
(127, 11, 'Aravindh', NULL, 'Bowler'),
(128, 12, 'Abhi(C)', NULL, 'All-rounder'),
(129, 12, ' Kowlutla', NULL, 'All-rounder'),
(130, 12, ' Chaitanya', NULL, 'Batsmen'),
(131, 12, ' Riyaaz', NULL, 'All-rounder'),
(132, 12, ' Haribabu', NULL, 'Batsmen'),
(133, 12, ' Dayakar', NULL, 'Batsmen'),
(134, 12, ' Milton', NULL, 'Wicket-keeper and Batsmen'),
(135, 12, ' Vneel', NULL, 'Batsmen'),
(136, 12, ' Rajavamsi', NULL, 'Bowler'),
(137, 12, ' Raghupathi', NULL, 'Bowler'),
(138, 12, ' Sreenivaasulu', NULL, 'Bowler'),
(327, 17, 'Tirumala', NULL, 'Batsmen'),
(326, 17, 'Satish', NULL, 'All-rounder'),
(325, 17, 'Bhaskar', NULL, 'Batsmen'),
(324, 17, 'Siva', NULL, 'Batsmen'),
(323, 17, 'Vijay', NULL, 'Batsmen'),
(322, 17, 'Bharat kumar', NULL, 'Bowler'),
(321, 17, 'SM Basha(C)', NULL, 'Wicket-keeper and Batsmen'),
(343, 18, 'Sai', NULL, 'Bowler'),
(342, 18, 'Ram Murthy', NULL, 'Bowler'),
(341, 18, 'Maheshwar Rao', NULL, 'Bowler'),
(340, 18, 'Ravi', NULL, 'Bowler'),
(339, 18, 'Sateesh', NULL, ''),
(338, 18, 'Shiva', NULL, 'Batsmen'),
(337, 18, 'Suresh', NULL, ''),
(336, 18, 'Ramesh', NULL, 'Batsmen'),
(335, 18, 'Krishna Chaitanya(C)', NULL, 'Bowler'),
(347, 17, 'Hobayya', 0, 'All-rounder'),
(346, 18, 'Sankar Reddy', NULL, 'All-rounder'),
(345, 18, 'Gangadhar', NULL, 'Batsmen'),
(344, 8, 'N Chandu', NULL, 'All-rounder'),
(334, 17, 'Konda Reddy', NULL, 'Bowler'),
(333, 17, 'Muni', NULL, 'Bowler'),
(332, 17, 'Madhu', NULL, 'Bowler'),
(331, 17, 'Tirupati Patri', NULL, 'Bowler'),
(330, 17, 'Pavan', NULL, 'Bowler'),
(329, 17, 'Rajesh', NULL, 'Bowler'),
(328, 17, 'Gouse', NULL, 'All-rounder'),
(320, 16, 'Teja', NULL, 'Bowler'),
(319, 16, 'Tharun', NULL, 'Bowler'),
(318, 16, 'Nadish', NULL, 'Bowler'),
(317, 16, 'Rafi', NULL, 'Batsmen'),
(316, 16, 'Ramesh', NULL, 'Bowler'),
(315, 16, 'Harinadha', NULL, 'All-rounder'),
(314, 16, 'Satya', NULL, 'Batsmen'),
(313, 16, 'S Chandu(C)', NULL, 'All-rounder'),
(312, 16, 'Vijay', NULL, 'Batsmen'),
(311, 16, 'Anji', NULL, 'Batsmen'),
(310, 16, 'Chitanya', NULL, 'Wicket-keeper and Batsmen');

-- --------------------------------------------------------

--
-- Table structure for table `scorecard`
--

CREATE TABLE `scorecard` (
  `mid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `score` varchar(15) NOT NULL,
  `state` enum('bowling','batting') NOT NULL,
  `innings` varchar(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorecard`
--

INSERT INTO `scorecard` (`mid`, `tid`, `pid`, `name`, `score`, `state`, `innings`, `id`) VALUES
(38, 16, 310, 'Chitanya', '0,2,0,0', 'batting', '1', 1),
(38, 16, 311, 'Anji', '1,2,0,0', 'batting', '1', 2),
(38, 16, 313, 'S Chandu(C)', '11,8,2,0', 'batting', '1', 3),
(38, 16, 312, 'Vijay', '6,7,1,0', 'batting', '1', 4),
(38, 1, 6, 'Sumanth(VC)', '7,12,1,', 'bowling', '1', 5),
(38, 1, 12, 'Venkatesh', '19,12,2,', 'bowling', '1', 6),
(38, 1, 14, 'Praveen', '17,12,1,', 'bowling', '1', 7),
(38, 1, 11, 'Prasad', '17,12,4,', 'bowling', '1', 8),
(38, 16, 315, 'Harinadha', '8,4,1,0', 'batting', '1', 9),
(38, 16, 314, 'Satya', '16,9,3,0', 'batting', '1', 10),
(38, 16, 316, 'Ramesh', '1,3,0,0', 'batting', '1', 11),
(38, 16, 319, 'Tharun', '3,5,0,0', 'batting', '1', 12),
(38, 16, 318, 'Nadish', '0,2,0,0', 'batting', '1', 13),
(38, 16, 320, 'Teja', '4,2,0,0', 'batting', '1', 14),
(38, 1, 7, 'Suresh', '53,22,10,0', 'batting', '2', 15),
(38, 16, 319, 'Tharun', '16,6,0', 'bowling', '2', 16),
(38, 16, 311, 'Anji', '24,6,0', 'bowling', '2', 17),
(38, 1, 4, 'Gangi Reddy(C)', '6,3,0,0', 'batting', '2', 18),
(38, 16, 313, 'S Chandu(C)', '9,6,0', 'bowling', '2', 19),
(38, 16, 320, 'Teja', '13,6,0', 'bowling', '2', 20),
(41, 8, 84, ' Vinod kumar', '12,12,3,', 'bowling', '1', 21),
(41, 8, 83, ' Murthy', '5,7,1,0', 'batting', '2', 42),
(41, 8, 92, ' Govardhan', '15,12,3,', 'bowling', '1', 23),
(41, 8, 344, 'N Chandu', '19,7,0,3', 'batting', '2', 41),
(41, 8, 83, ' Murthy', '19,6,0', 'bowling', '1', 40),
(41, 18, 343, 'Sai', '18,12,1,1', 'batting', '1', 26),
(41, 18, 346, 'Sankar Reddy', '5,5,0,0', 'batting', '1', 27),
(41, 18, 341, 'Maheshwar Rao', '5,3,0,0', 'batting', '1', 28),
(41, 18, 340, 'Ravi', '10,5,0,1', 'batting', '1', 29),
(41, 18, 345, 'Gangadhar', '2,8,0,0', 'batting', '1', 30),
(41, 18, 339, 'Sateesh', '0,1,0,0', 'batting', '1', 31),
(41, 18, 337, 'Suresh', '2,3,0,0', 'batting', '1', 32),
(41, 18, 342, 'Ram Murthy', '4,3,1,0', 'batting', '1', 33),
(41, 18, 336, 'Ramesh', '10,6,1,0', 'batting', '1', 34),
(41, 8, 344, 'N Chandu', '10,6,0', 'bowling', '1', 39),
(41, 8, 85, ' Ravindra', '10,11,1,0', 'batting', '2', 36),
(41, 8, 85, ' Ravindra', '8,12,1', 'bowling', '1', 38),
(41, 8, 84, ' Vinod kumar', '5,6,0,0', 'batting', '2', 43),
(41, 8, 82, 'P.Ravi Kumar', '14,11,1,0', 'batting', '2', 44),
(41, 8, 92, ' Govardhan', '2,4,0,0', 'batting', '2', 45),
(41, 18, 335, 'Krishna Chaitanya(C)', '16,6,0', 'bowling', '2', 46),
(41, 18, 337, 'Suresh', '15,6,0', 'bowling', '2', 47),
(41, 18, 341, 'Maheshwar Rao', '7,12,2', 'bowling', '2', 48),
(41, 18, 340, 'Ravi', '11,12,1', 'bowling', '2', 49),
(41, 18, 339, 'Sateesh', '15,12,2', 'bowling', '2', 50),
(43, 17, 331, 'Tirupati Patri', '3,7,0,0', 'batting', '1', 51),
(43, 17, 321, 'SM Basha(C)', '13,14,1,0', 'batting', '1', 52),
(43, 8, 85, ' Ravindra', '12,12,1,', 'bowling', '1', 53),
(43, 17, 347, 'Hobayya', '8,10,1,0', 'batting', '1', 55),
(43, 17, 328, 'Gouse', '9,6,1,0', 'batting', '1', 56),
(43, 17, 333, 'Muni', '6,6,1,0', 'batting', '1', 57),
(43, 8, 86, ' Santhosh kumar', '21,12,0,', 'bowling', '1', 58),
(43, 8, 92, ' Govardhan', '7,12,2,', 'bowling', '1', 59),
(43, 8, 84, ' Vinod kumar', '14,12,1,', 'bowling', '1', 60),
(43, 17, 334, 'Konda Reddy', '12,5,1,1', 'batting', '1', 61),
(43, 8, 344, 'N Chandu', '26,11,4,1', 'batting', '2', 62),
(43, 8, 92, ' Govardhan', '23,12,5,0', 'batting', '2', 63),
(43, 17, 334, 'Konda Reddy', '17,6,0', 'bowling', '2', 64),
(43, 17, 347, 'Hobayya', '9,6,0', 'bowling', '2', 65),
(43, 17, 325, 'Bhaskar', '10,6,0', 'bowling', '2', 66),
(43, 17, 322, 'Bharat Kumar', '20,5,0', 'bowling', '2', 67),
(45, 1, 4, 'Gangi Reddy(C)', '13,4,0,0', 'batting', '1', 68),
(46, 2, 21, 'Siddu', '11,20,0,0', 'batting', '1', 69),
(46, 2, 19, 'Gangadhar', '4,7,0,0', 'batting', '1', 70),
(46, 2, 20, 'Babu', '5,10,0,0', 'batting', '1', 71),
(47, 2, 21, 'Siddu', '3,6,0,0', 'batting', '1', 72),
(47, 2, 20, 'Babu', '1,2,0,0', 'batting', '1', 73),
(47, 2, 20, 'Babu', '4,1,1,0', 'batting', '1', 74),
(47, 2, 20, 'Babu', '6,1,0,1', 'batting', '1', 75);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pool` tinyint(1) NOT NULL,
  `points` int(11) DEFAULT 0,
  `matches` tinyint(4) NOT NULL DEFAULT 0,
  `lost` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `pool`, `points`, `matches`, `lost`) VALUES
(1, 'VIPs-2k20', 0, 2, 1, 0),
(2, 'Bug Hunters', 0, 0, 0, 0),
(3, 'Cric Coders 2.0', 0, 0, 0, 0),
(4, 'Incog Engineers', 0, 0, 0, 0),
(5, 'G-16 Rockers', 0, 0, 0, 0),
(7, 'Spinoff', 0, 0, 0, 0),
(8, 'Elite', 1, 0, 1, 0),
(9, 'Gangsters', 1, 0, 0, 0),
(10, 'Tamil Rockers', 1, 0, 0, 0),
(11, 'Rising Stars', 1, 0, 0, 0),
(12, 'Vipers', 1, 0, 0, 0),
(17, 'Bharat XI', 1, 0, 0, 0),
(18, 'Non Teaching Team', 1, 0, 1, 0),
(16, 'Incredibles', 0, 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scorecard`
--
ALTER TABLE `scorecard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `scorecard`
--
ALTER TABLE `scorecard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
