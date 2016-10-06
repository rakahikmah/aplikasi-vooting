-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2016 at 10:30 PM
-- Server version: 5.5.52-MariaDB-1ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `vooting`
--

CREATE TABLE IF NOT EXISTS `vooting` (
  `kriteria` varchar(50) NOT NULL,
  `value` int(10) unsigned NOT NULL DEFAULT '0',
  `kriteriaid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`kriteriaid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vooting`
--

INSERT INTO `vooting` (`kriteria`, `value`, `kriteriaid`) VALUES
('tidak pernah tau', 1, 1),
('pernah dengar', 8, 2),
('sering berkunjung', 1, 3),
('pernah mengunjungi', 1, 4),
('ingin berpartisipasi', 5, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
