-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2025 at 06:08 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monneys_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `Email`, `Message`) VALUES
(4, 'M bilal Narejo', 'bilalnarejo2411c@aptechgdn.net', 'hy whatsupp my probelem is my book is not published with us\n'),
(3, 'Muhmmad Bilal', 'bilalnarejo2411c@aptechgdn.net', 'kdnsdnsm');

-- --------------------------------------------------------

--
-- Table structure for table `trending_arrivals`
--

DROP TABLE IF EXISTS `trending_arrivals`;
CREATE TABLE IF NOT EXISTS `trending_arrivals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `price` text,
  `discription` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trending_arrivals`
--

INSERT INTO `trending_arrivals` (`id`, `name`, `price`, `discription`, `image`) VALUES
(1, 'Rich Dad Poor Dad', '200pkr', '“Rich Dad Poor Dad” is a book by Robert Kiyosaki that teaches the difference between working for money and making money work for you through assets and financial education.', 'Richdad.png'),
(2, 'How to Win Friends And Family', '500pkr', '“How to Win Friends and Influence People” by Dale Carnegie is a guide to building better relationships and influencing others through empathy, communication, and respect.', 'how.png'),
(3, '48 Laws of Power', '900pkr', '\r\n“The 48 Laws of Power” by Robert Greene is a guide that reveals strategies and principles of power, manipulation, and influence used throughout history.', '48.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
