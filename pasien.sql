-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 04:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasien`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(9) NOT NULL,
  `X1_1` double DEFAULT NULL,
  `X1_2` double DEFAULT NULL,
  `X1_3` double DEFAULT NULL,
  `X1_4` double DEFAULT NULL,
  `X2_1` double DEFAULT NULL,
  `X2_2` double DEFAULT NULL,
  `X2_3` double DEFAULT NULL,
  `X2_4` double DEFAULT NULL,
  `X3_1` double DEFAULT NULL,
  `X3_2` double DEFAULT NULL,
  `X3_3` double DEFAULT NULL,
  `X3_4` double DEFAULT NULL,
  `X4_1` double DEFAULT NULL,
  `X4_2` double DEFAULT NULL,
  `X4_3` double DEFAULT NULL,
  `X4_4` double DEFAULT NULL,
  `X5_1` double DEFAULT NULL,
  `X5_2` double DEFAULT NULL,
  `X5_3` double DEFAULT NULL,
  `X5_4` double DEFAULT NULL,
  `X5_5` double DEFAULT NULL,
  `Y1` double DEFAULT NULL,
  `Y2` double DEFAULT NULL,
  `Y3` double DEFAULT NULL,
  `Y4` double DEFAULT NULL,
  `Y5` double DEFAULT NULL,
  `rata_x1` double DEFAULT NULL,
  `rata_x2` double DEFAULT NULL,
  `rata_x3` double DEFAULT NULL,
  `rata_x4` double DEFAULT NULL,
  `rata_x5` double DEFAULT NULL,
  `rata_y` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `X1_1`, `X1_2`, `X1_3`, `X1_4`, `X2_1`, `X2_2`, `X2_3`, `X2_4`, `X3_1`, `X3_2`, `X3_3`, `X3_4`, `X4_1`, `X4_2`, `X4_3`, `X4_4`, `X5_1`, `X5_2`, `X5_3`, `X5_4`, `X5_5`, `Y1`, `Y2`, `Y3`, `Y4`, `Y5`, `rata_x1`, `rata_x2`, `rata_x3`, `rata_x4`, `rata_x5`, `rata_y`) VALUES
(1, 2, 2, 2, 3, 3, 3, 3, 1, 3, 3, 3, 3, 3, 3, 3, 3, 3, 2, 2, 2, 3, 3, 3, 3, 3, 3, 2.25, 2.5, 3, 3, 2.4, 3),
(2, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3.25, 3, 3, 3, 3.2),
(3, 3, 3, 3, 3, 4, 4, 3, 1, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3, 3, 3),
(4, 3, 3, 3, 3, 4, 3, 3, 3, 2, 3, 2, 3, 3, 2, 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 3, 3, 3, 3.25, 2.5, 2.75, 2.8, 3),
(5, 3, 3, 4, 3, 3, 4, 3, 2, 3, 2, 2, 4, 4, 3, 4, 3, 4, 4, 4, 4, 3, 3, 3, 4, 3, 4, 3.25, 3, 2.75, 3.5, 3.8, 3.4),
(6, 2, 3, 3, 3, 4, 3, 4, 2, 3, 3, 3, 3, 3, 4, 4, 4, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 2.75, 3.25, 3, 3.75, 3.2, 3),
(7, 4, 4, 4, 4, 4, 4, 4, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3.75, 3.75, 4, 4, 4),
(8, 3, 4, 4, 4, 4, 3, 4, 1, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 4, 3, 4, 4, 3.75, 3, 3.25, 4, 3.8, 3.8),
(9, 2, 3, 4, 3, 4, 3, 3, 1, 3, 4, 3, 4, 4, 3, 4, 4, 3, 3, 3, 4, 3, 3, 3, 3, 4, 4, 3, 2.75, 3.5, 3.75, 3.2, 3.4),
(10, 3, 3, 4, 4, 3, 3, 4, 3, 3, 3, 2, 4, 3, 4, 3, 4, 4, 4, 4, 4, 3, 3, 4, 2, 4, 3, 3.5, 3.25, 3, 3.5, 3.8, 3.2),
(11, 1, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 4, 3, 2, 3, 4, 4, 4, 4, 4, 2.75, 3, 3.25, 3, 3, 4),
(12, 3, 2, 3, 3, 4, 3, 3, 2, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 4, 3, 4, 3, 4, 4, 3, 2.75, 3, 3.25, 3, 3.2, 3.6),
(13, 3, 4, 4, 3, 4, 4, 3, 2, 2, 3, 3, 3, 2, 3, 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 3, 3, 3.5, 3.25, 2.75, 2.75, 2.8, 3),
(14, 1, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 4, 3, 4, 4, 3, 3, 3, 2, 3, 3, 3, 3, 3, 3, 2.5, 3.25, 3, 3.75, 2.8, 3),
(15, 2, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 3, 3, 4, 3, 3, 4, 4, 3, 3, 3, 3, 3, 3.25, 4, 3.2, 3.4),
(16, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 3.5, 3, 2.8),
(17, 4, 3, 3, 3, 3, 3, 3, 2, 3, 4, 3, 3, 4, 4, 4, 4, 3, 3, 3, 4, 4, 4, 4, 3, 4, 4, 3.25, 2.75, 3.25, 4, 3.4, 3.8),
(18, 2, 3, 4, 3, 4, 4, 4, 2, 3, 2, 2, 3, 4, 4, 4, 4, 4, 3, 3, 2, 3, 3, 3, 3, 4, 4, 3, 3.5, 2.5, 4, 3, 3.4),
(19, 2, 3, 4, 3, 3, 3, 3, 1, 3, 3, 3, 4, 4, 3, 4, 4, 3, 3, 3, 4, 3, 3, 3, 4, 3, 3, 3, 2.5, 3.25, 3.75, 3.2, 3.2),
(20, 4, 2, 3, 2, 4, 4, 4, 3, 3, 2, 1, 3, 3, 2, 3, 2, 3, 3, 3, 2, 1, 3, 3, 3, 3, 3, 2.75, 3.75, 2.25, 2.5, 2.4, 3),
(21, 2, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 2.75, 3.25, 3, 3.25, 3, 3),
(22, 1, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 2.5, 3, 3, 3, 3, 3.2),
(23, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3, 3, 3.2, 3),
(24, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3, 3, 3, 3),
(25, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 2.75, 3, 3, 3.25, 3, 3.8),
(26, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 2.75, 3, 3, 3, 3, 3.2),
(27, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.5, 3, 3),
(28, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3, 3, 3, 3, 3),
(29, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 2.75, 3, 3, 3, 3, 3.2),
(30, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 4, 4, 3, 3, 3, 3, 3, 3, 3.6),
(31, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3, 3, 3.25, 3, 3),
(32, 4, 3, 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3.25, 2.75, 3, 3, 3, 3.2),
(33, 2, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 2.75, 3.25, 3, 3, 3, 3),
(34, 4, 3, 3, 3, 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3, 2.75, 3, 3, 3),
(35, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 4, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3.75, 3.4, 4),
(36, 2, 3, 4, 3, 3, 3, 3, 4, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3, 3.25, 3, 3),
(37, 2, 3, 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 4, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 2.75, 2.75, 3, 3.5, 3, 3),
(38, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3.25, 3.2, 3),
(39, 4, 3, 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 2.75, 3, 3, 3, 3),
(40, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3, 2.8, 3),
(41, 1, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 3, 3, 3, 3, 3, 3, 3, 2.5, 3, 3, 3, 3.4, 3),
(42, 3, 4, 4, 4, 3, 4, 3, 2, 4, 4, 4, 3, 4, 3, 3, 4, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 3.75, 3, 3.75, 3.5, 3, 4),
(43, 1, 3, 3, 3, 4, 3, 4, 4, 3, 4, 4, 4, 4, 4, 4, 4, 3, 3, 3, 4, 3, 3, 4, 3, 3, 4, 2.5, 3.75, 3.75, 4, 3.2, 3.4),
(44, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 3.25, 3, 3, 3, 3, 3.4),
(45, 1, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 2.75, 3, 3, 3.5, 3, 3),
(46, 4, 3, 4, 4, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 4, 3, 4, 2, 3, 3, 3, 3, 3, 3.75, 3, 3.25, 3, 3.2, 3),
(47, 3, 2, 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 2.75, 2.75, 3, 3.25, 3, 3),
(48, 4, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3, 3.5, 3, 3, 3),
(49, 2, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 3, 3, 3, 3.25, 3, 3.4),
(50, 3, 2, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(51, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 3, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3.2, 3),
(52, 3, 3, 3, 3, 4, 3, 3, 3, 3, 4, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.25, 3.5, 3, 3, 3),
(53, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 4, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 3, 3.25, 3, 3.5, 3, 3.6),
(54, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 3, 3, 4, 4, 4, 4, 4, 3, 3, 3, 3, 3, 3.6, 3.8),
(55, 4, 3, 3, 4, 4, 4, 4, 4, 3, 3, 4, 3, 4, 3, 3, 4, 3, 4, 3, 3, 3, 4, 4, 4, 3, 4, 3.5, 4, 3.25, 3.5, 3.2, 3.8),
(56, 3, 3, 3, 4, 3, 4, 4, 3, 4, 3, 3, 4, 3, 4, 4, 4, 4, 3, 3, 4, 4, 3, 3, 4, 3, 4, 3.25, 3.5, 3.5, 3.75, 3.6, 3.4),
(57, 4, 4, 4, 3, 3, 3, 3, 4, 3, 4, 3, 4, 4, 3, 4, 4, 4, 4, 3, 3, 4, 4, 4, 4, 4, 3, 3.75, 3.25, 3.5, 3.75, 3.6, 3.8),
(58, 3, 3, 4, 4, 4, 4, 3, 4, 4, 3, 3, 4, 4, 4, 4, 3, 3, 3, 4, 3, 4, 3, 3, 4, 4, 3, 3.5, 3.75, 3.5, 3.75, 3.4, 3.4),
(59, 3, 1, 3, 2, 3, 4, 3, 1, 3, 3, 4, 3, 4, 4, 4, 3, 3, 4, 3, 4, 3, 1, 2, 3, 4, 3, 2.25, 2.75, 3.25, 3.75, 3.4, 2.6),
(60, 2, 1, 3, 3, 4, 4, 3, 4, 2, 3, 3, 2, 2, 3, 3, 2, 3, 3, 2, 3, 3, 4, 4, 4, 3, 3, 2.25, 3.75, 2.5, 2.5, 2.8, 3.6),
(61, 3, 2, 3, 3, 3, 2, 2, 3, 3, 3, 4, 3, 4, 4, 4, 3, 4, 3, 3, 2, 3, 3, 3, 2, 4, 4, 2.75, 2.5, 3.25, 3.75, 3, 3.2),
(62, 1, 3, 4, 3, 3, 4, 4, 4, 1, 4, 2, 3, 3, 3, 4, 2, 3, 4, 3, 1, 1, 3, 3, 4, 3, 4, 2.75, 3.75, 2.5, 3, 2.4, 3.4),
(63, 2, 4, 4, 4, 4, 3, 3, 4, 4, 2, 2, 4, 4, 3, 3, 4, 4, 4, 2, 1, 2, 2, 3, 2, 4, 4, 3.5, 3.5, 3, 3.5, 2.6, 3),
(64, 4, 4, 4, 4, 3, 3, 4, 4, 3, 4, 4, 3, 4, 4, 4, 3, 3, 3, 3, 4, 4, 4, 3, 3, 4, 3, 4, 3.5, 3.5, 3.75, 3.4, 3.4),
(65, 3, 4, 4, 4, 3, 2, 4, 4, 3, 4, 4, 4, 3, 3, 3, 3, 4, 4, 3, 4, 4, 3, 3, 3, 3, 3, 3.75, 3.25, 3.75, 3, 3.8, 3),
(66, 3, 3, 4, 4, 3, 3, 3, 4, 3, 4, 4, 4, 3, 3, 4, 3, 3, 3, 3, 4, 4, 4, 3, 4, 4, 4, 3.5, 3.25, 3.75, 3.25, 3.4, 3.8),
(67, 3, 4, 4, 4, 2, 3, 3, 3, 2, 3, 3, 4, 4, 4, 4, 4, 3, 3, 4, 3, 3, 4, 4, 4, 4, 3, 3.75, 2.75, 3, 4, 3.2, 3.8),
(68, 4, 3, 4, 4, 3, 2, 1, 3, 4, 4, 3, 3, 4, 3, 2, 3, 4, 3, 3, 3, 3, 2, 3, 3, 3, 4, 3.75, 2.25, 3.5, 3, 3.2, 3),
(69, 4, 3, 4, 4, 1, 2, 3, 3, 3, 3, 3, 3, 4, 2, 4, 4, 4, 4, 4, 4, 4, 3, 1, 3, 3, 2, 3.75, 2.25, 3, 3.5, 4, 2.4),
(70, 3, 4, 4, 2, 3, 2, 4, 3, 3, 3, 3, 4, 2, 3, 4, 3, 2, 4, 4, 4, 3, 3, 3, 3, 3, 4, 3.25, 3, 3.25, 3, 3.4, 3.2),
(71, 4, 3, 3, 3, 3, 4, 2, 3, 4, 4, 4, 3, 3, 3, 4, 2, 3, 3, 2, 3, 4, 4, 3, 3, 4, 3, 3.25, 3, 3.75, 3, 3, 3.4),
(72, 1, 3, 2, 4, 1, 2, 3, 2, 3, 2, 2, 2, 4, 2, 3, 3, 2, 3, 2, 1, 1, 2, 3, 2, 2, 2, 2.5, 2, 2.25, 3, 1.8, 2.2),
(73, 2, 3, 4, 3, 3, 2, 3, 3, 2, 3, 2, 4, 4, 3, 4, 3, 3, 3, 2, 2, 3, 3, 2, 2, 3, 4, 3, 2.75, 2.75, 3.5, 2.6, 2.8),
(74, 3, 3, 4, 4, 3, 3, 2, 3, 2, 3, 3, 3, 4, 3, 3, 4, 3, 3, 2, 3, 2, 3, 3, 3, 3, 4, 3.5, 2.75, 2.75, 3.5, 2.6, 3.2),
(75, 3, 4, 4, 4, 4, 4, 3, 4, 4, 4, 4, 4, 3, 4, 3, 3, 4, 4, 4, 3, 4, 4, 3, 3, 4, 4, 3.75, 3.75, 4, 3.25, 3.8, 3.6),
(76, 3, 3, 4, 4, 4, 3, 4, 4, 4, 4, 2, 4, 3, 4, 4, 3, 3, 4, 4, 4, 4, 3, 3, 4, 4, 4, 3.5, 3.75, 3.5, 3.5, 3.8, 3.6),
(77, 4, 4, 4, 3, 3, 4, 3, 3, 4, 4, 3, 4, 3, 3, 4, 4, 3, 4, 4, 4, 4, 4, 4, 3, 4, 4, 3.75, 3.25, 3.75, 3.5, 3.8, 3.8),
(78, 4, 3, 3, 4, 3, 4, 3, 3, 3, 3, 4, 4, 4, 4, 3, 3, 4, 3, 3, 4, 3, 4, 3, 3, 3, 4, 3.5, 3.25, 3.5, 3.5, 3.4, 3.4),
(79, 2, 3, 2, 3, 3, 3, 2, 2, 1, 2, 1, 3, 3, 4, 4, 3, 3, 4, 2, 3, 1, 3, 2, 3, 3, 3, 2.5, 2.5, 1.75, 3.5, 2.6, 2.8),
(80, 3, 3, 3, 4, 4, 4, 4, 4, 4, 3, 4, 4, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 5, 4, 3, 4, 3.25, 4, 3.75, 3.25, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`) VALUES
('nia', 'nia', 'Nia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
