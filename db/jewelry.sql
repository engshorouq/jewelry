-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 يناير 2019 الساعة 05:33
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
(2, 'shrooq', '5c24de568f32e271218144603.png'),
(3, 'Rings', '5c38c7063191c110119403805.jpg');

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
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `msg`, `date`, `type`, `status`, `img`) VALUES
(1, 7, 'hi', '2019-01-02 03:07:03', 'request', 'read', ''),
(2, 7, 'fine', '2019-01-02 03:13:58', 'request', 'read', NULL),
(3, 7, 'what about you\r\n', '2019-01-02 03:19:37', 'request', 'read', NULL),
(4, 7, '', '2019-01-02 03:23:52', 'request', 'read', '5c2cc97869c07020119235203.jpg'),
(5, 7, '', '2019-01-02 03:25:12', 'request', 'read', '5c2cc9c8c18b3020119251203.jpg'),
(6, 7, 'i dont understand', '2019-01-02 03:30:13', 'request', 'read', NULL),
(7, 7, '', '2019-01-02 03:34:20', 'request', 'read', '5c2ccbeca127c020119342003.jpg'),
(8, 7, '', '2019-01-02 03:39:54', 'request', 'read', '5c2ccd3ae8794020119395403.png'),
(9, 7, 'hi', '2019-01-02 03:40:47', 'request', 'read', NULL),
(10, 7, 'how are you\r\n', '2019-01-02 06:44:43', 'request', 'read', NULL),
(11, 7, 'mmmm\r\n', '2019-01-02 06:54:38', 'request', 'read', NULL),
(12, 7, 'ok', '2019-01-02 06:55:34', 'request', 'read', NULL),
(13, 7, 'mmmm\r\n', '2019-01-02 07:16:10', 'request', 'read', NULL),
(14, 7, 'jkhfdjd', '2019-01-02 07:16:26', 'request', 'read', NULL),
(15, 7, 'ÙƒØªÙŠØ± Ù…Ù†ÙŠØ­Ø©', '2019-01-02 08:05:05', 'request', 'read', NULL),
(16, 7, 'Ù…Ù…Ù… Ø§ÙˆÙƒ\r\n', '2019-01-02 08:05:30', 'request', 'read', NULL),
(17, 7, 'ok', '2019-01-03 06:35:40', 'request', 'read', NULL),
(18, 7, 'hi', '2019-01-03 08:12:13', 'request', 'read', NULL),
(19, 7, 'how are you', '2019-01-03 08:18:33', 'request', 'read', NULL),
(20, 7, 'how are you\r\n', '2019-01-03 08:54:20', 'request', 'read', NULL),
(21, 7, 'hhhh', '2019-01-03 10:27:04', 'request', 'read', NULL),
(23, 7, '', '2019-01-03 11:05:33', 'request', 'read', '5c2dde6dbd5cd030119053311.jpg'),
(24, 7, 'ok', '2019-01-03 11:21:11', 'request', 'read', NULL),
(25, 7, 'hi\r\n', '2019-01-06 07:01:21', 'request', 'read', NULL),
(26, 7, 'hi\r\n', '2019-01-18 04:06:15', 'request', 'read', NULL),
(27, 7, 'hi\r\n', '2019-01-18 07:36:51', 'request', 'read', NULL),
(28, 8, 'hi\r\n', '2019-01-18 07:51:33', 'request', 'read', NULL),
(29, 8, '', '2019-01-18 07:52:28', 'request', 'read', '5c42206c4e4e5180119522807.png'),
(30, 8, '', '2019-01-18 07:53:10', 'request', 'read', '5c4220962b007180119531007.png'),
(31, 8, 'mmmm', '2019-01-18 07:53:10', 'request', 'read', NULL),
(32, 8, '', '2019-01-18 07:53:43', 'request', 'read', '5c4220b72bb4f180119534307.png'),
(33, 8, 'whast\r\n', '2019-01-18 07:53:43', 'request', 'read', NULL),
(34, 8, 'hi', '2019-01-18 07:56:07', 'request', 'read', NULL),
(35, 8, 'ok', '2019-01-18 07:56:28', 'request', 'read', NULL),
(36, 8, 'hello', '2019-01-18 07:57:29', 'request', 'read', NULL),
(37, 8, '', '2019-01-18 07:57:39', 'request', 'read', '5c4221a358053180119573907.png'),
(38, 8, 'ok delete it\r\n', '2019-01-18 07:58:57', 'request', 'read', NULL),
(39, 6, 'hello m\'s\r\n', '2019-01-18 08:00:46', 'request', 'read', NULL),
(40, 7, 'hi\r\n', '2019-01-19 11:41:49', 'request', 'read', NULL),
(41, 6, 'hi nareman', '2019-01-19 12:05:41', 'request', 'read', NULL),
(42, 6, 'www\r\n', '2019-01-19 12:07:04', 'request', 'read', NULL),
(43, 6, 'hi\r\n', '2019-01-19 12:40:07', 'request', 'read', NULL),
(44, 8, 'how ', '2019-01-25 08:05:19', 'request', 'read', NULL),
(45, 8, 'tres', '2019-01-25 08:24:44', 'request', 'read', NULL),
(46, 8, 'how', '2019-01-25 08:38:28', 'request', 'read', NULL),
(47, 8, '', '2019-01-25 08:39:18', 'request', 'read', '5c4abd26dc3d5250119391808.png'),
(48, 8, '', '2019-01-25 08:58:15', 'request', 'read', '5c4ac197e77a8250119581508.png'),
(49, 8, 'thanks', '2019-01-25 08:58:16', 'request', 'read', NULL),
(50, 8, 'ok', '2019-01-25 09:10:10', 'request', 'read', NULL),
(51, 8, 'mmm', '2019-01-25 09:11:04', 'request', 'read', NULL),
(52, 8, 'hh', '2019-01-25 09:11:31', 'request', 'read', NULL),
(53, 7, '', '2019-01-25 09:22:41', 'request', 'read', '5c4ac7517cfda250119224109.png'),
(54, 7, '', '2019-01-25 09:23:53', 'request', 'read', '5c4ac79955b5f250119235309.png'),
(55, 7, 'hgh', '2019-01-25 09:23:53', 'request', 'read', NULL),
(56, 7, '', '2019-01-25 09:24:36', 'request', 'read', '5c4ac7c4001fe250119243609.png'),
(57, 7, 'ok', '2019-01-26 06:21:14', 'request', 'read', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `delete_conversation`
--

CREATE TABLE `delete_conversation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `delete_conversation`
--

INSERT INTO `delete_conversation` (`id`, `user_id`, `date`, `type`) VALUES
(1, 7, '2019-01-03 08:44:12', 'request'),
(2, 7, '2019-01-18 07:36:16', 'replay'),
(3, 8, '2019-01-18 07:58:43', 'request'),
(4, 8, '2019-01-18 07:56:19', 'replay'),
(5, 6, '2019-01-25 08:44:19', 'replay');

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
(1, 19.75, 23.0285, 29.625, 34.5625, 36.182, 39.5, '2019-01-13 03:25:52');

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
(1, 'product 1', '5c3045037b918050119474706.jpg', 2, 2.5, 22, 1.55, 2, '1122334455', 0),
(2, 'product2', '5c3044f5cfd9b050119473306.jpg', 1, 3.3, 21, 2.8, 2, '1234567895', 0),
(3, 'product3', '5c3044eddaf84050119472506.jpg', 2, 4.7, 22, 2.1, 2, '7788994455', 0),
(5, 'product22', '5c3044e2e7449050119471406.jpg', 1, 4.6, 24, 2.1, 2, '1122445577', 0),
(6, 'product5', '5c3044d733e7a050119470306.jpg', 1, 2.11, 24, 1.2, 2, '1231231234', 0),
(7, 'new product', '5c3044ca80e05050119465006.jpg', 1, 3.55, 21, 2.4, 2, '9876543213', 0),
(8, 'final one', '5c3044bbd3ec6050119463506.jpg', 1, 1.15, 24, 1.3, 2, '4567891235', 0),
(9, 'product', '5c3044b08e2f9050119462406.jpg', 1, 2, 24, 1.9, 2, '1478529623', 0),
(10, 'product full', '5c30444cc668e050119444406.jpg', 2, 2.5, 24, 1.4, 2, '1234565478', 0),
(11, 'final product test', '5c3044418d1fc050119443306.jpg', 2, 2.3, 22, 1.1, 2, '1234567895', 0),
(12, 'finall ', '5c304436b6f70050119442206.jpg', 1, 5.55, 18, 2.88, 2, '1472583698', 0),
(13, 'product1', '5c3044298c0e7050119440906.jpg', 2, 1.55, 24, 0.58, 3, '1234567895', 0),
(14, 'product2', '5c304420196c1050119440006.jpg', 1, 1.88, 22, 1.8, 3, '1478523698', 0),
(15, 'product2', '5c304416de50b050119435006.jpg', 1, 2.44, 22, 1.7, 5, '1478523698', 0),
(16, 'producct1', '5c30440cd5245050119434006.jpg', 2, 22.2, 22, 1.2, 5, '1245678932', 0),
(17, 'sss', '5c30440242057050119433006.jpg', 2, 1.33, 24, 1.2, 5, '1478523698', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `start_event` datetime NOT NULL,
  `price` float NOT NULL,
  `end_event` datetime NOT NULL,
  `title` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `purchase`
--

INSERT INTO `purchase` (`id`, `product_id`, `start_event`, `price`, `end_event`, `title`, `user_id`, `size`, `quantity`) VALUES
(1, 11, '2018-12-31 04:17:11', 1500, '2018-12-31 04:17:11', 'test product', 6, '', ''),
(2, 12, '2019-01-01 07:27:13', 1200, '2019-01-01 07:27:13', 'product 2', 6, '', ''),
(3, 12, '2018-12-31 04:17:11', 2000, '2018-12-31 04:17:11', 'product duplicate', 6, '', ''),
(10, 16, '2019-01-12 08:45:51', 1609, '2019-01-12 08:45:51', 'producct1', 7, '2', '2'),
(11, 15, '2019-01-12 08:45:51', 90, '2019-01-12 08:45:51', 'product2', 7, '5', '1'),
(12, 16, '2019-01-12 08:48:28', 1608.88, '2019-01-12 08:48:28', 'producct1', 7, '2', '2'),
(13, 15, '2019-01-12 08:48:28', 89.9841, '2019-01-12 08:48:28', 'product2', 7, '5', '1'),
(14, 16, '2019-01-12 08:51:21', 1608.88, '2019-01-12 08:51:21', 'producct1', 7, '2', '2'),
(15, 15, '2019-01-12 08:51:21', 89.9841, '2019-01-12 08:51:21', 'product2', 7, '5', '1'),
(16, 11, '2019-01-12 08:54:05', 84.3186, '2019-01-12 08:54:05', 'final product test', 7, '20', '1'),
(17, 13, '2019-01-12 08:55:53', 123.61, '2019-01-12 08:55:53', 'product1', 7, '12', '2'),
(18, 17, '2019-01-12 08:59:41', 53.735, '2019-01-12 08:59:41', 'sss', 7, '55', '1'),
(19, 15, '2019-01-12 09:01:19', 179.968, '2019-01-12 09:01:19', 'product2', 7, '14', '2'),
(20, 16, '2019-01-13 05:43:13', 1608.88, '2019-01-13 05:43:13', 'producct1', 7, '12', '2'),
(21, 5, '2019-01-13 05:45:30', 367.6, '2019-01-13 05:45:30', 'product22', 7, '20', '2'),
(22, 16, '2019-01-13 07:18:47', 1608.88, '2019-01-13 07:18:47', 'producct1', 7, '15', '2'),
(23, 16, '2019-01-13 03:24:07', 4022.2, '2019-01-13 03:24:07', 'producct1', 8, '15', '5'),
(24, 16, '2019-01-25 08:01:58', 804.44, '2019-01-25 08:01:58', 'producct1', 8, '4', '1');

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

--
-- إرجاع أو استيراد بيانات الجدول `replay`
--

INSERT INTO `replay` (`id`, `user_id`, `msg`, `date`, `type`, `status`, `img`) VALUES
(1, 7, 'hi', '2019-01-02 03:10:37', 'relpay', 'read', NULL),
(2, 7, 'ok no problem', '2019-01-02 03:29:23', 'relpay', 'read', NULL),
(3, 7, NULL, '2019-01-02 03:29:36', 'relpay', 'read', '5c2ccad0e1cbf020119293603.png'),
(4, 7, 'ok no problem', '2019-01-02 06:59:40', 'relpay', 'read', NULL),
(5, 7, 'nnnnn', '2019-01-02 07:17:09', 'relpay', 'read', NULL),
(6, 7, 'ok', '2019-01-02 08:04:34', 'relpay', 'read', NULL),
(7, 7, 'ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ', '2019-01-02 08:04:50', 'relpay', 'read', NULL),
(8, 7, 'ØªÙŠØ¨', '2019-01-02 08:05:42', 'relpay', 'read', NULL),
(9, 7, 'nothing', '2019-01-03 11:05:24', 'relpay', 'read', NULL),
(10, 7, 'all message deleted ', '2019-01-03 11:13:50', 'relpay', 'read', NULL),
(11, 7, 'how are you', '2019-01-06 07:01:34', 'relpay', 'read', NULL),
(12, 8, 'hi\r\n', '2019-01-18 07:52:06', 'relpay', 'read', NULL),
(13, 8, NULL, '2019-01-18 07:55:29', 'relpay', 'read', '5c4221210d726180119552907.png'),
(14, 8, 'mmmm', '2019-01-18 07:56:34', 'relpay', 'read', NULL),
(15, 6, 'hello', '2019-01-18 08:01:09', 'relpay', 'read', NULL),
(16, 7, 'how are you\r\n', '2019-01-19 11:41:57', 'relpay', 'read', NULL),
(17, 6, 'how are you', '2019-01-19 12:05:57', 'relpay', 'read', NULL),
(18, 6, 'ppp', '2019-01-19 12:40:17', 'relpay', 'read', NULL),
(19, 6, 'how', '2019-01-25 07:53:24', 'relpay', 'read', NULL),
(20, 6, 'mmm', '2019-01-25 07:54:28', 'relpay', 'read', NULL),
(21, 8, 'hi', '2019-01-25 08:05:12', 'relpay', 'read', NULL),
(22, 8, 'hi', '2019-01-25 08:38:14', 'relpay', 'read', NULL),
(23, 6, 'hi', '2019-01-25 08:47:32', 'relpay', 'unread', NULL),
(24, 6, 'ho', '2019-01-25 08:48:15', 'relpay', 'unread', NULL),
(25, 8, 'hhh', '2019-01-25 08:51:21', 'relpay', 'read', NULL),
(26, 8, 'hhhh', '2019-01-25 09:11:38', 'relpay', 'read', NULL),
(27, 7, NULL, '2019-01-25 09:24:56', 'relpay', 'read', '5c4ac7d874dda250119245609.jpg'),
(28, 8, 'mmm', '2019-01-26 06:20:47', 'relpay', 'unread', NULL),
(29, 7, 'hello', '2019-01-26 06:21:08', 'relpay', 'read', NULL);

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
  `photo` varchar(500) NOT NULL DEFAULT 'default_user.png',
  `phone_number` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `type`, `photo`, `phone_number`) VALUES
(6, 'shrooq', 'shrooq', 'shrooq@shrooq', 'shrooq', 'customer', '5c4ab390b5d1b250119582407.png', '0599777777'),
(7, 'Noor', 'Saad', 'noor@hotmail.com', 'noor', 'saller', '5c2b504ec7357010119343812.png', '0597777779'),
(8, 'soma', 'saaad', 'soma@hotmail.com', 'soma', 'customer', '5c412a4ccac35180119222002.png', '05999999');

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
(2, 7, 500, 'second withdraw', '2018-12-31 01:08:25', 'reject'),
(3, 7, 800, 'test', '2018-12-31 01:09:33', 'accept'),
(4, 7, 200, 'test', '2018-12-31 01:11:29', 'accept'),
(5, 7, 1000, 'final test', '2018-12-31 01:12:03', 'reject'),
(6, 7, 200, 'finall', '2019-01-26 06:12:08', 'reject'),
(7, 7, 300, 'new', '2019-01-26 06:13:38', 'pending'),
(8, 7, 200, 'test', '2019-01-26 06:13:50', 'pending');

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
-- Indexes for table `delete_conversation`
--
ALTER TABLE `delete_conversation`
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
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `delete_conversation`
--
ALTER TABLE `delete_conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `price_gold`
--
ALTER TABLE `price_gold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `replay`
--
ALTER TABLE `replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
