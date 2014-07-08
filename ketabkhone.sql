-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2014 at 10:33 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ketabkhone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'nateghe@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `barows`
--

CREATE TABLE IF NOT EXISTS `barows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bookserial` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `barows`
--

INSERT INTO `barows` (`id`, `username`, `bookserial`) VALUES
(6, 'payamprivate', 2564889);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `writer` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `serial` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `writer`, `cat`, `serial`, `status`) VALUES
(1, 'مرجع کامل CCNP SWITCH', 'ویرایش سوم استاندارد مدیریت پورتفولیو، فرآیندهایی از مدیریت پورتفولیو را توصیف می کند که عموما به عنوان بهترین روشهای اجرایی شناخته شده اند، به گونه ای که اجماع گسترده ای بر روی ارزش و سودمندی آن ها وجود داشته و می توان آنها را در اکثر پورتفولیوها بکار گرفت. بکارگیری مهارت ها، ابزارها و تکنیک های بیان شده در این استاندارد منجر به افزایش احتمال موفقیت در طیف وسیعی از پورتفولیوها و انواع سازمان ها می شود.', 'حسین محسن زاده ', 'کامپیوتر', 2564889, 0),
(3, 'موسیقی', 'در مورد فرهنگ اسلامی هست این کتاب , مباحث درسی زیادی دارد , و بسیار مشهور در فقه .', 'حسین نعمتی', 'درسی', 654598, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `password`, `zipcode`, `address`) VALUES
(6, 'payam', 'korehpaz', 'payamprivate', 'payamprivate@Gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '5915714366', 'mahabad');
