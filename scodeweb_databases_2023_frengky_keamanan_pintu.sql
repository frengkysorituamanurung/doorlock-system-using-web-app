-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2023 at 12:07 PM
-- Server version: 10.6.14-MariaDB-cll-lve-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scodeweb_databases_2023_frengky_keamanan_pintu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` varchar(50) DEFAULT NULL,
  `waktu_booking` datetime DEFAULT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `id_ruangan` varchar(50) DEFAULT NULL,
  `status` enum('menunggu konfirmasi','terkonfirmasi','ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `waktu_booking`, `waktu_mulai`, `waktu_selesai`, `id_user`, `id_ruangan`, `status`) VALUES
('JAD20230614013427512', '2023-06-14 08:34:00', '2023-06-14 08:34:00', '2023-06-14 10:39:00', 'USE001', 'RUA20230614013234616', 'terkonfirmasi'),
('JAD20230614100701566', '2023-06-14 10:06:54', '2023-06-14 10:06:00', '2023-06-14 10:06:00', 'USE20230614013101797', 'RUA20230614013241935', 'terkonfirmasi'),
('JAD20230614104849288', '2023-06-14 10:48:38', '2023-06-14 10:48:00', '2023-06-14 15:48:00', 'USE001', 'RUA20230614013234616', 'terkonfirmasi'),
('JAD20230614105106895', '2023-06-14 10:49:55', '2023-06-14 15:00:00', '2023-06-15 16:00:00', 'USE20230614013101797', 'RUA20230614013241935', 'terkonfirmasi'),
('JAD20230614111147574', '2023-06-14 11:11:23', '2023-06-14 11:11:00', '2023-06-14 12:11:00', 'USE20230614013101797', 'RUA20230614013234616', 'terkonfirmasi'),
('JAD20230622181223598', '2023-06-22 18:12:04', '2023-06-22 18:13:00', '2023-06-22 18:15:00', 'USE001', 'RUA20230614013234616', 'terkonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `data_manual_open`
--

CREATE TABLE `data_manual_open` (
  `id_manual_open` varchar(50) DEFAULT NULL,
  `id_ruangan` varchar(100) DEFAULT NULL,
  `status` enum('open','close') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `data_manual_open`
--

INSERT INTO `data_manual_open` (`id_manual_open`, `id_ruangan`, `status`) VALUES
('MAN20230614013308648', 'RUA20230614013234616', 'close');

-- --------------------------------------------------------

--
-- Table structure for table `data_role`
--

CREATE TABLE `data_role` (
  `id_role` varchar(50) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `data_role`
--

INSERT INTO `data_role` (`id_role`, `role`) VALUES
('ROL20230614013017953', 'Admin'),
('ROL20230614013027121', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `data_ruangan`
--

CREATE TABLE `data_ruangan` (
  `id_ruangan` varchar(50) DEFAULT NULL,
  `nama_ruangan` varchar(100) DEFAULT NULL,
  `kode_device` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `data_ruangan`
--

INSERT INTO `data_ruangan` (`id_ruangan`, `nama_ruangan`, `kode_device`) VALUES
('RUA20230614013234616', 'Ruangan 1', 'ROOM1'),
('RUA20230614013241935', 'Ruangan 2', 'ROOM2'),
('RUA20230614013251320', 'Ruangan 3', 'ROOM3'),
('RUA20230614013745739', 'Ruangan 4', 'ROOM4');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_role` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama`, `id_role`, `username`, `password`) VALUES
('USE001', 'admin', 'ROL20230614013017953', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('USE20230614013051596', 'Satpam', 'ROL20230614013017953', 'satpam', '844fd3c289085bda3a1455c29aac8d92'),
('USE20230614013101797', 'User', 'ROL20230614013027121', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
