-- phpMyAdmin SQL Dump
-- version 4.2.13.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2015 at 11:32 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jokes`
--
CREATE DATABASE IF NOT EXISTS `jokes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jokes`;

-- --------------------------------------------------------

--
-- Table structure for table `joke`
--

CREATE TABLE IF NOT EXISTS `joke` (
`joke_id` int(8) unsigned NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joke`
--

INSERT INTO `joke` (`joke_id`, `title`, `body`, `date`) VALUES
(7, 'password ', 'I changed my password to "incorrect". So whenever I forget what it is the computer will say "Your password is incorrect".', '2014-11-29'),
(8, 'google!', 'Funny facts about Google users: 50% of people use Google well as a search engine. The rest 50% of them use it to check if their internet is connected', '2014-11-29'),
(9, 'refresh ', 'I love pressing F5. It is so refreshing.  ', '2014-11-28'),
(27, 'Halloween & Christmas ', 'Q: Why do programmers always mix up Halloween and Christmas?  A: Because Oct 31 == Dec 25!', '2014-12-01'),
(28, 'Java', '“Knock, knock.”  “Who’s there?”  very long pause….  “Java.”  :-X', '2014-11-29'),
(29, 'MySQL', 'MySQL query goes into a bar, walks up to two tables and asks, "Can I join you?"', '2014-12-01'),
(30, 'becoming wealthy ', 'Q: "Whats the object-oriented way to become wealthy?"  A: Inheritance', '2014-11-17'),
(31, 'Lonely Unix', 'Unix is user friendly. It''s just very particular about who its friends are.', '2014-11-29'),
(35, 'IF ', 'A programmer is sent to the grocery store with instructions to "buy butter and see whether they have eggs, if they do, then buy 10."\r\n\r\nReturning with 10 butters, the programmer says, "they had eggs."  ', '2014-11-30'),
(36, 'thirsty programmer ', 'A programmer puts two glasses on his bedside table before going sleep. One full, in case he gets thirsty, and one empty, in case he doesn’t.', '2014-11-30'),
(38, 'source code', 'I would love to change the world, but they won’t give me the source code.\r\n  ', '2014-11-11'),
(40, 'test test test', 'fjsk  ', '2014-12-23'),
(41, 'SA', '  DA', '2014-12-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `joke`
--
ALTER TABLE `joke`
 ADD PRIMARY KEY (`joke_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `joke`
--
ALTER TABLE `joke`
MODIFY `joke_id` int(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
