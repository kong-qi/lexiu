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
 
  if(!isset($_GET['page'])){
	 $page=1;
	 }else{
	 
		 $page=intval($_GET['page']);
	 }
	 if(!isset($_GET['id'])){
	new Alert("非法操作","back");
	
	}else{
		$newsid=$_GET['id'];//信息ID
		};	
	 
	 
	 //本页信息
	 $pagename="相册图片";
     $ykmessage="游客身份不能操作信息";//游客提示语
	 $updateurl="pic_update";
     $deleturl=md5("pic_dell");
     $alldeleturl=md5("pic_all");	
     $sortrel=md5("pic_sort");
	 $pageurl="pic&id=".$newsid;
	$newstitlesql=$conn->selectone("".DB_EXT."news","ms_title,ms_lanmuid","where ms_id='".$newsid."'");
	$news_r=$conn->result($newstitlesql);
	
	$golist="index.php?name=news&amp;lmid=".$news_r['ms_lanmuid'];//返回列表
 $list_sql=$conn->selectall("".DB_EXT."newspic","where npic_newsid='".$newsid."' order by npic_id desc limit ".($page-1)*$pagesize.",".$pagesize."");
 $list_total=$conn->rows($conn->selectall("".DB_EXT."newspic","where npic_newsid='".$newsid."'"));

 
 ?>

   <!-- 当前位置 -->
   <div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?></strong><b>&gt;</b><strong><?php echo $news_r['ms_title']?></strong></div>
   
   <?php  if(!permission("",$_SESSION['adgroup'])){?>
<div class="gonggao">
<h3>温馨提示：</h3>
<p><?php echo $ykmessage?></p>
</div>  <?php
}
?>
   
   <div id="mainBox">
      <h3><a href="index.php?name=pic_add&newsid=<?php echo $newsid;?>" class="actionBtn add">添加<?php echo $pagename?></a><?php echo $pagename?>列表<a href="<?php echo $golist?>" class="actionBtn">返回列表</a></h3>
    
        <div id="list_pic">
        
    <form name="del" method="post" action="action/ac_dell.php?type=<?php echo $alldeleturl?>" class="admin_form">
    <?php
    if(!$list_total){
		echo "没有记录";
		}else{
	?>
    <dl>
    <?php
    while($list_r=$conn->result($list_sql)){
	 $list_r=dell_slashes($list_r);
	 
	 
	?>
      <dd>
      <div class="list_pic_img"><?php if(!$list_r['npic_picurl']){
		  
		  }else{
			  echo '<img src="'.$list_r['npic_picurl'].'" width="100" height="80" class="fmpic"  />';
			  
			  }?></div><!--list_pic_img-->
      <div class="list_pic_title">
      <input  name="checkbox[]" value="<?php echo $list_r['npic_id']?>" type="checkbox" class="picsort" />
      <input name="sort[]" type="text" value="<?php echo $list_r['npic_sort']?>" class="pic_sort" id="sort[]" size="2" />
     <a href="index.php?name=<?php echo $updateurl?>&amp;id=<?php echo $newsid?>&amp;picid=<?php echo $list_r['npic_id']?>" title="修改"><img src="images/editpic.png"  /></a>
      <a href="action/ac_dell.php?type=<?php echo $deleturl?>&amp;id=<?php echo $list_r['npic_id']?>" title="删除"><img src="images/closed.png"  /></a>
      </div><!--list_pic_title-->
      </dd>
      <?php }?>
     
      
    <div class="clear"></div>
    </dl><!--dl-->
	<?php }?>
    <div class="clear"></div>
	
	<?php  if(permission("msg_edit",$_SESSION['adgroup'])){?>
    <div class="action">全选：<input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox">&nbsp;&nbsp;&nbsp;<input name="submit" class="btn" value="删除" type="submit"><input name="sortbtn" rel="<?php echo $sortrel?>" class="btn mr10" value="排序" type="submit"></div><?php }?>
    </form>
    </div>
    <div class="clear"></div>
    <div class="pager">
    <?php 
$subPages=new SubPages($pagesize,$list_total,$page,$sub_pages,"index.php?name=".$pageurl."&amp;page=",2)
?>
   </div>       </div>
  <script>
  



</script>
