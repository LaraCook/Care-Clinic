-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2020 at 03:00 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointmentID` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  PRIMARY KEY (`appointmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `doctor_id`, `patient_id`, `room`, `date_time`, `doctor_name`, `patient_name`) VALUES
(1, '1', '1', 'Floor 2 - Room 14', '02 September, 13:00', 'Drake Ramoray', 'John Davis'),
(2, '4', '8', 'Floor 2 - Room 13', '19 September, 09:00', 'Tammy Smalls', 'Mary Thompson');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctorID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `specialisation` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`doctorID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorID`, `name`, `email`, `specialisation`, `profile_pic`) VALUES
(1, 'Drake Ramoray', 'drakeramoray@care.com', 'Neurosurgeon', 'doctor-1.jpg'),
(4, 'Tammy Smalls', 'Tammyj.smalls@care.com', 'Pediatrician', 'person-6.jpg'),
(5, 'Stephen Strange', 'DoctorStrange@care.com', 'Surgeon', 'doctor-3.jpg'),
(6, 'Daniel Li', 'DanielLi@care.com', 'General Practioner', 'doctor-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patientID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `medical_aid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`patientID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `name`, `medical_aid`, `email`, `avatar`) VALUES
(1, 'John Davis', '123456789', 'Johndavis@gmail.com', 'person-3.jpg'),
(8, 'Mary Thompson', '546798235', 'Marythompson@gmail.com', 'person-8.jpg'),
(7, 'Draco Malfoy', '123987456', 'DMalfoy@gmail.com', 'default-profile.png'),
(10, 'Jeremy Scott', '789852369', 'JeremyTScott@hotmail.com', 'person-7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

DROP TABLE IF EXISTS `receptionist`;
CREATE TABLE IF NOT EXISTS `receptionist` (
  `ReceptionistID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`ReceptionistID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`ReceptionistID`, `username`, `email`, `password`, `avatar`) VALUES
(1, 'John Smith', 'Johnsmith@care.com', 'John123', 'default-profile.png'),
(2, 'Melanie Harolds', 'Mharolds@care.com', 'Melanie123', 'default-profile.png'),
(3, 'Lara Cook', 'Laracook@care.com', '12345', 'default-profile.png'),
(15, 'Hansen Li', 'hli@gmail.com', '123', 'default-profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `assigned_doc` varchar(255) NOT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `number`, `floor`, `assigned_doc`) VALUES
(8, '14', 'Floor 2', '1'),
(7, '13', 'Floor 2', '4'),
(6, '2', 'Floor 1', '4'),
(5, '1', 'Floor 1', '5'),
(9, '6', 'Floor 3', '5'),
(10, '11', 'Floor 3', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
