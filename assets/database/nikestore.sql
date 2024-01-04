-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 09:22 AM
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
-- Database: `nikestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_barang`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Air Shoes', 'Terbuat dari karet sintetis, nyaman untuk dipakai', 'Sepatu Super', 520000, 34, 'Air.png'),
(10, 'Shoestro Hermez', 'Terbuat dari bahan yang lentur', 'Buat Gaya', 899000, 40, 'blazer.png'),
(11, 'Forza Fox', 'Terbuat dari bahan berkualitas asal Italy', 'Days', 1500000, 32, 'blazer2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `status` enum('Diproses','Dikirim','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_brg`, `nama`, `alamat`, `no_hp`, `nama_barang`, `harga`, `jumlah`, `subtotal`, `gambar`, `status`) VALUES
(1, 1, 'Muhammad Zaki Fahmi', 'Jalan Merdeka Selatan No. 45', '08141385496', 'Air Shoes', 520000, 1, '520000', 'Air.png', 'Diproses');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok=stok-NEW.jumlah
    WHERE id_brg=NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(70) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `alamat`, `no_hp`, `jk`) VALUES
(1, 'Muhammad Zaki Fahmi', 'dlwlzki', '123', '19221384@bsi.ac.id', 'Jalan Merdeka Selatan No. 45', '08141385496', 'Laki-Laki'),
(2, 'Marnala Ezra Franciscus Sihaloho', 'ezrause', '9010', '19222449@bsi.ac.id', 'Jalan Situ Babakan No. 32', '08745169876', 'Laki-Laki'),
(3, 'Krisna Aditama', 'krisna', 'krisna123\r\n', '19221385@bsi.ac.id', 'Jalan Petojo Utara No. 10', '088213842120', 'Laki-Laki'),
(4, 'Arya Irfan Saputra', 'aryairfan', 'akutampan', '19221388@bsi.ac.id', 'Jalan Kebon Nangka No. 2', '081546978662', 'Laki-Laki'),
(5, 'Maria Salome Wona Weke', 'mariasal', 'mariawona123', '19221514@bsi.ac.id', 'Jalan Rawa Buaya No. 7', '081478632549', 'Perempuan'),
(6, 'Alfonsa Metafani Yaneke Massi', 'fonsalfonsa', 'alfonsa11', '19221415@bsi.ac.id', 'Jalan Gusti Ngurah Rai No. 4', '089562374898', 'Perempuan'),
(18, 'krisna', 'krisna1', '123', 'kiki@gmail.com', 'jl.komodo', '0923423245', 'Laki-Laki'),
(19, 'krisna', 'krisna', '123', 'krisna@gmail.com', 'jl.jahhyaxo', '0863232454', 'Laki-Laki'),
(20, 'Arya Maulana', 'ya', '123', 'aryaganteng@gmail.com', 'Jl mulu jadian kagak', '012834716194', 'Laki-Laki'),
(21, 'zaki', 'zaki1', '123', 'zaki@gmail.com', 'jl.kramat', '088273854843', 'Laki-Laki'),
(22, 'Shofi Nisa', 'sofi', '123', 'sofienisa@gmail.com', 'Jl. Borobudur Utara No. 20', '081236178419', 'Laki-Laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
