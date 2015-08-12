<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_index`;");
E_C("CREATE TABLE `yp_index` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_ctime` varchar(120) NOT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_type` varchar(120) DEFAULT NULL,
  `kq_content` text,
  `kq_code` text,
  `kq_thumbs` text,
  `kq_checked` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `yp_index` values('2','2d7e1f07d44b17d34cc706c9cdd04bb9','0','1428680188','活动规则','code',NULL,'<dl>\r\n<dt>1、  抢奖品活动面向所有人开放，自由参加。</dt>\r\n</dl>\r\n<dl>\r\n\r\n</dl>\r\n<dl>\r\n<dt>5、特别说明：在法律允许的范围内，活动解析权贵南宁品三传媒广告有限公司所有。</dt>\r\n\r\n</dl>',NULL,'1');");
E_D("replace into `yp_index` values('3','7cdaabd165e9aef93ea680bd0e9e45c1','0','1428680591','微信公众二维码','pic',NULL,NULL,'[\"20150410234105_93232.png\"]','1');");
E_D("replace into `yp_index` values('4','aff9cefc5eeb994e44dd4816946c0f68','0','1428680907','电话号码','code',NULL,'0771-5823405',NULL,'1');");
E_D("replace into `yp_index` values('5','4347a61d83e0a9becc14273191e88ae3','0','1428687500','QQ号码','code',NULL,'919857059',NULL,'1');");

@include("../../inc/footer.php");
?>