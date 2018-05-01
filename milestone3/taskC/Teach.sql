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
-- Table structure for table `Teach`
--

CREATE TABLE `Teach` (
  `professorID` int(11) NOT NULL,
  `courseID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Teach`
--

INSERT INTO `Teach` (`professorID`, `courseID`) VALUES
(5705, 'ASL101'),
(5706, 'ASL102'),
(5707, 'BIO110'),
(5681, 'CSC161'),
(5687, 'CSC170'),
(5682, 'CSC171'),
(5688, 'CSC172'),
(5689, 'CSC173'),
(5690, 'CSC214'),
(5691, 'CSC240'),
(5692, 'CSC242'),
(5693, 'CSC247'),
(5694, 'CSC261'),
(5708, 'ECO207'),
(5697, 'MTH130'),
(5698, 'MTH140'),
(5699, 'MTH141'),
(5700, 'MTH142'),
(5701, 'MTH143'),
(5702, 'MTH150'),
(5695, 'MTH161'),
(5703, 'MTH164'),
(5704, 'MTH165'),
(5696, 'MTH171'),
(5709, 'MTH190'),
(5710, 'MTH199');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Teach`
--
ALTER TABLE `Teach`
  ADD PRIMARY KEY (`professorID`,`courseID`),
  ADD KEY `courseID` (`courseID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Teach`
--
ALTER TABLE `Teach`
  ADD CONSTRAINT `teach_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `Courses` (`courseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `teach_ibfk_2` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;
