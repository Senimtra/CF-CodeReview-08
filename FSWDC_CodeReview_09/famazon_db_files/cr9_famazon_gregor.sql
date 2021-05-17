-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 12:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr9_famazon_gregor`
--
CREATE DATABASE IF NOT EXISTS `cr9_famazon_gregor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr9_famazon_gregor`;

-- --------------------------------------------------------

--
-- Table structure for table `carrier`
--

CREATE TABLE `carrier` (
  `carrier_id` int(10) UNSIGNED NOT NULL,
  `carrier_name` varchar(30) DEFAULT NULL,
  `adr_street` varchar(30) DEFAULT NULL,
  `fk_zip_code` int(10) UNSIGNED DEFAULT NULL,
  `carrier_phone` varchar(20) DEFAULT NULL,
  `carrier_rep` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrier`
--

INSERT INTO `carrier` (`carrier_id`, `carrier_name`, `adr_street`, `fk_zip_code`, `carrier_phone`, `carrier_rep`) VALUES
(1, 'Parcel Hettinger, Swift and Ca', '20418 Lyons Pass', 16853, '(235) 9663677', 'Adele Camolli'),
(2, 'IPS Service Fisher, Considine ', '08 Waubesa Lane', 20172, '(376) 3010892', 'Eldridge Crossgrove'),
(3, 'Post Station Yellow', '94 Crest Line Plaza', 20501, '(627) 2410184', 'Rosanne Alwin'),
(4, 'DPS Packages', '89 Hintze Circle', 20560, '(375) 1360715', 'Deedee Romao'),
(5, 'Mail Service, Greenfelder and ', '438 Dovetail Plaza', 22164, '(829) 4545933', 'Jessika Acarson'),
(6, 'Mailbox Delivery, Altenwerth a', '68393 Columbus Hill', 22922, '(709) 1121442', 'Katherine Hechlin'),
(7, 'Transport Company TTC', '94 Troy Alley', 25155, '(916) 2078115', 'Gery Zorener'),
(8, 'Mail Distribution', '28 Dixon Circle', 28217, '(285) 6046917', 'Silva Brokenbrow'),
(9, 'Parcel Center 22', '20 Hoffman Junction', 29193, '(595) 1730302', 'Coleen Wallis'),
(10, 'You got mail', '7887 Fulton Drive', 37815, '(800) 7884827', 'Mavis Ida'),
(11, 'Return to Sender Inc., Emard a', '60 International Plaza', 41722, '(795) 9987114', 'Alia Ruhben'),
(12, 'ACME Post Service', '4 Schiller Drive', 45088, '(541) 4988281', 'Stormi Fullerlove'),
(13, 'Dutch Parcel Group', '179 Spaight Drive', 51354, '(280) 5149622', 'Skipton Duddan'),
(14, 'United Postal Service', '7 Karstens Circle', 53283, '(243) 1792223', 'Regina Olding'),
(15, 'DPS We deliver', '709 Veith Road', 75218, '(952) 9089175', 'Chrisse Duffil'),
(16, 'I got you mail', '88678 Buhler Lane', 80913, '(676) 2283126', 'Clarette Probbings'),
(17, 'Mailbox & Parcels', '045 Warbler Junction', 83380, '(722) 6736212', 'Ignaz Pasek'),
(18, 'Mailstorage', '47788 Lyons Trail', 86522, '(987) 2720419', 'Alfonso Valsler'),
(19, 'Parcel Group Wallman', '8551 Kedzie Street', 87241, '(562) 1066312', 'Jonis Wallman'),
(20, 'Halvorson Logistics, Schuppe a', '536 Sherman Center', 97209, '(693) 5533852', 'Loren Josselson');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `cat_storage` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `cat_storage`) VALUES
(1, 'Apps & Games', 'A17'),
(2, 'Appliances', 'F01'),
(3, 'Arts, Crafts, & Sewing', 'C07'),
(4, 'Automotive Parts & Accessories', 'A11'),
(5, 'Beauty & Personal Care', 'G72'),
(6, 'Electronics', 'H99'),
(7, 'Books', 'D29'),
(8, 'Computer', 'J84'),
(9, 'Garden & Outdoor', 'H78'),
(10, 'Handmade', 'A70'),
(11, 'Home & Kitchen', 'B22'),
(12, 'Industrial & Scientific', 'W23'),
(13, 'Luggage & Travel Gear', 'X08'),
(14, 'Musical Instruments', 'P14'),
(15, 'Office Products', 'E43'),
(16, 'Pet Supplies', 'K67'),
(17, 'Sports & Outdoors', 'I93'),
(18, 'Tools & Home Improvement', 'Q36'),
(19, 'Toys & Games', 'Z04'),
(20, 'Video Games', 'N01');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(10) UNSIGNED NOT NULL,
  `comp_name` varchar(20) DEFAULT NULL,
  `adr_street` varchar(30) DEFAULT NULL,
  `fk_zip_code` int(10) UNSIGNED DEFAULT NULL,
  `representative` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `VAT_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `comp_name`, `adr_street`, `fk_zip_code`, `representative`, `phone`, `VAT_number`) VALUES
(1, 'Mydeo', '4615 Sommers Alley', 16853, 'Nobe Dransfield', '(851) 9882123', 15400013),
(2, 'Thoughtmix', '3505 Old Shore Avenue', 20172, 'Gwenneth Wardrop', '(199) 4170196', 30369806),
(3, 'Avamba', '95381 Barnett Alley', 20501, 'Bevon Privost', '(984) 2109319', 76437148),
(4, 'Cogilith', '924 Delaware Drive', 20560, 'Denise Coltherd', '(166) 2100304', 79625606),
(5, 'Ntags', '2262 Russell Circle', 22164, 'Tina Dafydd', '(146) 2942602', 10295182),
(6, 'Feedfish', '69375 Daystar Circle', 22922, 'Keir Ticksall', '(202) 7273319', 95319908),
(7, 'Gabcube', '18390 Sunbrook Crossing', 25155, 'Alyssa Phlippi', '(647) 4422738', 68822898),
(8, 'Zoomlounge', '6182 Bobwhite Hill', 28217, 'Trina Klazenga', '(577) 7256972', 94912247),
(9, 'Fivechat', '9 Petterle Crossing', 29193, 'Sanders Challace', '(482) 4521097', 60750982),
(10, 'Buzzdog', '705 7th Pass', 37815, 'Lucia Kunneke', '(859) 9487302', 48268257),
(11, 'Snaptags', '3877 Hagan Lane', 41722, 'Shepherd Westcot', '(657) 4299008', 27435622),
(12, 'Chatterbridge', '5702 Morrow Parkway', 45088, 'Merry Tee', '(545) 1123548', 20849189),
(13, 'Jabbercube', '1369 Schlimgen Center', 51354, 'Melony Sarfat', '(675) 8032568', 44369472),
(14, 'Demimbu', '9061 Golden Leaf Crossing', 53283, 'Conan Evelyn', '(537) 2106168', 75628786),
(15, 'Voomm', '1 Hayes Circle', 75218, 'Tammy Gemmell', '(704) 3298680', 11198281),
(16, 'Agimba', '5099 Dovetail Parkway', 80913, 'Fredelia O\'Griffin', '(739) 4358813', 99633515),
(17, 'Gigaclub', '72291 Acker Road', 83380, 'Kenon Docksey', '(852) 2943975', 74688099),
(18, 'Browsezoom', '760 Fordem Road', 86522, 'Laurie Gillooly', '(247) 9811132', 21110256),
(19, 'Feedspan', '487 Mccormick Way', 87241, 'Karrie Boles', '(407) 3221688', 81953739),
(20, 'Browsezoom', '5326 Stephen Way', 97209, 'Findlay Philippsohn', '(706) 6745142', 16646112);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `adr_street` varchar(30) DEFAULT NULL,
  `fk_zip_code` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `age` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `username`, `first_name`, `last_name`, `adr_street`, `fk_zip_code`, `email`, `phone`, `age`) VALUES
(1, 'cbroker0', 'Chicky', 'Broker', '5734 Debs Way', 16853, 'cbroker0@comcast.net', '222-875-9477', 23),
(2, 'linstrell1', 'Leopold', 'Instrell', '004 Anderson Plaza', 20172, 'linstrell1@issuu.com', '911-240-3136', 43),
(3, 'ckurth2', 'Conrad', 'Kurth', '214 Fisk Lane', 20501, 'ckurth2@jimdo.com', '187-587-7167', 78),
(4, 'dmuzzall3', 'Dorey', 'Muzzall', '228 Amoth Pass', 20560, 'dmuzzall3@fc2.com', '889-449-1083', 79),
(5, 'ccollings4', 'Cloris', 'Collings', '8 Beilfuss Plaza', 22164, 'ccollings4@github.com', '173-664-5579', 58),
(6, 'lmatashkin5', 'Luca', 'Matashkin', '302 Raven Alley', 22922, 'lmatashkin5@biglobe.ne.jp', '413-719-5566', 60),
(7, 'fplatts6', 'Fredia', 'Platts', '6873 Rieder Court', 25155, 'fplatts6@delicious.com', '726-364-4099', 90),
(8, 'khamel7', 'Kelby', 'Hamel', '7740 Meadow Valley Street', 28217, 'khamel7@cocolog-nifty.com', '764-405-6747', 25),
(9, 'edibernardo8', 'Ericha', 'Di Bernardo', '7 Logan Center', 29193, 'edibernardo8@elegantthemes.com', '386-375-6034', 94),
(10, 'tantonowicz9', 'Talbot', 'Antonowicz', '99 Wayridge Crossing', 37815, 'tantonowicz9@blinklist.com', '262-915-2256', 32),
(11, 'mhodgesa', 'Marcella', 'Hodges', '80 Harper Plaza', 41722, 'mhodgesa@blogspot.com', '928-851-6577', 30),
(12, 'egainsfordb', 'Ellissa', 'Gainsford', '18855 Eliot Trail', 45088, 'egainsfordb@spiegel.de', '891-361-1391', 42),
(13, 'wnevinsc', 'Wolfy', 'Nevins', '92618 Reindahl Street', 51354, 'wnevinsc@irs.gov', '258-502-0720', 49),
(14, 'aeglesed', 'Aubree', 'Eglese', '309 Village Junction', 53283, 'aeglesed@creativecommons.org', '607-189-6708', 52),
(15, 'clinforde', 'Cedric', 'Linford', '782 Fisk Pass', 75218, 'clinforde@shutterfly.com', '954-677-8910', 88),
(16, 'arawcliffef', 'Arlen', 'Rawcliffe', '3004 Columbus Park', 80913, 'arawcliffef@e-recht24.de', '440-658-5051', 45),
(17, 'landriolettig', 'Leone', 'Andrioletti', '673 Eagle Crest Street', 83380, 'landriolettig@accuweather.com', '864-449-5434', 22),
(18, 'cgaythwaiteh', 'Curtice', 'Gaythwaite', '670 Superior Center', 86522, 'cgaythwaiteh@oakley.com', '679-886-1289', 69),
(19, 'dscoggansi', 'Darbie', 'Scoggans', '622 Redwing Court', 87241, 'dscoggansi@cafepress.com', '269-418-9526', 18),
(20, 'emawmanj', 'Erskine', 'Mawman', '89 Kipling Terrace', 97209, 'emawmanj@imgur.com', '539-408-0232', 71);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(10) UNSIGNED NOT NULL,
  `fk_user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_passwd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `fk_user_id`, `user_passwd`) VALUES
