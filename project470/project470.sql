-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 03:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project470`
--

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `req_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`req_id`, `sender_id`, `receiver_id`, `date`, `status`) VALUES
(32, 17, 18, '2024-04-02 19:04:29', 'friends'),
(34, 17, 15, '2024-04-02 19:04:33', 'friends'),
(35, 15, 16, '2024-04-02 19:05:04', 'friends'),
(36, 18, 15, '2024-04-02 19:05:26', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `age`, `date`, `email`, `password`, `image`, `country`) VALUES
(15, 'adiba', 22, '2024-03-26 21:15:27', 'adiba@mail.com', '$2y$10$e31yliq1Sal9sE5QSNUlM.mewzYsyN2.KdsMKfLGH42UJMig8ka.G', 'uploads/1711524370download.png', 'Bangladesh'),
(16, 'pika', 15, '2024-04-01 12:19:26', 'pika@mail.com', '$2y$10$wWv5J6Pelkckr4WLenS34.JVYhY/pPHmRecKRghhh0iP3eekMvuUq', 'uploads/17119539187a1cb2039c84ad740c575c128c905509.jpg', 'Japan'),
(17, 'melody', 25, '2024-04-01 12:20:12', 'melo@mail.com', '$2y$10$AU6GmllIXH4Ji1VtdE1UnO6EMgglsrAYTw3XRX7LiFB0Q.J8W.qCS', 'uploads/1711953951cute_sanrio_my_melody_by_pokefan276_dfzehd3-fullview.jpg', 'Japan'),
(18, 'bob', 134, '2024-04-02 16:37:13', 'bob@mail.com', '$2y$10$i74VRDfKl50NquJSTxEfi.9ovTSGW7zGXjLnOYLw/URsjjjzs5p6m', 'uploads/1712054302F9xhN65WQAATLoU.jpg', 'Sea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relations`
--
ALTER TABLE `relations`
  ADD CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
