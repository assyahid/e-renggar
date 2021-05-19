-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2021 pada 05.03
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

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
  `alasan_kebutuhan` text NOT NULL,
  `manfaat` text NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `ket_justifikasi` text NOT NULL,
  `id_user` int(11) NOT NULL
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
  `id_user` int(11) NOT NULL
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
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `password`, `atasan`, `level`) VALUES
(1, 'Kepala BBLK Palembang', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'kepala'),
(2, 'Koordinator Tata Usaha', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'koordinator'),
(3, 'Kasubbag Adum', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'kasubbag'),
(4, 'Koordinator Marketing', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(5, 'Koordinator Loket', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(6, 'Koordinator PPC', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(7, 'Koordinator Satpam', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(8, 'Koordinator Pramubakti', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(9, 'Sekretaris Kepala', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(10, 'Sub Koord LabKesmas', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(11, 'Sub Koord Labklinik Uji Kesh.', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(12, 'Sub Koord Bimtek', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(13, 'Sub Koord Mutu', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(14, 'Koordinator Pelayanan', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(15, 'Koordinator Pem.Mutu dan Bimtek', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(16, 'Ka.Inst.Patologi', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(17, 'Ka.Inst.Imunologi', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(18, 'Ka.Inst.Kimkes', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(19, 'Ka.Inst Mikro MO', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(20, 'Penyelia Mikro TB', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(21, 'Ka.Inst.Media Reagensia', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(22, 'Ka.Inst.Pem.Sarana Prasarana', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(23, 'Ka.Tim Khusus', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(24, 'Sub. Koord. Keuangan', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(25, 'Administrator', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'admin'),
(26, 'Ka.Inst.Uji Kesehatan', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'instalasi'),
(27, 'IT', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'admin'),
(29, 'Admin Subbag Adum', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'operator');

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
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_peralatan`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `batas_tanggal`
--
ALTER TABLE `batas_tanggal`
  MODIFY `id_batas_tanggal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id_peralatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  MODIFY `id_surat_permohonan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
