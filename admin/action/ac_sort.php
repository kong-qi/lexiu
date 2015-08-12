<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/

require_once("../class/class_config.inc.php");

require_once(FUN_PATH."global.func.inc.php");
require_once(CLASS_PATH."class_alert.inc.php");


//传入类型

if(isset($_GET['type'])){
	$type=$_GET['type'];
	
	}else{
	exit("非法操作");	
		
	}
switch($type){
	/*管理员排序*/
	case md5("admin_srot"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		if($conn->update("".DB_EXT."admin","kq_sort='".$_POST['sort'][$i]."'","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量排序失败',"back");	
			exit();	
	}
	}
	new Alert('批量排序成功',"back");
	break;

	/*栏目排序*/
	case md5("class_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->update("".DB_EXT."lanmu","kq_sort='".$_POST['sort'][$i]."'","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量排序失败',"back");		
			exit();		
		}
		}
		new Alert('批量排序成功',"back");
	break;
	/*栏目排序*/
	case md5("city_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->update("".DB_EXT."city","kq_sort='".$_POST['sort'][$i]."'","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量排序失败',"back");		
			exit();		
		}
		}
		new Alert('批量排序成功',"back");
	break;
	
	
	/*信息排序*/
	case md5("news_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		if($conn->update("".DB_EXT."news","kq_sort='".$_POST['sort'][$i]."'","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量排序失败',"back");		
			exit();	
		}
		
		}
		new Alert('批量排序成功',"back");
	break;

	

//推荐到首页
	case md5("tindex"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."news","kq_index='1'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('推荐到首页失败',"back");	
			exit();		
		}
	}
	new Alert('推荐到首页成功',"back");
	break;

//推荐到首页NO
	case md5("notindex"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."news","kq_index='0'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('取消推荐到首页失败',"back");	
			exit();		
		}
	}
	new Alert('取消推荐到首页成功',"back");
	break;

	//推荐到首页
		case md5("tleft"):
			if(count(@$_POST['checkbox'])==0){
				new Alert('不能没有选择',"back");
				exit();
			}
			for($i=0;$i<count($_POST['checkbox']);$i++){
			
			if($conn->update("".DB_EXT."news","kq_index='2'","kq_uuid='".$_POST['checkbox'][$i]."'")){
				
			}else{
				new Alert('推荐到右侧广告失败',"back");	
				exit();		
			}
		}
		new Alert('推荐到右侧广告成功',"back");
		break;

	//推荐到首页NO
		case md5("notleft"):
			if(count(@$_POST['checkbox'])==0){
				new Alert('不能没有选择',"back");
				exit();
			}
			for($i=0;$i<count($_POST['checkbox']);$i++){
			
			if($conn->update("".DB_EXT."news","kq_index='0'","kq_uuid='".$_POST['checkbox'][$i]."'")){
				
			}else{
				new Alert('取消推荐到右侧广告失败',"back");	
				exit();		
			}
		}
		new Alert('取消推荐到右侧广告成功',"back");
		break;	


//显示信息
	case md5("showmsg"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."news","kq_checked='1'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('显示信息失败',"back");	
			exit();		
		}
	}
	new Alert('显示信息成功',"back");
	break;

//隐藏信息
	case md5("showmsg_no"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."news","kq_checked='0'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('取消显示信息失败',"back");	
			exit();		
		}
	}
	new Alert('取消显示信息成功',"back");
	break;	
