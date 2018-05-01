-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2018 at 03:44 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `professorID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `starts` time NOT NULL,
  `ends` time NOT NULL,
  `apptID` int(11) NOT NULL AUTO_INCREMENT,
  `purpose` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`apptID`),
  UNIQUE KEY `professorID` (`professorID`,`studentID`,`date`,`starts`,`ends`),
  KEY `studentID` (`studentID`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`professorID`, `studentID`, `date`, `starts`, `ends`, `apptID`, `purpose`, `status`) VALUES
(5681, 5800, '2018-04-05', '10:30:00', '11:00:00', 1, 'Question on HW1', 0),
(5681, 5801, '2018-04-06', '13:00:00', '13:30:00', 2, 'Question on HW2', 0),
(5682, 5802, '2018-04-09', '12:30:00', '13:00:00', 3, 'Question on HW3', 0),
(5682, 5803, '2018-04-13', '15:30:00', '16:00:00', 4, 'Question on Project 1', 0),
(5687, 5804, '2018-04-10', '13:00:00', '13:30:00', 5, 'Question on Project 2', 0),
(5688, 5805, '2018-04-11', '14:00:00', '14:30:00', 6, 'Question on Project 3', 0),
(5689, 5806, '2018-04-12', '15:00:00', '15:30:00', 7, 'Question on Project 4', 0),
(5690, 5807, '2018-04-16', '12:30:00', '13:00:00', 8, 'Question on Midterm1', 0),
(5691, 5808, '2018-04-17', '11:00:00', '11:30:00', 9, 'Question on Midterm2', 0),
(5692, 5809, '2018-04-18', '11:30:00', '12:00:00', 10, 'Question on Midterm3', 0),
(5693, 5810, '2018-04-19', '12:30:00', '13:00:00', 11, 'Question on Final', 0),
(5694, 5811, '2018-04-20', '12:30:00', '13:00:00', 12, 'Concern about Grades', 0),
(5695, 5812, '2018-04-23', '13:30:00', '14:00:00', 13, 'Help on Assignment', 0),
(5696, 5813, '2018-04-24', '14:00:00', '14:30:00', 14, 'Clarification on Project', 0),
(5697, 5814, '2018-04-25', '14:00:00', '14:30:00', 15, 'Course load Discussion', 0),
(5698, 5815, '2018-04-26', '14:30:00', '15:00:00', 16, 'Credit Transfer', 0),
(5699, 5816, '2018-04-27', '15:00:00', '15:30:00', 17, 'Academic advising', 0),
(5700, 5817, '2018-04-16', '14:30:00', '15:00:00', 18, 'Quiz grade error', 0),
(5701, 5818, '2018-04-17', '15:00:00', '15:30:00', 19, 'Midterm grade error', 0),
(5702, 5819, '2018-04-18', '16:00:00', '16:30:00', 20, 'Future Absence', 0),
(5703, 5820, '2018-04-30', '15:30:00', '16:00:00', 21, 'Major declaration', 0),
(5704, 5821, '2018-04-20', '13:30:00', '14:00:00', 22, 'Cluster credit', 0),
(5705, 5822, '2018-04-23', '14:00:00', '14:30:00', 23, 'Study Abroad Questions', 0),
(5706, 5823, '2018-03-06', '14:00:00', '14:30:00', 24, 'Question about Lecture 21', 1),
(5707, 5824, '2018-03-07', '14:00:00', '14:30:00', 25, 'Question on MongoDB', 1),
(5708, 5825, '2018-03-08', '11:00:00', '11:30:00', 26, 'Question on problem set 2', 1),
(5709, 5826, '2018-03-09', '11:30:00', '12:00:00', 27, 'Query problems', 1),
(5710, 5827, '2018-03-12', '12:00:00', '12:30:00', 28, 'System log in problem', 1),
(5687, 5828, '2018-03-12', '13:30:00', '14:00:00', 29, 'Group project grades', 1),
(5688, 5829, '2018-03-13', '13:00:00', '13:30:00', 30, 'Concern about Grades', 1),
(5689, 5830, '2018-03-14', '12:00:00', '12:30:00', 31, 'Credit Transfer', 1),
(5690, 5931, '2018-03-15', '12:00:00', '12:30:00', 32, 'Help on Assignment', 1),
(5691, 5800, '2018-03-16', '14:30:00', '15:00:00', 33, 'Question on HW2', 1),
(5692, 5801, '2018-03-19', '12:00:00', '12:30:00', 34, 'Need help on concepts', 1),
(5693, 5802, '2018-03-20', '12:00:00', '12:30:00', 35, 'Confusion on class topic', 1),
(5694, 5803, '2018-03-21', '10:30:00', '11:00:00', 36, 'Academic advising', 1),
(5695, 5804, '2018-03-22', '10:30:00', '11:00:00', 37, 'Internship Advising', 1),
(5696, 5805, '2018-03-23', '14:00:00', '14:30:00', 38, 'Research Interview', 1),
(5697, 5806, '2018-03-19', '15:00:00', '15:30:00', 39, 'Job searching', 1),
(5698, 5807, '2018-03-20', '16:00:00', '16:30:00', 40, 'Recommendation Letter', 1),
(5699, 5808, '2018-03-21', '15:30:00', '16:00:00', 41, 'Need advise on schedule planning', 1),
(5700, 5809, '2018-03-22', '15:00:00', '15:30:00', 42, 'clarification on HW3', 1),
(5701, 5810, '2018-03-23', '12:00:00', '12:30:00', 43, 'Exam prep', 1),
(5702, 5811, '2018-03-26', '12:30:00', '13:00:00', 44, 'Question about Minoring', 1),
(5703, 5812, '2018-03-27', '14:00:00', '14:30:00', 45, 'Questions about Double Major', 1),
(5704, 5813, '2018-03-28', '15:30:00', '16:00:00', 46, 'Job interview', 1),
(5705, 5814, '2018-03-29', '11:00:00', '11:30:00', 47, 'Course load Discussion', 1),
(5706, 5815, '2018-03-30', '13:00:00', '13:30:00', 48, 'Exam prep', 1),
(5707, 5816, '2018-03-05', '13:00:00', '13:30:00', 49, 'Cluster credit', 1),
(5708, 5817, '2018-03-06', '12:30:00', '13:00:00', 50, 'Academic advising', 1),
(5709, 5818, '2018-03-07', '16:30:00', '17:00:00', 51, 'Study Abroad programs', 1),
(5710, 5819, '2018-03-08', '13:30:00', '14:00:00', 52, 'Question about Extra Credits', 1),
(5703, 5679, '2018-04-30', '13:30:00', '19:00:00', 53, 'wewe', 0),
(5703, 5679, '2018-04-30', '14:00:00', '19:00:00', 54, 'sfsdsdsd', 0),
(5703, 5679, '2018-04-30', '19:00:00', '19:00:00', 55, 'Somthing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

DROP TABLE IF EXISTS `availability`;
CREATE TABLE IF NOT EXISTS `availability` (
  `professorID` int(11) NOT NULL,
  `day` int(1) NOT NULL,
  `starts` time DEFAULT NULL,
  `ends` time DEFAULT NULL,
  PRIMARY KEY (`professorID`,`day`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`professorID`, `day`, `starts`, `ends`) VALUES
(5681, 4, '10:00:00', '11:00:00'),
(5681, 5, '13:00:00', '14:00:00'),
(5682, 1, '12:30:00', '14:00:00'),
(5682, 5, '15:00:00', '16:00:00'),
(5687, 2, '12:00:00', '13:30:00'),
(5688, 3, '14:00:00', '16:00:00'),
(5689, 4, '14:30:00', '16:00:00'),
(5690, 1, '12:00:00', '13:00:00'),
(5691, 2, '11:00:00', '12:30:00'),
(5692, 3, '11:30:00', '12:30:00'),
(5693, 4, '12:00:00', '14:00:00'),
(5694, 5, '12:30:00', '13:30:00'),
(5695, 1, '13:00:00', '14:00:00'),
(5696, 2, '13:30:00', '14:30:00'),
(5697, 3, '14:00:00', '15:00:00'),
(5698, 4, '14:00:00', '15:30:00'),
(5699, 5, '14:30:00', '15:30:00'),
(5700, 1, '14:30:00', '15:00:00'),
(5701, 2, '15:00:00', '16:00:00'),
(5702, 3, '15:30:00', '16:30:00'),
(5703, 4, '15:00:00', '16:00:00'),
(5704, 5, '13:30:00', '15:00:00'),
(5705, 1, '13:30:00', '14:30:00'),
(5706, 2, '14:00:00', '15:00:00'),
(5707, 3, '14:00:00', '15:30:00'),
(5708, 4, '11:00:00', '12:00:00'),
(5709, 5, '10:30:00', '12:00:00'),
(5710, 1, '11:00:00', '12:30:00'),
(5687, 1, '13:00:00', '14:00:00'),
(5688, 2, '13:00:00', '14:00:00'),
(5689, 3, '12:00:00', '13:30:00'),
(5690, 4, '12:00:00', '13:30:00'),
(5691, 5, '14:00:00', '15:30:00'),
(5692, 1, '12:00:00', '13:00:00'),
(5693, 2, '11:30:00', '13:30:00'),
(5694, 3, '10:00:00', '11:30:00'),
(5695, 4, '10:00:00', '11:00:00'),
(5696, 5, '14:00:00', '15:30:00'),
(5697, 1, '15:00:00', '16:00:00'),
(5698, 2, '16:00:00', '17:00:00'),
(5699, 3, '15:00:00', '17:00:00'),
(5700, 4, '14:30:00', '16:00:00'),
(5701, 5, '12:00:00', '13:00:00'),
(5702, 1, '12:30:00', '14:00:00'),
(5703, 2, '13:30:00', '15:00:00'),
(5704, 3, '15:00:00', '16:30:00'),
(5705, 4, '10:00:00', '11:30:00'),
(5706, 5, '12:30:00', '14:00:00'),
(5707, 1, '13:00:00', '14:00:00'),
(5708, 2, '12:30:00', '14:00:00'),
(5709, 3, '15:00:00', '17:00:00'),
(5710, 4, '13:30:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `courseID` varchar(10) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`) VALUES
('CSC161', 'INTRO TO PROGRAMMING'),
('CSC171', 'INTRO TO COMPUTER SCIENCE'),
('CSC170', 'INTRO TO WEB DEVELOPMENT'),
('CSC172', 'DATA STRUCTURE AND ALGORITHMS'),
('CSC173', 'COMPUTATION & FORMAL SYSTEMS'),
('CSC214', 'MOBILE APP DEVELOPMENT'),
('CSC240', 'DATA MINING'),
('CSC242', 'ARTIFICIAL INTELLIGENCE'),
('CSC247', 'NATURAL LANGUAGE PROCESSING'),
('CSC261', 'DATABASE SYSTEMS'),
('MTH161', 'CALCULUS IA'),
('MTH171', 'CALCULUS IIA'),
('MTH130', 'EXCURSIONS IN MATH'),
('MTH140', 'FOUNDATIONS OF CALCULUS'),
('MTH141', 'CALCULUS I'),
('MTH142', 'CALCULUS II'),
('MTH143', 'CALCULUS III'),
('MTH150', 'DISCRETE MATH'),
('MTH164', 'MULTIDIMENSIONAL CALCULUS'),
('MTH165', 'LINEAR ALGEBRA'),
('MTH171H', 'HONORS CALCULUS I'),
('MTH172H', 'HONORS CALCULUS II'),
('MTH173H', 'HONORS CALCULUS III'),
('MTH174H', 'HONORS CALCULUS IV'),
('MTH190', 'TOPICS IN PROBLEM SOLVING'),
('MTH199', 'THE INFINITE'),
('MTH200W', 'TRANSITION TO HIGHER MATH'),
('MTH201', 'INTRO TO PROBABILITY'),
('MTH201H', 'INTO TO PROBABILITY'),
('BIO101', 'GENES, GERMS, AND GENOMICS'),
('BIO102', 'NATURAL HISTORY'),
('BIO110', 'PRINCIPLES OF BIOLOGY I'),
('BIO112', 'BIO PERSPECTIVES I'),
('BIO198', 'PRINCIPLES OF GENETICS'),
('BIO202', 'MOLECULAR BIOLOGY'),
('BIO204', 'PRIN HUMAN PHYSIOLOGY'),
('BIO225', 'ECOLOGY AND EVOLUTIONARY BIO'),
('ECO108', 'PRINCIPLES OF ECONOMICS'),
('ECO207', 'INTERMEDIATE MICROECONOMICS'),
('ECO209', 'INTERMEDIATE MACROECONOMICS'),
('ECO217', 'CONTRACT THEORY'),
('ECO238', 'ENVIRONMENTAL ECONOMICS'),
('ECO230', 'ECONOMIC STATISTICS'),
('AAS112', 'HISTORY OF JAZZ I'),
('AAS165', 'MBRIRA ENSEMBLE'),
('AAS168', 'WEST AFRICAN DRUMMING ADV'),
('AAS205', 'ANTHROPOLOGY OF ROBOTS'),
('AH101', 'INTRO TO ART & VISUAL CULTURE'),
('AH103', 'WAYS OF SEEING:ART AND THE CULTURE WARS'),
('AH136', 'INTRO TO THE ART OF FILM'),
('ANT101', 'CULTURAL ANTHROPOLOGY'),
('ANT102', 'INTRODUCTION TO MEDICAL ANTHROPOLOGY'),
('ANT105', 'LANGUAGE & CULTURE'),
('ANT110', 'INTRO TO LINGUISTIC ANALYSIS'),
('ARA101', 'ELEMENTARY ARABIC I'),
('ARA103', 'INTERMEDIATE ARABIC'),
('ARA148', 'THE ARABIAN NIGHTS'),
('ARA149', 'THE MIDDLE-EAST NOW'),
('ASL101', 'BEGINNING AMERICAN SIGN LANGUAGE I'),
('ASL102', 'BEGINNING AMERICAN SIGN LANGUAGE II'),
('ASL105', 'INTERMEDIATE AMERICAN SIGN LANGUAGE I'),
('ASL106', 'INTERMEDIATE AMERICAN SIGN LANGUAGE II'),
('AME140', 'INTRO TO AUDIO MUSIC ENGINEERING'),
('AME191', 'ART AND TECH OF RECORDING'),
('AME192', 'LISTENING AND AUDIO PROD'),
('AME193', 'SOUND DESIGN'),
('AST106', 'COSMIC ORIGINS OF LIFE'),
('AST111', 'THE SOLAR SYSTEM & ITS ORIGIN'),
('AST231', 'GRAVITATION & GENERAL RELATIVITY'),
('ATH110', 'HISTORY OF ARCHAEOLOGICAL THOUGHT'),
('ATH222', 'CITIES AND URBANISM'),
('BCS110', 'NEURAL FOUNDATIONS OF BEHAVIORS'),
('BCS111', 'FOUNDATIONS OF COGNITIVE SCIENCE'),
('BCS151', 'PERCEPTION & ACTION'),
('BCS152', 'LANGUAGE AND PSYCHOLINGUISTICS'),
('BCS185', 'SOCIAL COGNITION'),
('BME101', 'INTRO TO BME'),
('BME201', 'FUNDAMENTALS OF BIOMECHNS'),
('BME228', 'PHYSIOLOGICIAL CONTROL SYSTEMS'),
('BME230', 'BME SIGNALS, SYSTEMS AND IMAGING'),
('CGR101', 'NEW TESTAMENT & CLASSICAL GREEK I'),
('CGR103', 'INTERMEDIATE GREEK I'),
('CGR206', 'PLATO\'S PHAEDRUS'),
('CHE113', 'CHEMICAL PROC ANALYSIS'),
('CHE150', 'GREEN ENERGY'),
('CHE225', 'CHE THERMODYNAMICS'),
('CHE226', 'THERMODYNAMICS II'),
('CHI101', 'ELEMENTARY CHINESE I'),
('CHI114', 'CONVERSATIONAL CHINESE I'),
('CHI151', 'INTERMEDIATE CHINESE I'),
('CHI202', 'ADVANCED INTERMEDIATE CHINESE I'),
('CHM131', 'CHM CONCEPTS, SYSTEMS, PRACTICE I'),
('CHM137', 'CHEMICAL PRINCIPLES FOR ENGINEERS'),
('CHM171', 'FR ORGANIC CHEMISTRY'),
('CHM203', 'ORGANIC CHEMISTRY'),
('CLA101', 'INTRO TO GREEK AND ROMAN ANTIQUITY'),
('CLA120', 'HISTORY OF THE ANCIENT GREEK WORLD'),
('CLA134', 'HISTORY OF ARCHAEOLOGICAL THOUGHT'),
('CLA140', 'CLASSICAL & SCRIPTURAL BACKGROUNDS'),
('CSP171', 'SOCIAL AND EMOTIONAL DEVELOPMENT'),
('CSP181', 'THEORY OF PERSONALITY AND PHYCHOTHERAPY'),
('CSP210', 'SOCIAL COGNITION'),
('CSP219', 'RESEARCH METHODS IN PSYCHOLOGY'),
('CVS110', 'NEURAL FOUNDATIONS OF BEHAVIORS'),
('CVS151', 'PERCEPTION AND ACTION'),
('CVS241', 'NEURONS, CIRCUITS, AND SYSTEMS'),
('DAN104', 'CONTACT IMPROVISATION I'),
('DAN114', 'INTRODUCTION TO YOGA'),
('DAN116', 'INTRODUCTION TO SOMATIC BALLET'),
('DAN130', 'CONDITIONING FOR DANCER & ATHLETE'),
('DAN145', 'BEGINNING JAZZ TECHNIQUE'),
('DSC201', 'TOOLS FOR DATA SCIENCE'),
('DSC240', 'DATA MINING'),
('DSC261', 'DATABASE SYSTEMS'),
('DSC262', 'COMPUTATIONAL INTRODUCTION TO STATISTICS'),
('DMS101', 'INTRO DIGITAL MEDIA STUDIES'),
('DMS102', 'PROGRAMING FOR DIGITAL MEDIA'),
('DMS103', 'ESSENTIAL DIGITAL MEDIA TOOLKIT'),
('DMS104', 'DESIGN IN THE DIGITAL AGE'),
('DMS111', 'NEW MEDIA AND EMERGING PRACTICE I'),
('DMS112', 'INTRO TO PHOTOGRAPHY'),
('ECE101', 'INTRO TO ELECTRICAL AND COMPUTER ENGINEERING'),
('ECE111', 'INTRO TO SIGNALS & CIRCUITS'),
('ECE140', 'INTRO TO AUDIO MUSIC & ENGIN'),
('EES101', 'INTO TO GEOLOGICAL SCIENCES'),
('EES105', 'INTRO TO CLIMATE CHANGE'),
('EES203', 'SEDIMENTOLOGY & STRATIGRAPHY'),
('EHU103', 'MORAL PROBLEMS'),
('EHU167M', 'CLIMATE FUTURES'),
('EHU251', ' NEW MEDIA AND EMERGING PRACTICE 2'),
('EHU263', 'HISTORY OF FOOD'),
('EHU324', 'ARCHITECTURE AND ENVIRONMENT'),
('ENG100', 'GREAT BOOKSL WAR, WARRIORS, STRATEGIES, PROTESTS'),
('ENG101', 'MAXIMUM ENGLISH'),
('ENG112', 'CLASSICAL & SCRIPTURAL BACKGROUNDS'),
('ENG113', 'BRITISH LITERATURE I'),
('FMS132', 'INTRO TO THE ART OF FILM'),
('FMS161', 'INTRO TO VIDEO ART'),
('FMS202', 'LANGUAGE & ADVERTISING'),
('FMS213', 'RACE & GENDER IN POP FILM'),
('FR101', 'ELEMENTARY FRENCH I'),
('FR153', 'INTEMEDIATE FRENCH'),
('FR155', 'FRENCH CONVERSATION & COMPOSITION'),
('FR160', 'THE NEW EUROPE'),
('GER101', 'ELEMENTARY GERMAN I'),
('GER151', 'INTERMEDIATE GERMAN I'),
('GER160', 'THE NEW EUROPE'),
('GER200', 'ADVANCED CONVERSATION & COMPOSITION'),
('GER203', 'INTRO TO GERMAN LITERATURE'),
('GSW100', 'MONSTROUS BLACK BODIES IN THE AMERICAN IMAGINATION'),
('GSW105', 'SEX AND POWER'),
('GSW115', 'INTO TO MEDICAL ANTHROPOLOGY'),
('GSW161', 'GENDER IN JUDIASM'),
('HEB101', 'ELEMENTARY HEBREW I'),
('HEB103', 'INTERMEDIATE HEBREW I'),
('HIS117', 'HISTORY OF ARCHAEOLOGICAL THOUGHT'),
('HIS127', 'FOUNDATIONS OF MEDIEVAL FRANCE'),
('HIS134', 'RUSSIA NOW'),
('HIS139', 'HISTORY OF BRITISH INDIA'),
('IR101', 'INTRO TO COMPARATIVE POLITICS'),
('IR237', 'GENDER AND DEVELOPMENT'),
('IR249', 'ISRAEL PALESTINE'),
('IR150', 'COMPARATIVE DEMOCRATIC REPRESENTATION'),
('IR267', 'IDENTITYM ETHNICITY, NATIONALISM'),
('IT101', 'ELEMENTARY ITALIAN I'),
('IT151', 'INTERMEDIATE ITALIAN I'),
('IT200', 'ADVANCED ITALIAN COMPOSITION AND CONVERSATION'),
('JPN101', 'ELEMENTARY JAPANESE I'),
('JPN114', 'INTERMEDIATE CONVERSATIONAL JAPANESE I'),
('JPN151', 'INTEMEDIATE JAPANESE I'),
('JPN201', 'ADVANCES INTERMEDIATE JAPANESE I'),
('KOR101', 'ELEMENTARY KOREAN I'),
('KOR151', 'INTERMEDIATE KOREAN I'),
('KORE201', 'ADVANCED INTERMEDIATE KOREAN I');

