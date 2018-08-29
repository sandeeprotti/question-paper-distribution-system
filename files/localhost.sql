-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2018 at 01:44 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qpds`
--
CREATE DATABASE IF NOT EXISTS `qpds` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `qpds`;

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `alot_id` varchar(10) NOT NULL,
  `room_id` varchar(10) NOT NULL,
  `fac_id` varchar(10) NOT NULL,
  `start_usn` varchar(10) NOT NULL,
  `end_usn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(10) NOT NULL,
  `dept_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('101', 'mca');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` varchar(10) NOT NULL,
  `fac_name` text NOT NULL,
  `fac_pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `fac_name`, `fac_pass`) VALUES
('13', 'sas', 'asa'),
('sagar', 'sagar patil', 'sagar');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` varchar(10) NOT NULL,
  `no_of_students` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sch_id` varchar(10) NOT NULL,
  `sch_date` date NOT NULL,
  `sub_code` varchar(10) NOT NULL,
  `qpaper` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sch_id`, `sch_date`, `sub_code`, `qpaper`) VALUES
('1', '2018-04-08', '123', 'C:fakepathpdf-sample.pdf'),
('2', '2018-01-02', '123', 'C:fakepathpdf-sample.pdf'),
('3', '2018-04-09', '123', 'C:fakepathpdf-sample.pdf'),
('4', '2018-03-10', '123', 'C:fakepathpdf-sample.pdf'),
('5', '2018-05-10', '123', 'C:fakepathschedule-qpaper.bin'),
('6', '0216-08-09', '123', 'C:fakepathpdf-sample.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` varchar(10) NOT NULL,
  `sem` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem`) VALUES
('4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `stud_name` text NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `sem_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_code` varchar(10) NOT NULL,
  `sub_name` text NOT NULL,
  `sem_id` varchar(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_code`, `sub_name`, `sem_id`, `dept_id`) VALUES
('123', 'sasa', '4', '101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD PRIMARY KEY (`alot_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `fac_id` (`fac_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`),
  ADD KEY `sub_code` (`sub_code`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_code`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allotment`
--
ALTER TABLE `allotment`
  ADD CONSTRAINT `allotment_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `allotment_ibfk_2` FOREIGN KEY (`fac_id`) REFERENCES `faculty` (`fac_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`sub_code`) REFERENCES `subjects` (`sub_code`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`sub_code`) REFERENCES `subjects` (`sub_code`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
