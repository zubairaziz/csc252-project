-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2018 at 11:48 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Availability`
--

CREATE TABLE `Availability` (
  `professorID` int(11) NOT NULL,
  `day` int(1) NOT NULL,
  `starts` time DEFAULT NULL,
  `ends` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Availability`
--

INSERT INTO `Availability` (`professorID`, `day`, `starts`, `ends`) VALUES
(5681, 4, '10:00:00', '11:00:00'),
(5681, 5, '13:00:00', '14:00:00'),
(5682, 1, '12:30:00', '14:00:00'),
(5682, 5, '15:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `courseID` varchar(10) NOT NULL,
  `courseName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`courseID`, `courseName`) VALUES
('CSC161', 'Intro to Python'),
('CSC171', 'Intro to Java'),
('MTH161', 'CalcI'),
('MTH171', 'CalcII');

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
(5681, 'CSC712'),
(5682, 'Mel312');

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
(5682, 'CSC161'),
(5681, 'CSC171');

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
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `email`, `password`, `firstName`, `lastName`, `status`) VALUES
(5679, 'zliang11@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Zi', 'L', 0),
(5680, 'za123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Zubair', 'A', 0),
(5681, 'nag98@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Naven', 'G', 1),
(5682, 'mpage2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Mike', 'Page', 1);

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5683;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `Availability`
--
ALTER TABLE `Availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `ProfRoom`
--
ALTER TABLE `ProfRoom`
  ADD CONSTRAINT `profroom_ibfk_1` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `Teach`
--
ALTER TABLE `Teach`
  ADD CONSTRAINT `teach_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `Courses` (`courseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `teach_ibfk_2` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;
