-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2020 at 11:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `chat_date` datetime NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `userid`, `chatroomid`, `message`, `chat_date`, `file`) VALUES
(1, 2, 3, 'hello', '2019-06-16 21:23:33', NULL),
(12, 8, 7, 'Hello', '2020-12-07 15:44:41', NULL),
(13, 9, 7, 'Hi BigBull', '2020-12-07 15:44:58', NULL),
(14, 9, 7, 'Lets Grow More', '2020-12-07 15:45:38', NULL),
(16, 8, 7, 'Our Next Scam is coming Soon', '2020-12-07 15:48:40', NULL),
(17, 9, 7, 'But it is very risky', '2020-12-07 15:49:20', NULL),
(18, 8, 7, 'Laala Risk hai to Ishq hai', '2020-12-07 15:49:47', NULL),
(19, 11, 8, 'Hello Guys!! Lets Learn PHP Together Here.', '2020-12-07 16:03:49', NULL),
(20, 11, 9, 'Hello Guys. Help me out with Learning NodeJS.', '2020-12-07 16:05:40', NULL),
(21, 8, 10, 'I want to make History. Join me in this Scam Guys!!', '2020-12-07 16:13:55', NULL),
(22, 12, 8, 'Hello Tom, I can help you with setting up Xampp and MySQL. It can be tricky but got everything under control :)', '2020-12-07 16:17:32', NULL),
(23, 13, 8, 'Hi Tom, I have some goods notes for PHP. I am attaching a .pdf file check it.', '2020-12-07 16:19:53', NULL),
(24, 13, 9, 'Hey. I have some good notes on setting up Node and Running your first program', '2020-12-07 16:22:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `chatroomid` int(11) NOT NULL,
  `chat_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`chatroomid`, `chat_name`, `date_created`, `chat_password`, `userid`) VALUES
(7, 'Stock Market', '2020-12-07 15:37:56', 'mehta', 8),
(8, 'PHP Class 2020', '2020-12-07 16:03:24', '123', 11),
(9, 'NodeJs Class 2020', '2020-12-07 16:04:50', '123', 11),
(10, 'Money Market', '2020-12-07 16:11:52', 'mehta', 8);

-- --------------------------------------------------------

--
-- Table structure for table `chat_member`
--

CREATE TABLE `chat_member` (
  `chat_memberid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_member`
--

INSERT INTO `chat_member` (`chat_memberid`, `chatroomid`, `userid`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 1),
(14, 7, 8),
(15, 7, 9),
(16, 8, 11),
(17, 9, 11),
(18, 10, 8),
(19, 10, 9),
(20, 8, 12),
(21, 8, 13),
(22, 9, 13);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `fileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `file_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`fileid`, `userid`, `chatroomid`, `file`, `file_date`) VALUES
(33, 13, 0, '../upload/files/ECO-A3-18BCP095_1607338208.pdf', '2020-12-07 16:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `uname`, `photo`, `access`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '', 1),
(8, 'BigBull', '202cb962ac59075b964b07152d234b70', 'Harshad Mehta', 'upload/images_2_1607336877.jpg', 2),
(9, 'Ashwin', '202cb962ac59075b964b07152d234b70', 'Ashwin Mehta', 'upload/images_3_1607336924.jpg', 2),
(10, 'ManuBhai', '202cb962ac59075b964b07152d234b70', 'Manu Manek', '', 2),
(11, 'Tommy', '202cb962ac59075b964b07152d234b70', 'Thomas Shelby', '', 2),
(12, 'Arthur', '202cb962ac59075b964b07152d234b70', 'Arthur Shelby', '', 2),
(13, 'Polly', '202cb962ac59075b964b07152d234b70', 'Polly Shelby', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatroomid`);

--
-- Indexes for table `chat_member`
--
ALTER TABLE `chat_member`
  ADD PRIMARY KEY (`chat_memberid`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fileid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `chatroomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat_member`
--
ALTER TABLE `chat_member`
  MODIFY `chat_memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
