-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 15. 12 2015 kl. 22:12:51
-- Serverversion: 10.1.9-MariaDB
-- PHP-version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `passwordmanager`
--

CREATE TABLE `passwordmanager` (
  `userid` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `secret` text NOT NULL,
  `cookie_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `passwordmanager`
--

INSERT INTO `passwordmanager` (`userid`, `email`, `password`, `secret`, `cookie_value`) VALUES
(1, 'test@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'facebook.com=1234', 'd34cdd347fbbd7b30553645cf9147bb5e5e82d15');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `passwordmanager`
--
ALTER TABLE `passwordmanager`
  ADD PRIMARY KEY (`userid`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `passwordmanager`
--
ALTER TABLE `passwordmanager`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
