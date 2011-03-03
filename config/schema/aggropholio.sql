-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2011 at 10:18 AM
-- Server version: 5.1.52
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aggropholio`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `created`, `modified`, `username`, `email`, `password`, `api_key`, `type`) VALUES
(1, '2011-02-15 12:05:04', '2011-02-16 14:14:12', 'proloser', 'proloser@hotmail.com', 'fill', '', 'github'),
(2, '2011-02-15 12:06:57', '2011-02-15 12:06:57', 'theCritique', 'proloser@hotmail.com', 'fukk', 'fill', 'deviantart'),
(3, '2011-02-15 12:08:58', '2011-02-28 08:26:55', '54863232', 'deansofer+linkedin@gmail.com', 'fill', '{"oauth_token":"5dbe0c2d-cd07-4239-a819-9b6e2f6be200","oauth_token_secret":"30d9eeab-4657-43f9-b824-18aedffb76dc","oauth_expires_in":"0","oauth_authorization_expires_in":"0"}', 'linkedin'),
(4, '2011-02-17 08:36:50', '2011-02-17 08:36:50', 'proloser', 'proloser@hotmail.com', 'fill', '', 'codaset');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `media_category_id` int(10) unsigned DEFAULT NULL,
  `uuid` varchar(15) DEFAULT NULL,
  `account_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `albums`
--


-- --------------------------------------------------------

--
-- Table structure for table `albums_projects`
--

CREATE TABLE IF NOT EXISTS `albums_projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `albums_projects`
--


-- --------------------------------------------------------

--
-- Table structure for table `albums_resume_employers`
--

CREATE TABLE IF NOT EXISTS `albums_resume_employers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned NOT NULL,
  `resume_employer_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `albums_resume_employers`
--


-- --------------------------------------------------------

--
-- Table structure for table `albums_schools`
--

CREATE TABLE IF NOT EXISTS `albums_schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `albums_schools`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `foreign_model` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `media_categories`
--

CREATE TABLE IF NOT EXISTS `media_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `media_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `media_items`
--

CREATE TABLE IF NOT EXISTS `media_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `attachment_file_name` varchar(255) DEFAULT NULL,
  `attachment_file_size` int(11) DEFAULT NULL,
  `attachment_meta_type` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `album_id` int(10) unsigned NOT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `media_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `posts`
--


-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `hash_tag` varchar(255) DEFAULT NULL,
  `cvs_url` varchar(255) DEFAULT NULL,
  `project_category_id` int(10) unsigned DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If deleted from api',
  `account_id` int(10) unsigned DEFAULT NULL,
  `owner` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `created`, `modified`, `name`, `description`, `hash_tag`, `cvs_url`, `project_category_id`, `published`, `deleted`, `account_id`, `owner`) VALUES
