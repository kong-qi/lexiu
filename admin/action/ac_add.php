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
/*
传入类型
*/
if (isset($_POST['type'])){
	   $type=$_POST['type'];
	}else{
	    exit("非法操作");	
}
		
$passarray=array(
	md5("weijintai"),
	md5("index_add")
	);
//是否追加"//"
if(in_array($type, $passarray)){
	$data=$_POST;
}else{
	$data=add_slashes($_POST);
}
//为空的取消
foreach ($data as $key => $value) {
	if(is_array($value)){
		$data[$key]=$value;
	}else{
		if($value){
			$data[$key]=trim($value);
		}elseif($value=='' ){
			unset($data[$key]);
		}
	}
	
}
switch($type){
	/*管理员权限添加*/
	case md5("permission"):
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		$data['kq_group']=json_encode($data['kq_group']);
		unset($data['type']);
		unset($data['submit']);
		if ($conn->post_insert("".DB_EXT."admingroup",$data))
		{
			new Alert("添加成功","href","../index.php?name=permission_list");
		}else
		{
			new Alert("添加失败","back");
		}
	break;
	
	/*管理员添加*/
	case md5("admin_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		$data['kq_pwd']=sha1($data['kq_pwd']);
		$data['kq_uniqid ']=uniqidstr();
		unset($data['type']);
		unset($data['submit']);
		$sqladmin=$conn->selectall("".DB_EXT."admin","where kq_name='".$data['kq_name']."'");
		if ($conn->rows($sqladmin)){
			new Alert("添加失败,管理员已经存在","back");
			exit();
			}
		if ($conn->post_insert("".DB_EXT."admin",$data)){
			new Alert("添加成功","href","../index.php?name=admin_list");
		   }else{
			new Alert("添加失败","back");
			}
	break;
	/*留言添加*/	
	case md5("liuyan_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		unset($data['type']);
		unset($data['submit']);
		if($conn->post_insert("".DB_EXT."liuyan",$data)){
			new Alert("添加成功","href","../index.php?name=liuyan_list");
		}else{
			new Alert("添加失败","back");
		}
	break;
	/*反馈添加*/	
	case md5("fankui_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		unset($data['type']);
		unset($data['submit']);
		if($conn->post_insert("".DB_EXT."fankui",$data)){
			new Alert("添加成功","href","../index.php?name=fankui_list");
		}else{
			new Alert("添加失败","back");
		}
	break;
	/*友链添加*/	
	case md5("link_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		unset($data['type']);
		unset($data['submit']);
		if($conn->post_insert("".DB_EXT."youlink",$data)){
			new Alert("添加成功","href","../index.php?name=youlink_list");
		}else{
			new Alert("添加失败","back");
		}
	break;
	/*广告添加*/
		
	case md5("adv_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		unset($data['type']);
		unset($data['submit']);
		if($conn->post_insert("".DB_EXT."adv",$data)){
			new Alert("添加成功","href","../index.php?name=adv_list");
		}else{
			new Alert("添加失败","back");
		}
	break;
	//导航添加
	case md5("nav_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		unset($data['type']);
		unset($data['submit']);
		if($conn->post_insert("".DB_EXT."nav",$data)){
			new Alert("添加成功","href","../index.php?name=nav_list");
		}else{
			new Alert("添加失败","back");
		}
	break;
	/*订单添加*/	
	case md5("order_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		unset($data['type']);
		unset($data['submit']);
		print_r($data);
		if($conn->post_insert("".DB_EXT."order",$data)){
			new Alert("添加成功","href","../index.php?name=order_list");
		}else{
			new Alert("添加失败","back");
		}
	break;
	
	case md5("index_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		unset($data['type']);
		unset($data['submit']);
		
		if(isset($data['up_pic']))
		{
			$data['kq_thumbs']=json_encode($data['up_pic']);
			unset($data['up_pic']);
		}
		
		if ($conn->post_insert("".DB_EXT."index",$data)){
			new Alert("添加成功","href","../index.php?name=index_list");
		   }else{
			new Alert("添加失败","back");
			}
	break;
		
	/*栏目添加*/
	case md5("class_add"):
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		if($data['kq_islast']=="0")
		{
			$data['kq_model']="0";
		}//如果是非终极
		//判断目录已经创建
		if(isset($data['kq_url'])){
			if($data['kq_url']){
				$isdir=has_date('lanmu',"where kq_url='".$data['kq_url']."'");
				if($isdir){
					new Alert("目录存在，请更换名字","back");
					exit();
				}
			}
		}
		unset($data['type']);
		unset($data['submit']);
		if ($conn->post_insert("".DB_EXT."lanmu",$data)){
			//判断是否是单页，如果是插入数据
			new Alert("添加成功","href","../index.php?name=class_list");
		   }else{
			new Alert("添加失败","back");
			}
	break;
	//城市
	case md5("city_add"):

		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		unset($data['type']);
		unset($data['submit']);
		if ($conn->post_insert("".DB_EXT."city",$data)){
			//判断是否是单页，如果是插入数据
			new Alert("添加成功","href","../index.php?name=city_list");
		   }else{
			new Alert("添加失败","back");
			}
	break;
	/*招商添加*/	
	case md5("zhaos_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		unset($data['type']);
		unset($data['submit']);
		if ($conn->post_insert("".DB_EXT."zhaoshang",$data)){
			new Alert("添加成功","href","../index.php?name=zhaos_list");
		}else{
			new Alert("添加失败","back");
		}
	break;
	/*信息添加*/
	case md5("message_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
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
		unset($data['type']);
		unset($data['submit']);
		//
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
		}

		if(isset($data['city']))
		{
			
			foreach ($_POST['city'] as $key => $value) {
				$data['kq_uuid']=uuid();
				$data['kq_ctime']=time();
				$data['kq_city']=$value;
				unset($data['city']);
				if ($conn->post_insert("".DB_EXT."news",$data)){
					
				}else{
					new Alert("添加失败","back");
				}
			}
			new Alert("添加成功","href","../index.php?name=news&lmid=".$data['kq_lmid']);
		}else
		{
			if ($conn->post_insert("".DB_EXT."news",$data)){
				new Alert("添加成功","href","../index.php?name=news&lmid=".$data['kq_lmid']);
			}else{
				new Alert("添加失败","back");
			}
		}
		
		
		
		   
		
	break;
	
	
		
	/*单页添加*/
		
	case md5("danye_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		$lmid=$data['id'];
		unset($data['type']);
		unset($data['submit']);
		if($conn->post_insert("".DB_EXT."news",$data)){
			new Alert("添加成功","href","../index.php?name=danye&lmid=".$lmid);
		   }else{
			new Alert("添加失败","back");
			}
	break;
	/*会员添加*/
		
	case md5("user_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		$data['kq_uniqueid']=sha1(uuid());
		if(isset($data['kq_pwd'])){
			$data['kq_pwd']=sha1($data['kq_pwd']);
		}else{
			new Alert("密码不能为空","back");
			exit();
		}
		unset($data['type']);
		unset($data['submit']);
		if($conn->post_insert("".DB_EXT."user",$data)){
			new Alert("添加成功","href","../index.php?name=user_list");
		   }else{
			new Alert("添加失败","back");
			}
	break;
	/*获奖添加*/
		
	case md5("win_add"): 
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
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
		unset($data['type']);
		unset($data['submit']);
		if($conn->post_insert("".DB_EXT."winmsg",$data)){
			new Alert("添加成功","href","../index.php?name=win_list");
		   }else{
			new Alert("添加失败","back");
			}
	break;
		
	
		
}
?>