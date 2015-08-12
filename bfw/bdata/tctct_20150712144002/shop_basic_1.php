<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `shop_basic`;");
E_C("CREATE TABLE `shop_basic` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `webname` varchar(200) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `webfooter` text NOT NULL,
  `webnotice` text NOT NULL,
  `domain` varchar(255) NOT NULL,
  `hotsearch` text NOT NULL,
  `usernotice` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1");
E_D("replace into `shop_basic` values('1','优联盟','优联盟-商户服务中心','优联盟,客房网,酒店,餐饮店,客房,景点票,机票,特产','优联盟，汇聚南宁市大量生活服务消费信息，为你提供全面的吃、喝、玩、乐、购物资讯，通过对比价格和服务，快捷省钱找到自己需要的服务。','Copyright©2013-2014 南宁品三传媒广告有限公司 优联盟 版权所有 桂ICP备12005595号  投诉电话: 0771-5823405','','tctct.cn','<a href=\"/\" ></a>    <a href=\"/\" title=\"\" ></a>    <a href=\"/\" title=\"\" ></a>','');");

@include("../../inc/footer.php");
?>