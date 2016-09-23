-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2016 at 04:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faen`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'dessert'),
(1, 'drink');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `started_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `body`, `started_date`, `end_date`) VALUES
(2, 'Event 2', 'ahf uahsd iuahsudfh', '2016-09-11', '2016-09-20'),
(3, 'Event 3', 'abcdefg', '2016-09-23', '2016-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `image`) VALUES
(17, 'sÆ°á»n xÃ o chua ngá»t', 25000, 'suon-xao-chua-ngot-2.jpg'),
(18, 'cÆ¡m gÃ  náº¥m', 25000, 'IMG_6532-586x229.jpg'),
(19, 'cÆ¡m gÃ  rÃ´ti', 25000, 'maxresdefault.jpg'),
(20, 'BÃºn thá»‹t nÆ°á»›ng', 25000, '1416283892-bun-thit-nuong-4.jpg'),
(21, 'TrÃ  thÃ¡i xanh', 20000, '1379_P_1431332218325.jpg'),
(52, 'NÆ°á»›c me Ä‘Ã¡', 15000, '2016-09-17/meda.jpg'),
(53, 'BÃ¡nh mÃ¬ xÃ¡ xÃ­u', 15000, '2016-09-17/banhmixaxiu-1351657483_500x0.jpg'),
(56, 'Sá»¯a chua dáº»o ', 20000, '2016-09-20/1457954460-avata.jpg'),
(57, 'TrÃ  hoa nhÃ i', 3000, '2016-09-20/jasmine-tea-benefits.jpg'),
(60, 'Háº¡t hÆ°á»›ng dÆ°Æ¡ng', 15000, '2016-09-20/Thumbnail.jpg'),
(62, 'NÆ°á»›c quáº¥t', 15000, '2016-09-20/tra-quat-mat-ong.jpg'),
(63, 'TrÃ  Ä‘Ã o', 20000, '2016-09-20/tra_dao.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `cost` int(20) NOT NULL,
  `date_bought` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `quantity`, `cost`, `date_bought`) VALUES
(1, 'nhai', '4kg', 2000, '2016-09-20 11:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `membership_points`
--

CREATE TABLE `membership_points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `membership_point` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moneys`
--

CREATE TABLE `moneys` (
  `id` int(11) NOT NULL,
  `aspect` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(150) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) NOT NULL,
  `food_id` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `membership_point` int(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `food_id`, `price`, `user_id`, `phone_number`, `membership_point`, `date_created`) VALUES
(32, 17, 9285, 1, 983198900, 929, '2016-09-23 15:49:42'),
(33, 52, 984953, 1, 983198900, 98495, '2016-09-23 15:54:42'),
(34, 17, 93846, 1, 983198900, 9385, '2016-09-23 15:55:48'),
(35, 17, 8828364, 8, 983198900, 882836, '2016-09-23 15:56:44'),
(41, 56, 984955, 1, 983198900, 98496, '2016-09-23 16:05:12'),
(44, 17, 35225, 8, 983198900, 3523, '2016-09-23 20:05:53'),
(45, 17, 12, 8, 983198900, 1, '2016-09-23 20:16:49'),
(47, 21, 25000, 9, 123456789, 2500, '2016-09-23 20:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `phone_number`, `dob`, `address`, `role`, `created`) VALUES
(1, 'Nguyen Thi Thuy Ngan', 'thuyngan', '$2a$10$NreILQX1HxUeNeeiNWiBUeQ0nuPABRcITIiChxQhsOQeR.dopcPey', 0, '2016-09-16', 'nguyen ngoc vu', 'Staff', '2016-09-16 05:40:48'),
(3, 'ngan2', 'ngan2', '$2a$10$JaMMtr.958hMN/FTxCXAUu67Cgu/L2uZDPhX9aiLdLVMdGUcWq0JO', 0, '2016-09-16', 'nnv', 'Manager', '2016-09-16 05:51:39'),
(4, 'vitadolce', 'ngan3', '$2a$10$cL0BluytC5jqBIqFq/m9vuVRWuq.yxKq9NlGjT6fSzamlTkxrg07a', 0, '2016-09-16', 'hjdksghk', 'Manager', '2016-09-16 05:53:36'),
(5, 'fgjakwl', 'hkdlfhgld', '$2a$10$wfisWwhLozP3HduttLqIqu6lbITwAS5amxE8oppKbkbang4mqn2ge', 0, '2016-09-16', 'vdfgvdfg', 'Member', '2016-09-16 06:02:25'),
(6, 'ghdkshk', 'hjfdkghkedshk', '$2a$10$MtiSAhF1QWUGwYW7uc/XoeHxDWzMs9qXUrmfL34IA9EQSkrJBs8PG', 0, '2016-09-16', 'fdgegf', 'Manager', '2016-09-16 06:03:00'),
(7, 'sdgasdg', 'hihi', '$2a$10$UfOB3jsJYdPGGwRczpJYmuJ.fR0a007vWrLosyyFQ/WA.xZdRX6bC', 0, '2016-09-16', 'fdgf', 'Manager', '2016-09-16 06:20:35'),
(8, 'duong nhai', 'gaubong', '$2a$10$bONAVIVwCIHUlxU.oPS8web5TkUwj7CPtZ8WP1Oh8.ZfjWaIR2IlW', 983198900, '2016-09-16', 'phung khoang', 'Staff', '2016-09-16 06:26:29'),
(9, 'sinhpd', 'Pham Dinh Sinh', '$2a$10$clLoozeuGEFZXAv8jGCRJ.i1JiNrx5Lr3qdBXrAl7VKOId9QDR0kW', 123456789, '2016-09-23', 'Thai Binh', 'Manager', '2016-09-23 09:09:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_points`
--
ALTER TABLE `membership_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `moneys`
--
ALTER TABLE `moneys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `phone` (`phone_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `moneys`
--
ALTER TABLE `moneys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membership_points`
--
ALTER TABLE `membership_points`
  ADD CONSTRAINT `membership_points_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `membership_points_ibfk_2` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`),
  ADD CONSTRAINT `purchases_ibfk_3` FOREIGN KEY (`phone_number`) REFERENCES `users` (`phone_number`),
  ADD CONSTRAINT `purchases_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
