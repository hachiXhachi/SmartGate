-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 06:45 PM
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
  `time_out` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_tbl`
--

INSERT INTO `attendance_tbl` (`id`, `student_id`, `date`, `time_in`, `time_out`, `section`) VALUES
(1, '2020501322', '9-26-2023', '4:09PM', '5:09PM', 'BE 3A'),
(2, '123', '9-26-2023', '4:42PM', '5:42PM', 'BEED 2B'),
(3, '123', '9-26-2023', '4:43PM', '5:43PM', '0'),
(4, '456', '9-26-2023', '4:43PM', '7:43PM', '0'),
(5, '2020501322', '9-26-2023', '4:47PM', '6:49PM', '0'),
(6, '2020501322', '9-26-2023', '4:50PM', '6:53PM', '0'),
(7, '123', '10-24-2023', '12:57 PM', '', '0'),
(8, '123', '10-24-2023', '1:00 PM', '', '0'),
(9, '123', '10-24-2023', '1:01 PM', '', '0'),
(10, '123', '10-24-2023', '1:02 PM', '', '0'),
(11, '123', '10-24-2023', '1:33 PM', '', '0'),
(12, '123', '10-24-2023', '1:34 PM', '', '0'),
(13, '123', '10-24-2023', '1:35 PM', '', '0'),
(14, '456', '10-24-2023', '2:14 PM', '', '0'),
(15, '123', '10-24-2023', '2:15 PM', '', '0'),
(16, '123', '10-24-2023', '2:15 PM', '', '0'),
(17, '123', '10-24-2023', '2:15 PM', '', '0'),
(18, '123', '10-24-2023', '2:20 PM', '', '0'),
(19, '123', '10-24-2023', '2:20 PM', '', '0'),
(20, '123', '10-24-2023', '2:20 PM', '', '0'),
(21, '123', '10-24-2023', '2:21 PM', '', '0'),
(22, '123', '10-24-2023', '2:22 PM', '', '0'),
(23, '123', '10-24-2023', '2:22 PM', '', '0'),
(24, '123', '10-24-2023', '2:26 PM', '', '0'),
(25, '123', '10-24-2023', '2:26 PM', '', '0'),
(26, '123', '10-24-2023', '2:40 PM', '', '0'),
(27, '123', '10-24-2023', '2:51 PM', '', '0'),
(28, '123', '10-24-2023', '2:56 PM', '', '0'),
(29, '123', '10-24-2023', '3:04 PM', '', '0'),
(30, '123', '10-24-2023', '3:15 PM', '', '0'),
(31, '123', '10-24-2023', '3:15 PM', '', '0'),
(32, '123', '10-24-2023', '3:16 PM', '', '0'),
(33, '123', '10-24-2023', '3:19 PM', '', '0'),
(34, '123', '10-24-2023', '3:22 PM', '', '0'),
(35, '456', '10-24-2023', '3:26 PM', '', '0'),
(36, '123', '10-24-2023', '3:33 PM', '', '0'),
(37, '123', '10-24-2023', '3:33 PM', '', '0'),
(38, '123', '10-24-2023', '3:34 PM', '', '0'),
(39, '456', '10-24-2023', '3:34 PM', '', '0'),
(40, '123', '10-24-2023', '3:36 PM', '', '0'),
(41, '456', '10-24-2023', '3:37 PM', '', '0'),
(42, '456', '10-24-2023', '3:45 PM', '', '0'),
(43, '456', '10-24-2023', '3:45 PM', '', '0'),
(44, '123', '10-24-2023', '5:05 PM', '', '0'),
(45, '123', '10-24-2023', '5:05 PM', '', '0'),
(46, '123', '10-24-2023', '5:05 PM', '', '0'),
(47, '123', '10-24-2023', '5:11 PM', '', '0'),
(48, '123', '10-24-2023', '5:12 PM', '', '0'),
(49, '123', '10-24-2023', '5:12 PM', '', '0'),
(50, '123', '10-24-2023', '5:13 PM', '', '0'),
(51, '123', '10-24-2023', '5:13 PM', '', '0'),
(52, '456', '10-24-2023', '5:15 PM', '', '0'),
(53, '456', '10-24-2023', '5:15 PM', '', '0'),
(54, '123', '10-24-2023', '5:16 PM', '', '0'),
(55, '123', '10-24-2023', '5:16 PM', '', '0'),
(56, '123', '10-24-2023', '5:18 PM', '', '0'),
(57, '123', '10-24-2023', '5:22 PM', '', '0'),
(58, '123', '10-24-2023', '5:22 PM', '', '0'),
(59, '123', '10-24-2023', '5:23 PM', '', '0'),
(60, '123', '10-24-2023', '5:23 PM', '', '0'),
(61, '123', '10-24-2023', '5:25 PM', '', '0'),
(62, '123', '10-24-2023', '5:25 PM', '', '0'),
(63, '123', '10-24-2023', '5:26 PM', '', '0'),
(64, '123', '10-24-2023', '5:27 PM', '', '0'),
(65, '123', '10-24-2023', '5:31 PM', '', '0'),
(66, '123', '10-24-2023', '5:34 PM', '', '0'),
(67, '123', '10-24-2023', '5:38 PM', '', '0'),
(68, '123', '10-24-2023', '5:39 PM', '', '0'),
(69, '123', '10-24-2023', '5:40 PM', '', '0'),
(70, '123', '10-24-2023', '5:41 PM', '', '0'),
(71, '123', '10-24-2023', '5:42 PM', '', '0'),
(72, '123', '10-24-2023', '5:42 PM', '', '0'),
(73, '123', '10-24-2023', '5:43 PM', '', '0'),
(74, '123', '10-24-2023', '5:44 PM', '', '0'),
(75, '123', '10-24-2023', '5:48 PM', '', '0'),
(76, '456', '10-24-2023', '5:56 PM', '', '0'),
(77, '456', '10-24-2023', '5:56 PM', '', '0'),
(78, '123', '10-24-2023', '5:56 PM', '', '0'),
(79, '123', '10-24-2023', '5:57 PM', '', '0'),
(80, '123', '10-24-2023', '6:01 PM', '', '0'),
(81, '123', '10-24-2023', '6:01 PM', '', '0'),
(82, '123', '10-24-2023', '6:01 PM', '', '0'),
(83, '123', '10-24-2023', '6:01 PM', '', '0'),
(84, '123', '10-24-2023', '6:02 PM', '', '0'),
(85, '123', '10-24-2023', '6:02 PM', '', '0'),
(86, '123', '10-24-2023', '6:02 PM', '', '0'),
(87, '123', '10-24-2023', '6:03 PM', '', '0'),
(88, '123', '10-24-2023', '6:03 PM', '', '0'),
(89, '123', '10-24-2023', '6:03 PM', '', '0'),
(90, '123', '10-24-2023', '6:05 PM', '', '0'),
(91, '123', '10-24-2023', '6:05 PM', '', '0'),
(92, '123', '10-24-2023', '6:05 PM', '', '0'),
(93, '123', '10-24-2023', '6:13 PM', '', '0'),
(94, '123', '10-24-2023', '6:14 PM', '', '0'),
(95, '123', '10-24-2023', '6:15 PM', '', '0'),
(96, '123', '10-24-2023', '6:33 PM', '', '0'),
(97, '123', '10-24-2023', '6:33 PM', '', '0'),
(98, '123', '10-24-2023', '6:34 PM', '', '0'),
(99, '123', '10-24-2023', '6:34 PM', '', '0'),
(100, '123', '10-24-2023', '6:34 PM', '', '0'),
(101, '123', '10-24-2023', '6:35 PM', '', '0'),
(102, '123', '10-24-2023', '6:35 PM', '', '0'),
(103, '123', '10-24-2023', '6:36 PM', '', '0'),
(104, '123', '10-24-2023', '6:37 PM', '', '0'),
(105, '123', '10-24-2023', '6:38 PM', '', '0'),
(106, '123', '10-24-2023', '6:41 PM', '', '0'),
(107, '123', '10-24-2023', '6:42 PM', '', '0'),
(108, '123', '10-24-2023', '6:42 PM', '', '0'),
(109, '123', '10-24-2023', '6:43 PM', '', '0'),
(110, '123', '10-24-2023', '6:46 PM', '', '0'),
(111, '123', '10-24-2023', '6:47 PM', '', '0'),
(112, '123', '10-24-2023', '6:47 PM', '', '0'),
(113, '123', '10-24-2023', '6:53 PM', '', '0'),
(114, '123', '10-24-2023', '6:53 PM', '', '0'),
(115, '123', '10-24-2023', '7:02 PM', '', '0'),
(116, '123', '10-24-2023', '7:04 PM', '', '0'),
(117, '123', '10-24-2023', '7:05 PM', '', '0'),
(118, '123', '10-24-2023', '7:06 PM', '', '0'),
(119, '123', '10-24-2023', '7:06 PM', '', '0'),
(120, '123', '10-24-2023', '7:06 PM', '', '0'),
(121, '123', '10-24-2023', '7:07 PM', '', '0'),
(122, '123', '10-24-2023', '7:09 PM', '', '0'),
(123, '123', '10-24-2023', '7:09 PM', '', '0'),
(124, '123', '10-24-2023', '7:14 PM', '', '0'),
(125, '123', '10-24-2023', '7:15 PM', '', '0'),
(126, '123', '10-24-2023', '7:23 PM', '', '0'),
(127, '456', '10-24-2023', '7:23 PM', '', '0'),
(128, '123', '10-24-2023', '7:30 PM', '', '0'),
(129, '123', '10-24-2023', '7:30 PM', '', '0'),
(130, '123', '10-24-2023', '7:31 PM', '', '0'),
(131, '123', '10-24-2023', '7:33 PM', '', '0'),
(132, '123', '10-24-2023', '7:33 PM', '', '0'),
(133, '123', '10-24-2023', '7:40 PM', '', '0'),
(134, '123', '10-24-2023', '7:47 PM', '', '0'),
(135, '123', '10-24-2023', '7:52 PM', '', '0'),
(136, '123', '10-24-2023', '7:53 PM', '', '0'),
(137, '123', '10-24-2023', '8:05 PM', '', '0'),
(138, '123', '10-24-2023', '8:06 PM', '', '0'),
(139, '123', '10-24-2023', '8:28 PM', '', '0'),
(140, '456', '10-24-2023', '8:32 PM', '', '0'),
(141, '123', '10-24-2023', '8:33 PM', '', '0'),
(142, '123', '10-24-2023', '8:33 PM', '', '0'),
(143, '123', '10-24-2023', '8:34 PM', '', '0'),
(144, '123', '10-24-2023', '8:36 PM', '', '0'),
(145, '456', '10-24-2023', '8:36 PM', '', '0'),
(146, '456', '10-24-2023', '8:39 PM', '', '0'),
(147, '123', '10-24-2023', '8:39 PM', '', '0'),
(148, '123', '10-24-2023', '8:44 PM', '', '0'),
(149, '456', '10-24-2023', '8:45 PM', '', '0'),
(150, '456', '10-24-2023', '8:52 PM', '', '0'),
(151, '456', '10-24-2023', '8:56 PM', '', '0'),
(152, '456', '10-24-2023', '9:02 PM', '', '0'),
(153, '123', '10-24-2023', '9:02 PM', '', '0'),
(154, '123', '10-24-2023', '9:06 PM', '', '0'),
(155, '123', '10-24-2023', '9:08 PM', '', '0'),
(156, '456', '10-24-2023', '9:09 PM', '', '0'),
(157, '456', '10-24-2023', '9:11 PM', '', '0'),
(158, '456', '10-24-2023', '9:12 PM', '', '0'),
(159, '456', '10-24-2023', '9:14 PM', '', '0'),
(160, '456', '10-24-2023', '9:19 PM', '', '0'),
(161, '456', '10-24-2023', '9:19 PM', '', '0'),
(162, '456', '10-24-2023', '9:20 PM', '', '0'),
(163, '456', '10-24-2023', '9:25 PM', '', '0'),
(164, '456', '10-24-2023', '9:28 PM', '', '0'),
(165, '456', '10-24-2023', '9:33 PM', '', '0'),
(166, '456', '10-24-2023', '9:34 PM', '', '0'),
(167, '123', '10-24-2023', '9:43 PM', '', '0'),
(168, '456', '10-24-2023', '9:44 PM', '', '0'),
(169, '123', '10-24-2023', '9:46 PM', '', '0'),
(170, '456', '10-24-2023', '9:46 PM', '', '0'),
(171, '123', '10-24-2023', '9:46 PM', '', '0'),
(172, '123', '10-24-2023', '9:48 PM', '', '0'),
(173, '123', '10-26-2023', '3:34 PM', '', '0'),
(174, '123', '10-26-2023', '3:34 PM', '', '0'),
(175, '123', '10-26-2023', '3:35 PM', '', '0'),
(176, '123', '10-26-2023', '3:35 PM', '', '0'),
(177, '456', '10-26-2023', '3:37 PM', '', '0'),
(178, '456', '10-26-2023', '3:38 PM', '', '0'),
(179, '123', '10-26-2023', '3:39 PM', '', '0'),
(180, '456', '10-26-2023', '3:40 PM', '', '0'),
(181, '123', '10-26-2023', '3:41 PM', '', '0'),
(182, '456', '10-26-2023', '4:23 PM', '', '0'),
(183, '456', '10-26-2023', '4:23 PM', '', '0'),
(184, '456', '10-26-2023', '4:24 PM', '', '0'),
(185, '123', '10-26-2023', '4:24 PM', '', '0'),
(186, '123', '10-26-2023', '4:25 PM', '', '0'),
(187, '123', '10-26-2023', '4:25 PM', '', '0'),
(188, '123', '10-26-2023', '4:28 PM', '', '0'),
(189, '123', '10-26-2023', '4:28 PM', '', '0'),
(190, '123', '10-26-2023', '4:29 PM', '', '0'),
(191, '123', '10-26-2023', '4:31 PM', '', '0'),
(192, '123', '10-26-2023', '4:31 PM', '', '0'),
(193, '123', '10-26-2023', '4:32 PM', '', '0'),
(194, '123', '10-26-2023', '4:32 PM', '', '0'),
(195, '123', '10-26-2023', '4:33 PM', '', '0'),
(196, '123', '10-26-2023', '4:35 PM', '', '0'),
(197, '456', '10-26-2023', '5:05 PM', '', '0'),
(198, '123', '10-26-2023', '5:05 PM', '', '0');

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
(14, 10, 456),
(15, 11, 0),
(16, 12, 0),
(17, 13, 0),
(18, 14, 0),
(19, 15, 0),
(20, 15, 0),
(21, 15, 0),
(22, 15, 0),
(23, 19, 0),
(24, 19, 0),
(25, 21, 0),
(26, 22, 0),
(27, 23, 0),
(28, 24, 0),
(29, 25, 0),
(30, 26, 0),
(31, 27, 0),
(32, 28, 0),
(33, 29, 0),
(34, 30, 0),
(35, 31, 0),
(36, 32, 0),
(37, 33, 0),
(38, 34, 0),
(39, 35, 0);

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_tbl`
--

