-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2021 at 05:53 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `code` varchar(10) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `department_id` int(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `code`, `unit`, `department_id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Software Engineering', 'CSC401', '4', 1, '400', '2021-11-12 22:58:52', '2021-11-12 22:58:52'),
(2, 'Computer Modelling and Simulation', 'CSC415', '3', 1, '400', '2021-11-12 22:59:27', '2021-11-12 22:59:27'),
(3, 'Computer Graphics', 'CSC413', '3', 1, '400', '2021-11-12 22:59:42', '2021-11-12 22:59:42'),
(4, 'Project Management', 'CSC417', '3', 1, '400', '2021-11-12 22:59:56', '2021-11-12 23:03:10'),
(5, 'NetCentric Computing', 'CSC423', '3', 1, '400', '2021-11-12 23:00:20', '2021-11-12 23:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `course_regs`
--

CREATE TABLE `course_regs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_regs`
--

INSERT INTO `course_regs` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(3, 1, 5, '2021-11-13 02:44:35', '2021-11-13 02:44:35'),
(4, 1, 4, '2021-11-13 02:44:38', '2021-11-13 02:44:38'),
(5, 1, 3, '2021-11-13 02:44:39', '2021-11-13 02:44:39'),
(6, 1, 2, '2021-11-13 02:44:40', '2021-11-13 02:44:40'),
(7, 1, 1, '2021-11-13 02:44:41', '2021-11-13 02:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `upd`) VALUES
(1, 'Computer Science', '2021-11-12 22:02:33', '2021-11-12 22:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `score` varchar(10) NOT NULL,
  `grade` enum('A','B','C','D','E','F','CD','BC') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `course_id`, `score`, `grade`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '51', 'BC', '2021-11-13 03:25:05', '2021-11-13 03:52:29'),
(2, 1, 2, '42', 'C', '2021-11-13 03:25:05', '2021-11-13 03:52:29'),
(3, 1, 3, '60', 'B', '2021-11-13 03:25:05', '2021-11-13 03:52:29'),
(4, 1, 4, '63', 'B', '2021-11-13 03:25:05', '2021-11-13 03:25:05'),
(11, 1, 5, '30', 'CD', '2021-11-13 03:32:26', '2021-11-13 03:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `matric_no` varchar(20) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `type` enum('user','admin') NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `matric_no`, `phone`, `type`, `department_id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'test user', 'test@user.com', '$2y$10$TgvokuBuMOZY8SODyfJ0v.ZgaSSoDco4lLmyCpV1j6a7jOpN2yNyu', 'SCH/CSC/001', '0900000000', 'user', 1, '400', '2021-11-12 23:14:59', '2021-11-12 23:14:59'),
(2, 'test admin', 'test@admin.com', '$2y$10$TgvokuBuMOZY8SODyfJ0v.ZgaSSoDco4lLmyCpV1j6a7jOpN2yNyu', '', '0900000000', 'admin', NULL, '', '2021-11-12 23:14:59', '2021-11-13 03:57:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_regs`
--
ALTER TABLE `course_regs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
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
-- AUTO_INCREMENT for table `course_regs`
--
ALTER TABLE `course_regs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
