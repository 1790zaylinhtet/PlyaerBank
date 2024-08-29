-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2024 at 10:15 AM
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
-- Database: `walletDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminName` varchar(30) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `keycode` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` int(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminName`, `photo`, `email`, `password`, `keycode`, `phone`, `role`, `status`, `created_at`, `updated_at`) VALUES
(23, 'Thiha Htet', 'https://i.ibb.co/48vBhbS/photo-2024-01-11-12-37-33-AM.jpg', 'thihahtet2004@gmail.com', '92c9eb14340de19be99113906ba0eb08', 'VOwJp', '09764964717', 1, 'active', '2024-03-19 08:51:20', '2024-03-19 08:51:20'),
(24, 'Thant Zin Aung', 'https://i.ibb.co/Mh77qnC/background-cover.png', 'tza123@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '&mFNW', '097364636363', 1, 'active', '2024-04-25 09:41:14', '2024-04-25 09:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `adminid` int(11) NOT NULL,
  `log` longtext DEFAULT NULL,
  `operationTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminwallet`
--

CREATE TABLE `adminwallet` (
  `adminWalletid` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `pointName` varchar(30) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminwallet`
--

INSERT INTO `adminwallet` (`adminWalletid`, `name`, `pointName`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'mobile Legend', 'diamond', 100600, '2024-03-25 20:02:48', '2024-03-25 20:02:48'),
(2, 'pubg', 'uc', 1000000, '2024-04-29 20:18:38', '2024-04-29 20:18:38'),
(3, 'money', 'mmk', 300000, '2024-05-05 04:08:37', '2024-05-05 04:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `cashin`
--

CREATE TABLE `cashin` (
  `cashInid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `screenshot` text NOT NULL,
  `amount` int(255) NOT NULL,
  `transcionId` text NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cashin`
--

INSERT INTO `cashin` (`cashInid`, `userid`, `screenshot`, `amount`, `transcionId`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'https://i.ibb.co/ZKNDf0m/5000or-More-MLBB-Diamonds.png', 1000, 'ageq434g3g', 'APPROVE', '2024-04-04 18:37:21', '2024-04-04 18:37:21'),
(2, 12, 'https://i.ibb.co/ZKNDf0m/5000or-More-MLBB-Diamonds.png', 5000, 'ageq434g3g', 'APPROVE', '2024-04-04 18:45:41', '2024-04-04 18:45:41'),
(3, 12, 'https://i.ibb.co/ZKNDf0m/5000or-More-MLBB-Diamonds.png', 350, 'ageq434g3g', 'pending', '2024-04-04 20:50:49', '2024-04-04 20:50:49'),
(4, 1, 'https://i.ibb.co/ZKNDf0m/5000or-More-MLBB-Diamonds.png', 350, '4236hs h ', 'APPROVE', '2024-04-04 20:51:52', '2024-04-04 20:51:52'),
(5, 12, 'https://i.ibb.co/BBdKyCb/Screenshot-70.png', 200000, '8374763673636', 'APPROVE', '2024-04-27 08:20:12', '2024-04-27 08:20:12'),
(6, 13, 'https://i.ibb.co/yp0j1sG/background-cover.png', 200000, '3989483833', 'APPROVE', '2024-04-27 08:50:18', '2024-04-27 08:50:18'),
(7, 14, 'https://i.ibb.co/D7fH0pW/cat-mouths.jpg', 300000, '239348378373', 'APPROVE', '2024-04-27 10:10:08', '2024-04-27 10:10:08'),
(8, 15, 'https://i.ibb.co/D5p9f7H/dota2.jpg', 300, '11', 'APPROVE', '2024-04-30 08:55:22', '2024-04-30 08:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE `cashout` (
  `cashOutid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `accountName` varchar(20) NOT NULL,
  `accountNumber` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cashout`
--

INSERT INTO `cashout` (`cashOutid`, `userid`, `amount`, `accountName`, `accountNumber`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 'htet Thiha', '09794866365', '2024-04-05 05:08:03', '2024-04-05 05:08:03'),
(2, 1, 5000, 'blacksky', '097655444443', '2024-04-27 09:02:32', '2024-04-27 09:02:32'),
(3, 1, 5000, 'blacksky', '09983737473', '2024-04-27 09:12:22', '2024-04-27 09:12:22'),
(4, 1, 1100, 'blacksky', '203938282873', '2024-04-27 09:16:00', '2024-04-27 09:16:00'),
(5, 13, 5000, 'blacksky', '29383828378', '2024-04-27 09:17:38', '2024-04-27 09:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameid` int(11) NOT NULL,
  `gameName` varchar(30) NOT NULL,
  `unitName` varchar(20) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `icon` varchar(50) NOT NULL,
  `aboutGame` longtext DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gameid`, `gameName`, `unitName`, `photo`, `icon`, `aboutGame`, `link`, `created_at`, `updated_at`) VALUES
(1, 'mobile Legend', 'diamond', 'https://i.ibb.co/8YDMkwg/mlbb.jpg', 'https://i.ibb.co/pLzdTzq/mobile-Legend.webp', '5 vs 5', 'https://m.mobilelegends.com/en', '2024-03-07 21:47:57', '2024-03-07 21:47:57'),
(2, 'pubg', 'uc', 'https://i.ibb.co/nwkZnpD/pubg.jpg', 'https://i.ibb.co/qR9DXqh/pubg.webp', 'battle', 'https://www.pubgmobile.com/en-US/home.shtml', '2024-03-08 09:14:55', '2024-03-08 09:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageid` int(11) NOT NULL,
  `talker` varchar(20) NOT NULL,
  `listener` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `operationTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `miniGame`
--

CREATE TABLE `miniGame` (
  `id` int(11) NOT NULL,
  `gameName` varchar(30) NOT NULL,
  `about` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `miniGame`
--

INSERT INTO `miniGame` (`id`, `gameName`, `about`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Simon Game', 'The game is basically a memory game. Simon lights one of the coloured pads and sounds a tone, then two, then three, etc. Players attempt to match Simon by pressing the pads in the proper sequence. If someone fails, they get a \'raspberry\' and are out of the game.', 'https://i.ibb.co/3rv976g/simongame.png', '2024-05-03 05:33:53', '2024-05-03 05:33:53'),
(2, 'Memoary Game', 'The game consists of an even number of tiles with images on one side and a generic back. Each image appears on precisely two tiles. When the game starts, all tiles are turned face down. The player then flips over two cards, selecting them by clicking on them..', 'https://i.ibb.co/52SRQRP/memoary-Game.jpg', '2024-05-03 05:35:58', '2024-05-03 05:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `transitionctoc`
--

CREATE TABLE `transitionctoc` (
  `ctocid` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `pointName` varchar(30) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `description` text DEFAULT NULL,
  `operationTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transitionctoc`
--

INSERT INTO `transitionctoc` (`ctocid`, `senderid`, `receiverid`, `pointName`, `amount`, `description`, `operationTime`) VALUES
(2, 1, 3, 'diamond', 50, 'tip', '2024-03-21 17:30:00'),
(3, 1, 3, 'diamond', 300, NULL, '2024-05-04 21:39:12'),
(4, 2, 1, 'diamond', 500, NULL, '2024-05-04 21:39:55'),
(5, 2, 3, 'diamond', 300, NULL, '2024-05-04 21:40:15'),
(6, 1, 14, 'mmk', 500, '', '2024-05-04 23:28:28'),
(7, 1, 14, 'mmk', 600, '', '2024-05-04 23:29:26'),
(8, 1, 14, 'mmk', 600, '', '2024-05-04 23:30:09'),
(9, 1, 14, 'mmk', 500, '', '2024-05-04 23:31:16'),
(10, 1, 14, 'diamond', 10, '', '2024-05-05 03:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `transitionctog`
--

CREATE TABLE `transitionctog` (
  `ctogid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `fee` bigint(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `operationTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transitionctog`
--

INSERT INTO `transitionctog` (`ctogid`, `userid`, `gameid`, `amount`, `fee`, `description`, `operationTime`) VALUES
(1, 3, 1, 1000, 100, 'buy', '2024-05-04 23:04:56'),
(2, 4, 1, 2000, 200, 'buy', '2024-05-04 23:04:59'),
(3, 4, 1, 4000, 400, 'withdraw', '2024-05-04 23:05:03'),
(4, 3, 1, 2000, 200, 'withdraw', '2024-05-04 23:05:09'),
(5, 3, 1, 6000, 600, 'withdraw', '2024-05-04 23:05:14'),
(6, 4, 1, 1000, 100, 'buy', '2024-05-04 23:05:18'),
(7, 1, 2, 300, 30, 'withdraw', '2024-05-05 03:44:27'),
(8, 14, 1, 500, 25, 'withdraw', '2024-05-05 07:12:19'),
(9, 14, 1, 5, 0, 'withdraw', '2024-05-05 07:13:17'),
(10, 14, 1, 5, 0, 'withdraw', '2024-05-05 07:14:39'),
(11, 14, 1, 5, 0, 'withdraw', '2024-05-05 07:16:39'),
(12, 14, 1, 100, 500, 'buy', '2024-05-05 07:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitid` int(11) NOT NULL,
  `unitName` varchar(20) NOT NULL,
  `gameid` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `price` bigint(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitid`, `unitName`, `gameid`, `product`, `price`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'diamond', 1, '10', 1000, 'https://i.ibb.co/0Gyv5CB/5000or-More-MLBB-Diamonds.png', '2024-04-29 09:19:17', '2024-04-29 09:19:17'),
(2, 'diamond', 1, '100', 10000, 'https://i.ibb.co/0Gyv5CB/5000or-More-MLBB-Diamonds.png', '2024-04-29 09:21:13', '2024-04-29 09:21:13'),
(3, 'diamond', 1, '100', 10000, 'https://i.ibb.co/0Gyv5CB/5000or-More-MLBB-Diamonds.png', '2024-04-29 09:21:19', '2024-04-29 09:21:19'),
(4, 'diamond', 1, '10000', 100000, 'https://i.ibb.co/0Gyv5CB/5000or-More-MLBB-Diamonds.png', '2024-04-29 09:23:30', '2024-04-29 09:23:30'),
(5, 'diamond', 1, '50000', 500000, 'https://i.ibb.co/0Gyv5CB/5000or-More-MLBB-Diamonds.png', '2024-04-29 09:25:00', '2024-04-29 09:25:00'),
(6, 'uc', 2, '10', 1000, 'https://i.ibb.co/Qc7g4Ms/uc.jpg', '2024-04-29 09:29:13', '2024-04-29 09:29:13'),
(7, 'uc', 2, '100', 10000, 'https://i.ibb.co/Qc7g4Ms/uc.jpg', '2024-04-29 09:31:52', '2024-04-29 09:31:52'),
(8, 'uc', 2, '1000', 100000, 'https://i.ibb.co/Qc7g4Ms/uc.jpg', '2024-04-29 09:33:07', '2024-04-29 09:33:07'),
(9, 'uc', 2, '10000', 100000, 'https://i.ibb.co/Qc7g4Ms/uc.jpg', '2024-04-29 09:33:47', '2024-04-29 09:33:47'),
(10, 'uc', 2, '50', 5000, 'https://i.ibb.co/Qc7g4Ms/uc.jpg', '2024-04-29 09:34:40', '2024-04-29 09:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nrcNumber` varchar(20) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `photo`, `email`, `phone`, `password`, `nrcNumber`, `dateOfBirth`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Htet Thiha aung', 'cat_mouth_4.jpg', 'htetthiha@gmail.com', '09794866365', '92c9eb14340de19be99113906ba0eb08', '12/abc(N)12345', '1998-10-25', 'yangon', 'active', '2024-03-03 20:23:01', '2024-03-07 19:24:48'),
(3, 'Zay Linn Htet', 'zlh.jpeg', 'zayzay@gmail.com', '0978856692', '297ad9f71378545add448aa4bc953315', '20/abc(N)12345', '2022-04-02', 'afgadfba', 'active', '2024-03-03 20:23:01', '2024-03-07 19:24:48'),
(4, 'swanhtet', 'sh.jpeg', 'swamswam@gamil.com', '0978856692', 'cc3eb6120325d06a8009d8a7b3b6be5d', '12/AhSaNa(N)123456', '2022-04-23', 'yangon', 'active', '2024-03-04 20:55:09', '2024-03-07 19:24:48'),
(5, 'zaw', 'default.jpeg', 'htet@gmail.com', '0978856692', 'e682e8eada406d89e641a11846ad2c31', '12/AhSaNa(N)123456', '1998-02-03', 'mandalay', 'active', '2024-03-04 20:57:58', '2024-03-07 19:24:48'),
(8, 'htet', 'default.jpeg', 'hfadfhtd@gmail.com', '93534636457', '297ad9f71378545add448aa4bc953315', '20/abc(N)12345', '1988-07-04', 'asgdagv', 'active', '2024-03-04 21:14:09', '2024-03-07 19:24:48'),
(10, 'Thant Zin Aung', NULL, 'tza123@gmail.com', '0988747474646', '1df27d0b99be5c7fa489d97e8150a4c5', '12/OKT(N)383833', '1999-02-02', '1399 Ritter Avenue\r\nSecond Floor', 'disable', '2024-04-25 10:41:00', '2024-04-25 10:41:00'),
(11, 'Thant Zin Aung', 'default.jpeg', 'thantzinaung@gmail.com', '098874746463', '1df27d0b99be5c7fa489d97e8150a4c5', '12/OKT(N)383833', '2024-04-02', '1399 Ritter Avenue\r\nSecond Floor', 'active', '2024-04-25 10:49:19', '2024-04-25 10:49:19'),
(13, 'blacksky', 'Blacksky Game Store Logo 2.png', 'blacksky@gmail.com', '0973736364646', 'cbe29c1be788d2bf54062e0756238192', '12/OKT(N)383833', '2024-04-19', '1399 Ritter Avenue\r\nSecond Floor', 'active', '2024-04-27 08:49:34', '2024-04-27 08:49:34'),
(14, 'perry', 'cat_mouth_4.jpg', 'perry@gmail.com', '093847373733', '92c9eb14340de19be99113906ba0eb08', '12/OKT(N)383833', '2024-04-25', '1399 Ritter Avenue\r\nSecond Floor', 'active', '2024-04-27 10:06:08', '2024-04-27 10:06:08'),
(15, 'Sugar Ko Ko', 'photo_2024-04-30 3.41.35 AM.jpeg', 'kokokalaylay@gmail.com', '0978856692', 'a22d2da35862f8a243818ab295c92eab', '13/OuKaTa(N)202052', '1984-03-12', 'bdsbs', 'active', '2024-04-30 08:48:20', '2024-04-30 08:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `id` int(11) NOT NULL,
  `visitorCount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`id`, `visitorCount`, `date`) VALUES
(1, 493, '2024-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `walletid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pointName` varchar(30) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`walletid`, `userid`, `username`, `pointName`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Htet Thiha aung', 'mmk', 21250, '2024-04-04 20:31:33', '2024-04-04 20:31:33'),
(2, 1, 'Htet Thiha aung', 'diamond', 99190, '2024-04-04 20:31:54', '2024-04-04 20:31:54'),
(3, 13, 'blacksky', 'mmk', 795000, '2024-04-27 08:49:34', '2024-04-27 08:49:34'),
(4, 13, 'blacksky', 'diamond', 500, '2024-04-27 09:55:20', '2024-04-27 09:55:20'),
(5, 14, 'perry', 'mmk', 291700, '2024-04-27 10:06:08', '2024-04-27 10:06:08'),
(6, 14, 'perry', 'diamond', 380, '2024-04-27 11:06:33', '2024-04-27 11:06:33'),
(7, 1, 'Htet Thiha aung', 'uc', 310, '2024-04-29 17:30:32', '2024-04-29 17:30:32'),
(8, 15, 'Sugar Ko Ko', 'mmk', 900, '2024-04-30 08:48:20', '2024-04-30 08:48:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminwallet`
--
ALTER TABLE `adminwallet`
  ADD PRIMARY KEY (`adminWalletid`);

--
-- Indexes for table `cashin`
--
ALTER TABLE `cashin`
  ADD PRIMARY KEY (`cashInid`);

--
-- Indexes for table `cashout`
--
ALTER TABLE `cashout`
  ADD PRIMARY KEY (`cashOutid`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `miniGame`
--
ALTER TABLE `miniGame`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transitionctoc`
--
ALTER TABLE `transitionctoc`
  ADD PRIMARY KEY (`ctocid`);

--
-- Indexes for table `transitionctog`
--
ALTER TABLE `transitionctog`
  ADD PRIMARY KEY (`ctogid`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`walletid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminwallet`
--
ALTER TABLE `adminwallet`
  MODIFY `adminWalletid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cashin`
--
ALTER TABLE `cashin`
  MODIFY `cashInid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cashout`
--
ALTER TABLE `cashout`
  MODIFY `cashOutid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `miniGame`
--
ALTER TABLE `miniGame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transitionctoc`
--
ALTER TABLE `transitionctoc`
  MODIFY `ctocid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transitionctog`
--
ALTER TABLE `transitionctog`
  MODIFY `ctogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unitid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `walletid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
