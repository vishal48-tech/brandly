-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 10:58 AM
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
-- Database: `brandly`
--

-- --------------------------------------------------------

--
-- Table structure for table `mastercard_users`
--

CREATE TABLE `mastercard_users` (
  `ID` int(255) NOT NULL,
  `Card_number` bigint(20) NOT NULL,
  `Holder_name` text NOT NULL,
  `Expiry_date` varchar(10) NOT NULL,
  `CVC` int(3) NOT NULL,
  `Balance` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mastercard_users`
--

INSERT INTO `mastercard_users` (`ID`, `Card_number`, `Holder_name`, `Expiry_date`, `CVC`, `Balance`) VALUES
(1, 9878658926589531, 'Harsh', '06/2035', 569, 1953600),
(2, 5878683226782643, 'Shesh', '08/2029', 808, 200),
(3, 9120384293788743, 'Vishal', '10/2032', 295, 6547356);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(255) NOT NULL,
  `Product_ID` int(6) NOT NULL,
  `Product_Name` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Category` text NOT NULL,
  `Seller_Name` text NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_Number` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Product_ID`, `Product_Name`, `Image`, `Description`, `Price`, `Quantity`, `Category`, `Seller_Name`, `Address`, `Phone_Number`) VALUES
(17, 522689, 'History Books', 'Product_images/tom-hermans-9BoqXzEeQqM-unsplash.jpg', 'Get answers of all your questions about the history. This book has the history of all the countries, evolution of humans, evolution of weapons, etc.', 250, 6499, 'book', 'Vikram', 'Haldighat', 9895969293),
(18, 767238, 'Ancient vs Modern Science', 'Product_images/gulfer-ergin-LUGuCtvlk1Q-unsplash.jpg', 'Get answers of all your questions related to science. This book has the history of science, who was the first discover, which country beats the common sense of science, etc.', 360, 5229, 'book', 'Vikram', 'Haldighat', 9895969293),
(19, 421562, 'Human Pshycology', 'Product_images/thought-catalog-o0Qqw21-0NI-unsplash.jpg', 'Want to know about human pshycology? This book is written by gathering the experience of experts. Know when a person is lying, wants to go away, etc.', 130, 3400, 'book', 'Vikram', 'Haldighat', 9895969293),
(20, 485373, 'Kamasutra', 'Product_images/olga-tutunaru-plbb7pkEjkQ-unsplash.jpg', 'This book describes about the sexual activity of humans. Like what to do before sex, what to eat for son/daughter, etc.', 50, 7999, 'book', 'Vikram', 'Haldighat', 9895969293),
(21, 874836, 'LG 20\" inch AMOLED Monitor', 'Product_images/daniel-korpai-iopITwyUcTA-unsplash.jpg', 'Screen Type: Amoled\r\nSize (inches): 20\r\nRefresh rate: 165Hz\r\nResolution: 2560 x 1440', 32000, 560, 'monitor', 'Dhirendra', 'Bhopal', 7856895689),
(22, 133836, 'Sony 16.4\" inch LCD Monitor', 'Product_images/kitai-zhvaeh-R9rA-unsplash.jpg', 'Screen Type: LCD\r\nSize (inches): 16.4\r\nRefresh rate: 144Hz\r\nResolution: 1980 x 1080', 21000, 605, 'monitor', 'Dhirendra', 'Bhopal', 7856895689),
(23, 175894, 'Dell alienware 17\" inch AMOLED Monitor', 'Product_images/alienware-Hpaq-kBcYHk-unsplash.jpg', 'Screen Type: AMOLED\nSize (inches): 17\nRefresh rate: 180Hz\nResolution: 2560 x 1440', 46560, 449, 'monitor', 'Dhirendra', 'Bhopal', 7856895689),
(24, 777444, 'Blue 22\" inch LCD Monitor', 'Product_images/dhru-j-1Ksz0Q1NU3k-unsplash.jpg', 'Screen Type: LCD\r\nSize (inches): 20\r\nRefresh rate: 144Hz\r\nResolution: 1920 x 1080', 30560, 319, 'monitor', 'Dhirendra', 'Bhopal', 7856895689),
(25, 707755, 'Pascal Wireless Mouse', 'Product_images/pascal-m-4PchFKrUw84-unsplash.jpg', 'High precision mouse.\nUpto 900 DPS.\nAdjustable DPS.\nChip slot inside mouse.\n20ms Latency.', 3560, 229, 'mouse', 'Pratap Singh', 'Gautamnagar', 9278625683),
(26, 177906, 'Oscar Wireless Mouse', 'Product_images/oscar-ivan-esquivel-arteaga-ZtxED1cpB1E-unsplash.jpg', 'High precision mouse.\nUpto 560 DPS.\nDPS not adjustable.\nChip slot inside mouse.\n70ms Latency.', 2250, 63, 'mouse', 'Pratap Singh', 'Gautamnagar', 9278625683),
(27, 549816, 'Logitech 2155 Wired mouse', 'Product_images/ryan-putra-j4PqlNVZ4Bc-unsplash.jpg', 'High precision mouse.\r\nUpto 1200 DPS.\r\nAdjustable DPS.\r\n2 side button on left.', 3670, 165, 'mouse', 'Pratap Singh', 'Gautamnagar', 9278625683),
(28, 282605, 'Rebekah Gaming mouse', 'Product_images/rebekah-yip-wMT0oiL5XjA-unsplash.jpg', 'High precision mouse.\nUpto 2700 DPS.\nAdjustable DPS.\nLaser Optic mouse.\n1 side button on left.\nRGB enabled.', 5200, 225, 'mouse', 'Pratap Singh', 'Gautamnagar', 9278625683),
(29, 119439, 'Clay banks Wireless keyboard', 'Product_images/clay-banks-PXaQXThG1FY-unsplash.jpg', 'Keyboard without numpad.\nWireless.\n2 Batteries.\n30ms Latency.\nNo chip slot.', 2700, 361, 'keyboard', 'Ranveer', 'Gauravali', 6897526586),
(30, 951324, 'Stefen Tan Wireless mechanical keyboard', 'Product_images/stefen-tan-KYw1eUx1J7Y-unsplash.jpg', 'Keyboard without numpad.\r\nWireless.\r\nMechanical keyboard.\r\n2 Batteries.\r\n30ms Latency.\r\nNo chip slot.', 5200, 631, 'keyboard', 'Ranveer', 'Gauravali', 6897526586),
(31, 704863, 'Editors Key wired keyboard', 'Product_images/editors-keys-CtDrd7mWW6M-unsplash.jpg', 'Keyboard with numpad.\r\nWired.\r\nColor: Quantum gray.\r\nHigh quality keys.', 1780, 334, 'keyboard', 'Ranveer', 'Gauravali', 6897526586),
(32, 761651, 'Logitech cylindrical keys Keyboard', 'Product_images/sebastian-banasiewcz-CMs6ZGOdyho-unsplash.jpg', 'Keyboard without numpad.\r\nCylindrical keys.\r\nWireless.\r\n2 Batteries.\r\n20ms Latency.\r\nchip slot given at side of keyboard.', 2690, 584, 'keyboard', 'Ranveer', 'Gauravali', 6897526586),
(33, 947376, 'Jens kreuter 32\" inch LCD T.V.', 'Product_images/jens-kreuter-ngMtsE5r9eI-unsplash.jpg', 'Screen type: LCD\nSize (inches): 32\nNetwork: Yes\nRemote: Magic remote\nHDMI: Yes\nUSB: Yes (1)\nResolution: 1980 x 1080', 53530, 25, 'television', 'Peter', 'Washington', 5876598153),
(34, 438752, 'Nicolos 34.2\" inch LCD T.V.', 'Product_images/nicolas-j-leclercq-qDLLP0yP7FU-unsplash.jpg', 'Screen type: LCD\r\nSize (inches): 34.2\r\nNetwork: Yes\r\nRemote: Magic remote\r\nHDMI: Yes\r\nUSB: Yes (1)\r\nResolution: 1980 x 1080', 55950, 68, 'television', 'Peter', 'Washington', 5876598153),
(35, 851887, 'Dario 32\" inch LCD T.V.', 'Product_images/dario-KzGhmrQmB6I-unsplash.jpg', 'Screen type: LCD\r\nSize (inches): 32\r\nNetwork: No\r\nRemote: Magic remote\r\nHDMI: Yes\r\nUSB: Yes (1)\r\nResolution: 1980 x 1080', 47800, 146, 'television', 'Peter', 'Washington', 5876598153),
(36, 563514, 'Andres 40\" inch Curved AMOLED T.V.', 'Product_images/andres-jasso-jfxY9uoMRwM-unsplash.jpg', 'Screen type: AMOLED\r\nDisplay: Curved\r\nSize (inches): 40\r\nNetwork: Yes\r\nRemote: Magic remote\r\nHDMI: Yes\r\nUSB: Yes (2)\r\nResolution: 2560 x 1440', 78260, 58, 'television', 'Peter', 'Washington', 5876598153),
(37, 646045, 'Realme GT 12 5G', 'Product_images/shiwa-id-Uae7ouMw91A-unsplash.jpg', 'Screen type: AMOLED\nRefresh rate: 90Hz\nResolution: 1980 x 1080\nFingerprint sensor: On screen\nAndroid version: 13\nTouch sampling rate: 900Hz', 29000, 435, 'smartphone', 'Dhruv', 'Paldi', 4875682598),
(38, 849122, 'Matteo 5G', 'Product_images/matteo-vella-_HB3Y1wGlxw-unsplash.jpg', 'Screen type: AMOLED\r\nRefresh rate: 90Hz\r\nResolution: 1980 x 1080\r\nFingerprint sensor: On screen\r\nAndroid version: 13\r\nTouch sampling rate: 1200Hz', 25600, 357, 'smartphone', 'Dhruv', 'Paldi', 4875682598),
(39, 454319, 'IPhone 13', 'Product_images/rahul-chakraborty-xsGxhtAsfSA-unsplash.jpg', 'Screen type: Retina\r\nRefresh rate: 120Hz\r\nResolution: 1980 x 1080\r\nFingerprint sensor: On screen\r\nIOS version: 14\r\nTouch sampling rate: 1300Hz', 58460, 409, 'smartphone', 'Dhruv', 'Paldi', 4875682598),
(40, 621205, 'Martin 5G', 'Product_images/martin-engel-44zXCbDd2WQ-unsplash.jpg', 'Screen type: AMOLED\r\nRefresh rate: 120Hz\r\nResolution: 1980 x 1080\r\nFingerprint sensor: On screen\r\nAndroid version: 13\r\nTouch sampling rate: 1200Hz', 46780, 95, 'smartphone', 'Dhruv', 'Paldi', 4875682598);

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `ID` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_number` bigint(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`ID`, `Name`, `Email`, `Phone_number`, `Password`, `Address`) VALUES
(1, 'Vishal', 'vishal@g.com', 5487453569, '#123@', '12C Colony, Udaynagar, Mehsana, Gujarat'),
(16, 'Harsh', 'harsh@g.com', 7897568698, '#123@', '37B Isanpur Chowk near. Omkar Studio, Ahmedabad, Gujarat'),
(17, 'Shesh', 'shesh@g.com', 5987654869, '#123@', 'Ghodasar, Ahmedabad, Gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_number` bigint(255) NOT NULL,
  `Usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Email`, `Phone_number`, `Usertype`) VALUES
