-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 03:38 PM
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
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `meal_name` varchar(50) NOT NULL,
  `meal_img` text NOT NULL,
  `ingr_1` varchar(50) NOT NULL,
  `ingr_2` varchar(50) NOT NULL,
  `ingr_3` varchar(50) NOT NULL,
  `ingr_4` varchar(50) NOT NULL,
  `ingr_prc_1` float NOT NULL,
  `ingr_prc_2` float NOT NULL,
  `ingr_prc_3` float NOT NULL,
  `ingr_prc_4` float NOT NULL,
  `meal_price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(50,0) NOT NULL,
  `ingredient_1` varchar(50) NOT NULL,
  `ingredient_2` varchar(50) NOT NULL,
  `ingredient_3` varchar(50) NOT NULL,
  `ingredient_4` varchar(50) NOT NULL,
  `ingr_price_1` float NOT NULL,
  `ingr_price_2` float NOT NULL,
  `ingr_price_3` float NOT NULL,
  `ingr_price_4` float NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `price`, `ingredient_1`, `ingredient_2`, `ingredient_3`, `ingredient_4`, `ingr_price_1`, `ingr_price_2`, `ingr_price_3`, `ingr_price_4`, `img`) VALUES
(21, 'Cevapi', 8, 'Meso', 'Lepinja', 'Luk', 'Kajmak', 5, 1, 0.5, 1.5, 'media/663a0f07918e3_1715080967.jpg'),
(22, 'Hamburger', 9, 'Meso', 'Kajzerica', 'Krastavci', 'Pomfrit', 5, 2, 0.5, 1.5, 'media/663a1e19a5e4c_1715084825.jpg'),
(23, 'Bolognese', 8, 'Meso', 'Pasta', 'Luk', 'Paradajz sos', 4, 2, 0.5, 1, 'media/663a1e44301e2_1715084868.jpg'),
(24, 'Palacinke', 7, 'Brasno', 'Jaja', 'Nutela', 'Plazma', 1, 2, 3, 1, 'media/663a1e722d840_1715084914.jpg'),
(25, 'Capricciosa', 12, 'Brasno', 'Paradajz sos', 'Sunka', 'Sir', 2, 2, 4, 4, 'media/663a1eb9d2a7c_1715084985.jpg'),
(26, 'Bolognese', 12, 'Pasta', 'Meso', 'Paradajz sos', 'Sir', 3, 4, 1, 4, 'media/663a1ee13c13f_1715085025.jpg'),
(27, 'Baklava', 8, 'Jufke', 'Orasi', 'Pistacije', 'Med', 2, 2, 2, 2, 'media/663a1f19a0831_1715085081.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
