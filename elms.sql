-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2019 at 10:35 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `tag` varchar(50) NOT NULL,
  `account` varchar(25) DEFAULT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`, `tag`, `account`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-06-17 18:36:11', 'admin', NULL, ''),
(2, 'HOD_CE', '38602639b3ab41c7e27d35f082ab13ab', '2019-06-17 18:36:13', 'HOD', NULL, ''),
(4, 'HOD_EE', '38602639b3ab41c7e27d35f082ab13ab', '2019-06-17 18:36:26', 'HOD', NULL, ''),
(6, 'HOD_FE', '38602639b3ab41c7e27d35f082ab13ab', '2019-06-18 09:03:55', 'HOD', 'FE', ''),
(7, 'Principal', '1c0fa43291e72d2328233415a2f6c492', '2019-06-17 18:36:26', 'Principal', NULL, ''),
(8, 'HOD_LIB', '38602639b3ab41c7e27d35f082ab13ab', '2019-06-17 18:36:39', 'HOD', 'LIB', ''),
(10, 'sports', '38602639b3ab41c7e27d35f082ab13ab', '2019-06-19 19:13:14', 'sports', 'sports', ''),
(11, 'student section', '38602639b3ab41c7e27d35f082ab13ab', '2019-07-07 10:19:29', 'sports', NULL, ''),
(13, 'adm3', '38602639b3ab41c7e27d35f082ab13ab', '0000-00-00 00:00:00', 'ADM', NULL, ''),
(14, 'HOD_CSE', '38602639b3ab41c7e27d35f082ab13ab', '2019-07-06 05:59:25', 'HOD', NULL, ''),
(111, 'HOD_WS', '698d51a19d8a121ce581499d7b701668', '0000-00-00 00:00:00', 'HOD', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `batch_2017`
--

CREATE TABLE `batch_2017` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `PRN` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ac_year` int(2) NOT NULL,
  `department` varchar(30) NOT NULL,
  `clearance` varchar(40) DEFAULT NULL,
  `HOD_remark` int(2) DEFAULT NULL,
  `HOD_t` varchar(80) DEFAULT NULL,
  `HOD_due` int(2) DEFAULT NULL,
  `library_remark` int(2) DEFAULT '3',
  `library_t` varchar(75) DEFAULT NULL,
  `library_due` int(2) DEFAULT NULL,
  `sports_remark` int(2) DEFAULT NULL,
  `sports_t` varchar(75) DEFAULT NULL,
  `sports_due` int(2) DEFAULT NULL,
  `scholarship_remark` int(2) DEFAULT NULL,
  `scholarship_t` varchar(75) DEFAULT NULL,
  `scholarship_due` int(2) DEFAULT NULL,
  `account_remark` int(2) DEFAULT NULL,
  `account_t` varchar(75) DEFAULT NULL,
  `account_due` int(2) DEFAULT NULL,
  `hall_ticket` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_2017`
--

INSERT INTO `batch_2017` (`id`, `name`, `PRN`, `password`, `ac_year`, `department`, `clearance`, `HOD_remark`, `HOD_t`, `HOD_due`, `library_remark`, `library_t`, `library_due`, `sports_remark`, `sports_t`, `sports_due`, `scholarship_remark`, `scholarship_t`, `scholarship_due`, `account_remark`, `account_t`, `account_due`, `hall_ticket`) VALUES
(1, 'Ajinkya Suresh Chaudhari', '40464920171124510002', 'test', 3, 'Civil Engineering', NULL, 0, '0', 0, 3, '0', 0, 0, '0', 0, 0, '0', 0, 0, '0', 0, 1),
(2, 'Amit Dnyaneshwar Admane', '40464920171124510003', 'test', 3, 'Mechanical Engineering', 'hall_ticket', 1, 'hello 55 hi', 250, 1, '', 0, 1, '', 0, 1, '', 0, 0, '', 0, 0),
(3, 'Amit Ganjapure', '40464920171124510004', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, '', 0, 1, '', 0, 1, '', 0, 1, '', 0, 0),
(4, 'Anup Ramesh Kadu', '40464920171124510005', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(5, 'Asawari Deepak Panat', '40464920171124510006', 'test', 3, 'Electrical Engineering', 'hall_ticket', 1, '', 0, 1, '', 0, 1, '', 0, 1, '', 0, 1, '', 0, 0),
(6, 'Ashwini Manish Gore', '40464920171124510007', 'test', 3, 'Computer Engineering', NULL, 3, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(7, 'Avatar Gautam', '40464920171124510008', 'test', 3, 'Computer Engineering', NULL, 0, '0', 0, 3, '0', 0, 0, '0', 0, 0, '0', 0, 0, '0', 0, 0),
(8, 'Bhagyashri Ashok Pimpalkar', '40464920171124510009', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(9, 'Bele Bhagyashri Sudhakar', '40464920171124510010', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(10, 'Ganesh Prabhakar Marathe', '40464920171124510011', 'test', 3, 'Computer Engineering', 'hall_ticket', 3, 'assig', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(11, 'Kimaya Walmikrao Waghmare', '40464920171124510012', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(12, 'Kshitija Mahakalkar', '40464920171124510013', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(13, 'Nandita Sunil Dixit', '40464920171124510014', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(14, 'Nidhi Rajesh Dave', '40464920171124510015', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(15, 'Niraj Sharma', '40464920171124510016', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(16, 'Pallavi Tripathi', '40464920171124510018', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(17, 'Payal Arun Talwekar', '40464920171124510019', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(18, 'Payal Dinesh Khade', '40464920171124510020', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(19, 'Piyush Kumar Nigam', '40464920171124510021', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(20, 'Pratik Kohad', '40464920171124510022', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(21, 'Princy Rammilan Sahu', '40464920171124510023', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(22, 'Priti Kumbhare', '40464920171124510024', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(23, 'Priya Anilrao Alone', '40464920171124510025', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(24, 'Radhika Chandrashekhar Dorlika', '40464920171124510026', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(25, 'Rajat Kahate', '40464920171124510027', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(26, 'Rashi Bardia', '40464920171124510028', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(27, 'Ruchika Sanjay Chambhare', '40464920171124510029', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(28, 'Rutuja Dabade', '40464920171124510030', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(29, 'Rutuja Praful Dehankar', '40464920171124510031', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(30, 'Sahil Lidbe', '40464920171124510032', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(31, 'Sakshi Kishorrao Jinnewar', '40464920171124510033', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(32, 'Sakshirao', '40464920171124510034', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(33, 'Sameer Babarao Thakare', '40464920171124510035', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(34, 'Sanket Santosh Lichode', '40464920171124510036', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(35, 'Sanmay Sanil Paniker', '40464920171124510037', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(36, 'Saurabh Diliprao Katkar', '40464920171124510038', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(37, 'Saurabh Shete', '40464920171124510039', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(38, 'Shivam Sanjay Diwate', '40464920171124510040', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(39, 'Siddhant Budhrao Kose', '40464920171124510041', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(40, 'Sonali Omprakash Ghodkhande', '40464920171124510042', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(41, 'Vasundhara Kishor Gajjalwar', '40464920171124510043', 'test', 2, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(42, 'Viplava Bhardwaj', '40464920171124510044', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(43, 'Yash Sanjay Awaghate', '40464920171124510045', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(44, 'Yugeshwar Jitesh Devtare', '40464920171124510046', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(45, 'Aditya Dattatray Gadekar', '40464920171124510047', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(46, 'Rushabh Patre', '40464920171124510048', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(47, 'Sakshi Thakare', '40464920171124510049', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(48, 'Utkarsh  Taksande', '40464920171124510050', 'test', 3, 'Computer Engineering', NULL, 0, '0', 0, 0, '0', 0, 0, '0', 0, 0, '0', 0, 0, '0', 0, 0),
(49, 'Saloni Soni', '40464920171124510051', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(50, 'Vidhi Dave', '40464920171124510052', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(51, 'Pranay Maheshrao Kathale', '40464920171124510053', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(52, 'Anushka Pahune', '40464920171124510054', 'test', 2, 'Civil Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 2, '', 0, 3, '', 0, 1, '', 0, 0),
(53, 'Ashish Rajesh Korde', '40464920171124510055', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(54, 'Nipun.Vijay.Agrawal', '40464920171124510056', 'test', 1, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(55, 'Revati Vitthalrao Ugemuge', '40464920171124510057', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(56, 'Shradha Prashant Wankhede', '40464920171124510058', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(57, 'Shruti Abhay Gosavi', '40464920171124510059', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(58, 'Wairagade Kajal Pundlikrao', '40464920171124511001', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(59, 'Piyush Shravanpant Ghotkar', '40464920171124511002', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0),
(60, 'Apeksha Lakhe', '40464920171124511003', 'test', 3, 'Computer Engineering', 'hall_ticket', 1, '', 0, 1, 'TEST', 123, 0, '', 0, 1, '', 0, 0, '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `batch_2018`
--

CREATE TABLE `batch_2018` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `PRN` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ac_year` int(2) NOT NULL,
  `department` varchar(30) NOT NULL,
  `clearance` varchar(40) DEFAULT NULL,
  `HOD_remark` int(2) DEFAULT NULL,
  `HOD_t` varchar(80) DEFAULT NULL,
  `HOD_due` int(2) DEFAULT NULL,
  `library_remark` int(2) DEFAULT '3',
  `library_t` varchar(75) DEFAULT NULL,
  `library_due` int(2) DEFAULT NULL,
  `sports_remark` int(2) DEFAULT NULL,
  `sports_t` varchar(75) DEFAULT NULL,
  `sports_due` int(2) DEFAULT NULL,
  `scholarship_remark` int(2) DEFAULT NULL,
  `scholarship_t` varchar(75) DEFAULT NULL,
  `scholarship_due` int(2) DEFAULT NULL,
  `account_remark` int(2) DEFAULT NULL,
  `account_t` varchar(75) DEFAULT NULL,
  `account_due` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_2018`
--

INSERT INTO `batch_2018` (`id`, `name`, `PRN`, `password`, `ac_year`, `department`, `clearance`, `HOD_remark`, `HOD_t`, `HOD_due`, `library_remark`, `library_t`, `library_due`, `sports_remark`, `sports_t`, `sports_due`, `scholarship_remark`, `scholarship_t`, `scholarship_due`, `account_remark`, `account_t`, `account_due`) VALUES
(1, 'Stuart Vincent', '12345678987654', 'test', 2, 'ggfagf', 'transfer', NULL, NULL, NULL, 2, 'visit me', 111, 0, '', 0, 0, '', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batch_record`
--