//显示解决
	case md5("isok"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		$type=$_POST['isok'];
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."news","kq_isok='".$type."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('设置失败',"back");	
			exit();		
		}
	}
	new Alert('设置成功',"back");
	break;



	/*友链排序*/
	case md5("youlink_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
			if($conn->update("".DB_EXT."youlink","kq_sort='".$_POST['sort'][$i]."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
			}else{
				new Alert('批量排序失败',"back");	
				exit();		
			}
		}
		new Alert('批量排序成功',"back");
	break;
		
	//友链设置nofflow
	case md5("youlink_sort2"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
			if($conn->update("".DB_EXT."youlink","kq_follow='1'","kq_uuid='".$_POST['checkbox'][$i]."'")){
				
			}else{
				new Alert('设置nofflow失败',"back");		
				exit();	
			}
		}
		new Alert('设置nofflow成功',"back");
	break;
	
	//友链取消nofflow
	case md5("youlink_sort3"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."youlink","kq_follow='0'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('取消nofflow失败',"back");	
			exit();		
		}
	}
	new Alert('取消nofflow成功',"back");
	break;

	/*广告排序*/
	case md5("adv_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."adv","kq_sort='".$_POST['sort'][$i]."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量排序失败',"back");	
			exit();		
		}
	}
	new Alert('批量排序成功',"back");
	break;
	/*广告显示*/
	case md5("adv_sort_show"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."adv","kq_checked='1'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量排序显示失败',"back");	
			exit();		
		}
	}
	new Alert('批量排序显示成功',"back");
	break;
	/*广告排序*/
	case md5("adv_sort_hide"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."adv","kq_checked='0'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量排序隐藏失败',"back");	
			exit();		
		}
	}
	new Alert('批量排序隐藏成功',"back");
	break;
	/*导航排序*/
	case md5("nav_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."nav","kq_sort='".$_POST['sort'][$i]."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量排序失败',"back");	
			exit();		
		}
	}
	/*订单排序*/
	case md5("order_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."order","kq_sort='".$_POST['sort'][$i]."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量排序失败',"back");	
			exit();		
		}
	}
	new Alert('批量排序成功',"back");
	break;
	/*招商排序*/
	case md5("zhaos_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
			if($conn->update("".DB_EXT."zhaoshang","kq_sort='".$_POST['sort'][$i]."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
			}else{
			new Alert('批量排序失败',"back");		
			exit();	
			}
		}
		new Alert('批量排序成功',"back");
	break;
	/*首页调用排序*/
	case md5("index_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
			if($conn->update("".DB_EXT."index","kq_sort='".$_POST['sort'][$i]."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
			}else{
			new Alert('批量排序失败',"back");		
			exit();	
			}
		}
		new Alert('批量排序成功',"back");
	break;
	/*会员排序*/
	case md5("user_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
			if($conn->update("".DB_EXT."user","kq_sort='".$_POST['sort'][$i]."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
			}else{
			new Alert('批量排序失败',"back");		
			exit();	
			}
		}
		new Alert('批量排序成功',"back");
	break;
	//会员显示信息
	case md5("user_ok"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."user","kq_checked='1'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('显示失败',"back");	
			exit();		
		}
	}
	new Alert('显示成功',"back");
	break;

	//隐藏信息
	case md5("user_no"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."user","kq_checked='0'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('取消显示失败',"back");	
			exit();		
		}
	}
	new Alert('取消显示成功',"back");
	break;
	/*获奖排序*/
	case md5("win_sort"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
			if($conn->update("".DB_EXT."winmsg","kq_sort='".$_POST['sort'][$i]."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
			}else{
			new Alert('批量排序失败',"back");		
			exit();	
			}
		}
		new Alert('批量排序成功',"back");
	break;
	//获奖发出
	case md5("win_ok"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."winmsg","kq_checked='1'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('发奖失败',"back");	
			exit();		
		}
	}
	new Alert('发奖成功',"back");
	break;

	//获奖取消
	case md5("win_no"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."winmsg","kq_checked='0'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('取消发奖失败',"back");	
			exit();		
		}
	}
	new Alert('取消发奖成功',"back");
	break;
	//留言显示发出
	case md5("fankui_ok"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."fankui","kq_checked='1'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('显示失败',"back");	
			exit();		
		}
	}
	new Alert('显示成功',"back");
	break;

	//留言显示取消
	case md5("fankui_no"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."fankui","kq_checked='0'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('取消显示失败',"back");	
			exit();		
		}
	}
	new Alert('取消显示成功',"back");
	break;
	//留言显示发出
	case md5("liuyan_ok"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."liuyan","kq_checked='1'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('显示失败',"back");	
			exit();		
		}
	}
	new Alert('显示成功',"back");
	break;

	//留言显示取消
	case md5("liuyan_no"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		
		if($conn->update("".DB_EXT."liuyan","kq_checked='0'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('取消显示失败',"back");	
			exit();		
		}
	}
	new Alert('取消显示成功',"back");
	break;	
	//广告通一时间
	case md5("indextime"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		
		$stime=strtotime($_POST['kq_sttime']);
		$endtime=strtotime($_POST['kq_endtime']);
		for($i=0;$i<count($_POST['checkbox']);$i++){
		if($conn->update("".DB_EXT."news","kq_sttime='".$stime."',kq_endtime='".$endtime."'","kq_uuid='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('统一时间失败',"back");	
			exit();		
		}
	}
	new Alert('统一时间成功',"back");
	break;		
}//switch end
?>