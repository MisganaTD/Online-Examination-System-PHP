-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 06:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`user_name`, `password`) VALUES
('hbc@gmail.com', '12'),
('online@gmail.com', '123'),
('test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `available_students`
--

CREATE TABLE `available_students` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `program` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `class_year` varchar(10) NOT NULL,
  `semister` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `registered` varchar(30) NOT NULL,
  `passed` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_students`
--

INSERT INTO `available_students` (`id`, `name`, `gender`, `age`, `email`, `address`, `program`, `department`, `class_year`, `semister`, `status`, `registered`, `passed`) VALUES
('1', 'Tamir Atnafu Gizaw', 'Female', '4', 'tamir@gmail.com', 'Dilla', 'Bsc', 'Christian Education', '1', '1', 'Active', '', ''),
('2', 'Abgiya Atnafu Gizaw', 'Female', '2', 'abgiya@gmail.com', 'Dilla', 'Bsc', 'Christian Education', '1', '1', 'Active', '', ''),
('4', 'Chala Abebe Lami', 'Male', '28', 'chala@gmail.com', 'AA', 'Degree', 'ComputerScience', '1', '1', 'Active', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(30) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `credit_hour` varchar(2) NOT NULL,
  `department` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `semister` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_title`, `credit_hour`, `department`, `year`, `semister`) VALUES
