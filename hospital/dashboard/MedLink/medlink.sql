-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2026 at 03:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `blood` varchar(5) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organ_recipients`
--

CREATE TABLE `organ_recipients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `organ_needed` varchar(50) NOT NULL,
  `blood_type` varchar(10) NOT NULL,
  `urgency` varchar(20) DEFAULT 'Normal',
  `status` varchar(20) DEFAULT 'Waiting',
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organ_recipients`
--

INSERT INTO `organ_recipients` (`id`, `name`, `organ_needed`, `blood_type`, `urgency`, `status`, `gender`) VALUES
(1, 'Rahim Uddin', 'Kidney', 'A+', 'Critical', 'Waiting', 'Male'),
(2, 'Karim Mia', 'Liver', 'O+', 'Normal', 'Waiting', 'Male'),
(3, 'Sultana Begum', 'Kidney', 'A+', 'Normal', 'Waiting', 'Female'),
(4, 'Babul Hossain', 'Heart', 'B-', 'Critical', 'Waiting', 'Male'),
(5, 'Nusrat Jahan', 'Lungs', 'AB+', 'Normal', 'Waiting', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `patient_id`, `doctor_id`, `file`, `date`) VALUES
(6, 2, 12, '1767965307.pdf', '2026-01-09'),
(9, 14, 12, '1767989806.pdf', '2026-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `specialty` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `phone`, `gender`, `password`, `role`, `specialty`, `profile_pic`) VALUES
(2, 'jitul', 'Shahariar Jitul', 'shahariarjitul1@gmail.com', '01608248640', 'Male', '1234', 'patient', '', 'default.png'),
(3, 'admin', 'Super Admin', 'admin@medlink.com', '01234567890', 'Male', 'admin', 'admin', '', 'default.png'),
(5, 'shahariar', 'Shahariar Hasan', 'shahariarjitul2@gmail.com', '01608248641', 'Male', '123', 'doctor', 'Cardiology', 'default.png'),
(6, 'Jerin222', 'Faria jerin', 'jerin@gmail.com', '01956400000', 'Female', '123', 'patient', '', 'default.png'),
(9, 'sanin333', 'Sanin', 'sanin@gmail.com', '999999999999999999', 'Female', '333', 'patient', '', 'default.png'),
(10, 'sharmin', 'Rimu', 'ss@gmail.com', '66666666666', 'Female', '111', 'patient', '', 'default.png'),
(12, 'roshninaznin', 'Naznin Akter Roshmny', 'roshninaznin202@gmail.com', '01956494298', 'Female', 'webtech 222', 'doctor', 'Neurologist', 'default.png'),
(14, 'suga', 'suga', 'suga@gmail.com', '01958884298', 'Female', 'suga', 'patient', '', 'default.png'),
(15, 'parkjimin', 'Park Jimin', 'parkjimin@gmail.com', '01754494290', 'Male', 'jimin', 'doctor', 'Dermatology', 'default.png'),
(16, 'jeonwonwoo', 'Jeon Wonwoo', 'jeonwonwoo@gmail.com', '01344494220', 'Male', 'jeon', 'doctor', 'Anesthesiology', 'default.png'),
(20, 'kamal', 'kamal', 'kamal@gmail.com', '01754494291', 'Male', 'kamal', 'patient', '', 'default.png'),
(21, 'applehaque', 'Apple Haque', 'apple@gmail.com', '01754494293', 'Male', 'applehaque222', 'patient', '', 'default.png'),
(22, 'nurjahan', 'Nur jahan', 'nur@gmail.com', '01754494299', 'Female', 'nurjahan222', 'patient', '', 'default.png'),
(23, 'moynaaisha', 'Moyna aisha', 'moyna@gmail.com', '01754494294', 'Female', 'moynaaisha', 'patient', '', 'default.png'),
(24, 'mahirkhan', 'Mahir khan', 'mahir@gmail.com', '01754494221', 'Male', 'mahirkhan202', 'patient', '', 'default.png'),
(25, 'sugasuga', 'Suga suga', 'suga@gmail.com', '01344494220', 'Male', 'sugasuga202', 'patient', '', 'default.png'),
(26, 'rimuislam', 'Rimu islam', 'rimu@gmail.com', '01956494000', 'Female', 'rimuislam202', 'patient', '', 'default.png'),
(27, 'ny', 'n y', 'n@gmail.com', '01956000000', 'Female', 'ny202', 'patient', '', 'default.png'),
(28, 'saad123', 'Saad', 'saad222@gmail.com', '01344494220', 'Male', '123', 'receptionist', '', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organ_recipients`
--
ALTER TABLE `organ_recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_patient` (`patient_id`),
  ADD KEY `fk_doctor` (`doctor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organ_recipients`
--
ALTER TABLE `organ_recipients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
