<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
session_start();
define("KQ_WORK",true);
require_once("base.inc.php");
if(!isset($_COOKIE['uid'])){
  echo "<script>alert('请登陆后操作');window.location.href='/';</script>";
  exit();
}
is_login(@$_COOKIE['uid']);//验证是否登录
$pidid=$_GET['pidid'];
$piclist='';
$ylpic='';
$size_w='';
$size_h='';
$bili=0;
if(isset($_GET['ylpic'])){
	$ylpic=$_GET['ylpic'];
	
	}else{
    $ylpic='';
  }
if(isset($_GET['list'])){
    $piclist=$_GET['list'];
}
if(isset($_GET['size_w'])){
   $size_w=$_GET['size_w'];
}
if(isset($_GET['size_h'])){
    $size_h=$_GET['size_h'];
}
if(isset($_GET['bili'])){
    $bili=$_GET['bili'];
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.btn {
    display: inline-block;
    background-color: #0072C6;
    border: 0px none;
    color: #FFF;
    padding: 6px 15px;
    font-weight: bold;
    text-transform: capitalize;
    cursor: pointer;
}
.inpMain {
    border: 1px solid #DBDBDB;
    background-color: #FFF;
    padding: 4px;
    color: #999;
  
	
}
.pic_wart{ height:40px; padding:10px;}
</style>
<div class="pic_wart">
<form action="../kindeditor-4-10/php/upload_json2.php" method="post" enctype="multipart/form-data">
<input name="picid" type="hidden" value="<?php echo @$pidid?>" />
<input name="ylpic" type="hidden" value="<?php echo @$ylpic?>" />
<input name="list" type="hidden" value="<?php echo @$piclist?>" />
<input name="size_w" type="hidden" value="<?php echo @$size_w?>" />
<input name="size_h" type="hidden" value="<?php echo @$size_h?>" />
<input name="bili" type="hidden" value="<?php echo @$bili?>" />
  <label for="imgFile"></label>
  <input name="imgFile" type="file" id="imgFile" size="35" class="inpMain ">
  <input type="submit" name="button" id="button" value="上传" class="btn">
  <input type="button" name="button2" id="button2" value="关闭" class="btn" onClick="closepic()">
</form>
</div>
<script>
var index = parent.layer.getFrameIndex(window.name);
function closepic(){
	parent.layer.close(index);
	}
</script>