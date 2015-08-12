<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
if (!defined("KQ_WORK")){
	 exit("非法操作");
}
$btnaction="";//提交状态
//是否有权限
$hasaccess=0;
//本页配置信息     
$pagename="会员";
$addname='';
$actionmd5=md5("user_add");
$message="权限不够不能操作";//游客提示语    
$backurl="user_list";

if (!permission("root")){
	 	$actionurl="";
    $hasaccess=0;
	 	$btnaction='disabled="disabled"';
	 }else{
		$actionurl="action/ac_add.php";
    $hasaccess=1;
}
	 
 ?>

<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div>
<?php  if(!$hasaccess){?>
<div class="gonggao">
  <h3>温馨提示：</h3>
  <p><?php echo $message?></p>
</div>
<?php
}
?>
<div id="mainBox">
  <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>添加</h3>
  <div class="idTabs">
    <ul class="tab">
      <li><a class="selected" href="#main"><?php echo $pagename?>添加</a></li>
    </ul>
    <div class="items">
      <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
        <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td align="right" width="100"><?php echo $pagename?>名字：</td>
              <td><input name="kq_name" size="40" class="inpMain" type="text" id="kq_name"></td>
            </tr>
            <tr>
              <td align="right"><?php echo $pagename?>密码：</td>
              <td><input name="kq_pwd" size="40" class="inpMain" type="password" id="addkq_pwd"></td>
            </tr>
             <tr>
              <td align="right" width="100"><?php echo $pagename?>头像：</td>
              <td><input name="kq_picurl" size="40" class="inpMain" type="text" id="kq_picurl"><input name="submit2" class="btn " onClick="updatepic('kq_picurl','ylpics')" value="上传图片" type="button" /></td>
            </tr>

            <tr>
              <td align="right">图片预览：</td>
              <td colspan="2" id="ylpics">
                <img src="images/nopic.gif" height="100"  />
              </td>
            </tr>
            <tr>
              <td align="right" width="100"><?php echo $pagename?>邮箱：</td>
              <td><input name="kq_email" size="40" class="inpMain" type="text" id="kq_name"></td>
            </tr>
             <tr>
              <td align="right" width="100"><?php echo $pagename?>年龄：</td>
              <td><input name="kq_age" size="40" class="inpMain" type="text" id="kq_name"></td>
            </tr>
            </tr>
             <tr>
              <td align="right" width="100"><?php echo $pagename?>手机：</td>
              <td><input name="kq_tel" size="40" value="" class="inpMain" type="text" ></td>
            </tr>
             <tr>
              <td align="right" width="100"><?php echo $pagename?>地址：</td>
              <td><input name="kq_address" size="40" class="inpMain" type="text" id="kq_name"></td>
            </tr>
            <tr>
              <td align="right">性别</td>
              <td>
                男
                <input name="kq_sex" type="radio" id="radio" value="1" checked="checked" />
                女
                <input type="radio" name="kq_sex" id="radio2" value="2" /></td>
            </tr>
            <tr>
              <td align="right">是否启用</td>
              <td>
                是
                <input name="kq_checked" type="radio" id="radio" value="1" checked="checked" />
                否
                <input type="radio" name="kq_checked" id="radio2" value="0" /></td>
            </tr>
            <tr>
              <td></td>
              <td><input name="submit" class="btn userbtn" value="提交" <?php echo $btnaction?>  type="submit"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<script>
  $(".userbtn").on('click', function(event) {
      var pwd=$("#addkq_pwd");
      var name=$("input[name='kq_name']");
      if(name.val()==""){
        Alert_msg(name,"会员名称不能为空");
        return false;
      
      }
      
    
  });
</script>