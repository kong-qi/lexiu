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
$pagename="订单";
$addname='';    
$backurl="order_list";
$actionmd5=md5("order_add");
$btnaction="";//提交状态
if(!permission("order")){
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
  <h3>
    <a href="index.php?name=<?php echo $backurl;?>" class="actionBtn">
      <span class="iconfont">&#xe609;</span>
      返回
      <?php echo $addname==''?$pagename:$addname;?></a>
      <?php echo $pagename?>添加</h3>
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
                  <td colspan="2">
                    <input name="kq_name" size="40" class="inpMain" type="text" id="kq_name"></td>
                </tr>
                <tr>
                  <td align="right">
                    <?php echo $pagename?>电话/手机：</td>
                  <td colspan="2">
                    <input name="kq_tel" type="text" class="inpMain" id="addam_pwd" size="40"></td>
                </tr>
                <tr>
                  <td align="right">产品ID：</td>
                  <td width="324">
                    <input name="kq_cpid" size="40" class="inpMain" type="text" id="or_chanpinid" />
                  </td>
                  <td width="568">产品的ID，例如：id=16或者是16.html，则ID就是:16</td>
                </tr>
                <tr>
                  <td align="right">产品名称：</td>
                  <td colspan="3">
                    <input name="kq_title" size="55" class="inpMain" type="text" id="or_cptitle" />
                  </td>
                </tr>
                <tr>
                  <td align="right">产品价格：</td>
                  <td colspan="2">
                    <input name="kq_price" size="10" class="inpMain" type="text" id="or_totalprice" />
                  </td>
                </tr>
                
                <tr>
                  <td align="right">购买数量：</td>
                  <td colspan="2">
                    <input name="kq_number" size="10" class="inpMain" type="text" id="or_count" />
                  </td>
                </tr>
                <tr>
                  <td align="right">产品总价：</td>
                  <td colspan="2">
                    <input name="kq_total" size="10" class="inpMain" type="text" id="or_totalprice" />
                  </td>
                </tr>
                <tr>
                  <td align="right">联系地址：</td>
                  <td colspan="2">
                    <input name="kq_address" size="40" class="inpMain" type="text" id="or_address" />
                  </td>
                </tr>
                <tr>
                  <td align="right">留言：</td>
                  <td colspan="2">
                    <textarea name="kq_liuyan" cols="70" rows="5" class="textArea" id="kq_liuyan"> </textarea>
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
  $(".btn").on("click",function(){
      var name=$("input[name='kq_name']");
      var title=$("input[name='kq_title']");
      var num=$("input[name='kq_number']");
      var numzz=/^\+?[1-9][0-9]*$/;
      if(name.val()==""){
         Alert_msg(name,"联系人不能为空");
         return false;
        }
      if(title.val()==""){
         Alert_msg(title,"产品名称不能为空");
         return false;
        }
        if(num.val()==""){
           Alert_msg(num,"产品数量不能为空");
         return false;
          }else{
      if (!numzz.test(num.val())){
        Alert_msg(num,"产品数量只能为大于0的数字");
         return false;
        
        }  }
    
  });
</script>