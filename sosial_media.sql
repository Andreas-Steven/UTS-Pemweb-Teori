-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Mar 2020 pada 01.36
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13037894_sosial_media`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(4) NOT NULL,
  `PostID` int(11) NOT NULL,
  `Comment` varchar(8000) DEFAULT NULL,
  `Username` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`CommentID`, `PostID`, `Comment`, `Username`, `Name`) VALUES
(1, 1, 'Coba komen nih', 'admin@gmail.com', 'Admin Admin'),
(2, 1, 'Komen lagi ah', 'admin@gmail.com', 'Admin Admin'),
(3, 2, 'Coba doang wkwkw', 'admin@gmail.com', 'Admin Admin'),
(4, 1, 'Coba kali ini langsung dari website', 'admin@gmail.com', 'Admin Admin'),
(5, 2, 'Coba sekali lagi ah wkwkwk', 'admin@gmail.com', 'Admin Admin'),
(6, 1, 'Yo i bro...', 'bryan.leonardo@gmail.com', 'Bryan Leonardo'),
(7, 2, 'Yoi bro', 'bryan.leonardo@gmail.com', 'Bryan Leonardo'),
(8, 1, 'Test bro', 'bryan.leonardo@gmail.com', 'Bryan Leonardo'),
(9, 1, 'A', 'bryan.leonardo@gmail.com', 'Bryan Leonardo'),
(10, 6, 'Ya udah', 'bryan.leonardo@gmail.com', 'Bryan Leonardo'),
(11, 6, 'Enak ya coba tanpa gw', 'andreas.steven@student.umn.ac.id', 'Andreas Steven');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `PostID` int(5) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Post` varchar(8000) NOT NULL,
  `JudulPost` varchar(8000) NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`PostID`, `Username`, `Post`, `JudulPost`, `Image`) VALUES
(1, 'admin@gmail.com', 'Coba Post Pertama XD', 'Post Pertama', NULL),
(2, 'admin@gmail.com', 'Coba post kedua', 'Post kedua', NULL),
(3, 'admin@gmail.com', 'Website CEH gw nih XD', 'Web CEH', 'Home 2.png'),
(4, 'admin@gmail.com', 'Coba lagi ah XD', 'Post ke-4', NULL),
(5, 'admin@gmail.com', 'SQL Injection nih men wkwkwk', 'SQL Injection', 'SQL Injection 1.3.png'),
(6, 'bryan.leonardo@gmail.com', 'Gw juga mau coba.....', 'Coba', NULL),
(7, 'admin@gmail.com', 'Keren om...', 'Keren', NULL),
(8, 'admin@gmail.com', '', '', NULL),
(9, 'admin@gmail.com', 'awdaw', 'sdfad', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `Username` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Gender` enum('M','F') NOT NULL,
  `Birthday` date NOT NULL,
  `MobilePhone` varchar(20) NOT NULL,
  `Image` varchar(1000) DEFAULT NULL,
  `Address` varchar(500) NOT NULL,
  `AboutMe` varchar(500) NOT NULL,
  `Cover` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`Username`, `FirstName`, `LastName`, `Gender`, `Birthday`, `MobilePhone`, `Image`, `Address`, `AboutMe`, `Cover`) VALUES
('admin@gmail.com', 'Admin', 'Admin', 'M', '2020-03-08', '0811111111', 'Hacker-man.jpg', 'Jl. Neraka no. 13 BLok 6666', 'Saya adalah orang terganteng didunia HAHAHAHAHA', 'Thula-Pic.jpg'),
('andreas.steven@student.umn.ac.id', 'Andreas', 'Steven', 'M', '1999-11-15', '087711103412', 'Default.webp', 'Bumi', 'Yo what\'s up guys....', 'tumblr gold.png'),
('bryan.leonardo@gmail.com', 'Bryan', 'Leonardo', 'M', '1999-03-27', '081111111', '480b6855dc2c01a44023e75e26ad4421.jpg', 'Neverland', 'Cacing Besar Alaska!!!!!!', 'tumblr gold.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Username`, `Password`, `Keterangan`) VALUES
('admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Admin'),
('andreas.steven@student.umn.ac.id', 'fefe156e85772fa3f07e8acb4f326d06e555dbe5f48f1d1cf148e5521427c7eb', NULL),
('bryan.leonardo@gmail.com', '720e25b364d253edc2c9c64727db5ec51e4a176a8864c4eb880cf3f8fbb982c3', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `PostID` (`PostID`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `Username` (`Username`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Username`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`);

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `profile` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
