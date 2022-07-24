-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2022 at 02:12 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `numerosr_duo`
--

-- --------------------------------------------------------

--
-- Table structure for table `jugadas`
--

CREATE TABLE `jugadas` (
  `jugada_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `numeros` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `loteria` int(11) NOT NULL,
  `monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loteria`
--

CREATE TABLE `loteria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sorteo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `ubicacion` point NOT NULL,
  `estado` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE `usr` (
  `id` int(99) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `pass` text NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `porc` int(11) NOT NULL,
  `referidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jugadas`
--
ALTER TABLE `jugadas`
  ADD PRIMARY KEY (`jugada_id`),
  ADD KEY `fkk` (`ticket_id`),
  ADD KEY `ffk` (`loteria`);

--
-- Indexes for table `loteria`
--
ALTER TABLE `loteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`usuario_id`);

--
-- Indexes for table `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jugadas`
--
ALTER TABLE `jugadas`
  ADD CONSTRAINT `ffk` FOREIGN KEY (`loteria`) REFERENCES `loteria` (`id`),
  ADD CONSTRAINT `fkk` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk` FOREIGN KEY (`usuario_id`) REFERENCES `usr` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
