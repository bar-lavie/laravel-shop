-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2018 at 12:07 PM
-- Server version: 10.0.34-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiccoi1_we_r_epic`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `article`, `image`, `url`, `updated_at`, `created_at`) VALUES
(1, 'אלגנטי', '<p>כל הנעליים האלגנטיות</p>', '2017.11.03.07.40.36-pexels-photo-298863.jpg', 'elegant', '2017-11-03 19:40:36', '2017-11-03 19:40:36'),
(2, 'ספורטיבי', '<p>כל נעלי הספורט</p>', '2017.11.03.07.40.55-pexels-photo-90365.jpg', 'sport', '2017-11-03 19:40:55', '2017-11-03 19:40:55'),
(3, 'הליכה', '<p>נעליים ליום יום</p>', '2017.11.03.09.43.27-pexels-photo-533591.jpg', 'daily', '2017-11-03 21:43:27', '2017-11-03 19:41:32'),
(4, 'נעליים אורטופדיות', 'נוחות מעל לכל', '2017.12.30.11.21.43-shoes-1897708_640.jpg', 'נעליים-אורטופדיות', '2017-12-30 11:21:43', '2017-12-30 11:13:20'),
(5, 'מגפיים', 'מגפיים אלגנטיות וליום יום', '2017.12.30.11.23.10-shoes-1737467_640.jpg', 'מגפיים', '2017-12-30 11:23:10', '2017-12-30 11:23:10'),
(6, 'כפכפים', '<p>קיץ קיץ קיץ!</p>', '2017.12.30.11.25.56-flip-flops-1599223_640.jpg', 'כפכפים', '2017-12-30 11:25:56', '2017-12-30 11:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `menu_id`, `title`, `article`, `updated_at`, `created_at`) VALUES
(1, 1, 'כל השאלות והתשובות', '<p>זה תוכן לשאלות ותשובות!</p>', '2017-10-13 08:11:46', '2017-10-11 00:00:00'),
(2, 2, 'עזרה', 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית קולהע צופעט למרקוח איבן איף, ברומץ כלרשט מיחוצים. קלאצי סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול, צוט ומעיוט - לפתיעם ברשג - ולתיעם גדדיש. קוויז דומור ליאמום בלינך רוגצה. לפמעט \r\n\r\nליבם סולגק. בראיט ולחת צורק מונחף, בגורמי מגמש. תרבנך וסתעד לכנו סתשם השמה - לתכי מורגם בורק? לתיג ישבעס.\r\n\r\nלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. קונדימנטום קורוס בליקרה, נונסטי קלובר בריקנה סטום, לפריקך תצטריק לרטי. ', '2017-10-11 00:00:00', '2017-10-11 00:00:00'),
(3, 3, 'משלוחים', 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית קולהע צופעט למרקוח איבן איף, ברומץ כלרשט מיחוצים. קלאצי סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול, צוט ומעיוט - לפתיעם ברשג - ולתיעם גדדיש. קוויז דומור ליאמום בלינך רוגצה. לפמעט \r\n\r\nליבם סולגק. בראיט ולחת צורק מונחף, בגורמי מגמש. תרבנך וסתעד לכנו סתשם השמה - לתכי מורגם בורק? לתיג ישבעס.\r\n\r\nלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. קונדימנטום קורוס בליקרה, נונסטי קלובר בריקנה סטום, לפריקך תצטריק לרטי. ', '2017-10-11 00:00:00', '2017-10-11 00:00:00'),
(4, 4, 'החזרות', 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית קולהע צופעט למרקוח איבן איף, ברומץ כלרשט מיחוצים. קלאצי סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול, צוט ומעיוט - לפתיעם ברשג - ולתיעם גדדיש. קוויז דומור ליאמום בלינך רוגצה. לפמעט \r\n\r\nליבם סולגק. בראיט ולחת צורק מונחף, בגורמי מגמש. תרבנך וסתעד לכנו סתשם השמה - לתכי מורגם בורק? לתיג ישבעס.\r\n\r\nלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. קונדימנטום קורוס בליקרה, נונסטי קלובר בריקנה סטום, לפריקך תצטריק לרטי. ', '2017-10-11 00:00:00', '2017-10-11 00:00:00'),
(5, 5, 'אודות', 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית קולהע צופעט למרקוח איבן איף, ברומץ כלרשט מיחוצים. קלאצי סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול, צוט ומעיוט - לפתיעם ברשג - ולתיעם גדדיש. קוויז דומור ליאמום בלינך רוגצה. לפמעט \r\n\r\nליבם סולגק. בראיט ולחת צורק מונחף, בגורמי מגמש. תרבנך וסתעד לכנו סתשם השמה - לתכי מורגם בורק? לתיג ישבעס.\r\n\r\nלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. קונדימנטום קורוס בליקרה, נונסטי קלובר בריקנה סטום, לפריקך תצטריק לרטי. ', '2017-10-11 00:00:00', '2017-10-11 00:00:00'),
(7, 7, 'אבטחה וכנולוגיה', 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית קולהע צופעט למרקוח איבן איף, ברומץ כלרשט מיחוצים. קלאצי סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול, צוט ומעיוט - לפתיעם ברשג - ולתיעם גדדיש. קוויז דומור ליאמום בלינך רוגצה. לפמעט \r\n\r\nליבם סולגק. בראיט ולחת צורק מונחף, בגורמי מגמש. תרבנך וסתעד לכנו סתשם השמה - לתכי מורגם בורק? לתיג ישבעס.\r\n\r\nלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. קונדימנטום קורוס בליקרה, נונסטי קלובר בריקנה סטום, לפריקך תצטריק לרטי. ', '2017-10-11 00:00:00', '2017-10-11 00:00:00'),
(8, 8, 'נגישות', 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית קולהע צופעט למרקוח איבן איף, ברומץ כלרשט מיחוצים. קלאצי סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול, צוט ומעיוט - לפתיעם ברשג - ולתיעם גדדיש. קוויז דומור ליאמום בלינך רוגצה. לפמעט \r\n\r\nליבם סולגק. בראיט ולחת צורק מונחף, בגורמי מגמש. תרבנך וסתעד לכנו סתשם השמה - לתכי מורגם בורק? לתיג ישבעס.\r\n\r\nלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. קונדימנטום קורוס בליקרה, נונסטי קלובר בריקנה סטום, לפריקך תצטריק לרטי. ', '2017-10-11 00:00:00', '2017-10-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_users`
--

