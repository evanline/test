-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 21 feb 2016 om 19:23
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cijfer`
--

CREATE TABLE IF NOT EXISTS `cijfer` (
  `vakcode` varchar(45) NOT NULL,
  `leerlingnummer` varchar(45) NOT NULL,
  `cijfer` int(11) DEFAULT NULL,
  `gehaaldeEC` int(11) DEFAULT NULL,
  PRIMARY KEY (`vakcode`,`leerlingnummer`),
  KEY `fk_cijfer_student1_idx` (`leerlingnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `leerlingnummer` varchar(45) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `startjaar` varchar(45) NOT NULL,
  PRIMARY KEY (`leerlingnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vakken`
--

CREATE TABLE IF NOT EXISTS `vakken` (
  `vakcode` varchar(45) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `ec` varchar(45) NOT NULL,
  `periode` varchar(45) NOT NULL,
  PRIMARY KEY (`vakcode`),
  UNIQUE KEY `vakcode` (`vakcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden uitgevoerd voor tabel `vakken`
--

INSERT INTO `vakken` (`vakcode`, `naam`, `ec`, `periode`) VALUES
('regenboog', 'konijn', '11', 'ten'),
('WErtae', 'esryth', '3', 'w3erdtf');

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `cijfer`
--
ALTER TABLE `cijfer`
  ADD CONSTRAINT `fk_cijfer_student1` FOREIGN KEY (`leerlingnummer`) REFERENCES `student` (`leerlingnummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cijfer_vakken1` FOREIGN KEY (`vakcode`) REFERENCES `vakken` (`vakcode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
