-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2020 at 11:45 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2-log
-- PHP Version: 5.6.37-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_codeboss`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_cards`
--

CREATE TABLE `db_cards` (
  `cardid` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `checkcode` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recharge_time` datetime DEFAULT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_cards`
--

INSERT INTO `db_cards` (`cardid`, `checkcode`, `money`, `createdate`, `uid`, `recharge_time`, `description`) VALUES
('ecad1234567812345678', '12345678', 30, '2020-01-09 11:43:08', '0@0.com', '2020-01-10 09:39:34', '');

-- --------------------------------------------------------

--
-- Table structure for table `db_cards_users`
--

CREATE TABLE `db_cards_users` (
  `cardid` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `uid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `paymethod` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `buycard_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recharge_time` datetime DEFAULT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_users`
--

CREATE TABLE `db_users` (
  `uid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'head.gif',
  `createtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `register_code` int(6) NOT NULL,
  `usertype` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `loginip` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `randomcode` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`uid`, `username`, `password`, `email`, `image_url`, `createtime`, `register_code`, `usertype`, `loginip`, `randomcode`) VALUES
('0@0.com', 'afe123_', 'e10adc3949ba59abbe56e057f20f883e==', '0@0.com', 'head.gif', '2020-01-09 16:17:28', 137832, 'email', '127.0.0.1', 'T9h-n5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_cards`
--
ALTER TABLE `db_cards`
  ADD PRIMARY KEY (`cardid`);

--
-- Indexes for table `db_cards_users`
--
ALTER TABLE `db_cards_users`
  ADD PRIMARY KEY (`cardid`);

--
-- Indexes for table `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
