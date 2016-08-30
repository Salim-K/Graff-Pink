-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2016 at 03:27 AM
-- Server version: 5.5.46
-- PHP Version: 5.4.45-2+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_title` text CHARACTER SET utf8 NOT NULL,
  `a_content` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `a_title`, `a_content`) VALUES
(1, 'about us title 2', 'about us content about us content about us content about us content about us content about us content about us content about us content about us content about us content about us content about us content about us content about us content about us content about us content&nbsp;');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category_name`) VALUES
(1, 'home'),
(2, 'test'),
(5, 'te''st 2'),
(6, 'sdf''hksjdh"jhkj.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `status`, `date`, `author`) VALUES
(1, 'The First Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'images/img1.jpg', 'published', '2015-12-29 02:52:15', 'gtskahmed@gmail.com'),
(10, 'title number x', 'this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test', 'images/salim2.jpg', 'draft', '2016-01-02 02:42:59', 'salim@gmail.com'),
(17, 'Lorem Ipsum is simply', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'images/feed-new.jpg', 'published', '2016-01-01 01:56:02', 'salim@gmail.com'),
(18, 'title jjjjj''bhhbbb', 'jjjjjjjjbbbb''b''b''b''b''b''bb, bbb.', 'images/parallax5.jpg', 'draft', '2016-01-02 00:01:43', 'salim@gmail.com'),
(20, 'Lorem Ipsum is simply', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'images/feed-new.jpg', 'published', '2016-01-02 02:40:54', 'salim@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `title`, `image`) VALUES
(1, 'A multi purpose theme from cssauthor.com', 'images/parallax5.jpg'),
(2, 'your heading message here', 'images/parallax3.jpg'),
(3, 'A multi purpose theme from cssauthor.com', 'images/parallax4.jpg'),
(4, 'this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading this is a heading ', 'images/sceneries.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  `user_f_name` text NOT NULL,
  `user_l_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_phone_no` text NOT NULL,
  `user_designation` text NOT NULL,
  `user_website` text NOT NULL,
  `user_address` text NOT NULL,
  `user_about_me` text NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `user_f_name`, `user_l_name`, `user_email`, `user_password`, `user_gender`, `user_phone_no`, `user_designation`, `user_website`, `user_address`, `user_about_me`, `user_date`) VALUES
(3, 'admin', 'salim', 'wolf', 'salim@gmail.com', 'password', 'male', '+0101010101010', 'Web Developer', 'abc.com', 'A/87 Center of learning\r\nMorocco', 'Team F is leading', '2016-01-02 03:05:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
