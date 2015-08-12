<?php
require_once("../class/class_config.inc.php");
require_once(FUN_PATH."global.func.inc.php");
require_once(CLASS_PATH."class_alert.inc.php");
$action=isset($_GET['action'])?$_GET['action']:"";





if($action=="lmdir"){
		$filedir=isset($_GET['dir'])?$_GET['dir']:"";
		$name=isset($_GET['name'])?$_GET['name']:"";
		$filedirname=get_fid_url($filedir);
		echo is_dirname($filedirname,$name);
	}


?>