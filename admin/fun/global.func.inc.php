<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
//获取网站配置信息
function get_config(){
	global $conn;
	$array=array();
	$nwodate=time();
	$sql=$conn->selectall(DB_EXT.'config',"");
	if($conn->rows($sql)){
		while($result=$conn->result($sql)){
				$array=$result;
		}
	}
	return $array;
}
/**
 * [left_nav 左侧选中状态]
 * @param  [type] $name  [description]
 * @param  [type] $str   [description]
 * @param  string $orstr [description]
 * @return [type]        [description]
 */
function left_nav($name,$str,$orstr=''){
	if($orstr)
	{
		if(strstr($name,$str) or strstr($name, $orstr)){
			  echo 'class="cur"';
		}
	}else
	{
		if(strstr($name,$str)){
			  echo 'class="cur"';
		}
	}
	

}

function get_city_array($where=''){
	global $conn;
	$classarr=array();
	if($where)
	{
		$classql=$conn->selectall("".DB_EXT."city",$where);
	}else
	{	
		$classql=$conn->selectall("".DB_EXT."city","where kq_islast='1'");
	}
	while($class_r=$conn->result($classql)){
		$classarr[]=array($class_r['id'],$class_r['kq_fid'],$class_r['kq_title']);
	}
	return $classarr;
}

/**
 * [get_class_array 取得分类的数组]
 * @param  string $where [description]
 * @return [type]        [description]
 */
function get_class_array($where=''){
	global $conn;
	$classarr=array();
	if($where)
	{
		$classql=$conn->selectall("".DB_EXT."lanmu",$where);
	}else
	{	
		$classql=$conn->selectall("".DB_EXT."lanmu","where kq_islast='0'");
	}
	
	while($class_r=$conn->result($classql)){
		$classarr[]=array($class_r['id'],$class_r['kq_fid'],$class_r['kq_name']);
	}
	return $classarr;
}
/**
 * [get_class_array2 栏目生成]
 * @param  string $where [description]
 * @return [type]        [description]
 */
function get_class_array2($where=''){
	global $conn;
	$classarr=array();
	
		$classql=$conn->selectall("".DB_EXT."lanmu","");
	
	
	while($class_r=$conn->result($classql)){
		$classarr[]=array($class_r['id'],$class_r['kq_fid'],$class_r['kq_name']);
	}
	return $classarr;
} 
/**
 * [get_tree_class 输出树状]
 * @param  integer $fid   [description]
 * @param  integer $num   [description]
 * @param  [type]  $array [description]
 * @param  string  $bid   [description]
 * @return [type]         [description]
 */
function get_tree_class($fid=0,$num=0,$array,$bid=''){
	  for($i=0;$i<count($array);$i++){        
	   if($array[$i][1]==$fid){
	   	if($bid==$array[$i][0]){
			echo "<option value=".$array[$i][0]." selected='selected'>";
	   	}else{
	   		echo "<option value=".$array[$i][0].">";
	   	}       
	    echo str_repeat("&nbsp;&nbsp;", $num)."|-".$array[$i][2]."</option>";   
	    get_tree_class($array[$i][0],$num+2,$array);   
	   }  
	  }  
	 

}
/**
 * [pic_url 图片URL]
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
function pic_url($str,$size=""){
	global $sltarray;
	$str=trim($str);
	if(SUOLUETU){
		if(count($sltarray)>0)
		{
			$size=$sltarray[0]['w']."x".$sltarray[0]['h'];
		}
		$size=$size==''?'':$size."/";
	}else{
		$size="";
	}
	if($str){
		if(strstr($str,"http://") or strstr($str,"HTTP://")){
		    $picurl=$str;	   
		}else{
		    $picurl=ADMIN_URL."updatefile/".SUOLUTDIR."/".$size.$str;
		}
	}else{
		$picurl=ADMIN_URL.'images/nopic.gif';
	}
	
	return $picurl;
}
/**
 * [http_url HTTP修改]
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function http_url($url){
	$url=str_replace("http://", "", $url);
	$url=str_replace("HTTP://", "", $url);
	return "http://".$url;
}
/**
 * [empty_url 是否空连接]
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function empty_url($url){
	if($url){
		return $url;
	}else{
		return "javascript:void(0)";
	}
}
/**
 * Description 加载编辑器
 * @param type $classid 
 * @return type
 */
