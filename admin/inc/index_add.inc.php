<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
if (!defined("KQ_WORK")){
	 exit("非法操作");
}
$btnaction="";//提交状态
if (!permission("root")){
	 	$actionurl="";
    $hasaccess=0;
	 	$btnaction='disabled="disabled"';
	 }else{
		$actionurl="action/ac_add.php";
    $hasaccess=1;
}
 $type='index';
if(isset($_GET['type'])){
 $type=$_GET['type'];
}
//本页配置信息		 
$pagename="首页调用";
$actionmd5=md5("index_add");
$message="游客身份不能操作";//游客提示语		 
$addname='';    
$backurl="index_list";
load_editor("#kq_content");
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
      <li><a href="#main">内容类型</a></li>
      <li><a href="#main">代码类型</a></li>
      <li><a href="#main">图片类型</a></li>
    </ul>
    <div class="items ">
     
        <div class="kq_div">
          <div class="itmes">
            <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <input type="hidden" name="kq_type" value="cont">
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td align="right" width="100">名称：</td>
                <td ><input name="kq_title" size="40" class="inpMain" type="text" id="title1"></td>
              </tr>
              
               <tr class="cont">
                <td align="right">内容：</td>
                <td>
                  <textarea name="kq_content" cols="100" rows="5" class="textArea" id="kq_content"></textarea>
                </td>
              </tr>
             
              
              <tr>
                <td colspan="2" ><input name="submit" class="btn indexbtn" value="提交" <?php echo $btnaction?>  type="submit"></td>
              </tr>
            </tbody>
            </table>
            </form>
          </div>
          <div class="hide">
            <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <input type="hidden" name="kq_type" value="code">
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td align="right" width="100">名称：</td>
                <td ><input name="kq_title" size="40" class="inpMain" type="text" id="title2"></td>
              </tr>
              <tr class="code">
                <td align="right">代码：</td>
                <td>
                  <textarea name="kq_code" cols="70" rows="5" class="textArea" id="kq_code"></textarea>
                </td>
              </tr>
              <tr>
                <td colspan="2" ><input name="submit" class="btn indexbtn2" value="提交" <?php echo $btnaction?>  type="submit"></td>
              </tr>
            </tbody>
            </table>
            </form>
          </div>
          <div class="hide">
            <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <input type="hidden" name="kq_type" value="pic">
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td align="right" width="100">名称：</td>
                <td ><input name="kq_title" size="40" class="inpMain" type="text" id="title3"></td>
              </tr>
              <tr class="pic">
                <td align="right">
                  图片预览：
                </td>
                <td>
                <ul class="list_u_pic">
                </ul>
                <div class="clear"></div>
                
               
                </td>
              </tr>
              <tr>
                <td></td>
                <td><input name="submit3" class="btn uppic mlr10" onclick="updatepic('.list_u_pic','','1')"  value="点击上传图片" type="button" /></td>
              </tr>
              <tr>
                <td colspan="2" ><input name="submit" class="btn indexbtn3" value="提交" <?php echo $btnaction?>  type="submit"></td>
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
$(document).on('click', '.up_pic', function(event) {
  
   
   var onthis = $(this).parents(".itempic");

   var getup = $(this).parents(".itempic").prev(".itempic");
  
   if(getup.html()!=null)
   {
    
    $(getup).before(onthis);
    
   }
  
});
//下移动
$(document).on('click', '.botm_pic', function(event) {
  
   var onthis = $(this).parents(".itempic");
   var getup = $(this).parents(".itempic").next(".itempic");
   if(getup.html()!=null)
   {
   
    $(getup).after(onthis);
    
   }
  
});
//删除
$(document).on('click', '.del_pic', function(event) {
   if(window.confirm('你确定要取消删除吗？')){
      var onthis = $(this).parents(".itempic");
      onthis.remove();
     return true;
    }else{
      
      return false;
    }
  
});
$(".indexbtn").on('click',  function(event) {
  var name=$('#title1');
  if(name.val()==''){
    Alert_msg(name,'名称不能为空');
    return false;
  }
  });
$(".indexbtn2").on('click',  function(event) {
  var name=$('#title2');
  if(name.val()==''){
    Alert_msg(name,'名称不能为空');
    return false;
  }
  });
$(".indexbtn3").on('click',  function(event) {
  var name=$('#title3');
  if(name.val()==''){
    Alert_msg(name,'名称不能为空');
    return false;
  }
});

</script>
