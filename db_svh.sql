-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2020 at 04:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_svh`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_sales_list` ()  BEGIN

SELECT transaction_id,order_date,transaction_cust_id,customer.cust_name as cust_name,total,status,shipping_charges,grand_total FROM 
`sales` INNER JOIN customer ON customer.cust_id = sales.transaction_cust_id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `category`) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3'),
(4, 'Category 4'),
(8, 'Category 7');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(128) NOT NULL,
  `cust_phone` varchar(128) NOT NULL,
  `cust_email` varchar(128) NOT NULL,
  `cust_address` varchar(128) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_phone`, `cust_email`, `cust_address`, `updated_at`) VALUES
(1, 'Hidayat', '085930187556', 'hidayat@gmail.com', 'Jalan Sariasih No.54, Sarijadi, Sukasari, Kota Bandung, Jawa Barat 40151', '2020-01-18 01:02:21'),
(2, 'Adhi Prayoga', '085930187556', 'adhiprayogaaa@gmail.com', 'Cicukang Indah No. 4 Kab. Bandung', '0000-00-00 00:00:00'),
(7, 'sasd', '123123123', 'da@ds.c', 'asdasd', '0000-00-00 00:00:00'),
(8, 'sasd', '123123123', 'da@ds.c', 'asdasd', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_code` varchar(128) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `product_categories_id` int(11) DEFAULT NULL,
  `stock1` int(11) DEFAULT NULL COMMENT 'WhatsApp',
  `stock2` int(11) DEFAULT NULL COMMENT 'Shopee',
  `stock3` int(11) DEFAULT NULL COMMENT 'Websites',
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_code`, `name`, `price`, `product_categories_id`, `stock1`, `stock2`, `stock3`, `image`, `created_at`, `updated_at`) VALUES
('SVH-9921-0001', 'Baju Renang', 35000, 2, 0, 8, 35, '', '2019-11-27 05:04:35', '2020-01-17 16:13:21'),
('SVH-9921-0003', 'Jaket Kulit', 100000, 4, 10, 16, 22, '', '2019-11-27 05:04:35', '2019-12-12 17:07:18'),
('SVH-9921-0007', 'Celana Gemes', 20000, 2, 18, 6, 11, '', '2019-11-27 06:02:47', '2020-01-17 16:13:32'),
('SVH-9921-0008', 'Baju Kuning', 35000, 8, 11, 41, 24, '', '2019-12-12 01:31:29', '2019-12-12 17:06:54'),
('SVH-9921-0009', 'Celana Renang', 67500, 3, 11, 44, 13, '', '2019-12-12 01:31:56', '2019-12-12 18:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` varchar(128) NOT NULL,
  `order_date` date NOT NULL,
  `order_from` varchar(200) NOT NULL,
  `status` enum('Proses','Kirim','Terima') NOT NULL DEFAULT 'Proses',
  `transaction_cust_id` int(11) DEFAULT NULL,
  `total` double NOT NULL,
  `shipping_charges` double NOT NULL,
  `grand_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `order_date`, `order_from`, `status`, `transaction_cust_id`, `total`, `shipping_charges`, `grand_total`) VALUES
('CART-2602-0001', '2020-02-26', 'WhatsApp', 'Proses', 1, 170000, 10000, 180000),
('CART-2602-0002', '2020-02-26', 'WhatsApp', 'Proses', 2, 420000, 10000, 430000);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_id` int(11) NOT NULL,
  `sales_transaction_id` varchar(128) DEFAULT NULL,
  `sales_product_code` varchar(128) DEFAULT NULL,
  `sales_stock_from` varchar(200) DEFAULT NULL,
  `sales_name` varchar(128) DEFAULT NULL,
  `sales_price` double DEFAULT NULL,
  `sales_qty` int(11) DEFAULT NULL,
  `sales_discount` double DEFAULT NULL,
  `sales_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sales_id`, `sales_transaction_id`, `sales_product_code`, `sales_stock_from`, `sales_name`, `sales_price`, `sales_qty`, `sales_discount`, `sales_total`) VALUES
(70, 'CART-2602-0001', 'SVH-9921-0001', 'Shopee', 'Baju Renang', 35000, 2, 0, 70000),
(71, 'CART-2602-0001', 'SVH-9921-0007', 'WhatsApp', 'Celana Gemes', 20000, 5, 0, 100000),
(72, 'CART-2602-0002', 'SVH-9921-0001', 'WhatsApp', 'Baju Renang', 35000, 1, 0, 35000),
(73, 'CART-2602-0002', 'SVH-9921-0001', 'Shopee', 'Baju Renang', 35000, 11, 0, 385000);

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

CREATE TABLE `talent` (
  `talent_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talent`
--

INSERT INTO `talent` (`talent_id`, `name`, `contact`, `type`, `address`, `updated_at`) VALUES
(1, 'Adhi Prayoga', '085930187556', '', 'Cicukang', '0000-00-00 00:00:00'),
(2, 'Hidayat', '085930187556', '', 'Cicukang', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'Adhi Prayoga', 'adhiprayogaaa@gmail.com', 'default.jpg', '$2y$10$2lO3h1D.GVEsxeCktLkKc.OWy3olTNUqRtgz0Jj19gGGc9st1.CmW', 1, 1, 1572534668),
(9, 'Insan Kamil', 'insan@gmail.com', 'default.jpg', '$2y$10$zZbJNlFn13qptSG8crOT/uPCOfexBg2kOpeovhLdStaomRzkN4yiu', 2, 1, 1572858033);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(8, 1, 3),
(9, 1, 4),
(14, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'pg-home', 1),
(2, 2, 'Sales List', 'sales_list', 'pg-charts', 1),
(3, 3, 'Menu Management', 'menu', 'pg-folder_alt', 1),
(4, 3, 'Submenu Management', 'menu/submenu', 'pg-folder', 1),
(6, 1, 'Role', 'admin/role', 'fa fa-user', 1),
(7, 4, 'Sales', 'sales', 'pg-shopping_cart', 1),
(8, 2, 'Product', 'product', 'pg-shopping_cart', 1),
(9, 2, 'Customer', 'customer', 'fa fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`),
  ADD KEY `categories_id` (`product_categories_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transaction_cust_id` (`transaction_cust_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `sales_product_id` (`sales_product_code`),
  ADD KEY `sales_transaction_id` (`sales_transaction_id`);

--
-- Indexes for table `talent`
--
ALTER TABLE `talent`
  ADD PRIMARY KEY (`talent_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
  MODIFY `talent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_categories_id`) REFERENCES `categories` (`categories_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`transaction_cust_id`) REFERENCES `customer` (`cust_id`);

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_ibfk_1` FOREIGN KEY (`sales_transaction_id`) REFERENCES `sales` (`transaction_id`),
  ADD CONSTRAINT `sales_details_ibfk_2` FOREIGN KEY (`sales_product_code`) REFERENCES `product` (`product_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
