-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Lug 26, 2023 alle 11:26
-- Versione del server: 5.7.34
-- Versione PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spottat_app`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `chats`
--

CREATE TABLE `chats` (
  `message_id` int(255) NOT NULL,
  `chat_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_id_receive` int(255) NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `chat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chat_hidden` varchar(10) COLLATE utf8mb4_bin NOT NULL DEFAULT '1',
  `chat_read` varchar(1) COLLATE utf8mb4_bin NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `chats`
--

INSERT INTO `chats` (`message_id`, `chat_id`, `user_id`, `user_id_receive`, `message`, `chat_time`, `chat_hidden`, `chat_read`) VALUES
(46, 36, 4, 1, 'Jj', '2015-11-18 20:46:29', '1', '1'),
(45, 38, 1, 6, 'eysyd', '2015-11-17 17:44:19', '1', '1'),
(44, 38, 1, 6, 'tes', '2015-11-17 17:24:03', '1', '1'),
(43, 36, 1, 4, 'igtu', '2015-11-16 16:54:52', '1', '1'),
(42, 36, 1, 4, 'jcgj', '2015-11-16 16:54:44', '1', '1'),
(41, 36, 1, 4, 'rdgh', '2015-11-16 16:54:18', '1', '1'),
(39, 35, 1, 4, 'test', '2015-11-16 15:53:25', '1', '0'),
(40, 36, 1, 4, 'tedt', '2015-11-16 16:54:11', '1', '1'),
(37, 35, 1, 4, 'k HF d5', '2015-11-16 12:38:57', '1', '1'),
(36, 35, 1, 4, 'mucca', '2015-11-16 12:38:54', '1', '1'),
(35, 35, 1, 4, 'ha DVD', '2015-11-16 12:38:46', '1', '1'),
(34, 35, 1, 4, 'tu?', '2015-11-16 12:28:09', '1', '1'),
(33, 35, 4, 1, 'up no', '2015-11-16 12:28:07', '1', '1'),
(32, 35, 1, 4, 'stai bene?', '2015-11-16 12:28:04', '1', '1'),
(31, 35, 4, 1, 'come ha', '2015-11-16 12:28:00', '1', '1'),
(30, 35, 4, 1, 'hey', '2015-11-16 12:27:55', '1', '1'),
(29, 35, 1, 4, 'djaa', '2015-11-16 12:27:42', '1', '1'),
(28, 35, 1, 4, 'gisis', '2015-11-16 12:27:30', '1', '1'),
(27, 35, 1, 4, 'vjsa', '2015-11-16 12:27:29', '1', '1'),
(26, 35, 1, 4, '5rit', '2015-11-16 12:27:26', '1', '1'),
(47, 36, 1, 4, 'hey', '2015-11-18 20:49:42', '1', '1'),
(48, 42, 5, 1, 'Ciao', '2015-11-19 20:34:12', '1', '1'),
(49, 42, 5, 1, 'Ciao', '2015-11-19 20:34:18', '1', '1');

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `comment_post_id` int(10) UNSIGNED NOT NULL,
  `comment_user_id` int(10) UNSIGNED NOT NULL,
  `comment_text` blob NOT NULL,
  `comment_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_status` int(10) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_user_id`, `comment_text`, `comment_timestamp`, `comment_status`) VALUES
