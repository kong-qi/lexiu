<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_news`;");
E_C("CREATE TABLE `yp_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_lmid` int(11) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_wburl` varchar(255) DEFAULT NULL,
  `kq_source` varchar(255) DEFAULT NULL,
  `kq_author` varchar(120) DEFAULT NULL,
  `kq_userid` varchar(120) DEFAULT NULL,
  `kq_intro` text,
  `kq_picurl` text,
  `kq_thumbs` text,
  `kq_content` longtext,
  `kq_mbcontent` mediumtext,
  `kq_checked` tinyint(1) DEFAULT '1',
  `kq_hidden` tinyint(1) DEFAULT '1',
  `kq_index` tinyint(1) DEFAULT NULL,
  `kq_looknum` int(11) DEFAULT '1',
  `kq_keyword` varchar(255) DEFAULT NULL,
  `kq_description` varchar(255) DEFAULT NULL,
  `kq_sttime` varchar(120) DEFAULT NULL,
  `kq_endtime` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kq_title` (`kq_title`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8");
E_D("replace into `yp_news` values('1','1','b9fbcd6180327d35967e915403d70e81','1428593990','0','空气工作室',NULL,NULL,NULL,NULL,NULL,'20150410231826_88348.png',NULL,'dfdfdf',NULL,'1','1','0','1',NULL,NULL,'1426953600','1428768000');");
E_D("replace into `yp_news` values('2','1','40624a2c3d42b2e94e9e929a4e2c3842','1428675247','0','抽大奖了',NULL,NULL,NULL,NULL,NULL,'20150410231809_33694.jpg',NULL,NULL,NULL,'1','1','0','1',NULL,NULL,'1429113600','1429174320');");
E_D("replace into `yp_news` values('3','5','29f089b92e94cc57081a2905284cd5bf','1428678504','0','空气工作室',NULL,NULL,NULL,NULL,NULL,'20150410231752_62745.jpg',NULL,'的发大幅度发发大幅度','8888888888888888888888','1','1',NULL,'1',NULL,NULL,'1428595200','1429200000');");
E_D("replace into `yp_news` values('4','5','50e9fe5038b7d9645c0876cae66aac6c','1428678684','0','对方答复',NULL,NULL,NULL,NULL,NULL,'20150410231738_56892.jpg',NULL,'真的不错啊','9999999999999','1','1',NULL,'1',NULL,NULL,'1428629040','1429294080');");
E_D("replace into `yp_news` values('5','1','125e69c7513d3c0539f2715edc394253','1428679223','0','打手机',NULL,NULL,NULL,NULL,NULL,'20150410232004_24397.gif',NULL,NULL,NULL,'1','1','0','1',NULL,NULL,'1429200000','1429245780');");
E_D("replace into `yp_news` values('7','4','41696b819d98c2f40ce78256814d830c','1428685564','100','关于我们','','',NULL,NULL,NULL,'',NULL,'<p>\r\n	<span style=\"font-family:宋体, SimSun;color:#000000;font-size:12px;\">若您还没有京东账号，请点击<span style=\"font-family:宋体, SimSun;font-size:12px;text-decoration:none;\"><a href=\"https://reg.jd.com/reg/person?ReturnUrl=http%3A%2F%2Fwww.jd.com\" target=\"_blank\"><span style=\"font-family:宋体, SimSun;font-size:12px;text-decoration:none;\">注册</span></a></span></span><span style=\"color:#000000;\"><span style=\"font-family:宋体, SimSun;color:#000000;font-size:12px;\">，</span><span style=\"font-family:宋体, SimSun;color:#000000;font-size:12px;text-decoration:none;\">详细操作步骤</span><span style=\"font-family:宋体, SimSun;color:#000000;font-size:12px;\">如下：</span></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-family:宋体, SimSun;color:#000000;font-size:12px;\">1. 打开京东首页，在右上方，点击“免费注册”按钮；</span> \r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://misc.360buyimg.com/help/misc/img/r1.png\" width=\"750\" /> \r\n</p>\r\n<p>\r\n	<span style=\"font-family:宋体, SimSun;color:#000000;font-size:12px;\">2. 进入到注册页面，请填写您的邮箱、手机等信息完成注册；</span> \r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://misc.360buyimg.com/help/misc/img/r2.png\" width=\"750\" /> \r\n</p>\r\n<p>\r\n	<span style=\"font-family:宋体, SimSun;color:#000000;font-size:12px;\">3. 注册成功后，请完成账户安全验证，来提高您的账户安全等级。</span> \r\n</p>\r\n<img alt=\"\" src=\"http://misc.360buyimg.com/help/misc/img/r3.png\" width=\"750\" />','','1','1',NULL,'1','','',NULL,NULL);");
E_D("replace into `yp_news` values('8','4','4e2b30ec5ac8b029b2a9adb2990bd716','1428685587','90','广告合作','','',NULL,NULL,NULL,'',NULL,'<p>\r\n	<img alt=\"\" src=\"http://img30.360buyimg.com/pophelp/g10/M00/13/11/rBEQWVFlHpYIAAAAAACI4qKbEu4AAD0VAKcRBMAAIj6957.jpg\" /> \r\n</p>','','1','1',NULL,'1','','',NULL,NULL);");
E_D("replace into `yp_news` values('11','1','6de196c8778de38c33f4bdb2f304229c','1428749041','0','7878787888',NULL,NULL,NULL,NULL,NULL,'20150411184354_14133.jpg',NULL,NULL,NULL,'1','1','0','1',NULL,NULL,'1429200000','1429977600');");
E_D("replace into `yp_news` values('14','6','0425a532fd93340ee6e995ca5f016da4','1428782388','0','广西南宁市东葛路31号东葛华都5楼513室',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'广西南宁市东葛路31号东葛华都5楼513室',NULL,'1','1',NULL,'1',NULL,NULL,NULL,NULL);");
E_D("replace into `yp_news` values('17','3','73affabf01c58f433815b69131fbf759','1428950763','100','活动介绍','','',NULL,NULL,NULL,'',NULL,'','','1','1',NULL,'1','','',NULL,NULL);");
E_D("replace into `yp_news` values('21','3','bf87509eb1f2c6459ffedca40c612b52','1429129788','80','审核标准','','',NULL,NULL,NULL,'',NULL,'','','1','1',NULL,'1','','',NULL,NULL);");
E_D("replace into `yp_news` values('22','3','bc1391964c3d085c1cfc19742b518c27','1429129884','90','关于收费','','',NULL,NULL,NULL,'',NULL,'','','1','1',NULL,'1','','',NULL,NULL);");
E_D("replace into `yp_news` values('23','3','bc2bd9a5e27e96597261f59bfc8505d2','1429130206','0','联系我们',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1',NULL,NULL,NULL,NULL);");
E_D("replace into `yp_news` values('24','1','8dd11b074ded741dc79bbd1ee672b61c','1429133965','0','5555',NULL,NULL,NULL,NULL,NULL,'20150416053920_36240.png',NULL,NULL,NULL,'1','1','0','1',NULL,NULL,'1429196464','');");
E_D("replace into `yp_news` values('25','1','f524fc99c281430c4b93081c61af304b','1429196159','0','广告','','','andy','25',NULL,'20150416225541_96033.jpg',NULL,'夜夜夜夜','','1','1',NULL,'1','','','1429200000','1429245780');");
E_D("replace into `yp_news` values('26','1','a8d058bdc14f53cbb063c8321fb9aa7e','1429202055','3','8899',NULL,NULL,'andy','25',NULL,'20150417003353_77326.png',NULL,'你是山东',NULL,'1','1',NULL,'1',NULL,NULL,'1429200000','1429245780');");
E_D("replace into `yp_news` values('27','1','55749b2236ae94eac154362b76a8d52b','1429202494','2','696969',NULL,NULL,'andy','25',NULL,'20150417004122_39226.png',NULL,'cghjgjfhg&nbsp;',NULL,'1','1',NULL,'1',NULL,NULL,'1429200000','1429245780');");
E_D("replace into `yp_news` values('28','1','245a5193d47a7c9b1634fa40eb2d69f2','1429203163','1','哥哥哥哥哥哥哥',NULL,NULL,'andy','24',NULL,'20150417005227_19522.png',NULL,'<img src=\"http://www.tctct.cn/updatefile/thumbs/20150410232004_24397.gif\" />',NULL,'1','1',NULL,'1',NULL,NULL,'1429200000','1429245780');");
E_D("replace into `yp_news` values('29','5','bc3cc8687262e8773110ea9231cf0e1a','1429204592','0','44612121',NULL,NULL,'andy','24',NULL,'20150417011626_48161.png',NULL,'的各色人&nbsp;',NULL,'1','1','0','1',NULL,NULL,NULL,NULL);");

@include("../../inc/footer.php");
?>