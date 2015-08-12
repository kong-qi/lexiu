<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_file`;");
E_C("CREATE TABLE `yp_file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_type` tinyint(4) DEFAULT '1',
  `kq_url` text,
  `kq_aburl` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8");
E_D("replace into `yp_file` values('1','38b153c2a07d14c5cbad67fa8bdd845e','20150409','0','QQ图片20141203001157.jpg','1','20150409233746_77604.jpg','D:/server/youpin/updatefile//thumbs/20150409233746_77604.jpg');");
E_D("replace into `yp_file` values('2','bf22518822e66e5ca7b468fa8fc523fb','20150410','0','dd.png','1','20150410215837_10774.png','D:/server/youpin/updatefile//thumbs/20150410215837_10774.png');");
E_D("replace into `yp_file` values('3','1523cc51b075883633a39b4cd727a243','20150410','0','pic1.jpg','1','20150410221351_54181.jpg','D:/server/youpin/updatefile//thumbs/20150410221351_54181.jpg');");
E_D("replace into `yp_file` values('4','e19afc0cb8e1418e987de4a7757add02','20150410','0','pic1.jpg','1','20150410230811_57845.jpg','D:/server/youpin/updatefile//thumbs/20150410230811_57845.jpg');");
E_D("replace into `yp_file` values('5','31c3008587688fb593abcf9f5a5fe1eb','20150410','0','pci2.jpg','1','20150410231106_48757.jpg','D:/server/youpin/updatefile//thumbs/20150410231106_48757.jpg');");
E_D("replace into `yp_file` values('6','393937093590b1d252fe28e2407c3110','20150410','0','pci2.jpg','1','20150410231738_56892.jpg','D:/server/youpin/updatefile//thumbs/20150410231738_56892.jpg');");
E_D("replace into `yp_file` values('7','5615b27cba13d76f510c959a8db00e16','20150410','0','pic1.jpg','1','20150410231752_62745.jpg','D:/server/youpin/updatefile//thumbs/20150410231752_62745.jpg');");
E_D("replace into `yp_file` values('8','820594c16b95e46e5b54738bfa8c8df3','20150410','0','空气工作室宣传.jpg','1','20150410231809_33694.jpg','D:/server/youpin/updatefile//thumbs/20150410231809_33694.jpg');");
E_D("replace into `yp_file` values('9','60234a9aad8b392fb871b879c57fb157','20150410','0','dd.png','1','20150410231826_88348.png','D:/server/youpin/updatefile//thumbs/20150410231826_88348.png');");
E_D("replace into `yp_file` values('10','e00a4d589e00ca01e60ee38e2c63450a','20150410','0','1.gif','1','20150410232004_24397.gif','D:/server/youpin/updatefile//thumbs/20150410232004_24397.gif');");
E_D("replace into `yp_file` values('11','278e7a36ea20ae12554c5cbb6d37b0dd','20150410','0','qr.png','1','20150410234105_93232.png','D:/server/youpin/updatefile//thumbs/20150410234105_93232.png');");
E_D("replace into `yp_file` values('12','868d26dd52dc8dfa2abf7c7461a963ff','20150410','0','dd.gif','1','20150410234328_63319.gif','D:/server/youpin/updatefile//thumbs/20150410234328_63319.gif');");
E_D("replace into `yp_file` values('13','ff4077f364442a604d6eba9b18e8320a','20150410','0','dd.png','1','20150410234514_29135.png','D:/server/youpin/updatefile//thumbs/20150410234514_29135.png');");
E_D("replace into `yp_file` values('14','0586132ce7008b1418e35914850ac4c2','20150411','0','adv.jpg','1','20150411000213_59243.jpg','D:/server/youpin/updatefile//thumbs/20150411000213_59243.jpg');");
E_D("replace into `yp_file` values('15','405de65e9bfc776ae191dd74579fdbf9','20150411','0','adv.jpg','1','20150411004034_80208.jpg','D:/server/youpin/updatefile//thumbs/20150411004034_80208.jpg');");
E_D("replace into `yp_file` values('16','a08fad648fc6e0fc459139a89d14d9fc','20150411','0','guize.png','1','20150411004101_45087.png','D:/server/youpin/updatefile//thumbs/20150411004101_45087.png');");
E_D("replace into `yp_file` values('17','a8eba53ee5ff04f1dcdccadebe7b2512','20150411','0','dd.png','1','20150411035205_65011.png','D:/server/youpin/updatefile//thumbs/20150411035205_65011.png');");
E_D("replace into `yp_file` values('18','e3679d81c41a581f4bdf8859ff149189','20150411','0','index_05.jpg','1','20150411184354_14133.jpg','D:/server/youpin/updatefile//thumbs/20150411184354_14133.jpg');");
E_D("replace into `yp_file` values('19','8e8db77f5838ac400a863ead3c74abc1','20150413','0','IMG_20150411_162012.jpg','1','20150413105451_34927.jpg','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150413105451_34927.jpg');");
E_D("replace into `yp_file` values('20','ff18237804a3de09c987e77dcfc1722f','20150413','0','IMG_20150411_162012.jpg','1','20150413105519_47001.jpg','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150413105519_47001.jpg');");
E_D("replace into `yp_file` values('21','b98805f6caf6e439ac170f3965fb8176','20150413','0','9 001.jpg','1','20150413105613_51907.jpg','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150413105613_51907.jpg');");
E_D("replace into `yp_file` values('22','a64ff4f21b925746717598ffe432ccb4','20150413','0','pci2.jpg','1','20150413121740_56933.jpg','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150413121740_56933.jpg');");
E_D("replace into `yp_file` values('23','c14674f8dbd86bb356e24090e947c521','20150416','0','1.png','1','20150416053920_36240.png','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150416053920_36240.png');");
E_D("replace into `yp_file` values('24','122b6fca2864953d5e840155c5dab42a','20150416','0','2.jpg','1','20150416061702_51712.jpg','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150416061702_51712.jpg');");
E_D("replace into `yp_file` values('25','b0efea59714e1af885fa3e3abc7c1c44','20150416','0','b0a2521c0659708c73aaafcbc2c4cdc2918cd549.jpg','1','20150416225541_96033.jpg','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150416225541_96033.jpg');");
E_D("replace into `yp_file` values('26','f0707dc45495a99a914845376b63439d','20150417','0','1.png','1','20150417003353_77326.png','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150417003353_77326.png');");
E_D("replace into `yp_file` values('27','6e998945b7c9271713d478d669467e51','20150417','0','3.png','1','20150417004122_39226.png','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150417004122_39226.png');");
E_D("replace into `yp_file` values('28','90abb01058c5297a8030f0c69c78861d','20150417','0','4.png','1','20150417005227_19522.png','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150417005227_19522.png');");
E_D("replace into `yp_file` values('29','ff9a47f6839ae5482135253bcd1dc572','20150417','0','4.png','1','20150417011626_48161.png','D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150417011626_48161.png');");

@include("../../inc/footer.php");
?>