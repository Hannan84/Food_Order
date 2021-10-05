-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 01:19 PM
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
  `password` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `verified` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `email`, `password`, `token`, `verified`) VALUES
(90, 'Hannan Sarkar', 'sarkar0962@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'e706360a673b3819d8e4f8', 'active');

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
(21, ' Pizza', 'Food_Category-118.gif', 'Yes', 'Yes'),
(22, 'Pasta', 'Food_Category-702.jpg', 'Yes', 'Yes'),
(26, 'Momo', 'Food_Category-867.jpg', 'Yes', 'Yes'),
(27, 'Barger', 'Food_Category-866.jpg', 'Yes', 'Yes'),
(35, 'Chees', 'Food_Category-462.jpg', 'Yes', 'Yes');

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
(5, 'Barger', 'The Barger series consists of very deep, moderately well-drained soils on upland ridgetops', '700.00', 'Food_Category-636.jpg', 27, 'Yes', 'Yes'),
(6, 'pizza', 'Pizza, dish of Italian origin consisting of a flattened disk of bread dough topped with some combination of olive oil, oregano,', '1000.00', 'Food_Category-187.jpg', 21, 'Yes', 'Yes'),
(7, 'pasta', 'Italian pasta is a collective name for food made from wheat flour and water,The name refers to the resulting dough', '200.00', 'Food_Category-871.jpg', 22, 'Yes', 'Yes'),
(8, 'pizza', 'Pizza, a dish of Italian origin consisting of a flattened disk of bread dough topped with some combination of olive oil, oregano', '500.00', 'Food_Category-463.jpg', 23, 'Yes', 'Yes'),
(9, 'Barger', 'The Barger series consists of very deep, moderately well-drained soils on upland ridgetops. They formed in a loamy mantle and the', '400.00', 'Food_Category-799.jpg', 27, 'No', 'Yes'),
(12, 'Momo', 'Momo is a type of steamed dumpling with some form of filling. Momo has become a traditional delicacy in Nepal, Tibet,', '1000.00', 'Food_Category-767.jpg', 26, 'Yes', 'Yes');

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
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
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
(1, 'Barger', '700.00', 2, '1400.00', '2021-09-08 00:00:00', 'Delivered', 'Colton Short', '+1 (636) 846-2444', 'wunar@mailinator.com', 'Asperiores itaque in'),
(2, 'pizza', '1000.00', 4, '4000.00', '2021-09-08 00:00:00', 'Delivered', 'Michael Neal', '+1 (599) 167-5159', 'qeluqimyhu@mailinator.com', 'At quidem explicabo'),
(23, 'Barger', '700.00', 1, '700.00', '2021-10-04 01:21:04', 'Ordered', 'Mira Chase', '+1 (482) 192-5687', 'biky@mailinator.com', 'Proident voluptatem');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` varchar(100) NOT NULL,
  `verified` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `token`, `verified`) VALUES
(47, 'Hannan', 'sarkar00962@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0e29edb43fc3f4f1e8e896', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
