<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_zhaoshang`;");
E_C("CREATE TABLE `yp_zhaoshang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_type` varchar(255) DEFAULT NULL,
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_phone` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_qq` varchar(120) DEFAULT NULL,
  `kq_content` mediumtext,
  `kq_beizhu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8");

@include("../../inc/footer.php");
?>