<?php
require_once("../class/class_config.inc.php");
require_once(FUN_PATH."global.func.inc.php");
require_once(CLASS_PATH."class_alert.inc.php");
$key='';
if(isset($_GET['key']))
{
	$key=$_GET['key'];
}
$city=get_first_date("city","where kq_title like '%".$key."%' and  kq_islast=0 ","more");

if(count($city)>0)
{
	foreach ($city as $key => $value) {
  echo "<li data-id='".$value['id']."' data-status='0'>".$value['kq_title']."</li>";
}
}



?>