(10001, 1, '8bia8anRKbj'),
(10002, 2, 'zzeq1cQ'),
(10003, 3, 'Weucq3'),
(10004, 4, 'HYsvfU'),
(10005, 5, 'dqToipq'),
(10006, 6, 'ttQyoiB'),
(10007, 7, 'x5rdwz1Jzk0'),
(10008, 8, 'bxVUiSu'),
(10009, 9, 'qdCRSTbyyqlm'),
(10010, 10, 'SCCXmXZ'),
(10011, 11, 'aOlkwwAFZl7f'),
(10012, 12, 'oia4DSx8YkQ'),
(10013, 13, 'PAs2wPZQp9rX'),
(10014, 14, 'kHnuhCKZHok'),
(10015, 15, 'P7B7cNl'),
(10016, 16, 'uaPE60GY01tK'),
(10017, 17, '3TCvHCMR3'),
(10018, 18, 'Rnt5CTMmm'),
(10019, 19, '1MzvtAkBe'),
(10020, 20, '3hOvRt');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) UNSIGNED NOT NULL,
  `fk_order_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_type` varchar(20) DEFAULT NULL,
  `invoice_sum` int(11) DEFAULT NULL,
  `pay_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `fk_order_id`, `invoice_date`, `invoice_type`, `invoice_sum`, `pay_status`) VALUES
(91235, 76544, '2020-07-25', 'post', 10486, 0),
(91236, 76545, '2020-06-09', 'email', 2495, 0),
(91237, 76546, '2021-01-10', 'pigeon', 3840, 0),
(91238, 76547, '2021-03-24', 'post', 11883, 1),
(91239, 76548, '2020-11-09', 'email', 392, 0),
(91240, 76549, '2021-02-07', 'email', 3400, 1),
(91241, 76550, '2020-07-02', 'pigeon', 44820, 1),
(91242, 76551, '2021-04-01', 'email', 1881, 1),
(91243, 76552, '2021-02-07', 'post', 203, 1),
(91244, 76553, '2021-02-20', 'email', 2995, 1),
(91245, 76554, '2021-01-12', 'email', 1683, 0),
(91246, 76555, '2021-01-17', 'pigeon', 38, 1),
(91247, 76556, '2020-06-28', 'post', 13993, 0),
(91248, 76557, '2020-12-31', 'email', 8982, 1),
(91249, 76558, '2020-07-01', 'post', 3383, 1),
(91250, 76559, '2021-02-07', 'email', 1500, 1),
(91251, 76560, '2020-05-12', 'pigeon', 29400, 0),
(91252, 76561, '2021-03-12', 'email', 15751, 1),
(91253, 76562, '2020-07-30', 'email', 1680, 0),
(91254, 76563, '2020-07-06', 'email', 11700, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `prod_name` varchar(30) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `fk_category_id` int(10) UNSIGNED DEFAULT NULL,
  `fk_comp_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `prod_name`, `price`, `fk_category_id`, `fk_comp_id`, `image`, `weight`, `stock`) VALUES
