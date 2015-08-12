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
$pagename="广告";
$actionmd5=md5("adv_add");
$btnaction="";//提交状态
if(!permission("adv")){
  $actionurl="";
  $btnaction='disabled="disabled"';
  $hasaccess=0;
}else{
  $actionurl="action/ac_add.php";
  $hasaccess=1;
};
$message="没有权限，不能添加广告";//游客提示语
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
  <h3>
    <?php echo $pagename?>添加</h3>
  <div class="idTabs  kq_li">
    <ul class="tab">
      <li>
        <a  href="javascript:void(0)">图片广告</a>
      </li>
      <li>
        <a  href="javascript:void(0)">代码广告</a>
      </li>
    </ul>
    <div class="items">
      <div class="kq_div">
        <div  id="main">
          <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <input name="kq_type" type="hidden" value="1" />
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td align="right" width="100">
                    <?php echo $pagename?>名称：</td>
                  <td colspan="2">
                    <input name="kq_name" size="40" class="inpMain" type="text" id="a_title1"></td>
                </tr>
                <tr>
                  <td align="right">
                    <?php echo $pagename?>链接：</td>
                  <td colspan="2">
                    <input name="kq_url" type="text" class="inpMain" id="addam_pwd" size="40"></td>
                </tr>
                <tr>
                  <td align="right">图片：</td>
                  <td width="300">
                    <input name="kq_picurl" size="40" class="inpMain" type="text" id="kq_picurl" />
                  </td>
                  <td width="620">
                    <input name="submit2" class="btn" onClick="updatepic('kq_picurl','ylpics')" value="上传图片" type="button" />
                  </td>
                </tr>
                <tr>
                  <td align="right">图片预览：</td>
                  <td colspan="2" id="ylpics">
                    <img src="images/nopic.gif" height="100"  />
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    <?php echo $pagename?>位置：</td>
                  <td colspan="2">
                    <label for="a_position"></label>
                    <select name="kq_position" id="a_position">
                      <?php
                        if(ADVLANMU){
                         
                          echo '<option value="index">首页</option>';
                          get_tree_class(0,0,get_class_array2());
                        }else{
                          $listpostion=array('1'=>'首页','2'=>'列表页','3'=>'内容页','4'=>'头部','5'=>'底部');
                          foreach ($listpostion as $key => $value) {
                            echo '<option value="'.$key.'">'.$value.'</option>';
                          }
                        }
                      ?>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100"></td>
                  <td>
                    <input name="submit" class="btn advbtn" value="提交" type="submit"></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
        <div class="hide">
          <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <input name="kq_type" type="hidden" value="2" />
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100" align="right">广告名称：</td>
                  <td>
                    <input name="kq_name" size="80" class="inpMain" type="text" id="a_title2"></td>
                </tr>
                <tr>
                  <td align="right">代码：</td>
                  <td>
                   
                    <textarea name="kq_code" id="a_code" cols="45" class="textArea" rows="5"></textarea>
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    <?php echo $pagename?>位置：</td>
                  <td colspan="2">
                  
                    <select name="kq_position" id="a_position">
                      <?php
                        if(ADVLANMU){
                          while($class_r=$conn->result($classql)){
                              $classarr[]=array($class_r['lm_id'],$class_r['lm_fid'],$class_r['lm_name']);
                          }
                          function classfl($fid=0,$num=0){
                            global $classarr;   
                            for($i=0;$i<count($classarr);$i++){        
                             if($classarr[$i][1]==$fid){        
                              echo "<option value=".$classarr[$i][0].">";  
                              echo str_repeat("&nbsp;&nbsp;", $num)."|-".$classarr[$i][2]."</option>";   
                              classfl($classarr[$i][0],$num+2);   
                              }  
                            }  
                          }   
                          echo '<option value="index">首页</option>';
                          classfl();
                        }else{
                          $listpostion=array('1'=>'首页','2'=>'列表页','3'=>'内容页','4'=>'头部','5'=>'底部');
                          foreach ($listpostion as $key => $value) {
                            echo '<option value="'.$key.'">'.$value.'</option>';
                          }
                        }
                      ?>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100"></td>
                  <td>
                    <input name="submit" class="btn advbtn" value="提交" type="submit"></td>
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
  $(".advbtn").on('click',function(event) {
    var name=$("#a_title1");
    var codename=$("#a_title2");
    var picurl=$("#kq_picurl");
    if(name.val()=="" || codename==""){
       Alert_msg(name,"名称不能为空");
       return false;
     }
    if(picurl.val()==""){
     Alert_msg(picurl,"广告图片不能为空");
     return false;
    }
  });
</script>