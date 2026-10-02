-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2026 at 05:56 PM
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
-- Database: `rollies_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `container_balance`
--

CREATE TABLE `container_balance` (
  `balance_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `slim_balance` int(11) DEFAULT 0,
  `round_balance` int(11) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `container_balance`
--

INSERT INTO `container_balance` (`balance_id`, `customer_id`, `slim_balance`, `round_balance`, `updated_at`) VALUES
(1, 1, 0, 0, '2026-09-30 20:11:36'),
(2, 2, 0, 0, '2026-09-30 20:11:36'),
(3, 3, 0, 0, '2026-09-30 20:11:36'),
(4, 4, 0, 0, '2026-09-30 20:11:36'),
(5, 5, 0, 0, '2026-09-30 20:11:36'),
(6, 6, 0, 0, '2026-09-30 20:11:36'),
(7, 7, 0, 0, '2026-09-30 20:11:36'),
(8, 8, 0, 0, '2026-09-30 20:11:36'),
(9, 9, 0, 0, '2026-09-30 20:11:36'),
(10, 10, 0, 0, '2026-09-30 20:11:36'),
(11, 11, 0, 0, '2026-09-30 20:11:36'),
(12, 12, 0, 0, '2026-09-30 20:11:36'),
(13, 13, 0, 0, '2026-09-30 20:11:36'),
(14, 14, 0, 0, '2026-09-30 20:11:36'),
(15, 15, 0, 0, '2026-09-30 20:11:36'),
(16, 16, 0, 0, '2026-09-30 20:11:36'),
(17, 17, 0, 0, '2026-09-30 20:11:36'),
(18, 18, 0, 0, '2026-09-30 20:11:36'),
(19, 19, 0, 0, '2026-09-30 20:11:36'),
(20, 20, 0, 0, '2026-09-30 20:11:36'),
(21, 21, 0, 0, '2026-09-30 20:11:36'),
(22, 22, 0, 0, '2026-09-30 20:11:36'),
(23, 23, 0, 0, '2026-09-30 20:11:36'),
(24, 24, 0, 0, '2026-09-30 20:11:36'),
(25, 25, 0, 0, '2026-09-30 20:11:36'),
(26, 26, 0, 0, '2026-09-30 20:11:36'),
(27, 27, 0, 0, '2026-09-30 20:11:36'),
(28, 28, 0, 0, '2026-09-30 20:11:36'),
(29, 29, 0, 0, '2026-09-30 20:11:36'),
(30, 30, 0, 0, '2026-09-30 20:11:36'),
(31, 31, 0, 0, '2026-09-30 20:11:36'),
(32, 32, 0, 0, '2026-09-30 20:11:36'),
(33, 33, 0, 0, '2026-09-30 20:11:36'),
(34, 34, 0, 0, '2026-09-30 20:11:36'),
(35, 35, 0, 0, '2026-09-30 20:11:36'),
(36, 36, 0, 0, '2026-09-30 20:11:36'),
(37, 37, 0, 0, '2026-09-30 20:11:36'),
(38, 38, 0, 0, '2026-09-30 20:11:36'),
(39, 39, 0, 0, '2026-09-30 20:11:36'),
(40, 40, 0, 0, '2026-09-30 20:11:36'),
(41, 41, 0, 0, '2026-09-30 20:11:36'),
(42, 42, 0, 0, '2026-09-30 20:11:36'),
(43, 43, 0, 0, '2026-09-30 20:11:36'),
(44, 44, 0, 0, '2026-09-30 20:11:36'),
(45, 45, 0, 0, '2026-09-30 20:11:36'),
(46, 46, 0, 0, '2026-09-30 20:11:36'),
(47, 47, 0, 0, '2026-09-30 20:11:36'),
(48, 48, 0, 0, '2026-09-30 20:11:36'),
(49, 49, 0, 0, '2026-09-30 20:11:36'),
(50, 50, 0, 0, '2026-09-30 20:11:36'),
(51, 51, 0, 0, '2026-09-30 20:11:36'),
(52, 52, 0, 0, '2026-09-30 20:11:36'),
(53, 53, 0, 0, '2026-09-30 20:11:36'),
(54, 54, 0, 0, '2026-09-30 20:11:36'),
(55, 55, 0, 0, '2026-09-30 20:11:36'),
(56, 56, 0, 0, '2026-09-30 20:11:36'),
(57, 57, 0, 0, '2026-09-30 20:11:36'),
(58, 58, 0, 0, '2026-09-30 20:11:36'),
(59, 59, 0, 0, '2026-09-30 20:11:36'),
(60, 60, 0, 0, '2026-09-30 20:11:36'),
(61, 61, 0, 0, '2026-09-30 20:11:36'),
(62, 62, 0, 0, '2026-09-30 20:11:36'),
(63, 63, 0, 0, '2026-09-30 20:11:36'),
(64, 64, 0, 0, '2026-09-30 20:11:36'),
(65, 65, 0, 0, '2026-09-30 20:11:36'),
(66, 66, 0, 0, '2026-09-30 20:11:36'),
(67, 67, 0, 0, '2026-09-30 20:11:36'),
(68, 68, 0, 0, '2026-09-30 20:11:36'),
(69, 69, 0, 0, '2026-09-30 20:11:36'),
(70, 70, 0, 0, '2026-09-30 20:11:36'),
(71, 71, 0, 0, '2026-09-30 20:11:36'),
(72, 72, 0, 0, '2026-09-30 20:11:36'),
(73, 73, 0, 0, '2026-09-30 20:11:36'),
(74, 74, 0, 0, '2026-09-30 20:11:36'),
(75, 75, 0, 0, '2026-09-30 20:11:36'),
(76, 76, 0, 0, '2026-09-30 20:11:36'),
(77, 77, 0, 0, '2026-09-30 20:11:36'),
(78, 78, 0, 0, '2026-09-30 20:11:36'),
(79, 79, 0, 0, '2026-09-30 20:11:36'),
(80, 80, 0, 0, '2026-09-30 20:11:36'),
(81, 81, 0, 0, '2026-09-30 20:11:36'),
(82, 82, 0, 0, '2026-09-30 20:11:36'),
(83, 83, 0, 0, '2026-09-30 20:11:36'),
(84, 84, 0, 0, '2026-09-30 20:11:36'),
(85, 85, 0, 0, '2026-09-30 20:11:36'),
(86, 86, 0, 0, '2026-09-30 20:11:36'),
(87, 87, 0, 0, '2026-09-30 20:11:36'),
(88, 88, 0, 0, '2026-09-30 20:11:36'),
(89, 89, 0, 0, '2026-09-30 20:11:36'),
(90, 90, 0, 0, '2026-09-30 20:11:36'),
(91, 91, 0, 0, '2026-09-30 20:11:36'),
(92, 92, 0, 0, '2026-09-30 20:11:36'),
(93, 93, 0, 0, '2026-09-30 20:11:36'),
(94, 94, 0, 0, '2026-09-30 20:11:36'),
(95, 95, 0, 0, '2026-09-30 20:11:36'),
(96, 96, 0, 0, '2026-09-30 20:11:36'),
(97, 97, 0, 0, '2026-09-30 20:11:36'),
(98, 98, 0, 0, '2026-09-30 20:11:36'),
(99, 99, 0, 0, '2026-09-30 20:11:36'),
(100, 100, 0, 0, '2026-09-30 20:11:36'),
(101, 101, 0, 0, '2026-09-30 20:11:36'),
(102, 102, 0, 0, '2026-09-30 20:11:36'),
(103, 103, 0, 0, '2026-09-30 20:11:36'),
(104, 104, 0, 0, '2026-09-30 20:11:36'),
(105, 105, 0, 0, '2026-09-30 20:11:36'),
(106, 106, 0, 0, '2026-09-30 20:11:36'),
(107, 107, 0, 0, '2026-09-30 20:11:36'),
(108, 108, 0, 0, '2026-09-30 20:11:36'),
(109, 109, 0, 0, '2026-09-30 20:11:36'),
(110, 110, 0, 0, '2026-09-30 20:11:36'),
(111, 111, 0, 0, '2026-09-30 20:11:36'),
(112, 112, 0, 0, '2026-09-30 20:11:36'),
(113, 113, 0, 0, '2026-09-30 20:11:36'),
(114, 114, 0, 0, '2026-09-30 20:11:36'),
(115, 115, 0, 0, '2026-09-30 20:11:36'),
(116, 116, 0, 0, '2026-09-30 20:11:36'),
(117, 117, 0, 0, '2026-09-30 20:11:36'),
(118, 118, 0, 0, '2026-09-30 20:11:36'),
(119, 119, 0, 0, '2026-09-30 20:11:36'),
(120, 120, 0, 0, '2026-09-30 20:11:36'),
(121, 121, 0, 0, '2026-09-30 20:11:36'),
(122, 122, 0, 0, '2026-09-30 20:11:36'),
(123, 123, 0, 0, '2026-09-30 20:11:36'),
(124, 124, 0, 0, '2026-09-30 20:11:36'),
(125, 125, 0, 0, '2026-09-30 20:11:36'),
(126, 126, 0, 0, '2026-09-30 20:11:36'),
(127, 127, 0, 0, '2026-09-30 20:11:36'),
(128, 128, 0, 0, '2026-09-30 20:11:36'),
(129, 129, 0, 0, '2026-09-30 20:11:36'),
(130, 130, 0, 0, '2026-09-30 20:11:36'),
(131, 131, 0, 0, '2026-09-30 20:11:36'),
(132, 132, 0, 0, '2026-09-30 20:11:36'),
(133, 133, 0, 0, '2026-09-30 20:11:36'),
(134, 134, 0, 0, '2026-09-30 20:11:36'),
(135, 135, 0, 0, '2026-09-30 20:11:36'),
(136, 136, 0, 0, '2026-09-30 20:11:36'),
(137, 137, 0, 0, '2026-09-30 20:11:36'),
(138, 138, 0, 0, '2026-09-30 20:11:36'),
(139, 139, 0, 0, '2026-09-30 20:11:36'),
(140, 140, 0, 0, '2026-09-30 20:11:36'),
(141, 141, 0, 0, '2026-09-30 20:11:36'),
(142, 142, 0, 0, '2026-09-30 20:11:36'),
(143, 143, 0, 0, '2026-09-30 20:11:36'),
(144, 144, 0, 0, '2026-09-30 20:11:36'),
(145, 145, 0, 0, '2026-09-30 20:11:36'),
(146, 146, 0, 0, '2026-09-30 20:11:36'),
(147, 147, 0, 0, '2026-09-30 20:11:36'),
(148, 148, 0, 0, '2026-09-30 20:11:36'),
(149, 149, 0, 0, '2026-09-30 20:11:36'),
(150, 150, 0, 0, '2026-09-30 20:11:36'),
(151, 151, 0, 0, '2026-09-30 20:11:36'),
(152, 152, 0, 0, '2026-09-30 20:11:36'),
(153, 153, 0, 0, '2026-09-30 20:11:36'),
(154, 154, 0, 0, '2026-09-30 20:11:36'),
(155, 155, 0, 0, '2026-09-30 20:11:36'),
(156, 156, 0, 0, '2026-09-30 20:11:36'),
(157, 157, 0, 0, '2026-09-30 20:11:36'),
(158, 158, 0, 0, '2026-09-30 20:11:36'),
(159, 159, 0, 0, '2026-09-30 20:11:36'),
(160, 160, 0, 0, '2026-09-30 20:11:36'),
(161, 161, 0, 0, '2026-09-30 20:11:36'),
(162, 162, 0, 0, '2026-09-30 20:11:36'),
(163, 163, 0, 0, '2026-09-30 20:11:36'),
(164, 164, 0, 0, '2026-09-30 20:11:36'),
(165, 165, 0, 0, '2026-09-30 20:11:36'),
(166, 166, 0, 0, '2026-09-30 20:11:36'),
(167, 167, 0, 0, '2026-09-30 20:11:36'),
(168, 168, 0, 0, '2026-09-30 20:11:36'),
(169, 169, 0, 0, '2026-09-30 20:11:36'),
(170, 170, 0, 0, '2026-09-30 20:11:36'),
(171, 171, 0, 0, '2026-09-30 20:11:36'),
(172, 172, 0, 0, '2026-09-30 20:11:36'),
(173, 173, 0, 0, '2026-09-30 20:11:36'),
(174, 174, 0, 0, '2026-09-30 20:11:36'),
(175, 175, 0, 0, '2026-09-30 20:11:36'),
(176, 176, 0, 0, '2026-09-30 20:11:36'),
(177, 177, 0, 0, '2026-09-30 20:11:36'),
(178, 178, 0, 0, '2026-09-30 20:11:36'),
(179, 179, 0, 0, '2026-09-30 20:11:36'),
(180, 180, 0, 0, '2026-09-30 20:11:36'),
(181, 181, 0, 0, '2026-09-30 20:11:36'),
(182, 182, 0, 0, '2026-09-30 20:11:36'),
(183, 183, 0, 0, '2026-09-30 20:11:36'),
(184, 184, 0, 0, '2026-09-30 20:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `customer_since` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Active',
  `notes` text DEFAULT NULL,
  `ownership` varchar(50) DEFAULT 'Brother'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `contact_number`, `customer_since`, `status`, `notes`, `ownership`) VALUES
