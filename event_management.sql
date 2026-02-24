-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2026 at 07:59 PM
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
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `anniversary`
--

CREATE TABLE `anniversary` (
  `id` int(11) NOT NULL,
  `fac1` varchar(100) DEFAULT NULL,
  `fac2` varchar(100) DEFAULT NULL,
  `fac3` varchar(100) DEFAULT NULL,
  `fac4` varchar(100) DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `rprice` int(11) DEFAULT NULL,
  `dprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anniversary`
--

INSERT INTO `anniversary` (`id`, `fac1`, `fac2`, `fac3`, `fac4`, `people`, `rprice`, `dprice`) VALUES
(1, 'Decoration', 'Music', 'Photography', 'Food', 100, 50000, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `sl` int(11) NOT NULL,
  `fac1` varchar(100) DEFAULT NULL,
  `fac2` varchar(100) DEFAULT NULL,
  `fac3` varchar(100) DEFAULT NULL,
  `fac4` varchar(100) DEFAULT NULL,
  `people` int(50) DEFAULT NULL,
  `rprice` int(50) DEFAULT NULL,
  `dprice` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`sl`, `fac1`, `fac2`, `fac3`, `fac4`, `people`, `rprice`, `dprice`) VALUES
(1, 'Decoration', 'Music and Photos', 'Food and Drinks', 'Invitation Card', 90, 20000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `id` int(11) NOT NULL,
  `fac1` varchar(100) DEFAULT NULL,
  `fac2` varchar(100) DEFAULT NULL,
  `fac3` varchar(100) DEFAULT NULL,
  `fac4` varchar(100) DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `rprice` int(11) DEFAULT NULL,
  `dprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`id`, `fac1`, `fac2`, `fac3`, `fac4`, `people`, `rprice`, `dprice`) VALUES
(1, 'Decoration', 'Music', 'Photography', 'Food', 100, 50000, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sl` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` int(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sl`, `name`, `phone`, `email`, `subject`, `description`, `status`) VALUES
(1, 'Miaji', 1611820481, 'abu.bakar.miaji@gmail.com', 'asasa', 'asasas', NULL),
(2, 'Abu Bakar Miaji', 0, 'toptenforever.com@gmail.com', 'Test case ', '12222', NULL),
(3, 'Abu Bakar Miaji', 0, 'mazshuhel@gmail.cm', 'Test case ', 'hello', NULL),
(7, '', 0, '', '', '', NULL),
(8, 'Abu Bakar Miaji', 0, 'mazshuhel@gmail.cm', 'Test case ', '', NULL),
(9, 'miaji', 0, 'aaa@aaa', 'Test case ', 'aaa', NULL),
(10, 'Abu Bakar Miaji', 111111, 'abc@gmail.com', 'Test case ', 'abcd', NULL),
(11, 'sakib', 2147483647, 'aassa@gmail.com', 'hello case ', 'i hhrfr uiufvgeriug  bvbrhgf rregkjrhgfrjfghgfg  hhhtgbfuh ggf4ruhhj anut s tgbs gga sggd a asvbe htyge ahjbbdsfs ', NULL),
(12, 'shimanto', 1222222222, 'shimanto@gmail.com', 'Test case ', '', NULL),
(13, 'Abu Bakar Miaji', 0, 'abu.bakar.miaji@gmail.com', 'Test case ', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sl` int(50) NOT NULL,
  `e_name` varchar(50) DEFAULT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `c_number` int(50) DEFAULT NULL,
  `c_address` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sl`, `e_name`, `c_name`, `c_number`, `c_address`, `date`, `time`, `venue`, `amount`, `description`, `status`) VALUES
(25001, 'Birthday', 'Miaji', 1611825315, 'Mohammadpur, Dhaka -1207', '2025-12-03', '10.30PM', 'Bangladesh university', 10000, 'as ur wish', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` int(11) NOT NULL,
  `fac1` varchar(100) DEFAULT NULL,
  `fac2` varchar(100) DEFAULT NULL,
  `fac3` varchar(100) DEFAULT NULL,
  `fac4` varchar(100) DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `rprice` int(11) DEFAULT NULL,
  `dprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id`, `fac1`, `fac2`, `fac3`, `fac4`, `people`, `rprice`, `dprice`) VALUES
(1, 'Others Decoration', 'Music', 'Photography', 'Food', 100, 8000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `picnic`
--

CREATE TABLE `picnic` (
  `id` int(11) NOT NULL,
  `fac1` varchar(100) DEFAULT NULL,
  `fac2` varchar(100) DEFAULT NULL,
  `fac3` varchar(100) DEFAULT NULL,
  `fac4` varchar(100) DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `rprice` int(11) DEFAULT NULL,
  `dprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `picnic`
--

INSERT INTO `picnic` (`id`, `fac1`, `fac2`, `fac3`, `fac4`, `people`, `rprice`, `dprice`) VALUES
(1, 'Decoration', 'Music', 'Photography', 'Food', 100, 50000, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` int(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `address`, `email`, `usertype`, `password`) VALUES
(1, 'Miaji', 1611820481, 'Dhaka-1207', 'abu.bakar.miaji@gmail.com', 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `id` int(11) NOT NULL,
  `fac1` varchar(100) DEFAULT NULL,
  `fac2` varchar(100) DEFAULT NULL,
  `fac3` varchar(100) DEFAULT NULL,
  `fac4` varchar(100) DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `rprice` int(11) DEFAULT NULL,
  `dprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`id`, `fac1`, `fac2`, `fac3`, `fac4`, `people`, `rprice`, `dprice`) VALUES
(1, 'Decoration', 'Music', 'Photography', 'Food', 100, 50000, 45000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anniversary`
--
ALTER TABLE `anniversary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picnic`
--
ALTER TABLE `picnic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anniversary`
--
ALTER TABLE `anniversary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sl` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25022;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `picnic`
--
ALTER TABLE `picnic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
