-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2017 pada 02.02
-- Versi Server: 5.5.34
-- Versi PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `community`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `general`
--

CREATE TABLE IF NOT EXISTS `general` (
  `foto` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pesan` longtext NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `general`
--

INSERT INTO `general` (`foto`, `username`, `pesan`, `tanggal`) VALUES
('ikon/user.jpg', 'Winto junior Khosasih', 'hai', '2017-07-11 10:52:37'),
('ikon/user.jpg', 'Winto junior Khosasih', 'selamat datang', '2017-07-11 17:30:22'),
('ikon/user.jpg	', 'damar', 'ya, terima kasih', '2017-07-11 17:31:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE IF NOT EXISTS `grup` (
  `grup` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `sesi` varchar(255) NOT NULL,
  PRIMARY KEY (`grup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `username` varchar(255) NOT NULL,
  `pesan` longtext NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notes`
--

INSERT INTO `notes` (`username`, `pesan`, `tanggal`) VALUES
('Winto junior Khosasih', 'firs launching', '2017-07-11 10:59:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL DEFAULT 'ikon/user.jpg	',
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`,`email`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `signup`
--

INSERT INTO `signup` (`id`, `foto`, `nama`, `email`, `jeniskelamin`, `username`, `password`) VALUES
(1, 'ikon/user.jpg', 'winto', 'piao.wjk@gmail.com', 'laki-laki', 'Winto junior Khosasih', 'winto12345'),
(2, 'ikon/user.jpg	', 'damar', 'damar@gmail.com', 'laki-laki', 'damar', 'damar123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
