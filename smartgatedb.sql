-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 01:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartgatedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `name`, `email`, `password`) VALUES
(3, 'ADMIN', 'admin', '$2y$10$mq3XCfbkwSoHTPPrlwFvl.m9ZHb/Zr6mtyo53C4wsFnrdHCdeW3/i');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time_in` varchar(255) NOT NULL,
  `time_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_tbl`
--

INSERT INTO `attendance_tbl` (`id`, `student_id`, `date`, `time_in`, `time_out`) VALUES
(1, '2020501322', '9-26-2023', '4:09PM', '5:09PM'),
(2, '123', '9-26-2023', '4:42PM', '5:42PM'),
(3, '123', '9-26-2023', '4:43PM', '5:43PM'),
(4, '456', '9-26-2023', '4:43PM', '7:43PM'),
(5, '2020501322', '9-26-2023', '4:47PM', '6:49PM'),
(6, '2020501322', '9-26-2023', '4:50PM', '6:53PM'),
(7, '123', '10-24-2023', '12:57 PM', ''),
(8, '123', '10-24-2023', '1:00 PM', ''),
(9, '123', '10-24-2023', '1:01 PM', ''),
(10, '123', '10-24-2023', '1:02 PM', ''),
(11, '123', '10-24-2023', '1:33 PM', ''),
(12, '123', '10-24-2023', '1:34 PM', ''),
(13, '123', '10-24-2023', '1:35 PM', ''),
(14, '456', '10-24-2023', '2:14 PM', ''),
(15, '123', '10-24-2023', '2:15 PM', ''),
(16, '123', '10-24-2023', '2:15 PM', ''),
(17, '123', '10-24-2023', '2:15 PM', ''),
(18, '123', '10-24-2023', '2:20 PM', ''),
(19, '123', '10-24-2023', '2:20 PM', ''),
(20, '123', '10-24-2023', '2:20 PM', ''),
(21, '123', '10-24-2023', '2:21 PM', ''),
(22, '123', '10-24-2023', '2:22 PM', ''),
(23, '123', '10-24-2023', '2:22 PM', ''),
(24, '123', '10-24-2023', '2:26 PM', ''),
(25, '123', '10-24-2023', '2:26 PM', ''),
(26, '123', '10-24-2023', '2:40 PM', ''),
(27, '123', '10-24-2023', '2:51 PM', ''),
(28, '123', '10-24-2023', '2:56 PM', ''),
(29, '123', '10-24-2023', '3:04 PM', ''),
(30, '123', '10-24-2023', '3:15 PM', ''),
(31, '123', '10-24-2023', '3:15 PM', ''),
(32, '123', '10-24-2023', '3:16 PM', ''),
(33, '123', '10-24-2023', '3:19 PM', ''),
(34, '123', '10-24-2023', '3:22 PM', ''),
(35, '456', '10-24-2023', '3:26 PM', ''),
(36, '123', '10-24-2023', '3:33 PM', ''),
(37, '123', '10-24-2023', '3:33 PM', ''),
(38, '123', '10-24-2023', '3:34 PM', ''),
(39, '456', '10-24-2023', '3:34 PM', ''),
(40, '123', '10-24-2023', '3:36 PM', ''),
(41, '456', '10-24-2023', '3:37 PM', ''),
(42, '456', '10-24-2023', '3:45 PM', ''),
(43, '456', '10-24-2023', '3:45 PM', ''),
(44, '123', '10-24-2023', '5:05 PM', ''),
(45, '123', '10-24-2023', '5:05 PM', ''),
(46, '123', '10-24-2023', '5:05 PM', ''),
(47, '123', '10-24-2023', '5:11 PM', ''),
(48, '123', '10-24-2023', '5:12 PM', ''),
(49, '123', '10-24-2023', '5:12 PM', ''),
(50, '123', '10-24-2023', '5:13 PM', ''),
(199, '123', '11-3-2023', '5:08 PM', ''),
(200, '123', '11-3-2023', '5:09 PM', ''),
(201, '123', '11-3-2023', '5:13 PM', ''),
(202, '123', '11-3-2023', '5:18 PM', ''),
(203, '123', '11-3-2023', '5:18 PM', ''),
(204, '123', '11-3-2023', '5:19 PM', ''),
(205, '123', '11-3-2023', '5:23 PM', ''),
(206, '123', '11-3-2023', '5:24 PM', ''),
(207, '123', '11-3-2023', '5:24 PM', ''),
(208, '123', '11-3-2023', '5:27 PM', ''),
(209, '123', '11-3-2023', '5:30 PM', ''),
(210, '123', '11-3-2023', '5:31 PM', ''),
(211, '123', '11-3-2023', '5:32 PM', ''),
(212, '123', '11-3-2023', '5:35 PM', ''),
(213, '123', '11-3-2023', '5:36 PM', ''),
(214, '123', '11-3-2023', '5:36 PM', ''),
(215, '123', '11-3-2023', '5:41 PM', ''),
(216, '123', '11-3-2023', '5:52 PM', ''),
(217, '123', '11-3-2023', '5:53 PM', ''),
(218, '123', '11-3-2023', '5:56 PM', ''),
(219, '123', '11-3-2023', '5:56 PM', ''),
(220, '123', '11-3-2023', '5:56 PM', ''),
(221, '123', '11-3-2023', '5:58 PM', ''),
(222, '123', '11-3-2023', '5:58 PM', ''),
(223, '123', '11-3-2023', '5:58 PM', ''),
(224, '123', '11-3-2023', '5:58 PM', ''),
(225, '123', '11-3-2023', '6:01 PM', ''),
(226, '123', '11-3-2023', '6:01 PM', ''),
(227, '123', '11-3-2023', '6:03 PM', ''),
(228, '123', '11-3-2023', '6:03 PM', ''),
(229, '123', '11-3-2023', '6:03 PM', ''),
(230, '123', '11-3-2023', '6:09 PM', ''),
(231, '123', '11-3-2023', '6:22 PM', ''),
(232, '123', '11-3-2023', '6:22 PM', ''),
(233, '123', '11-3-2023', '6:44 PM', ''),
(234, '123', '11-3-2023', '6:45 PM', ''),
(235, '123', '11-3-2023', '6:45 PM', ''),
(236, '123', '11-5-2023', '10:33 PM', ''),
(237, '123', '11-5-2023', '10:33 PM', ''),
(238, '123', '11-5-2023', '10:34 PM', ''),
(239, '123', '11-5-2023', '10:35 PM', ''),
(240, '123', '11-5-2023', '10:38 PM', ''),
(241, '123', '11-5-2023', '10:39 PM', ''),
(242, '123', '11-5-2023', '10:41 PM', ''),
(243, '123', '11-5-2023', '10:43 PM', ''),
(244, '123', '11-5-2023', '10:47 PM', ''),
(245, '123', '11-5-2023', '10:52 PM', ''),
(246, '123', '11-5-2023', '10:57 PM', ''),
(247, '123', '11-5-2023', '11:18 PM', ''),
(248, '123', '11-5-2023', '11:25 PM', ''),
(249, '123', '11-6-2023', '2:48 PM', ''),
(250, '123', '11-6-2023', '2:48 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `childtv`
--

CREATE TABLE `childtv` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `childtv`
--

INSERT INTO `childtv` (`id`, `parent_id`, `student_id`) VALUES
(9, 7, 2020501322),
(10, 8, 69),
(13, 10, 123),
(14, 10, 456);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_tbl`
--

