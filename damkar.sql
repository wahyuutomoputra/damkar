-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 09:55 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damkar`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id` int(5) UNSIGNED NOT NULL,
  `informasiDiterima` varchar(30) NOT NULL,
  `tibaDilokasi` varchar(30) NOT NULL,
  `selesaiPemadaman` varchar(30) NOT NULL,
  `responTime` varchar(30) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kampung` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `idKecamatan` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `namaPemilik` varchar(50) NOT NULL,
  `jumlahPenghuni` varchar(10) NOT NULL,
  `jenisBangunan` varchar(50) NOT NULL,
  `areaTerbakar` varchar(50) NOT NULL,
  `luasArea` varchar(30) NOT NULL,
  `asetKeseluruhan` bigint(30) NOT NULL,
  `asetTerselamatkan` bigint(30) NOT NULL,
  `nilaiKerugian` bigint(30) NOT NULL,
  `luka` int(5) NOT NULL,
  `meninggal` int(5) NOT NULL,
  `jumlahMobil` varchar(5) NOT NULL,
  `nomorPolisi` varchar(30) NOT NULL,
  `jumlahPetugas` varchar(5) NOT NULL,
  `danru1` varchar(30) NOT NULL,
  `danru2` varchar(30) NOT NULL,
  `danton1` varchar(30) NOT NULL,
  `danton2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `berita_acara`
--

