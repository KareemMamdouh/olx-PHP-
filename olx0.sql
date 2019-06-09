-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 11:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olx0`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `AdsID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(1) NOT NULL,
  `Details` varchar(200) COLLATE utf8_bin NOT NULL,
  `Price` int(6) NOT NULL,
  `Image` varchar(150) CHARACTER SET utf8 NOT NULL,
  `Title` varchar(50) COLLATE utf8_bin NOT NULL,
  `UserID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `advertisments`
--

INSERT INTO `advertisments` (`AdsID`, `Date`, `Status`, `Details`, `Price`, `Image`, `Title`, `UserID`, `CategoryID`) VALUES
(82, '2019-03-30', 1, '4. 7-Inch Retina HD display with true Tone\r\nIP67 water and dust resistant (maximum depth of 1 meter up to 30 minutes)\r\n12MP camera with OIS and 4K video\r\n7MP FaceTime HD Camera with Retina flash\r\nTouc', 650, '1553978715803792264_51LXiIAOkfL._AC_UL436_.jpg', 'Apple iPhone 8 (64GB)', 18, 8),
(83, '2019-03-30', 1, 'Intel Core i5, 2.3Ghz Dual Core, 13-Inch, 128GB SSD, 8GB, English Keyboard, Mac OS Sierra, Space Gray - International Version', 1399, '15539842081327253316_item_XL_23065277_32463921.jpg', 'Apple MacBook Pro MPXQ2 Laptop', 19, 3),
(84, '2019-03-30', 1, 'Intex inflatable beanless bag air chair is ideal to ensure the desired comfort or for hiking trips with family and friends, to picnics or simply relax in an open space. Intex inflatable beanless bag a', 44, '1553981148762088505_item_XL_8294454_7915265.jpg', 'Intex 68579 Inflatable Beanless Bag Air Chair, Gra', 21, 9),
(85, '2019-03-30', 1, 'COMFORT: Fully cushioned memory foam insole for superior padded cushy comfort and shock absorptionDURABILITY: Lightweight construction with extended durability with breathable linings', 55, '155398423231051175_41sZUgZK7kL._AC_US218_.jpg', 'Stacy Adams Men is Dunbar ', 22, 3),
(86, '2019-03-30', 1, 'Brand: AFT\r\nModel Number: AFT_603\r\nColor: Black\r\nType: Office Chairs\r\nMaterial: Fabric\r\nMaterial Details: PVC Fabric\r\nBack Style: Solid\r\nNumber of Chairs: 1\r\nProduct Weight: 5 kg\r\nAssembly Required: N', 43, '1553982699303471860_item_XL_11403085_16007863.jpg', 'AFT 603 Office Chair with Wheels - Black', 20, 9),
(87, '2019-03-30', 1, 'Gina Royal is the definition of averageâ€”a shy Midwestern housewife with a happy marriage and two adorable children. But when a car accident reveals her husbandâ€™s secret life as a serial killer, sh', 5, '15539828681775448007_41leYSjxbyL._SY346_.jpg', 'Stillhouse Lake', 23, 4),
(88, '2019-03-30', 1, 'Since 1996 JavaScript: The Definitive Guide has been the bible for JavaScript programmersâ€”a programmer is guide and comprehensive reference to the core language and to the client-side JavaScript API', 33, '15539837652089918113_51CxDZt9xWL._SX260_.jpg', 'JavaScript: The Definitive Guide: Activate Your We', 24, 4),
(89, '2019-03-30', 1, 'Sony PlayStation 4 Slim delivers the best in graphical interface and gaming experience. This PS 4 features 1TB Hard Disk, 1 Controller, and 5GHz WiFi connectivity.Go on fantastical adventures and get ', 400, '15539838971535297312_item_XL_11671718_17792472.jpg', 'Sony PlayStation 4 Slim - 1TB, 1 Controller, Black', 2, 5),
(90, '2019-03-30', 1, 'Get one step closer to innovation with the Samsung QLED Smart TV. With its massive 75inch QLED display and 4K picture resolution, the Samsung TV is bound to leave you awestruck and enhance your overal', 1000, '1553984700876699826_item_XL_36454179_143094954.jpg', 'Samsung 75 Inch QLED 4K Smart TV - 75Q7FNA', 22, 3),
(91, '2019-05-10', 0, 'sx', 22, '1557503944265784482_download (1).png', 'sx', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `areaID` int(11) NOT NULL,
  `areaName` varchar(20) COLLATE utf8_bin NOT NULL,
  `cityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`areaID`, `areaName`, `cityID`) VALUES
