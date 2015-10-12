-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2013 at 03:25 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum_db`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_qstns`
--
CREATE TABLE IF NOT EXISTS `all_qstns` (
`qid` int(11)
,`title` varchar(200)
,`time` bigint(20)
,`nickname` varchar(30)
,`views` int(11)
,`replies` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `all_reply`
--
CREATE TABLE IF NOT EXISTS `all_reply` (
`uid` int(11)
,`username` varchar(30)
,`q_id` int(11)
,`reply` text
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `all_tags`
--
CREATE TABLE IF NOT EXISTS `all_tags` (
`tag1` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`username`, `password`, `uid`) VALUES
('681ankit@gmail.com', '0c6cf40157cd06a1ce1a249ecd557b02', 25),
('aa@aa.aa', 'e807f1fcf82d132f9bb018ca6738a19f', 26),
('kapil@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 33),
('akshay@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 34),
('sagar@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 35),
('kapil123@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 37),
('11AA@AA.AA', '0c6cf40157cd06a1ce1a249ecd557b02', 39);

--
-- Triggers `auth`
--
DROP TRIGGER IF EXISTS `new_user_insert`;
DELIMITER //
CREATE TRIGGER `new_user_insert` AFTER INSERT ON `auth`
 FOR EACH ROW begin

insert into userinfo(uid) values(new.uid);

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `disp_qstn`
--
CREATE TABLE IF NOT EXISTS `disp_qstn` (
`qid` int(11)
,`uid` int(11)
,`title` varchar(200)
,`body` text
,`time` bigint(20)
,`tag1` varchar(50)
,`tag2` varchar(50)
,`tag3` varchar(50)
,`tag4` varchar(50)
,`tag5` varchar(50)
,`username` varchar(60)
,`nickname` varchar(30)
,`name` varchar(30)
,`surname` varchar(30)
,`mb_no` bigint(10)
,`location` varchar(100)
,`specializaton` varchar(100)
,`views` int(11)
,`replies` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `id_nick`
--
CREATE TABLE IF NOT EXISTS `id_nick` (
`uid` int(11)
,`nickname` varchar(30)
);
-- --------------------------------------------------------

--
-- Table structure for table `qinfo`
--

CREATE TABLE IF NOT EXISTS `qinfo` (
  `qid` int(11) NOT NULL,
  `time` bigint(20) DEFAULT '0',
  `tag1` varchar(50) DEFAULT '',
  `tag2` varchar(50) DEFAULT '',
  `tag3` varchar(50) DEFAULT '',
  `tag4` varchar(50) DEFAULT '',
  `tag5` varchar(50) DEFAULT '',
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qinfo`
--

INSERT INTO `qinfo` (`qid`, `time`, `tag1`, `tag2`, `tag3`, `tag4`, `tag5`) VALUES
(29, 1363104454, 'codeigniter', '', '', '', ''),
(30, 1363104562, 'codeigniter', '', '', '', ''),
(31, 1363107589, 'test_tag', '', '', '', ''),
(32, 1363109001, 'fun', '', '', '', ''),
(33, 1363945496, 'html5', '', '', '', ''),
(34, 1363946578, 'java', '', '', '', ''),
(35, 1363956900, 'editor', '', '', '', ''),
(36, 1363956938, 'editor', '', '', '', ''),
(37, 1363957260, 'codeigniter', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `qstns`
--

CREATE TABLE IF NOT EXISTS `qstns` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`qid`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `qstns`
--

INSERT INTO `qstns` (`qid`, `title`, `body`) VALUES
(29, 'Redirect with CodeIgniter', '&lt;p&gt;Can anyone tell me why my redirect helper does not work the way I&amp;#39;d expect it to? I&amp;#39;m trying to redirect to the index method of my main controller, but it takes me www.mysite.com/index/provider1/ when it should route to www.mysite.com/provider1. Does this make sense to anyone? I have index page in config set to blank, although I don&amp;#39;t think that it is the issue. Does anyone have advice on how to fix this issue? Thanks in advance!&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:courier new,courier,monospace;&quot;&gt;if($provider == &amp;#39;&amp;#39;) { redirect(&amp;#39;/index/provider1/&amp;#39;, &amp;#39;location&amp;#39;); }&lt;/span&gt;&lt;br /&gt;\r\n&lt;img alt=&quot;enlightened&quot; height=&quot;20&quot; src=&quot;http://localhost/CodeIgniter_2.1.3/assets/CKEditor/plugins/smiley/images/lightbulb.gif&quot; title=&quot;enlightened&quot; width=&quot;20&quot; /&gt;&lt;/p&gt;'),
(30, 'Fatal error: Call to undefined function redirect()', '&lt;p&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:courier new,courier,monospace;&quot;&gt;Class&amp;nbsp;Test&amp;nbsp;Extends&amp;nbsp;Controller&amp;nbsp;{&lt;br /&gt;\r\n&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;public&amp;nbsp;function&amp;nbsp;index()&amp;nbsp;{&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;redirect(APPPATH&amp;nbsp;.&amp;nbsp;&amp;#39;controllers/notloggedin.php&amp;#39;);&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}&lt;br /&gt;\r\n}&amp;nbsp;&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:comic sans ms,cursive;&quot;&gt;what should be the problem???&lt;/span&gt;&lt;/p&gt;'),
(31, 'This is my question asked by kapil that is a test question on the forum which is the answer', '&lt;p&gt;This is my question asked by kapil that is a test question on the forumThis is my question asked by kapil that is a test question on the forum&lt;/p&gt;\r\n\r\n&lt;p&gt;This is my question asked by kapil that is a test question on the forumThis is my question asked by kapil that is a test question on the forum&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;'),
(32, 'This is my question asked by kapil that is a test question on the forum which is the answer123', '&lt;p&gt;$target_path=&amp;quot;assets/profile_pics&amp;quot;;&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;$target_path=$target_path.&amp;quot;/&amp;quot;.$this-&amp;gt;session-&amp;gt;userdata(&amp;#39;userid&amp;#39;);&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;if(file_exists($target_path))&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;$data[&amp;#39;pic_bool&amp;#39;]=&amp;quot;true&amp;quot;;&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;else&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;$data[&amp;#39;pic_bool&amp;#39;]=&amp;quot;false&amp;quot;;&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;'),
(33, 'Waht is html5 doctype ?', '&lt;p&gt;hfurj remnjijk vvtrbtr&lt;strong&gt;nytn hfurj remnjijk vvtrbtrnytnhfurj remnjijk vvtrbtrnytnhfurj remnjijk vvtrbtrnytnhfurj remnjijk vvtrbtrnytnhfurj remnjijk vvtrbtrnytnhfurj remnjijk vvtrbtrnytn&lt;/strong&gt;&lt;img alt=&quot;devil&quot; height=&quot;20&quot; src=&quot;http://localhost/forum_final/assets/CKEditor/plugins/smiley/images/devil_smile.gif&quot; title=&quot;devil&quot; width=&quot;20&quot; /&gt;&lt;/p&gt;'),
(34, 'What is the java beans', '&lt;p&gt;&lt;img alt=&quot;smiley&quot; height=&quot;20&quot; src=&quot;http://localhost/forum_final/assets/CKEditor/plugins/smiley/images/regular_smile.gif&quot; title=&quot;smiley&quot; width=&quot;20&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-family:courier new,courier,monospace;&quot;&gt;fnesjfngsenuhnsns&amp;nbsp;&amp;nbsp; fnesjfngsenuhnsns&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;fnesjfngsenuhnsnsfnesjfng&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;senuhnsnsfnesjfngsenuhnsns&lt;/p&gt;'),
(35, 'No WYSYGYS editor for working well..', '&lt;p&gt;csfergergrcsfergergr csfergergr csfergergr csfergergrcsfergergrv csfergergr&lt;/p&gt;\r\n\r\n&lt;p&gt;csfergergrcsfergergrcsfergergrcsfergergrcsfergergr&lt;/p&gt;\r\n\r\n&lt;p&gt;csfergergrcsfergergr&lt;/p&gt;\r\n\r\n&lt;p&gt;csfergergrcsfergergrcsfergergr&lt;/p&gt;'),
(36, 'No WYSYGYS editor for working well.. sde', '&lt;p&gt;fewNo WYSYGYS editor for working well..No WYSYGYS editor for working well.. No WYSYGYS editor for working well..&lt;/p&gt;\r\n\r\n&lt;p&gt;No WYSYGYS editor for working well..No WYSYGYS editor for working well..No WYSYGYS editor for working well..&lt;/p&gt;\r\n\r\n&lt;p&gt;No WYSYGYS editor for working well..No WYSYGYS editor for working well..No WYSYGYS editor for working well..&lt;/p&gt;\r\n\r\n&lt;p&gt;No WYSYGYS editor for working well..No WYSYGYS editor for working well..No WYSYGYS editor for working well..No WYSYGYS editor for working well..&lt;/p&gt;\r\n\r\n&lt;p&gt;No WYSYGYS editor for working well..No WYSYGYS editor for working well..&lt;/p&gt;'),
(37, 'views Call to undefined function redirect()', '&lt;p&gt;&lt;br /&gt;\r\nviews&lt;br /&gt;\r\nFatal error: Call to undefined function redirect()&lt;br /&gt;\r\nviews&lt;br /&gt;\r\nFatal error: Call to undefined function redirect()&lt;br /&gt;\r\nviews&lt;br /&gt;\r\nFatal error: Call to undefined function redirect()&lt;br /&gt;\r\nviews&lt;br /&gt;\r\nFatal error: Call to undefined function redirect()&lt;br /&gt;\r\nviews&lt;br /&gt;\r\nFatal error: Call to undefined function redirect()&lt;br /&gt;\r\nviews&lt;br /&gt;\r\nFatal error: Call to undefined function redirect()&lt;/p&gt;');

--
-- Triggers `qstns`
--
DROP TRIGGER IF EXISTS `new_qstn_insert`;
DELIMITER //
CREATE TRIGGER `new_qstn_insert` AFTER INSERT ON `qstns`
 FOR EACH ROW begin

insert into qinfo(qid) values(new.qid);
insert into view0reply(qid) values(new.qid);
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `qu`
--

CREATE TABLE IF NOT EXISTS `qu` (
  `qid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  UNIQUE KEY `qid` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qu`
--

INSERT INTO `qu` (`qid`, `uid`) VALUES
(29, 25),
(30, 25),
(31, 33),
(32, 34),
(33, 37),
(34, 25),
(35, 25),
(36, 25),
(37, 35);

-- --------------------------------------------------------

--
-- Stand-in structure for view `recent_qstns`
--
CREATE TABLE IF NOT EXISTS `recent_qstns` (
`qid` int(11)
,`title` varchar(200)
,`time` bigint(20)
,`nickname` varchar(30)
,`views` int(11)
,`uid` int(11)
,`replies` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `reply0qstn`
--

CREATE TABLE IF NOT EXISTS `reply0qstn` (
  `q_id` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `reply` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply0qstn`
--

INSERT INTO `reply0qstn` (`q_id`, `userid`, `reply`) VALUES
(29, 26, '&lt;p&gt;the answer is very simole just time is nnor ncnvfvrvniu rebjkreirebr the answer is very simole just time is nno&lt;/p&gt;\r\n\r\n&lt;p&gt;r ncnvfvrvniu rebjkreirebr the answer is very simole just time is nnor ncnvfvrvniu rebjkreirebr the ans&lt;/p&gt;\r\n\r\n&lt;p&gt;wer is very simole just time is nnor ncnvfvrvniu rebjkreirebr &lt;img alt=&quot;indecision&quot; height=&quot;20&quot; src=&quot;http://localhost/CodeIgniter_2.1.3/assets/CKEditor/plugins/smiley/images/whatchutalkingabout_smile.gif&quot; title=&quot;indecision&quot; width=&quot;20&quot; /&gt;&lt;/p&gt;'),
(29, 25, '&lt;p&gt;the answer is very simole just time is nnor ncnvfvrvniu rebjkreirebr the answer is very simole just time is nno&lt;/p&gt;\r\n\r\n&lt;p&gt;r ncnvfvrvniu rebjkreirebr the answer is very simole just time is nnor ncnvfvrvniu rebjkreirebr the ans&lt;/p&gt;\r\n\r\n&lt;p&gt;wer is very simole just time is nnor ncnvfvrvniu rebjkreirebr [indecision]&lt;/p&gt;'),
(29, 33, '&lt;p&gt;the answer is very simole just time is nnor ncnvfvrvniu rebjkreirebr the answer is very simole just time is nno&lt;/p&gt;\r\n\r\n&lt;p&gt;r ncnvfvrvniu rebjkreirebr the answer is very simole just time is nnor ncnvfvrvniu rebjkreirebr the ans&lt;/p&gt;\r\n\r\n&lt;p&gt;wer is very simole just time is nnor ncnvfvrvniu rebjkreirebr [indecision]&lt;/p&gt;'),
(29, 33, '&lt;p&gt;the answer is very simole just time is nnor ncnvfvrvniu rebjkreirebr the answer is very simole just time is nno&lt;/p&gt;\r\n\r\n&lt;p&gt;r ncnvfvrvniu rebjkreirebr the answer is very simole just time is nnor ncnvfvrvniu rebjkreirebr the ans&lt;/p&gt;\r\n\r\n&lt;p&gt;wer is very simole just time is nnor ncnvfvrvniu rebjkreirebr [indecision]&lt;/p&gt;'),
(29, 34, '&lt;p&gt;This my answer to thw dks&amp;nbsp;&amp;nbsp;&amp;nbsp; .qstns{&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp; border-bottom:solid 1px #666;&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp; }&lt;/p&gt;'),
(29, 34, '&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; .qstns{&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp; border-bottom:solid 1px #666;&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp; }&amp;nbsp;&amp;nbsp;&amp;nbsp; .qstns{&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp; border-bottom:solid 1px #666;&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp; }&lt;/p&gt;'),
(32, 25, '&lt;p&gt;somtecho &amp;quot;&amp;lt;h6&amp;gt;&amp;quot;.$i.&amp;quot;) Answer by &amp;lt;a href=&amp;quot;&amp;quot;.base_url().&amp;quot;index.php/user/view_user/&amp;quot;.$obj_1-&amp;gt;uid.&amp;quot;&amp;quot;&amp;gt;&amp;quot;.$r-&amp;gt;username.&amp;quot;&amp;lt;/a&amp;gt;:&amp;lt;/h6&amp;gt;&amp;quot;;&lt;/p&gt;\r\n\r\n&lt;p&gt;echo &amp;quot;&amp;lt;h6&amp;gt;&amp;quot;.$i.&amp;quot;) Answer by &amp;lt;a href=&amp;quot;&amp;quot;.base_url().&amp;quot;index.php/user/view_user/&amp;quot;.$obj_1-&amp;gt;uid.&amp;quot;&amp;quot;&amp;gt;&amp;quot;.$r-&amp;gt;username.&amp;quot;&amp;lt;/a&amp;gt;:&amp;lt;/h6&amp;gt;&amp;quot;;&lt;/p&gt;\r\n\r\n&lt;p&gt;echo &amp;quot;&amp;lt;h6&amp;gt;&amp;quot;.$i.&amp;quot;) Answer by &amp;lt;a href=&amp;quot;&amp;quot;.base_url().&amp;quot;index.php/user/view_user/&amp;quot;.$obj_1-&amp;gt;uid.&amp;quot;&amp;quot;&amp;gt;&amp;quot;.$r-&amp;gt;username.&amp;quot;&amp;lt;/a&amp;gt;:&amp;lt;/h6&amp;gt;&amp;quot;;&lt;/p&gt;'),
(33, 37, '&lt;p&gt;hjuchmvjj&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reply_qstn_correct`
--
CREATE TABLE IF NOT EXISTS `reply_qstn_correct` (
`qid` int(11)
,`uid` int(11)
,`reply` text
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `top_qstns`
--
CREATE TABLE IF NOT EXISTS `top_qstns` (
`qid` int(11)
,`title` varchar(200)
,`time` bigint(20)
,`nickname` varchar(30)
,`views` int(11)
,`replies` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `uid` int(11) DEFAULT NULL,
  `nickname` varchar(30) DEFAULT '',
  `name` varchar(30) DEFAULT '',
  `surname` varchar(30) DEFAULT '',
  `mb_no` bigint(10) DEFAULT '0',
  `location` varchar(100) DEFAULT '',
  `specializaton` varchar(100) DEFAULT '',
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`uid`, `nickname`, `name`, `surname`, `mb_no`, `location`, `specializaton`) VALUES
(25, 'dexter', 'Ankit', 'wasankar', 9012345678, 'Durga Nagar, Morshi', 'Programmer and a learner..'),
(26, 'my_name_aa', 'Anuj', 'Behre', 9012345678, 'Nagpur', 'Programmer'),
(33, 'Kaps', 'Kapil', 'Ganorkar', 8956544021, 'Durga NAgar Morshi', 'Gamer and professional player'),
(34, 'Ak47', 'akshay', 'belsare', 9730926699, 'Delhi', 'Civil Engineer'),
(35, 'Sagar', 'Sagar', 'Rathi', 9767239894, 'akot', 'B.tech'),
(37, 'Kaps', 'Kapil', 'Ganorkar', 8956544021, 'GadgeNagar', 'Progarmmer\r\n'),
(39, 'ankit', 'ankit123', 'wasankar', 0, '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_info`
--
CREATE TABLE IF NOT EXISTS `user_info` (
`username` varchar(60)
,`uid` int(11)
,`nickname` varchar(30)
,`name` varchar(30)
,`surname` varchar(30)
,`mb_no` bigint(10)
,`location` varchar(100)
,`specializaton` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `user_nick`
--
CREATE TABLE IF NOT EXISTS `user_nick` (
`uid` int(11)
,`username` varchar(60)
,`nickname` varchar(30)
);
-- --------------------------------------------------------

--
-- Table structure for table `view0reply`
--

CREATE TABLE IF NOT EXISTS `view0reply` (
  `qid` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `replies` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view0reply`
--

INSERT INTO `view0reply` (`qid`, `views`, `replies`) VALUES
(29, 71, 6),
(30, 15, 0),
(31, 8, 0),
(32, 29, 1),
(33, 7, 1),
(34, 3, 0),
(35, 0, 0),
(36, 0, 0),
(37, 2, 0);

-- --------------------------------------------------------

--
-- Structure for view `all_qstns`
--
DROP TABLE IF EXISTS `all_qstns`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_qstns` AS select `qstns`.`qid` AS `qid`,`qstns`.`title` AS `title`,`qinfo`.`time` AS `time`,`userinfo`.`nickname` AS `nickname`,`view0reply`.`views` AS `views`,`view0reply`.`replies` AS `replies` from ((((`qstns` join `qinfo` on((`qstns`.`qid` = `qinfo`.`qid`))) join `view0reply` on((`qstns`.`qid` = `view0reply`.`qid`))) join `qu` on((`qstns`.`qid` = `qu`.`qid`))) join `userinfo` on((`qu`.`uid` = `userinfo`.`uid`)));

-- --------------------------------------------------------

--
-- Structure for view `all_reply`
--
DROP TABLE IF EXISTS `all_reply`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_reply` AS select `id_nick`.`uid` AS `uid`,`id_nick`.`nickname` AS `username`,`reply0qstn`.`q_id` AS `q_id`,`reply0qstn`.`reply` AS `reply` from (`reply0qstn` join `id_nick` on((`id_nick`.`uid` = `reply0qstn`.`userid`))) group by `reply0qstn`.`reply` order by `reply0qstn`.`reply` desc;

-- --------------------------------------------------------

--
-- Structure for view `all_tags`
--
DROP TABLE IF EXISTS `all_tags`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_tags` AS select distinct `qinfo`.`tag1` AS `tag1` from `qinfo`;

-- --------------------------------------------------------

--
-- Structure for view `disp_qstn`
--
DROP TABLE IF EXISTS `disp_qstn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `disp_qstn` AS select `qstns`.`qid` AS `qid`,`qu`.`uid` AS `uid`,`qstns`.`title` AS `title`,`qstns`.`body` AS `body`,`qinfo`.`time` AS `time`,`qinfo`.`tag1` AS `tag1`,`qinfo`.`tag2` AS `tag2`,`qinfo`.`tag3` AS `tag3`,`qinfo`.`tag4` AS `tag4`,`qinfo`.`tag5` AS `tag5`,`user_info`.`username` AS `username`,`user_info`.`nickname` AS `nickname`,`user_info`.`name` AS `name`,`user_info`.`surname` AS `surname`,`user_info`.`mb_no` AS `mb_no`,`user_info`.`location` AS `location`,`user_info`.`specializaton` AS `specializaton`,`view0reply`.`views` AS `views`,`view0reply`.`replies` AS `replies` from ((((`qstns` join `qinfo` on((`qstns`.`qid` = `qinfo`.`qid`))) join `qu` on((`qstns`.`qid` = `qu`.`qid`))) join `user_info` on((`qu`.`uid` = `user_info`.`uid`))) join `view0reply` on((`qstns`.`qid` = `view0reply`.`qid`)));

-- --------------------------------------------------------

--
-- Structure for view `id_nick`
--
DROP TABLE IF EXISTS `id_nick`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `id_nick` AS select `user_nick`.`uid` AS `uid`,`user_nick`.`nickname` AS `nickname` from `user_nick`;

-- --------------------------------------------------------

--
-- Structure for view `recent_qstns`
--
DROP TABLE IF EXISTS `recent_qstns`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recent_qstns` AS select `qstns`.`qid` AS `qid`,`qstns`.`title` AS `title`,`qinfo`.`time` AS `time`,`user_nick`.`nickname` AS `nickname`,`view0reply`.`views` AS `views`,`qu`.`uid` AS `uid`,`view0reply`.`replies` AS `replies` from ((((`qstns` join `qinfo` on((`qstns`.`qid` = `qinfo`.`qid`))) join `qu` on((`qstns`.`qid` = `qu`.`qid`))) join `user_nick` on((`qu`.`uid` = `user_nick`.`uid`))) join `view0reply` on((`qstns`.`qid` = `view0reply`.`qid`))) order by `qinfo`.`time` desc;

-- --------------------------------------------------------

--
-- Structure for view `reply_qstn_correct`
--
DROP TABLE IF EXISTS `reply_qstn_correct`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reply_qstn_correct` AS select `reply0qstn`.`q_id` AS `qid`,`reply0qstn`.`userid` AS `uid`,`reply0qstn`.`reply` AS `reply` from `reply0qstn` group by `reply0qstn`.`reply`;

-- --------------------------------------------------------

--
-- Structure for view `top_qstns`
--
DROP TABLE IF EXISTS `top_qstns`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_qstns` AS select `qstns`.`qid` AS `qid`,`qstns`.`title` AS `title`,`qinfo`.`time` AS `time`,`user_nick`.`nickname` AS `nickname`,`view0reply`.`views` AS `views`,`view0reply`.`replies` AS `replies` from ((((`qstns` join `qinfo` on((`qstns`.`qid` = `qinfo`.`qid`))) join `qu` on((`qstns`.`qid` = `qu`.`qid`))) join `user_nick` on((`qu`.`uid` = `user_nick`.`uid`))) join `view0reply` on((`qstns`.`qid` = `view0reply`.`qid`))) order by `view0reply`.`views` desc;

-- --------------------------------------------------------

--
-- Structure for view `user_info`
--
DROP TABLE IF EXISTS `user_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_info` AS select `auth`.`username` AS `username`,`auth`.`uid` AS `uid`,`userinfo`.`nickname` AS `nickname`,`userinfo`.`name` AS `name`,`userinfo`.`surname` AS `surname`,`userinfo`.`mb_no` AS `mb_no`,`userinfo`.`location` AS `location`,`userinfo`.`specializaton` AS `specializaton` from (`auth` join `userinfo` on((`auth`.`uid` = `userinfo`.`uid`)));

-- --------------------------------------------------------

--
-- Structure for view `user_nick`
--
DROP TABLE IF EXISTS `user_nick`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_nick` AS select `auth`.`uid` AS `uid`,`auth`.`username` AS `username`,`userinfo`.`nickname` AS `nickname` from (`auth` join `userinfo` on((`auth`.`uid` = `userinfo`.`uid`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `qinfo`
--
ALTER TABLE `qinfo`
  ADD CONSTRAINT `qinfo_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `qstns` (`qid`) ON DELETE CASCADE;

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `auth` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