(1, 'vishal@g.com', 5487453569, 'admin'),
(2, 'harsh@g.com', 7897568698, 'user'),
(3, 'shesh@g.com', 5987654869, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users_cart`
--

CREATE TABLE `users_cart` (
  `ID` int(255) NOT NULL,
  `Order_ID` int(6) NOT NULL,
  `User_email` varchar(255) NOT NULL,
  `User_phone_num` bigint(10) NOT NULL,
  `Product_ID` int(6) NOT NULL,
  `Product_Quantity` int(255) NOT NULL,
  `Status` text NOT NULL DEFAULT 'Delivering',
  `Payment_type` text NOT NULL DEFAULT 'online',
  `Card_num` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_cart`
--

INSERT INTO `users_cart` (`ID`, `Order_ID`, `User_email`, `User_phone_num`, `Product_ID`, `Product_Quantity`, `Status`, `Payment_type`, `Card_num`) VALUES
(16, 335937, 'shesh@g.com', 5987654869, 777444, 1, 'Delivered', 'cash', 0),
(21, 665502, 'shesh@g.com', 5987654869, 177906, 1, 'Delivering', 'cash', 0),
(24, 401126, 'harsh@g.com', 7897568698, 522689, 1, 'Delivered', 'online', 9878658926589531),
(25, 504316, 'harsh@g.com', 7897568698, 704863, 1, 'Delivering', 'cash', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mastercard_users`
--
ALTER TABLE `mastercard_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_cart`
--
ALTER TABLE `users_cart`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mastercard_users`
--
ALTER TABLE `mastercard_users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_cart`
--
ALTER TABLE `users_cart`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
