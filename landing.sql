-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2024 at 01:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landing`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `idseller` int(30) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `gambar` text NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `idseller`, `nama`, `deskripsi`, `tanggal`, `lokasi`, `jam`, `gambar`, `harga`) VALUES
(21, 22, 'tes id argsaa', 'tes id sellereadwasdf', '2024-05-20', 'siduarju', '20:08', 'Screen Shot 2024-04-30 at 14.58.16.png', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `idc` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `uid` int(10) NOT NULL,
  `unik` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `idc`, `total`, `payment`, `uid`, `unik`, `status`) VALUES
(21, 22, 22000, 'transfer', 3, '271a3df50e4bacb4', 0),
(26, 27, 12000, 'dana', 3, '59ea5bc03fcfd66d', 0),
(32, 27, 12000, 'ovo', 3, '6a83571be14c76e5', 0),
(36, 21, 32000, 'dana', 3, '916ffeeb524e8384', 1),
(38, 28, 62000, 'dana', 3, 'd7eaf9e0aaeb5fc5', 1),
(39, 21, 32000, 'bca', 3, '427fb5be7e2e53ec', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`) VALUES
(3, 'vaio', 'ganendrajawa@gmail.com', '999', 'user'),
(5, 'arga', 'jawa@tes.com', '26', 'user'),
(6, 'b', 'admin@h.c', '222', 'user'),
(7, 'c', '1@e.b', '1234', 'user'),
(8, 'd', 'o@o.o', '555', 'user'),
(9, 'e', 's@s.s', '888', 'user'),
(10, 'f', 't@t.t', '223', 'user'),
(11, 'Jawa', 'v@v.v', '444', 'user'),
(12, 'Mister Potato', 'l@l.l', '898', 'user'),
(13, 'Ganendra', 'r@r.r', '444', 'user'),
(14, 'Nabil', 'nabil@d.d', '345', 'user'),
(15, 'ARGAAA', 'arga@n.c', '777', 'user'),
(16, 'admin tes', 'bebas@g.g', '111', 'admin'),
(17, 'rajindra', 'rajindra@gmail.com', '67', 'admin'),
(18, 'add user', 'add@g.g', 'alamak', 'user'),
(19, 'gaga', 'gaga@gmail.com', '123123', 'admin'),
(20, 'tes regist', 'h@h.h', '666', 'user'),
(22, 'bakoel frozen', 'seller@s.s', '222', 'seller'),
(23, 'seller 2', 'seller2@g.g', '222', 'seller'),
(24, 'vano', 'va@gmail.com', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idseller` (`idseller`),
  ADD KEY `idseller_2` (`idseller`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_payment` (`uid`),
  ADD KEY `idc` (`idc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
