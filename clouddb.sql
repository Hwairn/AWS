-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 07:54 PM
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
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','paid','failed') DEFAULT 'paid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `total_price`, `payment_status`, `created_at`) VALUES
(1, 1130.40, 'paid', '2025-05-04 17:38:03'),
(2, 1523.05, 'paid', '2025-05-04 17:50:29');

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
(3, 'Adult Plain Stole', 'Our Adult Plain Stole is an excellent accessory for a variety of occasions such as graduation, moving-up ceremonies, choir or theater performances, religious convocations, and more! When used for graduation, these stoles are ideal for elementary, middle school, high school and college alums. Stoles are a popular addition to honor your students for their achievements and good grades at your commencement. They are also used to represent clubs, honor societies and teams who are proud of their accomplishments.\r\n\r\n', 40.15, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/stole1.png'),
(4, 'Honor Cord (Gold)', 'Elevate your graduation day with the prestigious TARUMT Gold Honor Cord, a symbol of outstanding academic achievement. This elegant gold cord is worn over your graduation gown to distinguish your hard work, leadership, or membership in honor societies.', 9.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/HonorCord.jpg'),
(5, '\"Classic Crest\" University Embroidered Stole', 'A timeless satin stole featuring your university’s official crest and motto in rich embroidery. Ideal for traditionalists, it includes customizable text (name, degree, year) in elegant script.', 28.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/CustomTrim1.jpeg'),
(6, '\"TARUMT Eco-Chic\" Sustainable Set', 'Eco-friendly set made from 100% recycled materials, with TARUMT\'s logo printed using water-based inks. Includes a breathable bamboo-blend gown, recycled paperboard cap with soy ink detailing, and plantable seed paper tag that grows wildflowers.\r\n\r\n', 79.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/DeluxeMaster1.jpeg'),
(7, 'TARUMT Premium Velvet-Touch Mortarboard', 'A luxury cap featuring a plush velvet band in university colors, reinforced 8-point structure, adjustable grip-fit interior, and an embossed TARUMT logo, complete with a gold metallic tassel.', 34.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/DeluxeBlackCap.jpg'),
(8, '\"TARUMT LED Spectacle Cap\" ', 'A high-tech light-up mortarboard with programmable LED rim (3 lighting modes), debossed logo, and a remote-controlled display panel to showcase \"TARUMT\" or your name in lights—perfect for photos and celebrations.', 49.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/DeluxeCap.jpeg'),
(9, '\"TARUMT Academic Excellence\" Dual-Color Cord', 'This elegant navy blue and gold twisted cord symbolizes outstanding scholarship at TARUMT. Made from high-quality satin-finish polyester, it features a braided design with a metallic thread accent for added prestige. The cord includes a small enamel TARUMT charm at the center.', 14.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/HonorCordTwoColor2.jpg'),
(10, '\"Summa Cum Laude\" Honors Stole', 'For top achievers! This stole boldly displays \"Summa/Magna Cum Laude\" in metallic thread, paired with laurel wreath embroidery. Includes a velvet trim for distinction.', 31.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/CustomTrim2.jpeg'),
(11, '\"TARUMT Legacy\" Premium Graduation Set', 'Official TARUMT-licensed set featuring a heavyweight polyester gown with embroidered university crest, 8-point reinforced mortarboard cap, and degree-specific tassel. Designed for multiple wears with wrinkle-resistant fabric and satin trim. Includes a keepsake storage bag.\r\n\r\n', 69.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/Deluxe.jpg'),
(12, '\"TARUMT Leadership Legacy\" Contrast Cord', 'A striking maroon and silver cord recognizing student leadership and service. The unique interwoven chevron pattern represents growth and dedication, while the engraved pewter medallion displays the TARUMT motto.', 16.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/HonorCordTwoColor.jpg'),
(13, 'Legacy Alumni Tee', 'A soft, heavyweight cotton tee with a vintage-inspired TARUMT crest on the chest and \"Class of [Year]\" in bold block letters on the back. Available in navy, heather gray, and white.', 24.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/Tshirt.jpeg'),
(14, '\"TARUMT Legacy\" Personalized Graduation Frame', 'This premium wooden frame features a laser-engraved TARUMT university crest at the top, with customizable plates for the graduate\'s name, degree (\"Bachelor of Business Administration\"), and graduation year in elegant gold or silver foil lettering. The dual matting includes TARUMT\'s official colors (navy and gold), with a built-in easel back for display and a wall-mount hook. The shatter-resistant glass protects your diploma while UV-blocking technology prevents fading.', 39.99, 'https://cloudasbucket.s3.us-east-1.amazonaws.com/image/PGF.jpeg');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
