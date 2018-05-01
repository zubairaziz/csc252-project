-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 01, 2018 at 03:29 AM
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

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`professorID`, `studentID`, `date`, `starts`, `ends`, `apptID`, `purpose`, `status`) VALUES
(5681, 5800, '2018-04-05 00:00:00', '10:30:00', '11:00:00', 1, 'Question on HW1', 0),
(5681, 5801, '2018-04-06 00:00:00', '13:00:00', '13:30:00', 2, 'Question on HW2', 0),
(5682, 5802, '2018-04-09 00:00:00', '12:30:00', '13:00:00', 3, 'Question on HW3', 0),
(5682, 5803, '2018-04-13 00:00:00', '15:30:00', '16:00:00', 4, 'Question on Project 1', 0),
(5687, 5804, '2018-04-10 00:00:00', '13:00:00', '13:30:00', 5, 'Question on Project 2', 0),
(5688, 5805, '2018-04-11 00:00:00', '14:00:00', '14:30:00', 6, 'Question on Project 3', 0),
(5689, 5806, '2018-04-12 00:00:00', '15:00:00', '15:30:00', 7, 'Question on Project 4', 0),
(5690, 5807, '2018-04-16 00:00:00', '12:30:00', '13:00:00', 8, 'Question on Midterm1', 0),
(5691, 5808, '2018-04-17 00:00:00', '11:00:00', '11:30:00', 9, 'Question on Midterm2', 0),
(5692, 5809, '2018-04-18 00:00:00', '11:30:00', '12:00:00', 10, 'Question on Midterm3', 0),
(5693, 5810, '2018-04-19 00:00:00', '12:30:00', '13:00:00', 11, 'Question on Final', 0),
(5694, 5811, '2018-04-20 00:00:00', '12:30:00', '13:00:00', 12, 'Concern about Grades', 0),
(5695, 5812, '2018-04-23 00:00:00', '13:30:00', '14:00:00', 13, 'Help on Assignment', 0),
(5696, 5813, '2018-04-24 00:00:00', '14:00:00', '14:30:00', 14, 'Clarification on Project', 0),
(5697, 5814, '2018-04-25 00:00:00', '14:00:00', '14:30:00', 15, 'Course load Discussion', 0),
(5698, 5815, '2018-04-26 00:00:00', '14:30:00', '15:00:00', 16, 'Credit Transfer', 0),
(5699, 5816, '2018-04-27 00:00:00', '15:00:00', '15:30:00', 17, 'Academic advising', 0),
(5700, 5817, '2018-04-16 00:00:00', '14:30:00', '15:00:00', 18, 'Quiz grade error', 0),
(5701, 5818, '2018-04-17 00:00:00', '15:00:00', '15:30:00', 19, 'Midterm grade error', 0),
(5702, 5819, '2018-04-18 00:00:00', '16:00:00', '16:30:00', 20, 'Future Absence', 0),
(5703, 5820, '2018-04-19 00:00:00', '15:30:00', '16:00:00', 21, 'Major declaration', 0),
(5704, 5821, '2018-04-20 00:00:00', '13:30:00', '14:00:00', 22, 'Cluster credit', 0),
(5705, 5822, '2018-04-23 00:00:00', '14:00:00', '14:30:00', 23, 'Study Abroad Questions', 0),
(5706, 5823, '2018-03-06 00:00:00', '14:00:00', '14:30:00', 24, 'Question about Lecture 21', 1),
(5707, 5824, '2018-03-07 00:00:00', '14:00:00', '14:30:00', 25, 'Question on MongoDB', 1),
(5708, 5825, '2018-03-08 00:00:00', '11:00:00', '11:30:00', 26, 'Question on problem set 2', 1),
(5709, 5826, '2018-03-09 00:00:00', '11:30:00', '12:00:00', 27, 'Query problems', 1),
(5710, 5827, '2018-03-12 00:00:00', '12:00:00', '12:30:00', 28, 'System log in problem', 1),
(5687, 5828, '2018-03-12 00:00:00', '13:30:00', '14:00:00', 29, 'Group project grades', 1),
(5688, 5829, '2018-03-13 00:00:00', '13:00:00', '13:30:00', 30, 'Concern about Grades', 1),
(5689, 5830, '2018-03-14 00:00:00', '12:00:00', '12:30:00', 31, 'Credit Transfer', 1),
(5690, 5931, '2018-03-15 00:00:00', '12:00:00', '12:30:00', 32, 'Help on Assignment', 1),
(5691, 5800, '2018-03-16 00:00:00', '14:30:00', '15:00:00', 33, 'Question on HW2', 1),
(5692, 5801, '2018-03-19 00:00:00', '12:00:00', '12:30:00', 34, 'Need help on concepts', 1),
(5693, 5802, '2018-03-20 00:00:00', '12:00:00', '12:30:00', 35, 'Confusion on class topic', 1),
(5694, 5803, '2018-03-21 00:00:00', '10:30:00', '11:00:00', 36, 'Academic advising', 1),
(5695, 5804, '2018-03-22 00:00:00', '10:30:00', '11:00:00', 37, 'Internship Advising', 1),
(5696, 5805, '2018-03-23 00:00:00', '14:00:00', '14:30:00', 38, 'Research Interview', 1),
(5697, 5806, '2018-03-19 00:00:00', '15:00:00', '15:30:00', 39, 'Job searching', 1),
(5698, 5807, '2018-03-20 00:00:00', '16:00:00', '16:30:00', 40, 'Recommendation Letter', 1),
(5699, 5808, '2018-03-21 00:00:00', '15:30:00', '16:00:00', 41, 'Need advise on schedule planning', 1),
(5700, 5809, '2018-03-22 00:00:00', '15:00:00', '15:30:00', 42, 'clarification on HW3', 1),
(5701, 5810, '2018-03-23 00:00:00', '12:00:00', '12:30:00', 43, 'Exam prep', 1),
(5702, 5811, '2018-03-26 00:00:00', '12:30:00', '13:00:00', 44, 'Question about Minoring', 1),
(5703, 5812, '2018-03-27 00:00:00', '14:00:00', '14:30:00', 45, 'Questions about Double Major', 1),
(5704, 5813, '2018-03-28 00:00:00', '15:30:00', '16:00:00', 46, 'Job interview', 1),
(5705, 5814, '2018-03-29 00:00:00', '11:00:00', '11:30:00', 47, 'Course load Discussion', 1),
(5706, 5815, '2018-03-30 00:00:00', '13:00:00', '13:30:00', 48, 'Exam prep', 1),
(5707, 5816, '2018-03-05 00:00:00', '13:00:00', '13:30:00', 49, 'Cluster credit', 1),
(5708, 5817, '2018-03-06 00:00:00', '12:30:00', '13:00:00', 50, 'Academic advising', 1),
(5709, 5818, '2018-03-07 00:00:00', '16:30:00', '17:00:00', 51, 'Study Abroad programs', 1),
(5710, 5819, '2018-03-08 00:00:00', '13:30:00', '14:00:00', 52, 'Question about Extra Credits', 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `apptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`professorID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE;
