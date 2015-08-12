<?php
$hasroot=0;//表示在2级目录
if($hasroot){
define("KQ_URL","http://".$_SERVER['HTTP_HOST'].substr((str_replace("\\","/",dirname(dirname(__FILE__)))),strrpos(str_replace("\\","/",dirname(dirname(__FILE__))),"/"))."/");
}else{
define("KQ_URL","http://".$_SERVER['HTTP_HOST']."/");	
}
define("KQ_PATH", substr(str_replace("\\","/",dirname(__FILE__)),0,strrpos(str_replace("\\","/",dirname(__FILE__)),"/")+1));

//样式目录路径
$styledir=KQ_URL;

require_once(KQ_PATH."admin/class/class_config.inc.php");
require_once(KQ_PATH."fun/qzglobal.fun.inc.php");
require_once(KQ_PATH."inc/thumbs.class.php");
//网站配置信息
$get_config_array=get_first_date('config',"where kq_basename='kongqi'");
$kq_title=$get_config_array['kq_title'];
$kq_name=$get_config_array['kq_name'];
$kq_keyword=$get_config_array['kq_keyword'];
$kq_description=$get_config_array['kq_description'];
$kq_url=$get_config_array['kq_url'];
$kq_tel=$get_config_array['kq_tel'];
$kq_phone=$get_config_array['kq_phone'];
$kq_qq=$get_config_array['kq_qq'];
$kq_email=$get_config_array['kq_email'];
$kq_address=$get_config_array['kq_address'];
$kq_fax=$get_config_array['kq_fax'];
$kq_youbian=$get_config_array['kq_youbian'];
$kq_youlink=$get_config_array['kq_link'];
$kq_icp=$get_config_array['kq_icp'];//ICP
$kq_ip=explode(",",$get_config_array['kq_closedip']);//限制IP
$kq_close=$get_config_array['kq_closed'];//关闭
$kq_tongji=$get_config_array['kq_tongji'];//统计
$kq_wjt=$get_config_array['kq_rewrite'];
$kq_telname=$get_config_array['kq_telname'];
$kq_openconfig=$get_config_array['kq_openconfig'];
$kq_openconfig=json_decode($kq_openconfig,true);
$kq_number=$get_config_array['kq_number'];
//客户端信息
$customer_ip=$_SERVER['REMOTE_ADDR'];
$rand=rand(0,1);
$pagesub=5;
$pagesize=16;
$index='';

$ontime=time();
$wxthumbs=get_index($kq_openconfig['wx']);
$wxpic=($wxthumbs['kq_thumbs']);
$wxpic=json_decode($wxpic);
$navname='index';

?>