(10102, 'IBM Workstation', 3900, 15, 12, '1DxcbuD37YsFfvgGYGRrKjPM8sAcD99dhb', 54, 162),
(12247, 'Suitcase Set', 280, 13, 6, '18hUhqbMvFmXVf4Kcc44PQMfMVxbetex8b', 56, 736),
(15319, 'Office Desk', 829, 10, 1, '1K8CqupaMB2JQFNfMCiWM7yv2maU5cNovV', 52, 974),
(21369, 'Alienware Extreme', 4900, 8, 12, '12BZ8LESxy8msa5nbcuYJxUy65mF61MtxU', 41, 791),
(25433, 'Beauty Case', 300, 5, 3, '1JWSgtThmi9mTrvqUBbJ87B4nes3ffABP', 2, 912),
(27193, 'Final Fantasy Epic Edition', 199, 1, 15, '1PFdxZueUu55xe1sKiYQg5dYVrCR7q4ZA7', 7, 701),
(32559, 'Table Soccer', 499, 1, 9, '15JjvTJqi9noCyoSgSmPtSnYUo9jTE55eG', 21, 764),
(37419, 'Desktop Computer', 1999, 6, 20, '1CMokP5cCLKdMWUSQi5XuHghgQrFFim97k', 22, 657),
(44767, 'Screw Driver Set', 19, 18, 12, '1AKRiM6aQzAv8G4c59FkxXDRZSYZyHUx4X', 4, 426),
(53738, 'Terracotta Vase', 99, 10, 4, '1Pw88quMmM3zZBt7i1dzS2ro2e3JFJYUM', 22, 782),
(64981, 'Small Freezer', 599, 11, 9, '1FAejTztJX6R1DibuwvrzGZW8gh7U6Fcmr', 65, 732),
(67892, 'Filofax', 29, 15, 17, '1FDYApN5R16GgEjd26JRvkd6Ai9CFapbHj', 2, 706),
(70433, 'Pottery Set', 99, 3, 11, '1PMuazbENroES6Wmz8DpUpM2sFN2cFVJxp', 39, 537),
(70897, 'Mac Book Pro', 2490, 8, 17, '1C7B81bVJ7TTugT2uk6asrVrmPqb5TryuB', 6, 76),
(81924, 'Trumpet', 1700, 14, 2, '15gk11pxpJFSRB2fEQ6dsKZFPeCdNpcTKj', 10, 982),
(82064, 'Handwriting Set', 49, 16, 5, '12rdmdBJtAcC77TFjubUXmZcacUNd1rZ31', 2, 918),
(86682, 'Encyclopedia Britannica', 699, 7, 2, '1DtbtebWvRstDvdUDecVV6jTDEZNjttvEo', 69, 514),
(90515, 'Travel Bag Set', 240, 13, 15, '1PFGZiBt7yNg7oqLhJvucgwocGyEzuodpf', 20, 280),
(95584, 'LED Rearlights', 499, 4, 16, '1BmvnhiGXFDsAMQX8PtPeNP9uakQBFrs66', 21, 265),
(97379, 'Cat Playground', 749, 16, 17, '1M6QwvRTwWYViFwMD8DVMfYzdRyHA2ygvH', 76, 982);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `fk_cart_id` int(10) UNSIGNED DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_status` tinyint(1) DEFAULT NULL,
  `order_comment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`order_id`, `fk_cart_id`, `order_date`, `order_status`, `order_comment`) VALUES
