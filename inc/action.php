<?php
session_start();
require("base.inc.php");

$data=$_POST;
$data=guolv(add_slashes($data));
switch ($data['action']) {
	case 'user_up':
		unset($data['action']);
		if($conn->post_update("".DB_EXT."user",$data,"kq_uniqueid='".$_COOKIE['uid']."'")){
			echo 'ok';
	    }else{
		    echo '';
		}
		break;
	case 'ly_add':
		is_login(@$_COOKIE['uid'],0);
		$data['kq_uuid']=uuid();
		$data['kq_ctime']=time();
		$data['kq_ip']=$_SERVER["REMOTE_ADDR"];
		unset($data['action']);
		if($conn->post_insert("".DB_EXT."fankui",$data)){
			echo 'ok';
	    }else{
		    echo '';
		}
		break;
	case md5('user_add'):
		if($data['chkfrom']==@$_SESSION['add_input']){
			$user=is_login(@$_COOKIE['uid']);
			unset($data['submit']);
			unset($data['chkfrom']);
			unset($data['action']);
			$data['kq_ctime']=time();
			$data['kq_uuid']=uuid();
			$data['kq_author']=$user['kq_name'];
			$data['kq_userid']=$user['id'];
			$data['kq_checked']=0;
			$data['kq_sttime']=time();
			$data['kq_endtime']=time()+24*60*60*30;
			if(isset($data['up_pic']))
			{
				$data['kq_thumbs']=json_encode($data['up_pic']);
				unset($data['up_pic']);
			}
			
			if($conn->post_insert("".DB_EXT."news",$data)){
				echo '<script>alert("发布项目成功");window.location.href="../user-list.html";</script>';
				
			}else{
				echo '<script>alert("添加项目失败"):history.back();</script>';
			}
		}else{
			echo '<script>alert("非法操作"):history.back();</script>';
			exit();
		}
		
		break;
	case md5('user_update'):
		if($data['chkfrom']==@$_SESSION['add_input']){
			$user=is_login(@$_COOKIE['uid']);
			unset($data['submit']);
			unset($data['chkfrom']);
			unset($data['action']);
			$data['kq_checked']=0;
			if(isset($data['up_pic']))
			{
				$data['kq_thumbs']=json_encode($data['up_pic']);
				unset($data['up_pic']);
			}
			if($conn->post_update("".DB_EXT."news",$data,"kq_uuid='".$data['kq_uuid']."'")){
				echo '<script>alert("修改项目成功");window.location.href="../user-list.html";</script>';
				
			}else{
				echo '<script>alert("修改项目失败"):history.back();</script>';
			}
		}else{
			echo '<script>alert("非法操作"):history.back();</script>';
			exit();
		}
		
		break;
	case 'liuyan_add':
			$user=is_login(@$_COOKIE['uid']);
			$data['kq_uuid']=uuid();
			$data['kq_ctime']=time();
			$data['kq_ip']=$_SERVER["REMOTE_ADDR"];

			unset($data['action']);
			$data2=array();
			if($data['kq_content'])
			{

				$data2['status']=3;
				$data2['msg']="留言内容不能为空";	
			}
			//判断是否已经评论过
			$hasuser=has_date("liuyan","where kq_newsid='".$data['kq_newsid']."' and kq_userid='".$user['id']."'");
			//获取当前
			$liuyan=get_first_date("liuyan","where kq_newsid='".$data['kq_newsid']."'");
			if($hasuser)
			{
				$data2['status']=2;
				$data2['msg']="不可重复留言";
				
			}else{
				$data['kq_userid']=$user['id'];
				$data['kq_name']=$user['kq_name'];
				$data['kq_content']=nl2br($data['kq_content']);
				
				
				if(count($liuyan)>0){
					$data['kq_number']=$liuyan['kq_number']+1;
				}else{
					$data['kq_number']=1;	
				}


				if($conn->post_insert("".DB_EXT."liuyan",$data)){
					update_looknum($data['kq_newsid']);
					update_uptime($data['kq_newsid']);
					$data2['status']=1;
					$data2['msg']="留言成功";
					
					$data2['kq_picurl']=$user['kq_picurl'];
					
					
				}else{
					$data2['status']=0;
					$data2['msg']="留言失败，请再次留言";

				}
			}
			echo json_encode($data2);
			
		break;
	default:
		# code...
		break;
}
?>