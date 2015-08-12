<?php
define("KQ_WORK",true);
require_once("inc/base.inc.php");
$ed='';
if(isset($_GET['ed']))
{
$ed=$_GET['ed'];
}
if(!isset($_COOKIE['uid'])){
	echo "<script>alert('请登陆后操作');window.location.href='/';</script>";
	exit();
}
$user=is_login($_COOKIE['uid']);


?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title><?php echo $kq_title?></title>
  <meta name="keywords" content="<?php echo $kq_keyword?>" />
  <meta name="description" content="<?php echo $kq_description?>" />
 <?php require_once(KQ_PATH.'inc/style.inc.php');?>
</head>
<body>
    <?php require_once(KQ_PATH.'inc/state.inc.php');?>
  <div class="warp">
    <!-- 头部 -->
    <?php require_once(KQ_PATH.'inc/header.inc.php');?>
    <!-- 中间内容 -->
    		<div class="help_warp ">
    			<div class="wm1000">
    			<div class="help_cont">
    				<div class="left">
    				<?php require_once(KQ_PATH.'inc/user_left.inc.php');?>
    				</div>
    				<div class="right">
    					<div class="user_warp">
    						<div class="user_msg_dl">
	    						<h3>亲，您好，欢迎来到<?php echo $kq_name?></h3>
	    						<?php if(!$ed){?>
	    						<dl >
	    							<dt> <img src="<?php echo pic_url($user['kq_picurl'])?>" alt=""> </dt>
	    							<dd>

	    								<table>
	    									<tr>
	    										<td><span>昵称</span></td>
	    										<td><?php echo $user['kq_name']?></td>
	    									</tr>
	    									<tr>
	    										<td><span>QQ</span></td>
	    										<td><?php echo $user['kq_qq']==''?'没有填写':$user['kq_qq'];?></td>
	    									</tr>
	    									<tr>
	    										<td><span>性别</span></td>
	    										<td><?php echo $user['kq_sex']==1?'男':'女';?></td>
	    									</tr>
	    									<tr>
	    										<td><span>手机</span></td>
	    										<td><?php echo $user['kq_tel']==''?'没有填写':$user['kq_tel'];?></td>
	    									</tr>
	    									<tr>
	    										<td><span>地址</span></td>
	    										<td><?php echo $user['kq_address']==''?'没有填写':$user['kq_address'];?></td>
	    									</tr>
	    								</table>
	    							</dd>
	    							<div class="clear_float">
	    								
	    							</div>
	    						</dl>
    						</div>
    						<div class="clear_float"></div>
    						<?php
    						}else{	
    						?>
    						<div class="user_msg_ed">
    							
    							<table>
    								<tr>
    									<td><span>昵称</span></td>
    									<td><input name="kq_name" value="<?php echo $user['kq_name']?>" size="20" class="inpMain"  type="text"></td>
    								</tr>
    								<tr>
    									<td><span>QQ</span></td>
    									<td><input name="kq_qq" value="<?php echo $user['kq_qq']?>" size="20" class="inpMain"  type="text"></td>
    								</tr>
    								<tr>
    									<td><span>性别</span></td>
    									<td>男 <input name="kq_sex" id="site_closed_0" <?php echo_check($user['kq_sex'],1)?> value="1" checked="checked" type="radio">
    									 女 <input name="kq_sex" id="site_closed_0"  <?php echo_check($user['kq_sex'],2)?> value="2"  type="radio"></td>
    								</tr>
    								<tr>
    									<td><span>手机</span></td>
    									<td><input name="kq_tel" value="<?php echo $user['kq_tel']?>" size="20" class="inpMain"  type="text"></td>
    								</tr>
    								<tr>
    									<td><span>地址</span></td>
    									<td><textarea name="kq_address" cols="70" rows="5" class="textArea" id="kq_tongji"><?php echo $user['kq_address']?></textarea></td>
    								</tr>
    								<tr>
    									<td></td>
    									<td><input name="submit" class="btn user_up" value="提交" type="submit"></td>
    								</tr>
    							</table>
    							
    						</div>
    						<?php
    						}
    						?>
    					</div>

    				</div>
    				<div class="clear_float"></div>
    			</div>
    			
    			<div class="clear_float"></div>
    			</div>
    			<div class="clear_float"></div>
    		</div><!-- help_warp -->
    <!-- 底部 -->
    <?php require_once(KQ_PATH.'inc/footer.inc.php');?>
  </div>
</body>
  <script>
  	$(".user_up").on('click',  function(event) {
  		var name=$("input[name='kq_name']").val();
  		var qq=$("input[name='kq_qq']").val();
  		var sex=$("input[name='kq_sex']:checked").val();
  		var tel=$("input[name='kq_tel']").val();
  		var address=$("textarea[name='kq_address']").val();
  		
  			$.post('inc/action.php',{action:'user_up',kq_name:name,kq_qq:qq,kq_sex:sex,kq_tel:tel,kq_address:address},function(data){
  				
  				if(data){
  					alert('更新成功');
  					window.location.href='user.html';
  				}else{
  					alert('更新失败，再试一次');
  				}
  			});
  	});
  
  </script>
</html>
