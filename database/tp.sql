-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 22 okt 2021 kl 13:53
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
  `Behorighet` int(11) NOT NULL DEFAULT 3,
  `Anvnamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Losen` varchar(32) COLLATE utf8_swedish_ci NOT NULL,
  `Enamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Fnamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Epost` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `Telefon` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Inloggtid` datetime NOT NULL,
  `Hashkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `anvandare`
--

INSERT INTO `anvandare` (`AnvandarID`, `Behorighet`, `Anvnamn`, `Losen`, `Enamn`, `Fnamn`, `Epost`, `Telefon`, `Inloggtid`, `Hashkey`) VALUES
(1, 1, 'TheAdmin', 'cb92598054cad36681f1b5a59a7ad18f', 'Fentiofyraår', 'Bosse', 'bosse.bosse@bosse.bosse', '050012345', '2021-10-22 13:49:42', 755647369),
(2, 2, 'Kalle', '202cb962ac59075b964b07152d234b70', 'Karl', 'Kalle', 'Kalle.nu', '0000003', '0000-00-00 00:00:00', 0),
(4, 3, 'Sven', '7f6ffaa6bb0b408017b62254211691b5', 'Ivan', 'Ult', 'Sven.nu', '69', '0000-00-00 00:00:00', 0),
(6, 3, 'Ivar', '202cb962ac59075b964b07152d234b70', 'Svan', '  lukas', 'Ivar.nu', '00123', '0000-00-00 00:00:00', 0),
(8, 1, 'Kalle', '202cb962ac59075b964b07152d234b70', 'andren', '  lukas', 'Stefan.karl@live.se', '072674390', '2021-10-20 10:35:13', 485259595),
(14, 1, 'hej', '202cb962ac59075b964b07152d234b70', 'Svan', 'Stefan', 'Sven.nu', '00123', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `blogg`
--

CREATE TABLE `blogg` (
  `BloggID` int(11) NOT NULL,
  `AnvandarID` int(11) NOT NULL,
  `TaggID` int(11) DEFAULT NULL,
  `Last` tinyint(1) NOT NULL,
  `Beskrivning` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Titel` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `blogg`
--

INSERT INTO `blogg` (`BloggID`, `AnvandarID`, `TaggID`, `Last`, `Beskrivning`, `Titel`) VALUES
(1, 1, 1, 1, 'Blogg om twitter :)))', 'Blå fågel'),
(3, 2, NULL, 0, 'Kalles hembakade blogg', 'Anka');

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
-- Tabellstruktur `foretag`
--

CREATE TABLE `foretag` (
  `farg` varchar(7) NOT NULL,
  `fil` varbinary(35) NOT NULL,
  `bak` varbinary(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `foretag`
--

INSERT INTO `foretag` (`farg`, `fil`, `bak`) VALUES
('#ffffff', 0x706c616365686f6c6465722e706e67, 0x706c616365686f6c6465722e706e67),
('#ffffff', 0x706c616365686f6c6465722e706e67, 0x706c616365686f6c6465722e706e67),
('#ffffff', 0x706c616365686f6c6465722e706e67, 0x706c616365686f6c6465722e706e67),
('#ffffff', 0x706c616365686f6c6465722e706e67, 0x706c616365686f6c6465722e706e67),
('#ffffff', 0x706c616365686f6c6465722e706e67, 0x706c616365686f6c6465722e706e67),
('', '', ''),
('#ffffff', '', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `meddelande`
--

CREATE TABLE `meddelande` (
  `MeddelandeID` int(11) NOT NULL,
  `BloggID` int(11) DEFAULT NULL,
  `InlaggID` int(11) DEFAULT NULL,
  `TaggID` int(11) DEFAULT NULL,
  `Tidsstampel` datetime NOT NULL DEFAULT current_timestamp(),
  `Rubrik` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Innehall` varchar(2000) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `meddelande`
--

INSERT INTO `meddelande` (`MeddelandeID`, `BloggID`, `InlaggID`, `TaggID`, `Tidsstampel`, `Rubrik`, `Innehall`) VALUES
(5, 1, NULL, 1, '2021-10-20 14:15:50', 'Jag hatar twitter', 'InnehållInnehållInnehållInnehållInnehåll'),
(6, 3, NULL, NULL, '2021-10-20 14:17:00', 'Kalles inlägg', 'Lägg ägg'),
(7, NULL, 6, NULL, '2021-10-20 14:19:51', 'Nä', 'Du suger kalle');

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

-- --------------------------------------------------------

--
-- Tabellstruktur `tagg`
--

CREATE TABLE `tagg` (
  `TaggID` int(11) NOT NULL,
  `Namn` varchar(30) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `tagg`
--

INSERT INTO `tagg` (`TaggID`, `Namn`) VALUES
(1, 'twitter');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `anvandare`
--
ALTER TABLE `anvandare`
  ADD PRIMARY KEY (`AnvandarID`);

--
-- Index för tabell `blogg`
--
ALTER TABLE `blogg`
  ADD PRIMARY KEY (`BloggID`),
  ADD KEY `banan` (`AnvandarID`),
  ADD KEY `zoo` (`TaggID`);

--
-- Index för tabell `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `foreign key anvandare` (`Agare`);

--
-- Index för tabell `meddelande`
--
ALTER TABLE `meddelande`
  ADD PRIMARY KEY (`MeddelandeID`),
  ADD KEY `de` (`TaggID`),
  ADD KEY `e` (`BloggID`),
  ADD KEY `krt` (`InlaggID`);

--
-- Index för tabell `rattigheter`
--
ALTER TABLE `rattigheter`
  ADD PRIMARY KEY (`rattigheterID`),
  ADD KEY `AID` (`AnvandarID`),
  ADD KEY `EID` (`EventID`);

--
-- Index för tabell `tagg`
--
ALTER TABLE `tagg`
  ADD PRIMARY KEY (`TaggID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `anvandare`
--
ALTER TABLE `anvandare`
  MODIFY `AnvandarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT för tabell `blogg`
--
ALTER TABLE `blogg`
  MODIFY `BloggID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `meddelande`
--
ALTER TABLE `meddelande`
  MODIFY `MeddelandeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `rattigheter`
--
ALTER TABLE `rattigheter`
  MODIFY `rattigheterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT för tabell `tagg`
--
ALTER TABLE `tagg`
  MODIFY `TaggID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `blogg`
--
ALTER TABLE `blogg`
  ADD CONSTRAINT `banan` FOREIGN KEY (`AnvandarID`) REFERENCES `anvandare` (`AnvandarID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zoo` FOREIGN KEY (`TaggID`) REFERENCES `tagg` (`TaggID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `foreign key anvandare` FOREIGN KEY (`Agare`) REFERENCES `anvandare` (`AnvandarID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `meddelande`
--
ALTER TABLE `meddelande`
  ADD CONSTRAINT `de` FOREIGN KEY (`TaggID`) REFERENCES `tagg` (`TaggID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `e` FOREIGN KEY (`BloggID`) REFERENCES `blogg` (`BloggID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krt` FOREIGN KEY (`InlaggID`) REFERENCES `meddelande` (`MeddelandeID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
