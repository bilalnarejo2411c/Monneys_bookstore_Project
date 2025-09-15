-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2025 at 06:41 PM
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
-- Table structure for table `competition_submissions`
--

DROP TABLE IF EXISTS `competition_submissions`;
CREATE TABLE IF NOT EXISTS `competition_submissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `competition_submissions`
--

INSERT INTO `competition_submissions` (`id`, `username`, `title`, `file_path`, `submitted_at`) VALUES
(1, 'bilal', 'Joe Goldberg', 'uploads/68c85c41235be_M Bilal Narejo (1).pdf', '2025-09-15 18:34:41'),
(2, 'bilal', 'Joe Goldberg', 'uploads/68c85d0bb818c_M Bilal Narejo (1).pdf', '2025-09-15 18:38:03'),
(3, 'bilal', 'Joe Goldberg', 'uploads/68c85d0e41049_M Bilal Narejo (1).pdf', '2025-09-15 18:38:06');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `Email`, `Message`) VALUES
(4, 'M bilal Narejo', 'bilalnarejo2411c@aptechgdn.net', 'hy whatsupp my probelem is my book is not published with us\n'),
(3, 'Muhmmad Bilal', 'bilalnarejo2411c@aptechgdn.net', 'kdnsdnsm'),
(5, 'Muhmmad Bilal', 'bilalamin448@gmail.com', 'nknjhhjhjjh');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(5, 'bilal', 'bilalnarejo2411c@aptechgdn.net', '$2y$10$rqkG54mFUQ0WaQXAieUyweBk5NyxP.91YM1/b/zoQTUXpnv50Dh7m', '2025-09-14 21:08:24'),
(6, 'mariyam', 'mariyam123@gmail.com', '$2y$10$GuKb3hcOE5kh5JqhJv6X8eDVI0OtWEKrce8t11dGBt5l9CskOMpkG', '2025-09-15 09:50:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
