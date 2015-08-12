<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_liuyan`;");
E_C("CREATE TABLE `yp_liuyan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_number` int(11) DEFAULT NULL,
  `kq_checked` tinyint(1) DEFAULT '1',
  `kq_newsid` varchar(120) DEFAULT NULL,
  `kq_userid` varchar(120) DEFAULT NULL,
  `kq_ip` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8");
E_D("replace into `yp_liuyan` values('41','0f960f75ce78098ea173a013671ebcd1','1428975503','0','优联盟乐秀网','空气工作室',NULL,'1','1','26','14.152.78.172',NULL,NULL,NULL,'');");
E_D("replace into `yp_liuyan` values('42','19ea42ab5983ee6df34dcde40d5da5a2','1428975539','0','优联盟乐秀网','抽大奖了',NULL,'1','2','26','14.152.78.172',NULL,NULL,NULL,'hhhh');");
E_D("replace into `yp_liuyan` values('43','dbd7be14707e7bde86cb8fc3ae21758c','1428975608','0','andy','抽大奖了',NULL,'1','2','25','14.152.78.172',NULL,NULL,NULL,'吞吞吐吐');");
E_D("replace into `yp_liuyan` values('44','001b5a2f8b14c7cfd07c65fad4218e59','1428978375','0','空气','抽大奖了',NULL,'1','2','27','122.13.2.165',NULL,NULL,NULL,'12323121332321');");
E_D("replace into `yp_liuyan` values('46','0fbe798e5da407e0c98ac0538e48890b','1429202630','0','andy','8899','1','1','26','25','171.107.29.92',NULL,NULL,NULL,'vbnbvn');");
E_D("replace into `yp_liuyan` values('47','1888844938529bd5465d962861a61355','1429202710','0','andy','广告','1','1','25','24','171.107.29.92',NULL,NULL,NULL,'cxghfxhggfhjdfhdfhfg');");
E_D("replace into `yp_liuyan` values('48','2f4f00d921dd5b91c7112d0eacbe886c','1429202722','0','andy','696969','2','1','27','24','171.107.29.92',NULL,NULL,NULL,'klihoiuoo');");
E_D("replace into `yp_liuyan` values('49','c172e623a156b66dd85c73dc3b43e11b','1429203300','0','andy','哥哥哥哥哥哥哥','1','1','28','24','171.107.29.92',NULL,NULL,NULL,'有益于');");

@include("../../inc/footer.php");
?>