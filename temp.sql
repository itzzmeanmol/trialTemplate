-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 03, 2019 at 07:29 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `fname` varchar(30) DEFAULT NULL,
  `sname` varchar(30) DEFAULT NULL,
  `image` varchar(1000) NOT NULL,
  `about` varchar(10000) NOT NULL,
  `id` int(10) NOT NULL,
  `template` int(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `experience` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`fname`, `sname`, `image`, `about`, `id`, `template`, `address`, `email`, `experience`) VALUES
('ANMOL', 'JAIN', 'bb.jpg', 'asdf', 1, 1, 'G-2 Mohinani Bhavan, Laxman Nagar, Bairagarh', 'anmoljain.2016@vitstudent.ac.in', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `programmer`
--

CREATE TABLE `programmer` (
  `programmer_id` int(11) NOT NULL,
  `programmer_name` varchar(200) NOT NULL,
  `programmer_skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `gplus` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `github` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `twitter`, `gplus`, `linkedin`, `github`, `facebook`) VALUES
(1, 'https://www.twitter.com', 'https://www.google.com', 'https://www.linkedin.com', 'https://www.github.com', 'https://www.facebook.com');

-- --------------------------------------------------------

--
-- Table structure for table `tagslist`
--

CREATE TABLE `tagslist` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagslist`
--

INSERT INTO `tagslist` (`id`, `name`) VALUES
(1, 'AWS'),
(2, 'Bigdata'),
(3, 'Angular'),
(4, 'Javascript'),
(5, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `workperformance`
--

CREATE TABLE `workperformance` (
  `id` int(11) NOT NULL,
  `servproject` varchar(1000) NOT NULL,
  `jobdesc` varchar(1000) NOT NULL,
  `atnrec` varchar(1000) NOT NULL,
  `lor` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workperformance`
--

INSERT INTO `workperformance` (`id`, `servproject`, `jobdesc`, `atnrec`, `lor`) VALUES
(1, 'asdf', 'Nothing', 'Nothing', 'Nothing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmer`
--
ALTER TABLE `programmer`
  ADD PRIMARY KEY (`programmer_id`);

--
-- Indexes for table `tagslist`
--
ALTER TABLE `tagslist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagslist`
--
ALTER TABLE `tagslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
