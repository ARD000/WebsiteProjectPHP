-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 06:06 PM
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
-- Database: `sneakers`
--
CREATE DATABASE IF NOT EXISTS `sneakers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sneakers`;

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `BasketID` int(11) NOT NULL,
  `ProductID` int(15) NOT NULL,
  `OrderID` int(15) NOT NULL,
  `Stock` int(6) NOT NULL,
  `Subtotal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`BasketID`, `ProductID`, `OrderID`, `Stock`, `Subtotal`) VALUES
(1, 123456, 123456, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(15) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(13) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Email`, `Phone`, `Address`) VALUES
(1, 'John', 'Doe', 'johndoe@mail.com', 123456789, 'Millenuim Point');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `DeliveryID` int(15) NOT NULL,
  `CustomerID` int(15) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `County/State` varchar(30) NOT NULL,
  `Town/City` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(13) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Postcode` varchar(8) NOT NULL,
  `OrderID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`DeliveryID`, `CustomerID`, `FirstName`, `LastName`, `County/State`, `Town/City`, `Email`, `Phone`, `Country`, `Address`, `Postcode`, `OrderID`) VALUES
(123456, 123456789, 'John', 'Doe', 'West Midlands', 'Birmingham', 'johndoe@mail.com', 123456789, 'England', 'Millenuim Point', 'B578U', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `CustomerID` int(15) NOT NULL,
  `Tracking` int(16) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderId`, `ProductID`, `OrderDate`, `CustomerID`, `Tracking`, `Price`) VALUES
(1, 0, '2024-02-07', 0, 0, 0),
(123456, 123456, '0000-00-00', 1, 123456, 115);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LatName` text NOT NULL,
  `CardNumber` int(11) NOT NULL,
  `ExpiryDate` int(11) NOT NULL,
  `CVC/CVV` int(11) NOT NULL,
  `Subtotal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `CustomerID`, `FirstName`, `LatName`, `CardNumber`, `ExpiryDate`, `CVC/CVV`, `Subtotal`) VALUES
(123456789, 123456789, 'John', 'Doe', 123456789, 225, 201, 115);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `Stock` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `OrderID`, `Name`, `Description`, `price`, `Stock`) VALUES
(2, 0, 'Nike Air VaporMax Plus', '', 205.00, 0),
(3, 0, 'Nike Air Force 1 \'07', '', 110.00, 0),
(4, 0, 'Nike Air Max 95 Essential', '', 175.00, 0),
(5, 0, 'Nike Air Huarache', '', 120.00, 0),
(6, 0, 'Nike Air Max 97', '', 175.00, 0),
(7, 0, 'Nike Air Max 270', '', 145.00, 0),
(8, 0, 'Nike Air Max 90', '', 145.00, 0),
(9, 0, 'Nike Go FlyEase', '', 120.00, 0),
(123, 0, 'Test Product', 'Testing', 50.00, 100),
(1234, 0, 'Test2', 'Testing2', 99.00, 100),
(12345, 0, 'test3', 'Testing3', 98.00, 20),
(123456, 123456, 'Jordan 1', 'Jordan 1 Mid Trainers in Black and Fire Red. Taking its inspiration from the original ground-breaking Jordan 1 from 1985, this mid-cut cushioned full-grain leather delight sits upon a solid rubber cupsole complete with a circular pattern for traction.\r\n\r\nFabric: Leather upper, Textile lining, and Other Materials Sole.\r\n\r\nProduct Care: To maintain appearance we recommend protecting with a suitable leather protector.\r\n\r\nStyle: Basketball.', 115.00, 999);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `address`, `country`, `city`, `postcode`, `first_name`, `last_name`, `is_admin`) VALUES
(7, 'Admin', 'admin@example.com', 'password', '2024-02-07 04:11:15', '2024-02-07 04:11:15', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(8, 'Normal User', 'User@mail.com', 'password1', '2024-02-07 13:59:28', '2024-02-07 13:59:28', 'High street', 'United Kingdom', 'Birmingham', 'B0000', NULL, NULL, 0),
(9, 'User 2', 'User2@mail.com', 'password', '2024-02-07 16:56:35', '2024-02-07 16:56:35', 'High street', 'United Kingdom', 'Birmingham', 'B0000', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`BasketID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`DeliveryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `BasketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123457;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123457;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
