-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 05:18 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`email`, `password`) VALUES
('divyahegde2018@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `Classno` int(4) NOT NULL,
  `NofSeats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `sem` int(1) NOT NULL,
  `subjectcode` varchar(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facallocate`
--

CREATE TABLE `facallocate` (
  `id` int(255) NOT NULL,
  `classno` int(4) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `email` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `F_id` varchar(50) DEFAULT NULL,
  `F_fname` varchar(50) DEFAULT NULL,
  `F_lname` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Designation` varchar(50) DEFAULT NULL,
  `No_of_duties` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`F_id`, `F_fname`, `F_lname`, `Email`, `Designation`, `No_of_duties`) VALUES
('1', 'Ram', 'sharma', 'ram10@gmail.com', 'assistant professor', '2'),
('2', 'Shaym', 'verma', 'shaym20@gmail.com', 'assistant professor', '2'),
('3', 'Geeta', 'desai', 'geeta30@gmail.com', 'assistant professor', '3'),
('4', 'Sita', 'bhalerao', 'sita40@gmail.com', 'professor', '1'),
('5', 'Ritu', 'birla', 'ritu50@gmail.com', 'assistant professor', '3'),
('6', 'Rohina', 'tata', 'rohina60@gmail.com', 'professor', '1'),
('7', 'Rohan', 'kumar', 'rohan70@gmail.com', 'assistant professor', '4'),
('8', 'Sam', 'shah', 'sam80@gmail.com', 'professor', '1'),
('9', 'Danny', 'roy', 'danny90@gmail.com', 'professor', '1'),
('10', 'Justin', 'biber', 'justin100@gmail.com', 'assistant professor', '2'),
('11', 'Sophie', 'saini', 'sophie110@gmail.com', 'assistant professor', '1'),
('12', 'Megha', 'gupta', 'megha120@gmail.com', 'assistant professor', '1'),
('13', 'Rohit', 'jha', 'rohit130@gmail.com', 'professor', '4'),
('14', 'Mohan', 'chaterji', 'mohan140@gmail.com', 'assistant professor', '1'),
('15', 'Rahul', 'dhawan', 'rahul150@gmail.com', 'assistant professor', '3'),
('16', 'Divya', 'Hegde', 'dthevirus2000@gmail.com', 'assistant professor', '4');

-- --------------------------------------------------------

--
-- Table structure for table `leftout`
--

CREATE TABLE `leftout` (
  `id` int(255) NOT NULL,
  `USN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `password`) VALUES
(4, 'Divya ', 'dthevirus2000@gmail.com', '7xjVnQlt');

-- --------------------------------------------------------

--
-- Table structure for table `remaining`
--

CREATE TABLE `remaining` (
  `id` int(255) NOT NULL,
  `USN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sallocate`
--

CREATE TABLE `sallocate` (
  `id` int(255) NOT NULL,
  `Classno` int(4) NOT NULL,
  `Seat_no` int(3) NOT NULL,
  `Sem` varchar(10) NOT NULL,
  `USN` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `sem` int(1) NOT NULL,
  `subjectcode` varchar(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`sem`, `subjectcode`, `subject`, `date`, `time`) VALUES
(7, '17IS40', 'ML', '2021-03-15', '10:00:00'),
(3, '18IS30', 'DD', '2021-03-15', '10:00:00'),
(5, '18IS56', 'DBMS', '2021-03-15', '10:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`Classno`);

--
-- Indexes for table `facallocate`
--
ALTER TABLE `facallocate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leftout`
--
ALTER TABLE `leftout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remaining`
--
ALTER TABLE `remaining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sallocate`
--
ALTER TABLE `sallocate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`subjectcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facallocate`
--
ALTER TABLE `facallocate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leftout`
--
ALTER TABLE `leftout`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `remaining`
--
ALTER TABLE `remaining`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sallocate`
--
ALTER TABLE `sallocate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
