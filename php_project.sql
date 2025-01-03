-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 08:40 PM
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
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(5, 13000.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-09 19:06:26'),
(6, 41300.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-09 19:28:26'),
(7, 41300.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-09 19:28:43'),
(8, 41300.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-09 19:29:16'),
(9, 41300.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-09 19:29:45'),
(10, 41300.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-09 19:29:54'),
(11, 41300.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-09 19:32:19'),
(12, 150000.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-09 19:49:58'),
(13, 178300.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-09 20:09:27'),
(14, 28300.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-17 00:08:50'),
(15, 28300.00, 'completed successfully', 2, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-17 00:34:35'),
(16, 78185.00, 'completed successfully', 1, 780058965, '???????', 'zarqa/ROUSIFA', '2024-05-17 14:57:13'),
(17, 272897.00, 'completed successfully', 1, 780058965, 'zarqa', 'zarqa/ROUSIFA', '2024-05-20 21:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 11, '1', 'Toyota camry', 'Camry.webp', 13000.00, 1, 1, '2024-05-09 19:32:19'),
(2, 11, '2', 'BMW 5 Series 530e', 'bmw.webp', 28300.00, 1, 1, '2024-05-09 19:32:19'),
(3, 12, '7', 'porsche 2017', 'porsche.jpeg', 150000.00, 1, 1, '2024-05-09 19:49:58'),
(4, 13, '7', 'porsche 2017', 'porsche.jpeg', 150000.00, 1, 1, '2024-05-09 20:09:27'),
(5, 13, '2', 'BMW 5 Series 530e', 'bmw.webp', 28300.00, 1, 1, '2024-05-09 20:09:27'),
(6, 14, '2', 'BMW 5 Series 530e', 'bmw.webp', 28300.00, 1, 1, '2024-05-17 00:08:50'),
(7, 15, '2', 'BMW 5 Series 530e', 'bmw.webp', 28300.00, 1, 2, '2024-05-17 00:34:35'),
(8, 16, '12', '2021 Nissan Navara', 'Nissan4x4.jpeg', 22395.00, 3, 1, '2024-05-17 14:57:13'),
(9, 16, '3', 'Hyundai Sonata', 'sonata.webp', 11000.00, 1, 1, '2024-05-17 14:57:13'),
(10, 17, '15', '2021 Toyota Hi-Lux 2.8D-4D Invincible', 'toyota.jpeg', 32000.00, 1, 1, '2024-05-20 21:12:27'),
(11, 17, '8', '2023 Chevrolet Corvette', 'Corvette.jpeg', 80299.00, 3, 1, '2024-05-20 21:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Toyota camry', 'Sedan', 'Kilometers 200,000 Sedan Cash Only  Hybrid ', 'Camry.webp', 'Camry2.webp', 'Camry3.webp', 'Camry4.webp', 13000.00, 0, 'Black'),
(2, 'BMW 5 Series 530e', 'sedan', 'Kilometers\r\n\r\n90,000 - 99,999 Exterior Color Black Fuel Plug-in - Hybrid', 'bmw.webp', 'bmw2.webp', 'bmw3.webp', 'bmw4.webp', 28300.00, 0, 'Black'),
(3, 'Hyundai Sonata', 'sedan', 'Kilometers\r\n160,000 - 169,999 Sedan Cash Only Year 2014 Hybrid ', 'sonata.webp', 'sonata2.webp', 'sonata3.webp', 'sonata4.webp', 11000.00, 0, 'White'),
(4, 'Fordfusion2018', 'sedan', 'Kilometers 90,000 - 99,999 Engine Size (cc)\r\n\r\n2,000 - 2,999 cc Cash Only  Hybrid ', 'Fordfusion2018.webp', 'Fordfusion20182.webp', 'Fordfusion20183.webp', 'Fordfusion20184.webp', 14800.00, 0, 'Grey\r\n'),
(7, 'porsche 2017', 'sport', 'Make:\r\nPorsche\r\nModel:\r\n911\r\nYear:\r\n2017\r\nTrim:\r\nTurbo S Coupe AWD\r\nBody type:\r\nCoupe\r\nExterior color:\r\nBlack\r\nInterior color:\r\nBlack\r\nMileage:\r\n31,221 mi\r\nCondition:\r\nUsed\r\nVIN:\r\nWP0AD2A96HS166721\r\nStock number:\r\nPHS166721', 'porsche.jpeg', 'porsche2.jpeg', 'porsche3.jpeg', 'porsche4.jpeg', 150000.00, 0, 'Black'),
(8, '2023 Chevrolet Corvette', 'sport', 'Mileage\r\n4,089\r\n\r\nDrivetrain\r\n\r\nRear-Wheel Drive\r\n\r\n\r\nExterior color\r\nAccelerate Yellow Metallic\r\n\r\n\r\nInterior color\r\nSky Gray\r\n\r\n\r\nEngine\r\n6.2L V8\r\n\r\n\r\nFuel type\r\nGasoline\r\n\r\n\r\nTransmission\r\n8-Speed Automatic\r\n\r\n\r\nBluetooth', 'Corvette.jpeg', 'Corvette2.jpeg', 'Corvette3.jpeg', 'Corvette4.jpeg', 80299.00, 0, 'Sky Gray'),
(9, '2017 Ford Mustang GT Premium Coupe RWD', 'sport', 'Mileage\r\n31,861\r\nDrivetrain\r\nRear-Wheel Drive\r\nExterior color\r\nIngot Silver\r\nInterior color\r\nBlack (Ebony)\r\nMPG\r\n19 MPG\r\nEngine\r\n435 hp 5L V8\r\nFuel type\r\nGasoline\r\nTransmission\r\n6-Speed Automatic\r\n', 'fordmustang.jpeg', 'fordmustang2.jpeg', 'fordmustang3.jpeg', 'fordmustang4.jpeg', 29547.00, 0, 'Black (Ebony)'),
(10, '2016 BMW M4 GTS Coupe RWD', 'sport', 'Make:\r\nBMW\r\nModel:\r\nM4\r\nYear:\r\n2016\r\nTrim:\r\nGTS Coupe RWD\r\nBody type:\r\nCoupe\r\nExterior color:\r\nMineral Gray Metallic\r\nInterior color:\r\nAnthracite/Black\r\nMileage:\r\n7,635 mi\r\nCondition:\r\nUsed\r\nFuel tank size:\r\n15 gal\r\n', 'bmws.jpeg', 'bmws2.jpeg', 'bmws3.jpeg', 'bmws4.jpeg', 80299.00, 0, 'Mineral Gray Metallic'),
(12, '2021 Nissan Navara', '4x4', 'Make:Nissan Model:Navara Year:2021  Variant:2.3dCi TT Tekna (8 Navi)(Leather) autoBody type:Pickup Truck Mileage:22704 mi Condition:Used Registration:BP70OJB  date:17 Feb 2021 Stock number:17548784 Fuel economyn Fuel tank size:73L Fuel type:Diesel ULEZ co', 'Nissan4x4.jpeg', 'Nissan4x42.jpeg', 'Nissan4x43.jpeg', 'Nissan4x44.jpeg', 22395.00, 0, 'black'),
(13, '2018 Land Rover Discovery', '4x4', 'Make:\r\nLand Rover\r\nModel:\r\nDiscovery\r\nYear:\r\n2018\r\nVariant:\r\n3.0 SD V6 HSE 3.0 SD V6 (306ps) Station Wagon 5d Auto\r\nBody type:\r\nSUV/Crossover\r\nExterior colour:\r\nGrey\r\nMileage:\r\n80,786 mi\r\nCondition:\r\nUsed\r\nRegistration:\r\nOU68WVR\r\nReg. date:\r\n01 Sep 2018\r\n', 'land.jpeg', 'land2.jpeg', 'land3.jpeg', 'land4.jpeg', 24490.00, 0, 'Grey'),
(14, '2019 Ford Ranger', '4x4', 'Make:\r\nFord\r\nModel:\r\nRanger\r\nYear:\r\n2019\r\nVariant:\r\n2.0 EcoBlue Wildtrak auto\r\nBody type:\r\nPickup Truck\r\nExterior colour:\r\nGrey\r\nMileage:\r\n59,000 mi\r\nCondition:\r\nUsed\r\nRegistration:\r\nNK69LUJ\r\nReg. date:\r\n12 Sep 2019\r\nStock number:\r\n11356\r\nFuel economy\r\nFu', 'ford.jpeg', 'ford2.jpeg', 'ford3.jpeg', 'ford4.jpeg', 22395.00, 19999, 'Grey'),
(15, '2021 Toyota Hi-Lux 2.8D-4D Invincible', '4x4', 'Make:\r\nToyota\r\nModel:\r\nHi-Lux\r\nYear:\r\n2021\r\nVariant:\r\n2.8D-4D Invincible X AT35 (204hp)(Eu6dT-E)\r\nBody type:\r\nPickup Truck\r\nExterior colour:\r\nWhite\r\nMileage:\r\n39,814 mi\r\nCondition:\r\nUsed\r\nRegistration:\r\nGK21VKL\r\nReg. date:\r\n08 Mar 2021\r\nStock number:\r\n589', 'toyota.jpeg', 'toyota2.jpeg', 'toyota3.jpeg', 'toyota4.jpeg', 32000.00, 0, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'hasan', 'hasanbeidas5@gmail.com', 'df96220fa161767c5cbb95567855c86b'),
(2, 'hasan', 'hasanbeidas1@gmail.com', '$2y$10$LzXQyrg128ykLfzWwn8NLuwPie6ZQz4Ug5vXQ3a12BYC2FUFRCVy2'),
(3, 'kjjkfjk', 'hasanbeidas10@gmail.com', '$2y$10$0bAJQGiM.QZ9/2Hrv6HZ3O15sAlVn0VH./jSiwPLWK.Sln9fSS7fi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
