-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 11:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login-register`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `sid` varchar(25) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`sid`, `lname`, `fname`, `email`, `password`) VALUES
('A21-041', 'Sherer', 'undefined', 'shake-192@taylorswift.com', '$2y$10$JmGt2VUMev9qnD7HymNdeOdDbfz9ejCKAmMd.TroNnLMpXR0nWQEW'),
('A21-0412', 'Sayers', 'Lilah', 'ericksonmolino@gmail.com', '$2y$10$iMxPps8ofmutSIjWW4g3iegEUs0P2evdFNQ6cBPUgWj5XSEg7nB2G'),
('A21-0413', 'Molino', 'Erciskon', 'er@gmail.com', '$2y$10$Ynw5SJ/rwvd6lgGx4u.5GemEbNMJrgH8ixaYVUsTDW8vIB6/N1AY6'),
('A21-0414', 'Molino', 'Erciskon', 'erif@gmail.com', '$2y$10$S9pByYLphiemrorMSQYxZO7ppDY1N.Fg1HK6Il8LeH78NiN66RBPe'),
('A21-0489', 'Sherer', 'Molino', 'ericsksonmolino0510@gmail.com', '$2y$10$zQPjve/PmjCQb12zifM3jeGM.EtnXgmbVFUUd9Bq08pYQG9b.35K.'),
('A23-321', 'Erickson', 'Molino', 'nach@scze.com', '$2y$10$UnqWwMpkgnukTqj0q87f3usBm42/fy6Xd2KsBRB6ZmXjbe3VHry1m'),
('dsad', 'fadsf', 'A21-0411', '', '$2y$10$otJqZs6yc1pd6Y0JwInakuwGm9icIh8WoYqeC5hygMWw8VXyW8l0u'),
('Sherer', 'Lilah', 'A21-0411', 'ericksonmolino0510@gmail.com', '$2y$10$cj0iJM3p0NkdpOXuKtU3nOUIiGtHgexh7lMmktRbRGKbP4Y0yv9eO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
