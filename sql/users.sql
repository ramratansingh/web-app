-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2018 at 07:16 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `mobile_no`, `address`, `status`, `created_by`) VALUES
(1, 'Ramratan Singh', 'ramratan94', '123456', 'ram@gmail.com', '8898157009', 'Mumbai', 2, 3),
(2, 'Administrator', 'admin', 'admin@123', 'admin@gmail.com', '8898153007', 'Mumbai', 1, 0),
(3, 'Ajay Singh', 'ajay', '123456', 'ajay@gmail.com', '8898153005', 'Kurla', 2, 4),
(6, 'Rakesh Singh', 'rakesh', '123456', 'rakesh@gmail.com', '8898158009', 'Mumbai', 2, 3),
(7, 'Mamta Yadav', 'mamta', 'mamta@123', 'mamta@gmail.com', '8898753007', 'Mumbai', 2, 3),
(9, 'Ajit K SINGH', 'ajit', '123456', 'ajit@gmail.com', '8898173000', 'Kurla', 2, 10),
(10, 'Kalpesh Singh', 'kalpesh92', '123456', 'kalpesh@gmail.com', '9898158009', 'Mumbai', 2, 11),
(11, 'Vidhya Yadav', 'vidhya', 'vidhya@123', 'vidhya@gmail.com', '8899753007', 'Mumbai', 2, 12),
(12, 'Rao Singh', 'rao95', '123456', 'rao@gmail.com', '8898183005', 'Kurla', 2, 3),
(13, 'Krishna SINGH', 'krishna94', '123456', 'krishna@gmail.com', '8998173000', 'Kurla', 2, 15),
(15, 'Shree Singh', 'shree123', '123456', 'shree@gmail.com', '8898534781', 'Powai', 2, 16);