(60, 29, 16, 0x72776172, '2023-03-02 07:34:42', 0),
(61, 29, 16, 0x74657374, '2023-03-02 07:37:19', 0),
(62, 29, 16, 0x74657374, '2023-03-02 07:40:37', 0),
(63, 29, 16, 0x54457374, '2023-03-02 09:14:18', 1),
(64, 30, 16, 0x7364667373676773, '2023-03-02 09:18:49', 1),
(65, 33, 16, 0x7774777374, '2023-03-04 11:43:22', 1),
(66, 34, 16, 0x72776172, '2023-03-16 11:01:00', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `device`
--

CREATE TABLE `device` (
  `device_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `device` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `device_SO` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `app_version` varchar(10) COLLATE utf8mb4_bin NOT NULL DEFAULT '1',
  `device_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `favourite_places`
--

CREATE TABLE `favourite_places` (
  `fav_place_id` int(10) UNSIGNED NOT NULL,
  `place_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fav_place_rates` int(10) NOT NULL,
  `fav_status` int(10) NOT NULL,
  `fav_place_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fav_place_hidden` varchar(1) COLLATE utf8mb4_bin NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `favourite_places`
--

INSERT INTO `favourite_places` (`fav_place_id`, `place_id`, `user_id`, `fav_place_rates`, `fav_status`, `fav_place_time`, `fav_place_hidden`) VALUES
(1, 3, 1, 0, 1, '2015-11-11 17:23:09', '1'),
(2, 1, 1, 0, 1, '2015-11-12 11:49:22', '1'),
(3, 1, 4, 0, 1, '2015-11-12 11:49:50', '1'),
(4, 1, 6, 0, 1, '2015-11-17 17:14:30', '1'),
(5, 8, 1, 0, 1, '2015-11-19 10:40:25', '1');

-- --------------------------------------------------------

--
-- Struttura della tabella `followers`
--

CREATE TABLE `followers` (
  `follower_id` int(255) NOT NULL,
  `follower_user_id` int(255) NOT NULL,
  `follow_user_id` int(255) NOT NULL,
  `follower_type` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `follower_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `follower_status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `followers`
--

INSERT INTO `followers` (`follower_id`, `follower_user_id`, `follow_user_id`, `follower_type`, `follower_timestamp`, `follower_status`) VALUES
(181, 16, 11, 'place', '2023-02-25 20:00:01', 0),
(194, 1, 3, 'place', '2023-03-01 16:05:31', 1),
(196, 1, 16, 'user', '2023-03-01 18:03:11', 1),
(197, 1, 3, 'user', '2023-03-01 18:08:12', 1),
(230, 16, 1, 'user', '2023-03-04 10:33:05', 3),
(231, 1, 17, 'user', '2023-03-04 20:10:00', 1),
(236, 1, 18, 'place', '2023-03-06 09:26:42', 1),
(237, 1, 17, 'place', '2023-03-07 16:28:56', 1),
(239, 1, 7, 'user', '2023-03-11 10:51:15', 1),
(241, 16, 17, 'user', '2023-03-16 11:11:46', 1),
(242, 17, 1, 'user', '2023-03-16 11:15:14', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `get_notifications`
--

CREATE TABLE `get_notifications` (
  `get_notifications` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `get_notifications_post_follow` int(255) NOT NULL,
  `get_notifications_type` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `get_notifications_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `get_notifications_hidden` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `images`
--

CREATE TABLE `images` (
  `images_id` int(255) NOT NULL,
  `images_file` varchar(10000) COLLATE utf8mb4_bin NOT NULL,
  `images_type` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `user_id` int(255) NOT NULL,
  `images_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `images_hidden` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `images`
--

INSERT INTO `images` (`images_id`, `images_file`, `images_type`, `user_id`, `images_timestamp`, `images_hidden`) VALUES
(39, '1440664644_3.jpeg', 'comment', 3, '2015-08-27 08:37:24', 1),
(40, '1442357328_3.png', '\"profile\"', 3, '2015-09-15 22:48:48', 1),
(41, '1442847436_3.jpeg', 'comment', 3, '2015-09-21 14:57:16', 1),
(42, '1442847447_3.jpeg', 'comment', 3, '2015-09-21 14:57:27', 1),
(43, 'file.jpg', 'spot', 1, '2023-02-26 19:35:33', 1),
(44, '1_1677440349.jpg', 'spot', 1, '2023-02-26 19:39:09', 1),
(45, '1_1677440539.jpg', 'spot', 1, '2023-02-26 19:42:19', 1),
(46, '1_1677440565.jpg', 'spot', 1, '2023-02-26 19:42:45', 1),
(47, '1_1677440743.jpg', 'spot', 1, '2023-02-26 19:45:43', 1),
(48, '1_1677440896.jpg', 'spot', 1, '2023-02-26 19:48:16', 1),
(49, '1_1677440933.jpg', 'spot', 1, '2023-02-26 19:48:53', 1),
(50, '16_1677580506.jpeg', 'spot', 16, '2023-02-28 10:35:06', 1),
(51, '16_1677580732.jpeg', 'spot', 16, '2023-02-28 10:38:52', 1),
(52, '16_1677658805.jpeg', 'spot', 16, '2023-03-01 08:20:05', 1),
(53, '1_1678897590.jpg', 'spot', 1, '2023-03-15 16:26:30', 1),
(54, '16_1678901543.jpg', 'spot', 16, '2023-03-15 17:32:23', 1),
(55, '16_1678901564.jpg', 'spot', 16, '2023-03-15 17:32:44', 1),
(56, '16_1678901617.jpg', 'spot', 16, '2023-03-15 17:33:37', 1),
(57, '16_1678901632.jpg', 'spot', 16, '2023-03-15 17:33:52', 1),
(58, '16_1678901670.jpg', 'spot', 16, '2023-03-15 17:34:30', 1),
(59, '16_1678901734.jpg', 'spot', 16, '2023-03-15 17:35:34', 1),
(60, '16_1678901783.jpg', 'spot', 16, '2023-03-15 17:36:23', 1),
(61, '16_1678901881.jpg', 'spot', 16, '2023-03-15 17:38:01', 1),
(62, '16_1678901885.jpg', 'spot', 16, '2023-03-15 17:38:05', 1),
(63, '16_1678901889.jpg', 'spot', 16, '2023-03-15 17:38:09', 1),
(64, '16_1678902010.jpg', 'spot', 16, '2023-03-15 17:40:10', 1),
(65, '16_1678902082.jpg', 'spot', 16, '2023-03-15 17:41:22', 1),
(66, '16_1678902154.jpg', 'spot', 16, '2023-03-15 17:42:34', 1),
(67, '16_1678902220.jpg', 'spot', 16, '2023-03-15 17:43:40', 1),
(68, '16_1678902806.jpg', 'profile', 16, '2023-03-15 17:53:26', 1),
(69, '17_1678965230.png', 'profile', 17, '2023-03-16 11:13:50', 1),
(70, '1_1678965467.jpg', 'profile', 1, '2023-03-16 11:17:47', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `likes`
--

CREATE TABLE `likes` (
  `like_id` int(255) UNSIGNED NOT NULL,
  `like_post_id` int(255) UNSIGNED NOT NULL,
  `like_user_id` int(255) UNSIGNED NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `like_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `like_status` varchar(1) COLLATE utf8mb4_bin NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `likes`
--

INSERT INTO `likes` (`like_id`, `like_post_id`, `like_user_id`, `type`, `like_timestamp`, `like_status`) VALUES
(53, 24, 1, 'post', '2023-02-22 17:51:33', '0'),
(54, 24, 3, 'comment', '2023-02-22 17:52:58', '1'),
(55, 1, 16, 'comment', '2023-02-22 17:53:36', '0'),
(56, 35, 16, 'comment', '2023-02-22 17:55:15', '0'),
(57, 1, 16, 'comment', '2023-02-22 17:56:11', '0'),
(58, 35, 16, 'comment', '2023-02-22 17:56:27', '0'),
(59, 35, 16, 'comment', '2023-02-22 17:57:17', '1'),
(60, 1, 16, 'comment', '2023-02-22 17:57:19', '0'),
(61, 38, 16, 'comment', '2023-02-22 18:48:07', '1'),
(62, 41, 16, 'comment', '2023-02-22 20:09:47', '1'),
(63, 1, 16, 'post', '2023-02-23 00:03:31', '1'),
(64, 44, 16, 'comment', '2023-02-23 16:18:52', '1'),
(47, 1, 16, 'post', '2023-02-22 11:13:01', '0'),
(51, 35, 16, 'post', '2023-02-22 11:25:35', '0'),
(50, 1, 16, 'post', '2023-02-22 11:21:58', '0'),
(52, 1, 16, 'comment', '2023-02-22 11:26:02', '0'),
(65, 1, 1, 'post', '2023-02-25 12:29:24', '0'),
(66, 2, 1, 'post', '2023-02-25 12:32:15', '0'),
(67, 1, 1, 'post', '2023-02-25 12:32:16', '0'),
(68, 1, 1, 'post', '2023-02-25 12:32:18', '0'),
(69, 1, 1, 'post', '2023-02-25 12:32:22', '0'),
(70, 1, 1, 'post', '2023-02-25 12:32:23', '1'),
(71, 44, 1, 'comment', '2023-02-27 16:50:54', '1'),
(72, 2, 1, 'post', '2023-02-27 17:00:49', '0'),
(73, 2, 1, 'post', '2023-02-27 17:01:17', '1'),
(74, 24, 1, 'post', '2023-02-27 17:37:54', '0'),
(75, 24, 1, 'post', '2023-02-27 17:43:49', '0'),
(76, 21, 1, 'post', '2023-02-28 06:42:00', '1'),
(77, 28, 1, 'post', '2023-02-28 09:11:07', '0'),
(78, 24, 16, 'post', '2023-02-28 10:20:33', '1'),
(79, 27, 16, 'post', '2023-02-28 17:12:11', '1'),
(80, 28, 16, 'post', '2023-03-01 07:30:49', '0'),
(81, 28, 16, 'post', '2023-03-01 07:51:43', '0'),
(82, 28, 16, 'post', '2023-03-01 07:54:03', '0'),
(83, 28, 16, 'post', '2023-03-01 07:56:48', '0'),
(84, 28, 16, 'post', '2023-03-01 07:59:30', '0'),
(85, 28, 16, 'post', '2023-03-01 07:59:33', '0'),
(86, 28, 16, 'post', '2023-03-01 07:59:55', '0'),
(87, 28, 3, 'post', '2023-02-28 09:11:07', '1'),
(88, 28, 16, 'post', '2023-03-01 08:06:45', '0'),
(89, 28, 7, 'post', '2023-03-01 08:06:45', '1'),
(90, 28, 16, 'post', '2023-03-01 08:07:53', '1'),
(91, 54, 16, 'comment', '2023-03-01 08:08:08', '1'),
(92, 32, 1, 'post', '2023-03-01 16:01:37', '1'),
(93, 29, 1, 'post', '2023-03-01 17:09:46', '0'),
(94, 30, 1, 'post', '2023-03-01 18:02:16', '1'),
(95, 28, 1, 'post', '2023-03-01 18:06:02', '1'),
(96, 64, 16, 'comment', '2023-03-02 09:18:50', '1'),
(97, 30, 16, 'post', '2023-03-04 11:43:03', '0'),
(98, 33, 16, 'post', '2023-03-04 11:43:05', '0'),
(99, 33, 16, 'post', '2023-03-04 11:43:30', '1'),
(100, 29, 1, 'post', '2023-03-09 11:42:25', '1');

-- --------------------------------------------------------

--
-- Struttura della tabella `nickname`
--

CREATE TABLE `nickname` (
  `nickname_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `nickname_old` varchar(40) COLLATE utf8mb4_bin NOT NULL,
  `nickname_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `nickname`
--

INSERT INTO `nickname` (`nickname_id`, `user_id`, `nickname_old`, `nickname_time`) VALUES
(1, 1, 'angelo', '2015-11-16 19:01:27');

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `notifiche_id` int(255) NOT NULL,
  `user_id_invia` int(255) NOT NULL,
  `user_id_riceve` int(255) NOT NULL,
  `spot_id` int(255) NOT NULL,
  `chat_id` int(255) NOT NULL,
  `notifica_tipo` int(255) NOT NULL,
  `notifica_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notifica_hidden` int(255) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `notifiche`
--

INSERT INTO `notifiche` (`notifiche_id`, `user_id_invia`, `user_id_riceve`, `spot_id`, `chat_id`, `notifica_tipo`, `notifica_time`, `notifica_hidden`) VALUES
(187, 5, 1, 12, 0, 5, '2015-11-20 12:46:46', 0),
(186, 1, 5, 12, 45, 1, '2015-11-20 12:40:58', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `places`
--

CREATE TABLE `places` (
  `place_id` int(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `place_id_four` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `place_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `place_latitude` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `place_longitude` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `place_address` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `place_city` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `place_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `place_hidden` int(10) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `places`
--

INSERT INTO `places` (`place_id`, `user_id`, `place_id_four`, `place_name`, `place_latitude`, `place_longitude`, `place_address`, `place_city`, `place_time`, `place_hidden`) VALUES
(1, 3, 'ChIJrUXReahwORMRDQvBPNc9tBQ', 'Corso Europa, 50, Caposele', '40.8157838', '15.2217354', 'Corso Europa, 50, Caposele', '', '2015-11-11 11:47:53', 1),
(2, 3, 'ChIJ2TdOz_2xw0cRB4B-IJ0QENY', 'Rasbeekstraat, 9, Herne', '50.7003757', '3.9910016', 'Rasbeekstraat, 9, Herne', '', '2015-11-11 12:23:03', 1),
(3, 1, 'ChIJN808eKhwORMRZ9YHtpAfjLM', 'Corso Europa, 46, Caposele', '40.8157468', '15.2216669', 'Corso Europa, 46, Caposele', '', '2015-11-11 16:27:18', 1),
(4, 1, 'ChIJPd6Ldq5wORMRxtpCBIzlA5s', 'Via Aldo Moro, 12, Piani', '40.8193573', '15.228358', 'Via Aldo Moro, 12, Piani', '', '2015-11-12 21:57:07', 1),
(5, 1, 'e1f223cf77c16b968c51c93bcba737f4db765876', 'Pizzeria La Sorgente', '40.818195', '15.2226869', 'Via Lungo Sele, 1, Caposele', '', '2015-11-14 20:41:45', 1),
(6, 4, 'b57b6729735484df359229b14af479fe6db52a92', 'Istituto Comprensivo Di Scuola Materna Elementare E Media Di Caposele', '40.8123879', '15.2255711', 'Via Pianello, Caposele', '', '2015-11-16 12:04:04', 1),
(7, 5, 'ChIJXdVRMBrWOxMRnAWwKyLiNmY', 'Via Pendino, 27, Montella', '40.8381042', '15.0228099', 'Via Pendino, 27, Montella', '', '2015-11-17 13:25:31', 1),
(8, 1, 'ChIJYYGp_RDWOxMRRC5gXd_pwq8', 'Via Giordano Bruno, 8, Montella', '40.8399385', '15.0179413', 'Via Giordano Bruno, 8, Montella', '', '2015-11-19 10:39:10', 1),
(9, 5, 'ChIJkW5w5A3WOxMRWrC4QYWofew', 'Via Verteglia, 93, Montella', '40.8441772', '15.0141553', 'Via Verteglia, 93, Montella', '', '2015-11-20 09:35:42', 1),
(10, 5, 'EixWaWEgVmVydGVnbGlhLCA3OCwgODMwNDggTW9udGVsbGEgQVYsIEl0YWxpYQ', 'Via Verteglia, 78, Montella', '40.8443527', '15.0129833', 'Via Verteglia, 78, Montella', '', '2015-11-20 16:15:40', 1),
(11, 5, 'ChIJhQfSlg3WOxMR9NoCPibDex0', 'Via Verteglia, 78, Montella', '60.8444252', '35.0129938', 'Via Verteglia, 78, Montella', '', '2023-03-01 11:10:30', 1),
(12, 1, '', 'FiXu', '40.8191365', '15.2289974', 'via Piani, Caposele AV', '', '2023-02-26 14:25:59', 1),
(13, 1, '', 'fiXu', '40.8191365', '15.2289974', 'via piani 14', 'Caposele Av', '2023-02-26 14:32:54', 1),
(14, 1, '', 'fiXu', '40.8191365', '15.2289974', 'via piani 14', 'Caposele Av', '2023-02-26 14:34:18', 1),
(15, 1, '', 'FiXu', '40.8191365', '15.2289974', 'via Piani', 'Caposele AV', '2023-02-26 14:36:29', 1),
(17, 1, '', 'Angelo Vitale Vitale', '51.9191365', '25.2689974', 'via Piani, 14', 'Caposele', '2023-03-01 10:51:20', 1),
(18, 1, '', 'Angelo Vitale Vitale', '40.8191365', '15.2289974', 'via Piani, 14', 'Caposele', '2023-02-26 14:38:38', 1),
(19, 1, '', 'Angelo Vitale Vitale', '40.8191365', '15.2289974', 'via Piani, 14', 'Caposele', '2023-02-26 14:39:21', 1),
(20, 1, '', 'Angelo Vitale Vitale', '40.8191365', '15.2289974', 'via Piani, 14', 'Caposele', '2023-02-26 14:39:28', 1),
(21, 1, '', 'Angelo Vitale Vitale', '40.8191365', '15.2289974', 'via Piani, 14', 'Caposele', '2023-02-26 14:39:36', 1),
(22, 1, '', 'Angelo Vitale Vitale', '40.8191365', '15.2289974', 'via Piani, 14', 'Caposele', '2023-02-26 14:40:02', 1),
(23, 16, '', 'Casa mia', '40.8190669', '15.2290056', 'via piani 14', 'Caposele (AV)', '2023-02-28 10:31:08', 1),
(24, 16, '', 'test', '40.8190138', '15.2289877', 'test', 'test', '2023-07-26 11:24:20', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `place_review_table`
--

CREATE TABLE `place_review_table` (
  `review_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `place_id` int(255) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `place_review_table`
--

INSERT INTO `place_review_table` (`review_id`, `user_id`, `place_id`, `user_rating`, `user_review`, `datetime`) VALUES
(14, 1, 1, 5, 'sdasda', 1677418078),
(15, 1, 2, 5, 'test', 1677418498),
(16, 1, 17, 5, 'rwrw', 1677686848),
(17, 1, 17, 3, 'hey', 1677687349),
(18, 1, 17, 1, 'test', 1677687363),
(19, 1, 17, 1, 'test', 1677687370),
(20, 16, 3, 5, 'rws', 1677753470),
(21, 1, 18, 5, 'test', 1678177435),
(22, 1, 18, 5, 'test', 1678177753),
(23, 1, 18, 5, 'test', 1678177863),
(24, 1, 18, 1, 'Hey', 1678177913),
(25, 1, 18, 5, 'sfgsfgdfg', 1678179750);

-- --------------------------------------------------------

--
-- Struttura della tabella `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `notifiche` int(10) NOT NULL DEFAULT '1',
  `notifiche_chat_all` int(10) NOT NULL DEFAULT '1',
  `range` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `email` int(10) NOT NULL DEFAULT '1',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `private_profile` int(2) NOT NULL DEFAULT '0',
  `page_last_login` int(3) NOT NULL,
  `user_latitude` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `user_longitude` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `profile_image` int(255) NOT NULL,
  `cover_image` int(255) NOT NULL,
  `language` varchar(45) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `spots`
--

CREATE TABLE `spots` (
  `spot_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `place_id` int(20) NOT NULL,
  `spot_text` blob NOT NULL,
  `spot_images_id` int(255) NOT NULL,
  `spot_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `spot_hashtag` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `spot_hidden` varchar(3) COLLATE utf8mb4_bin NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `spots`
--

INSERT INTO `spots` (`spot_id`, `user_id`, `place_id`, `spot_text`, `spot_images_id`, `spot_time`, `spot_hashtag`, `spot_hidden`) VALUES
(28, 16, 17, 0x4865792062756f6e6769726e6f20f09f9898, 0, '2023-03-01 17:10:40', '', '1'),
(29, 1, 17, 0x717765717765, 0, '2023-03-01 10:34:01', '', '1'),
(30, 3, 18, 0x40753136202053444141534b4c44207361647364614453532073616420, 52, '2023-03-07 08:54:47', '', '1'),
(31, 16, 17, 0x7166716620736467656667666420736664766164202020f09f9882e29da4efb88ff09f9892f09f98adf09f9882, 0, '2023-03-01 17:10:35', '', '1'),
(32, 16, 17, 0x65767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320657673762073206576737620732065767376207320, 0, '2023-03-01 17:10:38', '', '1'),
(33, 16, 18, 0x61646661647620617364737320f09f9892f09f9892f09f9882, 0, '2023-03-03 15:31:32', '', '1'),
(34, 1, 23, 0x64616664617366616466, 53, '2023-05-09 10:42:30', '', '0'),
(35, 17, 23, 0x486579, 0, '2023-03-16 11:14:12', '', '1');

-- --------------------------------------------------------

--
-- Struttura della tabella `spots_segnalati`
--

CREATE TABLE `spots_segnalati` (
  `segnalati_id` int(255) NOT NULL,
  `spot_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `segnalati_type` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `segnalati_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `segnalati_grade` int(5) NOT NULL,
  `segnalati_hidden` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `spots_segnalati`
--

INSERT INTO `spots_segnalati` (`segnalati_id`, `spot_id`, `user_id`, `segnalati_type`, `segnalati_time`, `segnalati_grade`, `segnalati_hidden`) VALUES
(1, 1, 1, 'post', '2015-11-11 16:26:25', 10, 1),
(2, 4, 1, 'comment', '2015-11-11 16:48:31', 10, 1),
(3, 1, 4, 'comment', '2015-11-12 09:26:28', 10, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `spotted_request`
--

CREATE TABLE `spotted_request` (
  `spotted_request_id` int(255) NOT NULL,
  `spotted_request_user_id` int(255) NOT NULL,
  `spotted_request_post_id` int(255) NOT NULL,
  `spotted_request_to_user_id` int(255) NOT NULL,
  `spotted_request_confirmed` varchar(20) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `spotted_request_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `spotted_request_status` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `spotted_request`
--

INSERT INTO `spotted_request` (`spotted_request_id`, `spotted_request_user_id`, `spotted_request_post_id`, `spotted_request_to_user_id`, `spotted_request_confirmed`, `spotted_request_timestamp`, `spotted_request_status`) VALUES
(27, 2, 24, 16, '1', '2023-02-28 10:16:07', 1),
(28, 1, 32, 16, '1', '2023-03-01 16:01:47', 1),
(29, 16, 30, 3, '1', '2023-03-01 18:02:25', 1),
(30, 1, 28, 16, '1', '2023-03-01 18:07:48', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `spot_send`
--

CREATE TABLE `spot_send` (
  `spot_send_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `spot_id` int(255) NOT NULL,
  `spot_send_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `spot_send_hidden` varchar(10) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='messaggiare';

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `address` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `contact` varchar(100) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `name` blob NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `bio` text COLLATE utf8mb4_bin,
  `img` int(255) NOT NULL DEFAULT '0',
  `private_profile` int(2) NOT NULL DEFAULT '0',
  `notifiche_all` int(2) NOT NULL DEFAULT '1',
  `notifiche_email` int(2) NOT NULL DEFAULT '1',
  `notifiche_nearby_spot` int(2) NOT NULL DEFAULT '1',
  `notifiche_radius` int(4) NOT NULL DEFAULT '2',
  `bubble_notfiche_status` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `user_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`user_id`, `email`, `address`, `contact`, `name`, `username`, `password`, `bio`, `img`, `private_profile`, `notifiche_all`, `notifiche_email`, `notifiche_nearby_spot`, `notifiche_radius`, `bubble_notfiche_status`, `status`, `user_timestamp`) VALUES
(1, 'a@a.it', '', '', 0x416e67656c6f20, 'angel', '12345', 'Bio.?<br>Spott@, ti connette con le persone che vedi.	Test', 70, 1, 1, 1, 1, 2, 0, 1, '2023-02-21 16:29:46'),
(2, 'user', '', '', 0x75736572, 'user89', '12345', 'Bio.😘<br>Spott@, ti connette con le persone che vedi.	', 0, 0, 1, 1, 1, 2, 0, 1, '2023-02-21 16:29:46'),
(3, 'aaa@a.it', '', '', '', 'aaa', '12345', 'Bio.<br>Spott@, ti connette con le persone che vedi.	', 0, 0, 1, 1, 1, 2, 0, 1, '2023-02-21 17:57:47'),
(7, 'vitale89@gmail.com', '', '', 0x616e67656c6f, 'angelo89', '12345', 'Bio.😘<br>Spott@, ti connette con le persone che vedi.	', 0, 0, 1, 1, 1, 2, 0, 1, '2023-02-21 16:29:46'),
(16, 'info@spottat.com', '', '', 0x64736473, 'vitale89', '12345', 'Bio.?<br>Spott@, ti connette con le persone che vedi.	', 68, 0, 1, 1, 1, 2, 0, 1, '2023-02-22 08:24:56'),
(17, 'info@spottat.it', '', '', 0x56696e63656e7a6f38, 'vincenzo', '12345', 'Bio.<br>Spott@, ti connette con le persone che vedi.	', 69, 0, 1, 1, 1, 2, 0, 1, '2023-02-22 08:51:18'),
(18, 'mirko@mirko.it', '', '', 0x6d69726b6f, 'mirko', '12345', NULL, 0, 0, 1, 1, 1, 2, 0, 1, '2023-03-08 09:33:35');

-- --------------------------------------------------------

--
-- Struttura della tabella `users_block`
--

CREATE TABLE `users_block` (
  `block_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_block` int(255) NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `users_locations`
--

CREATE TABLE `users_locations` (
  `users_locations_id` int(255) NOT NULL,
  `users_locations_user_id` int(255) NOT NULL,
  `users_locations_latitude` float NOT NULL,
  `users_locations_longitude` float NOT NULL,
  `users_locations_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `users_locations`
--

INSERT INTO `users_locations` (`users_locations_id`, `users_locations_user_id`, `users_locations_latitude`, `users_locations_longitude`, `users_locations_timestamp`) VALUES
(1, 1, 41.7759, 12.7009, '2023-03-01 17:19:58'),
(2, 1, 41.7759, 12.7009, '2023-03-01 17:20:40'),
(3, 1, 41.7759, 12.7009, '2023-03-01 17:20:43'),
(4, 1, 41.7759, 12.7009, '2023-03-01 17:23:43'),
(5, 1, 41.7759, 12.7009, '2023-03-01 17:23:44'),
(6, 1, 41.7759, 12.7009, '2023-03-01 17:24:32'),
(7, 1, 41.7759, 12.7009, '2023-03-01 17:24:33'),
(8, 1, 41.7759, 12.7009, '2023-03-01 18:04:03'),
(9, 1, 41.7759, 12.7009, '2023-03-01 18:04:20'),
(10, 1, 41.7759, 12.7009, '2023-03-01 18:05:42'),
(11, 1, 40.8191, 15.229, '2023-03-01 18:08:18'),
(12, 1, 40.8191, 15.229, '2023-03-01 18:09:47'),
(13, 1, 41.7759, 12.7009, '2023-03-01 18:10:22'),
(14, 1, 41.7759, 12.7009, '2023-03-01 18:13:31'),
(15, 1, 41.7759, 12.7009, '2023-03-02 07:10:52'),
(16, 1, 40.8191, 15.229, '2023-03-02 07:11:24'),
(17, 1, 40.8191, 15.229, '2023-03-02 07:11:28'),
(18, 1, 40.8191, 15.229, '2023-03-02 07:13:20'),
(19, 1, 40.8191, 15.229, '2023-03-02 07:13:23'),
(20, 1, 40.8191, 15.229, '2023-03-02 07:14:18'),
(21, 1, 40.8191, 15.229, '2023-03-02 07:14:19'),
(22, 1, 40.8191, 15.229, '2023-03-02 07:15:00'),
(23, 1, 40.8191, 15.229, '2023-03-02 07:16:02'),
(24, 1, 40.8191, 15.229, '2023-03-02 07:16:09'),
(25, 1, 40.8191, 15.229, '2023-03-02 07:16:12'),
(26, 1, 40.8191, 15.229, '2023-03-02 07:16:25'),
(27, 1, 40.8191, 15.229, '2023-03-02 07:16:29'),
(28, 1, 40.8191, 15.229, '2023-03-02 07:17:51'),
(29, 1, 40.8191, 15.229, '2023-03-02 07:17:54'),
(30, 16, 40.8191, 15.229, '2023-03-02 07:32:54'),
(31, 16, 40.8191, 15.229, '2023-03-02 07:32:56'),
(32, 16, 40.8191, 15.229, '2023-03-02 07:42:12'),
(33, 16, 40.8191, 15.229, '2023-03-02 07:42:15'),
(34, 16, 40.8191, 15.229, '2023-03-02 07:43:15'),
(35, 16, 40.8191, 15.229, '2023-03-02 07:43:17'),
(36, 16, 40.8191, 15.229, '2023-03-02 07:43:27'),
(37, 16, 40.8191, 15.229, '2023-03-02 07:43:28'),
(38, 16, 40.8191, 15.229, '2023-03-02 07:44:31'),
(39, 16, 40.8191, 15.229, '2023-03-02 07:44:32'),
(40, 16, 40.8191, 15.229, '2023-03-02 07:44:41'),
(41, 16, 40.8191, 15.229, '2023-03-02 07:44:42'),
(42, 16, 40.8191, 15.229, '2023-03-02 07:45:08'),
(43, 16, 40.8191, 15.229, '2023-03-02 07:45:10'),
(44, 16, 40.8191, 15.229, '2023-03-02 07:45:27'),
(45, 16, 40.8191, 15.229, '2023-03-02 07:45:30'),
(46, 16, 40.8191, 15.229, '2023-03-02 07:45:48'),
(47, 16, 40.8191, 15.229, '2023-03-02 07:45:49'),
(48, 16, 40.8191, 15.229, '2023-03-02 07:49:16'),
(49, 16, 40.8191, 15.229, '2023-03-02 07:49:48'),
(50, 16, 40.8191, 15.229, '2023-03-02 07:49:49'),
(51, 16, 40.8191, 15.229, '2023-03-02 07:50:17'),
(52, 16, 40.8191, 15.229, '2023-03-02 07:50:18'),
(53, 16, 40.8191, 15.229, '2023-03-02 07:51:11'),
(54, 16, 40.8191, 15.229, '2023-03-02 07:51:12'),
(55, 16, 40.8191, 15.229, '2023-03-02 07:51:36'),
(56, 16, 40.8191, 15.229, '2023-03-02 07:52:36'),
(57, 16, 40.8191, 15.229, '2023-03-02 07:53:36'),
(58, 16, 40.8191, 15.229, '2023-03-02 07:53:37'),
(59, 16, 40.8191, 15.229, '2023-03-02 07:56:26'),
(60, 16, 40.8191, 15.229, '2023-03-02 07:56:40'),
(61, 16, 40.8191, 15.229, '2023-03-02 07:56:45'),
(62, 16, 40.8191, 15.229, '2023-03-02 07:58:10'),
(63, 16, 40.8191, 15.229, '2023-03-02 07:58:15'),
(64, 16, 40.8191, 15.229, '2023-03-02 07:59:31'),
(65, 16, 40.8191, 15.229, '2023-03-02 08:00:36'),
(66, 16, 40.8191, 15.229, '2023-03-02 08:01:29'),
(67, 16, 40.8191, 15.229, '2023-03-02 08:01:33'),
(68, 16, 40.8191, 15.229, '2023-03-02 08:02:49'),
(69, 16, 40.8191, 15.229, '2023-03-02 08:05:08'),
(70, 16, 40.8191, 15.229, '2023-03-02 08:05:46'),
(71, 16, 40.8191, 15.229, '2023-03-02 08:05:48'),
(72, 16, 40.8191, 15.229, '2023-03-02 09:19:55'),
(73, 16, 40.8191, 15.229, '2023-03-02 09:20:01'),
(74, 16, 41.7759, 12.7009, '2023-03-02 09:20:27'),
(75, 16, 41.7759, 12.7009, '2023-03-02 16:07:20'),
(76, 16, 40.8191, 15.229, '2023-03-02 22:05:51'),
(77, 16, 41.7759, 12.7009, '2023-03-03 08:13:09'),
(78, 16, 41.7759, 12.7009, '2023-03-03 08:14:01'),
(79, 16, 41.7759, 12.7009, '2023-03-03 11:45:23'),
(80, 16, 40.8191, 15.229, '2023-03-03 12:20:17'),
(81, 16, 40.8191, 15.229, '2023-03-03 15:31:33'),
(82, 16, 41.7759, 12.7009, '2023-03-03 16:09:12'),
(83, 16, 41.7759, 12.7009, '2023-03-03 17:35:07'),
(84, 16, 41.7759, 12.7009, '2023-03-03 17:35:08'),
(85, 16, 40.8191, 15.229, '2023-03-04 10:52:00'),
(86, 16, 40.8191, 15.229, '2023-03-04 10:53:40'),
(87, 16, 40.8191, 15.229, '2023-03-04 10:53:41'),
(88, 16, 40.8191, 15.229, '2023-03-04 10:53:42'),
(89, 16, 40.8191, 15.229, '2023-03-04 10:53:42'),
(90, 16, 40.8191, 15.229, '2023-03-04 10:53:43'),
(91, 16, 40.8191, 15.229, '2023-03-04 10:53:43'),
(92, 16, 40.8191, 15.229, '2023-03-04 10:53:44'),
(93, 16, 40.8191, 15.229, '2023-03-04 10:53:44'),
(94, 16, 40.8191, 15.229, '2023-03-04 10:53:45'),
(95, 16, 40.8191, 15.229, '2023-03-04 10:53:45'),
(96, 16, 40.8191, 15.229, '2023-03-04 10:53:46'),
(97, 16, 40.8191, 15.229, '2023-03-04 10:53:46'),
(98, 16, 40.8191, 15.229, '2023-03-04 10:53:51'),
(99, 16, 40.8191, 15.229, '2023-03-04 10:53:52'),
(100, 16, 40.8191, 15.229, '2023-03-04 10:53:52'),
(101, 16, 40.8191, 15.229, '2023-03-04 10:54:00'),
(102, 16, 40.8191, 15.229, '2023-03-04 10:54:00'),
(103, 16, 40.8191, 15.229, '2023-03-04 10:54:01'),
(104, 16, 40.8191, 15.229, '2023-03-04 10:54:01'),
(105, 16, 40.8191, 15.229, '2023-03-04 10:54:02'),
(106, 16, 40.8191, 15.229, '2023-03-04 10:54:02'),
(107, 16, 40.8191, 15.229, '2023-03-04 10:54:02'),
(108, 16, 40.8191, 15.229, '2023-03-04 10:54:03'),
(109, 16, 40.8191, 15.229, '2023-03-04 10:54:03'),
(110, 16, 40.8191, 15.229, '2023-03-04 10:54:04'),
(111, 16, 40.8191, 15.229, '2023-03-04 10:54:04'),
(112, 16, 40.8191, 15.229, '2023-03-04 10:54:05'),
(113, 16, 40.8191, 15.229, '2023-03-04 10:54:05'),
(114, 16, 40.8191, 15.229, '2023-03-04 10:54:09'),
(115, 16, 41.7759, 12.7009, '2023-03-04 10:54:30'),
(116, 16, 40.8191, 15.229, '2023-03-04 10:54:41'),
(117, 16, 40.8191, 15.229, '2023-03-04 11:07:37'),
(118, 16, 40.8191, 15.229, '2023-03-04 11:07:44'),
(119, 16, 41.7759, 12.7009, '2023-03-04 11:07:48'),
(120, 16, 41.7759, 12.7009, '2023-03-04 11:08:05'),
(121, 16, 41.7759, 12.7009, '2023-03-04 11:08:18'),
(122, 16, 41.7759, 12.7009, '2023-03-04 11:09:50'),
(123, 16, 51.4826, -0.007661, '2023-03-04 11:11:22'),
(124, 16, 40.8191, 15.229, '2023-03-04 11:12:36'),
(125, 16, 40.8191, 15.229, '2023-03-04 11:13:22'),
(126, 16, 40.8191, 15.229, '2023-03-04 11:14:03'),
(127, 16, 40.8191, 15.229, '2023-03-04 11:14:13'),
(128, 16, 40.8191, 15.229, '2023-03-04 11:16:16'),
(129, 16, 40.8191, 15.229, '2023-03-04 11:27:41'),
(130, 16, 40.8191, 15.229, '2023-03-04 11:32:23'),
(131, 16, 40.8191, 15.229, '2023-03-04 11:32:26'),
(132, 16, 40.8191, 15.229, '2023-03-04 11:32:42'),
(133, 16, 40.8191, 15.229, '2023-03-04 11:34:04'),
(134, 16, 40.8191, 15.229, '2023-03-04 11:38:52'),
(135, 16, 40.8191, 15.229, '2023-03-04 11:40:02'),
(136, 16, 40.8191, 15.229, '2023-03-04 11:40:33'),
(137, 16, 40.8191, 15.229, '2023-03-04 11:40:48'),
(138, 16, 40.8191, 15.229, '2023-03-04 11:41:17'),
(139, 16, 41.7759, 12.7009, '2023-03-04 11:41:49'),
(140, 16, 40.8191, 15.229, '2023-03-04 11:42:00'),
(141, 16, 40.8191, 15.229, '2023-03-04 11:42:02'),
(142, 16, 40.8191, 15.229, '2023-03-04 11:42:07'),
(143, 16, 40.8191, 15.229, '2023-03-04 11:42:08'),
(144, 16, 40.8191, 15.229, '2023-03-04 11:43:25'),
(145, 16, 40.8191, 15.229, '2023-03-04 11:43:32'),
(146, 16, 40.8191, 15.229, '2023-03-04 11:43:33'),
(147, 16, 40.8191, 15.229, '2023-03-04 11:43:37'),
(148, 16, 40.8191, 15.229, '2023-03-04 11:43:38'),
(149, 16, 40.8191, 15.229, '2023-03-04 11:46:31'),
(150, 16, 40.8191, 15.229, '2023-03-04 11:46:34'),
(151, 16, 41.7759, 12.7009, '2023-03-04 11:46:50'),
(152, 16, 41.7759, 12.7009, '2023-03-04 11:46:53'),
(153, 1, 40.8191, 15.229, '2023-03-04 19:53:43'),
(154, 1, 40.8191, 15.229, '2023-03-04 19:53:53'),
(155, 1, 40.8191, 15.229, '2023-03-05 10:05:52'),
(156, 1, 40.8191, 15.229, '2023-03-05 18:53:20'),
(157, 1, 40.8191, 15.229, '2023-03-05 18:54:04'),
(158, 1, 40.8191, 15.229, '2023-03-05 18:54:07'),
(159, 1, 40.8191, 15.229, '2023-03-06 09:22:21'),
(160, 1, 40.8191, 15.229, '2023-03-06 09:22:27'),
(161, 1, 41.7331, 13.5784, '2023-03-06 11:37:53'),
(162, 1, 41.7331, 13.5784, '2023-03-06 11:38:10'),
(163, 1, 41.7331, 13.5784, '2023-03-07 07:29:37'),
(164, 1, 41.7331, 13.5784, '2023-03-07 09:01:54'),
(165, 1, 41.7331, 13.5784, '2023-03-07 09:01:55'),
(166, 1, 41.7331, 13.5784, '2023-03-07 09:02:04'),
(167, 1, 41.7331, 13.5784, '2023-03-07 09:02:20'),
(168, 1, 41.7331, 13.5784, '2023-03-07 11:23:05'),
(169, 1, 41.7331, 13.5784, '2023-03-07 16:29:26'),
(170, 1, 40.8191, 15.229, '2023-03-07 16:35:10'),
(171, 1, 40.8191, 15.229, '2023-03-07 18:52:47'),
(172, 1, 40.8191, 15.229, '2023-03-07 18:53:03'),
(173, 1, 40.8191, 15.229, '2023-03-07 18:55:03'),
(174, 1, 40.8191, 15.229, '2023-03-07 18:55:11'),
(175, 16, 40.8191, 15.229, '2023-03-08 11:40:37'),
(176, 1, 40.8191, 15.229, '2023-03-09 10:48:24'),
(177, 1, 40.8191, 15.229, '2023-03-09 11:42:32'),
(178, 1, 40.8191, 15.229, '2023-03-09 11:44:40'),
(179, 1, 40.819, 15.229, '2023-03-11 10:48:58'),
(180, 1, 40.819, 15.229, '2023-03-11 11:39:31'),
(181, 1, 40.819, 15.229, '2023-03-11 16:18:40'),
(182, 1, 40.819, 15.229, '2023-03-11 16:19:19'),
(183, 1, 40.819, 15.229, '2023-03-11 16:19:28'),
(184, 1, 40.819, 15.229, '2023-03-11 16:19:33'),
(185, 1, 40.819, 15.229, '2023-03-15 16:25:52'),
(186, 1, 40.819, 15.229, '2023-03-15 16:26:30'),
(187, 16, 40.8595, 14.7404, '2023-03-15 17:29:45'),
(188, 16, 40.8595, 14.7404, '2023-03-15 17:55:58'),
(189, 16, 40.819, 15.229, '2023-03-16 11:00:56'),
(190, 16, 40.819, 15.229, '2023-03-16 11:11:27'),
(191, 16, 40.819, 15.229, '2023-03-16 11:11:29'),
(192, 16, 40.819, 15.229, '2023-03-16 11:11:32'),
(193, 17, 40.819, 15.229, '2023-03-16 11:14:02'),
(194, 17, 40.8595, 14.7404, '2023-03-16 11:14:12'),
(195, 17, 40.8595, 14.7404, '2023-03-16 11:14:20'),
(196, 17, 40.8595, 14.7404, '2023-03-16 11:15:04'),
(197, 17, 40.8595, 14.7404, '2023-03-16 11:15:08'),
(198, 1, 40.8595, 14.7404, '2023-03-16 11:16:48'),
(199, 1, 40.8595, 14.7404, '2023-03-17 08:33:55'),
(200, 1, 40.8595, 14.7404, '2023-03-17 08:33:59'),
(201, 1, 40.8595, 14.7404, '2023-03-17 08:34:19'),
(202, 1, 40.8595, 14.7404, '2023-03-17 08:34:25'),
(203, 1, 40.819, 15.229, '2023-03-17 08:36:15'),
(204, 1, 40.8595, 14.7404, '2023-03-17 08:37:38'),
(205, 1, 40.8595, 14.7404, '2023-03-17 08:37:42'),
(206, 1, 40.819, 15.229, '2023-03-17 08:38:53'),
(207, 1, 40.819, 15.229, '2023-03-17 08:39:01'),
(208, 1, 40.819, 15.229, '2023-03-17 08:39:03'),
(209, 1, 40.819, 15.229, '2023-03-17 08:39:03'),
(210, 17, 40.819, 15.229, '2023-03-17 08:39:26'),
(211, 17, 40.819, 15.229, '2023-03-17 08:39:30'),
(212, 17, 40.819, 15.229, '2023-03-17 08:39:32'),
(213, 17, 40.819, 15.229, '2023-03-17 08:40:49'),
(214, 17, 40.819, 15.229, '2023-03-17 08:43:58'),
(215, 17, 40.819, 15.229, '2023-03-17 08:44:42'),
(216, 17, 40.8595, 14.7404, '2023-03-17 08:46:34'),
(217, 17, 40.8595, 14.7404, '2023-03-17 09:00:16'),
(218, 17, 40.819, 15.229, '2023-03-17 09:00:33'),
(219, 17, 40.819, 15.229, '2023-03-17 09:02:40'),
(220, 17, 40.819, 15.229, '2023-03-17 09:30:44'),
(221, 1, 40.8191, 15.229, '2023-03-23 05:30:27'),
(222, 16, 40.819, 15.229, '2023-07-26 07:32:06'),
(223, 16, 41.8414, 12.817, '2023-07-26 08:33:58'),
(224, 16, 41.8414, 12.817, '2023-07-26 08:34:05'),
(225, 16, 40.819, 15.229, '2023-07-26 11:21:17');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`message_id`);

--
-- Indici per le tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_spot_id_idx` (`comment_post_id`),
  ADD KEY `fk_user_id_idx` (`comment_user_id`),
  ADD KEY `COMMENT_TIME` (`comment_timestamp`);

--
-- Indici per le tabelle `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indici per le tabelle `favourite_places`
--
ALTER TABLE `favourite_places`
  ADD PRIMARY KEY (`fav_place_id`),
  ADD KEY `fk_spot_id_idx` (`place_id`),
  ADD KEY `fk_user_id_idx` (`user_id`),
  ADD KEY `LIKE_TIME` (`fav_place_time`);

--
-- Indici per le tabelle `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`follower_id`);

--
-- Indici per le tabelle `get_notifications`
--
ALTER TABLE `get_notifications`
  ADD PRIMARY KEY (`get_notifications`);

--
-- Indici per le tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`images_id`);

--
-- Indici per le tabelle `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `fk_spot_id_idx` (`like_post_id`),
  ADD KEY `fk_user_id_idx` (`like_user_id`),
  ADD KEY `LIKE_TIME` (`like_timestamp`);

--
-- Indici per le tabelle `nickname`
--
ALTER TABLE `nickname`
  ADD PRIMARY KEY (`nickname_id`);

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`notifiche_id`);

--
-- Indici per le tabelle `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indici per le tabelle `place_review_table`
--
ALTER TABLE `place_review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indici per le tabelle `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `setting_id_UNIQUE` (`setting_id`);

--
-- Indici per le tabelle `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`spot_id`),
  ADD KEY `SPOT_TIME` (`spot_time`),
  ADD KEY `fk_spots_1_idx` (`user_id`);

--
-- Indici per le tabelle `spots_segnalati`
--
ALTER TABLE `spots_segnalati`
  ADD PRIMARY KEY (`segnalati_id`);

--
-- Indici per le tabelle `spotted_request`
--
ALTER TABLE `spotted_request`
  ADD PRIMARY KEY (`spotted_request_id`);

--
-- Indici per le tabelle `spot_send`
--
ALTER TABLE `spot_send`
  ADD PRIMARY KEY (`spot_send_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indici per le tabelle `users_block`
--
ALTER TABLE `users_block`
  ADD PRIMARY KEY (`block_id`);

--
-- Indici per le tabelle `users_locations`
--
ALTER TABLE `users_locations`
  ADD PRIMARY KEY (`users_locations_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `chats`
--
ALTER TABLE `chats`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT per la tabella `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT per la tabella `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT per la tabella `favourite_places`
--
ALTER TABLE `favourite_places`
  MODIFY `fav_place_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `followers`
--
ALTER TABLE `followers`
  MODIFY `follower_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT per la tabella `get_notifications`
--
ALTER TABLE `get_notifications`
  MODIFY `get_notifications` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `images`
--
ALTER TABLE `images`
  MODIFY `images_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT per la tabella `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT per la tabella `nickname`
--
ALTER TABLE `nickname`
  MODIFY `nickname_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  MODIFY `notifiche_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT per la tabella `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `place_review_table`
--
ALTER TABLE `place_review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT per la tabella `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `spots`
--
ALTER TABLE `spots`
  MODIFY `spot_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `spots_segnalati`
--
ALTER TABLE `spots_segnalati`
  MODIFY `segnalati_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `spotted_request`
--
ALTER TABLE `spotted_request`
  MODIFY `spotted_request_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `spot_send`
--
ALTER TABLE `spot_send`
  MODIFY `spot_send_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `users_block`
--
ALTER TABLE `users_block`
  MODIFY `block_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users_locations`
--
ALTER TABLE `users_locations`
  MODIFY `users_locations_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
