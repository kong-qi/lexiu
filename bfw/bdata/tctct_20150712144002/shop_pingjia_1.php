<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `shop_pingjia`;");
E_C("CREATE TABLE `shop_pingjia` (
  `pj_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评价ID',
  `pj_orid` varchar(255) DEFAULT NULL COMMENT '订单id',
  `pj_pid` int(11) DEFAULT NULL COMMENT '产品id',
  `pj_userfs` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT '购买者评分',
  `pj_uname` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `pj_usercont` text CHARACTER SET latin1 COMMENT '购买者评价内容',
  `pj_sjname` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `pj_sjfs` int(11) DEFAULT NULL,
  `pj_sjcont` text CHARACTER SET latin1,
  `pj_sjctime` datetime DEFAULT NULL,
  `pj_userctime` datetime DEFAULT NULL COMMENT '购买者评价时间',
  `o_upj` tinyint(1) DEFAULT '0',
  `o_mpj` tinyint(4) DEFAULT NULL,
  `o_checked` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`pj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8");
E_D("replace into `shop_pingjia` values('53','TC1401261423221813','103','4','60','','32','3','cvxhfgndf','2014-01-26 14:28:45','2014-01-26 14:30:41','1','1','0');");
E_D("replace into `shop_pingjia` values('54','TC1401271033221585','46',NULL,'54',NULL,'15','4','df','2014-01-27 11:12:51',NULL,'0','1','0');");
E_D("replace into `shop_pingjia` values('55','TC1401291135521174','103','5','60','éžå¸¸çš„å•†å®¶ï¼ŒæœåŠ¡å¾ˆå¥½ï¼Œå€¼å¾—æŽ¨èï¼','32',NULL,NULL,NULL,'2014-01-29 11:40:16','1',NULL,'0');");
E_D("replace into `shop_pingjia` values('56','TC1401261449351263','101','1','60','ç¬¬äºŒæ¬¡æ¶ˆè´¹äº†ï¼Œå¾ˆä¸é”™ã€‚','32',NULL,NULL,NULL,'2014-01-29 11:42:00','1',NULL,'0');");

@include("../../inc/footer.php");
?>