<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_fankui`;");
E_C("CREATE TABLE `yp_fankui` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_ip` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8");

@include("../../inc/footer.php");
?>