<?php
require("base.inc.php");
require("class_alert.inc.php");
$data=$_POST;
unset($data['submit']);
$data['zs_ctime']=time();
$data['uuid']=uuid();

if ($conn->post_insert("".DB_EXT."zhaoshang",$data)){
new Alert("恭喜您！产品订购成功","back","");
}else{
	new Alert("非常抱歉，产品订购失败","back");
}

?>