INSERT INTO `parent_tbl` (`parentid`, `email`, `name`, `password`) VALUES
(7, 'apigoparent@gmail.com', 'Mark R. Apigo', '$2y$10$3e7Mz29FzT0UZsOkCxmDQ.ChRH7mj8UlRDKjig2BkU.lr1G/XX/T2'),
(8, 'acuinparent@gmail.com', 'Papa ni Maykel Acuin', '$2y$10$8to3EwvNuEftt4w1bdAPvunXmiMDpMjGVnAk.qL7b4l2jqe2huRie'),
(10, 'albaroparent@gmail.com', 'Papa ni Jian Albaro', '$2y$10$PfhSMYPUV1twDsivgGJGTeP07wrwMTOnEi3hsQ4CXAACTEfVNST.e'),
(12, 'tilanparent@gmail.com', 'Mama ni Tilan', '$2y$10$ZNlHOesZFjMZvSDUurd2uueY8FrK9/hAJIYAWMqZGX95qF9OIpDIK'),
(35, 'jiankyle69@gmail.com', 'jian qwe albaro', '$2y$10$guPIm6tR2UT7rYs.xas9kuDoSPmc85YUycf6W5ls1NuGeaUhOhajy');

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
(66, 'IT1A', 'BSIT'),
(67, 'IT1B', 'BSIT'),
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
('2020501322', 'Mark Oliver Redobaldo Apigo', 'IT4C', 'BSIT', 'asd', '123asd'),
('456', 'Mark', 'ITMAWD', 'IT', 'zxc@gmail.com', '3E491D85'),
('69', 'Michael Andrei Acuin', 'IT1A', 'BSIT', 'fgh@qwe', '69');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `childtv`
--
ALTER TABLE `childtv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `parent_tbl`
--
ALTER TABLE `parent_tbl`
  MODIFY `parentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
