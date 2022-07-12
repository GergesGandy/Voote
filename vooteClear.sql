-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 10:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voote`
--
CREATE DATABASE IF NOT EXISTS `voote` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `voote`;

-- --------------------------------------------------------

--
-- Table structure for table `adminv`
--

DROP TABLE IF EXISTS `adminv`;
CREATE TABLE `adminv` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `image` varchar(350) NOT NULL,
  `resetpass` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `adminv`
--

TRUNCATE TABLE `adminv`;
--
-- Dumping data for table `adminv`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `snq` varchar(10) NOT NULL,
  `answer` varchar(2) NOT NULL,
  `mac` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `answer`
--

TRUNCATE TABLE `answer`;
--
-- Dumping data for table `answer`
--

-- --------------------------------------------------------

--
-- Table structure for table `formstyle`
--

DROP TABLE IF EXISTS `formstyle`;
CREATE TABLE `formstyle` (
  `id` varchar(10) NOT NULL,
  `chartname` varchar(100) NOT NULL,
  `htmlcode` text NOT NULL,
  `mobile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `formstyle`
--

TRUNCATE TABLE `formstyle`;
--
-- Dumping data for table `formstyle`
--

INSERT INTO `formstyle` (`id`, `chartname`, `htmlcode`, `mobile`) VALUES
(0, 'No Style choose', '<h1 class=\"section-heading text-center wow fadeIn my-5 pt-3\" id=\"realChart\">Please Choose form</h1>', ''),
(1, 'Bars chart', '<div class=\"col-md-12\">\r\n<div class=\"box box-primary\">\r\n  <div class=\"box-body\">\r\n    <div id=\"Real-time-bar-chart\" style=\"height: 300px;width:100%;\"></div>\r\n  </div>\r\n</div>', '<div class=\"row\"><div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer1\"><div class=\"info-box\"> <span class=\"info-box-icon bg-warning\" style=\"color: white !important;\"><i class=\"far fa-square\"></i></span><div class=\"info-box-content\"> <span class=\"info-box-text\"></span> <span class=\"info-box-number\"></span> </div></div></div><div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer2\"><div class=\"info-box\"> <span class=\"info-box-icon bg-primary\"><i class=\"far fa-circle\"></i></span><div class=\"info-box-content\"> <span class=\"info-box-text\"></span> <span class=\"info-box-number\"></span> </div></div></div><div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer3\"><div class=\"info-box\"> <span class=\"info-box-icon bg-success\"><i class=\"far fa-star\"></i></i></span><div class=\"info-box-content\"> <span class=\"info-box-text\"></span> <span class=\"info-box-number\"></span> </div></div></div><div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer4\"><div class=\"info-box\"> <span class=\"info-box-icon bg-red\"><i class=\"far fa-bookmark\"></i></span><div class=\"info-box-content\"> <span class=\"info-box-text\"></span> <span class=\"info-box-number\"></span> </div></div></div></div>'),
(2, 'Emoji face', '<div class=\"col-6 text-center\"><i class=\"far fa-laugh col-10 m-4 text-success faceAnswer\" id=\"faP1\"></i><i class=\"far fa-frown col-10 m-4 text-warning faceAnswer\" id=\"faP3\"></i></div><div class=\"col-6 text-center\"><i class=\"far fa-smile col-10 m-4 text-primary faceAnswer\" id=\"faP2\"></i><i class=\"far fa-angry col-10 m-4 text-danger faceAnswer\" id=\"faP4\"></i></div>', '<div class=\"row\"><div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer1\"> <div class=\"info-box\"> <span class=\"info-box-icon bg-success\"><i class=\"far fa-laugh\"></i></span> <div class=\"info-box-content\"> <span class=\"info-box-text\"></span> <span class=\"info-box-number\"></span> </div> </div> </div> <div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer2\"> <div class=\"info-box\"> <span class=\"info-box-icon bg-primary\"><i class=\"far fa-smile\"></i></span> <div class=\"info-box-content\"> <span class=\"info-box-text\"></span> <span class=\"info-box-number\"></span> </div> </div> </div> <div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer3\"> <div class=\"info-box\"> <span class=\"info-box-icon bg-warning\" style=\"color: white !important;\"><i class=\"far fa-frown\"></i></span> <div class=\"info-box-content\"> <span class=\"info-box-text\"></span> <span class=\"info-box-number\"></span> </div> </div> </div> <div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer4\"> <div class=\"info-box\"> <span class=\"info-box-icon bg-red\"><i class=\"far fa-angry\"></i></span> <div class=\"info-box-content\"> <span class=\"info-box-text\"></span> <span class=\"info-box-number\"></span> </div> </div> </div></div>'),
(3, 'like or dislike', '<div class=\"col-6 text-center\">\r\n    <input type=\"text\" class=\"knob\" id=\"ansCha1\" value=\"0\" data-width=\"200\" data-height=\"200\" data-fgColor=\"#39CCCC\">\r\n    <div class=\"knob-label\">like it</div>\r\n</div>\r\n<div class=\"col-6 text-center\">\r\n    <input type=\"text\" class=\"knob\" id=\"ansCha2\" value=\"0\" data-width=\"200\" data-height=\"200\" data-fgColor=\"#dc3545\">\r\n    <div class=\"knob-label\">Dislike</div>\r\n</div>', '    <div class=\"row\">     <div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer1\">           <div class=\"info-box\">             <span class=\"info-box-icon bg-info\"><i class=\"far fa-thumbs-up\"></i></span>              <div class=\"info-box-content\">               <span class=\"info-box-text\"></span>               <span class=\"info-box-number\"></span>             </div>           </div>         </div>         <div class=\"col-md-6 col-sm-6 col-xs-12\" id=\"answer2\">           <div class=\"info-box\">             <span class=\"info-box-icon bg-red\"><i class=\"far fa-thumbs-down\"></i></span>              <div class=\"info-box-content\">               <span class=\"info-box-text\"></span>               <span class=\"info-box-number\"></span>             </div>           </div>         </div>       </div>');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `groupid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `snp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `groups`
--

