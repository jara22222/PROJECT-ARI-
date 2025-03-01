-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 06:21 PM
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
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AID` varchar(6) NOT NULL,
  `EID` varchar(6) DEFAULT NULL,
  `SID` varchar(6) DEFAULT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adds_on`
--

CREATE TABLE `adds_on` (
  `ADID` varchar(6) NOT NULL,
  `add_name` varchar(10) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EID` varchar(6) NOT NULL,
  `RID` varchar(6) NOT NULL,
  `UID` varchar(6) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `ln` varchar(50) NOT NULL,
  `mid` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `bday` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `profile` text NOT NULL,
  `date_hired` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `employees`
--
DELIMITER $$
CREATE TRIGGER `time_date` BEFORE INSERT ON `employees` FOR EACH ROW set new.date_hired = CURRENT_TIMESTAMP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `OID` varchar(6) NOT NULL,
  `PID` varchar(6) NOT NULL,
  `ADID` varchar(6) NOT NULL,
  `qty` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OID` varchar(6) NOT NULL,
  `EID` varchar(6) NOT NULL,
  `size` varchar(30) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PID` varchar(6) NOT NULL,
  `SID` varchar(6) DEFAULT NULL,
  `PTID` varchar(10) NOT NULL,
  `product_name` varchar(6) NOT NULL,
  `product_description` longtext NOT NULL,
  `stocks` int(11) NOT NULL DEFAULT 0,
  `status` varchar(30) DEFAULT NULL,
  `size` varchar(6) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `before_product_insert` BEFORE INSERT ON `products` FOR EACH ROW BEGIN
    DECLARE max_id VARCHAR(10);
    DECLARE new_number INT;
    
    -- Get the maximum PID value
    SELECT MAX(PID) INTO max_id FROM products WHERE PID LIKE 'PD-%';

    -- If no PID exists, start from 1
    IF max_id IS NULL THEN
        SET new_number = 1;
    ELSE
        SET new_number = CAST(SUBSTRING(max_id, 4) AS UNSIGNED) + 1;
    END IF;

    -- Format the new PID as 'PD-XXX'
    SET NEW.PID = CONCAT('PD-', LPAD(new_number, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `PTID` varchar(10) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`PTID`, `type_name`) VALUES
('PTID-001', 'Coffee'),
('PTID-002', 'Pastry'),
('PTID-003', 'Rice Meal');

--
-- Triggers `product_type`
--
DELIMITER $$
CREATE TRIGGER `before_insert_product_type` BEFORE INSERT ON `product_type` FOR EACH ROW BEGIN
    DECLARE max_id VARCHAR(10);
    DECLARE new_number INT;
    
    -- Get the maximum PTID value
    SELECT MAX(PTID) INTO max_id FROM product_type WHERE PTID LIKE 'PTID-%';

    -- If no PTID exists, start from 1
    IF max_id IS NULL THEN
        SET new_number = 1;
    ELSE
        -- Extract correct numeric part
        SET new_number = CAST(SUBSTRING(max_id, 6) AS UNSIGNED) + 1;
    END IF;

    -- Format as 'PTID-XXX'
    SET NEW.PTID = CONCAT('PTID-', LPAD(new_number, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RID` varchar(6) NOT NULL,
  `rolename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RID`, `rolename`) VALUES
('RID-49', 'Manager'),
('RID-82', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SID` varchar(6) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `license_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SID`, `company_name`, `contact_number`, `email`, `license_number`) VALUES
('SID-63', 'James Company', '09292396588', 'ad2m@gmail.com', 0),
('SID-85', 'Super Company', '09292396599', 'admin@gmail.com', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `supplier_addresses`
-- (See below for the actual view)
--
CREATE TABLE `supplier_addresses` (
`SID` varchar(6)
,`company_name` varchar(30)
,`contact_number` varchar(11)
,`email` varchar(30)
,`license_number` int(11)
,`AID` varchar(6)
,`street` varchar(30)
,`city` varchar(30)
,`province` varchar(30)
,`zipcode` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` varchar(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `username`, `password`) VALUES
('UID-27', 'Joe1123', '$2y$10$ZHdZIa1KwHz7yh4au2EffeScAbQgUng9eaugccMmVfUd3uq3nILMi'),
('UID-54', 'aaa', '$2y$10$s9lnBpAIpnbAYpUMfb3Du.AaUHMHNwC0xd0lMe8le4hQm0Z25cLdG');

-- --------------------------------------------------------

--
-- Structure for view `supplier_addresses`
--
DROP TABLE IF EXISTS `supplier_addresses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `supplier_addresses`  AS SELECT `s`.`SID` AS `SID`, `s`.`company_name` AS `company_name`, `s`.`contact_number` AS `contact_number`, `s`.`email` AS `email`, `s`.`license_number` AS `license_number`, `a`.`AID` AS `AID`, `a`.`street` AS `street`, `a`.`city` AS `city`, `a`.`province` AS `province`, `a`.`zipcode` AS `zipcode` FROM (`suppliers` `s` left join `address` `a` on(`s`.`SID` = `a`.`SID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `EID` (`EID`),
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `adds_on`
--
ALTER TABLE `adds_on`
  ADD PRIMARY KEY (`ADID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `UID` (`UID`),
  ADD KEY `employees_ibfk_2` (`RID`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`OID`,`PID`,`ADID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `EID` (`EID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `SID` (`SID`),
  ADD KEY `PTID` (`PTID`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`PTID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`EID`) REFERENCES `employees` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`SID`) REFERENCES `suppliers` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`EID`) REFERENCES `employees` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `suppliers` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`PTID`) REFERENCES `product_type` (`PTID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
