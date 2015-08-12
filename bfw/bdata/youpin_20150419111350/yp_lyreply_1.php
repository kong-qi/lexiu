<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_lyreply`;");
E_C("CREATE TABLE `yp_lyreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_lyid` int(11) NOT NULL,
  `kq_content` text,
  `kq_adminid` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8");

@include("../../inc/footer.php");
?>