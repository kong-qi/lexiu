<?php
 /*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
if(!defined("KQ_WORK")){
  exit("非法操作");
}
if(!isset($_GET['id'])){
  new Alert("非法操作","back");
  exit(); 
}else{
	 
 	$id=setdefensesql($_GET['id']);
	
}
if(!permission("root")){
	 new Alert("没有权限操作","back");
	exit();
}	
	
$sqlshow=$conn->selectall("".DB_EXT."user","where kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
 
 //本页配置信息
$pagename="会员";
$addname='';
$backurl="user_list";
$actionurl="action/ac_update.php";
$actionmd5=md5("user_update");
 ?>

<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>更新</strong> </div>
<div id="mainBox">
  <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>更新</h3>
  <div class="idTabs">
    <ul class="tab">
      <li><a class="selected" href="#main"><?php echo $pagename?>更新</a></li>
    </ul>
    <div class="items">
      <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
        <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
        <input name="id" type="hidden" value="<?php echo $id?>" />
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td align="right" width="100"><?php echo $pagename?>名字：</td>
              <td><input name="kq_name" size="40" value="<?php echo $show_r['kq_name']?>" class="inpMain" type="text" id="kq_name"></td>
            </tr>
            <tr>
              <td align="right"><?php echo $pagename?>密码：</td>
              <td><input name="kq_pwd"  size="40" class="inpMain" type="password" id="kq_pwd">
                <span class="empty_tip">密码不修改为空</span></td>
            </tr>
             <tr>
              <td align="right" width="100"><?php echo $pagename?>头像：</td>
              <td><input name="kq_picurl" size="40" value="<?php echo $show_r['kq_picurl']?>" class="inpMain" type="text" id="kq_picurl"><input name="submit2" class="btn " onClick="updatepic('kq_picurl','ylpics')" value="上传图片" type="button" /></td>
            </tr>

            <tr>
              <td align="right">图片预览：</td>
              <td colspan="2" id="ylpics">
                <img src="<?php echo pic_url($show_r['kq_picurl'])?>" height="100"  />
              </td>
            </tr>
            <tr>
              <td align="right" width="100"><?php echo $pagename?>邮箱：</td>
              <td><input name="kq_email" size="40" value="<?php echo $show_r['kq_email']?>" class="inpMain" type="text" id="kq_name"></td>
            </tr>
             <tr>
              <td align="right" width="100"><?php echo $pagename?>手机：</td>
              <td><input name="kq_tel" size="40" value="<?php echo $show_r['kq_tel']?>" class="inpMain" type="text" id="kq_name"></td>
            </tr>
             <tr>
              <td align="right" width="100"><?php echo $pagename?>年龄：</td>
              <td><input name="kq_age" size="40" value="<?php echo $show_r['kq_age']?>" class="inpMain" type="text" id="kq_name"></td>
            </tr>
             <tr>
              <td align="right" width="100"><?php echo $pagename?>地址：</td>
              <td><input name="kq_address" size="40" class="inpMain" value="<?php echo $show_r['kq_address']?>" type="text" id="kq_name"></td>
            </tr>
            <tr>
              <td align="right">性别</td>
              <td>
                男
                <input name="kq_sex" type="radio" id="radio" value="1" <?php echo_check($show_r['kq_sex'],1);?> />
                女
                <input type="radio" name="kq_sex" id="radio2" value="2" <?php echo_check($show_r['kq_sex'],2);?> /></td>
            </tr>
            <tr>
              <td align="right">是否启用</td>
              <td>是
                <input name="kq_checked" type="radio" id="radio" value="1" <?php echo_check($show_r['kq_checked'],1);?>  />
                否
                <input type="radio" name="kq_checked" id="radio2" value="0" <?php echo_check($show_r['kq_checked'],0);?>/></td>
            </tr>
            <tr>
              <td></td>
              <td><input name="submit" class="btn" value="更新" type="submit"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<script>
  $(".btn").on('click', function(event) {
      var pwd=$("#kq_pwd");
      var name=$("input[name='kq_name']");
      if(name.val()==""){
        Alert_msg(name,"管理员名称不能为空");
        return false;
      
      }
      if(pwd.val()!=''){
          if((pwd.val().length)<6){
             Alert_msg(pwd,"密码不能为空或小于6位数");
             return false;
          }
      }
     
  });
</script>