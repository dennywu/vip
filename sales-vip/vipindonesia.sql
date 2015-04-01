-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2015 at 06:05 AM
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
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `nocard` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `email` varchar(64) NOT NULL,
  `birthday` date NOT NULL,
  `job` varchar(64) NOT NULL,
  `religion` varchar(32) NOT NULL,
  `hobby` varchar(64) NOT NULL,
  `note` varchar(256) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `username` varchar(64) NOT NULL,
  `registerdate` datetime NOT NULL,
  PRIMARY KEY (`nocard`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`nocard`, `name`, `address`, `email`, `birthday`, `job`, `religion`, `hobby`, `note`, `gender`, `username`, `registerdate`) VALUES
('001', 'Member Bary', 'gak ada alamat', 'baru@gmail.com', '1970-01-01', 'Buruh', 'Islam', '', '', 'female', 'apinwu', '2015-03-22 00:22:29'),
('002', 'member sales', 'gak ada lamat', 'sales@gmail.com', '1970-01-01', 'Buruh', 'Islam', '', '', 'male', 'sales1', '2015-03-22 00:23:58'),
('0090', 'Apin', 'Denny', 'pain@yopmail.com', '1970-01-01', 'sdfsdfs', 'Islam', '', '', 'male', 'dennywu', '2015-03-30 14:59:53'),
('098094830', 'Wintoro', 'jfdngkd', 'win@gmail.com', '1970-01-01', 'sdfsfs', 'Islam', '', '', 'male', 'dennywu', '2015-03-30 15:05:15'),
('12345', 'Test', 'haha', 'test@gmail.com', '1970-01-01', 'hahaha', 'Buddha', '', '', 'male', 'dennywu', '2015-03-30 14:52:28'),
('123456', 'Denny Wu', 'Diamond Palace', 'denny@inforsys.co.id', '1970-01-01', 'Programmer', 'Buddha', 'Basket', '', 'male', 'dennywu', '2015-03-21 22:11:09'),
('123456789', 'Aku Ganteng Sekali', 'Diamond Palace Block E No 11', 'akugantengsekali@gmail.com', '2015-03-03', 'Wiraswasta', 'Buddha', 'Suka Tidur', 'Agak gila ini bro', 'male', 'dennywu', '2015-03-21 22:23:18'),
('23456789', 'asdfghjkl', 'dfknjgnd', 'sdfgh@gmail.com', '2015-03-20', 'sdfsdfs', 'Islam', '', '', 'male', 'dennywu', '2015-03-30 15:45:42'),
('435467890', 'Dennydfn', 'djnfgkfdd', 'fjkndkgdf@fdklgd.com', '0000-00-00', 'dfgdfgd', 'Islam', '', '', 'male', 'dennywu', '2015-03-30 15:06:28'),
('47657565', 'fgdgdg', 'jfdgkdjn', 'dfgdgd@gmial.com', '2015-03-14', 'dfgdfgd', 'Islam', '', '', 'male', 'dennywu', '2015-03-30 15:11:25'),
('900', 'haha', 'haha', 'haha@gmail.om', '1970-01-01', 'haha', 'Islam', '', '', 'male', 'dennywu', '2015-03-22 13:20:47'),
('908765', 'wintoro', 'hahaha', 'win123@gmail.com', '1980-07-30', 'dffsfs', 'Islam', '', '', 'male', 'dennywu', '2015-03-30 15:12:21'),
('987657890', 'Apin Wu', 'jkdnfgd', 'pind@gmail.com', '1970-01-01', 'dfgdfgd', 'Islam', '', '', 'male', 'dennywu', '2015-03-30 15:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE IF NOT EXISTS `merchants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `discount` varchar(32) NOT NULL,
  `short_desc` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `lastupdated` datetime NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `category_id`, `name`, `discount`, `short_desc`, `description`, `lastupdated`, `path`) VALUES
