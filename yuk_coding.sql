-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2025 pada 19.42
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yuk_coding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `judul_materi` varchar(225) DEFAULT NULL,
  `link_youtube` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_modul`, `judul_materi`, `link_youtube`) VALUES
(3, 1, 'Pengenalan', 'https://www.youtube.com/embed/wriGST3vp5M'),
(4, 3, ' Apa itu Javascript?', 'https://www.youtube.com/embed/sNLadea-tLU'),
(5, 2, 'Apa Itu CSS?', 'https://www.youtube.com/embed/V-DD30lGAL0'),
(6, 2, 'Selektor Dasar CSS', 'https://www.youtube.com/embed/8NpcAcSmRU8'),
(7, 2, 'Group Selector CSS', 'https://www.youtube.com/embed/_ryPm4FGwus'),
(8, 4, 'Pengenalan Bootstrap ', 'https://www.youtube.com/embed/WB2X_AG-SSo'),
(10, 2, 'Elemen Spesifik Selector', 'https://www.youtube.com/embed/PK8LfL39vAw'),
(11, 2, 'Cara Mengubah Warna Dan Gaya Link Saat di Hover', 'https://www.youtube.com/embed/dNBpp3MYvVs'),
(12, 2, 'Mengubah Jenis Huruf Teks', 'https://www.youtube.com/embed/U_PPCMbkv90'),
(14, 1, 'Instalasi', 'https://www.youtube.com/embed/GAd6FTsGSY8'),
(15, 1, 'Struktur Html', 'https://www.youtube.com/embed/TM12RA6cmOQ'),
(16, 6, 'Intro', 'https://www.youtube.com/embed/HqAMb6kqlLs'),
(17, 6, 'Instalasi & Konfigurasi', 'https://www.youtube.com/embed/pZqk57Xvujs'),
(18, 6, ' Struktur Folder, Routes & View', 'https://www.youtube.com/embed/u7zS2XpMpsc'),
(19, 6, 'Blade Templating Engine', 'https://www.youtube.com/embed/9jrD0wcfq1g'),
(20, 1, 'Heading dan Paragraph', 'https://www.youtube.com/embed/bd03BfqfOSk'),
(21, 1, 'Underline, Superscript dan Subscript', 'https://www.youtube.com/embed/F9Joj-lm4T0'),
(22, 1, ' Line Break dan Horizontal Rule', 'https://www.youtube.com/embed/C3g0-M5Raws'),
(23, 3, 'Instalasi ', 'https://www.youtube.com/embed/H5ezVh3kuhI'),
(24, 3, 'Menjalankan JavaScript', 'https://www.youtube.com/embed/BN6fyGVf5A4'),
(25, 3, 'Variabel (let , var, const)', 'https://www.youtube.com/embed/op30bc1Mm60'),
(26, 3, ' Tipe Data', 'https://www.youtube.com/embed/v5qtnn9eJ2M'),
(27, 4, 'Cara Download dan Install', 'https://www.youtube.com/embed/z4EZZjrLsvE'),
(28, 4, 'Responsive, Breakpoints, Container, Grid', 'https://www.youtube.com/embed/imwbwbF8pgw'),
(29, 4, 'Membuat Navbar dan Menu Bar ', 'https://www.youtube.com/embed/zxxRuRH0iuI'),
(30, 4, 'Bootstrap Utilities ', 'https://www.youtube.com/embed/h64nu64lz8Q'),
(31, 7, 'Pengenalan Python', 'https://www.youtube.com/embed/-DGFFxblTUw'),
(32, 7, 'Variabel Python', 'https://www.youtube.com/embed/OFYXe6qoYok'),
(33, 7, 'Comment Python', 'https://www.youtube.com/embed/jfZYh-uEi_A'),
(34, 7, 'Type Data Python', 'https://www.youtube.com/embed/ZjssXCmqguU'),
(35, 7, 'Praktik Type Data', 'https://www.youtube.com/embed/D44jsq-SOqM'),
(36, 6, 'Model, Collection & Controller', 'https://www.youtube.com/embed/ptWgufbjURA'),
(37, 6, 'Database, Migration & Eloquent', 'https://www.youtube.com/embed/ePBWUZRQdrI'),
(38, 6, 'Post Model', 'https://www.youtube.com/embed/o1em86nhU28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama_mitra` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `foto`) VALUES
(2, 'Unilever', '1716237515_77d6a680efb5a95d92e0.png'),
(3, 'Pertamina', '1716237548_913ffbbbedc51a572b57.png'),
(4, 'Vokasi', '1717116785_a1a4859f1bef5a96a023.png'),
(5, 'Cisco', '1717116800_8a9442b291181a984b3a.png'),
(6, 'Adobe', '1717116764_71e5401ecaf2f2394163.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `nama_modul` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `foto`) VALUES
(1, 'HTML', '1716454891_acab61c8f897e8ec0367.png'),
(2, 'CSS', '1716239202_9a8f772fd076e43cdd0a.png'),
(3, 'Javascript', '1716239222_8e19a9794e1a2f5d4c99.png'),
(4, 'Bootstrap', '1716239242_7302ac4ebcf6b1cb7d62.png'),
(6, 'Laravel', '1716455370_095c3ec02e865afca5bc.png'),
(7, 'Python', '1716860422_2aeeb36bf8012b823565.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nama_pengajar` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nama_pengajar`, `foto`) VALUES
(2, 'Romi Satrio', '1716236067_879ecad9903cfefd064e.png'),
(3, 'Budi Rahardjo', '1716236090_d629f53a9e5d0877c356.png'),
(4, 'Narendra Wicaksono', '1716236110_c7cf0bc941ae0ab0d1c9.png'),
(6, 'Sutrisno', '1716560852_2d1b9e92d2d2c1b1e97a.png'),
(8, 'Sandhika Galih', '1717116719_bb8ccc16d265b79c031b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `id_progress` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `progress`
--

INSERT INTO `progress` (`id_progress`, `id_modul`, `id_materi`, `id_user`) VALUES
(1, 2, 5, 2),
(2, 2, 5, 4),
(3, 2, 6, 4),
(4, 2, 6, 2),
(5, 1, 3, 2),
(6, 3, 4, 2),
(7, 1, 3, 4),
(8, 3, 4, 4),
(10, 2, 7, 4),
(11, 2, 10, 4),
(12, 2, 11, 4),
(13, 2, 12, 4),
(14, 1, 3, 9),
(15, 1, 14, 9),
(16, 1, 15, 9),
(17, 1, 3, 10),
(18, 1, 14, 10),
(19, 1, 15, 10),
(20, 6, 16, 6),
(21, 6, 18, 6),
(22, 1, 3, 11),
(23, 1, 3, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(225) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `level` varchar(225) NOT NULL,
  `otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `email`, `level`, `otp`) VALUES
(1, 'admin', 'admin', 'Ayam', 'zizicomel02@gmail.com', 'admin', '541173'),
(2, 'user', 'user', 'user', 'user@gmail.com', 'user', NULL),
(4, 'DynoV1', 'coba', '123', 'coba123@gmail.com', 'user', NULL),
(6, 'coba11', 'test1', '123', 'test1@gmail.com', 'user', NULL),
(8, 'test3', 'test31', '123', 'test3@gmail.com', 'user', NULL),
(9, 'dinotama', 'dino123', '123', 'dinotama@gmail.com', 'user', NULL),
(10, 'cahyadi!', 'cahyadi', '123', 'cahyadi@gmail.com', 'user', NULL),
(11, 'DynotamaV1', 'DynotamaP', '12345678', 'dinotama@gmail.com', 'user', NULL),
(12, 'Dyno1tes', 'Dynoo', '123', 'dinotama@gmail.com', 'user', NULL),
(13, 'Dyno1tesaa', 'cahyadi123', '123', 'dinotama121@gmail.com', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_modul` (`id_modul`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indeks untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id_progress`),
  ADD KEY `id_modul` (`id_modul`),
  ADD KEY `id_materi` (`id_materi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `id_progress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id_modul`);

--
-- Ketidakleluasaan untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id_modul`),
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `progress_ibfk_3` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
