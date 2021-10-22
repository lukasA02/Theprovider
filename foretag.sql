-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 22 okt 2021 kl 13:12
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
('#ffffff', 0x706c616365686f6c6465722e706e67, 0x706c616365686f6c6465722e706e67);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
