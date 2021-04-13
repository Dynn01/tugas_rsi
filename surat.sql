-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2021 pada 05.15
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda_keluar`
--

CREATE TABLE `agenda_keluar` (
  `PK` int(5) NOT NULL,
  `no_urutk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agenda_keluar`
--

INSERT INTO `agenda_keluar` (`PK`, `no_urutk`) VALUES
(1, 'nosurat'),
(2, 'noagd'),
(3, 'kd_bidang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda_masuk`
--

CREATE TABLE `agenda_masuk` (
  `PK` int(5) NOT NULL,
  `no_urut` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agenda_masuk`
--

INSERT INTO `agenda_masuk` (`PK`, `no_urut`) VALUES
(1, 'noagd'),
(2, 'No_surat'),
(3, 'tglmasuk'),
(4, 'disposisi'),
(5, 'tgldipsosisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `PK` int(11) NOT NULL,
  `kd_inst` varchar(20) NOT NULL,
  `nm_inst` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`PK`, `kd_inst`, `nm_inst`, `status`) VALUES
(8, 'F2BVH', 'SMK 3 SKJ', 'TES'),
(9, 'CV7YUI', 'SMK 2 SKJ', 'tes'),
(10, 'PLJ890HU', 'SMK 1 SKJ', 'tes'),
(11, 'BUJ567KK', 'SMK MUH 4 SKJ', 'TES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `PK` int(11) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`PK`, `jenis`) VALUES
(2, 'Operasi Kulit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `PK` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `kd_inst` varchar(20) DEFAULT NULL,
  `tglsurat` date DEFAULT NULL,
  `lampiran` varchar(20) DEFAULT NULL,
  `tgltransaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`PK`, `no_surat`, `kd_inst`, `tglsurat`, `lampiran`, `tgltransaksi`) VALUES
(12, 'K2103210001', 'CV7YUI', '2021-03-29', 'file_12.pdf', '2021-03-21'),
(13, 'K3003210001', 'F2BVH', '2021-03-16', 'file_13.pdf', '2021-03-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `PK` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `kd_inst` varchar(20) DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `tglsurat` date DEFAULT NULL,
  `tgltransaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`PK`, `no_surat`, `kd_inst`, `perihal`, `tglsurat`, `tgltransaksi`) VALUES
(5, 'M2203210001', 'CV7YUI', 'surat permohonan magang', '2021-03-15', '2021-03-22'),
(6, '4R24HKM', 'F2BVH', 'magang', '2021-03-10', '2021-03-30'),
(7, '998097KOJ', 'BUJ567KK', 'kunjungan', '2021-04-01', '2021-04-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_umum`
--

CREATE TABLE `surat_umum` (
  `PK` int(5) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_umum`
--

INSERT INTO `surat_umum` (`PK`, `no_surat`) VALUES
(1, 'Jenis'),
(2, 'Perihal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_und`
--

CREATE TABLE `surat_und` (
  `PK` int(5) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_und`
--

INSERT INTO `surat_und` (`PK`, `no_surat`) VALUES
(1, 'acara'),
(2, 'tglacara'),
(3, 'tempat'),
(4, 'pukul'),
(5, 'kpd'),
(6, 'ket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terus`
--

CREATE TABLE `terus` (
  `PK` int(5) NOT NULL,
  `kd_bidang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `terus`
--

INSERT INTO `terus` (`PK`, `kd_bidang`) VALUES
(1, 'tglterus'),
(2, 'bentuk'),
(3, 'terima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `PK` int(11) NOT NULL,
  `kd_unit` varchar(20) NOT NULL,
  `nm_unit` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`PK`, `kd_unit`, `nm_unit`) VALUES
(4, 'FSGU6O9', 'IT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `PK` int(11) NOT NULL,
  `nama_pegawai` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`PK`, `nama_pegawai`, `password`, `level`) VALUES
(1, 'Lemon', 'lemon123', 'admin'),
(4, 'Ronaldo', 'ronaldo123', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda_keluar`
--
ALTER TABLE `agenda_keluar`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `agenda_masuk`
--
ALTER TABLE `agenda_masuk`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `surat_umum`
--
ALTER TABLE `surat_umum`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `surat_und`
--
ALTER TABLE `surat_und`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `terus`
--
ALTER TABLE `terus`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`PK`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`PK`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
