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
//本页配置信息
$pagename="友链";
$backurl="youlink_list";
$addname='';
$actionmd5=md5("link_add");
$btnaction="";//提交状态
if(!permission("link")){
  $actionurl="";
  $hasaccess=0;
  $btnaction='disabled="disabled"';
}else{
  $hasaccess=1;
  $actionurl="action/ac_add.php";
};
  $message="没有权限，不能添加友链";//游客提示语
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
  <div class="idTabs  kq_li">
    <ul class="tab">
      <li><a  href="javascript:void(0)"><?php echo $pagename?></a></li>
    </ul>
    <div class="items">
      <div class="kq_div">
        <div  id="main">
          <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td align="right" width="100"><?php echo $pagename?>名称：</td>
                  <td colspan="2"><input name="kq_name" size="40" class="inpMain" type="text" id="lk_name"></td>
                </tr>
                <tr>
                  <td align="right"><?php echo $pagename?>网址：</td>
                  <td colspan="2"><input name="kq_url" type="text" class="inpMain" id="addam_pwd" size="40"></td>
                </tr>
                <tr>
                  <td align="right">LOGO：</td>
                  <td width="300"><input name="kq_pic" size="40" class="inpMain" type="text" id="lk_pic" /></td>
                  <td width="620"><input name="submit2" class="btn" onClick="updatepic('lk_pic','ylpics')" value="上传图片" type="button" /></td>
                </tr>
                <tr>
                  <td align="right">图片预览</td>
                  <td colspan="2"><img src="images/nopic.gif" height="100" id="ylpics" /></td>
                </tr>
                <tr>
                  <td align="right"><?php echo $pagename?>PR值：</td>
                  <td colspan="2"><label for="kq_pr"></label>
                    <select name="kq_pr" id="kq_pr">
                      <option value="1">PR1</option>
                      <option value="2">PR2</option>
                      <option value="3">PR3</option>
                      <option value="4">PR4</option>
                      <option value="5">PR5</option>
                      <option value="6">PR6</option>
                      <option value="7">PR7</option>
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