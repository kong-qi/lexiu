<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `shop_type`;");
E_C("CREATE TABLE `shop_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(20) DEFAULT NULL,
  `parentid` int(10) unsigned DEFAULT '0',
  `levelid` int(4) unsigned DEFAULT '1',
  `sort` int(10) unsigned DEFAULT '0',
  `status` int(4) unsigned DEFAULT '1',
  `remark` varchar(255) DEFAULT NULL,
  `adminid` int(10) unsigned DEFAULT NULL,
  `isnav` int(4) unsigned DEFAULT '0',
  `isopen` int(4) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2780 DEFAULT CHARSET=latin1");
E_D("replace into `shop_type` values('1065','酒店','0','1','90','1','','5','1','1');");
E_D("replace into `shop_type` values('1354','多人房','1065','2','200','1','','5','0','1');");
E_D("replace into `shop_type` values('2758','配套设施','1065','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('1356','双人房','1065','2','120','1','','5','0','1');");
E_D("replace into `shop_type` values('1357','大床房','1065','2','20','1','','5','0','1');");
E_D("replace into `shop_type` values('2493','商务套间','1065','2','500','1',NULL,'5','0','1');");
E_D("replace into `shop_type` values('2636','办公','0','1','170','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2637','服务','0','1','800','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2638','汽车','0','1','200','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2639','教育','0','1','200','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2640','生活','0','1','140','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2641','食品','0','1','180','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2642','旅游','0','1','130','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2643','数码','0','1','200','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2644','装修','0','1','200','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2647','运动健身','2640','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2646','婚嫁','0','1','300','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2648','酒吧KTV','2640','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2709','二手车','2638','2','910','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2710','电动车','2638','2','920','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2651','咖啡茶馆','2640','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2711','饰品','2638','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2708','新车','2638','2','900','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2775','酒吧','0','1','500','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2655','足疗按摩','2640','2','1500','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2656','洗浴温泉','2640','2','1500','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2774','瑜伽','0','1','500','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2773','按摩','0','1','500','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2659','电影院','2640','2','900','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2712','配件','2638','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2661','火锅','2634','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2662','自助餐','2634','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2663','西餐','2634','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2664','中餐','2634','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2761','导游伴游','2642','2','100','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2769','车票机票','2642','2','900','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2763','旅游租车','2642','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2764','办签证','2642','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2765','旅游用品','2642','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2766','旅游礼品','2642','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2767','旅游培训','2642','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2768','景点门票','2642','2','800','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2770','其他','2642','2','3000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2759','配套设施','2634','2','2000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2760','旅游线路','2642','2','50','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2634','美食','0','1','80','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2635','服装','0','1','150','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2665','烧烤烤肉','2634','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2666','料理海鲜','2634','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2667','蛋糕甜品','2634','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2668','小吃快餐','2634','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2669','其他','2634','2','3000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2670','艺术培训','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2671','体育培训','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2672','语言培训','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2673','婴幼儿教育','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2674','留学移民','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2675','中小学同步','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2676','职业技能','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2677','设计培训','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2678','IT培训','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2679','学历教育','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2680','管理培训','2639','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2681','其他','2639','2','1200','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2682','医疗','2640','2','1600','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2683','体检保健','2640','2','1500','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2684','写真摄影','2640','2','1550','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2685','眼镜配饰','2635','2','1500','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2686','美体瘦身','2640','2','1500','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2687','美容护肤','2640','2','1500','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2688','美发护发','2640','2','1500','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2689','美甲','2640','2','1500','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2690','舞蹈/瑜伽','2640','2','1500','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2691','其他','2640','2','3000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2713','保养','2638','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2714','服务','2638','2','1090','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2715','租车','2638','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2716','考驾照','2638','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2717','车险','2638','2','3000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2718','手机','2643','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2719','平板','2643','2','1010','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2720','电脑','2643','2','1020','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2723','相机','2643','2','1040','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2725','路由器','2643','2','1080','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2726','机顶盒','2643','2','1070','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2727','取暖器','2643','2','1090','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2728','电池','2643','2','1100','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2729','电视','2643','2','1110','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2730','空调','2643','2','1120','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2731','冰箱','2643','2','1130','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2732','洗衣机','2643','2','1150','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2734','灶具','2643','2','1170','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2735','热水器','2643','2','1180','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2736','消毒柜','2643','2','1190','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2779','健康','0','1','600','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2738','小家电','2643','2','1230','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2778','摄影','0','1','500','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2777','健身','0','1','500','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2776','KTV','0','1','500','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2742','服务','2643','2','2000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2743','其他','2643','2','5000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2772','美容','0','1','500','1',NULL,'5','1','1');");
E_D("replace into `shop_type` values('2745','男装','2635','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2746','女装','2635','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2747','童装','2635','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2748','内衣','2635','2','1000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2749','女包','2635','2','1100','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2750','男包','2635','2','1100','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2751','功能箱包','2635','2','1100','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2752','男鞋','2635','2','1300','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2753','女鞋','2635','2','1300','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2754','运动鞋','2635','2','1300','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2771','其他','1065','2','3000','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2756','服装配饰','2635','2','1400','1',NULL,'5','0','0');");
E_D("replace into `shop_type` values('2757','其他','2635','2','2000','1',NULL,'5','0','0');");

@include("../../inc/footer.php");
?>