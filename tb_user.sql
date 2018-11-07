-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2018 at 01:04 PM
-- Server version: 5.6.40-log
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `communityportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text,
  `account_creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(10) NOT NULL,
  `subscribe` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `firstName`, `lastName`, `email`, `password`, `account_creation_time`, `role`, `subscribe`) VALUES
(4, 'philip', 'kok', 'philip@hotmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-01-04 17:23:50', 'user', 0),
(5, 'ben', 'yeo', 'ben@hotmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-01-04 17:26:13', 'user', 0),
(8, 'Sajan', 'Rajah', 'sajanrajah@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-09-14 12:41:41', 'admin', 0),
(9, 'Buchoi', 'Rajah', 'jctw.sr@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-09-14 13:05:14', 'user', 1),
(11, 'Simba', 'Rajah', 'jcmy.sr@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-09-20 08:40:46', 'admin', 1),
(14, 'Walter', 'Wong', 'wong@hotmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-09-21 05:55:15', 'user', 0),
(18, 'Jack', 'Rajah', 'jcsg.sr@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-10-02 03:19:17', 'user', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