(1, 16, 'KULINER NUSANTARA', '10', '<p>Kepri mall Lt Dasar no 59-60, Batam Centre</p>\n<p>-Food &amp; Drinks <br />-Everyday</p>', '', '2015-01-31 18:11:42', 'images/merchants/kn.jpg'),
(2, 17, 'De Amour', '10', '<p>Ruko Nagoya Hill blok J no 25, Batam</p>\n<p>&nbsp;0823 9152 7297</p>\n<p>&nbsp;-All Treatment, Everyday</p>\n<p>&nbsp;</p>', '<p>Manjakan diri anda dengan kualitas Massage dan SPA yang profesional.</p>\n<p>Ditangani oleh terapist yang handal dan pastinya akan memuaskan anda...&nbsp;</p>', '2015-02-12 23:04:59', 'images/merchants/DE AMOUR copy.jpg'),
(3, 1, 'I FIVE COM', '10', '<p>Ruko Nagoya Hill Blok J no 25, Batam</p>\n<p>(0778) 7430336</p>\n<p>-All Items, Everyday</p>', '<p>Menyediakan berbagai jenis gadget yg selalu Up to Date:</p>\n<p>-Handphone</p>\n<p>-Laptop</p>\n<p>-Kamera</p>\n<p>-Powerbank</p>\n<p>Dan masih banyak gadget lainnya...</p>\n<p>&nbsp;</p>', '2015-02-12 23:07:30', 'images/merchants/i five.jpg'),
(4, 2, 'JAYA BAN', '30', '<p>Komp Inti Batam blok E no 8, SUngai Panas, Batam</p>\n<p>(0778) 430 483&nbsp;</p>\n<p>-All Type</p>', '<p>DUNLOP TYRE...</p>\n<p>Pilihan terbaik bagi kendaraan anda..</p>\n<p>Hanya di JAYA BAN anda mendapatkan produk kualitas NO 1&nbsp;dengan harga terbaik!!</p>', '2015-02-12 23:29:16', 'images/merchants/JYBAN DUNLOP.jpg'),
(5, 2, 'TK JAYA BAN', '20', '<p>Komp Inti Batam Blok E no 8, Sungai Panas, Batam&nbsp;</p>\n<p>(0778) 430 483&nbsp;</p>\n<p>-All Type</p>', '<p>Menyediakan Ban Achilles dengan kualitas terbaik..</p>\n<p>Datang dan buktikan sendiri..</p>', '2015-02-12 23:25:42', 'images/merchants/JYBAN ACHILES copy.jpg'),
(6, 3, 'LAB ROOM BAR', '15', '<p>Nagoya Citywalk blok A no 7</p>\n<p>Batam</p>\n<p>(0778)426768</p>\n<p>-Foods &amp; Drinks</p>\n<p>-Everyday</p>', '<p>Nikmati paduan kenikmatan makanan dan minuman kami..</p>\n<p>Ditemani kenyamanan LAB ROOM yang begitu mengesankan..</p>\n<p>&nbsp;</p>', '2015-02-15 23:44:55', 'images/merchants/lab.jpg'),
(7, 9, 'MECA BOUTIQUE', '25', '<p>Jln Bukit Indah Raya 3 no 18, Sukajadi</p>\n<p>Batam</p>\n<p>081991071734</p>\n<p>-All Item</p>', '<p>Kunjungi MECA BOUTIQUE...</p>\n<p>Dapatkan koleksi busana terbaik dengan harga bersahabat..</p>\n<p>GRAB IT FAST!!</p>', '2015-02-15 23:55:01', 'images/merchants/meka.jpg'),
(8, 2, 'FAST AUTO (CAR SPA)', '20', '<p>Jl Laksamana Bintan no 53 Sei Panas</p>\n<p>Batam</p>\n<p>0813 2232 3332</p>\n<p>-All Transaction</p>', '', '2015-02-17 19:53:16', 'images/merchants/fast auto.png'),
(10, 16, 'GOLDEN FISH RESTAURANT', '25', '<p>Jembatan 2 Barelang, Pulau Nipa</p>\n<p>(0778)7070688</p>\n<p>-Food only</p>', '<p>Nikmati Pengalaman bersantap hidangan laut yang sedap..</p>\n<p>ditemani pemandangan Jembatan Barelang dan laut lepas..</p>\n<p>Hanya di GOLDEN FISH RESTAURANT...</p>', '2015-03-03 17:01:32', 'images/merchants/LOGO 1 copy.png'),
(11, 16, 'WARUNG LA VEDAS', '20', '<p>Komp Nagoya Paradise Centre blok J no 7</p>\n<p>Belakang Hotel Utama (DC Mall)</p>\n<p>(0778)7437248</p>\n<p>-Food and Drinks</p>\n<p>-No Min Transaction</p>', '<p>Hanya di Warung LA VEDAS...</p>\n<p>Rasakan Nikmatnya Menu komplit dengan harga terjangkau..</p>\n<p>Ayam Cabe Ijo..Ayam Bakar Pedas..</p>\n<p>Aneka Nasi Goreng..dan masih banyakpilihan..</p>\n<p>yang akan menggugah selera anda...</p>', '2015-03-04 20:05:02', 'images/merchants/logo lavedas.jpg'),
(12, 17, 'OCTOPUSS MENS HEALTH & EXECUTIVE SPA', '20', '<p>Pacific Palace Hotel Lt 8</p>\n<p>Batam</p>\n<p>(0778)7436666</p>\n<p>-Room Only</p>', '<p>Nikmati Layanan Spa terbaik ..</p>\n<p>Dengan Fasilitas Spa yang mewah dan dimanjakan layanan terapis yang handal..</p>\n<p>menjadikan pengalaman yang tidak terlupakan...</p>', '2015-03-14 11:36:22', 'images/merchants/octopuss logo.jpg'),
(13, 2, 'PLANET JOK', '10', '<p>KOMP DIAN CENTRE BLOK B NO 3A</p>\n<p>BATAM</p>\n<p>085331 121212</p>', '<p>HANYA DI PLANET JOK..</p>\n<p>TEMPAT TERBAIK MELAPISI JOK KULIT MOBIL ANDA..</p>\n<p>MUTU TERJAMIN HARGA TERBAIK..&nbsp;</p>', '2015-03-10 12:41:04', 'images/merchants/planet jok.jpg'),
(14, 16, 'Coffee Story Co.', '15', '<p>Komp Nagoya Hill Superblock</p>\n<p>Blok J no 12, Batam</p>\n<p>(0778)7430397</p>\n<p>- min purchase 200</p>\n<p>- ala carte only</p>', '<p>Bersama Coffee Story Co.</p>\n<p>Nikmati pengalaman ngopi dengan sentuhan yang berbeda..</p>\n<p>Menawarkan kopi dengan citarasa tinggi yang belum pernah didapat dikafe manapun..</p>\n<p>Akan membuat anda ketagihan...Buktikan sendiri..&nbsp;</p>', '2015-03-14 10:38:24', 'images/merchants/coffee story.jpg'),
(15, 16, 'Caffein Cafe', '10', '<p>Komp Ruko Nagoya Hill Blok R3 A3A</p>\n<p>Batam</p>\n<p>(0778)749 3712</p>\n<p>-Cakes only</p>\n<p>-Min Purchase Rp.150.000</p>', '<p>Nikmati suasana Cozy dengan suguhan minuman dan cakes yang akan menggoda selera anda..</p>\n<p>Dijamin...akan membuat anda ketagihan...</p>\n<p>Caffein Cafe....the best place for you...</p>', '2015-03-14 11:34:13', 'images/merchants/caf fe.jpg'),
(16, 9, 'MIXIT', '25', '<p>-DC MALL LT DASAR BLOK D6 NO 27</p>\n<p>BATAM</p>\n<p>(0778) 7500559</p>\n<p>-ALL PRODUCTS</p>', '<p>KUNJUNGI OUTLET KAMI YANG TERSEBAR DIKOTA BATAM :</p>\n<p>-DC MALL LANTAI DASAR BLOK D6 NO 27 &nbsp; (0778)7500559</p>\n<p>-BCS MALL LANTAI 1 BLOK E7 NO 3 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (0778)7065962</p>\n<p>-BCS MALL LANTAI 2 BLOK C6 NO 8 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (0778)7435689</p>\n<p>-MEGA MALL FIRST FLOOR F1285 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (0778)470242</p>\n<p>-PERTOKOAN TOP 100 BLOK C NO 10 &nbsp; &nbsp; &nbsp; &nbsp; (0778)453425</p>\n<p>-NAGOYA HILL FIRST FLOOR FS8-10 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (0778)7493891</p>\n<p>-PLAZA TOP 100 PENUIN #02-R &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (0778)7068065</p>\n<p>-KEPRI MALL UG-10 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(0778)7064393</p>\n<p>&nbsp;</p>\n<p>SEGERA DAPATKAN PRODUK TERBAIK KAMI...RAIHLAH PENAWARAN TERBAIK!!</p>', '2015-03-14 21:10:00', 'images/merchants/mixit.bmp'),
(17, 16, 'SAUNG SUNDA SAWARGI', '10', '<p>Food &amp; Drink</p>', '<p>Saung Sunda Sawargi akan&nbsp;memberikan&nbsp;layanan terbaik kuliner bagi Anda...</p>\n<p>Disuguhi beraneka macam menu khas Jawa Barat..</p>\n<p>Dijamin memuaskan..!</p>', '2015-03-18 20:58:50', 'images/merchants/saung sunda.jpg'),
(18, 16, 'Share Tea', 'FREE UPSIZE', '<p>Minimal Payment : Rp 200.000</p>', '', '2015-04-01 10:49:56', 'images/merchants/Member-Card (1).png');

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

-- --------------------------------------------------------

--
-- Table structure for table `usersales`
--

CREATE TABLE IF NOT EXISTS `usersales` (
  `username` varchar(64) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `role` varchar(32) NOT NULL,
  `parent` varchar(64) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersales`
--

INSERT INTO `usersales` (`username`, `fullname`, `password`, `email`, `phone`, `role`, `parent`) VALUES
('apinwu', 'Apin Wu', '123123123', 'denny@inforsys.co.id', '08566584915', 'colaborator', ''),
('col1', 'colaborator 1', '123456', 'cob@yopmail.com', '086', 'colaborator', ''),
('dennywu', 'Denny Wu', '123123123', 'denny.wu13@gmail.com', '08566584915', 'owner', '0'),
('sales1', 'Sales 1', '123456', 'fdf@gmail.com', '08565658491', 'sales', 'apinwu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
