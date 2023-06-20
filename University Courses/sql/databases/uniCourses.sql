-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2023 at 11:03 AM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cysm019_assignment_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `course_code` varchar(10) DEFAULT NULL,
  `course_level` varchar(20) DEFAULT NULL,
  `tuition_fees` int NOT NULL,
  `students_enrolled` int DEFAULT NULL,
  `international_students` int DEFAULT NULL,
  `local_students` int DEFAULT NULL,
  `starting_date` text,
  `course_duration` int DEFAULT NULL,
  `course_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `course_code`, `course_level`, `tuition_fees`, `students_enrolled`, `international_students`, `local_students`, `starting_date`, `course_duration`, `course_location`) VALUES
(24, 'International Accounting (Top-Up) BSc (Hons)', 'N491', 'Undergraduate', 9250, 276, 98, 178, '2023-09', 3, 'Waterside'),
(25, 'Fine Art BA (Hons)', 'W101', 'Undergraduate', 9250, 123, 76, 47, '2024-09', 4, 'Development Hub (Waterside)'),
(26, 'Biochemistry BSc (Hons)', 'C701', 'Undergraduate', 9250, 85, 42, 43, '2023-09', 4, 'Waterside'),
(27, 'Computer Science BSc (Hons)', 'I101', 'Undergraduate', 9250, 675, 232, 443, '2023-09', 4, 'Waterside'),
(28, 'History BA (Hons)', 'V102', 'Undergraduate', 9250, 79, 45, 34, '2023-09', 4, 'Waterside'),
(29, 'Multimedia Journalism BA (Hons)', 'P501', 'Undergraduate', 9250, 188, 134, 54, '2023-09', 4, 'Waterside'),
(30, 'Advertising & Digital Marketing BA (Hons)', 'N561', 'Undergraduate', 9250, 154, 56, 98, '2023-09', 4, 'Waterside'),
(31, 'Business Management BA (Hons)', 'N125', 'Undergraduate', 9250, 145, 57, 88, '2023-09', 4, 'Waterside'),
(32, 'Paramedic Science BSc (Hons)', 'B950', 'Undergraduate', 9250, 113, 46, 67, '2023-09', 3, 'Waterside'),
(33, 'Electronics And Computer Engineering BEng (Hons)', 'H601', 'Undergraduate', 9250, 116, 45, 71, '2023-09', 4, 'Waterside'),
(40, 'Test Course 1', 'TC101', 'Undergraduate', 10000, 68, 34, 34, '2023-12', 3, 'Waterside');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `module_code` varchar(30) DEFAULT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `module_credits` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `course_code`, `module_code`, `module_name`, `module_credits`) VALUES
(2, 'N561', 'MKT1001', 'Foundations Of Marketing', 20),
(3, 'N561', 'MKT1002', 'Introduction To Marketing Communications', 20),
(4, 'N561', 'MKT1018', 'Foundations Of Advertising Media', 20),
(5, 'N561', 'MKT1029', 'Digital Marketing Essentials', 20),
(6, 'N561', 'MKT1030', 'Understanding Consumers', 20),
(7, 'N561', 'MKT1043', 'Professional Skills For Marketing Practice', 20),
(8, 'N561', 'MKT3036', 'Advertising Consultancy Project', 40),
(9, 'C701', 'SLS1013', 'Biochemistry And Cell Biology', 20),
(10, 'C701', 'SLS1019', 'Introduction To Microbiology', 20),
(11, 'C701', 'SLS1020', 'Genetics And Molecular Biology', 20),
(12, 'C701', 'SLS1035', 'Anatomy And Physiology', 20),
(13, 'C701', 'SLS1050', 'Biochemical Skills', 20),
(14, 'C701', 'SLS1051', 'Foundations Of Chemistry', 20),
(15, 'C701', 'SLS4013', 'Biochemistry Dissertation', 40),
(16, 'N125', 'ACC1900', 'Finance And Financial Systems', 20),
(17, 'N125', 'BUS1900', 'Global Business In Context', 30),
(18, 'N125', 'BUS1901', 'The Digital Professional', 20),
(19, 'N125', 'BUS1902', 'Work, Business And Change', 30),
(20, 'N125', 'MKT1900', 'Consumers, Markets And Entrepreneurs', 20),
(22, 'N125', 'BUS2900', 'Research, Trends And Professional Directions', 30),
(23, 'N125', 'BUS4001', 'Business Dissertation', 40),
(24, 'I101', 'CS100', 'Computer Systems', 20),
(25, 'I101', 'CS101', 'Software Engineering Fundamentals', 20),
(26, 'I101', 'CS102', 'Mathematics For Computer Science', 20),
(27, 'I101', 'CS103', 'Web Development', 20),
(28, 'I101', 'CS104', 'Problem Solving & Programming', 20),
(31, 'I101', 'CS105', 'Operating Systems', 20),
(32, 'I101', 'CS106', 'Computer Science Dissertation', 40),
(33, 'H601', 'CSY1020', 'Problem Solving And Programming', 20),
(34, 'H601', 'CSY1043', 'Fundamentals Of Computing Systems', 20),
(35, 'H601', 'ENG1048', 'Engineering Industry Practice', 20),
(36, 'H601', 'ENG1050', 'Electrical And Electronic Principles', 20),
(37, 'H601', 'ENG1051', 'Mathematics For Engineers', 20),
(38, 'H601', 'ENG1070', 'Electronic Engineering Practice', 20),
(39, 'W101', 'ART1013', 'Introduction To Media Practice', 40),
(40, 'W101', 'ART1033', 'Extended Studio Practice And Context', 40),
(41, 'W101', 'ART1045', 'Understanding The Visual', 10),
(42, 'W101', 'ART1046', 'Art Today: Theories, Contexts And Methods', 10),
(43, 'W101', 'ART1047', 'Drawing As Fine Art Practice', 10),
(44, 'W101', 'ART1048', 'Creative Responses To Drawing', 10),
(45, 'W101', 'ART4013', 'Practice Exhibition (Fine Art)', 80),
(46, 'V102', 'HIS1015', 'Blood And Iron: Europe, 1815-1914', 20),
(47, 'V102', 'HIS1021', 'Themes And Perspectives In History', 20),
(48, 'V102', 'HIS1023', 'Health And Healers: Histories Of Disease And Disability', 20),
(49, 'V102', 'HIS1024', 'The Medieval World, 1200 - 1500', 20),
(50, 'V102', 'HIS1028', 'United States: War & Society, 1610-2020', 20),
(51, 'V102', 'HIS1029', 'The Early Modern World, 1500-1800', 20),
(52, 'V102', 'HIS4001', 'Dissertation', 40),
(53, 'N491', 'ACC3007', 'International Money And Finance', 20),
(54, 'N491', 'ACC3011', 'Financial Strategy', 20),
(55, 'N491', 'ACC3017', 'Corporate Governance', 20),
(56, 'N491', 'ACC3024', 'International Tax Systems', 20),
(57, 'N491', 'ACC3025', 'International Financial Reporting And Analysis', 20),
(58, 'N491', 'ACC4003', 'Accounting Project', 20),
(59, 'P501', 'JOU1021', 'Storytelling For News', 20),
(60, 'P501', 'JOU1022', 'Law And Public Affairs For Journalists', 20),
(61, 'P501', 'JOU1023', 'Reporting Power', 20),
(62, 'P501', 'JOU1024', 'History And Ethics Of Journalism', 20),
(63, 'P501', 'JOU1025', 'Newsgathering Skills', 20),
(64, 'P501', 'JOU1026', 'News Production Skills', 20),
(65, 'P501', 'JOU2018', 'Design Skills For Journalists', 20),
(66, 'B950', 'FHS_IPE20', 'Interprofessional Education (IPE)', 20),
(67, 'B950', 'PSC1009', 'Fundamentals Of Emergency Clinical Care', 40),
(68, 'B950', 'PSC1010', 'Biosciences 1', 30),
(69, 'B950', 'PSC1011', 'Professional Studies For Paramedics', 20),
(70, 'B950', 'PSC1012P', 'Paramedic Practice 1', 30),
(71, 'B950', 'PSC2015', 'Paramedic Clinical Care ', 40),
(72, 'B950', 'PSC4003', 'Practice-Focused Research Project', 40),
(76, 'TC101', 'TCM101', 'Test Course Module 1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('kwahbor', 'cysm019'),
('admin', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_code` (`course_code`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courses` (`course_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `fk_courses` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
