-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 03:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '$2y$10$Ksg/BFMmzxgiqA3vzn601ezHNtubf8rHXB0GvztVDbKoAn34dSRGO');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
(28, 'Forearm'),
(29, 'Legs'),
(30, 'cardio'),
(31, 'ABS');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `password`) VALUES
(18, 'Sean', '$2y$10$DdH/flqB2W/RtNzX7.FIjOv65.9o1X0vNulVx/BbQHZBWgScX1tKe'),
(38, 'Enzo', '$2y$10$SlRiJ0YpD8V1o/dMcAkLzerV20VH/XdkERn11cTbbC0.P4r3F9hoO');

-- --------------------------------------------------------

--
-- Table structure for table `memberstoclass`
--

CREATE TABLE `memberstoclass` (
  `id` int(11) NOT NULL,
  `membersid` int(11) NOT NULL,
  `classid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberstoclass`
--

INSERT INTO `memberstoclass` (`id`, `membersid`, `classid`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 3),
(5, 4, 4),
(6, 4, 3),
(7, 5, 13),
(8, 5, 14),
(9, 5, 15),
(10, 5, 17),
(11, 5, 18),
(12, 5, 8),
(13, 5, 14),
(14, 7, 19),
(15, 8, 20),
(16, 9, 21),
(17, 10, 22),
(18, 10, 23),
(19, 5, 24),
(20, 5, 25),
(21, 10, 26),
(22, 5, 27),
(23, 5, 28),
(24, 5, 29),
(25, 5, 30),
(26, 5, 31),
(27, 12, 28),
(28, 12, 29),
(29, 12, 30),
(30, 12, 31),
(31, 5, 32),
(32, 12, 32),
(33, 21, 38),
(34, 18, 39),
(35, 36, 39);

-- --------------------------------------------------------

--
-- Table structure for table `memberstoroutine`
--

CREATE TABLE `memberstoroutine` (
  `id` int(11) NOT NULL,
  `membersid` int(11) NOT NULL,
  `routineid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberstoroutine`
--

INSERT INTO `memberstoroutine` (`id`, `membersid`, `routineid`) VALUES
(1, 4, 3),
(2, 4, 3),
(3, 4, 3),
(4, 6, 14),
(5, 5, 15),
(6, 5, 16),
(7, 5, 18),
(8, 5, 21),
(9, 5, 22),
(10, 12, 22),
(11, 5, 23),
(12, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `name`) VALUES
(25, 'FULL BODY'),
(26, 'CHEST AND BACK'),
(30, 'Hamstrings');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `password`) VALUES
(41, 'staff', '$2y$10$MXqiBs2F65mqrhpPFX5QN.VJdx7cPGlQcpyo6x.Jm6sEN3Kd1tveq');

-- --------------------------------------------------------

--
-- Table structure for table `stafftoclass`
--

CREATE TABLE `stafftoclass` (
  `id` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `classid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `id` int(11) NOT NULL,
  `exercise` varchar(200) NOT NULL,
  `equipment` varchar(200) NOT NULL,
  `sets` varchar(200) NOT NULL,
  `reps` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`id`, `exercise`, `equipment`, `sets`, `reps`) VALUES
(26, 'admin', '	 Adjustable cable machine, lat pulldown bar', '3', '8 ,10,12'),
(27, 'staff', 'Dumbbells', '3', '8');

-- --------------------------------------------------------

--
-- Table structure for table `workoutmembers`
--

CREATE TABLE `workoutmembers` (
  `id` int(11) NOT NULL,
  `membersid` int(11) NOT NULL,
  `workoutid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workoutmembers`
--

INSERT INTO `workoutmembers` (`id`, `membersid`, `workoutid`) VALUES
(1, 36, 1),
(2, 36, 10),
(3, 37, 10),
(4, 37, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberstoclass`
--
ALTER TABLE `memberstoclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberstoroutine`
--
ALTER TABLE `memberstoroutine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stafftoclass`
--
ALTER TABLE `stafftoclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workoutmembers`
--
ALTER TABLE `workoutmembers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `memberstoclass`
--
ALTER TABLE `memberstoclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `memberstoroutine`
--
ALTER TABLE `memberstoroutine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `stafftoclass`
--
ALTER TABLE `stafftoclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `workoutmembers`
--
ALTER TABLE `workoutmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
