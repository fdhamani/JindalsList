-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2012 at 10:20 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mainsql`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(5) NOT NULL AUTO_INCREMENT,
  `item_name` text NOT NULL,
  `item_desc` varchar(50) NOT NULL,
  `item_type` text NOT NULL,
  `item_price` varchar(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_desc`, `item_type`, `item_price`, `user_id`) VALUES
(2, 'Fundamentals of Corporate Finance; McGraw-Hill Irwin;Ninth Edition', 'Used - ISBN-10: 0073382396', 'textbook', '$45', 3),
(3, 'Unlocked iPhone 4S (GSM)', 'Used - Good condition.', 'electronics', '$300', 4),
(4, 'Apple MacBook Pro', 'Used - Core i5 2.4 GHz - 4 GB RAM', 'electronics', '$850', 2),
(12, 'Calculus I  - Richards', 'Poor condition, charred pages, sticky pages', 'textbook', '$1,000,000', 1),
(13, 'Coffe Mate Coffee Maker', 'Gently used coffee maker. Comes with pot. ', 'appliances', '$10', 1),
(14, '1999 Kawasaki Ninja 500', 'broken head light, laid down twice', 'automotive', '$800', 4),
(16, 'Looking for Roommate', 'Apartment on Waterview Dr, NO PETS!', 'misc', '$500/ month', 3),
(17, 'Racecar Bunk Bed', 'Red race car on top, blue on bottom, NICE!', 'furniture', '100', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pw` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pw`) VALUES
(1, 'faisaldhamani', 'fkd100020@utdallas.edu', 'password'),
(2, 'nathansohadaseni', 'nxs102120@utdallas.edu', 'password'),
(3, 'danielzentner', 'djz090020@utdallas.edu', 'password'),
(4, 'jimmychi ', 'jxc098020@utdallas.edu', 'password');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
