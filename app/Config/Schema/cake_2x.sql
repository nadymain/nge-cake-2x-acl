-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 12:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_2x_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 142),
(2, 1, NULL, NULL, 'Articles', 2, 15),
(3, 2, NULL, NULL, 'search', 3, 4),
(4, 2, NULL, NULL, 'index', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'yesorno', 13, 14),
(9, 1, NULL, NULL, 'Blog', 16, 27),
(10, 9, NULL, NULL, 'index', 17, 18),
(11, 9, NULL, NULL, 'view', 19, 20),
(12, 9, NULL, NULL, 'category', 21, 22),
(13, 9, NULL, NULL, 'tag', 23, 24),
(14, 9, NULL, NULL, 'author', 25, 26),
(15, 1, NULL, NULL, 'Categories', 28, 37),
(16, 15, NULL, NULL, 'index', 29, 30),
(17, 15, NULL, NULL, 'add', 31, 32),
(18, 15, NULL, NULL, 'edit', 33, 34),
(19, 15, NULL, NULL, 'delete', 35, 36),
(20, 1, NULL, NULL, 'Groups', 38, 47),
(21, 20, NULL, NULL, 'index', 39, 40),
(22, 20, NULL, NULL, 'add', 41, 42),
(23, 20, NULL, NULL, 'edit', 43, 44),
(24, 20, NULL, NULL, 'delete', 45, 46),
(25, 1, NULL, NULL, 'Images', 48, 59),
(26, 25, NULL, NULL, 'index', 49, 50),
(27, 25, NULL, NULL, 'iframeindex', 51, 52),
(28, 25, NULL, NULL, 'add', 53, 54),
(29, 25, NULL, NULL, 'iframeadd', 55, 56),
(30, 25, NULL, NULL, 'delete', 57, 58),
(31, 1, NULL, NULL, 'Infos', 60, 73),
(32, 31, NULL, NULL, 'index', 61, 62),
(33, 31, NULL, NULL, 'show', 63, 64),
(34, 31, NULL, NULL, 'add', 65, 66),
(35, 31, NULL, NULL, 'edit', 67, 68),
(36, 31, NULL, NULL, 'delete', 69, 70),
(37, 31, NULL, NULL, 'yesorno', 71, 72),
(38, 1, NULL, NULL, 'Menus', 74, 89),
(39, 38, NULL, NULL, 'navmenu', 75, 76),
(40, 38, NULL, NULL, 'index', 77, 78),
(41, 38, NULL, NULL, 'add', 79, 80),
(42, 38, NULL, NULL, 'edit', 81, 82),
(43, 38, NULL, NULL, 'delete', 83, 84),
(44, 38, NULL, NULL, 'movedown', 85, 86),
(45, 38, NULL, NULL, 'moveup', 87, 88),
(46, 1, NULL, NULL, 'Pages', 90, 93),
(47, 46, NULL, NULL, 'display', 91, 92),
(48, 1, NULL, NULL, 'Settings', 94, 101),
(49, 48, NULL, NULL, 'index', 95, 96),
(50, 48, NULL, NULL, 'add', 97, 98),
(51, 48, NULL, NULL, 'edit', 99, 100),
(52, 1, NULL, NULL, 'Tags', 102, 111),
(53, 52, NULL, NULL, 'index', 103, 104),
(54, 52, NULL, NULL, 'add', 105, 106),
(55, 52, NULL, NULL, 'edit', 107, 108),
(56, 52, NULL, NULL, 'delete', 109, 110),
(57, 1, NULL, NULL, 'Users', 112, 125),
(58, 57, NULL, NULL, 'login', 113, 114),
(59, 57, NULL, NULL, 'logout', 115, 116),
(60, 57, NULL, NULL, 'index', 117, 118),
(61, 57, NULL, NULL, 'add', 119, 120),
(62, 57, NULL, NULL, 'edit', 121, 122),
(63, 57, NULL, NULL, 'delete', 123, 124),
(64, 1, NULL, NULL, 'AclExtras', 126, 127),
(65, 1, NULL, NULL, 'Cacher', 128, 129),
(66, 1, NULL, NULL, 'ContactX', 130, 135),
(67, 66, NULL, NULL, 'Contact', 131, 134),
(68, 67, NULL, NULL, 'index', 132, 133),
(69, 1, NULL, NULL, 'Search', 136, 137),
(70, 1, NULL, NULL, 'Slugomatic', 138, 139),
(71, 1, NULL, NULL, 'Upload', 140, 141);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 2, '1', '1', '1', '1'),
(4, 2, 15, '1', '1', '1', '1'),
(5, 2, 52, '1', '1', '1', '1'),
(6, 2, 25, '1', '1', '1', '1'),
(7, 2, 62, '1', '1', '1', '1'),
(8, 2, 59, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `content`, `description`, `image`, `category_id`, `user_id`, `status`, `created`, `modified`) VALUES
(1, 'Admin Article', 'admin-article', '<p><a href=\"#\">Lorem ipsum dolor sit amet</a>, consectetur adipiscing <s>elit</s>. In <code>malesuada </code>porta pulvinar. Mauris nibh tellus, viverra non hendrerit a, tincidunt non nisl. Ut volutpat nisi metus, eu viverra justo tempor vel. Nulla et turpis vitae est aliquam fringilla. Duis ultricies nisl lectus, ac scelerisque augue mattis id. Suspendisse a scelerisque urna. Proin eget consectetur purus. Sed vehicula fermentum ante a ornare. Vestibulum aliquet massa id eros bibendum, nec maximus magna viverra. Suspendisse iaculis fringilla mauris vehicula pellentesque.</p><ol><li>In eu enim eget nisl euismod aliquet.</li><li>In eu enim eget nisl euismod aliquet.</li></ol><p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus ultrices enim risus, vitae blandit velit hendrerit a. Mauris ante elit, finibus a vulputate non, dapibus nec nisl.</p><p>Nulla et turpis vitae est aliquam fringilla. Duis ultricies nisl lectus, ac scelerisque augue mattis id. Suspendisse a scelerisque urna. Proin eget consectetur purus. Sed vehicula fermentum ante a ornare. Vestibulum aliquet massa id eros bibendum, nec maximus magna viverra. Suspendisse iaculis fringilla mauris vehicula pellentesque.</p><p>Praesent in ex velit. Donec finibus gravida consequat. Quisque hendrerit non ligula ac varius. Morbi ac sodales ligula. Donec non maximus elit. Nunc dictum ac tellus sed finibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p><blockquote><p>Vivamus porttitor, tellus non pretium imperdiet, leo nisi ornare turpis, non ultrices felis tellus eget urna.</p></blockquote><p>Fusce mattis dui mollis vulputate bibendum. Sed at urna egestas, tristique turpis et, dignissim diam. Fusce nec mauris ut sapien ultricies lacinia. Nunc dui ipsum, elementum nec pretium quis, accumsan sed mauris. Mauris accumsan, enim et maximus suscipit, est metus interdum erat, eleifend ultrices risus leo quis libero.</p><pre>blockquote {\r\n&nbsp;&nbsp;&nbsp;&nbsp;font-family: serif;\r\n&nbsp;&nbsp;&nbsp;&nbsp;font-size: 1.15rem;\r\n&nbsp;&nbsp;&nbsp;&nbsp;font-style: italic;\r\n}</pre><h2>Vestibulum vel interdum neque</h2><p>Vestibulum vel interdum neque, vel luctus est. Donec eu nisl felis. Praesent a sapien tellus. Phasellus rhoncus nisi ut ex tincidunt rhoncus. Mauris et ante nec ex porttitor accumsan. Nunc est dui, malesuada sit amet gravida at, tempor id ex. Vivamus viverra venenatis augue non tristique.</p><h3>Vestibulum vel interdum neque</h3><table cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td>1</td><td>2</td><td>3</td></tr><tr><td>4</td><td>5</td><td>6</td></tr><tr><td>7</td><td>8</td><td>9</td></tr></tbody></table><p>Mauris nibh tellus, viverra non hendrerit a, tincidunt non nisl. Ut volutpat nisi metus, eu viverra justo tempor vel. Nulla et turpis vitae est aliquam fringilla. Duis ultricies nisl lectus, ac scelerisque augue mattis id. Suspendisse a scelerisque urna. Proin eget consectetur purus. Sed vehicula fermentum ante a ornare.</p><hr /><p>Vestibulum aliquet massa id eros bibendum, nec maximus magna viverra. Suspendisse iaculis fringilla mauris vehicula pellentesque.</p>', 'Admin Article', '', 1, 1, 'published', '2018-02-24 16:10:00', '2018-02-27 05:07:24'),
(2, 'Author Article', 'author-article', '<p>Mauris dignissim accumsan consequat. Morbi viverra dui libero, a consequat leo placerat id. Cras vestibulum mauris nec massa vulputate, at iaculis velit auctor. Sed sed est a nulla sodales convallis a euismod risus. Etiam fringilla eget felis nec vehicula. Nunc ex risus, feugiat vitae velit vel, molestie lobortis ex. Cras blandit augue vitae nisi efficitur, a malesuada nunc malesuada. Integer convallis nisi enim, in dictum urna lobortis ut. Mauris luctus odio erat, sed mattis orci condimentum in. Praesent nec risus elementum, lobortis eros sit amet, semper leo. Proin blandit rutrum odio ut tincidunt. Quisque nec laoreet ipsum. Etiam sodales egestas eleifend. Fusce dapibus congue orci in ullamcorper. Sed in lorem id nibh rutrum vestibulum et quis leo. Aenean nisi metus, lobortis ac leo eu, cursus efficitur lorem.</p><p>Cras molestie cursus felis vitae ultricies. Fusce in pellentesque neque, non pulvinar ex. Pellentesque sodales, massa non vulputate ornare, ligula nisl luctus enim, a porttitor magna eros at massa. Sed a neque dictum, rhoncus quam ut, fringilla velit. Mauris eleifend orci metus, nec sodales nisl auctor a. Proin sem ante, tempor ut laoreet non, condimentum at erat. Morbi pellentesque interdum arcu.</p><p>Duis sodales ac sapien eget tincidunt. Vivamus suscipit, sem et ultricies efficitur, dui neque molestie sem, et hendrerit risus massa in metus. Curabitur leo leo, luctus in condimentum tincidunt, vulputate in eros. Pellentesque commodo libero sed erat fringilla, vitae pharetra leo mollis. Aliquam malesuada sed elit eget mollis. Integer lobortis, turpis quis faucibus dignissim, mi metus semper lorem, sagittis cursus justo dolor et neque. Nunc ac velit ac augue tempor ultrices. In aliquam magna mi, ac tincidunt nisi posuere vel.</p>', 'Author Article', '', 2, 2, 'published', '2018-02-24 16:18:00', '2018-02-27 11:05:59'),
(3, 'Draft', 'draft', '<p>Cras molestie cursus felis vitae ultricies. Fusce in pellentesque neque, non pulvinar ex. Pellentesque sodales, massa non vulputate ornare, ligula nisl luctus enim, a porttitor magna eros at massa. Sed a neque dictum, rhoncus quam ut, fringilla velit. Mauris eleifend orci metus, nec sodales nisl auctor a. Proin sem ante, tempor ut laoreet non, condimentum at erat. Morbi pellentesque interdum arcu. Duis sodales ac sapien eget tincidunt. Vivamus suscipit, sem et ultricies efficitur, dui neque molestie sem, et hendrerit risus massa in metus. Curabitur leo leo, luctus in condimentum tincidunt, vulputate in eros. Pellentesque commodo libero sed erat fringilla, vitae pharetra leo mollis. Aliquam malesuada sed elit eget mollis. Integer lobortis, turpis quis faucibus dignissim, mi metus semper lorem, sagittis cursus justo dolor et neque. Nunc ac velit ac augue tempor ultrices. In aliquam magna mi, ac tincidunt nisi posuere vel.</p>', '', '', 1, 1, 'draft', '2018-02-26 22:50:00', '2018-02-27 09:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `articles_tags`
--

CREATE TABLE `articles_tags` (
  `id` int(10) NOT NULL,
  `article_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles_tags`
--

INSERT INTO `articles_tags` (`id`, `article_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `article_count` int(10) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `article_count`, `created`) VALUES
(1, 'Uncategories', 'uncategories', 'Description Uncategories', 1, '2018-02-19 11:54:31'),
(2, 'Cat 01', 'cat-01', '', 1, '2018-02-22 01:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created`) VALUES
(1, 'Administrator', 'as admin', '2018-02-19 11:47:38'),
(2, 'Author', 'as author', '2018-02-19 11:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` int(10) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `title`, `slug`, `content`, `description`, `status`, `created`) VALUES
(1, 'About', 'about', '<p>In eu enim eget nisl euismod aliquet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus ultrices enim risus, vitae blandit velit hendrerit a. Mauris ante elit, finibus a vulputate non, dapibus nec nisl. Praesent in ex velit. Donec finibus gravida consequat. Quisque hendrerit non ligula ac varius. Morbi ac sodales ligula. Donec non maximus elit. Nunc dictum ac tellus sed finibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus porttitor, tellus non pretium imperdiet, leo nisi ornare turpis, non ultrices felis tellus eget urna.</p><p>Fusce mattis dui mollis vulputate bibendum. Sed at urna egestas, tristique turpis et, dignissim diam. Fusce nec mauris ut sapien ultricies lacinia. Nunc dui ipsum, elementum nec pretium quis, accumsan sed mauris. Mauris accumsan, enim et maximus suscipit, est metus interdum erat, eleifend ultrices risus leo quis libero. Vestibulum vel interdum neque, vel luctus est. Donec eu nisl felis. Praesent a sapien tellus. Phasellus rhoncus nisi ut ex tincidunt rhoncus. Mauris et ante nec ex porttitor accumsan. Nunc est dui, malesuada sit amet gravida at, tempor id ex. Vivamus viverra venenatis augue non tristique.</p>', 'Phasellus rhoncus nisi ut ex tincidunt rhoncus. Mauris et ante nec ex porttitor accumsan. Nunc est dui, malesuada sit amet gravida at, tempor id ex. Vivamus viverra venenatis augue non tristique.', 'published', '2018-02-20 06:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `link`, `parent_id`, `lft`, `rght`) VALUES
(1, 'Home', '/', NULL, 1, 2),
(2, 'Blog', '/blog', NULL, 3, 4),
(3, 'Login', '/login', NULL, 13, 14),
(4, 'Dropdown', '#', NULL, 5, 10),
(5, 'Parent 01', '#', 4, 6, 7),
(6, 'Parent 02', '#', 4, 8, 9),
(7, 'Contact Us', '/contact', NULL, 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_value` text COLLATE utf8mb4_unicode_ci,
  `input_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `name_key`, `name_value`, `input_type`) VALUES
(1, 'Site Title', 'site_title', 'Your Site Title', 'text'),
(2, 'Site Tagline', 'site_tagline', 'Your Site Tagline Here', 'text'),
(3, 'SIte Description', 'site_description', 'Your Meta Description for your Site', 'textarea'),
(4, 'Site Logo', 'site_logo', '', 'text'),
(5, 'Site Email', 'site_email', 'admin@example.com', 'text'),
(6, 'Articles/Page', 'articles_page', '2', 'number');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `article_count` int(10) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `description`, `article_count`, `created`) VALUES
(1, 'Untag', 'untag', 'Description Untag', 2, '2018-02-19 11:54:40'),
(2, 'Tag 01', 'tag-01', '', 1, '2018-02-22 02:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_count` int(10) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `group_id`, `username`, `password`, `description`, `photo`, `article_count`, `last_login`, `created`) VALUES
(1, 'Admin', 'admin', 1, 'admin', '$2a$10$GWlTf97UEHB3Y2srylmiHeUxNrhH3Vy52zyYU0/tVLyQ6g1jRTzlq', 'Admin description', '', 1, '2018-02-27 09:39:46', '2018-02-19 11:49:05'),
(2, 'Author 01', 'author-01', 2, 'author', '$2a$10$bS61XAmzNOPFLlYP7rSJo.bFcTb.vgf.mx8EVvoowr2sRS7vQJjEW', '', '', 1, '2018-02-27 09:58:31', '2018-02-19 11:49:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_acos_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_acos_alias` (`alias`(191));

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aros_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_aros_alias` (`alias`(191));

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  ADD KEY `idx_aco_id` (`aco_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_key` (`name_key`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `articles_tags`
--
ALTER TABLE `articles_tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
