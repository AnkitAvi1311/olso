-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 06:48 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olso`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_transactions`
--

CREATE TABLE `app_transactions` (
  `t_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `t_time` varchar(100) NOT NULL,
  `t_date` date NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_transactions`
--

INSERT INTO `app_transactions` (`t_id`, `lender_id`, `user_id`, `p_id`, `t_time`, `t_date`, `from_date`, `to_date`, `amount`) VALUES
(1, 5, 1, 2, '12:00 PM', '2019-03-12', '2019-03-20', '2019-03-22', 3000),
(2, 5, 7, 6, '15:00', '2019-03-13', '2019-03-24', '2019-03-27', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `follow_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`follow_id`, `lender_id`, `user_id`) VALUES
(1, 5, 1),
(2, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `lenderdetails`
--

CREATE TABLE `lenderdetails` (
  `id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `panNumber` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `backdetails` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lenderdetails`
--

INSERT INTO `lenderdetails` (`id`, `lender_id`, `panNumber`, `address`, `city`, `state`, `backdetails`) VALUES
(1, 5, '123', '2 No. kuwa, ghatotand, west Bokaro Colliery Division', 'Ramgarh', 'Jharkhand', '{\"gst\":\"123GST\",\"ifsc\":\"SBIN0097\",\"account_number\":\"1234555\"}'),
(4, 11, 'RHEA1233', 'Queen\'s Castle - 1, KIIT University, Patia', 'BHUBANESWAR', 'Queen Castle - 1 KIIT University', '{\"gst\":\"RHEA12334\",\"ifsc\":\"RHEAadaaa\",\"account_number\":\"1234444\"}');

-- --------------------------------------------------------

--
-- Table structure for table `lender_login`
--

CREATE TABLE `lender_login` (
  `lender_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `c_profile` varchar(200) DEFAULT 'default.jpg',
  `pwd_hint` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lender_login`
--

INSERT INTO `lender_login` (`lender_id`, `fname`, `email`, `phone`, `pwd`, `c_profile`, `pwd_hint`) VALUES
(5, 'Ankit Kumar Singh', 'ankitavi11@outlook.com', 7870506027, '$2y$10$REBJWvMIPTFWP.NkBlv79eVADkVkQpAfTKcQzSXGSpbfSY5XtRGCC', 'WhatsApp Image 2018-11-11 at 03.57.58.jpeg', '$2y$10$MiZQ0zSEtMfjWojO7sNepOatgFuuRr5vMMXvT5OoEuqoH8NK1HX96'),
(11, 'Rhea Nandan', 'rhea4094@gmail.com', 7903868278, '$2y$10$Y03LEeEiFNuJ9GmGT03pEeI5dDgyZGP.Ct4/OkfxpHvFiATbMxP3.', '913060.jpg', NULL),
(12, 'Nikhil Johnson', 'nikhil123@gmail.com', 1234567890, '$2y$10$5w15.aU38eofveB5al/pEuBKru4MQpuSmJnSEFaj5X4Hx1hFSU9VW', '925157.jpg', NULL),
(14, 'Ankit Kumar Singh', 'kumar.ankit383@gmail.com', 9199872897, '$2y$10$7qO6aMANK7HxvDOq9RlSYeP3TCgU9kB7XuBa/HejgR/h908g5M.Ra', 'WhatsApp Image 2018-11-11 at 03.57.58.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lender_ratings`
--

CREATE TABLE `lender_ratings` (
  `rating_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lender_ratings`
--

INSERT INTO `lender_ratings` (`rating_id`, `lender_id`, `user_id`, `rating`) VALUES
(1, 5, 1, 5),
(2, 5, 2, 4),
(3, 5, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `baseprice` double DEFAULT '200',
  `perdaycharge` double DEFAULT '30',
  `category` varchar(20) NOT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `product_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_transactions`
--
ALTER TABLE `app_transactions`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `lenderdetails`
--
ALTER TABLE `lenderdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `panNumber` (`panNumber`),
  ADD KEY `lender_id` (`lender_id`);

--
-- Indexes for table `lender_login`
--
ALTER TABLE `lender_login`
  ADD PRIMARY KEY (`lender_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `lender_ratings`
--
ALTER TABLE `lender_ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `lender_id` (`lender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_transactions`
--
ALTER TABLE `app_transactions`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lenderdetails`
--
ALTER TABLE `lenderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lender_login`
--
ALTER TABLE `lender_login`
  MODIFY `lender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lender_ratings`
--
ALTER TABLE `lender_ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lenderdetails`
--
ALTER TABLE `lenderdetails`
  ADD CONSTRAINT `lenderdetails_ibfk_1` FOREIGN KEY (`lender_id`) REFERENCES `lender_login` (`lender_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`lender_id`) REFERENCES `lender_login` (`lender_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
