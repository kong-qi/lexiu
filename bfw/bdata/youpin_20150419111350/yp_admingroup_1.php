<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_admingroup`;");
E_C("CREATE TABLE `yp_admingroup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_intro` varchar(120) DEFAULT NULL,
  `kq_group` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `yp_admingroup` values('1','0cff2e3816d1a447c8d9db3d422bf5f2','1428323780','0','超级管理员',NULL,'[\"root\"]');");
E_D("replace into `yp_admingroup` values('2','b215a39888d1b0943c90fb8f030570e5','1428323793','0','信息编辑',NULL,'[\"news_add\",\"news_edt\",\"news_dl\"]');");
E_D("replace into `yp_admingroup` values('3','7402a04ae60c444b53ed51412e8475f0','1428323801','0','游客',NULL,'[\"read\"]');");

@include("../../inc/footer.php");
?>