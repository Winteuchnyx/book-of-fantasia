-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2017 pada 03.18
-- Versi Server: 5.5.34
-- Versi PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `bookstory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1111, 'winto', 'winto12345'),
(9999, 'winto', 'winto12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fabel`
--

CREATE TABLE IF NOT EXISTS `fabel` (
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `buku` varchar(255) NOT NULL,
  `oleh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fabel`
--

INSERT INTO `fabel` (`tanggal`, `buku`, `oleh`) VALUES
('2017-07-11 20:42:01', 'booklist/Aesops_Fables_NT.pdf', 'winto'),
('2017-07-11 20:42:08', 'booklist/chicken_1.pdf', 'winto'),
('2017-07-11 20:42:15', 'booklist/fairy-tales-and-other-traditional-stories-031-the-ugly-duckling.pdf', 'winto'),
('2017-07-11 20:43:45', 'booklist/HaseHime.pdf', 'winto'),
('2017-07-11 20:43:53', 'booklist/Peter-Rabbit-FKB-Kids-Stories.pdf', 'winto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `folktale`
--

CREATE TABLE IF NOT EXISTS `folktale` (
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `buku` varchar(255) NOT NULL,
  `oleh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `folktale`
--

INSERT INTO `folktale` (`tanggal`, `buku`, `oleh`) VALUES
('2017-07-11 23:13:28', 'booklist/The Cellar of the Old Knights in the Kyffhauser.pdf.pdf', 'winto'),
('2017-07-11 23:14:05', 'booklist/Hearn_Great_Bell.pdf', 'winto'),
('2017-07-12 00:56:51', 'booklist/RUMPELSTILTSKIN.pdf', 'winto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL,
  `buku` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`tanggal`, `username`, `buku`, `jenis`) VALUES
('2017-07-11 20:42:01', 'winto', 'booklist/Aesops_Fables_NT.pdf', 'fabel'),
('2017-07-11 20:42:08', 'winto', 'booklist/chicken_1.pdf', 'fabel'),
('2017-07-11 20:42:15', 'winto', 'booklist/fairy-tales-and-other-traditional-stories-031-the-ugly-duckling.pdf', 'fabel'),
('2017-07-11 20:43:45', 'winto', 'booklist/HaseHime.pdf', 'fabel'),
('2017-07-11 20:43:53', 'winto', 'booklist/Peter-Rabbit-FKB-Kids-Stories.pdf', 'fabel'),
('2017-07-11 23:10:22', 'winto', 'booklist/yamashitasgold.pdf', 'legend'),
('2017-07-11 23:10:35', 'winto', 'booklist/transcript-the-most-evil-women-in-history-bloody-mary.pdf', 'legend'),
('2017-07-11 23:10:47', 'winto', 'booklist/El Dorado and Sir Walter Raleigh.pdf', 'legend'),
('2017-07-11 23:11:09', 'winto', 'booklist/Denton-The-Quest-for-Prester-John.pdf', 'legend'),
('2017-07-11 23:11:21', 'winto', 'booklist/Arthur_Legends_Book.PDF', 'legend'),
('2017-07-11 23:13:28', 'winto', 'booklist/The Cellar of the Old Knights in the Kyffhauser.pdf.pdf', 'folktale'),
('2017-07-11 23:14:05', 'winto', 'booklist/Hearn_Great_Bell.pdf', 'folktale'),
('2017-07-12 00:50:02', 'winto', 'booklist/the_legend_of_the_sea_serpent.pdf', 'myth'),
('2017-07-12 00:50:12', 'winto', 'booklist/Sea-Monsters-of-the-Seven-Seas-Definitions1.pdf', 'myth'),
('2017-07-12 00:51:07', 'winto', 'booklist/constellations.pdf', 'myth'),
('2017-07-12 00:51:30', 'winto', 'booklist/american-short-fiction-001-the-legend-of-sleepy-hollow.pdf', 'myth'),
('2017-07-12 00:56:51', 'winto', 'booklist/RUMPELSTILTSKIN.pdf', 'folktale');

-- --------------------------------------------------------

--
-- Struktur dari tabel `legend`
--

CREATE TABLE IF NOT EXISTS `legend` (
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `buku` varchar(255) NOT NULL,
  `oleh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `legend`
--

INSERT INTO `legend` (`tanggal`, `buku`, `oleh`) VALUES
('2017-07-11 23:10:22', 'booklist/yamashitasgold.pdf', 'winto'),
('2017-07-11 23:10:35', 'booklist/transcript-the-most-evil-women-in-history-bloody-mary.pdf', 'winto'),
('2017-07-11 23:10:47', 'booklist/El Dorado and Sir Walter Raleigh.pdf', 'winto'),
('2017-07-11 23:11:09', 'booklist/Denton-The-Quest-for-Prester-John.pdf', 'winto'),
('2017-07-11 23:11:21', 'booklist/Arthur_Legends_Book.PDF', 'winto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `myth`
--

CREATE TABLE IF NOT EXISTS `myth` (
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `buku` varchar(255) NOT NULL,
  `oleh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `myth`
--

INSERT INTO `myth` (`tanggal`, `buku`, `oleh`) VALUES
('2017-07-12 00:50:02', 'booklist/the_legend_of_the_sea_serpent.pdf', 'winto'),
('2017-07-12 00:50:12', 'booklist/Sea-Monsters-of-the-Seven-Seas-Definitions1.pdf', 'winto'),
('2017-07-12 00:51:07', 'booklist/constellations.pdf', 'winto'),
('2017-07-12 00:51:30', 'booklist/american-short-fiction-001-the-legend-of-sleepy-hollow.pdf', 'winto');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