CREATE TABLE `faculty_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_tbl`
--

INSERT INTO `faculty_tbl` (`id`, `name`, `email`, `password`) VALUES
(1, 'Sir Marjon Alarcon', 'teachermarjon@gmail.com', '$2y$10$m1kwiMw7Qk46d9xk29yBKOgDQEXBH7AK/43qqCS3ZgAqNSjVMrVHG');

-- --------------------------------------------------------

--
-- Table structure for table `parent_tbl`
--

CREATE TABLE `parent_tbl` (
  `parentid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `player_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_tbl`
--

INSERT INTO `parent_tbl` (`parentid`, `email`, `name`, `password`, `player_id`) VALUES
(7, 'apigoparent@gmail.com', 'Mark R. Apigo', '$2y$10$3e7Mz29FzT0UZsOkCxmDQ.ChRH7mj8UlRDKjig2BkU.lr1G/XX/T2', '0'),
(8, 'acuinparent@gmail.com', 'Papa ni Maykel Acuin', '$2y$10$8to3EwvNuEftt4w1bdAPvunXmiMDpMjGVnAk.qL7b4l2jqe2huRie', '0'),
(10, 'albaroparent@gmail.com', 'Papa ni Jian Albaro', '$2y$10$PfhSMYPUV1twDsivgGJGTeP07wrwMTOnEi3hsQ4CXAACTEfVNST.e', 'fjH-sj-fU_kJmntY7L7yYM:APA91bGK2EJgBnz0w9fxVnA7OKHp_DHQe5HvhMT3o-E9NUnBy9YuvJIX3AO4riH9PKFc7TNAumC-05N3mgwx97vMDF1Ei2tS_PAKrhMybyhnuaTlfesXyxtwvCDSpTx-B8qlgMU9G2tX'),
(12, 'tilanparent@gmail.com', 'Mama ni Tilan', '$2y$10$ZNlHOesZFjMZvSDUurd2uueY8FrK9/hAJIYAWMqZGX95qF9OIpDIK', '0');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`section_id`, `section_name`, `department_name`) VALUES
(1, 'ENG. 1A', 'GATE'),
(2, 'ENG. 2A', 'GATE'),
(3, 'ENG. 2B', 'GATE'),
(4, 'ENG. 3A', 'GATE'),
(5, 'ENG 3B.', 'GATE'),
(6, 'ENG. 4A', 'GATE'),
(7, 'ENG. 4B', 'GATE'),
(8, 'FIL. 1A', 'GATE'),
(9, 'FIL. 2A', 'GATE'),
(10, 'FIL. 2B', 'GATE'),
(11, 'FIL. 3A', 'GATE'),
(12, 'FIL. 3B', 'GATE'),
(13, 'FIL. 4A', 'GATE'),
(14, 'FIL. 4B', 'GATE'),
(15, 'MATH 1A', 'GATE'),
(16, 'MATH 2A', 'GATE'),
(17, 'MATH 3A', 'GATE'),
(18, 'MATH 4A', 'GATE'),
(19, 'SOCSTUD 1A', 'GATE'),
(20, 'SOCSTUD 2A', 'GATE'),
(21, 'SOCSTUD 3A', 'GATE'),
(22, 'SOCSTUD 4A', 'GATE'),
(23, 'SCIENCE 1A', 'GATE'),
(24, 'SCIENCE 2A', 'GATE'),
(25, 'SCIENCE 3A', 'GATE'),
(26, 'SCIENCE 4A', 'GATE'),
(27, 'BEED 1A', 'GATE'),
(28, 'BEED 2A', 'GATE'),
(29, 'BEED 2B', 'GATE'),
(30, 'BEED 3A', 'GATE'),
(31, 'BEED 3B', 'GATE'),
(32, 'BEED 4A', 'GATE'),
(33, 'GBA 1A', 'BA'),
(34, 'GBA 2A', 'BA'),
(35, 'GBA 1B', 'BA'),
(36, 'GBA 2B', 'BA'),
(37, 'GBA 1C', 'BA'),
(38, 'GBA 2C', 'BA'),
(39, 'GBA 1D', 'BA'),
(40, 'GBA 2D', 'BA'),
(41, 'GBA 2E', 'BA'),
(42, 'BSE 1A', 'BA'),
(43, 'BSE 1A', 'BA'),
(44, 'BSE 2A', 'BA'),
(45, 'BSE 3A', 'BA'),
(46, 'BSE 4A', 'BA'),
(47, 'FM 3A', 'BA'),
(48, 'FM 4A', 'BA'),
(49, 'BE 3A', 'BA'),
(50, 'BE 4A', 'BA'),
(51, 'MM 3A', 'BA'),
(52, 'MM 3A', 'BA'),
(53, 'BSTM 1A', 'HTM'),
(54, 'BSTM 1B', 'HTM'),
(55, 'BSTM 2A', 'HTM'),
(56, 'BSTM 3A', 'HTM'),
(57, 'BSTM 4A', 'HTM'),
(58, 'BSHM 1A', 'HTM'),
(59, 'BSHM 1B', 'HTM'),
(60, 'BSHM 2A', 'HTM'),
(61, 'BSHM 2B', 'HTM'),
(62, 'BSHM 2C', 'HTM'),
(63, 'BSHM 3A', 'HTM'),
(64, 'BSHM 4A', 'HTM'),
(65, 'BSHM 4B', 'HTM'),
(66, 'IT 1A', 'BSIT'),
(67, 'IT 1B', 'BSIT'),
(68, 'IT 1C', 'BSIT'),
(69, 'IT 1D', 'BSIT'),
(70, 'IT 1E', 'BSIT'),
(71, 'IT 2A', 'BSIT'),
(72, 'IT 2B', 'BSIT'),
(73, 'IT 2C', 'BSIT'),
(74, 'IT 2D', 'BSIT'),
(75, 'IT 2E', 'BSIT'),
(76, 'IT 3A', 'BSIT'),
(77, 'IT 3B', 'BSIT'),
(78, 'IT 3C', 'BSIT'),
(79, 'IT 3D', 'BSIT'),
(80, 'IT 3E', 'BSIT'),
(81, 'IT 4A', 'BSIT'),
(82, 'IT 4B', 'BSIT'),
(83, 'IT 4C', 'BSIT'),
(84, 'IT 4D', 'BSIT'),
(85, 'DSA 1A', 'DS'),
(86, 'FOODS 1A', 'BIT'),
(87, 'FOODS 2A', 'BIT'),
(88, 'FOODS 3A', 'BIT'),
(89, 'CT 1A', 'BIT'),
(90, 'CT 2A', 'BIT'),
(91, 'CT 3A', 'BIT'),
(92, 'EXT 1A', 'BIT'),
(93, 'EXT 2A', 'BIT'),
(94, 'EXT 3A', 'BIT'),
(95, 'DT 1A', 'BIT'),
(96, 'DT 2A', 'BIT'),
(97, 'DT 3A', 'BIT');

-- --------------------------------------------------------

--
-- Table structure for table `security_tbl`
--

CREATE TABLE `security_tbl` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_tbl`
--

INSERT INTO `security_tbl` (`id`, `email`, `password`) VALUES
(1, 'security@gmail.com', '$2y$10$2uM5YDMT0bOrOEIGUqTG4evSfjuIBug0CtDGmxYmvNm4TNn.yyNwG');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `studentid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sectionid` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `schoolemail` varchar(255) NOT NULL,
  `rfidtag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`studentid`, `name`, `sectionid`, `department`, `schoolemail`, `rfidtag`) VALUES
('0936111111', 'jian qwe albaro', 'SOCSTUD 1A', 'GATE', 'qwe@gmail.com', 'q12121'),
('123', 'Jian', 'ITMAWD', 'SHS', 'jian@gmail.com', 'C08B1E85'),
('2020501322', 'Mark Oliver Redobaldo Apigo', 'IT 4C', 'BSIT', 'asd', '123asd'),
('456', 'Mark', 'ITMAWD', 'IT', 'zxc@gmail.com', '3E491D85'),
('69', 'Michael Andrei Acuin', 'IT 1A', 'BSIT', 'fgh@qwe', '69');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childtv`
--
ALTER TABLE `childtv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `parent_tbl`
--
ALTER TABLE `parent_tbl`
  ADD PRIMARY KEY (`parentid`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `security_tbl`
--
ALTER TABLE `security_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `childtv`
--
ALTER TABLE `childtv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `parent_tbl`
--
ALTER TABLE `parent_tbl`
  MODIFY `parentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `security_tbl`
--
ALTER TABLE `security_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
