-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 10:08 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skolas_darbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `content` varchar(512) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `author_id`, `content`, `created`) VALUES
(1, 1, 1, 'Porchetta ham ham hock jowl pork chuck venison sausage pork belly.  Shoulder ', '2018-05-29 16:34:50'),
(2, 1, 1, 'test', '2018-05-29 18:38:14'),
(3, 1, 1, 'tests', '2018-05-29 18:43:06'),
(4, 1, 1, 'Burgdoggen brisket ham, cow ball tip ground round kielbasa.  Short loin bresaola drumstick, fatback turducken doner meatloaf shoulder ribeye jowl venison.  Pig salami pork belly, beef ribs pancetta fatback corned beef short loin chuck tri-tip swine tenderloin.  Short ribs sirloin tri-tip shoulder bacon rump beef capicola, pork alcatra burgdoggen cow.\"\"', '2018-05-29 18:50:40'),
(5, 1, 1, 'Sirloin turducken pig, chicken chuck turkey biltong cupim leberkas hamburger porchetta bacon.  Burgdoggen brisket ham hock pork belly landjaeger pork loin tail turkey meatball flank.', '2018-05-29 20:35:37'),
(6, 3, 1, 'test', '2018-06-03 22:46:22'),
(7, 3, 1, '<b>Hi</b>\r\n\r\n', '2018-06-03 22:47:41'),
(8, 3, 1, '<b>Hi</b>\r\n\r\n', '2018-06-03 22:49:31'),
(9, 1, 1, 'test', '2018-06-04 09:20:12'),
(10, 1, 1, 'test', '2018-06-04 09:21:13'),
(11, 1, 5, 'Lorem ipsum', '2018-06-04 09:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `download_release`
--

CREATE TABLE `download_release` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` text,
  `type` int(11) NOT NULL,
  `file` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `download_release`
--

INSERT INTO `download_release` (`id`, `title`, `description`, `type`, `file`, `created`) VALUES
(1, 'First test', NULL, 3, 1, '2018-05-13 15:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `size` decimal(10,0) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `url` varchar(64) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`, `type`, `size`, `author_id`, `url`, `created`) VALUES
(1, 'asdsadasd', 1, '21312', 1, '', '2018-05-29 00:00:00'),
(2, '80c21f8338dc634118727138', 1, '64219', 1, 'C:/Program Files (x86)/EasyPHP-Devserver-17/eds-www/NotusCore/No', '2018-06-04 11:45:53'),
(3, 'cf4780ca106ef3a06918f461', 1, '5740', 1, 'C:/Program Files (x86)/EasyPHP-Devserver-17/eds-www/NotusCore/No', '2018-06-04 11:45:53'),
(4, '62632b5a854b576b4fdb0771', 1, '30174', 1, 'attachments/62632b5a854b576b4fdb0771', '2018-06-04 11:53:50'),
(5, '173e37a5218c24ebb9f5caa1', 1, '29782', 1, 'attachments/173e37a5218c24ebb9f5caa1', '2018-06-04 11:53:50'),
(6, 'c659972cc5c7007debd74eb2', 1, '8533', 1, 'attachments/c659972cc5c7007debd74eb2', '2018-06-04 11:55:22'),
(7, '940ac7ac420b44bf39d387ca', 1, '2014', 1, 'attachments/940ac7ac420b44bf39d387ca', '2018-06-04 11:55:22'),
(8, 'screenshot_2018-06-03 hello(2)', 1, '35411', 1, 'attachments/ac2037378fdb5bebb3ae648e', '2018-06-04 12:24:34'),
(9, 'screenshot_2018-06-03 hello(1)', 1, '4149', 1, 'attachments/5fd33ea16f80c13a879f809d', '2018-06-04 12:24:34'),
(10, 'start_game', 1, '289554', 7, 'profile_pictures/27c37b9e820603c1c60326f3', '2018-06-05 02:19:49'),
(11, 'login-game', 1, '282633', 1, 'profile_pictures/5a0690b1cd63baa3f0b09c62', '2018-06-05 22:41:42'),
(12, 'varieties_7680x4320', 2, '1280750', 1, 'profile_pictures/08742fc12c515b338c6a93b5', '2018-06-05 22:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `file_type`
--

CREATE TABLE `file_type` (
  `id` int(11) NOT NULL,
  `name` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_type`
--

INSERT INTO `file_type` (`id`, `name`) VALUES
(1, 'png'),
(2, 'jpg'),
(3, 'rih'),
(4, 'txt'),
(5, 'zip'),
(6, 'rar'),
(7, 'gif');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_file` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `title`, `user_id`, `game_file`, `created`, `modified`, `status`) VALUES
(1, 'Test game', 1, 1, '2018-06-03 08:22:01', '2018-06-03 08:22:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `created`) VALUES
(1, 'Front page sub menu', '2018-05-26 12:05:28'),
(2, 'Main Menu', '2018-06-04 10:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` text,
  `description` varchar(255) DEFAULT NULL,
  `depth` tinyint(4) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '-1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `output_type` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `title`, `url`, `description`, `depth`, `parent`, `created`, `output_type`, `status`) VALUES
(1, 1, 'Login', './login', NULL, 0, -1, '2018-05-26 12:07:11', 1, 1),
(2, 1, 'Download', '', NULL, 2, -1, '2018-05-26 12:07:11', 0, 1),
(3, 1, 'about', './about', NULL, 3, -1, '2018-05-26 12:08:09', 0, 1),
(4, 1, 'profile', './profile', NULL, 1, -1, '2018-05-26 12:08:09', 2, 1),
(11, 2, '<home.rih/>', './', NULL, 0, -1, '2018-06-04 10:06:54', 0, 1),
(12, 2, '<login.rih/>', './login', NULL, 1, -1, '2018-06-04 10:06:54', 1, 1),
(13, 2, '<profile.rih/>', './profile', NULL, 2, -1, '2018-06-04 10:06:54', 2, 1),
(14, 2, '<forum.rih/>', './forum', NULL, 3, -1, '2018-06-04 10:06:54', 0, 1),
(15, 2, '<about.rih/>', './about', NULL, 4, -1, '2018-06-04 10:06:54', 0, 1),
(16, 2, '<docs.rih/>', './docs', NULL, 5, -1, '2018-06-04 10:06:54', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `type` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `author_id`, `title`, `content`, `type`, `created`, `status`) VALUES
(1, 1, 'Test', 'burgdoggen, jowl pork loin capicola meatloaf kielbasa ground round fatback salami jerky porchetta chicken.  Beef t-bone fatback salami short loin beef ribs.', 1, '2018-05-29 13:51:37', 1),
(2, 1, 'Test2', 'burgdoggen, jowl pork loin capicola meatloaf kielbasa ground round fatback salami jerky porchetta chicken.  Beef t-bone fatback salami short loin beef ribs.', 1, '2018-05-29 13:51:37', 1),
(3, 1, 'Stdffasd2', '                                        burgdoggen, jowl pork loin capicola meatloaf kielbasa ground round fatback salami jerky porchetta chicken.  Beef t-bone fatback salami short loin beef ribs.\r\n         \r\n        \r\n         \r\n        ', 2, '2018-05-29 13:51:37', 1),
(4, 1, 'Lol', 'burgdoggen, jowl pork loin capicola meatloaf kielbasa ground round fatback salami jerky porchetta chicken.  Beef t-bone fatback salami short loin beef ribs.', 1, '2018-05-15 13:51:37', 1),
(5, 1, 'test', 'test', NULL, '2018-06-04 11:53:50', 0),
(6, 1, 'tests123', 'tests123', 2, '2018-06-04 11:55:22', 1),
(7, 1, 'tedsafsa daa dsa dsad ', 'adasdsadad', 1, '2018-06-04 12:24:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_attachment`
--

CREATE TABLE `post_attachment` (
  `pid` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_attachment`
--

INSERT INTO `post_attachment` (`pid`, `fid`) VALUES
(1, 1),
(5, 4),
(5, 5),
(6, 6),
(6, 7),
(7, 8),
(7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_like` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`post_id`, `user_id`, `is_like`) VALUES
(3, 1, 1),
(1, 1, 0),
(1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_type`
--

INSERT INTO `post_type` (`id`, `title`) VALUES
(1, 'bug'),
(2, 'feature');

-- --------------------------------------------------------

--
-- Table structure for table `realease_type`
--

CREATE TABLE `realease_type` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realease_type`
--

INSERT INTO `realease_type` (`id`, `title`) VALUES
(1, 'BETA STABLE'),
(2, 'ALPHA STABLE'),
(3, 'BETA DEV'),
(4, 'ALPHA DEV'),
(5, 'EXPERIMENTAL'),
(6, 'STABLE');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `hash_key` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expiration_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip_address` varchar(39) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `hash_key`, `user_id`, `type`, `created`, `expiration_date`, `ip_address`) VALUES
(1, 'hi', 1, 1, '2018-06-02 18:12:32', '2018-06-28 21:00:00', '192.168.1.1'),
(6, 'a85c7348529e61ee4675d331d17600e76360621ff2d17d2d7ecf19f8300a9b3e', 1, 2, '2018-06-03 06:14:06', '0000-00-00 00:00:00', '127.0.0.1'),
(9, '75b51454d15838a6b5a0fc399cd6080bc3a7a452039e46939478b112a41d5ba9', 1, 3, '2018-06-04 10:45:24', '2019-05-26 09:45:24', '127.0.0.1'),
(10, 'd25f60b20ed58161a673aa1f405465e43590c88d6ebbdf5cec0f3018dcafee1e', 1, 3, '2018-06-04 10:45:52', '2019-05-26 09:45:52', '127.0.0.1'),
(11, '9e5582490f7c666c01751bd68f0d116b3bf5e2a4c5ed5ef7d2630be22f429b12', 1, 3, '2018-06-04 10:47:01', '2019-05-26 09:47:01', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `token_type`
--

CREATE TABLE `token_type` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token_type`
--

INSERT INTO `token_type` (`id`, `title`) VALUES
(1, 'activate_profile'),
(2, 'reset_password'),
(3, 'authenticate');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(512) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `is_developer` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `is_developer`, `status`) VALUES
(1, 'admin', '$2y$10$Fjw/uOxBPzG8omR4.eYQyOxKDlNS58tR8C3KREJhJ6Vhrwh8tKpFa', 'denkfrt@inbox.lv', 1, 1),
(2, 'tests2', '$2y$10$bsOQ5SYWsZF4.i0ed/lfr.HKdaz2CybsjB74xa40JdSI6HDy1n3nu', 'test@test.lv', 1, 0),
(4, 'tests12345', '$2y$10$wqwpCBYI98rFSHFwljDPC.5g/wngpT6u/9gs6xRPIP6uDBSnlmt5y', 'tests@tests12345.lv', 1, 0),
(5, 'asdfghjkl', '$2y$10$02PW/ZaW/rvPTKkOZ.Bjvum8TKbcPDQn7PqNsuxlM//0zgd5S2aDm', 'asdfghjkl@asdfghjkl.lv', 1, 1),
(6, 'testeris', '$2y$10$LUxo93UP8jhI2KvAdWzfVuu9SS8zWK7SxOTI9kXFUr..W1CnCmbZ.', 'denkfrt@inboxx.lv', 1, 1),
(7, 'tests123123', '$2y$10$FxM10yFoH45iDj11wv5/h.i9ADNo.BZOCrkg8FFjNrDeIsP8/Gyxy', 'opop@yahoo.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `surname` varchar(128) DEFAULT NULL,
  `about` varchar(512) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `profile_picture` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `name`, `surname`, `about`, `date_of_birth`, `profile_picture`) VALUES
(1, NULL, NULL, 'Developer of projects: NotusWEB & NotusCore', NULL, 12),
(7, 'Jacksonn', 'Michael', 'test', '2018-06-20', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `download_release`
--
ALTER TABLE `download_release`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `file` (`file`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `file_type`
--
ALTER TABLE `file_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_file` (`game_file`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `post_attachment`
--
ALTER TABLE `post_attachment`
  ADD KEY `pid` (`pid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realease_type`
--
ALTER TABLE `realease_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `token_type`
--
ALTER TABLE `token_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `profile_picture` (`profile_picture`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `download_release`
--
ALTER TABLE `download_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `file_type`
--
ALTER TABLE `file_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post_type`
--
ALTER TABLE `post_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `realease_type`
--
ALTER TABLE `realease_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `token_type`
--
ALTER TABLE `token_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `download_release`
--
ALTER TABLE `download_release`
  ADD CONSTRAINT `download_release_ibfk_1` FOREIGN KEY (`type`) REFERENCES `realease_type` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `download_release_ibfk_2` FOREIGN KEY (`file`) REFERENCES `file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`type`) REFERENCES `post_type` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `post_attachment`
--
ALTER TABLE `post_attachment`
  ADD CONSTRAINT `post_attachment_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_attachment_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`type`) REFERENCES `token_type` (`id`),
  ADD CONSTRAINT `token_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_data_ibfk_2` FOREIGN KEY (`profile_picture`) REFERENCES `file` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