(76544, 12346, '2020-08-01', 0, 'scelerisque mauris sit amet eros suspendisse accum'),
(76545, 12347, '2020-08-19', 1, 'viverra eget congue eget semper rutrum nulla'),
(76546, 12348, '2020-08-15', 0, 'quam nec dui luctus rutrum nulla tellus'),
(76547, 12349, '2020-08-18', 0, 'id pretium iaculis diam erat fermentum justo nec c'),
(76548, 12350, '2021-04-14', 0, 'faucibus orci luctus et ultrices posuere cubilia'),
(76549, 12351, '2020-04-19', 0, 'donec ut dolor morbi vel lectus'),
(76550, 12352, '2020-05-10', 1, 'felis ut at dolor quis odio'),
(76551, 12353, '2020-09-13', 1, 'accumsan felis ut at dolor'),
(76552, 12354, '2021-01-02', 1, 'pede justo eu massa donec'),
(76553, 12355, '2020-09-20', 1, 'donec vitae nisi nam ultrices libero non mattis pu'),
(76554, 12356, '2020-04-19', 1, 'ac neque duis bibendum morbi non'),
(76555, 12357, '2020-11-10', 1, 'integer non velit donec diam neque vestibulum eget'),
(76556, 12358, '2021-03-19', 0, 'nec molestie sed justo pellentesque viverra pede a'),
(76557, 12359, '2020-09-24', 1, 'at nulla suspendisse potenti cras in purus eu magn'),
(76558, 12360, '2021-01-10', 1, 'cubilia curae duis faucibus accumsan odio curabitu'),
(76559, 12361, '2020-08-13', 0, 'suscipit a feugiat et eros vestibulum ac est lacin'),
(76560, 12362, '2020-06-22', 1, 'diam neque vestibulum eget vulputate'),
(76561, 12363, '2021-03-14', 1, 'cras mi pede malesuada in imperdiet et commodo vul'),
(76562, 12364, '2021-04-05', 0, 'porttitor lacus at turpis donec posuere'),
(76563, 12365, '2020-10-24', 1, 'semper sapien a libero nam dui');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `fk_order_id` int(10) UNSIGNED DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `transportation` varchar(20) DEFAULT NULL,
  `fk_carrier_id` int(10) UNSIGNED DEFAULT NULL,
  `insurance` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `fk_order_id`, `ship_date`, `transportation`, `fk_carrier_id`, `insurance`) VALUES