(1, 'Abe Anak', '', NULL, 'Active', '', 'Brother'),
(2, 'Albert Welder', NULL, NULL, 'Active', NULL, 'Mother'),
(3, 'Alma David', NULL, NULL, 'Active', NULL, 'Mother'),
(4, 'Amy Paglinawan', NULL, NULL, 'Active', NULL, 'Brother'),
(5, 'Ando', NULL, NULL, 'Active', NULL, 'Brother'),
(6, 'Angels Eatery', NULL, NULL, 'Active', NULL, 'Brother'),
(7, 'Anto', NULL, NULL, 'Active', NULL, 'Mother'),
(8, 'Ara', NULL, NULL, 'Active', NULL, 'Brother'),
(9, 'Ariel Apt.', NULL, NULL, 'Active', NULL, 'Mother'),
(10, 'Aster', NULL, NULL, 'Active', NULL, 'Mother'),
(11, 'Belen', NULL, NULL, 'Active', NULL, 'Brother'),
(12, 'Ber', NULL, NULL, 'Active', NULL, 'Brother'),
(13, 'Boy Santiago', NULL, NULL, 'Active', NULL, 'Mother'),
(14, 'Boyet Teacher', NULL, NULL, 'Active', NULL, 'Brother'),
(15, 'Buda', NULL, NULL, 'Active', NULL, 'Brother'),
(16, 'Carina', NULL, NULL, 'Active', NULL, 'Mother'),
(17, 'Cecil Catacte', NULL, NULL, 'Active', NULL, 'Brother'),
(18, 'Cecile Oliver', NULL, NULL, 'Active', NULL, 'Brother'),
(19, 'Cely De Leon', NULL, NULL, 'Active', NULL, 'Brother'),
(20, 'Cely Santos', NULL, NULL, 'Active', NULL, 'Brother'),
(21, 'Cely Santos apt.', NULL, NULL, 'Active', NULL, 'Brother'),
(22, 'Che-Che', NULL, NULL, 'Active', NULL, 'Brother'),
(23, 'Cindy Ramos', NULL, NULL, 'Active', NULL, 'Mother'),
(24, 'Clarita', NULL, NULL, 'Active', NULL, 'Brother'),
(25, 'Daisy Lazaro', NULL, NULL, 'Active', NULL, 'Mother'),
(26, 'Dang', NULL, NULL, 'Active', NULL, 'Brother'),
(27, 'Dario', NULL, NULL, 'Active', NULL, 'Brother'),
(28, 'Doc Dennis', NULL, NULL, 'Active', NULL, 'Brother'),
(29, 'Doctora Tibagan', NULL, NULL, 'Active', NULL, 'Mother'),
(30, 'Dona Nimfa', NULL, NULL, 'Active', NULL, 'Mother'),
(31, 'Edgar Dungo', NULL, NULL, 'Active', NULL, 'Brother'),
(32, 'Edith Canoza', NULL, NULL, 'Active', NULL, 'Mother'),
(33, 'Edwin kamote', NULL, NULL, 'Active', NULL, 'Brother'),
(34, 'Eliza T-j Store', NULL, NULL, 'Active', NULL, 'Mother'),
(35, 'Hellen Rey', '', NULL, 'Active', '\r\n\r\n\r\n', 'Brother'),
(36, 'Elog', NULL, NULL, 'Active', NULL, 'Brother'),
(37, 'Emy Domingo', NULL, NULL, 'Active', NULL, 'Brother'),
(38, 'Emy Sesong', NULL, NULL, 'Active', NULL, 'Mother'),
(39, 'Erap Galvez', NULL, NULL, 'Active', NULL, 'Brother'),
(40, 'Eric pabahay', NULL, NULL, 'Active', NULL, 'Brother'),
(41, 'Eric Traktora', NULL, NULL, 'Active', NULL, 'Mother'),
(42, 'Eric Tumana', NULL, NULL, 'Active', NULL, 'Brother'),
(43, 'Eunice', NULL, NULL, 'Active', NULL, 'Brother'),
(44, 'Evelyn', NULL, NULL, 'Active', NULL, 'Mother'),
(45, 'Ferdie Melencio', NULL, NULL, 'Active', NULL, 'Brother'),
(46, 'Gado', NULL, NULL, 'Active', NULL, 'Mother'),
(47, 'Gado Kapatid', NULL, NULL, 'Active', NULL, 'Mother'),
(48, 'Gina Paglinawan', NULL, NULL, 'Active', NULL, 'Brother'),
(49, 'Gina Zablan', NULL, NULL, 'Active', NULL, 'Mother'),
(50, 'Grace Amaro', NULL, NULL, 'Active', NULL, 'Brother'),
(51, 'Harata', NULL, NULL, 'Active', NULL, 'Mother'),
(52, 'Hector', NULL, NULL, 'Active', NULL, 'Brother'),
(53, 'Hiedy', NULL, NULL, 'Active', NULL, 'Brother'),
(54, 'Honee Maximo', NULL, NULL, 'Active', NULL, 'Mother'),
(55, 'Imbet', NULL, NULL, 'Active', NULL, 'Mother'),
(56, 'Irene', NULL, NULL, 'Active', NULL, 'Brother'),
(57, 'Iyah', NULL, NULL, 'Active', NULL, 'Brother'),
(58, 'Jake', NULL, NULL, 'Active', NULL, 'Mother'),
(59, 'Jam Frozen', NULL, NULL, 'Active', NULL, 'Mother'),
(60, 'Janine Poblacion', NULL, NULL, 'Active', NULL, 'Brother'),
(61, 'Jay Ann', NULL, NULL, 'Active', NULL, 'Brother'),
(62, 'Jeff De leon', NULL, NULL, 'Active', NULL, 'Mother'),
(63, 'Jenelyn Hernandez', NULL, NULL, 'Active', NULL, 'Mother'),
(64, 'Jenelyn Store', NULL, NULL, 'Active', NULL, 'Mother'),
(65, 'Jermel', NULL, NULL, 'Active', NULL, 'Mother'),
(66, 'Jessie Espiritu', NULL, NULL, 'Active', NULL, 'Mother'),
(67, 'Jhun Yelo', NULL, NULL, 'Active', NULL, 'Mother'),
(68, 'Joel Paglinawan', NULL, NULL, 'Active', NULL, 'Brother'),
(69, 'Joey Garcia', NULL, NULL, 'Active', NULL, 'Brother'),
(70, 'Johnson Bakery', NULL, NULL, 'Active', NULL, 'Brother'),
(71, 'Jolly Ann Dacuan', NULL, NULL, 'Active', NULL, 'Brother'),
(72, 'Jonah apt.', NULL, NULL, 'Active', NULL, 'Brother'),
(73, 'Josie Ilog', NULL, NULL, 'Active', NULL, 'Brother'),
(74, 'Josie Margarita', NULL, NULL, 'Active', NULL, 'Mother'),
(75, 'Josie Ramos', NULL, NULL, 'Active', NULL, 'Mother'),
(76, 'Joy Pabahay', NULL, NULL, 'Active', NULL, 'Brother'),
(77, 'Juan Kabute', NULL, NULL, 'Active', NULL, 'Mother'),
(78, 'Juliet Margarita', NULL, NULL, 'Active', NULL, 'Mother'),
(79, 'Jumbo', NULL, NULL, 'Active', NULL, 'Brother'),
(80, 'Ka Boy Asurin', NULL, NULL, 'Active', NULL, 'Brother'),
(81, 'Ka Emeng Bahay', NULL, NULL, 'Active', NULL, 'Brother'),
(82, 'Ka Emeng Lugawan', NULL, NULL, 'Active', NULL, 'Brother'),
(83, 'Ka Eric', NULL, NULL, 'Active', NULL, 'Brother'),
(84, 'Ka Evelyn', NULL, NULL, 'Active', NULL, 'Brother'),
(85, 'Ka Mira', NULL, NULL, 'Active', NULL, 'Brother'),
(86, 'Kadyot', NULL, NULL, 'Active', NULL, 'Mother'),
(87, 'Kalapati', NULL, NULL, 'Active', NULL, 'Brother'),
(88, 'Kap de', NULL, NULL, 'Active', NULL, 'Brother'),
(89, 'Kapatid ni Eric', NULL, NULL, 'Active', NULL, 'Brother'),
(90, 'Karding', NULL, NULL, 'Active', NULL, 'Brother'),
(91, 'Katrina Paglinawan', NULL, NULL, 'Active', NULL, 'Brother'),
(92, 'Kit', NULL, NULL, 'Active', NULL, 'Mother'),
(93, 'Konsi Nick', NULL, NULL, 'Active', NULL, 'Mother'),
(94, 'Lanie', NULL, NULL, 'Active', NULL, 'Brother'),
(95, 'Lara', NULL, NULL, 'Active', NULL, 'Brother'),
(96, 'Laundry Menor', NULL, NULL, 'Active', NULL, 'Mother'),
(97, 'Leny Pab', NULL, NULL, 'Active', NULL, 'Brother'),
(98, 'Leo Buko', NULL, NULL, 'Active', NULL, 'Mother'),
(99, 'Leslie Kagulit', NULL, NULL, 'Active', NULL, 'Mother'),
(100, 'Letty Manlapaz', NULL, NULL, 'Active', NULL, 'Mother'),
(101, 'Lito Hernandez', NULL, NULL, 'Active', NULL, 'Mother'),
(102, 'Lito Poultry', NULL, NULL, 'Active', NULL, 'Mother'),
(103, 'Loida Pining', NULL, NULL, 'Active', NULL, 'Brother'),
(104, 'Loleng', NULL, NULL, 'Active', NULL, 'Brother'),
(105, 'Lucy Poultry', NULL, NULL, 'Active', NULL, 'Mother'),
(106, 'Lyn', NULL, NULL, 'Active', NULL, 'Brother'),
(107, 'Lyn che che', NULL, NULL, 'Active', NULL, 'Brother'),
(108, 'Lyn Pizza', NULL, NULL, 'Active', NULL, 'Brother'),
(109, 'Malou', NULL, NULL, 'Active', NULL, 'Brother'),
(110, 'Malou David', NULL, NULL, 'Active', NULL, 'Brother'),
(111, 'Mang Jose', NULL, NULL, 'Active', NULL, 'Brother'),
(112, 'Manilyn Liansana', NULL, NULL, 'Active', NULL, 'Brother'),
(113, 'Marielle Reyes', NULL, NULL, 'Active', NULL, 'Mother'),
(114, 'Marife', NULL, NULL, 'Active', NULL, 'Brother'),
(115, 'Marjorie', NULL, NULL, 'Active', NULL, 'Brother'),
(116, 'Mark Torno', NULL, NULL, 'Active', NULL, 'Brother'),
(117, 'Marty MALAMIG', NULL, NULL, 'Active', NULL, 'Mother'),
(118, 'May Kagulit', NULL, NULL, 'Active', NULL, 'Brother'),
(119, 'Mega Saver', NULL, NULL, 'Active', NULL, 'Brother'),
(120, 'Mercy', NULL, NULL, 'Active', NULL, 'Brother'),
(121, 'Mercy Malamig', NULL, NULL, 'Active', NULL, 'Mother'),
(122, 'Mercy Rampa', NULL, NULL, 'Active', NULL, 'Mother'),
(123, 'Merly kabet', NULL, NULL, 'Active', NULL, 'Mother'),
(124, 'Merly Martin', NULL, NULL, 'Active', NULL, 'Mother'),
(125, 'Michelle', NULL, NULL, 'Active', NULL, 'Brother'),
(126, 'Motolite', NULL, NULL, 'Active', NULL, 'Mother'),
(127, 'Mylene', NULL, NULL, 'Active', NULL, 'Mother'),
(128, 'Nelson Barcelona', NULL, NULL, 'Active', NULL, 'Mother'),
(129, 'Neneth Asiang', NULL, NULL, 'Active', NULL, 'Brother'),
(130, 'Neo', NULL, NULL, 'Active', NULL, 'Brother'),
(131, 'Noli Gina', NULL, NULL, 'Active', NULL, 'Brother'),
(132, 'Norlita', NULL, NULL, 'Active', NULL, 'Brother'),
(133, 'Offie', NULL, NULL, 'Active', NULL, 'Brother'),
(134, 'Olan Margarita', NULL, NULL, 'Active', NULL, 'Mother'),
(135, 'Oliver Nanay', NULL, NULL, 'Active', NULL, 'Brother'),
(136, 'Omar Ramos', NULL, NULL, 'Active', NULL, 'Brother'),
(137, 'Ome', NULL, NULL, 'Active', NULL, 'Brother'),
(138, 'Orly Espiritu', NULL, NULL, 'Active', NULL, 'Mother'),
(139, 'Ortega', NULL, NULL, 'Active', NULL, 'Mother'),
(140, 'Palawan Baliuag', NULL, NULL, 'Active', NULL, 'Brother'),
(141, 'Palawan Bustos', NULL, NULL, 'Active', NULL, 'Brother'),
(142, 'Panggot', NULL, NULL, 'Active', NULL, 'Mother'),
(143, 'Patola', NULL, NULL, 'Active', NULL, 'Brother'),
(144, 'Pavia', NULL, NULL, 'Active', NULL, 'Brother'),
(145, 'Pavia Tatay', NULL, NULL, 'Active', NULL, 'Mother'),
(146, 'Randy', NULL, NULL, 'Active', NULL, 'Brother'),
(147, 'Raquel', NULL, NULL, 'Active', NULL, 'Brother'),
(148, 'Rellama', NULL, NULL, 'Active', NULL, 'Brother'),
(149, 'Rex Santos', NULL, NULL, 'Active', NULL, 'Brother'),
(150, 'Rhea Kagulit', NULL, NULL, 'Active', NULL, 'Brother'),
(151, 'Rhea Malamig', NULL, NULL, 'Active', NULL, 'Brother'),
(152, 'Rhea-Shela', NULL, NULL, 'Active', NULL, 'Brother'),
(153, 'Riam', NULL, NULL, 'Active', NULL, 'Brother'),
(154, 'Rod Manalili', NULL, NULL, 'Active', NULL, 'Brother'),
(155, 'Romy Santos', NULL, NULL, 'Active', NULL, 'Brother'),
(156, 'Ronald Garcia', NULL, NULL, 'Active', NULL, 'Brother'),
(157, 'Rose', NULL, NULL, 'Active', NULL, 'Brother'),
(158, 'Rose Subdivision', NULL, NULL, 'Active', NULL, 'Mother'),
(159, 'Rowena', NULL, NULL, 'Active', NULL, 'Brother'),
(160, 'Rowena Caniza', NULL, NULL, 'Active', NULL, 'Mother'),
(161, 'Sally', NULL, NULL, 'Active', NULL, 'Brother'),
(162, 'Sara', NULL, NULL, 'Active', NULL, 'Brother'),
(163, 'Serio Martin', NULL, NULL, 'Active', NULL, 'Brother'),
(164, 'Seyer Shane', NULL, NULL, 'Active', NULL, 'Brother'),
(165, 'Shela', NULL, NULL, 'Active', NULL, 'Mother'),
(166, 'Sherly', NULL, NULL, 'Active', NULL, 'Brother'),
(167, 'Sonny Buko', NULL, NULL, 'Active', NULL, 'Brother'),
(168, 'Suzuki', NULL, NULL, 'Active', NULL, 'Brother'),
(169, 'Tambie', NULL, NULL, 'Active', NULL, 'Mother'),
(170, 'Tantong', NULL, NULL, 'Active', NULL, 'Brother'),
(171, 'Tess', NULL, NULL, 'Active', NULL, 'Brother'),
(172, 'Tessie Yolly', NULL, NULL, 'Active', NULL, 'Brother'),
(173, 'Teteng', NULL, NULL, 'Active', NULL, 'Brother'),
(174, 'Teteng Store', NULL, NULL, 'Active', NULL, 'Brother'),
(175, 'Timmy', NULL, NULL, 'Active', NULL, 'Brother'),
(176, 'Tina Shela', NULL, NULL, 'Active', NULL, 'Brother'),
(177, 'Tita Jasper', NULL, NULL, 'Active', NULL, 'Brother'),
(178, 'Unli Sarap', NULL, NULL, 'Active', NULL, 'Brother'),
(179, 'Vega', NULL, NULL, 'Active', NULL, 'Brother'),
(180, 'Waling', NULL, NULL, 'Active', NULL, 'Brother'),
(181, 'Weng', NULL, NULL, 'Active', NULL, 'Mother'),
(182, 'Weng Church', NULL, NULL, 'Active', NULL, 'Mother'),
(183, 'Winnie', NULL, NULL, 'Active', NULL, 'Brother'),
(184, 'Yolly Bong', NULL, NULL, 'Active', NULL, 'Brother');

