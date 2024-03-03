-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 12:26 PM
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
-- Database: `bakehub`
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
(5, 'Smartphones', '2023-04-05 10:36:35'),
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
(12, 'BAKEHUB', 30, 'Use Coupon Code BAKEHUB to get 30% off.', 'Save your money upto Rs 300 in special items', 'Flat discount 30%', '../itemimages/offerimage/64ba16537cac5.jpg', 1, 0),
(19, 'BAKEHUB', 0, '', '', '', '', 0, 17),
(20, 'MYFIRSTORDER ', 40, 'Get 40% Off on your first order', 'Use Coupon Code MYFIRSTORDER to get 40% Off on you first order. Hurry Up!!!', 'Flat discount 40%', '../itemimages/offerimage/64bbae6cea5b9.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblfood`
--

CREATE TABLE `tblfood` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `ItemName` varchar(120) DEFAULT NULL,
  `ItemPrice` varchar(120) DEFAULT NULL,
  `ItemDes` varchar(500) DEFAULT NULL,
  `Image` varchar(120) DEFAULT NULL,
  `ItemQty` varchar(120) DEFAULT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `LaunchedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`ID`, `CategoryName`, `ItemName`, `ItemPrice`, `ItemDes`, `Image`, `ItemQty`, `Weight`, `LaunchedDate`) VALUES
(1, 'Laptops', ' Laptop Name', '130000', ' Description', '../itemimages/laptop/laptop2.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(2, 'Laptops', ' Laptop Name', '1200000', ' Description', '../itemimages/laptop/laptop1.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(3, 'Laptops', ' Laptop Name', '1200000', ' Description', '../itemimages/laptop/laptop3.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(4, 'Laptops', ' Laptop Name', '1200000', ' Description', '../itemimages/laptop/laptop4.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(5, 'Laptops', ' Laptop Name', '1200000', ' Description', '../itemimages/laptop/laptop5.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(6, 'Laptops', ' Laptop Name', '1200000', ' Description', '../itemimages/laptop/laptop6.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),


(7, 'Camera', ' Laptop Name', '1200000', ' Description', '../itemimages/Camera/camera1.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(8, 'Camera', ' Laptop Name', '1200000', ' Description', '../itemimages/Camera/camera2.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(9, 'Camera', ' Laptop Name', '1200000', ' Description', '../itemimages/Camera/camera3.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(10, 'Camera', ' Laptop Name', '1200000', ' Description', '../itemimages/Camera/camera4.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(11, 'Camera', ' Laptop Name', '1200000', ' Description', '../itemimages/Camera/camera5.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),

(12, 'Smartphones', ' Laptop Name', '1200000', ' Description', '../itemimages/Smartphones/smartphone1.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(13, 'Smartphones', ' Laptop Name', '1200000', ' Description', '../itemimages/Smartphones/smartphone2.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(14, 'smartPhones', ' Laptop Name', '1200000', ' Description', '../itemimages/Smartphones/smartphone3.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(15, 'SmartPhones', ' Laptop Name', '1200000', ' Description', '../itemimages/Smartphones/smartphone4.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(16, 'smartPhones', ' Laptop Name', '1200000', ' Description', '../itemimages/Smartphones/smartphone5.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(17, 'Smartphones', ' Laptop Name', '1200000', ' Description', '../itemimages/Smartphones/smartphone6.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),

(18, 'Earbuds', ' Laptop Name', '1200000', ' Description', '../itemimages/Earbuds/earbud1.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(19, 'Earbuds', ' Laptop Name', '1200000', ' Description', '../itemimages/Earbuds/earbud2.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(20, 'Earbuds', ' Laptop Name', '1200000', ' Description', '../itemimages/Earbuds/earbud3.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(21, 'Earbuds', ' Laptop Name', '1200000', ' Description', '../itemimages/Earbuds/earbud4.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),
(22, 'Earbuds', ' Laptop Name', '1200000', ' Description', '../itemimages/Earbuds/earbud5.jpg', '1 pcs', '500 gm', '2023-07-16 03:20:28'),




(62, 'Cookies', 'Vegan almond cookies ', '700', ' prepared with almond flour or ground almonds, creating a delicate and nutty flavor. Sweetened with a natural sweetener like maple syrup or coconut sugar, these cookies offer a delightful balance of sweetness and nuttiness. ', '../itemimages/cookies/Vegan almond cookies.jpg', '1 pcs', '980 gm', '2023-07-16 03:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodtracking`
--

CREATE TABLE `tblfoodtracking` (
  `ID` int(10) NOT NULL,
  `OrderId` char(50) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `status` char(50) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp(),
  `OrderCanclledByUser` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(31, '17', '470428413', '12', 'lalitpur', 'lalitpur', '', 'lalitpur', '2023-07-22 10:08:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `ID` int(11) NOT NULL,
  `UserId` char(10) DEFAULT NULL,
  `FoodId` char(10) DEFAULT NULL,
  `IsOrderPlaced` int(11) DEFAULT NULL,
  `OrderNumber` char(100) DEFAULT NULL,
  `Mode` varchar(100) DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `discount_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`ID`, `UserId`, `FoodId`, `IsOrderPlaced`, `OrderNumber`, `Mode`, `OrderDate`, `discount_amount`) VALUES
(68, '16', '4', NULL, NULL, NULL, '2023-07-22 10:04:27', 0),
(69, '17', '8', 1, '470428413', 'Cash on Delivery', '2023-07-22 10:07:06', 0);

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
(1, 'aboutus', 'About us', '<p class=\"MsoNormal\"><span style=\"font-size: 11.5pt; line-height: 115%; font-family: Roboto; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">At GadjetHub, our mission is to make technology accessible, exciting, and seamless for everyone. We strive to provide our customers with the latest advancements in technology, ensuring they have access to the tools they need to enhance their lives, work, and leisure activities.</span></p>', NULL, NULL, '2021-07-16 06:44:44'),
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
-- Indexes for table `tblfood`
--
ALTER TABLE `tblfood`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfoodtracking`
--
ALTER TABLE `tblfoodtracking`
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
  ADD KEY `UserId` (`UserId`,`FoodId`,`OrderNumber`);

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
  MODIFY `discount_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblfood`
--
ALTER TABLE `tblfood`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tblfoodtracking`
--
ALTER TABLE `tblfoodtracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