-- --------------------------------------------------------

--
-- Table structure for table `profroom`
--

DROP TABLE IF EXISTS `profroom`;
CREATE TABLE IF NOT EXISTS `profroom` (
  `professorID` int(11) NOT NULL,
  `roomNumber` varchar(10) NOT NULL,
  PRIMARY KEY (`professorID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profroom`
--

INSERT INTO `profroom` (`professorID`, `roomNumber`) VALUES
(5681, 'CSC 712');

-- --------------------------------------------------------

--
-- Table structure for table `table 7`
--

DROP TABLE IF EXISTS `table 7`;
CREATE TABLE IF NOT EXISTS `table 7` (
  `COL 1` int(4) DEFAULT NULL,
  `COL 2` varchar(34) DEFAULT NULL,
  `COL 3` varchar(32) DEFAULT NULL,
  `COL 4` varchar(10) DEFAULT NULL,
  `COL 5` varchar(12) DEFAULT NULL,
  `COL 6` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 7`
--

INSERT INTO `table 7` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
(5679, 'zliang11@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Zi', 'L', 0),
(5680, 'za123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Zubair', 'A', 0),
(5681, 'nag98@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Naven', 'G', 1),
(5682, 'mpage2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Mike', 'Page', 1),
(5687, 'ferguson@cs.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'George', 'Ferguson', 1),
(5688, 'james@cs.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'James', 'Allen', 1),
(5689, 'pawlicki@cs.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Thaddeus', 'Pawlicki', 1),
(5690, 'lisa.altman@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Lisa', 'Altman', 1),
(5691, 'kautz@cs.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Hnery', 'Kautz', 1),
(5692, 'robert.kostin@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Robert', 'Kostin', 1),
(5693, 'jack.werren@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'John', 'Werren', 1),
(5694, 'gloria.culver@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Gloria', 'Culver', 1),
(5695, 'mark.bils@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Mark', 'Bils', 1),
(5696, 'nkocherl@ur.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Narayana', 'Kocherlakota', 1),
(5697, 'steven@landsburg.com', '25d55ad283aa400af464c76d713c07ad', 'Steven', 'Landsburg', 1),
(5698, 'Catherine.K.Kuo@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Catherine', 'Kuo', 1),
(5699, 'stephen.mcaleavey@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Stephen', 'McAleavey', 1),
(5700, 'scott_seidman@urmc.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Scott', 'Seidman', 1),
(5701, 'scott.carney@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Scott', 'Carney', 1),
(5702, 'jenna.wernert@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Jenna', 'Wernet', 1),
(5703, 'atyll@ur.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'AnneMarie', 'Tyll', 1),
(5704, 'mark.herman@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Mark', 'Herman', 1),
(5705, 'saul.lubkin@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Saul', 'Lubkin', 1),
(5706, 'jonathan.pakianathan@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Jonathan', 'Pakianathan', 1),
(5707, 'thomas.tucker@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Thomas', 'Tucker', 1),
(5708, 'rlp@me.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Renato', 'Peruchio', 1),
(5709, 'peter.christensen@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Peter', 'Christensen', 1),
(5710, 'michael.jarvis@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Michael', 'Jarvis', 1),
(5800, 'amcclure@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aaron', 'Mcclure', 0),
(5801, 'asalaza7@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ab', 'Salazar', 0),
(5802, 'ado@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Abraham', 'Do', 0),
(5803, 'asheikh4@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Adeeb', 'Sheikh', 0),
(5804, 'akuo2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Alan', 'Kuo', 0),
(5805, 'azakrocz@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Alana', 'Zakroczemski', 0),
(5806, 'anewswan@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Amos', 'Newswanger', 0),
(5807, 'ageorgia@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Andreas', 'Georgiadis', 0),
(5808, 'axu6@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ansheng', 'Xu', 0),
(5809, 'btian2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Boyuan', 'Tian', 0),
(5810, 'bsmart@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Brandon', 'Smart', 0),
(5811, 'bhamilt6@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Brooke', 'Hamilton', 0),
(5812, 'chu17@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Chenxuan', 'Hu', 0),
(5813, 'clou2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Chuangyu', 'Lou', 0),
(5814, 'dcancelm@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Daniel', 'Cancelmo', 0),
(5815, 'dbassi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Danilo', 'Bassi', 0),
(5816, 'dluo5@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ding', 'Luo', 0),
(5817, 'edoyle4@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Edmund', 'Doyle', 0),
(5818, 'eotto2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ethan', 'Otto', 0),
(5819, 'fzhao6@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Fengyi', 'Zhao', 0),
(5820, 'gnaven@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Gazi Mahir', 'Naven', 0),
(5821, 'ghunkins@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Gregory', 'Hunkins', 0),
(5822, 'hzhu24@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Haiting', 'Zhu', 0),
(5823, 'hfrank2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Harrison', 'Frank', 0),
(5824, 'hwai@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Hnin Oo', 'Wai', 0),
(5825, 'hjohnsto@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Hunter', 'Johnston', 0),
(5826, 'jdaines@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jackson', 'Daines', 0),
(5827, 'jzhan2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'James', 'Zhan', 0),
(5828, 'jhan46@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ji Eun', 'Han', 0),
(5829, 'jlin47@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jiayin', 'Lin', 0),
(5830, 'jliu100@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jiechen', 'Liu', 0),
(5931, 'jwu71@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jiejiong', 'Wu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teach`
--

DROP TABLE IF EXISTS `teach`;
CREATE TABLE IF NOT EXISTS `teach` (
  `professorID` int(11) NOT NULL,
  `courseID` varchar(10) NOT NULL,
  PRIMARY KEY (`professorID`,`courseID`),
  KEY `courseID` (`courseID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teach`
--

INSERT INTO `teach` (`professorID`, `courseID`) VALUES
(5681, 'CSC161'),
(5682, 'CSC171'),
(5687, 'CSC170'),
(5688, 'CSC172'),
(5689, 'CSC173'),
(5690, 'CSC214'),
(5691, 'CSC240'),
(5692, 'CSC242'),
(5693, 'CSC247'),
(5694, 'CSC261'),
(5695, 'MTH161'),
(5696, 'MTH171'),
(5697, 'MTH130'),
(5698, 'MTH140'),
(5699, 'MTH141'),
(5700, 'MTH142'),
(5701, 'MTH143'),
(5702, 'MTH150'),
(5703, 'MTH164'),
(5704, 'MTH165'),
(5705, 'ASL101'),
(5706, 'ASL102'),
(5707, 'BIO110'),
(5708, 'ECO207'),
(5709, 'MTH190'),
(5710, 'MTH199');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `firstName`, `lastName`, `status`) VALUES
(5679, 'zliang11@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Zi', 'L', 0),
(5680, 'za123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Zubair', 'A', 0),
(5681, 'nag98@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Naven', 'G', 1),
(5682, 'mpage2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Mike', 'Page', 1),
(5687, 'ferguson@cs.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'George', 'Ferguson', 1),
(5688, 'james@cs.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'James', 'Allen', 1),
(5689, 'pawlicki@cs.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Thaddeus', 'Pawlicki', 1),
(5690, 'lisa.altman@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Lisa', 'Altman', 1),
(5691, 'kautz@cs.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Hnery', 'Kautz', 1),
(5692, 'robert.kostin@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Robert', 'Kostin', 1),
(5693, 'jack.werren@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'John', 'Werren', 1),
(5694, 'gloria.culver@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Gloria', 'Culver', 1),
(5695, 'mark.bils@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Mark', 'Bils', 1),
(5696, 'nkocherl@ur.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Narayana', 'Kocherlakota', 1),
(5697, 'steven@landsburg.com', '25d55ad283aa400af464c76d713c07ad', 'Steven', 'Landsburg', 1),
(5698, 'Catherine.K.Kuo@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Catherine', 'Kuo', 1),
(5699, 'stephen.mcaleavey@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Stephen', 'McAleavey', 1),
(5700, 'scott_seidman@urmc.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Scott', 'Seidman', 1),
(5701, 'scott.carney@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Scott', 'Carney', 1),
(5702, 'jenna.wernert@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Jenna', 'Wernet', 1),
(5703, 'atyll@ur.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'AnneMarie', 'Tyll', 1),
(5704, 'mark.herman@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Mark', 'Herman', 1),
(5705, 'saul.lubkin@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Saul', 'Lubkin', 1),
(5706, 'jonathan.pakianathan@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Jonathan', 'Pakianathan', 1),
(5707, 'thomas.tucker@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Thomas', 'Tucker', 1),
(5708, 'rlp@me.rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Renato', 'Peruchio', 1),
(5709, 'peter.christensen@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Peter', 'Christensen', 1),
(5710, 'michael.jarvis@rochester.edu', '25d55ad283aa400af464c76d713c07ad', 'Michael', 'Jarvis', 1),
(5800, 'amcclure@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aaron', 'Mcclure', 0),
(5801, 'asalaza7@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ab', 'Salazar', 0),
(5802, 'ado@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Abraham', 'Do', 0),
(5803, 'asheikh4@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Adeeb', 'Sheikh', 0),
(5804, 'akuo2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Alan', 'Kuo', 0),
(5805, 'azakrocz@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Alana', 'Zakroczemski', 0),
(5806, 'anewswan@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Amos', 'Newswanger', 0),
(5807, 'ageorgia@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Andreas', 'Georgiadis', 0),
(5808, 'axu6@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ansheng', 'Xu', 0),
(5809, 'btian2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Boyuan', 'Tian', 0),
(5810, 'bsmart@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Brandon', 'Smart', 0),
(5811, 'bhamilt6@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Brooke', 'Hamilton', 0),
(5812, 'chu17@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Chenxuan', 'Hu', 0),
(5813, 'clou2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Chuangyu', 'Lou', 0),
(5814, 'dcancelm@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Daniel', 'Cancelmo', 0),
(5815, 'dbassi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Danilo', 'Bassi', 0),
(5816, 'dluo5@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ding', 'Luo', 0),
(5817, 'edoyle4@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Edmund', 'Doyle', 0),
(5818, 'eotto2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ethan', 'Otto', 0),
(5819, 'fzhao6@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Fengyi', 'Zhao', 0),
(5820, 'gnaven@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Gazi Mahir', 'Naven', 0),
(5821, 'ghunkins@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Gregory', 'Hunkins', 0),
(5822, 'hzhu24@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Haiting', 'Zhu', 0),
(5823, 'hfrank2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Harrison', 'Frank', 0),
(5824, 'hwai@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Hnin Oo', 'Wai', 0),
(5825, 'hjohnsto@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Hunter', 'Johnston', 0),
(5826, 'jdaines@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jackson', 'Daines', 0),
(5827, 'jzhan2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'James', 'Zhan', 0),
(5828, 'jhan46@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ji Eun', 'Han', 0),
(5829, 'jlin47@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jiayin', 'Lin', 0),
(5830, 'jliu100@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jiechen', 'Liu', 0),
(5931, 'jwu71@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jiejiong', 'Wu', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
