-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 07:20 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teretana`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`, `email`) VALUES
('admin', 'admin', 'amina@hotmail.com'),
('Amina', 'amina123', 'amina@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `prijedlozi`
--

CREATE TABLE `prijedlozi` (
  `id` int(11) NOT NULL,
  `program` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `cijena` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `prijedlozi`
--

INSERT INTO `prijedlozi` (`id`, `program`, `cijena`) VALUES
(1, 'Pilates', '50');

-- --------------------------------------------------------

--
-- Table structure for table `programi`
--

CREATE TABLE `programi` (
  `id` int(11) NOT NULL,
  `program` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `cijena` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `korisnik` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `programFK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `programi`
--

INSERT INTO `programi` (`id`, `program`, `cijena`, `korisnik`, `programFK`) VALUES
(2, 'pilates', '50', 'Amina', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `prijedlozi`
--
ALTER TABLE `prijedlozi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programi`
--
ALTER TABLE `programi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik` (`korisnik`),
  ADD KEY `programFK` (`programFK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prijedlozi`
--
ALTER TABLE `prijedlozi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
