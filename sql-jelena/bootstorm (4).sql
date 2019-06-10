-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 11:38 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootstorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `commentbody` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `postid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `commentbody`, `postid`, `date`, `userid`, `image`) VALUES
(1, 'Komentar na post 1', 18, '2019-03-31 19:08:33', '1', ''),
(2, 'Komentar na post 2', 18, '2019-03-31 19:08:33', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `postbody` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  `image` varchar(400) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `privacy` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `postbody`, `date`, `userid`, `image`, `privacy`) VALUES
(7, 'danas privste', '2019-03-21 12:57:32', 1, '', 'private'),
(2, 'Prvi private post', '2019-03-21 12:10:52', 1, '', 'private'),
(3, 'Majkl prvi post', '2019-03-21 12:40:57', 2, '', 'public'),
(4, 'Majkl prvi private post', '2019-03-21 12:41:14', 2, '', 'private'),
(8, '', '2019-03-21 13:22:14', 1, '', 'public'),
(9, 'danas je lep dan', '2019-03-21 13:37:05', 1, '', 'public'),
(12, 'Nikola Tesla private', '2019-03-21 16:07:42', 1, '', 'private'),
(16, 'cao', '2019-03-22 10:40:50', 2, '', 'private'),
(14, 'Prvi private post', '2019-03-21 16:08:24', 1, '', 'private'),
(17, 'slika 124', '2019-03-28 10:02:15', 1, '53894595_400065774118609_7044897219106832384_n.jpg', 'public'),
(18, 'majkl slika', '2019-03-28 11:55:38', 2, '54728581_2235059806555455_8254994835891552256_n.jpg', 'public'),
(21, 'Post 123', '2019-04-03 09:36:48', 1, '', 'public'),
(22, '', '2019-04-02 21:27:25', 2, 'Screenshot (28).png', 'public'),
(23, '', '2019-04-03 08:58:29', 1, 'Screenshot (9).png', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `email`, `username`, `image`, `password`) VALUES
(1, 'Nikola', 'Tesla', 'nikola@gmail.com', 'nikolat', '', '$2y$10$ED72Is9hDmM2XTGrPofZj.wECFK06HNxWYzJPLeoMxm8YqurzD/Cm'),
(2, 'Majkl', 'Faradej', 'majkl@gmail.com', 'majklf', '', '$2y$10$ED72Is9hDmM2XTGrPofZj.wECFK06HNxWYzJPLeoMxm8YqurzD/Cm'),
(3, 'Petar', 'Petrovic', 'ppetar@pet.ar', 'ppetar', '', '$2y$10$UAu/NQRb1BOqaJDvFe15gOMoQlyswxEn6/PyXdwgFSlrq4opyER0C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
