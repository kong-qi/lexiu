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
if(!permission("link")){
  new Alert("没有权限操作","back");
}	

$sqlshow=$conn->selectall("".DB_EXT."youlink","where kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));

 //本页配置信息
$pagename="友链";
$backurl="youlink_list";
$addname='';
$btnaction="";//提交状态
$actionurl="action/ac_update.php";
$actionmd5=md5("youlink_update");
 ?>

<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>更新</strong> </div>
<div id="mainBox">
  <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>更新</h3>
  <div class="idTabs  kq_li">
    <ul class="tab">
      <li><a  href="#main">友情链接更新</a></li>
    </ul>
    <div class="items">
      <div class="kq_div">
        <div  id="main">
          <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <input name="id" type="hidden" value="<?php echo $id?>" />
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td align="right" width="100"><?php echo $pagename?>名称：</td>
                  <td colspan="2"><input name="kq_name" type="text" class="inpMain" id="kq_name" value="<?php echo $show_r['kq_name']?>" size="40"></td>
                </tr>
                <tr>
                  <td align="right"><?php echo $pagename?>网址：</td>
                  <td colspan="2"><input name="kq_url" type="text" value="<?php echo $show_r['kq_url']?>" class="inpMain" id="addam_pwd" size="40"></td>
                </tr>
                <tr>
                  <td align="right">LOGO：</td>
                  <td width="300"><input name="kq_pic" size="40" class="inpMain" value="<?php echo $show_r['kq_pic']?>" type="text" id="kq_pic" /></td>
                  <td width="620"><input name="submit2" class="btn" onClick="updatepic('kq_pic','ylpics')" value="上传图片" type="button" /></td>
                </tr>
                <tr>
                  <td align="right">图片预览</td>
                  <td colspan="2" id="ylpics"><a href="<?php echo pic_url($show_r['kq_pic']) ?>" target="_blank"><img src="<?php echo pic_url($show_r['kq_pic']) ?>" height="100"  /></a></td>
                </tr>
                <tr>
                  <td align="right"><?php echo $pagename?>PR值：</td>
                  <td colspan="2"><label for="kq_pr"></label>
                    <select name="kq_pr" id="kq_pr">
                      <option value="1" <?php echo_check($show_r['kq_pr'],'1','');?> >PR1</option>
                      <option value="2" <?php echo_check($show_r['kq_pr'],'2','');?>>PR2</option>
                      <option value="3" <?php echo_check($show_r['kq_pr'],'3','');?>>PR3</option>
                      <option value="4" <?php echo_check($show_r['kq_pr'],'4','');?>>PR4</option>
                      <option value="5" <?php echo_check($show_r['kq_pr'],'5','');?>>PR5</option>
                      <option value="6" <?php echo_check($show_r['kq_pr'],'6','');?>>PR6</option>
                      <option value="7" <?php echo_check($show_r['kq_pr'],'7','');?>>PR7</option>
                    </select></td>
                </tr>
              </tbody>
            </table>
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100"></td>
                  <td><input name="submit" class="btn linkbtn" value="提交" type="submit"></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(".linkbtn").on("click",function(){
      var name=$("input[name='kq_name']");
      var picurl=$("input[name='kq_url']");
      if(name.val()==""){
         Alert_msg(name,"名称不能为空");
         return false;
        }
        if(picurl.val()==""){
         Alert_msg(picurl,"网址不能为空");
         return false;
        }
    });
</script>