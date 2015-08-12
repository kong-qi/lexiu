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
$pagename="招商加盟";
$actionmd5=md5("zhaos_add");
$addname='';    
$backurl="zhaos_list";
$btnaction="";//提交状态
if(!permission("zhaoshang")){
  $actionurl="";
  $hasaccess=0;
  $btnaction='disabled="disabled"';
}else{
  $actionurl="action/ac_add.php";
  $hasaccess=1;
};    
$message="没有权限，不能操作";//游客提示语        
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
  <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>添加</h3>
  <div class="idTabs  kq_li">
    <ul class="tab">
      <li>
        <a  href="javascript:void(0)">
          <?php echo $pagename?></a>
      </li>

    </ul>
    <div class="items">

      <div class="kq_div">
        <div  id="main">
          <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td align="right" width="100">
                    <?php echo $pagename?>联系人：</td>
                  <td>
                    <input name="kq_name" size="40" class="inpMain" type="text" id="zs_name"></td>
                </tr>
                <tr>
                  <td align="right">
                    电话：</td>
                  <td>
                    <input name="kq_tel" type="text" class="inpMain" id="addam_pwd" size="40"></td>
                </tr>
                <tr>
                  <td align="right">QQ：</td>
                  <td>
                    <input name="kq_qq" size="40" class="inpMain" type="text" id="zs_qq" />
                  </td>
                </tr>
                <tr>
                  <td align="right">邮箱：</td>
                  <td>
                    <input name="kq_email" size="40" class="inpMain" type="text" id="zs_qq" />
                  </td>
                </tr>
                <tr>
                  <td align="right">地址：</td>
                  <td>
                    <input name="kq_address" size="40" class="inpMain" type="text" id="zs_qq" />
                  </td>
                </tr>
                <tr>
                  <td align="right">需求意向：</td>
                  <td>
                    <textarea name="kq_content" cols="45" rows="5" class="textArea" id="kq_content"></textarea>
                  </td>
                </tr>
              </tbody>
            </table>

            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100"></td>
                  <td>
                    <input name="submit" class="btn zhaosbtn" value="提交" type="submit"></td>
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
  $(".btn").on('click',  function(event) {
    var name=$('input[name="kq_name"]');
    var content=$("#kq_content");
    if(name.val()==''){
      Alert_msg(name,'联系人不能为空');
      return false;
    }
    if(content.val()==''){
      Alert_msg(content,'意向不能为空');
       return false;
    }
  });
</script>