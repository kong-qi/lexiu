<?php
$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."admin` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_name` varchar(120) NOT NULL,
  `kq_pwd` varchar(200) NOT NULL,
  `kq_uniqid` varchar(200) NOT NULL,
  `kq_checked` tinyint(4) NOT NULL,
  `kq_groupid` tinyint(4) NOT NULL,
  `kq_savebao` varchar(200) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;","".DB_EXT."admin");
$data[]=array("INSERT INTO `".DB_EXT."admin`(`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_pwd`, `kq_uniqid`, `kq_checked`, `kq_groupid`, `kq_savebao`) VALUES
(1, '6a4d964910683750b0ecfe6520fb75f3', '1400419288', 1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '781cdf4259e8679a67b9ea29f598443990302e6f', 1, 1, NULL);","");
$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."admingroup` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_intro` varchar(120) DEFAULT NULL,
  `kq_group` varchar(120) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;","".DB_EXT."admingroup");

$data[]=array("INSERT INTO `".DB_EXT."admingroup`(`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_intro`, `kq_group`) VALUES
(1, '0cff2e3816d1a447c8d9db3d422bf5f2', '1428323780', 0, '超级管理员', NULL, '[\"root\"]'),
(2, 'b215a39888d1b0943c90fb8f030570e5', '1428323793', 0, '信息编辑', NULL, '[\"news_add\",\"news_edt\",\"news_dl\"]'),
(3, '7402a04ae60c444b53ed51412e8475f0', '1428323801', 0, '游客', NULL, '[\"read\"]');","");

$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."adv` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_checked` tinyint(4) DEFAULT '1',
  `kq_name` varchar(255) NOT NULL,
  `kq_type` varchar(120) NOT NULL,
  `kq_picurl` text,
  `kq_code` text,
  `kq_url` text,
  `kq_onclick` int(11) DEFAULT '1',
  `kq_position` varchar(120) DEFAULT NULL,
  `kq_diyposition` varchar(255) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;","".DB_EXT."adv");


$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."config` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_keyword` varchar(200) DEFAULT NULL,
  `kq_description` varchar(255) DEFAULT NULL,
  `kq_closed` tinyint(1) DEFAULT NULL,
  `kq_closedip` text,
  `kq_rewrite` tinyint(1) DEFAULT NULL,
  `kq_link` tinyint(1) DEFAULT NULL,
  `kq_tongji` text,
  `kq_tel` varchar(60) DEFAULT NULL,
  `kq_telname` varchar(120) DEFAULT NULL,
  `kq_phone` varchar(60) DEFAULT NULL,
  `kq_fax` varchar(60) DEFAULT NULL,
  `kq_qq` varchar(60) DEFAULT NULL,
  `kq_url` varchar(255) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_icp` varchar(60) DEFAULT NULL,
  `kq_youbian` varchar(60) DEFAULT NULL,
  `kq_basename` varchar(120) DEFAULT 'kongqi',
  `kq_openconfig` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;","".DB_EXT."config");

$data[]=array("INSERT INTO `".DB_EXT."config` (`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_title`, `kq_keyword`, `kq_description`, `kq_closed`, `kq_closedip`, `kq_rewrite`, `kq_link`, `kq_tongji`, `kq_tel`, `kq_telname`, `kq_phone`, `kq_fax`, `kq_qq`, `kq_url`, `kq_email`, `kq_address`, `kq_icp`, `kq_youbian`, `kq_basename`, `kq_openconfig`) VALUES
(1, '', NULL, 0, '空气工作室', '空气工作室', '空气CMS', '空气工作室', 0, '', 0, 1, '', '', '', '', '', '', 'www.kong-qi.com', '', '', '', '', 'kongqi', NULL);","");

$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."file` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_type` tinyint(4) DEFAULT '1',
  `kq_url` text,
  `kq_aburl` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."file");

$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."index` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_ctime` varchar(120) NOT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_type` varchar(120) DEFAULT NULL,
  `kq_content` text,
  `kq_code` text,
  `kq_thumbs` text,
  `kq_checked` tinyint(4) DEFAULT '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."index");

$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."lanmu` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_fid` int(11) unsigned NOT NULL,
  `kq_cpid` int(11) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) NOT NULL,
  `kq_ename` varchar(120) DEFAULT NULL,
  `kq_model` tinyint(1) DEFAULT NULL,
  `kq_show` tinyint(1) DEFAULT NULL,
  `kq_islast` tinyint(1) NOT NULL DEFAULT '0',
  `kq_picurl` text,
  `kq_url` varchar(255) DEFAULT NULL,
  `kq_wburl` varchar(255) DEFAULT NULL,
  `kq_moban` varchar(255) DEFAULT NULL,
  `kq_daohan` tinyint(1) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_keyword` varchar(255) DEFAULT NULL,
  `kq_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."lanmu");



$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."liuyan` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_ip` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_content` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."liuyan");

$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."lyreply` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_lyid` int(11) NOT NULL,
  `kq_content` text,
  `kq_adminid` varchar(200) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."lyreply");

$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."nav` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_fid` int(11) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_ename` varchar(120) DEFAULT NULL,
  `kq_picurl` text,
  `kq_url` varchar(255) DEFAULT NULL,
  `kq_wburl` varchar(255) DEFAULT NULL,
  `kq_type` varchar(120) DEFAULT NULL,
  `kq_checked` tinyint(4) DEFAULT '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."nav");



$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."news` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_lmid` int(11) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_wburl` varchar(255) DEFAULT NULL,
  `kq_source` varchar(255) DEFAULT NULL,
  `kq_author` varchar(120) DEFAULT NULL,
  `kq_intro` text,
  `kq_picurl` text,
  `kq_thumbs` text,
  `kq_content` longtext,
  `kq_mbcontent` mediumtext,
  `kq_checked` tinyint(1) DEFAULT '1',
  `kq_hidden` tinyint(1) DEFAULT '1',
  `kq_index` tinyint(1) DEFAULT NULL,
  `kq_looknum` int(11) DEFAULT '1',
  `kq_keyword` varchar(255) DEFAULT NULL,
  `kq_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY  (`id`),
  KEY `kq_title` (`kq_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."news");


$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."newspic` (
  `npic_id` int(11) NOT NULL auto_increment,
  `npic_sort` int(11) default NULL,
  `npic_picurl` text NOT NULL,
  `npic_newsid` int(11) NOT NULL,
  `uuid` varchar(120) NOT NULL,
  PRIMARY KEY  (`npic_id`),
  KEY `npic_newsid` (`npic_newsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."newspic");



$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."order` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_cpid` int(11) DEFAULT NULL,
  `kq_adminid` varchar(120) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_status` tinyint(1) DEFAULT '1',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_name` varchar(255) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_price` varchar(11) DEFAULT NULL,
  `kq_number` int(11) DEFAULT NULL,
  `kq_total` int(11) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_liuyan` text,
  `kq_beizhu` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."order");


$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."youlink` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_endtime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_follow` tinyint(1) DEFAULT '0',
  `kq_name` varchar(255) DEFAULT NULL,
  `kq_type` varchar(120) DEFAULT NULL,
  `kq_url` text,
  `kq_pic` text,
  `kq_pr` int(11) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."youlink");



$data[]=array("CREATE TABLE IF NOT EXISTS `".DB_EXT."zhaoshang` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_type` varchar(255) DEFAULT NULL,
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_phone` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_qq` varchar(120) DEFAULT NULL,
  `kq_content` mediumtext,
  `kq_beizhu` varchar(255) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","".DB_EXT."zhaoshang");

?>