function load_editor($classid){
	//加载编辑器
	echo '
	<link rel="stylesheet" href="kindeditor-4-10/themes/default/default.css" />
	<script src="kindeditor-4-10/kindeditor.js"></script>
	<script src="kindeditor-4-10/lang/zh_CN.js"></script>';
	echo "
		<script>
		    KindEditor.ready(function(K) {
		      var editor1 = K.create('".$classid."', {
		        cssPath : 'kindeditor-4-10/plugins/code/prettify.css',
		        uploadJson : 'kindeditor-4-10/php/upload_json.php',
		        fileManagerJson : 'kindeditor-4-10/php/file_manager_json.php',
		        allowFileManager : true,
		        pagebreakHtml:'{pagenext}',
		        afterCreate : function() {
		          var self = this;
		          K.ctrl(document, 13, function() {
		            self.sync();
		            K('form[name=example]')[0].submit();
		          });
		          K.ctrl(self.edit.doc, 13, function() {
		            self.sync();
		            K('form[name=example]')[0].submit();
		          });
		        }
		      });
		     
		    });
		  </script>
	";
}	
/**
 * 
 * @param type 取得单个数据、多个数据
 * @param type $wherestr 
 * @param type $type 
 * @return type
 */
function get_first_date($table,$wherestr,$type='one'){
	global $conn;
	$array=array();
	$nwodate=time();
	$sql=$conn->selectall(DB_EXT.$table,$wherestr);
	switch ($type) {
		case 'one':
				while($result=$conn->result($sql)){
						$array=$result;
				}
			break;
		case 'more':
				if($conn->rows($sql)){
					while($result=$conn->result($sql)){
							$array[]=$result;
					}
				}
			break;
		
		default:
			# code...
			break;
	}
	
	return $array;
}
//
function echo_option($str,$array){
	echo $array[$str];
}
function echo_check($str,$num,$type='ck'){
	if($str==$num){
		if($type=='ck'){
			echo 'checked="checked"';
		}else{
			echo 'selected="selected"';
		}
	}
}

/**
 * [has_date ]
 * @param  是否存在数据  $table    [description]
 * @param  [type]  $wherestr [description]
 * @return boolean           [description]
 */
function has_date($table,$wherestr){
	global $conn;
	$array=array();
	$nwodate=time();
	$sql=$conn->selectall(DB_EXT.$table,$wherestr);
	if($conn->rows($sql)){
		return true;
	}else{
		return false;
	}
}
function has_subclass($id){
	if(!$id){
		return "no";
		exit();
	}
	global $conn;
	$array=array();
	$sql=$conn->selectall(DB_EXT."lanmu","where kq_fid='".$id."'");
	if($conn->rows($sql))
	{
		return "ok";
	}
	else
	{
		return "no";
	}
}

function has_subclass2($id){
	if(!$id){
		return "no";
		exit();
	}
	global $conn;
	$array=array();
	$sql=$conn->selectall(DB_EXT."city","where kq_fid='".$id."'");
	if($conn->rows($sql)>0)
	{
		return "ok";
	}
	else
	{
		return "no";
	}
}

//加斜杠注入类
function  add_slashes($data){
   foreach ($data as $key=>$value)
   {
   		if(is_array($value)){
   			add_slashes($value);
   		}else{
   			    if(!get_magic_quotes_gpc())
   				{
   				  $data[$key]=addslashes($value);
   				}else{
   					$data[$key]=$value;
   				}
   		}
	    
			 
   }
return $data;
}
//删除斜杠
function  dell_slashes($data){
	foreach ($data as $key=>$value){
		if(is_array($value)){
			dell_slashes($value);
		}else{
			$data[$key]=stripslashes($value);
		}
		
	 }
 return $data;
}
//防注查询SQL
 function setdefensesql($str){
   $str = str_replace("and","",$str);
   $str = str_replace("execute","",$str);
   $str = str_replace("update","",$str);
   $str = str_replace("count","",$str);
   $str = str_replace("chr","",$str);
   $str = str_replace("mid","",$str);
   $str = str_replace("master","",$str);
   $str = str_replace("truncate","",$str);
   $str = str_replace("char","",$str);
   $str = str_replace("declare","",$str);
   $str = str_replace("select","",$str);
   $str = str_replace("create","",$str);
   $str = str_replace("delete","",$str);
   $str = str_replace("insert","",$str);
   $str = str_replace("or","",$str);
   $str = str_replace("=",'',$str);
   $str = str_replace("\'","",$str);
   $str = str_replace("\"","",$str);
   $str = str_replace("#","",$str);
   return $str;
}
/**
 * [get_fid_id 取得FID]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function get_fid_id($id){
	global $conn;
	$sql=$conn->selectall(DB_EXT."lanmu","where id='".$id."'");
	$sql_r=$conn->result($sql);
	if($sql_r['kq_fid']==0){
		return $sql_r['id'];
	}else{
		return get_fid_id($sql_r['kq_fid']);
			
	}
	
	
}
	

				   
		   
		   
//目录名或者文件是否存在	
function is_dirname($dir="",$dirname=""){
	if($dir){
			$dir=CMS_PATH.$dir."/".$dirname.".php";
		}else{
			$dir=CMS_PATH.$dirname;	
		}
if(file_exists($dir)){
		return true;
		
		}else{
			return false;
		}
}
	   
		   
/*权限设置
如果是超级管理员则返回1
添加信息，编辑信息，删除信息，伪静态，备份权限，留言权限,友情链接,招商权限
*/
function permission($root=''){
	$array=$_SESSION['group'];

	if(in_array('root', $array)){
		return true;
	}elseif(in_array('read', $array))
	{
		return false;
	}elseif(in_array($root, $array))
	{
		return true;
	}else{
		return false;

	}
	
	
	
}//permission end
function per_inarray($str,$array,$type=1){
	if(in_array($str,$array)){
		if($type==1)
		{
			echo "checked='checked'";
		}
	}
}
//是否登录状态
function islogin($uniqid){
		global $conn;
		$adminsql=$conn->selectall("".DB_EXT."admin","where kq_uniqid='".$uniqid."'");
		if(!$conn->rows($adminsql)){
			echo "<script>alert('登录后才能操作');window.location.href='".ADMIN_URL."admin/login.php'</script>";
		
		}
	}
	
