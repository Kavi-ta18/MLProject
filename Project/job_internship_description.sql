-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 03:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_internship_description`
--

CREATE TABLE `job_internship_description` (
  `sno` int(30) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `location` varchar(60) NOT NULL,
  `stipend_amount` varchar(70) NOT NULL,
  `starting_date` date NOT NULL,
  `tenure` int(60) NOT NULL,
  `application_date` date NOT NULL,
  `total_openings` varchar(60) NOT NULL,
  `about_company` varchar(100) NOT NULL,
  `about_role` varchar(50) NOT NULL,
  `skills_required` varchar(50) NOT NULL,
  `eligibility_criteria` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_internship_description`
--

INSERT INTO `job_internship_description` (`sno`, `company_name`, `role`, `location`, `stipend_amount`, `starting_date`, `tenure`, `application_date`, `total_openings`, `about_company`, `about_role`, `skills_required`, `eligibility_criteria`) VALUES
(1, '', '', '', '', '0000-00-00', 0, '0000-00-00', '', '', '', '', ''),
(2, 'fskhfksklf', 'd', 'f', '3', '2024-04-13', 0, '2024-04-13', '5', 'g', 'r', 'd', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_internship_description`
--
ALTER TABLE `job_internship_description`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_internship_description`
--
ALTER TABLE `job_internship_description`
  MODIFY `sno` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
