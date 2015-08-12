<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_order`;");
E_C("CREATE TABLE `yp_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_cpid` int(11) DEFAULT NULL,
  `kq_adminid` varchar(120) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_status` tinyint(1) DEFAULT '1',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_name` varchar(255) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_price` varchar(11) DEFAULT NULL,
  `kq_number` int(11) DEFAULT NULL,
  `kq_total` int(11) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_liuyan` text,
  `kq_beizhu` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8");

@include("../../inc/footer.php");
?>