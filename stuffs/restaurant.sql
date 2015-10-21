-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2015 at 12:55 PM
-- Server version: 5.5.33
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_company_id` varchar(32) NOT NULL,
  `branch_code` varchar(32) NOT NULL,
  `branch_name` varchar(32) NOT NULL,
  `branch_location` varchar(32) NOT NULL,
  `branch_detail` text NOT NULL,
  `branch_status` varchar(32) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_company_id`, `branch_code`, `branch_name`, `branch_location`, `branch_detail`, `branch_status`) VALUES
(1, 'session 123', '123', 'Saddar  branch', 'Saddar  road', 'details', 'active'),
(2, 'session 123', '123', 'Tariq road branch', 'tariq road', 'jyk', 'active'),
(3, 'session 123', '123', 'Cliffton road branch', 'Cliffton road', 'details', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(32) NOT NULL,
  `company_location` varchar(32) NOT NULL,
  `company_detail` varchar(32) NOT NULL,
  `company_branch_count` varchar(32) NOT NULL,
  `company_status` varchar(32) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_location`, `company_detail`, `company_branch_count`, `company_status`) VALUES
(1, 'Pizza Italiano', 'tariq road', 'this is main head office ', '10', 'active'),
(2, 'KBC', 'Tariq road', 'kbc branch details', '10', 'active'),
(3, 'Food Center', 'burns road', 'Food Center branch details', '5', 'active'),
(4, 'Student Biryani', 'saddar', 'student briyani saddar', '8', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_unique_id` varchar(32) NOT NULL,
  `package_name` varchar(32) NOT NULL,
  `package_detail` varchar(64) NOT NULL,
  `package_features` longtext NOT NULL,
  `package_status` varchar(32) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_unique_id`, `package_name`, `package_detail`, `package_features`, `package_status`) VALUES
(1, '12345', 'test package', 'test package detail gg', '', 'active'),
(2, '123', 'test package2', 'test package2 details', '{"branches":"10","tables":"25"}', 'deactive'),
(3, '123', 'test package3', 'test package details3', '', 'active'),
(4, '123', 'Dummy', 'Details', '{"branches":"10","tables":"5"}', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_first_name` varchar(16) NOT NULL,
  `user_last_name` varchar(16) NOT NULL,
  `user_display_name` varchar(16) NOT NULL,
  `user_display_picture` varchar(100) NOT NULL DEFAULT 'no_photo.png',
  `user_email` varchar(100) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(512) NOT NULL,
  `user_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_display_name`, `user_display_picture`, `user_email`, `user_login`, `user_password`, `user_timestamp`) VALUES
(1, 'Muhammd', 'Hanif', 'thehanif', 'no_photo.png', 'hanif@imagiacian.com', 'thehanif', '68eacb97d86f0c4621fa2b0e17cabd8c ', '2015-10-14 11:42:44');
