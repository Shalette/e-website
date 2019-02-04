-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2018 at 06:31 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selectiall`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(11) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  PRIMARY KEY (`product_brand`) USING BTREE,
  UNIQUE KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `product_brand`) VALUES
(0, 'Nothing'),
(1, 'Vegetarian'),
(2, 'Non-vegetarian'),
(3, 'Single'),
(4, 'Double'),
(5, 'Half'),
(6, 'Full'),
(7, 'Hot'),
(8, 'Kaya'),
(9, 'Lotus'),
(10, 'Natural\'s'),
(11, 'Nature\'s'),
(12, 'O3'),
(13, 'Shahnaz'),
(14, 'VLCC'),
(15, '750 ml'),
(16, '1.25 Lts'),
(17, '2 Lts'),
(18, 'Cold'),
(19, 'Aloe Vera'),
(20, 'Chocolate'),
(21, 'Regular'),
(22, 'Rica'),
(23, 'L\'Oreal'),
(24, 'Matrix'),
(25, 'Streax'),
(26, 'Long'),
(27, 'Medium'),
(28, 'Short');

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

DROP TABLE IF EXISTS `drink`;
CREATE TABLE IF NOT EXISTS `drink` (
  `drink_id` int(11) NOT NULL,
  `drink_name` varchar(50) NOT NULL,
  PRIMARY KEY (`drink_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`drink_id`, `drink_name`) VALUES
(1, 'Coke'),
(2, 'Fanta'),
(3, 'Mirinda'),
(4, 'Pepsi'),
(5, 'Sprite');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  UNIQUE KEY `item_name` (`item_name`),
  UNIQUE KEY `pk` (`item_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`) VALUES
