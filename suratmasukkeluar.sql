-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2021 at 08:51 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suratmasukkeluar`
--

-- --------------------------------------------------------

--
-- Table structure for table `no_surat_keluar`
--

CREATE TABLE `no_surat_keluar` (
  `id_nomor_surat_keluar` int(7) NOT NULL,
  `nomor_surat_keluar` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_surat_keluar`
--

INSERT INTO `no_surat_keluar` (`id_nomor_surat_keluar`, `nomor_surat_keluar`) VALUES
(3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `no_surat_masuk`
--

CREATE TABLE `no_surat_masuk` (
  `id_no_surat_masuk` int(11) NOT NULL,
  `nomor_surat_masuk` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_surat_masuk`
--

INSERT INTO `no_surat_masuk` (`id_no_surat_masuk`, `nomor_surat_masuk`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `nama_berkas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratkeluar`
--

INSERT INTO `suratkeluar` (`id_surat_keluar`, `tanggal`, `kode`, `unit`, `nomor_surat`, `perihal`, `tujuan`, `keterangan`, `nama_berkas`) VALUES
(2, '2021-11-20', '673', 'Perdagangan', '899HBYghguyd', 'surat pengambilan barang bekuk', 'HRD CV Chana Paramesti', 'oke', 'Jurnal_Laporan_Akhir_Firda.docx'),
(3, '2021-11-25', '809', 'Pengadaan Barang & Jasa', '809Vgsd88hde', 'pengambilan nasi kotak', 'memberi makan karywan', 'sudah dilakukan', 'Laporan_Akhir_PPDB-1_pk_totok.pdf'),
(4, '2021-11-13', '002', 'SDM & Umum', '89hhyd73', 'hudek4', 'sdf4i', 'df3w9', 'Kosong'),
(5, '2021-11-18', '003', 'SDM & Umum', '899HBYghguyd', 'surat pengambilan barang beku', 'Seluruh Anggota Keluarga 22', 'oke', 'Kosong'),
(6, '2021-11-18', '004', 'Perdagangan', '899HBYghguyd', 'surat pengambilan barang beku', 'HRD CV Chana Paramesti', 'surat dari pihak amazon', 'Kosong'),
(7, '2021-11-24', '005', 'Perdagangan', '899.w30949sj92', 'surat pengambilan barang beku', 'Seluruh Anggota Keluarga 22', 'oke', 'Kosong'),
(8, '2021-11-25', '006', 'Perdagangan', '899.w30949sj92', 'mnegumpulkan uang untuk membiayai spacex', 'membuat rumah faye', 'bismillah selesai dalam 2 hari', 'Laporan_Akhir_PPDB-1-_revisi_B__Dzi.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `tanggal` varchar(110) NOT NULL,
  `kode` varchar(110) NOT NULL,
  `unit` varchar(110) NOT NULL,
  `nomor_surat` varchar(110) NOT NULL,
  `perihal` varchar(110) NOT NULL,
  `tujuan` varchar(110) NOT NULL,
  `keterangan` varchar(110) NOT NULL,
  `nama_berkas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`id_surat_masuk`, `tanggal`, `kode`, `unit`, `nomor_surat`, `perihal`, `tujuan`, `keterangan`, `nama_berkas`) VALUES
(1, '2021-10-21', '368', 'Jasa', '368.130/AKP.01/10.2021', 'Surat Pernyataan Supplier Financing', 'PT. Semen Indonesia Persero. Tbk', 'Surat milik Semen', ''),
(4, '2021-11-19', '899', 'SDM & Umum', '899HBYghguyd', 'surat pengambilan barang', 'HRD CV Chana Paramesti', 'surat untuk memberi tahu pihak amazon', ''),
(5, '2021-12-01', '899', 'Jasa Keuangan Syariah', '899HBYghguyd', 'penjualan desember', 'seluruh karyawan', 'oke', 'Template_Jurnal-_Laporan_Akhir_OPK_2021_Mia.docx'),
(8, '2021-11-18', '899', 'Jasa', '899HBYghguyd', 'surat pengambilan barang beku', 'Toys Rental', 'sudah dilakukan', 'SKPI YAZID.docx'),
(9, '2021-11-15', '899', 'Pengadaan Barang & Jasa', '899HBYghguyd', 'surat pengambilan barang', 'Seluruh Anggota Koperasi', 'oke', 'Kosong'),
(10, '2021-11-10', '899', 'Akuntansi', '899HBYghguyd', 'surat pengambilan barang beku', 'Karunia Photo', 'surat dari karunia photo', 'hahaha_yes.docx'),
(14, '2021-11-11', '896', 'Pengadaan Barang & Jasa', '899HBYghguyd', 'pembelian buku naruto', 'Gramedia', 'untuk melakukan transaksi', 'jurnal_LA_Indri.docx'),
(20, '2021-11-25', '004', 'Perdagangan', 'hdhjw899', 'akuisisi', 'memecah belah bangsa', 'menaklukan dunia', 'Kosong'),
(21, '2021-11-19', '005', 'Perdagangan', '899.w30949sj92', 'spaceX', 'Seluruh Anggota Keluarga 22', 'sudah dilakukan', 'Kosong'),
(22, '2021-11-21', '006', 'Perdagangan', '899.w30949sj92', 'surat pengambilan barang beku', 'HRD CV Chana Paramesti', 'surat untuk memberi tahu pihak amazon', 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `unit`) VALUES
(1, 'nindi', 'nindi', 'SDM & Umum'),
(3, 'bagas', 'bagas', 'Perdagangan'),
(4, 'aini', 'aini', 'Jasa Keuangan Syariah'),
(5, 'endang', 'endang', 'SDM & Umum'),
(6, 'zainuri', 'zainuri', 'Jasa'),
(7, 'subagio', 'subagio', 'Pengadaan Barang & Jasa'),
(8, 'affandi', 'affandi', 'Jasa'),
(9, 'masrukan', 'masrukan', 'SDM & Umum'),
(10, 'hartanti', 'hartanti', 'Jasa Keuangan Syariah'),
(11, 'ellia', 'ellia', 'Perdagangan'),
(12, 'budi', 'budi', 'Jasa'),
(13, 'arif', 'arif', 'Perdagangan'),
(14, 'erva', 'erva', 'Akuntansi'),
(15, 'eka', 'eka', 'Perdagangan'),
(16, 'mufid', 'mufid', 'Pengadaan Barang & Jasa'),
(17, 'eko', 'eko', 'Pengadaan Barang & Jasa'),
(18, 'sony', 'sony', 'Perdagangan'),
(19, 'joko', 'joko', 'Akuntansi'),
(20, 'darwati', 'darwati', 'Akuntansi'),
(21, 'hadi', 'hadi', 'Jasa'),
(22, 'amanu', 'amanu', 'SDM & Umum'),
(23, 'arif', 'arif', 'Pengadaan Barang & Jasa'),
(24, 'dindri', 'dindri', 'Jasa'),
(25, 'zainal', 'zainal', 'Akuntansi'),
(26, 'faris', 'faris', 'Akuntansi'),
(27, 'uswah', 'uswah', 'Pengadaan Barang & Jasa'),
(28, 'adit', 'adit', 'Perdagangan'),
(29, 'dion', 'dion', 'SDM & Umum'),
(30, 'fanny', 'fanny', 'Perdagangan'),
(31, 'fatimah', 'fatimah', 'Pengadaan Barang & Jasa'),
(32, 'norkamid', 'norkamid', 'Jasa'),
(33, 'boy', 'boy', 'Perdagangan'),
(34, 'ikhsan', 'ikhsan', 'Perdagangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `no_surat_keluar`
--
ALTER TABLE `no_surat_keluar`
  ADD PRIMARY KEY (`id_nomor_surat_keluar`);

--
-- Indexes for table `no_surat_masuk`
--
ALTER TABLE `no_surat_masuk`
  ADD PRIMARY KEY (`id_no_surat_masuk`);

--
-- Indexes for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `no_surat_keluar`
--
ALTER TABLE `no_surat_keluar`
  MODIFY `id_nomor_surat_keluar` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `no_surat_masuk`
--
ALTER TABLE `no_surat_masuk`
  MODIFY `id_no_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
