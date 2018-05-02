-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jun 2016 pada 20.18
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerjapraktek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `kode_buku` varchar(10) NOT NULL,
  `nama_buku` varchar(30) NOT NULL,
  `category_buku` varchar(20) NOT NULL,
  `pencipta_buku` varchar(30) NOT NULL,
  `penerbit_buku` varchar(30) NOT NULL,
  `tahun_buku` int(11) NOT NULL,
  `stock_buku` int(11) NOT NULL,
  `popularitas_buku` int(11) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `nama_buku`, `category_buku`, `pencipta_buku`, `penerbit_buku`, `tahun_buku`, `stock_buku`, `popularitas_buku`, `harga`) VALUES
('CMD-01', 'Awas ada sule', '', 'sule', 'sulE', 2010, 9, 0, 100000),
('CMD-02', 'OVJ', '', 'PartO', 'Parto', 2009, 10, 0, 20000),
('KTR-01', 'Naruto shipuden', '', 'Aiko', 'Rozi', 2003, 10, 0, 300000),
('SPT-01', 'Glory-Glory Manchester United', '', 'Sir Alex ferguson', 'Sir Alex ferguson', 1994, 20, 0, 400000),
('SPT-02', 'MotoGP', '', 'Rossi', 'Rossi', 2005, 10, 0, 1500),
('SPT-03', 'Boxing', '', 'Tyson', 'Tyson', 1889, 8, 0, 700000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
--

CREATE TABLE IF NOT EXISTS `denda` (
  `username` varchar(20) NOT NULL,
  `kode_buku` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(40) NOT NULL,
  `tanggal_denda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `denda`
--

INSERT INTO `denda` (`username`, `kode_buku`, `harga`, `status`, `tanggal_denda`) VALUES
('boy1', 'CMD-02', 500000, 'Rusak', '2016-06-24'),
('didat', 'CMD-03', 12000, 'Hilang', '2016-06-24'),
('ilham', 'CMD-01', 100000, 'Rusak', '2016-06-26'),
('pepep', 'CMD-01', 100000, 'Dibuang', '2016-06-26'),
('ilham', 'CMD-01', 100000, 'Rusak', '2016-06-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inforequest`
--

CREATE TABLE IF NOT EXISTS `inforequest` (
  `kode_request` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inforequest`
--

INSERT INTO `inforequest` (`kode_request`, `username`, `pesan`) VALUES
(1, 'ilham', 'Buku yang ada request sudah ada, silahkan cek di daftar buku'),
(2, 'aji', 'Buku yang ada request sudah ada, silahkan cek di daftar buku'),
(3, 'ilham', 'Buku yang ada request sudah ada, silahkan cek di daftar buku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `kodepinjam` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `kode_buku` varchar(30) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`kodepinjam`, `username`, `kode_buku`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(1, 'ilham', 'CMD-01', '1995-03-13', '2016-04-08'),
(2, 'eko', 'CMD-02', '1995-03-13', '2016-04-06'),
(3, 'eko', 'CMD-01', '1995-03-13', '2016-04-06'),
(4, 'aji', 'KRT-02', '1995-03-13', '2016-04-06'),
(5, 'eko', 'CMD-02', '1995-03-13', '2016-04-06'),
(6, 'eko', 'CMD-02', '1995-03-13', '2016-04-06'),
(7, 'aji', 'CMD-02', '1995-03-13', '2016-04-06'),
(8, 'eko', 'CMD-02', '1995-03-13', '2016-04-06'),
(9, 'aji', 'CMD-02', '1995-03-13', '2016-04-06'),
(10, 'farhan', 'CMD-02', '1995-03-13', '2016-04-06'),
(11, 'eko', 'CMD-02', '1995-03-13', '2016-04-06'),
(12, 'aji', 'CMD-02', '1995-03-13', '2016-04-06'),
(13, 'eko', 'CMD-02', '1995-03-13', '2016-04-06'),
(14, 'farhan', 'CMD-01', '2016-04-06', '2016-04-06'),
(15, 'aji', 'CMD-01', '2016-06-08', '2016-04-06'),
(16, 'mahmud22', 'CMD-02', '2016-06-08', '2016-06-08'),
(17, 'eko', 'CMD-01', '2016-06-08', '2016-06-08'),
(18, 'eko', 'CMD-02', '2016-06-08', '2016-06-08'),
(19, 'fiqar99', 'CMD-02', '2016-06-09', '2016-06-09'),
(20, 'didat', 'CMD-02', '2016-06-12', '2016-06-12'),
(21, 'aji', 'KTR-01', '2016-06-16', '2016-06-17'),
(22, 'farhan', 'CMD-02', '2016-06-17', '2016-06-17'),
(23, 'boy1', 'CMD-02', '2016-06-20', '0000-00-00'),
(24, 'aji', 'CMD-02', '2016-06-20', '2016-06-20'),
(25, 'didat', 'CMD-02', '2016-06-20', '0000-00-00'),
(26, 'loli', 'CMD-02', '2016-06-20', '0000-00-00'),
(27, 'didat', 'CMD-02', '2016-06-23', '0000-00-00'),
(28, 'ilham', 'CMD-01', '2016-06-26', '0000-00-00'),
(29, 'didat', 'CMD-01', '2016-06-26', '0000-00-00'),
(30, 'pepep', 'CMD-01', '2016-06-26', '2016-06-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `kode_request` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_buku` varchar(30) NOT NULL,
  `pencipta_buku` varchar(30) NOT NULL,
  `tahun_terbit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_handphone` bigint(12) NOT NULL,
  `jenis_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `no_handphone`, `jenis_akses`) VALUES
('admin', '122', 'Dimas', 8927391212, 'admin'),
('caklontong', '12345', 'Lontong', 87277171, 'Admin'),
('didat', '123', 'didat', 839182712, 'user'),
('dimas123', 'pp123', 'Dimas P', 8293819491, 'Petugas'),
('eko', 'eko222', 'eko', 29388172312, 'user'),
('farhan', '92221', 'farhan', 28371645231, 'user'),
('fiqar99', '88', 'Fiqar', 888882888, 'user'),
('ilham', '888', 'Ilham F', 888229919, 'user'),
('kakak', 'kakak', 'kakak', 89898989898, 'Anggota'),
('loli', '0201', 'loli', 98828391212, 'user'),
('mahmud22', 'mah22', 'mahmud', 83984938212, 'user'),
('pepep', 'pepep123', 'pep', 82916782913, 'user'),
('putra', '90', 'Putrasss', 827171727, 'user'),
('rhesa', '000', 'Rhesa', 891121999, 'user'),
('rosis', '121', 'Ar-Rosis', 89898213121, 'petugas'),
('suckma', '100', 'Suckma A', 829992221, 'petugas'),
('suckza', '1234', 'Suczka', 98729381213, 'Anggota'),
('sucza', 'o2999', 'oapa', 89767493891, 'Anggota'),
('Terserah', 'serah', 'serah', 82913125151, 'Anggota'),
('wkwkwk', 'wkwkwkw', 'wkwkw', 89867834212, 'Anggota'),
('zz', 'zzzz', 'zzzzz', 222, 'Anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `inforequest`
--
ALTER TABLE `inforequest`
  ADD PRIMARY KEY (`kode_request`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kodepinjam`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
