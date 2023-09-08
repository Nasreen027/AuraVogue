-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 05:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auravogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(225) DEFAULT NULL,
  `adminEmail` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `adminImage` varchar(325) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `adminName`, `adminEmail`, `password`, `adminImage`) VALUES
(1, 'Fiza', 'fiza@gmail.com', '1234', '0');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(225) DEFAULT NULL,
  `categoryImage` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryImage`) VALUES
(1, 'Jewellery', 'jewel1.jfif'),
(2, 'Bandanas', 'bandana9.jpg'),
(3, 'Scrunchies', 'scrunchie2.jpg'),
(4, 'Outfits', 'outfit1.jpg'),
(5, 'Stickers', 'sticker3.jpg'),
(6, 'Happy Deals', 'product-108.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `feedbackUserID` int(11) DEFAULT NULL,
  `feedback` varchar(325) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `productQuantity` varchar(225) DEFAULT NULL,
  `orderDate` date DEFAULT current_timestamp(),
  `totalAmount` varchar(225) DEFAULT NULL,
  `orderStatus` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `productID`, `productQuantity`, `orderDate`, `totalAmount`, `orderStatus`) VALUES
(1, 5, 2, '2', '2023-08-09', '5677', 'approved'),
(2, 5, 1, '2', '2023-08-09', '5677', 'pending'),
(3, 6, 4, '1', '2023-08-12', '25.99', 'pending'),
(4, 6, 5, '1', '2023-08-12', '26.99', 'pending'),
(5, 6, 2, '1', '2023-08-12', '39.99', 'pending'),
(6, 6, NULL, '1', '2023-08-12', '35.99', 'approved'),
(7, 6, 2, '1', '2023-08-12', '39.99', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `reviewID` int(11) NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`reviewID`, `reviews`, `productID`, `userID`, `date`) VALUES
(1, 'loved this product. 😊', 2, 6, '2023-08-12'),
(4, 'this is amazing.', 6, 7, '2023-08-12'),
(5, 'hello this is fiza', 2, 7, '2023-08-12'),
(6, 'hello', 11, 7, '2023-08-12'),
(8, 'the sage bandana is delieghtful accessory 🌼', 1, 7, '2023-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(225) DEFAULT NULL,
  `productDescription` varchar(225) DEFAULT NULL,
  `productPrice` varchar(225) DEFAULT NULL,
  `productImage` varchar(225) DEFAULT NULL,
  `productStock` varchar(255) NOT NULL,
  `categoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productDescription`, `productPrice`, `productImage`, `productStock`, `categoryID`) VALUES
(1, 'Enchanted Sage Serenity Bandana', 'Ficus lyrata Bambino has an extremely compact, upright, branching nature; slightly smaller and thicker leaves compared to Ficus lyrata', '39.99', 'product-102.jpg', '24', 2),
(2, 'Blooms & Petals Floral Bandana', 'Epipremnum aureum commonly called golden pothos or devil\'s ivy, is native to the Solomon Islands.', '39.99', 'product-12.jpg', '20', 2),
(4, 'Gilded Rose Ring', 'Croton is a small shrub used as a landscape plant in tropical climates. In its native habitat, croton is a branching, bushy shrub.', '25.99', 'product-14.jpg', '15', 1),
(5, 'Eternal Sparkle Ring', 'Colorful pentas, also known as Egyptian starcluster or star flower, are one of the best choices to attract pollinators like butterflies.', '26.99', 'product-15.jpg', '17', 1),
(6, 'Azure Gemstone Mosaic Ring', 'Lantana is an annual or perennial, small, broadleaf evergreen shrub in the Verbenaceae (verbena) family that has woody stems but a sprawling habit.', '23.99', 'product-16.jpg', '34', 1),
(7, 'Luminous Lemon Blossom Bandana', 'The coleus is a brightly colored shrub with square stems and leaves ranging from heart-shaped to deeply fringed.', '25.99', 'product-17.jpg', '24', 2),
(8, 'Serene Sky Floral Bandana', 'Bromeliads typically have bright red, orange, purple, or blue flowers, and can grow in a number of different ways.', '34.99', 'product-18.jpg', '23', 2),
(9, 'Graceful Blush Dotted Bandana', 'Caladiums are tropical perennials with colorful, heart-shaped leaves native to tropical forests in South and Central America.', '23.99', 'product-19.jpg', '24', 2),
(11, 'Starry Delight Bracelet', 'It has fragrant, purple to white, flat-clustered, five-lobed flowers in coiled sprays.', '25.99', 'product-21.jpg', '23', 1),
(12, 'Butterfly Ballet Bangle', 'These are compact, mounded plants which grow 3-9” tall on mostly trailing stems.', '35.99', 'product-22.png', '34', 1),
(13, 'Starry Orbit Bracelet', 'Also known as the donkey tail plant, this succulent is one of the easiest plants to propagate and care for, which makes it a popular houseplant.', '24.99', 'product-23.jpg', '24', 1),
(14, 'Enchanted Elegance Bracelet', 'The crown of thorns is a great houseplant because it adjusts well to dry indoor environments and room temperatures.', '26.99', 'product-24.jpg', '23', 1),
(15, 'Charming Grace Bracelet', 'The flaming katy is a common houseplant that is native to Madagascar. It prefers temperatures from 60 to 85 degrees.', '27.99', 'product-25.jpg', '12', 1),
(16, 'Silver heart shaped bracelet', 'The perfect blend of elegance and self-expression.Crafted with precision from a variety of materials. ', '11.99', 'product-26.jpg', '23', 1),
(17, 'Serene Seafoam Scrunchie', 'Experience the tranquility of the seafoam\'s gentle waves with this scrunchie.', '20.01', 'product-106.jpg', '27', 3),
(18, 'Peachy Dreams Scrunchie', 'Embrace the warmth and charm of peachy hues with this dreamy scrunchie.', '29.09', 'product-107.jpg', '39', 3),
(19, 'Iconic F.R.I.E.N.D.S. Stickers', 'Relive the iconic moments from the beloved TV show with these stickers, perfect for adding a nostalgic touch to your belongings', '11.03', 'sticker6.jpg', '20', 5),
(20, 'Daisy Delight Stickers', 'These delightful stickers feature daisies in various sizes and colors, perfect for adding a touch of floral charm to your personal items', '10.02', 'sticker2.jpg', '39', 5),
(21, 'Aquatic Elegance Ensemble', 'Dive into elegance with this sea blue outfit that exudes the tranquil beauty of ocean waves.', '45.98', 'product-112.jpg', '19', 4),
(22, 'Retro Red Reverie Ensemble', 'Step into a bygone era with this vintage-inspired red outfit. The rich, nostalgic red hue combined with timeless silhouettes and details evokes the glamour of days gone by', '50.78', 'product-109.jpg', '20', 4),
(23, 'Pastel Dreamland Ensemble', 'The soft, harmonious blend of colors evokes a sense of whimsy and charm, making it perfect for a day filled with enchantment.', '65.67', 'product-118.jpg', '13', 4),
(24, 'Azure Allure Cardigan Ensemble', 'Embrace the allure of the azure sky with this elegant ensemble. The light blue cardigan takes center stage, evoking the tranquility of a clear day, while the black skirt provides a classic backdrop.', '67.78', 'product-121.jpg', '15', 4),
(25, 'Elegant Evening Ensemble', 'Perfect for a formal event or a night on the town, this outfit embodies class and style, making you the epitome of elegance wherever you go.', '79.90', 'product-120.jpg', '23', 4),
(26, 'Valvet Dreamers', 'These scrunchies are crafted from luxurious velvet fabric, giving your hair a soft and stylish embrace. Perfect for adding a touch of elegance to your everyday look or dressing up for a special occasions.', '30.76', 'product-108.jpg', '3', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(225) DEFAULT NULL,
  `lastName` varchar(225) DEFAULT NULL,
  `userEmail` varchar(225) NOT NULL,
  `userPassword` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `userEmail`, `userPassword`) VALUES
(1, 'ali', 'ali', 'ali@gmail.com', '123456'),
(2, 'fatima', 'fatima', 'fatima@gmail.com', '12345678\r\n'),
(3, 'zainab', 'zainab', 'zainab@gmail.com', '7444'),
(4, 'usman', 'usman', 'usman@gmail.com', '9877'),
(5, 'umar', 'umar', 'umar@gmail.com', '9977'),
(6, 'iman', 'Iman', 'iman@gmail.com', '$2y$10$kKffEgWCHe5M9H3H4oWlTOZg2Mu9cjJ7e.Lk50ZxF8pkQJsXmP/Fi'),
(7, 'Fiza', 'Batol', 'fiza@gmail.com', '$2y$10$iAHI4Z9NdGNQg/U73mcdqOcSQxjM/eewmQK7tglYItiORMJzELgAe');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistID` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `wishlistProductID` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistID`, `customerID`, `wishlistProductID`, `image`) VALUES
(38, 7, 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `feedbackKey` (`feedbackUserID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `p_fk` (`productID`),
  ADD KEY `u_fk` (`userID`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `pr_id` (`productID`),
  ADD KEY `user_id` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `c_fk` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistID`),
  ADD KEY `customerIdKey` (`customerID`),
  ADD KEY `productIdKey` (`wishlistProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedbackKey` FOREIGN KEY (`feedbackUserID`) REFERENCES `users` (`userID`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `p_fk` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `u_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD CONSTRAINT `pr_id` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `c_fk` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `productIdKey` FOREIGN KEY (`wishlistProductID`) REFERENCES `products` (`productID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
