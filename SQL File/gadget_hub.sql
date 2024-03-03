-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 04:42 PM
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
-- Database: `gadget_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` varchar(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'Smriti', 7894561238, 'admin@gmail.com', '3e7bf1383bcdd338f3d837f3dc948f80', '2023-04-05 07:16:39'),
(2, 'Admin', 'Jyoti', 7894561238, 'admin@gmail.com', '3e7bf1383bcdd338f3d837f3dc948f80', '2023-04-06 07:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(5) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `PublishedDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `PublishedDate`) VALUES
(3, 'Laptops', '2023-04-05 10:36:01'),
(4, 'Camera', '2023-04-05 10:36:25'),
(5, 'Mobile Phones', '2023-04-05 10:36:35'),
(6, 'Earbuds', '2023-04-05 10:36:47'),
(7, 'Speaker', '2023-04-05 10:43:13'),
(9, 'Smartwatches', '2023-04-24 05:43:08'),
(10, 'Vacumm Cleaner', '2023-05-06 16:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Romeo', 'Romeo@gmail.com', 'cost of valentine cake', '2023-07-05 07:26:24', 1),
(2, 'Miri', 'Miri@gmail.com', 'Delivery charge after 11 a.m?', '2023-07-09 12:48:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldiscount`
--

CREATE TABLE `tbldiscount` (
  `discount_id` int(10) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `discount` double NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `offer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_used` tinyint(1) NOT NULL,
  `UserId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldiscount`
--

INSERT INTO `tbldiscount` (`discount_id`, `coupon_code`, `discount`, `title`, `description`, `offer`, `image`, `is_used`, `UserId`) VALUES
(22, 'SAMSUNGWATCH', 50, 'Super sale SAMSUNG WATCH', 'Buy samsung watch and get discount upto 50%', '50% discount off', '../itemimages/offerimage/65db4a386841e.jpg', 0, 0),
(23, 'SAMSUNGWATCH', 0, '', '', '', '', 0, 17),
(24, 'IPHONES', 20, 'Sale! sale! Sale!', 'Buy iPhone and get gift hampers', '20% discount on all iPhones', '../itemimages/offerimage/65dd48a744bbc.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblitem`
--

CREATE TABLE `tblitem` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `ItemName` varchar(120) DEFAULT NULL,
  `ItemPrice` varchar(120) DEFAULT NULL,
  `ItemDes` varchar(500) DEFAULT NULL,
  `Image` varchar(120) DEFAULT NULL,
  `ItemQty` varchar(120) DEFAULT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `LaunchedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblitem`
--

INSERT INTO `tblitem` (`ID`, `CategoryName`, `ItemName`, `ItemPrice`, `ItemDes`, `Image`, `ItemQty`, `Weight`, `LaunchedDate`, `color`) VALUES
(1, 'Laptops', ' MacBook Pro', '130000', ' Refurbished 14\" MacBook Pro mit Apple M1 Max Chip, 10?Core CPU und 32?Core GPU - Space Grau - Apple (CH)', '../itemimages/laptop/image2.jpeg', '1 pcs', '500 gm', '2023-07-16 03:20:28', NULL),
(2, 'Laptops', ' Macbook M2', '1780000', ' Apple MacBook Air 13.6 Inch | M2 chip with 8-core CPU and 8-core gpu', '../itemimages/laptop/image3.webp', '1', '500 gm', '2023-07-16 03:20:28', NULL),
(3, 'Laptops', ' HP', '100000', ' HP 14-DQ2031WM Laptop Intel Core i3-1115G4 / Intel UHD Graphics / 8GB DDR4 RAM / 256GB SSD / Windows 11 Home / 14? HD Screen', '../itemimages/laptop/image4.webp', '1', '500 gm', '2023-07-16 03:20:28', NULL),
(4, 'Laptops', ' Lenovo ThinkPad', '1400000', ' Lenovo ThinkPad L14 Gen 2 Business Laptop 14.0\" FHD IPS (AMD Ryzen 5 Pro 5650U 2.30GHz, 64GB RAM, 2TB PCIe SSD, AMD Radeon, FP, WiFi 6, BT 5.2, RJ-45, microSDXC, Win 11 Pro) w/Dockztorm Dock', '../itemimages/laptop/image4.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28', NULL),
(5, 'Laptops', ' Dell', '127493', ' 2021 Dell Inspiron 15 3000 3501 15.6 Business Laptop 11th Gen Intel Core i5-1135G7 4-Core, 8G RAM 256G SSD 15.6 FHD Screen, Intel UHD Graphics, WiFi, Bluetooth, Webcam, Windows 10 PRO', '../itemimages/laptop/image6.jpeg', '1 pcs', '500 gm', '2023-07-16 03:20:28', NULL),
(6, 'Laptops', ' ASUS VivoBook', '63260', ' ASUS VivoBook Flip 14 Thin & Light 2-in-1 Laptop, 14” FHD Touchscreen, Intel Celeron Dual Core N4000 Processor, 4GB RAM, 64GB Storage, Fingerprint Reader, Windows 10 in S Mode, J401MA-YS02', '../itemimages/laptop/image7.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28', NULL),
(12, 'Mobile Phones', ' Iphone 7+', '60000', '  RAM/ROM : 2GB/3GB & 32GB/128GB/256GB\n CAMERA : 12 MP\n PROCESSOR : A10 Fusion chip with 64-bit architecture Embedded M10 motion coprocessor\n SCREEN SIZE : 4.7-inch (diagonal) LED-backlit widescreen\n Warranty : 1 Year world-wide warranty', '../itemimages/Smartphones/phone1.jpeg', '1 pcs', '500 gm', '2023-07-16 03:20:28', NULL),
(13, 'Mobile Phones', ' Redmi 13C 5G', '20000', ' MediaTek Dimensity 6100+ 5G Processor 17.11cm(6.74)\" Dot Drop display FilmCamera | HDR Mode | Night Mode\n50MP AI main camera', '../itemimages/Smartphones/phone2.webp', '1 pcs', '500 gm', '2023-07-16 03:20:28', NULL),
(14, 'Mobile Phones', ' Samsung Galaxy A5', '25000', ' Performance:Octa core (2.2 GHz, Dual Core + 2 GHz, Hexa Core)MediaTek Dimensity 6100 Plus4 GB RAM  \nDisplay\n6.72 inches (17.07 cm)392 PPI, IPS LCD120 Hz Refresh Rate \nCamera\n50 MP + 2 MP Dual Primary CamerasLED Flash8 MP Front Camera \nBattery\n5000 mAhSuper VOOC ChargingUSB Type-C Port', '../itemimages/Smartphones/phone3.webp', '1 pcs', '500 gm', '2023-07-16 03:20:28', NULL),
(15, 'Mobile Phones', ' Oppo', '35000', '  RAM/ROM : 2GB/3GB & 32GB/128GB/256GB\n CAMERA : 12 MP\n PROCESSOR : A10 Fusion chip with 64-bit architecture Embedded M10 motion coprocessor\n SCREEN SIZE : 4.7-inch (diagonal) LED-backlit widescreen\n Warranty : 1 Year world-wide warranty', '../itemimages/Smartphones/phone4.jpeg', '1 pcs', '500 gm', '2023-07-16 03:20:28', NULL),
(16, 'Mobile Phones', ' Vivo', '12000', '  Body: 163.99 × 75.63 × 8.49mm, 186gm\nDisplay: 6.51? LCD panel, HD+ (1600 x 720), 60Hz refresh rate\nChipset: MediaTek P22\nMemory: 2/3GB RAM, 32GB storage (expandable)\nSoftware: Funtouch OS 12 (Android 12)\nRear Camera: 8MP, f/2.2\nFront Camera: 5MP, f/2.0 (waterdrop notch)\nBattery: 5000mAh, 10W charging', '../itemimages/Smartphones/phone5.jpeg', '1 pcs', '500 gm', '2023-07-16 03:20:28', NULL),
(63, 'Mobile Phones', 'Iphone15 Pro Max', '1499', '<div>Titanium design</div><div>Ceramic Shield front</div><div>Textured matte glass back</div>                                                         ', '4f54d7609aca00ab89e3f699da9108b8.jpg', '', '', '2024-02-26 14:03:08', ' Black Titanium, White Titanium, Blue Titanium, Natural Titanium');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderaddresses`
--

CREATE TABLE `tblorderaddresses` (
  `ID` int(11) NOT NULL,
  `UserId` char(100) DEFAULT NULL,
  `Ordernumber` char(100) DEFAULT NULL,
  `Flatnobuldngno` varchar(255) DEFAULT NULL,
  `StreetName` varchar(255) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `Landmark` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `OrderTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `OrderFinalStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblorderaddresses`
--

INSERT INTO `tblorderaddresses` (`ID`, `UserId`, `Ordernumber`, `Flatnobuldngno`, `StreetName`, `Area`, `Landmark`, `City`, `OrderTime`, `OrderFinalStatus`) VALUES
(31, '17', '470428413', '12', 'lalitpur', 'lalitpur', '', 'lalitpur', '2023-07-22 10:08:38', 'Cake being Prepared'),
(32, '17', '890112911', 'lalitpur', 'lalitpur', 'kathmandu', '', 'lalitpur', '2024-02-26 02:43:47', 'Cake Delivered'),
(33, '17', '125584984', 'lalitpur', 'lalitpur', 'kathmandu', '', 'lalitpur', '2024-02-27 01:47:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `ID` int(11) NOT NULL,
  `UserId` char(10) DEFAULT NULL,
  `ItemId` char(10) DEFAULT NULL,
  `IsOrderPlaced` int(11) DEFAULT NULL,
  `OrderNumber` char(100) DEFAULT NULL,
  `Mode` varchar(100) DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `discount_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`ID`, `UserId`, `ItemId`, `IsOrderPlaced`, `OrderNumber`, `Mode`, `OrderDate`, `discount_amount`) VALUES
(68, '16', '4', NULL, NULL, NULL, '2023-07-22 10:04:27', 0),
(69, '17', '8', 1, '470428413', 'Cash on Delivery', '2023-07-22 10:07:06', 0),
(70, '17', '3', 1, '890112911', 'Cash on Delivery', '2024-02-26 02:43:06', 50000),
(71, '17', '3', 1, '125584984', 'Paypal', '2024-02-26 12:02:05', 0),
(72, '17', '13', 1, '125584984', 'Paypal', '2024-02-26 12:08:37', 0),
(73, '17', '1', NULL, NULL, NULL, '2024-02-27 02:10:01', 0),
(74, '17', '2', NULL, NULL, NULL, '2024-02-27 14:24:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblordertracking`
--

CREATE TABLE `tblordertracking` (
  `ID` int(10) NOT NULL,
  `OrderId` char(50) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `status` char(50) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp(),
  `OrderCanclledByUser` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblordertracking`
--

INSERT INTO `tblordertracking` (`ID`, `OrderId`, `remark`, `status`, `StatusDate`, `OrderCanclledByUser`) VALUES
(9, '470428413', 'Your order is on the way', 'Cake being Prepared', '2024-02-25 13:35:46', NULL),
(10, '890112911', 'Order picked up', 'Cake Delivered', '2024-02-27 01:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', '<p class=\"MsoNormal\"><span style=\"font-size: 11.5pt; line-height: 115%; font-family: Roboto; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">At GadgetHub, our mission is to make technology accessible, exciting, and seamless for everyone. We strive to provide our customers with the latest advancements in technology, ensuring they have access to the tools they need to enhance their lives, work, and leisure activities.</span></p>', NULL, NULL, '2021-07-16 06:44:44'),
(2, 'contactus', 'Contact Us', 'Koteshwor-32, Kathmandu, Nepal', 'GadgetHub@gmail.com', 9834256533, '2023-06-01 14:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_used` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Password`, `RegDate`, `is_used`) VALUES
(13, 'Roseanne', 'Park', 'rosie@gmail.com', 9747828387, 'b2796b9d5f9448f049f85064b726280f', '2023-07-16 04:30:12', 0),
(16, 'Luffy', 'Hancock', 'luffy@gmail.com', 9801010101, '6cfbec608383fd05c271de92010d455f', '2023-07-22 09:41:57', 0),
(17, 'Dinesh', 'Rana', 'ranad4508@gmail.com', 9865747518, '9c9f1c65b1dc1f79498c9f09eb610e1a', '2023-07-22 10:06:54', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldiscount`
--
ALTER TABLE `tbldiscount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `tblitem`
--
ALTER TABLE `tblitem`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserId` (`UserId`,`Ordernumber`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserId` (`UserId`,`ItemId`,`OrderNumber`);

--
-- Indexes for table `tblordertracking`
--
ALTER TABLE `tblordertracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldiscount`
--
ALTER TABLE `tbldiscount`
  MODIFY `discount_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblitem`
--
ALTER TABLE `tblitem`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tblordertracking`
--
ALTER TABLE `tblordertracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
