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
if (isset($_POST['type'])){
	$type=$_POST['type'];
	
	}else{
		exit("非法操作");	
		
	}
		
$passarray=array(

	md5("wjt_update")
	);
//是否追加"//"
if(in_array($type, $passarray)){
	$data=$_POST;
}else{
	$data=add_slashes($_POST);
}

switch($type){
	/*----------------------权限修改--------------------------*/
	case md5("permission_update"): 
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		$data['kq_group']=json_encode($data['kq_group']);
		
		if($conn->post_update("".DB_EXT."admingroup",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=permission_list");
		}else{
			new Alert("更新失败","back");
		}
		
	
	break;
	
	/*管理员修改*/
	case md5("admin_update"): 
		if($data['kq_pwd']==""){
			unset($data['kq_pwd']);
		}else{
			$data['kq_pwd']=sha1($data['kq_pwd']);
		}
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		
		if($conn->post_update("".DB_EXT."admin",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=admin_list");
	    }else{
			new Alert("更新失败","back");
		}
		
		break;
	/*友链更新*/
	case md5("youlink_update"):
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		if($conn->post_update("".DB_EXT."youlink",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=youlink_list");
		}else{
			new Alert("更新失败","back");
		}
	break;
	/*广告更新*/
	case md5("adv_update"):
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		if($conn->post_update("".DB_EXT."adv",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=adv_list");
		}else{
			new Alert("更新失败","back");
		}
	break;
	case md5("nav_update"):
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		
		
		if($conn->post_update("".DB_EXT."nav",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=nav_list");
		}else{
			new Alert("更新失败","back");
		}
	break;
	
		
	/*基本修改*/
	case md5("base"): 
		unset($data['type']);
		unset($data['submit']);
		
		if($conn->post_update("".DB_EXT."config",$data,"kq_basename='kongqi'")){
			new Alert("更新成功","href","../index.php?name=base");
		}else{
			new Alert("更新失败","back");
		}
	break;
	//订单修改
	case md5("order_update"):
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		if($conn->post_update("".DB_EXT."order",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=order_list");
		}else{
			new Alert("更新失败","back");
		}
	break;
	//栏目更新
	case md5("class_update"): 
		if($data['kq_islast']=="0"){
			@$data['kq_model']=0;	
		}
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		if(isset($data['kq_url'])){
			if($data['kq_url'])
			{
				$isdir=has_date('lanmu',"where kq_url='".$data['kq_url']."' and kq_uuid !='".$_POST['id']."'");
				if($isdir){
					new Alert("目录存在，请更换名字","back");
					exit();
				}
			}
		}
		//获取自己信息
		$seldata=get_first_date('lanmu',"where kq_uuid='".$_POST['id']."'");
		if($seldata['id']==$data['kq_fid']){
			new Alert("不能自己是自己的分类","back");
			exit();
		}

		if($conn->post_update("".DB_EXT."lanmu",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=class_list");
	  	}else{
			new Alert("更新失败","back");
		}
		
	break;
	//城市更新
	case md5("city_update"): 
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		if(isset($data['kq_title'])){
			if($data['kq_title'])
			{
				$isdir=has_date('city',"where kq_title='".$data['kq_title']."' and kq_uuid !='".$_POST['id']."'");
				if($isdir){
					new Alert("城市已经存在，请更换名字","back");
					exit();
				}
			}
		}
		if($conn->post_update("".DB_EXT."city",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=city_list");
	  	}else{
			new Alert("更新失败","back");
		}
		
	break;
	/*招商更新*/	
	case md5("zhaos_update"): 
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		if($conn->post_update("".DB_EXT."zhaoshang",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=zhaos_list");
	   }else{
			new Alert("更新失败","back");
		}
	break;
	/*首页调用更新*/	
	case md5("index_update"): 
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		if(isset($data['up_pic'])){
			$data['kq_thumbs']=json_encode($data['up_pic']);
			unset($data['up_pic']);
		}else
		{
			$data['kq_thumbs']='';	
		}
		if($conn->post_update("".DB_EXT."index",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=index_list");
	   }else{
			new Alert("更新失败","back");
		}
	break;
	
	/*信息修*/
	case md5("news_update"): 
		
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		if(isset($data['up_pic']))
		{
			$data['kq_thumbs']=json_encode($data['up_pic']);
			unset($data['up_pic']);
		}
		if(isset($data['kq_sttime'])){
			$data['kq_sttime']=strtotime($data['kq_sttime']);
		}
		if(isset($data['kq_endtime'])){
			$data['kq_endtime']=strtotime($data['kq_endtime']);
		}
		
		if(isset($data['zhanzupic']))
		{

			foreach ($data['zhanzupic'] as $key => $value) {
				$title='';
				$url='';
				if(isset($data['url']))
				{
					$url=urlencode($data['url'][$key]);
				}
				$data2[]=array(
					'path'=>$value,
					'title'=>$title,
					'url'=>$url
					);
				
			}
			$data['kq_zhanzupic']=json_encode($data2);
			unset($data['zhanzupic']);
			unset($data['url']);
		}else
		{
			$data['kq_zhanzupic']='';
		}

		$lmid=$data['kq_lmid'];
		unset($data['kq_lmid']);//避免更改栏目
		
		if($conn->post_update("".DB_EXT."news",$data,"kq_uuid='".$_POST['id']."'")){
	   		new Alert("更新成功","href","../index.php?name=news&lmid=".$lmid);
	    }else{
		   	new Alert("更新失败","back");
		}
	break;
	
	/*单页添加*/
	case md5("danye_update"):
		unset($data['type']);
		unset($data['id']);
		unset($data['submit']);
		$lmid=$data['kq_lmid'];
		unset($data['kq_lmid']);//避免更改栏目
		if($conn->post_update("".DB_EXT."news",$data,"kq_lmid='".$_POST['id']."'")){
		   	new Alert("更新成功","href","../index.php?name=danye&lmid=".$lmid);
		}else{
			new Alert("更新失败","back");
		}
	break;
	
	/*图片相册更新*/
	case md5("pic_update"): 
		if($conn->post_update("".DB_EXT."newspic",$data2,"npic_id='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=pic&id=".$data2['npic_newsid']);
		}else{
			new Alert("更新失败","back");
		}
	break;
	
	/*伪静态更新*/
	case md5("wjt_update"): 
		$php_url = str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/";
		$htaccess=$php_url."../../".".htaccess";
		$fp=fopen($htaccess,"wb");
		fwrite($fp,$data['weijintai']);
		fclose($fp);
		new Alert("更新成功","href","../index.php?name=weijintai");
	break;
	
	
	
	
		
	
	/*留言更新*/
	case md5("liuyan_update"): //留言
       // $data2['ly_relytime']=time();
       	unset($data['type']);
       	unset($data['id']);
       	unset($data['submit']);
       	$id=$_POST['id'];
       
		if($conn->post_update("".DB_EXT."liuyan",$data,"kq_uuid='".$id."'")){
			new Alert("更新成功","href","../index.php?name=liuyan_list");
	   }else{
		   new Alert("更新失败","back");
		}
	break;

	/*会员更新*/
	case md5("user_update"): //留言
        unset($data['type']);
        unset($data['id']);
        unset($data['submit']);
        
        
        if(isset($data['kq_pwd'])){
        	$data['kq_pwd']=sha1($data['kq_pwd']);
        }
		if($conn->post_update("".DB_EXT."user",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=user_list");
	    }else{
		   new Alert("更新失败","back");
		}
	break;
	/*获奖更新*/
	case md5("win_update"): 
        unset($data['type']);
        unset($data['id']);
        unset($data['submit']);
        if(isset($data['kq_username']))
        {
        	
        	$username='';
        	foreach ($data['kq_username'] as $key => $value) {
        		$username.=$value.",";
        	}
        	$data['kq_username']=substr($username,0,-1);

        }
        if(isset($data['kq_userid']))
        {
        	$data['kq_userid']=json_encode($data['kq_userid']);
        }
        
        
		if($conn->post_update("".DB_EXT."winmsg",$data,"kq_uuid='".$_POST['id']."'")){
			new Alert("更新成功","href","../index.php?name=win_list");
	    }else{
		   new Alert("更新失败","back");
		}
	break;

	
	


	
	
}//switch end
	
?>