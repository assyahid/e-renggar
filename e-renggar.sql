-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2021 pada 05.19
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
(1, 'Smartphone', 'hp', 'unit', 'Peralatan Kantor'),
(2, 'File Box', 'box file', 'unit', 'Peralatan Kantor');

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

--
-- Dumping data untuk tabel `justifikasi`
--

INSERT INTO `justifikasi` (`id_justifikasi`, `id_barang`, `spesifikasi_umum`, `alasan_kebutuhan`, `manfaat`, `jumlah_unit`, `id_proker`, `id_user`, `ket_justifikasi`) VALUES
(7, 2, 'spek umum', 'butuh bae', 'bermanfaat', 3, 6, 17, 'dibutuhkan'),
(8, 1, 'spek umum', 'butuh bae', 'bermanfaat', 5, 6, 17, 'dibutuhkan'),
(9, 1, 'Umum', 'butuh bae', 'bermanfaat', 34, 6, 17, 'dibutuhkan');

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

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `jabatan`, `pendidikan`, `keterangan`, `id_user`) VALUES
(13, '199601022020121005', 'Aspiah Febrianti, A.Md', 'staff', 'S1', '-', 11),
(14, '199601022020121007', 'Eka Putra Deswanto, SE', 'staff', 'S1', '-', 17),
(15, '199601022020121004', 'M.Hakim Amransyah', 'staff', 'S1', '-', 17);

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

--
-- Dumping data untuk tabel `peralatan`
--

INSERT INTO `peralatan` (`id_peralatan`, `nama_peralatan`, `jenis`, `satuan`, `jumlah`, `keterangan`, `id_user`) VALUES
(3, 'Spinner', 'Jenis', 'xx', 4, 'Rusak', 17),
(4, 'Spinner gg', 'xx', 'yy', 1, 'ok', 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proker`
--

CREATE TABLE `proker` (
  `id_proker` int(11) NOT NULL,
  `id_surat_permohonan` int(11) NOT NULL,
  `sent` int(11) NOT NULL,
  `status` varchar(255) DEFAULT 'baru',
  `tanggal_kirim` date DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proker`
--

INSERT INTO `proker` (`id_proker`, `id_surat_permohonan`, `sent`, `status`, `tanggal_kirim`, `id_user`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 'baru', '2021-05-20', 17, '2021-05-20 08:37:04', '2021-05-20 10:02:25'),
(7, 2, 0, 'baru', NULL, 16, '2021-05-20 10:18:49', NULL);

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

--
-- Dumping data untuk tabel `surat_permohonan`
--

INSERT INTO `surat_permohonan` (`id_surat_permohonan`, `no_surat`, `perihal`, `lampiran`, `tgl_surat`, `judul_surat`, `isi_surat`, `keterangan`, `tgl_batas_isi_proker`, `status_surat`) VALUES
(1, 'PR.01.05/XLII/CCD/2020 ', 'Permintaan Laporan Realisasi Kegiatan TA. 2020', '3 (tiga) lembar', '2021-05-11', '-', 'Sehubungan dengan telah berakhirnya Tahun Anggaran 2020, maka dengan ini kami mengharapkan Saudara dapat menyampaikan Laporan Realisasi Kegiatan yang mengacu pada usulan Program Kerja Tahun Anggaran 2020 pada Bagian/ Sub.Bagian/ Bidang/ Seksi/ Instalasi yang Saudara pimpin, format laporan terlampir, selanjutnya disampaikan kepada Kepala Bagian Keuangan dan Administrasi Umum melalui Sub Bagian Administrasi Umum BBLK Palembang selambatnya tanggal  11 Januari 2021.\r\n\r\nMengingat pentingnya laporan tersebut, guna mengevaluasi hasil kegiatan TA 2020 dan tersusunnya kegiatan TA 2021 yang lebih baik, diharapkan dapat disampaikan tepat waktu.\r\n\r\nDemikianlah, atas perhatian dan kerjasama yang baik diucapkan terima kasih.', '', '2021-05-21', 'Telah divalidasi Kepala'),
(2, 'PR.01.05/XLII/CCD/2020 ', 'Permintaan Laporan Realisasi Kegiatan TA. 2020', '3 (tiga) lembar', '2021-05-19', '-', '<p style=\"text-align:justify\">Sehubungan dengan telah berakhirnya Tahun Anggaran 2020, maka dengan ini kami mengharapkan Saudara dapat menyampaikan Laporan Realisasi Kegiatan yang mengacu pada usulan Program Kerja Tahun anggaram 2020 pada Bagian/ Sub.Bagian/ Bidang/ Seksi/ Instalasi yang Saudara pimpin, format laporan terlampir, selanjutnya disampaikan kepada Kepala Bagian Keuangan dan Administrasi Umum melalui Sub Bagian Administrasi Umum BBLK Palembang selambatnya tanggal 11 Januari 2021.</p>\r\n\r\n<p style=\"text-align:justify\">Mengingat pentingnya laporan tersebut, guna mengevaluasi hasil kegiatan TA 2020 dan tersusunnya kegiatan TA 2021 yang lebih baik, diharapkan dapat disampaikan tepat waktu.</p>\r\n\r\n<p style=\"text-align:justify\">Demikianlah, atas perhatian dan kerjasama yang baik diucapkan terima kasih.</p>\r\n', '', NULL, 'Telah divalidasi Kepala');

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `batas_tanggal`
--
ALTER TABLE `batas_tanggal`
  MODIFY `id_batas_tanggal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `justifikasi`
--
ALTER TABLE `justifikasi`
  MODIFY `id_justifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id_peralatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `proker`
--
ALTER TABLE `proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  MODIFY `id_surat_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