(1, 'Food'),
(2, 'Beauty');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `extra` varchar(50) DEFAULT 'Nothing',
  `status` enum('Not Paid','Paid','Cancelled','Completed') NOT NULL DEFAULT 'Not Paid',
  `ord_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk5` (`user_id`),
  KEY `fk6` (`product_brand`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS `parts`;
CREATE TABLE IF NOT EXISTS `parts` (
  `item_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `parts_name` varchar(50) NOT NULL,
  `parts_pic` varchar(50) DEFAULT NULL,
  UNIQUE KEY `parts_name` (`parts_name`),
  UNIQUE KEY `pk` (`item_id`,`parts_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`item_id`, `parts_id`, `parts_name`, `parts_pic`) VALUES
(1, 4, 'Appetizers', 'app'),
(1, 19, 'Beverages', 'bev'),
(1, 1, 'Biryani', 'biryani'),
(2, 5, 'Bleach', 'bleach'),
(1, 3, 'Breakfast', 'break'),
(1, 12, 'Chicken', 'chi'),
(1, 16, 'Chinese', 'chin'),
(2, 6, 'Clean-Up', 'clean'),
(2, 4, 'De-Tan', 'det'),
(1, 20, 'Desserts', 'des'),
(1, 11, 'Egg', 'egg'),
(2, 1, 'Facials', 'fac'),
(1, 6, 'Fast Food', 'fast'),
(1, 14, 'Fish', 'fish'),
(2, 8, 'Hair Colour', 'colour'),
(2, 11, 'Hair Smoothening', 'smooth'),
(2, 10, 'Hair Straightening', 'straight'),
(2, 7, 'Hair Styling', 'style'),
(2, 9, 'Hair Treatment', 'treat'),
(2, 17, 'Makeup', 'make'),
(2, 15, 'Manicure', 'mani'),
(2, 2, 'Massage', 'mass'),
(2, 12, 'Mehendi', 'mehendi'),
(1, 10, 'Mushroom', 'mush'),
(1, 13, 'Mutton', 'mut'),
(2, 18, 'Packages', 'pack'),
(1, 9, 'Paneer', 'pan'),
(2, 16, 'Pedicure', 'pedi'),
(1, 15, 'Prawn', 'prawn'),
(1, 18, 'Rice', 'rice'),
(1, 17, 'Roti', 'ro'),
(1, 2, 'Soups', 'soup'),
(2, 14, 'Spa', 'spa'),
(1, 5, 'Starters', 'start'),
(1, 7, 'Tandoor Kababs', 'tan'),
(2, 13, 'Threading', 'thread'),
(1, 8, 'Vegetables', 'veg'),
(2, 3, 'Waxing', 'wax');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `item_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_avail` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `product_brand` varchar(50) NOT NULL DEFAULT 'Nothing',
  `product_cost` decimal(10,2) NOT NULL,
  `product_pic` varchar(50) DEFAULT 'jpg',
  `product_pad` enum('Yes','No') NOT NULL DEFAULT 'No',
  UNIQUE KEY `pk` (`item_id`,`parts_id`,`product_id`,`product_brand`) USING BTREE,
  KEY `fk4` (`product_brand`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `parts_id`, `product_id`, `product_name`, `product_avail`, `product_brand`, `product_cost`, `product_pic`, `product_pad`) VALUES
(1, 1, 1, 'Chicken Biryani', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 1, 2, 'Chicken Leg Biryani', 'Yes', 'Nothing', '219.00', 'jpg', 'No'),
(1, 1, 3, 'Egg Biryani', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 1, 4, 'Hyderabadi Chicken Biryani', 'Yes', 'Nothing', '189.00', 'jpg', 'No'),
(1, 1, 5, 'Hyderabadi Mutton Biryani', 'Yes', 'Nothing', '225.00', 'jpg', 'No'),
(1, 1, 6, 'Mushroom Biryani', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 1, 7, 'Mutton Biryani', 'Yes', 'Nothing', '199.00', 'jpg', 'No'),
(1, 1, 8, 'Prawn Biryani', 'Yes', 'Nothing', '229.00', 'jpg', 'No'),
(1, 1, 9, 'Shahi Paneer Biryani', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 1, 10, 'Veg Biryani', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 2, 1, 'Clear Soup', 'Yes', 'Non-vegetarian', '79.00', 'jpg', 'No'),
(1, 2, 1, 'Clear Soup', 'Yes', 'Vegetarian', '69.00', 'jpg', 'No'),
(1, 2, 2, 'Hot &amp; Sour Soup', 'Yes', 'Non-vegetarian', '89.00', 'jpg', 'No'),
(1, 2, 2, 'Hot &amp; Sour Soup', 'Yes', 'Vegetarian', '69.00', 'jpg', 'No'),
(1, 2, 3, 'Manchow Soup', 'Yes', 'Non-vegetarian', '89.00', 'jpg', 'No'),
(1, 2, 3, 'Manchow Soup', 'Yes', 'Vegetarian', '69.00', 'jpg', 'No'),
(1, 2, 4, 'Noodles Soup', 'Yes', 'Non-vegetarian', '89.00', 'jpg', 'No'),
(1, 2, 4, 'Noodles Soup', 'Yes', 'Vegetarian', '69.00', 'jpg', 'No'),
(1, 2, 5, 'Sweet Corn Soup', 'Yes', 'Non-vegetarian', '89.00', 'jpg', 'No'),
(1, 2, 5, 'Sweet Corn Soup', 'Yes', 'Vegetarian', '69.00', 'jpg', 'No'),
(1, 2, 6, 'Tomato Soup', 'Yes', 'Nothing', '89.00', 'jpg', 'Yes'),
(1, 3, 1, 'Chole Bature', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 3, 2, 'Masala Dosa', 'Yes', 'Nothing', '65.00', 'png', 'No'),
(1, 3, 3, 'Onion Masala Dosa', 'Yes', 'Nothing', '69.00', 'jpg', 'No'),
(1, 3, 4, 'Paper Sada Dosa', 'Yes', 'Nothing', '65.00', 'jpg', 'No'),
(1, 3, 5, 'Poori Sabji', 'Yes', 'Nothing', '65.00', 'jpg', 'No'),
(1, 3, 6, 'Sada Dosa', 'Yes', 'Nothing', '49.00', 'jpg', 'No'),
(1, 3, 7, 'Upma', 'Yes', 'Nothing', '49.00', 'jpg', 'No'),
(1, 3, 8, 'Uttapam', 'Yes', 'Nothing', '59.00', 'jpg', 'No'),
(1, 4, 1, 'Green Salad', 'Yes', 'Nothing', '39.00', 'jpg', 'No'),
(1, 4, 2, 'Mixed Raita', 'Yes', 'Nothing', '49.00', 'jpg', 'No'),
(1, 4, 3, 'Onion Salad', 'Yes', 'Nothing', '19.00', 'jpg', 'No'),
(1, 4, 4, 'Papad', 'No', 'Nothing', '10.00', 'jpg', 'No'),
(1, 4, 5, 'Curd', 'Yes', 'Nothing', '29.00', 'jpg', 'No'),
(1, 5, 1, 'American Corn Salt-n-Pepper', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 5, 2, 'Chicken Drumsticks', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 5, 3, 'Chicken Lollipop', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 5, 4, 'Chicken Salt-n-Pepper', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 5, 5, 'Chilly Fish', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 5, 6, 'Chilly Potato', 'Yes', 'Nothing', '89.00', 'jpg', 'No'),
(1, 5, 7, 'Crispy Chilly Baby Corn', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 5, 8, 'Crispy Veg', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 5, 9, 'Golden Fried Prawns', 'Yes', 'Nothing', '199.00', 'jpg', 'No'),
(1, 5, 10, 'Mushroom 65', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 5, 11, 'Mushroom Salt-n-Pepper', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 5, 12, 'Paneer Pakoda', 'Yes', 'Nothing', '199.00', 'jpg', 'No'),
(1, 5, 13, 'Prawn 65', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 5, 14, 'Veg Pakoda', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 6, 1, 'Egg Chicken Roll', 'Yes', 'Double', '69.00', 'jpg', 'No'),
(1, 6, 1, 'Egg Chicken Roll', 'Yes', 'Single', '59.00', 'jpg', 'No'),
(1, 6, 2, 'Egg Roll', 'Yes', 'Nothing', '45.00', 'jpg', 'Yes'),
(1, 6, 3, 'Paneer Roll', 'Yes', 'Nothing', '49.00', 'jpg', 'Yes'),
(1, 6, 4, 'Veg Roll', 'Yes', 'Nothing', '39.00', 'jpg', 'Yes'),
(1, 7, 1, 'Hariyali Kabab', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 7, 2, 'Chicken Reshmi Kabab', 'Yes', 'Nothing', '159.00', 'png', 'No'),
(1, 7, 3, 'Chicken Tikka', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 7, 4, 'Paneer Malai', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 7, 5, 'Paneer Tikka', 'Yes', 'Nothing', '139.00', 'jpg', 'Yes'),
(1, 7, 6, 'Tandoor Chicken', 'Yes', 'Full', '299.00', 'jpg', 'No'),
(1, 7, 6, 'Tandoor Chicken', 'Yes', 'Half', '179.00', 'jpg', 'No'),
(1, 7, 7, 'Tandoor Mushroom', 'Yes', 'Nothing', '155.00', 'jpeg', 'Yes'),
(1, 7, 8, 'Tangri Kabab', 'Yes', 'Nothing', '149.00', 'jpg', 'Yes'),
(1, 8, 1, 'Aloo Gobi', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 8, 2, 'Dal Black Tadka', 'Yes', 'Nothing', '89.00', 'jpg', 'No'),
(1, 8, 3, 'Dal Butter Fry', 'Yes', 'Nothing', '69.00', 'jpg', 'No'),
(1, 8, 4, 'Dal Fry', 'Yes', 'Nothing', '59.00', 'jpg', 'No'),
(1, 8, 5, 'Dal Makhani', 'Yes', 'Nothing', '89.00', 'jpg', 'No'),
(1, 8, 6, 'Green Peas Masala', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 8, 7, 'Malai Kofta', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 8, 8, 'Mixed Veg', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 8, 9, 'Mushroom Do Pyaza', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 8, 10, 'Veg Do Pyaza', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 8, 11, 'Veg Hyderabadi', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 8, 12, 'Veg Jhalfry', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 8, 13, 'Veg Kadhai', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 8, 14, 'Veg Khajana', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 8, 15, 'Veg Korma', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 8, 16, 'Veg Makhanwala', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 8, 17, 'Veg Navratna Korma', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 8, 18, 'Veg Special', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 8, 19, 'Veg Kundan Masala', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 9, 1, 'Paneer Butter Masala', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 9, 2, 'Paneer Do Pyaza', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 9, 3, 'Paneer Hyderabadi', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 9, 4, 'Paneer Kadhai', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 9, 5, 'Paneer Masala', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 9, 6, 'Paneer Mattar', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 9, 7, 'Paneer Punjabi Masala', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 9, 8, 'Paneer Tikka Masala', 'Yes', 'Nothing', '169.00', 'jpg', 'No'),
(1, 9, 9, 'Shahi Paneer', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 10, 1, 'Kadhai Mushroom', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 10, 2, 'Mushroom Butter Masala', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 10, 3, 'Mushroom Fry', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 10, 4, 'Mushroom Masala', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 11, 1, 'Egg Bhujia', 'Yes', 'Nothing', '79.00', 'jpg', 'No'),
(1, 11, 2, 'Egg Bhujia Masala', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 11, 3, 'Egg Curry', 'Yes', 'Nothing', '89.00', 'jpg', 'No'),
(1, 11, 4, 'Egg Do Pyaza', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 11, 5, 'Egg Masala', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 11, 6, 'Plain Omlette', 'Yes', 'Nothing', '39.00', 'jpg', 'No'),
(1, 12, 1, 'Chicken Bharta', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 12, 2, 'Chicken Butter Masala', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 12, 3, 'Chicken Curry', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 12, 4, 'Chicken Do Pyaza', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 12, 5, 'Chicken Handi', 'Yes', 'Nothing', '179.00', 'jpg', 'No'),
(1, 12, 6, 'Chicken Hyderabadi', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 12, 7, 'Chicken Kadhai', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 12, 8, 'Chicken Kassa', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 12, 9, 'Chicken Korma', 'Yes', 'Nothing', '179.00', 'jpg', 'No'),
(1, 12, 10, 'Chicken Masala', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 12, 11, 'Chicken Mughlai', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 12, 12, 'Chicken Punjabi', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 12, 13, 'Chicken Tikka Butter Masala', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 13, 1, 'Mutton Curry', 'Yes', 'Nothing', '189.00', 'jpg', 'No'),
(1, 13, 2, 'Mutton Kassa', 'Yes', 'Nothing', '189.00', 'jpg', 'No'),
(1, 13, 3, 'Mutton Keema', 'Yes', 'Nothing', '199.00', 'jpg', 'No'),
(1, 13, 4, 'Mutton Masala', 'Yes', 'Nothing', '189.00', 'jpg', 'No'),
(1, 13, 5, 'Mutton Roghan Josh', 'Yes', 'Nothing', '199.00', 'jpg', 'No'),
(1, 14, 1, 'Fish Curry', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 14, 2, 'Fish Do Pyaza', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 14, 3, 'Fish Fry', 'Yes', 'Nothing', '95.00', 'jpg', 'No'),
(1, 14, 4, 'Fish Masala', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 14, 5, 'Pomfret Masala', 'Yes', 'Nothing', '209.00', 'jpg', 'No'),
(1, 15, 1, 'Prawn Curry', 'Yes', 'Nothing', '189.00', 'jpg', 'No'),
(1, 15, 2, 'Prawn Do Pyaza', 'Yes', 'Nothing', '209.00', 'jpg', 'No'),
(1, 15, 3, 'Prawn Fry', 'Yes', 'Nothing', '209.00', 'png', 'No'),
(1, 15, 4, 'Prawn Kadhai', 'Yes', 'Nothing', '209.00', 'jpg', 'No'),
(1, 15, 5, 'Prawn Kassa', 'Yes', 'Nothing', '199.00', 'jpg', 'No'),
(1, 15, 6, 'Prawn Malai Curry', 'Yes', 'Nothing', '209.00', 'jpg', 'No'),
(1, 15, 7, 'Prawn Masala', 'Yes', 'Nothing', '199.00', 'jpg', 'No'),
(1, 16, 1, 'American Chopsuey (Non-veg)', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 16, 2, 'American Chopsuey (Veg)', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 16, 3, 'Baby Corn Manchurian', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 16, 4, 'Chicken 65', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 16, 5, 'Chicken Fried Rice', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 16, 6, 'Chicken Lemon', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 16, 7, 'Chicken Manchurian', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 16, 8, 'Chicken Noodles', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 16, 9, 'Chicken Schezwan', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 16, 10, 'Chicken Schezwan Noodles', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(1, 16, 11, 'Chilly Chicken(Bone)', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 16, 12, 'Chilly Chicken(Boneless)', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 16, 13, 'Chilly Gobi', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 16, 14, 'Chilly Mushroom', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 16, 15, 'Chilly Paneer', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 16, 16, 'Egg Fried Rice', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 16, 17, 'Egg Noodles', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 16, 18, 'Garlic Chicken', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 16, 19, 'Gobi Manchurian', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 16, 20, 'Mixed Fried Rice', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 16, 21, 'Mixed Schezwan Noodles', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 16, 22, 'Paneer 65', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 16, 23, 'Paneer Manchurian', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 16, 24, 'Prawn Fried Rice', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 16, 25, 'Chicken Schezwan Fried Rice', 'Yes', 'Nothing', '139.00', 'jpg', 'No'),
(1, 16, 26, 'Veg Schezwan Fried Rice', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 16, 27, 'Mixed Schezwan Fried Rice', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(1, 16, 28, 'Prawn Schezwan Fried Rice', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 16, 29, 'Sliced Chicken with Hot Garlic Sauce', 'Yes', 'Nothing', '159.00', 'jpg', 'No'),
(1, 16, 30, 'Veg Chow Chow', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 16, 31, 'Veg Fried Rice', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 16, 32, 'Veg Hakka Noodles', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(1, 16, 33, 'Veg Manchurian', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 16, 34, 'Veg Schezwan Noodles', 'Yes', 'Nothing', '119.00', 'jpg', 'No'),
(1, 17, 1, 'Aloo Paratha', 'Yes', 'Nothing', '29.00', 'jpg', 'No'),
(1, 17, 2, 'Butter Naan', 'Yes', 'Nothing', '35.00', 'jpg', 'No'),
(1, 17, 3, 'Butter Roti', 'Yes', 'Nothing', '19.00', 'jpg', 'No'),
(1, 17, 4, 'Lachha Paratha', 'Yes', 'Nothing', '39.00', 'jpg', 'No'),
(1, 17, 5, 'Paneer Kulcha', 'Yes', 'Nothing', '29.00', 'jpg', 'No'),
(1, 17, 6, 'Plain Kulcha', 'Yes', 'Nothing', '29.00', 'jpg', 'No'),
(1, 17, 7, 'Plain Naan', 'Yes', 'Nothing', '29.00', 'jpg', 'No'),
(1, 17, 8, 'Plain Paratha', 'Yes', 'Nothing', '25.00', 'jpg', 'No'),
(1, 17, 9, 'Roti or Chapati', 'Yes', 'Nothing', '12.00', 'jpg', 'No'),
(1, 17, 10, 'Tandoor Roti', 'Yes', 'Nothing', '19.00', 'jpg', 'No'),
(1, 18, 1, 'Jeera Rice', 'Yes', 'Nothing', '79.00', 'jpg', 'No'),
(1, 18, 2, 'Lemon Rice', 'Yes', 'Nothing', '79.00', 'jpg', 'No'),
(1, 18, 3, 'Peas Pulao', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 18, 4, 'Plain Rice', 'Yes', 'Nothing', '49.00', 'jpg', 'No'),
(1, 18, 5, 'Veg Pulao', 'Yes', 'Nothing', '109.00', 'jpg', 'No'),
(1, 19, 1, 'Badam Shake', 'Yes', 'Nothing', '60.00', 'jpg', 'Yes'),
(1, 19, 2, 'Bournvita Drink', 'Yes', 'Nothing', '35.00', 'jpg', 'Yes'),
(1, 19, 3, 'Butter Milk', 'Yes', 'Nothing', '35.00', 'jpg', 'Yes'),
(1, 19, 4, 'Coffee', 'Yes', 'Cold', '30.00', 'jpg', 'No'),
(1, 19, 4, 'Coffee', 'Yes', 'Hot', '30.00', 'jpg', 'No'),
(1, 19, 5, 'Cold Drinks', 'Yes', '1.25 Lts', '65.00', 'jpg', 'No'),
(1, 19, 5, 'Cold Drinks', 'Yes', '2 Lts', '95.00', 'jpg', 'No'),
(1, 19, 5, 'Cold Drinks', 'Yes', '750 ml', '45.00', 'jpg', 'No'),
(1, 19, 6, 'Cold Mineral Water', 'Yes', 'Nothing', '25.00', 'jpg', 'Yes'),
(1, 19, 7, 'Fresh Lime Water', 'Yes', 'Nothing', '30.00', 'jpg', 'Yes'),
(1, 19, 8, 'Horlicks Drink', 'Yes', 'Nothing', '35.00', 'jpg', 'Yes'),
(1, 19, 9, 'Hot Milk', 'Yes', 'Nothing', '30.00', 'jpg', 'No'),
(1, 19, 10, 'Lassi', 'Yes', 'Nothing', '50.00', 'jpg', 'No'),
(1, 19, 11, 'Milkshake', 'Yes', 'Nothing', '65.00', 'jpg', 'No'),
(1, 19, 12, 'Mix Juice', 'Yes', 'Nothing', '50.00', 'jpg', 'No'),
(1, 19, 13, 'Tea', 'Yes', 'Nothing', '25.00', 'jpg', 'No'),
(1, 20, 1, 'Butterscotch Ice Cream', 'Yes', 'Nothing', '65.00', 'jpg', 'No'),
(1, 20, 2, 'Chocobar', 'Yes', 'Nothing', '20.00', 'jpg', 'No'),
(1, 20, 3, 'Chocolate Ice cream', 'Yes', 'Nothing', '65.00', 'jpg', 'No'),
(1, 20, 4, 'Cone', 'Yes', 'Nothing', '45.00', 'png', 'No'),
(1, 20, 5, 'Gulab Jamun', 'Yes', 'Nothing', '19.00', 'jpg', 'No'),
(1, 20, 6, 'Kesar Pista Ice Cream', 'Yes', 'Nothing', '65.00', 'jpg', 'No'),
(1, 20, 7, 'Rasgulla', 'Yes', 'Nothing', '19.00', 'jpg', 'No'),
(1, 20, 8, 'Sooji Halwa', 'Yes', 'Nothing', '55.00', 'jpg', 'No'),
(1, 20, 9, 'Strawberry Ice Cream', 'Yes', 'Nothing', '55.00', 'jpg', 'No'),
(1, 20, 10, 'Vanilla Ice Cream', 'Yes', 'Nothing', '49.00', 'jpg', 'No'),
(2, 1, 1, 'Anti-ageing', 'Yes', 'Kaya', '2199.00', 'jpg', 'No'),
(2, 1, 1, 'Anti-ageing', 'Yes', 'Lotus', '1499.00', 'jpg', 'No'),
(2, 1, 1, 'Anti-ageing', 'Yes', 'Natural\'s', '1299.00', 'jpg', 'No'),
(2, 1, 1, 'Anti-ageing', 'Yes', 'Nature\'s', '1199.00', 'jpg', 'No'),
(2, 1, 1, 'Anti-ageing', 'Yes', 'O3', '2299.00', 'jpg', 'No'),
(2, 1, 1, 'Anti-ageing', 'Yes', 'Shahnaz', '1599.00', 'jpg', 'No'),
(2, 1, 2, 'Chocolate', 'Yes', 'Kaya', '899.00', 'jpg', 'No'),
(2, 1, 2, 'Chocolate', 'Yes', 'Nature\'s', '699.00', 'jpg', 'No'),
(2, 1, 2, 'Chocolate', 'Yes', 'Shahnaz', '899.00', 'jpg', 'No'),
(2, 1, 2, 'Chocolate', 'Yes', 'VLCC', '799.00', 'jpg', 'No'),
(2, 1, 3, 'Diamond', 'Yes', 'Kaya', '1799.00', 'jpg', 'No'),
(2, 1, 3, 'Diamond', 'Yes', 'Lotus', '1499.00', 'jpg', 'No'),
(2, 1, 3, 'Diamond', 'Yes', 'Natural\'s', '799.00', 'jpg', 'No'),
(2, 1, 3, 'Diamond', 'Yes', 'Nature\'s', '799.00', 'jpg', 'No'),
(2, 1, 3, 'Diamond', 'Yes', 'Shahnaz', '1799.00', 'jpg', 'No'),
(2, 1, 3, 'Diamond', 'Yes', 'VLCC', '1199.00', 'jpg', 'No'),
(2, 1, 4, 'Fruit Facial', 'Yes', 'Lotus', '799.00', 'jpg', 'No'),
(2, 1, 4, 'Fruit Facial', 'Yes', 'Natural\'s', '699.00', 'jpg', 'No'),
(2, 1, 4, 'Fruit Facial', 'Yes', 'Nature\'s', '559.00', 'jpg', 'No'),
(2, 1, 4, 'Fruit Facial', 'Yes', 'VLCC', '799.00', 'jpg', 'No'),
(2, 1, 5, 'Gold', 'Yes', 'Kaya', '1799.00', 'jpg', 'No'),
(2, 1, 5, 'Gold', 'Yes', 'Lotus', '1499.00', 'jpg', 'No'),
(2, 1, 5, 'Gold', 'Yes', 'Natural\'s', '999.00', 'jpg', 'No'),
(2, 1, 5, 'Gold', 'Yes', 'Nature\'s', '999.00', 'jpg', 'No'),
(2, 1, 5, 'Gold', 'Yes', 'Shahnaz', '1799.00', 'jpg', 'No'),
(2, 1, 5, 'Gold', 'Yes', 'VLCC', '1499.00', 'jpg', 'No'),
(2, 1, 6, 'Insta-glow', 'Yes', 'Lotus', '999.00', 'jpg', 'No'),
(2, 1, 6, 'Insta-glow', 'Yes', 'Natural\'s', '799.00', 'jpg', 'No'),
(2, 1, 6, 'Insta-glow', 'Yes', 'Nature\'s', '799.00', 'jpg', 'No'),
(2, 1, 6, 'Insta-glow', 'Yes', 'VLCC', '799.00', 'jpg', 'No'),
(2, 1, 7, 'Pearl', 'Yes', 'Kaya', '1499.00', 'jpg', 'No'),
(2, 1, 7, 'Pearl', 'Yes', 'Lotus', '999.00', 'jpg', 'No'),
(2, 1, 7, 'Pearl', 'Yes', 'Natural\'s', '799.00', 'jpg', 'No'),
(2, 1, 7, 'Pearl', 'Yes', 'Nature\'s', '799.00', 'jpg', 'No'),
(2, 1, 7, 'Pearl', 'Yes', 'Shahnaz', '1499.00', 'jpg', 'No'),
(2, 1, 7, 'Pearl', 'Yes', 'VLCC', '1199.00', 'jpg', 'No'),
(2, 1, 8, 'Power Brightening (O3)', 'Yes', 'Nothing', '1999.00', 'jpg', 'Yes'),
(2, 1, 9, 'Skin Tightening Facial', 'Yes', 'Nothing', '799.00', 'jpg', 'Yes'),
(2, 1, 10, 'Skin Whitening', 'Yes', 'Kaya', '1199.00', 'png', 'No'),
(2, 1, 10, 'Skin Whitening', 'Yes', 'Lotus', '1199.00', 'png', 'No'),
(2, 1, 10, 'Skin Whitening', 'Yes', 'VLCC', '899.00', 'png', 'No'),
(2, 2, 1, 'Head Massage', 'Yes', 'Nothing', '699.00', 'jpg', 'No'),
(2, 2, 2, 'Oil Massage', 'Yes', 'Nothing', '299.00', 'jpg', 'No'),
(2, 3, 1, 'Bikini Wax', 'Yes', 'Aloe Vera', '799.00', 'jpg', 'No'),
(2, 3, 1, 'Bikini Wax', 'Yes', 'Chocolate', '899.00', 'jpg', 'No'),
(2, 3, 1, 'Bikini Wax', 'Yes', 'Regular', '749.00', 'jpg', 'No'),
(2, 3, 1, 'Bikini Wax', 'Yes', 'Rica', '999.00', 'jpg', 'No'),
(2, 3, 2, 'Chin', 'Yes', 'Aloe Vera', '69.00', 'jpg', 'No'),
(2, 3, 2, 'Chin', 'Yes', 'Chocolate', '79.00', 'jpg', 'No'),
(2, 3, 2, 'Chin', 'Yes', 'Regular', '59.00', 'jpg', 'No'),
(2, 3, 2, 'Chin', 'Yes', 'Rica', '89.00', 'jpg', 'No'),
(2, 3, 3, 'Full Arms &amp; Under Arms', 'Yes', 'Chocolate', '399.00', 'jpg', 'No'),
(2, 3, 3, 'Full Arms &amp; Under Arms', 'Yes', 'Regular', '259.00', 'jpg', 'No'),
(2, 3, 3, 'Full Arms &amp; Under Arms', 'Yes', 'Rica', '599.00', 'jpg', 'No'),
(2, 3, 4, 'Full Back', 'Yes', 'Aloe Vera', '249.00', 'jpeg', 'No'),
(2, 3, 4, 'Full Back', 'Yes', 'Chocolate', '299.00', 'jpeg', 'No'),
(2, 3, 4, 'Full Back', 'Yes', 'Regular', '249.00', 'jpeg', 'No'),
(2, 3, 4, 'Full Back', 'Yes', 'Rica', '349.00', 'jpeg', 'No'),
(2, 3, 5, 'Full Body', 'Yes', 'Chocolate', '1299.00', 'png', 'No'),
(2, 3, 5, 'Full Body', 'Yes', 'Regular', '1099.00', 'png', 'No'),
(2, 3, 5, 'Full Body', 'Yes', 'Rica', '1499.00', 'png', 'No'),
(2, 3, 6, 'Full Legs', 'Yes', 'Chocolate', '599.00', 'jpg', 'No'),
(2, 3, 6, 'Full Legs', 'Yes', 'Regular', '499.00', 'jpg', 'No'),
(2, 3, 6, 'Full Legs', 'Yes', 'Rica', '699.00', 'jpg', 'No'),
(2, 3, 7, 'Half Legs', 'Yes', 'Chocolate', '399.00', 'jpg', 'No'),
(2, 3, 7, 'Half Legs', 'Yes', 'Regular', '299.00', 'jpg', 'No'),
(2, 3, 7, 'Half Legs', 'Yes', 'Rica', '499.00', 'jpg', 'No'),
(2, 3, 8, 'Stomach', 'Yes', 'Aloe Vera', '199.00', 'jpg', 'No'),
(2, 3, 8, 'Stomach', 'Yes', 'Chocolate', '249.00', 'jpg', 'No'),
(2, 3, 8, 'Stomach', 'Yes', 'Regular', '199.00', 'jpg', 'No'),
(2, 3, 8, 'Stomach', 'Yes', 'Rica', '299.00', 'jpg', 'No'),
(2, 3, 9, 'Under Arms', 'Yes', 'Aloe Vera', '69.00', 'jpg', 'No'),
(2, 3, 9, 'Under Arms', 'Yes', 'Chocolate', '79.00', 'jpg', 'No'),
(2, 3, 9, 'Under Arms', 'Yes', 'Regular', '59.00', 'jpg', 'No'),
(2, 3, 9, 'Under Arms', 'Yes', 'Rica', '89.00', 'jpg', 'No'),
(2, 3, 10, 'Upper Lips', 'Yes', 'Aloe Vera', '69.00', 'jpg', 'No'),
(2, 3, 10, 'Upper Lips', 'Yes', 'Chocolate', '79.00', 'jpg', 'No'),
(2, 3, 10, 'Upper Lips', 'Yes', 'Regular', '59.00', 'jpg', 'No'),
(2, 3, 10, 'Upper Lips', 'Yes', 'Rica', '89.00', 'jpg', 'No'),
(2, 4, 1, 'Face &amp; Neck', 'Yes', 'Nothing', '479.00', 'jpg', 'No'),
(2, 4, 2, 'Full Arms', 'Yes', 'Nothing', '499.00', 'jpg', 'No'),
(2, 4, 3, 'Full Body', 'Yes', 'Nothing', '1999.00', 'jpg', 'No'),
(2, 4, 4, 'Full Legs', 'Yes', 'Nothing', '619.00', 'jpg', 'No'),
(2, 4, 5, 'Half Arms', 'Yes', 'Nothing', '379.00', 'jpg', 'No'),
(2, 4, 6, 'Half Back / Front', 'Yes', 'Nothing', '489.00', 'jpg', 'No'),
(2, 4, 7, 'Half Legs', 'Yes', 'Nothing', '519.00', 'jpg', 'No'),
(2, 4, 8, 'Under Arms', 'Yes', 'Nothing', '279.00', 'jpg', 'No'),
(2, 5, 1, 'Face &amp; Neck', 'Yes', 'Nothing', '359.00', 'jpg', 'No'),
(2, 5, 2, 'Feet', 'Yes', 'Nothing', '219.00', 'jpg', 'No'),
(2, 5, 3, 'Full Arms', 'Yes', 'Nothing', '399.00', 'jpg', 'No'),
(2, 5, 4, 'Full Back / Front', 'Yes', 'Nothing', '479.00', 'jpg', 'No'),
(2, 5, 5, 'Full Body', 'Yes', 'Nothing', '1499.00', 'jpg', 'No'),
(2, 5, 6, 'Full Legs', 'Yes', 'Nothing', '499.00', 'jpg', 'No'),
(2, 5, 7, 'Half Arms', 'Yes', 'Nothing', '199.00', 'jpg', 'No'),
(2, 5, 8, 'Half Back / Front', 'Yes', 'Nothing', '369.00', 'jpg', 'No'),
(2, 5, 9, 'Half Legs', 'Yes', 'Nothing', '399.00', 'jpg', 'No'),
(2, 5, 10, 'Under Arms', 'Yes', 'Nothing', '149.00', 'jpg', 'No'),
(2, 6, 1, 'Cocoa Butter Clean-Up', 'Yes', 'Nothing', '749.00', 'jpg', 'No'),
(2, 6, 2, 'De-Tan Clean-Up', 'Yes', 'Nothing', '599.00', 'png', 'No'),
(2, 6, 3, 'Finishing Mask', 'Yes', 'Nothing', '649.00', 'jpg', 'No'),
(2, 6, 4, 'Fruit Clean-Up', 'Yes', 'Nothing', '499.00', 'jpg', 'No'),
(2, 6, 5, 'Organic Clean-Up', 'Yes', 'Nothing', '549.00', 'jpg', 'No'),
(2, 6, 6, 'Pores Clean-Up', 'Yes', 'Nothing', '899.00', 'jpg', 'No'),
(2, 7, 1, 'Feather Cut', 'Yes', 'Nothing', '349.00', 'jpg', 'No'),
(2, 7, 2, 'Hair Wash Conditioning', 'Yes', 'Nothing', '199.00', 'jpg', 'No'),
(2, 7, 3, 'Laser Cut', 'Yes', 'Nothing', '299.00', 'jpg', 'No'),
(2, 7, 4, 'Loose Curls', 'Yes', 'Nothing', '699.00', 'jpg', 'No'),
(2, 7, 5, 'Step Cut', 'Yes', 'Nothing', '299.00', 'jpg', 'No'),
(2, 7, 6, 'Hair Trim', 'Yes', 'Nothing', '129.00', 'jpg', 'No'),
(2, 7, 7, 'U Cut', 'Yes', 'Nothing', '219.00', 'jpg', 'No'),
(2, 8, 1, 'Global Hair Colour (Long)', 'Yes', 'L\'Oreal', '1499.00', 'jpg', 'No'),
(2, 8, 1, 'Global Hair Colour (Long)', 'Yes', 'Matrix', '1399.00', 'jpg', 'No'),
(2, 8, 1, 'Global Hair Colour (Long)', 'Yes', 'Streax', '1199.00', 'jpg', 'No'),
(2, 8, 2, 'Global Hair Colour (Medium)', 'Yes', 'L\'Oreal', '1199.00', 'jpg', 'No'),
(2, 8, 2, 'Global Hair Colour (Medium)', 'Yes', 'Matrix', '1099.00', 'jpg', 'No'),
(2, 8, 2, 'Global Hair Colour (Medium)', 'Yes', 'Streax', '899.00', 'jpg', 'No'),
(2, 8, 3, 'Global Hair Colour (Short)', 'Yes', 'L\'Oreal', '799.00', 'jpg', 'No'),
(2, 8, 3, 'Global Hair Colour (Short)', 'Yes', 'Matrix', '699.00', 'jpg', 'No'),
(2, 8, 3, 'Global Hair Colour (Short)', 'Yes', 'Streax', '599.00', 'jpg', 'No'),
(2, 8, 4, 'Hair Highlight (per Streak)', 'Yes', 'Nothing', '249.00', 'jpg', 'Yes'),
(2, 9, 1, 'Hair Treatment (Long)', 'Yes', 'Nothing', '999.00', 'jpg', 'No'),
(2, 9, 2, 'Hair Treatment (Medium)', 'Yes', 'Nothing', '849.00', 'jpg', 'No'),
(2, 9, 3, 'Hair Treatment (Short)', 'Yes', 'Nothing', '699.00', 'jpg', 'No'),
(2, 10, 1, 'Hair Straightening (Permanent)', 'Yes', 'Nothing', '3999.00', 'jpg', 'No'),
(2, 10, 2, 'Hair Straightening or Ironing (Temporary)', 'Yes', 'Nothing', '999.00', 'jpg', 'No'),
(2, 11, 1, 'Hair Smoothening', 'Yes', 'Long', '3999.00', 'jpg', 'No'),
(2, 11, 1, 'Hair Smoothening', 'Yes', 'Medium', '3499.00', 'jpg', 'No'),
(2, 11, 1, 'Hair Smoothening', 'Yes', 'Short', '2999.00', 'jpg', 'No'),
(2, 12, 1, 'Both Sides - Both Palms', 'Yes', 'Nothing', '399.00', 'jpg', 'Yes'),
(2, 12, 2, 'Bridal Mehendi', 'Yes', 'Nothing', '1499.00', 'jpg', 'Yes'),
(2, 12, 3, 'Feet - Single Side', 'Yes', 'Nothing', '199.00', 'jpg', 'Yes'),
(2, 12, 4, 'Hair Mehendi', 'Yes', 'Long', '899.00', 'jpg', 'No'),
(2, 12, 4, 'Hair Mehendi', 'Yes', 'Medium', '699.00', 'jpg', 'No'),
(2, 12, 4, 'Hair Mehendi', 'Yes', 'Short', '499.00', 'jpg', 'No'),
(2, 12, 5, 'Palm - Single Side', 'Yes', 'Nothing', '99.00', 'jpg', 'No'),
(2, 13, 1, 'Chin', 'Yes', 'Nothing', '29.00', 'jpg', 'No'),
(2, 13, 2, 'Eyebrows', 'Yes', 'Nothing', '29.00', 'jpg', 'No'),
(2, 13, 3, 'Forehead', 'Yes', 'Nothing', '29.00', 'jpg', 'No'),
(2, 13, 4, 'Full Face', 'Yes', 'Nothing', '149.00', 'png', 'No'),
(2, 13, 5, 'Side Burns', 'Yes', 'Nothing', '49.00', 'jpg', 'No'),
(2, 13, 6, 'Upper Lip', 'Yes', 'Nothing', '29.00', 'jpg', 'No'),
(2, 14, 1, 'Hair Spa (Below Waist)', 'Yes', 'Nothing', '1499.00', 'jpg', 'No'),
(2, 14, 2, 'Hair Spa (Upto Shoulder)', 'Yes', 'Nothing', '799.00', 'jpg', 'No'),
(2, 14, 3, 'Hair Spa (Upto Waist)', 'Yes', 'Nothing', '999.00', 'jpg', 'No'),
(2, 15, 1, 'Classic Manicure', 'Yes', 'Regular', '399.00', 'jpg', 'No'),
(2, 15, 1, 'Classic Manicure', 'Yes', 'VLCC', '449.00', 'jpg', 'No'),
(2, 15, 2, 'Crystal Manicure', 'Yes', 'Nothing', '569.00', 'jpg', 'Yes'),
(2, 15, 3, 'Cut, File &amp; Polish', 'Yes', 'Nothing', '149.00', 'jpg', 'Yes'),
(2, 16, 1, 'Classic Pedicure', 'Yes', 'Regular', '499.00', 'jpg', 'No'),
(2, 16, 1, 'Classic Pedicure', 'Yes', 'VLCC', '549.00', 'jpg', 'No'),
(2, 16, 2, 'Crystal Pedicure', 'Yes', 'Nothing', '799.00', 'jpg', 'Yes'),
(2, 16, 3, 'Cut, File &amp; Polish', 'Yes', 'Nothing', '149.00', 'jpg', 'Yes'),
(2, 17, 1, 'Bridal Makeup', 'Yes', 'Nothing', '6999.00', 'jpg', 'No'),
(2, 17, 2, 'Normal Party Makeup 1', 'Yes', 'Nothing', '1499.00', 'jpg', 'No'),
(2, 17, 3, 'Normal Party Makeup 2', 'Yes', 'Nothing', '1999.00', 'jpg', 'No'),
(2, 17, 4, 'Normal Party Makeup 3', 'Yes', 'Nothing', '1999.00', 'jpg', 'No'),
(2, 17, 5, 'Normal Party Makeup 4', 'Yes', 'Nothing', '2499.00', 'jpg', 'No'),
(2, 17, 6, 'Pre-Bridal Makeup', 'Yes', 'Nothing', '11999.00', 'jpg', 'No'),
(2, 18, 1, 'Package 1', 'Yes', 'Nothing', '1099.00', 'jpg', 'No'),
(2, 18, 2, 'Package 2', 'Yes', 'Nothing', '1299.00', 'jpg', 'No'),
(2, 18, 3, 'Package 3', 'Yes', 'Nothing', '1599.00', 'jpg', 'No'),
(2, 18, 4, 'Package 4', 'Yes', 'Nothing', '1799.00', 'jpg', 'No'),
(2, 18, 5, 'Package 5', 'Yes', 'Nothing', '2999.00', 'jpg', 'No'),
(2, 18, 6, 'Package 6', 'Yes', 'Nothing', '1849.00', 'jpg', 'No'),
(2, 18, 7, 'Package 7', 'Yes', 'Nothing', '2999.00', 'jpg', 'No'),
(2, 18, 8, 'Package 8', 'Yes', 'Nothing', '1649.00', 'jpg', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm` enum('Yes','No') NOT NULL DEFAULT 'No',
  `confirm_code` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk6` FOREIGN KEY (`product_brand`) REFERENCES `product` (`product_brand`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `f1` FOREIGN KEY (`product_brand`) REFERENCES `brand` (`product_brand`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
