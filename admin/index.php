<?php
session_start();
define("KQ_WORK",true);
$stime=microtime(true); 
require_once("class/class_config.inc.php");
require_once(FUN_PATH."global.func.inc.php");
require_once(CLASS_PATH."class_alert.inc.php");
require_once(CLASS_PATH."class_page.inc.php");
islogin(@$_SESSION['uniqid']);//验证是否登录
if(isset($_GET['name'])){
	 	$name=$_GET['name'];
}else{
$name="";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理系统_空气工作室</title>
<?php require_once("inc/style.inc.php");?>
</head>
<body>
<div id="KQWrap">
<?php require_once("inc/header.inc.php");?>
<!-- KQHead 结束 -->
<?php require_once("inc/left.inc.php");?>
<!--KQLeft-->
 <div id="KQMain">
 <?php
 	switch($name){
	/*管理员权限------------------------------------------------*/
	case "permission_add": //权限
	include("inc/Permission_add.inc.php");
	break;
	case "permission_list":
	include("inc/Permission_list.inc.php");
	break;
	case "permission_update":
	include("inc/Permission_update.inc.php");
	break;
	/*管理员------------------------------------------------*/
	case "admin_list":
	include("inc/admin_list.inc.php");
	break;
	case "admin_add":
	include("inc/admin_add.inc.php");
	break;
	case "admin_update":
	include("inc/admin_update.inc.php");
	break;
	/*站点设置------------------------------------------------*/
	case "base":
	include("inc/base.inc.php");
	break;
	/*栏目分类-------------------------------------------------*/
	case "class_add":
	include("inc/class_add.inc.php");
	break;
    case "class_list":
	include("inc/class_list.inc.php");
	break;
	 case "class_update":
	include("inc/class_update.inc.php");
	break;
	/*城市分类-------------------------------------------------*/
	case "city_add":
	include("inc/city_add.inc.php");
	break;
    case "city_list":
	include("inc/city_list.inc.php");
	break;
	 case "city_update":
	include("inc/city_update.inc.php");
	break;
		/*信息中心-------------------------------------------------*/
    case "message_list":
	include("inc/message_list.inc.php");
	break;
	/*产品属性附加-------------------------------------------------*/
	case "pclattr_add":
	include("inc/pclattr_add.inc.php");
	break;
    case "pclattr":
	include("inc/pclattr_list.inc.php");
	break;
	 case "pclattr_update":
	include("inc/pclattr_update.inc.php");
	break;
	/*信息列表------------------------*/
	case "news_add":
	include("inc/message_add.inc.php");
	break;
    case "news":
	include("inc/news_list.inc.php");
	break;
	 case "news_update":
	include("inc/message_update.inc.php");
	break;
	 case "danye":
	include("inc/danpage.inc.php");
	break;
	/*图片列表------------------------*/
	case "pic":
	include("inc/pic_list.inc.php");
	break;
	case "pic_add":
	include("inc/pic_add.inc.php");
	break;
	case "pic_update":
	include("inc/pic_update.inc.php");
	break;
	/*伪静态------------------------*/
	case "weijintai":
	include("inc/weijintai.inc.php");
	break;
	/*广告图片------------------------*/
	case "adv_list":
	include("inc/adv_list.inc.php");
	break;
	case "adv_add":
	include("inc/adv_add.inc.php");
	break;
	case "adv_update":
	include("inc/adv_update.inc.php");
	break;
		/*友链------------------------*/
	case "youlink_list":
	include("inc/link_list.inc.php");
	break;
	case "youlink_add":
	include("inc/link_add.inc.php");
	break;
	case "youlink_update":
	include("inc/link_update.inc.php");
	break;
	/*招商------------------------*/
	case "zhaos_list":
	include("inc/zhaos_list.inc.php");
	break;
	case "zhaos_add":
	include("inc/zhaos_add.inc.php");
	break;
	case "zhaos_update":
	include("inc/zhaos_update.inc.php");
	break;
		/*留言------------------------*/
	case "liuyan_list":
	include("inc/liuyan_list.inc.php");
	break;
	case "liuyan_add":
	include("inc/liuyan_add.inc.php");
	break;
	case "liuyan_update":
	include("inc/liuyan_update.inc.php");
	break;
		/*反馈------------------------*/
	case "fankui_list":
	include("inc/fankui_list.inc.php");
	break;
	case "fankui_add":
	include("inc/fankui_add.inc.php");
	break;
	
	/*订单------------------------*/
	case "order_list":
	include("inc/order_list.inc.php");
	break;
	case "order_add":
	include("inc/order_add.inc.php");
	break;
	case "order_update":
	include("inc/order_update.inc.php");
	break;
	/*用户------------------------*/
	case "user_list":
	include("inc/user_list.inc.php");
	break;
	case "user_add":
	include("inc/user_add.inc.php");
	break;
	case "user_update":
	include("inc/user_update.inc.php");
	break;
		/*获奖------------------------*/
	case "win_list":
	include("inc/win_list.inc.php");
	break;
	case "win_add":
	include("inc/win_add.inc.php");
	break;
	case "win_update":
	include("inc/win_update.inc.php");
	break;
	/*模板------------------------*/
	case "moban":
	include("inc/moban_list.inc.php");
	break;
	case "moban_add":
	include("inc/moban_add.inc.php");
	break;
	case "moban_update":
	include("inc/moban_update.inc.php");
	break;
	//首页配置
	case "index_list":
	include("inc/index_list.inc.php");
	break;
	case "index_add":
	include("inc/index_add.inc.php");
	break;
	case "index_update":
	include("inc/index_update.inc.php");
	break;
	case "open":
	include("inc/openconfig.inc.php");
	break;
	case "nav_list":
	include("inc/nav_list.inc.php");
	break;
	case "nav_add":
	include("inc/nav_add.inc.php");
	break;
	case "nav_update":
	include("inc/nav_update.inc.php");
	break;
	default :
	include("inc/message_list.inc.php");
	break;
	}
 ?>
<?php require_once("inc/footer.inc.php");?>