('SEOOP12', 'OOP', '4', 'Software Engineering', '1', '1'),
('JP013', 'JavaProgramming', '4', 'Software Engineering', '1', '1'),
('Introduction to Theosophy', 'BTh', '3', 'Christian Education ', '1', '1'),
('HT1', 'HTML', '3', 'ComputerScience', '1', '1'),
('JV12', 'Java', '4', 'ComputerScience', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `coursetoinstructor`
--

CREATE TABLE `coursetoinstructor` (
  `Id` int(11) NOT NULL,
  `InstructorName` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Course` varchar(50) NOT NULL,
  `Year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetoinstructor`
--

INSERT INTO `coursetoinstructor` (`Id`, `InstructorName`, `Department`, `Course`, `Year`) VALUES
(1, 'Misgana Tesfaye', 'Software Engineering', 'OOP', '1'),
(2, 'Atnafu Gizaw', 'Software Engineering', 'JavaProgramming', '1'),
(3, 'Atnafu', 'Christian Education ', 'BTh', '1'),
(3, 'Atnafu', 'Christian Education ', 'BTh', '1'),
(4, 'Jon Gada', 'ComputerScience', 'Java', '1'),
(5, 'Bonsa Tesfaye', 'ComputerScience', 'HTML', '1');

-- --------------------------------------------------------

--
-- Table structure for table `department_registration`
--

CREATE TABLE `department_registration` (
  `department` varchar(30) NOT NULL,
  `faculty` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_registration`
--

INSERT INTO `department_registration` (`department`, `faculty`, `phone`, `email`, `password`, `status`) VALUES
('Christian Education ', 'Christian', '2', 'christian@gmail.com', 'Atne@212', 'Accepted'),
('Christian Leadership ', 'Leadership', '5778', 'leadership@gmail.com', 'cs', 'Accepted'),
('ComputerScience', 'IOT', '011', 'cs@gmail.com', '123', 'Accepted'),
('Information Technology', 'CCI', '3422', 'it@gmail.com', 'it', 'Accepted'),
('Law', 'FBE', '78093232', 'law@gmail.com', 'law', 'Accepted'),
('Mechanical Engineering', 'IOT', '251096671811', 'me@yahoo.com', 'me', 'Accepted'),
('Software Engineering', 'CCI', '000111222', 'swe@gmail.com', 'se', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event`) VALUES
('Registration'),
('Exam'),
('Quiz'),
('training'),
('tutor'),
('Graduation'),
('Test'),
('Meeting');

-- --------------------------------------------------------

--
-- Table structure for table `examschedule`
--

CREATE TABLE `examschedule` (
  `examId` int(15) NOT NULL,
  `examCourse` varchar(50) NOT NULL,
  `examTerm` varchar(5) NOT NULL,
  `examTime` varchar(50) NOT NULL,
  `examDate` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `semister` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examschedule`
--

INSERT INTO `examschedule` (`examId`, `examCourse`, `examTerm`, `examTime`, `examDate`, `department`, `year`, `semister`) VALUES
(1, 'BTh', 'QUIZ', '1:30', '7-1-2021', 'Christian Education ', '1', 1),
(2, 'BTh', 'QUIZ', '10:43', '6-1-2021', 'Christian Education ', '1', 1),
(3, 'HTML', 'QUIZ', '4:00', '27-9-2024', 'ComputerScience', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_ansewer`
--

CREATE TABLE `exam_ansewer` (
  `stud_id` varchar(30) NOT NULL,
  `que_id` varchar(30) NOT NULL,
  `department` varchar(50) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `exam_course` varchar(50) NOT NULL,
  `exam_term` varchar(50) NOT NULL,
  `question_type` varchar(50) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `e` varchar(200) NOT NULL,
  `true_ans` varchar(100) NOT NULL,
  `your_ans` varchar(100) NOT NULL,
  `scored_mark` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `MarkStatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_catagory`
--

CREATE TABLE `exam_catagory` (
  `id` int(10) NOT NULL,
  `catagory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_catagory`
--

INSERT INTO `exam_catagory` (`id`, `catagory`) VALUES
(1, 'QUIZ'),
(2, 'MID EXAM'),
(3, 'FINAL EXAM');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `stud_id` int(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `TotalMark` int(5) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`stud_id`, `department`, `course`, `TotalMark`, `grade`) VALUES
(27, 'Information Technology', 'DATABASE', 73, 'B'),
(36, 'law', 'accounting', 72, 'A'),
(6, 'Software Engineering', 'java', 52, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `graderange`
--

CREATE TABLE `graderange` (
  `department` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `startA` int(10) NOT NULL,
  `endA` int(10) NOT NULL,
  `startB` int(10) NOT NULL,
  `endB` int(10) NOT NULL,
  `startC` int(10) NOT NULL,
  `endC` int(10) NOT NULL,
  `startD` int(10) NOT NULL,
  `endD` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `linkName` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`linkName`, `status`) VALUES
('student regisration', 'active'),
('department registartion', 'Inactive'),
('Course Registration', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `que_id` int(11) NOT NULL,
  `exam_course` varchar(30) DEFAULT NULL,
  `department` varchar(50) NOT NULL,
  `year` varchar(11) NOT NULL,
  `semister` varchar(11) NOT NULL,
  `exam_catagory` varchar(5) NOT NULL,
  `question_type` varchar(30) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `option_e` varchar(11) NOT NULL,
  `TFAnsewer` varchar(100) NOT NULL,
  `CAnsewer` varchar(100) NOT NULL,
  `Mark` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `event` varchar(50) NOT NULL,
  `start_date` varchar(30) NOT NULL,
  `end_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`event`, `start_date`, `end_date`) VALUES
('Exam', '25-9-2024', '30-9-2024');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `Id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(3) NOT NULL,
  `address` varchar(40) NOT NULL,
  `region` varchar(40) NOT NULL,
  `department` varchar(40) NOT NULL,
  `program` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`Id`, `name`, `mname`, `lname`, `gender`, `age`, `address`, `region`, `department`, `program`, `phone`, `email`, `password`, `status`) VALUES
(1, 'Tamir', 'Atnafu', 'Gizaw', 'Female', '4', 'Dilla', 'SNNPR', 'Christian Education', 'Bsc', '355677', 'tamir@gmail.com', '11', 'Active'),
(2, 'Abgiya', 'Atnafu', 'Gizaw', 'Female', '2', 'Dilla', 'SNNPR', 'Christian Education', 'Bsc', '355677', 'abgiya@gmail.com', '123', 'Active'),
(4, 'Chala', 'Abebe', 'Lami', 'Male', '28', 'AA', 'Oromia', 'ComputerScience', 'Degree', '251', 'chala@gmail.com', '123', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teachersId` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teachersId`, `name`, `department`, `username`, `password`) VALUES
(1, 'Misgana Tesfaye', 'Software Engineering', 'atnafu', 'Atne@212'),
(2, 'Atnafu Gizaw', 'Software Engineering', 'user', 'user'),
(3, 'Atnafu', 'Christian Education ', 'atnafu@gmail.com', 'Atne@212'),
(4, 'Jon Gada', 'ComputerScience', 'jon', '123'),
(5, 'Bonsa Tesfaye', 'ComputerScience', 'bon', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `available_students`
--
ALTER TABLE `available_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_registration`
--
ALTER TABLE `department_registration`
  ADD PRIMARY KEY (`department`);

--
-- Indexes for table `examschedule`
--
ALTER TABLE `examschedule`
  ADD PRIMARY KEY (`examId`);

--
-- Indexes for table `exam_catagory`
--
ALTER TABLE `exam_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teachersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examschedule`
--
ALTER TABLE `examschedule`
  MODIFY `examId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_catagory`
--
ALTER TABLE `exam_catagory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teachersId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