CREATE TABLE `batch_record` (
  `id` int(5) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `batch2` varchar(40) NOT NULL,
  `ac_year` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_record`
--

INSERT INTO `batch_record` (`id`, `batch`, `batch2`, `ac_year`) VALUES
(1, 'batch_2017', 'Batch 2017 & DSY-2018', 3),
(2, 'batch_2018', 'Batch 2018 & DSY-2019', 2);

-- --------------------------------------------------------

--
-- Table structure for table `editleaves`
--

CREATE TABLE `editleaves` (
  `auto` int(11) NOT NULL,
  `id` int(5) NOT NULL,
  `LeaveType` varchar(10) NOT NULL,
  `no` int(3) NOT NULL,
  `EditDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editleaves`
--

INSERT INTO `editleaves` (`auto`, `id`, `LeaveType`, `no`, `EditDate`) VALUES
(1, 3, 'EL', 23, '2019-07-15 10:16:05'),
(2, 3, 'CL', 2, '2019-07-15 10:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `EmpId` varchar(50) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `refno` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `sender_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `EmpId`, `department`, `refno`, `title`, `body`, `date`, `sender_id`) VALUES
(47, 'HOD_CE', NULL, 'adf', 'dfaf', 'fdfa', '2019-06-04', NULL),
(48, 'fee', NULL, 'f', 'fadf', 'df', '2019-06-04', NULL),
(49, '', 'Civil Engineering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(50, '', 'Electrical Enginnering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(51, '', 'Electrical Enginnering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(52, '', 'Mechanical Engineering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(53, '', 'Mechanical Engineering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(54, '', 'First Year Engineering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(55, '', 'Electrical Enginnering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(56, '', 'Computer Engineering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(57, '', 'Civil Engineering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(58, '', 'Mechanical Engineering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(59, '', 'First Year Engineering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(60, '', 'Electrical Enginnering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(61, '', 'Computer Engineering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(62, '', 'Civil Engineering', '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(63, 'DEMP2132', NULL, 'href143', 'Title', 'Country;Area(sq km);Birth rate(births/1000 population);Current account balance;Death rate(deaths/1000 population);Debt - external;Electricity - consumption(kWh);Electricity - production(kWh);Exports;GDP;GDP - per capita;GDP - real growth rate(%);HIV/AIDS - adult prevalence rate(%);HIV/AIDS - deaths;HIV/AIDS - people living with Futuna;274;;;;;;;250000;60000000;3800;;;;;120;300000;;;;;900;;;;;;;;;;;;;;;;16025;;;;1900;0;;\r\nWest ddddddfsdyytsttttttttttttttttttttttttttttttttttttttttttttttttttttttttkbjjDGBJNKLN KLWg;k NKLNKL NGSKNKLNWKLGN KNWKGN KWNKLN KLWNKGNWKLNLKN KLNW NWKL NGKLWNKL N NNWNSNGNS \r\n NN WNGNG MNSD, N,, SBank;5860;32.37;;3.99;108000000;;;205000000;1800000000;800;6.00;;;;4500;1500000000;;19.62;2.20;;145000;;364000;73.08;;;;;;;;;;;;;2385615;;;;301600;480000;4.40;27.20\r\nWestern Sahara;266000;;;;;83700000;90000000;;;;;;;;6200;;;;;;;;12000;;;;;;;;;1800;;;0;;273008;;;;;0;;\r\nYemen;527970;43.07;369900000;8.53;5400000000;2827000000;3040000000;4468000000;16250000000;800;1.90;0.10;;120', '2019-06-05', NULL),
(64, 'HOD_CE', NULL, 'href143', 'Title', 'Country;Area(sq km);Birth rate(births/1000 population);Current account balance;Death rate(deaths/1000 population);Debt - external;Electricity - consumption(kWh);Electricity - production(kWh);Exports;GDP;GDP - per capita;GDP - real growth rate(%);HIV/AIDS - adult prevalence rate(%);HIV/AIDS - deaths;HIV/AIDS - people living with Futuna;274;;;;;;;250000;60000000;3800;;;;;120;300000;;;;;900;;;;;;;;;;;;;;;;16025;;;;1900;0;;\r\nWest ddddddfsdyytsttttttttttttttttttttttttttttttttttttttttttttttttttttttttkbjjDGBJNKLN KLWg;k NKLNKL NGSKNKLNWKLGN KNWKGN KWNKLN KLWNKGNWKLNLKN KLNW NWKL NGKLWNKL N NNWNSNGNS \r\n NN WNGNG MNSD, N,, SBank;5860;32.37;;3.99;108000000;;;205000000;1800000000;800;6.00;;;;4500;1500000000;;19.62;2.20;;145000;;364000;73.08;;;;;;;;;;;;;2385615;;;;301600;480000;4.40;27.20\r\nWestern Sahara;266000;;;;;83700000;90000000;;;;;;;;6200;;;;;;;;12000;;;;;;;;;1800;;;0;;273008;;;;;0;;\r\nYemen;527970;43.07;369900000;8.53;5400000000;2827000000;3040000000;4468000000;16250000000;800;1.90;0.10;;120', '2019-06-05', NULL),
(65, 'DEMP2132', NULL, 'ABGHDSA', 'Title', 'DAFCKaG', '2019-06-05', NULL),
(66, 'DEMP2132', NULL, 'ABGHDSA', 'Title', 'dfghjhkl', '2019-06-05', NULL),
(67, '', 'Civil Engineering', 'GG', 'TitleHOD', '75sdadasdsa\r\naasgasf\r\nsvasvsa\r\nasfasf', '2019-06-05', NULL),
(68, '', 'Civil Engineering', 'Bit213#43', 'Test12374645', 'Test details\r\nZXCVBNMasdf1234567ghjklqwe123494653168TYUI5654\r\nSDXCG\r\n', '2019-06-05', NULL),
(69, '', 'Civil Engineering', 'hjknh65', 'TitleHOD', 'iiyftofytuyglhjvljhv;h', '2019-06-05', NULL),
(70, 'adm3', NULL, '2018-19/bit/234', 'ADF', 'ADFASDF', '2019-07-03', 0),
(71, 'adm3', NULL, '2018-19/bit/234', 'ADF', 'ADFASDF', '2019-07-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notice_admin`
--

CREATE TABLE `notice_admin` (
  `admin_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_admin`
--

INSERT INTO `notice_admin` (`admin_id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `review_leaves`
--

CREATE TABLE `review_leaves` (
  `auto` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `LeaveType` varchar(10) NOT NULL,
  `ToDate` date NOT NULL,
  `FromDate` date NOT NULL,
  `Full_Leave` int(2) NOT NULL,
  `Half_Leave` varchar(20) NOT NULL,
  `Duty_Adj` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AdminRemark` mediumint(9) NOT NULL,
  `AdminRemarkDate` varchar(120) NOT NULL,
  `Status` int(1) NOT NULL,
  `P_Status` int(2) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `action` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stu_notice`
--

CREATE TABLE `stu_notice` (
  `notice_id` int(11) NOT NULL,
  `year` varchar(30) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `refno` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `sender_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_notice`
--

INSERT INTO `stu_notice` (`notice_id`, `year`, `department`, `refno`, `title`, `body`, `date`, `sender_id`) VALUES
(13, 'First Year', NULL, '', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(14, 'First Year', 'Civil Engineering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(15, 'First Year', 'Civil Engineering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(16, 'First Year', 'Mechanical Engineering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(17, 'First Year', 'Civil Engineering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(18, 'Second Year', 'Civil Engineering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(19, 'First Year', NULL, 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(20, 'Second Year', NULL, 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(21, NULL, 'Computer Engineering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(22, 'First Year', 'Electrical Enginnering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(23, NULL, 'Mechanical Engineering', 'asd', 'Admission Process', ' gafgdfgagfg saf', '2019-06-04', NULL),
(24, 'Third Year', 'Electrical Enginnering', '', 'adf', 'adf', '2019-06-04', NULL),
(25, 'First Year', NULL, '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(26, 'Second Year', NULL, '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(27, 'Third Year', NULL, '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(28, 'Final Year', NULL, '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(29, 'First Year', NULL, '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(30, 'Second Year', NULL, '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(31, 'Third Year', NULL, '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL),
(32, 'Final Year', NULL, '2018-19/bit/234', 'adfadf', 'dafadsf', '2019-06-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(1, 'First Year Engineering', 'FE', 'FE', '2019-05-29 09:38:57'),
(2, 'Civil Engineering', 'CE', 'CE', '2017-11-01 07:16:25'),
(3, 'Mechanical Engineering', 'ME', 'ME', '2019-05-29 09:38:33'),
(4, 'Computer Engineering', 'CSE', 'CSE', '2017-11-01 07:19:37'),
(5, 'Electrical Enginnering', 'EE', 'EE', '2017-12-02 21:28:56'),
(7, 'Library', 'LIB', 'LIB', '2019-06-17 09:37:57'),
(8, 'Workshop', 'WS', 'WS', '2019-06-17 09:38:11'),
(9, 'Administration', 'ADM', 'ADM', '2019-06-19 06:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbldesignation`
--

CREATE TABLE `tbldesignation` (
  `id` int(11) NOT NULL,
  `teaching` varchar(20) NOT NULL,
  `department` varchar(40) NOT NULL,
  `designation` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldesignation`
--

INSERT INTO `tbldesignation` (`id`, `teaching`, `department`, `designation`) VALUES
(11, 'yes', '', 'Principal'),
(12, 'yes', 'First Year Engineering', 'Assistant Professor in Chemistry'),
(13, 'yes', 'First Year Engineering', 'Assistant Professor in Physics'),
(14, 'yes', 'First Year Engineering', 'Assistant Professor in English'),
(15, 'yes', 'First Year Engineering', 'Assistant Professor in Mathematics '),
(16, 'yes', 'First Year Engineering', 'Assistant Professor in Mathematics '),
(17, 'yes', 'Mechanical Engineering', 'Assistant Professor'),
(18, 'yes', 'Electrical Enginnering', 'Assistant Professor'),
(19, 'yes', 'Computer Engineering', 'Assistant Professor'),
(20, 'yes', 'Civil Engineering', 'Assistant Professor'),
(21, 'no', 'Administration', 'Senior Manager (Accounts and Administration)'),
(22, 'no', 'Administration', 'Senior Manager (Civil Construction)'),
(23, 'no', 'Administration', 'Accounts & Admin. Officer'),
(24, 'no', 'Administration', 'Junior Clerk'),
(25, 'no', 'Administration', 'Office Attendant'),
(26, 'no', 'Library', 'Assistant Librarian'),
(27, 'no', 'Library', 'Library Attendant'),
(28, 'no', 'Civil Engineering', 'Laboratory Assistant'),
(29, 'no', 'Electrical Enginnering', 'Technical Assistant'),
(30, 'no', 'First Year Engineering', 'Laboratory Assistant in Chemistry'),
(31, 'no', 'Computer Engineering', 'Laboratory Assistant'),
(33, 'no', 'Mechanical Engineering', 'Laboratory Assistant'),
(34, 'no', 'Workshop', 'Supervisor'),
(35, 'no', 'Workshop', 'Foreman'),
(36, 'no', 'Workshop', 'Instructor'),
(38, 'no', 'Workshop', 'Fitting Shop Instructor'),
(39, 'no', 'Workshop', 'Workshop Assistant'),
(40, 'no', 'Workshop', 'Workshop Attendant'),
(41, 'no', 'Administration', 'Site Engineer'),
(42, 'no', 'Administration', 'Site Supervisor'),
(43, 'no', 'Civil Engineering', 'Laboratory Attendant'),
(44, 'no', 'Computer Engineering', 'Laboratory Attendant'),
(45, 'no', 'Electrical Enginnering', 'Laboratory Attendant'),
(47, 'no', 'Mechanical Engineering', 'Laboratory Attendant'),
(50, 'no', 'First Year Engineering', 'Laboratory Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Teaching` varchar(20) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Country` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CL` float NOT NULL,
  `T_CL` float NOT NULL,
  `S_EL` int(3) DEFAULT '0',
  `EL` float NOT NULL,
  `T_EL` float NOT NULL,
  `DL` float NOT NULL,
  `U_DL` float NOT NULL,
  `S_FL` int(3) DEFAULT '0',
  `FL` float NOT NULL,
  `T_FL` float NOT NULL,
  `CPL` float NOT NULL,
  `U_CPL` float NOT NULL,
  `OL` float NOT NULL,
  `U_OL` float NOT NULL,
  `LWP` float NOT NULL,
  `U_LWP` float NOT NULL,
  `ML` float NOT NULL,
  `U_ML` float NOT NULL,
  `month` int(2) NOT NULL,
  `annual_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Teaching`, `Department`, `Designation`, `Address`, `City`, `Country`, `Phonenumber`, `Status`, `RegDate`, `CL`, `T_CL`, `S_EL`, `EL`, `T_EL`, `DL`, `U_DL`, `S_FL`, `FL`, `T_FL`, `CPL`, `U_CPL`, `OL`, `U_OL`, `LWP`, `U_LWP`, `ML`, `U_ML`, `month`, `annual_status`) VALUES
(1, 'EMP10806121', 'Anuj', 'kumar', 'anuj@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'Male', '3 February, 1990', 'Teaching', 'Mechanical Engineering', 'Assistant Professor ', 'New Delhi', 'Delhi', 'India', '9857555555', 1, '2017-11-10 11:29:59', 5, 4, NULL, 11, 6.5, 2, 3, NULL, 14, 6, 0, 0, 3, 0, 0, 0, -2, 2, 6, 1),
(2, 'DEMP2132', 'Amit', 'kumar', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'Male', '3 February, 1990', 'Non-Teaching', 'Civil Engineering', 'Technical Assistant', 'New Delhi', 'Delhi', 'India', '8587944255', 1, '2017-11-10 13:40:02', 7, 9, NULL, 12, 14.5, -2, 2, NULL, 4, 4, 0, 0, -5, 5, 0, 0, 0, 0, 6, 1),
(3, '007', 'AJAY', 'KARARE', 'ajaykarare08@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'Male', '', 'Teaching', 'Computer Engineering', 'Assistant Professor ', 'nagpur', 'nagpur', 'india', '9604440472', 1, '2019-05-29 09:18:50', 7.5, 5, NULL, 35, 27.5, 1, 0, NULL, 14, 2, 0, 0, 0, 0, 0, 0, 0, 0, 6, 1),
(4, 'HOD_CE', 'Dr. Narendra', 'Kanhe', 'narendra_mk@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Male', '', 'Teaching', 'Civil Engineering', '', 'Nagpur', 'Nagpur', 'India', '9823382851', 1, '2019-05-30 09:27:55', 4, 3, NULL, 6.5, 4.5, 0, 0, NULL, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 6, 1),
(5, 'HOD_FE', 'Dr. Vijay', 'Deshmukh', 'drvijay.bit@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Male', '', 'Teaching', 'First Year Engineering', 'Assistant Professor ', 'Napur', 'Nagpur', 'india', '7610254885', 1, '2019-05-30 09:29:41', 4, 3, NULL, 7.5, 4.5, 0, 0, NULL, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 6, 1),
(7, 'Principal', 'Dr. Narendra', 'Kanhe', 'narendra_mk@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Male', '', 'Teaching', 'Civil Engineering', '', 'Nagpur', 'Nagpur', 'India', '9823382851', 1, '2019-05-30 09:27:55', 0, 0, NULL, 6.5, 4.5, 3, 3, NULL, 2, 2, 1, 1, 1, 1, 1, 1, 0, 0, 6, 1),
(8, 'fee', 'Shivam\r\n', 'Diwate', 'shivam@gmail.com', 'shiv', '', '', '', 'Computer Engineering', '', '', '', '', '', 1, '2019-06-03 07:20:09', 3, 3, NULL, 4.5, 4.5, 0, 0, NULL, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 6, 1),
(11, 'adm3', 'Suresh', 'Dhawne', 'sureshdhawne@gmail.com', '38602639b3ab41c7e27d35f082ab13ab', 'Male', '3 July, 1975', 'Non-Teaching', 'Administration', 'Junior Clerk', 'Address temp, ', 'Wardha', 'India', '7894561230', 1, '2019-07-01 17:45:45', 2, 5, NULL, 3, 5, 1, 2, NULL, 1, 5, 1, 2, 0, 1, 0, 1, 0, 0, 0, 0),
(12, 'HOD_CSE', 'Sagar', 'Badhiye', 'sagar@gmail.com', '38602639b3ab41c7e27d35f082ab13ab', 'Male', '11 July, 1985', 'Teaching', 'Computer Engineering', 'Assistant Professor ', 'adf', 'daf', 'fda', '9876543210', 1, '2019-07-06 05:56:51', 1, 1, NULL, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0),
(13, '22', 'Avatar', 'Gautam', '1avatar2g@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'Male', '9 July, 2019', 'Non-Teaching', 'Computer Engineering', 'Laboratory Assistant', 'Himalaya Vishwa, Nagpur Road', 'Wardha', 'India', '9623179534', 1, '2019-07-09 07:18:57', 2, 2, NULL, 2, 2, 2, 2, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0),
(14, 'HOD_WS', 'fafasf', 'fadsfadsf', 'dfasdfdfass@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', '15 July, 2019', 'Non-Teaching', 'Workshop', 'Supervisor', 'Himalaya Vishwa, Nagpur Road', 'Wardha', 'India', '9623179534', 1, '2019-07-09 07:26:17', 2, 2, NULL, 2, 2, 2, 2, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0),
(33, '33', 'PASUS', 'Corp', 'pasus.corp@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '8 July, 2019', 'Teaching', 'Computer Engineering', 'Assistant Professor', 'Himalaya Vishwa, Nagpur Road', 'Wardha', 'India', '9623179534', 1, '2019-07-10 18:48:03', 1, 1, NULL, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0),
(111, 'HOD_WS', 'qwert', 'asdfasf', 'pasus.asdfadscorp@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Male', '14 July, 2019', 'Teaching', 'Workshop', 'Supervisor', 'Himalaya Vishwa, Nagpur Road', 'Wardha', 'India', '9623179534', 1, '2019-07-13 07:56:24', 1, 1, NULL, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0),
(213, '213', 'qwert', 'qwert', 'pasuadfdsfs.corp@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Male', '3 July, 2019', 'Teaching', 'Mechanical Engineering', 'Assistant Librarian', 'Himalaya Vishwa, Nagpur Road', 'Wardha', 'India', '9623179534', 1, '2019-07-11 16:42:14', 2, 1, NULL, 4, 3, 8, 7, NULL, 6, 5, 10, 9, 12, 11, 14, 13, 0, 0, 0, 0),
(333, '333', 'PASUS', 'Corp', 'pasus.cor33p@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '4 July, 2019', 'Teaching', 'Computer Engineering', 'Accounts & Admin. Officer', 'Himalaya Vishwa, Nagpur Road', 'Wardha', 'India', '9623179534', 1, '2019-07-10 18:50:03', 1, 1, NULL, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0),
(1007, '1007', 'u', 't', 'pasus.cfgsdorp@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Male', '17 July, 2019', 'Teaching', 'Computer Engineering', 'Assistant Professor', 'Himalaya Vishwa, Nagpur Road', 'Wardha', 'India', '9623179534', 1, '2019-07-12 10:00:09', 1, 1, NULL, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0),
(85964, '085964', 'PASUSadsfads', 'Corp', 'pasus.cafdforp@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'Male', '1 July, 2019', 'Non-Teaching', 'Administration', 'Technical Assistant', 'Himalaya Vishwa, Nagpur Road', 'Wardha', 'India', '9623179534', 1, '2019-07-13 07:57:37', 1, 1, NULL, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 11, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `no` float NOT NULL,
  `ToDate` date NOT NULL,
  `FromDate` date NOT NULL,
  `Full_Leave` int(2) NOT NULL,
  `Half_Leave` varchar(20) NOT NULL,
  `Duty_Adj` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `P_Status` int(2) NOT NULL DEFAULT '0',
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `action` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `no`, `ToDate`, `FromDate`, `Full_Leave`, `Half_Leave`, `Duty_Adj`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `P_Status`, `IsRead`, `empid`, `aid`, `action`) VALUES
(7, 'EL', 0, '0000-00-00', '0000-00-00', 0, '', '', 'test description test descriptiontest descriptiontest descriptiontest descriptiontest descriptiontest descriptiontest description', '2017-11-19 13:11:21', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.\r\n', '2017-12-02 23:26:27 ', 1, 1, 1, 1, NULL, 0),
(8, 'CPL', 0, '0000-00-00', '0000-00-00', 0, '', '', 'test description test descriptiontest descriptiontest descriptiontest descriptiontest descriptiontest descriptiontest description', '2017-11-20 11:14:14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-12-02 23:24:39 ', 1, 1, 1, 1, NULL, 0),
(9, 'Medical Leave test', 0, '2019-07-15', '2019-07-10', 0, '', '', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.\r\n', '2017-12-02 18:26:01', NULL, NULL, 1, 1, 1, 2, NULL, 0),
(16, 'CPL', 0, '0000-00-00', '0000-00-00', 0, '', '', 'zyre', '2019-05-31 05:59:09', NULL, NULL, 1, 0, 0, NULL, NULL, 0),
(17, 'EL', 0, '0000-00-00', '0000-00-00', 0, '', '', 'wRQ', '2019-05-31 06:01:28', NULL, NULL, 1, 0, 0, NULL, 4, 0),
(18, 'LWP', 1.5, '0000-00-00', '0000-00-00', 0, '', '', 'For test', '2019-06-01 04:17:16', NULL, NULL, 1, 2, 1, 1, NULL, 0),
(19, 'OL', 5, '0000-00-00', '0000-00-00', 0, '', '', 'test 2 for leave\r\n', '2019-06-01 05:54:54', 'gtrgte', '2019-06-07 10:48:04 ', 1, 1, 1, 2, NULL, 0),
(20, 'EL', 1, '0000-00-00', '0000-00-00', 0, '', '', 'sd', '2019-06-06 08:37:31', '', '2019-06-06 14:09:50 ', 1, 1, 1, NULL, 4, 0),
(21, 'EL', 1, '0000-00-00', '0000-00-00', 0, '', '', 'dafd', '2019-06-06 08:38:01', NULL, NULL, 1, 0, 1, NULL, 4, 0),
(22, 'EL', 1, '0000-00-00', '0000-00-00', 0, '', '', 'dafd', '2019-06-06 08:38:36', NULL, NULL, 1, 1, 1, NULL, 4, 0),
(23, 'DL', 2, '0000-00-00', '0000-00-00', 0, '', '', 'fdghdrhcxjf', '2019-06-13 05:04:04', '', '2019-06-13 10:39:00 ', 1, 1, 1, 2, NULL, 0),
(24, 'CL', 1, '0000-00-00', '0000-00-00', 0, '', '', 'Urgent Leave from administation', '2019-07-01 17:56:29', '', '2019-07-02 0:37:01 ', 1, 1, 1, NULL, 11, 0),
(25, 'EL', 2, '0000-00-00', '0000-00-00', 0, '', '', 'Personal', '2019-07-02 07:15:21', NULL, NULL, 1, 0, 1, 1, NULL, 0),
(26, 'DL', 0, '0000-00-00', '0000-00-00', 1, '', 'he will take care', 'daf', '2019-07-09 17:56:42', NULL, NULL, 1, 0, 1, 1, NULL, 0),
(27, 'CL', 0, '0000-00-00', '0000-00-00', 0, 'First Half', 'he will take care', 'dfad', '2019-07-09 17:58:27', NULL, NULL, 1, 0, 1, 1, NULL, 0),
(28, 'CPL', 0, '0000-00-00', '0000-00-00', 0, 'Second Half', 'hod ', 'some personal reason', '2019-07-09 17:59:05', NULL, NULL, 1, 0, 1, 1, NULL, 0),
(33, 'EL', 0, '0000-00-00', '0000-00-00', 0, 'Second Half', 'adf', 'dfa', '2019-07-09 18:37:02', NULL, NULL, 1, 0, 0, NULL, 11, 0),
(34, 'EL', 0, '0000-00-00', '0000-00-00', 0, 'Second Half', 'adf', 'dfa', '2019-07-09 18:37:19', NULL, NULL, 1, 0, 0, NULL, 11, 0),
(35, 'EL', 0, '0000-00-00', '0000-00-00', 0, 'First Half', '2', 'sad', '2019-07-09 18:38:01', NULL, NULL, 1, 0, 0, NULL, 11, 0),
(36, 'EL', 0, '0000-00-00', '0000-00-00', 1, '', 'he will take care', 'qqqq', '2019-07-10 06:13:05', NULL, NULL, 1, 0, 0, NULL, 12, 0),
(37, 'DL', 0, '0000-00-00', '0000-00-00', 1, '', '  asefad', 'adsfasdf', '2019-07-10 08:41:07', NULL, NULL, 1, 0, 1, 1, NULL, 0),
(39, 'LWP', 0, '2019-07-21', '2019-07-18', 1, '', 'he will take care', 'asdf', '2019-07-10 16:02:11', NULL, NULL, 1, 0, 0, NULL, 12, 0),
(40, 'OL', 0, '2019-07-11', '2019-07-11', 0, 'Second Half', 'ASFD', 'DAFA', '2019-07-10 16:03:59', NULL, NULL, 1, 1, 0, 3, NULL, 1),
(41, 'CL', 0, '2019-07-12', '2019-07-11', 0, 'Second Half', 'adfs', 'adsf', '2019-07-10 16:07:05', NULL, NULL, 1, 0, 2, NULL, NULL, 0),
(42, 'CL', 0, '2019-07-10', '2019-07-07', 1, 'Second Half', 'Mr. XYZ QWery', 'The Indian subcontinent was home to the Indus Valley Civilisation of the bronze age. In India\'s iron age, the oldest scriptures of Hinduism were composed, social stratification based on caste emerged, and Buddhism and Jainism arose. Political consolidations took place under the Maurya and Gupta Empires; the peninsular Middle Kingdoms influenced the cultures of Southeast Asia. In India\'s medieval era, Judaism, Zoroastrianism, Christianity, and Islam arrived, and Sikhism emerged, adding to a diverse culture. North India ', '2019-07-10 16:20:45', 'I don\'t have any problem\r\n', '2019-07-10 23:29:48 ', 1, 1, 1, 13, NULL, 1),
(43, 'EL', 0, '2019-07-16', '2019-07-15', 1, 'Second Half', 'Mr. XYZ QWery', 'The Indian subcontinent was home to the Indus Valley Civilisation of the bronze age. In India\'s iron age, the oldest scriptures of Hinduism were composed, social stratification based on caste emerged, and Buddhism and Jainism arose. Political consolidations took place under the Maurya and Gupta Empires; the peninsular Middle Kingdoms influenced the cultures of Southeast Asia. In India\'s medieval era, Judaism, Zoroastrianism, Christianity, and Islam arrived, and Sikhism emerged, adding to a diverse culture. North India ', '2019-07-10 16:20:45', 'I don\'t have any problem\r\n', '2019-07-10 23:29:48 ', 1, 1, 1, 13, NULL, 1),
(44, 'FL', 0, '2019-07-19', '2019-07-02', 1, '', '', 'dafd', '2019-07-13 09:01:17', 'NA', '2019-07-13 14:31:34 ', 1, 1, 2, NULL, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `CreationDate`) VALUES
(1, 'CL', 'Casual Leave', '2019-05-31 10:03:44'),
(2, 'EL', 'Earned Leave', '2017-11-06 13:16:09'),
(3, 'FL', 'Festival Leave', '2019-05-30 08:44:45'),
(4, 'DL', 'Duty Leave', '2017-11-01 12:07:56'),
(5, 'CPL', 'Compensatory Leave', '2019-05-29 09:17:26'),
(7, 'OL', 'Outdoor Leave', '2019-05-31 10:04:37'),
(8, 'LWP', 'Leave Without Pay', '2019-05-31 10:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblyears`
--

CREATE TABLE `tblyears` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `year_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblyears`
--

INSERT INTO `tblyears` (`id`, `year`, `year_code`) VALUES
(1, 'First Year', 'first_year'),
(2, 'Second Year', 'second_year'),
(3, 'Third Year', 'third_year'),
(4, 'Final Year', 'final_year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_2017`
--
ALTER TABLE `batch_2017`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_2018`
--
ALTER TABLE `batch_2018`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_record`
--
ALTER TABLE `batch_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editleaves`
--
ALTER TABLE `editleaves`
  ADD PRIMARY KEY (`auto`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `notice_admin`
--
ALTER TABLE `notice_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `review_leaves`
--
ALTER TABLE `review_leaves`
  ADD PRIMARY KEY (`auto`);

--
-- Indexes for table `stu_notice`
--
ALTER TABLE `stu_notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldesignation`
--
ALTER TABLE `tbldesignation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblyears`
--
ALTER TABLE `tblyears`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_2017`
--
ALTER TABLE `batch_2017`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `batch_2018`
--
ALTER TABLE `batch_2018`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batch_record`
--
ALTER TABLE `batch_record`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `editleaves`
--
ALTER TABLE `editleaves`
  MODIFY `auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `notice_admin`
--
ALTER TABLE `notice_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_leaves`
--
ALTER TABLE `review_leaves`
  MODIFY `auto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stu_notice`
--
ALTER TABLE `stu_notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblyears`
--
ALTER TABLE `tblyears`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