//生成唯一UUID
function uuid(){
	return md5(uniqid(rand(),true).rand(1,time()));
	
	}
//生成唯一uniqid
function uniqidstr(){
	return sha1(uniqid(rand(),true));
	
	}	
function order_uuid(){
	return "NUM_".md5(uniqid(rand(),true).rand(1,time()));
	
	}
//取得子ID
function get_sub_fid($id){
	global $conn;
	$subidstr="";
	$array=array();
	$sql=$conn->selectall(DB_EXT."lanmu","where kq_fid='".$id."' order by kq_sort desc");
	while($sql_r=$conn->result($sql)){
		$subidstr.=$sql_r['id'].",";
		
	};
	$subidstr=substr($subidstr,0,strlen($subidstr)-1);
    $array=explode(",",$subidstr);
	return $array;
	
	
	}
//取得子城市ID
function get_city_id($id){
		global $conn;
		$subidstr="";
		$array=array();
		$sql=$conn->selectall(DB_EXT."city","where kq_fid='".$id."' order by kq_sort desc");
		
		
		while($sql_r=$conn->result($sql)){
				$subidstr.=$sql_r['id'].",";
				
			};
		if($subidstr)
		{
			$subidstr=substr($subidstr,0,strlen($subidstr)-1);
			$array=explode(",",$subidstr);
		}else
		{
			$array=array($id);
		}
		
		
			
		
		
		
		return $array;
		
		
		}		
//查出FID的文件目录
function get_fid_url($id){
	global $conn;
	$sql=$conn->selectall(DB_EXT."lanmu","where id='".$id."'");
	$sql_r=$conn->result($sql);
	if($sql_r['kq_fid']==0){
		
		return $sql_r['kq_url'];
	}else{
			return get_fid_url($sql_r['kq_fid']);
			
	}
	
	
	
	
}	
function nav_bx($id,&$data=array()){
	global $conn;
	$data=$data;
	$str='';
	$sql=$conn->selectall(DB_EXT."lanmu","where id='".$id."'");
	$result=$conn->result($sql);

	if($conn->rows($sql)){

         $data[]=array('title'=>$result['kq_name'],'id'=>$result['id']);

         nav_bx($result['kq_fid'],$data);

	}
	
	$data=array_reverse($data);
	return $data;
}
/**
 * [get_all_classid 取得所以栏目ID]
 * @param  [type] $id     [description]
 * @param  array  &$array [description]
 * @return [type]         [description]
 */
function get_all_classid($id,&$array=array()){
	global $conn;
	$array=$array;
	$sql=$conn->selectall(DB_EXT."lanmu","where kq_fid='".$id."'");
	if($conn->rows($sql)){
		while($result=$conn->result($sql)){
				get_all_classid($result['id'],$array);
					$array[]=$result['id'];
		}
	}
	return $array;
}

function attr_change($array,$id){
	if($id%5==1)
	{
		echo '<span style="padding: 3px 8px;background:#449D44" class="btn">'.$array[$id]."</span>";
	}elseif($id%5==2)
	{
		echo '<span style="padding: 3px 8px;background:#C9302C" class="btn">'.$array[$id]."</span>";
	}
	elseif($id%5==3)
		{
			echo '<span  class="btn " style="padding: 3px 8px;background:#EC971F" class="btn">'.$array[$id].'</span>';
		}
	elseif($id%5==4)
		{
			echo '<span style="padding: 3px 8px;background:#C9302C" class="btn">'.$array[$id]."</span>";
		}
	elseif($id%5==0)
		{
			echo '<span  class="btn " style="padding: 3px 8px;background:#EC971F" class="btn">'.$array[$id].'</span>';
		}
}

?>