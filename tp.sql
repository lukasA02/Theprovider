-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 okt 2021 kl 11:08
-- Serverversion: 10.4.20-MariaDB
-- PHP-version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `tp`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `anvandare`
--

CREATE TABLE `anvandare` (
  `AnvandarID` int(11) NOT NULL,
  `Behorighet` int(11) NOT NULL,
  `Anvnamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Losen` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Enamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Fnamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Epost` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `Telefon` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `anvandare`
--

INSERT INTO `anvandare` (`AnvandarID`, `Behorighet`, `Anvnamn`, `Losen`, `Enamn`, `Fnamn`, `Epost`, `Telefon`) VALUES
(1, 3, 'VadSomHelst', '123vetefan', 'Larssonsson', 'Lars', 'LarsLarssonsssonsson@Lars.se', '0500474747');

-- --------------------------------------------------------

--
-- Tabellstruktur `event`
--

CREATE TABLE `event` (
  `EventID` int(11) NOT NULL,
  `Namn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Agare` int(20) NOT NULL,
  `Starttid` datetime NOT NULL,
  `Sluttid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `event`
--

INSERT INTO `event` (`EventID`, `Namn`, `Agare`, `Starttid`, `Sluttid`) VALUES
(1, 'Larssons fest 2', 1, '2021-10-21 12:00:00', '2021-10-21 12:30:00'),
(2, 'AAAAAAAAAAAAAAAAAAAA', 1, '2021-10-07 10:25:48', '2021-10-07 10:45:48'),
(4, 'Larssons fest 3', 1, '2021-10-07 11:03:48', '2021-10-07 11:59:48'),
(7, 'idot', 1, '2021-10-21 12:24:00', '2021-10-21 13:41:00');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `anvandare`
--
ALTER TABLE `anvandare`
  ADD PRIMARY KEY (`AnvandarID`);

--
-- Index för tabell `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `foreign key anvandare` (`Agare`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `anvandare`
--
ALTER TABLE `anvandare`
  MODIFY `AnvandarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `foreign key anvandare` FOREIGN KEY (`Agare`) REFERENCES `anvandare` (`AnvandarID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;