(81235, 76544, '2020-08-14', 'land', 19, 0),
(81236, 76545, '2021-02-12', 'air', 10, 1),
(81237, 76546, '2021-03-24', 'sea', 2, 1),
(81238, 76547, '2020-12-21', 'land', 6, 1),
(81239, 76548, '2021-03-07', 'land', 2, 1),
(81240, 76549, '2021-01-11', 'land', 19, 1),
(81241, 76550, '2020-10-30', 'air', 15, 1),
(81242, 76551, '2020-10-26', 'air', 19, 1),
(81243, 76552, '2021-03-30', 'air', 9, 1),
(81244, 76553, '2020-05-05', 'land', 16, 0),
(81245, 76554, '2021-02-13', 'sea', 1, 0),
(81246, 76555, '2020-09-30', 'land', 18, 1),
(81247, 76556, '2021-03-17', 'air', 20, 1),
(81248, 76557, '2020-10-27', 'land', 17, 1),
(81249, 76558, '2020-07-27', 'land', 18, 0),
(81250, 76559, '2021-02-11', 'air', 6, 1),
(81251, 76560, '2021-03-28', 'sea', 10, 1),
(81252, 76561, '2020-04-26', 'land', 10, 0),
(81253, 76562, '2020-07-11', 'land', 3, 0),
(81254, 76563, '2021-03-06', 'air', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_pay`
--

CREATE TABLE `user_pay` (
  `userpay_id` int(10) UNSIGNED NOT NULL,
  `fk_user_id` int(11) UNSIGNED DEFAULT NULL,
  `cred_account` int(11) DEFAULT NULL,
  `cred_card` varchar(20) DEFAULT NULL,
  `cred_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_pay`
--

INSERT INTO `user_pay` (`userpay_id`, `fk_user_id`, `cred_account`, `cred_card`, `cred_name`) VALUES
(5001, 1, 6165299, '947-439-2158', 'Chicky Broker'),
(5002, 2, 3048369, '339-214-1526', 'Leopold Instrell'),
(5003, 3, 3842264, '803-444-3491', 'Conrad Kurth'),
(5004, 4, 4674088, '704-943-0845', 'Dorey Muzzall'),
(5005, 5, 2195780, '340-586-7473', 'Cloris Collings'),
(5006, 6, 5051660, '599-671-4064', 'Luca Matashkin'),
(5007, 7, 7929042, '605-556-7510', 'Fredia Platts'),
(5008, 8, 2805848, '592-588-1156', 'Kelby Hamel'),
(5009, 9, 2812174, '465-209-7999', 'Ericha Di Bernardo'),
(5010, 10, 9370562, '807-885-5724', 'Talbot Antonowicz'),
(5011, 11, 5075636, '902-128-5924', 'Marcella Hodges'),
(5012, 12, 6633175, '606-876-2147', 'Ellissa Gainsford'),
(5013, 13, 2596519, '914-644-4166', 'Wolfy Nevins'),
(5014, 14, 1355359, '307-701-0879', 'Aubree Eglese'),
(5015, 15, 4234366, '444-392-2970', 'Cedric Linford'),
(5016, 16, 1990295, '582-606-5942', 'Arlen Rawcliffe'),
(5017, 17, 4823170, '931-258-1535', 'Leone Andrioletti'),
(5018, 18, 7981477, '344-398-6842', 'Curtice Gaythwaite'),
(5019, 19, 9576333, '536-952-9941', 'Darbie Scoggans'),
(5020, 20, 8211105, '183-905-0918', 'Erskine Mawman');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `fk_login_id` int(10) UNSIGNED DEFAULT NULL,
  `fk_product_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`cart_id`, `fk_login_id`, `fk_product_id`, `amount`) VALUES
