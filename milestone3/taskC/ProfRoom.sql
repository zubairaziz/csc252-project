-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 01, 2018 at 03:34 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `proj1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ProfRoom`
--

CREATE TABLE `ProfRoom` (
  `professorID` int(11) NOT NULL,
  `roomNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ProfRoom`
--

INSERT INTO `ProfRoom` (`professorID`, `roomNumber`) VALUES
(5681, 'CSC 712'),
(5682, 'MELIORA 31'),
(5687, 'MELIORA 32'),
(5688, 'MELIORA 45'),
(5689, 'WEGMANS 21'),
(5690, 'WEGMANS 25'),
(5691, 'WEGMANS 23'),
(5692, 'DEWEY 211D'),
(5693, 'HOPEMAN 33'),
(5694, 'HOPEMAN 25'),
(5695, 'CSC 725'),
(5696, 'CSC 623'),
(5697, 'LATTIMORE '),
(5698, 'LATTIMORE '),
(5699, 'LATTIMORE '),
(5700, 'LATTIMORE '),
(5701, 'CSC 711'),
(5702, 'CSC 730'),
(5703, 'HYLAN 1101'),
(5704, 'HYLAN 1102'),
(5705, 'HYLAN 102D'),
(5706, 'HYLAN 774'),
(5707, 'HARKNESS 2'),
(5708, 'HARKNESS 4'),
(5709, 'HARKNESS 3'),
(5710, 'HARKNESS 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ProfRoom`
--
ALTER TABLE `ProfRoom`
  ADD PRIMARY KEY (`professorID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ProfRoom`
--
ALTER TABLE `ProfRoom`
  ADD CONSTRAINT `profroom_ibfk_1` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;
