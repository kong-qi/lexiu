<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `shop_danbao`;");
E_C("CREATE TABLE `shop_danbao` (
  `db_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `db_jinger` int(11) DEFAULT NULL COMMENT '担保金额',
  `db_userid` int(11) DEFAULT NULL COMMENT '担保者ID',
  `db_ctime` datetime DEFAULT NULL COMMENT '创建时间',
  `db_checked` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`db_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8");

@include("../../inc/footer.php");
?>