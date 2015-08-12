<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `shop_ads`;");
E_C("CREATE TABLE `shop_ads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `typeB` int(4) NOT NULL DEFAULT '0',
  `location` text NOT NULL,
  `tourl` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `validtime` date NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0',
  `hits` int(10) NOT NULL DEFAULT '0',
  `adminid` int(10) NOT NULL,
  `addtime` datetime NOT NULL,
  `addip` varchar(50) NOT NULL,
  `updatetime` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `picpath` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1");
E_D("replace into `shop_ads` values('10','通栏图片广告','2','wholebottom','http://web.gxsky.com/JCK/2013goodsound/Default.aspx','','2015-08-08','0','0','5','2013-08-30 11:08:16','127.0.0.1','2013-11-19 17:11:38','0','/upload/20131119175132.gif');");
E_D("replace into `shop_ads` values('23','特价机票','1','indexbmfw','http://flight.qunar.com/?ex_track=auto_4ec1d9cf','','2016-10-25','0','0','5','2013-09-25 20:09:52','222.84.65.97','2013-09-28 17:09:32','1','');");
E_D("replace into `shop_ads` values('24','在线翻译','1','indexbmfw','http://123.sogou.com/tools/fanyi.html','','2016-10-25','0','0','5','2013-09-25 20:09:37','222.84.65.97','2013-09-28 17:09:44','1','');");
E_D("replace into `shop_ads` values('25','快递查询','1','indexbmfw','http://123.sogou.com/tools/kuaidi.html','','2016-09-25','0','0','5','2013-09-25 20:09:20','222.84.65.97','2013-09-28 17:09:20','1','');");
E_D("replace into `shop_ads` values('26','列车时刻','1','indexbmfw','http://123.sogou.com/tools/lieche.html','','2016-09-25','0','0','5','2013-09-25 20:09:52','222.84.65.97','2013-09-28 17:09:26','1','');");
E_D("replace into `shop_ads` values('27','彩票开奖 ','1','indexbmfw','http://123.sogou.com/shwz/caipiao.html','','2016-09-25','0','0','5','2013-09-25 20:09:26','222.84.65.97','2013-09-28 17:09:31','1','');");
E_D("replace into `shop_ads` values('28','热门电影','1','indexbmfw','http://kan.sogou.com/dianshiju/','','2016-09-23','0','0','5','2013-09-25 20:09:50','222.84.65.97','2013-09-28 17:09:37','1','');");
E_D("replace into `shop_ads` values('29','查身份证','1','indexbmfw','http://dt.id5.cn/desktop/index.jsp?icpcode=bhc26','','2016-09-25','0','0','5','2013-09-25 20:09:21','222.84.65.97','2013-09-28 17:09:01','1','');");
E_D("replace into `shop_ads` values('30','违章查询','1','indexbmfw','http://auto.sohu.com/s2004/weizhangchaxun.shtml?pvid=6f73ad8ce3f28deb','','2016-09-25','0','0','5','2013-09-25 20:09:25','222.84.65.97','2013-09-28 17:09:41','1','');");
E_D("replace into `shop_ads` values('31','在线地图','1','indexbmfw','http://map.sogou.com/','','2016-09-25','0','0','5','2013-09-25 20:09:01','222.84.65.97','2013-09-28 17:09:23','1','');");
E_D("replace into `shop_ads` values('32','每日笑话','1','indexbmfw','http://123.sogou.com/yule/xiaohua.html','','2016-09-25','0','0','5','2013-09-25 20:09:39','222.84.65.97','2013-09-28 17:09:01','1','');");
E_D("replace into `shop_ads` values('33','航班查询','1','indexbmfw','http://flight.qunar.com/?ex_track=auto_4ec1d9cf','','2016-09-24','10','0','5','2013-09-28 17:09:26','116.253.219.183','2013-09-28 17:09:40','1','');");
E_D("replace into `shop_ads` values('34','在线音乐','1','indexbmfw','http://123.sogou.com/ting/','','2016-09-14','20','0','5','2013-09-28 17:09:04','116.253.219.183','2013-09-28 17:09:54','1','');");
E_D("replace into `shop_ads` values('37','南宁嘉和城温泉谷门票只需98元','2','indexpic2','http://www.tctct.cn/product/show.php?byid=69','','2014-11-27','0','0','5','2013-11-17 00:11:36','116.253.219.166','2013-11-17 00:11:15','1','/upload/20131117005650.jpg');");
E_D("replace into `shop_ads` values('42','南宁出租比亚迪F0 蓝色99元（一天）','2','indexpic0','','','2015-11-19','2','0','5','2013-11-19 16:11:44','116.253.219.166','2014-04-01 23:04:11','1','/upload/20131119162156.jpg');");
E_D("replace into `shop_ads` values('43','桂林乐满地游6折大促销（南宁）','2','indexpic0','','','2015-11-12','0','0','5','2013-11-19 17:11:29','116.253.219.166','2014-04-01 23:04:33','1','/upload/20131119175516.jpg');");
E_D("replace into `shop_ads` values('93','百度','1','indexlink','http://www.baidu.com/','','2015-10-10','20','0','5','2014-07-26 23:07:23','106.38.204.193','2014-07-26 23:07:50','1','');");
E_D("replace into `shop_ads` values('94','凤凰资讯','1','indexlink','http://news.ifeng.com/','','2015-08-08','15','0','5','2014-07-26 23:07:41','106.38.204.193','2014-07-26 23:07:37','1','');");
E_D("replace into `shop_ads` values('45','漓江精华、阳朔风光一日游69元','1','indexurl0','http://www.lashou.com/travel/deal/7433980.html','','2014-11-13','2','0','5','2013-11-19 20:11:24','116.253.219.166','2014-04-01 23:04:19','1','');");
E_D("replace into `shop_ads` values('46','升空气球、拱门租赁（北京）','2','indexpic3','http://bj.58.com/zulin/13383124532106x.shtml','','2014-11-29','10','0','5','2013-11-19 20:11:05','116.253.219.166','2013-11-19 20:11:23','1','/upload/20131119203640.jpg');");
E_D("replace into `shop_ads` values('49','三亚稻草人旅舍（80元）','2','indexpic1','http://kezhan.trip.taobao.com/hotel_detail.htm?spm=181.3064057.6859549.57.Pol1Jy&hid=2430&city=460200&checkIn=2013-11-22&checkOut=2013-11-23&quick=0&isquickbuy=4','','2014-11-07','10','0','5','2013-11-19 20:11:25','116.253.219.166','2013-11-19 20:11:25','1','/upload/20131119205508.jpg');");
E_D("replace into `shop_ads` values('51','青年旅舍','2','indexflash','http://trip.taobao.com/go/act/sale/qingnianls.php?spm=181.2209405.0.0.NBaXgF&ad_id=&am_id=1301047915399e6ebfd1&cm_id=&pm_id=','','2014-11-22','6','0','5','2013-11-19 21:11:15','116.253.219.166','2013-11-19 21:11:15','1','/upload/20131119210246.jpg');");
E_D("replace into `shop_ads` values('57','南宁景点门票','1','indexurl0','http://www.tctct.cn/product/?oid=1063','','2014-11-22','1','0','5','2013-11-19 23:11:29','116.253.219.166','2013-11-19 23:11:57','1','');");
E_D("replace into `shop_ads` values('58','南宁酒店','1','indexurl0','http://www.tctct.cn/product/?oid=1065','','2014-11-15','2','0','5','2013-11-19 23:11:50','116.253.219.166','2013-11-19 23:11:50','1','');");
E_D("replace into `shop_ads` values('69','求职青年之家单人床位20元/晚','1','indexurl0','http://www.tctct.cn/product/show.php?byid=79','','2014-11-27','5','0','5','2013-11-21 11:11:06','116.253.219.166','2014-04-01 23:04:58','1','');");
E_D("replace into `shop_ads` values('73','丽江黎明景区诺玛底青年旅馆20元/晚','2','indexpic0','','','2015-11-20','2','0','5','2013-11-21 12:11:26','116.253.219.166','2014-04-01 23:04:59','1','/upload/20131121120859.jpg');");
E_D("replace into `shop_ads` values('95','唯品会','1','indexlink','http://www.vip.com/?utm_source=sogoudh&utm_medium=textlink&utm_term=20140522&utm_content=&utm_campaign=sc','','2015-08-01','10','0','5','2014-07-26 23:07:48','106.38.204.193','2014-07-26 23:07:48','1','');");
E_D("replace into `shop_ads` values('96','人人网','1','indexlink','http://www.renren.com/','','2015-08-08','5','0','5','2014-07-26 23:07:46','106.38.204.193','2014-07-26 23:07:46','1','');");
E_D("replace into `shop_ads` values('97','淘宝网','1','indexlink','http://www.taobao.com/','','2015-08-01','0','0','5','2014-07-26 23:07:22','106.38.204.193','2014-07-26 23:07:22','1','');");
E_D("replace into `shop_ads` values('98','腾讯','1','indexlink','http://www.qq.com/','','2015-08-08','3','0','5','2014-07-26 23:07:53','106.38.204.193','2014-07-26 23:07:53','1','');");
E_D("replace into `shop_ads` values('99','恒好旅游用品加盟','2','indexpartner','http://item.3158.cn/132004/','','2015-08-08','50','0','5','2014-07-26 23:07:34','106.38.204.193','2014-07-26 23:07:34','1','/upload/20140726231908.jpg');");
E_D("replace into `shop_ads` values('100','飞游天下加盟','2','indexpartner','http://www.3158.cn/corpname/feiyoutx/','','2015-08-08','2','0','5','2014-07-26 23:07:27','106.38.204.193','2014-07-26 23:07:27','1','/upload/20140726232215.jpg');");
E_D("replace into `shop_ads` values('103','爽珍绿色食品','1','indexpartner','http://item.3158.cn/25875/','','2015-08-01','0','0','5','2014-07-26 23:07:48','106.38.204.193','2014-07-26 23:07:48','1','/upload/20140726233232.jpg');");
E_D("replace into `shop_ads` values('82','高端礼品 全国招商','1','indexpartner','http://www.23.cn/web/zazhps/index.htm?id=133620&sid=107679','','2014-11-13','6','0','5','2013-11-21 15:11:29','116.253.219.166','2013-11-21 15:11:29','1','/upload/20131121151505.jpg');");
E_D("replace into `shop_ads` values('102','丹索户外帽','2','indexpartner','http://item.3158.cn/16541/','','2015-08-08','0','0','5','2014-07-26 23:07:27','106.38.204.193','2014-07-26 23:07:27','1','/upload/20140726232818.jpg');");
E_D("replace into `shop_ads` values('101','9居连锁酒店加盟','2','indexpartner','http://item.3158.cn/159890/','','2015-08-01','6','0','5','2014-07-26 23:07:21','106.38.204.193','2014-07-26 23:07:21','1','/upload/20140726232500.jpg');");
E_D("replace into `shop_ads` values('91','锦江之星宾馆，特价167元！','2','indexpic0','http://tctct.cn/product/71.html','','2015-04-23','0','0','5','2014-04-01 23:04:29','58.59.208.128','2014-04-01 23:04:37','1','/upload/20140401233437.jpg');");
E_D("replace into `shop_ads` values('92','五星床品大床房80元（南宁）','2','indexpic0','http://tctct.cn/product/85.html','','2015-05-09','10','0','5','2014-04-01 23:04:12','58.59.208.128','2014-04-01 23:04:17','1','/upload/20140401233831.jpg');");

@include("../../inc/footer.php");
?>