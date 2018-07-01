-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2018 at 10:38 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `partnership_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories_list`
--

CREATE TABLE `categories_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_list`
--

INSERT INTO `categories_list` (`id`, `name`) VALUES
(1, 'Machine Learning'),
(2, 'C++');

-- --------------------------------------------------------

--
-- Table structure for table `contributors`
--

CREATE TABLE `contributors` (
  `project_id` int(11) NOT NULL,
  `contributor_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributors`
--

INSERT INTO `contributors` (`project_id`, `contributor_id`) VALUES
(1, '15PW01'),
(1, '15PW03'),
(2, '15PW01'),
(2, '15PW02');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `project_id` int(11) NOT NULL,
  `liked_user` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `project_id` int(11) NOT NULL,
  `subscriber_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `faculty_advisor` varchar(6) NOT NULL,
  `leader` varchar(6) NOT NULL,
  `co_owners` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `heading`, `description`, `image_url`, `faculty_advisor`, `leader`, `co_owners`, `start_date`, `end_date`) VALUES
(1, 'Opening Project', 'Sample', 'http://www.google.com/', '15PW13', '15PW13', '15PW13', '2018-02-14', '2018-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `tech_requirements`
--

CREATE TABLE `tech_requirements` (
  `project_id` int(11) NOT NULL,
  `language_name` varchar(50) NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `username` varchar(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `username`, `name`, `department_name`, `password`, `join_date`) VALUES
('hemanthsubbiah.x@gmail.com', '15PW13', 'Hemanth Subbiah', 'AMCS', '123', '2018-02-15'),
('hemz@gmail.com', '15PW99', 'Hemanth Subbiah', 'AMCS', '123456789abcdef', '2018-02-17'),
('asdasd@gmail.com', 'asd', 'as', '', 'as', '2018-02-17'),
('asds@fma.com', 'asn', 'hemanthsubbiah.x', 'AMCS', 'wp27site27', '2018-02-17'),
('asbdk@jkad.cm', 'kajsdb', 'kj', '', 'jkb', '2018-02-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_list`
--
ALTER TABLE `categories_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`project_id`,`contributor_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`project_id`,`liked_user`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`project_id`,`subscriber_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tech_requirements`
--
ALTER TABLE `tech_requirements`
  ADD PRIMARY KEY (`project_id`,`language_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_list`
--
ALTER TABLE `categories_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
