-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jan 2016 pada 11.56
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brokepacker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` enum('TRAVEL','BUS') NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agents`
--

INSERT INTO `agents` (`id`, `name`, `type`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Rosalia Indah', 'BUS', 'Bus', '0000-00-00', '0000-00-00'),
(4, 'Bali Resort', 'TRAVEL', 'Bali Resort', '0000-00-00', '0000-00-00'),
(8, 'Bukit Travel', 'TRAVEL', 'Bogor - Bukittinggi', '2016-01-18', '2016-01-18'),
(9, 'danau travel', 'TRAVEL', 'bogor - medan', '2016-01-18', '2016-01-18'),
(10, 'ampera travel', 'TRAVEL', 'bogor - palembang', '2016-01-18', '2016-01-18'),
(11, 'tanggo travel', 'TRAVEL', 'bogor - jambi', '2016-01-18', '2016-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agents_routes`
--

CREATE TABLE `agents_routes` (
  `id` int(11) NOT NULL,
  `asal` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agents_routes`
--

INSERT INTO `agents_routes` (`id`, `asal`, `tujuan`, `agent_id`, `price`, `created_at`, `updated_at`) VALUES
(3, 8, 9, 3, 9000000, '0000-00-00', '0000-00-00'),
(4, 8, 10, 4, 10000000, '0000-00-00', '0000-00-00'),
(8, 8, 11, 8, 2000000, '2016-01-18', '2016-01-18'),
(9, 8, 14, 9, 2000000, '2016-01-18', '2016-01-18'),
(10, 8, 15, 10, 2000000, '2016-01-18', '2016-01-18'),
(11, 8, 16, 11, 2000000, '2016-01-18', '2016-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `custom_route` tinyint(1) NOT NULL DEFAULT '0',
  `package_id` int(11) NOT NULL,
  `package_user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `custom_route`, `package_id`, `package_user_id`, `date`, `price`, `created_at`, `updated_at`) VALUES
(3, 2, 0, 2, NULL, '2016-01-02', 9000000, '0000-00-00', '0000-00-00'),
(10, 3, 0, 4, NULL, '0000-00-00', 1000000, '2016-01-18', '2016-01-18'),
(11, 3, 0, 7, NULL, '0000-00-00', 1000000, '2016-01-18', '2016-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `province_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `districts`
--

INSERT INTO `districts` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
(8, 'Bogor', 8, '0000-00-00', '0000-00-00'),
(9, 'Yogyakarta', 9, '0000-00-00', '0000-00-00'),
(10, 'Bali', 10, '0000-00-00', '0000-00-00'),
(11, 'Bukittinggi', 11, '2016-01-18', '2016-01-18'),
(12, 'Kota Yogyakarta', 13, '2016-01-18', '2016-01-18'),
(14, 'Medan', 16, '2016-01-18', '2016-01-18'),
(15, 'Palembang', 15, '2016-01-18', '2016-01-18'),
(16, 'Jambi', 17, '2016-01-18', '2016-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '0000-00-00', '0000-00-00'),
(2, 'Customer', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inns`
--

CREATE TABLE `inns` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `district_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inns`
--

INSERT INTO `inns` (`id`, `name`, `address`, `district_id`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Mustika', 'Hotel', 9, 150000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Bali Resort', 'Penginapan Bali', 10, 100000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Toba Hotel', 'Jl Pattimura', 14, 400000, '2016-01-18 09:11:56', '2016-01-18 09:11:56'),
(6, 'Jambi Hotel', 'Jl Pattimura', 16, 400000, '2016-01-18 09:12:26', '2016-01-18 09:12:26'),
(7, 'Ampera Hotel', 'Jl Pattimura', 15, 400000, '2016-01-18 09:12:53', '2016-01-18 09:12:53'),
(8, 'Jam Gadang Hotel', 'Jl Pattimura', 11, 400000, '2016-01-18 09:59:57', '2016-01-18 09:59:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `district_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `name`, `district_id`, `created_at`, `updated_at`) VALUES
(6, 'Jalan jalan', 9, '0000-00-00', '0000-00-00'),
(7, 'Jalan pantai kuta', 10, '0000-00-00', '0000-00-00'),
(12, 'Jl. Sudirman Palembang', 15, '2016-01-18', '2016-01-18'),
(13, 'Jl.Sudirman Bukittinggi', 11, '2016-01-18', '2016-01-18'),
(14, 'Jl. Sudirman Medan', 14, '2016-01-18', '2016-01-18'),
(15, 'Jl. Sudirman Jambi', 16, '2016-01-18', '2016-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `booking_id`, `price`, `updated_at`, `created_at`) VALUES
(1, 3, 9000000, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `place_id` int(11) NOT NULL,
  `inn_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `place_id`, `inn_id`, `agent_id`, `photo`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Jalan jalan ke jogja', 'Istimewa Yogyakarta, Indonesia. Kota Yogyakarta adalah kediaman bagi Sultan Hamengkubawana dan Adipati Paku Alam. Kota Yogyakarta merupakan salah satu kota terbesar di Indonesia dan kota terbesar ketiga di wilayah Pulau Jawa bagian selatan setelah Bandung dan Malang menurut jumlah penduduk.\n\nSalah satu kecamatan di Yogyakarta, yaitu Kotagede pernah menjadi pusat Kesultanan Mataram antara kurun tahun 1575-1640. Keraton (Istana) yang masih berfungsi dalam arti yang sesungguhnya adalah Keraton Ngayogyakarta dan Puro Paku Alaman, yang merupakan pecahan dari Kesultanan Mataram.', 6, 2, 3, 'prambanan1.jpg', 500000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Jogja lagi', 'Istimewa Yogyakarta, Indonesia. Kota Yogyakarta adalah kediaman bagi Sultan Hamengkubawana dan Adipati Paku Alam. Kota Yogyakarta merupakan salah satu kota terbesar di Indonesia dan kota terbesar ketiga di wilayah Pulau Jawa bagian selatan setelah Bandung dan Malang menurut jumlah penduduk.\n\nSalah satu kecamatan di Yogyakarta, yaitu Kotagede pernah menjadi pusat Kesultanan Mataram antara kurun tahun 1575-1640. Keraton (Istana) yang masih berfungsi dalam arti yang sesungguhnya adalah Keraton Ngayogyakarta dan Puro Paku Alaman, yang merupakan pecahan dari Kesultanan Mataram.', 6, 2, 3, 'prambanan1.jpg', 700000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Bali', 'Istimewa Yogyakarta, Indonesia. Kota Yogyakarta adalah kediaman bagi Sultan Hamengkubawana dan Adipati Paku Alam. Kota Yogyakarta merupakan salah satu kota terbesar di Indonesia dan kota terbesar ketiga di wilayah Pulau Jawa bagian selatan setelah Bandung dan Malang menurut jumlah penduduk.\n\nSalah satu kecamatan di Yogyakarta, yaitu Kotagede pernah menjadi pusat Kesultanan Mataram antara kurun tahun 1575-1640. Keraton (Istana) yang masih berfungsi dalam arti yang sesungguhnya adalah Keraton Ngayogyakarta dan Puro Paku Alaman, yang merupakan pecahan dari Kesultanan Mataram.', 7, 3, 4, 'kuta.png', 1000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Paket Jam Gadang', 'Jam gadang merupakan objek wisata menara jam yang berukuran besar terletak di pusat kota bukit tinggi, sumatera barat, dan merupakan landmark kota bukit tinggi dan provinsi sumatera barat. Dalam bahasa minangkabau jam gadang berarti “ jam besar “.', 9, 8, 8, '1453111310.jpeg', 1000000, '2016-01-18 10:01:50', '2016-01-18 10:01:50'),
(8, 'Paket Toba', 'Danau Toba merupakan keajaiban alam menakjubkan di Pulau Sumatera. Sulit membayangkan ada tempat yang lebih indah untuk dikunjungi di Sumatera Utara selain danau ini. Suasana sejuk menyegarkan, hamparan air jernih membiru, dan pemandangan memesona pegunungan hijau adalah sebagian kecil saja dari imaji danau raksasa yang berada 900 meter di atas permukaan laut itu.', 10, 5, 9, '1453111367.jpeg', 1000000, '2016-01-18 10:02:47', '2016-01-18 10:02:47'),
(9, 'Paket Ampera', 'Sungai Musi menghubungkan kota Palembang bagian ulu dengan ilir. Sungai yang merupakan salah satu sungai terpanjang di Indonesia ini mempunyai keunikan tersendiri. Kehidupan masyarakat tergambar di sungai Musi. Ada pasar terapung, counter pulsa terapung, rumah makan terapung hingga pom bensin terapung. Sekarang ini sudah tersedia banyak transportasi sungai, baik yang khas daerah seperti ketek (perahu kecil) hingga kapal Putri Kembang Dadar. Bila berkunjung ke Palembang tidak ke Sungai Musi, sama saja belum pernah ke Palembang - See more at: http://wisatapalembang.com/wisata-sungai-musi-dan-jembatan-ampera/#sthash.oKFTuPtV.dpuf', 8, 7, 10, '1453111427.jpeg', 1000000, '2016-01-18 10:03:47', '2016-01-18 10:03:47'),
(10, 'Paket Tanggo Rajo', 'Merupakan kawasan yang sering dikunjungi sebagai tempat rekreasi keluarga untuk dapat menikmati panorama sungai Batanghari, memancing, atau menikmati jajanan di sepanjang jalan raya di pinggir sungai', 11, 6, 11, '1453111488.jpeg', 1000000, '2016-01-18 10:04:48', '2016-01-18 10:04:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages_users`
--

CREATE TABLE `packages_users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `agents_route_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `location_id` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `places`
--

INSERT INTO `places` (`id`, `name`, `description`, `location_id`, `photo`, `created_at`, `updated_at`) VALUES
(6, 'Pantai Sepanjang', 'hahahah', 6, '', '0000-00-00', '0000-00-00'),
(7, 'Pantai Kuta', 'Pantai Indah Bali', 7, 'kuta.png', '0000-00-00', '0000-00-00'),
(8, 'Jembatan Ampera', 'Jembatanny Indah ', 12, '1453107898.jpeg', '2016-01-18', '2016-01-18'),
(9, 'Jam Gadang', 'Jam Gadang merupakan bekas peninggalan dari zaman penjajahan Belanda.', 13, '1453107953.jpeg', '2016-01-18', '2016-01-18'),
(10, 'Danau Toba', 'danau indah', 14, '1453108051.jpeg', '2016-01-18', '2016-01-18'),
(11, 'Tanggo Rajo', 'Tangga indah', 15, '1453108114.jpeg', '2016-01-18', '2016-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `address`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'hamid', '', 0, '2016-01-16', '2016-01-16'),
(2, 'customer', '', 0, '2016-01-17', '2016-01-17'),
(3, 'Ghifari Dwiki Ramadhan', '', 0, '2016-01-18', '2016-01-18'),
(4, 'Aswinda Prima Putra', '', 0, '2016-01-18', '2016-01-18'),
(5, 'aad', '', 0, '2016-01-18', '2016-01-18'),
(6, 'dio', '', 0, '2016-01-18', '2016-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Jawa Barat', '0000-00-00', '0000-00-00'),
(9, 'Jawa Tengah', '0000-00-00', '0000-00-00'),
(10, 'Bali', '0000-00-00', '0000-00-00'),
(11, 'Sumatera Barat', '2016-01-18', '2016-01-18'),
(12, 'Jawa Timur', '2016-01-18', '2016-01-18'),
(13, 'Yogyakarta', '2016-01-18', '2016-01-18'),
(14, 'Aceh', '2016-01-18', '2016-01-18'),
(15, 'Sumatera Selatan', '2016-01-18', '2016-01-18'),
(16, 'Sumatera Utara', '2016-01-18', '2016-01-18'),
(17, 'Jambi', '2016-01-18', '2016-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '2',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `remember_token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `profile_id`, `group_id`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'hamiddarojat@gmail.com', '$2y$10$p.j8pECBHNy0EoqsVRIv/eutJBMrewgW1QnFsVDHXW0FQQNlOeuea', 1, 1, '2016-01-16', '2016-01-16', ''),
(2, 'customer@gmail.com', '$2y$10$gGvbr46/UsjyMcNcA0AHdeH13DWfOwOkPWwYTq8zHIKgca0BoaTHq', 2, 2, '2016-01-17', '2016-01-17', ''),
(3, 'ghifari@gmail.com', '$2y$10$4qa8AxanWr/7LgyVPgzuMuuYH5OcGs.v0GSj5obUxpac53KVW1m2y', 3, 2, '2016-01-18', '2016-01-18', 'FhBYzWwzsXI8oUkB14kPOfBgRESJFptxvO13j8GXATbwHHKV2hM9NoRODRCJ'),
(4, 'aswinda.pp@gmail.com', '$2y$10$gWQj6MuGI0FcNvmUfFpPFerIdXzJHhkUx10PSdWYVDhrTIjBWw4j6', 4, 1, '2016-01-18', '2016-01-18', '1Hi1BBXgjcZzDnL03q9wr9eXT0bLswJdBcSakGUAlX6STAiWZx7HzohNCOTr'),
(5, 'aad@gmail.com', '$2y$10$FJl/pdI8PCn.5bWKSx3BPO0/8QqXvA1WC9f0hpU3VrJtOZCdaJewa', 5, 2, '2016-01-18', '2016-01-18', ''),
(6, 'dio@gmail.com', '$2y$10$/FEzV6KsYAvE9hNdd8HiqOzKZBHwTizB.0FAzFJ8iIZjMcflsOTvu', 6, 2, '2016-01-18', '2016-01-18', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents_routes`
--
ALTER TABLE `agents_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asal` (`asal`),
  ADD KEY `tujuan` (`tujuan`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `package_user_id` (`package_user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inns`
--
ALTER TABLE `inns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inn_id` (`inn_id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `packages_users`
--
ALTER TABLE `packages_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `agents_routes`
--
ALTER TABLE `agents_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inns`
--
ALTER TABLE `inns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `packages_users`
--
ALTER TABLE `packages_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `agents_routes`
--
ALTER TABLE `agents_routes`
  ADD CONSTRAINT `agents_routes_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `agents_routes_ibfk_2` FOREIGN KEY (`asal`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `agents_routes_ibfk_3` FOREIGN KEY (`tujuan`) REFERENCES `districts` (`id`);

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`package_user_id`) REFERENCES `packages_users` (`id`);

--
-- Ketidakleluasaan untuk tabel `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Ketidakleluasaan untuk tabel `inns`
--
ALTER TABLE `inns`
  ADD CONSTRAINT `inns_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Ketidakleluasaan untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Ketidakleluasaan untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`inn_id`) REFERENCES `inns` (`id`),
  ADD CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `packages_ibfk_3` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Ketidakleluasaan untuk tabel `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
