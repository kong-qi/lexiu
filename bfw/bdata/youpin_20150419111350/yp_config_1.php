<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_config`;");
E_C("CREATE TABLE `yp_config` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_keyword` varchar(200) DEFAULT NULL,
  `kq_description` varchar(255) DEFAULT NULL,
  `kq_closed` tinyint(1) DEFAULT NULL,
  `kq_closedip` text,
  `kq_rewrite` tinyint(1) DEFAULT NULL,
  `kq_link` tinyint(1) DEFAULT NULL,
  `kq_tongji` text,
  `kq_tel` varchar(60) DEFAULT NULL,
  `kq_telname` varchar(120) DEFAULT NULL,
  `kq_phone` varchar(60) DEFAULT NULL,
  `kq_fax` varchar(60) DEFAULT NULL,
  `kq_qq` varchar(60) DEFAULT NULL,
  `kq_url` varchar(255) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_icp` varchar(60) DEFAULT NULL,
  `kq_youbian` varchar(60) DEFAULT NULL,
  `kq_basename` varchar(120) DEFAULT 'kongqi',
  `kq_openconfig` text,
  `kq_number` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `yp_config` values('1','',NULL,'0','秀动全城','秀动全城','秀动全城','秀动全城栏目组专门组织各种活动，参加者有机会获得免费赠送的礼品或者现金，娱乐大众，制造惊喜，制造新闻，快速传播，这是做好的推广方式了。','0','','1','1','','0771-5823405','','','','919857059','www.tctct.cn','','广西南宁市东葛路31号东葛华都5楼513室','桂ICP备12005595号','','kongqi','{\r\n\"gz\":\"2\",\r\n\"tel\":\"4\",\r\n\"wx\":\"3\",\r\n\"qq\":\"5\"\r\n}','3681');");

@include("../../inc/footer.php");
?>