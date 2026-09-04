-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2026 at 02:50 AM
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
-- Database: `comedor_universitario`
--

-- --------------------------------------------------------

--
-- Table structure for table `localidades`
--
USE `comedor_universitario`;
CREATE TABLE `localidades` (
  `id_localidad` int(11) NOT NULL,
  `nombre_localidad` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `localidades`
--

INSERT INTO `localidades` (`id_localidad`, `nombre_localidad`) VALUES
(1, 'Salta Capital'),
(2, 'Oran'),
(3, 'Tartagal');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` tinyint(4) NOT NULL,
  `nombre_rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_beca`
--

CREATE TABLE `tipo_beca` (
  `id_beca` int(11) NOT NULL,
  `nombre_beca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_beca`
--

INSERT INTO `tipo_beca` (`id_beca`, `nombre_beca`) VALUES
(1, 'Total'),
(2, 'Parcial');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_beca` int(11) DEFAULT NULL,
  `id_rol` tinyint(4) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `dni`, `nombre`, `apellido`, `id_localidad`, `email`, `contraseña`, `estado`, `id_beca`, `id_rol`) VALUES
(1, '44136272', 'lisandro', 'rodriguez', 1, 'liisprex@gmail.com', '$2y$10$oighf7hGbOIRpA90DKulj.l/3q405KywYrQOlLb2COWVUPfZHuFDO', 1, 1, 1),
(2, '43440652', 'Alfonsina Mariel', 'Schiavoni', 2, 'prueba@gmail.com', '$2y$10$.QTBll9yyb.7LmAEOS69M.FYK4CZzinjRJ2CN.LCj.xKIGj1Y6Erm', 1, 1, 2),
(3, '12345678', 'Pablo', 'Zurro', 3, 'prueba1@gmail.com', '$2y$10$dQ6iyU//bk/wPFP1BvLM9e5BetlLvEO2Ir52lf4zIMeE5QVFEp456', 1, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `tipo_beca`
--
ALTER TABLE `tipo_beca`
  ADD PRIMARY KEY (`id_beca`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `dni_2` (`dni`,`email`),
  ADD KEY `id_localidad` (`id_localidad`),
  ADD KEY `id_beca` (`id_beca`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipo_beca`
--
ALTER TABLE `tipo_beca`
  MODIFY `id_beca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `localidades` (`id_localidad`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_beca`) REFERENCES `tipo_beca` (`id_beca`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
