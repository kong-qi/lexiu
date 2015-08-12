<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `shop_tj`;");
E_C("CREATE TABLE `shop_tj` (
  `tongji` int(11) DEFAULT NULL,
  `id` int(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1");
E_D("replace into `shop_tj` values('589347','10086');");

@include("../../inc/footer.php");
?>