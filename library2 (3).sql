-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 06:18 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library2`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `isbn` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `synopsis` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `synopsis`, `author`, `publisher`, `category`, `language`, `created_at`, `updated_at`) VALUES
(5, '12434', 'Agrobook', '-', 'Bollan Hert', 'Nelson', 'Non fiction', 'English', '2022-12-04 02:00:22', NULL),
(6, '54324', 'Fluid', '-', 'Herry tyson', 'Zerrony', 'Nonfiction', 'English', '2022-12-04 02:04:02', NULL),
(7, '23487', 'Fall', '-', 'Gerry Gollider', 'Sean', 'Fiction', 'English', '2022-12-04 02:05:29', NULL),
(8, '32345', 'History of Phyramid', '-', 'Angel Loana', 'Ryozon media', 'Fiction', 'English', '2022-12-04 02:07:13', NULL),
(9, '12543', 'Hero', '-', 'Anonym', 'Lettopedia', 'Fiction', 'English', '2022-12-04 02:08:24', NULL),
(10, '12348', 'Growth', '-', 'Bitter Ball', 'Frezzon', 'Fiction', 'English', '2022-12-04 02:09:49', NULL),
(11, '21345', 'Wikibook', '-', 'Ryana', 'Bellbook', 'Nonfiction', 'English', '2022-12-04 02:10:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_trxs`
--

CREATE TABLE `book_trxs` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `type` enum('fine','borrow') COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book_trxs`
--

INSERT INTO `book_trxs` (`id`, `member_id`, `quantity`, `type`, `price`, `created_at`, `updated_at`) VALUES
(21, 5, 2, NULL, 10000, '2022-12-04 08:41:26', NULL),
(23, 7, 3, NULL, 15000, '2022-12-04 08:46:23', NULL),
(24, 7, 1, NULL, 5000, '2022-12-04 09:49:11', NULL),
(25, 6, 3, NULL, 15000, '2022-12-04 11:04:06', NULL),
(26, 5, 2, NULL, 10000, '2022-12-04 19:03:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_books`
--

CREATE TABLE `borrow_books` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `trx_date` datetime DEFAULT NULL,
  `deadline_at` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

CREATE TABLE `borrow_details` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `borrow_id` int(11) DEFAULT NULL,
  `deadline_at` date DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_details`
--

INSERT INTO `borrow_details` (`id`, `book_id`, `borrow_id`, `deadline_at`, `note`, `created_at`, `updated_at`) VALUES
(39, 10, 21, '2022-12-09', NULL, '2022-12-04 08:41:26', NULL),
(40, 8, 21, '2022-12-09', NULL, '2022-12-04 08:41:26', NULL),
(46, 10, 23, '2022-12-09', NULL, '2022-12-04 08:46:23', NULL),
(47, 5, 23, '2022-12-09', NULL, '2022-12-04 08:46:23', NULL),
(48, 10, 23, '2022-12-09', NULL, '2022-12-04 08:46:23', NULL),
(49, 11, 24, '2022-12-09', NULL, '2022-12-04 09:49:11', NULL),
(50, 7, 25, '2022-12-09', NULL, '2022-12-04 11:04:06', NULL),
(51, 5, 25, '2022-12-09', NULL, '2022-12-04 11:04:06', NULL),
(52, 10, 25, '2022-12-09', NULL, '2022-12-04 11:04:06', NULL),
(53, 9, 26, '2022-12-10', NULL, '2022-12-04 19:03:55', NULL),
(54, 8, 26, '2022-12-10', NULL, '2022-12-04 19:03:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_return`
--

