-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2021 at 10:44 AM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be_team7_mealplanner`
--
CREATE DATABASE IF NOT EXISTS `be_team7_mealplanner` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `be_team7_mealplanner`;

-- --------------------------------------------------------

--
-- Table structure for table `allergen`
--

CREATE TABLE `allergen` (
  `pk_allergenid` int(11) NOT NULL,
  `allergen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `allergen`
--

INSERT INTO `allergen` (`pk_allergenid`, `allergen`) VALUES
(1, 'Balsam of Peru'),
(2, 'Buckwheat'),
(3, 'Celery'),
(4, 'Egg'),
(5, 'Fish'),
(6, 'Fruit'),
(7, 'Garlic'),
(8, 'Oats'),
(9, 'Maize'),
(10, 'Milk'),
(11, 'Mustard'),
(12, 'Peanut'),
(13, 'Poultry Meat'),
(14, 'Red Meat'),
(15, 'Rice'),
(16, 'Sesame'),
(17, 'Shellfish'),
(18, 'Soy'),
(19, 'Sulfites'),
(20, 'Tartrazine'),
(21, 'Tree nut'),
(22, 'Wheat');

-- --------------------------------------------------------

--
-- Table structure for table `foodgroups`
--

CREATE TABLE `foodgroups` (
  `pk_foodgroup` int(11) NOT NULL,
  `foodgroup` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodgroups`
--

INSERT INTO `foodgroups` (`pk_foodgroup`, `foodgroup`) VALUES
(1, 'Dairy'),
(2, 'Vegetables'),
(3, 'Fruits'),
(4, 'Baking & Grains'),
(5, 'Added Sweeteners'),
(6, 'Spicers'),
(7, 'Meats'),
(8, 'Fish'),
(9, 'Seafood'),
(10, 'Condiments'),
(11, 'Oils'),
(12, 'Seasonings'),
(13, 'Sauces'),
(14, 'Legumes'),
(15, 'Alcohol'),
(16, 'Soup'),
(17, 'Nuts'),
(18, 'Dairy Alternatives'),
(19, 'Desserts & Snacks'),
(20, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `pk_ingredientsid` int(11) NOT NULL,
  `fk_allergenid` int(11) NOT NULL,
  `fk_nutrient` int(11) NOT NULL,
  `fk_foodgroup` int(11) NOT NULL,
  `ingredient_name` varchar(50) NOT NULL,
  `calories_per_unit` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`pk_ingredientsid`, `fk_allergenid`, `fk_nutrient`, `fk_foodgroup`, `ingredient_name`, `calories_per_unit`, `unit`) VALUES
(1, 10, 3, 1, 'Butter', 717, '100 grams'),
(2, 4, 8, 1, 'Eggs', 72, '1 large'),
(3, 10, 23, 1, 'Milk', 103, '1 cup'),
(4, 10, 15, 1, 'Parmesan', 22, '1 tbsp'),
(5, 10, 16, 1, 'Cheddar', 113, '1 slice'),
(6, 10, 21, 1, 'American cheese', 104, '1 slice'),
(7, 10, 19, 1, 'Sour cream', 23, '1 tbsp'),
(8, 10, 21, 1, 'Cream cheese', 291, '1 package'),
(9, 10, 16, 1, 'Mozzarella', 78, '1 slice'),
(10, 10, 18, 1, 'Yogurt', 100, '1 container'),
(11, 10, 18, 1, 'Cream', 19, '1 tbsp'),
(12, 10, 16, 1, 'Evaporated milk', 169, '0.5 cup'),
(13, 10, 16, 1, 'Whipped cream', 345, '100 grams'),
(14, 10, 21, 1, 'Half and half', 19, '1 tbsp'),
(15, 10, 10, 1, 'Feta', 396, '1 cup'),
(16, 10, 21, 1, 'Monterey jack cheese', 493, '1 cup'),
(17, 10, 21, 1, 'Condensed milk', 982, '1 cup'),
(18, 10, 18, 1, 'Cottage cheese', 222, '1 cup'),
(19, 7, 14, 2, 'Onions', 44, '1 medium'),
(20, 7, 14, 2, 'Garlic', 42, '1 cup'),
(21, 19, 17, 2, 'Tomatos', 18, '100 grams'),
(22, 20, 14, 2, 'Lettuce', 15, '100 grams'),
(23, 8, 17, 2, 'Potatos', 77, '100 grams'),
(24, 3, 17, 2, 'Carrots', 41, '100 grams'),
(25, 19, 17, 2, 'Bell peppers', 31, '100 grams'),
(26, 20, 14, 2, 'Basil', 22, '100 grams'),
(27, 19, 14, 2, 'Parsley', 36, '100 grams'),
(28, 19, 14, 2, 'Broccoli', 34, '100 grams'),
(29, 18, 10, 2, 'Corn', 96, '100 grams'),
(30, 3, 14, 2, 'Spinach', 23, '100 grams'),
(31, 20, 11, 2, 'Mushrooms', 22, '100 grams'),
(32, 18, 13, 2, 'Green beans', 31, '100 grams'),
(33, 19, 14, 2, 'Ginger', 80, '100 grams'),
(34, 20, 17, 2, 'Chili peppers', 40, '100 grams'),
(35, 3, 14, 2, 'Celery', 15, '110 grams'),
(36, 6, 22, 3, 'Lemons', 17, '100 grams'),
(37, 6, 17, 3, 'Apples', 95, '1 medium'),
(38, 6, 13, 3, 'Bananas', 105, '1 medium'),
(39, 6, 17, 3, 'Lemons', 24, '1 fruit'),
(40, 6, 22, 3, 'Strawberries', 33, '100 grams'),
(41, 6, 17, 3, 'Oranges', 87, '1 large'),
(42, 6, 22, 3, 'Pineapples', 452, '1 fruit'),
(43, 6, 22, 3, 'Blueberries', 85, '1 cup'),
(44, 6, 17, 3, 'Raisin', 299, '100 grams'),
(45, 6, 13, 3, 'Coconut', 1405, '1 medium'),
(46, 6, 17, 3, 'Grapes', 62, '1 cup'),
(47, 6, 22, 3, 'Peaches', 37, '1 fruit'),
(48, 6, 17, 3, 'Raspberries', 53, '100 grams'),
(49, 6, 22, 3, 'Cranberries', 85, '1/4 cup'),
(50, 6, 22, 3, 'Mango', 201, '1 fruit'),
(51, 6, 17, 3, 'Pears', 102, '1 medium'),
(52, 6, 22, 3, 'Blackberries', 43, '100 grams'),
(53, 6, 22, 3, 'Cherries', 50, '100 grams'),
(54, 6, 22, 3, 'Dates', 414, '1 cup'),
(55, 6, 22, 3, 'Watermelon', 30, '100 grams'),
(56, 6, 22, 3, 'Berries', 85, '1 cup'),
(57, 6, 17, 3, 'Kiwis', 61, '100 grams'),
(58, 6, 17, 3, 'Grapefruit', 61, '100 grams'),
(59, 6, 22, 3, 'Mandarins', 47, '1 medium'),
(60, 6, 22, 3, 'Craisins', 85, '1/4 cup'),
(61, 6, 17, 3, 'Cantaloupe', 186, '1 medium'),
(62, 6, 22, 3, 'Plums', 76, '1 cup'),
(63, 15, 14, 4, 'Rice', 130, '100 grams'),
(64, 22, 14, 4, 'Pasta', 131, '100 grams'),
(65, 22, 1, 4, 'Flour', 364, '100 grams'),
(66, 22, 1, 4, 'Bread', 265, '100 grams'),
(67, 22, 1, 4, 'Baking Powder', 53, '100 grams'),
(68, 22, 1, 4, 'Bread Crumbs', 395, '100 grams'),
(69, 9, 1, 4, 'Cornstarch', 381, '100 grams'),
(70, 22, 1, 4, 'Rolled Oats', 379, '100 grams'),
(71, 22, 14, 4, 'Noodles', 138, '100 grams'),
(72, 22, 1, 4, 'Flour Tortillas', 310, '100 grams'),
(73, 22, 1, 4, 'Pancake Mix', 227, '100 grams'),
(74, 22, 1, 4, 'Yeast', 105, '100 grams'),
(75, 22, 1, 4, 'Cracker', 504, '100 grams'),
(76, 18, 13, 4, 'Quinoa', 222, '1 cup'),
(77, 15, 14, 4, 'Brown Rice', 111, '100 grams'),
(78, 22, 1, 4, 'Cornmeal', 370, '100 grams'),
(79, 22, 1, 4, 'Self Rising Flour', 110, '1/4 cup'),
(80, 22, 1, 4, 'Cake Mix', 372, '100 grams'),
(81, 22, 1, 4, 'Saltines', 421, '100 grams'),
(82, 9, 1, 4, 'Popcorn', 421, '100 grams'),
(83, 22, 1, 4, 'Macaroni Cheese Mix', 417, '100 grams'),
(84, 9, 1, 4, 'Corn Tortillas', 218, '100 grams'),
(85, 22, 1, 4, 'Ramen', 436, '100 grams'),
(86, 22, 1, 4, 'Cereals', 379, '100 grams'),
(87, 22, 1, 4, 'Biscuits', 353, '100 grams'),
(88, 22, 1, 4, 'Stuffing Mix', 386, '100 grams'),
(89, 22, 1, 4, 'Couscous', 112, '100 grams'),
(90, 6, 1, 5, 'Sugar', 387, '100 grams'),
(91, 6, 1, 5, 'Brown Sugar', 380, '100 grams'),
(92, 19, 1, 5, 'Honey', 304, '100 grams'),
(93, 6, 1, 5, 'Confectioners Sugar', 389, '100 grams'),
(94, 6, 1, 5, 'Maple Sirup', 260, '100 grams'),
(95, 6, 1, 5, 'Corn Sirup', 286, '100 grams'),
(96, 6, 1, 5, 'Molasses', 290, '100 grams'),
(97, 6, 1, 5, 'Artificial Sweeteners', 347, '100 grams'),
(98, 6, 14, 5, 'Agave Nectar', 310, '100 grams'),
(99, 3, 22, 6, 'Cinnamon', 247, '100 grams'),
(100, 3, 22, 6, 'Vanilla', 288, '100 grams'),
(101, 7, 22, 6, 'Garlic Powder', 331, '100 grams'),
(102, 2, 17, 6, 'Paprika Powder', 282, '100 grams'),
(103, 3, 22, 6, 'Oregano', 6, '1 tbsp'),
(104, 2, 17, 6, 'Chili Powder', 282, '100 grams'),
(105, 2, 17, 6, 'Red Pepper Flakes', 14, '1 tbsp'),
(106, 3, 22, 6, 'Cumin', 375, '100 grams'),
(107, 2, 17, 6, 'Cayenne', 318, '100 grams'),
(108, 3, 22, 6, 'Italian Seasoning', 15, '1 tbsp'),
(109, 3, 22, 6, 'Thyme', 101, '100 grams'),
(110, 7, 23, 6, 'Onion Powder', 342, '100 grams'),
(111, 12, 11, 6, 'Nutmeg', 525, '100 grams'),
(112, 12, 11, 6, 'Ground Nutmeg', 525, '100 grams'),
(113, 2, 17, 6, 'Curry Powder', 325, '100 grams'),
(114, 20, 14, 6, 'Bay Leaf', 314, '100 grams'),
(115, 2, 17, 6, 'Taco Seasoning', 8, '1 tbsp'),
(116, 20, 14, 6, 'Sage', 6, '1 tbsp'),
(117, 13, 2, 7, 'Chicken Breast', 165, '100 grams'),
(118, 14, 24, 7, 'Ground Beef', 332, '100 grams'),
(119, 14, 3, 7, 'Bacon', 541, '100 grams'),
(120, 14, 11, 7, 'Sausage', 346, '100 grams'),
(121, 14, 20, 7, 'Beef Steak', 134, '100 grams'),
(122, 14, 10, 7, 'Ham', 145, '100 grams'),
(123, 14, 12, 7, 'Hot Dog', 290, '100 grams'),
(124, 14, 24, 7, 'Pork Chops', 231, '100 grams'),
(125, 13, 19, 7, 'Chicken Tighs', 177, '100 grams'),
(126, 13, 19, 7, 'Ground Turkey', 203, '100 grams'),
(127, 13, 20, 7, 'Cooked Chicken', 239, '100 grams'),
(128, 13, 19, 7, 'Turkey', 189, '100 grams'),
(129, 14, 19, 7, 'Pork', 242, '100 grams'),
(130, 2, 17, 7, 'Pepperoni', 494, '100 grams'),
(131, 13, 19, 7, 'Whole Chicken', 1429, '1 chicken'),
(132, 13, 20, 7, 'Chicken Leg', 172, '100 grams'),
(133, 14, 10, 7, 'Ground Pork', 241, '100 grams'),
(134, 14, 11, 7, 'Chorizo', 455, '100 grams'),
(135, 13, 24, 7, 'Chicken Wings', 203, '100 grams'),
(136, 14, 19, 7, 'Beef Roast', 170, '100 grams'),
(137, 14, 15, 7, 'Polish Sausage', 226, '100 grams'),
(138, 14, 10, 7, 'Salami', 336, '100 grams'),
(139, 14, 20, 7, 'Pork Roast', 242, '100 grams'),
(140, 13, 24, 7, 'Ground Chicken', 161, '85 grams'),
(141, 5, 2, 8, 'Canned Tuna', 191, '1 can'),
(142, 5, 6, 8, 'Salmon', 208, '100 grams'),
(143, 5, 2, 8, 'Tilapia', 129, '100 grams'),
(144, 5, 6, 8, 'Fish Fillets', 232, '100 grams'),
(145, 5, 13, 8, 'Cod', 82, '100 grams'),
(146, 5, 2, 8, 'Canned Salmon', 428, '1 can'),
(147, 5, 6, 8, 'Anchovy', 210, '100 grams'),
(148, 5, 2, 8, 'Smoked Salmon', 117, '100 grams'),
(149, 5, 13, 8, 'Sardines', 191, '1 can'),
(150, 5, 2, 8, 'Tuna Steak', 132, '100 grams'),
(151, 17, 6, 8, 'Whitefish', 172, '100 grams'),
(152, 17, 2, 8, 'Halibut', 448, '1 fillet'),
(153, 5, 13, 8, 'Trout', 141, '100 grams'),
(154, 5, 2, 8, 'Haddock', 168, '1 fillet'),
(155, 17, 13, 8, 'Flounder', 70, '100 grams'),
(156, 5, 6, 8, 'Catfish', 105, '100 grams'),
(157, 5, 13, 8, 'Mahi Mahi', 85, '100 grams'),
(158, 5, 13, 8, 'Mackerel', 305, '100 grams'),
(159, 5, 6, 8, 'Sole', 148, '1 fillet'),
(160, 17, 2, 8, 'Sea Bass', 124, '100 grams'),
(161, 17, 6, 8, 'Red Snapper', 218, '1 fillet'),
(162, 17, 13, 8, 'Swordfish', 172, '100 grams'),
(163, 5, 2, 9, 'Shrimps', 99, '100 grams'),
(164, 5, 2, 9, 'Crabs', 97, '100 grams'),
(165, 5, 2, 9, 'Prawns', 99, '100 grams'),
(166, 5, 2, 9, 'Scallops', 13, '1 large'),
(167, 5, 2, 9, 'Clams', 14, '1 small'),
(168, 5, 2, 9, 'Lobster', 83, '85 grams'),
(169, 5, 15, 9, 'Mussels', 172, '100 grams'),
(170, 5, 15, 9, 'Oysters', 199, '100 grams'),
(171, 5, 6, 9, 'Squids', 175, '100 grams'),
(172, 5, 6, 9, 'Calamari', 175, '100 grams'),
(173, 5, 2, 9, 'Crawfish', 138, '100 grams'),
(174, 5, 2, 9, 'Octopus', 164, '100 grams'),
(175, 5, 6, 9, 'Cockle', 79, '100 grams'),
(176, 5, 2, 9, 'Conch', 165, '1 cup'),
(177, 5, 13, 9, 'Sea Urchin', 120, '100 grams'),
(178, 4, 3, 10, 'Mayonnaise', 680, '100 grams'),
(179, 19, 5, 10, 'Ketchup', 112, '100 grams'),
(180, 11, 9, 10, 'Mustard', 66, '100 grams'),
(181, 19, 14, 10, 'Vinegar', 18, '100 grams'),
(182, 18, 9, 10, 'Soy Sauce', 53, '100 grams'),
(183, 19, 14, 10, 'Balsamic Vinegar', 88, '100 grams'),
(184, 18, 24, 10, 'Worcestershire Sauce', 78, '100 grams'),
(185, 1, 5, 10, 'Hot Sauce', 11, '100 grams'),
(186, 3, 5, 10, 'Barbecue Sauce', 172, '100 grams'),
(187, 10, 3, 10, 'Ranch Dressing', 484, '100 grams'),
(188, 19, 14, 10, 'Wine Vinegar', 45, '1 cup'),
(189, 6, 22, 10, 'Apple Cider Vinegar', 22, '100 grams'),
(190, 19, 14, 10, 'Cider Vinegar', 22, '100 grams'),
(191, 3, 5, 10, 'Italian Dressing', 240, '100 grams'),
(192, 15, 22, 10, 'Rice Vinegar', 5, '1 tbsp'),
(193, 3, 5, 10, 'Salad Dressing', 457, '100 grams'),
(194, 3, 5, 10, 'Tabasco', 12, '100 grams'),
(195, 5, 11, 10, 'Fish Sauce', 35, '100 grams'),
(196, 18, 21, 10, 'Teriyaki Sauce', 89, '100 grams'),
(197, 18, 5, 10, 'Steak Sauce', 95, '100 grams'),
(198, 16, 9, 10, 'Tahini', 595, '100 grams'),
(199, 3, 2, 11, 'Olive Oil', 884, '100 grams'),
(200, 3, 2, 11, 'Vegetable Oil', 871, '100 grams'),
(201, 3, 2, 11, 'Cooking Spray', 792, '100 grams'),
(202, 3, 2, 11, 'Canola Oil', 889, '100 grams'),
(203, 21, 2, 11, 'Shortening', 883, '100 grams'),
(204, 16, 2, 11, 'Sesame Oil', 854, '100 grams'),
(205, 21, 2, 11, 'Coconut Oil', 862, '100 grams'),
(206, 12, 2, 11, 'Peanut Oil', 838, '100 grams'),
(207, 21, 2, 11, 'Sunflower Oil', 808, '100 grams'),
(208, 14, 2, 11, 'Lard', 898, '100 grams'),
(209, 6, 2, 11, 'Grape Seed Oil', 884, 'grams'),
(210, 22, 2, 11, 'Corn Oil', 900, '100 grams'),
(211, 21, 2, 11, 'Almond Oil', 884, '100 grams'),
(212, 6, 2, 11, 'Avocado Oil', 879, '100 grams'),
(213, 20, 2, 11, 'Safflower Oil', 869, '100 grams'),
(214, 21, 2, 11, 'Walnut Oil', 893, '100 grams'),
(215, 12, 2, 11, 'Hazelnut Oil', 894, '100 grams'),
(216, 21, 2, 11, 'Palm', 901, '100 grams'),
(217, 18, 2, 11, 'Soybean Oil', 821, '100 grams'),
(218, 11, 2, 11, 'Mustard Oil', 877, '100 grams'),
(219, 20, 2, 11, 'Pistachio Oil', 790, '100 grams'),
(220, 18, 2, 11, 'Soya Oil', 899, '100 grams'),
(221, 14, 10, 12, 'Bouillon', 267, '100 grams'),
(222, 3, 14, 12, 'Ground Ginger', 100, '100 grams'),
(223, 16, 9, 12, 'Sesame Seeds', 573, '100 grams'),
(224, 10, 3, 12, 'Cream of Tartar', 258, '100 grams'),
(225, 3, 5, 12, 'Chili Sauce', 11, '100 grams'),
(226, 18, 11, 12, 'Soy Sauce', 53, '100 grams'),
(227, 6, 22, 12, 'Apple Cider', 22, '100 grams'),
(228, 3, 1, 12, 'Hoisin Sauce', 220, '100 grams'),
(229, 3, 23, 12, 'Liquid Smoke', 44, '100 ml'),
(230, 15, 11, 12, 'Rice Wine (Sake)', 134, '100 grams'),
(231, 3, 14, 12, 'Vegetable Bouillon', 147, '25 grams'),
(232, 20, 9, 12, 'Poppy Seeds', 525, '100 grams'),
(233, 1, 21, 12, 'Balsamic Glaze', 88, '100 grams'),
(234, 18, 21, 12, 'Miso', 199, '100 grams'),
(235, 12, 9, 12, 'Wasabi', 480, '1 cup'),
(236, 5, 21, 12, 'Fish Stock', 37, '1 cup'),
(237, 19, 17, 12, 'Rose Water', 3, '100 ml'),
(238, 19, 21, 12, 'Pickling Salt', 1, '1 tbsp'),
(239, 6, 22, 12, 'Champagne Vinegar', 34, '100 grams'),
(240, 14, 21, 12, 'BBQ Rub', 960, '100 grams'),
(241, 6, 17, 13, 'Tomato Sauce', 29, '100 grams'),
(242, 6, 17, 13, 'Tomato Paste', 82, '100 grams'),
(243, 6, 17, 13, 'Salsa', 36, '100 grams'),
(244, 7, 3, 13, 'Pesto', 230, '1/4 cup'),
(245, 4, 3, 13, 'Alfredo Sauce', 535, '100 grams'),
(246, 14, 19, 13, 'Beef Gravy', 25, '1/4 cup'),
(247, 19, 22, 13, 'Curry Paste', 109, '100 grams'),
(248, 13, 20, 13, 'Chicken Gravy', 40, '1/4 cup'),
(249, 6, 22, 13, 'Cranberry Sauce', 151, '100 grams'),
(250, 13, 19, 13, 'Turkey Gravy', 121, '1 cup'),
(251, 20, 24, 13, 'Mushroom Gravy', 50, '100 grams'),
(252, 14, 20, 13, 'Sausage Gravy', 119, '100 grams'),
(253, 7, 23, 13, 'Onion Gravy', 322, '100 grams'),
(254, 10, 2, 13, 'Cream Gravy', 450, '1 container'),
(255, 14, 10, 13, 'Pork Gravy', 180, '1 cup'),
(256, 3, 5, 13, 'Tomato Gravy', 396, '1 big cup'),
(257, 13, 19, 13, 'Giblet Gravy', 35, '1/4 cup'),
(258, 12, 9, 14, 'Tofu', 76, '100 grams'),
(259, 18, 14, 14, 'Green Beans', 31, '100 grams'),
(260, 3, 9, 14, 'Peas', 81, '100 grams'),
(261, 18, 14, 14, 'Black Beans', 109, '1/2 cup'),
(262, 12, 9, 14, 'Chickpea', 364, '100 grams'),
(263, 3, 9, 14, 'Lentils', 116, '100 grams'),
(264, 18, 14, 14, 'Refried Beans', 92, '100 grams'),
(265, 12, 9, 14, 'Hummus', 166, '100 grams'),
(266, 3, 5, 14, 'Chili Beans', 112, '100 grams'),
(267, 18, 14, 14, 'Lima Beans', 115, '100 grams'),
(268, 12, 13, 14, 'Kidney Beans', 333, '100 grams'),
(269, 12, 13, 14, 'Pinto Beans', 347, '100 grams'),
(270, 18, 14, 14, 'Edamame', 122, '100 grams'),
(271, 3, 9, 14, 'Split Peas', 341, '100 grams'),
(272, 3, 9, 14, 'Snap Peas', 27, '1 cup'),
(273, 18, 9, 14, 'Soybeans', 173, '100 grams'),
(274, 18, 14, 14, 'Cannellini Beans', 225, '1 cup'),
(275, 18, 14, 14, 'Navy Beans', 67, '100 grams'),
(276, 3, 8, 14, 'French Beans', 31, '100 grams'),
(277, 18, 14, 14, 'Red Beans', 142, '100 grams'),
(278, 18, 23, 14, 'Great Northern Beans', 67, '100 grams'),
(279, 3, 9, 14, 'Fava Beans', 88, '100 grams'),
(280, 12, 3, 17, 'Peanut Butter', 588, '100 grams'),
(281, 12, 12, 17, 'Almond', 164, '1 cup'),
(282, 12, 19, 17, 'Walnut', 654, '100 grams'),
(283, 12, 12, 17, 'Pecan', 690, '100 grams'),
(284, 12, 13, 17, 'Peanuts', 567, '100 grams'),
(285, 12, 12, 17, 'Cashews', 553, '100 grams'),
(286, 12, 19, 17, 'Flax', 534, '100 grams'),
(287, 12, 3, 17, 'Pine Nut', 673, '100 grams'),
(288, 12, 3, 17, 'Pistachios', 562, '100 grams'),
(289, 12, 12, 17, 'Almond Meal', 658, '1 cup'),
(290, 12, 3, 17, 'Hazelnut', 628, '100 grams'),
(291, 12, 3, 17, 'Macadamia', 718, '100 grams'),
(292, 12, 12, 17, 'Almond Paste', 520, '112 grams'),
(293, 12, 19, 17, 'Chestnut', 131, '100 grams'),
(294, 12, 3, 17, 'Pecan Pralines', 776, '1 container'),
(295, 21, 19, 17, 'Macaroons', 404, '100 grams'),
(296, 3, 3, 18, 'Margarine', 717, '100 grams'),
(297, 6, 22, 18, 'Coconut Milk', 230, '100 grams'),
(298, 12, 3, 18, 'Almond Milk', 230, '100 grams'),
(299, 18, 9, 18, 'Soy Milk', 54, '100 grams'),
(300, 15, 22, 18, 'Rice Milk', 47, '100 grams'),
(301, 20, 12, 18, 'Hemp Milk', 83, '240 ml'),
(302, 4, 2, 18, 'Non Dairy Creamer', 140, '105 grams'),
(303, 10, 1, 19, 'Chocolate', 535, '100 grams'),
(304, 6, 22, 19, 'Apple Sauce', 68, '100 grams'),
(305, 6, 22, 19, 'Strawberry Jam', 278, '100 grams'),
(306, 22, 1, 19, 'Graham Cracker', 423, '100 grams'),
(307, 20, 1, 19, 'Marshmallow', 318, '100 grams'),
(308, 10, 1, 19, 'Chocolate Syrup', 45, '1 tbsp'),
(309, 21, 22, 19, 'Potato Chips', 536, '100 grams'),
(310, 12, 1, 19, 'Nutella', 541, '100 grams'),
(311, 21, 1, 19, 'Chocolate Morsels', 1701, '1 package'),
(312, 10, 1, 19, 'Bittersweet Chocolate', 510, '100 grams'),
(313, 10, 1, 19, 'Pudding Mix', 373, '99 grams'),
(314, 6, 22, 19, 'Raspberry Jam', 56, '20 grams'),
(315, 21, 1, 19, 'Dark Chocolate', 480, '100 grams'),
(316, 10, 1, 19, 'Chocolate Chips', 202, '1/2 cup'),
(317, 6, 1, 19, 'Jam', 278, '100 grams'),
(318, 10, 1, 19, 'White Chocolate', 557, '100 grams'),
(319, 10, 1, 19, 'Ice Cream', 207, '100 grams'),
(320, 10, 3, 1, 'Swiss Cheese', 370, '100 grams'),
(321, 10, 3, 1, 'Velveeta', 80, '1 slice'),
(322, 10, 3, 1, 'Frosting', 418, '100 grams'),
(323, 10, 2, 1, 'Buttermilk', 40, '100 grams'),
(324, 10, 3, 1, 'Ricotta', 174, '100 grams'),
(325, 10, 2, 1, 'Goat Cheese', 364, '100 grams'),
(326, 10, 3, 1, 'Provolone', 352, '100 grams'),
(327, 10, 3, 1, 'Blue Cheese', 353, '100 grams'),
(328, 10, 2, 1, 'Powdered Milk', 496, '100 grams'),
(329, 10, 3, 1, 'Colby Cheese', 394, '100 grams'),
(330, 10, 3, 1, 'Pepper Jack', 373, '100 grams'),
(331, 10, 3, 1, 'Italian Cheese', 466, '100 grams'),
(332, 10, 3, 1, 'Soft Cheese', 342, '100 grams'),
(333, 10, 3, 1, 'Gouda', 356, '100 grams'),
(334, 10, 3, 1, 'Romano', 387, '100 grams'),
(335, 10, 3, 1, 'Brie', 334, '100 grams'),
(336, 10, 3, 1, 'Pizza Cheese', 321, '100 grams'),
(337, 10, 3, 1, 'Ghee', 900, '100 grams'),
(338, 10, 2, 1, 'Creme fraiche', 393, '100 grams'),
(339, 10, 2, 1, 'Cheese Soup', 81, '100 grams'),
(340, 10, 3, 1, 'Gruyere', 413, '100 grams'),
(341, 10, 3, 1, 'Pecorino Cheese', 400, '100 grams'),
(342, 10, 2, 1, 'Custard', 122, '100 grams'),
(343, 10, 3, 1, 'Muenster Cheese', 368, '100 grams'),
(344, 10, 3, 1, 'Queso Fresco', 310, '100 grams'),
(345, 10, 3, 1, 'Hard Cheese', 321, '100 grams'),
(346, 10, 3, 1, 'Havarti Cheese', 368, '100 grams'),
(347, 10, 3, 1, 'Asiago Cheese', 464, '100 grams'),
(348, 10, 3, 1, 'Mascarpone', 437, '100 grams'),
(349, 10, 2, 1, 'Neufchatel', 253, '100 grams'),
(350, 10, 2, 1, 'Halloumi', 237, '75 grams'),
(351, 10, 2, 1, 'Paneer Cheese', 221, '90 grams'),
(352, 10, 3, 1, 'Brick Cheese', 371, '100 grams'),
(353, 10, 3, 1, 'Camembert Cheese', 299, '100 grams'),
(354, 10, 2, 1, 'Goat Milk', 69, '100 grams'),
(355, 10, 3, 1, 'Garlic Herb Cheese', 466, '100 grams'),
(356, 10, 3, 1, 'Edam Cheese', 357, '100 grams'),
(357, 10, 3, 1, 'Manchego', 400, '100 grams'),
(358, 10, 3, 1, 'Fontina', 389, '100 grams'),
(359, 10, 3, 1, 'Stilton Cheese', 400, '100 grams'),
(360, 10, 3, 1, 'Emmental Cheese', 388, '100 grams'),
(361, 10, 3, 1, 'Red Leicester', 403, '100 grams'),
(362, 10, 3, 1, 'Jarlsberg Cheese', 352, '100 grams'),
(363, 10, 2, 1, 'Bocconcini', 211, '100 grams'),
(364, 10, 2, 1, 'Farmers Cheese', 179, '100 grams'),
(365, 10, 2, 1, 'Creme de Cassis', 251, '100 grams'),
(366, 10, 3, 1, 'Wensleydale Cheese', 388, '100 grams'),
(367, 10, 3, 1, 'Longhorn Cheese', 394, '100 grams'),
(368, 10, 3, 1, 'Double Gloucester', 393, '100 grams'),
(369, 10, 3, 1, 'Raclette Cheese', 352, '100 grams'),
(370, 10, 3, 1, 'Lancashire Cheese', 343, '90 grams'),
(371, 10, 3, 1, 'Cheshire Cheese', 387, '100 grams'),
(372, 3, 14, 2, 'Rosemary', 53, '40 grams'),
(373, 3, 8, 2, 'Salad Green', 23, '100 grams'),
(374, 7, 17, 2, 'Red Onion', 41, '94 grams'),
(375, 3, 21, 2, 'Cucumber', 10, '99 grams'),
(376, 3, 22, 2, 'Sweet Potatos', 17, '100 grams'),
(377, 0, 14, 2, 'Pickles', 11, '100 grams'),
(378, 0, 17, 2, 'Avocado', 160, '100 grams'),
(379, 0, 14, 2, 'Zucchini', 17, '100 grams'),
(380, 0, 8, 2, 'Cilantro', 4, '16 grams'),
(381, 0, 14, 2, 'Frozen Vegetables', 60, '100 grams'),
(382, 0, 17, 2, 'Olives', 110, '95 grams'),
(383, 0, 14, 2, 'Asparagus', 20, '100 grams'),
(384, 0, 17, 2, 'Cabbage', 25, '100 grams'),
(385, 0, 21, 2, 'Cauliflower', 25, '100 grams'),
(386, 0, 14, 2, 'Dill', 43, '100 grams'),
(387, 0, 8, 2, 'Kale', 49, '100 grams'),
(388, 0, 17, 2, 'Mixed Vegetables', 45, '1 cup'),
(389, 0, 5, 2, 'Pumpkin', 26, '100 grams'),
(390, 0, 14, 2, 'Squash', 18, '100 grams'),
(391, 0, 8, 2, 'Mint Leaves', 10, '22 grams'),
(392, 7, 17, 2, 'Scallions', 32, '100 grams'),
(393, 0, 17, 2, 'Sun dried Tomatos', 213, '100 grams'),
(394, 7, 17, 2, 'Shallot', 72, '100 grams'),
(395, 0, 17, 2, 'Eggplant', 25, '100 grams'),
(396, 0, 17, 2, 'Beet Root', 43, '100 grams'),
(397, 0, 5, 2, 'Butternut Squash', 45, '100 grams'),
(398, 0, 17, 2, 'Horseradish', 48, '100 grams'),
(399, 7, 21, 2, 'Leeks', 61, '100 grams'),
(400, 0, 22, 2, 'Capers', 23, '100 grams'),
(401, 0, 8, 2, 'Brussels Sprouts', 43, '100 grams'),
(402, 0, 22, 2, 'Artichoke Heart', 56, '108 grams'),
(403, 0, 22, 2, 'Chia Seeds', 486, '100 grams'),
(404, 0, 17, 2, 'Radish', 16, '100 grams'),
(405, 0, 23, 2, 'Sauerkraut', 19, '100 grams'),
(406, 0, 8, 2, 'Artichoke', 47, '100 grams'),
(407, 0, 22, 2, 'Portobello Mushroom', 22, '100 grams'),
(408, 0, 5, 2, 'Sweet Peppers', 16, '100 grams'),
(409, 0, 8, 2, 'Arugula', 25, '100 grams'),
(410, 0, 5, 2, 'Spaghetti Squash', 31, '100 grams'),
(411, 0, 5, 2, 'Capsicum', 25, '100 grams'),
(412, 0, 14, 2, 'Bok Choy', 13, '100 grams'),
(413, 0, 17, 2, 'Parsnip', 75, '100 grams'),
(414, 0, 8, 2, 'Okra', 33, '100 grams'),
(415, 0, 22, 2, 'Yam', 118, '100 grams'),
(416, 0, 8, 2, 'Fennel', 31, '100 grams'),
(417, 0, 17, 2, 'Turnip', 28, '100 grams'),
(418, 0, 9, 2, 'Snow Peas', 33, '80 grams'),
(419, 0, 14, 2, 'Bean Sprouts', 23, '100 grams'),
(420, 0, 8, 2, 'Seaweed', 306, '100 grams'),
(421, 0, 14, 2, 'Chard', 35, '175 grams'),
(422, 0, 8, 2, 'Collard', 32, '100 grams'),
(423, 0, 5, 2, 'Canned Tomato', 32, '100 grams'),
(424, 0, 5, 2, 'Pimiento', 23, '100 grams'),
(425, 0, 14, 2, 'Watercress', 11, '100 grams'),
(426, 0, 5, 2, 'Tomatillos', 32, '100 grams'),
(427, 0, 8, 2, 'Rocket', 15, '100 grams'),
(428, 11, 22, 2, 'Mustard Greens', 27, '100 grams'),
(429, 0, 14, 2, 'Bamboo Shoot', 26, '100 grams'),
(430, 0, 8, 2, 'Rutabaga', 38, '100 grams'),
(431, 0, 22, 2, 'Endive', 17, '100 grams'),
(432, 0, 14, 2, 'Broccoli Rabe', 22, '100 grams'),
(433, 0, 22, 2, 'Jicama', 38, '100 grams'),
(434, 0, 8, 2, 'Kohlrabi', 27, '100 grams'),
(435, 0, 22, 2, 'Hearts of Palm', 115, '100 grams'),
(436, 0, 5, 2, 'Butternut', 45, '100 grams'),
(437, 3, 8, 2, 'Celery Root', 42, '155 grams'),
(438, 0, 22, 2, 'Daikon', 18, '100 grams'),
(439, 0, 22, 2, 'Radicchio', 23, '100 grams'),
(440, 0, 17, 2, 'Porcini', 130, '100 grams'),
(441, 0, 17, 2, 'Chinese Broccoli', 22, '100 grams'),
(442, 0, 17, 2, 'Jerusalem Artichoke', 73, '100 grams'),
(443, 0, 14, 2, 'Cress', 32, '100 grams'),
(444, 0, 22, 2, 'Water Chestnuts', 97, '100 grams'),
(445, 0, 17, 2, 'Dulse', 198, '80 grams'),
(446, 0, 8, 2, 'Micro Greens', 20, '100 grams'),
(447, 0, 17, 2, 'Burdock', 72, '100 grams'),
(448, 0, 8, 2, 'Chayote', 19, '100 grams'),
(449, 6, 5, 3, 'Apricots', 48, '100 grams'),
(450, 6, 17, 3, 'Clementines', 47, '100 grams'),
(451, 6, 18, 3, 'Prunes', 240, '100 grams'),
(452, 6, 22, 3, 'Apple Butter', 166, '100 grams'),
(453, 6, 22, 3, 'Pomegranate', 22, '100 grams'),
(454, 6, 17, 3, 'Nectarine', 44, '100 grams'),
(455, 6, 17, 3, 'Fig', 74, '100 grams'),
(456, 6, 22, 3, 'Tangerine', 53, '100 grams'),
(457, 6, 22, 3, 'Papaya', 39, '100 grams'),
(458, 6, 22, 3, 'Rhubarb', 21, '100 grams'),
(459, 6, 5, 3, 'Sultanas', 40, '100 grams'),
(460, 6, 22, 3, 'Plantain', 122, '100 grams'),
(461, 6, 18, 3, 'Currant', 283, '100 grams'),
(462, 6, 22, 3, 'Passion Fruit', 97, '100 grams'),
(463, 6, 22, 3, 'Guava', 68, '100 grams'),
(464, 6, 5, 3, 'Persimmons', 127, '100 grams'),
(465, 6, 22, 3, 'Lychee', 66, '100 grams'),
(466, 6, 17, 3, 'Lingonberries', 168, '300 grams'),
(467, 6, 22, 3, 'Tangelos', 46, '100 grams'),
(468, 6, 5, 3, 'Kumquat', 71, '100 grams'),
(469, 6, 17, 3, 'Boysenberries', 49, '100 grams'),
(470, 6, 22, 3, 'Star Fruit', 31, '100 grams'),
(471, 6, 22, 3, 'Quince', 57, '100 grams'),
(472, 6, 22, 3, 'Honeydew', 36, '100 grams'),
(473, 6, 22, 3, 'Crabapples', 76, '100 grams'),
(474, 0, 12, 20, 'Coffee', 0, '100 grams'),
(475, 6, 17, 20, 'Orange Juice', 45, '100 grams'),
(476, 0, 21, 20, 'Tea', 1, '100 grams'),
(477, 0, 14, 20, 'Green Tea', 2, '100 grams'),
(478, 6, 22, 20, 'Apple Juice', 46, '100 grams'),
(479, 0, 17, 20, 'Tomato Juice', 17, '100 grams'),
(480, 0, 21, 20, 'Coke', 59, '100 grams'),
(481, 10, 1, 20, 'Chocolate Milk', 83, '100 grams'),
(482, 6, 22, 20, 'Pineapple Juice', 60, '100 grams'),
(483, 6, 17, 20, 'Lemonade', 40, '100 grams'),
(484, 6, 17, 20, 'Cranberry Juice', 46, '100 grams'),
(485, 0, 12, 20, 'Espresso', 9, '100 grams'),
(486, 6, 17, 20, 'Fruit Juice', 54, '100 grams'),
(487, 6, 22, 20, 'Ginger Ale', 34, '100 grams'),
(488, 0, 0, 20, 'Club Soda', 0, '100 grams'),
(489, 0, 1, 20, 'Sprite', 39, '100 grams'),
(490, 0, 1, 20, 'Kool Aid', 36, '100 grams'),
(491, 6, 17, 20, 'Grenadine', 268, '100 grams'),
(492, 0, 21, 20, 'Margarita Mix', 92, '100 grams'),
(493, 6, 22, 20, 'Cherry Juice', 45, '100 grams'),
(494, 0, 21, 20, 'Pepsi', 53, '100 grams'),
(495, 0, 21, 20, 'Mountain Dew', 49, '100 grams'),
(496, 14, 8, 7, 'Pork Ribs', 286, '100 grams'),
(497, 14, 21, 7, 'Spam', 321, '100 grams'),
(498, 14, 12, 7, 'Venison', 158, '100 grams'),
(499, 14, 9, 7, 'Pork Shoulder', 269, '100 grams'),
(500, 14, 10, 7, 'Bologna', 247, '100 grams'),
(501, 14, 3, 7, 'Bratwurst', 297, '100 grams'),
(502, 14, 4, 7, 'Prosciutto', 145, '100 grams'),
(503, 14, 15, 7, 'Lamb', 294, '100 grams'),
(504, 14, 13, 7, 'Corned Beef', 251, '100 grams'),
(505, 13, 2, 7, 'Chicken Roast', 239, '100 grams'),
(507, 1, 7, 11, 'Rapeseed Oil', 800, '100g'),
(508, 1, 14, 2, 'Courgettes', 50, '100g'),
(509, 1, 20, 10, 'Lasagne Sheets', 50, '100g'),
(510, 1, 1, 6, 'Sea Salt', 5, '10G');

-- --------------------------------------------------------

--
-- Table structure for table `nutrient`
--

CREATE TABLE `nutrient` (
  `pk_nutrient` int(11) NOT NULL,
  `nutrient_name` varchar(30) NOT NULL,
  `contained` text NOT NULL,
  `functions` varchar(255) NOT NULL,
  `wiki` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nutrient`
--

INSERT INTO `nutrient` (`pk_nutrient`, `nutrient_name`, `contained`, `functions`, `wiki`) VALUES
(1, 'Complex carbohydrate', 'Wholemeal bread, wholegrain cereals, baked beans, pasta, potatoes, peas, other starchy vegetables', 'The most important carbohydrate is glucose, a simple sugar (monosaccharide) that is metabolized by nearly all known organisms. Glucose and other carbohydrates are part of a wide variety of metabolic pathways across species: plants synthesize carbohydrate.', 'https://en.wikipedia.org/wiki/Carbohydrate#Classification'),
(2, 'Protein', 'Lean meat, chicken, fish, cheese, milk, eggs, bread, nuts, legumes', 'Most microorganisms and plants can biosynthesize all 20 standard amino acids, while animals (including humans) must obtain some of the amino acids from the diet.[41] The amino acids that an organism cannot synthesize on its own are referred to acids.', 'https://en.wikipedia.org/wiki/Protein'),
(3, 'Fat', 'Oils, butter, margarine, cream, meat, cheese, pastry, biscuits, nuts', 'In humans and many animals, fats serve both as energy sources and as stores for energy in excess of what the body needs immediately. Each gram of fat when burned or metabolized releases about 9 food calories (37 kJ = 8.8 kcal). Fats are sources of acids.', 'https://en.wikipedia.org/wiki/Fat'),
(4, 'Preformed Vitamin A', 'Butter, margarine, cream, cheese, eggs, meat', 'In foods of animal origin, the major form of vitamin A is an ester, primarily retinyl palmitate, which is converted to retinol (chemically an alcohol) in the small intestine. The retinol form functions as a storage form of the vitamin, and can convert.', 'https://en.wikipedia.org/wiki/Vitamin_A'),
(5, 'Beta-carotene', 'Carrots, spinach, pumpkin, broccoli, tomatoes, apricots, rockmelon', 'Plant carotenoids are the primary dietary source of provitamin A worldwide, with β-carotene as the best-known provitamin A carotenoid. Others include α-carotene and β-cryptoxanthin. Carotenoid absorption is restricted to the duodenum of the small testine.', 'https://en.wikipedia.org/wiki/Beta-Carotene'),
(6, 'Vitamin D', 'Fatty/canned fish, butter, margarine, cream, cheese, eggs', 'Vitamin D from the diet, or from skin synthesis, is biologically inactive. It is activated by two protein enzyme hydroxylation steps, the first in the liver and the second in the kidneys.[3] As vitamin D can be synthesized in adequate amounts by mammals.', 'https://en.wikipedia.org/wiki/Vitamin_D'),
(7, 'Vitamin E', 'Polyunsaturated oils, polyunsaturated margarine, nuts, olive oil, fatty fish and small amounts in wholegrain cereals and green vegetables', 'Worldwide, government organizations recommend adults consume in the range of 7 to 15 mg per day. As of 2016, consumption was below recommendations according to a worldwide summary of more than one hundred studies that reported a median dietary intake.', 'https://en.wikipedia.org/wiki/Vitamin_E'),
(8, 'Vitamin K', 'Green vegetables, cheese, butter, pork, eggs', 'Vitamin K1 is made by plants, and is found in highest amounts in green leafy vegetables, because it is directly involved in photosynthesis. It is active as a vitamin in animals and performs the classic functions of vitamin K, including its activity.', 'https://en.wikipedia.org/wiki/Vitamin_K'),
(9, 'Thiamin', 'Wholegrain cereals, pork, bread, nuts, peas', 'Thiamine supplements are generally well tolerated. Allergic reactions, including anaphylaxis, may occur when repeated doses are given by injection. Thiamine is in the B complex family.[3] It is an essential micronutrient, which cannot be made in the body.', 'https://en.wikipedia.org/wiki/Thiamine'),
(10, 'Riboflavin', 'Milk, meat, eggs, cheese, wholegrain, cereals, nuts, mushrooms', 'A 2017 review found that riboflavin taken daily in amounts roughly 200 to 400 times the Recommended Dietary Allowance (RDA) may be useful to prevent migraines in adults, but found that clinical trials in adolescents and children had mixed outcomes.', 'https://en.wikipedia.org/wiki/Riboflavin'),
(11, 'Niacin', 'Fish, meat, peanuts, wholegrain cereals, nuts, mushrooms', 'Niacin is obtained in the diet from a variety of whole and processed foods, with highest contents in fortified packaged foods, meat, poultry, red fish such as tuna and salmon, lesser amounts in nuts, legumes and seeds. Niacin is used to treat pellagra.', 'https://en.wikipedia.org/wiki/Niacin'),
(12, 'Pantothenic acid', 'Eggs, wholegrain cereals, peanuts, fish, meat, vegetables', 'Food sources of pantothenic acid include animal-sourced foods, including dairy foods and eggs.[7][9] Potatoes, tomato products, oat-cereals, sunflower seeds, avocado and mushrooms are good plant sources. Whole grains are another source of the vitamin.', 'https://en.wikipedia.org/wiki/Pantothenic_acid'),
(13, 'Vitamin B6', 'Wholegrain cereals, meat, fish, peanuts, bananas', 'Food sources of pantothenic acid include animal-sourced foods, including dairy foods and eggs.[7][9] Potatoes, tomato products, oat-cereals, sunflower seeds, avocado and mushrooms are good plant sources. Whole grains are another source of the vitamin.', 'https://en.wikipedia.org/wiki/Pantothenic_acid'),
(14, 'Folic acid', 'Green vegetables, wholegrain cereals, wholemeal bread, nuts', 'Not consuming enough folate can lead to folate deficiency.[1] This may result in a type of anemia in which red blood cells become abnormally large.[1] Symptoms may include feeling tired, heart palpitations, shortness of breath, open sores on the tongue.', 'https://en.wikipedia.org/wiki/Folate'),
(15, 'Vitamin B12', 'Meat, fish, eggs, cheese, milk, oysters', 'The EAR for vitamin B12 for women and men ages 14 and up is 2.0 μg/day; the RDA is 2.4 μg/day. RDA is higher than EAR so as to identify amounts that will cover people with higher than average requirements. RDA for pregnancy equals 2.6 μg/day.', 'https://en.wikipedia.org/wiki/Vitamin_B12'),
(16, 'Biotin', 'Eggs, cheese, milk, fish, wholegrain cereals', 'The biotin AIs for both males and females are: 5 μg/day of biotin for 0-to-6-month-olds, 6 μg/day of biotin for 7-to-12-month-olds, 8 μg/day of biotin for 1-to-3-year-olds, 12 μg/day of biotin for 4-to-8-year-olds, 20 μg/day of biotin for to-13-year-olds.', 'https://en.wikipedia.org/wiki/Biotin'),
(17, 'Vitamin C', 'Oranges, tomatoes, potatoes, broccoli, cabbage, Brussels sprouts, Strawberries', 'Vitamin C is generally well tolerated. Large doses may cause gastrointestinal discomfort, headache, trouble sleeping, and flushing of the skin. Normal doses are safe during pregnancy. The United States Institute of Medicine recommends taking doses.', 'https://en.wikipedia.org/wiki/Vitamin_C'),
(18, 'Calcium', 'Cheese, milk, yoghurt, canned fish, nuts, sesame seeds (tahini), dried fruit', 'It is the fifth most abundant element in Earth`s crust, and the third most abundant metal, after iron and aluminium. The most common calcium compound on Earth is calcium carbonate, found in limestone and the fossilised remnants of early sea life sources.', 'https://en.wikipedia.org/wiki/Calcium'),
(19, 'Phosphorus', 'Meat, fish, poultry, eggs, milk, cheese, nuts, cereals, bread', 'The main component of bone is hydroxyapatite as well as amorphous forms of calcium phosphate, possibly including carbonate. Hydroxyapatite is the main component of tooth enamel. Water fluoridation enhances the resistance of teeth to decay the conversion.', 'https://en.wikipedia.org/wiki/Phosphorus'),
(20, 'Iron', 'Meat, poultry, wholegrain cereals, wholemeal bread, eggs', 'An average adult human contains about 0.7 kg of phosphorus, about 85–90% in bones and teeth in the form of apatite, and the remainder in soft tissues and extracellular fluids (~1%). The phosphorus content increases from about 0.5 weight% in infancy.', 'https://en.wikipedia.org/wiki/Phosphorus'),
(21, 'Sodium', 'Table salt, meat, milk, cheese, seafood, spinach, celery', 'In humans, sodium is an essential mineral that regulates blood volume, blood pressure, osmotic equilibrium and pH. The minimum physiological requirement for sodium is estimated to range from about 120 mil.grams per day, newborns to 500 milligrams per day.', 'https://en.wikipedia.org/wiki/Sodium'),
(22, 'Potassium', 'Potatoes, bananas, oranges, apricots, other fruit and vegetables, meat, fish, nuts', 'Potassium is the eighth or ninth most common element by mass (0.2%) in the human body, so that a 60 kg adult contains a total of about 120 g of potassium. The body has about as much potassium as sulfur and chlorine, and only calcium is more abundant.', 'https://en.wikipedia.org/wiki/Potassium'),
(23, 'Iodine', 'Sea foods, milk and cereals and vegetables from areas with high iodine content in the soil, iodised table salt', 'Recommendations by the United States Institute of Medicine are between 110 and 130 µg for infants up to 12 months, 90 µg for children up to eight years, 130 µg for children up to 13 years, 150 µg for adults, 220 for pregnant women and 290 for lactation.', 'https://en.wikipedia.org/wiki/Iodine'),
(24, 'Zinc', 'Oysters, meat, fish, poultry, eggs, wholegrain cereals, peanuts', 'Animal products such as meat, fish, shellfish, fowl, eggs, and dairy contain zinc. The concentration of zinc in plants varies with the level in the soil. With adequate zinc in the soil, the food plants that contain the most zinc is wheat (germ and bran).', 'https://en.wikipedia.org/wiki/Zinc');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `pk_ratingid` int(11) NOT NULL,
  `fk_userid` int(11) NOT NULL,
  `fk_recipeid` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`pk_ratingid`, `fk_userid`, `fk_recipeid`, `rating`) VALUES
