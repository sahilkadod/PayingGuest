-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2021 at 11:13 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `paying_guest`
--
CREATE DATABASE IF NOT EXISTS `paying_guest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `paying_guest`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE IF NOT EXISTS `admin_detail` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(1, 'admin', 'admin@pg.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_master`
--

CREATE TABLE IF NOT EXISTS `booking_master` (
  `booking_id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `room_charges_id` int(10) NOT NULL,
  `room_total_charges` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_master`
--

INSERT INTO `booking_master` (`booking_id`, `booking_date`, `start_date`, `end_date`, `room_charges_id`, `room_total_charges`, `user_id`) VALUES
(1, '2021-06-01', '2021-07-01', '2022-01-01', 5, 40000, 1),
(2, '2021-06-01', '2021-07-15', '2022-07-15', 2, 85000, 2),
(3, '2021-06-01', '2021-08-19', '2022-08-19', 2, 85000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE IF NOT EXISTS `payment_detail` (
  `pay_id` int(10) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `card_type` varchar(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `cvv_no` int(5) NOT NULL,
  `card_holder_name` varchar(50) NOT NULL,
  `expiry_date` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_detail`
--

INSERT INTO `payment_detail` (`pay_id`, `booking_id`, `card_type`, `bank_name`, `card_no`, `cvv_no`, `card_holder_name`, `expiry_date`, `amount`) VALUES
(1, 1, 'Debit Card', 'sbi', '1234567890132456', 111, 'Gyanendra Singh', 'Aug-2026', 40000),
(2, 2, 'Credit Card', 'bob', '4567891230123456', 111, 'bhavin patel', 'Mar-2024', 85000),
(3, 3, 'Credit Card', 'bob', '1234567891234560', 111, 'Gyanendra Singh', 'April-2023', 85000);

-- --------------------------------------------------------

--
-- Table structure for table `room_charge_detail`
--

CREATE TABLE IF NOT EXISTS `room_charge_detail` (
  `room_charges_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ac_non` int(1) NOT NULL,
  `half_full` varchar(10) NOT NULL,
  `room_charges` int(10) NOT NULL,
  PRIMARY KEY (`room_charges_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_charge_detail`
--

INSERT INTO `room_charge_detail` (`room_charges_id`, `room_type_id`, `description`, `ac_non`, `half_full`, `room_charges`) VALUES
(1, 1, '2 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 1, 'HALF YEAR', 50000),
(2, 1, '2 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 1, 'FULL YEAR', 85000),
(3, 1, '2 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 2, 'HALF YEAR', 35000),
(4, 1, '2 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 2, 'FULL YEAR', 70000),
(5, 2, '3 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 1, 'HALF YEAR', 40000),
(6, 2, '3 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 1, 'FULL YEAR', 70000),
(7, 2, '3 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 2, 'HALF YEAR', 25000),
(8, 2, '3 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 2, 'FULL YEAR', 50000),
(9, 3, '4 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 1, 'HALF YEAR', 30000),
(10, 3, '4 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 1, 'FULL YEAR', 60000),
(11, 3, '4 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 2, 'HALF YEAR', 20000),
(12, 3, '4 Beds Per Room contains ac and non ac room with hot water facility and with cleaning staff available at any time with foods facility of lunch and dinner with breakfast', 2, 'FULL YEAR', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `room_type_master`
--

CREATE TABLE IF NOT EXISTS `room_type_master` (
  `room_type_id` int(10) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_type_img` varchar(50) NOT NULL,
  `total_no_of_rooms` int(10) NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type_master`
--

INSERT INTO `room_type_master` (`room_type_id`, `room_type`, `room_type_img`, `total_no_of_rooms`) VALUES
(1, '2 Bed Per Room', 'room_img/R1_9322.jpg', 5),
(2, '3 Bed Per Room', 'room_img/R2_3066.jpg', 5),
(3, '4 Bed Per Room', 'room_img/R3_9655.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_regis`
--

CREATE TABLE IF NOT EXISTS `user_regis` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_regis`
--

INSERT INTO `user_regis` (`user_id`, `user_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`, `gender`, `dob`) VALUES
(1, 'Gyanendra', 'pramukh ashyana\r\ndharampur road', 'valsad', '8574123690', 'gyanendra@yahoo.com', '1111111', 'MALE', '2000-12-03'),
(2, 'Bhavin', 'velvach valsad', 'valsad', '7458963210', 'bhavin@yahoo.com', '1111111', 'MALE', '1999-12-23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
