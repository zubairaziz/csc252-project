-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 01, 2018 at 03:35 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `proj1`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5932;
