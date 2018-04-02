-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2018 at 05:16 PM
-- Server version: 5.7.21-1ubuntu1
-- PHP Version: 7.2.3-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `professorID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `starts` time NOT NULL,
  `ends` time NOT NULL,
  `apptID` int(11) NOT NULL,
  `purpose` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Availability`
--

CREATE TABLE `Availability` (
  `professorID` int(11) NOT NULL,
  `day` int(1) NOT NULL,
  `starts` time DEFAULT NULL,
  `ends` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `courseID` varchar(10) NOT NULL,
  `courseName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProfRoom`
--

CREATE TABLE `ProfRoom` (
  `professorID` int(11) NOT NULL,
  `roomNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Teach`
--

CREATE TABLE `Teach` (
  `professorID` int(11) NOT NULL,
  `courseID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `email`, `password`, `firstName`, `lastName`, `status`) VALUES
(1, 'zabaziz@u.rochester.edu', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'Zubair', 'Aziz', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`apptID`),
  ADD UNIQUE KEY `professorID` (`professorID`,`studentID`,`date`,`starts`,`ends`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `Availability`
--
ALTER TABLE `Availability`
  ADD PRIMARY KEY (`professorID`,`day`);

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `ProfRoom`
--
ALTER TABLE `ProfRoom`
  ADD PRIMARY KEY (`professorID`);

--
-- Indexes for table `Teach`
--
ALTER TABLE `Teach`
  ADD PRIMARY KEY (`professorID`,`courseID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `apptID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `Appointment_ibfk_1` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Appointment_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `Availability`
--
ALTER TABLE `Availability`
  ADD CONSTRAINT `Availability_ibfk_1` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `ProfRoom`
--
ALTER TABLE `ProfRoom`
  ADD CONSTRAINT `ProfRoom_ibfk_1` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `Teach`
--
ALTER TABLE `Teach`
  ADD CONSTRAINT `Teach_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `Courses` (`courseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Teach_ibfk_2` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
