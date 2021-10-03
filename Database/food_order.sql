-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 07:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `email`, `password`) VALUES
(71, 'Barbara Davenport', 'loruf@mailinator.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image`, `featured`, `active`) VALUES
(21, 'pizza', 'Food_Category-964.jpg', 'Yes', 'Yes'),
(22, 'Pasta', 'Food_Category-702.jpg', 'Yes', 'Yes'),
(26, 'Momo', 'Food_Category-867.jpg', 'Yes', 'Yes'),
(27, 'Barger', 'Food_Category-866.jpg', 'Yes', 'Yes'),
(28, 'Cheese', 'Food_Category-749.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image`, `category_id`, `featured`, `active`) VALUES
(5, 'Barger', 'The Barger series consists of very deep, moderately well-drained soils on upland ridgetops', '700.00', 'Food_Category-932.jpg', 27, 'Yes', 'Yes'),
(6, 'pizza', 'Pizza, dish of Italian origin consisting of a flattened disk of bread dough topped with some combination of olive oil, oregano,', '1000.00', 'Food_Category-187.jpg', 21, 'Yes', 'Yes'),
(7, 'pasta', 'Italian pasta is a collective name for food made from wheat flour and water,The name refers to the resulting dough', '200.00', 'Food_Category-871.jpg', 22, 'Yes', 'Yes'),
(8, 'pizza', 'Pizza, a dish of Italian origin consisting of a flattened disk of bread dough topped with some combination of olive oil, oregano', '500.00', 'Food_Category-463.jpg', 23, 'Yes', 'Yes'),
(9, 'Barger', 'The Barger series consists of very deep, moderately well-drained soils on upland ridgetops. They formed in a loamy mantle and the', '400.00', 'Food_Category-799.jpg', 27, 'No', 'Yes'),
(10, 'Momo', 'Momo is a type of steamed dumpling with some form of filling. Momo has become a traditional delicacy in Nepal, Tibet,', '500.00', 'Food_Category-123.jpg', 26, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Barger', '700.00', 2, '1400.00', '2021-09-08 12:31:51', 'On Delivery', 'Colton Short', '+1 (636) 846-2444', 'wunar@mailinator.com', 'Asperiores itaque in'),
(2, 'pizza', '1000.00', 4, '4000.00', '2021-09-08 12:35:23', 'Delivered', 'Michael Neal', '+1 (599) 167-5159', 'qeluqimyhu@mailinator.com', 'At quidem explicabo'),
(3, 'pasta', '200.00', 3, '600.00', '2021-09-08 12:36:59', 'Ordered', 'Byron Parks', '+1 (636) 635-8807', 'qurewiwyc@mailinator.com', 'Vel placeat amet e'),
(4, 'Pasta', '300.00', 2, '600.00', '2021-09-08 12:51:50', 'Ordered', 'Cameron Frye', '+1 (563) 785-5145', 'nylajepyq@mailinator.com', 'Iste quo error rem n'),
(5, 'Barger', '700.00', 5, '3500.00', '2021-09-08 05:03:38', 'Cancelled', 'Kuame Spence', '+1 (344) 864-2297', 'rero@mailinator.com', 'Pariatur Vel aliqua'),
(6, 'Momo', '500.00', 2, '1000.00', '2021-09-08 05:06:52', 'Delivered', 'Kendall Browning', '+1 (856) 434-5428', 'quwe@mailinator.com', 'Reprehenderit aperia'),
(7, 'Barger', '400.00', 4, '1600.00', '2021-09-09 01:30:07', 'Delivered', 'Dane Vincent', '+1 (102) 996-1646', 'mamapiqah@mailinator.com', 'Et rerum ut magni qu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
