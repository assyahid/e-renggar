-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2021 pada 11.03
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `nama_umum` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `kategori` enum('Alat Kesehatan','Pengolah Data','Peralatan Kantor','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `nama_umum`, `satuan`, `kategori`) VALUES
(1, 'Adjustable Pipet 100 ul', '', 'Unit', 'Alat Kesehatan'),
(2, 'Adjustable Pipet 1000 ul', '', 'Unit', 'Alat Kesehatan'),
(3, 'Alat EKG', '', 'Unit', 'Alat Kesehatan'),
(4, 'Alat EKG yang mempunyai baterai dan memory', '', 'Unit', 'Alat Kesehatan'),
(5, 'Alat Emisi Udara', '', 'Unit', 'Alat Kesehatan'),
(6, 'Alat Opasitas Emisi', '', 'Unit', 'Alat Kesehatan'),
(7, 'Alat Penghitung Koloni Automatic / Colony Counter Automatic', '', 'Unit', 'Alat Kesehatan'),
(8, 'Alat Spirometri', '', 'Unit', 'Alat Kesehatan'),
(9, 'Alat untuk pewarnaan ZN', '', 'Unit', 'Alat Kesehatan'),
(10, 'Alegria random access analyzer', '', 'Unit', 'Alat Kesehatan'),
(11, 'Anak Timbangan', '', 'Unit', 'Alat Kesehatan'),
(12, 'Audiometer testing box', '', 'Unit', 'Alat Kesehatan'),
(13, 'Autoclave', '', 'Unit', 'Alat Kesehatan'),
(14, 'Automatic Blood Pressure Monitor', '', 'Unit', 'Alat Kesehatan'),
(15, 'Automatic External Defibrilator', '', 'Unit', 'Alat Kesehatan'),
(16, 'Automatic Extraction', '', 'Unit', 'Alat Kesehatan'),
(17, 'Autosampler GCMS', '', 'Unit', 'Alat Kesehatan'),
(18, 'Autosampler ICP', '', 'Unit', 'Alat Kesehatan'),
(19, 'Biosafety Cabinet', '', 'Unit', 'Alat Kesehatan'),
(20, 'Cobas Taqman 48 Filter for Air Power Supply', '', 'Unit', 'Alat Kesehatan'),
(21, 'Cobas Taqman 48 Filter for Fan', '', 'Unit', 'Alat Kesehatan'),
(22, 'Densi Check', '', 'Unit', 'Alat Kesehatan'),
(23, 'Diagnostic Set', '', 'Unit', 'Alat Kesehatan'),
(24, 'DR System untuk rontgen', '', 'Unit', 'Alat Kesehatan'),
(25, 'Easypet', '', 'Unit', 'Alat Kesehatan'),
(26, 'Electrolite Analyzer', '', 'Unit', 'Alat Kesehatan'),
(27, 'Elektroda Flourida', '', 'Unit', 'Alat Kesehatan'),
(28, 'Elektroda Nitrat', '', 'Unit', 'Alat Kesehatan'),
(29, 'Elektroda Nitrit', '', 'Unit', 'Alat Kesehatan'),
(30, 'Gas Radon Meter', '', 'Unit', 'Alat Kesehatan'),
(31, 'GCMS', '', 'Unit', 'Alat Kesehatan'),
(32, 'Generator Gas', '', 'Unit', 'Alat Kesehatan'),
(33, 'Haz Dust', '', 'Unit', 'Alat Kesehatan'),
(34, 'Hemostasis Analyzer', '', 'Unit', 'Alat Kesehatan'),
(35, 'Hot Plate Stirer', '', 'Unit', 'Alat Kesehatan'),
(36, 'Incubator', '', 'Unit', 'Alat Kesehatan'),
(37, 'Kamera Mikroskop', '', 'Unit', 'Alat Kesehatan'),
(38, 'Kimia Klinik analyzer', '', 'Unit', 'Alat Kesehatan'),
(39, 'Kursi Phlebotomy Otomatis', '', 'Unit', 'Alat Kesehatan'),
(40, 'Kursi Plebotomy', '', 'Unit', 'Alat Kesehatan'),
(41, 'Mercury Analyzer', '', 'Unit', 'Alat Kesehatan'),
(42, 'Microscope Binoculer', '', 'Unit', 'Alat Kesehatan'),
(43, 'Microwave', '', 'Unit', 'Alat Kesehatan'),
(44, 'Microwave Digestion', '', 'Unit', 'Alat Kesehatan'),
(45, 'Mikropipet 10 ul', '', 'Unit', 'Alat Kesehatan'),
(46, 'Mikropipette Adjustable 1000 ul', '', 'Unit', 'Alat Kesehatan'),
(47, 'Mikropipette Adjustable 20 ul', '', 'Unit', 'Alat Kesehatan'),
(48, 'Mikropipette Adjustable 200 ul', '', 'Unit', 'Alat Kesehatan'),
(49, 'Mikropipette Adjustable 50 - 500 ul', '', 'Unit', 'Alat Kesehatan'),
(50, 'Mikroskop', '', 'Unit', 'Alat Kesehatan'),
(51, 'Mikroskop Kamera', '', 'Unit', 'Alat Kesehatan'),
(52, 'Mini Inkubator', '', 'Unit', 'Alat Kesehatan'),
(53, 'Mini Waterbath', '', 'Unit', 'Alat Kesehatan'),
(54, 'Mobile Station lengkap dengan Rontgen Mobile', '', 'Unit', 'Alat Kesehatan'),
(55, 'Perforator media agar', '', 'Unit', 'Alat Kesehatan'),
(56, 'pH Meter Jarum', '', 'Unit', 'Alat Kesehatan'),
(57, 'Pirolysis', '', 'Unit', 'Alat Kesehatan'),
(58, 'Portable Digital Ozone Meter', '', 'Unit', 'Alat Kesehatan'),
(59, 'Portable Emission Analyzer', '', 'Unit', 'Alat Kesehatan'),
(60, 'Portable Gas Monitor', '', 'Unit', 'Alat Kesehatan'),
(61, 'Prosesing Foto Rontgen', '', 'Unit', 'Alat Kesehatan'),
(62, 'Real time cycler rotor gene Q', '', 'Unit', 'Alat Kesehatan'),
(63, 'Real time PCR CFX-96', '', 'Unit', 'Alat Kesehatan'),
(64, 'Sealer Machine', '', 'Unit', 'Alat Kesehatan'),
(65, 'Spektrofotometer Simultan', '', 'Unit', 'Alat Kesehatan'),
(66, 'Spindown Plate', '', 'Unit', 'Alat Kesehatan'),
(67, 'Spindown Tube', '', 'Unit', 'Alat Kesehatan'),
(68, 'Spirometer MIR Spirolab', '', 'Unit', 'Alat Kesehatan'),
(69, 'Spirometri', '', 'Unit', 'Alat Kesehatan'),
(70, 'Standar F200 Analyzer', '', 'Unit', 'Alat Kesehatan'),
(71, 'Stomacher', '', 'Unit', 'Alat Kesehatan'),
(72, 'Stomacher Ukuran Kecil', '', 'Unit', 'Alat Kesehatan'),
(73, 'T100 Thermal Cycler', '', 'Unit', 'Alat Kesehatan'),
(74, 'Tabir Radiasi', '', 'Unit', 'Alat Kesehatan'),
(75, 'Teaching Mikroskop', '', 'Unit', 'Alat Kesehatan'),
(76, 'Tensimeter Air Raksa Berdiri', '', 'Unit', 'Alat Kesehatan'),
(77, 'Tensimeter Aneroid Jarum Standing', '', 'Unit', 'Alat Kesehatan'),
(78, 'Thermometer Badan', '', 'Unit', 'Alat Kesehatan'),
(79, 'Thermometer Tersertifikasi', '', 'Unit', 'Alat Kesehatan'),
(80, 'Timbangan 5 Angka dibelakang koma', '', 'Unit', 'Alat Kesehatan'),
(81, 'Titrimetri Automatic', '', 'Unit', 'Alat Kesehatan'),
(82, 'Total Organic Carbon', '', 'Unit', 'Alat Kesehatan'),
(83, 'Treadmill stress test', '', 'Unit', 'Alat Kesehatan'),
(84, 'UPS', '', 'Unit', 'Alat Kesehatan'),
(85, 'Vitex Identification', '', 'Unit', 'Alat Kesehatan'),
(86, 'Vortex ', '', 'Unit', 'Alat Kesehatan'),
(87, 'Water bath', '', 'Unit', 'Alat Kesehatan'),
(88, '', '', '', ''),
(89, 'Computer', '', 'Unit', 'Pengolah Data'),
(90, 'DVR CCTV', '', 'Unit', 'Pengolah Data'),
(91, 'Kamera Video Conference', '', 'Unit', 'Pengolah Data'),
(92, 'Laptop', '', 'Unit', 'Pengolah Data'),
(93, 'Printer + Copy scan', '', 'Unit', 'Pengolah Data'),
(94, 'Printer Copy ', '', 'Unit', 'Pengolah Data'),
(95, 'Printer Infuse berwarna', '', 'Unit', 'Pengolah Data'),
(96, 'Scanner', '', 'Unit', 'Pengolah Data'),
(97, 'Stabilizer', '', 'Unit', 'Pengolah Data'),
(98, 'UPS', '', 'Unit', 'Pengolah Data'),
(99, '', '', '', ''),
(100, 'Dispenser', '', 'Unit', 'Peralatan Kantor'),
(101, 'Filing Cabinet', '', 'Unit', 'Peralatan Kantor'),
(102, 'Kursi Bulat Hidrolic', '', 'Unit', 'Peralatan Kantor'),
(103, 'Kursi Kerja', '', 'Unit', 'Peralatan Kantor'),
(104, 'Kursi Lab', '', 'Unit', 'Peralatan Kantor'),
(105, 'Kursi Tamu', '', 'Unit', 'Peralatan Kantor'),
(106, 'Lemari Arsip', '', 'Unit', 'Peralatan Kantor'),
(107, 'Lemari dan meja bundling custom', '', 'Unit', 'Peralatan Kantor'),
(108, 'Meja Custom', '', 'Unit', 'Peralatan Kantor'),
(109, 'Meja Kecil', '', 'Unit', 'Peralatan Kantor'),
(110, 'Meja Kerja', '', 'Unit', 'Peralatan Kantor'),
(111, 'Meja Kerja', '', 'Unit', 'Peralatan Kantor'),
(112, 'Meja Tamu', '', 'Unit', 'Peralatan Kantor'),
(113, 'Mesin Penghancur Kertas', '', 'Unit', 'Peralatan Kantor'),
(114, 'Rak Dokumen', '', 'Unit', 'Peralatan Kantor'),
(115, 'Rolling Cabinet', '', 'Unit', 'Peralatan Kantor'),
(116, 'Showcase 1 Pintu', '', 'Unit', 'Peralatan Kantor'),
(117, 'Showcase 2 Pintu', '', 'Unit', 'Peralatan Kantor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `batas_tanggal`
--

CREATE TABLE `batas_tanggal` (
  `id_batas_tanggal` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `periode` varchar(15) NOT NULL,
  `tahun` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `justifikasi`
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
-- Struktur dari tabel `pegawai`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan`
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
-- Struktur dari tabel `proker`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_permohonan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `atasan` int(11) DEFAULT NULL,
  `nama_instalasi` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `password`, `atasan`, `nama_instalasi`, `level`) VALUES
(1, 'Kepala BBLK Palembang', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'kepala'),
(2, 'Koordinator Tata Usaha', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'koordinator'),
(3, 'Kasubbag Adum', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'kasubbag'),
(4, 'Koordinator Marketing', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(5, 'Koordinator Loket', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(6, 'Koordinator PPC', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(7, 'Koordinator Satpam', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(8, 'Koordinator Pramubakti', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(9, 'Sekretaris Kepala', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(10, 'Sub Koord LabKesmas', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'subkoord'),
(11, 'Sub Koord Labklinik Uji Kesh.', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'subkoord'),
(12, 'Sub Koord Bimtek', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(13, 'Sub Koord Mutu', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(14, 'Koordinator Pelayanan', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(15, 'Koordinator Pem.Mutu dan Bimtek', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(16, 'Ka.Inst.Patologi', '5f4dcc3b5aa765d61d8327deb882cf99', 11, 'Patologi', 'instalasi'),
(17, 'Ka.Inst.Imunologi', '5f4dcc3b5aa765d61d8327deb882cf99', 11, 'Imunologi', 'instalasi'),
(18, 'Ka.Inst.Kimkes', '5f4dcc3b5aa765d61d8327deb882cf99', 10, 'Kimkes', 'instalasi'),
(19, 'Ka.Inst Mikro MO', '5f4dcc3b5aa765d61d8327deb882cf99', 11, 'Mikro MO', 'instalasi'),
(20, 'Penyelia Mikro TB', '5f4dcc3b5aa765d61d8327deb882cf99', 11, 'Mikro TB', 'instalasi'),
(21, 'Ka.Inst.Media Reagensia', '5f4dcc3b5aa765d61d8327deb882cf99', 11, 'Media', 'instalasi'),
(22, 'Ka.Inst.Pem.Sarana Prasarana', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Sarana', 'instalasi'),
(23, 'Ka.Tim Khusus', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(24, 'Sub. Koord. Keuangan', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(25, 'Administrator', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'admin'),
(26, 'Ka.Inst.Uji Kesehatan', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'instalasi'),
(27, 'IT', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'admin'),
(29, 'Admin Subbag Adum', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `batas_tanggal`
--
ALTER TABLE `batas_tanggal`
  ADD PRIMARY KEY (`id_batas_tanggal`);

--
-- Indeks untuk tabel `justifikasi`
--
ALTER TABLE `justifikasi`
  ADD PRIMARY KEY (`id_justifikasi`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_peralatan`);

--
-- Indeks untuk tabel `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id_proker`);

--
-- Indeks untuk tabel `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  ADD PRIMARY KEY (`id_surat_permohonan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `batas_tanggal`
--
ALTER TABLE `batas_tanggal`
  MODIFY `id_batas_tanggal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `justifikasi`
--
ALTER TABLE `justifikasi`
  MODIFY `id_justifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id_peralatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `proker`
--
ALTER TABLE `proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  MODIFY `id_surat_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
