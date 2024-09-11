-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Sep 2024 pada 08.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `kontak` int(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `kontak`, `email`) VALUES
(1234, 'evanthe', 524356, 'evanthe07@gmail.com\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `no_seri` int(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `kuantitas_stok` int(255) NOT NULL,
  `lokasi_gudang` varchar(255) NOT NULL,
  `id_admin` int(50) NOT NULL,
  `harga` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`no_seri`, `nama_barang`, `jenis_barang`, `kuantitas_stok`, `lokasi_gudang`, `id_admin`, `harga`) VALUES
(87, 'Televisi', 'Alat Elektronik', 12, 'Ngagel', 1234, 200),
(987, 'Komputer', 'Alat Elektronik', 1, 'Simo', 1234, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `storage`
--

CREATE TABLE `storage` (
  `id_gudang` int(50) NOT NULL,
  `nama_gudang` varchar(255) NOT NULL,
  `lokasi_gudang` varchar(255) NOT NULL,
  `id_admin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `storage`
--

INSERT INTO `storage` (`id_gudang`, `nama_gudang`, `lokasi_gudang`, `id_admin`) VALUES
(87, 'Express', 'Margomulyo', 1234);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(123, 'putra', '123', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(50) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `kontak_vendor` int(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id_admin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `kontak_vendor`, `nama_barang`, `id_admin`) VALUES
(123, 'Pura', 857675, 'Laptop', 1234),
(4398, 'Putra Agung', 845672, 'Kipas Angin', 1234);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`no_seri`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
