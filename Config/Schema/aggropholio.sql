-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.holycrap.ws
-- Generation Time: May 14, 2012 at 12:14 PM
-- Server version: 5.1.39
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `deansofer`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `order_weight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `related_model` varchar(255) DEFAULT NULL,
  `related_model_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ModelIdIndex` (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=385 ;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `media_category_id` int(10) DEFAULT NULL,
  `uuid` varchar(20) DEFAULT NULL,
  `account_id` int(10) DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  `primary_media_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `account_id` int(10) DEFAULT NULL,
  `bookmark_category_id` int(10) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark_categories`
--

CREATE TABLE IF NOT EXISTS `bookmark_categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `parent_id` int(10) DEFAULT NULL,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `foreign_model` varchar(255) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Table structure for table `media_categories`
--

CREATE TABLE IF NOT EXISTS `media_categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `media_items`
--

CREATE TABLE IF NOT EXISTS `media_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `attachment_file_name` varchar(255) DEFAULT NULL,
  `attachment_file_size` int(11) DEFAULT NULL,
  `attachment_meta_type` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `album_id` int(10) unsigned DEFAULT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=223 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `post_category_id` int(10) unsigned DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `account_id` int(10) unsigned DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_relationships`
--

CREATE TABLE IF NOT EXISTS `post_relationships` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `foreign_model` varchar(100) NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `summary` varchar(300) DEFAULT NULL,
  `description` text,
  `hash_tag` varchar(255) DEFAULT NULL,
  `cvs_url` varchar(255) DEFAULT NULL,
  `bugs_url` varchar(255) DEFAULT NULL,
  `project_category_id` int(10) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If deleted from api',
  `account_id` int(10) DEFAULT NULL,
  `owner` varchar(100) NOT NULL,
  `resume_employer_id` int(10) unsigned DEFAULT NULL,
  `resume_school_id` int(10) unsigned DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `primary_media_item_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE IF NOT EXISTS `project_categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `attachment_file_name` varchar(255) DEFAULT NULL,
  `attachment_file_size` int(11) DEFAULT NULL,
  `attachment_meta_type` varchar(100) DEFAULT NULL,
  `attachment_pdf_file_name` varchar(255) DEFAULT NULL,
  `attachment_doc_file_name` varchar(255) DEFAULT NULL,
  `content` text,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `objective` varchar(300) DEFAULT NULL,
  `summary` text,
  `specialties` text,
  `associations` text,
  `honors` text,
  `interests` text,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `account_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_employers`
--

CREATE TABLE IF NOT EXISTS `resume_employers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `summary` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_employers_resumes`
--

CREATE TABLE IF NOT EXISTS `resume_employers_resumes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `resume_id` int(10) NOT NULL,
  `resume_employer_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_items`
--

CREATE TABLE IF NOT EXISTS `resume_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `resume_item_type_id` int(10) DEFAULT NULL,
  `account_id` int(10) DEFAULT NULL COMMENT 'Where they came from',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_item_fields`
--

CREATE TABLE IF NOT EXISTS `resume_item_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `val` text NOT NULL,
  `resume_item_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_item_types`
--

CREATE TABLE IF NOT EXISTS `resume_item_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_recommendations`
--

CREATE TABLE IF NOT EXISTS `resume_recommendations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `text` text NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `recommendor_uuid` varchar(100) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_recommendations_resumes`
--

CREATE TABLE IF NOT EXISTS `resume_recommendations_resumes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `resume_id` int(10) NOT NULL,
  `resume_recommendation_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_schools`
--

CREATE TABLE IF NOT EXISTS `resume_schools` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `account_id` int(10) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `resume_schools_resumes`
--

CREATE TABLE IF NOT EXISTS `resume_schools_resumes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `resume_id` int(10) NOT NULL,
  `resume_school_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_skills`
--

CREATE TABLE IF NOT EXISTS `resume_skills` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `uuid` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `proficiency` enum('Expert','Advanced','Intermediate','Beginner') DEFAULT NULL,
  `resume_skill_category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_skills_resumes`
--

CREATE TABLE IF NOT EXISTS `resume_skills_resumes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `resume_id` int(10) NOT NULL,
  `resume_skill_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=210 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume_skill_categories`
--

CREATE TABLE IF NOT EXISTS `resume_skill_categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `schema_migrations`
--

CREATE TABLE IF NOT EXISTS `schema_migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  `value` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `input_type` varchar(255) NOT NULL DEFAULT 'text',
  `options` text COMMENT 'One option per line',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;



