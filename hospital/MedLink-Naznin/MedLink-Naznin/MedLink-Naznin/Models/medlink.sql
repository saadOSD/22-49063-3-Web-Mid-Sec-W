-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2026 at 04:01 PM
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
-- Database: `medlink`
--

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
(1, 'Rahim Uddin', 'Kidney', 'A+', 'Critical', 'Matched', 'Male'),
(2, 'Karim Mia', 'Liver', 'O+', 'Normal', 'Waiting', 'Male'),
(3, 'Sultana Begum', 'Kidney', 'A+', 'Normal', 'Waiting', 'Female'),
(4, ' Md Babul Hossain', 'Kidney', 'A+', 'Critical', 'Waiting', 'Male'),
(5, 'Nusrat Jahan', 'Heart', 'AB+', 'Critical', 'Waiting', 'Male');

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
(6, 'kamrul', 'kamrul hasan', 'kamrulhasan@gmail.com', '01608248642', 'Male', '123', 'patient', '', '1767622988.jpg');

------------------------------------------------------------

-- Table structure for table `reports`


CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    file VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    FOREIGN KEY (patient_id) REFERENCES users(id),
    FOREIGN KEY (doctor_id) REFERENCES users(id)
);

-- Dumping data for table `users`

INSERT INTO reports (patient_id, file, date) 
VALUES (2, 'test.pdf', CURDATE());


-- Indexes for dumped tables
--

--
-- Indexes for table `organ_recipients`
--
ALTER TABLE `organ_recipients`
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
-- AUTO_INCREMENT for table `organ_recipients`
--
ALTER TABLE `organ_recipients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
