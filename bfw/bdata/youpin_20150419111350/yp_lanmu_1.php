<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_lanmu`;");
E_C("CREATE TABLE `yp_lanmu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_fid` int(11) unsigned NOT NULL,
  `kq_cpid` int(11) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) NOT NULL,
  `kq_ename` varchar(120) DEFAULT NULL,
  `kq_model` tinyint(1) DEFAULT NULL,
  `kq_type` varchar(120) DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
E_D("replace into `yp_lanmu` values('1','0',NULL,'693047a6d16ce5b129a6241143b27d8b','1428591016','1','今日秀','xiudongquancheng','1','adv',NULL,'1','','xiudongquancheng','',NULL,NULL,'','','										');");
E_D("replace into `yp_lanmu` values('2','0',NULL,'5366d5003855e0ad1c7673a75ca22db0','1428591040','0','帮助中心','help','0',NULL,'2','0',NULL,'help',NULL,NULL,NULL,NULL,NULL,NULL);");
E_D("replace into `yp_lanmu` values('3','2',NULL,'fae05c11b28848a77615faec817ff1ea','1428591066','0','我要秀','adv_help','2',NULL,NULL,'1','','advhelp','',NULL,NULL,'','','																				');");
E_D("replace into `yp_lanmu` values('4','2',NULL,'85d884c45df6ea1d9be3249bc560da7f','1428591088','0','帮助信息','helpmsg','2',NULL,NULL,'1',NULL,'helpmsg',NULL,NULL,NULL,NULL,NULL,NULL);");
E_D("replace into `yp_lanmu` values('5','0',NULL,'939b4f929ee54c3a77e41c7acaaff9d1','1428674271','2','广告推荐',NULL,'1',NULL,NULL,'1',NULL,'adv',NULL,NULL,NULL,NULL,NULL,NULL);");
E_D("replace into `yp_lanmu` values('6','0',NULL,'6d83607bb5df7a7cbfb844b0afc59c7e','1428765063','0','公告','gongao','2','0',NULL,'1',NULL,'gongao',NULL,NULL,NULL,NULL,NULL,NULL);");

@include("../../inc/footer.php");
?>