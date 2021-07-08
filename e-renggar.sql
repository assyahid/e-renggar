-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 06:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-renggar`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `id_art` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_kebutuhan` varchar(25) NOT NULL,
  `ket_art` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`id_art`, `id_usulan`, `id_barang`, `jumlah_kebutuhan`, `ket_art`, `created_at`) VALUES
(1, 1, 118, '2', 'buku a3', '2021-07-05 15:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_katalog` varchar(25) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `nama_umum` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `kemasan` varchar(50) NOT NULL,
  `kategori` enum('Alat Kesehatan','Pengolah Data','Peralatan Kantor','ART','Reagen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_katalog`, `nama_barang`, `nama_umum`, `satuan`, `kemasan`, `kategori`) VALUES
(1, '', 'Adjustable Pipet 100 ul', '', 'Unit', '', 'Alat Kesehatan'),
(2, '', 'Adjustable Pipet 1000 ul', '', 'Unit', '', 'Alat Kesehatan'),
(3, '', 'Alat EKG', '', 'Unit', '', 'Alat Kesehatan'),
(4, '', 'Alat EKG yang mempunyai baterai dan memory', '', 'Unit', '', 'Alat Kesehatan'),
(5, '', 'Alat Emisi Udara', '', 'Unit', '', 'Alat Kesehatan'),
(6, '', 'Alat Opasitas Emisi', '', 'Unit', '', 'Alat Kesehatan'),
(7, '', 'Alat Penghitung Koloni Automatic / Colony Counter Automatic', '', 'Unit', '', 'Alat Kesehatan'),
(8, '', 'Alat Spirometri', '', 'Unit', '', 'Alat Kesehatan'),
(9, '', 'Alat untuk pewarnaan ZN', '', 'Unit', '', 'Alat Kesehatan'),
(10, '', 'Alegria random access analyzer', '', 'Unit', '', 'Alat Kesehatan'),
(11, '', 'Anak Timbangan', '', 'Unit', '', 'Alat Kesehatan'),
(12, '', 'Audiometer testing box', '', 'Unit', '', 'Alat Kesehatan'),
(13, '', 'Autoclave', '', 'Unit', '', 'Alat Kesehatan'),
(14, '', 'Automatic Blood Pressure Monitor', '', 'Unit', '', 'Alat Kesehatan'),
(15, '', 'Automatic External Defibrilator', '', 'Unit', '', 'Alat Kesehatan'),
(16, '', 'Automatic Extraction', '', 'Unit', '', 'Alat Kesehatan'),
(17, '', 'Autosampler GCMS', '', 'Unit', '', 'Alat Kesehatan'),
(18, '', 'Autosampler ICP', '', 'Unit', '', 'Alat Kesehatan'),
(19, '', 'Biosafety Cabinet', '', 'Unit', '', 'Alat Kesehatan'),
(20, '', 'Cobas Taqman 48 Filter for Air Power Supply', '', 'Unit', '', 'Alat Kesehatan'),
(21, '', 'Cobas Taqman 48 Filter for Fan', '', 'Unit', '', 'Alat Kesehatan'),
(22, '', 'Densi Check', '', 'Unit', '', 'Alat Kesehatan'),
(23, '', 'Diagnostic Set', '', 'Unit', '', 'Alat Kesehatan'),
(24, '', 'DR System untuk rontgen', '', 'Unit', '', 'Alat Kesehatan'),
(25, '', 'Easypet', '', 'Unit', '', 'Alat Kesehatan'),
(26, '', 'Electrolite Analyzer', '', 'Unit', '', 'Alat Kesehatan'),
(27, '', 'Elektroda Flourida', '', 'Unit', '', 'Alat Kesehatan'),
(28, '', 'Elektroda Nitrat', '', 'Unit', '', 'Alat Kesehatan'),
(29, '', 'Elektroda Nitrit', '', 'Unit', '', 'Alat Kesehatan'),
(30, '', 'Gas Radon Meter', '', 'Unit', '', 'Alat Kesehatan'),
(31, '', 'GCMS', '', 'Unit', '', 'Alat Kesehatan'),
(32, '', 'Generator Gas', '', 'Unit', '', 'Alat Kesehatan'),
(33, '', 'Haz Dust', '', 'Unit', '', 'Alat Kesehatan'),
(34, '', 'Hemostasis Analyzer', '', 'Unit', '', 'Alat Kesehatan'),
(35, '', 'Hot Plate Stirer', '', 'Unit', '', 'Alat Kesehatan'),
(36, '', 'Incubator', '', 'Unit', '', 'Alat Kesehatan'),
(37, '', 'Kamera Mikroskop', '', 'Unit', '', 'Alat Kesehatan'),
(38, '', 'Kimia Klinik analyzer', '', 'Unit', '', 'Alat Kesehatan'),
(39, '', 'Kursi Phlebotomy Otomatis', '', 'Unit', '', 'Alat Kesehatan'),
(40, '', 'Kursi Plebotomy', '', 'Unit', '', 'Alat Kesehatan'),
(41, '', 'Mercury Analyzer', '', 'Unit', '', 'Alat Kesehatan'),
(42, '', 'Microscope Binoculer', '', 'Unit', '', 'Alat Kesehatan'),
(43, '', 'Microwave', '', 'Unit', '', 'Alat Kesehatan'),
(44, '', 'Microwave Digestion', '', 'Unit', '', 'Alat Kesehatan'),
(45, '', 'Mikropipet 10 ul', '', 'Unit', '', 'Alat Kesehatan'),
(46, '', 'Mikropipette Adjustable 1000 ul', '', 'Unit', '', 'Alat Kesehatan'),
(47, '', 'Mikropipette Adjustable 20 ul', '', 'Unit', '', 'Alat Kesehatan'),
(48, '', 'Mikropipette Adjustable 200 ul', '', 'Unit', '', 'Alat Kesehatan'),
(49, '', 'Mikropipette Adjustable 50 - 500 ul', '', 'Unit', '', 'Alat Kesehatan'),
(50, '', 'Mikroskop', '', 'Unit', '', 'Alat Kesehatan'),
(51, '', 'Mikroskop Kamera', '', 'Unit', '', 'Alat Kesehatan'),
(52, '', 'Mini Inkubator', '', 'Unit', '', 'Alat Kesehatan'),
(53, '', 'Mini Waterbath', '', 'Unit', '', 'Alat Kesehatan'),
(54, '', 'Mobile Station lengkap dengan Rontgen Mobile', '', 'Unit', '', 'Alat Kesehatan'),
(55, '', 'Perforator media agar', '', 'Unit', '', 'Alat Kesehatan'),
(56, '', 'pH Meter Jarum', '', 'Unit', '', 'Alat Kesehatan'),
(57, '', 'Pirolysis', '', 'Unit', '', 'Alat Kesehatan'),
(58, '', 'Portable Digital Ozone Meter', '', 'Unit', '', 'Alat Kesehatan'),
(59, '', 'Portable Emission Analyzer', '', 'Unit', '', 'Alat Kesehatan'),
(60, '', 'Portable Gas Monitor', '', 'Unit', '', 'Alat Kesehatan'),
(61, '', 'Prosesing Foto Rontgen', '', 'Unit', '', 'Alat Kesehatan'),
(62, '', 'Real time cycler rotor gene Q', '', 'Unit', '', 'Alat Kesehatan'),
(63, '', 'Real time PCR CFX-96', '', 'Unit', '', 'Alat Kesehatan'),
(64, '', 'Sealer Machine', '', 'Unit', '', 'Alat Kesehatan'),
(65, '', 'Spektrofotometer Simultan', '', 'Unit', '', 'Alat Kesehatan'),
(66, '', 'Spindown Plate', '', 'Unit', '', 'Alat Kesehatan'),
(67, '', 'Spindown Tube', '', 'Unit', '', 'Alat Kesehatan'),
(68, '', 'Spirometer MIR Spirolab', '', 'Unit', '', 'Alat Kesehatan'),
(69, '', 'Spirometri', '', 'Unit', '', 'Alat Kesehatan'),
(70, '', 'Standar F200 Analyzer', '', 'Unit', '', 'Alat Kesehatan'),
(71, '', 'Stomacher', '', 'Unit', '', 'Alat Kesehatan'),
(72, '', 'Stomacher Ukuran Kecil', '', 'Unit', '', 'Alat Kesehatan'),
(73, '', 'T100 Thermal Cycler', '', 'Unit', '', 'Alat Kesehatan'),
(74, '', 'Tabir Radiasi', '', 'Unit', '', 'Alat Kesehatan'),
(75, '', 'Teaching Mikroskop', '', 'Unit', '', 'Alat Kesehatan'),
(76, '', 'Tensimeter Air Raksa Berdiri', '', 'Unit', '', 'Alat Kesehatan'),
(77, '', 'Tensimeter Aneroid Jarum Standing', '', 'Unit', '', 'Alat Kesehatan'),
(78, '', 'Thermometer Badan', '', 'Unit', '', 'Alat Kesehatan'),
(79, '', 'Thermometer Tersertifikasi', '', 'Unit', '', 'Alat Kesehatan'),
(80, '', 'Timbangan 5 Angka dibelakang koma', '', 'Unit', '', 'Alat Kesehatan'),
(81, '', 'Titrimetri Automatic', '', 'Unit', '', 'Alat Kesehatan'),
(82, '', 'Total Organic Carbon', '', 'Unit', '', 'Alat Kesehatan'),
(83, '', 'Treadmill stress test', '', 'Unit', '', 'Alat Kesehatan'),
(84, '', 'UPS', '', 'Unit', '', 'Alat Kesehatan'),
(85, '', 'Vitex Identification', '', 'Unit', '', 'Alat Kesehatan'),
(86, '', 'Vortex ', '', 'Unit', '', 'Alat Kesehatan'),
(87, '', 'Water bath', '', 'Unit', '', 'Alat Kesehatan'),
(89, '', 'Computer', '', 'Unit', '', 'Pengolah Data'),
(90, '', 'DVR CCTV', '', 'Unit', '', 'Pengolah Data'),
(91, '', 'Kamera Video Conference', '', 'Unit', '', 'Pengolah Data'),
(92, '', 'Laptop', '', 'Unit', '', 'Pengolah Data'),
(93, '', 'Printer + Copy scan', '', 'Unit', '', 'Pengolah Data'),
(94, '', 'Printer Copy ', '', 'Unit', '', 'Pengolah Data'),
(95, '', 'Printer Infuse berwarna', '', 'Unit', '', 'Pengolah Data'),
(96, '', 'Scanner', '', 'Unit', '', 'Pengolah Data'),
(97, '', 'Stabilizer', '', 'Unit', '', 'Pengolah Data'),
(98, '', 'UPS', '', 'Unit', '', 'Pengolah Data'),
(100, '', 'Dispenser', '', 'Unit', '', 'Peralatan Kantor'),
(101, '', 'Filing Cabinet', '', 'Unit', '', 'Peralatan Kantor'),
(102, '', 'Kursi Bulat Hidrolic', '', 'Unit', '', 'Peralatan Kantor'),
(103, '', 'Kursi Kerja', '', 'Unit', '', 'Peralatan Kantor'),
(104, '', 'Kursi Lab', '', 'Unit', '', 'Peralatan Kantor'),
(105, '', 'Kursi Tamu', '', 'Unit', '', 'Peralatan Kantor'),
(106, '', 'Lemari Arsip', '', 'Unit', '', 'Peralatan Kantor'),
(107, '', 'Lemari dan meja bundling custom', '', 'Unit', '', 'Peralatan Kantor'),
(108, '', 'Meja Custom', '', 'Unit', '', 'Peralatan Kantor'),
(109, '', 'Meja Kecil', '', 'Unit', '', 'Peralatan Kantor'),
(110, '', 'Meja Kerja', '', 'Unit', '', 'Peralatan Kantor'),
(111, '', 'Meja Kerja', '', 'Unit', '', 'Peralatan Kantor'),
(112, '', 'Meja Tamu', '', 'Unit', '', 'Peralatan Kantor'),
(113, '', 'Mesin Penghancur Kertas', '', 'Unit', '', 'Peralatan Kantor'),
(114, '', 'Rak Dokumen', '', 'Unit', '', 'Peralatan Kantor'),
(115, '', 'Rolling Cabinet', '', 'Unit', '', 'Peralatan Kantor'),
(116, '', 'Showcase 1 Pintu', '', 'Unit', '', 'Peralatan Kantor'),
(117, '', 'Showcase 2 Pintu', '', 'Unit', '', 'Peralatan Kantor'),
(118, '', 'Buku A3', 'Buku A3', 'buah', '', 'ART'),
(119, '', 'Buku Ekspedisi', 'Buku Ekspedisi', 'buah', '', 'ART'),
(120, '30308', 'Anti HCV', '', 'Kit', '60 test', 'Reagen'),
(121, '30318', 'Anti Hbs Total', '', 'Kit', '60 test', 'Reagen');

-- --------------------------------------------------------

--
-- Table structure for table `batas_tanggal`
--

CREATE TABLE `batas_tanggal` (
  `id_batas_tanggal` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `periode` varchar(15) NOT NULL,
  `tahun` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `justifikasi`
--

CREATE TABLE `justifikasi` (
  `id_justifikasi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `spesifikasi_umum` varchar(255) NOT NULL,
  `alasan_kebutuhan` varchar(255) NOT NULL,
  `manfaat` varchar(255) NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ket_justifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `merek_barang`
--

CREATE TABLE `merek_barang` (
  `id_merek_barang` int(11) NOT NULL,
  `id_usulan_barang` int(11) NOT NULL,
  `nama_merek` varchar(255) NOT NULL,
  `spesifikasi_merek` text NOT NULL,
  `harga_merek` int(11) NOT NULL,
  `status_merek` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merek_barang`
--

INSERT INTO `merek_barang` (`id_merek_barang`, `id_usulan_barang`, `nama_merek`, `spesifikasi_merek`, `harga_merek`, `status_merek`, `created_at`) VALUES
(1, 1, 'Biorad CFX-96 ', '- 96 sampel per run\r\n- Touch Real-Time PCR System\r\n- Channel yang ada : HEX,TET, cal orange 560 ', 12345678, 'Pengajuan', '2021-07-05 04:48:31'),
(2, 2, 'tes', 'tes', 0, 'Pengajuan', '2021-07-05 04:50:23'),
(3, 3, 'Logitech', 'video untuk zoom dengan audio bisa di pindah pindah', 13000000, 'Pengajuan', '2021-07-05 05:02:42'),
(4, 4, 'ASUS ROG', 'asus ROG gaming untuk edit desain dan pembuatan aplikasi', 180000, 'Pengajuan', '2021-07-05 05:05:39'),
(5, 5, 'ASUS ROG', '-prosesor :  intel i10 gen 10\r\n- ram : 8 GB\r\n- memori : ssd 500GB', 18000000, 'Pengajuan', '2021-07-05 05:08:16'),
(6, 5, 'ACER Gaming', 'kdksdkb', 19000000, NULL, '2021-07-05 05:08:43'),
(7, 6, 'dddd', 'dddd', 2000000, 'Pengajuan', '2021-07-05 06:19:51'),
(12, 7, 'Aqua', 'dispenser yang ada remote nya dan bisa bikin kopi sendiri', 79854, 'Pengajuan', '2021-07-05 07:53:36'),
(15, 8, '-', '-', 0, 'Pengajuan', '2021-07-05 08:05:44'),
(16, 9, 'dsds', 'dsdsd', 2000000, 'Pengajuan', '2021-07-05 08:20:25'),
(17, 1, 'Bio system', 'ini spesifikasi jbdjsjdb ', 1243455, NULL, '2021-07-07 03:50:35'),
(18, 10, 'nnnl', 'nnlnln', 797, 'Pengajuan', '2021-07-07 12:03:04'),
(19, 11, 'nlnlnlnlnl', 'nlnlnlnlnlnl', 7979, 'Pengajuan', '2021-07-07 12:03:41'),
(20, 12, 'nknlnkn', 'nnknknkn', 79, 'Pengajuan', '2021-07-07 12:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `pdata`
--

CREATE TABLE `pdata` (
  `id_pdata` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_tersedia` int(11) NOT NULL,
  `kondisi` text NOT NULL,
  `jumlah_kebutuhan` int(11) NOT NULL,
  `justifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `pangkat_golongan` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `jabatan`, `pangkat_golongan`, `pendidikan`, `keterangan`, `id_user`) VALUES
(34, '0', 'Muhammad Fikri, S.Kom', 'staff', '-', 'S1', 'IT', 27),
(35, '196407221983122001', 'fsfsff', 'kepala', 'sfsfsf', 'fssfsf', 'sfsfsf', 17),
(36, '37474747', 'fsgsgsg', 'staff', 'sgsgsgsg', 'gsgsg', 'gssgsg', 17),
(37, '', '', 'kepala', '', '', '', 17);

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `nama_pelatihan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `jumlah_peserta` varchar(25) NOT NULL,
  `waktu_pelaksanaan` varchar(25) NOT NULL,
  `biaya_penyelenggara` varchar(25) NOT NULL,
  `status_pelatihan` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `id_usulan`, `nama_pelatihan`, `lokasi`, `penyelenggara`, `jumlah_peserta`, `waktu_pelaksanaan`, `biaya_penyelenggara`, `status_pelatihan`, `created_at`) VALUES
(2, 1, 'Pelatihan PCR', 'Jakarta', 'BSN', '3', '3', '1454323', '', '2021-07-07 08:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id_peralatan` int(11) NOT NULL,
  `nama_peralatan` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `id_proker` int(11) NOT NULL,
  `id_surat_permohonan` int(11) NOT NULL,
  `sent` int(11) NOT NULL,
  `status` varchar(255) DEFAULT 'baru',
  `posisi` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proker`
--

INSERT INTO `proker` (`id_proker`, `id_surat_permohonan`, `sent`, `status`, `posisi`, `catatan`, `tanggal_kirim`, `id_user`, `created_at`, `updated_at`) VALUES
(22, 5, 0, 'baru', NULL, NULL, NULL, 17, '2021-06-30 10:43:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reagen`
--

CREATE TABLE `reagen` (
  `id_reagen` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_usulan` int(11) NOT NULL,
  `ket_reagen` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reagen`
--

INSERT INTO `reagen` (`id_reagen`, `id_usulan`, `id_barang`, `jumlah_usulan`, `ket_reagen`, `created_at`) VALUES
(2, 1, 121, 2, 'urgent', '2021-07-07 01:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `surat_permohonan`
--

CREATE TABLE `surat_permohonan` (
  `id_surat_permohonan` int(11) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `judul_surat` varchar(255) NOT NULL,
  `isi_surat` text NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_batas_isi_proker` date DEFAULT NULL,
  `status_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_permohonan`
--

INSERT INTO `surat_permohonan` (`id_surat_permohonan`, `no_surat`, `perihal`, `lampiran`, `tgl_surat`, `judul_surat`, `isi_surat`, `keterangan`, `tgl_batas_isi_proker`, `status_surat`) VALUES
(5, '123456743', 'xcscscscscc', '7', '2021-06-30', 'permohonan', '<p style=\"text-align:justify\">Sehubungan dengan telah berakhirnya Tahun Anggaran 2020, maka dengan ini kami mengharapkan Saudara dapat menyampaikan Laporan Realisasi Kegiatan yang mengacu pada usulan Program Kerja Tahun anggaram 2020 pada Bagian/ Sub.Bagian/ Bidang/ Seksi/ Instalasi yang Saudara pimpin, format laporan terlampir, selanjutnya disampaikan kepada Kepala Bagian Keuangan dan Administrasi Umum melalui Sub Bagian Administrasi Umum BBLK Palembang selambatnya tanggal 11 Januari 2021.</p>\r\n\r\n<p style=\"text-align:justify\">Mengingat pentingnya laporan tersebut, guna mengevaluasi hasil kegiatan TA 2020 dan tersusunnya kegiatan TA 2021 yang lebih baik, diharapkan dapat disampaikan tepat waktu.</p>\r\n\r\n<p style=\"text-align:justify\">Demikianlah, atas perhatian dan kerjasama yang baik diucapkan terima kasih.</p>\r\n', '', NULL, 'Telah divalidasi Kepala');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `atasan` int(11) DEFAULT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_instalasi` varchar(255) NOT NULL,
  `nama_kepala_instalasi` varchar(100) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `password`, `atasan`, `nip`, `nama_instalasi`, `nama_kepala_instalasi`, `level`) VALUES
(1, 'Kepala BBLK Palembang', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'kepala'),
(2, 'Koordinator Tata Usaha', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'koordinator'),
(3, 'Kasubbag Adum', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'kasubbag'),
(4, 'Koordinator Marketing', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(5, 'Koordinator Loket', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(6, 'Koordinator PPC', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(7, 'Koordinator Satpam', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(8, 'Koordinator Pramubakti', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(9, 'Sekretaris Kepala', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(10, 'Sub Koord LabKesmas', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'subkoord'),
(11, 'Sub Koord Labklinik Uji Kesh.', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'subkoord'),
(12, 'Sub Koord Bimtek', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(13, 'Sub Koord Mutu', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(14, 'Koordinator Pelayanan', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(15, 'Koordinator Pem.Mutu dan Bimtek', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(16, 'Ka.Inst.Patologi', '5f4dcc3b5aa765d61d8327deb882cf99', 11, '', 'Patologi', 'Daryusman, SKM', 'instalasi'),
(17, 'Ka.Inst.Imunologi', '5f4dcc3b5aa765d61d8327deb882cf99', 11, '198508202009122002', 'Imunologi', 'Noviarly Iranny Putri, AMAK', 'instalasi'),
(18, 'Ka.Inst.Kimkes', '5f4dcc3b5aa765d61d8327deb882cf99', 10, '', 'Kimkes', '', 'instalasi'),
(19, 'Ka.Inst Mikro MO', '5f4dcc3b5aa765d61d8327deb882cf99', 11, '', 'Mikro MO', '', 'instalasi'),
(20, 'Penyelia Mikro TB', '5f4dcc3b5aa765d61d8327deb882cf99', 11, '', 'Mikro TB', '', 'instalasi'),
(21, 'Ka.Inst.Media Reagensia', '5f4dcc3b5aa765d61d8327deb882cf99', 11, '', 'Media', '', 'instalasi'),
(22, 'Ka.Inst.Pem.Sarana Prasarana', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '', 'Sarana', 'Henry Primandari, S.Kom', 'instalasi'),
(23, 'Ka.Tim Khusus', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(24, 'Sub. Koord. Keuangan', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(25, 'Administrator', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'admin'),
(26, 'Ka.Inst.Uji Kesehatan', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'instalasi'),
(27, 'IT', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'admin'),
(29, 'Admin Subbag Adum', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', '', '', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_usulan` varchar(255) NOT NULL,
  `anggaran` varchar(10) NOT NULL,
  `tgl_usulan` date NOT NULL,
  `sent` int(11) NOT NULL,
  `status` varchar(255) DEFAULT 'Pengajuan',
  `tgl_kirim` date DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `id_user`, `no_usulan`, `anggaran`, `tgl_usulan`, `sent`, `status`, `tgl_kirim`, `posisi`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 17, '12345678', '2021', '2021-06-30', 1, 'Proses', '2021-07-08', 'Sub Koord Labklinik Uji Kesh.', '', '2021-06-30 12:06:02', '2021-07-08 09:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `usulan_barang`
--

CREATE TABLE `usulan_barang` (
  `id_usulan_barang` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_tersedia` int(11) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `jumlah_kebutuhan` int(11) NOT NULL,
  `justifikasi` text NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usulan_barang`
--

INSERT INTO `usulan_barang` (`id_usulan_barang`, `id_usulan`, `id_barang`, `jumlah_tersedia`, `kondisi`, `jumlah_kebutuhan`, `justifikasi`, `kategori`, `created_at`) VALUES
(1, 1, 63, 0, '-', 1, 'untuk proses RT-PCR sampel SARS-Soc-2, karena alat CFX Connect akan dikembalikan ke FK Unsri', 'alkes', '2021-07-05 04:48:31'),
(3, 1, 91, 0, '-', 1, 'untuk keperluan zoom meeting', 'Pengelola Data', '2021-07-05 05:02:42'),
(7, 1, 100, 1, '-', 1, 'aghgfddfghgfdfghjhgfdfghjhg', 'Peralatan Kantor', '2021-07-05 07:53:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`id_art`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `batas_tanggal`
--
ALTER TABLE `batas_tanggal`
  ADD PRIMARY KEY (`id_batas_tanggal`);

--
-- Indexes for table `justifikasi`
--
ALTER TABLE `justifikasi`
  ADD PRIMARY KEY (`id_justifikasi`);

--
-- Indexes for table `merek_barang`
--
ALTER TABLE `merek_barang`
  ADD PRIMARY KEY (`id_merek_barang`);

--
-- Indexes for table `pdata`
--
ALTER TABLE `pdata`
  ADD PRIMARY KEY (`id_pdata`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_peralatan`);

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id_proker`);

--
-- Indexes for table `reagen`
--
ALTER TABLE `reagen`
  ADD PRIMARY KEY (`id_reagen`);

--
-- Indexes for table `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  ADD PRIMARY KEY (`id_surat_permohonan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- Indexes for table `usulan_barang`
--
ALTER TABLE `usulan_barang`
  ADD PRIMARY KEY (`id_usulan_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `batas_tanggal`
--
ALTER TABLE `batas_tanggal`
  MODIFY `id_batas_tanggal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `justifikasi`
--
ALTER TABLE `justifikasi`
  MODIFY `id_justifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `merek_barang`
--
ALTER TABLE `merek_barang`
  MODIFY `id_merek_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pdata`
--
ALTER TABLE `pdata`
  MODIFY `id_pdata` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id_peralatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `proker`
--
ALTER TABLE `proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reagen`
--
ALTER TABLE `reagen`
  MODIFY `id_reagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  MODIFY `id_surat_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usulan_barang`
--
ALTER TABLE `usulan_barang`
  MODIFY `id_usulan_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
