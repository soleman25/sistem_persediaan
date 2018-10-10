-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Sep 2018 pada 06.49
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `faktur_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `periode` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`faktur_id`, `supplier_id`, `nama`, `periode`, `status`) VALUES
(62, 1, '', '2018-09-08', 0),
(65, 1, 'order', '2018-09-13', 1),
(66, 1, 'order', '2018-09-20', 1),
(67, 2, 'order', '2018-09-20', 1),
(68, 1, 'order', '2018-09-20', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `forgot_password`
--

CREATE TABLE `forgot_password` (
  `forgot_id` int(10) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `created` datetime DEFAULT NULL,
  `expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `faktur_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(10) NOT NULL,
  `tgl_order` date NOT NULL,
  `sttus` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`order_id`, `faktur_id`, `product_id`, `qty`, `tgl_order`, `sttus`) VALUES
(73, 65, 5, 1, '2018-09-13', 0),
(74, 66, 6, 12, '2018-09-19', 1),
(75, 67, 12, 13, '2018-09-19', 1),
(76, 68, 5, 1, '2018-09-19', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `penerimaan_id` int(10) UNSIGNED NOT NULL,
  `faktur_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `sttus` tinyint(1) NOT NULL,
  `tgl_recived` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`penerimaan_id`, `faktur_id`, `order_id`, `product_id`, `qty`, `sttus`, `tgl_recived`) VALUES
(93, 55, 64, 9, 13, 1, '2018-08-25 11:10:00'),
(94, 56, 65, 7, 90, 1, '2018-08-25 11:16:00'),
(95, 58, 67, 12, 15, 1, '2018-09-04 09:34:00'),
(96, 59, 68, 6, 1, 1, '2018-09-05 16:11:00'),
(97, 59, 69, 11, 4, 1, '2018-09-05 16:11:00'),
(98, 61, 70, 11, 3, 1, '2018-09-06 15:06:00'),
(99, 64, 72, 8, 5, 1, '2018-09-10 04:37:00'),
(100, 67, 75, 12, 13, 1, '2018-09-19 05:07:00'),
(101, 66, 74, 6, 12, 1, '2018-09-19 05:07:00');

