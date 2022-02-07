-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2022 at 05:00 AM
-- Server version: 8.0.18
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forfaits_voyages`
--

-- --------------------------------------------------------

--
-- Table structure for table `forfaits`
--

CREATE TABLE `forfaits` (
  `id` int(11) NOT NULL,
  `destination` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `date_depart` date NOT NULL,
  `date_arrivee` date NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `rabais` decimal(10,0) DEFAULT NULL,
  `vedette` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ville_depart` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `hotel_nom` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `hotel_caracteristiques` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hotel_nbetoiles` decimal(10,0) NOT NULL,
  `hotel_nbchambres` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forfaits`
--

INSERT INTO `forfaits` (`id`, `destination`, `date_depart`, `date_arrivee`, `prix`, `rabais`, `vedette`, `ville_depart`, `hotel_nom`, `hotel_caracteristiques`, `hotel_nbetoiles`, `hotel_nbchambres`) VALUES
(1, 'Bali', '2022-01-03', '2022-01-10', '3000', '200', 'true', 'Boston', 'Baba', 'Piscine, Ascenseur', '5', '50'),
(2, 'New York', '2022-02-10', '2022-02-14', '350', NULL, 'false', 'Montreal', 'NYC hotel', 'piscine', '3', '15'),
(3, 'Colombie-Britannique', '2022-03-03', '2022-03-13', '1500', NULL, 'false', 'Montreal', 'White Mountains', 'stationnement, piscine', '5', '0'),
(4, 'Cuba', '2023-02-05', '2023-02-12', '800', NULL, 'true', 'Montreal', 'Cuba Libre', 'plage, piscine', '2', '10'),
(5, 'Punta Cana', '2023-02-05', '2023-02-12', '2500', NULL, 'false', 'Montreal', 'Habana', 'Piscine, Plage', '5', '200'),
(6, 'Cuba', '2023-02-05', '2023-02-12', '100', NULL, 'false', 'Montreal', 'Cubain Motel', 'piscine', '2', '150');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forfaits`
--
ALTER TABLE `forfaits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forfaits`
--
ALTER TABLE `forfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