CREATE TABLE `facebook_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `provider_user_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facebook_users`
--

INSERT INTO `facebook_users` (`id`, `name`, `email`, `password`, `provider_user_id`, `created_at`, `updated_at`) VALUES
(1, 'Bar Zioni', 'barzioni90@gmail.com', '$2y$10$Q5lzW9Nm2Aeg4YeJy8SPzuEid8ObSJtk031jgnZhx1RYwcfjvvAW.', '10210694450821444', '2017-11-11 09:19:27', '2017-11-11 09:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_users_roles`
--

CREATE TABLE `facebook_users_roles` (
  `uid` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facebook_users_roles`
--

INSERT INTO `facebook_users_roles` (`uid`, `role`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `link`, `url`, `title`, `updated_at`, `created_at`) VALUES
(1, 'שאלות ותשובות', 'faq', 'שאלות ותשובות', '2017-10-11 00:00:00', '2017-10-11 00:00:00'),
(2, 'עזרה', 'help', 'עזרה', '2017-10-11 00:00:00', '2017-10-11 00:00:00'),
(3, 'משלוחים', 'delivery', 'משלוחים', '2017-10-11 00:00:00', '2017-10-11 00:00:00'),
(4, 'החזרות', 'החזרות', 'החזרות', '2017-10-13 07:58:44', '2017-10-11 00:00:00'),
(5, 'אודות', 'about', 'אודות', '2017-10-11 00:00:00', '2017-10-11 00:00:00'),
(6, 'תנאים ופרטיות', 'תנאים-ופרטיות', 'תנאים ופרטיות', '2017-10-13 07:58:40', '2017-10-11 00:00:00'),
(7, 'אבטחה וטכנולוגיה', 'אבטחה-וטכנולוגיה', 'אבטחה וטכנולוגיה', '2017-10-13 07:58:35', '2017-10-11 00:00:00'),
(8, 'הצהרת נגישות', 'הצהרת-נגישות', 'נגישות', '2017-10-12 18:00:37', '2017-10-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `data`, `total`, `updated_at`, `created_at`) VALUES
(1, 1, 'a:1:{i:11;a:6:{s:2:\"id\";s:2:\"11\";s:4:\"name\";s:58:\"נעלי עור אלגנטיות חומות מעוטרות\";s:5:\"price\";d:600;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '600.00', '2018-01-01 20:34:43', '2018-01-01 20:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `article`, `url`, `image`, `price`, `updated_at`, `created_at`) VALUES
(1, 1, 'נעלי עור אלגנטיות חומות', '<p>נעלי עור אלגנטיות חומות</p>', 'נעלי-עור-אלגנטיות-חומות', '2017.11.03.07.42.59-pexels-photo-293406.jpg', '390.00', '2017-11-03 19:42:59', '2017-11-03 19:42:49'),
(2, 1, 'נעלי סירה אלגנטיות', '<p>נעלי סירה אלגנטיות<br></p>', 'נעלי-סירה-אלגנטיות', '2017.11.03.07.43.47-pexels-photo-267301 1.jpg', '250.00', '2017-11-03 19:43:47', '2017-11-03 19:43:47'),
(11, 1, 'נעלי עור אלגנטיות חומות מעוטרות', '<p>נעלי עור אלגנטיות חומות מעוטרות</p>', 'נעלי-עור-אלגנטיות-חומות-מעוטרות', '2017.11.03.08.40.16-pexels-photo-298864.jpg', '600.00', '2017-11-03 20:40:16', '2017-11-03 20:40:16'),
(12, 1, 'נעליים שחורות קלאסיות', '<p>נעליים שחורות קלאסיות<br></p>', 'נעליים-שחורות-קלאסיות', '2017.11.03.08.51.53-pexels-photo-292999.jpg', '460.00', '2017-11-03 20:51:53', '2017-11-03 20:51:53'),
(13, 2, 'נעלי ספורט UnderArmor', '<p>נעלי ספורט UnderArmor שחורות<br></p>', 'נעלי-ספורט-underarmor', '2017.11.03.09.37.53-pexels-photo-434375.jpg', '560.00', '2017-11-03 21:37:53', '2017-11-03 20:52:36'),
(14, 2, 'נעלי ספורט Nike', '<p>נעלי ספורט Nike<br></p>', 'נעלי-ספורט-nike', '2017.11.03.09.39.15-healthy-light-woman-legs.jpg', '350.00', '2017-11-03 21:39:15', '2017-11-03 21:38:55'),
(15, 2, 'נעלי ספורט Acis', '<p>נעלי ספורט Acis לריצה<br></p>', 'נעלי-ספורט-acis', '2017.11.03.09.39.49-running-shoe-shoe-brooks-highly-functional-54334.jpg', '550.00', '2017-11-03 21:39:49', '2017-11-03 21:39:49'),
(16, 3, 'נעלי הליכה אורטופדיות', '<p>נעלי הליכה אורטופדיות בצבע כחול נייבי<br></p>', 'נעלי-הליכה-אורטופדיות', '2017.11.03.09.40.37-pexels-photo.jpg', '300.00', '2017-11-03 21:40:37', '2017-11-03 21:40:37'),
(17, 3, 'נעלי הליכה מעור', '<p>נעלי הליכה אורטופדיות בז\'<br></p>', 'נעלי-הליכה-מעור', '2017.11.03.09.41.23-pexels-photo-267294.jpg', '320.00', '2017-11-03 21:41:23', '2017-11-03 21:41:23'),
(18, 3, 'נעלי הליכה Nike', '<p>נעלי הליכה Nike עם סוליה רחבה<br></p>', 'נעלי-הליכה-nike', '2017.11.03.09.42.09-pexels-photo-250356.jpg', '430.00', '2017-11-03 21:42:09', '2017-11-03 21:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`) VALUES
(1, '-', '-', '-', '2017-10-10 00:00:00', '2017-10-10 00:00:00'),
(2, '--', '--', '--', '2017-10-10 00:00:00', '2017-10-10 00:00:00'),
(4, 'אבי כהן', 'avico@gmail.com', '$2y$10$N24EOSgcAI92djZJWbZ1P.6cl2IUPxWWLJR5pNgOdoe/CQ4Z.ZDuK', '2017-10-10 00:00:00', '2017-10-10 00:00:00'),
(5, 'פופאי', 'popeye@gmail.com', '$2y$10$.AEOnDkqNzoQ7/DG6vO6yOdDdrjzenUh4nOcJ6uvxsehMEw75wqx6', '2017-10-11 07:44:19', '2017-10-11 07:44:19'),
(6, 'olive', 'olive@gmail.com', '$2y$10$ns/efshuHAZqBx3Mn9fxQuqO5vyAvehJXEV8gyZwh4gK0u7TVhxXG', '2017-10-11 07:49:54', '2017-10-11 07:49:54'),
(7, 'רון', 'ron@gmail.com', '$2y$10$3tdJt71e9LYHVhrDmWjyq.I/UNW5e3gHXbQ9wwGVZud3FzRFf3GZa', '2017-10-11 11:19:13', '2017-10-11 11:19:13'),
(8, 'בר ציוני', 'bar@gmail.com', '$2y$10$/mJtT8E6QL2GTz68BoVlMuUBsnucQm58yash/VZSYfJEyTU.seD5G', '2017-11-10 21:40:59', '2017-11-10 21:40:59'),
(9, 'Amir', 'amir602@gmail.com', '$2y$10$bsJhqCEYM2wZgK4caj6hP.v6SJuoL.cRIalnGp2lAg05PX4R4Scea', '2018-01-01 22:28:11', '2018-01-01 22:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `uid` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`uid`, `role`) VALUES
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 3),
(9, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebook_users`
--
ALTER TABLE `facebook_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facebook_users`
--
ALTER TABLE `facebook_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
