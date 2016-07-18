-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2016 at 07:46 PM
-- Server version: 10.1.8-MariaDB
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
-- Table structure for table `agents`
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
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Rosalia Indah Tour', 'TRAVEL', 'Rosalia Indah Berdiri pada Tahun 1989 di Purworejo, Dengan agent travel terlengkap dan paling murah Purworejo', '2016-01-16', '2016-01-16'),
(2, 'Harapan Jaya', 'TRAVEL', 'Harapan Jaya Berdiri pada Tahun 1989 di Purworejo, Dengan agent travel terlengkap dan paling murah Purworejo', '2016-01-16', '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `agents_routes`
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
-- Dumping data for table `agents_routes`
--

INSERT INTO `agents_routes` (`id`, `asal`, `tujuan`, `agent_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 100000, '2016-01-16', '2016-01-16'),
(2, 7, 3, 2, 1000000, '2016-01-16', '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `custom_route` tinyint(1) NOT NULL,
  `package_id` int(11) NOT NULL,
  `package_user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `province_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Kuta', 6, '2016-01-16', '2016-01-16'),
(2, 'Raja Ampat', 3, '2016-01-16', '2016-01-16'),
(3, 'Jakarta Utara', 1, '2016-01-16', '2016-01-16'),
(4, 'Magelang', 4, '2016-01-16', '2016-01-16'),
(5, 'Malang', 5, '2016-01-16', '2016-01-16'),
(6, 'Sleman', 7, '2016-01-16', '2016-01-16'),
(7, 'Kota Yogyakarta', 7, '2016-01-16', '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '0000-00-00', '0000-00-00'),
(2, 'Customer', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `inns`
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
-- Dumping data for table `inns`
--

INSERT INTO `inns` (`id`, `name`, `address`, `district_id`, `price`, `created_at`, `updated_at`) VALUES
(0, 'Hotel Shapire', 'Jalan Malioboro', 4, 200000, '2016-01-16 18:38:21', '2016-01-16 18:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `district_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Purwokerto', 1, '2016-01-16', '2016-01-16'),
(2, 'Yogya', 1, '2016-01-16', '2016-01-16'),
(3, 'Purwokerto', 0, '2016-01-16', '2016-01-16'),
(4, 'Kuta bali', 0, '2016-01-16', '2016-01-16'),
(5, 'Jalan Malioboro', 0, '2016-01-16', '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages_users`
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
-- Table structure for table `places`
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
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `description`, `location_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Owabong', 'Owabong ini adalah waterboom paling oye di Jawa Tengah', 1, '', '2016-01-16', '2016-01-16'),
(2, 'Pantai Pok Tunggal', 'Didirikan di Yogyakarta, merupakan agent travel berkelas yang menyajikan paket wisata ', 0, '1452968979.jpeg', '2016-01-16', '2016-01-16'),
(3, 'Owabong', 'Waterboom ini adalah waterboom paling oye', 0, '', '2016-01-16', '2016-01-16'),
(4, 'Pantai Kuta', 'Kuta tempat bikini paling oye di indonesia', 4, '1452969330.jpeg', '2016-01-16', '2016-01-16'),
(5, 'Malioboro Street', 'Jalan Malioboro, adalah jalan terpadat di Yogyakarta', 5, '1452969665.jpeg', '2016-01-16', '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
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
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `address`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'hamid', '', 0, '2016-01-16', '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta', '2016-01-16', '2016-01-16'),
(2, 'Jawa Barat', '2016-01-16', '2016-01-16'),
(3, 'Papua', '2016-01-16', '2016-01-16'),
(4, 'Jawa Tengah', '2016-01-16', '2016-01-16'),
(5, 'Jawa Timur', '2016-01-16', '2016-01-16'),
(6, 'Bali', '2016-01-16', '2016-01-16'),
(7, 'Yogyakarta', '2016-01-16', '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `profile_id`, `group_id`, `updated_at`, `created_at`) VALUES
(1, 'hamiddarojat@gmail.com', '$2y$10$p.j8pECBHNy0EoqsVRIv/eutJBMrewgW1QnFsVDHXW0FQQNlOeuea', 1, 1, '2016-01-16', '2016-01-16');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_users`
--
ALTER TABLE `packages_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `agents_routes`
--
ALTER TABLE `agents_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages_users`
--
ALTER TABLE `packages_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
