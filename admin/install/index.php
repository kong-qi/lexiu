<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>空气管理系统安装向导</title>
<script src="../js/jquery.js"></script>
<style>
body {
	font-family: "微软雅黑", "宋体", Arial, Verdana, sans-serif;
	font-size:12px;
	color: #333;
	margin: 0;
	padding: 0;
}
div, dl, dt, dd, ul, li, p {
	margin: 0;
	padding: 0;
}
h1, h2, h3, h4, h5, h6 {
	font-size: 12px;
	margin: 0;
	padding: 0;
	font-weight:normal;
}
img {
	border:0;
}
ul, ol {
	list-style: none;
}
a {
	color:#0072C6;
}
a:hover {
	text-decoration:none;
}
.install_top{ height:80px; background:#0072C6}
.install_top p{ width:1000px; margin:0 auto;}
.install_warp{ width:1000px; margin:20px auto 0;}
.install_warp .in_r{ width:700px; float:right}
.install_warp .in_l{ width:200px; float:left; background:#eee; border:1px solid #ccc}
.install_warp .in_l h3{ height:35px; background:#0072C6; text-align:center; font-size:18px; font-weight:400; line-height:35px; color:#fff}
.install_warp .in_l  ul{ margin:0px 0;}
.install_warp .in_l  ul li{ height:35px; text-align:center; line-height:35px; border-bottom:1px solid #d0d0d0; border-top:1px solid #fff; cursor:pointer}
.install_warp .in_l  ul li.no_t_border{ border-top:none;}
.install_warp .in_l  ul li.no_b_border{ border-bottom:none}
.install_warp .in_l  ul li.selected{ background:#60BBFF; color:#FFF; font-weight:bold; font-size:14px;}
.install_warp .in_r .in_r_cont{ padding:10px; border:1px solid #58b6fb; font-size:14px; width:678px; overflow:hidden}
.install_warp .in_r .in_r_cont p{ line-height:1.8em;}
.install_warp .in_r .aciton_btn{ margin:20px 0;}
.install_warp .in_r .xieyi_ck{ }
.install_warp .in_r .ac_btn{ padding:10px; text-decoration:none;background:none; background:#0072C6; font-size:14px; cursor:pointer; font-weight:bold; border:none; color:#fff; margin-right:10px}
.install_warp .in_r .xieyi{margin-left:30px; }
.huanjing .input{ padding:5px;}
.huanjing h3{ color:#fff; height:40px; line-height:40px; border-bottom:2px solid #60bbff}
.huanjing h3 span{ padding:10px 15px; background:#60bbff; font-size:14px;}
.mt-bm-10{ margin:10px 0;}
.mt-bm-10 p{ line-height:25px;}
.install_ok h3{ font-size:18px; color:#060; font-weight:300; margin-bottom:10px;text-align:center;}
.install_ok p{ font-size:15px; text-align:center;}
.cl{ clear:both}
</style>
</head>
<?php
if(isset($_GET['step'])){
	if($_GET['step']){
		$steptype=$_GET['step'];
		}else{
			$steptype='step1';
			}
	}else{
		$steptype="step1";
		}
function check_dir_write($path){
	if(!file_exists($path)){return false;}
	$file=$path.'write.txt';
	if(!$fp=@fopen($file,'w')){return false;}
	if(!@fwrite($fp,'write')){return false;}
	fclose($fp);
	@unlink($file);
	return true;
}
function write_file($file,$str){
	$fp=fopen($file,'w+');
	flock($fp,LOCK_EX);
	if(!fwrite($fp,$str)){
		flock($fp,LOCK_UN);
		fclose($fp);
	}
	flock($fp,LOCK_UN);
	fclose($fp);
}
define('ADMIN_PATH',str_replace('install','',str_replace('\\','/',dirname(__FILE__))));
define('CMS_PATH',substr(ADMIN_PATH,0,strrpos(substr(ADMIN_PATH,0,strlen(ADMIN_PATH)-1),'/')+1));
if(file_exists(ADMIN_PATH.'inc/install.lock')){
	echo "<script>alert('系统已经安装完成,需要重新安装请先删除inc目录下的install.lock文件');window.location.href='../login.php'</script>";
	exit();
	}
$mulu_write=array("updatefile/","admin/action/","admin/inc/");
?>
<body>
<div class="install_top">
<p><a href="http://www.kong-qi.com"><img src="../images/install_logo.gif" /></a></p>
</div>
<div class="install_warp">
<div class="in_r">
<div class="in_r_cont">
<?php
switch($steptype){
	case "step2":
	include("template/huanjing.html");
	break;
	case "step3":
	include("template/setsql.html");
	break;
	case "step4":
	$localhost=empty($_POST['mysql_host'])?'':trim($_POST['mysql_host']);
	$db_user=empty($_POST['mysql_name'])?'':trim($_POST['mysql_name']);
	$db_password=empty($_POST['mysql_pwd'])?'':trim($_POST['mysql_pwd']);
	$db_name=empty($_POST['mysql_db'])?'':trim($_POST['mysql_db']);
	$db_pre=empty($_POST['mysql_pre'])?'kq_':trim($_POST['mysql_pre']);
	if(empty($db_name)){
		echo ("<script>alert('数据库名称不能为空');window.location.href='index.php?step=step3';</script>");
		exit();
		};
	$str="<?php\n";
	$str.="define('DB_HOST', '{$localhost}');\n";
	$str.="define('DB_ROOT', '{$db_user}');\n";
	$str.="define('DB_PWD','{$db_password}');\n";
	$str.="define('DB_DBNAME', '{$db_name}');\n";
	$str.="define('DB_EXT', '{$db_pre}');\n";
	$str.="?>";
	if (!$conn=@mysql_connect($localhost,$db_user,$db_password)){
		echo "<script>alert('数据库连接失败');window.location.href='index.php?step=step3'</script>";
		exit();
		}
	$dbs=@mysql_query("show DATABASES",$conn);
	while(($rel=mysql_fetch_assoc($dbs))!=false){
		if($rel['Database']==$db_name){$is_db=1;}
	}
	$is_db=isset($is_db)?$is_db:'';
	if(!$is_db){@mysql_query("create database {$db_name}",$conn);}
	@mysql_select_db($db_name,$conn);
	write_file(ADMIN_PATH."inc/config.inc.php",$str);
	include(ADMIN_PATH."inc/config.inc.php");
	mysql_unbuffered_query("set names utf8",$conn);
	require_once('data.php');
	include("template/install.html");
	break;
		case "step5":
	include("template/ok.html");
	break;
    default:
	include("template/xieyi.html");
	break;
	}
?>
</div>
</div><!--in_r-->
<div class="in_l">
<h3>安装步骤</h3>
<ul>
<li class="no_t_border <?php if($steptype=='step1'){
	echo 'selected';
	}?>">关于协议</li>
<li <?php if($steptype=='step2'){
	echo 'class="selected"';
	}?>>环境检测</li>
<li <?php if($steptype=='step3'){
	echo 'class="selected"';
	}?>>参数配置</li>
<li <?php if($steptype=='step4'){
	echo 'class="selected"';
	}?>>正在安装</li>
<li class="no_b_border <?php if($steptype=='step4'){
	echo "selected";
	}?>" >完全安装</li>
</ul>
</div>
<div class="cl"></div>
</div>
</body>
</html>
<script>
$(function(){
	$(".xieyi").click(function(){
		if(!($(".xieyi_ck:checked").length)){
			alert("未同意协议");
			return false;
			}
		})
	})
</script>