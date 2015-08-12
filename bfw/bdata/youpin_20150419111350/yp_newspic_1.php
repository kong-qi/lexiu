<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2008
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `yp_newspic`;");
E_C("CREATE TABLE `yp_newspic` (
  `npic_id` int(11) NOT NULL AUTO_INCREMENT,
  `npic_sort` int(11) DEFAULT NULL,
  `npic_picurl` text NOT NULL,
  `npic_newsid` int(11) NOT NULL,
  `uuid` varchar(120) NOT NULL,
  PRIMARY KEY (`npic_id`),
  KEY `npic_newsid` (`npic_newsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8");

@include("../../inc/footer.php");
?>