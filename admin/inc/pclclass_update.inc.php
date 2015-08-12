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
$sqlshow=$conn->selectall("".DB_EXT."prdclass","where uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
$dfid=$show_r['pcl_fid'];
$bid=$show_r['pcl_id'];
echo $bid;

//本页配置信息
$pagename="产品分类修改";
$pageactionmd5=md5("pclclass_update");
$btnaction="";//提交状态
$pagefromaction="action/ac_update.php";

$ykmessage="游客身份不能添加信息";//游客提示语		 
$classql=$conn->selectall("".DB_EXT."prdclass","where pcl_islast='1'");	
	 
 while($class_r=$conn->result($classql)){
	$classarr[]=array($class_r['pcl_id'],$class_r['pcl_fid'],$class_r['pcl_name']);
	
	}
		 
 ?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div> 
<?php  if(!permission("",$_SESSION['adgroup'])){?>
<div class="gonggao">
<h3>温馨提示：</h3>
<p><?php echo $ykmessage?></p>
</div>  <?php
}
?>
<div id="mainBox">
      <h3><?php echo $pagename?>添加</h3>
    <div class="idTabs kq_li">
      <ul class="tab">
        <li><a  href="#"><?php echo $pagename?>添加</a></li>
     <li><a href="#">SEO设置</a></li>
      </ul>
     <form action="<?php echo $pagefromaction?>" method="post" enctype="multipart/form-data"> <div class="kq_div">
      
      <div class="items">
    <input name="id" type="hidden" value="<?php echo $id?>" />
    <input name="type" type="hidden" value="<?php echo $pageactionmd5?>" />
     <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
      <tbody><tr>
        <td align="right" width="160"><?php echo $pagename?>名字：</td>
        <td colspan="2">
          <input name="pcl_name" type="text" class="inpMain" id="pcl_name" value="<?php echo $show_r['pcl_name']?>" size="40">
          </td>
      </tr>
      <tr>
        <td align="right">所属目录：</td>
        <td colspan="2">
          <select name="pcl_fid" id="pcl_fid">
            <option value="0">根目录</option>
            <?php  classfl()?>

            </select></td>
      </tr>
      <tr class="model_tr2">
        <td align="right">是否大类目：</td>
        <td width="173">是
          <input name="pcl_islast" type="radio" id="radio3" value="1" <?php if($show_r['pcl_islast']==1){
			  echo 'checked="checked"';
			  }?>  />
否
<input type="radio" name="pcl_islast" id="radio4" value="0" <?php if($show_r['pcl_islast']==0){
			  echo 'checked="checked"';
			  }?> /></td>
        <td width="581">是终极则只能作为分类大类，不能往里面添加文章。</td>
      </tr>

      </tbody></table>
 
       </div>
       <div class="hide">
           <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
         <tbody>
             <tr>
          <td align="right">SEO标题</td>
          <td>
                      <input name="pcl_title" type="text" class="inpMain" id="pcl_title" value="<?php echo $show_r['pcl_title']?>" size="80">
                                </td>
         </tr>
                  <tr>
                    <td align="right">SEO关键词</td>
                    <td><input name="pcl_keyword" type="text" class="inpMain" id="pcl_keyword" value="<?php echo $show_r['pcl_keyword']?>" size="80" /></td>
                  </tr>
       
                  <tr>
                    <td align="right">SEO描述</td>
                    <td><textarea name="pcl_miaosu" cols="70" rows="5" class="textArea" id="pcl_miaosu"><?php echo $show_r['pcl_miaosu']?></textarea></td>
            </tr>         
            </tbody>
                  </table>
        </div>
     
       </div><!--kq-->   <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
         <tbody>
           <tr>
          <td width="160"></td>
          <td>
           <input name="submit" class="btn classbtn" value="提交" type="submit">
          </td>
         </tr>
        </tbody></table></form>
       </div>
       </div>
       
<?php

function classfl($fid=0,$num=0){

global $classarr,$bid,$dfid;   

for($i=0;$i<count($classarr);$i++){        
 if($classarr[$i][1]==$fid){       
//本ID就选中父元素
if($classarr[$i][0]==$dfid){
if($classarr[$i][0]==$bid){
	
	
	}else{


echo "<option value=".$classarr[$i][0]." selected='selected'>";  
       echo str_repeat("&nbsp;&nbsp;", $num)."|-".$classarr[$i][2]."</option>";}

}else{
if($classarr[$i][0]==$bid){
	
	
	}else{
  echo "<option value=".$classarr[$i][0].">";  
       echo str_repeat("&nbsp;&nbsp;", $num)."|-".$classarr[$i][2]."</option>";
}
 }



  
       classfl($classarr[$i][0],$num+2);   
}  


}


}   


?> 
