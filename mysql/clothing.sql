-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 04:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productsize` varchar(200) NOT NULL,
  `productqty` int(11) NOT NULL,
  `productprice` float NOT NULL,
  `addedon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `productsize`, `productqty`, `productprice`, `addedon`) VALUES
(9, 1, 29, 'Large', 1, 999, 21);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Category` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Category`, `status`) VALUES
(1, 'Man', 1),
(2, 'Women', 1),
(3, 'Kids', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `Product` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Product`, `image`, `category`, `price`, `type`, `description`, `status`) VALUES
(21, 'Slim Boys Grey Jeans', 'blackJ.jpeg', '1', 599, '1', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...\r\n', 1),
(22, 'Slim Boys Blur Jeans', 'skinnyjeans1.jpeg', '1', 899, '1', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...\r\n', 1),
(23, 'Skinny Boys Grey Shirt', 'shirt.jpeg', '1', 299, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(24, 'Slim Girl Grey Jeans', 'womanjean2.1.jpeg', '2', 699, '1', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(25, 'Slim Girl Grey Top', 'topwoman3.jpeg', '2', 599, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(26, 'Slim Girl Pink Top', 'topwoman2.jpeg', '2', 399, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(27, 'Slim Boys Pink shirt', 'manShirt3.jpeg', '1', 670, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(28, 'Slim Kid  Jeans', 'jeansG3.jpeg', '3', 499, '1', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(29, 'Slim Boys G Shirt', 'manShirt1.2.jpeg', '1', 999, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(30, 'Slim Boys White Shirt', 'shirt6.jpeg', '1', 569, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(31, 'Slim Boys Grey Shirt', 'manShirt2.jpeg', '1', 789, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(33, 'Slim Kids Grey Jeans', 'kidsjean1.jpeg', '3', 560, '1', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(34, 'Kids Grey shoes', 'kidShoe2.jpeg', '3', 999, '3', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(35, ' Boys Grey Shoes', 'kidShoe.jpeg', '3', 799, '3', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(36, 'Slim Boys Llin Jeans', 'manjeans.jpeg', '1', 799, '1', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(37, 'Slim Girl Red Top', 'topwoman1.jpeg', '2', 789, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(39, 'Slim Boys check shirt', 'Full Shirt.2.jpeg', '1', 458, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(40, 'Slim Girl Black Jeans', 'womanjean3.jpeg', '2', 399, '1', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(41, 'Slim Boys White Tshirt', 'M-tshirt.1.jpeg', '1', 699, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(42, 'Slim Kids Brown Shirt', 'BShirt.jpeg', '3', 789, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior, ...', 1),
(43, 'Skinny Girl Grey Top', 'TopGirl1.1.jpeg', '2', 459, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior,', 1),
(45, 'Girl  RedGrey Top', 'girlTop5.jpeg', '2', 899, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior', 1),
(46, 'Kid Girl Grey Top', 'kid4.jpeg', '3', 359, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior', 1),
(47, 'Kid Girl Blacky Top', 'girlTop4.jpeg', '3', 459, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior', 1),
(48, 'Slim Girls Grey Dress', 'girlTop3.jpeg', '2', 899, '2', 'Discover girls & boys jeans online in dozens of styles and designs on Flipkart at heavily discounted prices from top brands like Allen Solly Junior', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `img2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`id`, `product_id`, `img1`, `img2`) VALUES
(21, 21, 'jeansB3.jpeg', ''),
(22, 22, 'skinnyjeans1.1.jpeg', 'skinnyjeans1.2.jpeg'),
(23, 23, 'shirt3.jpeg', 'shirt2.jpeg'),
(24, 24, 'womanjean2.2.jpeg', 'womanjean2.jpeg'),
(25, 25, 'topwoman3.1.jpeg', ''),
(26, 26, 'topwoman2.1.jpeg', ''),
(27, 27, 'manShirt3.1.jpeg', ''),
(28, 28, 'jeansG3.1.jpeg', ''),
(29, 29, 'manShirt1.2.jpeg', 'manShirt1.1.jpeg'),
(30, 30, 'shirt4.jpeg', ''),
(31, 31, 'manShirt2.1jpeg.jpeg', ''),
(33, 33, 'kidsjean1.2.jpeg', ''),
(34, 34, 'kidShoe2.1.jpeg', ''),
(35, 35, 'kidShoe1.1.jpeg', ''),
(36, 36, 'manjeans1.jpeg', 'manjeans2.jpeg'),
(37, 37, 'topwoman1.1.jpeg', ''),
(39, 39, 'full shirt.1.jpeg', ''),
(40, 40, 'womanjean3.2.jpeg', ''),
(41, 41, 'M-tshirt.jpeg', ''),
(42, 42, 'Bshirt1.jpeg', 'Bshirt2.jpeg'),
(43, 43, 'TopGirl.jpeg', ''),
(45, 45, 'girlTop5.1.jpeg', ''),
(46, 46, 'kid4.1.jpeg', ''),
(47, 47, 'girlTop4.1.jpeg', ''),
(48, 48, 'girlTop3.1.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `productsize`
--

CREATE TABLE `productsize` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `size` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productsize`
--

INSERT INTO `productsize` (`id`, `category`, `type`, `size`) VALUES
(1, 1, 1, 'Large,Medium,Small'),
(2, 1, 2, 'Large,Medium,Small'),
(3, 1, 3, '56,57,58,59,60'),
(4, 2, 1, 'Large,Medium,Small'),
(5, 2, 2, 'Large,Medium,Small'),
(6, 2, 3, '46,47,48,49,50'),
(7, 3, 1, 'Large,Medium,Small'),
(8, 3, 2, 'Large,Medium,Small'),
(9, 3, 3, '10,11,12,13,14');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `Type` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`id`, `Type`, `status`) VALUES
(1, 'Jeans', 1),
(2, 'Shirts', 1),
(3, 'Shoes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'kapil', 'kapil20@gmail.com', 'kapil20', '6773298221');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsize`
--
ALTER TABLE `productsize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `productsize`
--
ALTER TABLE `productsize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