INSERT INTO `berita_acara` (`id`, `informasiDiterima`, `tibaDilokasi`, `selesaiPemadaman`, `responTime`, `tanggal`, `rt`, `rw`, `kampung`, `desa`, `idKecamatan`, `kota`, `namaPemilik`, `jumlahPenghuni`, `jenisBangunan`, `areaTerbakar`, `luasArea`, `asetKeseluruhan`, `asetTerselamatkan`, `nilaiKerugian`, `luka`, `meninggal`, `jumlahMobil`, `nomorPolisi`, `jumlahPetugas`, `danru1`, `danru2`, `danton1`, `danton2`) VALUES
(1, '10:00', '11:00', '13:09', '1 jam 0 menit', '2018-10-23', '01', '02', 'Durian', 'Duren', '3204150', 'Bandung', 'usman toro', '9', 'Gudang', 'Gudang', '21', 20000000, 17000000, 3000000, 5, 0, '5', 'B3256', '4', 'A', 'B', 'C', 'D'),
(2, '12:23', '12:30', '15:24', '0 jam 7 menit', '2018-12-17', '01', '12', 'baka', 'baka', '3204100', 'Bandung', 'Adri Farhan', '4', 'Bangunan Tinggal', 'Rumah', '33', 50000000, 30000000, 20000000, 0, 0, '3', 'B3256', '5', 'A', 'B', 'C', 'D'),
(3, '14:41', '14:40', '14:39', '-0 jam -1 menit', '2018-11-16', '2', '2', '2', '2', '3204150', '2', 'w', '2', 'Bangunan Tinggal', 'Gudang', '23', 23, 23, 23, 2, 2, '2', '222', '4', 'd', 'd', 'd', 'd'),
(4, '14:46', '14:45', '14:44', '-0 jam -1 menit', '2017-12-16', '1', '1', 'baka', 'baka', '3204150', 'Bandung', 'Ujang dombret', '3', 'Bangunan Tinggal', 'Rumah', '54', 23000000, 100000000, 1000000, 2, 2, '2', 'B3256', '2', 'we', 'B', 'we', 'D'),
(5, '10:42', '12:42', '13:42', '2 jam 0 menit', '2018-12-18', '01', '02', 'Durian', 'baka', '3205030', 'Bandung', 'rudi', '3', 'Pabrik', 'pabrik', '54', 20000000, 10000000, 30000000, 4, 0, '3', 'B3256', '4', 'Wahyu', 'Agus', 'Cecep', 'adi');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idKecamatan` varchar(30) NOT NULL,
  `regency_id` varchar(8) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`idKecamatan`, `regency_id`, `nama`) VALUES
('3204020', '3204', 'PASIRJAMBU'),
('3204030', '3204', 'CIMAUNG'),
('3204040', '3204', 'PANGALENGAN'),
('3204050', '3204', 'KERTASARI'),
('3204060', '3204', 'PACET'),
('3204070', '3204', 'IBUN'),
('3204080', '3204', 'PASEH'),
('3204090', '3204', 'CIKANCUNG'),
('3204100', '3204', 'CICALENGKA'),
('3204101', '3204', 'NAGREG'),
('3204110', '3204', 'RANCAEKEK'),
('3204120', '3204', 'MAJALAYA'),
('3204121', '3204', 'SOLOKAN JERUK'),
('3204130', '3204', 'CIPARAY'),
('3204140', '3204', 'BALEENDAH'),
('3204150', '3204', 'ARJASARI'),
('3204160', '3204', 'BANJARAN'),
('3204161', '3204', 'CANGKUANG'),
('3204170', '3204', 'PAMEUNGPEUK'),
('3204180', '3204', 'KATAPANG'),
('3204190', '3204', 'SOREANG'),
('3204191', '3204', 'KUTAWARINGIN'),
('3204250', '3204', 'MARGAASIH'),
('3204260', '3204', 'MARGAHAYU'),
('3204270', '3204', 'DAYEUHKOLOT'),
('3204280', '3204', 'BOJONGSOANG'),
('3204290', '3204', 'CILEUNYI'),
('3204300', '3204', 'CILENGKRANG'),
('3204310', '3204', 'CIMENYAN'),
('3205010', '3205', 'CISEWU'),
('3205011', '3205', 'CARINGIN'),
('3205020', '3205', 'TALEGONG'),
('3205030', '3205', 'BUNGBULANG'),
('3205031', '3205', 'MEKARMUKTI'),
('3205040', '3205', 'PAMULIHAN'),
('3205050', '3205', 'PAKENJENG'),
('3205060', '3205', 'CIKELET'),
('3205070', '3205', 'PAMEUNGPEUK'),
('3205080', '3205', 'CIBALONG'),
('3205090', '3205', 'CISOMPET'),
('3205100', '3205', 'PEUNDEUY'),
('3205110', '3205', 'SINGAJAYA'),
('3205111', '3205', 'CIHURIP'),
('3205120', '3205', 'CIKAJANG'),
('3205130', '3205', 'BANJARWANGI'),
('3205140', '3205', 'CILAWU'),
('3205150', '3205', 'BAYONGBONG'),
('3205151', '3205', 'CIGEDUG'),
('3205160', '3205', 'CISURUPAN'),
('3205161', '3205', 'SUKARESMI');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `nama`, `nomor`, `pesan`, `lokasi`, `latitude`, `longitude`, `status`) VALUES
(1, '1', '1', '1', '1', '-6.973634', '107.630529', 'sudah'),
(2, '', '', '', '', '', '', ''),
(3, 'w', '12', 'jh', 'Perumahan Griya Asri 1 B2/41, Bojongsoang, Bandung, West Java 40288, Indonesia', '', '', 'belum'),
(4, 'w', '12', 'kg', 'Perumahan Griya Asri 1 B2/41, Bojongsoang, Bandung, West Java 40288, Indonesia', '', '', 'sudah'),
(5, 'wa', '33', 'kgd', 'Perumahan Griya Asri 1 B2/41, Bojongsoang, Bandung, West Java 40288, Indonesia', '', '', 'belum'),
(6, 'wa', '33', 'kgkk', 'Perumahan Griya Asri 1 B2/41, Bojongsoang, Bandung, West Java 40288, Indonesia', '', '', 'belum'),
(7, 'w', '2', 'e', 'Telkom', '-6.973634', '107.630529', ''),
(8, 'wahyu', '01347055461', 'tolong', 'Telkom', '-6.973634', '107.630529', 'sudah'),
(9, 'wahyu', '01347055461', 'tolong', 'Telkom', '-6.973634', '107.630529', 'sudah'),
(10, 'wahyu', '01347055461', 'tolong', 'Telkom', '-6.973634', '107.630529', 'belum'),
(11, 'wahyu', '01347055461', 'tolong', 'Telkom', '-6.973634', '107.630529', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` int(100) NOT NULL,
  `nama` varchar(34) NOT NULL,
  `email` varchar(34) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `email`, `password`, `status`, `alamat`) VALUES
(1, 'Reza Fadhil B', 'wahyuutomoputra@gmail.com', '$2y$10$xAA5xLP/CUlbQNAbL8H0A.OHTWicxte9UUd7ZphoGKoKFNCXDazA6', 'kadis', 'Perumahan Buah Batu Blok X 12'),
(1223, 'Wahyu Utomo Putra', 'wahyuutomoputra@gmail.com', '$2y$10$tc3pZUgHRRaxK.au1ALPU.aPRKKSO7zrefXGRbkzEIIBsh1l5cPIi', 'admin', 'aaa'),
(1234, 'adel', 'wahyuutomoputra@gmail.com', '$2y$10$WYO6/8PAyK7nUkChyzyC9.ypdEvVaa/rXEtIHG5J7MWmyXf.KuqbW', 'petugas', 'gba');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama`, `password`) VALUES
('wahyu', 'wahyu', '$2y$10$rkNa5yZVfT5dvG.viW2V6uwKU.D1i/rxupS32CFh6npcPOdBf8lYK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idKecamatan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
