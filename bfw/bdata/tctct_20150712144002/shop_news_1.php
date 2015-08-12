<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `shop_news`;");
E_C("CREATE TABLE `shop_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `typeB` int(4) NOT NULL DEFAULT '0',
  `tourl` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `content` text NOT NULL,
  `fromto` varchar(50) NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0',
  `hits` int(10) NOT NULL DEFAULT '0',
  `adminid` int(10) NOT NULL,
  `addtime` datetime NOT NULL,
  `addip` varchar(50) NOT NULL,
  `updatetime` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1");
E_D("replace into `shop_news` values('9','使用特订网广告信息的法律声明','5','','','<div>\r\n	<span style=\"font-size: 14px; \">&nbsp; &nbsp;特订网（tctct.cn）提醒您：在使用特订网各项服务前，请您务必仔细阅读并透彻理解本声明。如果您使用特订网，您的使用行为将被视为对本声明全部内容的认可。</span></div>\r\n<div>\r\n	<span style=\"font-size: 14px; \">&nbsp; &nbsp;特订网（tctct.cn）站内所包涵的资讯、内容、广告等相关信息，均来自互联网络，或由客户或会员自行提供。内容所涉及的相关项目、商品（包括但不限于项目名称、品牌，公司名称、联系人及联络信息，产品的描述和说明，相关图片、视讯等）的信息，客户或会员依法应对其提供的任何信息承担全部责任。任何单位或个人认为特订网网页内容（包括但不限于特订网会员发布的商品信息）可能涉嫌侵犯其合法权益，应该及时向特订网提出书面权利通知，并提供身份证明、权属证明、具体链接（URL）及详细侵权情况证明。特订网在收到上述法律文件后，将会依法尽快移除相关涉嫌侵权的内容。特订网转载作品（包括论坛内容）出于传递更多信息之目的，并不意味特订网（包括特订网关联企业）赞同其观点或证实其内容的真实性。</span></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	<span style=\"font-size: 14px; \">第一、知识产权声明</span></div>\r\n<div>\r\n	<span style=\"font-size: 14px; \">特订网（tctct.cn）拥有本网站内所有信息内容的版权。</span></div>\r\n<div>\r\n	<span style=\"font-size: 14px; \">任何被授权的浏览、复制、打印和传播属于本网站内信息内容都不得用于商业目的且所有信息内容及其任何部分的使用都必须包括此版权声明； 特订网（tctct.cn）所有的产品、技术与所有程序均属于特讯网知识产权。特订网、其他产品服务名称及相关图形、标识等为特讯网的注册商标。未经特订网许可，任何人不得擅自（包括但不限于：以非法的方式复制、传播、展示、镜像、上载、下载）使用。否则，特订网将依法追究法律责任。</span></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	<span style=\"font-size: 14px; \">第二、广告类信息免责声明</span></div>\r\n<div>\r\n	<span style=\"font-size: 14px; \">1、公司对与任何包含、经由、或链结、下载或从任何与本网站有关服务所获得的资讯、内容或广告，不声明或保证其内容的正确性或可靠性；对于您透过本网广告、资讯或要约而展示、购买或取得的任何产品、资讯或资料，本网站亦不负品质保证的责任。您与此接受并承认信赖任何信息所产生之风险应自行承担，本网对任何使用或提供本网站信息的商业活动及其风险不承担任何责任。</span></div>\r\n<div>\r\n	<span style=\"font-size: 14px; \">2、本网站若因线路及非本公司控制范围外的硬件故障或其它不可抗力，以及黑客政击、计算机病毒侵入或发而造成的个人资料泄露、丢失、被盗用或被篡改等，本网站亦不负任何责任。</span></div>\r\n<div>\r\n	<span style=\"font-size: 14px; \">3、当本网站以链接形式推荐网站内容时，本网站并不对这些网站或资源的可用性负责，且不保证从这些网站获取的任何内容、产品、服务或其他材料的真实性、合法性，对于任何因使用或信赖从网站上获取的内容、产品、资源、服务或其他材料而造成的任何直接或间接的损失，本网站均不承担任何责任。</span></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n','特订网','0','42541','5','2013-09-09 11:09:00','116.9.64.217','2014-08-04 23:08:01','1');");
E_D("replace into `shop_news` values('10','诚邀全国各城市业务合作','4','','','<p>\r\n	&nbsp;</p>\r\n<p align=\"left\">\r\n	诚邀全国各城市（区）独家业务合作</p>\r\n<p align=\"left\">\r\n	&nbsp;</p>\r\n<p align=\"left\">\r\n	合作范围</p>\r\n<p align=\"left\">\r\n	推广<a href=\"http://www.huigou100.net/\">特讯网</a>，代理广告业务。</p>\r\n<p align=\"left\">\r\n	&nbsp;</p>\r\n<p align=\"left\">\r\n	合作收益：</p>\r\n<p align=\"left\">\r\n	1、永久获得代理客户广告收益等</p>\r\n<p align=\"left\">\r\n	2、优先获得<a href=\"http://www.huigou100.net/\">特订网</a>提供的其他项目合作代理机会。</p>\r\n<p align=\"left\">\r\n	&nbsp;</p>\r\n<p align=\"left\">\r\n	合作要求：</p>\r\n<p align=\"left\">\r\n	任何有意在互联网创业发展，自有上网设备并热爱广告、销售行业者。</p>\r\n<p align=\"left\">\r\n	&nbsp;</p>\r\n<p align=\"left\">\r\n	详情请咨询：电话：0771-5823405&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ：475118371</p>\r\n','特订网','0','39405','5','2013-09-09 11:09:49','116.9.64.217','2014-08-04 23:08:42','1');");
E_D("replace into `shop_news` values('11','特订网，旅游服务集中推广服务平台！','3','','','<p style=\"text-align: center\">\r\n	<span style=\"font-size: 14px; \">电子商务正越来越深入改变我们的生活，改变传统的商业模式，特订网通过为中国中小企业商户,商贸人士提供简单、高效、精准的旅游信息展示，为各行业商家提供网上预订推广服务，实现互联网上从产品推广到消费预订一步到位的面向终端的销售模式；</span><span style=\"font-size: 14px;\">创新驱动发展特订网将继续保持传统的发展竞争理念，充分发挥互联网高速发展的效能优势,立志发展成为面向中小企业以及个人创业服务的电子商务技术服务领域的互联网知名品牌企业。</span></p>\r\n','特订网','0','42976','5','2013-09-09 11:09:35','116.9.64.217','2014-08-04 23:08:42','1');");
E_D("replace into `shop_news` values('16','担保预订交易规则','2','','','<p>\r\n	网站尚未开通担保预订服务</p>\r\n','特订网','0','43419','5','2014-01-18 17:01:03','127.0.0.1','2014-08-04 23:08:57','1');");

@include("../../inc/footer.php");
?>