-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2021 at 02:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp`
--

-- --------------------------------------------------------

--
-- Table structure for table `anvandare`
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
  `Inloggtid` datetime NOT NULL DEFAULT current_timestamp(),
  `Hashkey` int(11) DEFAULT NULL,
  `locked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `anvandare`
--

INSERT INTO `anvandare` (`AnvandarID`, `Behorighet`, `Anvnamn`, `Losen`, `Enamn`, `Fnamn`, `Epost`, `Telefon`, `Inloggtid`, `Hashkey`, `locked`) VALUES
(1, 1, 'TheAdmin', 'c88cc5c4a7095c6b0478f88fc7d3ce41', 'Fentiofyraår', 'Bosse', 'bosse.bosse@bosse.bosse', '050012345', '2021-11-19 09:20:03', 123456789, NULL),
(2, 1, 'Kalle', '202cb962ac59075b964b07152d234b70', 'Karl', 'Kalle', 'Kalle.nu', '0000003', '2021-11-15 09:59:27', 123456789, NULL),
(6, 3, 'kalle', '202cb962ac59075b964b07152d234b70', 'Svan', '  lukas', 'Ivar.nu', '00123', '2021-11-16 11:55:29', 123456789, NULL),
(15, 1, 'Mogge', 'bb3d3b3092d8e42c1dbe7d6ad633d64b', 'Wiberg', 'Morgan', 'morgan@.nu', '050410124', '2021-11-17 11:41:27', 123456789, NULL),
(16, 3, 'SlimShady', 'b9452908351177bb6a2fbf61192f94d1', 'Shady', 'Slim', 'f.ac.punkt@youpunkt.se', '666-no-of-the-beast', '2021-11-17 11:54:28', 123456789, NULL),
(17, 3, 'Themasazousse', '43c592501e0d37c63bc038fa182b2ddf', 'Wiberg', 'Mass', 'rubme@rubit.se', '112', '2021-11-17 11:43:42', 123456789, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogg`
--

CREATE TABLE `blogg` (
  `BloggID` int(11) NOT NULL,
  `AnvandarID` int(11) NOT NULL,
  `TaggID` int(11) DEFAULT NULL,
  `Last` tinyint(1) NOT NULL,
  `Beskrivning` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Titel` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Rattigheter` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `blogg`
--

INSERT INTO `blogg` (`BloggID`, `AnvandarID`, `TaggID`, `Last`, `Beskrivning`, `Titel`, `Rattigheter`) VALUES
(1, 1, 1, 1, 'Blogg om twitter :)))', 'Blå fågel', 1),
(3, 2, NULL, 0, 'Kalles hembakade blogg', 'Anka', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` int(11) NOT NULL,
  `Namn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `beskrivning` text COLLATE utf8_swedish_ci NOT NULL,
  `Agare` int(20) NOT NULL,
  `Starttid` datetime NOT NULL,
  `Sluttid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `Namn`, `beskrivning`, `Agare`, `Starttid`, `Sluttid`) VALUES
