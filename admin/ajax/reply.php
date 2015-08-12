<?php
session_start();
require_once("../class/class_config.inc.php");
require_once(FUN_PATH."global.func.inc.php");
require_once(CLASS_PATH."class_alert.inc.php");
$data=$_POST;
if($data['action']=='add'){
	$data['kq_uuid']=uuid();
	$data['kq_ctime']=time();
	$data['kq_adminid']=$_SESSION['name'];
	unset($data['action']);
	unset($data['_']);
	
	if ($conn->post_insert("".DB_EXT."lyreply",$data))
	{	$array=array(
		'status'=>1
		);
		$json=json_encode($array);
		echo $json;
	}else
	{
		$array=array(
		'status'=>0
		);
		$json=json_encode($array);
		echo $json;
	}
}elseif($data['action']=='get'){
	$show=get_first_date('lyreply',"where kq_lyid='".$data['id']."'");
	echo json_encode($show);
}


?>