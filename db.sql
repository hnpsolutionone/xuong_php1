-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2025 at 09:10 AM
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
-- Database: `php1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Thời trang Nữ'),
(3, 'Thời trang nam'),
(4, 'Thời trang trẻ em');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `receiver_mobile` varchar(20) NOT NULL,
  `total_price` double(11,2) NOT NULL,
  `delivery_date` date NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_code`, `receiver_name`, `receiver_address`, `receiver_mobile`, `total_price`, `delivery_date`, `payment_method`, `status`, `order_date`) VALUES
(2, 6, 'ORDER_20250609-085832', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 905.00, '2025-06-09', 'VNPAY', 1, '2025-06-09'),
(3, 6, 'ORDER_20250609-090124', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 550.00, '2025-06-09', 'VNPAY', 1, '2025-06-09'),
(4, 6, 'ORDER_20250609-092741', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 200.00, '2025-06-09', 'VNPAY', 1, '2025-06-09'),
(5, 6, 'ORDER_20250609-092949', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 200.00, '2025-06-09', 'VNPAY', 1, '2025-06-09'),
(6, 6, 'ORDER_20250609-094057', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 200.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(7, 6, 'ORDER_20250609-094203', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 550.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(8, 6, 'ORDER_20250609-094453', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 200.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(9, 6, 'ORDER_20250609-094744', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 105.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(10, 6, 'ORDER_20250609-095201', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 105.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(11, 6, 'ORDER_20250609-095255', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 105.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(12, 6, 'ORDER_20250609-095314', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 200.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(13, 6, 'ORDER_20250609-095324', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 200.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(14, 6, 'ORDER_20250609-095724', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 105.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(15, 6, 'ORDER_20250609-095921', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 200.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(16, 6, 'ORDER_20250609-100040', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 305.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(17, 6, 'ORDER_20250609-100219', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 305.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(18, 6, 'ORDER_20250609-100929', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 2055.00, '2025-06-09', 'VNPay', 1, '2025-06-09'),
(19, 6, 'ORDER_20250613-073401', 'Nguyễn Lê Phương', '123/3B Quang Trung', '0987543212', 560.00, '2025-06-13', 'VNPay', 1, '2025-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 2, 3, 2, 200.00),
(2, 2, 2, 2, 200.00),
(3, 2, 1, 1, 105.00),
(4, 3, 2, 1, 200.00),
(5, 3, 5, 1, 350.00),
(6, 4, 2, 1, 200.00),
(7, 5, 2, 1, 200.00),
(8, 6, 2, 1, 200.00),
(9, 7, 5, 1, 350.00),
(10, 7, 3, 1, 200.00),
(11, 8, 2, 1, 200.00),
(12, 9, 1, 1, 105.00),
(13, 10, 1, 1, 105.00),
(14, 12, 2, 1, 200.00),
(15, 14, 1, 1, 105.00),
(16, 15, 2, 1, 200.00),
(17, 16, 2, 1, 200.00),
(18, 16, 1, 1, 105.00),
(19, 17, 3, 1, 200.00),
(20, 17, 1, 1, 105.00),
(21, 18, 1, 1, 105.00),
(22, 18, 3, 1, 200.00),
(23, 18, 5, 5, 350.00),
(24, 19, 1, 2, 105.00),
(25, 19, 5, 1, 350.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(11,2) NOT NULL,
  `sale_price` double(11,2) DEFAULT NULL,
  `quantity` int(3) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `image`, `price`, `sale_price`, `quantity`, `status`) VALUES
(1, 2, 'Áo thun 2 new', 'Áo thun 5Áo thun 2Áo thun 3Áo thun 4Áo thun 5', 'https://themezhub.net/kumo-new-update/kumo/assets/img/product/2.jpg', 105.00, 95.00, 2, 0),
(2, 2, 'Áo Polo nam', 'Áo Polo nam 1\r\nÁo Polo nam 2\r\nÁo Polo nam 3', 'https://themezhub.net/kumo-new-update/kumo/assets/img/product/5.jpg', 200.00, 199.00, 10, 1),
(3, 2, 'Váy nữ model 01', 'Váy nữ model 01\r\nVáy nữ model 01\r\nVáy nữ model 01', 'https://themezhub.net/kumo-new-update/kumo/assets/img/product/1.jpg', 200.00, 199.00, 19, 1),
(4, 2, 'Collot Full Dress', 'Collot Full Dress\r\nCollot Full Dress\r\nCollot Full Dress', 'https://themezhub.net/kumo-new-update/kumo/assets/img/product/2.jpg', 450.00, 400.00, 20, 1),
(5, 2, 'Half Fancy Lady Dress', 'Half Fancy Lady Dress\r\nHalf Fancy Lady Dress\r\nHalf Fancy Lady Dress\r\nHalf Fancy Lady Dress', 'https://themezhub.net/kumo-new-update/kumo/assets/img/product/4.jpg', 350.00, NULL, 0, 1),
(6, 2, 'Product demo', 'Áo thun 5Áo thun 2Áo thun 3Áo thun 4Áo thun 5', 'https://themezhub.net/kumo-new-update/kumo/assets/img/product/4.jpg', 599.00, 500.00, 111, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `image`, `birthday`, `email`, `mobile`, `address`, `city`, `points`, `role`) VALUES
(1, 'phuongnguyen', '123456', 'Nguyen Le Phuong', '', '2025-06-26', 'hnpsolution@gmail.com', '0987543212', '123/3B quang trung', 'HCM', 1000, '1'),
(2, 'lephong', '12345678', 'Nguyen Phong', '', '2025-06-18', 'lephong@gmail.com', '0987543212', '123/3B Quang Trung', 'HCM', 2200, '1'),
(6, 'hnpsolution', '$2y$10$t2Wg3oblUDP64RIqb4l5buNwdpI3hFkeHt9TiY2enTXv4wSK48FGW', 'Nguyễn Lê Phương', NULL, NULL, 'hnpsolution@gmail.com', '0987543212', '123/3B Quang Trung', 'HaNoi', 100, 'admin'),
(7, 'phuongnl21', '$2y$10$M0AJXzJBsrj0JCUq39i5TOtKaoteS3SB9hB849A//bQv4CmgMzc7G', 'Nguyễn Lê Phương', NULL, NULL, 'phuongnl21@fpt.edu.vn', NULL, NULL, 'HaNoi', 400, 'user'),
(8, 'user01', '$2y$10$we0vovSSoeNtCjv0tHwX4OkhOC.XPdI5b.SdL5gKby9y/yM4kS1pq', 'Nguyễn Lê Phương', NULL, NULL, 'user01@gmail.com', NULL, NULL, 'HaNoi', 500, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_products` (`product_id`),
  ADD KEY `fk_comments_users` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_detail_products` (`product_id`),
  ADD KEY `fk_order_detail_orders` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_detail_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_detail_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
