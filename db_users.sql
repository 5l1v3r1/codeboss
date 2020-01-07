-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2020 at 11:46 PM
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
('0@0.com', 'afe123_', '123456', '0@0.com', 'head.gif', '2020-01-07 15:13:31', 358810, 'email', '127.0.0.1', 'SdoUHl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
