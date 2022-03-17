-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2022 pada 13.49
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(10) NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admininistrator'),
(2, 'owner'),
(3, 'kasir'),
(8, 'xd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(10) NOT NULL,
  `nama_masakan` varchar(25) NOT NULL,
  `harga` decimal(19,3) NOT NULL,
  `status_masakan` enum('Tersedia','Tidak Tersedia','','') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `harga`, `status_masakan`, `foto`) VALUES
(1, 'test', '100.000', 'Tidak Tersedia', '1646304397_87629778037be1db0e3d.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` int(10) NOT NULL,
  `nama_minuman` varchar(25) NOT NULL,
  `harga` decimal(19,3) NOT NULL,
  `status_minuman` enum('Tersedia','Tidak Tersedia','','') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `nama_minuman`, `harga`, `status_minuman`, `foto`) VALUES
(3, 'test', '10.000', 'Tidak Tersedia', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` decimal(19,3) NOT NULL,
  `no_meja` int(10) NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  `status_order` enum('proses','selesai','','') NOT NULL,
  `id_masakan` int(10) NOT NULL,
  `id_minuman` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tanggal`, `total_bayar`, `no_meja`, `keterangan`, `status_order`, `id_masakan`, `id_minuman`) VALUES
(2, 4, '2022-03-15', '10.000', 1, 'test', 'proses', 1, 3),
(5, 4, '2022-03-15', '10.000', 1, 'test', 'selesai', 1, 3),
(6, 2, '2022-03-17', '10.000', 1, 'test', 'proses', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `id_level` int(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `id_level`, `foto`) VALUES
(1, 'Kazuma', 'admin', '$2y$10$foqtOAc9Ww8RpSWzXR00kOFHty2MIc3RhYDErKu2BhrVrniwWm1MS', 1, '1642559933_e96fe7f1b6c4f3a28cbd.png'),
(2, 'shinra', 'kasir', '$2y$10$.evhoRh7kvzVfWLdBW1fNuWQdrdR2T0LhElhoYcM17bu94tt2v41G', 3, '1645170848_ab8632c6b9a5fd579c2d.png'),
(3, 'Keyaru', 'owner', '$2y$10$50KsFiXx6s8d65fPjho5mu.METNKLR9YZJtVY7GjL3KzbKR7c/yN.', 2, '1647519594_20aacaab071b3fd5cd0c.jpg'),
(4, 'Asta', 'asta', '$2y$10$YhU1z6zEiETfQQnaOiMctu9tnLuu02.UP5FYD4UcWZoTRES5C6Z36', 3, '1645259213_3f2a94c5cf788179df25.png'),
(22, 'test', 'test', '$2y$10$FNcyONbFIAA8xWWjlGStyOhyRlXYM4OdJknIqtTo5gC6jK52biyVu', 3, '1645254101_660aa73fc65ec50d6468.png'),
(23, 'test', 'test', '$2y$10$gooxceCbZj8CCIH2vpMah.295xOEi8i1Mfs.qQUvIz3I8JJTnOb6C', 3, 'default.png'),
(25, 'test', 'test', '$2y$10$50KsFiXx6s8d65fPjho5mu.METNKLR9YZJtVY7GjL3KzbKR7c/yN.', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indeks untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_masakan` (`id_masakan`),
  ADD KEY `id_minuman` (`id_minuman`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_minuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_minuman`) REFERENCES `minuman` (`id_minuman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id_masakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
