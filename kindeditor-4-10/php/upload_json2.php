
<?php
/**
 * KindEditor PHP
 *
 * 本PHP程序是演示程序，建议不要直接在实际项目中使用。
 * 如果您确定直接使用本程序，使用之前请仔细确认相关安全设置。
 *
 */
require_once("../../inc/base.inc.php");
require_once(KQ_PATH."inc/thumbs.class.php");
$pidid=@$_POST['picid'];
$ylpic=$_POST['ylpic'];
$upsize_w='';
$upsize_h='';
$bili='';
$list='';
if(isset($_POST['list'])){
	$list=$_POST['list'];
}
if(isset($_POST['size_w'])){
	$upsize_w=$_POST['size_w'];
}
if(isset($_POST['size_h'])){
	$upsize_h=$_POST['size_h'];
}
if(isset($_POST['bili'])){
	$bili=$_POST['bili'];
}


/*$php_url =substr(KQ_URL,0,strrpos(substr(ADMIN_URL,0,strlen(ADMIN_URL)-1),'/')+1);//设置删除最后一个/
$php_url=substr($php_url,0,strrpos(substr($php_url,0,strlen($php_url)-1),"/")+1);*/
//文件保存目录路径
$save_path = KQ_PATH."updatefile/";
//文件保存目录URL
$save_url ='/updatefile/';
//定义允许上传的文件扩展名
$php_url=KQ_URL;
$ext_arr = array(
	'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
	'flash' => array('swf', 'flv'),
	'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
	'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
);
//最大文件大小
$max_size = 5000000;

//PHP上传失败
if (!empty($_FILES['imgFile']['error'])) {
	switch($_FILES['imgFile']['error']){
		case '1':
			$error = '超过php.ini允许的大小。';
			break;
		case '2':
			$error = '超过表单允许的大小。';
			break;
		case '3':
			$error = '图片只有部分被上传。';
			break;
		case '4':
			$error = '请选择图片。';
			break;
		case '6':
			$error = '找不到临时目录。';
			break;
		case '7':
			$error = '写文件到硬盘出错。';
			break;
		case '8':
			$error = 'File upload stopped by extension。';
			break;
		case '999':
		default:
			$error = '未知错误。';
	}
	alert($error);
}

//有上传文件时
if (empty($_FILES) === false) {
	//原文件名
	$file_name = $_FILES['imgFile']['name'];
	//服务器上临时文件名
	$tmp_name = $_FILES['imgFile']['tmp_name'];
	//文件大小
	$file_size = $_FILES['imgFile']['size'];
	//检查文件名
	if (!$file_name) {
		alert("请选择文件。");
	}
	//检查目录
	if (@is_dir($save_path) === false) {
		alert("上传目录不存在。");
	}
	//检查目录写权限
	if (@is_writable($save_path) === false) {
		alert("上传目录没有写权限。");
	}
	//检查是否已上传
	if (@is_uploaded_file($tmp_name) === false) {
		alert("上传失败。");
	}
	//检查文件大小
	if ($file_size > $max_size) {
		alert("上传文件大小超过限制。");
	}
	//检查目录名
	$dir_name = empty($_GET['dir']) ? 'image' : trim($_GET['dir']);
	if (empty($ext_arr[$dir_name])) {
		alert("目录名不正确。");
	}
	//获得文件扩展名
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	//检查扩展名
	if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
		alert("上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $ext_arr[$dir_name]) . "格式。");
	}
	//创建文件夹
	$diyurl='';
	if ($dir_name !== '') {
		$save_path .= "/".SUOLUTDIR. "/";

		$save_url .= $dir_name . "/";
		if (!file_exists($save_path)) {
			mkdir($save_path);
		}
	}
	$ymd = date("Ymd");
	/*$save_path .= $ymd . "/";*/
	$save_url .= $ymd . "/";
	/*if (!file_exists($save_path)) {
		mkdir($save_path);
	}*/
	//新文件名
	$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
	//移动文件
	$file_path = $save_path . $new_file_name;
	if (move_uploaded_file($tmp_name, $file_path) === false) {
		alert("上传文件失败。");
	}
	@chmod($file_path, 0644);

	$file_url = $new_file_name;
	$data2['kq_url']=$file_url;
	$data2['kq_type']=1;
	$data2['kq_aburl']=$file_path;
	$data2['kq_ctime']=$ymd;
	$data2['kq_uuid']=md5(uniqid(rand(),true).rand(1,time()));
	$data2['kq_title']=$file_name;
  	if($conn->post_insert("".DB_EXT."file",$data2)){
		}else{
		exit("入库失败");
	}
	//是否开启生成缩略图
		
	if(SUOLUETU){
		$thumbs=new ThumbnailPic($file_path);
		//比例问题
		if($bili)
		{
			foreach ($sltarray as $key => $sltvalue) {
				$thumbs->CreateThumbsize($sltvalue['w'],$sltvalue['h'],'',1);
			}
			if($upsize_w!='')
			{
						
				$thumbs->CreateThumbsize($upsize_w,$upsize_h,1,1);
				
			}

		}else
		{
			foreach ($sltarray as $key => $sltvalue) {
				$thumbs->CreateThumbsize($sltvalue['w'],$sltvalue['h']);
			}
			if($upsize_w!='')
			{
						
				$thumbs->CreateThumbsize($upsize_w,$upsize_h,1);
				
			}
		}
		

		

	}
	if($list)
	{
			$htmlstr='<li class="itempic"><img class="fmpic" src="'.pic_url($file_url,"260x260/").'" height="80" alt=""><input type="hidden" name="up_pic[]" value="'.$file_url.'"> <div class="editro"> <a href="javascript:void(0)" class="up_pic">上移</a> <a href="javascript:void(0)" class="botm_pic">下移</a> <a href="javascript:void(0)" class="del_pic">删除</a> </div></li>';
			//引入JQUERY
		   echo "<script src='".$php_url."/js/jquery.js'></script>";
		   echo "
			<script>
				$(window.parent.document).find('".$pidid."').append('".$htmlstr."');
				var index = parent.layer.getFrameIndex(window.name);
		   			parent.layer.close(index);
			</script>
		   ";
	}else{
			$ylpicstr='<a href="'.pic_url($file_url,"235x235/").'" target="_blank"><img src="'.pic_url($file_url,"260x260/").'" height="100"></a>';
		    if($ylpic){
			echo "<script>parent.document.getElementById('".$pidid."').value='$file_url';parent.document.getElementById('".$ylpic."').innerHTML='".$ylpicstr."';var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>";
			}else{
			echo "<script>parent.document.getElementById('".$pidid."').value='$file_url';var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>";
			} 
	}
	
	exit;
}
function alert($msg) {
	global $pidid;
	global $ylpic;
	global $upsize_w;
	global $upsize_h;
	global $list;
	$sizeurl='';
	if($upsize_w)
	{
		$sizeurl='&size_w='.$upsize_w.'&size_h='.$upsize_h;

	}
	if($list)
	{
		$sizeurl.='&list=1';
	}
	echo $msg;
	echo "点击<a href='../../inc/updatepic.php?pidid=".$pidid."&ylpic=".$ylpic.$sizeurl."'>重新上传</a>";
	exit();
	
}
