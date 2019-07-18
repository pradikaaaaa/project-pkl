-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jul 2019 pada 08.24
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `bio_id` char(6) NOT NULL,
  `bio_user_id` char(6) NOT NULL,
  `bio_nama` varchar(50) NOT NULL,
  `bio_email` varchar(30) NOT NULL,
  `bio_telepon` varchar(15) NOT NULL,
  `bio_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`bio_id`, `bio_user_id`, `bio_nama`, `bio_email`, `bio_telepon`, `bio_alamat`) VALUES
('B000', 'U000', 'Administrator', '', '', ''),
('B001', 'U001', 'Yahya', '', '', ''),
('B002', 'U002', 'Santoso', '', '12312', 'Jalan Jkl 134<br>Malang,');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_layanan`
--

CREATE TABLE `tbl_detail_layanan` (
  `detail_id` char(6) NOT NULL,
  `detail_layanan_id` char(6) NOT NULL,
  `detail_jumlah_item` double NOT NULL,
  `detail_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_layanan`
--

CREATE TABLE `tbl_layanan` (
  `layanan_id` char(6) NOT NULL,
  `layanan_nama` varchar(50) NOT NULL,
  `layanan_harga` double NOT NULL,
  `layanan_jenis` enum('Paket','Satuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_layanan`
--

INSERT INTO `tbl_layanan` (`layanan_id`, `layanan_nama`, `layanan_harga`, `layanan_jenis`) VALUES
('L001', 'Cuci Kering Setrika', 5000, 'Paket'),
('L002', 'Jas', 35000, 'Satuan'),
('L003', 'Jaket', 18000, 'Satuan'),
('L004', 'Handuk Sedang', 10000, 'Satuan'),
('L005', 'Handuk Besar', 15000, 'Satuan'),
('L006', 'Celana Pendek', 10000, 'Satuan'),
('L007', 'Celana Panjang', 15000, 'Satuan'),
('L008', 'Celana Jeans', 14000, 'Satuan'),
('L009', 'Cuci Kering', 3000, 'Paket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `trans_id` char(6) NOT NULL,
  `trans_pelanggan_id` char(6) NOT NULL,
  `trans_detail_id` char(6) NOT NULL,
  `trans_tgl_pesan` datetime NOT NULL,
  `trans_tgl_selesai` datetime NOT NULL,
  `trans_total_harga` double NOT NULL,
  `trans_status_pengerjaan` enum('Sedang Dikerjakan','Selesai') NOT NULL,
  `trans_status_pengambilan` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` char(6) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` enum('Admin','Petugas','Pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_username`, `user_password`, `user_status`) VALUES
('U000', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('U001', 'yahuya', '57b6765018fd3dfd3d8fc1bb1bababc6', 'Pelanggan'),
('U002', 'pradikaaaaa', '827ccb0eea8a706c4c34a16891f84e7b', 'Petugas');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_biodata`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_user_biodata` (
`user_id` char(6)
,`user_username` varchar(50)
,`user_status` enum('Admin','Petugas','Pelanggan')
,`bio_id` char(6)
,`bio_user_id` char(6)
,`bio_nama` varchar(50)
,`bio_email` varchar(30)
,`bio_telepon` varchar(15)
,`bio_alamat` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_user_biodata`
--
DROP TABLE IF EXISTS `view_user_biodata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_biodata`  AS  select `tbl_user`.`user_id` AS `user_id`,`tbl_user`.`user_username` AS `user_username`,`tbl_user`.`user_status` AS `user_status`,`tbl_biodata`.`bio_id` AS `bio_id`,`tbl_biodata`.`bio_user_id` AS `bio_user_id`,`tbl_biodata`.`bio_nama` AS `bio_nama`,`tbl_biodata`.`bio_email` AS `bio_email`,`tbl_biodata`.`bio_telepon` AS `bio_telepon`,`tbl_biodata`.`bio_alamat` AS `bio_alamat` from (`tbl_user` join `tbl_biodata` on((`tbl_user`.`user_id` = `tbl_biodata`.`bio_user_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`bio_id`),
  ADD KEY `fk_user_id` (`bio_user_id`);

--
-- Indexes for table `tbl_detail_layanan`
--
ALTER TABLE `tbl_detail_layanan`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `fk_layanan_id` (`detail_layanan_id`);

--
-- Indexes for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD PRIMARY KEY (`layanan_id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `fk_detail_transaksi` (`trans_detail_id`),
  ADD KEY `fk_pelanggan_id` (`trans_pelanggan_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`bio_user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_detail_layanan`
--
ALTER TABLE `tbl_detail_layanan`
  ADD CONSTRAINT `fk_layanan_id` FOREIGN KEY (`detail_layanan_id`) REFERENCES `tbl_layanan` (`layanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `fk_detail_transaksi` FOREIGN KEY (`trans_detail_id`) REFERENCES `tbl_detail_layanan` (`detail_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pelanggan_id` FOREIGN KEY (`trans_pelanggan_id`) REFERENCES `tbl_biodata` (`bio_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
