<?php
require("class/connect.php");
include("class/config.php");
include("class/db_sql.php");
include("class/functions.php");
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
$link=db_connect();
$empire=new mysqlquery();
//���ݿ�
$mydbname=RepPostVar($_GET['mydbname']);
$mytbname=RepPostVar($_GET['mytbname']);
if(empty($mydbname)||empty($mytbname))
{
	printerror("ErrorUrl","history.go(-1)");
}
$form=$_GET['form'];
if(empty($form))
{
	$form='ebakchangetb';
}
$usql=$empire->query("use `$mydbname`");
$sql=$empire->query("SHOW FIELDS FROM `".$mytbname."`");
require LoadAdminTemp('eListField.php');
db_close();
$empire=null;
?>