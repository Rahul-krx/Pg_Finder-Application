-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2025 at 05:54 AM
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
-- Database: `pg_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

DROP TABLE IF EXISTS `accommodations`;
CREATE TABLE IF NOT EXISTS `accommodations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text,
  `amenities` text,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` text,
  `image` varchar(255) DEFAULT NULL,
  `rating` float DEFAULT '0',
  `gender` varchar(10) DEFAULT 'both',
  `interested` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `name`, `location`, `city`, `price`, `description`, `amenities`, `contact_number`, `address`, `image`, `rating`, `gender`, `interested`, `created_at`, `updated_at`) VALUES
(1, 'Glory PG', 'Jalandhar,Punjab', 'Jalandhar', 6200.00, 'All fscilities available.', 'wifi, Auro, security 24*7, inverter', '9837893823', 'main market jalandhar', 'pg_images/68583252d02ae.jpg', 4.2, 'both', 44, '2025-06-22 16:41:54', '2025-06-22 16:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$Q5Cu9zLh.z4fpIKuJLHwZexAXBD1jRSFzHABfXbvqEw0l/UAdHJMW', 'admin@pgfinder.com', '2025-06-22 17:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `booking_id` varchar(20) NOT NULL,
  `user_id` int NOT NULL,
  `pg_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `move_in_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_id`, `user_id`, `pg_name`, `address`, `amount`, `payment_method`, `booking_date`, `status`, `move_in_date`, `created_at`) VALUES
(2, 'BK149816', 1, 'Harmony Homes', 'Ferozepur Road, Ludhiana', 3000.00, 'upi', '2025-06-03', 'Confirmed', '2025-06-08', '2025-06-18 07:02:36'),
(3, 'BK902463', 1, 'Perfect PG', 'Main Market Dakoha, Jalandhar', 3000.00, 'netbanking', '2025-05-19', 'Completed', '2025-05-24', '2025-06-18 07:02:36'),
(4, 'BK333322', 1, 'G-1 Apartment', '0', 3500.00, '0', '2025-06-18', 'Pending', '2025-06-25', '2025-06-18 07:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `profile_photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `name`, `phone`, `is_verified`, `created_at`, `profile_photo`) VALUES
(1, '$2y$10$gRDt40RwtW.Xr5Ih.geq0OzOQg3jPqG8gEMmKr2LTuS3fxVwmd4A2', 'ajjubhai12524@gmail.com', 'Aman Kumar', NULL, 1, '2025-06-22 17:37:22', 'profile_photos/68582fc8880e2.jpg'),
(2, '$2y$10$8jh3TTYJcCPYeS/BY1AptO9iZgkPTgPbevIPx70B2IyGuLaeSnNzC', 'info.anshkr74@gmail.com', 'Mohit Raj', NULL, 0, '2025-06-22 22:26:40', NULL),
(3, '$2y$10$xZk84vwccslcBUNbKRN7oebdx/YCIqrWRzdT7Ph8BZ.co1LMfhDcy', 'info.aryan@gmail.com', 'Aryan Verma', NULL, 1, '2025-06-22 22:27:34', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
