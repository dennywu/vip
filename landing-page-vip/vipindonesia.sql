-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2015 at 10:54 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vipindonesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(16) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `code`, `name`) VALUES
(1, 'ag', 'Accessories & Gift'),
(2, 'au', 'Automotive'),
(3, 'ba', 'Bar'),
(4, 'bc', 'Beauty Care'),
(5, 'bs', 'Book & Stationery'),
(6, 'op', 'Optical'),
(7, 'cb', 'Cake & Bakery'),
(8, 'co', 'Collection'),
(9, 'fb', 'Fashion & Boutique'),
(10, 'fu', 'Furniture'),
(11, 'hs', 'Health & Supplement'),
(12, 'hc', 'Hospital & Clinic'),
(13, 'ho', 'Hotel'),
(14, 'in', 'Interior'),
(15, 're', 'Resort'),
(16, 'rc', 'Restaurant & Cafe'),
(17, 'sm', 'Spa & Massage'),
(18, 'tt', 'Tour & Travel'),
(19, 'pu', 'Pub');

-- --------------------------------------------------------

--
-- Table structure for table `malls`
--

CREATE TABLE IF NOT EXISTS `malls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `malls`
--

INSERT INTO `malls` (`id`, `name`) VALUES
(1, 'Nagoya Hill'),
(2, 'Batam City Square'),
(3, 'Mega Mall'),
(4, 'Kepri Mall'),
(5, 'TOP100 Penuin');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE IF NOT EXISTS `merchants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `discount` int(11) NOT NULL,
  `short_desc` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `lastupdated` datetime NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin@vip-indonesia.com', 'Rahasia123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
