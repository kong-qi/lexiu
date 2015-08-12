<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_admin`;");
E_C("CREATE TABLE `yp_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_name` varchar(120) NOT NULL,
  `kq_pwd` varchar(200) NOT NULL,
  `kq_uniqid` varchar(200) NOT NULL,
  `kq_checked` tinyint(4) NOT NULL,
  `kq_groupid` tinyint(4) NOT NULL,
  `kq_savebao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `yp_admin` values('1','6a4d964910683750b0ecfe6520fb75f3','1400419288','1','admin','7c4a8d09ca3762af61e59520943dc26494f8941b','781cdf4259e8679a67b9ea29f598443990302e6f','1','1',NULL);");

@include("../../inc/footer.php");
?>