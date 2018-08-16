-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2018 at 10:55 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `judahtips`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `line_1` text NOT NULL,
  `line_2` text NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `line_1`, `line_2`, `province_id`, `city`, `post_code`, `country_id`, `created`, `modified`) VALUES
(1, 22, '217 Molware Estate', 'Cnr Reitspruit & Morithi Str', 1, 'Centurion', '0157', NULL, '2017-04-20 19:38:57', '2017-04-21 13:45:43'),
(2, 42, 'rooihuiskraal', '93 horbill avenue ', 1, 'Centurion', '0157', NULL, '2017-07-10 19:39:52', '2017-07-10 19:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Engineering', '', '2017-02-20 00:00:00', '2017-04-01 00:00:00'),
(2, 'Software Development', '', '2017-02-24 00:00:00', '2017-04-01 00:00:00'),
(3, 'Web Design', '', '2017-02-20 00:00:00', '2017-04-01 00:00:00'),
(4, 'Law', '', '2017-02-24 00:00:00', '2017-04-01 00:00:00'),
(5, 'Environmental Science', '', '2018-03-08 00:00:00', '2018-03-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cert_id` int(11) NOT NULL,
  `kind` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `type` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `message`, `created`) VALUES
(24, 22, 8, 'gggg', '2017-07-11 22:15:27'),
(23, 22, 7, 'This class provides', '2017-04-25 13:19:36'),
(16, 22, 8, 'I will be attending the conference tomorrow', '2017-04-25 11:35:47'),
(17, 36, 8, 'I will give u guys a call', '2017-04-25 11:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`id`, `user_id`, `post_id`, `comment_id`, `created`) VALUES
(41, 22, 8, 17, '2017-04-25 13:14:55'),
(42, 22, 8, 16, '2017-05-11 16:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `user_id`, `post_id`, `comment_id`, `reply`, `created`) VALUES
(41, 22, NULL, 23, 'okay', '2017-04-25 13:19:51'),
(40, 22, NULL, 16, 'cool', '2017-04-25 13:11:34'),
(39, 22, NULL, 17, 'cool', '2017-04-25 13:11:07'),
(38, 22, NULL, 16, 'stain', '2017-04-25 13:06:13'),
(37, 36, NULL, 16, 'cool', '2017-04-25 11:42:26'),
(36, 22, NULL, 16, 'I will try and join u', '2017-04-25 11:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `high_schools`
--

CREATE TABLE `high_schools` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school` varchar(50) NOT NULL,
  `start_date` varchar(12) NOT NULL,
  `end_date` varchar(12) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `high_schools`
--

INSERT INTO `high_schools` (`id`, `user_id`, `school`, `start_date`, `end_date`, `created`, `modified`) VALUES
(47, 42, 'Akosombo Secondary School', '07/19/2017', '07/24/2017', '2017-07-10 19:52:22', '2017-07-10 19:52:22'),
(49, 36, 'University Of Legon', '07/18/2017', '07/24/2017', '2017-07-10 20:40:16', '2017-07-10 20:40:16'),
(45, 22, 'Cambridge School Complex', '04/02/2017', '04/29/2017', '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(48, 36, 'University Of Legon', '07/18/2017', '07/24/2017', '2017-07-10 20:40:15', '2017-07-10 20:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `high_schools_subjects`
--

CREATE TABLE `high_schools_subjects` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `high_school_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `high_schools_subjects`
--

INSERT INTO `high_schools_subjects` (`id`, `subject_id`, `high_school_id`, `created`, `modified`) VALUES
(13, 2, 43, NULL, NULL),
(11, 1, 43, NULL, NULL),
(14, 6, 43, NULL, NULL),
(15, 8, 43, NULL, NULL),
(16, 1, 44, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(17, 2, 44, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(18, 4, 44, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(19, 6, 44, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(20, 7, 44, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(21, 1, 45, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(22, 2, 45, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(23, 4, 45, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(24, 6, 45, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(25, 7, 45, '2017-04-26 13:49:01', '2017-04-26 13:49:01'),
(26, 1, 46, '2017-07-10 19:52:21', '2017-07-10 19:52:21'),
(27, 3, 46, '2017-07-10 19:52:21', '2017-07-10 19:52:21'),
(28, 4, 46, '2017-07-10 19:52:21', '2017-07-10 19:52:21'),
(29, 5, 46, '2017-07-10 19:52:21', '2017-07-10 19:52:21'),
(30, 9, 46, '2017-07-10 19:52:21', '2017-07-10 19:52:21'),
(31, 16, 46, '2017-07-10 19:52:21', '2017-07-10 19:52:21'),
(32, 1, 47, '2017-07-10 19:52:22', '2017-07-10 19:52:22'),
(33, 3, 47, '2017-07-10 19:52:22', '2017-07-10 19:52:22'),
(34, 4, 47, '2017-07-10 19:52:22', '2017-07-10 19:52:22'),
(35, 5, 47, '2017-07-10 19:52:22', '2017-07-10 19:52:22'),
(36, 9, 47, '2017-07-10 19:52:22', '2017-07-10 19:52:22'),
(37, 16, 47, '2017-07-10 19:52:22', '2017-07-10 19:52:22'),
(38, 3, 48, '2017-07-10 20:40:15', '2017-07-10 20:40:15'),
(39, 4, 48, '2017-07-10 20:40:15', '2017-07-10 20:40:15'),
(40, 10, 48, '2017-07-10 20:40:15', '2017-07-10 20:40:15'),
(41, 3, 49, '2017-07-10 20:40:16', '2017-07-10 20:40:16'),
(42, 4, 49, '2017-07-10 20:40:16', '2017-07-10 20:40:16'),
(43, 10, 49, '2017-07-10 20:40:16', '2017-07-10 20:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `to_id` int(11) NOT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'new',
  `avatar` varchar(100) DEFAULT NULL,
  `reply` varchar(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `sender`, `to_id`, `subject`, `message`, `status`, `avatar`, `reply`, `created`, `modified`) VALUES
(58, 22, 'Reginald Bossman', 42, '', 'The above will run a separate transaction for each entity saved. If you’d like to process all the entities as a single transaction you can use transactional()', 'read', '1499699754_184387.jpg', NULL, '2017-07-11 18:25:26', '2017-08-02 12:05:08'),
(61, 42, 'Lizile Xulu', 36, '', 'How to Insert Multiple Rows in CakePHP 3 | Andolasoft - Andolasoft Blog\r\nblog.andolasoft.com/2016/05/insert-multiple-rows-cakephp-3.html', 'read', '1499697827_380340.jpeg', NULL, '2017-07-11 19:21:28', '2017-07-11 19:37:31'),
(63, 42, 'Reginald Bossman', 22, NULL, 'In the above example, you’ll still get authors even if they don’t have a published profile. To only get authors with a published profile use matching(). If you have defined custom finders in your associations', 'read', '1499699754_184387.jpg', 'yes', '2017-07-11 20:30:24', '2018-03-12 11:56:00'),
(64, 42, 'Lizile Xulu', 22, '', '$comments = TableRegistry::get(\'Comments\');\r\n$present = (new Collection($entity->comments))->extract(\'id\')->filter()->toArray();\r\n$comments->deleteAll([\r\n    \'article_id\' => $article->id,\r\n    \'id NOT IN\' => $present\r\n]);', 'read', '1499697827_380340.jpeg', NULL, '2017-07-11 20:32:35', '2018-03-12 11:56:00'),
(59, 42, 'Lizile Xulu', 22, '', 'CakePHP 3.x: saving multiple records - Stack Overflow', 'read', '1499697827_380340.jpeg', NULL, '2017-07-11 18:44:26', '2018-03-12 11:56:00'),
(60, 22, 'Reginald Bossman', 42, '', 'Sup bra ', 'read', '1499699754_184387.jpg', NULL, '2017-07-11 18:48:38', '2017-08-02 12:05:08'),
(54, 42, 'Lizile Xulu', 22, '', 'https://stackoverflow.com/questions/.../how-to-save-array-data-in-database-in-cakeph...Jun 9, 2016 - You have assigned $user with $this->Users->newEntity(); . And afterwords you are .... Cross Validated (stats) · Theoretical Computer Science · Physics · Chemistry · Biology · Computer Science · Philosophy · more (3).', 'read', '1499697827_380340.jpeg', NULL, '2017-07-11 18:16:48', '2018-03-12 11:56:00'),
(55, 42, 'Lizile Xulu', 22, '', 'Number of years PHP Development experience Current Salary Expected Salary Notice Period Please let me know if I can go ahead and refer your profile to the client. I will send you ', 'read', '1499697827_380340.jpeg', NULL, '2017-07-11 18:17:21', '2018-03-12 11:56:00'),
(56, 22, 'Reginald Bossman', 42, '', 'Saving Data - 3.x - The CakePHP cookbook\r\nhttps://book.cakephp.org/3.0/en/orm/saving-data.html\r\nBefore editing and saving data back to your database, you\'ll need to convert the request data from the array format held in the request, and the entities that the ...', 'read', '1499699754_184387.jpg', NULL, '2017-07-11 18:20:16', '2017-08-02 12:05:08'),
(57, 22, 'Reginald Bossman', 42, '', 'php - Cakephp 3 saving array of data - Stack Overflow\r\nhttps://stackoverflow.com/questions/37162387/cakephp-3-saving-array-of-data\r\nMay 11, 2016 - No, there isn\'t, if you need such a function, then you have to create it on your own, which should be a pretty easy thing to do though, just add a ...', 'read', '1499699754_184387.jpg', NULL, '2017-07-11 18:21:09', '2017-08-02 12:05:08'),
(65, 22, 'Reginald Bossman', 37, '', 'he domain is the name of the host of the API\'s client. The server will check the requests come from one of the authorised domains for the client. This will need to match location.hostname of the client system.', 'new', '1499699754_184387.jpg', NULL, '2017-08-02 11:59:48', '2017-08-02 11:59:48'),
(66, 22, 'Reginald Bossman', 42, '', 'he domain is the name of the host of the API\'s client. The server will check the requests come from one of the authorised domains for the client. This will need to match location.hostname of the client system.', 'read', '1499699754_184387.jpg', NULL, '2017-08-02 12:01:36', '2017-08-02 12:05:08'),
(67, 22, 'Lizile Xulu', 42, NULL, 'YES', 'read', '1499697827_380340.jpeg', 'yes', '2017-08-02 12:04:59', '2017-08-02 12:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `message_reply`
--

CREATE TABLE `message_reply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `sender` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_reply`
--

INSERT INTO `message_reply` (`id`, `user_id`, `reply`, `sender`, `avatar`, `created`) VALUES
(1, 36, ' Hybrid Cloud Confusion?\n\nHPE & velocity group have Hybrid Cloud expertise', 'Reggie Bossman', '', '2017-07-11 19:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `networks`
--

CREATE TABLE `networks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `network_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `networks`
--

INSERT INTO `networks` (`id`, `user_id`, `status`, `network_id`, `created`) VALUES
(114, 42, 'Connect', 36, '2017-07-11 18:51:04'),
(113, 42, 'Connect', 22, '2017-07-10 14:07:02'),
(112, 22, 'Connect', 37, '2017-07-05 22:38:12'),
(111, 36, 'Connect', 22, '2017-07-05 18:57:14'),
(110, 22, 'Connect', 42, '2017-07-04 09:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `avatar`, `size`, `type`, `created`, `modified`) VALUES
(30, 22, '1499699754_184387.jpg', '879394', 'image/jpeg', '2017-07-10 15:15:54', '2017-07-10 15:15:54'),
(26, 36, '1492976042_348724.jpg', '879394', 'image/jpeg', '2017-04-23 19:34:02', '2017-04-23 19:34:02'),
(25, 22, '1492871104_562469.jpg', '879394', 'image/jpeg', '2017-04-22 14:25:04', '2017-04-22 14:25:04'),
(29, 22, '1499699713_408233.jpg', '879394', 'image/jpeg', '2017-07-10 15:15:13', '2017-07-10 15:15:13'),
(28, 42, '1499697827_380340.jpeg', '1364289', 'image/jpeg', '2017-07-10 14:43:47', '2017-07-10 14:43:47'),
(27, 36, '1493048742_894287.jpg', '620888', 'image/jpeg', '2017-04-24 15:45:42', '2017-04-24 15:45:42'),
(22, 22, '1492870909_773712.jpg', '879394', 'image/jpeg', '2017-04-22 14:21:49', '2017-04-22 14:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `content`, `created`, `modified`) VALUES
(2, 20, 9, 'I\'m passionate about programming.                                ', '2017-04-16 22:01:24', '2017-04-16 22:01:24'),
(10, 42, 3, '<p> to\r\nencapsulate more complex queries.  Lastly, you can also combine dynamic finders\r\nwith custom finders:<a class="reference internal" href="https://book.cakephp.org/3.0/en/orm/retrieving-data-and-resultsets.html#custom-find-methods"><span class="std std-ref">Custom Finder Methods</span></a> are also not\r\nsupported with dynamic finders. You should use <code class="docutils literal"><span class="pre">contain</span></code>While you can use either OR or AND conditions, you cannot combine the two in a\r\nsingle dynamic finder. Other query options like                             </p>', '2017-07-10 19:34:09', '2017-07-10 19:34:09'),
(7, 22, 9, '<p> class.\r\nThis class provides a set of static methods that provide a uniform API to\r\ndealing with all different types of Caching implementations.<code class="docutils literal"><span class="pre">Cache</span></code>Caching in CakePHP is primarily facilitated by the                                 </p>', '2017-04-17 12:27:26', '2017-04-17 12:27:26'),
(8, 22, 9, '<p>Caching is frequently used to reduce the time it takes to create or read from\r\nother resources. Caching is often used to make reading from expensive\r\nresources less expensive. You can store the results of expensive queries,\r\nor remote webservice access that doesn’t                            </p>', '2017-04-17 13:09:42', '2017-04-17 13:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth_date` varchar(12) NOT NULL,
  `drivers_lic` varchar(5) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `firstname`, `surname`, `user_id`, `province_id`, `mobile`, `email`, `gender`, `birth_date`, `drivers_lic`, `created`, `modified`) VALUES
(9, 'Reginald', 'Bossman', 22, 1, '0784450831', 'reggiestain@gmail.com', 'Male', '04/19/2017', 'Yes', '2017-04-16 22:17:58', '2018-03-06 09:49:27'),
(11, 'Reggie', 'Stain', 36, 1, '0784450830', 'reggiestain15@gmail.com', 'Male', '04/13/2017', 'No', '2017-04-23 13:17:16', '2017-05-11 16:57:19'),
(12, 'mosima', 'rasesemola', 37, 4, '0796074680', 'mosimaofficial@gmail.com', 'Female', '02/08/1990', NULL, '2017-05-08 19:54:40', '2017-05-08 19:54:40'),
(17, 'Lizile', 'Xulu', 42, 4, '0745455558', 'xulu.lizile@gmail.com', 'Male', '05/30/2017', NULL, '2017-05-11 10:59:02', '2017-05-11 10:59:02'),
(19, 'Riley', 'Bossman', 43, 2, '0815483075', 'riley@gmail.com', 'Male', '07/26/2017', NULL, '2017-07-27 19:45:46', '2017-07-27 19:45:46'),
(21, 'Pinky', 'Pinky', 45, 1, '0781304587', 'pinky@gmail.com', 'Female', '02/27/2018', NULL, '2018-03-08 13:34:01', '2018-03-08 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `profile_careers`
--

CREATE TABLE `profile_careers` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_careers`
--

INSERT INTO `profile_careers` (`id`, `profile_id`, `career_id`, `created`, `modified`) VALUES
(1, 9, 1, '2018-03-06 00:00:00', '2018-03-06 00:00:00'),
(2, 21, 5, '2018-03-08 13:34:01', '2018-03-08 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Gauteng', '2017-04-20 00:00:00', '2017-04-20 00:00:00'),
(2, 'Freestate', '2017-04-20 00:00:00', '2017-04-20 00:00:00'),
(3, 'Mpumalanga', '2017-04-20 00:00:00', '2017-04-20 00:00:00'),
(4, 'Kwazulu-Natal', '2017-04-20 00:00:00', '2017-04-20 00:00:00'),
(5, 'North West', '2017-04-20 00:00:00', '2017-04-20 00:00:00'),
(6, 'Western Cape', '2017-04-20 00:00:00', '2017-04-20 00:00:00'),
(7, 'Eatern Cape', '2017-04-20 00:00:00', '2017-04-20 00:00:00'),
(8, 'Limpopo', '2017-04-20 00:00:00', '2017-04-20 00:00:00'),
(9, 'Northern Province', '2017-04-20 00:00:00', '2017-04-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `description`, `created`) VALUES
(1, 'English', '', '2017-02-26 00:00:00'),
(2, 'Math Lit', '', '2017-02-26 00:00:00'),
(3, 'Math Core', '', '2017-04-20 00:00:00'),
(4, 'Physical Science', '', '2017-04-21 00:00:00'),
(5, 'Life Sciences (Biology)', '', '2017-04-21 00:00:00'),
(6, 'Geography', '', '0000-00-00 00:00:00'),
(7, 'Technical Drawing', '', '2017-04-21 00:00:00'),
(8, 'Fitting and Turning', '', '2017-04-21 00:00:00'),
(9, 'Life Orientation', '', '2017-04-21 00:00:00'),
(10, 'Computer Studies', '', '2017-04-21 00:00:00'),
(11, 'Business Economics', '', '0000-00-00 00:00:00'),
(12, 'Accounting', '', '2017-04-21 00:00:00'),
(13, 'Speech and Drama', '', '2017-04-21 00:00:00'),
(14, 'Hospitality Studies', '', '2017-04-21 00:00:00'),
(15, 'Afrikaans', '', '2017-04-21 00:00:00'),
(16, 'IsiZulu', '', '2017-04-21 00:00:00'),
(17, 'IsiXhosa', '', '2017-04-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tertiaries`
--

CREATE TABLE `tertiaries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `institution` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `start_date` varchar(12) NOT NULL,
  `end_date` varchar(12) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tertiaries`
--

INSERT INTO `tertiaries` (`id`, `user_id`, `institution`, `course`, `start_date`, `end_date`, `created`, `modified`) VALUES
(2, 22, 'University Of Science & Technology Ghana', 'Programming', '04/02/2017', '04/09/2017', '2017-04-20 20:59:28', '2017-04-21 17:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Agricultural and Natural Sciences', '', '2017-04-16 00:00:00', '2017-04-16 00:00:00'),
(2, 'Arts and Design', '', '2017-04-16 00:00:00', '2017-04-16 00:00:00'),
(3, 'Business and Management ', '', '2017-04-16 00:00:00', '2017-04-16 00:00:00'),
(4, 'Economics and Finance', '', '2017-04-16 00:00:00', '2017-04-16 00:00:00'),
(5, 'Education', '', '2017-04-16 00:00:00', '2017-04-16 00:00:00'),
(6, 'Engineering', '', '2017-04-16 00:00:00', '2017-04-16 00:00:00'),
(7, 'Health Sciences', '', '2017-04-16 00:00:00', '2017-04-16 00:00:00'),
(8, 'Health Sciences', '', '2017-04-16 00:00:00', '2017-04-16 00:00:00'),
(9, 'Programming', '', '2017-04-16 00:00:00', '2017-04-16 00:00:00'),
(10, 'Law', '', '2017-04-16 03:07:10', '2017-04-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` char(200) NOT NULL,
  `level_id` int(11) NOT NULL DEFAULT '1',
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `pic` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `mobile`, `password`, `level_id`, `status`, `pic`, `created`, `modified`) VALUES
(22, 'Reginald', 'Bossman', 'reggiestain@gmail.com', '', '$2y$10$PtxgT91SjslvCfU9YUdiFu7kEslabzZLRORs/pfb9yE8E./2NM5du', 1, 'active', '1499699754_184387.jpg', '2017-04-16 22:17:58', '2018-03-12 16:53:12'),
(36, 'Reggie', 'Bossman', 'reggiestain15@gmail.com', '0784450830', '$2y$10$WrNTUIafjD4jhW8J1vJMSeDSlVYq8cvic.OO/9aBGvbBUBZuSdeka', 1, 'active', '', '2017-04-23 13:17:16', '2017-04-23 13:17:16'),
(37, 'mosima', 'rasesemola', 'mosimaofficial@gmail.com', '0796074680', '$2y$10$sR5yxrEeBsjsXSpjKAicNuJZg19Jdj7uKE58tcowNkJWj8/4wnR9y', 1, 'active', '', '2017-05-08 19:54:40', '2017-05-08 19:54:40'),
(42, 'Lizile', 'Xulu', 'xulu.lizile@gmail.com', '0745455558', '$2y$10$LNzJhS0TFwWh6QfeS3ASAenOyIPHumbeRnpSqGCf15kY3prjzo1Le', 1, 'active', '1499697827_380340.jpeg', '2017-05-11 10:59:02', '2017-07-10 14:43:47'),
(43, 'Riley', 'Bossman', 'riley@gmail.com', '0815483075', '$2y$10$kJF63a.kc4sT/TlCJ.cUFuadZGZtPY65E7iyAhjvY8OgpDDJglOuO', 2, 'active', NULL, '2017-07-27 19:45:46', '2017-07-27 19:45:46'),
(45, 'Pinky', 'Pinky', 'pinky@gmail.com', '0781304587', '$2y$10$HQ9mxM7QRQZoDso1LUHUmeH5glnOle6DFxtHVBInpMT076eHkV61.', 1, 'active', NULL, '2018-03-08 13:34:01', '2018-03-08 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `message_id`, `user_id`, `created`) VALUES
(9, 14, 36, '2017-07-05 21:43:43'),
(10, 14, 22, '2017-07-05 21:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `duties` text NOT NULL,
  `start_date` varchar(12) NOT NULL,
  `end_date` varchar(12) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `user_id`, `company`, `duties`, `start_date`, `end_date`, `created`, `modified`) VALUES
(1, 22, 'FGX Studios', '<p><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG></o:AllowPNG>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves></w:TrackMoves>\r\n  <w:TrackFormatting></w:TrackFormatting>\r\n  <w:PunctuationKerning></w:PunctuationKerning>\r\n  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF></w:DoNotPromoteQF>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables></w:BreakWrappedTables>\r\n   <w:SnapToGridInCell></w:SnapToGridInCell>\r\n   <w:WrapTextWithPunct></w:WrapTextWithPunct>\r\n   <w:UseAsianBreakRules></w:UseAsianBreakRules>\r\n   <w:DontGrowAutofit></w:DontGrowAutofit>\r\n   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>\r\n   <w:EnableOpenTypeKerning></w:EnableOpenTypeKerning>\r\n   <w:DontFlipMirrorIndents></w:DontFlipMirrorIndents>\r\n   <w:OverrideTableStyleHps></w:OverrideTableStyleHps>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"></m:mathFont>\r\n   <m:brkBin m:val="before"></m:brkBin>\r\n   <m:brkBinSub m:val="&#45;-"></m:brkBinSub>\r\n   <m:smallFrac m:val="off"></m:smallFrac>\r\n   <m:dispDef></m:dispDef>\r\n   <m:lMargin m:val="0"></m:lMargin>\r\n   <m:rMargin m:val="0"></m:rMargin>\r\n   <m:defJc m:val="centerGroup"></m:defJc>\r\n   <m:wrapIndent m:val="1440"></m:wrapIndent>\r\n   <m:intLim m:val="subSup"></m:intLim>\r\n   <m:naryLim m:val="undOvr"></m:naryLim>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="0" Name="Default Paragraph Font"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"></w:LsdException>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman","serif";}\r\n</style>\r\n<![endif]-->\r\n\r\n<br></p><ul style="margin-top:0in" type="disc"><li class="MsoNormal" style="text-align:left;mso-list:l0 level1 lfo1"><span lang="EN-GB">Building php websites using php based frameworks. </span></li><li class="MsoNormal" style="text-align:left;mso-list:l0 level1 lfo1"><span lang="EN-GB">Planning and conducting cross-browser usability testing against\r\n     w3c. Testing and validating work produced as part of the development\r\n     process.</span></li><li class="MsoNormal" style="text-align:left;mso-list:l0 level1 lfo1"><span lang="EN-GB"><span style="mso-spacerun:yes">&nbsp;</span>Developing advanced\r\n     database driven websites &amp; systems including ecommerce.</span></li><li class="MsoNormal" style="text-align:left;mso-list:l0 level1 lfo1"><span lang="EN-GB">Back end development and maintenance of websites using php and\r\n     mysql. </span></li><li class="MsoNormal" style="text-align:left;mso-list:l0 level1 lfo1"><span lang="EN-GB">Developing compatible user interface functionality using jquery\r\n     &amp; other libraries. </span></li><li class="MsoNormal" style="text-align:left;mso-list:l0 level1 lfo1"><span lang="EN-GB">Developing web sites using mysql, php &amp; other programming\r\n     tools. Working in a data analyst role and with business intelligence\r\n     applications. </span></li><li class="MsoNormal" style="text-align:left;mso-list:l0 level1 lfo1"><span lang="EN-GB">Documenting features, technical specifications &amp;\r\n     infrastructure requirements. </span></li><li class="MsoNormal" style="text-align:left;mso-list:l0 level1 lfo1"><span lang="EN-GB">Working with a multi-disciplinary team to convert business\r\n     needs into technical specifications. </span></li></ul><p>\r\n\r\n<br></p>', '06/12/2015', '08/30/2017', '2017-04-21 09:11:00', '2017-04-21 18:18:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `high_schools`
--
ALTER TABLE `high_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `high_schools_subjects`
--
ALTER TABLE `high_schools_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_reply`
--
ALTER TABLE `message_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `networks`
--
ALTER TABLE `networks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_careers`
--
ALTER TABLE `profile_careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tertiaries`
--
ALTER TABLE `tertiaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `high_schools`
--
ALTER TABLE `high_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `high_schools_subjects`
--
ALTER TABLE `high_schools_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `message_reply`
--
ALTER TABLE `message_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `networks`
--
ALTER TABLE `networks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `profile_careers`
--
ALTER TABLE `profile_careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tertiaries`
--
ALTER TABLE `tertiaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
