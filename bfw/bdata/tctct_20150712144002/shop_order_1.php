<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `shop_order`;");
E_C("CREATE TABLE `shop_order` (
  `or_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `or_pid` int(11) DEFAULT NULL COMMENT '产品ID',
  `or_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT '商品名称',
  `or_bianhao` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT '订单编号',
  `or_userid` int(11) DEFAULT NULL COMMENT '购买者ID',
  `or_shajiaid` int(11) DEFAULT NULL COMMENT '商家ID',
  `or_total` int(11) DEFAULT NULL COMMENT '商品总价',
  `or_count` int(11) DEFAULT NULL COMMENT '购买数量',
  `or_sjprice` int(11) DEFAULT NULL,
  `or_payfs` varchar(255) DEFAULT NULL COMMENT '支付方式',
  `or_tel` varchar(60) CHARACTER SET latin1 DEFAULT NULL COMMENT '联系方式',
  `or_beizhu` text CHARACTER SET latin1 COMMENT '补充说明',
  `or_zhuangtai` tinyint(1) DEFAULT '0' COMMENT '订单状态',
  `or_pingjia` tinyint(4) DEFAULT '0',
  `or_address` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT '收货地址',
  `or_orname` varchar(60) CHARACTER SET latin1 DEFAULT NULL COMMENT '收货人',
  `or_ctime` datetime DEFAULT NULL,
  `or_cktime` datetime DEFAULT NULL,
  `or_checked` int(11) DEFAULT '1',
  PRIMARY KEY (`or_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8");
E_D("replace into `shop_order` values('45','87','è±ªåŽåŒäººé—´','TC1407261517111813','72','26','120','2','60','åˆ°åº—æ¶ˆè´¹æ—¶ä»˜æ¬¾','15607833016','','1','0','å—å®ä¸œè‘›æ€è´¤è·¯å£513','å“ä¸‰ä¼ åª’å¹¿å‘Š','2014-07-26 15:20:08','2014-07-26 15:28:32','1');");
E_D("replace into `shop_order` values('43','71','æ ‡å‡†æˆ¿A','TC1405061547431256','70','20','155','1','155','åˆ°åº—æ¶ˆè´¹æ—¶ä»˜æ¬¾','13367613881','æˆ‘åªè¦é˜³å°æˆ¿ï¼Œè°¢è°¢ã€‚éº»çƒ¦æ‚¨äº†','0','0','å—å®é’ç§€åŒº','789456','2014-05-06 16:06:56',NULL,'1');");
E_D("replace into `shop_order` values('44','81','åŒäººé—´--é…ç”µè„‘ï¼Œæœ‰çº¿ç”µè§†ã€å†·æš–ç©ºè°ƒã€24å°æ—¶çƒ­æ°´å™¨ã€ç”µç£ç‚‰ã€é”…ç¢—é•–ç›†é½å…¨','TC1405061611371239','70','24','88','1','88','åˆ°åº—æ¶ˆè´¹æ—¶ä»˜æ¬¾','13367613881','','0','0','å—å®','789456','2014-05-06 16:12:35',NULL,'1');");

@include("../../inc/footer.php");
?>