CREATE TABLE `borrow_return` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `detail_id` int(11) DEFAULT NULL,
  `return_at` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id`, `username`, `name`, `email`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(26, 'Hansen', 'Hansen', 'Hansen@gmail.com', '$2y$10$Dm5xrPl6inY64UMbfKSxe.aTFCiNRb4A/BzE6v1V3z5pFrbEsgnJm', 'd419fce03db88fefa423933ef49a2b3d.png', '2022-12-04 02:17:16', NULL),
(27, 'Reza', 'Reza', 'Reza@gmail.com', '$2y$10$maJpDdkTbH6PRRgjc7eq3.ElNTzXW51INtURcS.GcpIZBLwEEsunG', 'fc36030b26fb7fee74ea48c3c9a27647.png', '2022-12-04 02:18:07', NULL),
(28, 'Rina', 'Rina', 'Rina@gmail.com', '$2y$10$Ectd5NCGaORePO51xden0uHXLTwA0q7LHNE2Ih.Eeyz/C7JcbcB7a', 'ffb4ee1bcf106260cd1ee6b0ad96ced7.png', '2022-12-04 02:18:49', NULL),
(29, 'Salsa', 'Salsa', 'Salsa@gmail.com', '$2y$10$pxGviZyFoG7BtHlLxAoAaewv49k.Su/j2ddj2o1WUNzzJdN95KGju', 'ee2c33ce3e073c11e3f2e2915ff05d03.png', '2022-12-04 02:20:20', NULL),
(30, 'user', 'user', 'user@anonym.com', '$2y$10$TlMgwL0ndxCPfZNKbeqbw.gmwGhZzWgBbGg5wxQ2BXMor7vD2FZu2', 'e2fe9bc78142deeaa81ba4fc391c956e.png', '2022-12-04 02:21:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `born_place` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `born_date` date NOT NULL,
  `gender` enum('L','P','O') COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` enum('WNI') COLLATE utf8_unicode_ci DEFAULT 'WNI',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nik`, `full_name`, `phone`, `address`, `born_place`, `born_date`, `gender`, `country`, `nationality`, `is_active`, `created_at`, `updated_at`) VALUES
(5, '1234567897', 'Rian', '09876576487', 'Jakarta', 'Jakarta', '1999-03-21', 'L', 'Indonesia', 'WNI', 1, '2022-12-04 02:22:39', NULL),
(6, '23456545654', 'Frendy', '0897645635', 'Bengkulu', 'Bengkulu', '2022-03-21', 'L', 'Indonesia', 'WNI', 1, '2022-12-04 02:24:17', NULL),
(7, '34542345678', 'Reyvando', '089756464747', 'Balikpapan', 'Semarang', '1997-11-21', 'L', 'Indonesia', 'WNI', 1, '2022-12-04 02:25:33', NULL),
(8, '34556435345', 'Angga', '089765646565', 'Tangerang', 'Yogyakarta', '1995-04-23', 'L', 'Indonesia', 'WNI', 1, '2022-12-04 02:26:53', NULL),
(9, '087656454756', 'Indah', '085956989485', 'Balikpapan', 'Yogyakarta', '2022-02-21', 'P', 'Indonesia', 'WNI', 1, '2022-12-04 02:28:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_trxs`
--

CREATE TABLE `member_trxs` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `subs_id` int(11) DEFAULT NULL,
  `trx_date` datetime DEFAULT NULL,
  `active_at` date DEFAULT NULL,
  `expire_at` date DEFAULT NULL,
  `status` enum('paid','unpaid') COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_order` double DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_trxs`
--

INSERT INTO `member_trxs` (`id`, `member_id`, `subs_id`, `trx_date`, `active_at`, `expire_at`, `status`, `total_order`, `note`, `created_at`, `updated_at`) VALUES
(6, 1, 1, '2022-12-04 07:09:44', '2022-03-12', '2022-06-12', 'paid', 10000, 'ddsd', '2022-12-04 00:09:44', NULL),
(7, 3, 1, '2022-12-04 04:59:17', '2022-02-12', '2022-05-12', 'paid', 10000, 'ddsd', '2022-12-03 21:59:17', NULL),
(8, 1, 1, '2022-12-04 05:18:01', '2022-12-12', '2023-03-12', 'unpaid', 10000, 'jgjhjhk', '2022-12-03 22:18:01', NULL),
(9, 1, 1, '2022-12-04 05:26:56', '2022-12-12', '2023-03-12', 'paid', 10000, 'udufhj', '2022-12-03 22:26:56', NULL),
(17, 6, 6, '2022-12-04 09:36:40', '2022-12-11', '2023-03-11', 'paid', 40000, '-', '2022-12-04 02:36:40', NULL),
(18, 7, 5, '2022-12-04 09:42:02', '2022-11-10', '2023-01-10', 'paid', 27000, '-', '2022-12-04 02:42:02', NULL),
(19, 8, 7, '2022-12-04 09:41:50', '2022-12-11', '2023-04-11', 'paid', 55000, '-', '2022-12-04 02:41:50', NULL),
(20, 5, 4, '2022-12-04 09:41:13', '2022-12-12', '2023-01-12', 'paid', 20000, '-', '2022-12-04 02:41:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `month` tinyint(6) NOT NULL,
  `price` float NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `title`, `month`, `price`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'One', 1, 20000, 1, '2022-12-04 02:33:14', NULL),
(5, 'Two', 2, 27000, 1, '2022-12-04 02:34:16', NULL),
(6, 'Three', 3, 40000, 1, '2022-12-04 02:34:45', NULL),
(7, 'Four', 4, 55000, 1, '2022-12-04 02:35:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_trxs`
--
ALTER TABLE `book_trxs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `borrow_books`
--
ALTER TABLE `borrow_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrow_details_ibfk_1` (`borrow_id`);

--
-- Indexes for table `borrow_return`
--
ALTER TABLE `borrow_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_trxs`
--
ALTER TABLE `member_trxs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `book_trxs`
--
ALTER TABLE `book_trxs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `borrow_books`
--
ALTER TABLE `borrow_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrow_details`
--
ALTER TABLE `borrow_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `borrow_return`
--
ALTER TABLE `borrow_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `librarians`
--
ALTER TABLE `librarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member_trxs`
--
ALTER TABLE `member_trxs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_trxs`
--
ALTER TABLE `book_trxs`
  ADD CONSTRAINT `book_trxs_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD CONSTRAINT `borrow_details_ibfk_1` FOREIGN KEY (`borrow_id`) REFERENCES `book_trxs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
