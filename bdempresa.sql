-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 01:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdempresa`
--

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` int(11) NOT NULL,
  `nombre_proveedor` varchar(80) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `nombre_proveedor`, `direccion`, `telefono`) VALUES
(1, 'Soalpro', 'Camino a viacha #1012', 24708836),
(2, 'La Estrella', 'Camino Oruro #456', 2459963),
(3, 'Arcor', 'Cruce Viacha #1236', 2472988);

-- --------------------------------------------------------

--
-- Table structure for table `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(80) NOT NULL,
  `descripcion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcategoria`
--

INSERT INTO `tbcategoria` (`id_categoria`, `nombre_categoria`, `descripcion`) VALUES
(1, 'Dulces', 'Muy bueno'),
(2, 'Fideos', 'Promocion de agosto'),
(3, 'Ola', 'Limpieza de Ollas');

-- --------------------------------------------------------

--
-- Table structure for table `tbproducto`
--

CREATE TABLE `tbproducto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbproducto`
--

INSERT INTO `tbproducto` (`id_producto`, `nombre`, `cantidad`, `precio`, `id_categoria`, `id_proveedor`) VALUES
(1, 'Sublime', 12, 3, 1, 3),
(2, 'Ola Limpiador', 40, 10, 3, 1),
(3, 'Fideo Codito', 30, 5, 2, 2),
(4, 'asas', 12, 65, 2, 1),
(5, 'ddsf', 14, 96, 1, 2),
(6, 'ddsf', 14, 96, 1, 2),
(7, 'dfd', 5, 2, 3, 1),
(8, 'tty', 34, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbproveedor`
--

CREATE TABLE `tbproveedor` (
  `nombre_proveedor` varchar(80) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `tbproducto`
--
ALTER TABLE `tbproducto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbproducto`
--
ALTER TABLE `tbproducto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbproducto`
--
ALTER TABLE `tbproducto`
  ADD CONSTRAINT `tbproducto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tbcategoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbproducto_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_prov`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