-- --------------------------------------------------------

--
-- Table structure for table `customer_locations`
--

CREATE TABLE `customer_locations` (
  `location_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_prices`
--

CREATE TABLE `customer_prices` (
  `price_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `gallon_type` varchar(20) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `delivery_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `slim_out` int(11) DEFAULT 0,
  `round_out` int(11) DEFAULT 0,
  `slim_return` int(11) DEFAULT 0,
  `round_return` int(11) DEFAULT 0,
  `total_amount` decimal(10,2) DEFAULT 0.00,
  `payment_status` varchar(20) DEFAULT 'Paid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `manual_amount` decimal(10,2) DEFAULT NULL,
  `ownership` varchar(50) DEFAULT 'Brother'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`delivery_id`, `trip_id`, `customer_id`, `location_id`, `slim_out`, `round_out`, `slim_return`, `round_return`, `total_amount`, `payment_status`, `created_at`, `manual_amount`, `ownership`) VALUES
(1, 1, 60, NULL, 2, 9, 2, 8, 250.00, 'Paid', '2026-10-02 14:39:49', NULL, 'Brother'),
(2, 1, 71, NULL, 9, 0, 9, 0, 180.00, 'Paid', '2026-10-02 14:40:16', NULL, 'Brother');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Active',
  `salary_type` varchar(50) DEFAULT NULL,
  `salary_rate` decimal(10,2) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `role`, `status`, `salary_type`, `salary_rate`, `hire_date`, `end_date`) VALUES