-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.holycrap.ws
-- Generation Time: May 14, 2012 at 12:15 PM
-- Server version: 5.1.39
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `deansofer`
--

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `title`, `description`, `input_type`, `options`) VALUES
(1, 'css', '/*\r\n  HTML5 ? Boilerplate\r\n\r\n  style.css contains a reset, font normalization and some base styles.\r\n\r\n  credit is left where credit is due.\r\n  much inspiration was taken from these projects:\r\n    yui.yahooapis.com/2.8.1/build/base/base.css\r\n    camendesign.com/design/\r\n    praegnanz.de/weblog/htmlcssjs-kickstart\r\n*/\r\n\r\n/*\r\n  html5doctor.com Reset Stylesheet (Eric Meyer''s Reset Reloaded + HTML5 baseline)\r\n  v1.6.1 2010-09-17 | Authors: Eric Meyer & Richard Clark\r\n  html5doctor.com/html-5-reset-stylesheet/\r\n*/\r\n\r\n@font-face {\r\n    font-family: ''BIRTHOFAHERORegular'';\r\n    src: url(''birth_of_a_hero-webfont.eot'');\r\n    src: url(''birth_of_a_hero-webfont.eot?#iefix'') format(''embedded-opentype''),\r\n         url(''birth_of_a_hero-webfont.woff'') format(''woff''),\r\n         url(''birth_of_a_hero-webfont.ttf'') format(''truetype''),\r\n         url(''birth_of_a_hero-webfont.svg#BIRTHOFAHERORegular'') format(''svg'');\r\n    font-weight: normal;\r\n    font-style: normal;\r\n}\r\n\r\nhtml, body, div, span, object, iframe,\r\nh1, h2, h3, h4, h5, h6, p, blockquote, pre,\r\nabbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp,\r\nsmall, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li,\r\nfieldset, form, label, legend,\r\ntable, caption, tbody, tfoot, thead, tr, th, td {\r\n  margin:0;\r\n  padding:0;\r\n  border:0;\r\n  font-size:100%;\r\n  font: inherit;\r\n  vertical-align:baseline;\r\n}\r\n\r\nblockquote, q { quotes:none; }\r\n\r\nblockquote:before, blockquote:after,\r\nq:before, q:after { content:''''; content:none; }\r\n\r\nins { background-color:#ff9; color:#000; text-decoration:none; }\r\n\r\nmark { background-color:#ff9; color:#000; font-style:italic; font-weight:bold; }\r\n\r\ndel { text-decoration: line-through; }\r\n\r\nabbr[title], dfn[title] { border-bottom:1px dotted; cursor:help; }\r\n\r\ntable { border-collapse:collapse; border-spacing:0; }\r\n\r\nhr { display:block; height:1px; border:0; border-top:1px solid #ccc; margin:1em 0; padding:0; }\r\n\r\ninput, select { vertical-align:middle; }\r\n\r\n/* END RESET CSS */\r\n\r\n\r\n/* font normalization inspired by  from the YUI Library''s fonts.css: developer.yahoo.com/yui/ */\r\nbody { text-shadow: 0 1px 2px #fff; font:14px/1.231 sans-serif; *font-size:small; } /* hack retained to preserve specificity */\r\n/* Disable Text Shadow for some content */\r\n.fancybox-title-float-main { text-shadow: none; }\r\nselect, input, textarea, button { font:99% sans-serif; }\r\n\r\n/* normalize monospace sizing\r\n * en.wikipedia.org/wiki/MediaWiki_talk:Common.css/Archive_11#Teletype_style_fix_for_Chrome */\r\npre, code, kbd, samp { font-family: monospace, sans-serif; }\r\n/*\r\n * minimal base styles\r\n */\r\n\r\n\r\nbody, select, input, textarea {\r\n  /* #444 looks better than black: twitter.com/H_FJ/statuses/11800719859 */\r\n  color: #444;\r\n  /* set your base font here, to apply evenly */\r\n  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;\r\n}\r\n\r\n/* headers (h1,h2,etc) have no default font-size or margin. define those yourself. */\r\nh1,h2,h3,h4,h5,h6 { font-weight: bold; }\r\nh2 {\r\n  font-size: 180%;\r\n	margin: 30px 0 10px;\r\n}\r\n\r\n/* always force a scrollbar in non-IE: */\r\nhtml { overflow-y: scroll; background: url(../../img/background.jpg); }\r\n\r\n\r\n/* accessible focus treatment: people.opera.com/patrickl/experiments/keyboard/test */\r\na:hover, a:active { outline: none; }\r\n\r\na, a:active, a:visited { color: #933; text-decoration: none; }\r\na:hover { color: #e11; }\r\n\r\n\r\nul, ol { margin-left: 2em; }\r\nul { list-style-type: circle;}\r\nol { list-style-type: decimal; }\r\n\r\n/* remove margins for navigation lists */\r\nnav ul, nav li { margin: 3px 0 3px 15px; list-style:none; list-style-image: none; }\r\n\r\nsmall { font-size: 85%; }\r\nstrong, th { font-weight: bold; }\r\n\r\ntd { vertical-align: top; }\r\n\r\n/* set sub, sup without affecting line-height: gist.github.com/413930 */\r\nsub, sup { font-size: 75%; line-height: 0; position: relative; }\r\nsup { top: -0.5em; }\r\nsub { bottom: -0.25em; }\r\n\r\npre {\r\n  /* www.pathf.com/blogs/2008/05/formatting-quoted-code-in-blog-posts-css21-white-space-pre-wrap/ */\r\n  white-space: pre; white-space: pre-wrap; word-wrap: break-word;\r\n  padding: 15px;\r\n  background: rgba(0,0,0,.1);\r\n  border: 1px solid rgba(0,0,0,.2);\r\n  border-top-color: rgba(0,0,0,.4);\r\n  box-shadow: inset 0 2px 4px rgba(0,0,0,.3), 0 1px 2px rgba(255,255,255,.3);\r\n  -moz-box-shadow: inset 0 2px 4px rgba(0,0,0,.3), 0 1px 2px rgba(255,255,255,.3);\r\n  -webkit-box-shadow: inset 0 2px 4px rgba(0,0,0,.3), 0 1px 2px rgba(255,255,255,.3);\r\n  margin: 30px 0 10px;\r\n  -webkit-border-bottom-right-radius: 4px;\r\n  -webkit-border-bottom-left-radius: 4px;\r\n  -moz-border-radius-bottomright: 4px;\r\n  -moz-border-radius-bottomleft: 4px;\r\n  border-bottom-right-radius: 4px;\r\n  border-bottom-left-radius: 4px;\r\n}\r\npre:before {\r\n	content: "Code:";\r\n	color: white;\r\n	text-shadow: none;\r\n	font-weight: normal;\r\n	display: block;\r\n	margin: -35px -16px 10px;\r\n	background: rgba(0,0,0,.4);\r\n	-webkit-border-top-left-radius: 4px;\r\n	-webkit-border-top-right-radius: 4px;\r\n	-moz-border-radius-topleft: 4px;\r\n	-moz-border-radius-topright: 4px;\r\n	border-top-left-radius: 4px;\r\n	border-top-right-radius: 4px;\r\n	padding: 3px 10px;\r\n	font-size: 80%;\r\n	font-weight: bold;\r\n	box-shadow: inset 0 1px 2px rgba(255,255,255,.2);\r\n	-moz-box-shadow: inset 0 1px 2px rgba(255,255,255,.2);\r\n	-webkit-box-shadow: inset 0 1px 2px rgba(255,255,255,.2);\r\n}\r\n\r\ntextarea { overflow: auto; } /* www.sitepoint.com/blogs/2010/08/20/ie-remove-textarea-scrollbars/ */\r\n\r\n.ie6 legend, .ie7 legend { margin-left: -7px; } /* thnx ivannikolic! */\r\n\r\n/* align checkboxes, radios, text inputs with their label by: Thierry Koblentz tjkdesign.com/ez-css/css/base.css  */\r\ninput[type="radio"] { vertical-align: text-bottom; }\r\ninput[type="checkbox"] { vertical-align: bottom; }\r\n.ie7 input[type="checkbox"] { vertical-align: baseline; }\r\n.ie6 input { vertical-align: text-bottom; }\r\n\r\n/* hand cursor on clickable input elements */\r\nlabel, input[type="button"], input[type="submit"], input[type="image"], button { cursor: pointer; }\r\n\r\n/* webkit browsers add a 2px margin outside the chrome of form elements */\r\nbutton, input, select, textarea { margin: 0; }\r\n\r\n/* colors for form validity */\r\ninput:valid, textarea:valid   {  }\r\ninput:invalid, textarea:invalid {\r\n      border-radius: 1px; -moz-box-shadow: 0px 0px 5px red; -webkit-box-shadow: 0px 0px 5px red; box-shadow: 0px 0px 5px red;\r\n}\r\n.no-boxshadow input:invalid, .no-boxshadow textarea:invalid { background-color: #f0dddd; }\r\n\r\n\r\n/* These selection declarations have to be separate.\r\n   No text-shadow: twitter.com/miketaylr/status/12228805301\r\n   Also: hot pink. */\r\n::-moz-selection{ background: #FF5E99; color:#fff; text-shadow: none; }\r\n::selection { background:#FF5E99; color:#fff; text-shadow: none; }\r\n\r\n/*  j.mp/webkit-tap-highlight-color */\r\na:link { -webkit-tap-highlight-color: #FF5E99; }\r\n\r\n/* make buttons play nice in IE:\r\n   www.viget.com/inspire/styling-the-button-element-in-internet-explorer/ */\r\nbutton {  width: auto; overflow: visible; }\r\n\r\n/* bicubic resizing for non-native sized IMG:\r\n   code.flickr.com/blog/2008/11/12/on-ui-quality-the-little-things-client-side-image-resizing/ */\r\n.ie7 img { -ms-interpolation-mode: bicubic; }\r\n\r\n\r\n /* Primary Styles\r\n    Author: Dean Sofer (ProLoser)\r\n */\r\nli {\r\nmargin: 10px 0;\r\n}\r\n\r\ncode {\r\nborder: 1px solid #AAA;\r\n-moz-border-radius: 2px;\r\n-webkit-border-radius: 2px;\r\nborder-radius: 2px;\r\n-moz-box-shadow: 1px 2px 2px #ddd;\r\n-webkit-box-shadow: 1px 2px 2px #ddd;\r\nbox-shadow: 1px 2px 2px #ddd;\r\nbackground-color: #F9F9F9;\r\nbackground-image: -moz-linear-gradient(top, #EEE, #F9F9F9, #EEE);\r\nbackground-image: -ms-linear-gradient(top, #EEE, #F9F9F9, #EEE);\r\nbackground-image: -o-linear-gradient(top, #EEE, #F9F9F9, #EEE);\r\nbackground-image: -webkit-linear-gradient(top, #EEE, #F9F9F9, #EEE);\r\nbackground-image: linear-gradient(top, #EEE, #F9F9F9, #EEE);\r\npadding: 1px 3px;\r\nfont-size: 0.85em;\r\n}\r\npre code {\r\n	padding: 0;\r\n	border: none;\r\n	box-shadow: none;\r\n	-moz-box-shadow: none;\r\n	-webkit-box-shadow: none;\r\n	background: none;\r\n}\r\ntime {\r\n	float: right;\r\n	font-weight: bold;\r\n}\r\narticle iframe {\r\n	border: 1px solid #ccc;\r\n	width: 100%;\r\n}\r\nsection {\r\n	margin: 30px 0;\r\n}\r\narticle {\r\n	margin: 20px 0; \r\n}\r\narticle p {\r\n	margin: 10px 0;\r\n}\r\nlegend {\r\n	font-size: 120%;\r\n}\r\n#container {\r\n	position: relative;\r\n	min-width: 700px;\r\n        max-width: 960px;\r\n        margin: 0 auto;\r\n}\r\n#nav-wrap {\r\n	height: 100px;\r\n	width: 300px;\r\n        top: 0;\r\n        left: -45px;\r\n	background: no-repeat top left url(../../img/header.png);\r\n	position: absolute;\r\n	z-index: 40;\r\n}\r\n#navigation {\r\n	font-size: 120%;\r\n	color: white;\r\n	text-shadow: none;\r\n	width: 200px;\r\n	margin: 0 45px;\r\n	background-color: #aa0000;\r\n	background-image: -moz-linear-gradient(left, #aa0000, #990000); /* FF3.6 */\r\n	background-image: -ms-linear-gradient(left, #aa0000, #990000); /* IE10 */\r\n	background-image: -o-linear-gradient(left, #aa0000, #990000); /* Opera 11.10+ */\r\n	background-image: -webkit-gradient(linear, left top, right top, from(#aa0000), to(#990000)); /* Saf4+, Chrome */\r\n	background-image: -webkit-linear-gradient(left, #aa0000, #990000); /* Chrome 10+, Saf5.1+ */\r\n	background-image: linear-gradient(left, #aa0000, #990000);\r\n	background-image: url(../../img/texture.png);\r\n	filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=''#aa0000'', EndColorStr=''#990000''); /* IE6â€“IE9 */\r\n	border-left: 1px #a00 solid;\r\n	border-right: 1px #a00 solid;\r\n	box-shadow: 1px 0px 7px #555;\r\n	-webkit-box-shadow: 1px 0px 7px #555;\r\n	-moz-box-shadow: 1px 0px 7px #555;\r\n        position: relative;\r\n}\r\n#navigation:after, #navigation:before {\r\n    content: '''';\r\n    position: absolute;\r\n    top: 100%;\r\n    width: 0;\r\n    height: 0;\r\n    display: block;\r\n    border-bottom: solid 40px transparent;\r\n}\r\n#navigation:before {\r\n    left: -1px;\r\n    border-left: solid 100px rgb(140, 0, 0);\r\n}\r\n#navigation:after {\r\n    right: -1px;\r\n    border-right: solid 100px rgb(140, 0, 0);\r\n}\r\n#navigation h1 {\r\n	margin: 0 -30px;\r\n	text-align: center;\r\n        padding: 15px 0;\r\n}\r\n#navigation h1 a, header h1 a:visited {\r\n	color: #fff;\r\n	display: block;\r\n	text-indent: -5000px;\r\n	font-size: 40px;\r\n	font-family: "BIRTHOFAHERORegular";\r\n	background: no-repeat center top url(../../img/logo.png);\r\n}\r\n#navigation h3 {\r\n	font-size: 180%;\r\n	text-align: center;\r\n	margin: 20px 0 10px 0;\r\n}\r\n#navigation nav a, #navigation nav a:visited, #mainNav a, #mainNav a:visited {\r\n	color: #fff;\r\n	text-shadow: none;\r\n}\r\n#navigation nav a:hover, #mainNav a:hover {\r\n	color: #f00;\r\n}\r\n#mainNav {\r\n	margin: 0 0 20px;\r\n	font-size: 180%;\r\n}\r\n#mainNav li {\r\n	margin: 10px 20px;\r\n	list-style: none;\r\n}\r\n#mainNav li a {\r\n	background: no-repeat center left;\r\n	padding: 2px 0;\r\n}\r\n#mainNav li a:hover {\r\n	color: #f99;\r\n}\r\n#mainNav .active {\r\n	overflow: visible;\r\n	background: #7B909B;\r\n	padding: 5px 25px;\r\n	margin: -5px -5px;\r\n	position: relative;\r\n	box-shadow: 0 0 3px rgba(0,0,0,0.6);\r\n	-moz-box-shadow: 0 0 3px rgba(0,0,0,0.6);\r\n	-webkit-box-shadow: 0 0 3px rgba(0,0,0,0.6);\r\n}\r\n#mainNav .active:after {\r\n	content: '''';\r\n	position: absolute;\r\n	top: 0;\r\n	border-top: 23px solid transparent;\r\n	border-bottom: 23px solid transparent;\r\n	border-left: 20px solid #7B909B;\r\n	right: -20px;\r\n	width: 0;\r\n	height: 0;\r\n}\r\n#mainNav .active a {\r\n	text-shadow: 0 1px 2px rgba(0,0,0,.3);\r\n}\r\n#mainNav .reset {\r\n	display: block;\r\n	color: #495E69;\r\n	text-shadow: 0 1px 2px rgba(255,255,255,.2);\r\n	position: absolute;\r\n	cursor: pointer;\r\n	left: 7px;\r\n	top: 8px;\r\n	font-size: 60%;\r\n}\r\n#login {\r\n	text-align: center;\r\n	text-shadow: none;\r\n        padding: 20px 0 10px;\r\n}\r\n#categories, #filters li {\r\n	position: relative;\r\n}\r\n#categories .reset,  #filters .reset {\r\n	display: none;\r\n	width: 32px;\r\n	height: 32px;\r\n	position: absolute;\r\n	left: 0;\r\n	text-indent: -5000px;\r\n	background: no-repeat center url(../../img/icons/remove_category.png);\r\n}\r\n#main {\r\n	margin: 0 40px 20px 260px;\r\n        padding-top: 100px;\r\n}\r\n#main > header {\r\n	position: fixed;\r\n	z-index: 10;\r\n	/*background: rgb(255, 255, 255);\r\n		background: rgba(255, 255, 255, 0.7);\r\n		-moz-box-shadow: 0 3px 10px #fff;\r\n		-webkit-box-shadow: 0 3px 10px #fff;\r\n		box-shadow: 0 3px 10px #fff;*/\r\n	top: 0;\r\n        left: 0;\r\n        width: 100%;\r\n	color: #b00;\r\n	background: url(../../img/background.jpg) repeat-x bottom left;\r\n}\r\n#main > header.hover {\r\n	box-shadow: 0 2px 10px rgba(0,0,0,.3);\r\n	-moz-box-shadow: 0 2px 10px rgba(0,0,0,.3);\r\n	-webkit-box-shadow: 0 2px 10px rgba(0,0,0,.3);\r\n}\r\n#main > header hgroup {\r\n        width: 700px;\r\n        padding: 20px 0 20px 260px;\r\n        margin: 0 auto;\r\n        overflow: hidden;\r\n}\r\n#main > header h2 {\r\n	font-size: 40px;\r\n	float: left;\r\n	margin: -10px 10px 0 0;\r\n}\r\n#main > header h2.gallery, #main > header h2.blog, #main > header h2.resume, #main > header h2.project, #main > header h2.bookmark, #main > header h2.contact, #main > header h2.activity {\r\n	background: no-repeat center left;\r\n	padding-left: 40px;\r\n}\r\n#main > header h2.gallery { background-image: url(../../img/icons/photography.png); }\r\n#main > header h2.blog { background-image: url(../../img/icons/comment.png); }\r\n#main > header h2.resume { background-image: url(../../img/icons/id.png); }\r\n#main > header h2.project { background-image: url(../../img/icons/pushpin-2.png); }\r\n#main > header h2.bookmark { background-image: url(../../img/icons/book.png); }\r\n#main > header h2.contact { background-image: url(../../img/icons/envelope.png); }\r\n#main > header h2.activity { background-image: url(../../img/icons/rss.png); }\r\n/*\r\n#mainNav .gallery a { background-image: url(../../img/icons/photography-invert.png); }\r\n#mainNav .blog a { background-image: url(../../img/icons/comment-invert.png); }\r\n#mainNav .resume a { background-image: url(../../img/icons/id-invert.png); }\r\n#mainNav .project a { background-image: url(../../img/icons/pushpin-2-invert.png); }\r\n#mainNav .bookmark a { background-image: url(../../img/icons/book-invert.png); }\r\n#mainNav .contact a { background-image: url(../../img/icons/envelope-invert.png); }\r\n*/\r\n#main > header time {\r\n	color: #444;\r\n	margin: 7px 40px 10px;\r\n}\r\n#main h3, #main section > h1, #main section > header h1 {\r\n	font-size: 20px;\r\n	margin: 30px -40px 20px -260px;\r\n	padding: 1px 3px 3px 260px;\r\n	color: #fff;\r\n	text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);\r\n	/*background-color: rgba(160,0,0,.5);*/\r\n	background-image: -moz-linear-gradient(left, rgba(123,144,155,.5), rgba(255, 255, 255, 0)); /* FF3.6 */\r\n	background-image: -ms-linear-gradient(left, rgba(123,144,155,.5), rgba(255, 255, 255, 0)); /* IE10 */\r\n	background-image: -o-linear-gradient(left, rgba(123,144,155,.5), rgba(255, 255, 255, 0)); /* Opera 11.10+ */\r\n	background-image: -webkit-gradient(linear, left top, right top, from(rgba(123,144,155,.5)), to(rgba(255, 255, 255, 0))); /* Saf4+, Chrome */\r\n	background-image: -webkit-linear-gradient(left, rgba(123,144,155,.5), rgba(255, 255, 255, 0)); /* Chrome 10+, Saf5.1+ */\r\n	background-image: linear-gradient(left, rgba(123,144,155,.5), rgba(255, 255, 255, 0));\r\n	filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=''rgba(123,144,155,.5)'', EndColorStr=''rgba(255, 255, 255, 0)''); /* IE6â€“IE9 */\r\n	 -moz-box-shadow: inset 0px 1px 2px #999; /* FF3.5+ */\r\n  -webkit-box-shadow: inset 0px 1px 2px #999; /* Saf3.0+, Chrome */\r\n          box-shadow: inset 0px 1px 2px #999; /* Opera 10.5, IE9, Chrome 10+ */\r\n}\r\n#main h4 {\r\n	font-weight: bold;\r\n	font-size: 15px;\r\n}\r\n#main h4 span {\r\n	display: block;\r\n	font-size: 80%;\r\n}\r\n\r\n.activity span {\r\n	padding: 0 2px;\r\n}\r\n.activity li {\r\n	margin: 5px 0;\r\n}\r\n.resumes article .projects {\r\n	display: none;\r\n}\r\n.resumes .projects li {\r\n	list-style: none;\r\n	display: inline-block;\r\n	margin: 5px;\r\n}\r\n\r\n.paging p {\r\n	float: right;\r\n}\r\na.readmore {\r\n	font-size: 80%;\r\n}\r\n\r\n#flashMessage {\r\n	color: #f00;\r\n	padding: 10px;\r\n	border: dashed 2px #fcc;\r\n	background: #fee;\r\n	display: inline-block;\r\n}\r\n\r\n/* Radial Plugin */\r\n#radial_container {\r\n	position: absolute;\r\n	z-index: 20;\r\n	right: 0;\r\n	top: -85px;\r\n	width: 360px;\r\n	height: 345px;\r\n	overflow: hidden;\r\n	background: url(../../img/arrows.png) no-repeat 10px right;\r\n}\r\n#radial_container .arrow {\r\n	float: right;\r\n	text-decoration: none;\r\n	font-weight: bold;\r\n	position: absolute;\r\n	z-index: 10;\r\n}\r\n#radleft {\r\n	top: 11px;\r\n	right: 45px;\r\n}\r\n#radright {\r\n	top: 42px;\r\n	right: 10px;\r\n}\r\n.my_class {\r\n	border-radius: 5px;\r\n	-moz-border-radius: 5px;\r\n	-webkit-border-radius: 5px;\r\n	border-radius: 5px;\r\n	-moz-border-radius: 5px;\r\n	-webkit-border-radius: 5px;\r\n	border: 3px solid #000;\r\n	padding: 5px;\r\n	background: #fff;\r\n	box-shadow: 1px 1px 2px #666;\r\n	-moz-box-shadow: 1px 1px 2px #666;\r\n	-webkit-box-shadow: 1px 1px 2px #666;\r\n	width: 200px;\r\n	height: 160px;\r\n}\r\n.radial_div {\r\n	opacity: .4;\r\n}\r\n.radial_div_item {\r\n	margin: -80px 100px 80px -100px;\r\n}\r\n\r\n/* Gallery */\r\n.gallery {\r\n	overflow: hidden;\r\n	margin: 0 -40px 0 -10px;\r\n}\r\n.gallery li {\r\n	float: left;\r\n	margin: 10px;\r\n	list-style: none;\r\n	position: relative;\r\n	background: #fff;\r\n	padding: 5px;\r\n	border: solid 3px #000;\r\n	border-radius: 5px;\r\n	-moz-border-radius: 5px;\r\n	-webkit-border-radius: 5px;\r\n	box-shadow: 1px 1px 2px rgba(0,0,0,.8);\r\n	-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.8);\r\n	-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.8);\r\n}\r\n.gallery li img {\r\n	position: absolute;\r\n	top: 0;\r\n	left: 0;\r\n	z-index: 1;\r\n	width: 200px;\r\n	height: 160px;\r\n	margin: 5px;\r\n	\r\n}\r\n.gallery li a {\r\n	font-weight: bold;\r\n	display: block;\r\n	width: 160px;\r\n	height: 80px;\r\n	padding: 40px 20px;\r\n	background: rgba(0,0,0,.3);\r\n	text-align: center;\r\n	text-decoration: none;\r\n	color: white;\r\n	font-size: 16px;\r\n	text-shadow: 0 1px 1px rgba(0,0,0,.7);\r\n	position: relative;\r\n	z-index: 2;\r\n}	\r\n.gallery li a:hover {\r\n	background: rgba(0,0,0,.7);\r\n}\r\n.gallery li a span {\r\n	display: block;\r\n	font-size: 70%;\r\n}\r\n.reset {\r\n	text-align: center;\r\n	display: none;\r\n}\r\n\r\n/* Paging */\r\n/*a.asc:after {\r\n	content: '' â‡‘'';\r\n}\r\na.desc:after {\r\n	content: '' â‡“'';\r\n}*/\r\n\r\n.paging, .sorting {\r\n        float: right;\r\n        white-space: nowrap;\r\n	font-weight: bold;\r\n	margin: 0 40px 8px;\r\n	display: inline-block;\r\n	background: rgba(0,0,0,.3);\r\n	-webkit-border-radius: 15px;\r\n	-moz-border-radius: 15px;\r\n	border-radius: 15px;\r\n	padding: 4px;\r\n	position: relative;\r\n     -moz-box-shadow: inset 0 0 1px #000, inset 0 1px 2px rgba(0,0,0,.7), 0 1px 2px rgba(255,255,255,.7); \r\n  -webkit-box-shadow: inset 0 0 1px #000, inset 0 1px 2px rgba(0,0,0,.7), 0 1px 2px rgba(255,255,255,.7); \r\n          box-shadow: inset 0 0 1px #000, inset 0 1px 2px rgba(0,0,0,.7), 0 1px 2px rgba(255,255,255,.7);\r\n}\r\n.sorting {\r\n	-webkit-border-radius: 6px;\r\n	-moz-border-radius: 6px;\r\n	border-radius: 6px;\r\n	margin-left: 55px;\r\n}\r\n.sorting span {\r\n	position: absolute;\r\n	right: 100%;\r\n	white-space: nowrap;\r\n	margin-top: 3px;\r\n	margin-right: 5px;\r\n}\r\n.paging span, .sorting a {\r\n	display: inline-block;\r\n	padding: 2px 3px;\r\n	background: #ccc;\r\n	border-top: 1px solid #F3F1E4;\r\n	border-bottom: 1px solid #F3F1E4;\r\n	margin-right: 1px;\r\n     -moz-box-shadow: 0px 0px 2px rgba(0,0,0,.7); \r\n  -webkit-box-shadow: 0px 0px 2px rgba(0,0,0,.7); \r\n          box-shadow: 0px 0px 2px rgba(0,0,0,.7);\r\n		  background-color: #F3F1E4;\r\n		  background-image: -webkit-gradient(linear, left top, left bottom, from(#F3F1E4), to(#D4D3C9)); \r\n		  background-image: -webkit-linear-gradient(top, #F3F1E4, #D4D3C9); \r\n		  background-image:    -moz-linear-gradient(top, #F3F1E4, #D4D3C9); \r\n		  background-image:     -ms-linear-gradient(top, #F3F1E4, #D4D3C9); \r\n		  background-image:      -o-linear-gradient(top, #F3F1E4, #D4D3C9); \r\n		  background-image:         linear-gradient(top, #F3F1E4, #D4D3C9);\r\n		            filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=''#F3F1E4'', EndColorStr=''#D4D3C9''); \r\n}\r\n.paging span {\r\n	padding: 2px 5px;\r\n}\r\n.paging a {\r\n	padding: 3px 5px;\r\n	margin: -3px -5px;\r\n}\r\n.paging span:first-child, .paging span:first-child a {\r\n-webkit-border-top-left-radius: 15px;\r\n-webkit-border-bottom-left-radius: 15px;\r\n-moz-border-radius-topleft: 15px;\r\n-moz-border-radius-bottomleft: 15px;\r\nborder-top-left-radius: 15px;\r\nborder-bottom-left-radius: 15px;\r\nmargin-left: 0;\r\npadding-left: 2px;\r\n}\r\n.paging span:first-child a {\r\nmargin-left: -2px;\r\n}\r\n.paging span:last-child, .paging span:last-child a {\r\n-webkit-border-top-right-radius: 15px;\r\n-webkit-border-bottom-right-radius: 15px;\r\n-moz-border-radius-topright: 15px;\r\n-moz-border-radius-bottomright: 15px;\r\nborder-top-right-radius: 15px;\r\nborder-bottom-right-radius: 15px;\r\n	margin-right: 0;\r\n	padding-right: 2px;\r\n}\r\n.paging span:last-child a {\r\n	margin-right: -2px;\r\n}\r\n.sorting a:first-of-type {\r\n	-webkit-border-top-left-radius: 5px;\r\n	-webkit-border-bottom-left-radius: 5px;\r\n	-moz-border-radius-topleft: 5px;\r\n	-moz-border-radius-bottomleft: 5px;\r\n	border-top-left-radius: 5px;\r\n	border-bottom-left-radius: 5px;\r\n}\r\n.sorting a:last-child {\r\n	-webkit-border-top-right-radius: 5px;\r\n	-webkit-border-bottom-right-radius: 5px;\r\n	-moz-border-radius-topright: 5px;\r\n	-moz-border-radius-bottomright: 5px;\r\n	border-top-right-radius: 5px;\r\n	border-bottom-right-radius: 5px;\r\n	margin-right: 0;\r\n}\r\n.sorting a.asc, .sorting a.desc, .paging .current, .sorting a:hover, .paging a:hover, .sorting .current {\r\nbackground-color: #D4D3C9;\r\nbackground-image: -webkit-gradient(linear, left top, left bottom, from(#D4D3C9), to(#F3F1E4)); \r\nbackground-image: -webkit-linear-gradient(top, #D4D3C9, #F3F1E4); \r\nbackground-image:    -moz-linear-gradient(top, #D4D3C9, #F3F1E4); \r\nbackground-image:     -ms-linear-gradient(top, #D4D3C9, #F3F1E4); \r\nbackground-image:      -o-linear-gradient(top, #D4D3C9, #F3F1E4); \r\nbackground-image:         linear-gradient(top, #D4D3C9, #F3F1E4);\r\n          filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=''#D4D3C9'', EndColorStr=''#F3F1E4''); \r\n}\r\n/** Blog && Comments **/\r\n.posts article, #comments li {\r\n	padding: 10px;\r\n	border-radius: 4px;\r\n	-moz-border-radius: 4px;\r\n	-webkit-border-radius: 4px;\r\n	margin: 40px 0;\r\n	border: 1px solid rgba(0,0,0,.1);\r\n	background: rgba(150,150,150,.1);\r\n	box-shadow: inset 0 1px 4px rgba(0,0,0,.1), 0 1px 2px rgba(255,255,255,.3);\r\n}\r\n.posts article header, #comments li header {\r\n	margin: -25px 15px 0;\r\n}\r\n#main .posts article h3 {\r\n	margin: 30px -11px 20px -11px;\r\n	padding: 0px 3px 3px 11px;\r\n}\r\n#comments ul {\r\n	margin-left: 0;\r\n}\r\n#comments li {\r\n	list-style: none;\r\n}\r\n#comments li h2 {\r\n	font-size: 140%;\r\n	color: #933;\r\n	margin: 0 0 10px;\r\n}\r\n#comments li header h2 .delete {\r\n	font-size: 60%;\r\n	float: left;\r\n	margin-left: -20px;\r\n	font-weight: bold;\r\n	line-height: 185%;\r\n}\r\n#comments .input.required.text input:after, #comments .input.required.textarea input:after {\r\n	content: ''*'';\r\n	color: red;\r\n}\r\narticle hr {\r\n	display: none;\r\n}\r\narticle header h1 {\r\n	font-size: 180%;\r\n	text-align: left;\r\n	color: #fff;\r\n	text-shadow: 0 2px 3px rgba(0,0,0,.4);\r\n	margin: 0;\r\n}\r\narticle header h1 a {\r\n	text-shadow: 0 2px 3px rgba(0,0,0,.4);\r\n}\r\narticle header time {\r\n	margin-top: -14px;\r\n}\r\narticle header a, article header a:visited {\r\n	color: #933; \r\n	text-decoration: none;\r\n	text-shadow: 0 1px 2px #fff;\r\n}\r\narticle header a:hover {\r\n	color: #e11;\r\n}\r\n\r\n.activity li div {\r\n	display: none;\r\n}\r\n.activity li div img {\r\n	width: 200px;\r\n	height: 160px;\r\n}\r\n\r\n.input input, textarea {\r\n	background: rgba(0,0,0,.1);\r\n	border-radius: 5px;\r\n	-moz-border-radius: 5px;\r\n	-webkit-border-radius: 5px;\r\n	padding: 5px;\r\n	border: 1px solid rgba(0,0,0,.1);\r\n	border-top-color: rgba(0,0,0,.3);\r\n	box-shadow: 0 1px 2px rgba(255,255,255,.5), inset 0 1px 2px rgba(0,0,0,.2);\r\n	-moz-box-shadow: 0 1px 2px rgba(255,255,255,.5), inset 0 1px 2px rgba(0,0,0,.2);\r\n	-webkit-box-shadow: 0 1px 3px rgba(255,255,255,.3), inset 0 1px 2px rgba(0,0,0,.2);\r\n}\r\ninput, textarea, label {\r\n	font-size: 120%;\r\n}\r\n.input {\r\n	margin: 10px 0;\r\n}\r\n.checkbox input {\r\n	float: left;\r\n	margin-right: 5px;\r\n}\r\nlabel {\r\n	display: block;\r\n	font-weight: bold;\r\n	margin: 2px 0;\r\n}\r\n.required label:after {\r\n	content: ''*'';\r\n	color: red;\r\n}\r\n.error-message {\r\n	color: red;\r\n	margin-top: 2px;\r\n}\r\n#related section {\r\n	margin: 0;\r\n}\r\n#related section h2 {\r\n	font-size: 180%;\r\n	text-align: center;\r\n}\r\n\r\n#related article header h2 {\r\n	text-align: left;\r\n	font-size: 90%;\r\n	margin: -7px 0 0 15px;\r\n	position: relative;\r\n	z-index: 2;\r\n}\r\n#related.half section {\r\n	width: 50%;\r\n	float: left;\r\n}\r\n#related section ul {\r\n	padding: 10px 0;\r\n}\r\n#related section li {\r\n	margin: 10px 0;\r\n}\r\n#description {\r\n	font-size: 120%;\r\n}\r\n#stats {\r\n	margin: 10px 0;\r\n}\r\n#stats li {\r\n	float: left;\r\n	width: 50%;\r\n	font-size: 130%;\r\n	list-style: none;\r\n}\r\n#stats li p, #stats li a {\r\n	display: block;\r\n	background: no-repeat left center;\r\n	padding: 10px 3px 10px 40px;\r\n}\r\n#stats .downloads a, #stats .downloads p { background-image: url(../../img/icons/floppy.png); }\r\n#stats .repo a, #stats .repo p { background-image: url(../../img/icons/cloud.png); }\r\n#stats .wiki a, #stats .wiki p { background-image: url(../../img/icons/info.png); }\r\n#stats .bugs a, #stats .bugs p { background-image: url(../../img/icons/bug.png); }\r\n#stats .url a, #stats .url p { background-image: url(../../img/icons/globe.png); }\r\n#stats .account a, #stats .account p { background-image: url(../../img/icons/id.png); }\r\n#stats .organization a, #stats .organization p { background-image: url(../../img/icons/suitcase.png); }\r\n#stats .category a, #stats .category p { background-image: url(../../img/icons/tag.png); }\r\n#stats .updated a, #stats .updated p { background-image: url(../../img/icons/clock.png); }\r\n#stats .followers a, #stats .followers p { background-image: url(../../img/icons/eye.png); }\r\n#stats .forks a, #stats .forks p { background-image: url(../../img/icons/collapse.png); }\r\n#stats .milestones a, #stats .milestones p { background-image: url(../../img/icons/clipboard.png); }\r\n\r\n#accounts a {\r\n	display: block;\r\n	padding: 7px 0 7px 40px;\r\n	margin: 0;\r\n	background: no-repeat left center;\r\n}\r\n#accounts .aim a { background-image: url(../../img/accounts/aim.png); }\r\n#accounts .android a { background-image: url(../../img/accounts/android.png); }\r\n#accounts .aol a { background-image: url(../../img/accounts/aol.png); }\r\n#accounts .apple a { background-image: url(../../img/accounts/apple.png); }\r\n#accounts .behance a { background-image: url(../../img/accounts/behance.png); }\r\n#accounts .blogger a { background-image: url(../../img/accounts/blogger.png); }\r\n#accounts .codaset a { background-image: url(../../img/accounts/codaset.png); }\r\n#accounts .delicious a { background-image: url(../../img/accounts/delicious.png); }\r\n#accounts .deviantart a { background-image: url(../../img/accounts/deviantart.png); }\r\n#accounts .digg a { background-image: url(../../img/accounts/digg.png); }\r\n#accounts .dribbble a { background-image: url(../../img/accounts/dribbble.png); }\r\n#accounts .evernote a { background-image: url(../../img/accounts/evernote.png); }\r\n#accounts .facebook a { background-image: url(../../img/accounts/facebook.png); }\r\n#accounts .flickr a { background-image: url(../../img/accounts/flickr-1.png); }\r\n#accounts .foursquare a { background-image: url(../../img/accounts/foursquare.png); }\r\n#accounts .github a { background-image: url(../../img/accounts/github.png); }\r\n#accounts .gmail a { background-image: url(../../img/accounts/gmail.png); }\r\n#accounts .google a { background-image: url(../../img/accounts/google.png); }\r\n#accounts .googlebuzz a { background-image: url(../../img/accounts/googlebuzz.png); }\r\n#accounts .gtalk a { background-image: url(../../img/accounts/gtalk.png); }\r\n#accounts .jsfiddle a { background-image: url(../../img/accounts/jsfiddle.png); }\r\n#accounts .lastfm a { background-image: url(../../img/accounts/lastfm.png); }\r\n#accounts .linkedin a { background-image: url(../../img/accounts/linkedin.png); }\r\n#accounts .pandora a { background-image: url(../../img/accounts/pandora.png); }\r\n#accounts .photobucket a { background-image: url(../../img/accounts/photobucket.png); }\r\n#accounts .picasa a { background-image: url(../../img/accounts/picasa.png); }\r\n#accounts .skype a { background-image: url(../../img/accounts/skype.png); }\r\n#accounts .spotify a { background-image: url(../../img/accounts/spotify.png); }\r\n#accounts .stumbleupon a { background-image: url(../../img/accounts/stumbleupon.png); }\r\n#accounts .twitter a { background-image: url(../../img/accounts/twitter.png); }\r\n#accounts .wordpress a { background-image: url(../../img/accounts/wordpress.png); }\r\n#accounts .yahoo a { background-image: url(../../img/accounts/yahoo.png); }\r\n#accounts .yelp a { background-image: url(../../img/accounts/yelp.png); }\r\n#accounts .youtube a { background-image: url(../../img/accounts/youtube.png); }\r\n\r\n\r\n.ui-tooltip {\r\n	text-align: center;\r\n}\r\n.ui-tooltip img {\r\n	display: inline-block;\r\n	margin: 5px;\r\n	width: 200px;\r\n}\r\n\r\n#fancybox-content h2 {\r\n	text-align: center;\r\n	margin: 0 0 5px;\r\n	text-shadow: 0px 1px 2px rgba(0,0,0,.3);\r\n}\r\n#fancybox-content input, #fancybox-content textarea {\r\n	width: 97%;\r\n}\r\n#fancybox-content .submit input {\r\n	width: auto;\r\n}\r\n\r\n.bookmarks .child {\r\n	margin-left: 40px;\r\n}\r\n.bookmarks .child h3 {\r\n	margin-left: 0;\r\n	padding-left: 0;\r\n}\r\n.bookmarks ul {\r\n	margin-left: 1em;\r\n}\r\n.bookmarks p {\r\n	margin: 0 0 10px;\r\n}\r\n.resumes .download {\r\n	float: left;\r\n	font-weight: bold;\r\n	font-size: 120%;\r\n	margin: 0 10px;\r\n	padding: 6px 0 6px 35px;\r\n	background: no-repeat left center url(/aggropholio/img/icons/floppy.png);\r\n}\r\n.resumes #skills ul {\r\n	overflow: hidden;\r\n	margin: 5px 0;\r\n	padding-left: 20px;\r\n}\r\n.resumes #skills li {\r\n	width: 33%;\r\n	list-style: circle;\r\n	float: left;\r\n}\r\n.resumes h4 {\r\n	margin-bottom: 5px;\r\n	color: #933;\r\n}\r\n.resumes h4 span {\r\n	color: #444;\r\n}\r\n.resumes .projects {\r\n	margin: 5px 0;\r\n}\r\n.resumes h5 {\r\n	float: left;\r\n	margin: 8px 5px 0 0;\r\n}\r\n.resumes .projects h1 {		\r\n	margin: 4px 0;\r\n}\r\n.resumes .projects a {\r\n	text-decoration: none;\r\n	color: white;\r\n	background: rgba(0,0,0,.3);\r\n	padding: 5px 10px;\r\n	text-shadow: 0 1px 1px rgba(0,0,0,.3);\r\n	border-radius: 5px;\r\n	-moz-border-radius: 5px;\r\n	-webkit-border-radius: 5px;\r\n	box-shadow: 0 -1px 1px rgba(0,0,0,.3), 0 1px 1px rgba(255,255,255,.3);\r\n	-webkit-box-shadow: 0 -1px 1px rgba(0,0,0,.3), 0 1px 1px rgba(255,255,255,.3);\r\n	-moz-box-shadow: 0 -1px 1px rgba(0,0,0,.3), 0 1px 1px rgba(255,255,255,.3);\r\n}\r\n.resumes .projects a:hover {\r\n	background: rgba(0,0,0,.7);\r\n}\r\n.resumes .projects li div {\r\n	display: none;\r\n}\r\n.related fieldset {\r\n	position: relative;\r\n	display: none;\r\n}\r\n.related .cancel {\r\n	position: absolute;\r\n	top: -5px;\r\n	right: 6%;\r\n}\r\n\r\n/*\r\n * Non-semantic helper classes: please define your styles before this section.\r\n */\r\n\r\n/* for image replacement */\r\n.ir { display: block; text-indent: -999em; overflow: hidden; background-repeat: no-repeat; text-align: left; direction: ltr; }\r\n\r\n/* Hide for both screenreaders and browsers\r\n   css-discuss.incutio.com/wiki/Screenreader_Visibility */\r\n.hidden { display: none; visibility: hidden; }\r\n\r\n/* Hide only visually, but have it available for screenreaders: by Jon Neal\r\n  www.webaim.org/techniques/css/invisiblecontent/  &  j.mp/visuallyhidden */\r\n.visuallyhidden { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }\r\n\r\n/* Hide visually and from screenreaders, but maintain layout */\r\n.invisible { visibility: hidden; }\r\n\r\n/* Contain floats: nicolasgallagher.com/micro-clearfix-hack/ */ \r\n.clearfix:before, .clearfix:after { content: ""; display: table; }\r\n.clearfix:after { clear: both; }\r\n.clearfix { zoom: 1; }\r\n\r\n\r\n\r\n/*\r\n * media queries for responsive design\r\n * these follow after primary styles so they will successfully override.\r\n */\r\n\r\n@media all and (orientation:portrait) {\r\n  /* style adjustments for portrait mode goes here */\r\n\r\n}\r\n\r\n@media all and (orientation:landscape) {\r\n  /* style adjustments for landscape mode goes here */\r\n\r\n}\r\n\r\n/* Grade-A Mobile Browsers (Opera Mobile, Mobile Safari, Android Chrome)\r\n   consider this: www.cloudfour.com/css-media-query-for-mobile-is-fools-gold/ */\r\n@media screen and (max-width: 640px) {\r\n    .posts article {\r\n        margin-left: 0 !important;\r\n    }\r\n    #main {\r\n        margin-top: 0;\r\n        margin-right: 0;\r\n    }\r\n    #main > header {\r\n        min-width: 0;\r\n        padding: 0;\r\n        position: static;\r\n        margin-top: 10px;\r\n    }\r\n    #main > header.hover {\r\n        box-shadow: none;\r\n        -moz-box-shadow: none;\r\n        -webkit-box-shadow: none;\r\n    }\r\n    #main > header hgroup {\r\n        padding-left: 0;\r\n        width: auto;\r\n    }\r\n    #main > header h2 {\r\n        margin: 0 10px;\r\n    }\r\n    #container {\r\n        padding-left: 0;\r\n        min-width: 0;\r\n    }\r\n    #nav-wrap {\r\n        width: 100%;\r\n        height: auto;\r\n        position: static;\r\n    }   \r\n    #navigation {\r\n        font-size: 80%;\r\n        width: 100%;\r\n        overflow: hidden;\r\n        position: relative;\r\n        margin: 0;\r\n    }\r\n    #navigation li {\r\n    \r\n    }\r\n    #navigation h3 {\r\n        margin-top: 0;\r\n    }\r\n    #mainNav {\r\n        float: right;\r\n    }\r\n    #accounts {\r\n        float: left;\r\n    }   \r\n    #login {\r\n        position: static;\r\n        width: auto;\r\n    }\r\n\r\n  /* uncomment if you don''t want iOS and WinMobile to mobile-optimize the text for you\r\n     j.mp/textsizeadjust\r\n  html { -webkit-text-size-adjust:none; -ms-text-size-adjust:none; } */\r\n}\r\n\r\n/*\r\n * print styles\r\n * inlined to avoid required HTTP connection www.phpied.com/delay-loading-your-print-css/\r\n */\r\n@media print {\r\n  * { background: transparent !important; color: black !important; text-shadow: none !important; filter:none !important;\r\n  -ms-filter: none !important; } /* black prints faster: sanbeiji.com/archives/953 */\r\n  a, a:visited { color: #444 !important; text-decoration: underline; }\r\n  a[href]:after { content: " (" attr(href) ")"; }\r\n  abbr[title]:after { content: " (" attr(title) ")"; }\r\n  .ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after { content: ""; }  /* don''t show links for images, or javascript/internal links */\r\n  pre, blockquote { border: 1px solid #999; page-break-inside: avoid; }\r\n  thead { display: table-header-group; } /* css-discuss.incutio.com/wiki/Printing_Tables */\r\n  tr, img { page-break-inside: avoid; }\r\n  @page { margin: 0.5cm; }\r\n  p, h2, h3 { orphans: 3; widows: 3; }\r\n  h2, h3{ page-break-after: avoid; }\r\n  aside#navigation, .sorting, .download, .pagination { display: none; }\r\n  #container { padding-left: 40px; }\r\n  #main > header { position: static; }\r\n}', 'Stylesheet', 'CSS Styles for the website', 'textarea', NULL),
(2, 'js', '/* Author: Dean Sofer\r\n\r\n*/\r\n\r\n$(document).ready(function(){\r\n	$(''article'').hover(function(){\r\n		$(''.projects'', this).stop(true).animate({\r\n			opacity: ''toggle'',\r\n			height: ''toggle''\r\n		}, 400);\r\n	},function(){\r\n		$(''.projects'', this).stop(true).animate({\r\n			opacity: ''toggle'',\r\n			height: ''toggle''\r\n		}, 400, function(){\r\n			$(this).css({\r\n				height: ''auto'',\r\n				opacity: 1\r\n			});\r\n		});\r\n	});\r\n	\r\n	$(''#categories ul a:not(.reset)'').click(function(){\r\n		selector = ''.'' + $(this).attr(''id'');\r\n		$(selector).animate({\r\n			opacity: 1\r\n		}, 600).siblings('':not('' + selector + '')'').animate({\r\n			opacity: .4\r\n		}, 600);\r\n		if ($(selector).length) {\r\n			$(''#categories .reset'').fadeOut(200);\r\n			$(this).prev().fadeIn(600);\r\n		}\r\n		return false;\r\n	});\r\n	$(''#categories a.reset'').click(function(){\r\n		$(this).fadeOut(600, function() {\r\n			$(this).remove();\r\n		});\r\n		$(''ul.gallery li, .posts article'').animate({\r\n			opacity: 1\r\n		}, 600);\r\n		return false;\r\n	});\r\n	\r\n	$(''.projects .names li'').bind(''mouseover'', function(){\r\n		target = ''.'' + $(''a'', this).attr(''rel'');\r\n		$siblings = $(''.projects .thumbs li:not('' + target + '')'');\r\n		$siblings.slideUp(400, function() {\r\n			$siblings.siblings(target).slideDown(600);\r\n		});\r\n	});\r\n	\r\n	$(''#filters a:not(.freset)'').click(function(){\r\n		selector = ''.'' + $(this).attr(''id'');\r\n		$(selector).show().removeClass(''faded'', 1000).siblings('':not('' + selector + '')'').addClass(''faded'', 1000, function(){\r\n			$(this).hide();\r\n		});\r\n		$(this).addClass(''current'').siblings().removeClass(''current'');\r\n		return false;\r\n	});\r\n	$(''#filters a.freset'').click(function(){\r\n		$(''.log > li'').show().removeClass(''faded'', 1000);\r\n		$(this).addClass(''current'').siblings().removeClass(''current'');\r\n		return false;\r\n	});\r\n	\r\n	/**\r\n	 * Fixed Static position Navigation menu. When the page is scrolled down the menu sticks to the top of the screen.\r\n	 *\r\n	 * Website: http://www.bennadel.com/blog/1810-Creating-A-Sometimes-Fixed-Position-Element-With-jQuery.htm\r\n	 */\r\n	// Bind to the window scroll and resize events. Remember, resizing can also change the scroll of the page.\r\n	$(window).bind("scroll resize", function(){	\r\n		$header = $(''#main > header'');\r\n		// Get the current scroll of the window.\r\n		var viewTop = $(this).scrollTop();\r\n		// Check to see if the view had scroll down past the top of the placeholder AND that the message is not yet fixed.\r\n		if ((viewTop > 0) && !$header.is(".hover")) {\r\n			$header.addClass("hover"); \r\n		// Check to see if the view has scroll back up above the message AND that the message is currently fixed.\r\n		} else if ((viewTop <= 0) && $header.is(".hover")){\r\n			$header.removeClass("hover");\r\n		}\r\n	});\r\n});', 'Javascript', '', 'textarea', NULL),
(3, 'theme', '', 'Theme', '', 'select', NULL),
(4, 'google-analytics', 'UA-17352735-2', 'Google Analytics Code', 'UA-######', 'text', NULL),
(5, 'site_name', 'Dean Sofer', 'Website Name', '', 'text', NULL);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created`, `modified`, `email`, `password`, `name`) VALUES
(1, '2011-05-05 01:03:14', '2011-05-05 01:03:14', 'proloser@hotmail.com', '34a6ef44b3ba0ee41c183782206756301db9a9d3', 'Dean Sofer');
