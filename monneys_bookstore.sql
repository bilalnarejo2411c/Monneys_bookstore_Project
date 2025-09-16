-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2025 at 08:26 PM
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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `subscription_fee` decimal(10,2) DEFAULT NULL,
  `format` enum('PDF','CD','Hardcopy') DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `is_free` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `description`, `image`, `price`, `subscription_fee`, `format`, `weight`, `is_free`, `created_at`) VALUES
(1, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Classic American novel.', 'images/gatsby.jpg', 12.99, 3.99, 'PDF', 0.00, 0, '2025-09-16 18:23:00'),
(2, '1984', 'George Orwell', 'Dystopian novel.', 'images/1984.jpg', 10.50, 2.50, 'Hardcopy', 0.50, 0, '2025-09-16 18:23:00'),
(3, 'Learn Php', 'John Doe', 'Beginner to advanced PHP concepts.', 'images/php.jpg', 20.00, 5.00, 'CD', 0.10, 0, '2025-09-16 18:23:00'),
(4, 'The Growth Mindset', 'Jane Smith', 'This book is free for all users.', 'images/free.jpg', 0.00, 0.00, 'PDF', 0.00, 1, '2025-09-16 18:23:00'),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Classic American novel.', 'images/gatsby.jpg', 12.99, 3.99, 'PDF', 0.00, 0, '2025-09-16 18:31:23'),
(6, '1984', 'George Orwell', 'Dystopian novel.', 'images/1984.jpg', 10.50, 2.50, 'Hardcopy', 0.50, 0, '2025-09-16 18:31:23'),
(7, 'Learn PHP', 'John Doe', 'Beginner to advanced PHP concepts.', 'images/php.jpg', 20.00, 5.00, 'CD', 0.10, 0, '2025-09-16 18:31:23'),
(8, 'Free eBook Sample', 'Jane Smith', 'This book is free for all users.', 'images/free.jpg', 0.00, 0.00, 'PDF', 0.00, 1, '2025-09-16 18:31:23'),
(9, 'Atomic Habits', 'James Clear', 'Transform your life with small habits.', 'images/atomic.jpg', 15.99, 4.50, 'PDF', 0.00, 0, '2025-09-16 18:33:05'),
(10, 'The 7 Habits of Highly Effective People', 'Stephen R. Covey', 'Proven principles for personal and professional growth.', 'images/7habits.jpg', 18.50, 5.00, 'Hardcopy', 0.60, 0, '2025-09-16 18:33:05'),
(11, 'Deep Work', 'Cal Newport', 'Rules for focused success in a distracted world.', 'images/deepwork.jpg', 14.00, 3.50, 'PDF', 0.00, 0, '2025-09-16 18:33:05'),
(12, 'Can’t Hurt Me', 'David Goggins', 'Master your mind and defy the odds.', 'images/goggins.jpg', 16.75, 4.00, 'Hardcopy', 0.70, 0, '2025-09-16 18:33:05'),
(13, 'Rich Dad Poor Dad', 'Robert Kiyosaki', 'Financial education for building wealth.', 'images/Richdad.png', 12.99, 3.00, 'PDF', 0.00, 0, '2025-09-16 18:33:05'),
(14, 'Atomic Habits', 'James Clear', 'Transform your life with small habits.', 'images/atomic.jpg', 15.99, 4.50, 'PDF', 0.00, 0, '2025-09-16 18:34:51'),
(15, 'The 7 Habits of Highly Effective People', 'Stephen R. Covey', 'Proven principles for personal and professional growth.', 'images/7habits.jpg', 18.50, 5.00, 'Hardcopy', 0.60, 0, '2025-09-16 18:34:51'),
(16, 'Deep Work', 'Cal Newport', 'Rules for focused success in a distracted world.', 'images/deepwork.jpg', 14.00, 3.50, 'PDF', 0.00, 0, '2025-09-16 18:34:51'),
(17, 'Can’t Hurt Me', 'David Goggins', 'Master your mind and defy the odds.', 'images/goggins.jpg', 16.75, 4.00, 'Hardcopy', 0.70, 0, '2025-09-16 18:34:51'),
(18, 'Rich Dad Poor Dad', 'Robert Kiyosaki', 'Financial education for building wealth.', 'images/richdad.jpg', 12.99, 3.00, 'PDF', 0.00, 0, '2025-09-16 18:34:51'),
(19, 'House of Flame and Shadow', 'Sarah J. Maas', 'Third book in Crescent City series, full of fantasy, magic, and epic battles.', 'images/house_of_flame.jpg', 22.99, 5.99, 'Hardcopy', 1.20, 0, '2025-09-16 19:05:05'),
(20, 'Iron Flame', 'Rebecca Yarros', 'Sequel to Fourth Wing, a gripping fantasy romance about dragon riders and survival.', 'images/iron_flame.jpg', 24.50, 6.50, 'Hardcopy', 1.10, 0, '2025-09-16 19:05:05'),
(21, 'Light Bringer', 'Pierce Brown', 'Part of the Red Rising Saga, a thrilling mix of sci-fi and fantasy with rebellion themes.', 'images/light_bringer.jpg', 21.75, 4.99, 'PDF', 0.00, 0, '2025-09-16 19:05:05'),
(22, 'Legends & Lattes', 'Travis Baldree', 'A cozy fantasy novel about an orc who retires to open a coffee shop.', 'images/legends_lattes.jpg', 18.00, 3.50, 'CD', 0.25, 0, '2025-09-16 19:05:05'),
(23, 'The Atlas Paradox', 'Olivie Blake', 'The sequel to The Atlas Six, exploring dark academia and powerful magicians.', 'images/atlas_paradox.jpg', 19.99, 4.50, 'Hardcopy', 0.90, 0, '2025-09-16 19:05:05'),
(24, 'Fifty Shades of Grey', 'E. L. James', 'A passionate romance exploring love, obsession, and desire — the first book in the Fifty Shades trilogy.', 'images/fifty_shades.jpg', 17.99, 4.25, 'Hardcopy', 0.80, 0, '2025-09-16 19:11:49'),
(25, 'It Ends With Us', 'Colleen Hoover', 'A powerful story of love and resilience, mixing romance with emotional struggles and self-discovery.', 'images/it_ends_with_us.jpg', 18.50, 4.99, 'PDF', 0.00, 0, '2025-09-16 19:11:49'),
(26, 'It Starts With Us', 'Colleen Hoover', 'Sequel to It Ends With Us, continuing Lily and Atlas’s emotional love story.', 'images/it_starts_with_us.jpg', 19.00, 5.25, 'Hardcopy', 0.90, 0, '2025-09-16 19:11:49'),
(27, 'Twilight', 'Stephenie Meyer', 'The iconic love story between Bella Swan and Edward Cullen, blending romance with fantasy and vampires.', 'images/twilight.jpg', 16.75, 4.50, 'Hardcopy', 0.95, 0, '2025-09-16 19:11:49'),
(34, 'The Immortal Life of Henrietta Lacks', 'Rebecca Skloot', 'The story of Henrietta Lacks, whose cancer cells revolutionized medical research without her knowledge.', 'images/henrietta_lacks.jpg', 18.75, 4.80, 'Hardcopy', 1.00, 0, '2025-09-16 19:20:07'),
(33, 'Homo Deus: A Brief History of Tomorrow', 'Yuval Noah Harari', 'A thought-provoking look at the future of humanity with AI, biotechnology, and human evolution.', 'images/homo_deus.jpg', 21.50, 5.50, 'PDF', 0.00, 0, '2025-09-16 19:20:07'),
(32, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'An exploration of human history from the Stone Age to the modern era, analyzing how societies evolved.', 'images/sapiens.jpg', 23.99, 5.99, 'Hardcopy', 1.30, 0, '2025-09-16 19:20:07'),
(35, 'Into Thin Air', 'Jon Krakauer', 'A gripping firsthand account of the 1996 Mount Everest disaster that claimed several climbers’ lives.', 'images/into_thin_air.jpg', 20.00, 4.99, 'CD', 0.35, 0, '2025-09-16 19:20:07'),
(36, 'Bad Blood: Secrets and Lies in a Silicon Valley Startup', 'John Carreyrou', 'The shocking true story of the Theranos scandal and its founder Elizabeth Holmes.', 'images/bad_blood.jpg', 19.99, 4.50, 'Hardcopy', 0.85, 0, '2025-09-16 19:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `quantity` int DEFAULT '1',
  `added_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Confirmed','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `total_amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `quantity` int DEFAULT '1',
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `order_id` (`order_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` enum('CreditCard','DD','Cheque','VPP') DEFAULT NULL,
  `status` enum('Pending','Completed','Failed') DEFAULT 'Pending',
  `payment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