(1, 'Jhazz', 'Driver', 'Active', 'Per Gallon', 4.00, NULL, NULL),
(2, 'Laurence', 'Refiller', 'Active', 'Fixed', 400.00, '2026-09-01', '0000-00-00'),
(3, 'Arjay', 'Cleaner', 'Active', 'Fixed', 400.00, NULL, NULL),
(4, 'Daryl', 'Driver', 'Active', 'Per Gallon', 4.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL,
  `expense_date` date DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_date`, `category`, `amount`, `description`) VALUES
(1, '2026-09-01', 'Water Test', 40.00, '\r\n'),
(2, '2026-09-01', 'Internet', 30.00, '\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `gallon_inventory`
--

CREATE TABLE `gallon_inventory` (
  `gallon_id` int(11) NOT NULL,
  `gallon_number` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `current_customer_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallon_records`
--

CREATE TABLE `gallon_records` (
  `gallon_record_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `slim_borrowed` int(11) DEFAULT 0,
  `round_borrowed` int(11) DEFAULT 0,
  `slim_returned` int(11) DEFAULT 0,
  `round_returned` int(11) DEFAULT 0,
  `balance` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallon_records`
--

INSERT INTO `gallon_records` (`gallon_record_id`, `customer_id`, `delivery_id`, `slim_borrowed`, `round_borrowed`, `slim_returned`, `round_returned`, `balance`) VALUES
(1, 60, 1, 2, 9, 2, 8, 1),
(2, 71, 2, 9, 0, 9, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `customer_id`, `delivery_id`, `payment_date`, `amount`, `payment_method`) VALUES
(1, 60, NULL, '2026-09-01', 250.00, 'Cash'),
(2, 71, NULL, '2026-09-01', 180.00, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `salary_records`
--

CREATE TABLE `salary_records` (
  `salary_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_date` date NOT NULL,
  `salary_type` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `computed_amount` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_records`
--

INSERT INTO `salary_records` (`salary_id`, `employee_id`, `salary_date`, `salary_type`, `amount`, `notes`, `computed_amount`) VALUES
(1, 4, '2026-09-01', '', 80.00, '\r\n', 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `salary_rules`
--

CREATE TABLE `salary_rules` (
  `rule_id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `calculation_type` varchar(50) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_rules`
--

INSERT INTO `salary_rules` (`rule_id`, `role`, `calculation_type`, `rate`) VALUES
(1, 'Driver', 'Per Gallon', 4.00),
(2, 'Refiller', 'Fixed', 400.00),
(3, 'Cleaner', 'Fixed', 400.00),
(4, 'Helper', 'Per Gallon', 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trip_id` int(11) NOT NULL,
  `trip_date` date NOT NULL,
  `driver_id` int(11) NOT NULL,
  `helper_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `refiller_id` int(11) DEFAULT NULL,
  `cleaner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `trip_date`, `driver_id`, `helper_id`, `notes`, `refiller_id`, `cleaner_id`) VALUES
(1, '2026-09-01', 4, NULL, '', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `trip_inventory`
--

CREATE TABLE `trip_inventory` (
  `inventory_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `slim_loaded` int(11) DEFAULT 0,
  `round_loaded` int(11) DEFAULT 0,
  `slim_returned` int(11) DEFAULT 0,
  `round_returned` int(11) DEFAULT 0,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip_inventory`
--

INSERT INTO `trip_inventory` (`inventory_id`, `trip_id`, `slim_loaded`, `round_loaded`, `slim_returned`, `round_returned`, `notes`) VALUES
(1, 1, 11, 9, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'password', '2026-09-30 10:04:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `container_balance`
--
ALTER TABLE `container_balance`
  ADD PRIMARY KEY (`balance_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_locations`
--
ALTER TABLE `customer_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_prices`
--
ALTER TABLE `customer_prices`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `trip_id` (`trip_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `gallon_inventory`
--
ALTER TABLE `gallon_inventory`
  ADD PRIMARY KEY (`gallon_id`),
  ADD KEY `current_customer_id` (`current_customer_id`);

--
-- Indexes for table `gallon_records`
--
ALTER TABLE `gallon_records`
  ADD PRIMARY KEY (`gallon_record_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `delivery_id` (`delivery_id`);

--
-- Indexes for table `salary_records`
--
ALTER TABLE `salary_records`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `salary_rules`
--
ALTER TABLE `salary_rules`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `helper_id` (`helper_id`);

--
-- Indexes for table `trip_inventory`
--
ALTER TABLE `trip_inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `container_balance`
--
ALTER TABLE `container_balance`
  MODIFY `balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `customer_locations`
--
ALTER TABLE `customer_locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_prices`
--
ALTER TABLE `customer_prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallon_inventory`
--
ALTER TABLE `gallon_inventory`
  MODIFY `gallon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallon_records`
--
ALTER TABLE `gallon_records`
  MODIFY `gallon_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary_records`
--
ALTER TABLE `salary_records`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary_rules`
--
ALTER TABLE `salary_rules`
  MODIFY `rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trip_inventory`
--
ALTER TABLE `trip_inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `container_balance`
--
ALTER TABLE `container_balance`
  ADD CONSTRAINT `container_balance_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `customer_locations`
--
ALTER TABLE `customer_locations`
  ADD CONSTRAINT `customer_locations_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `customer_prices`
--
ALTER TABLE `customer_prices`
  ADD CONSTRAINT `customer_prices_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`trip_id`),
  ADD CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `deliveries_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `customer_locations` (`location_id`);

--
-- Constraints for table `gallon_records`
--
ALTER TABLE `gallon_records`
  ADD CONSTRAINT `gallon_records_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`delivery_id`);

--
-- Constraints for table `salary_records`
--
ALTER TABLE `salary_records`
  ADD CONSTRAINT `salary_records_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`helper_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `trip_inventory`
--
ALTER TABLE `trip_inventory`
  ADD CONSTRAINT `trip_inventory_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`trip_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