(12346, 10001, 97379, 14),
(12347, 10002, 95584, 5),
(12348, 10003, 90515, 16),
(12349, 10004, 86682, 17),
(12350, 10005, 82064, 8),
(12351, 10006, 81924, 2),
(12352, 10007, 70897, 18),
(12353, 10008, 70433, 19),
(12354, 10009, 67892, 7),
(12355, 10010, 64981, 5),
(12356, 10011, 53738, 17),
(12357, 10012, 44767, 2),
(12358, 10013, 37419, 7),
(12359, 10014, 32559, 18),
(12360, 10015, 27193, 17),
(12361, 10016, 25433, 5),
(12362, 10017, 21369, 6),
(12363, 10018, 15319, 19),
(12364, 10019, 12247, 6),
(12365, 10020, 10102, 3);

-- --------------------------------------------------------

--
-- Table structure for table `zip`
--

CREATE TABLE `zip` (
  `zip_code` int(10) UNSIGNED NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zip`
--

INSERT INTO `zip` (`zip_code`, `city`, `country`) VALUES
(16853, 'Youzai', 'China'),
(20172, 'Antang', 'China'),
(20501, 'Barra de São Francis', 'Brazil'),
(20560, 'Tomari', 'Russia'),
(22164, 'Sigavé', 'Wallis and Futuna'),
(22922, 'Vnanje Gorice', 'Slovenia'),
(25155, 'Pathum Ratchawongsa', 'Thailand'),
(28217, 'Xuedian', 'China'),
(29193, 'Shihuajian', 'China'),
(37815, 'Yangba', 'China'),
(41722, 'Mawza‘', 'Yemen'),
(45088, 'Tiyingtali Kelod', 'Indonesia'),
(51354, 'Bil‘īn', 'Palestinian Territor'),
(53283, 'Qixingtai', 'China'),
(75218, 'Funtua', 'Nigeria'),
(80913, 'Kněžpole', 'Czech Republic'),
(83380, 'Zarqa', 'Jordan'),
(86522, 'Volkhov', 'Russia'),
(87241, 'Okiot', 'Philippines'),
(97209, 'Wysokie Mazowieckie', 'Poland');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrier`
--
ALTER TABLE `carrier`
  ADD PRIMARY KEY (`carrier_id`),
  ADD KEY `fk_zip_code` (`fk_zip_code`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `fk_zip_code` (`fk_zip_code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_zip_code` (`fk_zip_code`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `fk_order_id` (`fk_order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_category_id` (`fk_category_id`),
  ADD KEY `fk_comp_id` (`fk_comp_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_cart_id` (`fk_cart_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `fk_order_id` (`fk_order_id`),
  ADD KEY `fk_carrier_id` (`fk_carrier_id`);

--
-- Indexes for table `user_pay`
--
ALTER TABLE `user_pay`
  ADD PRIMARY KEY (`userpay_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_login_id` (`fk_login_id`),
  ADD KEY `fk_product_id` (`fk_product_id`);

--
-- Indexes for table `zip`
--
ALTER TABLE `zip`
  ADD PRIMARY KEY (`zip_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrier`
--
ALTER TABLE `carrier`
  MODIFY `carrier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10021;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91255;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99953;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81255;

--
-- AUTO_INCREMENT for table `user_pay`
--
ALTER TABLE `user_pay`
  MODIFY `userpay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5021;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12366;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrier`
--
ALTER TABLE `carrier`
  ADD CONSTRAINT `carrier_ibfk_1` FOREIGN KEY (`fk_zip_code`) REFERENCES `zip` (`zip_code`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`fk_zip_code`) REFERENCES `zip` (`zip_code`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`fk_zip_code`) REFERENCES `zip` (`zip_code`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`fk_order_id`) REFERENCES `purchase` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`fk_category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`fk_comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`fk_cart_id`) REFERENCES `website` (`cart_id`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`fk_order_id`) REFERENCES `purchase` (`order_id`),
  ADD CONSTRAINT `shipping_ibfk_2` FOREIGN KEY (`fk_carrier_id`) REFERENCES `carrier` (`carrier_id`);

--
-- Constraints for table `user_pay`
--
ALTER TABLE `user_pay`
  ADD CONSTRAINT `user_pay_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `website`
--
ALTER TABLE `website`
  ADD CONSTRAINT `website_ibfk_1` FOREIGN KEY (`fk_login_id`) REFERENCES `login` (`login_id`),
  ADD CONSTRAINT `website_ibfk_2` FOREIGN KEY (`fk_product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
