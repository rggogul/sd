-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2012 at 09:56 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(250) NOT NULL,
  `project_type` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(15) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_type`, `mobile`, `email`, `is_deleted`) VALUES
(1, 'sdfd', 1, 252, 'dfsdf', 0),
(2, 'gogul', 2, 213132, 'ddf', 0),
(3, 'gogulasd', 1, 314, 'qedq', 0),
(4, 'adfsad', 1, 23432, 'dafafd', 0),
(5, 'asdsadasdas', 1, 3214, 'asd', 0),
(6, 'adfasd', 1, 234, 'sadasd', 0),
(7, 'sdasd', 1, 34, 'asd', 0),
(8, 'God', 2, 2147483647, 'rggogul24@gmail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE IF NOT EXISTS `project_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_type_name` varchar(50) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `project_type_name`, `is_deleted`) VALUES
(1, 'Active', 0),
(2, 'hold', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `lastlogin` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `emailid`, `mobile`, `username`, `password`, `lastlogin`) VALUES
(1, 'Adminstrator', 'admin@sivarambuilders.com', '9944034054', 'admin', 'admin', '2012-08-20 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
