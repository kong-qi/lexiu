<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `shop_newstype`;");
E_C("CREATE TABLE `shop_newstype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(20) DEFAULT NULL,
  `parentid` int(10) unsigned DEFAULT '0',
  `levelid` int(4) unsigned DEFAULT '1',
  `sort` int(10) unsigned DEFAULT '0',
  `status` int(4) unsigned DEFAULT '1',
  `remark` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `adminid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
E_D("replace into `shop_newstype` values('1','è§è¯æŽ¨å¹¿','0','1','1','1',NULL,'5');");
E_D("replace into `shop_newstype` values('2','å¸®åŠ©ä¸­å¿ƒ','0','1','2','1',NULL,'5');");
E_D("replace into `shop_newstype` values('3','å…³äºŽæˆ‘ä»¬','0','1','3','1',NULL,'5');");
E_D("replace into `shop_newstype` values('4','åŠ ç›Ÿåˆä½œ','0','1','4','1',NULL,'5');");
E_D("replace into `shop_newstype` values('5','å…è´£å£°æ˜Ž','0','1','5','1',NULL,'5');");

@include("../../inc/footer.php");
?>