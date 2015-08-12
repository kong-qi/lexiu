<?php
session_start();

require_once("../class/class_config.inc.php");
require_once(FUN_PATH."global.func.inc.php");
require_once(CLASS_PATH."class_alert.inc.php");
	if(!isset($_POST['username'])){
		new Alert("非法操作","back");
		exit();
		}else{
	$name=trim($_POST['username']);}
	if (!isset($_POST['password'])){
		new Alert("非法操作","back");
		exit();
	
		}else
		{
		 $pwd=sha1(trim($_POST['password']));
		 }
	if(strtoupper(trim($_POST['code'])) != strtoupper($_SESSION['code'])){
	   new Alert("验证码不正确","back");
	   exit();
	}
	 
	 $namesql=$conn->selectall("".DB_EXT."admin","where kq_name='".setdefensesql($name)."'");
	 if ($conn->rows($namesql)){
		 $pwdsql=$conn->selectall("".DB_EXT."admin","where kq_name='".setdefensesql($name)."' and kq_pwd='".setdefensesql($pwd)."'");
		  if ($conn->rows($pwdsql)){
			   $checksql=$conn->selectall("".DB_EXT."admin","where kq_name='".setdefensesql($name)."' and kq_pwd='".setdefensesql($pwd)."' and kq_checked='1'");
			    if ($conn->rows($checksql)){
				$admin_r=$conn->result($checksql);
				$_SESSION['name']=$name;
				$_SESSION['pwd']=$pwd;
				$group=get_first_date('admingroup',"where id='".$admin_r['kq_groupid']."'");
				$_SESSION['group']=json_decode($group['kq_group'],true);
				$_SESSION['uniqid']=$admin_r['kq_uniqid'];
				header('Location:../index.php');				
				}else{
				new Alert("管理员被禁用","back");
				
				}
		       	  
			  			  
			  }//pwd check
			  else{
				new Alert("密码不正确","back");  
				exit();
			  }
		 		 
		 }//name check
	     else{
			 new Alert("用户名不存在","back");
			 exit();
			 
			 }  


?>