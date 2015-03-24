-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: mysql.metropolia.fi
-- Generation Time: Jan 11, 2015 at 05:07 PM
-- Server version: 5.0.95
-- PHP Version: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ilkkamtk`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `ID` int(6) NOT NULL auto_increment,
  `eName` text NOT NULL,
  `eDescription` text NOT NULL,
  `pEmail` text NOT NULL,
  `pPhone` text NOT NULL,
  `eDate` datetime NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`ID`, `eName`, `eDescription`, `pEmail`, `pPhone`, `eDate`) VALUES
(15, 'Advanced Web Programming', 'b302', 'kari.aaltonen@metropolia.fi', '0401234567', '2015-01-12 08:00:00'),
(16, 'Introduction to XML', 'b303', '', '', '2015-01-14 17:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
