<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `shop_admin`;");
E_C("CREATE TABLE `shop_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `regtime` datetime NOT NULL,
  `regip` varchar(50) NOT NULL,
  `llogintime` datetime NOT NULL,
  `lloginip` varchar(50) NOT NULL,
  `tlogintime` datetime NOT NULL,
  `tloginip` varchar(50) NOT NULL,
  `logincount` int(10) NOT NULL DEFAULT '0',
  `uservip` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `cityB` int(10) NOT NULL DEFAULT '0',
  `cityS` int(10) NOT NULL DEFAULT '0',
  `remark` varchar(200) NOT NULL,
  `cityA` int(10) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1");
E_D("replace into `shop_admin` values('5','admin','yangshuoadmin789789','0000-00-00 00:00:00','','2014-10-29 11:10:24','118.186.158.195','2015-02-15 11:02:34','125.88.255.31','330','0','1','0','0','','0');");
E_D("replace into `shop_admin` values('10','南宁管理员','123456','2013-09-27 12:09:20','116.253.219.183','2013-10-19 01:10:56','116.252.170.91','2013-10-19 01:10:36','116.252.170.91','20','0','1','2','3','','688');");
E_D("replace into `shop_admin` values('12','456','123','2013-09-27 17:09:20','116.253.219.183','2013-10-05 17:10:16','116.252.169.145','2013-10-05 17:10:53','116.252.169.145','4','0','1','2','3','','0');");
E_D("replace into `shop_admin` values('13','test','123456','2013-10-17 12:10:22','116.252.128.7','2013-10-17 12:10:47','116.252.128.7','2013-10-21 13:10:39','113.12.255.180','2','0','1','1','682','','879');");
E_D("replace into `shop_admin` values('14','南宁良庆区管理员','123456','2013-10-19 18:10:43','116.252.170.91','2013-10-21 10:10:04','58.59.147.114','2013-10-21 11:10:24','58.59.147.114','4','0','1','2','3','','695');");

@include("../../inc/footer.php");
?>