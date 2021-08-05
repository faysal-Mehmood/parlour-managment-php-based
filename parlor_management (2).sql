-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 12:39 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parlor_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_phone` varchar(100) NOT NULL,
  `appointment_service` varchar(100) NOT NULL,
  `appointment_date` varchar(100) NOT NULL,
  `appointment_token` varchar(100) NOT NULL,
  `appointment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `ip_add`, `user_id`, `qty`) VALUES
(32, 2, '::1', 2, 1),
(35, 1, '::1', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `domain_name` varchar(100) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `site_slogan` varchar(100) NOT NULL,
  `site_description` varchar(100) NOT NULL,
  `site_keywords` varchar(100) NOT NULL,
  `web_email` varchar(100) NOT NULL,
  `web_phone` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `domain_name`, `site_title`, `site_slogan`, `site_description`, `site_keywords`, `web_email`, `web_phone`, `user_name`, `user_pass`) VALUES
(1, 'http://localhost/parlor/', 'Parlor Management', 'We Care ', 'test', 'test', 'admin@test.com', '0301-111111', '923406018013', 'faisu@1122');

-- --------------------------------------------------------

--
-- Table structure for table `item_rating`
--

CREATE TABLE `item_rating` (
  `ratingId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_rating`
--

INSERT INTO `item_rating` (`ratingId`, `itemId`, `userId`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(6, 12345678, 1234567, 4, 'facial careem', 'Product result is fantastic with no side effect.price is reasonable.', '2020-08-11 11:37:45', '2020-08-11 11:37:45', 1),
(7, 12345678, 1234567, 1, 'wax cream', 'best option for hair removal.no need for other things', '2020-08-11 11:40:26', '2020-08-11 11:40:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `reciever_phone` varchar(100) NOT NULL,
  `reciever_city` varchar(100) NOT NULL,
  `reciever_postal_code` varchar(100) NOT NULL,
  `reciever_home_address` varchar(1000) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_token` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_description`, `product_token`, `active`) VALUES
(1, 'MakeUp Base', '20', 'Relax those nerves with a GharPar massage. All our masseuses come equipped with a massage table!', '1594578381AA', 'yes'),
(2, 'Wax Cream', '10', 'What is a hair removal cream? Hair removal creams and lotions, also known as depilatories, can quickly and painlessly remove hair from the face!', '1594578408QZ', 'yes'),
(3, 'Facial Cream', '25', 'Face Cream but your nose or skin prefers moisturizer without added scent, you will love the fragrance-free version. You still get all the plumping!', '1594578431BI', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_description` varchar(1000) NOT NULL,
  `service_price` varchar(100) NOT NULL,
  `service_token` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_description`, `service_price`, `service_token`, `active`) VALUES
(1, 'Massage', 'Relax those nerves with a GharPar massage. All our masseuses come equipped with a massage table!', '$10', '1594578108MT', 'yes'),
(2, 'Nails', 'We offer a full mani pedi service, with file, shape. cuticle work, hand and foot scrub and massage', '$5', '1594578163GA', 'yes'),
(3, 'Makeup', 'Flawless makeup to make you look and feel your best. We bring everything you need!', '$20', '1594578190KA', 'yes'),
(4, 'Facial', 'Indulge in a luxury facial delivered to your home. Choose from a range of facials.', '$50', '1594578212TS', 'yes'),
(5, 'Hair', 'From bouncy blowdry to festival braiding, we can solve your daily hair needs.', '$15', '1594578229SI', 'yes'),
(6, 'Waxing', 'Hassle and pain free wax for quick hair removal based on your skin type. Choose from Sugar or Fruit.', '$5', '1594578258GD', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_slug` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_dob` varchar(100) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_slug`, `user_phone`, `user_dob`, `user_level`) VALUES
(1, 'saliha', 'faisy@gmail.com', '71112dcbe9a8ff9c204efb09d30a1f40', 'saliha', '03406018013', '12/06/2000', 'admin'),
(2, 'faisal saleh hayat', 'faisal@gmail.com', '202cb962ac59075b964b07152d234b70', 'faisal-saleh-hayat', '03406018013', '18/07/1996', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
