-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2024 at 04:53 AM
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
  `seller` varchar(30) NOT NULL,
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

INSERT INTO `event` (`id`, `seller`, `nama`, `deskripsi`, `tanggal`, `lokasi`, `jam`, `gambar`, `harga`) VALUES
(14, 'seller@s.s', 'tes seller', 'halo satu dua tiga tes email seller udah masuk atau belum', '2024-03-23', 'sidoarjo', '13:40', 'Screen Shot 2024-03-13 at 10.52.34.png', 0),
(15, 'seller@s.s', 'tes seller 2', 'abcd efgh ijkl mnop qrst uvwx yzab cdef ghij klmn opqr stuv wxyz', '2024-04-06', 'tol sumo', '22:00', 'Screen Shot 2023-08-15 at 10.28.25.png', 50000),
(18, 'seller@s.s', 'Event 1', 'tes tes tes tes tes tes tes tse tse tes tes tse tes tes tes tse tse et s se ets ', '2024-04-02', 'sidoarjo', '23:15', 'Screen Shot 2024-03-18 at 12.44.08.png', 30000),
(19, 'seller@s.s', 'event 2', 'alfjksd aljdksf alkjdsf aljkfds alkjdfs aklfjds aljskdf', '2024-03-28', 'sidoarjo', '10:24', 'Screen Shot 2024-02-29 at 17.07.34.png', 20000),
(20, 'seller@s.s', 'nabil hahok', 'adfasdfasfsafas', '2024-03-30', 'gunung kidul', '12:08', 'WhatsApp Image 2024-03-26 at 11.00.18 PM.jpeg', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `idc` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `idc`, `total`, `payment`, `email`) VALUES
(1, 18, 32000, 'qris', 'seller@s.s'),
(2, 18, 32000, 'qris', 'ganendrajawara0@gmail.com'),
(3, 15, 2000, 'qris', 'ganendrajawara0@gmail.com'),
(4, 18, 32000, 'qris', 'ganendrajawara0@gmail.com'),
(5, 15, 2000, 'qris', 'ganendrajawara0@gmail.com'),
(6, 13, 2000, 'transfer', 'ganendrajawara0@gmail.com'),
(7, 18, 32000, 'qris', 'jawa@tes.com'),
(8, 15, 2000, 'qris', 'jawa@tes.com'),
(9, 20, 22000, 'qris', 'ganendrajawara0@gmail.com'),
(10, 15, 52000, 'transfer', 'ganendrajawara0@gmail.com');

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
(3, 'JAwa', 'ganendrajawara0@gmail.com', '999', 'user'),
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
(23, 'seller 2', 'seller2@g.g', '222', 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
