<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `shop_picture`;");
E_C("CREATE TABLE `shop_picture` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `picpath` varchar(255) NOT NULL,
  `userid` int(10) NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL,
  `addip` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `updatetime` datetime DEFAULT NULL,
  `hits` int(10) DEFAULT '0',
  `sort` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
E_D("replace into `shop_picture` values('1','æµ‹è¯•å•†å®¶å›¾ç‰‡2','/upload/20131018104957.jpg','35','2013-10-18 10:10:52','113.12.255.180','1','2013-10-18 10:10:25','0','0');");
E_D("replace into `shop_picture` values('2','2','/upload/20131018105131.jpg','35','2013-10-18 10:10:34','116.252.170.91','1','2013-10-18 10:10:34','0','0');");
E_D("replace into `shop_picture` values('4','6','/upload/20131018164635.png','35','2013-10-18 16:10:40','116.252.170.91','1','2013-10-18 16:10:40','0','0');");
E_D("replace into `shop_picture` values('5','dddd2ed','/upload/20131215201739.jpg','54','2013-12-15 20:12:41','127.0.0.1','1','2014-01-18 19:01:57','0','0');");
E_D("replace into `shop_picture` values('6','00d','/upload/20131220214801.png','54','2013-12-20 21:12:03','127.0.0.1','1','2014-01-18 19:01:20','0','0');");
E_D("replace into `shop_picture` values('7','é…’åº—å¤§å ‚','/upload/20140727215948.jpg','73','2014-07-27 21:07:50','113.12.139.43','1','2014-07-27 21:07:50','0','0');");
E_D("replace into `shop_picture` values('8','é…’åº—å¤§å ‚','/upload/20140727220003.jpg','73','2014-07-27 22:07:03','113.12.139.43','1','2014-07-27 22:07:03','0','0');");
E_D("replace into `shop_picture` values('9','å®¾é¦†å¤§å ‚','/upload/20140728102258.jpg','74','2014-07-28 10:07:00','180.138.74.91','1','2014-07-28 10:07:00','0','0');");
E_D("replace into `shop_picture` values('10','å‰å°æŽ¥å¾…','/upload/20140728122513.jpg','76','2014-07-28 12:07:18','180.138.74.91','1','2014-07-28 12:07:18','0','0');");

@include("../../inc/footer.php");
?>