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
if (!permission("root")){
	 	$actionurl="";
    $hasaccess=0;
	 	$btnaction='disabled="disabled"';
	 }else{
		$actionurl="action/ac_update.php";
    $hasaccess=1;
		$btnaction="";
}
$message="权限不够不能操作信息";//游客提示语
$id=setdefensesql("kongqi");
$sqlshow=$conn->selectall("".DB_EXT."config","where kq_basename='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
 ?>
<div id="urHere"> 管理中心<b>&gt;</b><strong>网站配置设定</strong> </div>   
<?php  if(!$hasaccess){?>
<div class="gonggao">
  <h3>温馨提示：</h3>
  <p><?php echo $message?></p>
</div>
<?php
}
?>
      
    <div id="mainBox">
    <h3>系统设置</h3>
    <div class="idTabs kq_li">
      <ul class="tab">
        <li><a  href="#">开发设置</a></li>
        
        
     
      </ul>
      <div class="items">
       <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
       <input name="type" type="hidden" value="<?php echo md5("base")?>" />
       <div class="kq_div">
        <div  id="main">
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
         <tbody><tr>
           <th width="131">名称</th>
           <th>内容</th>
            </tr>
            <tr>
                <td align="right">配置json</td>
                 <td>
                   <textarea name="kq_openconfig" cols="70" rows="5" class="textArea" id="openconfig"><?php echo $show_r['kq_openconfig']?></textarea>
                 </td>
            </tr>
            </tbody>
          </table>

        </div>
        </div>
        
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
         <tbody><tr>
          <td width="131"></td>
          <td>
           <input name="submit" <?php echo $btnaction;?> class="btn" value="提交" type="submit">
          </td>
         </tr>
        </tbody></table>
        </form>
      </div>
    </div>
   </div>
