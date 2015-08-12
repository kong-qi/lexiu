<?php
header ("Content-type:Application/x-javascript; Charset: utf-8");
$dir=$_SERVER['DOCUMENT_ROOT']."/";
if(isset($_GET)) {
	$files = explode(",", $_GET['get']);
	$str = '';
	foreach ($files as $key => $val){
		$str .= file_get_contents($dir.$val);
	}


	echo $str;
}

?>