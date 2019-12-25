-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 01:10 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_version22`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendents`
--

CREATE TABLE `attendents` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `classname` varchar(45) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `permission` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendents`
--

INSERT INTO `attendents` (`id`, `firstname`, `lastname`, `sex`, `classname`, `subject`, `permission`, `description`) VALUES
(1, 'yon', 'yen', 'Male', 'WEP-A', 'PHP', 'YES', 'Sick');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `title`) VALUES
(1, 'WEP2020-A'),
(2, 'WEP2020-B'),
(3, 'SNA2020'),
(4, 'CLASS2021-A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `lastname`, `sex`, `class_id`) VALUES
(1, 'Rith', 'NHEL', 'Male', 1),
(2, 'Borith', 'MEO', 'Female', 1),
(3, 'Sopheaktra', 'ROS', 'Female', 3),
(4, 'yen', 'NHELnn', 'Male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_has_attendents`
--

CREATE TABLE `student_has_attendents` (
  `student_id` int(11) DEFAULT NULL,
  `attendents_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_has_attendents`
--

INSERT INTO `student_has_attendents` (`student_id`, `attendents_id`) VALUES
(4, 1),
(1, 1),
(2, 1),
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_has_subjects`
--

CREATE TABLE `student_has_subjects` (
  `student_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_has_subjects`
--

INSERT INTO `student_has_subjects` (`student_id`, `subjects_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(3, 1),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub_title`) VALUES
(1, 'PHP Basic'),
(2, 'PHP MVC'),
(3, 'Databases'),
(4, 'illustrator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(0, 'admin', 'admin@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendents`
--
ALTER TABLE `attendents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student_class_idx` (`class_id`);

--
-- Indexes for table `student_has_attendents`
--
ALTER TABLE `student_has_attendents`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `attendents_id` (`attendents_id`);

--
-- Indexes for table `student_has_subjects`
--
ALTER TABLE `student_has_subjects`
  ADD PRIMARY KEY (`student_id`,`subjects_id`),
  ADD KEY `fk_student_has_subjects_subjects1_idx` (`subjects_id`),
  ADD KEY `fk_student_has_subjects_student1_idx` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendents`
--
ALTER TABLE `attendents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_class` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_has_attendents`
--
ALTER TABLE `student_has_attendents`
  ADD CONSTRAINT `student_has_attendents_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `student_has_attendents_ibfk_2` FOREIGN KEY (`attendents_id`) REFERENCES `attendents` (`id`);

--
-- Constraints for table `student_has_subjects`
--
ALTER TABLE `student_has_subjects`
  ADD CONSTRAINT `fk_student_has_subjects_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_has_subjects_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
