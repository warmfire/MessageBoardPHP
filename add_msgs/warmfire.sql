-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-21 14:06:03
-- 服务器版本： 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warmfire`
--

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` char(100) NOT NULL,
  `time` int(10) NOT NULL,
  `ip` char(50) NOT NULL,
  `content` text NOT NULL,
  `zan` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `name`, `time`, `ip`, `content`, `zan`) VALUES
(1, '宝宝', 1447069779, '10.144.244.17', '宝宝最帅', 0),
(4, '123', 1450701491, '127.0.0.1', '123123', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `imgurl` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `imgurl`) VALUES
(1, 'admin', 'admin', ''),
(2, 'user', 'user', './files/201512/5677edc9728d1.JPG'),
(3, 'user', 'user', './files/201512/5677edd559539.JPG'),
(4, 'test', 'test', './files/201512/5677ee0e42320.JPG'),
(5, 'test', 'test', './files/201512/5677ee7af3bd3.JPG'),
(6, 'test1', 'test1', './files/201512/5677ee89ef10c.JPG'),
(7, '123', '123', './files/201512/5677eec738923.JPG'),
(8, 'test3', 'test3', './files/201512/5677ef3074a27.JPG'),
(9, 'test4', 'test4', './files/201512/5677ef5d8a42a.JPG'),
(10, 'test5', 'test5', './files/201512/5677efb18c2a7.JPG'),
(11, 'test7', 'test7', './files/201512/5677efe0b2e90.JPG'),
(12, 'test8', 'test8', './files/201512/5677f048b362d.JPG'),
(13, 'admin', 'admin', './files/201512/5677f081e9686.JPG'),
(14, 'qaz', 'qaz', './files/201512/5677f098e228f.JPG'),
(15, 'qas', 'qas', './files/201512/5677f0a4a2d8f.JPG'),
(16, '456', '465', './files/201512/5677f0c02b1d4.JPG');

-- --------------------------------------------------------

--
-- 表的结构 `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `id` mediumint(8) unsigned NOT NULL,
  `ip` char(40) NOT NULL,
  `lasttime` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
