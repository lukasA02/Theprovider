-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 19 okt 2021 kl 14:28
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
  `Losen` varchar(32) COLLATE utf8_swedish_ci NOT NULL,
  `Enamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Fnamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Epost` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `Telefon` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `anvandare`
--

INSERT INTO `anvandare` (`AnvandarID`, `Behorighet`, `Anvnamn`, `Losen`, `Enamn`, `Fnamn`, `Epost`, `Telefon`) VALUES
(1, 1, 'TheAdmin', '202cb962ac59075b964b07152d234b70', 'Fentiofyraår', 'Bosse', 'bosse.bosse@bosse.bosse', '050012345'),
(2, 2, 'Kalle', '202cb962ac59075b964b07152d234b70', 'Karl', 'Kalle', 'Kalle.nu', '0000003'),
(4, 3, 'Sven', '7f6ffaa6bb0b408017b62254211691b5', 'Ivan', 'Ult', 'Sven.nu', '69'),
(6, 3, 'Ivar', '202cb962ac59075b964b07152d234b70', 'Svan', '  lukas', 'Ivar.nu', '00123'),
(8, 1, 'Kalle', '202cb962ac59075b964b07152d234b70', 'andren', '  lukas', 'Stefan.karl@live.se', '072674390'),
(14, 1, 'hej', '202cb962ac59075b964b07152d234b70', 'Svan', 'Stefan', 'Sven.nu', '00123');

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
(4, 'Larssons fest 3', 1, '2021-10-07 11:03:48', '2021-10-07 11:59:48'),
(9, 'hej', 4, '2021-10-15 13:43:00', '2021-10-21 13:43:00'),
(10, 'hem', 6, '2021-10-17 14:22:00', '2021-10-18 14:22:00');

-- --------------------------------------------------------

--
-- Tabellstruktur `rattigheter`
--

CREATE TABLE `rattigheter` (
  `rattigheterID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `AnvandarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `rattigheter`
--

INSERT INTO `rattigheter` (`rattigheterID`, `EventID`, `AnvandarID`) VALUES
(25, 10, 1),
(27, 10, 8);

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
-- Index för tabell `rattigheter`
--
ALTER TABLE `rattigheter`
  ADD PRIMARY KEY (`rattigheterID`),
  ADD KEY `AID` (`AnvandarID`),
  ADD KEY `EID` (`EventID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `anvandare`
--
ALTER TABLE `anvandare`
  MODIFY `AnvandarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT för tabell `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `rattigheter`
--
ALTER TABLE `rattigheter`
  MODIFY `rattigheterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `foreign key anvandare` FOREIGN KEY (`Agare`) REFERENCES `anvandare` (`AnvandarID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `rattigheter`
--
ALTER TABLE `rattigheter`
  ADD CONSTRAINT `AID` FOREIGN KEY (`AnvandarID`) REFERENCES `anvandare` (`AnvandarID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EID` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
