<?php
require("class/connect.php");
include("class/config.php");
include("class/db_sql.php");
include("class/functions.php");
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
if($limittype)
{
	$checklimittype=" checked";
}
if($filechmod==1)
{
	$filechmod1=" checked";
	$filechmod0="";
}
else
{
	$filechmod1="";
	$filechmod0=" checked";
}
//mysql�汾
if(empty($phome_db_ver))
{
	$getmysqlver=@mysql_get_server_info();
	if(empty($getmysqlver))
	{
		$getmysqlver='5.0';
	}
	if($getmysqlver>='5.0')
	{
		$phome_db_ver='5.0';
	}
	elseif($getmysqlver>='4.1')
	{
		$phome_db_ver='4.1';
	}
	else
	{
		$phome_db_ver='4.0';
	}
}
include("lang/dbchar.php");
require LoadAdminTemp('eSetDb.php');
?>