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
$id="kongqi";
//本页配置信息
$pagename="伪静态规则";
$pageactionmd5=md5("wjt_update");
$btnaction="";//提交状态
if(!permission("wjt")){
  $actionurl="";
  $btnaction='disabled="disabled"';
  $hasaccess=0;
}else{
  $actionurl="action/ac_update.php";
  $hasaccess=1;
};
		 

$message="游客身份不能添加信息";//游客提示语
	 		 
 ?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div> 
<?php  if(!$hasaccess){?>
<div class="gonggao">
<h3>温馨提示：</h3>
<p><?php echo $message?></p>
</div>  <?php
}
?>
<div id="mainBox">
    <h3><?php echo $pagename?>添加</h3>
    <div class="idTabs">
      <ul class="tab">
      <li><a class="selected" href="#main"><?php echo $pagename?>添加</a></li>
      </ul>
    <div class="items">
      <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
        <input name="type" type="hidden" value="<?php echo $pageactionmd5?>" />
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
          <tbody>
          <tr>
            <td>
              <textarea name="weijintai" class="textArea" id="textarea" cols="80" rows="10"><?php 
		            echo file_get_contents(CMS_PATH.".htaccess");
		          ?>
              </textarea>
            </td>
            <td width="496">伪静态规则例子(回车每条记录)：<br/>
            <pre>
                RewriteEngine on
                RewriteBase /
                RewriteRule ^theme-(.*)$ theme.php?name=$1</pre>
            </td>
          </tr>
          <tr>
            <td width="557"><input name="submit" class="btn admin" value="提交" <?php echo $btnaction?>  type="submit" /></td>
            <td>&nbsp;</td>
          </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>