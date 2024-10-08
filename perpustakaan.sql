-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2024 pada 06.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `perpustakaan`

-- Struktur dari tabel `log_pinjam`
CREATE TABLE `log_pinjam` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_buku` (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `log_pinjam`
INSERT INTO `log_pinjam` (`id_log`, `id_buku`, `id_anggota`, `tgl_pinjam`) VALUES
(1, 'B001', 'A001', '2020-06-23'),
(2, 'B002', 'A001', '2020-06-25'),
(3, 'B003', 'A002', '2020-06-01'),
(5, 'B005', 'A001', '2024-07-25'),
(6, 'B005', 'A002', '2024-02-01'),
(7, 'B001', 'A005', '2024-08-06');

-- Struktur dari tabel `tb_anggota`
CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `tb_anggota`
INSERT INTO `tb_anggota` (`id_anggota`, `id_pengguna`, `nama`, `jekel`, `kelas`, `no_hp`) VALUES
('A001', 12, 'Ana', 'Perempuan', 'juwana', '089987789000'),
('A002', 13, 'Bagus', 'Laki-laki', 'demak', '089987789098'),
('A003', 14, 'Citra', 'Perempuan', 'demak', '085878526048'),
('A004', 13, 'Didik', 'Laki-laki', 'pati', '087789987654'),
('A005', 13, 'victor senpai', 'Laki-laki', 'xx', '8888');

-- Struktur dari tabel `tb_buku`
CREATE TABLE `tb_buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `th_terbit` year(4) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `tb_buku`
INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `th_terbit`) VALUES
('B001', 'Matematika', 'anastasya', 'armi print', '2010'),
('B002', 'RPL 2', 'Eko', 'UMK', '2020'),
('B003', 'C++', 'Anton', 'Toni Perc', '2010'),
('B004', 'CI 4', 'anastasya', 'armi print', '2009'),
('B005', 'Data Mining', 'Anton', 'Toni Perc', '2020'),
('B006', 'alone', 'victor', 'victor', '2024'),
('B007', 'terbang', 'victor', 'victor', '2011');

-- Struktur dari tabel `tb_pengguna`
CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Administrator','Petugas','User') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `tb_pengguna`
INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(12, 'miftah', 'miftah', '202cb962ac59075b964b07152d234b70', 'Administrator'),
(13, 'victor', 'victor', '202cb962ac59075b964b07152d234b70', 'Petugas'),
(14, 'zen', 'zen', '202cb962ac59075b964b07152d234b70', 'User');

-- Struktur dari tabel `tb_sirkulasi`
CREATE TABLE `tb_sirkulasi` (
  `id_sk` varchar(20) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('PIN','KEM') NOT NULL,
  PRIMARY KEY (`id_sk`),
  KEY `id_buku` (`id_buku`),
  KEY `id_anggota` (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `tb_sirkulasi`
INSERT INTO `tb_sirkulasi` (`id_sk`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('S001', 'B001', 'A002', '2024-07-24', '2024-07-31', 'PIN'),
('S002', 'B005', 'A001', '2024-07-25', '2024-08-01', 'KEM'),
('S003', 'B005', 'A002', '2024-02-01', '2024-02-08', 'KEM'),
('S004', 'B001', 'A005', '2024-08-06', '2024-08-13', 'PIN');

-- Relasi antar tabel
ALTER TABLE `log_pinjam`
  ADD CONSTRAINT `log_pinjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna`(`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tb_sirkulasi`
  ADD CONSTRAINT `tb_sirkulasi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sirkulasi_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;
