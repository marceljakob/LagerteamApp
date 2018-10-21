-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Okt 2018 um 16:12
-- Server-Version: 10.1.36-MariaDB
-- PHP-Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `zeltlager`
--
CREATE DATABASE IF NOT EXISTS `zeltlager` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zeltlager`;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fehlanmeldungen` int(1) NOT NULL,
  `gesperrt` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `fehlanmeldungen`, `gesperrt`) VALUES
(1, 'Tim', '$2y$10$fXZo3saweCMDys.76uFHze/1.vStMbGCex8tyDrvsELTxNRZ9gNVS', 0, b'0'),
(2, 'Marcel', '$2y$10$R.l7B52Xq.R0TAm.TSFa9ef93zKYu0sqaTl1AXK293y.Iy5N/74nC', 0, b'0'),
(3, 'Nicoals', '$2y$10$J0C0sv0A/WsP1bNvcyR1R./NohZuNORMEclyPaBbeDI5Dr4AIFjEu', 0, b'0'),
(4, 'Raphael', '$2y$10$MPaaN8/KDRl6k2zTs3q2Fe.iqUNiEue0Vu7WmPUXEcncAM62LEb3u', 0, b'0');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anmeldungen`
--

CREATE TABLE `anmeldungen` (
  `anmeldung_id` int(11) NOT NULL,
  `anmelde_dat` datetime NOT NULL,
  `n_name` varchar(30) NOT NULL,
  `v_name` varchar(30) NOT NULL,
  `strasse_nr` varchar(40) NOT NULL,
  `plz` int(5) NOT NULL,
  `ort` varchar(30) NOT NULL,
  `geb_dat` date NOT NULL,
  `telefon` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `zuschuss` bit(1) NOT NULL,
  `mitglied` bit(1) NOT NULL,
  `freitext` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `anmeldungen`
--

INSERT INTO `anmeldungen` (`anmeldung_id`, `anmelde_dat`, `n_name`, `v_name`, `strasse_nr`, `plz`, `ort`, `geb_dat`, `telefon`, `email`, `zuschuss`, `mitglied`, `freitext`) VALUES
(5, '2018-09-09 00:00:00', 'Muster', 'Max', 'Musterstr. 1', 12345, 'Musterort', '2005-09-07', '0157 27916784', 'max@muster.de', b'0', b'0', ''),
(6, '2018-10-15 00:00:00', 'Menken', 'Raphael', 'Menkenstr. 5', 10481, 'Karlsruhe Durlach', '1996-10-14', '0157 27916784', 'raph@menken.de', b'1', b'0', ''),
(7, '2018-10-10 00:00:00', 'Neuhof', 'Nicolas', 'Neuhofstr. 2', 12133, 'Nahe Karlsruhe', '1999-10-01', '0157 27916784', 'nicolas.neuhof@web.de', b'1', b'1', ''),
(8, '2018-10-16 00:00:00', 'Jacob', 'Marcel', 'Bei Jacobs 2', 1235, 'Karlsruhe', '1990-10-09', '0157 27916784', 'marcel@jacob.de', b'0', b'1', ''),
(9, '2018-10-15 00:00:00', 'Riebesam', 'Tim', 'Eichenweg 19', 73614, 'Schorndorf', '1996-04-23', '0157 38167526', 'tim.riebesam@aol.de', b'0', b'0', 'Hier steht Freitext den die Eltern des Kindes den Betreuern der Freizeit mitteilen können. Beispiele hierfür wären z.B. Allergien.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontaktformular`
--

CREATE TABLE `kontaktformular` (
  `kontakt_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nachricht` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newsticker`
--

CREATE TABLE `newsticker` (
  `newsticker_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `datum` datetime NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `newsticker`
--

INSERT INTO `newsticker` (`newsticker_id`, `text`, `datum`, `user`) VALUES
(117, '+++ Test News fÃ¼r Lagerteam-App +++ Weitere News werden folgen +++', '2018-10-19 23:45:58', 'tim');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indizes für die Tabelle `anmeldungen`
--
ALTER TABLE `anmeldungen`
  ADD PRIMARY KEY (`anmeldung_id`);

--
-- Indizes für die Tabelle `kontaktformular`
--
ALTER TABLE `kontaktformular`
  ADD PRIMARY KEY (`kontakt_id`);

--
-- Indizes für die Tabelle `newsticker`
--
ALTER TABLE `newsticker`
  ADD PRIMARY KEY (`newsticker_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `anmeldungen`
--
ALTER TABLE `anmeldungen`
  MODIFY `anmeldung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `kontaktformular`
--
ALTER TABLE `kontaktformular`
  MODIFY `kontakt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `newsticker`
--
ALTER TABLE `newsticker`
  MODIFY `newsticker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