(1, 'Larssons fest 2', 'Larsson bjuder på tårta ', 1, '2021-10-21 12:00:00', '2021-10-21 12:30:00'),
(4, 'Larssons fest 3', 'Larsson bjuder på grillkorv ', 1, '2021-10-07 11:03:48', '2021-10-07 11:59:48'),
(14, 'party', 'Alla kommer med sin egen dricka ', 16, '2021-11-15 11:51:00', '2021-11-15 11:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `foretag`
--

CREATE TABLE `foretag` (
  `id` int(11) NOT NULL,
  `fil` varbinary(35) NOT NULL,
  `bak` varbinary(35) NOT NULL,
  `css` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foretag`
--

INSERT INTO `foretag` (`id`, `fil`, `bak`, `css`) VALUES
(9, '', '', ''),
(10, '', '', 'echo \'<style> \r\n    body {background-color: #ff69B4; font-family:Comic Sans MS;font-size:26px;}\r\n    </style>\''),
(12, '', '', 'echo \'<style> \r\n    body {background-color: #ffffff; font-family:Arial;font-size:14px;}\r\n    </style>\'');

-- --------------------------------------------------------

--
-- Table structure for table `meddelande`
--

CREATE TABLE `meddelande` (
  `MeddelandeID` int(11) NOT NULL,
  `BloggID` int(11) DEFAULT NULL,
  `InlaggID` int(11) DEFAULT NULL,
  `TaggID` int(11) DEFAULT NULL,
  `Anvandare` int(11) NOT NULL,
  `Tidsstampel` datetime NOT NULL DEFAULT current_timestamp(),
  `Rubrik` text COLLATE utf8_swedish_ci NOT NULL,
  `Innehall` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `meddelande`
--

INSERT INTO `meddelande` (`MeddelandeID`, `BloggID`, `InlaggID`, `TaggID`, `Anvandare`, `Tidsstampel`, `Rubrik`, `Innehall`) VALUES
(9, 1, NULL, 1, 1, '2021-11-17 11:32:47', 'WWWWWWWWWWW', 'They say Flat  Earth  is dumb ....ok. But let\'s actually take a look  at what you call smart ok? '),
(10, NULL, 9, NULL, 17, '2021-11-17 11:34:07', 'efadfa', 'bruh.'),
(11, 1, NULL, NULL, 16, '2021-11-17 11:43:58', 'cog', 'AAAAAAAAAAAAAAAAA');

-- --------------------------------------------------------

--
-- Table structure for table `rattigheter`
--

CREATE TABLE `rattigheter` (
  `rattigheterID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `AnvandarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rattigheter`
--

INSERT INTO `rattigheter` (`rattigheterID`, `EventID`, `AnvandarID`) VALUES
(29, 14, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tagg`
--

CREATE TABLE `tagg` (
  `TaggID` int(11) NOT NULL,
  `Namn` varchar(30) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `tagg`
--

INSERT INTO `tagg` (`TaggID`, `Namn`) VALUES
(1, 'twitter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anvandare`
--
ALTER TABLE `anvandare`
  ADD PRIMARY KEY (`AnvandarID`);

--
-- Indexes for table `blogg`
--
ALTER TABLE `blogg`
  ADD PRIMARY KEY (`BloggID`),
  ADD KEY `banan` (`AnvandarID`),
  ADD KEY `zoo` (`TaggID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `foreign key anvandare` (`Agare`);

--
-- Indexes for table `foretag`
--
ALTER TABLE `foretag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meddelande`
--
ALTER TABLE `meddelande`
  ADD PRIMARY KEY (`MeddelandeID`),
  ADD KEY `de` (`TaggID`),
  ADD KEY `e` (`BloggID`),
  ADD KEY `krt` (`InlaggID`),
  ADD KEY `anvandare` (`Anvandare`);

--
-- Indexes for table `rattigheter`
--
ALTER TABLE `rattigheter`
  ADD PRIMARY KEY (`rattigheterID`),
  ADD KEY `AID` (`AnvandarID`),
  ADD KEY `EID` (`EventID`);

--
-- Indexes for table `tagg`
--
ALTER TABLE `tagg`
  ADD PRIMARY KEY (`TaggID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anvandare`
--
ALTER TABLE `anvandare`
  MODIFY `AnvandarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blogg`
--
ALTER TABLE `blogg`
  MODIFY `BloggID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `foretag`
--
ALTER TABLE `foretag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `meddelande`
--
ALTER TABLE `meddelande`
  MODIFY `MeddelandeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rattigheter`
--
ALTER TABLE `rattigheter`
  MODIFY `rattigheterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tagg`
--
ALTER TABLE `tagg`
  MODIFY `TaggID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogg`
--
ALTER TABLE `blogg`
  ADD CONSTRAINT `banan` FOREIGN KEY (`AnvandarID`) REFERENCES `anvandare` (`AnvandarID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zoo` FOREIGN KEY (`TaggID`) REFERENCES `tagg` (`TaggID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `foreign key anvandare` FOREIGN KEY (`Agare`) REFERENCES `anvandare` (`AnvandarID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meddelande`
--
ALTER TABLE `meddelande`
  ADD CONSTRAINT `anvandare` FOREIGN KEY (`Anvandare`) REFERENCES `anvandare` (`AnvandarID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `de` FOREIGN KEY (`TaggID`) REFERENCES `tagg` (`TaggID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `e` FOREIGN KEY (`BloggID`) REFERENCES `blogg` (`BloggID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krt` FOREIGN KEY (`InlaggID`) REFERENCES `meddelande` (`MeddelandeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rattigheter`
--
ALTER TABLE `rattigheter`
  ADD CONSTRAINT `AID` FOREIGN KEY (`AnvandarID`) REFERENCES `anvandare` (`AnvandarID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EID` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
