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
if(!permission("lanmu")){
  new Alert("没有权限操作","back");
  exit();
} 
    
$sqlshow=$conn->selectall("".DB_EXT."city","where kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
$bid=$show_r['kq_fid'];

//本页配置信息
$pagename="栏目";
$backurl="city_list";
$addname='';
$ctionmd5=md5("city_update");
$btnaction="";//提交状态
$actionurl="action/ac_update.php";
$message="权限不够不能添加信息";//游客提示语
$classarr=get_city_array();
$cofig=get_config();
$setlanmu=array();
  if($cofig['kq_setlanmu']){
    $setlanmu=json_decode($cofig['kq_setlanmu'],true);
  }

 ?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div> 
<div id="mainBox">
  <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>更新</h3>
  <div class="idTabs kq_li">
    <ul class="tab">
      <li>
        <a  href="#"><?php echo $pagename?>更新</a>
      </li>
    </ul>
    <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
      <div class="kq_div">
        <div class="items">
          <input name="id" type="hidden" value="<?php echo $id?>" />
          <input name="type" type="hidden" value="<?php echo $ctionmd5?>" />
          <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td align="right" width="180">
                  <?php echo $pagename?>名字：</td>
                <td colspan="3">
                  <input name="kq_title" type="text" class="inpMain" id="kq_title" value="<?php echo $show_r['kq_title']?>" size="40">
                </td>
              </tr>
              <tr class="model_tr2">
                <td align="right">是否为省份：</td>
                <td width="210">
                  是
                  <input name="kq_islast" type="radio" id="radio3" <?php echo_check($show_r['kq_islast'],'1')?> value="1" />
                  否
                  <input type="radio" name="kq_islast" id="radio4" <?php echo_check($show_r['kq_islast'],'0')?> value="0" />
                </td>
                <td></td>
              </tr>
              <tr>
                <td align="right">所属城市：</td>
                <td colspan="3">
                  <select name="kq_fid" id="kq_fid">
                    <option value="0">根城市</option>
                     <?php  classfl();?>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>

        </div>

      </div>
      <!--kq-->
      <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td width="160"></td>
            <td>
              <input name="submit" class="btn classbtn" value="提交" type="submit"></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
<?php
function classfl($fid=0,$num=0){
  
    global $classarr,$bid;   
 
    for($i=0;$i<count($classarr);$i++){        
           if($classarr[$i][1]==$fid){       
          //本ID就选中父元素
        if($classarr[$i][0]==$bid){
             echo "<option value=".$classarr[$i][0]." selected='selected'>";  
                 echo str_repeat("&nbsp;&nbsp;", $num)."|-".$classarr[$i][2]."</option>";   
          }else{
               echo "<option value=".$classarr[$i][0].">";  
                 echo str_repeat("&nbsp;&nbsp;", $num)."|-".$classarr[$i][2]."</option>";   
            }
        
    
            classfl($classarr[$i][0],$num+2);   
    }  
    }  
  }   
?> 
<script>

  

  
  );//判断选择状态
$(".btn").on('click',  function(event) {
  var name=$("#kq_title");
  if(name.val()==''){
    Alert_msg(name,"城市名称不能为空");
    return false;
  }
});

</script>