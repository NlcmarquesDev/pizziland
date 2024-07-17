-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 17, 2024 at 08:15 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaria_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_username` varchar(255) NOT NULL,
  `delivery_adress` varchar(255) NOT NULL,
  `delivery_postcode` int(11) NOT NULL,
  `delivery_phone` int(11) NOT NULL,
  `delivery_email` varchar(255) NOT NULL,
  `delivery_notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_username`, `delivery_adress`, `delivery_postcode`, `delivery_phone`, `delivery_email`, `delivery_notes`) VALUES
(1, 'Nuno Lopes', 'leiestarat', 8930, 444995588, '', ''),
(2, 'Ines Marques', 'spinnerij', 8930, 444000000, 'ines@ines.com', ''),
(3, 'Paulo Lopes', 'Julien Calleinstraat', 8930, 98722344, '', ''),
(4, 'Elsa Marina', 'kasteelstraat', 8930, 987334455, '', ''),
(5, 'Ines Marques', 'spinnerij', 8930, 444000000, 'ines@ines.com', ''),
(6, 'Ines Marques', 'spinnerij', 8930, 444000000, 'ines@ines.com', ''),
(7, 'Ines Marques', 'spinnerij', 8930, 444000000, 'ines@ines.com', ''),
(8, 'Ines Marques', 'spinnerij', 8930, 444000000, 'ines@ines.com', ''),
(9, 'Ines Marques', 'spinnerij', 8930, 444000000, 'ines@ines.com', ''),
(10, 'Ines Marques', 'spinnerij', 8930, 444000000, 'ines@ines.com', ''),
(11, 'Ines Marques', 'spinnerij', 8930, 444000000, 'ines@ines.com', ''),
(12, 'Ines Marques', 'spinnerij', 8930, 444000000, 'ines@ines.com', ''),
(13, 'Quincas Lopes', 'leie', 8930, 987554433, '', ''),
(14, 'Quincas Lopes', 'leie', 8930, 987554433, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `delivery_id`, `status`, `order_date`, `delivery_date`) VALUES
(1, 0, 1, 'Paid', '2024-07-16 06:19:48', NULL),
(2, 2, 2, 'Paid', '2024-07-16 07:00:37', NULL),
(3, 0, 3, 'Paid', '2024-07-16 07:03:28', NULL),
(4, 0, 4, 'Paid', '2024-07-16 10:57:04', NULL),
(5, 2, 5, 'Paid', '2024-07-17 05:46:22', NULL),
(6, 2, 6, 'Paid', '2024-07-17 05:49:35', NULL),
(7, 2, 7, 'Paid', '2024-07-17 06:05:53', NULL),
(8, 2, 8, 'Paid', '2024-07-17 06:06:44', NULL),
(9, 2, 9, 'Paid', '2024-07-17 06:07:43', NULL),
(10, 2, 10, 'Paid', '2024-07-17 06:08:42', NULL),
(11, 2, 11, 'Paid', '2024-07-17 06:10:10', NULL),
(12, 2, 12, 'Paid', '2024-07-17 06:12:44', NULL),
(13, 0, 13, 'Paid', '2024-07-17 06:14:23', NULL),
(14, 0, 14, 'Paid', '2024-07-17 06:14:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `size_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `order_id`, `pizza_id`, `quantity`, `unit_price`, `size_id`) VALUES
(1, 1, 1, 2, '17.98', 4),
(2, 1, 2, 1, '9.99', 2),
(3, 1, 1, 1, '8.99', 3),
(4, 2, 21, 1, '10.29', 3),
(5, 2, 32, 1, '19.49', 4),
(6, 3, 2, 2, '19.98', 4),
(7, 4, 3, 1, '10.99', 1),
(8, 4, 15, 1, '22.99', 3),
(9, 4, 30, 1, '17.79', 1),
(13, 14, 3, 1, '10.99', 3),
(14, 14, 3, 1, '10.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `pizza_id` int(11) NOT NULL,
  `pizza_name` varchar(255) NOT NULL,
  `pizza_price` decimal(10,2) NOT NULL,
  `pizza_alergies` varchar(255) DEFAULT NULL,
  `pizza_description` text,
  `pizza_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`pizza_id`, `pizza_name`, `pizza_price`, `pizza_alergies`, `pizza_description`, `pizza_image`) VALUES
(1, 'Margherita', '8.99', 'None', 'Classic Margherita with tomato sauce, mozzarella, and basil.', 'margherita.jpg'),
(2, 'Pepperoni', '9.99', 'None', 'Pepperoni pizza with mozzarella and tomato sauce.', 'pepperoni.jpg'),
(3, 'Hawaiian', '10.99', 'None', 'Hawaiian pizza with ham, pineapple, and mozzarella.', 'hawaiian.jpg'),
(4, 'Vegetarian', '11.99', 'None', 'Vegetarian pizza with bell peppers, onions, mushrooms, and olives.', 'vegetarian.jpg'),
(5, 'BBQ Chicken', '12.99', 'None', 'BBQ chicken pizza with mozzarella, red onions, and cilantro.', 'bbq_chicken.jpg'),
(6, 'Four Cheese', '13.99', 'Dairy', 'Four cheese pizza with mozzarella, parmesan, gorgonzola, and ricotta.', 'four_cheese.jpg'),
(7, 'Meat Lovers', '14.99', 'None', 'Meat lovers pizza with pepperoni, sausage, ham, and bacon.', 'meat_lovers.jpg'),
(8, 'Buffalo Chicken', '15.99', 'None', 'Buffalo chicken pizza with mozzarella, blue cheese, and celery.', 'buffalo_chicken.jpg'),
(9, 'Supreme', '16.99', 'None', 'Supreme pizza with pepperoni, sausage, bell peppers, onions, and olives.', 'supreme.jpg'),
(10, 'Mediterranean', '17.99', 'None', 'Mediterranean pizza with feta cheese, olives, sun-dried tomatoes, and spinach.', 'mediterranean.jpg'),
(11, 'Taco Pizza', '18.99', 'None', 'Taco pizza with seasoned beef, lettuce, tomatoes, and cheddar cheese.', 'taco_pizza.jpg'),
(12, 'Pesto Chicken', '19.99', 'None', 'Pesto chicken pizza with mozzarella, tomatoes, and basil.', 'pesto_chicken.jpg'),
(13, 'Seafood', '20.99', 'Shellfish', 'Seafood pizza with shrimp, calamari, and mozzarella.', 'seafood.jpg'),
(14, 'Truffle Mushroom', '21.99', 'None', 'Truffle mushroom pizza with mozzarella and truffle oil.', 'truffle_mushroom.jpg'),
(15, 'Bacon Cheeseburger', '22.99', 'None', 'Bacon cheeseburger pizza with ground beef, cheddar, and pickles.', 'bacon_cheeseburger.jpg'),
(16, 'Chicken Alfredo', '23.99', 'Dairy', 'Chicken alfredo pizza with creamy alfredo sauce and mozzarella.', 'chicken_alfredo.jpg'),
(17, 'Philly Cheesesteak', '24.99', 'None', 'Philly cheesesteak pizza with beef, bell peppers, and onions.', 'philly_cheesesteak.jpg'),
(18, 'Spicy Italian', '9.49', 'None', 'Spicy Italian pizza with salami, pepperoni, and chili flakes.', 'spicy_italian.jpg'),
(19, 'Mushroom', '9.79', 'None', 'Mushroom pizza with mozzarella, garlic, and parsley.', 'mushroom.jpg'),
(20, 'Ham and Cheese', '9.89', 'None', 'Ham and cheese pizza with mozzarella and ham slices.', 'ham_cheese.jpg'),
(21, 'Greek', '10.29', 'None', 'Greek pizza with feta, olives, and spinach.', 'greek.jpg'),
(22, 'Caprese', '12.49', 'None', 'Caprese pizza with fresh mozzarella, tomatoes, and basil.', 'caprese.jpg'),
(23, 'Carbonara', '12.69', 'Dairy', 'Carbonara pizza with pancetta, eggs, and parmesan.', 'carbonara.jpg'),
(24, 'Shrimp Scampi', '13.29', 'Shellfish', 'Shrimp scampi pizza with garlic butter and parsley.', 'shrimp_scampi.jpg'),
(25, 'Tandoori Chicken', '13.89', 'None', 'Tandoori chicken pizza with mozzarella and cilantro.', 'tandoori_chicken.jpg'),
(26, 'Margherita Extra', '14.49', 'None', 'Margherita pizza with extra mozzarella and basil.', 'margherita_extra.jpg'),
(27, 'Prosciutto and Arugula', '15.19', 'None', 'Prosciutto and arugula pizza with parmesan.', 'prosciutto_arugula.jpg'),
(28, 'Spinach and Artichoke', '15.69', 'None', 'Spinach and artichoke pizza with mozzarella.', 'spinach_artichoke.jpg'),
(29, 'Chicken Bacon Ranch', '16.29', 'None', 'Chicken bacon ranch pizza with mozzarella and ranch sauce.', 'chicken_bacon_ranch.jpg'),
(30, 'Pulled Pork', '17.79', 'None', 'Pulled pork pizza with BBQ sauce and mozzarella.', 'pulled_pork.jpg'),
(31, 'Steak and Gorgonzola', '18.29', 'Dairy', 'Steak and gorgonzola pizza with mozzarella.', 'steak_gorgonzola.jpg'),
(32, 'Lobster', '19.49', 'Shellfish', 'Lobster pizza with garlic butter and mozzarella.', 'lobster.jpg'),
(33, 'Fig and Prosciutto', '20.29', 'None', 'Fig and prosciutto pizza with goat cheese and arugula.', 'fig_prosciutto.jpg'),
(34, 'Duck Confit', '21.99', 'None', 'Duck confit pizza with mozzarella and caramelized onions.', 'duck_confit.jpg'),
(35, 'Roasted Vegetable', '22.49', 'None', 'Roasted vegetable pizza with mozzarella and balsamic glaze.', 'roasted_vegetable.jpg'),
(36, 'Chorizo', '12.99', 'None', 'Spicy chorizo pizza with mozzarella and chili flakes.', 'chorizo.jpg'),
(37, 'Eggplant Parmesan', '13.59', 'Dairy', 'Eggplant parmesan pizza with mozzarella and marinara sauce.', 'eggplant_parmesan.jpg'),
(38, 'Clam Pizza', '16.29', 'Shellfish', 'Clam pizza with garlic butter and mozzarella.', 'clam_pizza.jpg'),
(39, 'Beet and Goat Cheese', '17.89', 'Dairy', 'Beet and goat cheese pizza with arugula.', 'beet_goat_cheese.jpg'),
(40, 'Buffalo Mozzarella', '18.99', 'Dairy', 'Buffalo mozzarella pizza with fresh basil and tomatoes.', 'buffalo_mozzarella.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_sizes`
--

CREATE TABLE `pizza_sizes` (
  `size_id` int(11) NOT NULL,
  `pizza_size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pizza_sizes`
--

INSERT INTO `pizza_sizes` (`size_id`, `pizza_size`) VALUES
(1, 'Small'),
(2, 'Medium  +10%'),
(3, 'Large  +15%'),
(4, 'Extra Large  +20%');

-- --------------------------------------------------------

--
-- Table structure for table `postcode`
--

CREATE TABLE `postcode` (
  `postcode_id` int(11) NOT NULL,
  `postcode_number` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `delivery_place` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `postcode`
--

INSERT INTO `postcode` (`postcode_id`, `postcode_number`, `city`, `delivery_place`) VALUES
(1, 8000, 'Brugge', 0),
(2, 8200, 'Sint-Andries', 0),
(3, 8200, 'Sint-Michiels', 0),
(4, 8200, 'Brugge', 0),
(5, 8300, 'Knokke-Heist', 0),
(6, 8300, 'Westkapelle', 0),
(7, 8300, 'Ramskapelle', 0),
(8, 8300, 'Knokke', 0),
(9, 8370, 'Blankenberge', 0),
(10, 8370, 'Uitkerke', 0),
(11, 8400, 'Oostende', 0),
(12, 8420, 'De Haan', 0),
(13, 8420, 'Klemskerke', 0),
(14, 8420, 'Wenduine', 0),
(15, 8430, 'Middelkerke', 0),
(16, 8450, 'Bredene', 0),
(17, 8460, 'Oudenburg', 0),
(18, 8470, 'Gistel', 0),
(19, 8470, 'Snaaskerke', 0),
(20, 8480, 'Ichtegem', 0),
(21, 8480, 'Eernegem', 0),
(22, 8490, 'Jabbeke', 0),
(23, 8490, 'Zerkegem', 0),
(24, 8500, 'Kortrijk', 1),
(25, 8501, 'Heule', 0),
(26, 8510, 'Marke', 1),
(27, 8520, 'Kuurne', 0),
(28, 8530, 'Harelbeke', 0),
(29, 8531, 'Hulste', 0),
(30, 8540, 'Deerlijk', 0),
(31, 8550, 'Zwevegem', 0),
(32, 8551, 'Heestert', 0),
(33, 8552, 'Moen', 0),
(34, 8553, 'Otegem', 0),
(35, 8560, 'Wevelgem', 1),
(36, 8560, 'Moorsele', 1),
(37, 8570, 'Anzegem', 0),
(38, 8572, 'Kaster', 0),
(39, 8573, 'Tiegem', 0),
(40, 8580, 'Avelgem', 0),
(41, 8581, 'Kerkhove', 0),
(42, 8582, 'Outrijve', 0),
(43, 8583, 'Bossuit', 0),
(44, 8587, 'Spiere-Helkijn', 0),
(45, 8600, 'Diksmuide', 0),
(46, 8601, 'Esen', 0),
(47, 8610, 'Kortemark', 0),
(48, 8610, 'Werken', 0),
(49, 8620, 'Nieuwpoort', 0),
(50, 8630, 'Veurne', 0),
(51, 8640, 'Vleteren', 0),
(52, 8640, 'Westvleteren', 0),
(53, 8640, 'Oostvleteren', 0),
(54, 8647, 'Lo-Reninge', 0),
(55, 8650, 'Houthulst', 0),
(56, 8660, 'De Panne', 0),
(57, 8670, 'Koksijde', 0),
(58, 8670, 'Oostduinkerke', 0),
(59, 8680, 'Koekelare', 0),
(60, 8690, 'Alveringem', 0),
(61, 8700, 'Tielt', 0),
(62, 8710, 'Wielsbeke', 0),
(63, 8720, 'Dentergem', 0),
(64, 8730, 'Beernem', 0),
(65, 8740, 'Pittem', 0),
(66, 8750, 'Wingene', 0),
(67, 8760, 'Meulebeke', 0),
(68, 8770, 'Ingelmunster', 0),
(69, 8780, 'Oostrozebeke', 0),
(70, 8790, 'Waregem', 0),
(71, 8791, 'Beveren-Leie', 0),
(72, 8792, 'Desselgem', 0),
(73, 8793, 'Sint-Eloois-Vijve', 0),
(74, 8800, 'Roeselare', 0),
(75, 8810, 'Lichtervelde', 0),
(76, 8820, 'Torhout', 0),
(77, 8830, 'Hooglede', 0),
(78, 8830, 'Gits', 0),
(79, 8840, 'Staden', 0),
(80, 8850, 'Ardooie', 0),
(81, 8851, 'Koolskamp', 0),
(82, 8860, 'Lendelede', 0),
(83, 8870, 'Izegem', 0),
(84, 8880, 'Ledegem', 0),
(85, 8890, 'Moorslede', 0),
(86, 8900, 'Ieper', 0),
(87, 8902, 'Zillebeke', 0),
(88, 8904, 'Boezinge', 0),
(89, 8906, 'Elverdinge', 0),
(90, 8920, 'Langemark-Poelkapelle', 0),
(91, 8930, 'Menen', 1),
(92, 8930, 'Rekkem', 1),
(93, 8930, 'Lauwe', 1),
(94, 8940, 'Wervik', 0),
(95, 8950, 'Heuvelland', 0),
(96, 8951, 'Dranouter', 0),
(97, 8952, 'Wulvergem', 0),
(98, 8953, 'Wijtschate', 0),
(99, 8954, 'Westouter', 0),
(100, 8956, 'Kemmel', 0),
(101, 8957, 'Mesen', 0),
(102, 8970, 'Poperinge', 0),
(103, 8980, 'Zonnebeke', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `postcode_id` int(11) DEFAULT NULL,
  `adress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `phone_number`, `postcode_id`, `adress`, `email`, `password`, `create_time`) VALUES
(0, 'Guest', 'Visitor', 0, 1, 'straat', 'pizziland@gmail.com', '123', '2024-07-16 08:09:08'),
(1, 'Nuno', 'Marques', 468431823, 91, 'spinnerijstraat, 4', 'nuno@test.com', '$2y$10$sFxQsiYoNrXquiIG7P6UKeOi4X5Ef4j.eTLDQjBDw6IDt4Vl0R30G', '2024-07-11 13:24:32'),
(2, 'Ines', 'Marques', 444000000, 1, 'spinnerij', 'ines@ines.com', '$2y$10$8dyc8/9Luejp8HlIt63qIO1V6q2KbG3nkr/g..8GZGGp4YxvupfNG', '2024-07-11 14:32:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `delivery_id` (`delivery_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pizza_id` (`pizza_id`),
  ADD KEY `size_id` (`size_id`) USING BTREE;

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`pizza_id`);

--
-- Indexes for table `pizza_sizes`
--
ALTER TABLE `pizza_sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `postcode`
--
ALTER TABLE `postcode`
  ADD PRIMARY KEY (`postcode_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `postcode_id` (`postcode_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `pizza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pizza_sizes`
--
ALTER TABLE `pizza_sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `postcode`
--
ALTER TABLE `postcode`
  MODIFY `postcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`delivery_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_size_id` FOREIGN KEY (`size_id`) REFERENCES `pizzas` (`pizza_id`),
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`pizza_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_postcode_postcode_id` FOREIGN KEY (`postcode_id`) REFERENCES `postcode` (`postcode_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
