<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_adv`;");
E_C("CREATE TABLE `yp_adv` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `yp_adv` values('1','cf5580b314e9c8ee50cde066ebb69a60','1428681741','0','1','顶部广告','1','20150411000213_59243.jpg',NULL,NULL,'1','index',NULL);");
E_D("replace into `yp_adv` values('2','08a106161e095382ed6b293df8e6d862','1428684051','0','1','帮助中心头部广告','1','20150411004034_80208.jpg',NULL,NULL,'1','3',NULL);");

@include("../../inc/footer.php");
?>