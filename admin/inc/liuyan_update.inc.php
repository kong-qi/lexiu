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

//本页配置信息
$pagename="留言";
$addname='';
$backurl="liuyan_list";
$actionmd5=md5("liuyan_update");
$btnaction="";//提交状态
if(!permission("liuyan")){
  $hasaccess=0;
  $actionurl="";
  $btnaction='disabled="disabled"';
}else{
  $actionurl="action/ac_update.php";
  $hasaccess=1;
};
$message="没有权限，不能操作";//游客提示语
$sqlshow=$conn->selectall("".DB_EXT."liuyan","where kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));

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
      <li >
        <a  href="javascript:void(0)" class="selected">
          <?php echo $pagename?></a>
      </li>
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
                  <td align="right" width="100">
                    <?php echo $pagename?>留言者：</td>
                  <td>
                    <input name="kq_name" size="40" class="inpMain" value="<?php echo $show_r['kq_name']?>" type="text" id="kq_name"></td>
                </tr>
                <tr>
                  <td align="right">留言IP：</td>
                  <td>
                    <input name="kq_ip" size="40" class="inpMain" value="<?php echo $show_r['kq_ip']?>" type="text" id="ly_author2" /></td>
                </tr>
                <tr>
                  <td align="right">留言内容：</td>
                  <td>
                    <label for="ly_content"></label>
                    <textarea name="kq_content" cols="45" rows="5" class="textArea" id="kq_content"><?php echo $show_r['kq_content']?></textarea>
                  </td>
                </tr>
              </tbody>
            </table>
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100"></td>
                  <td>
                    <input name="submit" class="btn liuyanbtn" value="提交" type="submit"></td>
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
  $(document).on('click', ".btn", function(event) {
    var name=$("#kq_name");
    var content=$("#kq_content");
    if(name.val()==""){
       Alert_msg(name,"留言者不能为空");
      return false;
     }
    if(content.val()==""){
       Alert_msg(content,"内容不能为空");
      return false;
     }
    
  });
</script>