--
-- Trigger `penerimaan`
--
DELIMITER $$
CREATE TRIGGER `pererimaan` AFTER INSERT ON `penerimaan` FOR EACH ROW BEGIN
	UPDATE products SET stok=stok+NEW.qty
    WHERE product_id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilan`
--

CREATE TABLE `pengambilan` (
  `pengambilan_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `tgl` timestamp NULL,
  `qty` int(10)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengambilan`
--

INSERT INTO `pengambilan` (`pengambilan_id`, `product_id`, `tgl`, `qty`) VALUES
(1, 5, '2018-08-26 21:52:00', 1),
(2, 5, '2018-09-05 13:47:00', 2),
(3, 5, '2018-09-05 13:48:00', 1),
(4, 5, '2018-09-05 13:48:00', 1),
(5, 6, '2018-09-05 14:57:00', 8),
(6, 6, '2018-09-05 14:58:00', 2),
(7, 8, '2018-09-10 04:38:00', 2);

--
-- Trigger `pengambilan`
--
DELIMITER $$
CREATE TRIGGER `pengambilan` AFTER INSERT ON `pengambilan` FOR EACH ROW BEGIN
	UPDATE products SET stok=stok-NEW.qty
    WHERE product_id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `kode_product` varchar(10) NOT NULL,
  `supplier_id` int(5) UNSIGNED,
  `nma_product` varchar(30) NOT NULL,
  `packing` varchar(20) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `stok` int(5) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `kode_product`, `supplier_id`, `nma_product`, `packing`, `unit`, `stok`, `create_at`, `update_at`) VALUES
(5, 'BBK001', 1, 'IQF Mozarella Chesse  ', '1 karton  = 12 kg', 'karton', 82, '2018-09-05 18:48:45', '2018-08-21 16:28:00'),
(6, 'BBK002', 1, 'Beff toping', '1 karton isi 8 pack', 'Kg', 16, '2018-09-19 10:07:57', '0000-00-00 00:00:00'),
(7, 'BKK003', 1, 'String Chesse', '1 karton  = 20 kg', 'karton', 90, '2018-08-25 16:16:22', '0000-00-00 00:00:00'),
(8, 'BBK004', 1, 'wing Street ', '1 karton isi 8 pack', 'Kg', 3, '2018-09-10 09:38:34', '0000-00-00 00:00:00'),
(9, 'BKK005', 1, 'Breaded Lag CPI', '1 karton isi 5 pack', 'KG', 13, '2018-08-25 16:10:32', '0000-00-00 00:00:00'),
(10, 'BBK006', 1, 'Potato  Weges', '1 karton isi 13 pack', 'Kg', 0, '2018-08-24 11:57:00', '0000-00-00 00:00:00'),
(11, 'BBK007', 1, 'Chicken Stick', '1 karton isi 8 pack', 'Kg', 7, '2018-09-06 20:06:02', '0000-00-00 00:00:00'),
(12, 'BBK008', 2, 'VIT Galon', '1 galon = 12 liter', 'pcs', 23, '2018-09-19 10:07:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE `retur` (
  `retur_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `faktur_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` longtext NOT NULL,
  `tgl_retur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `retur`
--
DELIMITER $$
CREATE TRIGGER `retur` AFTER INSERT ON `retur` FOR EACH ROW BEGIN
	UPDATE products SET stok=stok-NEW.qty
    WHERE product_id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `create_at`, `update_at`) VALUES
(1, 'admin', ' Admin Warehouse', '2018-08-13 17:54:40', '2018-08-03 19:51:35'),
(2, 'Outlet Manager', 'Outlet Manager', '2018-08-13 23:04:32', '2018-08-03 19:51:35'),
(3, 'Supplier', 'Supplier', '2018-08-13 23:10:07', '2018-08-03 19:51:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `kode_supplier` varchar(6) NOT NULL,
  `nma_supplier` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `kode_supplier`, `nma_supplier`, `email`, `tlp`, `alamat`, `create_at`, `update_at`) VALUES
(1, 'SP001', 'Genstore Jakarta - rorotan', 'manksoleman@gmail.com', '(021) 468 303 1', 'Jl. Komp. Kawasan, RT.1/RW.5, Rorotan, Cilincing, ', '2018-09-19 10:04:59', '2018-08-15 18:10:00'),
(2, 'SP002', 'PT. Balina Agung Perkasa', 'manksoleman@gmail.com', '+62.21 8261 043', 'Jl. Cipendawa No.12A, Raya Narogong Km 7, Bojong M', '2018-09-19 10:05:13', '2018-08-15 17:53:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `create_at`, `update_at`, `last_login`, `status`, `role_id`) VALUES
(2, 'admin', 'manksoleman@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-08-14 22:22:00', NULL, '2018-09-19 07:58:00', 1, 1),
(3, 'Dian Wibowo', 'enalmessi25@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-08-15 10:18:00', NULL, '2018-09-19 07:58:00', 1, 2),
(4, 'Genstore', 'enalmessi25@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-08-15 10:55:00', NULL, '2018-09-19 07:58:00', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`faktur_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`forgot_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`penerimaan_id`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`pengambilan_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`retur_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `faktur_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `forgot_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `penerimaan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `pengambilan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `retur_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `FK_faktur_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);

--
-- Ketidakleluasaan untuk tabel `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `FK_forgot_password_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_order_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD CONSTRAINT `FK_pengambilan_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);

--
-- Ketidakleluasaan untuk tabel `retur`
--
ALTER TABLE `retur`
  ADD CONSTRAINT `FK_retur_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_retur_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