(1, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'cakephp-discuss', 'A forum / discussion board plugin for CakePHP. Uses existing Auth component and users table to create basic forums for your CakePHP application.', NULL, 'https://github.com/ProLoser/cakephp-discuss', NULL, 1, 0, 1, 'proloser'),
(2, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-Answers-Plugin', 'A Yahoo! Answers-like question/answer database with answer ratings and favorite questions.', NULL, 'https://github.com/ProLoser/CakePHP-Answers-Plugin', NULL, 1, 0, 1, ''),
(3, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-Cart', 'One plugin to package together all the tools needed to build your own shopping cart in CakePHP', NULL, 'https://github.com/ProLoser/CakePHP-Cart', NULL, 1, 0, 1, ''),
(4, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'ManageMe-Plugin', 'CakePHP Manage Me Project Management plugin', NULL, 'https://github.com/ProLoser/ManageMe-Plugin', NULL, 1, 0, 1, ''),
(5, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'Form-Emailer', 'Processes through the contents of a posted form and emails the contents.', NULL, 'https://github.com/ProLoser/Form-Emailer', NULL, 1, 0, 1, ''),
(6, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-Embeddable', 'A plugin for CakePHP which provides a set of validation rules and HTML renderers for different media APIs such as YouTube and others.', NULL, 'https://github.com/ProLoser/CakePHP-Embeddable', NULL, 1, 0, 1, ''),
(7, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-CSV', 'A component that will import data from a csv file. Other features for the plugin may come later.', NULL, 'https://github.com/ProLoser/CakePHP-CSV', NULL, 1, 0, 1, ''),
(8, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-Calendar', 'A calendar plugin for cakephp. Mostly meant for rendering calendars.', NULL, 'https://github.com/ProLoser/CakePHP-Calendar', NULL, 1, 0, 1, ''),
(9, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-Welcome', 'A quick way to add rudimentary Auth/User code (registration, email, password updating, etc)', NULL, 'https://github.com/ProLoser/CakePHP-Welcome', NULL, 1, 0, 1, ''),
(10, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'cakepackages', 'self-contained application that automatically tracks cakephp developer''s open source code repositories, including applications and plugins', NULL, 'https://github.com/ProLoser/cakepackages', NULL, 1, 0, 1, ''),
(11, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'ITC', 'Team Art Engineered''s Information Technology Competition Project 2010 at Cal Poly Pomona', NULL, 'https://github.com/ProLoser/ITC', NULL, 1, 0, 1, ''),
(12, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'SeniorProject', 'Cal Poly Pomona CIS 466 Senior Project', NULL, 'https://github.com/ProLoser/SeniorProject', NULL, 1, 0, 1, ''),
(13, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CIS-406-Project', 'Cis Internship management tool for Professor Carlin', NULL, 'https://github.com/ProLoser/CIS-406-Project', NULL, 1, 0, 1, ''),
(14, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'Stinson-L-5-Stuff', 'A website I made for my grandfather to help him sell his airplane parts online', NULL, 'https://github.com/ProLoser/Stinson-L-5-Stuff', NULL, 1, 0, 1, ''),
(15, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'cakephp-tmbundle', 'Official CakePHP TextMate Bundle Git Repository', NULL, 'https://github.com/ProLoser/cakephp-tmbundle', NULL, 1, 0, 1, ''),
(16, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'AnythingSlider', 'This jQuery plugin was created by Chris Coyier, based on work by Remy Sharp, and improved by Doug Neiner. ', NULL, 'https://github.com/ProLoser/AnythingSlider', NULL, 1, 0, 1, ''),
(17, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'ElegantAccordion', 'jQuery Elegant Accordion plugin', NULL, 'https://github.com/ProLoser/ElegantAccordion', NULL, 1, 0, 1, ''),
(18, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'proloser.github.com', 'Github Webpages', NULL, 'https://github.com/ProLoser/proloser.github.com', NULL, 1, 0, 1, ''),
(19, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'wizard', 'CakePHP multi-form plugin', NULL, 'https://github.com/ProLoser/wizard', NULL, 1, 0, 1, ''),
(20, '2011-02-16 16:02:04', '2011-02-17 09:01:03', 'Kinspir', 'This is the source code for the application located at https://www.kinspir.com and it is licensed under the AGPL.', '', 'https://github.com/ProLoser/Kinspir', 1, 1, 0, 1, ''),
(21, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'manual', 'mobile version of the cookbook to pdf using wkhtmltopdf', NULL, 'https://github.com/ProLoser/manual', NULL, 1, 0, 1, ''),
(22, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-Cacheable', 'Store model queries in cache and refer back to them later.', NULL, 'https://github.com/ProLoser/CakePHP-Cacheable', NULL, 1, 0, 1, ''),
(23, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-Joinable', 'A wrapper behavior for joins that plays nice with containable!', NULL, 'https://github.com/ProLoser/CakePHP-Joinable', NULL, 1, 0, 1, ''),
(24, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'cakephp-filter-plugin', 'cakephp component plugin for filtering paginated model and related model data', NULL, 'https://github.com/ProLoser/cakephp-filter-plugin', NULL, 1, 0, 1, ''),
(25, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-SplitForm-Helper', 'Splits grouped form inputs into separate groups or individual inputs', NULL, 'https://github.com/ProLoser/CakePHP-SplitForm-Helper', NULL, 1, 0, 1, ''),
(26, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'cakephp-supervalidatable-behavior', 'packaging delicious validation rules into one behavior :)', NULL, 'https://github.com/ProLoser/cakephp-supervalidatable-behavior', NULL, 1, 0, 1, ''),
(27, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'utils', 'Utils Plugin for CakePHP', NULL, 'https://github.com/ProLoser/utils', NULL, 1, 0, 1, ''),
(28, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'cakephp-geoip', 'Geoip Component for CakePHP.', NULL, 'https://github.com/ProLoser/cakephp-geoip', NULL, 1, 0, 1, ''),
(29, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'Net-Send-Messenger', 'An old net-send messenger script I made for my old job. Doesn''t work with Vista+ (yet)', NULL, 'https://github.com/ProLoser/Net-Send-Messenger', NULL, 1, 0, 1, ''),
(30, '2011-02-16 16:02:04', '2011-02-16 16:02:04', 'CakePHP-Batch', 'Search / Filter and Update / Delete in batches your paginated results', NULL, 'https://github.com/ProLoser/CakePHP-Batch', NULL, 1, 0, 1, ''),
(31, '2011-02-17 08:33:09', '2011-02-17 08:33:09', 'ISVOnline Catalog', '', NULL, 'http://codaset.com/isvonline/isvonline-catalog', NULL, 1, 0, NULL, 'isvonline'),
(38, '2011-02-17 08:41:35', '2011-02-17 08:41:35', 'Campus Clique', 'A club management system for the entire campus!', NULL, 'http://codaset.com/campusclique/campus-clique', NULL, 1, 0, 4, 'campusclique');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE IF NOT EXISTS `project_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `created`, `modified`, `name`, `description`, `parent_id`, `lft`, `rght`) VALUES
(1, '2011-02-17 08:57:37', '2011-02-17 08:59:28', 'Personal', '', NULL, 2, 2),
(2, '2011-02-17 08:58:39', '2011-02-17 08:58:39', 'Gaming', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `attachment_file_name` varchar(255) DEFAULT NULL,
  `attachment_file_size` int(11) DEFAULT NULL,
  `attachment_meta_type` varchar(100) DEFAULT NULL,
  `content` text,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `objective` varchar(300) DEFAULT NULL,
  `summary` text,
  `specialties` text,
  `associations` text,
  `honors` text,
  `interests` text,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resumes`
--


-- --------------------------------------------------------

--
-- Table structure for table `resume_employers`
--

CREATE TABLE IF NOT EXISTS `resume_employers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_ended` date DEFAULT NULL,
  `currently_employed` tinyint(1) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `resume_employers`
--

INSERT INTO `resume_employers` (`id`, `created`, `modified`, `name`, `account_id`, `uuid`, `title`, `date_started`, `date_ended`, `currently_employed`, `published`, `deleted`) VALUES
(1, '2011-02-28 09:39:45', '2011-02-28 09:39:45', 'International Student Volunteers', NULL, 1094789, NULL, NULL, NULL, 0, 0, 0),
(2, '2011-02-28 09:39:45', '2011-02-28 09:39:45', 'Art Engineered & SF Web Designs', NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(3, '2011-02-28 09:39:45', '2011-02-28 09:39:45', 'Los Angeles Website Desigs', NULL, 1098263, NULL, NULL, NULL, 0, 0, 0),
(4, '2011-02-28 09:39:45', '2011-02-28 09:39:45', 'Academic Learning Company', NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(5, '2011-02-28 09:39:45', '2011-02-28 09:39:45', 'Cal Poly Pomona', NULL, 10265, NULL, NULL, NULL, 0, 0, 0),
(6, '2011-02-28 09:39:45', '2011-02-28 09:39:45', 'Cal Poly Pomona', NULL, 10265, NULL, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `resume_employers_resumes`
--

CREATE TABLE IF NOT EXISTS `resume_employers_resumes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resume_id` int(10) unsigned NOT NULL,
  `resume_employer_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resume_employers_resumes`
--


-- --------------------------------------------------------

--
-- Table structure for table `resume_items`
--

CREATE TABLE IF NOT EXISTS `resume_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `resume_item_type_id` int(10) unsigned DEFAULT NULL,
  `account_id` int(10) unsigned DEFAULT NULL COMMENT 'Where they came from',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resume_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `resume_item_fields`
--

CREATE TABLE IF NOT EXISTS `resume_item_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `val` text NOT NULL,
  `resume_item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Expandable table for resume_items' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resume_item_fields`
--


-- --------------------------------------------------------

--
-- Table structure for table `resume_item_types`
--

CREATE TABLE IF NOT EXISTS `resume_item_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resume_item_types`
--


-- --------------------------------------------------------

--
-- Table structure for table `resume_recommendations`
--

CREATE TABLE IF NOT EXISTS `resume_recommendations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `uui` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `text` text NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `recommendor_uuid` varchar(100) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `resume_recommendations`
--

INSERT INTO `resume_recommendations` (`id`, `created`, `type`, `uui`, `account_id`, `text`, `first_name`, `last_name`, `recommendor_uuid`, `published`, `deleted`) VALUES
(1, '2011-02-28 09:39:45', 'colleague', NULL, NULL, 'Dean is an exceptionally talented website developer with the discipline to sweat the details while laying a path for the layperson to follow. His contributions to ISV have been both numerous and invaluable. He has the persistence to build a unified complex website and database system from multiple business operations as well as the patience to help IT associates with tasks both inside and outside his scope of work. Dean is an extremely likeable person, talented artist and absolutely dependable teammate and one for whom I hold no reservation in my recommendation.', 'Jill', 'Miller, MBA', '6Yb--kunfr', 0, 0),
(2, '2011-02-28 09:39:45', 'service-provider', NULL, NULL, 'Dean worked for the CIS department at Cal Poly as a Java Tutor.  His knowledge and dedication helped many of our students.  His office was always packed and he communicated the materials in a very clear way.  He was great at getting students to think for themselves.  He continues to help fellow-students in this capacity and as the leader of a student club.  People rave about how much he helped them.  A great guy.', 'Ruth', 'Guthrie', 'bpXkLGqGQc', 0, 0),
(3, '2011-02-28 09:39:45', 'colleague', NULL, NULL, 'Dean is a knowledgeable person who can come up with solutions to information systems problems, specifically web design, in a timely and competent fashion.', 'Xavier', 'Contreras', 'cyP87u5OXW', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `resume_recommendations_resumes`
--

CREATE TABLE IF NOT EXISTS `resume_recommendations_resumes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resume_id` int(10) unsigned NOT NULL,
  `resume_recommendation_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resume_recommendations_resumes`
--


-- --------------------------------------------------------

--
-- Table structure for table `resume_schools`
--

CREATE TABLE IF NOT EXISTS `resume_schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `account_id` int(10) unsigned DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_started` date NOT NULL,
  `date_ended` date DEFAULT NULL,
  `field_of_study` varchar(255) DEFAULT NULL,
  `degree` varchar(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `activities` text,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `resume_schools`
--

INSERT INTO `resume_schools` (`id`, `created`, `modified`, `uuid`, `account_id`, `published`, `deleted`, `date_started`, `date_ended`, `field_of_study`, `degree`, `name`, `activities`, `notes`) VALUES
(1, '2011-02-28 09:39:45', '2011-02-28 09:39:45', 38357067, NULL, 0, 0, '0000-00-00', NULL, 'Computer Information Systems', 'BS', 'California State Polytechnic University-Pomona', 'Rechartered Interactive Web Development Student Association\n\nGave workshops on Web Design, jQuery, SEO, Photoshop, Professional/Collaborative Developer Tools; \n\nWrote midterm and final exam on Unified Modeling Language', '');

-- --------------------------------------------------------

--
-- Table structure for table `resume_schools_resumes`
--

CREATE TABLE IF NOT EXISTS `resume_schools_resumes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resume_id` int(10) unsigned NOT NULL,
  `resume_school_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resume_schools_resumes`
--


-- --------------------------------------------------------

--
-- Table structure for table `resume_skills`
--

CREATE TABLE IF NOT EXISTS `resume_skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `uuid` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `proficiency` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `resume_skills`
--

INSERT INTO `resume_skills` (`id`, `created`, `name`, `uuid`, `account_id`, `years`, `proficiency`) VALUES
(1, '2011-02-28 09:39:45', '', 3, NULL, NULL, NULL),
(2, '2011-02-28 09:39:45', '', 4, NULL, NULL, NULL),
(3, '2011-02-28 09:39:45', '', 5, NULL, NULL, NULL),
(4, '2011-02-28 09:39:45', '', 6, NULL, NULL, NULL),
(5, '2011-02-28 09:39:45', '', 7, NULL, NULL, NULL),
(6, '2011-02-28 09:39:45', '', 8, NULL, NULL, NULL),
(7, '2011-02-28 09:39:45', '', 9, NULL, NULL, NULL),
(8, '2011-02-28 09:39:45', '', 10, NULL, NULL, NULL),
(9, '2011-02-28 09:39:45', '', 11, NULL, NULL, NULL),
(10, '2011-02-28 09:39:45', '', 12, NULL, NULL, NULL),
(11, '2011-02-28 09:39:45', '', 13, NULL, NULL, NULL),
(12, '2011-02-28 09:39:45', '', 14, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resume_skills_resumes`
--

CREATE TABLE IF NOT EXISTS `resume_skills_resumes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resume_id` int(10) unsigned NOT NULL,
  `resume_skill_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resume_skills_resumes`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

