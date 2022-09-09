-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2022 at 09:48 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u269128924_planethopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `phtv_admin`
--

CREATE TABLE `phtv_admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_avatar` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_phone_number` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phtv_admin`
--

INSERT INTO `phtv_admin` (`id`, `admin_name`, `admin_email`, `admin_avatar`, `admin_password`, `admin_phone_number`, `created`, `updated`) VALUES
(1, 'PlanetTV', 'admin@gmail.com', '220431like.png', 'e10adc3949ba59abbe56e057f20f883e', '9876543211', '2022-01-06 10:13:09', '2022-02-09 20:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_banner`
--

CREATE TABLE `phtv_banner` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `link_type` int(11) NOT NULL DEFAULT 0 COMMENT '1:Image, 2:Video, 3:Pdf, 4:url',
  `banner_type` int(11) NOT NULL DEFAULT 0 COMMENT '1:Header, 2:Footer',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_banner`
--

INSERT INTO `phtv_banner` (`id`, `page_id`, `title`, `description`, `image`, `link`, `link_type`, `banner_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Check Out High Voltage Our Flagship show', '', '764753SBv4T.gif', 'https://google.com', 1, 2, '2022-05-20 21:50:01', '2022-05-24 15:37:57'),
(2, 2, 'Check Out High Voltage Our Flagship show', '', '704681album_2.jpg', 'https://google.com', 1, 1, '2022-05-24 22:52:06', NULL),
(3, 2, 'Check Out High Voltage Our Flagship show', '', '945649album_3.jpg', 'https://google.com', 1, 2, '2022-05-24 22:52:31', NULL),
(4, 3, 'Check Out High Voltage Our Flagship show', '', '304170317709chinemaAA.jpg', 'https://google.com', 1, 2, '2022-05-24 23:00:03', NULL),
(5, 4, 'Check Out High Voltage Our Flagship show', '', '843930775641chinemaB.jpg', 'https://google.com', 1, 2, '2022-05-24 23:05:53', NULL),
(6, 5, 'Check Out High Voltage Our Flagship show', '', '652159785566ssa.jpg', 'https://google.com', 1, 2, '2022-05-24 23:07:56', NULL),
(7, 6, 'Check Out High Voltage Our Flagship show', '', '528729products_banner.jpg', 'https://google.com', 1, 2, '2022-05-24 23:11:53', NULL),
(8, 7, 'Check Out High Voltage Our Flagship show', '', '38630crew_picksssC.jpg', 'https://google.com', 1, 2, '2022-05-24 23:18:25', NULL),
(9, 8, 'Check Out High Voltage Our Flagship show', '', '639505videoss.jpg', 'https://google.com', 1, 2, '2022-05-24 23:20:45', NULL),
(10, 9, 'Check Out High Voltage Our Flagship show', '', '358393album_10.jpg', 'https://google.com', 1, 2, '2022-05-24 23:24:12', NULL),
(11, 10, 'Check Out High Voltage Our Flagship show', '', '282709crew_picksssB.jpg', 'https://google.com', 1, 2, '2022-05-24 23:27:39', NULL),
(12, 11, 'Check Out High Voltage Our Flagship show', '', '372770album_18.jpg', 'https://google.com', 1, 2, '2022-05-24 23:33:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog`
--

CREATE TABLE `phtv_blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `auther_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_blog`
--

INSERT INTO `phtv_blog` (`id`, `title`, `sub_title`, `description`, `image`, `video`, `auther_id`, `category_id`, `likes`, `dislikes`, `created_at`, `updated_at`) VALUES
(5, 'VANESSA BRYANT AND', 'Michael Jordan Reminiscence on Kobe Bryant', '<p>Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant. Following the passing of Gigi Bryant and Kobe Bryant, the memorial was decorated in purple and yellow flowers. In the beginning of the ceremony, Beyoncé lead</p>', '663265blog_imagesG.jpg', NULL, 4, 1, 17, 8, '2022-03-27 05:17:56', '2022-03-29 15:24:02'),
(6, 'NEW ALBUM DROP!', 'KIKI – KIANA LEDE’S DEBUT ALBUM!', '<p>(image: www.kianalede.com) So remember Kidz Bop? Well one of those voices has grown up and today we know her as Kiana Lede! She won the competition Kidz Star USA 2011, but eventually evolved to partnering with Mike Woods putting a series of videos</p>', '610530Game3.png', NULL, 4, 1, 0, 0, '2022-03-27 05:20:05', NULL),
(7, '10 THINGS TO DO', 'Under Quarantine!', '<p>photo via opencolleges.edu. au So far, 2020 has been quite a year, and we’re only 3 months in! I know it seems hectic rightnow, with everything going on, due to the coronavirus. However, while we are in quarantine, there are things that we can do to keep ourselves busy, in this chaotic time. Here are a list of things</p>', '329171blog_imagesB.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:20:55', NULL),
(8, 'COOL THINGS', 'to Do Before 30', '<p>If you’re still in your 20’s, the best thing to do is live your life to the fullest. I’m sure you’ve probably heard this before, but it’s true. You’re only 20-29 one time in your life, so why not create some memories. Being in your 20’s is the time to make mistakes, go crazy, create memories, and be</p>', '638460blog_imagesC.jpg', NULL, 4, 1, 3, 1, '2022-03-27 05:21:44', '2022-03-27 12:48:49'),
(9, '7 SIMPLE WAYS', 'to Get Over a Crush', '<p>We’ve all had a crush sometime in our life, like Molly Ringwald in “16 Candles .” Like Samantha Baker, we all have a Jake Ryan in our life, who we want to be with, but for some reason, he doesn’t seem to notice us. Having a crush isn’t easy, and sometimes leads to heartbreak. Not to worry, my friends. We will</p>', '408280blogA.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:22:34', NULL),
(10, '10 GREAT REASONS', '10 Great Reasons Not to Give a', '<p>photo via dumblittleman. com Have you ever been criticized by people, to the point that it messes with your head? You start to think you’re crazy, because everyone is against you. You start believing what people are saying, and think that maybe something’s wrong with you. Trust me, I’ve been there before. Not only does it become an easier</p>', '170481blog_imagesE.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:23:16', NULL),
(11, 'WHY YOU SHOULD STOP', 'Comparing Yourself to Others', '<p>photo via casnocha.com Comparing yourself to others might sounds easier said than done, but I get it. I’ve been there before. As a matter of fact, I’m still here. This past week, I’ve struggled with insecurities, becauseI felt like I wasn’t as pretty or curvy as the young woman who works with me. Guys like her, and I’m</p>', '947928blog_imagesF.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:24:02', NULL),
(12, 'POP SMOKE WAS', 'Brooklyn’s Hero', '<p>photo via StereoGum Today, around the time of 4:30 am, rapper Pop Smoke was killed in his Hollywood Hills home. The funny thing is, rappers usually get killed in their own hometown, not in another. Pop is from Brooklyn, New York, and happened to be killed in Los Angeles. It get’s tiring to say, “Rest in peace,” to these young</p>', '406602blog_imagesS.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:24:38', NULL),
(13, 'NEW ALBUM DROP!', 'KIKI – KIANA LEDE’S DEBUT ALBUM!', '<p>(image: www.kianalede.com) So remember Kidz Bop? Well one of those voices has grown up and today we know her as Kiana Lede! She won the competition Kidz Star USA 2011, but eventually evolved to partnering with Mike Woods putting a series of videos</p>', '775076blog_images.jpg', NULL, 4, 1, 2, 2, '2022-03-27 05:25:57', '2022-03-27 07:57:15'),
(14, '10 THINGS TO DO', 'Under Quarantine!', '<p>photo via opencolleges.edu. au So far, 2020 has been quite a year, and we’re only 3 months in! I know it seems hectic rightnow, with everything going on, due to the coronavirus. However, while we are in quarantine, there are things that we can do to keep ourselves busy, in this chaotic time. Here are a list of things</p>', '644950blog_imagesB.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:26:34', NULL),
(15, 'COOL THINGS', 'to Do Before 30', '<p>If you’re still in your 20’s, the best thing to do is live your life to the fullest. I’m sure you’ve probably heard this before, but it’s true. You’re only 20-29 one time in your life, so why not create some memories. Being in your 20’s is the time to make mistakes, go crazy, create memories, and be</p>', '67215blog_imagesC.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:27:04', NULL),
(16, '7 SIMPLE WAYS', 'to Get Over a Crush', '<p>We’ve all had a crush sometime in our life, like Molly Ringwald in “16 Candles .” Like Samantha Baker, we all have a Jake Ryan in our life, who we want to be with, but for some reason, he doesn’t seem to notice us. Having a crush isn’t easy, and sometimes leads to heartbreak. Not to worry, my friends. We will</p>', '583239blog_imagesD.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:27:35', NULL),
(17, '10 GREAT REASONS', '10 Great Reasons Not to Give a', '<p>photo via dumblittleman. com Have you ever been criticized by people, to the point that it messes with your head? You start to think you’re crazy, because everyone is against you. You start believing what people are saying, and think that maybe something’s wrong with you. Trust me, I’ve been there before. Not only does it become an easier</p>', '496016blog_imagesE.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:28:06', NULL),
(18, 'WHY YOU SHOULD STOP', 'Comparing Yourself to Others', '<p>photo via casnocha.com Comparing yourself to others might sounds easier said than done, but I get it. I’ve been there before. As a matter of fact, I’m still here. This past week, I’ve struggled with insecurities, becauseI felt like I wasn’t as pretty or curvy as the young woman who works with me. Guys like her, and I’m</p>', '97451blog_imagesF.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:28:33', NULL),
(19, 'VANESSA BRYANT AND', 'Michael Jordan Reminiscence on Kobe Bryant', '<p>Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant. Following the passing of Gigi Bryant and Kobe Bryant, the memorial was decorated in purple and yellow flowers. In the beginning of the ceremony, Beyoncé lead</p>', '561704blog_imagesG.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:29:18', NULL),
(20, 'POP SMOKE WAS', 'Brooklyn’s Hero', '<p>photo via StereoGum Today, around the time of 4:30 am, rapper Pop Smoke was killed in his Hollywood Hills home. The funny thing is, rappers usually get killed in their own hometown, not in another. Pop is from Brooklyn, New York, and happened to be killed in Los Angeles. It get’s tiring to say, “Rest in peace,” to these young</p>', '753679blog_imagesS.jpg', NULL, 4, 1, 0, 0, '2022-03-27 05:29:53', NULL),
(52, 'VANESSA BRYANT AND', 'Michael Jordan Reminiscence on Kobe Bryant', '<p>Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant. Following the passing of Gigi Bryant and Kobe Bryant, the memorial was decorated in purple and yellow flowers. In the beginning of the ceremony, Beyoncé lead</p>', '717452hot_deal.png', '659093file_example_MP4_480_1_5MG.mp4', 4, 1, 0, 0, '2022-04-05 23:51:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_auther`
--

CREATE TABLE `phtv_blog_auther` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_blog_auther`
--

INSERT INTO `phtv_blog_auther` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(4, 'N. Ingeram', '554325img_avatar.png', '0000-00-00 00:00:00', NULL),
(6, 'Sponsor/s: Apollo Music, Space Times', '753120img_avatar.png', '0000-00-00 00:00:00', NULL),
(7, 'Creat By: Apollo Music', '304867img_avatar.png', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_category`
--

CREATE TABLE `phtv_blog_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_blog_category`
--

INSERT INTO `phtv_blog_category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Music Nebula', '2022-03-25 22:55:40', '2022-03-27 10:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_comment`
--

CREATE TABLE `phtv_blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_blog_comment`
--

INSERT INTO `phtv_blog_comment` (`id`, `blog_id`, `name`, `email`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'John Dao', 'john.dao@yopmail.com', 'Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant. Following the passing of Gigi Bryant and Kobe Bryant, the memorial was decorated in purple and yellow flowers. In the beginning of the ceremony, Beyoncé lead', 13, '2022-03-27 13:16:57', NULL),
(2, 5, 'Celina Hawkins', 'celina.hawkins@yopmail.com', 'Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant.', 13, '2022-03-27 13:18:22', NULL),
(3, 13, 'John Dao', 'john.dao@yopmail.com', 'So remember Kidz Bop? Well one of those voices has grown up and today we know her as Kiana Lede! She won the competition Kidz Star USA 2011, but eventually evolved to partnering with Mike Woods putting a series of videos', 13, '2022-03-27 07:56:57', NULL),
(4, 5, 'ad', 'bcahardik@gmail.com', 'adaaaaaa', 0, '2022-03-27 08:15:34', NULL),
(5, 5, 'ad', 'chaplahardik@gmail.com', 'nhjjjjjjj', 0, '2022-03-28 16:16:16', NULL),
(6, 5, 'John Dao', 'john.dao@yopmail.com', 'Testing', 0, '2022-03-28 17:48:49', NULL),
(7, 5, 'John Dao', 'john.dao@yopmail.com', 'Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant.', 0, '2022-03-29 20:54:26', NULL),
(8, 7, 'John A Tate Jr.', 'planethopper1@gmail.com', '5bni5dnidi5m97mt7mm6tmmt', 0, '2022-05-12 08:56:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_likes`
--

CREATE TABLE `phtv_blog_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `system_user_id` varchar(20) DEFAULT NULL,
  `blog_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_blog_likes`
--

INSERT INTO `phtv_blog_likes` (`id`, `user_id`, `system_user_id`, `blog_id`, `created_at`) VALUES
(9, NULL, '6242047ff0487', 5, '2022-03-28 18:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_unlike`
--

CREATE TABLE `phtv_blog_unlike` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `system_user_id` varchar(20) DEFAULT NULL,
  `blog_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_blog_unlike`
--

INSERT INTO `phtv_blog_unlike` (`id`, `user_id`, `system_user_id`, `blog_id`, `created_at`) VALUES
(4, NULL, '6241f3fda54be', 5, '2022-03-28 17:44:35'),
(10, NULL, '6243248e53fdd', 5, '2022-03-29 15:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_chatting_group`
--

CREATE TABLE `phtv_chatting_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_chatting_history`
--

CREATE TABLE `phtv_chatting_history` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `receiver_user_id` int(11) NOT NULL,
  `message` longtext DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0 COMMENT '0:Unread, 1:read',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_cinematic_home`
--

CREATE TABLE `phtv_cinematic_home` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `title_link` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_coin_balance_history`
--

CREATE TABLE `phtv_coin_balance_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `used_coin` int(11) DEFAULT NULL,
  `received_coin` int(11) DEFAULT NULL,
  `activity` longtext DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_created_by`
--

CREATE TABLE `phtv_created_by` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_created_by`
--

INSERT INTO `phtv_created_by` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'John Daos', '800724img_avatar.png', '2022-04-21 21:21:19', '2022-04-21 21:24:42'),
(3, 'Celina Hawkins', '884976img_avatar2.png', '2022-04-21 21:29:15', NULL),
(5, 'Calvin Can', '43727176729750.jpg', '2022-05-17 16:41:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_crew_pick_home`
--

CREATE TABLE `phtv_crew_pick_home` (
  `id` int(11) NOT NULL,
  `selected_crew_id` int(11) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `module_name` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_earning_coin_info`
--

CREATE TABLE `phtv_earning_coin_info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_earn_rewards`
--

CREATE TABLE `phtv_earn_rewards` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_earn_rewards`
--

INSERT INTO `phtv_earn_rewards` (`id`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'header', 'Welcome Aboard', '2022-05-19 21:27:58', '2022-05-19 16:40:18'),
(2, 'header_title', 'Planet Hopper One', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(3, 'header_description', 'May your journey be free of atmospheric hazards', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(4, 'header_details', 'Earn points as you consume and share content.Trade Points in for awesome gifts in the Star Outpost! Also use points to enter quarterly \"Mystery Gift\" raffle and more', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(5, 'questions_title', 'Questions', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(6, 'questions', 'What planet are you from?', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(7, 'rules', 'Rules', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(8, 'rules1', 'Emoji Reaction 1pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(9, 'rules2', 'Sharing Articles to Twitter 10 pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(10, 'rules3', 'Sharing Articles to Facebook 10 pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(11, 'rules4', 'Sharing Articles to Pinterest 10 pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(12, 'rules5', 'Sharing Articles to other platforms 5 pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(13, 'rules6', 'Watching videos 10 pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(14, 'rules7', 'Watching Specific video 20 pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(15, 'rules8', 'Reading articles 5 pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(16, 'rules9', 'Reading Specific articles 10 pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(17, 'rules10', '15 consecutive logins 30 bonus pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(18, 'rules11', '30 consecutive logins 70 bonus pts', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(19, 'points_title', 'Points', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(20, 'points_title1', '200 Points (First Login)', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(21, 'points_title2', 'Logging in 10pts (Daily)', '2022-05-19 21:27:58', '2022-05-19 21:40:28'),
(22, 'points_description1', 'Not logging in within 15 days you loose 20pt', '2022-05-19 21:27:58', '2022-05-19 21:48:03'),
(23, 'points_description2', 'Not logging on within 30 days you loose 50 pts', '2022-05-19 21:27:58', '2022-05-19 21:48:03'),
(24, 'points_description3', 'Not logging on within 45 days you loose 150 pts', '2022-05-19 21:27:58', '2022-05-19 21:48:03'),
(25, 'points_description4', 'and 50 pts per day til disqualified', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(26, 'rewards_title', 'Rewards', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(27, 'rewards_description', 'Basic Rewards', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(28, 'rewards_1', 'T Shirts', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(29, 'rewards_2', 'Mugs', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(30, 'rewards_3', 'Trading Pins', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(31, 'rewards_4', 'Sticker Packs', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(32, 'rewards_5', 'Hats', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(33, 'rewards_6', 'Tournament Passes', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(34, 'rewards_7', 'Event Passes', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(35, 'footer_title', 'Lift off 85000 passengers', '2022-05-19 21:27:58', '2022-05-19 21:51:09'),
(36, 'footer_points', '76', '2022-05-19 21:27:58', '2022-05-19 21:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_episode_likes`
--

CREATE TABLE `phtv_episode_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `system_user_id` varchar(20) DEFAULT NULL,
  `episode_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_episode_likes`
--

INSERT INTO `phtv_episode_likes` (`id`, `user_id`, `system_user_id`, `episode_id`, `created_at`) VALUES
(3, 13, NULL, 1, '2022-04-30 16:04:54'),
(13, NULL, '626e1216e276a', 1, '2022-05-01 04:52:47'),
(16, NULL, '626ec7500956f', 5, '2022-05-01 17:46:07'),
(18, NULL, '6288fbead8047', 1, '2022-05-21 14:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_episode_unlike`
--

CREATE TABLE `phtv_episode_unlike` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `system_user_id` varchar(20) DEFAULT NULL,
  `episode_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_episode_unlike`
--

INSERT INTO `phtv_episode_unlike` (`id`, `user_id`, `system_user_id`, `episode_id`, `created_at`) VALUES
(2, NULL, '626d3f7dbc5ee', 1, '2022-04-30 16:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_episode_views`
--

CREATE TABLE `phtv_episode_views` (
  `id` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `browser_id` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_episode_views`
--

INSERT INTO `phtv_episode_views` (`id`, `episode_id`, `browser_id`, `created_at`) VALUES
(1, 1, '9a92a7ae80364fda30fbcc41d5bd629c', '2022-04-30 16:04:09'),
(2, 1, '04f6daf25f08c62ca317069ae31ce5f1', '2022-05-01 04:39:58'),
(3, 1, 'f8e1f45dafd724b2753c574a0278a4c2', '2022-05-01 04:51:55'),
(4, 1, '461e0f4f98c537bb3e431f58f76709a3', '2022-05-01 17:44:50'),
(5, 4, '461e0f4f98c537bb3e431f58f76709a3', '2022-05-01 17:45:44'),
(6, 5, '461e0f4f98c537bb3e431f58f76709a3', '2022-05-01 17:45:48'),
(7, 6, '461e0f4f98c537bb3e431f58f76709a3', '2022-05-02 15:54:07'),
(8, 1, '518df0ab12bb42cf1bba933a195fcf7b', '2022-05-11 06:05:19'),
(9, 1, '16f778289f6e71364568ccbba60c58e2', '2022-05-12 01:00:35'),
(10, 1, '4144da4114e5ceacb95dc6d7f04a1cb1', '2022-05-14 05:46:51'),
(11, 1, '9e23c272d5aedc11ddac3197f53e5241', '2022-05-14 06:04:50'),
(12, 1, '55e636c6395abed3e44f438e2b0de664', '2022-05-15 22:51:06'),
(13, 1, '02d1e755386be3802c5d2340c9fa9fab', '2022-05-17 03:31:26'),
(14, 1, '098df7a8a28766d8956bfa3e7fe517ae', '2022-05-18 09:37:58'),
(15, 0, 'a21724e0bda3e725d6bb3dd8548cbd39', '2022-05-19 14:12:33'),
(16, 1, 'a21724e0bda3e725d6bb3dd8548cbd39', '2022-05-19 14:12:43'),
(17, 1, 'cbe1453bc62b85b2aab1598325cfdd04', '2022-05-25 19:01:45'),
(18, 1, '4b50f345b71b549fe41a95af0d040cd7', '2022-05-25 19:38:20'),
(19, 1, 'b4291e250ec13a27977c933c62c12da1', '2022-05-25 19:51:32'),
(20, 1, 'b4c1031eeac626000511c3d4dc786978', '2022-06-02 02:38:39'),
(21, 5, '103e71c5f52bde045beb04e8f4b83296', '2022-06-02 02:38:51'),
(22, 1, 'bba63904b03ed057b1d800eb047252dd', '2022-06-11 21:57:36'),
(23, 1, 'ff97cfe68bf79b2dfb5af36f07a8aff3', '2022-06-22 14:35:01'),
(24, 1, '8d7f3363b168b0032f824ac491a48487', '2022-06-28 22:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_featured_home`
--

CREATE TABLE `phtv_featured_home` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT 0 COMMENT '0:Blog, 1:thumbnail, 2:video',
  `video_type` int(11) NOT NULL DEFAULT 0 COMMENT '0:uploade, 1:link',
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_header`
--

CREATE TABLE `phtv_header` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo2` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_hosted_by`
--

CREATE TABLE `phtv_hosted_by` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_hosted_by`
--

INSERT INTO `phtv_hosted_by` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Chef Q', '753723avatar2.png', '2022-04-28 21:23:21', '2022-05-01 20:53:07'),
(3, 'John T', '129800000000@3x.png', '2022-05-01 21:01:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_live_event_home_category`
--

CREATE TABLE `phtv_live_event_home_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_live_tv_24_7_category`
--

CREATE TABLE `phtv_live_tv_24_7_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_live_tv_24_7_category`
--

INSERT INTO `phtv_live_tv_24_7_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Most popular videos', '2022-05-01 11:19:05', NULL),
(3, 'Free running around the world', '2022-05-01 11:24:38', NULL),
(4, 'Celebrate the heroes of summer', '2022-05-01 11:24:49', NULL),
(5, 'Upcoming live events', '2022-05-01 11:25:11', NULL),
(6, 'Films and documentaries', '2022-05-01 11:25:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_live_tv_24_7_page`
--

CREATE TABLE `phtv_live_tv_24_7_page` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `is_recomended` int(11) NOT NULL DEFAULT 0 COMMENT '0:No, 1:Yes',
  `length` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_live_tv_24_7_page`
--

INSERT INTO `phtv_live_tv_24_7_page` (`id`, `category_id`, `title`, `description`, `thumbnail`, `youtube_link`, `is_recomended`, `length`, `created_at`, `updated_at`) VALUES
(2, 2, 'Adrenaline Spike ', '<p>Uniting the worlds of VALORANT and freerunning</p>', '594318wudlsofwvjzsecvz7l1u.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:00:54', NULL),
(3, 2, 'Tom Pidcock takes on his first World Cup season', '<p>Uniting the worlds of VALORANT and freerunning</p>', '733149bjubku68ohpqqe7tr623.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:02:23', NULL),
(4, 2, 'Course preview with Szymon Godziek', '<p>Uniting the worlds of VALORANT and freerunning</p>', '522429ep9ujepj9ii2i6pw4wvx.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:03:53', NULL),
(5, 2, 'It was rough. It was tough. It was Red Bull Romaniacs', '<p>Uniting the worlds of VALORANT and freerunning</p>', '64404prslfhub3igafpnxjtfl.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:04:42', NULL),
(6, 2, 'Emil Johansson\'s winning run', '<p>Uniting the worlds of VALORANT and freerunning</p>', '374888fim-hard-enduro-5-red-bull-tko-daily-recap-art.jfif', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:05:30', NULL),
(7, 2, 'Adrenaline Spike', '<p>Uniting the worlds of VALORANT and freerunning</p>', '241799wudlsofwvjzsecvz7l1u.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:06:21', NULL),
(8, 3, 'Adrenaline Spike', '<p>Uniting the worlds of VALORANT and freerunning</p>', '412565rljzn7stz8mu9xsbpdjj.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:07:46', '2022-05-05 21:39:12'),
(9, 3, 'Tom Pidcock takes on his first World Cup season', '<p>Uniting the worlds of VALORANT and freerunning</p>', '1081115d009c89-7f86-488b-b8db-82457c521be4.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:08:52', NULL),
(10, 3, 'Course preview with Szymon Godziek', '<p>Uniting the worlds of VALORANT and freerunning</p>', '870300FO-2184X6M1WBH11.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:09:58', NULL),
(11, 3, 'It was rough. It was tough. It was Red Bull Romaniacs', '<p>Uniting the worlds of VALORANT and freerunning</p>', '446427v4c2qmkzcervhw0iig7f.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:10:45', NULL),
(12, 3, 'Emil Johansson\'s winning run', '<p>Uniting the worlds of VALORANT and freerunning</p>', '99875fim-hard-enduro-5-red-bull-tko-daily-recap-art.jfif', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:11:32', NULL),
(13, 3, 'Adrenaline Spike', '<p>Uniting the worlds of VALORANT and freerunning</p>', '468708wudlsofwvjzsecvz7l1u.webp', 'https://www.youtube.com/embed/r6Dpwc1y3ZU', 0, '00:20:07', '2022-05-05 18:12:22', NULL),
(14, 2, 'Adrenaline Spike', '<p><strong>Uniting the worlds of VALORANT and freerunning</strong></p>', '8854album_2.jpg', 'https://player.vimeo.com/video/253989945?h=c6db007fe5&color=ef0800&title=0&byline=0&portrait=0', 1, '00:00:05', '2022-06-02 22:13:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_live_tv_page`
--

CREATE TABLE `phtv_live_tv_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `youtube link` varchar(255) DEFAULT NULL,
  `is_recomended` int(11) NOT NULL DEFAULT 0 COMMENT '0:No, 1:Yes',
  `view` int(11) NOT NULL DEFAULT 0,
  `length` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_newslettr`
--

CREATE TABLE `phtv_newslettr` (
  `id` int(11) NOT NULL,
  `email` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_categories`
--

CREATE TABLE `phtv_nft_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_nft_categories`
--

INSERT INTO `phtv_nft_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NTFX (Experiences)', '2022-04-14 17:13:25', NULL),
(2, 'Music', '2022-04-14 17:13:37', NULL),
(3, 'Street Art', '2022-04-14 17:13:51', NULL),
(4, 'Cards', '2022-04-14 17:14:11', NULL),
(5, 'Poems', '2022-04-14 17:14:22', NULL),
(6, 'MP4', '2022-04-14 17:14:36', '2022-07-03 08:01:44'),
(7, 'Video Clips', '2022-04-14 17:14:47', NULL),
(8, 'Beats', '2022-04-14 17:14:57', NULL),
(9, 'Photography', '2022-04-14 17:15:09', NULL),
(10, 'NTFX (Physical)', '2022-04-14 17:15:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_collection`
--

CREATE TABLE `phtv_nft_collection` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_nft_collection`
--

INSERT INTO `phtv_nft_collection` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'warclanstime', '248767logo-studio.svg', '2022-04-14 17:16:05', NULL),
(2, 'Obelisk 13', '969151logo-studioA.svg', '2022-04-14 17:16:22', '2022-05-11 08:44:02'),
(3, 'warclanstime', '625219logo-studioB.svg', '2022-04-14 17:16:38', NULL),
(4, 'warclanstime', '295973logo-studioC.svg', '2022-04-14 17:16:53', NULL),
(5, 'warclanstime', '206912logo-studioD.svg', '2022-04-14 17:17:12', NULL),
(6, 'warclanstime', '180235logo-studioE.svg', '2022-04-14 17:17:30', NULL),
(7, 'warclanstime', '83811logo-studioF.svg', '2022-04-14 17:17:49', NULL),
(8, 'warclanstime', '241883logo-studioG.svg', '2022-04-14 17:18:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_drops_home`
--

CREATE TABLE `phtv_nft_drops_home` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_link` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_info`
--

CREATE TABLE `phtv_nft_info` (
  `id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_type` varchar(20) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `sale_id` varchar(50) DEFAULT NULL,
  `assets_name` varchar(50) DEFAULT NULL,
  `assets_id` varchar(50) DEFAULT NULL,
  `meant_no` varchar(50) DEFAULT NULL,
  `mint` int(11) NOT NULL DEFAULT 0 COMMENT '0: No, 1:Yes',
  `image` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `image_type` enum('image','gif','video','audio') NOT NULL DEFAULT 'image',
  `duration` varchar(10) DEFAULT NULL,
  `attribute_name` varchar(255) DEFAULT NULL,
  `attribute_image` varchar(255) DEFAULT NULL,
  `attribute_bg_image` varchar(255) DEFAULT NULL,
  `attribute_object` varchar(255) DEFAULT NULL,
  `attribute_object_collection` varchar(255) DEFAULT NULL,
  `attribute_object_no` varchar(255) DEFAULT NULL,
  `attribute_border_color` varchar(50) DEFAULT NULL,
  `attribute_border_type` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_nft_info`
--

INSERT INTO `phtv_nft_info` (`id`, `collection_id`, `category_id`, `name`, `price`, `price_type`, `description`, `sale_id`, `assets_name`, `assets_id`, `meant_no`, `mint`, `image`, `thumbnail`, `image_type`, `duration`, `attribute_name`, `attribute_image`, `attribute_bg_image`, `attribute_object`, `attribute_object_collection`, `attribute_object_no`, `attribute_border_color`, `attribute_border_type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'NFT Test GIF 100, 2022', '100.00', 'USD', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', '#5395762', 'Goldenbeard Bob2', '#1099517828730', '60of179', 0, '800241GGv1r650x300f10c16p.gif', NULL, 'gif', '0', ' The Oracle', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'Kog', 'Crypto', '130', 'sky', '18', '2022-04-15 00:19:11', '2022-07-09 00:00:38'),
(2, 1, 1, 'Cuffed Beanie Planet Hopper TV', '120.00', 'Pay', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', '#5395761', 'Goldenbeard Bob', '#1099517828729', '59of179', 0, '653153episodesB.jpg', NULL, 'image', '0', ' The Oracle', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'Kog', 'Crypto', '130', 'sky', '18', '2022-04-15 00:19:53', '2022-07-02 00:00:35'),
(3, 2, 1, 'Cuffed Beanie Planet Hopper TV', '130.00', 'Pay', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', '#5395761', 'Goldenbeard Bob', '#1099517828729', '59of179', 0, '870489episodesC.jpg', NULL, 'image', '0', ' The Oracle', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'Kog', 'Crypto', '130', 'sky', '18', '2022-04-15 00:20:33', '2022-07-12 00:00:34'),
(4, 1, 1, 'Cuffed Beanie Planet Hopper TV', '140.00', 'Pay', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', '#5395761', 'Goldenbeard Bob', '#1099517828729', '59of179', 0, '183470episodesD.jpg', NULL, 'image', '0', ' The Oracle', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'Kog', 'Crypto', '130', 'sky', '18', '2022-04-15 00:21:12', '2022-07-12 00:00:34'),
(5, 1, 1, 'Cuffed Beanie Planet Hopper TV', '150.00', 'Pay', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', '#5395761', 'Goldenbeard Bob', '#1099517828729', '59of179', 0, '293885episodesE.jpg', NULL, 'image', '0', ' The Oracle', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'Kog', 'Crypto', '130', 'sky', '18', '2022-04-15 00:21:52', '2022-07-12 00:00:34'),
(6, 1, 1, 'Cuffed Beanie Planet Hopper TV', '160.00', 'Pay', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', '#5395761', 'Goldenbeard Bob', '#1099517828729', '59of179', 0, '276161file_example_MP4_480_1_5MG.mp4', NULL, 'video', '0', ' The Oracle', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'Kog', 'Crypto', '130', 'sky', '18', '2022-04-15 00:22:32', '2022-07-12 00:00:34'),
(7, 1, 1, 'Cuffed Beanie Planet Hopper TV', '150.00', 'Pay', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', '#5395761', 'Goldenbeard Bob', '#1099517828729', '59of179', 0, '958424Sample-gif-Image-File-Download.gif', NULL, 'gif', '0', ' The Oracle', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'Kog', 'Crypto', '130', 'sky', '18', '2022-04-15 00:23:12', '2022-07-12 00:00:34'),
(8, 1, 1, 'Cuffed Beanie Planet Hopper TV', '120.00', 'Pay', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', '#5395761', 'Goldenbeard Bob', '#1099517828729', '59of179', 0, '734323file_example_MP3_700KB.mp3', NULL, 'audio', '0', ' The Oracle', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'QmVw3fDskNRcxQweB9vRoo8W8PchiTjtzaATFuGVfY3WWS/Kog/no_foil/rare/3-130-33-18-0_front.png', 'Kog', 'Crypto', '130', 'sky', '18', '2022-04-15 00:23:55', '2022-07-12 00:00:34'),
(9, 2, 3, 'Top Cap 5950', '500.00', 'USD', '', '4555', 'Top Cap 5950', 'Top Cap 5950', '12', 0, '7873445950.png', NULL, 'image', '0', 'Top Cap 5950Top Cap 5950', 'Top Cap 5950Top Cap 5950', 'sdf', 'Top Cap 5950', 'zdzdzdzsdz', 'zzddz', 'zdzszsdz', 'zdzdzzdzdz', '2022-04-15 14:46:39', '2022-07-12 00:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_listing`
--

CREATE TABLE `phtv_nft_listing` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_nft_listing`
--

INSERT INTO `phtv_nft_listing` (`id`, `title`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(4, 'Newest', '<p>Daily Auctions of our unique Movie</p>', '317709chinemaAA.jpg', '2022-04-10 10:19:38', '2022-07-02 11:50:28'),
(5, 'The Payload Marketplace', '', '775641chinemaB.jpg', '2022-04-10 10:24:43', NULL),
(7, 'sdfsdfghjjk', '', '516426Strawberries peaches and grapes.jpg', '2022-05-11 15:49:55', NULL),
(9, 'Oldest', '<p>NFT\'s for the Fitted Cap Community</p>', '773445Gray@3x.png', '2022-07-02 18:46:31', '2022-07-02 11:52:21'),
(10, 'sdfsdfghjjk', '', '390080556@3x.png', '2022-07-02 19:29:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_logos`
--

CREATE TABLE `phtv_nft_logos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_nft_logos`
--

INSERT INTO `phtv_nft_logos` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'All NFTs, New Artists, and Content is carefully Critiqued and Cur8td by the PHTV Crew', '902283ss_drops_blogsA.png', '2022-04-10 13:29:19', NULL),
(3, '5 New Drops this Week', '320169ss_drops_blogsB.png', '2022-04-10 13:29:34', NULL),
(4, 'We\'ve Purchased 10 NFTs', '274712ss_drops_blogsC.png', '2022-04-10 13:29:55', NULL),
(5, '5 New Artists this week', '71189ss_drops_blogsD.png', '2022-04-10 13:30:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_pages`
--

CREATE TABLE `phtv_pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_pages`
--

INSERT INTO `phtv_pages` (`id`, `page_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'High Voltage Show', 'high_voltage_show', '2022-05-20 14:47:21', NULL),
(2, 'Blog', 'blog', '2022-05-24 15:49:02', NULL),
(3, 'NFT Marketplace', 'nft_marketplace', '2022-05-24 15:59:12', '2022-05-24 16:01:15'),
(4, 'NFT Marketplace Details', 'nft_marketplace_details', '2022-05-24 16:05:17', NULL),
(5, 'Podcasts', 'podcasts', '2022-05-24 16:06:55', NULL),
(6, 'Product', 'product', '2022-05-24 16:11:26', '2022-05-24 16:14:08'),
(7, 'Product Details', 'product_details', '2022-05-24 16:17:27', NULL),
(8, 'Profile', 'profile', '2022-05-24 16:20:11', NULL),
(9, 'My Order', 'my_order', '2022-05-24 16:23:40', NULL),
(10, 'Message', 'message', '2022-05-24 16:27:06', NULL),
(11, 'Change Password', 'change_password', '2022-05-24 16:33:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_podcast`
--

CREATE TABLE `phtv_podcast` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `hosts_id` varchar(255) DEFAULT NULL,
  `created_by_id` varchar(255) DEFAULT NULL,
  `sponsored_by_id` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `twiter_link` varchar(255) DEFAULT NULL,
  `google_link` varchar(255) DEFAULT NULL,
  `insta_link` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_podcast`
--

INSERT INTO `phtv_podcast` (`id`, `title`, `image`, `hosts_id`, `created_by_id`, `sponsored_by_id`, `description`, `fb_link`, `twiter_link`, `google_link`, `insta_link`, `created_at`, `updated_at`) VALUES
(1, 'Happy Holidays for You', '960279blog_imagesG.jpg', '3', '', '1', '<p>The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of personal digital assistants. Facebook and Microsoft announced major investments into conversational user interfaces, and Slack launched a fund to capitalize on the bots hoping to build on its platform. But when bots became available the public, the public largely shrugged. The advantages of conversational interfaces paled next to their drawbacks.</p>', '', '', '', '', '2022-03-29 18:37:58', '2022-05-28 14:09:40'),
(2, 'Hungry HangOut Podcast', '388739HungryHangOutPodcast.png', '', '', '', '<p>The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of personal digital assistants. Facebook and Microsoft announced major investments into conversational user interfaces, and Slack launched a fund to capitalize on the bots hoping to build on its platform. But when bots became available the public, the public largely shrugged. The advantages of conversational interfaces paled next to their drawbacks.</p>', '', '', '', '', '2022-03-29 18:54:47', '2022-05-22 10:39:45'),
(4, 'Happy Holidays for You', '49764hot_deal_B.png', '2', '1', '1', '<p>The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of personal digital assistants. Facebook and Microsoft announced major investments into conversational user interfaces, and Slack launched a fund to capitalize on the bots hoping to build on its platform. But when bots became available the public, the public largely shrugged. The advantages of conversational interfaces paled next to their drawbacks.</p>', '', '', '', '', '2022-03-29 18:59:14', '2022-04-28 21:25:23'),
(5, 'Sound Scientists', '72677sound scientists.jpg', '3', '1', '1', '', '', '', 'Soundscientist@google.com', '', '2022-05-12 04:25:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_podcast_auther`
--

CREATE TABLE `phtv_podcast_auther` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_podcast_episode`
--

CREATE TABLE `phtv_podcast_episode` (
  `id` int(11) NOT NULL,
  `podcast_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `mp3_file` varchar(255) DEFAULT NULL,
  `length` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_podcast_episode`
--

INSERT INTO `phtv_podcast_episode` (`id`, `podcast_id`, `title`, `short_description`, `mp3_file`, `length`, `created_at`, `updated_at`) VALUES
(3, 1, 'I’m Begining To See The Light1', 'Happy Holidays for You for new episode 1', '936179Dafa Kar Heropanti 2 128 Kbps.mp3', '00:03:59', '2022-04-06 16:36:23', '2022-05-14 17:13:34'),
(5, 1, 'I’m Begining To See The Light2', 'Happy Holidays for You for new episode 2', '717518file_example_MP3_700KB.mp3', '00:00:27', '2022-04-07 18:14:18', '2022-05-14 17:13:38'),
(6, 1, 'I’m Begining To See The Light3', 'Happy Holidays for You for new episode 3', '493784file_example_MP3_700KB.mp3', '00:00:27', '2022-04-07 18:14:35', '2022-05-14 17:13:43'),
(7, 2, 'Bot of us', 'Happy Holidays for You for new episode 4', '604700both-of-us-14037.mp3', '00:02:48', '2022-04-21 19:04:01', '2022-05-14 17:13:48'),
(8, 2, 'Chill abstract intention', 'Happy Holidays for You for new episode 5', '178040chill-abstract-intention-12099.mp3', '00:01:28', '2022-04-21 19:04:25', '2022-05-14 17:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_price_type`
--

CREATE TABLE `phtv_price_type` (
  `id` int(11) NOT NULL,
  `price_type` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_price_type`
--

INSERT INTO `phtv_price_type` (`id`, `price_type`, `created_at`, `updated_at`) VALUES
(7, 'Gif', '2022-07-04 22:56:49', NULL),
(8, 'Png', '2022-07-04 22:57:13', NULL),
(9, 'Jpg', '2022-07-04 22:57:38', NULL),
(10, 'Mp3', '2022-07-04 22:58:04', NULL),
(11, 'Wav', '2022-07-04 22:58:22', NULL),
(12, 'Mp4', '2022-07-04 22:58:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product`
--

CREATE TABLE `phtv_product` (
  `id` int(11) NOT NULL,
  `product_brand_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `coin_price` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `additional_info` longtext DEFAULT NULL,
  `avg_rating` decimal(10,2) DEFAULT NULL,
  `coin` int(11) DEFAULT NULL,
  `is_preorder` int(11) NOT NULL DEFAULT 0 COMMENT '0: No, 1:Yes',
  `offer_price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product`
--

INSERT INTO `phtv_product` (`id`, `product_brand_id`, `product_category_id`, `name`, `description`, `price`, `coin_price`, `stock`, `additional_info`, `avg_rating`, `coin`, `is_preorder`, `offer_price`, `created_at`, `updated_at`) VALUES
(5, 2, 5, 'Common Ace Runners', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '39.99', 30, 9, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 21:18:33', '2022-06-01 01:37:04'),
(6, 5, 7, 'PHTV T-SHIRT', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '39.99', 39, 9, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 21:22:29', '2022-04-15 13:23:51'),
(7, 6, 5, 'ASIAN Men\'s Bouncer-01 Sports Latest Stylish Casual Sneakers', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '39.99', 39, 10, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 1, NULL, '2022-02-09 21:35:03', '2022-02-09 21:59:11'),
(14, 5, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '59.99', 59, 5, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 22:13:02', NULL),
(15, 6, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '99.99', 99, 5, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 22:15:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_brand`
--

CREATE TABLE `phtv_product_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_brand`
--

INSERT INTO `phtv_product_brand` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Nike', '509969nike.svg', '2022-02-06 16:06:59', '2022-03-31 16:27:41'),
(4, 'Old Navy', '844676old-navy.svg', '2022-02-07 21:17:58', '2022-04-07 15:58:38'),
(5, 'Gap', '995666gap.svg', '2022-02-09 20:54:31', '2022-04-07 15:58:51'),
(6, 'Vitta', '614824vitta.svg', '2022-02-09 20:55:57', '2022-04-07 15:59:04'),
(7, 'Adidas', '172073adidas.svg', '2022-02-09 20:56:23', '2022-04-07 15:59:27'),
(8, 'Woodland', '63198wppdland.svg', '2022-02-09 20:56:54', '2022-04-07 15:59:43'),
(9, 'Navy Blue', '496904old-navy.svg', '2022-02-09 20:57:50', '2022-04-07 16:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_cart`
--

CREATE TABLE `phtv_product_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `system_user_id` varchar(20) DEFAULT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `coin_amount` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `total_coin_amount` decimal(10,2) DEFAULT NULL,
  `shipping_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_cart`
--

INSERT INTO `phtv_product_cart` (`id`, `product_id`, `user_id`, `system_user_id`, `color_id`, `size_id`, `qty`, `amount`, `coin_amount`, `total_amount`, `total_coin_amount`, `shipping_charge`, `created_at`, `updated_at`) VALUES
(4, 5, 10, NULL, 1, 11, 2, '39.99', '30.00', '79.98', '60.00', '0.00', '2022-02-16 23:47:06', '2022-02-18 22:51:57'),
(5, 6, 10, NULL, 2, 14, 2, '39.99', '39.00', '79.98', '78.00', '0.00', '2022-02-16 23:47:34', '2022-02-18 23:09:35'),
(25, 15, 0, '6254d78473208', 2, 3, 1, '99.99', '99.00', '99.99', '99.00', '0.00', '2022-04-12 01:36:04', NULL),
(26, 6, 0, '62597256e7652', 1, 6, 1, '39.99', '39.00', '39.99', '39.00', '0.00', '2022-04-15 13:25:42', NULL),
(27, 5, 0, '627c3f95aa0e1', 1, 11, 1, '39.99', '30.00', '39.99', '30.00', '0.00', '2022-05-11 22:58:29', NULL),
(28, 6, 14, NULL, 1, 1, 1, '39.99', '39.00', '39.99', '39.00', '0.00', '2022-05-31 15:56:40', '2022-05-31 15:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_category`
--

CREATE TABLE `phtv_product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_category`
--

INSERT INTO `phtv_product_category` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(5, 'Accessories', '823355ss_experiences_categoryA.png', '2022-02-09 21:03:12', NULL),
(6, 'Art Gallery', '234959ss_experiences_categoryB.png', '2022-02-09 21:03:47', NULL),
(7, 'T Shirts', '857187noun_t-shirt_2237575.svg', '2022-02-09 21:04:54', NULL),
(8, 'Hoodies', '523864ss_experiences_categoryE.png', '2022-02-09 21:05:38', NULL),
(9, 'Star Outpost Brand', '69056556_3x.png', '2022-02-09 21:06:11', NULL),
(10, 'Hats', '209545noun_hat_2790985.svg', '2022-02-09 21:06:58', NULL),
(11, 'Pins', '848793pin.svg', '2022-02-09 21:07:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_color`
--

CREATE TABLE `phtv_product_color` (
  `id` int(11) NOT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_color`
--

INSERT INTO `phtv_product_color` (`id`, `color_code`, `color_name`, `created_at`, `updated_at`) VALUES
(1, '#000000', 'Black', '2022-02-03 22:30:34', NULL),
(2, '#ffffff', 'White', '2022-02-03 22:33:32', '2022-02-03 22:35:21'),
(4, '#f9ad81', 'Broun', '2022-02-07 21:18:31', '2022-02-12 21:13:46'),
(5, '#3fa9f5', 'Sky Blue', '2022-02-07 21:18:51', '2022-02-12 21:14:39'),
(6, '#39DA8A', 'Green', '2022-02-07 21:19:16', '2022-02-12 21:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_hot_deals`
--

CREATE TABLE `phtv_product_hot_deals` (
  `id` int(11) NOT NULL,
  `offer_tag` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_images`
--

CREATE TABLE `phtv_product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_images`
--

INSERT INTO `phtv_product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(19, 5, '669440banner_pro.png', '2022-02-09 21:20:40', NULL),
(21, 7, '373315banner_pro.png', '2022-02-09 21:35:03', NULL),
(22, 6, '177107product-imagesE.png', '2022-02-09 21:47:48', NULL),
(29, 14, '197876product-imagesE.png', '2022-02-09 22:13:02', NULL),
(30, 15, '92258product-imagesF.png', '2022-02-09 22:15:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_multi_color`
--

CREATE TABLE `phtv_product_multi_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_multi_color`
--

INSERT INTO `phtv_product_multi_color` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(45, 7, 1, '2022-02-09 21:59:11', NULL),
(46, 7, 2, '2022-02-09 21:59:11', NULL),
(55, 14, 2, '2022-02-09 22:13:02', NULL),
(56, 15, 2, '2022-02-09 22:15:33', NULL),
(85, 6, 1, '2022-04-16 09:56:20', NULL),
(86, 6, 2, '2022-04-16 09:56:20', NULL),
(91, 5, 1, '2022-06-01 01:37:08', NULL),
(92, 5, 4, '2022-06-01 01:37:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_multi_size`
--

CREATE TABLE `phtv_product_multi_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_multi_size`
--

INSERT INTO `phtv_product_multi_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(93, 7, 14, '2022-02-09 21:59:11', NULL),
(94, 7, 15, '2022-02-09 21:59:11', NULL),
(95, 7, 17, '2022-02-09 21:59:11', NULL),
(96, 7, 18, '2022-02-09 21:59:11', NULL),
(123, 14, 1, '2022-02-09 22:13:02', NULL),
(124, 14, 2, '2022-02-09 22:13:02', NULL),
(125, 14, 3, '2022-02-09 22:13:02', NULL),
(126, 14, 4, '2022-02-09 22:13:02', NULL),
(127, 15, 1, '2022-02-09 22:15:33', NULL),
(128, 15, 2, '2022-02-09 22:15:33', NULL),
(129, 15, 3, '2022-02-09 22:15:33', NULL),
(130, 15, 4, '2022-02-09 22:15:33', NULL),
(131, 15, 5, '2022-02-09 22:15:33', NULL),
(180, 6, 1, '2022-04-16 09:56:20', NULL),
(181, 6, 2, '2022-04-16 09:56:20', NULL),
(182, 6, 4, '2022-04-16 09:56:20', NULL),
(183, 6, 5, '2022-04-16 09:56:20', NULL),
(184, 6, 6, '2022-04-16 09:56:20', NULL),
(193, 5, 2, '2022-06-01 01:37:08', NULL),
(194, 5, 3, '2022-06-01 01:37:08', NULL),
(195, 5, 5, '2022-06-01 01:37:08', NULL),
(196, 5, 6, '2022-06-01 01:37:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_order`
--

CREATE TABLE `phtv_product_order` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `total_product` int(11) DEFAULT NULL,
  `total_used_coin` int(11) DEFAULT NULL,
  `final_amount` decimal(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `confirm_date` datetime DEFAULT NULL,
  `shipped_date` datetime DEFAULT NULL,
  `out_for_delivery_date` datetime DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `cancelled_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_order`
--

INSERT INTO `phtv_product_order` (`id`, `invoice_no`, `user_id`, `full_name`, `email`, `mobile`, `address`, `city`, `zip`, `state`, `payment_type`, `transaction_id`, `total_amount`, `total_product`, `total_used_coin`, `final_amount`, `status`, `confirm_date`, `shipped_date`, `out_for_delivery_date`, `delivered_date`, `completed_date`, `cancelled_date`, `created_at`, `updated_at`) VALUES
(3, '6RU66218TX1930616', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '2PM55797T6212763H', '584.00', 11, 56, '639.89', 1, '2022-03-30 21:45:50', NULL, NULL, NULL, NULL, NULL, '2022-03-03 23:06:52', '2022-03-30 14:45:50'),
(4, '1WN377079M726933S', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '4LS250755D147045N', '584.00', 11, 56, '639.89', 2, NULL, '2022-03-30 21:45:56', NULL, NULL, NULL, NULL, '2022-03-04 22:08:18', '2022-03-30 14:45:56'),
(5, '99F4491646338060X', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '3EN26476YV9031517', '584.00', 11, 56, '639.89', 3, NULL, NULL, NULL, '2022-03-30 21:46:01', NULL, NULL, '2022-03-04 22:11:02', '2022-03-30 14:46:01'),
(6, '466729675G1030908', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '2B7570394T444105U', '763.00', 14, 77, '839.86', 4, NULL, NULL, NULL, NULL, '2022-03-30 21:46:06', NULL, '2022-03-05 15:59:19', '2022-03-30 14:46:06'),
(7, '47R62800H46671325', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '5JP67495PW209073S', '763.00', 14, 77, '839.86', 5, NULL, NULL, NULL, NULL, NULL, '2022-03-30 21:46:11', '2022-03-05 16:03:01', '2022-03-30 14:46:11'),
(8, '', 13, 'mason ramsey', 'mason.ramsey@yopmail.com', NULL, '936 Glendale Avenue', 'Northridge', 91324, 'CA', 'PayPal', '0JG57464516297015', '763.00', 14, 77, '839.86', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-05 16:04:45', NULL),
(9, '202203050415233205', 13, 'mason ramsey', 'mason.ramsey@yopmail.com', NULL, '936 Glendale Avenue', 'Northridge', 91324, 'CA', 'PayPal', '1L5734805A313963H', '763.00', 14, 77, '839.86', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-05 16:15:23', NULL),
(10, '202203050416078460', 13, 'mason ramsey', 'mason.ramsey@yopmail.com', NULL, '936 Glendale Avenue', 'Northridge', 91324, 'CA', 'PayPal', '5V490457N47438544', '763.00', 14, 77, '839.86', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-05 16:16:07', NULL),
(11, '202203050417465662', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '07K35333X17880355', '763.00', 14, 77, '839.86', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-05 16:17:46', NULL),
(12, '202203311013102179', 13, 'mason ramsey', 'mason.ramsey@yopmail.com', NULL, '936 Glendale Avenue', 'Northridge', 91324, 'CA', 'PayPal', '6FJ51286U44261210', '190.00', 3, 30, '219.97', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-31 15:13:10', NULL),
(13, '202203311014389306', 13, 'chirag', 'abc@gmail.com', NULL, 'surat', 'surat', 385006, 'Gujarat', 'Stripe', 'txn_3KjPhqHxLeXMwQtE1QzlKdn0', '209.00', 4, 31, '239.96', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-31 15:14:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_order_items`
--

CREATE TABLE `phtv_product_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `couns_used` int(11) DEFAULT NULL,
  `is_preorder` int(11) NOT NULL DEFAULT 0 COMMENT '0: No, 1:Yes',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_order_items`
--

INSERT INTO `phtv_product_order_items` (`id`, `order_id`, `product_id`, `color_id`, `size_id`, `amount`, `qty`, `total_amount`, `couns_used`, `is_preorder`, `created_at`, `updated_at`) VALUES
(3, 3, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-03 23:06:52', '2022-03-31 15:10:33'),
(4, 3, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-03 23:06:52', '2022-03-31 15:10:33'),
(7, 4, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-04 22:08:19', '2022-03-31 15:10:33'),
(8, 4, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-04 22:08:19', '2022-03-31 15:10:33'),
(11, 5, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-04 22:11:02', '2022-03-31 15:10:33'),
(12, 5, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-04 22:11:02', '2022-03-31 15:10:33'),
(15, 6, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-05 15:59:19', '2022-03-31 15:10:33'),
(16, 6, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-05 15:59:19', '2022-03-31 15:10:33'),
(18, 6, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-05 15:59:19', '2022-03-31 15:10:33'),
(22, 7, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-05 16:03:01', '2022-03-31 15:10:33'),
(23, 7, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-05 16:03:01', '2022-03-31 15:10:33'),
(25, 7, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-05 16:03:01', '2022-03-31 15:10:33'),
(29, 8, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-05 16:04:45', '2022-03-31 15:10:33'),
(30, 8, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-05 16:04:45', '2022-03-31 15:10:33'),
(32, 8, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-05 16:04:45', '2022-03-31 15:10:33'),
(36, 9, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-05 16:15:23', '2022-03-31 15:10:33'),
(37, 9, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-05 16:15:23', '2022-03-31 15:10:33'),
(39, 9, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-05 16:15:23', '2022-03-31 15:10:33'),
(43, 10, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-05 16:16:08', '2022-03-31 15:10:33'),
(44, 10, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-05 16:16:08', '2022-03-31 15:10:33'),
(46, 10, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-05 16:16:08', '2022-03-31 15:10:33'),
(50, 11, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-05 16:17:46', '2022-03-31 15:10:33'),
(51, 11, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-05 16:17:46', '2022-03-31 15:10:33'),
(53, 11, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-05 16:17:46', '2022-03-31 15:10:33'),
(58, 13, 6, 2, 12, '39.00', 1, '39.00', 1, 0, '2022-03-31 15:14:38', NULL),
(59, 13, 5, 4, 14, '30.00', 1, '30.00', 10, 0, '2022-03-31 15:14:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_order_payment`
--

CREATE TABLE `phtv_product_order_payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `trans_id` varchar(50) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `total_coin` int(11) DEFAULT NULL,
  `is_success` int(11) NOT NULL DEFAULT 0 COMMENT '0:No, 1:Yes',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_review`
--

CREATE TABLE `phtv_product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `rating` double(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_review`
--

INSERT INTO `phtv_product_review` (`id`, `product_id`, `user_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(3, 5, 13, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 4.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43'),
(4, 6, 13, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 4.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_size`
--

CREATE TABLE `phtv_product_size` (
  `id` int(11) NOT NULL,
  `size_name` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_size`
--

INSERT INTO `phtv_product_size` (`id`, `size_name`, `created_at`, `updated_at`) VALUES
(1, 'XS', '2022-02-06 17:22:12', '2022-02-06 17:23:40'),
(2, 'S', '2022-02-06 17:22:25', '2022-02-06 17:23:51'),
(3, 'M', '2022-02-06 17:24:01', NULL),
(4, 'L', '2022-02-06 17:24:10', NULL),
(5, 'XL', '2022-02-06 17:24:23', NULL),
(6, 'XXL', '2022-02-06 17:24:36', NULL),
(11, '4', '2022-02-09 21:14:35', NULL),
(12, '5', '2022-02-09 21:14:45', NULL),
(13, '6', '2022-02-09 21:14:55', NULL),
(14, '7', '2022-02-09 21:15:04', NULL),
(15, '8', '2022-02-09 21:15:15', NULL),
(16, '9', '2022-02-09 21:15:34', NULL),
(17, '10', '2022-02-09 21:15:44', NULL),
(18, '11', '2022-02-09 21:15:57', NULL),
(19, '12', '2022-02-09 21:16:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_recommended_home`
--

CREATE TABLE `phtv_recommended_home` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0:Blog, 1:Thumbnail, 2:video',
  `video_type` int(11) NOT NULL DEFAULT 0 COMMENT '0:Uploade, 1:Link',
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updatd_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_reword`
--

CREATE TABLE `phtv_reword` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description1` longtext DEFAULT NULL,
  `description2` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_reword_faq`
--

CREATE TABLE `phtv_reword_faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_sponsored_by`
--

CREATE TABLE `phtv_sponsored_by` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_sponsored_by`
--

INSERT INTO `phtv_sponsored_by` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dar Maan', '445982Asset 2@3x.png', '2022-04-21 21:44:25', '2022-04-22 16:02:49'),
(5, 'Leah Barnes', '461904testing.png', '2022-05-17 16:42:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_trend_matrix_home`
--

CREATE TABLE `phtv_trend_matrix_home` (
  `id` int(11) NOT NULL,
  `selected_trend_id` int(11) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updatd_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_users`
--

CREATE TABLE `phtv_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `coin_balance` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_users`
--

INSERT INTO `phtv_users` (`id`, `full_name`, `email`, `mobile`, `image`, `password`, `coin_balance`, `is_active`, `is_verified`, `created_at`, `updated_at`) VALUES
(10, 'Herry Terry', 'herry.terry@yopmail.com', '9874563211', '80039rbkckelxiyag63zowcbj.webp', 'e10adc3949ba59abbe56e057f20f883e', 55, 1, 1, '2022-01-30 20:24:47', '2022-02-18 22:54:18'),
(13, 'John Dao', 'john.dao@yopmail.com', '7418529630', '142311profilesA.jpg', 'e10adc3949ba59abbe56e057f20f883e', 309, 1, 1, '2022-02-06 13:20:04', '2022-03-31 15:14:38'),
(14, 'hardik chapla', 'bcahardik@gmail.com', '9558686644', NULL, 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 1, '2022-03-08 13:46:07', '2022-03-08 13:47:42'),
(15, 'sandip', 'karkarsandip915@gmail.com', NULL, NULL, '88678b2e77d75ec6a2b777098d2f00c0', 0, 1, 1, '2022-05-01 10:52:11', '2022-05-01 10:53:02'),
(16, 'John Tate', 'planethopper1@gmail.com', NULL, NULL, '1a790bbd63b78e23f3995fa2fcbe6778', 0, 1, 1, '2022-05-31 18:48:37', '2022-05-31 18:49:48'),
(17, 'Mister Tibbz', 'tibbz@empfstudios.com', NULL, NULL, '7fa874cf061a7ecc6a68946f3ec55943', 0, 1, 1, '2022-06-02 02:20:22', '2022-06-02 02:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_voltage_category`
--

CREATE TABLE `phtv_voltage_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_voltage_category`
--

INSERT INTO `phtv_voltage_category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Lifestyle', '2022-04-24 10:38:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_voltage_episode`
--

CREATE TABLE `phtv_voltage_episode` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL COMMENT 'link/uplode',
  `video_type` int(11) NOT NULL DEFAULT 0 COMMENT '0: Link,1: Video',
  `admin_id` int(11) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislike` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `voltage_title_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_voltage_episode`
--

INSERT INTO `phtv_voltage_episode` (`id`, `title`, `image`, `video`, `video_type`, `admin_id`, `likes`, `dislike`, `view`, `description`, `category_id`, `voltage_title_id`, `created_at`, `updated_at`) VALUES
(1, 'Melody Ehsani Explains Why Her Air Jordans', '427603episodesA.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 3, 1, 19, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 1, '2022-04-26 18:26:12', '2022-06-28 22:38:37'),
(4, 'Melody Ehsani Explains Why Her Air Jordans', '133476episodesB.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 1, '2022-04-27 17:44:24', '2022-05-01 17:45:44'),
(5, 'Melody Ehsani Explains Why Her Air Jordans', '824452episodesC.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 1, 0, 2, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 1, '2022-04-27 17:45:25', '2022-06-02 02:38:51'),
(6, 'Melody Ehsani Explains Why Her Air Jordans', '163452episodesD.jpg', '765545sample-mp4-file-small.mp4', 1, 1, 0, 0, 1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 1, '2022-04-27 17:47:10', '2022-05-02 15:54:07'),
(7, 'Melody Ehsani Explains Why Her Air Jordans', '320974stockA.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 2, '2022-04-27 17:48:27', '2022-04-30 13:49:24'),
(8, 'Vestibulum iet nibh urna magna lacinia', '987795stockB.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 2, '2022-04-27 17:58:34', '2022-04-30 13:49:24'),
(9, 'Vestibulum iet nibh urna magna lacinia', '348641stockC.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 2, '2022-04-27 17:59:07', '2022-04-30 13:49:24'),
(10, 'Vestibulum iet nibh urna magna lacinia', '367015stockD.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 2, '2022-04-27 17:59:48', '2022-04-30 13:49:24'),
(11, 'Vestibulum iet nibh urna magna lacinia', '497839gamerA.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 5, '2022-04-27 18:00:50', '2022-04-30 13:49:24'),
(12, 'Vestibulum iet nibh urna magna lacinia', '896456gamerB.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 5, '2022-04-27 18:01:27', '2022-04-30 13:49:24'),
(13, 'Vestibulum iet nibh urna magna lacinia', '823634gamerC.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 5, '2022-04-27 18:02:44', '2022-04-30 13:49:24'),
(14, 'Vestibulum iet nibh urna magna lacinia', '547863gamerD.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 5, '2022-04-27 18:03:19', '2022-04-30 13:49:24'),
(15, 'Vestibulum iet nibh urna magna lacinia', '301926kickingA.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 6, '2022-04-27 18:04:30', '2022-04-30 13:49:24'),
(16, 'Vestibulum iet nibh urna magna lacinia', '338272kickingB.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 6, '2022-04-27 18:05:03', '2022-04-30 13:49:24'),
(17, 'Vestibulum iet nibh urna magna lacinia', '617081kickingC.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 6, '2022-04-27 18:05:27', '2022-04-30 13:49:24'),
(18, 'Vestibulum iet nibh urna magna lacinia', '61912kickingD.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 6, '2022-04-27 18:06:51', '2022-04-30 13:49:24'),
(19, 'Vestibulum iet nibh urna magna lacinia', '801200sportsA.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 7, '2022-04-27 18:07:36', '2022-04-30 13:49:24'),
(20, 'Vestibulum iet nibh urna magna lacinia', '495241sportsB.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 7, '2022-04-27 18:08:11', '2022-04-30 13:49:24'),
(21, 'Vestibulum iet nibh urna magna lacinia', '513716sportsC.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 7, '2022-04-27 18:08:38', '2022-04-30 13:49:24'),
(22, 'Vestibulum iet nibh urna magna lacinia', '230005sportsD.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 7, '2022-04-27 18:09:06', '2022-04-30 13:49:24'),
(23, 'Vestibulum iet nibh urna magna lacinia', '1855244everFitA.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 8, '2022-04-27 18:09:47', '2022-04-30 13:49:24'),
(24, 'Vestibulum iet nibh urna magna lacinia', '5214444everFitB.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 8, '2022-04-27 18:10:18', '2022-04-30 13:49:24'),
(25, 'Vestibulum iet nibh urna magna lacinia', '5291414everFitC.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 8, '2022-04-27 18:10:43', '2022-04-30 13:49:24'),
(26, 'Vestibulum iet nibh urna magna lacinia', '8851004everFitD.jpg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 0, 1, 0, 0, 0, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 8, '2022-04-27 18:11:15', '2022-04-30 13:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_voltage_logo`
--

CREATE TABLE `phtv_voltage_logo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_voltage_logo`
--

INSERT INTO `phtv_voltage_logo` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Kickskosmos', '829885logoB.png', '2022-04-27 17:18:37', NULL),
(4, 'Soular', '548399logoC.png', '2022-04-27 17:19:52', NULL),
(5, '4everfit', '174126logoD.png', '2022-04-27 17:20:55', NULL),
(6, 'Sports Spectrum', '484988logoE.png', '2022-04-27 17:21:36', NULL),
(7, 'OverClock', '247909logoF.png', '2022-04-27 17:22:28', NULL),
(8, 'OverClock', '517382logoF.png', '2022-04-27 17:23:01', NULL),
(9, 'Soular', '455129logoC.png', '2022-04-27 17:23:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_voltage_title`
--

CREATE TABLE `phtv_voltage_title` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_voltage_title`
--

INSERT INTO `phtv_voltage_title` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Latest Episodes', '2022-04-27 21:50:29', '2022-04-27 21:50:42'),
(2, 'Stock Raving', '2022-04-24 11:35:45', NULL),
(5, 'Gamer Girl', '2022-04-27 20:58:59', NULL),
(6, 'Kicking & streaming', '2022-04-27 20:59:12', NULL),
(7, 'Sports Spectrum', '2022-04-27 20:59:31', NULL),
(8, '4everFit', '2022-04-27 20:59:57', NULL),
(9, 'Latest Episodes', '2022-04-27 21:18:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phtv_admin`
--
ALTER TABLE `phtv_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_banner`
--
ALTER TABLE `phtv_banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `phtv_blog`
--
ALTER TABLE `phtv_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auther_id` (`auther_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `phtv_blog_auther`
--
ALTER TABLE `phtv_blog_auther`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_blog_category`
--
ALTER TABLE `phtv_blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_blog_comment`
--
ALTER TABLE `phtv_blog_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `phtv_blog_likes`
--
ALTER TABLE `phtv_blog_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_blog_unlike`
--
ALTER TABLE `phtv_blog_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_chatting_group`
--
ALTER TABLE `phtv_chatting_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `phtv_chatting_history`
--
ALTER TABLE `phtv_chatting_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `receiver_user_id` (`receiver_user_id`),
  ADD KEY `sender_user_id` (`sender_user_id`);

--
-- Indexes for table `phtv_cinematic_home`
--
ALTER TABLE `phtv_cinematic_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_coin_balance_history`
--
ALTER TABLE `phtv_coin_balance_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phtv_created_by`
--
ALTER TABLE `phtv_created_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_crew_pick_home`
--
ALTER TABLE `phtv_crew_pick_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_earning_coin_info`
--
ALTER TABLE `phtv_earning_coin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_earn_rewards`
--
ALTER TABLE `phtv_earn_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_episode_likes`
--
ALTER TABLE `phtv_episode_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_episode_unlike`
--
ALTER TABLE `phtv_episode_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_episode_views`
--
ALTER TABLE `phtv_episode_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_featured_home`
--
ALTER TABLE `phtv_featured_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_header`
--
ALTER TABLE `phtv_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `phtv_hosted_by`
--
ALTER TABLE `phtv_hosted_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_live_event_home_category`
--
ALTER TABLE `phtv_live_event_home_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_live_tv_24_7_category`
--
ALTER TABLE `phtv_live_tv_24_7_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_live_tv_24_7_page`
--
ALTER TABLE `phtv_live_tv_24_7_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `phtv_live_tv_page`
--
ALTER TABLE `phtv_live_tv_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_newslettr`
--
ALTER TABLE `phtv_newslettr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_categories`
--
ALTER TABLE `phtv_nft_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_collection`
--
ALTER TABLE `phtv_nft_collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_drops_home`
--
ALTER TABLE `phtv_nft_drops_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_info`
--
ALTER TABLE `phtv_nft_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `collection_id` (`collection_id`);

--
-- Indexes for table `phtv_nft_listing`
--
ALTER TABLE `phtv_nft_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_logos`
--
ALTER TABLE `phtv_nft_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_pages`
--
ALTER TABLE `phtv_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_podcast`
--
ALTER TABLE `phtv_podcast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_podcast_auther`
--
ALTER TABLE `phtv_podcast_auther`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_podcast_episode`
--
ALTER TABLE `phtv_podcast_episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `podcast_id` (`podcast_id`);

--
-- Indexes for table `phtv_price_type`
--
ALTER TABLE `phtv_price_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_product`
--
ALTER TABLE `phtv_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_brand_id` (`product_brand_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `phtv_product_brand`
--
ALTER TABLE `phtv_product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_product_cart`
--
ALTER TABLE `phtv_product_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `phtv_product_category`
--
ALTER TABLE `phtv_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_product_color`
--
ALTER TABLE `phtv_product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_product_hot_deals`
--
ALTER TABLE `phtv_product_hot_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_product_images`
--
ALTER TABLE `phtv_product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phtv_product_multi_color`
--
ALTER TABLE `phtv_product_multi_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phtv_product_multi_size`
--
ALTER TABLE `phtv_product_multi_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phtv_product_order`
--
ALTER TABLE `phtv_product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phtv_product_order_items`
--
ALTER TABLE `phtv_product_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phtv_product_order_payment`
--
ALTER TABLE `phtv_product_order_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `phtv_product_review`
--
ALTER TABLE `phtv_product_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phtv_product_size`
--
ALTER TABLE `phtv_product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_recommended_home`
--
ALTER TABLE `phtv_recommended_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_reword`
--
ALTER TABLE `phtv_reword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_reword_faq`
--
ALTER TABLE `phtv_reword_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_sponsored_by`
--
ALTER TABLE `phtv_sponsored_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_users`
--
ALTER TABLE `phtv_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_voltage_category`
--
ALTER TABLE `phtv_voltage_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_voltage_episode`
--
ALTER TABLE `phtv_voltage_episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `voltage_title_id` (`voltage_title_id`);

--
-- Indexes for table `phtv_voltage_logo`
--
ALTER TABLE `phtv_voltage_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_voltage_title`
--
ALTER TABLE `phtv_voltage_title`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phtv_admin`
--
ALTER TABLE `phtv_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phtv_banner`
--
ALTER TABLE `phtv_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `phtv_blog`
--
ALTER TABLE `phtv_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `phtv_blog_auther`
--
ALTER TABLE `phtv_blog_auther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phtv_blog_category`
--
ALTER TABLE `phtv_blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phtv_blog_comment`
--
ALTER TABLE `phtv_blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phtv_blog_likes`
--
ALTER TABLE `phtv_blog_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phtv_blog_unlike`
--
ALTER TABLE `phtv_blog_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phtv_chatting_group`
--
ALTER TABLE `phtv_chatting_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_chatting_history`
--
ALTER TABLE `phtv_chatting_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_cinematic_home`
--
ALTER TABLE `phtv_cinematic_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_coin_balance_history`
--
ALTER TABLE `phtv_coin_balance_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_created_by`
--
ALTER TABLE `phtv_created_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phtv_crew_pick_home`
--
ALTER TABLE `phtv_crew_pick_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_earning_coin_info`
--
ALTER TABLE `phtv_earning_coin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_earn_rewards`
--
ALTER TABLE `phtv_earn_rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `phtv_episode_likes`
--
ALTER TABLE `phtv_episode_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `phtv_episode_unlike`
--
ALTER TABLE `phtv_episode_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `phtv_episode_views`
--
ALTER TABLE `phtv_episode_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `phtv_featured_home`
--
ALTER TABLE `phtv_featured_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_header`
--
ALTER TABLE `phtv_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_hosted_by`
--
ALTER TABLE `phtv_hosted_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phtv_live_event_home_category`
--
ALTER TABLE `phtv_live_event_home_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_live_tv_24_7_category`
--
ALTER TABLE `phtv_live_tv_24_7_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phtv_live_tv_24_7_page`
--
ALTER TABLE `phtv_live_tv_24_7_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `phtv_live_tv_page`
--
ALTER TABLE `phtv_live_tv_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_newslettr`
--
ALTER TABLE `phtv_newslettr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_nft_categories`
--
ALTER TABLE `phtv_nft_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phtv_nft_collection`
--
ALTER TABLE `phtv_nft_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phtv_nft_drops_home`
--
ALTER TABLE `phtv_nft_drops_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_nft_info`
--
ALTER TABLE `phtv_nft_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phtv_nft_listing`
--
ALTER TABLE `phtv_nft_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phtv_nft_logos`
--
ALTER TABLE `phtv_nft_logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phtv_pages`
--
ALTER TABLE `phtv_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phtv_podcast`
--
ALTER TABLE `phtv_podcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phtv_podcast_auther`
--
ALTER TABLE `phtv_podcast_auther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_podcast_episode`
--
ALTER TABLE `phtv_podcast_episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phtv_price_type`
--
ALTER TABLE `phtv_price_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `phtv_product`
--
ALTER TABLE `phtv_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `phtv_product_brand`
--
ALTER TABLE `phtv_product_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phtv_product_cart`
--
ALTER TABLE `phtv_product_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `phtv_product_category`
--
ALTER TABLE `phtv_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phtv_product_color`
--
ALTER TABLE `phtv_product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phtv_product_hot_deals`
--
ALTER TABLE `phtv_product_hot_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_images`
--
ALTER TABLE `phtv_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `phtv_product_multi_color`
--
ALTER TABLE `phtv_product_multi_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `phtv_product_multi_size`
--
ALTER TABLE `phtv_product_multi_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `phtv_product_order`
--
ALTER TABLE `phtv_product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `phtv_product_order_items`
--
ALTER TABLE `phtv_product_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `phtv_product_order_payment`
--
ALTER TABLE `phtv_product_order_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_review`
--
ALTER TABLE `phtv_product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phtv_product_size`
--
ALTER TABLE `phtv_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `phtv_recommended_home`
--
ALTER TABLE `phtv_recommended_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_reword`
--
ALTER TABLE `phtv_reword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_reword_faq`
--
ALTER TABLE `phtv_reword_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_sponsored_by`
--
ALTER TABLE `phtv_sponsored_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phtv_users`
--
ALTER TABLE `phtv_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `phtv_voltage_category`
--
ALTER TABLE `phtv_voltage_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phtv_voltage_episode`
--
ALTER TABLE `phtv_voltage_episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `phtv_voltage_logo`
--
ALTER TABLE `phtv_voltage_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phtv_voltage_title`
--
ALTER TABLE `phtv_voltage_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phtv_banner`
--
ALTER TABLE `phtv_banner`
  ADD CONSTRAINT `phtv_banner_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `phtv_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_blog`
--
ALTER TABLE `phtv_blog`
  ADD CONSTRAINT `phtv_blog_ibfk_1` FOREIGN KEY (`auther_id`) REFERENCES `phtv_blog_auther` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_blog_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `phtv_blog_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_blog_comment`
--
ALTER TABLE `phtv_blog_comment`
  ADD CONSTRAINT `phtv_blog_comment_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `phtv_blog` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_chatting_group`
--
ALTER TABLE `phtv_chatting_group`
  ADD CONSTRAINT `phtv_chatting_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_chatting_group_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_chatting_history`
--
ALTER TABLE `phtv_chatting_history`
  ADD CONSTRAINT `phtv_chatting_history_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `phtv_chatting_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_chatting_history_ibfk_2` FOREIGN KEY (`receiver_user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_chatting_history_ibfk_3` FOREIGN KEY (`sender_user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_coin_balance_history`
--
ALTER TABLE `phtv_coin_balance_history`
  ADD CONSTRAINT `phtv_coin_balance_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_header`
--
ALTER TABLE `phtv_header`
  ADD CONSTRAINT `phtv_header_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `phtv_header` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_live_tv_24_7_page`
--
ALTER TABLE `phtv_live_tv_24_7_page`
  ADD CONSTRAINT `phtv_live_tv_24_7_page_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `phtv_live_tv_24_7_category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `phtv_nft_info`
--
ALTER TABLE `phtv_nft_info`
  ADD CONSTRAINT `phtv_nft_info_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `phtv_nft_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_nft_info_ibfk_2` FOREIGN KEY (`collection_id`) REFERENCES `phtv_nft_collection` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_podcast_episode`
--
ALTER TABLE `phtv_podcast_episode`
  ADD CONSTRAINT `phtv_podcast_episode_ibfk_1` FOREIGN KEY (`podcast_id`) REFERENCES `phtv_podcast` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product`
--
ALTER TABLE `phtv_product`
  ADD CONSTRAINT `phtv_product_ibfk_1` FOREIGN KEY (`product_brand_id`) REFERENCES `phtv_product_brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `phtv_product_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_cart`
--
ALTER TABLE `phtv_product_cart`
  ADD CONSTRAINT `phtv_product_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_cart_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `phtv_product_color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_cart_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `phtv_product_size` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_images`
--
ALTER TABLE `phtv_product_images`
  ADD CONSTRAINT `phtv_product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_multi_color`
--
ALTER TABLE `phtv_product_multi_color`
  ADD CONSTRAINT `phtv_product_multi_color_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `phtv_product_color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_multi_color_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_multi_size`
--
ALTER TABLE `phtv_product_multi_size`
  ADD CONSTRAINT `phtv_product_multi_size_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `phtv_product_size` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_multi_size_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_order`
--
ALTER TABLE `phtv_product_order`
  ADD CONSTRAINT `phtv_product_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_order_items`
--
ALTER TABLE `phtv_product_order_items`
  ADD CONSTRAINT `phtv_product_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `phtv_product_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_order_payment`
--
ALTER TABLE `phtv_product_order_payment`
  ADD CONSTRAINT `phtv_product_order_payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `phtv_product_order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_review`
--
ALTER TABLE `phtv_product_review`
  ADD CONSTRAINT `phtv_product_review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_voltage_episode`
--
ALTER TABLE `phtv_voltage_episode`
  ADD CONSTRAINT `phtv_voltage_episode_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `phtv_voltage_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_voltage_episode_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `phtv_admin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_voltage_episode_ibfk_3` FOREIGN KEY (`voltage_title_id`) REFERENCES `phtv_voltage_title` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
