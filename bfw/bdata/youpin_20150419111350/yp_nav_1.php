<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_nav`;");
E_C("CREATE TABLE `yp_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `yp_nav` values('1','0','7172eabb2fdd4eed9447f29fa5add82f','4','1428682232','今日秀','index','','1','/','nav','1');");
E_D("replace into `yp_nav` values('2','0','d8c41a2c23691e59ddf1acebba66ad3a','3','1428929763','我要秀','help_3','','3','adv.html','nav','1');");
E_D("replace into `yp_nav` values('3','0','2e1f5960f4d0008a53b19e999fed0eb7','2','1428929801','帮助中心','help_4',NULL,'2','help.html','nav','1');");
E_D("replace into `yp_nav` values('4','0','85516c23f76dfd1a2810346bc52ec290','1','1428929838','往期回顾','over',NULL,NULL,'over.html','nav','1');");

@include("../../inc/footer.php");
?>