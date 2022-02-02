-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 06:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `deleted_flag`, `created_date`) VALUES
(1, 'category 1', 0, '2022-02-02 11:28:40'),
(2, 'category 2', 0, '2022-02-02 11:28:40'),
(3, 'category 3', 0, '2022-02-02 12:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fields`
--

CREATE TABLE `tbl_fields` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` varchar(45) DEFAULT 'current_timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fields`
--

INSERT INTO `tbl_fields` (`id`, `name`, `deleted_flag`, `created_date`) VALUES
(1, 'Name', 0, 'current_timestamp'),
(2, 'Category', 0, 'current_timestamp'),
(3, 'Subcategory', 0, 'current_timestamp'),
(4, 'Price', 0, 'current_timestamp'),
(5, 'Quantity', 0, 'current_timestamp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `item_qty` varchar(255) DEFAULT '0',
  `item_price` varchar(255) DEFAULT '0',
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`id`, `item_name`, `category_id`, `sub_category_id`, `item_qty`, `item_price`, `deleted_flag`, `created_date`) VALUES
(1, 'Product Item 1', 1, 1, '5', '100', 1, '2022-02-02 11:27:11'),
(2, 'Product Item 2', 1, 1, '20', '101', 0, '2022-02-02 11:32:29'),
(3, 'Product Item 1', 3, 8, '5', '50', 0, '2022-02-02 12:43:50'),
(4, 'Product Item 3', 1, 1, '5', '50', 0, '2022-02-02 12:44:00'),
(5, 'Product Item 4', 1, 2, '123', '400', 0, '2022-02-02 12:45:42'),
(6, 'Product Item 5', 2, 5, '7', '200', 0, '2022-02-02 12:45:57'),
(7, 'Product Item 6', 3, 8, '11', '150', 0, '2022-02-02 12:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory_history`
--

CREATE TABLE `tbl_inventory_history` (
  `id` int(11) NOT NULL,
  `inventory_id` varchar(45) DEFAULT NULL,
  `column_id` int(11) DEFAULT NULL,
  `from` varchar(45) DEFAULT NULL,
  `to` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inventory_history`
--

INSERT INTO `tbl_inventory_history` (`id`, `inventory_id`, `column_id`, `from`, `to`, `created_date`) VALUES
(1, '2', 1, 'Product Item 1', 'Product Item 2', '2022-02-02 12:16:59'),
(2, '2', 2, '1', '2', '2022-02-02 12:16:59'),
(3, '2', 3, '1', '2', '2022-02-02 12:16:59'),
(4, '2', 4, '0', '101', '2022-02-02 12:16:59'),
(5, '2', 5, '0', '20', '2022-02-02 12:16:59'),
(6, '2', 4, '0', '101', '2022-02-02 12:17:27'),
(7, '2', 5, '0', '20', '2022-02-02 12:17:27'),
(8, '3', 2, '1', '3', '2022-02-02 12:44:23'),
(9, '3', 3, '1', '8', '2022-02-02 12:44:23'),
(10, '2', 2, '2', '1', '2022-02-02 13:05:19'),
(11, '2', 3, '2', '1', '2022-02-02 13:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`id`, `category_id`, `sub_category_name`, `deleted_flag`, `created_date`) VALUES
(1, 1, 'subcategory 1', 0, '2022-02-02 11:28:46'),
(2, 1, 'subcategory 2', 0, '2022-02-02 11:28:46'),
(3, 1, 'subcategory 3', 0, '2022-02-02 12:29:12'),
(4, 2, 'subcategory 4', 0, '2022-02-02 12:29:20'),
(5, 2, 'subcategory 5', 0, '2022-02-02 12:29:31'),
(6, 2, 'subcategory 6', 0, '2022-02-02 12:29:42'),
(7, 3, 'subcategory 7', 0, '2022-02-02 12:30:02'),
(8, 3, 'subcategory 8', 0, '2022-02-02 12:30:05'),
(9, 3, 'subcategory 9', 0, '2022-02-02 12:30:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fields`
--
ALTER TABLE `tbl_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inventory_history`
--
ALTER TABLE `tbl_inventory_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_fields`
--
ALTER TABLE `tbl_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_inventory_history`
--
ALTER TABLE `tbl_inventory_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
