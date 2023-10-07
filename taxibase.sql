-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 02:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxibase`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` smallint(6) NOT NULL,
  `driver` smallint(6) NOT NULL,
  `passenger` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `driver`, `passenger`) VALUES
(2, 4, 3),
(8, 4, 3),
(9, 4, 3),
(10, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` smallint(6) NOT NULL,
  `city_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'colombo'),
(2, 'galle'),
(3, 'aluthgama'),
(4, 'kaluthara'),
(5, 'moratuwa'),
(6, 'rathmalana');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` smallint(6) NOT NULL,
  `cus_type` smallint(6) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_type`, `password`, `email`) VALUES
(2, 0, 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(3, 1, '5e6f982805abffd429f4b4a82acee4bb6fa4faab', 'kulunu'),
(4, 2, '18c0d2709be931e05f421f48bc381e4d4a983b04', 'mala'),
(5, 2, '1e28f9c34572a3ed0d016a3d6b3a87cf306f0cb5', 'padma'),
(6, 2, 'aeb66256078899ad47e53164ac07ade86ca546b8', 'siripala'),
(7, 2, 'a26f6804d47f1d95c84216c2d73a438edae48ebe', 'padme'),
(8, 1, '3daa2c246564baf6d1909404d0c52ca53c9e7917', 'kasun'),
(9, 1, '73675debcd8a436be48ec22211dcf44fe0df0a64', 'ben');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `cus_id` smallint(6) NOT NULL,
  `name` varchar(40) NOT NULL,
  `age` smallint(6) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`cus_id`, `name`, `age`, `gender`, `contact_no`) VALUES
(4, 'Mala Kamala', 32, 'female', '0771234123'),
(5, 'Padma thushari', 48, 'female', '0771204567'),
(6, 'Siri Pala', 31, 'male', '0771234121'),
(7, 'Padma siri', 22, 'male', '0771204561');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `cus_id` smallint(6) NOT NULL,
  `name` varchar(40) NOT NULL,
  `age` smallint(6) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`cus_id`, `name`, `age`, `gender`, `contact_no`) VALUES
(3, 'Kulunu Hansika', 26, 'female', '0771234567'),
(8, 'Kasun Kalhara', 26, 'male', '0771674567'),
(9, 'Ben Tenison', 19, 'male', '0771234227');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` smallint(6) NOT NULL,
  `vehicle_type` varchar(10) NOT NULL,
  `distance` float NOT NULL,
  `price` float NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `driver_id` smallint(6) NOT NULL,
  `passenger_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `cus_id` varchar(10) NOT NULL,
  `city_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`cus_id`, `city_id`) VALUES
('4', '1'),
('4', '2'),
('4', '3'),
('5', '1'),
('5', '4'),
('5', '5'),
('6', '5'),
('6', '6'),
('6', '7'),
('7', '1'),
('7', '2'),
('7', '3'),
('7', '4'),
('7', '7');

-- --------------------------------------------------------

--
-- Table structure for table `travel_dis`
--

CREATE TABLE `travel_dis` (
  `travel_dis_id` smallint(6) NOT NULL,
  `city_1` varchar(20) NOT NULL,
  `city_2` varchar(20) NOT NULL,
  `distance` float NOT NULL,
  `avg_travel_time` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `cus_id` smallint(6) NOT NULL,
  `vehicle_type` varchar(10) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`cus_id`, `vehicle_type`, `reg_no`, `color`) VALUES
(4, 'Panda car', 'XY1111', 'dark blue'),
(5, 'Three Whee', 'AB1234', 'Green'),
(6, 'Panda car', 'XY1111', 'dark blue'),
(7, 'Three Whee', 'AB1234', 'Green');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`driver_id`,`passenger_id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`cus_id`,`city_id`);

--
-- Indexes for table `travel_dis`
--
ALTER TABLE `travel_dis`
  ADD PRIMARY KEY (`travel_dis_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`cus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travel_dis`
--
ALTER TABLE `travel_dis`
  MODIFY `travel_dis_id` smallint(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
