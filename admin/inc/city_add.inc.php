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
$pagename="城市";
$actionmd5=md5("city_add");
$btnaction="";//提交状态
 if(!permission("lanmu")){
  $actionurl="";
  $btnaction='disabled="disabled"';
  $hasaccess=0;
}else{
  $hasaccess=1;
  $actionurl="action/ac_add.php";
};
$backurl="city_list";
$addname='';		 

$message="权限不够不能操作";//游客提示语		 


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
  <div class="idTabs kq_li">
    <ul class="tab">
      <li>
        <a  href="#">
          <?php echo $pagename?>添加</a>
      </li>
      
     
    </ul>
    <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
      <div class="kq_div">
        <div class="items">
          <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
          <table class="tableBasic addclass" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td align="right" width="150">
                  <?php echo $pagename?>名字：</td>
                <td colspan="3">
                  <input name="kq_title" size="40" class="inpMain" type="text" id="kq_title"></td>
              </tr>
              <tr class="model_tr">
                <td align="right">是否为省份：</td>
                <td colspan="2">
                  是
                  <input name="kq_islast" type="radio" id="radio3" value="1"  />
                  否
                  <input type="radio" name="kq_islast" id="radio4" value="0" checked="checked" />
                </td>
                <td width="497"><span class="red">否为最终的分类，不能再有子类。</span></td>
              </tr>
              <tr>
                <td align="right">所属目录：</td>
                <td colspan="2">

                  <select name="kq_fid" id="kq_fid">
                    <option value="0">根城市</option>
                    <?php  get_tree_class(0,0,get_city_array())?>
                  </select>
                </td>
                 <td></td>
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
       
<script>

  $(".btn").on('click',  function(event) {
    var name=$("#kq_title");
    var url=$("#kq_url");
    var lmwburl=$("#kq_wburl");
    var lmzz=/^[a-zA-Z0-9]+$/;
    if(name.val()==''){
      Alert_msg(name,"名称不能为空");
      return false;
    }
    
  });
</script>