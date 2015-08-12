<?php
require_once("../qqconnect/API/qqConnectAPI.php");
require_once("base.inc.php");
$qc = new QC();
$token=$qc->qq_callback();
$openid=$qc->get_openid();
$qc2 = new QC($token,$openid);
$arr = $qc2->get_user_info();

//判断是否已经注册，如果是已经注册了则登陆
$user=get_first_date('user',"where kq_openid='".$openid."'");
if(count($user)>0)
{

	setcookie("user",$user['kq_name'], time()+7200*12,"/");
	setcookie("uid",$user['kq_uniqueid'], time()+7200*12,"/");
	header("Location:../user.html");
}else
{
	$data['kq_name']=$arr["nickname"];
	$data['kq_ctime']=time();
	$data['kq_uuid']=uuid();
	$data['kq_openid']=$openid;
	$data['kq_token']=$token;
	$data['kq_uniqueid']=sha1(uuid());
	$data['kq_picurl']=$arr['figureurl_qq_2'];
	$data['kq_sex']=$arr["gender"]=='男'?'1':'2';
	if ($conn->post_insert("".DB_EXT."user",$data)){
		setcookie("user",$data['kq_name'], time()+7200*12,"/");
		setcookie("uid",$data['kq_uniqueid'], time()+7200*12,"/");
		header("Location:../user.html");
	}else{
		header("Location:../");
	}
	
	
}
?>

