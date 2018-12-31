-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 ديسمبر 2018 الساعة 01:45
-- إصدار الخادم: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewelry`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `photo`, `email`, `password`) VALUES
(1, 'shorouq', 'saad', '5c14cf9af1d84151218553810.png', 'shorouq@hotmail.com', 'shorouq');

-- --------------------------------------------------------

--
-- بنية الجدول `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `category`
--

INSERT INTO `category` (`id`, `name`, `photo`) VALUES
(1, 'jhsjdfh', '5c18df3700ab9181218511912.png'),
(2, 'shrooq', '5c24de568f32e271218144603.png');

-- --------------------------------------------------------

--
-- بنية الجدول `commission`
--

CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `value` float NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `commission`
--

INSERT INTO `commission` (`id`, `value`, `last_update`) VALUES
(1, 100, '2018-12-20 01:24:03');

-- --------------------------------------------------------

--
-- بنية الجدول `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` tinytext NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(500) NOT NULL DEFAULT 'request',
  `status` varchar(500) NOT NULL DEFAULT 'unread',
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `price_gold`
--

CREATE TABLE `price_gold` (
  `id` int(11) NOT NULL,
  `price_12` float NOT NULL,
  `price_14` float NOT NULL,
  `price_18` float NOT NULL,
  `price_21` float NOT NULL,
  `price_22` float NOT NULL,
  `price_24` float NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `price_gold`
--

INSERT INTO `price_gold` (`id`, `price_12`, `price_14`, `price_18`, `price_21`, `price_22`, `price_24`, `last_update`) VALUES
(1, 19.75, 23.0285, 29.625, 34.5625, 36.182, 39.5, '2018-12-27 03:13:30');

-- --------------------------------------------------------

--
-- بنية الجدول `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `gold_weight` float NOT NULL,
  `gold_kerat` int(11) NOT NULL,
  `manuf` float NOT NULL,
  `store_id` int(11) NOT NULL,
  `number` varchar(500) NOT NULL,
  `number_buy` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `product`
--

INSERT INTO `product` (`id`, `name`, `photo`, `cat_id`, `gold_weight`, `gold_kerat`, `manuf`, `store_id`, `number`, `number_buy`) VALUES
(1, 'product 1', '5c284ccec5a90301218425405.png', 2, 2.5, 22, 1.55, 2, '1122334455', 0),
(2, 'product2', '5c285060742e2301218580805.png', 1, 3.3, 21, 2.8, 2, '1234567895', 0),
(3, 'product3', '5c28524d1e87c301218062106.png', 2, 4.7, 22, 2.1, 2, '7788994455', 0),
(5, 'product22', '5c28536934135301218110506.png', 1, 4.6, 24, 2.1, 2, '1122445577', 0),
(6, 'product5', '5c2853f0d276c301218132006.png', 1, 2.11, 24, 1.2, 2, '1231231234', 0),
(7, 'new product', '5c285500bd5bc301218175206.jpg', 1, 3.55, 21, 2.4, 2, '9876543213', 0),
(8, 'final one', '5c28bb9b0723f301218353901.png', 1, 1.15, 24, 1.3, 2, '4567891235', 0),
(9, 'product', '5c29332b8911d301218054710.png', 1, 2, 24, 1.9, 2, '1478529623', 0),
(10, 'product full', '5c293f6e8e543301218580610.jpg', 2, 2.5, 24, 1.4, 2, '1234565478', 0),
(11, 'final product test', '5c293fa7bd06a301218590310.jpg', 2, 2.3, 22, 1.1, 2, '1234567895', 0),
(12, 'finall ', '5c29401e9bc61301218010211.png', 1, 5.55, 18, 2.88, 2, '1472583698', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `replay`
--

CREATE TABLE `replay` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` text,
  `date` datetime NOT NULL,
  `type` varchar(500) NOT NULL DEFAULT 'relpay',
  `status` varchar(500) NOT NULL DEFAULT 'unread',
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `f_link` varchar(500) NOT NULL,
  `g_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `mobile`, `image`, `f_link`, `g_link`) VALUES
(2, 'store 11', 'store 11', '0599717796', '5c27bf1042193291218380807.jpg', 'https://www.google.con', 'https://www.google.con'),
(3, 'store22', 'store222', '0599717793', '5c27bff114e5e291218415307.jpg', 'https://www.google.comm', 'https://www.google.comm'),
(5, 'daban', 'al remal ', '0599717795', '5c27ba042705b291218163607.jpg', 'https://www.google.com', 'https://www.google.com');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL DEFAULT 'default_user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `type`, `photo`) VALUES
(6, 'shrooq', 'shrooq', 'shrooq@shrooq', 'shrooq', 'customer', 'default_user.png'),
(7, 'noor', 'saad', 'noor@noor', 'noor', 'saller', 'default_user.png');

-- --------------------------------------------------------

--
-- بنية الجدول `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `saller_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` tinytext NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `withdraw`
--

INSERT INTO `withdraw` (`id`, `saller_id`, `amount`, `description`, `date`, `status`) VALUES
(1, 7, 200, 'first withdraw', '2018-12-31 12:38:46', 'accept'),
(2, 7, 500, 'second withdraw', '2018-12-31 01:08:25', 'pending'),
(3, 7, 800, 'test', '2018-12-31 01:09:33', 'pending'),
(4, 7, 200, 'test', '2018-12-31 01:11:29', 'pending'),
(5, 7, 1000, 'final test', '2018-12-31 01:12:03', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_gold`
--
ALTER TABLE `price_gold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replay`
--
ALTER TABLE `replay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_gold`
--
ALTER TABLE `price_gold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `replay`
--
ALTER TABLE `replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
