-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 02:57 PM
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
-- Database: `cr10-gregor-biglibrary`
--
CREATE DATABASE IF NOT EXISTS `cr10-gregor-biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr10-gregor-biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `library_all_media`
--

CREATE TABLE `library_all_media` (
  `id` int(11) NOT NULL,
  `media_title` varchar(50) NOT NULL,
  `media_type` varchar(4) NOT NULL,
  `media_date` year(4) NOT NULL,
  `media_isbn` varchar(11) NOT NULL,
  `media_descr` varchar(100) NOT NULL,
  `media_image` varchar(100) NOT NULL,
  `media_status` varchar(9) NOT NULL,
  `author_fname` varchar(20) NOT NULL,
  `author_lname` varchar(20) NOT NULL,
  `pub_name` varchar(30) NOT NULL,
  `pub_address` varchar(50) NOT NULL,
  `pub_size` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_all_media`
--

INSERT INTO `library_all_media` (`id`, `media_title`, `media_type`, `media_date`, `media_isbn`, `media_descr`, `media_image`, `media_status`, `author_fname`, `author_lname`, `pub_name`, `pub_address`, `pub_size`) VALUES
(300, 'Parallel Universe', 'book', 2010, '663560508-8', 'A page turning novel you will never forget.\r\n', 'http://shallow.codes/images_CR10/book01.jpg', 'available', 'Anthony', 'Brown', 'Mercer Publishers Inc', '4153 John Calvin Drive, 60605 Chicago, IL', 'big'),
(301, 'Attack of the Beasts', 'book', 2019, '393370726-9', 'In space, no one can hear your scream.\r\n', 'http://shallow.codes/images_CR10/book02.jpg', 'available', 'Walter', 'Smith', 'Pilgrim Publications', '248 Deer Ridge Drive, 07102 Newark, NJ', 'medium'),
(302, 'Children Stories', 'book', 2017, '872978933-8', 'Find out more about the world you live in. Read.\r\n', 'http://shallow.codes/images_CR10/book03.jpg', 'reserved', 'Ken', 'Adams', 'James Madison Press', '4037 Village View Drive, 33905 Fort Myers, FL', 'small'),
(303, 'The Lord of the Lost', 'book', 2020, '858521203-9', 'Some loves are meant to be .. Others are cursed.\r\n', 'http://shallow.codes/images_CR10/book04.jpg', 'available', 'Susan', 'Dawson', 'Kentuckiana Publishing', '4131 Birch Street, 79906 El Paso, TX', 'small'),
(304, 'House of Secrets', 'book', 2004, '636467057-1', 'When the world crumbles around you, how do you keep hope alive?\r\n', 'http://shallow.codes/images_CR10/book05.jpg', 'available', 'Maria', 'Ramsey', 'Brown and Tedstrom Inc', '135 Nutters Barn Lane, 50313 Des Moines, IA', 'medium'),
(305, 'Away', 'book', 2021, '072454710-X', '\"A great psychological thriller.\" - NYT Kindle Review\r\n', 'http://shallow.codes/images_CR10/book06.jpg', 'reserved', 'Sylvia', 'Walker', 'Sun International', '156 Terry Lane, 44827 Crestline, OH', 'medium'),
(306, 'Business Startup', 'book', 2018, '248157425-7', 'Empowering creative people to start a small business from home.\r\n', 'http://shallow.codes/images_CR10/book07.jpg', 'available', 'Jen', 'Brazel', 'Watershed Publishing Llc', '157 Bryan Street, 07076 New Jersey, NJ', 'big'),
(307, 'Spark', 'book', 2007, '857752382-9', 'True love knows no bound. A heartwarming romance.\r\n', 'http://shallow.codes/images_CR10/book08.jpg', 'reserved', 'Anna', 'Wright', 'Interstate Media', '2042 Cambridge Place, 21229 Baltimore, MD', 'medium'),
(308, 'Torn', 'book', 1995, '765656430-6', 'No amount of fire or freshness can challenge what a man stores in his heart.\r\n', 'http://shallow.codes/images_CR10/book09.jpg', 'available', 'Paul', 'Clarke', 'Mercer Publishers Inc', '4153 John Calvin Drive, 60605 Chicago, IL', 'big'),
(309, 'The Beloved Wild', 'book', 1999, '986689246-8', 'Page turning, delightful debut with equal parts historical adventure.\r\n', 'http://shallow.codes/images_CR10/book10.jpg', 'reserved', 'Melessa', 'Ostrom', 'Watershed Publishing Llc', '157 Bryan Street, 07076 New Jersey, NJ', 'big'),
(310, 'Discovery', 'cd', 1965, '983120685-1', 'One of the year\'s finest recordings and as such is highly recommended.\r\n', 'http://shallow.codes/images_CR10/cd01.jpg', 'reserved', 'Band', 'Cannon', 'Laura Shaw Studio', '3019 Oakmound Drive, 60527 Burr Ridge, IL', 'small'),
(311, 'Carnivore', 'cd', 1994, '316041015-3', 'This album\'s fine balance of composition holds the attention from start to finish.\r\n', 'http://shallow.codes/images_CR10/cd02.jpg', 'available', 'Band', 'Cotton', 'No Boundaries', '890 Blane Street, 63146 Saint Louis, MO', 'medium'),
(312, 'Gorillaz', 'cd', 2000, '599149775-3', 'Strong themes and clear narrative balance, reflecting the albums inspiration.\r\n', 'http://shallow.codes/images_CR10/cd03.jpg', 'available', 'Band', 'Demon Dayz', 'Frozen Records', '649 Sycamore Fork Road, 33176 Miami, FL', 'small'),
(313, 'Time Travel', 'cd', 2003, '428941718-3', 'Rhythm-twisting struts are played with the breeziness of a carefree band.\r\n', 'http://shallow.codes/images_CR10/cd04.jpg', 'available', 'Band', 'Dubai', 'Toyo Link Inc', '1816 Deegan Lake Road, 13901 New York, NY', 'big'),
(314, 'Bad Blood', 'cd', 2011, '159890044-7', 'Sweet vocal harmonies and tuneful jam-based hard rock, fusion and beat sounds.\r\n', 'http://shallow.codes/images_CR10/cd05.jpg', 'reserved', 'Band', 'Fozzie Bear', 'Covenant Studios', '2303 Ingram Street, 45402 Dayton, OH', 'small'),
(315, 'Faded', 'cd', 2014, '815052894-6', 'Still at the top of progressive beats. \"2 Run\" will finish high in year-lists.\r\n', 'http://shallow.codes/images_CR10/cd06.jpg', 'available', 'Singer', 'J-Welz', 'Toyo Link Inc', '1816 Deegan Lake Road, 13901 New York, NY', 'big'),
(316, 'Fokou', 'cd', 2016, '569711023-5', 'This album clearly sounds as if it took years to make. Memorable tunes.\r\n', 'http://shallow.codes/images_CR10/cd07.jpg', 'available', 'Band', 'Pulses', 'Frozen Records', '649 Sycamore Fork Road, 33176 Miami, FL', 'small'),
(317, 'All This & Everything in Between', 'cd', 1997, '520752799-1', 'Beginning with a lush, atmospheric soundscape, unfolding from theatrical play.', 'http://shallow.codes/images_CR10/cd08.jpg', 'available', 'Thomas', 'Burnett', 'Covenant Studios', '2303 Ingram Street, 45402 Dayton, OH', 'small'),
(318, 'Yawning', 'cd', 2018, '607996801-0', 'Intended for a broad audience of connoisseurs. Indispensable album!\r\n', 'http://shallow.codes/images_CR10/cd09.jpg', 'reserved', 'Band', 'No Maps', 'No Boundaries', '890 Blane Street, 63146 Saint Louis, MO', 'medium'),
(319, 'Self Portrait', 'cd', 2001, '355750288-0', 'A jewel of originality. Amazing musical variety of the concept.\r\n', 'http://shallow.codes/images_CR10/cd10.jpg', 'reserved', 'Yung', 'Vinci', 'Toyo Link Inc', '1816 Deegan Lake Road, 13901 New York, NY', 'big'),
(320, 'Last Witness', 'dvd', 2008, '562579579-7', 'In the time of the forgotten, she must remember.\r\n', 'http://shallow.codes/images_CR10/dvd01.jpg', 'available', 'Susan', 'Durban', 'CPI Publishers Inc', '4757 Fincham Road, 92103 San Diego, CA', 'big'),
(321, 'Super Heroes', 'dvd', 2017, '632196227-9', 'The scale and ambition of this movie is awe-inspiring.\r\n', 'http://shallow.codes/images_CR10/dvd02.jpg', 'available', 'Michael', 'Hawkins', 'Media Expression', '3418 Lake Road, 08232 Egg Harbor, NJ', 'small'),
(322, 'Frost Witch', 'dvd', 2020, '766857333-X', 'A fascinating story, deftly played to the shattering conclusion.\r\n', 'http://shallow.codes/images_CR10/dvd03.jpg', 'available', 'Gerald', 'Surrington', 'CPI Publishers Inc', '4757 Fincham Road, 92103 San Diego, CA', 'big'),
(323, 'Hit the Road', 'dvd', 2016, '072129080-9', 'Rivalries - sometimes they are all in the mind.\r\n', 'http://shallow.codes/images_CR10/dvd04.jpg', 'reserved', 'Frank', 'Mayers', 'Sun International', '156 Terry Lane, 44827 Crestline, OH', 'medium'),
(324, 'Laura\'s Counterplay', 'dvd', 2006, '095991551-6', 'From the multi award winning director of \"Shift\", \"Human\" and \"Dark Horizon\".\r\n', 'http://shallow.codes/images_CR10/dvd05.jpg', 'available', 'Miles', 'Parker', 'Watershed Publishing Llc', '157 Bryan Street, 07076 New Jersey, NJ', 'big'),
(325, 'Hot Zombie Killers', 'dvd', 2002, '893461775-6', 'When the zombie outbreak hits, for obvious reasons .. Run!\r\n', 'http://shallow.codes/images_CR10/dvd06.jpg', 'available', 'Alexander', 'Manson', 'Mercer Publishers Inc', '4153 John Calvin Drive, 60605 Chicago, IL', 'big'),
(326, 'Infictus', 'dvd', 2009, '389186384-5', 'A story of conscience and conviction that ought to inspire everybody.\r\n', 'http://shallow.codes/images_CR10/dvd07.jpg', 'reserved', 'Forrest', 'Hickerson', 'Interstate Media', '2042 Cambridge Place, 21229 Baltimore, MD', 'medium'),
(327, 'Infected', 'dvd', 1998, '090797086-9', 'Strongest horror-film of recent years. A flat-out masterpiece.\r\n', 'http://shallow.codes/images_CR10/dvd08.jpg', 'available', 'Stanley', 'Jennings', 'Brown and Tedstrom Inc', '135 Nutters Barn Lane, 50313 Des Moines, IA', 'medium'),
(328, 'War', 'dvd', 1999, '290128028-5', 'A stunning and terrifying experience. Spectacular visual effects.\r\n', 'http://shallow.codes/images_CR10/dvd09.jpg', 'reserved', 'Robert', 'Defries', 'James Madison Press', '4037 Village View Drive, 33905 Fort Myers, FL', 'small'),
(329, 'The Gunfighter', 'dvd', 1989, '714542578-5', 'The fastest gun in all the west, the quickest ever known.\r\n', 'http://shallow.codes/images_CR10/dvd10.jpg', 'available', 'Steven', 'Manning', 'Sun International', '156 Terry Lane, 44827 Crestline, OH', 'medium');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `library_all_media`
--
ALTER TABLE `library_all_media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `library_all_media`
--
ALTER TABLE `library_all_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
