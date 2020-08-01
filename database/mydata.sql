-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 08:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ragava`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `ip_add` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pro_id`, `qty`, `ip_add`, `userid`) VALUES
(10, 18, 1, '::1', 3),
(11, 20, 1, '::1', 3),
(13, 22, 1, '::1', 3),
(14, 19, 1, '::1', 1),
(15, 22, 4, '::1', 13);

-- --------------------------------------------------------

--
-- Table structure for table `checktime`
--

CREATE TABLE `checktime` (
  `id` int(11) NOT NULL,
  `arrived` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `setonoff` int(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checktime`
--

INSERT INTO `checktime` (`id`, `arrived`, `setonoff`, `username`) VALUES
(169, '2018-12-04 03:16:44', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `rating` int(1) NOT NULL,
  `decc` varchar(500) NOT NULL,
  `username` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `helpful` int(3) NOT NULL,
  `not_helpful` int(3) NOT NULL,
  `com_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `pro_id`, `rating`, `decc`, `username`, `date`, `helpful`, `not_helpful`, `com_img`) VALUES
(2, 26, 3, 'e', 'user', '0000-00-00', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `data_table`
--

CREATE TABLE `data_table` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `roll` varchar(7) NOT NULL,
  `result` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_table`
--

INSERT INTO `data_table` (`id`, `name`, `fname`, `roll`, `result`) VALUES
(1, 'r', 'v', '16cs411', 'fail'),
(10, 'fff', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `name`, `pic`) VALUES
(1, 'ssf', 'Chrysanthemum.jpg'),
(2, 'ddd', 'Penguins.jpg'),
(3, 'asfd', 'Koala.jpg'),
(4, 'csdfs', 'Lighthouse.jpg'),
(5, 'sd', 'Tulips.jpg'),
(6, 'fff', '262995.jpg'),
(7, 'raga', '484781.jpg'),
(8, 'fff', '687885.jpg'),
(9, 'fff', '699763.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `flname`
--

CREATE TABLE `flname` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flname`
--

INSERT INTO `flname` (`id`, `fname`, `lname`, `age`) VALUES
(1, 'd', 'd', 33),
(2, 'd', 'd', 22),
(3, 'd', 'd', 22);

-- --------------------------------------------------------

--
-- Table structure for table `main_cat`
--

CREATE TABLE `main_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_cat`
--

INSERT INTO `main_cat` (`cat_id`, `cat_name`) VALUES
(32, 'Electronics'),
(33, 'Mens Fashion'),
(34, 'Womens Fashion'),
(35, 'Mobiles'),
(38, 'Books'),
(39, 'sports'),
(40, 'marketing1234566');

-- --------------------------------------------------------

--
-- Table structure for table `newadd`
--

CREATE TABLE `newadd` (
  `add_id` int(11) NOT NULL,
  `userid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `pincode` int(100) NOT NULL,
  `house` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `tandc` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `addtype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newadd`
--

INSERT INTO `newadd` (`add_id`, `userid`, `name`, `phone`, `pincode`, `house`, `area`, `tandc`, `state`, `addtype`) VALUES
(3, 3, 'd', 444, 444444, 'uzhavar karai', 'gdgds', 'fgdfg', 'sfgfdg', '');

-- --------------------------------------------------------

--
-- Table structure for table `newuser`
--

CREATE TABLE `newuser` (
  `ID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `email` varchar(24) NOT NULL,
  `password` varchar(15) NOT NULL,
  `set_online` int(11) NOT NULL,
  `logout` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`ID`, `username`, `phone`, `address`, `city`, `pincode`, `email`, `password`, `set_online`, `logout`, `user_img`) VALUES
(1, 'user', '9874563210', 'pondicherry', 'f', '', 'sample@gmail.com', 'user', 0, '2020-07-12 11:45:08', 'dddddd');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cardname` varchar(100) NOT NULL,
  `cardnumber` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `otp` int(100) NOT NULL,
  `set_online` int(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `voucher` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `username`, `cardname`, `cardnumber`, `balance`, `otp`, `set_online`, `payment_method`, `voucher`) VALUES
(1, 'd', 'Laser', '6304100000000008\r\n', '5000', 0, 0, 'Credit_cart', 0),
(3, 'd', 'Visa', '4111111111111111', '274089', 8504, 0, 'Credit_cart', 0),
(4, 'd', 'visa', '1600050020000234', '66075', 1019, 0, 'Credit_cart', 0);

-- --------------------------------------------------------

--
-- Table structure for table `placeorder`
--

CREATE TABLE `placeorder` (
  `order_id` int(11) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `date` date NOT NULL,
  `order_cancel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placeorder`
--

INSERT INTO `placeorder` (`order_id`, `pro_id`, `qty`, `userid`, `date`, `order_cancel`) VALUES
(4, 19, 2, 3, '0000-00-00', 0),
(5, 19, 2, 3, '2018-03-21', 0),
(6, 19, 1, 3, '0000-00-00', 0),
(7, 18, 1, 2, '0000-00-00', 0),
(8, 21, 1, 3, '0000-00-00', 0),
(9, 21, 1, 3, '2018-03-21', 0),
(10, 21, 3, 3, '2018-03-26', 0),
(11, 23, 3, 3, '2018-03-30', 0),
(12, 17, 1, 3, '2018-03-28', 0),
(13, 18, 1, 3, '2018-03-28', 0),
(14, 25, 1, 3, '2018-03-28', 0),
(15, 25, 1, 3, '2018-03-31', 1),
(16, 18, 1, 3, '2018-03-31', 0),
(17, 26, 1, 3, '2018-03-31', 0),
(18, 25, 1, 3, '2018-03-31', 0),
(19, 21, 1, 3, '2018-03-31', 0),
(20, 16, 1, 3, '2018-03-31', 1),
(21, 20, 1, 3, '2018-03-31', 1),
(22, 22, 1, 3, '2018-03-31', 1),
(23, 22, 1, 3, '2018-04-01', 0),
(24, 25, 1, 3, '2018-04-01', 0),
(25, 20, 1, 3, '2018-04-01', 1),
(26, 18, 1, 3, '2018-04-01', 0),
(27, 22, 1, 3, '2018-04-01', 0),
(28, 19, 1, 3, '2018-04-02', 1),
(29, 21, 4, 3, '2018-04-13', 0),
(30, 18, 1, 3, '2018-04-13', 0),
(31, 17, 1, 3, '2018-04-13', 0),
(32, 25, 1, 3, '2018-04-13', 0),
(33, 25, 1, 3, '2018-05-03', 0),
(34, 18, 1, 3, '2018-05-03', 1),
(35, 0, 1, 3, '2018-05-05', 0),
(36, 27, 1, 3, '2018-05-05', 0),
(37, 27, 1, 10, '2018-05-05', 0),
(38, 22, 1, 10, '2018-05-05', 0),
(39, 18, 1, 10, '2018-05-05', 1),
(40, 21, 1, 10, '2018-04-28', 0),
(41, 23, 3, 13, '2018-10-21', 1),
(42, 18, 1, 13, '2018-10-21', 1),
(43, 17, 1, 13, '2018-10-21', 1),
(44, 18, 3, 13, '2018-11-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `pro_img1` text NOT NULL,
  `pro_img2` text NOT NULL,
  `pro_img3` text NOT NULL,
  `pro_img4` text NOT NULL,
  `pro_feature1` text NOT NULL,
  `pro_feature2` text NOT NULL,
  `pro_feature3` text NOT NULL,
  `pro_feature4` text NOT NULL,
  `pro_feature5` text NOT NULL,
  `pro_price` text NOT NULL,
  `pro_model` text NOT NULL,
  `pro_warranty` text NOT NULL,
  `pro_keyword` text NOT NULL,
  `pro_added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `for_whome` text NOT NULL,
  `Sub_titile1` varchar(100) NOT NULL,
  `Sub_titile1_details` varchar(10000) NOT NULL,
  `Sub_titile2` varchar(100) NOT NULL,
  `Sub_titile2_details` varchar(10000) NOT NULL,
  `Sub_titile3` varchar(100) NOT NULL,
  `Sub_titile3_details` varchar(10000) NOT NULL,
  `Sub_titile4` varchar(100) NOT NULL,
  `Sub_titile4_details` varchar(10000) NOT NULL,
  `sub_titile5` varchar(100) NOT NULL,
  `sub_titile5_details` varchar(1000) NOT NULL,
  `sub_titile6` varchar(100) NOT NULL,
  `sub_titile6_details` varchar(1000) NOT NULL,
  `sub_titile7` varchar(100) NOT NULL,
  `sub_titile7_details` varchar(1000) NOT NULL,
  `sub_titile8` varchar(100) NOT NULL,
  `sub_titile8_details` varchar(1000) NOT NULL,
  `sub_titile9` varchar(100) NOT NULL,
  `sub_titile9_details` varchar(1000) NOT NULL,
  `sub_titile10` varchar(100) NOT NULL,
  `sub_titile10_details` varchar(1000) NOT NULL,
  `sub_titile11` varchar(100) NOT NULL,
  `sub_titile11_details` varchar(1000) NOT NULL,
  `pro_img5` varchar(100) NOT NULL,
  `pro_img6` varchar(100) NOT NULL,
  `pro_img7` varchar(13) NOT NULL,
  `pro_img8` varchar(10) NOT NULL,
  `pro_img9` varchar(100) NOT NULL,
  `pro_img10` varchar(100) NOT NULL,
  `pro_img11` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `cat_id`, `sub_cat_id`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_img4`, `pro_feature1`, `pro_feature2`, `pro_feature3`, `pro_feature4`, `pro_feature5`, `pro_price`, `pro_model`, `pro_warranty`, `pro_keyword`, `pro_added_date`, `for_whome`, `Sub_titile1`, `Sub_titile1_details`, `Sub_titile2`, `Sub_titile2_details`, `Sub_titile3`, `Sub_titile3_details`, `Sub_titile4`, `Sub_titile4_details`, `sub_titile5`, `sub_titile5_details`, `sub_titile6`, `sub_titile6_details`, `sub_titile7`, `sub_titile7_details`, `sub_titile8`, `sub_titile8_details`, `sub_titile9`, `sub_titile9_details`, `sub_titile10`, `sub_titile10_details`, `sub_titile11`, `sub_titile11_details`, `pro_img5`, `pro_img6`, `pro_img7`, `pro_img8`, `pro_img9`, `pro_img10`, `pro_img11`) VALUES
(16, 'sony tv 64 inch perfumes', 32, 20, '21.jpg', '23.jpg', '24.jpg', '23.jpg', 'LED', 'Side view', 'Good look', 'live long', 'best quality', '33', 'sony123', '2 years', 'tv,sony tv,sony,sony electronics', '2018-02-13 14:51:07', 'women', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'sony Multidoor fridge watch', 32, 21, '20(1).jpg', '19(1).jpg', '18(1).jpg', '20(1).jpg', 'Full covered', 'Reduce current', 'frezz quickly', 'low current support', 'Multi door', '20', 'sonyf123', '2 years', 'fridge,electronics,large applices,home,kitchen', '2018-02-13 14:49:40', 'men', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'Canon c45 perfumes', 32, 22, '13(1).jpg', '14.jpg', '16.jpg', '13(1).jpg', '24 mpx', 'DSLR shoot', 'clear view of long shoot', 'good quality', 'take easy', '40', 'Canonc45', '4years', 'cameras,canon,cameras canon,electronis,24mp', '2018-03-31 10:05:33', 'men', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Tshirt watch', 33, 23, '25.jpg', '26.jpg', '27.jpg', '28.jpg', 'carton', 'useful for summer', 'reduce sun power', 'smoth', 'bluecolor', '20', 'tshirt33blue', '6 months', 'bluecolor,lg,redmi,nokia', '2018-05-31 10:34:53', 'women', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'shoes z456', 33, 24, '29.jpg', '29.jpg', '29.jpg', '29.jpg', 'functions', 'party', 'different color', 'easyly used', 'take easy', '45', 'shoes combo3', '3 months', 'shoes z456,shoes,combo shoes,combo ', '2018-02-11 06:16:17', 'men', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'cothes black', 34, 27, '34.jpg', '33.jpg', '34.jpg', '34.jpg', 'See Description Page Of The Product', 'One Button Blazer, With Single Cut ', ' This Product Is Menjestic Others ', 'So Buy And Go For Menjestic Only ', 'Size Guide Blazer & Waistcoat Size Should', '90', 'womencoths45', '3 months', 'cothes,women,black,long fit,cothes black', '2018-04-17 18:09:48', 'women', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'Sony Xperia', 35, 28, '6.jpeg', '8.jpg', '7.jpg', '5.jpg', '23mp back23mp back8mp front', '8mp front8mp front8mp front', 'clear pixels photos8mp front8mp front', '4g support8mp front8mp front', 'micro sim8mp front8mp front', '49999', 'xperia z3+', '1 year', '23mp,8mp,sony xperia z3+,xperia z3+,Rs.30,000,mobiles', '2018-03-28 13:09:54', 'for_whome', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'mens watch r45 belt', 33, 25, '31.jpg', '32.jpg', '30.jpg', '32.jpg', 'different combo', 'red white blue metal', 'anolog', 'more style ', 'good quality', '60', 'watch45men', '5 months', 'watch,mens watch,anolog,combo,tshirt', '2018-02-11 06:15:34', 'men', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'YU5010', 35, 29, '4.jpg', '3(1).JPG', '2.jpg', '1.jpg', '8mp', '5mp', '4g support', '16gb internal', 'grilla glass', '70', 'YU5010', '1 year', 'YU5010,grilla glass,4g support,8mp,5mp', '2018-02-13 14:51:04', 'kids', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'headset belt watch games', 35, 28, '9.jpg', '10.jpg', '11.jpg', '12.jpg', 'clear sound effectsclear sound effects', 'clear sound effects', 'clear sound effectsclear sound effects', 'clear sound effects', 'clear sound effects clear sound effects', '30', 'sonyhs123', '2 years', 'headset,headphone,sony mobile,electronics', '2018-03-31 10:05:47', 'women', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'micromax yu 5010', 35, 29, '4.jpg', '3(1).JPG', '2.jpg', '1.jpg', 'Discover a new side of slim', 'Discover a new side of slim', 'Discover a new side of slim', 'Discover a new side of slim', 'Discover a new side of slim', '7000', 'yu5010 micromax', '2 years,box 5 months', 'mobile,phone,micromax', '2018-03-10 18:08:30', 'men', ' Slimmer, Lighter and Incredibly Comfortable to Hold', 'Want to enhance your multimedia experience? Get the Sony Xperia Z3+ (Black, 32GB) online from Amazon India. Slim, lightweight and superfast, this Smartphone from Sony is all set to dazzle you with its impressive looks and excellent performance. This 4G enabled phone comes with a 5.20-inch touchscreen display and is loaded with Cat 6 LTE/4G Modem which gives you the fastest internet connection. It has a sleek 6.9 mm frame, which easily snuggles in your palm. The phone comes with 3GB of RAM and is powered by 1.5GHz Octa-Core Qualcomm Snapdragon 810 processor for a lag-free performance.', 'Seamless Performance and Outstanding Processing Speed', 'Running multiple apps, streaming videos or playing games become easy with the Sony Xperia Z3+ as it is powered by an efficient 64-bit Qualcomm Snapdragon 810 processor and 3 GB RAM. The excellent processor delivers 50% more speed, allowing you to access all your apps without waiting. The phone packs the latest Sony sound technologies to deliver a superior listening experience. The Hi-Res Audio reduces any noise distortion and produces crystal clear sound infused with optimum details. For all the online games, the Xperia Z3+ 32 GB has something really exciting. With its PS4 Remote Play app, it enables you to play games from anywhere in your home by easily switch between Smartphone and PS4 console.', 'Waterproof and Dust-Resistant Smartphone', 'The Xperia Z3+ sports a waterproof design and is resistant to dust particles. Carry your Smartphone wherever you go and play in the pool or roll in the sand without having to worry about damaging it. With an excellent IP65/IP68 rating, the phone can easily withstand in 1.5 m of water and for longer than 30 minutes. So downpours arenâ€™t a problem anymore. Nor is sand, spills or an accidental dip in the water. The phone has an incredible battery life which delivers power for up to two days, enabling you to accomplish all your important tasks without fretting about the battery getting drained out.', 'Captures Spectacular Snapshots with Enhanced Clarity', 'The Xperia Z3+ allows you to click stunning selfies for social sharing with its 20.7 MP primary camera (with autofocus). Its Superior Auto scene recognition and SteadyShot with Intelligent Active Mode lets you click clear and crisp shots every time. The 5 MP front camera of the device with Exmor R sensor allows you to click brilliant selfies even in low light situations. If you are looking for a perfect group selfie, the wider frame can help as it facilitates you to include more of your friends in the frame. You can also enhance your photography skills with the in-built camera apps of this Smartphone. The 4K-Ultra HD Video recording of the Xperia Z3+ supports you to capture four times the details as compared to 1080p full HD video recording.', 'Discover a new side of slim', 'The Xperia Z3+ is slimmer than ever at just 6.9 mm, and incredibly light in your hand. In fact, if it wasnâ€™t so nice to look at, you could almost forget you were holding it.', 'Discover a new side of slim', 'The Xperia Z3+ is slimmer than ever at just 6.9 mm, and incredibly light in your hand. In fact, if it wasnâ€™t so nice to look at, you could almost forget you were holding it.', 'Discover a new side of slim', 'The Xperia Z3+ is slimmer than ever at just 6.9 mm, and incredibly light in your hand. In fact, if it wasnâ€™t so nice to look at, you could almost forget you were holding it.', 'Discover a new side of slim', 'The Xperia Z3+ is slimmer than ever at just 6.9 mm, and incredibly light in your hand. In fact, if it wasnâ€™t so nice to look at, you could almost forget you were holding it.', 'Discover a new side of slim', 'The Xperia Z3+ is slimmer than ever at just 6.9 mm, and incredibly light in your hand. In fact, if it wasnâ€™t so nice to look at, you could almost forget you were holding it.', 'Discover a new side of slim', 'The Xperia Z3+ is slimmer than ever at just 6.9 mm, and incredibly light in your hand. In fact, if it wasnâ€™t so nice to look at, you could almost forget you were holding it.', 'Discover a new side of slim', 'The Xperia Z3+ is slimmer than ever at just 6.9 mm, and incredibly light in your hand. In fact, if it wasn’t so nice to look at, you could almost forget you were holding it.', '8.jpg', 'one1.jpg', 'two1.jpg', '30.jpg', '51Aka2NY3gL._AC_SL1500_.jpg', '11.jpg', '12.jpg'),
(28, 'OnePlus 5T', 39, 28, 'p.jpg', 'p1.jpg', 'p2.jpg', 'p3.jpg', '20MP+16MP primary dual camera ', '16MP front facing camera', '15.26 centimeters (6.01-inch) capacitive', '6 GB RAM, 64 GB internal memory', '1 year manufacturer warranty for device', '32999', 'OnePlus 5T', '1 year', 'OnePlus 5T,mobile', '2018-03-31 17:32:50', 'women', '20MP+16MP primary dual camera and 16MP front facing camera', 'The OnePlus 5T comes with a 18:9 Full Optic AMOLED display, 20+16 MP dual primary camera, 6/8 GB of RAM; up to 128 GB memory, Snapdragon 835 processor and much more', '6 GB RAM, 64 GB internal memory and dual nano SIM dual-standby (4G+4G)', 'The OnePlus 5T comes with a 18:9 Full Optic AMOLED display, 20+16 MP dual primary camera, 6/8 GB of RAM; up to 128 GB memory, Snapdragon 835 processor and much more', 'Face Unlock, Fingerprint scanner, all-metal unibody and NFC enabled', 'The OnePlus 5T comes with a 18:9 Full Optic AMOLED display, 20+16 MP dual primary camera, 6/8 GB of RAM; up to 128 GB memory, Snapdragon 835 processor and much more', 'Face Unlock, Fingerprint scanner, all-metal unibody and NFC enabled', 'The OnePlus 5T comes with a 18:9 Full Optic AMOLED display, 20+16 MP dual primary camera, 6/8 GB of RAM; up to 128 GB memory, Snapdragon 835 processor and much more', 'Face Unlock, Fingerprint scanner, all-metal unibody and NFC enabled', '6 GB RAM, 64 GB internal memory and dual nano SIM dual-standby (4G+4G) 3300mAH lithium Polymer battery with Dash Charge technology Face Unlock, Fingerprint scanner, all-metal unibody and NFC enabled 1 year manufacturer warranty for device and in-box accessories including batteries from the date of purchase For any product related queries kindly contact brand customer care toll free no:18001028411', '', '6 GB RAM, 64 GB internal memory and dual nano SIM dual-standby (4G+4G) 3300mAH lithium Polymer battery with Dash Charge technology Face Unlock, Fingerprint scanner, all-metal unibody and NFC enabled 1 year manufacturer warranty for device and in-box accessories including batteries from the date of purchase For any product related queries kindly contact brand customer care toll free no:18001028411', '1 year manufacturer warranty for device and in-box accessories including batteries from the date of ', '6 GB RAM, 64 GB internal memory and dual nano SIM dual-standby (4G+4G) 3300mAH lithium Polymer battery with Dash Charge technology Face Unlock, Fingerprint scanner, all-metal unibody and NFC enabled 1 year manufacturer warranty for device and in-box accessories including batteries from the date of purchase For any product related queries kindly contact brand customer care toll free no:18001028411', '1 year manufacturer warranty for device and in-box accessories including batteries from the date of ', '1 year manufacturer warranty for device and in-box accessories including batteries from the date of purcha', '1 year manufacturer warranty for device and in-box accessories including batteries from the date of ', '1 year manufacturer warranty for device and in-box accessories including batteries from the date of purcha', '1 year manufacturer warranty for device and in-box accessories including batteries from the date of ', '1 year manufacturer warranty for device and in-box accessories including batteries from the date of purcha', '1 year manufacturer warranty for device and in-box accessories including batteries from the date of ', '6 GB RAM, 64 GB internal memory and dual nano SIM dual-standby (4G+4G) 3300mAH lithium Polymer battery with Dash Charge technology Face Unlock, Fingerprint scanner, all-metal unibody and NFC enabled 1 year manufacturer warranty for device and in-box accessories including batteries from the date of purchase For any product related queries kindly contact brand customer care toll free no:18001028411', 'p4.jpg', 'p5.jpg', 'p6.jpg', 'p7.jpg', 'p8.jpg', 'p9.jpg', 'p1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recentview`
--

CREATE TABLE `recentview` (
  `rv_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `set_online` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recentview`
--

INSERT INTO `recentview` (`rv_id`, `pro_id`, `userid`, `set_online`, `date`) VALUES
(4, 4, 4, 4, '2018-04-14 17:50:44'),
(5, 26, 0, 0, '2018-04-22 15:33:25'),
(6, 24, 0, 1, '2018-10-20 19:52:58'),
(7, 17, 0, 1, '2020-07-12 06:01:03'),
(8, 18, 0, 2, '2020-07-12 06:20:13'),
(9, 16, 0, 1, '2020-07-12 05:54:38'),
(10, 20, 0, 2, '2018-11-15 11:10:54'),
(12, 21, 0, 2, '2018-06-01 14:11:56'),
(13, 19, 0, 2, '2018-11-14 20:36:19'),
(17, 22, 0, 1, '2020-07-12 05:59:01'),
(18, 25, 0, 1, '2018-07-06 14:12:44'),
(19, 27, 0, 1, '2018-07-06 14:12:11'),
(20, 28, 0, 1, '2020-07-12 06:23:01'),
(21, 23, 0, 1, '2020-07-12 06:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `saveforlater`
--

CREATE TABLE `saveforlater` (
  `save_id` int(11) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `userid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saveforlater`
--

INSERT INTO `saveforlater` (`save_id`, `pro_id`, `userid`) VALUES
(14, 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sort`
--

CREATE TABLE `sort` (
  `set_online` int(1) NOT NULL,
  `username` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sort`
--

INSERT INTO `sort` (`set_online`, `username`) VALUES
(1, ''),
(0, 'b');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `sub_cat_name`, `cat_id`) VALUES
(20, 'Tv', 32),
(21, 'Large appliances', 32),
(22, 'Cameras', 32),
(23, 'clothing', 33),
(24, 'Shoes', 33),
(25, 'watches', 33),
(26, 'jewellery', 33),
(27, 'Dress women', 34),
(28, 'sony', 35),
(29, 'micromax', 35),
(33, 'rongoli', 38),
(34, 'philips', 35);

-- --------------------------------------------------------

--
-- Table structure for table `testdb`
--

CREATE TABLE `testdb` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `FATHERNAME` varchar(50) NOT NULL,
  `ROLLNO` varchar(8) NOT NULL,
  `RESULT` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testdb`
--

INSERT INTO `testdb` (`ID`, `NAME`, `FATHERNAME`, `ROLLNO`, `RESULT`) VALUES
(2, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `whishlist`
--

CREATE TABLE `whishlist` (
  `whishlist_id` int(11) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whishlist`
--

INSERT INTO `whishlist` (`whishlist_id`, `pro_id`, `date`, `userid`) VALUES
(7, 17, '2018-03-31', 3),
(8, 19, '2018-03-31', 3),
(9, 18, '2018-03-31', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `checktime`
--
ALTER TABLE `checktime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `data_table`
--
ALTER TABLE `data_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flname`
--
ALTER TABLE `flname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_cat`
--
ALTER TABLE `main_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `newadd`
--
ALTER TABLE `newadd`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `newuser`
--
ALTER TABLE `newuser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `placeorder`
--
ALTER TABLE `placeorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `recentview`
--
ALTER TABLE `recentview`
  ADD PRIMARY KEY (`rv_id`);

--
-- Indexes for table `saveforlater`
--
ALTER TABLE `saveforlater`
  ADD PRIMARY KEY (`save_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `testdb`
--
ALTER TABLE `testdb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `whishlist`
--
ALTER TABLE `whishlist`
  ADD PRIMARY KEY (`whishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `checktime`
--
ALTER TABLE `checktime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `data_table`
--
ALTER TABLE `data_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flname`
--
ALTER TABLE `flname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_cat`
--
ALTER TABLE `main_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `newadd`
--
ALTER TABLE `newadd`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newuser`
--
ALTER TABLE `newuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `placeorder`
--
ALTER TABLE `placeorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `recentview`
--
ALTER TABLE `recentview`
  MODIFY `rv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `saveforlater`
--
ALTER TABLE `saveforlater`
  MODIFY `save_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `testdb`
--
ALTER TABLE `testdb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `whishlist`
--
ALTER TABLE `whishlist`
  MODIFY `whishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
