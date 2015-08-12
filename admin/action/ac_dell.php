<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
if(isset($_GET['type'])){
	$type=$_GET['type'];
}else{
	exit('no come');
}
require_once("../class/class_config.inc.php");
require_once(FUN_PATH."global.func.inc.php");
require_once(CLASS_PATH."class_alert.inc.php");
switch($type){
	/*管理权限单个删除*/
	case md5("permission_del"):
		if (!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
		};	
		if($conn->delete("".DB_EXT."admingroup","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
		}else{
			new Alert("删除失败","back");
		}
	break;
	/*管理权限批量删除*/
	case md5("permission_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."admingroup ","kq_uuid ='".$_POST['checkbox'][$i]."'")){
		
			}else{
				new Alert('批量删失败',"back");
				exit();	
			}
		}
		new Alert('批量删除成功',"back");
	break;
	/*首页调用单个删除*/
	case md5("index_del"):
		if (!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
		};	
		if($conn->delete("".DB_EXT."index","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
		}else{
			new Alert("删除失败","back");
		}
	break;
	/*首页调用批量删除*/
	case md5("index_delall")://批量删除
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."index","kq_uuid ='".$_POST['checkbox'][$i]."'")){
		
			}else{
				new Alert('批量删失败',"back");	
			exit();		
			}
		}
		new Alert('批量删除成功',"back");
	break;
	/*管理员单个删除*/
	case md5("admin_del"): 
			if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
			}else{
				$id=$_GET['id'];
			};	
			if($conn->delete("".DB_EXT."admin","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
			}else{
			new Alert("删除失败","back");
			}
	break;
	/*管理员批量删除*/
	case md5("admin_delall")://批量删除
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."admin","kq_uuid ='".$_POST['checkbox'][$i]."'")){
		
			}else{
				new Alert('批量删失败',"back");	
			exit();		
			}
		}
		new Alert('批量删除成功',"back");
	break;
	/*栏目单个删除*/
	case md5("class_del"):
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=trim($_GET['id']);
		}	
		//判断是否存在子类
		//取得自身ID
		$selftdata=@get_first_date("lanmu","where kq_uuid='".$id."'");
		if(has_subclass(@$selftdata['id'])=='ok'){
			new Alert('删除失败，存在子类',"back");
			exit();
		}else{
			if($conn->delete("".DB_EXT."lanmu","kq_uuid='".$id."'")){
				new Alert("删除成功","back");
				exit();
			}else{
				new Alert("删除失败","back");
				exit();
			}
		}	
	break;
	/*栏目单个删除*/
	case md5("city_del"):
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=trim($_GET['id']);
		}	
		//判断是否存在子类
		//取得自身ID
		$selftdata=get_first_date("city","where kq_uuid='".$id."'");
		
		if(has_subclass2(@$selftdata['id'])=='ok'){
			new Alert('删除失败，存在子类',"back");
			exit();
		}else{
			if($conn->delete("".DB_EXT."city","kq_uuid='".$id."'")){
				new Alert("删除成功","back");
				exit();
			}else{
				new Alert("删除失败","back");
				exit();
			}
		}	
	break;
	/*信息单个删除*/
	case md5("news_dell"): 
	
		if(!isset($_GET['id'])){
		new Alert("非法操作","back");
		exit();
		
		}else{
			$id=$_GET['id'];
			
			};	
     if($conn->delete("".DB_EXT."news","kq_uuid='".$id."'")){
	
		$conn->delete("".DB_EXT."newspic","kq_uuid='".$id."'");
	   new Alert("删除成功","back");
	   
	   
	   }else{
		   new Alert("删除失败","back");
		   }
	break;
	/*信息批量删除*/
	case md5("news_all"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			$conn->delete("".DB_EXT."newspic","kq_uuid='".$_POST['checkbox'][$i]."'");
			if($conn->delete("".DB_EXT."news","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量删失败',"back");
			exit();			
			
		}
		}
		new Alert('批量删除成功',"back");
	break;
	/*图片相册单个删除*/
	case md5("pic_dell"): 
		if(!isset($_GET['id'])){
		new Alert("非法操作","back");
		exit();
		}else{
		$id=$_GET['id'];
		};	
		if($conn->delete("".DB_EXT."newspic","npic_id='".$id."'")){
			new Alert("删除成功","back");
		}else{
		   new Alert("删除失败","back");
		}
	break;
	/*图片相册批量删除*/
	case md5("pic_all")://批量删除
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		if($conn->delete("".DB_EXT."newspic","npic_id ='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量删失败',"back");		
			exit();	
		}}
		new Alert('批量删除成功',"back");
	break;
	/*友链单个删除*/
	case md5("youlink_del"): 
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
			};	
		if($conn->delete("".DB_EXT."youlink","kq_uuid='".$id."'")){
	  		new Alert("删除成功","back");
		}else{
			new Alert("删除失败","back");
		}
	break;
	/*友链批量删除*/
	case md5("youlink_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
		if($conn->delete("".DB_EXT."youlink","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			
		}else{
			new Alert('批量删失败',"back");	
			exit();		
		}}
		new Alert('批量删除成功',"back");
	break;
	/*广告删除*/
	case md5("adv_del"): 
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
		};	
		if($conn->delete("".DB_EXT."adv","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
		}else{
		   new Alert("删除失败","back");
		}
	break;
	/*广告批量删除*/
	case md5("adv_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."adv","kq_uuid ='".$_POST['checkbox'][$i]."'")){
				
			}else{
		
				new Alert('批量删失败',"back");
				exit();			
			
			}
		}
		new Alert('批量删除成功',"back");
	break;
	/*导航删除*/
	case md5("nav_del"): 
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
		};	
		if($conn->delete("".DB_EXT."nav","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
		}else{
		   new Alert("删除失败","back");
		}
	break;
	/*导航批量删除*/
	case md5("nav_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."nav","kq_uuid ='".$_POST['checkbox'][$i]."'")){
				
			}else{
		
				new Alert('批量删失败',"back");
				exit();			
			
			}
		}
		new Alert('批量删除成功',"back");
	break;
	
	/*招商单个删除*/
	case md5("zhaos_del"): 
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		
		}else{
			$id=$_GET['id'];
		};	
		if($conn->delete("".DB_EXT."zhaoshang","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
	   
		}else{
			new Alert("删除失败","back");
		}
	break;
	/*招商批量删除*/
	case md5("zhaos_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."zhaoshang","kq_uuid ='".$_POST['checkbox'][$i]."'")){
				
			}else{
		
				new Alert('批量删失败',"back");
				exit();			
			}
		}
		new Alert('批量删除成功',"back");
	break;
	/*订单删除*/
	case md5("order_del"): 
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
			
		};	
     	if($conn->delete("".DB_EXT."order","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
		}else{
			new Alert("删除失败","back");
		}
	break;
	/*订单批量删除*/
	case md5("order_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."order","kq_uuid ='".$_POST['checkbox'][$i]."'")){
				
			}else{
		
				new Alert('批量删失败',"back");
				exit();			
		
			}
		}
		new Alert('批量删除成功',"back");
	break;
		/*留言批量删除*/
	case md5("liuyan_del"): 
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
		};	
     	if($conn->delete("".DB_EXT."liuyan","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
		}else{
			new Alert("删除失败","back");
		}
	break;
	
	/*留言批量删除*/
	case md5("liuyan_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."liuyan","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			}else{
				new Alert('批量删失败',"back");
				exit();			
		
			}
		}
		new Alert('批量删除成功',"back");
	break;
		/*反馈批量删除*/
	case md5("fankui_del"): 
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
		};	
     	if($conn->delete("".DB_EXT."fankui","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
		}else{
			new Alert("删除失败","back");
		}
	break;
	
	/*反馈批量删除*/
	case md5("fankui_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."fankui","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			}else{
				new Alert('批量删失败',"back");
				exit();			
		
			}
		}
		new Alert('批量删除成功',"back");
	break;
		/*会员批量删除*/
	case md5("user_del"): 
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
		};	
     	if($conn->delete("".DB_EXT."user","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
		}else{
			new Alert("删除失败","back");
		}
	break;
	
	/*会员批量删除*/
	case md5("user_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."user","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			}else{
				new Alert('批量删失败',"back");
				exit();			
		
			}
		}
		new Alert('批量删除成功',"back");
	break;
			/*获奖批量删除*/
	case md5("win_del"): 
		if(!isset($_GET['id'])){
			new Alert("非法操作","back");
			exit();
		}else{
			$id=$_GET['id'];
		};	
     	if($conn->delete("".DB_EXT."winmsg","kq_uuid='".$id."'")){
			new Alert("删除成功","back");
		}else{
			new Alert("删除失败","back");
		}
	break;
	
	/*获奖批量删除*/
	case md5("win_delall"):
		if(count(@$_POST['checkbox'])==0){
			new Alert('不能没有选择',"back");
			exit();
		}
		for($i=0;$i<count($_POST['checkbox']);$i++){
			if($conn->delete("".DB_EXT."winmsg","kq_uuid ='".$_POST['checkbox'][$i]."'")){
			}else{
				new Alert('批量删失败',"back");
				exit();			
		
			}
		}
		new Alert('批量删除成功',"back");
	break;
	
}//switch end
?>