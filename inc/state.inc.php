<?php

if (!defined("KQ_WORK")){
	 exit("非法操作");
}
//是否站点关闭
if(close_web($kq_close)){
	echo close_web($kq_close);
	exit();
	};
//是否禁止IP
if(close_ip($customer_ip,$kq_ip)){
	echo close_ip($customer_ip,$kq_ip);
	exit();
	}

?>

