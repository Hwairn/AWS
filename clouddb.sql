-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2025 at 03:18 PM
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
-- Database: `clouddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `session_id`, `product_id`, `quantity`) VALUES
(4, '4bpbgijlgiku1vvtgvkk6mfvj5', 3, 5),
(5, '4bpbgijlgiku1vvtgvkk6mfvj5', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('pending','paid') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `session_id`, `total_price`, `payment_status`, `created_at`) VALUES
(1, '4bpbgijlgiku1vvtgvkk6mfvj5', 176.45, 'pending', '2025-04-27 15:51:23'),
(2, '4bpbgijlgiku1vvtgvkk6mfvj5', 657.05, 'pending', '2025-04-27 15:52:28'),
(3, '6m6tk9poeq08frmev1j2kb5a6b', 200.35, 'pending', '2025-04-29 09:10:31'),
(4, '6m6tk9poeq08frmev1j2kb5a6b', 0.00, 'pending', '2025-04-29 09:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `image_url`) VALUES
(1, 'Premium Bachelors Hood', 'This traditional hood is 34 inches long and designed to be worn with our economy or deluxe bachelors gowns. Our hoods are made of 100% polyester and trimmed with a velvet band to represent your field of study. This hood has a black shell with a slight sheen and the velvet color is made of a cotton-velveteen blend. The inside of the hood features a beautiful duo-color satin lining and chevron which features your specific school colors. However, you can really customize this hood anyway you or your university prefers. Purchasing a hood with us is a great alternative to renting because they are affordable, can be reused, or saved as a keepsake to be remembered for a lifetime! All of our hoods are unisex and would be considered \"one size fits all\".\r\n\r\n', 176.45, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/hood1.jpg'),
(2, 'Classic Bachelors Gown', 'Our bachelors economy gown is one of our high quality robes yet most affordable that features everything the deluxe has to offer except the fluting. The finish is a muted satin so it\'s not as glossy as our shiny gowns but not matte either. However, they are a higher quality polyester with a padded yoke and fabric covered button on the back of the gown for hood attachment. Our bachelors economy gown is an excellent alternative to renting and is designed to help you outfit even a large graduating class without going over budget. These gowns are affordable enough for a one-time use but durable enough to be reused several times.\r\n\r\n', 160.20, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/gown1.jpg'),
(3, 'Adult Plain Stole', 'Our Adult Plain Stole is an excellent accessory for a variety of occasions such as graduation, moving-up ceremonies, choir or theater performances, religious convocations, and more! When used for graduation, these stoles are ideal for elementary, middle school, high school and college alums. Stoles are a popular addition to honor your students for their achievements and good grades at your commencement. They are also used to represent clubs, honor societies and teams who are proud of their accomplishments.\r\n\r\n', 40.15, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/stole1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
