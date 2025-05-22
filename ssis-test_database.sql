-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-ssis-test.alwaysdata.net
-- Generation Time: May 22, 2025 at 10:49 AM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssis-test_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `disabled_student`
--

CREATE TABLE `disabled_student` (
  `Disabled_Student_Id` bigint(20) NOT NULL,
  `Have_Special_Condition` int(2) DEFAULT NULL,
  `Have_Assistive_Tech` int(2) DEFAULT NULL,
  `Special_Condition` varchar(50) DEFAULT NULL,
  `Assistive_Tech` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disabled_student`
--

INSERT INTO `disabled_student` (`Disabled_Student_Id`, `Have_Special_Condition`, `Have_Assistive_Tech`, `Special_Condition`, `Assistive_Tech`) VALUES
(7, 1, 1, 'Blind', 'Glasses'),
(8, NULL, NULL, '', ''),
(9, 0, 0, 'ASDVGSDG', 'SADGSDZHXD'),
(10, 0, 0, 'ASDVGSDG', 'SADGSDZHXD'),
(11, 0, 0, 'rysr', 'usrtust'),
(12, 0, 0, 'qwqwqwq', 'qwqqwqwqe'),
(13, 0, 0, 'qwqwqwq', 'qwqqwqwqe'),
(14, 0, 0, 'qwqwqwq', 'qwqqwqwqe'),
(15, 0, 0, 'Blind', 'Glasses'),
(16, 0, 0, 'Blind', 'Glasses'),
(17, 0, 0, 'Blind', 'Glasses'),
(49, 0, 0, 'asdf', 'dfas'),
(50, 0, 0, 'asdf', 'Hearing aid'),
(51, 0, 0, 'Deaf', 'Hearing aid'),
(52, 0, 0, 'Blind', 'hearing aid'),
(53, 0, 0, 'Deaf', 'Hearing aid'),
(54, 1, 1, 'Deaf', 'Hearing aid'),
(56, 0, 0, '', ''),
(57, 0, 0, '', ''),
(59, 1, 1, 'Deaf', 'Hearing aid'),
(60, 0, 0, '', ''),
(61, 0, 0, '', ''),
(62, 0, 0, '', ''),
(63, 0, 0, '', ''),
(64, 1, 1, 'Blind', 'Canes'),
(65, 1, 1, 'Blind', 'Canes');

-- --------------------------------------------------------

--
-- Table structure for table `educational_background`
--

CREATE TABLE `educational_background` (
  `Educational_Background_Id` bigint(20) NOT NULL,
  `Last_School_Attended` varchar(50) DEFAULT NULL,
  `School_Id` int(11) DEFAULT NULL,
  `School_Address` varchar(100) DEFAULT NULL,
  `School_Type` varchar(50) DEFAULT NULL,
  `Initial_School_Choice` varchar(50) DEFAULT NULL,
  `Initial_School_Id` int(11) DEFAULT NULL,
  `Initial_School_Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_background`
--

INSERT INTO `educational_background` (`Educational_Background_Id`, `Last_School_Attended`, `School_Id`, `School_Address`, `School_Type`, `Initial_School_Choice`, `Initial_School_Id`, `Initial_School_Address`) VALUES
(7, 'South II Elementary School', 134123, '32 Edano Street Lucena City', 'Private', 'South II Elementary School', 134123, '32 Edano Street Lucena City'),
(8, 'Holy Rosary Catholic School', 10101003, 'Cotta, Lucena City', 'private', 'Holy Rosary Catholic School', 10101010, 'Cotta, Lucena City'),
(9, 'Holy Rosary Catholic School', 10101003, 'Cotta, Lucena City', 'private', 'Holy Rosary Catholic School', 10101010, 'Cotta, Lucena City'),
(10, 'Holy Rosary Catholic School', 10101003, 'Cotta, Lucena City', 'private', 'Holy Rosary Catholic School', 10101010, 'Cotta, Lucena City'),
(11, 'Holy Rosary Catholic School', 10101003, 'Cotta, Lucena City', 'public', 'Holy Rosary Catholic School', 10101010, 'Cotta, Lucena City'),
(12, 'Holy Rosary Catholic School', 10101003, 'Cotta, Lucena City', 'private', 'Holy Rosary Catholic School', 10101010, 'Cotta, Lucena City'),
(13, 'Holy Rosary Catholic School', 10101003, 'Cotta, Lucena City', 'private', 'Holy Rosary Catholic School', 10101010, 'Cotta, Lucena City'),
(14, 'Holy Rosary Catholic School', 10101003, 'Cotta, Lucena City', 'private', 'Holy Rosary Catholic School', 10101010, 'Cotta, Lucena City'),
(15, 'South II Elementary School', 134123, '32 Edano Street Lucena City', 'Private', 'South II Elementary School', 134123, '32 Edano Street Lucena City'),
(16, 'South II Elementary School', 134123, '32 Edano Street Lucena City', 'Private', 'South II Elementary School', 134123, '32 Edano Street Lucena City'),
(17, 'South II Elementary School', 134123, '32 Edano Street Lucena City', 'Private', 'South II Elementary School', 134123, '32 Edano Street Lucena City'),
(49, 'South II elementary school', 0, 'Cotta', 'padfgs', 'South II elementary school', 0, 'Cotta'),
(50, 'South II elementary school', 0, 'Cotta', 'padfgs', 'South II elementary school', 0, 'Cotta'),
(51, 'South II elementary school', 123456, 'Cotta', 'public', 'South II elementary school', 123456, 'Cotta'),
(52, 'South II Elementary School', 134123, '32 Edano Street Lucena City', 'private', 'South II Elementary School', 134123, '32 Edano Street Lucena City'),
(53, 'South II elementary school', 123456, 'Cotta', 'public', 'South II elementary school', 123456, 'Cotta'),
(54, 'South II elementary school', 123456, 'Cotta', 'public', 'South II elementary school', 123456, 'Cotta'),
(56, 'South II elementary school', 123456, 'Cotta', 'public', 'South II elementary school', 123456, 'Cotta'),
(57, 'South II elementary school', 474884, 'Cotta', 'public', 'South II elementary school', 666809, 'Cotta'),
(59, 'South II elementary school', 123456, 'Cotta', 'public', 'South II elementary school', 123456, 'Cotta'),
(60, 'South II elementary school', 123456, 'Cotta', 'public', 'South II elementary school', 123456, 'Cotta'),
(61, 'South II elementary school', 123456, 'Cotta', 'public', 'South II elementary school', 123456, 'Cotta'),
(62, 'South II elementary school', 123456, 'Cotta', 'public', 'South II elementary school', 123456, 'Cotta'),
(63, 'South II elementary school', 123456, 'Cotta', 'public', 'South II elementary school', 123456, 'Cotta'),
(64, 'South II elementary school', 126735, 'Cotta', 'public', 'South II elementary school', 156431, 'Cotta'),
(65, 'South II elementary school', 126735, 'Cotta', 'public', 'South II elementary school', 156431, 'Cotta');

-- --------------------------------------------------------

--
-- Table structure for table `educational_information`
--

CREATE TABLE `educational_information` (
  `Educational_Information_Id` bigint(20) NOT NULL,
  `School_Year_Start` smallint(6) DEFAULT NULL,
  `School_Year_End` smallint(6) DEFAULT NULL,
  `If_LRNN_Returning` varchar(50) DEFAULT NULL,
  `Enrolling_Grade_Level` int(20) DEFAULT NULL,
  `Last_Grade_Level` int(20) DEFAULT NULL,
  `Last_Year_Attended` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_information`
--

INSERT INTO `educational_information` (`Educational_Information_Id`, `School_Year_Start`, `School_Year_End`, `If_LRNN_Returning`, `Enrolling_Grade_Level`, `Last_Grade_Level`, `Last_Year_Attended`) VALUES
(8, 2025, 2026, 'no', 6, 5, 2025),
(9, 2025, 2026, 'on', 3, 2, 2025),
(10, 2025, 2026, 'on', 3, 2, 2025),
(11, 2025, 2026, 'on', 3, 2, 2025),
(12, 2025, 2026, 'on', 3, 2, 2025),
(13, 2025, 2026, 'on', 3, 2, 2025),
(14, 2025, 2026, 'on', 3, 2, 2025),
(15, 2025, 2026, 'on', 3, 2, 2025),
(16, 2025, 2026, 'no', 3, 2, 2025),
(17, 2025, 2026, 'no', 6, 5, 2025),
(18, 2025, 2026, 'no', 8, 7, 2025),
(50, 2025, 2026, 'asdg', 8, 7, 2025),
(51, 2025, 2026, 'asdg', 8, 7, 2025),
(52, 2025, 2026, '', 8, 7, 2025),
(53, 2025, 2026, 'No-LRN', 7, 6, 2025),
(54, 2025, 2026, '', 7, 6, 2025),
(55, 2025, 2026, '', 7, 6, 2025),
(57, 2025, 2026, '', 2, 1, 2025),
(58, 2025, 2026, '', 3, 2, 2025),
(60, 2025, 2026, '', 2, 1, 2025),
(61, 2025, 2026, '', 2, 1, 2025),
(62, 2025, 2026, '', 2, 1, 2025),
(63, 2025, 2026, '', 2, 1, 2025),
(64, 2025, 2026, '1', 2, 1, 2025),
(65, 2025, 2026, '', 2, 1, 2025),
(66, 2025, 2026, '', 2, 1, 2025);

-- --------------------------------------------------------

--
-- Table structure for table `enrollee`
--

CREATE TABLE `enrollee` (
  `Enrollee_Id` bigint(20) NOT NULL,
  `User_Id` bigint(20) DEFAULT NULL,
  `Student_First_Name` varchar(50) NOT NULL,
  `Student_Middle_Name` varchar(50) NOT NULL,
  `Student_Last_Name` varchar(50) NOT NULL,
  `Student_Extension` varchar(50) DEFAULT NULL,
  `Learner_Reference_Number` int(11) DEFAULT NULL,
  `Psa_Number` int(11) DEFAULT NULL,
  `Birth_Date` date DEFAULT NULL,
  `Age` int(20) NOT NULL,
  `Sex` varchar(6) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Native_Language` varchar(50) DEFAULT NULL,
  `If_Cultural` tinyint(4) DEFAULT NULL,
  `Cultural_Group` varchar(50) DEFAULT NULL,
  `Student_Email` varchar(100) DEFAULT 'N/A',
  `Enrollment_Status` int(5) NOT NULL DEFAULT 3,
  `Enrollee_Address_Id` bigint(20) DEFAULT NULL,
  `Educational_Information_Id` bigint(20) DEFAULT NULL,
  `Educational_Background_Id` bigint(20) DEFAULT NULL,
  `Disabled_Student_Id` bigint(20) DEFAULT NULL,
  `Psa_Image_Id` int(11) DEFAULT NULL,
  `Enrolled_At` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollee`
--

INSERT INTO `enrollee` (`Enrollee_Id`, `User_Id`, `Student_First_Name`, `Student_Middle_Name`, `Student_Last_Name`, `Student_Extension`, `Learner_Reference_Number`, `Psa_Number`, `Birth_Date`, `Age`, `Sex`, `Religion`, `Native_Language`, `If_Cultural`, `Cultural_Group`, `Student_Email`, `Enrollment_Status`, `Enrollee_Address_Id`, `Educational_Information_Id`, `Educational_Background_Id`, `Disabled_Student_Id`, `Psa_Image_Id`, `Enrolled_At`) VALUES
(8, NULL, 'Lovely Jane', 'Jimenez', 'Dela Cruz', 'N/A', 2147483647, 2147483647, '2002-07-13', 22, 'Female', 'Iglesia Ni Cristo', 'Tagalog', 0, 'N/A', 'lovelycruz.13@gmail.com', 1, 6, 8, 7, 7, NULL, '2025-05-06 12:54:52'),
(10, 17, 'Nemesio Benedict', '', 'Llorin', 'III', 2147483647, 2147483647, '2025-04-01', 21, 'Male', 'Catholic', 'Tagalog', 0, 'tesrr', 'bllorin12@gmail.com', 1, 11, 13, 12, 12, NULL, '2025-05-06 12:54:52'),
(11, NULL, 'Kenneth Jeffrey', 'Jimenez', 'Alodajo', 'XVI', 2147483647, 2147483647, '2025-03-07', 22, 'Male', 'Catholic', 'Tagalog', 0, 'tesrr', 'kjjj@gmail.com', 1, 12, 14, 13, 13, NULL, '2025-05-06 12:54:52'),
(12, NULL, 'Jearard Iyad', 'Pa', 'David', 'Jorrdabid', 2147483647, 2147483647, '2025-01-03', 20, 'Male', 'Catholic', 'Tagalog', 0, 'tesrr', 'iyadpajorrdabid@gmail.com', 4, 13, 15, 14, 14, NULL, '2025-05-06 12:54:52'),
(13, 17, 'Lovely Jane', 'Jimenez', 'Dela Cruz', 'N/A', 2147483647, 2147483647, '0000-00-00', 23465, 'Male', 'Catholic', 'Tagalog', 0, 'N/A', 'alojadokeneth@gmail.com', 4, 14, 16, 15, 15, NULL, '2025-05-06 12:54:52'),
(14, 17, 'Lovely Jane', 'Jimenez', 'Dela Cruz', 'N/A', 2147483647, 2147483647, '0000-00-00', 23465, 'Male', 'Catholic', 'Tagalog', 0, 'N/A', 'alojadokeneth@gmail.com', 3, 15, 17, 16, 16, NULL, '2025-05-06 12:54:52'),
(15, 17, 'Lovely Jane', 'Jimenez', 'Dela Cruz', 'N/A', 2147483647, 2147483647, '0000-00-00', 22, 'Female', 'Iglesia Ni Cristo', 'Tagalog', 0, 'N/A', 'lovelycruz.13@gmail.com', 2, 16, 18, 17, 17, NULL, '2025-05-06 12:54:52'),
(38, 17, 'Jearard', 'Paderes', 'David', 'n/a', 2147483647, 12423246, '0000-00-00', 21, 'Male', 'Roman Catholic', 'Tagalog', 0, 'adagadag', 'davidjearard1@gmail.com', 1, 48, 50, 49, 49, 1, '2025-05-06 12:54:52'),
(39, NULL, 'Ben', 'N/a', 'Llorin', '', 2147483647, 12423246, '0000-00-00', 22, 'Male', 'Roman Catholic', 'Tagalog', 0, 'adagadag', 'davidjearard1@gmail.com', 2, 49, 51, 50, 50, 2, '2025-05-06 12:54:52'),
(40, 17, 'Jearard', 'Paderes', 'David', 'n/a', 2147483647, 2147483647, '2004-01-01', 21, 'Male', 'Roman Catholic', 'Tagalog', 0, '', 'davidjearard1@gmail.com', 3, 50, 52, 51, 51, 3, '2025-05-06 12:54:52'),
(41, 17, 'Maria Anne', 'Jimenez', 'Alojado', 'N/A', 2147483647, 2147483647, '2003-06-19', 21, 'Male', 'Iglesia', 'Tagalog', 0, '', 'lovelycruz.13@gmail.com', 4, 51, 53, 52, 52, 4, '2025-05-06 12:54:52'),
(42, 17, 'Jearard', 'Paderes', 'David', 'n/a', 2147483647, 2147483647, '2004-01-01', 21, 'Male', 'Roman Catholic', 'Tagalog', 0, '', 'davidjearard1@gmail.com', 1, 52, 54, 53, 53, 5, '2025-05-06 12:54:52'),
(43, 17, 'Jearard', 'Paderes', 'David', 'n/a', 2147483647, 2147483647, '2004-01-01', 21, 'Male', 'Roman Catholic', 'Tagalog', 0, '', 'davidjearard1@gmail.com', 4, 53, 55, 54, 54, 6, '2025-05-06 12:54:52'),
(45, NULL, 'Jearard', 'Paderes', 'David', '', 2147483647, 2147483647, '2014-04-18', 11, 'Male', 'Roman Catholic', 'Tagalog', 0, '', 'Email@gmail.com', 3, 55, 57, 56, 56, 8, '2025-05-18 14:17:07'),
(46, NULL, 'Ben', 'Paderes', 'David', '', 2147483647, 2147483647, '2003-02-12', 22, 'Male', 'Roman Catholic', 'Tagalog', 0, '', 'davidiyad6@gmail.com', 3, 56, 58, 57, 57, 9, '2025-05-18 15:47:18'),
(48, 22, 'Jearard', 'Paderes', 'David', 'n/a', 2147483647, 2147483647, '2004-01-01', 21, 'Male', 'Roman Catholic', 'Tagalog', 0, '', 'davidjearard1@gmail.com', 3, 58, 60, 59, 59, 11, '2025-05-19 04:33:59'),
(49, 22, 'Geraldine', 'Paderes', 'David', 'n/a', 2147483647, 2147483647, '2004-01-26', 21, 'Female', 'Roman Catholic', 'Tagalog', 0, '', 'davidjearard1@gmail.com', 3, 59, 61, 60, 60, 12, '2025-05-19 05:13:30'),
(50, 22, 'Geraldine', 'Paderes', 'David', 'n/a', 2147483647, 2147483647, '2004-01-26', 21, 'Female', 'Roman Catholic', 'Tagalog', 0, '', 'davidjearard1@gmail.com', 3, 60, 62, 61, 61, 13, '2025-05-19 05:15:47'),
(51, 22, 'Geraldine', 'Paderes', 'David', 'n/a', 2147483647, 2147483647, '2004-01-26', 21, 'Female', 'Roman Catholic', 'Tagalog', 0, '', 'davidjearard1@gmail.com', 3, 61, 63, 62, 62, 14, '2025-05-19 05:16:10'),
(52, 22, 'Jearard', 'Paderes', 'David', 'n/a', 2147483647, 2147483647, '2004-01-01', 21, 'Male', 'Roman Catholic', 'Tagalog', 0, '', 'davidjearard1@gmail.com', 3, 62, 64, 63, 63, 15, '2025-05-19 05:30:36'),
(53, 22, 'Jeremiah', 'Paderes', 'David', '', 2147483647, 2147483647, '2014-01-31', 11, 'Female', 'Roman Catholic', 'Tagalog', 0, '', 'dageh@gmail.com', 3, 63, 65, 64, 64, 16, '2025-05-19 05:49:25'),
(54, 22, 'Jeremiah', 'Paderes', 'David', '', 2147483647, 2147483647, '2014-01-31', 11, 'Female', 'Roman Catholic', 'Tagalog', 0, '', 'dageh@gmail.com', 3, 64, 66, 65, 65, 17, '2025-05-19 05:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `enrollee_address`
--

CREATE TABLE `enrollee_address` (
  `Enrollee_Address_Id` bigint(20) NOT NULL,
  `House_Number` bigint(20) DEFAULT NULL,
  `Subd_Name` varchar(50) DEFAULT NULL,
  `Brgy_Name` varchar(50) DEFAULT NULL,
  `Municipality_Name` varchar(50) DEFAULT NULL,
  `Province_Name` varchar(50) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollee_address`
--

INSERT INTO `enrollee_address` (`Enrollee_Address_Id`, `House_Number`, `Subd_Name`, `Brgy_Name`, `Municipality_Name`, `Province_Name`, `Region`) VALUES
(6, 32, 'Talipan', '4', 'Lucena', 'Quezon', '4A'),
(7, 0, 'Purok Pinagisa', 'Barangay Cotta', 'Lucena City', 'Quezon', 'CALABARZON'),
(8, 0, 'Purok Pinagisa', 'Barangay Cotta', 'Lucena City', 'Quezon', 'CALABARZON'),
(9, 0, 'Purok Pinagisa', 'Barangay Cotta', 'Lucena City', 'Quezon', 'CALABARZON'),
(10, 0, 'Purok Pinagisa', 'Barangay Cotta', 'Lucena City', 'Quezon', 'CALABARZON'),
(11, 0, 'Purok Pinagisa', 'Barangay Cotta', 'Lucena City', 'Quezon', 'CALABARZON'),
(12, 0, 'Purok Pinagisa', 'Barangay Cotta', 'Lucena City', 'Quezon', 'CALABARZON'),
(13, 0, 'Purok Pinagisa', 'Barangay Cotta', 'Lucena City', 'Quezon', 'CALABARZON'),
(14, 32, 'Talipan', '4', 'Lucena', 'Quezon', '4A'),
(15, 32, 'Talipan', '4', 'Lucena', 'Quezon', '4A'),
(16, 32, 'Talipan', '4', 'Lucena', 'Quezon', '4A'),
(48, 334, 'sadgdsadga', 'sdgdsfn', 'bnbvnfn', 'zxvxzv', 'nvngj'),
(49, 334, 'sadgdsadga', 'sdgdsfn', 'bnbvnfn', 'zxvxzv', 'nvngj'),
(50, 32, 'Southville', '', '', '', ''),
(51, 32, 'Talipan', 'Barangay 4 (Pob.)', 'City of Lucena', 'Quezon', 'CALABARZON'),
(52, 32, 'Southville', '', '', '', ''),
(53, 32, 'Southville', 'Lusacan', 'Tiaong', 'Quezon', 'CALABARZON'),
(55, 322, 'Southville', 'Lusacan', 'Tiaong', 'Quezon', 'CALABARZON'),
(56, 322, 'Talipan', 'Lower Sinangkapan', 'Tuburan', 'Basilan', 'BARMM'),
(58, 322, 'Balugbug', 'Bataan', 'Sampaloc', 'Quezon', 'CALABARZON'),
(59, 3234, 'Southville', 'Poblacion', 'Ambaguio', 'Nueva Vizcaya', 'Cagayan Valley'),
(60, 3234, 'Southville', 'Poblacion', 'Ambaguio', 'Nueva Vizcaya', 'Cagayan Valley'),
(61, 3234, 'Southville', 'Poblacion', 'Ambaguio', 'Nueva Vizcaya', 'Cagayan Valley'),
(62, 1034, 'West', 'Bulakin II', 'Dolores', 'Quezon', 'CALABARZON'),
(63, 6513, 'Norte', 'Masin Sur', 'Candelaria', 'Quezon', 'CALABARZON'),
(64, 6513, 'Norte', 'Masin Sur', 'Candelaria', 'Quezon', 'CALABARZON');

-- --------------------------------------------------------

--
-- Table structure for table `enrollee_parents`
--

CREATE TABLE `enrollee_parents` (
  `Enrollee_Id` bigint(20) NOT NULL,
  `Parent_Id` bigint(20) NOT NULL,
  `Relationship` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollee_parents`
--

INSERT INTO `enrollee_parents` (`Enrollee_Id`, `Parent_Id`, `Relationship`) VALUES
(8, 16, 'Father'),
(8, 17, 'Mother'),
(8, 18, 'Guardian'),
(10, 31, 'Father'),
(10, 32, 'Mother'),
(10, 33, 'Guardian'),
(11, 34, 'Father'),
(11, 35, 'Mother'),
(11, 36, 'Guardian'),
(12, 37, 'Father'),
(12, 38, 'Mother'),
(12, 39, 'Guardian'),
(13, 40, 'Father'),
(13, 41, 'Mother'),
(13, 42, 'Guardian'),
(14, 43, 'Father'),
(14, 44, 'Mother'),
(14, 45, 'Guardian'),
(15, 46, 'Father'),
(15, 47, 'Mother'),
(15, 48, 'Guardian'),
(38, 142, 'Father'),
(38, 143, 'Mother'),
(38, 144, 'Guardian'),
(39, 145, 'Father'),
(39, 146, 'Mother'),
(39, 147, 'Guardian'),
(40, 148, 'Father'),
(40, 149, 'Mother'),
(40, 150, 'Guardian'),
(41, 151, 'Father'),
(41, 152, 'Mother'),
(41, 153, 'Guardian'),
(42, 154, 'Father'),
(42, 155, 'Mother'),
(42, 156, 'Guardian'),
(43, 157, 'Father'),
(43, 158, 'Mother'),
(43, 159, 'Guardian'),
(45, 163, 'Father'),
(45, 164, 'Mother'),
(45, 165, 'Guardian'),
(46, 166, 'Father'),
(46, 167, 'Mother'),
(46, 168, 'Guardian'),
(48, 172, 'Father'),
(48, 173, 'Mother'),
(48, 174, 'Guardian'),
(49, 175, 'Father'),
(49, 176, 'Mother'),
(49, 177, 'Guardian'),
(50, 178, 'Father'),
(50, 179, 'Mother'),
(50, 180, 'Guardian'),
(51, 181, 'Father'),
(51, 182, 'Mother'),
(51, 183, 'Guardian'),
(52, 184, 'Father'),
(52, 185, 'Mother'),
(52, 186, 'Guardian'),
(53, 187, 'Father'),
(53, 188, 'Mother'),
(53, 189, 'Guardian'),
(54, 190, 'Father'),
(54, 191, 'Mother'),
(54, 192, 'Guardian');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_transactions`
--

CREATE TABLE `enrollment_transactions` (
  `Enrollment_Transaction_Id` bigint(20) NOT NULL,
  `Enrollee_Id` bigint(20) DEFAULT NULL,
  `Transaction_Code` varchar(50) DEFAULT NULL,
  `Staff_Id` int(11) NOT NULL,
  `Reason` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment_transactions`
--

INSERT INTO `enrollment_transactions` (`Enrollment_Transaction_Id`, `Enrollee_Id`, `Transaction_Code`, `Staff_Id`, `Reason`, `Description`, `Created_At`) VALUES
(2, 10, 'F-20250516-1747413440', 29, 'Wrong input', 'egaehahahe', '2025-05-16 16:37:21'),
(3, 10, 'F-20250516-1747413440', 29, 'No input', 'egaehahahe', '2025-05-16 16:37:21'),
(4, 10, 'F-20250516-1747413440', 29, 'Blurred Image', 'egaehahahe', '2025-05-16 16:37:21'),
(6, 42, 'F-20250517-1747447561', 18, 'Blurred Image', 'The psa image sent was not readable', '2025-05-17 02:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `grade_level`
--

CREATE TABLE `grade_level` (
  `Grade_Level_Id` int(20) NOT NULL,
  `Grade_Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_level`
--

INSERT INTO `grade_level` (`Grade_Level_Id`, `Grade_Level`) VALUES
(1, 'Kinder I'),
(2, 'Kinder II'),
(3, 'Grade 1'),
(4, 'Grade 2'),
(5, 'Grade 3'),
(6, 'Grade 4'),
(7, 'Grade 5'),
(8, 'Grade 6');

-- --------------------------------------------------------

--
-- Table structure for table `grade_level_subjects`
--

CREATE TABLE `grade_level_subjects` (
  `Grade_Level_Subject_Id` int(20) NOT NULL,
  `Grade_Level_Id` int(20) NOT NULL,
  `Subject_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_level_subjects`
--

INSERT INTO `grade_level_subjects` (`Grade_Level_Subject_Id`, `Grade_Level_Id`, `Subject_Id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_information`
--

CREATE TABLE `parent_information` (
  `Parent_Id` bigint(20) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Middle_Name` varchar(50) DEFAULT NULL,
  `Parent_Type` varchar(50) DEFAULT NULL,
  `Educational_Attainment` varchar(50) DEFAULT NULL,
  `Contact_Number` varchar(11) DEFAULT NULL,
  `If_4Ps` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_information`
--

INSERT INTO `parent_information` (`Parent_Id`, `First_Name`, `Last_Name`, `Middle_Name`, `Parent_Type`, `Educational_Attainment`, `Contact_Number`, `If_4Ps`) VALUES
(16, 'Rey', 'Dela Cruz', 'De Vera ', 'Father', 'College', '1345235345', 0),
(17, 'Jeannette', 'Alojado', 'Jimenez', 'Mother', 'College', '00000000000', 0),
(18, 'Aldrin', 'Catubay', 'sdfhsdfg', 'Guardian', 'College', '11111111111', 0),
(19, 'rarara', 'rarara', 'rarara', 'Father', 'rarara', '42563473', 0),
(20, 'lalala', 'lalala', 'lalala', 'Mother', 'lalala', '45634756735', 0),
(21, 'nanana', 'nanana', 'nanana', 'Guardian', 'nanana', '2353w46w456', 0),
(22, 'rarara', 'rarara', 'rarara', 'Father', 'rarara', '42563473', 0),
(23, 'lalala', 'lalala', 'lalala', 'Mother', 'lalala', '45634756735', 0),
(24, 'nanana', 'nanana', 'nanana', 'Guardian', 'nanana', '2353w46w456', 0),
(25, 'rarara', 'rarara', 'rarara', 'Father', 'rarara', '42563473', 0),
(26, 'lalala', 'lalala', 'lalala', 'Mother', 'lalala', '45634756735', 0),
(27, 'nanana', 'nanana', 'nanana', 'Guardian', 'nanana', '2353w46w456', 0),
(28, 'rarara', 'rarara', 'rarara', 'Father', 'rarara', '42563473', 0),
(29, 'lalala', 'lalala', 'lalala', 'Mother', 'lalala', '45634756735', 0),
(30, 'nanana', 'nanana', 'nanana', 'Guardian', 'nanana', '2353w46w456', 0),
(31, 'rarara', 'rarara', 'rarara', 'Father', 'rarara', '42563473', 0),
(32, 'lalala', 'lalala', 'lalala', 'Mother', 'lalala', '45634756735', 0),
(33, 'nanana', 'nanana', 'nanana', 'Guardian', 'nanana', '2353w46w456', 0),
(34, 'rarara', 'rarara', 'rarara', 'Father', 'rarara', '42563473', 0),
(35, 'lalala', 'lalala', 'lalala', 'Mother', 'lalala', '45634756735', 0),
(36, 'nanana', 'nanana', 'nanana', 'Guardian', 'nanana', '2353w46w456', 0),
(37, 'rarara', 'rarara', 'rarara', 'Father', 'rarara', '42563473', 0),
(38, 'lalala', 'lalala', 'lalala', 'Mother', 'lalala', '45634756735', 0),
(39, 'nanana', 'nanana', 'nanana', 'Guardian', 'nanana', '2353w46w456', 0),
(40, 'Rey', 'Dela Cruz', 'De Vera ', 'Father', 'College', '1345235345', 0),
(41, 'Jeannette', 'Alojado', 'Jimenez', 'Mother', 'College', 'N/A', 0),
(42, 'Aldrin', 'Catubay', 'sdfhsdfg', 'Guardian', 'College', '11111111111', 0),
(43, 'Rey', 'Dela Cruz', 'De Vera ', 'Father', 'College', '1345235345', 0),
(44, 'Jeannette', 'Alojado', 'Jimenez', 'Mother', 'College', 'N/A', 0),
(45, 'Aldrin', 'Catubay', 'sdfhsdfg', 'Guardian', 'College', '11111111111', 0),
(46, 'Rey', 'Dela Cruz', 'De Vera ', 'Father', 'College', '1345235345', 0),
(47, 'Jeannette', 'Alojado', 'Jimenez', 'Mother', 'College', 'N/A', 0),
(48, 'Aldrin', 'Catubay', 'sdfhsdfg', 'Guardian', 'College', '11111111111', 0),
(142, 'Gerardo', 'David', 'Cayton', 'Father', 'rjdgngdn', '09231853823', 0),
(143, 'dsabs', 'sfbsbsb', 'bcncgn', 'Mother', 'fnfxnnfx', 'xfnfxnfx', 0),
(144, 'Jearard', 'David', 'Paderes', 'Guardian', 'dcfsfg', '09231853823', 0),
(145, 'Gerardo', 'David', 'Cayton', 'Father', 'rjdgngdn', '09231853823', 0),
(146, 'dsabs', 'sfbsbsb', 'bcncgn', 'Mother', 'fnfxnnfx', 'xfnfxnfx', 0),
(147, 'Jearard', 'David', 'Paderes', 'Guardian', 'dcfsfg', '09231853823', 0),
(148, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(149, '', '', '', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(150, '', '', '', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(151, 'Jefferson', 'Alojado', 'Riano', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '1111111111', 0),
(152, '', '', '', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '2523423452', 0),
(153, '', '', '', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '2523423452', 0),
(154, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(155, 'Jeanilyn', 'David', 'Paderes', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(156, 'Jeanilyn', 'David', 'Paderes', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(157, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(158, 'Jeanilyn', 'David', 'Paderes', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(159, 'Jeanilyn', 'David', 'Paderes', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(163, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(164, 'Jeanilyn', 'David', 'Paderes', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(165, 'Jeanilyn', 'David', 'Paderes', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(166, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(167, 'Jeanilyn', 'David', 'Paderes', 'Mother', 'Nakapagtapos ng Sekundarya', '09231853823', 0),
(168, 'Paul', 'Lavarez', 'Castillejo', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(172, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(173, 'Jeanilyn', 'David', 'Paderes', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(174, 'Jeanilyn', 'David', 'Paderes', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(175, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(176, 'Jeanilyn', 'David', 'Paderes', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(177, 'Jeanilyn', 'David', 'Paderes', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(178, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(179, 'Jeanilyn', 'David', 'Paderes', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(180, 'Jeanilyn', 'David', 'Paderes', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(181, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(182, 'Jeanilyn', 'David', 'Paderes', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(183, 'Jeanilyn', 'David', 'Paderes', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(184, 'Gerardo', 'David', 'Cayton', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(185, 'Jeanilyn', 'David', 'Paderes', 'Mother', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(186, 'Jeanilyn', 'David', 'Paderes', 'Guardian', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(187, 'John', 'David', 'Endura', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(188, 'Wilma', 'David', 'Paderes', 'Mother', 'Nakapagtapos ng Sekundarya', '09236721783', 0),
(189, 'Paul', 'Lavarez', 'Castillejo', 'Guardian', 'Nakatuntong ng Sekundarya', '09231856457', 0),
(190, 'John', 'David', 'Endura', 'Father', 'Nakapag-aral Pagkatapos ng Sekundarya o ng Teknika', '09231853823', 0),
(191, 'Wilma', 'David', 'Paderes', 'Mother', 'Nakapagtapos ng Sekundarya', '09236721783', 0),
(192, 'Paul', 'Lavarez', 'Castillejo', 'Guardian', 'Nakatuntong ng Sekundarya', '09231856457', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Psa_directory`
--

CREATE TABLE `Psa_directory` (
  `Psa_Image_Id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `directory` varchar(255) DEFAULT NULL,
  `Uploaded_At` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Psa_directory`
--

INSERT INTO `Psa_directory` (`Psa_Image_Id`, `filename`, `directory`, `Uploaded_At`) VALUES
(1, '09c37da0-aca9-418a-85b4-aa01ed64a14d.jpg', '../imageUploads/2025/09c37da0-aca9-418a-85b4-aa01ed64a14d.jpg', '2025-04-25 17:45:57'),
(2, '09c37da0-aca9-418a-85b4-aa01ed64a14d.jpg', '../imageUploads/2025/09c37da0-aca9-418a-85b4-aa01ed64a14d.jpg', '2025-05-02 07:29:02'),
(3, '17-1746197167-16a1c2d9d6.jpg', '../imageUploads/2025/17-1746197167-16a1c2d9d6.jpg', '2025-05-02 14:46:10'),
(4, '17-1746201828-088681d139.png', '../imageUploads/2025/17-1746201828-088681d139.png', '2025-05-02 16:03:50'),
(5, '17-1746202677-6ad92694b5.png', '../imageUploads/2025/17-1746202677-6ad92694b5.png', '2025-05-02 16:17:59'),
(6, '17-1746203825-bc4b30e44a.png', '../imageUploads/2025/17-1746203825-bc4b30e44a.png', '2025-05-02 16:37:07'),
(8, '-1747570623-ebceb47633.png', '../imageUploads/2025/-1747570623-ebceb47633.png', '2025-05-18 12:17:06'),
(9, '-1747576035-be0946a013.png', '../imageUploads/2025/-1747576035-be0946a013.png', '2025-05-18 13:47:18'),
(11, '22-1747622036-56cb8ec3c7.png', '../imageUploads/2025/22-1747622036-56cb8ec3c7.png', '2025-05-19 02:33:59'),
(12, '22-1747624407-7e031fb46b.png', '../imageUploads/2025/22-1747624407-7e031fb46b.png', '2025-05-19 03:13:30'),
(13, '22-1747624544-a60fc8d85a.png', '../imageUploads/2025/22-1747624544-a60fc8d85a.png', '2025-05-19 03:15:47'),
(14, '22-1747624567-fd53e1ecb5.png', '../imageUploads/2025/22-1747624567-fd53e1ecb5.png', '2025-05-19 03:16:09'),
(15, '22-1747625433-5daec6e147.png', '../imageUploads/2025/22-1747625433-5daec6e147.png', '2025-05-19 03:30:36'),
(16, '22-1747626563-c5dadbc386.png', '../imageUploads/2025/22-1747626563-c5dadbc386.png', '2025-05-19 03:49:25'),
(17, '22-1747626568-1d5993361e.png', '../imageUploads/2025/22-1747626568-1d5993361e.png', '2025-05-19 03:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `Registration_Id` bigint(20) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Middle_Name` varchar(50) DEFAULT NULL,
  `Contact_Number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`Registration_Id`, `First_Name`, `Last_Name`, `Middle_Name`, `Contact_Number`) VALUES
(87, 'Lovely Jane', 'Dela Cruz', 'Musa', '09946956168'),
(90, 'Arjay', 'Iglesia', 'Di ko alam', '09682298263'),
(117, 'Kenneth', 'Alojado', 'Jimenez ', '09706573096');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `Section_Id` bigint(20) NOT NULL,
  `Section_Name` varchar(50) NOT NULL,
  `Grade_Level_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`Section_Id`, `Section_Name`, `Grade_Level_Id`) VALUES
(1, 'Sampaguita', 1),
(2, 'Gumamela', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `Staff_Id` int(11) NOT NULL,
  `Staff_First_Name` varchar(255) NOT NULL,
  `Staff_Middle_Name` varchar(255) NOT NULL,
  `Staff_Last_Name` varchar(255) NOT NULL,
  `Staff_Address_Id` int(11) DEFAULT NULL,
  `Staff_Identifier_Id` int(11) DEFAULT NULL,
  `Birth_Date` date DEFAULT NULL,
  `Staff_Email` varchar(255) NOT NULL,
  `Staff_Contact_Number` varchar(255) NOT NULL,
  `Staff_Status` int(11) NOT NULL,
  `Staff_Type` int(11) NOT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`Staff_Id`, `Staff_First_Name`, `Staff_Middle_Name`, `Staff_Last_Name`, `Staff_Address_Id`, `Staff_Identifier_Id`, `Birth_Date`, `Staff_Email`, `Staff_Contact_Number`, `Staff_Status`, `Staff_Type`, `Position`, `Timestamp`) VALUES
(18, 'Jefferson', '', 'Alojado', 1, 6, NULL, 'jeffersonalojado@yahoo.com', '09706573096', 2, 1, 'Head Teacher', '2025-05-05 12:10:06'),
(28, 'Lovely Jane', 'Musa', 'Dela Cruz', NULL, NULL, NULL, 'lovelycruz.1317@gmail.com', '09354876649', 1, 2, 'Master Teacher 2', '2025-05-14 19:05:55'),
(29, 'Jearard', 'Paderes', 'David', NULL, 7, NULL, 'davidjearard@gmail.com', '09217687673', 1, 2, 'Teacher 1', '2025-05-14 19:16:00'),
(30, 'Benedict', '', 'Llorin', NULL, NULL, NULL, 'Bllorin21@gmail.com', '09206926714', 3, 2, 'Teacher 4', '2025-05-16 11:39:57'),
(38, 'Kenneth Jeffrey', 'Jimenez', 'Alojado', NULL, NULL, NULL, 'alojadokeneth@gmail.com', '09946956168', 1, 2, NULL, '2025-05-16 12:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `staff_address`
--

CREATE TABLE `staff_address` (
  `Staff_Address_Id` int(11) NOT NULL,
  `House_Number` varchar(255) NOT NULL,
  `Subd_Name` varchar(255) NOT NULL,
  `Brgy_Name` varchar(255) NOT NULL,
  `Municipality_Name` varchar(255) NOT NULL,
  `Province_Name` varchar(255) NOT NULL,
  `Region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_address`
--

INSERT INTO `staff_address` (`Staff_Address_Id`, `House_Number`, `Subd_Name`, `Brgy_Name`, `Municipality_Name`, `Province_Name`, `Region`) VALUES
(1, 'This', 'is', 'a ', 'test', 'for', 'values');

-- --------------------------------------------------------

--
-- Table structure for table `staff_Identifiers`
--

CREATE TABLE `staff_Identifiers` (
  `Staff_Identifier_Id` int(11) NOT NULL,
  `Employee_Number` varchar(200) DEFAULT NULL,
  `Philhealth_Number` varchar(300) DEFAULT NULL,
  `TIN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_Identifiers`
--

INSERT INTO `staff_Identifiers` (`Staff_Identifier_Id`, `Employee_Number`, `Philhealth_Number`, `TIN`) VALUES
(6, 'TtLaZn+4No/Avd+7PgY/1nM1Vm1CL3hCd3Z2VzdKekdjUzNOV3c9PQ==', 'gD14GII7KLudNLpOkAZhRm9GUmNBckJtZEszay9pbDEvVUtXZ3c9PQ==', '4ScDdk+UsLH0z/pOQ6kfQ0wzVGdPRzV0clU5Tk1DRjlOeUVSdXc9PQ=='),
(7, '4MqWpwJIZZZMNRON6CthBXNETDJubU1SYXRyN2RPbldJNjFSR3c9PQ==', '2i065PX2H14cz4/coDAHxVM4eWgwZHZNUXRMdEZ3ZnRJelBRbHc9PQ==', 'crTdoN0MhQeZijQXdZ278zlxYkJRc1F6U3h6Nm5ENlM0RTFvUHc9PQ==');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_Id` bigint(20) NOT NULL,
  `Enrollee_Id` bigint(20) NOT NULL,
  `Grade_Level_Id` int(20) NOT NULL,
  `Section_Id` bigint(20) DEFAULT NULL,
  `Student_Status` int(2) NOT NULL,
  `Added_At` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_Id`, `Enrollee_Id`, `Grade_Level_Id`, `Section_Id`, `Student_Status`, `Added_At`) VALUES
(3, 41, 7, NULL, 1, '2025-05-16 20:32:33'),
(4, 12, 3, NULL, 1, '2025-05-16 22:07:54'),
(5, 41, 7, NULL, 1, '2025-05-16 22:07:54'),
(6, 43, 7, NULL, 1, '2025-05-16 22:07:54'),
(7, 13, 3, NULL, 1, '2025-05-17 08:27:31'),
(8, 13, 3, NULL, 1, '2025-05-17 08:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `Subject_Id` int(20) NOT NULL,
  `Subject_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`Subject_Id`, `Subject_Name`) VALUES
(1, 'ESP'),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, '3'),
(8, 'FILIPINO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` bigint(20) NOT NULL,
  `Registration_Id` bigint(20) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `User_Type` int(2) NOT NULL,
  `Staff_Id` int(11) DEFAULT NULL,
  `Time_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Registration_Id`, `Password`, `User_Type`, `Staff_Id`, `Time_created`) VALUES
(17, 87, '$2y$10$iZjCIpfxq2gsZ.8YQoTebeQOgkeF.ACg5FQfTMOCQ0gpBLXjAn/N2', 3, NULL, '2025-05-05 10:59:37'),
(22, 90, '$2y$10$c7OidhPNcltOcvWYIk3Iz.toy6e7j/NoU7YvAdn/fMsA9/EPoWZgK', 3, NULL, '2025-05-05 10:59:37'),
(27, NULL, '$2y$10$jmTDvfMWfHae7aUssNxRe.qf5f38llxkTyg3QB.AbjPqPDlXY562m', 1, 18, '2025-05-05 12:10:06'),
(35, NULL, '$2y$10$AHBD7PcBG01QBQTiPU3l6OonCqQuYPmtv/nTDzzx/K/kh4ghe2I6e', 2, 28, '2025-05-14 19:05:55'),
(36, NULL, '$2y$10$qJyZxLdv7kdkcVsuEOX4tO6umTto/xe8/hjUCoP8R7rewLdTNhfWK', 2, 29, '2025-05-14 19:16:00'),
(37, NULL, '$2y$10$5Py8XZDwCjtE1X1zMWHKvOq92VH94hOlAxn9wbsbu7KfM.Q0dopeO', 2, 30, '2025-05-16 11:39:57'),
(43, NULL, '$2y$10$ODvOf1hBE/Yv73pKdtgcseZMuT94oFHv3urkF/hW90FgFjrNAr3si', 2, 38, '2025-05-16 12:53:12'),
(64, 117, '$2y$10$otDoXVG5cnU2dQRsttxTRePetwbPL9GjYvutYI2gdrxPci7pJZQ86', 3, NULL, '2025-05-20 16:41:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disabled_student`
--
ALTER TABLE `disabled_student`
  ADD PRIMARY KEY (`Disabled_Student_Id`);

--
-- Indexes for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD PRIMARY KEY (`Educational_Background_Id`);

--
-- Indexes for table `educational_information`
--
ALTER TABLE `educational_information`
  ADD PRIMARY KEY (`Educational_Information_Id`),
  ADD KEY `Enrolling_Grade_Level` (`Enrolling_Grade_Level`),
  ADD KEY `Last_Grade_Level` (`Last_Grade_Level`);

--
-- Indexes for table `enrollee`
--
ALTER TABLE `enrollee`
  ADD PRIMARY KEY (`Enrollee_Id`),
  ADD KEY `Enrollee_Address_Id` (`Enrollee_Address_Id`),
  ADD KEY `fk_educatuinal_background` (`Educational_Background_Id`),
  ADD KEY `fk_educatuinal_information` (`Educational_Information_Id`),
  ADD KEY `fk_disabled_student` (`Disabled_Student_Id`),
  ADD KEY `Psa_Image_Id` (`Psa_Image_Id`);

--
-- Indexes for table `enrollee_address`
--
ALTER TABLE `enrollee_address`
  ADD PRIMARY KEY (`Enrollee_Address_Id`);

--
-- Indexes for table `enrollee_parents`
--
ALTER TABLE `enrollee_parents`
  ADD KEY `enrollee_parents_enrollee_id_fk` (`Enrollee_Id`),
  ADD KEY `enrolle_parents_parent_id_fk` (`Parent_Id`);

--
-- Indexes for table `enrollment_transactions`
--
ALTER TABLE `enrollment_transactions`
  ADD PRIMARY KEY (`Enrollment_Transaction_Id`),
  ADD KEY `Enrollee_Id` (`Enrollee_Id`),
  ADD KEY `Staff_Id` (`Staff_Id`);

--
-- Indexes for table `grade_level`
--
ALTER TABLE `grade_level`
  ADD PRIMARY KEY (`Grade_Level_Id`);

--
-- Indexes for table `grade_level_subjects`
--
ALTER TABLE `grade_level_subjects`
  ADD PRIMARY KEY (`Grade_Level_Subject_Id`),
  ADD KEY `Grade_Level_Id` (`Grade_Level_Id`),
  ADD KEY `Subject_Id` (`Subject_Id`);

--
-- Indexes for table `parent_information`
--
ALTER TABLE `parent_information`
  ADD PRIMARY KEY (`Parent_Id`);

--
-- Indexes for table `Psa_directory`
--
ALTER TABLE `Psa_directory`
  ADD PRIMARY KEY (`Psa_Image_Id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`Registration_Id`),
  ADD UNIQUE KEY `unique_phone_number` (`Contact_Number`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`Section_Id`),
  ADD KEY `Grade_Level_Id` (`Grade_Level_Id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`Staff_Id`),
  ADD UNIQUE KEY `Staff_Contact_Number` (`Staff_Contact_Number`),
  ADD KEY `fk_staff_address` (`Staff_Address_Id`),
  ADD KEY `fk_staff_identifier` (`Staff_Identifier_Id`);

--
-- Indexes for table `staff_address`
--
ALTER TABLE `staff_address`
  ADD PRIMARY KEY (`Staff_Address_Id`);

--
-- Indexes for table `staff_Identifiers`
--
ALTER TABLE `staff_Identifiers`
  ADD PRIMARY KEY (`Staff_Identifier_Id`),
  ADD UNIQUE KEY `Employee_Number` (`Employee_Number`),
  ADD UNIQUE KEY `TIN` (`TIN`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_Id`),
  ADD KEY `Section_Id` (`Section_Id`),
  ADD KEY `Enrollee_Id` (`Enrollee_Id`),
  ADD KEY `Grade_Level_Id` (`Grade_Level_Id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Subject_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `Registration_Id` (`Registration_Id`),
  ADD KEY `fk_staff_id` (`Staff_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disabled_student`
--
ALTER TABLE `disabled_student`
  MODIFY `Disabled_Student_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `Educational_Background_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `educational_information`
--
ALTER TABLE `educational_information`
  MODIFY `Educational_Information_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `enrollee`
--
ALTER TABLE `enrollee`
  MODIFY `Enrollee_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `enrollee_address`
--
ALTER TABLE `enrollee_address`
  MODIFY `Enrollee_Address_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `enrollment_transactions`
--
ALTER TABLE `enrollment_transactions`
  MODIFY `Enrollment_Transaction_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grade_level`
--
ALTER TABLE `grade_level`
  MODIFY `Grade_Level_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `grade_level_subjects`
--
ALTER TABLE `grade_level_subjects`
  MODIFY `Grade_Level_Subject_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parent_information`
--
ALTER TABLE `parent_information`
  MODIFY `Parent_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `Psa_directory`
--
ALTER TABLE `Psa_directory`
  MODIFY `Psa_Image_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `Registration_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `Section_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `Staff_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `staff_address`
--
ALTER TABLE `staff_address`
  MODIFY `Staff_Address_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_Identifiers`
--
ALTER TABLE `staff_Identifiers`
  MODIFY `Staff_Identifier_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `Subject_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educational_information`
--
ALTER TABLE `educational_information`
  ADD CONSTRAINT `educational_information_ibfk_1` FOREIGN KEY (`Enrolling_Grade_Level`) REFERENCES `grade_level` (`Grade_Level_Id`),
  ADD CONSTRAINT `educational_information_ibfk_2` FOREIGN KEY (`Last_Grade_Level`) REFERENCES `grade_level` (`Grade_Level_Id`);

--
-- Constraints for table `enrollee`
--
ALTER TABLE `enrollee`
  ADD CONSTRAINT `enrollee_ibfk_1` FOREIGN KEY (`Enrollee_Address_Id`) REFERENCES `enrollee_address` (`Enrollee_Address_Id`),
  ADD CONSTRAINT `enrollee_ibfk_2` FOREIGN KEY (`Psa_Image_Id`) REFERENCES `Psa_directory` (`Psa_Image_Id`),
  ADD CONSTRAINT `fk_disabled_student` FOREIGN KEY (`Disabled_Student_Id`) REFERENCES `disabled_student` (`Disabled_Student_Id`),
  ADD CONSTRAINT `fk_educatuinal_background` FOREIGN KEY (`Educational_Background_Id`) REFERENCES `educational_background` (`Educational_Background_Id`),
  ADD CONSTRAINT `fk_educatuinal_information` FOREIGN KEY (`Educational_Information_Id`) REFERENCES `educational_information` (`Educational_Information_Id`);

--
-- Constraints for table `enrollee_parents`
--
ALTER TABLE `enrollee_parents`
  ADD CONSTRAINT `enrolle_parents_parent_id_fk` FOREIGN KEY (`Parent_Id`) REFERENCES `parent_information` (`Parent_Id`),
  ADD CONSTRAINT `enrollee_parents_enrollee_id_fk` FOREIGN KEY (`Enrollee_Id`) REFERENCES `enrollee` (`Enrollee_Id`);

--
-- Constraints for table `enrollment_transactions`
--
ALTER TABLE `enrollment_transactions`
  ADD CONSTRAINT `enrollment_transactions_ibfk_1` FOREIGN KEY (`Enrollee_Id`) REFERENCES `enrollee` (`Enrollee_Id`),
  ADD CONSTRAINT `enrollment_transactions_ibfk_2` FOREIGN KEY (`Staff_Id`) REFERENCES `staffs` (`Staff_Id`);

--
-- Constraints for table `grade_level_subjects`
--
ALTER TABLE `grade_level_subjects`
  ADD CONSTRAINT `grade_level_subjects_ibfk_1` FOREIGN KEY (`Grade_Level_Id`) REFERENCES `grade_level` (`Grade_Level_Id`),
  ADD CONSTRAINT `grade_level_subjects_ibfk_2` FOREIGN KEY (`Subject_Id`) REFERENCES `subjects` (`Subject_Id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`Grade_Level_Id`) REFERENCES `grade_level` (`Grade_Level_Id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `fk_staff_address` FOREIGN KEY (`Staff_Address_Id`) REFERENCES `staff_address` (`Staff_Address_Id`),
  ADD CONSTRAINT `fk_staff_identifier` FOREIGN KEY (`Staff_Identifier_Id`) REFERENCES `staff_Identifiers` (`Staff_Identifier_Id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`Section_Id`) REFERENCES `sections` (`Section_Id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`Enrollee_Id`) REFERENCES `enrollee` (`Enrollee_Id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`Grade_Level_Id`) REFERENCES `grade_level` (`Grade_Level_Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_staff_id` FOREIGN KEY (`Staff_Id`) REFERENCES `staffs` (`Staff_Id`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Registration_Id`) REFERENCES `registrations` (`Registration_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
