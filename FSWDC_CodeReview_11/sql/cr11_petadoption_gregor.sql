-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 01:27 AM
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
-- Database: `cr11_petadoption_gregor`
--
CREATE DATABASE IF NOT EXISTS `cr11_petadoption_gregor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_petadoption_gregor`;

-- --------------------------------------------------------

--
-- Table structure for table `adoptions`
--

CREATE TABLE `adoptions` (
  `id` int(11) NOT NULL,
  `fk_petId` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `breed` varchar(20) DEFAULT NULL,
  `fk_userId` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `adopt_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `breed` varchar(20) NOT NULL,
  `size` varchar(5) NOT NULL,
  `age` int(3) NOT NULL,
  `description` varchar(120) NOT NULL,
  `hobbies` varchar(120) NOT NULL,
  `loc_zip` int(5) NOT NULL,
  `loc_city` varchar(20) NOT NULL,
  `loc_address` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `name`, `breed`, `size`, `age`, `description`, `hobbies`, `loc_zip`, `loc_city`, `loc_address`, `image`) VALUES
(212, 'Antz', 'Ants', 'small', 0, '\"We are legion!\" - you should have experience in dealing with ants.', 'Very organized, loves the community.', 10566, 'Peekskill', '4171 Deans Lane', 'http://shallow.codes/images_CR11/pet_01.jpg'),
(213, 'Swoop', 'Dog', 'small', 13, 'Elderly gentleman is looking for a new home.', 'Still very playful and active.', 46214, 'Indianapolis', '1920 Clay Street', 'http://shallow.codes/images_CR11/pet_02.jpg'),
(214, 'Sugar', 'Rabbit', 'small', 1, 'Very young and cute rabbit.', 'Extreme preference for carrots.', 30305, 'Atlanta', '1955 Pine Garden Lane', 'http://shallow.codes/images_CR11/pet_03.jpg'),
(215, 'Sneaky', 'Snake', 'large', 9, 'Is only given into the hands of professionals.', 'Mostly just hanging around.', 97266, 'Portland', '4266 Hope Street', 'http://shallow.codes/images_CR11/pet_04.jpg'),
(216, 'Nemos', 'Fish', 'small', 2, 'Beautiful, but not easy to care for.', 'Needs a very large aquarium.', 20701, 'Annapolis', '599 Nelm Street', 'http://shallow.codes/images_CR11/pet_05.jpg'),
(217, 'Speedy', 'Turtle', 'small', 104, 'Cozy, old and wise turtle.', 'Lettuce is the favorite food.', 12192, 'Needham', '1563 Rockford Road', 'http://shallow.codes/images_CR11/pet_06.jpg'),
(218, 'Cody', 'Cat', 'small', 6, 'Beautiful tabby cat.', 'Looking for staff.', 15219, 'Pittsburgh', '1004 Beechwood Drive', 'http://shallow.codes/images_CR11/pet_07.jpg'),
(219, 'Tickle', 'Dog', 'large', 7, 'A loyal friend with a lot of experience in dealing with children.', 'Loves very long walks.', 98203, 'Everett', '1827 Ryder Avenue', 'http://shallow.codes/images_CR11/pet_08.jpg'),
(220, 'Missy', 'Cat', 'small', 3, 'Young and very playful cat.', 'Not a great dog lover.', 18230, 'Palemont', '970 Lake Road', 'http://shallow.codes/images_CR11/pet_09.jpg'),
(221, 'Tango', 'Dog', 'large', 9, 'The best companion you can imagine.', 'Loves to play. Brings your slippers (sometimes).', 64106, 'Kansas City', '250 Traders Alley', 'http://shallow.codes/images_CR11/pet_10.jpg'),
(222, 'Sassy', 'Cat', 'small', 0, 'Cutest kitten on earth.', 'Likes to be in the fresh air and does not want to be a house cat.', 70117, 'New Orleans', '1469 Shadowmar Drive', 'http://shallow.codes/images_CR11/pet_11.jpg'),
(223, 'Opie', 'Guinea pig', 'small', 1, 'Needs a lot of care and doesn\'t want to be alone.', 'Very greedy and active.', 89014, 'Henderson', '1812 Sunrise Road', 'http://shallow.codes/images_CR11/pet_12.jpg'),
(224, 'Champagne', 'Horse', 'large', 15, 'Looking for a new home with a huge run.', 'Definitely needs the company of other horses.', 32304, 'Tallahassee', '4688 Drainer Avenue', 'http://shallow.codes/images_CR11/pet_13.jpg'),
(225, 'Pip', 'Hamster', 'small', 3, 'Very young und cute hamster.', 'Sleeps all day, but runs all night.', 10022, 'New York', '2614 Farnum Road', 'http://shallow.codes/images_CR11/pet_14.jpg'),
(226, 'Chico', 'Guinea pig', 'small', 4, 'Older guinea pig, still very active.', 'Likes the garden and other conspecifics.', 99827, 'Klukwan', '780 Timbercrest Road', 'http://shallow.codes/images_CR11/pet_15.jpg'),
(227, 'Fluffy', 'Alpaca', 'large', 11, 'Is only given into the hands of professionals.', 'Needs proximity to other alpacas.', 85034, 'Phoenix', '3189 Burnside Court', 'http://shallow.codes/images_CR11/pet_16.jpg'),
(228, 'Milo', 'Goat', 'large', 10, 'Can be quite rebellious.', 'Is more of a loner and likes to wander around.', 28301, 'Fayetteville', '1360 Twin Willow Lane', 'http://shallow.codes/images_CR11/pet_17.jpg'),
(229, 'Rudy', 'Spider', 'small', 1, 'These (many) eyes cannot lie.', 'Extremely erratic and hard to find.', 14608, 'Rochester', '4578 Caldwell Road', 'http://shallow.codes/images_CR11/pet_18.jpg'),
(230, 'Payton', 'Donkey', 'large', 14, 'Cozy and quiet contemporary.', 'Likes to eat and a lot. Likes other donkeys.', 21740, 'Hagerstown', '4597 Cost Avenue', 'http://shallow.codes/images_CR11/pet_19.jpg'),
(231, 'Victor', 'Dog', 'large', 9, 'Loyal and cuddly watchdog.', 'Likes children. Does almost anything for a sausage.', 41501, 'Pikeville', '4950 Meadowcrest Lane', 'http://shallow.codes/images_CR11/pet_20.jpg'),
(232, 'Penny', 'Dog', 'large', 8, 'Very sociable greyhound lady.', 'The picture is deceptive. She likes to cuddle, but needs a lot of exercise.', 57006, 'Brookings', '952 Hartway Street', 'http://shallow.codes/images_CR11/pet_21.jpg'),
(233, 'Huey', 'Dog', 'large', 2, 'Young playmate is looking for a warm home.', 'Likes company and needs a lot of affection.', 94143, 'San Francisco', '2808 Locust View Drive', 'http://shallow.codes/images_CR11/pet_22.jpg'),
(234, 'Percy', 'Cat', 'small', 4, 'Very dear and calm tomcat.', 'Rewards (almost) every attentiveness with a loud purr.', 32202, 'Jacksonville', '3482 Boundary Street', 'http://shallow.codes/images_CR11/pet_23.jpg'),
(235, 'Chili', 'Cat', 'small', 0, 'Very young and playful, black kitten.', 'Needs (wants) attention all day.', 16225, 'Worcester', '2173 Kennedy Court', 'http://shallow.codes/images_CR11/pet_24.jpg'),
(236, 'Benson', 'Dog', 'small', 3, 'Loyal and bright little friend is looking for the same in large.', 'Loves long walks in spite of its size.', 15205, 'Crafton', '4221 Frank Avenue', 'http://shallow.codes/images_CR11/pet_25.jpg'),
(237, 'Lester', 'Budgie', 'small', 3, 'Definitely needs company (another budgie).', 'Cover up at night, otherwise he won\'t rest.', 39211, 'Jackson', '237 Saint Claire Street', 'http://shallow.codes/images_CR11/pet_26.jpg'),
(238, 'Moxie', 'Dog', 'small', 7, 'Bright and playful male pug.', 'Would like to find a loving and turbulent home again.', 68801, 'Grand Island', '1974 Kyle Street', 'http://shallow.codes/images_CR11/pet_27.jpg'),
(239, 'Hemingway', 'Parrot', 'small', 20, 'A sociable and calm gentleman. Needs someone with experience.', 'He loves sweet fruits and juicy vegetables.', 21201, 'Baltimore', '4600 Green Gate Lane', 'http://shallow.codes/images_CR11/pet_28.jpg'),
(240, 'Isabelle', 'Pony', 'large', 15, 'Very loving and beautiful pony mare.', 'Doesn\'t get along very well with other ponies.', 74801, 'Shawnee', '900 Ottis Street', 'http://shallow.codes/images_CR11/pet_29.jpg'),
(241, 'Murdoc', 'Chameleon', 'small', 4, 'Only for people with a lot of experience with terrariums.', 'Likes to climb very much and all day long. Needs a humid environment and a lot of fresh air from outside.', 47408, 'Bloomington', '3838 Conaway Street', 'http://shallow.codes/images_CR11/pet_30.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`, `status`) VALUES
(1, 'user', 'user', '8711bf081a382ea58265bd3612bf725d05cb0feea56651fb37ff056b43433011', '1970-01-01', 'user@mail.com', 'avatar.png', 'user'),
(2, 'admin', 'admin', '8b05cad6b8cd56e16531ee8f7ba87e7050cd6441c00330ab36fa6aa43f0cc948', '1970-01-01', 'admin@mail.com', 'avatar.png', 'adm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userId` (`fk_userId`),
  ADD KEY `fk_petId` (`fk_petId`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD CONSTRAINT `adoptions_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `adoptions_ibfk_2` FOREIGN KEY (`fk_petId`) REFERENCES `pets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