(1, 5, 3, 3),
(2, 7, 18, 4),
(3, 10, 18, 3),
(4, 13, 24, 5),
(5, 5, 18, 5),
(6, 11, 24, 5),
(7, 5, 25, 5),
(8, 5, 26, 5),
(9, 7, 35, 5),
(10, 15, 24, 5),
(11, 15, 31, 5),
(12, 7, 24, 3),
(13, 7, 26, 5),
(14, 7, 20, 4),
(15, 11, 20, 3),
(16, 8, 26, 3);

-- --------------------------------------------------------

--
-- Table structure for table `recipeingredient`
--

CREATE TABLE `recipeingredient` (
  `fk_recipe` int(11) NOT NULL,
  `fk_ingredient` int(11) NOT NULL,
  `ingredient_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipeingredient`
--

INSERT INTO `recipeingredient` (`fk_recipe`, `fk_ingredient`, `ingredient_quantity`) VALUES
(6, 5, NULL),
(6, 6, NULL),
(6, 7, NULL),
(6, 9, NULL),
(17, 26, NULL),
(17, 134, NULL),
(17, 20, NULL),
(17, 9, NULL),
(17, 71, NULL),
(17, 199, NULL),
(17, 19, NULL),
(17, 373, NULL),
(17, 90, NULL),
(17, 21, NULL),
(20, 25, NULL),
(20, 34, NULL),
(20, 104, NULL),
(20, 118, NULL),
(20, 133, NULL),
(20, 222, NULL),
(20, 266, NULL),
(20, 500, NULL),
(18, 2, NULL),
(18, 3, NULL),
(18, 238, NULL),
(19, 67, NULL),
(19, 117, NULL),
(19, 2, NULL),
(19, 65, NULL),
(19, 179, NULL),
(19, 3, NULL),
(19, 199, NULL),
(19, 475, NULL),
(19, 90, NULL),
(19, 242, NULL),
(19, 188, NULL),
(22, 20, NULL),
(22, 325, NULL),
(22, 36, NULL),
(22, 71, NULL),
(22, 199, NULL),
(22, 116, NULL),
(22, 282, NULL),
(23, 98, NULL),
(23, 99, NULL),
(23, 395, NULL),
(23, 20, NULL),
(23, 503, NULL),
(23, 199, NULL),
(23, 19, NULL),
(23, 242, NULL),
(23, 21, NULL),
(24, 1, NULL),
(24, 316, NULL),
(24, 2, NULL),
(24, 65, NULL),
(24, 3, NULL),
(24, 90, NULL),
(24, 207, NULL),
(26, 66, NULL),
(26, 1, NULL),
(26, 99, NULL),
(26, 2, NULL),
(27, 375, NULL),
(27, 386, NULL),
(27, 36, NULL),
(27, 76, NULL),
(27, 404, NULL),
(27, 142, NULL),
(27, 7, NULL),
(28, 5, NULL),
(28, 125, NULL),
(28, 36, NULL),
(28, 19, NULL),
(28, 27, NULL),
(28, 426, NULL),
(29, 381, NULL),
(29, 71, NULL),
(29, 199, NULL),
(29, 244, NULL),
(29, 21, NULL),
(30, 183, NULL),
(30, 401, NULL),
(30, 1, NULL),
(30, 5, NULL),
(30, 65, NULL),
(30, 20, NULL),
(30, 3, NULL),
(30, 180, NULL),
(30, 199, NULL),
(30, 64, NULL),
(31, 68, NULL),
(31, 384, NULL),
(31, 145, NULL),
(31, 386, NULL),
(31, 2, NULL),
(31, 23, NULL),
(31, 374, NULL),
(31, 207, NULL),
(31, 10, NULL),
(32, 261, NULL),
(32, 437, NULL),
(32, 104, NULL),
(32, 99, NULL),
(32, 106, NULL),
(32, 268, NULL),
(32, 19, NULL),
(32, 103, NULL),
(32, 102, NULL),
(32, 105, NULL),
(32, 264, NULL),
(32, 207, NULL),
(32, 408, NULL),
(32, 21, NULL),
(32, 188, NULL),
(33, 423, NULL),
(33, 106, NULL),
(33, 395, NULL),
(33, 118, NULL),
(33, 199, NULL),
(33, 19, NULL),
(33, 102, NULL),
(33, 27, NULL),
(33, 130, NULL),
(33, 63, NULL),
(33, 242, NULL),
(33, 21, NULL),
(33, 10, NULL),
(34, 26, NULL),
(34, 25, NULL),
(34, 5, NULL),
(34, 18, NULL),
(34, 508, NULL),
(34, 509, NULL),
(34, 399, NULL),
(34, 110, NULL),
(34, 19, NULL),
(34, 103, NULL),
(34, 507, NULL),
(34, 510, NULL),
(34, 241, NULL),
(34, 21, NULL),
(35, 68, NULL),
(35, 24, NULL),
(35, 117, NULL),
(35, 248, NULL),
(35, 113, NULL),
(35, 2, NULL),
(35, 65, NULL),
(35, 20, NULL),
(35, 33, NULL),
(35, 19, NULL),
(35, 105, NULL),
(35, 63, NULL),
(35, 226, NULL),
(35, 207, NULL),
(36, 1, NULL),
(36, 117, NULL),
(36, 65, NULL),
(36, 39, NULL),
(36, 199, NULL),
(36, 105, NULL),
(37, 83, NULL),
(37, 3, NULL),
(37, 330, NULL),
(38, 429, NULL),
(38, 107, NULL),
(38, 2, NULL),
(38, 39, NULL),
(38, 19, NULL),
(38, 260, NULL),
(38, 42, NULL),
(38, 165, NULL),
(38, 63, NULL),
(38, 182, NULL),
(38, 207, NULL),
(39, 34, NULL),
(39, 45, NULL),
(39, 106, NULL),
(39, 33, NULL),
(39, 387, NULL),
(39, 39, NULL),
(39, 218, NULL),
(39, 260, NULL),
(39, 200, NULL),
(40, 1, NULL),
(40, 2, NULL),
(40, 65, NULL),
(40, 20, NULL),
(40, 3, NULL),
(40, 199, NULL),
(40, 4, NULL),
(40, 27, NULL),
(25, 1, NULL),
(25, 4, NULL),
(25, 64, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `pk_recipeid` int(11) NOT NULL,
  `recipe_name` varchar(70) NOT NULL,
  `prep_steps` text NOT NULL,
  `prep_time` int(11) NOT NULL,
  `recipe_type` varchar(50) NOT NULL,
  `recipe_picture` varchar(255) NOT NULL,
  `fk_userid` int(11) NOT NULL,
  `calories` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`pk_recipeid`, `recipe_name`, `prep_steps`, `prep_time`, `recipe_type`, `recipe_picture`, `fk_userid`, `calories`, `status`) VALUES
(2, 'Spaghetti Napolinini', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum', 25, 'Vegetarian', 'meal.jpeg', 7, 600, 'acc'),
(3, 'Chicken Tikki Masala', 'later', 50, 'Flexitarian', 'meal.jpeg', 7, 500, 'acc'),
(6, 'Cheese Plate', 'Add different Cheeses to plate', 10, 'Vegetarian', 'meal.jpeg', 7, 500, 'acc'),
(17, 'Mozzarella gnocchi', 'UpgradeÂ cheesy tomato pastaÂ with gnocchi, chorizo and mozzarella for a comforting bakeÂ that makesÂ an excellent midweek meal. STEP 1: Heat the oil in a medium pan over a medium heat. Fry the onion and garlic for 8-10 mins until soft. Add the chorizo and fry for 5 mins more. Tip in the tomatoes and sugar, and season. Bring to a simmer, then add the gnocchi and cook for 8 mins, stirring often, until soft. Heat the grill to high. STEP 2: Stir 3/4 of the mozzarella and most of the basil through the gnocchi. Divide the mixture between six ovenproof ramekins, or put in one baking dish. Top with the remaining mozzarella, then grill for 3 mins, or until the cheese is melted and golden. Season, scatter over the remaining basil and serve with green salad.\r\n', 35, 'Vegetarian', '60ae3f2dcf7d0.jpg', 13, 318, 'acc'),
(18, 'Scrambled Eggs', '<p><label class=\"checkbox-list\" for=\"recipe-instructions-label-0-0\">1)</label></p>\r\n<div class=\"section-body\">\r\n<div class=\"paragraph  \">\r\n<p>Break the eggs into a microwave-proof mixing bowl. Add milk and salt; mix well.</p>\r\n<p>&nbsp;</p>\r\n<p><label class=\"checkbox-list\" for=\"recipe-instructions-label-0-1\">2)</label></p>\r\n<p>Pop the bowl into the microwave and cook on high power for 30 seconds. Remove bowl, beat eggs very well, scraping down the sides of the bowl, and return to the microwave for another 30 seconds. Repeat this pattern, stirring every 30 seconds for up to 2 1/2 minutes. Stop when eggs have the consistency you desire.</p>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>', 10, 'none', '60ae42d4948ce.jpg', 7, 170, 'acc'),
(19, 'Sweet chicken balls', 'First, make the sauce. Put the orange juice, sugar, tomato purÃ©e, ketchup and vinegar in a large saucepan over a medium heat. Bring to the boil, then reduce the heat and simmer for 5 mins. Slowly pour in the cornflour mixture, a little at a time, stirring continuously until you have the desired consistency. Remove from the heat and set aside. Mix the flour, baking powder and 1 tsp salt together in a large bowl. Beat the eggs, milk and 1 tbsp oil together in a separate bowl. Pour the wet ingredients into the dry and mix well to create a smooth paste. Add the chicken pieces and mix, making sure each piece is thoroughly coated. Drain the fried chicken on a wire rack set over a baking tray lined with kitchen paper, or on a plate lined with kitchen paper. Serve with the sweet & sour sauce for dipping.', 40, 'none', '60ae63aeeb11d.jpg', 13, 554, 'acc'),
(20, 'Ripped Chili', '1. Put beef in a pot and cook on medium for 10 minutes while breaking it apart2. Add the rest of the ingredients and let simmer for 45 minutes while stirring every 5-10 minutes.', 25, 'none', 'meal.jpeg', 5, 836, 'acc'),
(22, ' Ravioli with goat cheese', '<p><span class=', 45, 'Vegetarian', '60ae6811bdc72.jpg', 13, 882, 'acc'),
(23, 'Hob-to-table moussaka', '<p><span class=', 30, 'Flexitarian', '60ae6b2b1ca89.jpg', 13, 529, 'acc'),
(24, 'Easy chocolate cake', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>Heat the oven to 180C/160C fan/gas 4. Oil and line the base of two 18cm sandwich tins. Sieve the flour, cocoa powder and bicarbonate of soda into a bowl. Add the caster sugar and mix well.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p>Make a well in the centre and add the golden syrup, eggs, sunflower oil and milk. Beat well with an electric whisk until smooth.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 3</span></p>\r\n<div class=\"editor-content\">\r\n<p>Pour the mixture into the two tins and bake for 25-30 mins until risen and firm to the touch. Remove from oven, leave to cool for 10 mins before turning out onto a cooling rack.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 4</span></p>\r\n<div class=\"editor-content\">\r\n<p>To make the icing, beat the unsalted butter in a bowl until soft. Gradually sieve and beat in the icing sugar and cocoa powder, then add enough of the milk to make the icing fluffy and spreadable.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 5</span></p>\r\n<div class=\"editor-content\">\r\n<p style=\"text-align: left;\">Sandwich the two cakes together with the butter icing and cover the sides and the top of the cake with more icing.</p>\r\n</div>', 55, 'Vegetarian', '60ae6d4f02bc3.jpg', 13, 608, 'acc'),
(25, 'Buttered Egg Noodles', '<div class=\"col-12 direction_border_col\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-md-2\">Step 1</div>\r\n<div class=\"col-12 col-md-10\">Bring water, 2 boullion cubes and 1/2 stick of butter to boil using med to high heat. (1 stick = 8 tablespoons).</div>\r\n</div>\r\n</div>\r\n<ul>\r\n<li class=\"row\" data-model-cid=\"c109\">\r\n<div class=\"col-12 direction_border_col\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-md-2\">Step 2</div>\r\n<div class=\"col-12 col-md-10\">Add egg noodles.</div>\r\n</div>\r\n</div>\r\n</li>\r\n<li class=\"row\" data-model-cid=\"c110\">\r\n<div class=\"col-12 direction_border_col\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-md-2\">Step 3</div>\r\n<div class=\"col-12 col-md-10\">Cook until noodles are desired texture.</div>\r\n</div>\r\n</div>\r\n</li>\r\n<li class=\"row\" data-model-cid=\"c111\">\r\n<div class=\"col-12 direction_border_col\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-md-2\">Step 4</div>\r\n<div class=\"col-12 col-md-10\">(About 6-8 minutes) During last minute of cooking add remaining 1/2 stick of butter.</div>\r\n</div>\r\n</div>\r\n</li>\r\n<li class=\"row\" data-model-cid=\"c112\">\r\n<div class=\"col-12 direction_border_col\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-md-2\">Step 5</div>\r\n<div class=\"col-12 col-md-10\">(You may add additional butter if desired. Also you may use 1 can of chicken broth instead of bullion. I suggest using bullion).</div>\r\n</div>\r\n</div>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>\"&gt;</p>', 10, 'none', '60af5bf05a29b.jpeg', 11, 1702, 'acc'),
(26, 'Cinnamon Toast', '<ul>\r\n<li>Use a toaster to toast the bread to desired darkness.</li>\r\n<li>Spread butter or margarine onto one side of each slice.</li>\r\n<li>In a cup or small bowl, stir together the sugar and cinnamon; sprinkle generously over hot buttered toast.</li>\r\n</ul>', 20, 'Vegetarian', '60ae7be13b616.jpg', 5, 1000, 'acc'),
(27, 'Salmon lunch pot', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>First, make the dressing. Mix the soured cream and lemon juice together in a bowl, then add most of the dill, reserving a quarter for serving.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p>In another bowl, combine the quinoa with the cucumber and radishes, and stir through half the dressing. Season and top with the salmon and the rest of the dill.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 3</span></p>\r\n<div class=\"editor-content\">\r\n<p>Put the other half of the dressing in a small pot and drizzle over the quinoa just before serving.</p>\r\n</div>', 15, 'Flexitarian', '60ae808ae9b83.jpg', 13, 254, 'acc'),
(28, 'Chicken quesadilla', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>Heat a non-stick frying pan over a medium-high heat. Spread half the wrap with 2 tbsp soft cheese and put in the pan. Cover the other half with the cheddar, then top with the spring onion, lemon zest, parsley and chicken. Scatter over the panko and dot the remaining soft cheese over.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p>Fold the soft-cheese-spread side of the wrap over to close the quesadilla. Cook for 3-4 mins until the cheese has melted and the top of the quesadilla is warm, so you know the chicken is heated through. Slice and serve.</p>\r\n</div>', 15, 'Flexitarian', '60ae822d9bb37.jpg', 13, 413, 'acc'),
(29, 'Minestrone in minutes', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>Bring the stock to the boil with the tomatoes, then add the spaghetti and cook for 6 mins or until done. A few minutes before the pasta is ready, add the vegetables and bring back to the boil. Simmer for 2 mins until everything is cooked.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p style=\"text-align: left;\">Serve in bowls drizzled with pesto and oil.</p>\r\n</div>', 10, 'Vegan', '60ae8347890c8.jpg', 13, 162, 'acc'),
(30, 'Cheesy sprout pasta', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>Heat oven to 200C/180C fan/gas 6. Toss the sprouts in the oil and vinegar, then tip into a roasting tin. Bake for 10-15 mins, tossing again halfway through.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p>Meanwhile, cook the pasta until it has a slight bite (around two minutes less than pack instructions), then drain and set aside.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 3</span></p>\r\n<div class=\"editor-content\">\r\n<p>Heat the butter in a pan. Add the garlic and flour and cook for 1-2 mins. Gradually add the milk until the mixture is smooth, then simmer for 5 mins until thick.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 4</span></p>\r\n<div class=\"editor-content\">\r\n<p style=\"text-align: left;\">Remove from the heat and add the mustard and most of the cheese, reserving one handful for the topping. Season well and stir. Add the pasta, then tip the mixture into a large baking dish. Top with the roasted sprouts and reserved cheese and bake for 20 mins until the cheese topping is golden and bubbling. Serve with a green salad, if you like.</p>\r\n</div>', 50, 'Vegetarian', '60ae858d4b2ff.jpg', 13, 734, 'acc'),
(31, 'Crispy wedges dill slaw', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>Heat oven to 200C/180C fan/gas 6. In a bowl, toss the wedges with the oil, 1 tsp salt and 1/4 tsp pepper. Transfer to a baking sheet and roast for 25-30 mins, turning halfway through. The wedges should be crisp and golden brown.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p>Meanwhile, make the slaw. Remove the cabbage&rsquo;s white core and discard. Slice the leaves as finely as possible and put in a large mixing bowl with the onion and cornichons. In another bowl, combine the yogurt or mayonnaise with the dill and 2 tbsp of the cornichons&rsquo; pickling liquid. Mix the dressing with the other slaw ingredients until everything is well coated, then set aside.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 3</span></p>\r\n<div class=\"editor-content\">\r\n<p style=\"text-align: left;\">Heat grill to high. Slice each cod fillet into two or three fingers. Beat the eggs lightly in a shallow bowl and tip the breadcrumbs into a separate bowl with a good pinch of salt and pepper. Dip each cod finger in the egg and then in the breadcrumbs, and place on an oiled baking sheet. Grill for 6-7 mins or until cooked through and golden. Serve with the crispy wedges and a generous helping of the dill pickle slaw.</p>\r\n</div>', 70, 'Flexitarian', '60ae86df8c640.jpg', 13, 524, 'acc'),
(32, 'Roasted pepper chilli', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>Put the onions, celery and chopped peppers with the oil in your largest flameproof casserole dish or heavy-based saucepan, and fry gently over a low heat until soft but not coloured.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p>Drain both jars of peppers over a bowl to catch the juices. Put a quarter of the peppers into a food processor with the chipotle paste, vinegar, cocoa, dried spices and herbs. Whizz to a pur&eacute;e, then stir into the softened veg and cook for a few mins.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 3</span></p>\r\n<div class=\"editor-content\">\r\n<p>Add the tomatoes and refried beans with 1 can water and the reserved pepper juice. Simmer for 1 hr until thickened, smoky and the tomato chunks have broken down to a smoother sauce.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 4</span></p>\r\n<div class=\"editor-content\">\r\n<p>At this stage you can cool and chill the sauce if making ahead. Otherwise add the kidney and black beans, and the remaining roasted peppers, cut into bite-sized pieces, then reheat. (This makes a large batch, so once the sauce is ready it might be easier to split it between two pans when you add the beans and peppers.) Once bubbling and the beans are hot, season to taste and serve.</p>\r\n</div>', 105, 'Vegetarian', '60ae88f5aa9f9.jpg', 13, 327, 'acc'),
(33, 'karniyarik', '<ul><li>Von den Auberginen der LÃ¤nge nach 4-5 Streifen abschÃ¤len, so dass die Auberginen rundherum gestreift aussehen. In der Mitte teilen und das Fruchtfleisch mit einem KaffeelÃ¶ffel etwas herauslÃ¶sen und kleinwÃ¼rfelig schneiden. Die geschÃ¤lten Auberginen ca. 30 Minuten in kaltes Salzwasser einlegen, damit sie nicht braun werden.</li><li>In der Zwischenzeit wird die FÃ¼llung vorbereitet:</li><li>In etwas OlivenÃ¶l die Zwiebeln den Knoblauch und die Spitzpaprika leicht anbraten bis sie glasig werden. AnschlieÃŸend die Tomaten, das kleinwÃ¼rfelig geschnittene Fruchtfleisch der Auberginen, Zucker, Salz, Pfeffer dazugeben und etwa 10 Minuten bei schwacher Hitze mit halb geschlossenem Deckel schmoren lassen. Zum Schluss noch die Petersilie untermischen und abschmecken.</li><li>Die Auberginen aus dem Salzwasser nehmen, trocken tupfen und in der Pfanne mit etwas OlivenÃ¶l anbraten, bis sie von allen Seiten gleichmÃ¤ÃŸig goldbraun werden.</li><li>Auf KÃ¼chenpapier das Ã¼berschÃ¼ssige Ã–l abtropfen lassen.</li><li>Ein geeignetes Bachbleck mit Ã–l ausstreichen, AuberginenhÃ¤lften einschlichten und mit der GemÃ¼sefÃ¼llung fÃ¼llen. Mit einigen Tomatenscheiben garnieren und OlivenÃ¶l mit Tomaten oder Paprikapaste und 5 EL Wasser vermischen und Ã¼ber die Auberginen geben (damit das Gericht beim Ãœberbacken nicht verbrennt und saftig bleibt)</li><li>Im vorgeheizten Backrohr bei 200Â°C fÃ¼r ca. 30 Minuten (je nach GrÃ¶ÃŸe) Ã¼berbacken.</li><li><strong>Tipp:</strong>Â Wer mÃ¶chte kann dazu Reis oder Salat als Beilage servieren.</li></ul>', 75, 'none', '60aea69c10552.jpg', 12, 191, 'acc'),
(34, 'Vegetable Lasagne', '<ol class=\"recipe-method__list\">\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Preheat the oven to 200C/180C Fan/Gas 6.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Heat a large frying pan until medium&ndash;hot. Add the oil, onion and leek and cook for 5 minutes, until just softened.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Add the peppers and courgettes and fry until just coloured all over. Add the oregano, basil and onion powder, season and cook for 1 minute. Stir in the tomato pur&eacute;e and the tinned tomatoes. Bring to the boil, then turn down the heat and simmer for 5 minutes.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Spoon half the ratatouille into the bottom of a 20x28cm/8x11in ovenproof dish. Layer the lasagne over the top, then spoon over half the cottage cheese, spreading to the edges. Add the remaining ratatouille and then the remaining cottage cheese. Scatter the Cheddar over the top.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Bake for 30 minutes, or until golden-brown and bubbling. Serve with salad leaves.</p>\r\n</li>\r\n</ol>', 45, 'Vegan', '60aeb4be8fcd4.jpg', 7, 285, 'acc'),
(35, 'Tori Katsu Curry', '<ol class=\"recipe-method__list\">\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">To make the sauce, put the onion, carrot and oil into a saucepan and cook over a low&ndash;medium heat for 4&ndash;5 minutes, stirring frequently, until soft but not coloured.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Add the garlic, ginger and curry powder and cook for a minute, stirring often. Add the flour, mix well and cook for a further 30 seconds. Gradually add the stock, stirring constantly. Bring slowly to the boil, reduce to a simmer and cook gently for 10 minutes until smooth and thickened.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Blend the sauce until smooth using a stick blender and season to taste with soy sauce, salt and pepper.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">To prepare the chicken, tip the flour onto a plate, the beaten egg onto another and the breadcrumbs onto a baking tray.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Coat the chicken fillets in flour, shake off the excess, then dip into the beaten egg to coat and shake off any excess. Put the chicken into the breadcrumbs and turn gently so that each piece is evenly coated.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Heat the oil in a large frying pan over a medium heat. Add half of the chicken pieces and cook for about 3 minutes on each side, or until golden. Remove from the pan and keep warm while you fry the remaining chicken.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Serve the crisp chicken with steamed rice and the hot curry sauce poured over.</p>\r\n</li>\r\n</ol>', 30, 'Flexitarian', '60aeb7e874647.jpg', 7, 400, 'acc'),
(36, 'Lemon Chicken', '<ol class=\"recipe-method__list\">\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Heat a large frying pan and add the olive oil, fry the chicken for 5 minutes on each side, or until cooked through.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Add the lemon juice and salt and pepper. Add the white wine and reduce for 30 seconds. Coat the knob of butter in flour, and drop in the mixture to thicken.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Bring a pan of water to the boil and cook the green beans for 3-4 minutes, drain.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Put the beans on a plate, top with the chicken, drizzle over the sauce and serve.</p>\r\n</li>\r\n</ol>', 30, 'Flexitarian', '60aebc6fdfe7e.jpg', 7, 300, 'acc'),
(37, 'Macaroni Cheese', '<ol class=\"recipe-method__list\">\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Put the macaroni and both types of cheese in a slow cooker.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Pour over the evaporated milk and add 700ml/1&frac14; pint of water. Season with pepper and stir.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Cover and cook on high for 1&frac12; hours, or until all the cheese has melted and the pasta is almost tender. Stir really well, then cover and cook for a further 15 minutes, or until the pasta is tender but holding its shape. Serve immediately.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Serve immediately (The longer the pasta sits, the softer it will become.)</p>\r\n<ol class=\"recipe-method__list\">\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Put the macaroni and both types of cheese in a slow cooker.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Pour over the evaporated milk and add 700ml/1&frac14; pint of water. Season with pepper and stir.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Cover and cook on high for 1&frac12; hours, or until all the cheese has melted and the pasta is almost tender. Stir really well, then cover and cook for a further 15 minutes, or until the pasta is tender but holding its shape. Serve immediately.</p>\r\n</li>\r\n<li class=\"recipe-method__list-item\">\r\n<p class=\"recipe-method__list-item-text\">Serve immediately (The longer the pasta sits, the softer it will become.)</p>\r\n</li>\r\n</ol></li>\r\n</ol>', 25, 'Vegetarian', '60aebd9b18b12.jpg', 7, 608, 'acc'),
(38, 'Prawn pineapple rice', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>Heat the oil in a wok or non-stick frying pan and fry the spring onion whites for 2 mins until softened. Stir in the pepper for 1 min, followed by the pineapple for 1 min more, then stir in the green curry paste and soy sauce.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p>Add the rice, stir-frying until piping hot, then push the rice to one side of the pan and scramble the eggs on the other side. Stir the peas, bamboo shoots and prawns into the rice and eggs, then heat through for 2 mins until the prawns are hot and the peas tender. Finally, stir in the spring onion greens, lime juice and coriander, if using. Spoon into bowls and serve with extra lime wedges and soy sauce.</p>\r\n</div>', 25, 'Flexitarian', 'meal.jpeg', 15, 311, 'acc'),
(39, 'Indian spiced greens', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>Heat the oil in a large non-stick pan or wok, sizzle the cumin and mustard seeds for 1 min, then add the chilli, ginger and turmeric. Fry until aromatic, then add the greens, a pinch of salt, a splash of water and the peas.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p>Cover the pan and cook for 4-5 mins until the greens have wilted. Add the lemon juice, ground coriander, half the fresh coriander and half the desiccated coconut, then toss everything together. Pile into a serving dish and scatter with the rest of the coconut and coriander.</p>\r\n</div>', 20, 'Vegan', '60af3f4d8fd76.jpg', 15, 117, 'acc'),
(40, 'Herby cheese roulade', '<p><span class=\"mb-xxs heading-6\">STEP 1</span></p>\r\n<div class=\"editor-content\">\r\n<p>Heat oven to 190C/fan 170C/gas 5. Oil a 23 x 33cm Swiss roll tin. Cut a rectangle of baking parchment 4cm larger all round than the tin. Fold in a 2cm strip all round, making a diagonal cut into each corner.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 2</span></p>\r\n<div class=\"editor-content\">\r\n<p>For the roulade, melt the butter in a large pan. Add the garlic and fry for 1 min. Add the flour and cook for 1 min, stirring constantly. Gradually beat in the milk. Bring to the boil, stirring constantly, until the sauce is thick and smooth. Remove from the heat and stir in half the cheese. Season, then allow to cool slightly. Beat in the egg yolks and parsley. Whisk the egg whites to stiff, but not dry peaks, then gently fold into the cheese sauce. Pour into the tin, tipping the tin so that the mixture fills all the corners. Bake for 15 mins until risen and golden.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 3</span></p>\r\n<div class=\"editor-content\">\r\n<p>Meanwhile, heat the oil and butter in a large wok or frying pan and stir-fry the spring greens and garlic for 4-5 mins until tender. Season.</p>\r\n</div>\r\n<p><span class=\"mb-xxs heading-6\">STEP 4</span></p>\r\n<div class=\"editor-content\">\r\n<p>Sprinkle the remaining cheese over a sheet of baking parchment just larger than the tin. Turn the roulade out onto the parchment, then peel off the lining paper. Trim the crispy edges off the roulade. Use a slotted spoon to remove the spring greens from the garlicky butter, then spread over the roulade leaving a 2.5cm space at one short end uncovered. Roll up the roulade from the short end with no filling on it, using the paper to help. Serve the roulade immediately, drizzled with any remaining garlicky butter.</p>\r\n</div>', 45, 'Vegetarian', '60af41f2af4b7.jpg', 15, 297, 'acc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pk_userid` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pk_userid`, `first_name`, `last_name`, `birthday`, `email`, `password`, `picture`, `user_type`) VALUES
(5, 'Laura', 'Bro', '1994-02-03', 'laura@mail.com', '1efa93956881279751b21ef778862cdc5b8e58c4691f2d47fe21fa24fd3c2bf1', '60ae732b61d53.jpg', 'user'),
(7, 'Mario', 'Hartleb', '1983-06-07', 'mario@gmail.com', '1ad4ab0a74a2483318322183d0807282f01f2d8ba6779fd6bd28d871f06885b0', 'avatar.png', 'adm'),
(8, 'Natalia', 'Bochenek', '1001-01-01', 'natalia@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '60adfca6e024a.jpg', 'adm'),
(10, 'Yas', 'Nejat', '2021-05-03', 'nejat@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'avatar.png', 'block'),
(11, 'Laura', 'Admin', '1994-02-03', 'Lauraadmin@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '60ae2b01321d1.jpg', 'adm'),
(12, 'User', 'User', '1001-01-01', 'user@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '60aea31aadca2.jpg', 'user'),
(13, 'Senimtra', '', '2021-05-26', 'senimtra@mail.com', '1d9df1f70c2dfcf1c8d7a7102ede04fe9edc018ef71a57c56e2349110bedfa16', '60ae37c8bab7f.jpg', 'adm'),
(14, 'Michael', 'Johnson', '1955-02-01', 'michael@mail.com', '2be07a0aeb50d4f397bf7e11dadd6a05c9523076939ada85ee372f3b97e48381', 'avatar.png', 'user'),
(15, 'Simons', 'Cat', '1990-01-26', 'simons@cat.com', '7f46482b2be0e35ce291f6bc48f47946c49140482fd0b1301828bd7feaae9d42', '60af3362d95ad.jpg', 'user'),
(16, 'Block', 'mee', '2021-05-20', 'block@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'avatar.png', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `weekplan`
--

CREATE TABLE `weekplan` (
  `pk_weekplan` int(11) NOT NULL,
  `fk_userid` int(11) NOT NULL,
  `fk_recipeid` int(11) NOT NULL,
  `date` date NOT NULL,
  `number_serv` int(11) NOT NULL,
  `time` enum('breakfast','lunch','dinner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weekplan`
--

INSERT INTO `weekplan` (`pk_weekplan`, `fk_userid`, `fk_recipeid`, `date`, `number_serv`, `time`) VALUES
(3, 7, 3, '2021-05-25', 4, 'dinner'),
(5, 7, 3, '2021-07-20', 4, 'dinner'),
(6, 7, 2, '2021-07-21', 6, 'dinner'),
(9, 12, 2, '2202-02-01', 1, 'breakfast');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergen`
--
ALTER TABLE `allergen`
  ADD PRIMARY KEY (`pk_allergenid`);

--
-- Indexes for table `foodgroups`
--
ALTER TABLE `foodgroups`
  ADD PRIMARY KEY (`pk_foodgroup`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`pk_ingredientsid`),
  ADD KEY `fk_allergenid` (`fk_allergenid`),
  ADD KEY `fk_nutrient` (`fk_nutrient`) USING BTREE,
  ADD KEY `fk_foodgroup` (`fk_foodgroup`);

--
-- Indexes for table `nutrient`
--
ALTER TABLE `nutrient`
  ADD PRIMARY KEY (`pk_nutrient`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`pk_ratingid`),
  ADD KEY `fk_recipeid` (`fk_recipeid`),
  ADD KEY `fk_userid` (`fk_userid`) USING BTREE;

--
-- Indexes for table `recipeingredient`
--
ALTER TABLE `recipeingredient`
  ADD KEY `fk_ingredrient` (`fk_ingredient`),
  ADD KEY `fk_recipe` (`fk_recipe`) USING BTREE;

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`pk_recipeid`),
  ADD KEY `fk_userid` (`fk_userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pk_userid`);

--
-- Indexes for table `weekplan`
--
ALTER TABLE `weekplan`
  ADD PRIMARY KEY (`pk_weekplan`),
  ADD KEY `fk_recipeid` (`fk_recipeid`),
  ADD KEY `fk_userid` (`fk_userid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergen`
--
ALTER TABLE `allergen`
  MODIFY `pk_allergenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `foodgroups`
--
ALTER TABLE `foodgroups`
  MODIFY `pk_foodgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `pk_ingredientsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `nutrient`
--
ALTER TABLE `nutrient`
  MODIFY `pk_nutrient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `pk_ratingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `recipeingredient`
--
ALTER TABLE `recipeingredient`
  MODIFY `fk_recipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `pk_recipeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `pk_userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `weekplan`
--
ALTER TABLE `weekplan`
  MODIFY `pk_weekplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `fk_foodgroup` FOREIGN KEY (`fk_foodgroup`) REFERENCES `foodgroups` (`pk_foodgroup`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`fk_allergenid`) REFERENCES `allergen` (`pk_allergenid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredients_ibfk_2` FOREIGN KEY (`fk_nutrient`) REFERENCES `nutrient` (`pk_nutrient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`fk_userid`) REFERENCES `user` (`pk_userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`fk_recipeid`) REFERENCES `recipes` (`pk_recipeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipeingredient`
--
ALTER TABLE `recipeingredient`
  ADD CONSTRAINT `recipeingredient_ibfk_1` FOREIGN KEY (`fk_recipe`) REFERENCES `recipes` (`pk_recipeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipeingredient_ibfk_2` FOREIGN KEY (`fk_ingredient`) REFERENCES `ingredients` (`pk_ingredientsid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`fk_userid`) REFERENCES `user` (`pk_userid`);

--
-- Constraints for table `weekplan`
--
ALTER TABLE `weekplan`
  ADD CONSTRAINT `weekplan_ibfk_1` FOREIGN KEY (`fk_userid`) REFERENCES `user` (`pk_userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `weekplan_ibfk_2` FOREIGN KEY (`fk_recipeid`) REFERENCES `recipes` (`pk_recipeid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
