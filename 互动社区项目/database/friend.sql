-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-03-22 16:42:53
-- 服务器版本： 5.7.13-log
-- PHP Version: 5.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friend`
--

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(10) unsigned NOT NULL,
  `message_neirong` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `message_demo` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`message_id`, `message_neirong`, `message_demo`) VALUES
(1, '很喜欢这个东西', '小c'),
(2, '好样的', '小d'),
(3, '我大于你', '小d'),
(4, '我们是偷钱，你们是抢钱啊！凭什么我们犯法，你们合法？', '小n'),
(5, '凭什么你们上课能讲话，我们上课就要闭嘴？', '小k'),
(6, '故人西辞黄鹤楼，烟花三月下扬州。', '小b');

-- --------------------------------------------------------

--
-- 表的结构 `replay`
--

CREATE TABLE IF NOT EXISTS `replay` (
  `replay_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `replay_neirong` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `replay`
--

INSERT INTO `replay` (`replay_id`, `user_id`, `replay_neirong`) VALUES
(1, 5, '什么东西'),
(2, 7, '呵呵'),
(3, 8, '哈哈'),
(4, 9, '都说话呀。'),
(5, 4, '节操何在'),
(6, 5, '笑死人啦'),
(7, 10, '胡说什么'),
(8, 3, '孤帆远影碧山尽，唯见长江天际流。'),
(9, 4, '不敢高声语，恐惊天上人。'),
(10, 6, '两岸青山相对出，孤帆一片日边来。');

-- --------------------------------------------------------

--
-- 表的结构 `replay_info`
--

CREATE TABLE IF NOT EXISTS `replay_info` (
  `message_id` int(11) NOT NULL,
  `replay_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `replay_info`
--

INSERT INTO `replay_info` (`message_id`, `replay_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(5, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_nicheng` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_nicheng`, `password`) VALUES
(1, 'a', '小a', '111'),
(2, 'b', '小b', '222'),
(3, 'c', '小c', '333'),
(4, 'd', '小d', '444'),
(5, 'e', '小e', '555'),
(6, 'f', '小f', '666'),
(7, 'g', '小g', '777'),
(8, 'h', '小h', '888'),
(9, 'i', '小i', '999'),
(10, 'j', '小j', '10'),
(11, 'k', '小k', '11'),
(12, 'l', '小l', '12'),
(13, 'm', '小m', '13'),
(14, 'n', '小n', '14');

-- --------------------------------------------------------

--
-- 表的结构 `user_message`
--

CREATE TABLE IF NOT EXISTS `user_message` (
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user_message`
--

INSERT INTO `user_message` (`user_id`, `message_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(12, 4),
(5, 5),
(2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD KEY `message_id` (`message_id`);

--
-- Indexes for table `replay`
--
ALTER TABLE `replay`
  ADD KEY `replay_id` (`replay_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `user_id` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
