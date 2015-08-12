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
  new Alert("nocome","back");
  exit(); 
}else{
  $id=setdefensesql($_GET['id']);

}
if(!permission("root")){
  new Alert("没有权限操作","back");
  exit();
} 
	 

//本页配置信息
$pagename="导航自定义";
$addname='';
$backurl="nav_list";
$btnaction="";//提交状态
$actionurl="action/ac_update.php";
$actionmd5=md5("nav_update");


//导航调用
$navarray=array();
$navclassql=$conn->selectall("".DB_EXT."nav","");
while($class_r=$conn->result($navclassql)){
  $navarray[]=array($class_r['id'],$class_r['kq_fid'],$class_r['kq_name']); 
}   		 

$sqlshow=$conn->selectall("".DB_EXT."nav","where  kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
$bid=$show_r['kq_fid'];	 
$lmbid=$show_r['kq_url'];
$classarr=get_class_array2();
?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div>
<div id="mainBox">
   <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>更新</h3>
  <div class="idTabs  kq_li">
    <ul class="tab">
      <li><a  href="javascript:void(0)">导航设置</a></li>
    
    </ul>
    <div class="items">
      <div >
        <div  id="main">
          <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
             <input name="id" type="hidden" value="<?php echo $id?>" />
            <div class="kq_div">
            <div class="items">
            <table class="tableBasic" border="0" cellpadding="5" cellspacing="1" width="100%">
              <tbody>
                <tr>
                  <td align="right" height="35" width="80">系统内容</td>
                  <td>
                    <select name="kq_url" id='url'>
                      <option value="">请您选择链接项目</option>
                      <?php classfl()?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align="right" height="35" width="80">导航名称</td>
                  <td>
                    <input id="title" name="kq_name" value="<?php echo $show_r['kq_name']?>" size="40" class="inpMain" type="text"></td>
                </tr>
                <tr>
                  <td align="right" height="35" width="80">英文名称</td>
                  <td>
                    <input  name="kq_ename" value="<?php echo $show_r['kq_ename']?>" size="40" class="inpMain" type="text"></td>
                </tr>
                <tr>
                  <td align="right" height="35" width="80">图标</td>
                  <td>
                    <input  name="kq_picurl" value="<?php echo $show_r['kq_picurl']?>" size="40" class="inpMain" id="kq_picurl" type="text">
                    <input name="submit2" class="btn" onClick="updatepic('kq_picurl','ylpics')" value="上传图片" type="button" />
                  </td>
                </tr>
                <tr>
                  <td align="right">图标预览：</td>
                  <td colspan="2" id="ylpics">
                    <img src="<?php echo pic_url($show_r['kq_picurl']);?>" height="100"  />
                  </td>
                </tr>
                <tr>
                  <td align="right" height="35" width="80">自定义链接</td>
                  <td>
                    <input  name="kq_wburl" value="<?php echo $show_r['kq_wburl']?>" size="40" class="inpMain" type="text"></td>
                </tr>
                <tr>
                  <td align="right" height="35">位置</td>
                  <td>
                    <label for="type_0">
                      <input name="kq_type" id="type_0" value="nav" <?php echo_check($show_r['kq_type'],'nav')?>  type="radio">主导航</label>
                    <label for="type_1">
                      <input name="kq_type" id="type_1" value="top"  <?php echo_check($show_r['kq_type'],'top')?> type="radio">顶部</label>
                    <label for="type_2">
                      <input name="kq_type" id="type_2" value="foot"  <?php echo_check($show_r['kq_type'],'foot')?> type="radio">底部</label>
                  </td>
                </tr>
                <tr>
                 <td align="right" height="35">上级分类</td>
                 <td id="parent">
                   <select name="kq_fid">
                    <option value="0">根节点</option>
                    <?php echo navfl();?>
                   </select>
                 </td>
               </tr>
                <tr>
                  <td align="right" height="35">排序</td>
                  <td>
                    <input name="kq_sort" value="<?php echo $show_r['kq_sort']?>" size="5" class="inpMain" type="text"></td>
                </tr>
                
              </tbody>
            </table>
             <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100"></td>
                  <td><input name="submit" class="btn" value="提交" type="submit"></td>
                </tr>
              </tbody>
            </table>
            </div>

            </div>
           
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php

function navfl($fid=0,$num=0){
  global $navarray;
  global $bid;
  
  for($i=0;$i<count($navarray);$i++){        
   if($navarray[$i][1]==$fid){
        if($navarray[$i][0]==$bid){
          echo "<option  value=".$navarray[$i][0]." selected='selected'>";  
        }else{
           echo "<option value=".$navarray[$i][0].">";  
        }
       
        echo str_repeat("&nbsp;&nbsp;", $num)."|-".$navarray[$i][2]."</option>";  
         navfl($navarray[$i][0],$num+2);   
    }  
  }  
}   

?> 
<?php
function classfl($fid=0,$num=0){
  
    global $classarr,$lmbid;   
 
    for($i=0;$i<count($classarr);$i++){        
           if($classarr[$i][1]==$fid){       
          //本ID就选中父元素
        if($classarr[$i][0]==$lmbid){
             echo "<option date='".$classarr[$i][2]."' value=".$classarr[$i][0]." selected='selected'>";  
                 echo str_repeat("&nbsp;&nbsp;", $num)."|-".$classarr[$i][2]."</option>";   
          }else{
               echo "<option date='".$classarr[$i][2]."' value=".$classarr[$i][0].">";  
                 echo str_repeat("&nbsp;&nbsp;", $num)."|-".$classarr[$i][2]."</option>";   
            }
        
    
            classfl($classarr[$i][0],$num+2);   
    }  
    }  
  }   
?> 

<script>
  $("#url").change(function(event) {
      var title=$("#url option:selected").attr('date');
      $("#title").val(title);
  });
  $(".btn").on('click',  function(event) {
    
  });
</script>