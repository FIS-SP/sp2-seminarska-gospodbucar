-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 04:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spletna_trgovina_bucar`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE `artikli` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `vrsta` varchar(255) NOT NULL,
  `proizvajalec` varchar(255) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `cena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Artikli';

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`id`, `naziv`, `vrsta`, `proizvajalec`, `slika`, `opis`, `cena`) VALUES
(1, 'Avstralski kenguru', '1OZ', 'The Perth Mint', 'kenguru', '999/1000Ag', 40),
(2, 'Javorjev List', '2OZ', 'Kanadian mint', 'javor', '999/1000Ag', 45),
(3, 'Panda', '3OZ', 'China Mint', 'panda', '999/1000Ag', 90),
(4, 'Armenija Noe', '1OZ', 'Armenian mint', 'noe', '999/1000Ag', 50),
(9, 'Lunar Miš', '4Oz', 'The Perth Mint', 'mis', '999/1000Ag', 120),
(10, 'Lunar Opica', '2Oz', 'The Perth Mint', 'opica', '999/1000Ag', 60),
(11, 'Lunar pes', '3Oz', 'The Perth Mint', 'pes', '999/1000Ag', 99),
(12, 'Dunajski Filharmonik', '1Oz', 'Austrian mint', 'dunajski', '999/1000Ag', 30),
(13, 'Ameriški Orel', '1Oz', 'American mint', 'orel', '999/1000Ag', 50),
(14, 'Lunar Bik', '1Oz', 'The Perth Mint', 'bik', '999/1000Ag', 50),
(15, 'Panda 2012', '1Oz', 'China mint', 'panda1', '999/1000Ag', 48),
(16, 'Panda 2016', '1Oz', 'China mint', 'panda2', '999/1000Ag', 84),
(17, 'Ameriski Ščit', '6Oz', 'American mint', 'ameriskiscit', '999/1000Ag', 180),
(18, 'Panda 2009', '5Oz', 'China mint', 'panda3', '999/1000Ag', 150);

-- --------------------------------------------------------

--
-- Table structure for table `narocila`
--

CREATE TABLE `narocila` (
  `id` int(11) NOT NULL,
  `uporabnisko_ime` varchar(255) NOT NULL,
  `artikel` varchar(255) NOT NULL,
  `kolicina` varchar(255) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='narocila';

--
-- Dumping data for table `narocila`
--

INSERT INTO `narocila` (`id`, `uporabnisko_ime`, `artikel`, `kolicina`, `datum`) VALUES
(6, 'user', 'Srebrnik Avstralski kenguru', '1', '2022-01-08 13:25:26'),
(7, 'user', 'Armenija Noe', '3', '2022-01-08 13:53:30'),
(8, 'user', 'Javorjev List', '5', '2022-01-08 21:49:22'),
(9, 'user', 'Avstralski kenguru', '5', '2022-01-08 21:52:27'),
(10, 'user', 'Avstralski kenguru', '5', '2022-01-08 21:53:02'),
(11, 'user', 'Javorjev List', '1', '2022-01-08 21:53:07'),
(12, 'user', 'Avstralski kenguru', '4', '2022-01-08 22:04:07'),
(13, 'user', 'Avstralski kenguru', '3', '2022-01-08 22:06:58'),
(14, 'user', 'Javorjev List', '4', '2022-01-08 22:07:13'),
(15, 'user', 'Avstralski kenguru', '5', '2022-01-08 22:07:21'),
(16, 'user', 'Dunajski Filharmonik', '7', '2022-01-08 22:08:05'),
(17, 'user', 'Avstralski kenguru', '7', '2022-01-08 22:50:05'),
(18, 'user', 'Javorjev List', '6', '2022-01-08 22:50:18'),
(19, 'user', 'Javorjev List', '8', '2022-01-08 22:56:49'),
(20, 'user', 'Avstralski kenguru', '5', '2022-01-09 16:03:20'),
(21, 'Janez', 'Lunar Miš', '5', '2022-01-09 16:06:25'),
(22, 'Janez', 'Panda 2012', '8', '2022-01-09 16:06:32'),
(23, 'user', 'Avstralski kenguru', '3', '2022-01-09 16:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `uporabniki`
--

CREATE TABLE `uporabniki` (
  `id` int(11) NOT NULL,
  `uporabnisko_ime` varchar(255) NOT NULL,
  `geslo` varchar(255) NOT NULL,
  `ime_priimek` varchar(255) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `posta` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `statusAdmin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='uporabniki';

--
-- Dumping data for table `uporabniki`
--

INSERT INTO `uporabniki` (`id`, `uporabnisko_ime`, `geslo`, `ime_priimek`, `naslov`, `posta`, `email`, `statusAdmin`) VALUES
(3, 'admin', 'admin', 'admin', 'admin', 123, 'admin', 'admin'),
(4, 'user', 'user', 'user', 'user', 123, 'user', 'uporabnik'),
(6, 'Janez', 'root', 'Janez Bucar', 'lutersko selo 20', 8222, 'GOSPOD.BUCARRR@gmail.com', 'uporabnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikli`
--
ALTER TABLE `artikli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narocila`
--
ALTER TABLE `narocila`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikli`
--
ALTER TABLE `artikli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `narocila`
--
ALTER TABLE `narocila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