(1, 'New Cairo', 1),
(2, 'Abu Qir', 2),
(3, 'Agami', 2),
(4, 'Faisal', 3),
(5, 'Nasr City', 1),
(6, 'Zamalek', 1),
(7, 'Maadi', 1),
(8, 'Helwan', 1),
(9, 'Glim', 2),
(10, 'El Max', 2),
(11, 'San Stefano', 2),
(12, 'Dokki', 3),
(13, 'Haram', 3),
(14, 'Imbaba', 3),
(15, 'Samanoud', 4),
(16, 'Zefta', 4),
(17, 'Zinnia', 5),
(18, 'Armant', 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(3, 'car'),
(4, 'Books'),
(5, 'Electronics'),
(6, 'Fashion'),
(7, 'Pets'),
(8, 'Mobile Phones & Accessories'),
(9, 'Furniture'),
(10, 'Real Estate');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityID` int(11) NOT NULL,
  `cityName` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityID`, `cityName`) VALUES
(1, 'Cairo'),
(2, 'Alexandria'),
(3, 'Giza'),
(4, 'Gharbia'),
(5, 'Luxor');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(1) NOT NULL,
  `Details` varchar(100) COLLATE utf8_bin NOT NULL,
  `UserID` int(11) NOT NULL,
  `AdsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `Date`, `Status`, `Details`, `UserID`, `AdsID`) VALUES
(5, '2019-03-30', 1, 'nice', 2, 89),
(18, '2019-04-06', 1, 'nice', 2, 90),
(19, '2019-04-06', 1, 'sx', 2, 82),
(20, '2019-04-06', 1, 'scsc', 2, 82);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `UserID` int(11) NOT NULL,
  `AdsID` int(11) NOT NULL,
  `details` varchar(100) COLLATE utf8_bin NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`UserID`, `AdsID`, `details`, `Date`) VALUES
(2, 85, 'bad', '2019-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(20) COLLATE utf8_bin NOT NULL,
  `Email` varchar(40) COLLATE utf8_bin NOT NULL,
  `Password` varchar(20) COLLATE utf8_bin NOT NULL,
  `Phone` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `Status` int(1) DEFAULT NULL,
  `areaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Email`, `Password`, `Phone`, `type`, `Status`, `areaID`) VALUES
(0, 'Admin', 'Admin@Admin', '11', 1, 1, 2, 1),
(2, 'kareem.mamdouh', 'kareem.mamdouh97@yahoo.com', '11', 3434, 1, 1, 1),
(18, 'mohamed', 'mohamed@yahoo.com', '11', 123456, 1, 1, 4),
(19, 'ahmed', 'ahmed@yahoo.com', '11', 12345, 1, 1, 3),
(20, 'mamdouh', 'mamdouh@yahoo.com', '11', 123, 1, 1, 13),
(21, 'sarah', 'sarah@yahoo.com', '11', 12, 2, 1, 9),
(22, 'ayman', 'ayman@yahoo.com', '11', 32, 1, 1, 16),
(23, 'mostafa', 'mostafa@yahoo.com', '11', 11, 1, 1, 18),
(24, 'islam', 'islam@yahoo.com', '11', 12332, 1, 1, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`AdsID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`areaID`),
  ADD KEY `cityID` (`cityID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `AdsID` (`AdsID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`UserID`,`AdsID`),
  ADD KEY `adsidFK` (`AdsID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD KEY `areaID` (`areaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisments`
--
ALTER TABLE `advertisments`
  MODIFY `AdsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `areaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD CONSTRAINT `catidFK` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `useridFK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `cityidFK` FOREIGN KEY (`cityID`) REFERENCES `cities` (`cityID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `AdsFK` FOREIGN KEY (`AdsID`) REFERENCES `advertisments` (`AdsID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userFK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `Userridfk` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `adsidFK` FOREIGN KEY (`AdsID`) REFERENCES `advertisments` (`AdsID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `areaidFK` FOREIGN KEY (`areaID`) REFERENCES `areas` (`areaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
