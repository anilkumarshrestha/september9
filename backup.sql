-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2018 at 07:02 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `september9`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Anil K Shrestha', 'anil', 'admin', 'anil@gmail.com\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `image`) VALUES
(1, 'images/carousel/SEPTEMBER9.com.png'),
(2, 'images/carousel/walp.png'),
(4, 'images/carousel/deer.png'),
(6, 'images/carousel/glasses.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `categories` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `name`, `email`, `comment`, `date`) VALUES
(1, 12, 'anil', 'anil@gmail.com', 'this is a comment', '2018-02-19 00:00:00'),
(2, 0, 'anil', 'aaa@gmail.com', 'Hawa jacket', '2018-02-19 11:16:19'),
(3, 26, 'anil', 'aaa@gmail.com', 'a', '2018-02-19 11:23:25'),
(4, 26, 'Anil', 'anil@gmail.com', 'This is a comment on collection', '2018-02-19 12:24:37'),
(5, 27, 'Murari', '', 'This is a very nice shaving brush.', '2018-02-19 15:05:06'),
(6, 27, 'Mala', '', 'Is this smooth?', '2018-02-19 15:11:37'),
(7, 27, 'Murari', '', 'Yes. It is.', '2018-02-19 15:14:34'),
(8, 27, 'Mala', '', 'Thank you.', '2018-02-19 15:17:54'),
(9, 26, 'Karan', 'karan@yahoo.com', 'This collection is cool!', '2018-02-19 17:57:24'),
(10, 22, '', '', '', '2018-02-21 00:09:44'),
(11, 17, 'Murari Kumar Gupta', 'alexgupta2367@gmail.com', 'This is a very good jacket.', '2018-02-21 18:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buyername` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordertime` datetime NOT NULL,
  `delivered` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `buyername`, `address`, `phone`, `ordertime`, `delivered`) VALUES
(5, 17, 'anil', 'tripureshwor', '9860302475', '2018-02-07 14:19:51', 0),
(6, 17, 'Mohan', 'Lazimpath', '9860504048', '2018-02-07 14:57:42', 0),
(7, 21, 'anil', '', '12123123123', '2018-02-09 22:09:55', 0),
(8, 21, 'anil', ';dcj', '12123123123', '2018-02-09 22:10:00', 0),
(9, 22, 'Sanskar', 'KUBH', '9869595949', '2018-02-12 21:55:37', 0),
(19, 22, 'x', 'sdfasdf', '8492352437', '2018-02-14 19:03:11', 0),
(20, 22, 'x', 'laksdjfo', '8492352437', '2018-02-14 19:05:46', 0),
(21, 22, 'x', 'ktm', '8492352437', '2018-02-14 19:06:11', 0),
(22, 22, 'x', 'kubh', '8492352437', '2018-02-14 19:13:09', 0),
(23, 22, 'x', 'kubhhhh', '8492352437', '2018-02-14 19:14:18', 0),
(24, 22, 'x', 'no address,aklshdfkla,nepal', '8492352437', '2018-02-14 19:15:30', 0),
(25, 22, 'x', '', '8492352437', '2018-02-14 19:15:32', 0),
(26, 25, 'x', '1234', '8492352437', '2018-02-14 19:16:48', 0),
(27, 25, 'x', '321', '8492352437', '2018-02-14 19:17:13', 0),
(28, 25, 'x', 'adfs', '8492352437', '2018-02-14 19:20:07', 0),
(29, 25, 'x', 'etdsf', '8492352437', '2018-02-14 19:20:50', 0),
(30, 25, 'x', 'kubh', '8492352437', '2018-02-14 19:24:59', 0),
(31, 25, 'x', 'kubh', '8492352437', '2018-02-14 19:25:06', 0),
(32, 25, 'x', '', '8492352437', '2018-02-14 19:25:09', 0),
(33, 25, 'x', '', '8492352437', '2018-02-14 19:25:10', 0),
(34, 25, 'x', 'wefrwer', '8492352437', '2018-02-14 19:26:16', 0),
(35, 0, 'name', 'address', '999', '2018-02-18 00:00:00', 0),
(36, 27, 'Mr. X', 'KUBH', '9860606060', '2018-02-19 17:21:42', 0),
(37, 22, 'Nilima', 'KUGH', '986050403', '2018-02-19 17:30:13', 0),
(38, 19, 'Karan Rai', 'KUBH', '9818586878', '2018-02-19 17:37:25', 0),
(39, 30, 'Bishal Suntury', 'KUBH', '9860444303', '2018-02-19 17:38:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialoffer` int(11) DEFAULT NULL,
  `cat_id` int(100) NOT NULL,
  `youtubelink` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `tags`, `specialoffer`, `cat_id`, `youtubelink`) VALUES
(17, 'jacket', 'images/25659989_160324974695237_6328427890181477735_n.jpg', 1500, 'jackets', 'jacket', 0, 1, ''),
(19, 'Nike Shoes', 'images/images (9).jpg', 1000, 'Stylish shor for sporty girls', 'sports,shoe,nike', 900, 3, ''),
(21, 'High heel', 'images/22196277_500603470300963_1703600817102980921_n.jpg', 1200, 'High heel for girls', 'heel', 1100, 3, ''),
(22, 'Red nike shoes', 'images/images (8).jpg', 1500, 'Shoe', '', 0, 3, ''),
(23, 'nivia', 'images/nivia.jpg', 4000, 'collection', 'nivia', 0, 2, ''),
(26, 'Collection [purse, belt ]', 'images/41gEXbvhB5L._UX342_.jpg', 2000, '* This is a very good collection.\r\n* It has a high class material made items', 'purse, belt, men, father, boys, boy', 0, 2, 'https://www.youtube.com/watch?v=BQFqW7L6DJ8'),
(27, 'shaving brush', 'images/images (6).jpg', 100, 'brush', 'brush, dashain', 0, 2, 'https://www.youtube.com/embed/Lw64tIuA2W4'),
(30, 'birthday cake', 'images/cake_birthday.jpg', 800, 'cake', 'cake', 0, 1, 'https://www.youtube.com/embed/coUVD3hX_80');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalbought` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `dateofbirth`, `gender`, `totalbought`) VALUES
(1, 'Anil K Shrestha', 'anil@gmail.com', 'admin', '986078948', 'Kathmandu', '1998-09-14', 'male', 0),
(7, 'sharad', 'sharad@gmail.com', '$2y$10$2ZNyvV124QPfypRpjhf0EOU3JapxYnDOLl.NvCjiTbIuTh9F4Ssaa', '', '', '0000-00-00', '', 0),
(14, 'try', 'anilk@yahoo.com', '$2y$10$.ETDYluxBZP2P1a9qHUyQu5LvXdd8al4jYlbj25qFfcGK8T6Z.G4S', '', '', '0000-00-00', '', 0),
(17, 'ninja', 'ninja@sanskar.com', '$2y$10$Gj8w0xkWgsLSulUOo/jbYuPODS5uKCpewznCTlrzNE455QJPHZM9K', '', '', '0000-00-00', '', 0),
(18, 'non', 'nonninja@sanskar.com', '$2y$10$YUgo6v.WWChxlhp7cWhJyOFUViuo6KXNjPp1BPzhIoDFmJLgfodH2', '1238376432', '', '0000-00-00', '', 0),
(19, 'karan', 'karan@gmail.com', '$2y$10$/3H1dEphJQpRXp8nOEAHR.75FbYIrRqdgFo2qfQuHl.5AwZWbI/MC', '99999999999', '', '0000-00-00', '', 0),
(20, 'anil', 'aaa@gmail.com', '$2y$10$KPZQgf/dfU9zawCcgqZxjeBA8bHZgY1kZRGywCujYDeGIedSIVMKy', '12123123123', '', '0000-00-00', '', 0),
(21, 'x', 'mrx@gmail.com', '$2y$10$fHlsXIX6JASDN7d4qPtSpOztV0l1HyAUDepsb2.0Gqls2rqGD7/Ei', '8492352437', '', '0000-00-00', '', 1000),
(22, '', '', '', '', '', '0000-00-00', '', 0),
(23, '', '', '', '', '', '0000-00-00', '', 0),
(24, 'Anil Kumar Shrestha', 'anilshrestha1997@gmail.com', '$2y$10$OxmxRhq76L9Pe/GScrcP9OrwwKt.KYsX1bhGNm1aRtNcqxNOCoby2', '9860302475', '', '0000-00-00', '', 0),
(25, '', '', '', '', '', '0000-00-00', '', 0),
(26, 'Anil', 'thisisanil@gmail.com', '$2y$10$mbOqWA0o726VWmBpXmzOcOmiUZJCRD9WaaK9Rmbfud/KzTfqlf3C.', '9860504050', '', '0000-00-00', '', 0),
(27, 'Anil', 'thisisanilks@gmail.com', '$2y$10$FMZLbRLRlg6O6vXAoz0nzOpNZEW1QkSVfq5o/TTeqC9PC9cFxiuoe', 'faosdij', '', '0000-00-00', '', 0),
(28, 'Murari Kumar Gupta', 'alexgupta2367@gmail.com', '$2y$10$oIGHyoswbTb0hKkzpPhX6egltZDalRP7yn3Dpf58V0eNzKBocN2Z.', '9844082234', '', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `uid`, `prod_id`, `name`, `image`, `price`) VALUES
(1, 24, 27, '', '', ''),
(2, 24, 19, '', '', ''),
(3, 24, 23, '', '', ''),
(4, 24, 17, '', '', ''),
(5, 28, 17, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
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
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
