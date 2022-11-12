-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 04:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekin`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipe` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `email`, `password`, `tipe`) VALUES
(1, 'Admin', 'Admin@gmail.com', '$2y$10$6TMgz3KBcleCUsPHBjaA8OxnJwdnARI0oCps8ZgDOLA6uG/KJyGG6', 'admin'),
(2, 'Jarwodd', 'jarwo@gmail.com', '$2y$10$SZHSSD1Ars1Mu5.rP5UcvuOuqQZb3j4brBDtQjWIEtt7rX9Rf4v7m', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `nama_sepatu` varchar(255) NOT NULL,
  `brand_sepatu` varchar(255) NOT NULL,
  `tipe_sepatu` varchar(255) NOT NULL,
  `warna_sepatu` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `nama_sepatu`, `brand_sepatu`, `tipe_sepatu`, `warna_sepatu`, `email`) VALUES
(1, 'Air Jordan 4 Retro', 'Nike', 'Jordan 4', 'Dark Blue', 'ihsangg@gmail.com'),
(2, 'Air Jordan 1 UNC', 'Nike', 'Jordan 1 High', 'Red and White', 'nopal123@gmail.com'),
(3, 'Converse Retro Chess', 'Converse', 'Retro', 'Black and White', 'hadieee@gmail.com'),
(4, 'ultraboost mocha', 'adidas', 'running', 'brown', 'jarwo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_review` int(11) NOT NULL,
  `gambar_sepatu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_review`, `gambar_sepatu`) VALUES
(112, 44, 'pico1.webp'),
(113, 44, 'pico2.webp'),
(114, 44, 'pico3.webp'),
(115, 44, 'pico4.webp'),
(116, 44, 'pico5.webp'),
(117, 45, 'af1.webp'),
(118, 45, 'af2.webp'),
(119, 45, 'af3.webp'),
(120, 45, 'af4.webp'),
(121, 45, 'af5.webp'),
(122, 46, 'waff1.webp'),
(123, 46, 'waff2.webp'),
(124, 46, 'waff3.webp'),
(125, 46, 'waff4.webp'),
(126, 46, 'waff5.webp'),
(127, 47, 'pega1.webp'),
(128, 47, 'pega2.webp'),
(129, 47, 'pega3.webp'),
(130, 47, 'pega4.webp'),
(131, 47, 'pega5.webp'),
(132, 48, 'lem1.webp'),
(133, 48, 'lem2.webp'),
(134, 48, 'lem3.webp'),
(135, 48, 'lem4.webp'),
(136, 48, 'lem5.webp');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `nama_sepatu` varchar(255) NOT NULL,
  `jenis_sepatu` varchar(255) NOT NULL,
  `warna_sepatu` varchar(255) NOT NULL,
  `rating_sepatu` int(11) NOT NULL,
  `review_sepatu` text NOT NULL,
  `tanggal_rilis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `nama_sepatu`, `jenis_sepatu`, `warna_sepatu`, `rating_sepatu`, `review_sepatu`, `tanggal_rilis`) VALUES
(44, 'Nike Pico 5 Lil', 'Trainer', 'Orange-White', 7, 'Follow the trail of pawprints left by your little one when they rock the Nike Pico 5. The latest release specially made for little ones is already familiar with the world of sneakers. With colors and paw parts that will surely attract them to wear it. Slip them on and let your child imagine they can run as fast as a fox when they go out to play.', '2021-07-05'),
(45, 'Nike Air Force 1 &#039;07', 'Air Force', 'Triple White', 9, 'The radiance lives on in the Nike Air Force 1 &#039;07, the basketball original that puts a fresh spin on what you know best: durably stitched overlays, clean finishes and the perfect amount of flash to make you shine. This best seller made only for the best. with its white color which is certainly suitable to be combined with various colors of clothing on the body. wear the best shoes for the best display.', '2008-05-01'),
(46, 'Nike Waffle One SE', 'Waffle ', 'Blue-White-Cream', 8, 'Bringing a new look to the iconic Waffle franchise, we&#039;ve balanced everything you love most about heritage Nike running with fresh innovations. Why waffle? because we can see from the mix of colors that pile up like a waffle layer. And of course you will feel the same exact thing when you use this, just like your happiness and joy when eating a waffle. A new franchise that you must have now.', '2022-11-09'),
(47, 'Nike Air Zoom Pegasus 39 Shield', 'Zoom/Trainer', 'Black-Brown-Cream', 7, 'A water-repellent finish helps keep you dry while a cozy fleece-like feel on the inside helps keep your feet warm for nasty-weather runs. Rugged traction and 2 Zoom Air units provide grip and soft cushioning, so you can power through the elements. A shoe that can protect your feet like a shield and can give you the impression of a Pegasus flying in the sky. because the weight of the shoes is quite light on the feet will give a light impression on your feet when carrying these shoes running.', '2022-04-28'),
(48, 'Nike Air Jordan 1 Low Lemonade', 'Jordan Low', 'Yellow-Lime-White', 8, 'Always in, always fresh. The Air Jordan 1 Low sets you up with a piece of Jordan history and heritage that&#039;s comfortable all day. Choose your colours, then step out in the iconic profile that&#039;s built with a high-end mix of materials and encapsulated Air in the heel. With their yellow color that will give a fresh impression to you the user just like you eat a slice of lemon. aAunique release of Air Jordan 1 low which is certainly made for those of you who want to look different than the others. For those of you who want to have shoes that are different from your friends, we can recommend these shoes to you.', '2022-07-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `FK_ReviewGambar` (`id_review`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `FK_ReviewGambar` FOREIGN KEY (`id_review`) REFERENCES `review` (`id_review`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