TRUNCATE TABLE `groups`;
--
-- Dumping data for table `groups`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` varchar(10) NOT NULL,
  `question` text NOT NULL,
  `a1` varchar(200) NOT NULL,
  `a2` varchar(200) NOT NULL,
  `a3` varchar(200) NOT NULL,
  `a4` varchar(200) NOT NULL,
  `form` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `time` int(11) NOT NULL,
  `snp` int(11) NOT NULL,
  `groups` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `question`
--

TRUNCATE TABLE `question`;
--
-- Dumping data for table `question`
--

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

DROP TABLE IF EXISTS `words`;
CREATE TABLE `words` (
  `wordid` varchar(100) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `words`
--

TRUNCATE TABLE `words`;
--
-- Dumping data for table `words`
--

INSERT DELAYED IGNORE INTO `words` (`wordid`, `text`) VALUES
('projectName', 'Voote'),
('link', 'www.voote.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminv`
--
ALTER TABLE `adminv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD KEY `snq` (`snq`);

--
-- Indexes for table `formstyle`
--
ALTER TABLE `formstyle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupid`),
  ADD KEY `snq` (`snp`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `snpp` (`snp`) USING BTREE,
  ADD KEY `form` (`form`),
  ADD KEY `groups` (`groups`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminv`
--
ALTER TABLE `adminv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `formstyle`
--
ALTER TABLE `formstyle`
  MODIFY `id` varchar(10) NOT NULL;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`snq`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`snp`) REFERENCES `adminv` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`snp`) REFERENCES `adminv` (`id`),
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`form`) REFERENCES `formstyle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `question_ibfk_3` FOREIGN KEY (`groups`) REFERENCES `groups` (`groupid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
