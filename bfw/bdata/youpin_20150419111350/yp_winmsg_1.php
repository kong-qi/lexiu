<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_winmsg`;");
E_C("CREATE TABLE `yp_winmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_ftime` varchar(120) DEFAULT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_uuid` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_newsid` int(11) DEFAULT NULL,
  `kq_userid` varchar(255) DEFAULT NULL,
  `kq_username` varchar(255) DEFAULT NULL,
  `kq_checked` tinyint(4) DEFAULT '1',
  `kq_beizhu` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8");
E_D("replace into `yp_winmsg` values('12','1429134764',NULL,'0','9bb74c25ea6affd898b04b2b00d4a859','7878787888','11','[\"27\"]','空气','1',NULL);");
E_D("replace into `yp_winmsg` values('13','1429134839',NULL,'0','f1a2ba05eb2a4600b8cf23819fd17d16','抽大奖了','2','[\"26\"]','优联盟乐秀网','1',NULL);");
E_D("replace into `yp_winmsg` values('14','1429134961',NULL,'0','3dbe5481aadcc0c2492eecc49facfa2f','5555','24','[\"25\"]','andy','1',NULL);");
E_D("replace into `yp_winmsg` values('15','1429203338',NULL,'0','34e2613550f6a7e5e0b1f6613f08f919','696969','27','[\"30\"]','空气','1',NULL);");

@include("../../inc/footer.php");
?>