<?php
session_start();
require_once("../class/class_config.inc.php");
require_once(FUN_PATH."global.func.inc.php");
require_once(CLASS_PATH."class_alert.inc.php");
$data=$_POST;
if($data['action']=='add'){

}elseif($data['action']=='get'){

}elseif($data['action']=='list'){
	$id='';
	if(isset($data['id']))
	{
		$id=$data['id'];
	}
	if($id){
		$user=get_first_date('user',"where id='".$id."' or kq_name like '%".$id."%' or kq_tel like '%".$id."%' order by id desc",'more');
	}else{
		$user=get_first_date('user','order by id desc','more');
	}
	
	echo '<div class="user_list">';
	if(!$id)
	{

	
		echo '<div class="search">
		  <input name="key" size="20" class="inpMain" id="sukey" type="text">
		   <input name="submit" class="btn search_user" value="提交" type="submit"></td>
		</div>';
	}
	echo '<ul class="user_list_ul">';
	if(count($user)>0)
	{
		foreach ($user as $key => $v) {
			echo '<li data-status="1" class="add_user_a" data-id="'.$v['id'].'" data-name="'.$v['kq_name'].'">';
			echo '<input type="hidden" name="kq_username[]" value="'.$v['kq_name'].'">
                  <input type="hidden" name="kq_userid[]" value="'.$v['id'].'">';
			echo '<a href="javascript:void(0)" >'.$v['kq_name'].'</a>';
			echo '</li>';
		}
	}else{
		echo '没有数据';
	}
	
	echo '</ul></div>';
}elseif($data['action']=='onemsg'){
	$id='';
	if(isset($data['id']))
	{
		$id=$data['id'];
	}
	$user=get_first_date('user',"where id='".$id."' order by id desc");
	echo '
	<table id="kq" class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="400">
		<tr>
			<td>用户名</td>
			<td>'.$user['kq_name'].'</td>
			<td>电话</td>
			<td>'.$user['kq_tel'].'</td>
		</tr>
		<tr>
			<td>头像</td>
			<td><img src="'.pic_url($user['kq_picurl']).'" /></td>
		
			<td>邮箱</td>
			<td>'.($user['kq_email']).'</td>
		</tr>
		<tr>
			<td>地址</td>
			<td colspan="3">'.($user['kq_address']).'</td>
		</tr>
		
	</table>
	';

}


?>