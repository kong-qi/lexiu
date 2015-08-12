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

	if(!isset($_GET['picid'])){
	new Alert("非法操作","back");
	
	}else{
		$picid=$_GET['picid'];//信息ID
		};	
	if(!isset($_GET['id'])){
	new Alert("非法操作","back");
	
	}else{
		$newsid=$_GET['id'];//新闻ID
		};	

//本页配置信息
$pagename="相册";
$pageactionmd5=md5("pic_update");
$btnaction="";//提交状态
 if(!permission("msg_edit",$_SESSION['adgroup'])){
	 
	 $pagefromaction="";
	 $btnaction='disabled="disabled"';
	 }else{
		 $pagefromaction="action/ac_update.php";
		 };
		 
	$newstitlesql=$conn->selectone("".DB_EXT."news","ms_title,uuid","where ms_id='".$newsid."'");
	$news_r=$conn->result($newstitlesql);
	
$ykmessage="权限不够不能操作";//游客提示语		 
$sqlshow=$conn->selectall("".DB_EXT."newspic","where npic_id='".$picid."'");
$show_r=dell_slashes($conn->result($sqlshow));
$golist="index.php?name=pic&id=".$newsid;//返回列表				 
 ?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> <b>&gt;</b><strong><?php echo $news_r['ms_title']?></strong></div> 
<?php  if(!permission("msg_edit",$_SESSION['adgroup'])){?>
<div class="gonggao">
<h3>温馨提示：</h3>
<p><?php echo $ykmessage?></p>
</div>  <?php
}
?>
<div id="mainBox">
      <h3><a href="<?php echo $golist;?>" class="actionBtn">返回列表</a><?php echo $pagename?>添加</h3>
    <div class="idTabs">
      <ul class="tab">
        <li><a class="selected" href="#main"><?php echo $pagename?>添加</a></li>
     
      </ul>
      <div class="items">
    <form action="<?php echo $pagefromaction?>" method="post" enctype="multipart/form-data">
    <input name="type" type="hidden" value="<?php echo $pageactionmd5?>" />
    <input name="npic_newsid" type="hidden" value="<?php echo $newsid?>" />
    <input name="id" type="hidden" value="<?php echo $picid?>" />
     <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
         <tbody>
             <tr>
                <td width="156" align="right">相册图片</td>
                <td class="td"><table width="100%" border="0" cellspacing="0" cellpadding="8" class="subtable">
                  <tr>
                    <td width="33%"><input name="npic_picurl" value="<?php echo $show_r['npic_picurl']?>" size="40" class="inpMain" type="text" id="kq" /></td>
                    <td width="15%"><input name="submit3" class="btn uppic" onClick="updatepic('kq')" value="点击上传图片" type="button" /></td>
                    <td width="52%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><img src="<?php echo $show_r['npic_picurl']?>" height="120" class="ylpic"  /></td>
                  </tr>
                </table></td>
              </tr>
             </tbody>
                  </table>
     <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
     
      <tr>
        <td></td>
        <td>
          
          <input name="submit" class="btn picbtn" value="提交" <?php echo $btnaction?>  type="submit">
          </td>
      </tr>
     </tbody></table>
 </form>
       </div>
       </div>
       </div>
       <script>

       $("#kq").change(function(){		   
		   var src=$(this).val();
		   $(".ylpic").attr({src:src});
		   })
       </script>