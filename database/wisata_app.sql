-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 04:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(2, 'andra', 'andraqbz@gmail.com', '$2y$10$maPBUlLCHbpHQd2ZctKrmubCHwNTasFBkFb/wK8jolmW/OCFBP3ke', 'user'),
(5, 'nadia', 'nadia@gmail.com', '$2y$10$PQGzLqAkO6Vjt1biWCnWQ.HEVQTCHxuJEAXg4UbcxO7O5HlmrMrR2', 'user'),
(6, 'Admin', 'admin@mail.com', 'admin123', 'admin'),
(7, 'nadia', 'andraqbz12@gmail.com', '$2y$10$6Q0vDLgdDu0l1CAaXA3juetNP2q1W.f1q.qKtNY5tjoNh0YmxLGLi', 'user'),
(8, 'andra123', 'andraqbz17@gmail.com', '$2y$10$E2xlT01hW5aYuloB4E8OY.uEsSc2j69Z5nGf0NGDF5mTzKxaK1M3q', 'user'),
(9, 'andora', 'andora123@gmail.com', '$2y$10$VP3GH/0AUWwbYvKZhjh49.0SjWVRME./ncSBzdDmWkRolPjzigYz.', 'user'),
(10, 'asasas', 'nad@gmail.com', '', 'user'),
(11, 'lefi', 'lefi@gmail.com', 'lefi', 'user'),
(12, 'andra123', 'giga@gmail.com', '$2y$10$N1jEa04.Oyh6r4jyH7g8S.xBHz7VcKFf.K3iMyhOD/rUmdtM6iluq', 'user'),
(13, 'sdsds', 'sdsd@gmail.com', '$2y$10$LGirFkf.6Ys1BL2JpmDt1OPfOU5VK9s48xoNAhl9KR2DtrPn9xnim', 'user'),
(14, 'kk', '12@gmail.com', '', 'user'),
(15, 'akak', 'ak@gmail.com', '', 'user'),
(16, 'lokj', 'l@gmail.com', '123', 'user'),
(17, 'Almas', 'almas@gmail.com', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `gmap_link` text DEFAULT NULL,
  `jam_buka` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `fasilitas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `provinsi`, `kategori`, `deskripsi`, `foto`, `gmap_link`, `jam_buka`, `harga`, `fasilitas`) VALUES
(3, 'AASD', 'Jawa Tengah', 'Sejarah & Budaya', 'ADS', 'User (1).jpg', 'ASDADS', 'ASDAD', 0, 'ASDAD'),
(7, 'prambanan', 'DIY', 'Sejarah & Budaya', 'alsmdkansdjbhajsda', 'download (1).jpeg', 'https://maps.app.goo.gl/ixeF5VSrK5cCeCL87', '1212', 2121212, 'asdad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
