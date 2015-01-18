-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2015 at 11:56 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) DEFAULT NULL,
  `ucountry` varchar(25) DEFAULT NULL,
  `uemail` varchar(50) DEFAULT NULL,
  `uphone` bigint(20) DEFAULT NULL,
  `udob` date DEFAULT NULL,
  `uabout` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1011 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `ucountry`, `uemail`, `uphone`, `udob`, `uabout`) VALUES
(1000, 'Sushan', 'India', 'sushan@gmail.com', 8446425036, '1989-12-05', 'loves to code'),
(1002, 'Sagar Fuse', 'India', 'sagar@gmail.com', 5421365479, '1988-08-16', 'sagar staying at dapodi in pune. MBA graduate. loves cooking and singing.'),
(1004, 'Ankeet', 'India', 'ankeetsyrus@gmail.com', 1234567890, '1994-01-15', 'i am pursuing engineering'),
(1005, 'Pritam', 'China', 'pritam@gmail.com', 8457652155, '1990-05-10', 'I stay at dhapodi pune.'),
(1006, 'Roshan', 'India', 'roshan@gmail.com', 7898456123, '1989-07-13', 'i stay at dapodi in pune. want to join mnc. looking for a beautiful wife'),
(1007, 'Ritesh', 'China', 'ritesh@gmail.com', 7452156244, '1989-05-11', 'stays at daphodi pune. works as data entry operator. has 5 working days'),
(1008, 'Rajat', 'Manhatten', 'rajat@gmail.com', 4562148523, '1992-05-16', 'i stay at nagpur.'),
(1009, 'Rohit', 'India', 'rohit@gmail.com', 7521365489, '1990-04-13', 'i stay at nagpur'),
(1010, 'Anurag', 'India', 'anurag@gmail.com', 8795642314, '1990-04-02', 'i am an architect');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
