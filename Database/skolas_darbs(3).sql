-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 06:38 AM
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
  `save_data` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `title`, `user_id`, `save_data`, `created`, `modified`, `status`) VALUES
(2, 'My Global Game', 1, 'seed_x:15.7\r\nseed_y:5.7\r\nseed_z:15.7\r\n\r\nseed_tree_x:8\r\nseed_tree_y:5\r\nseed_tree_z:8\r\n\r\nresource_0:99\r\nresource_1:23\r\n\r\nplayer_position_x:0\r\nplayer_position_z:0\r\nplayer_rotation_y:45\r\n\r\ncamera_zoom:15\r\n', '2018-06-06 17:21:12', '2018-06-06 17:21:12', 1),
(4, 'Interesting', 1, 'seed_x:16.17675\nseed_y:5.863143\nseed_z:16.17675\nseed_tree_x:26.53397\nseed_tree_y:1.81876\nseed_tree_z:26.53397\nplayer_position_x:0\nplayer_position_z:0\nplayer_rotation_y:73.00002\ncamera_zoom:13.00171\n', '2018-06-07 13:13:04', '2018-06-07 13:13:04', 1),
(5, 'World place one', 1, 'seed_x:15.7\nseed_y:5.7\nseed_z:15.7\nseed_tree_x:8\nseed_tree_y:5\nseed_tree_z:8\nplayer_position_x:1.812566\nplayer_position_z:0.9001704\nplayer_rotation_y:45\ncamera_zoom:15\nresource_0:129\nresource_1:23\nresource_2:430\nTREE:2,9,-13|3,9,-13|2,9,-12|3,9,-12|4,9,-12|-8,9,-11|2,9,-11|3,9,-11|4,9,-11|8,12,-11|-9,9,-10|-8,9,-10|3,9,-10|4,9,-10|8,12,-10|9,12,-10|-10,9,-9|-9,9,-9|9,12,-9|10,12,-9|-11,9,-8|-10,9,-8|10,12,-8|11,12,-8|11,12,-7|12,12,-7|12,12,-6|12,12,-5|13,9,-5|12,12,-4|13,9,-4|11,12,-3|12,12,-3|13,12,-3|10,12,-2|11,12,-2|12,12,-2|13,9,-2|-11,9,-1|-10,9,-1|10,12,-1|11,12,-1|12,12,-1|13,9,-1|-12,9,0|-11,9,0|-10,9,0|10,12,0|11,12,0|12,9,0|13,9,0|-13,9,1|-12,9,1|-11,9,1|-10,9,1|10,12,1|11,9,1|12,9,1|13,9,1|-13,9,2|-12,9,2|-11,9,2|-10,9,2|10,12,2|11,9,2|12,9,2|13,9,2|-13,9,3|-12,9,3|-11,12,3|11,9,3|12,9,3|13,9,3|-13,12,4|-12,12,4|12,9,4|13,9,4|-13,12,5|-12,12,5|12,9,5|13,9,5|-12,12,6|12,9,6|-12,15,7|-11,15,7|11,12,7|12,9,7|-11,15,8|-10,15,8|10,12,8|11,12,8|-10,15,9|-9,12,9|-3,9,9|-1,9,9|1,9,9|2,12,9|9,15,9|10,12,9|-9,12,10|-8,12,10|-4,9,10|-3,9,10|-2,9,10|-1,9,10|0,9,10|1,9,10|2,12,10|3,12,10|4,12,10|8,15,10|9,15,10|-8,12,11|-4,9,11|-3,9,11|-2,9,11|-1,9,11|0,9,11|1,9,11|2,9,11|3,12,11|4,12,11|8,15,11|-4,9,12|-3,9,12|-2,9,12|-1,9,12|0,9,12|1,9,12|2,9,12|3,12,12|4,12,12|0,9,13|1,9,13|2,9,13|3,9,13|', '2018-06-07 21:37:12', '2018-06-07 21:37:12', 1),
(7, 'Large progress', 1, 'seed_x:15.7\nseed_y:5.7\nseed_z:15.7\nseed_tree_x:8\nseed_tree_y:5\nseed_tree_z:8\nplayer_position_x:5.63342\nplayer_position_z:-1.085129\nplayer_rotation_y:45\ncamera_zoom:11\nresource_2:4855\nresource_0:4\nresource_1:3\nresource_7:405\nTREE:2,9,-13|3,9,-13|2,9,-12|3,9,-12|4,9,-12|-8,9,-11|2,9,-11|3,9,-11|4,9,-11|8,12,-11|-9,9,-10|-8,9,-10|3,9,-10|4,9,-10|8,12,-10|9,12,-10|-10,9,-9|-9,9,-9|9,12,-9|10,12,-9|-11,9,-8|-10,9,-8|10,12,-8|11,12,-8|11,12,-7|12,12,-7|12,12,-6|12,12,-5|13,9,-5|12,12,-4|13,9,-4|11,12,-3|12,12,-3|13,12,-3|10,12,-2|11,12,-2|12,12,-2|13,9,-2|-11,9,-1|-10,9,-1|10,12,-1|11,12,-1|12,12,-1|13,9,-1|-12,9,0|-11,9,0|-10,9,0|10,12,0|11,12,0|12,9,0|13,9,0|-13,9,1|-12,9,1|-11,9,1|-10,9,1|10,12,1|11,9,1|12,9,1|13,9,1|-13,9,2|-12,9,2|-11,9,2|-10,9,2|10,12,2|11,9,2|12,9,2|13,9,2|-13,9,3|-12,9,3|-11,12,3|8,12,3|11,9,3|12,9,3|13,9,3|-13,12,4|-12,12,4|12,9,4|13,9,4|-13,12,5|-12,12,5|12,9,5|13,9,5|-12,12,6|12,9,6|-12,15,7|-11,15,7|11,12,7|12,9,7|-11,15,8|-10,15,8|10,12,8|11,12,8|-10,15,9|-9,12,9|-1,9,9|1,9,9|2,12,9|9,15,9|10,12,9|-9,12,10|-8,12,10|-4,9,10|-3,9,10|-2,9,10|-1,9,10|0,9,10|1,9,10|2,12,10|3,12,10|4,12,10|8,15,10|9,15,10|-8,12,11|-4,9,11|-3,9,11|-2,9,11|-1,9,11|0,9,11|1,9,11|2,9,11|3,12,11|4,12,11|8,15,11|-4,9,12|-3,9,12|-2,9,12|-1,9,12|0,9,12|1,9,12|2,9,12|3,12,12|4,12,12|0,9,13|1,9,13|2,9,13|3,9,13|\nBUILDINGS:generator*0,0,-13|pump_00*1,0,-13|pump_00*1,0,-12|pump_00*1,0,-11|charger*1,0,-6|spawner*3,0,-4|charger*5,0,-4|rocks*-11,0,-2|rocks*-10,0,-2|rocks*-9,0,-2|pump_01*9,0,-2|pump_03*-1,0,-1|pump_03*0,0,-1|pump_02*2,0,-1|pump_02*3,0,-1|spawner*5,270,-1|pump_01*9,0,-1|pump_02*1,0,0|pump_02*2,0,0|pump_01*3,0,0|pump_02*0,0,1|pump_02*1,0,1|pump_01*2,0,1|pump_01*3,0,1|pump_02*0,0,2|generator*-5,0,3|charger*-4,0,3|pump_00*0,0,3|pump_00*4,0,3|rocks*6,0,7|rocks*7,0,7|pump_03*8,0,7|spawner*-3,270,8|', '2018-06-07 22:55:04', '2018-06-07 22:55:04', 1);

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
(11, '9e5582490f7c666c01751bd68f0d116b3bf5e2a4c5ed5ef7d2630be22f429b12', 1, 3, '2018-06-04 10:47:01', '2019-05-26 09:47:01', '127.0.0.1'),
(14, 'a518b13d43bf35e3878df0b63e4e447009d354931f0c3eac1346cb267e4cf2aa', 1, 3, '2018-06-06 13:46:31', '2019-05-28 12:46:31', '127.0.0.1'),
(15, '966a753301f7135a305760c90cd08181aa04c1f8b12531bf170987ad657087d3', 1, 3, '2018-06-06 13:51:37', '2019-05-28 12:51:37', '127.0.0.1'),
(16, '59581dae2077b706f7dbc0a84fc1c8c2836f3b26869c28dcc2042e58365add04', 1, 3, '2018-06-06 13:56:43', '2019-05-28 12:56:43', '127.0.0.1'),
(17, 'bc12e1291bb0df99a4703610c25e1f70ff3ea1940d23c776d2ff145e13283161', 1, 3, '2018-06-06 13:56:57', '2019-05-28 12:56:57', '127.0.0.1'),
(18, '9d568e2d2ef1b8f6a10aa53f51a7cb8c3116407125f1efc368003dcd63555af5', 1, 3, '2018-06-06 16:59:43', '2019-05-28 15:59:43', '127.0.0.1'),
(19, '454033f50a42f31f6993cde223eff57bfd97f16d10805c71f0dfea1f515d9839', 1, 3, '2018-06-06 17:00:49', '2019-05-28 16:00:49', '127.0.0.1'),
(20, '21eee1ff06b334ac31704b7000ee17702865666a458ba3758e6625c8dc142490', 1, 3, '2018-06-06 17:01:38', '2019-05-28 16:01:38', '127.0.0.1'),
(21, '4b029ff65184ab301a26b6bf5f57689c55a009cf2414f3746a0deaeb49323fa8', 1, 3, '2018-06-06 17:12:08', '2019-05-28 16:12:08', '127.0.0.1'),
(22, 'ec9173fa9be093949031b6c3303e13d4187a0fb69d4b7b29e0aad987cd178e86', 1, 3, '2018-06-06 17:28:52', '2019-05-28 16:28:52', '127.0.0.1'),
(23, '8196a2edb943d1610550d4623cf9c315def48e4bfd0ea56cead60135de0bbb55', 1, 3, '2018-06-06 17:29:44', '2019-05-28 16:29:44', '127.0.0.1'),
(24, 'aac8207eb3c45ac8fd735c68b97b54569815eac132ce26440b300b43030ef399', 1, 3, '2018-06-06 17:36:33', '2019-05-28 16:36:33', '127.0.0.1'),
(25, 'ac4f0c7017966f64d3502bdbfba6339c50c1851cdc8a25d50c2f5f21052a89cd', 1, 3, '2018-06-06 17:40:42', '2019-05-28 16:40:42', '127.0.0.1'),
(26, '7c7366dfea760c7ff4e4497980e78c4a664774fd6e09a8f395b6ab44bf5f3f7c', 1, 3, '2018-06-07 11:33:18', '2019-05-29 10:33:18', '127.0.0.1'),
(27, 'c858d5daa2f68d96980957be76e61b107222d370c94ea412328f26fb2e99759e', 1, 3, '2018-06-07 11:54:45', '2019-05-29 10:54:45', '127.0.0.1'),
(28, 'c709d9299cfec6f0c219da5c3da39e8d71661f0b51042d97a92de5d975b5106a', 1, 3, '2018-06-07 13:12:06', '2019-05-29 12:12:06', '127.0.0.1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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
