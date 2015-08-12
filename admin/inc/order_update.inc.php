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
if(!permission("order")){
  new Alert("没有权限操作","back");
  exit();
}	
$sqlshow=$conn->selectall("".DB_EXT."order","where kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
//本页配置信息
$pagename="订单";
$backurl="order_list";
$addname='';
$btnaction="";//提交状态
$actionurl="action/ac_update.php";
$actionmd5=md5("order_update");
 ?>

<div id="urHere">管理中心 <b>&gt;</b> <strong><?php echo $pagename?>更新</strong>
</div>
<div id="mainBox">
  <h3>
     <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>更新</h3>
  <div class="idTabs  kq_li">
    <ul class="tab">
      <li>
        <a  href="#main">订单更新</a>
      </li>
    </ul>
    <div class="items">
      <div class="kq_div">
        <div  id="main">
          <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <input name="id" type="hidden" value="<?php echo $id?>" />
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td align="right" width="100">联系人：</td>
                  <td colspan="2">
                    <input name="kq_name" size="25" value="<?php echo $show_r['kq_name']?>" class="inpMain" type="text" id="kq_name"></td>
                </tr>
                <tr>
                  <td align="right">电话/手机：</td>
                  <td colspan="2">
                    <input name="kq_tel" value="<?php echo $show_r['kq_tel']?>" type="text" class="inpMain" id="addam_pwd" size="20"></td>
                </tr>
                <tr>
                  <td align="right">购买产品：</td>
                  <td width="96">
                    <input name="kq_cpid" type="text" class="inpMain" id="kq_cpid" value="<?php echo $show_r['kq_cpid']?>" size="10" readonly="readonly" /></td>
                  <td width="735">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">产品名称：</td>
                  <td colspan="2">
                    <input name="kq_title" size="55" value="<?php echo $show_r['kq_title']?>" class="inpMain" type="text" id="kq_title" /></td>
                </tr>
                <tr>
                  <td align="right">产品价格：</td>
                  <td colspan="2">
                    <input name="kq_price" value="<?php echo $show_r['kq_price']?>" size="10" class="inpMain" type="text" id="kq_price" />
                  </td>
                </tr>
                <tr>
                  <td align="right">购买数量：</td>
                  <td colspan="2">
                    <input name="kq_number" value="<?php echo $show_r['kq_number']?>" size="10" class="inpMain" type="text" id="kq_number" /></td>
                </tr>
                <tr>
                  <td align="right">联系地址：</td>
                  <td colspan="2">
                    <input name="kq_address" value="<?php echo $show_r['kq_address']?>" size="40" class="inpMain" type="text" id="kq_address" /></td>
                </tr>
                <tr>
                  <td align="right">留言：</td>
                  <td colspan="2">
                    <textarea name="kq_liuyan" cols="70" rows="5" class="textArea" id="kq_liuyan"><?php echo $show_r['kq_liuyan']?></textarea>
                  </td>
                </tr>
                <tr>
                  <td align="right">管理员备注：</td>
                  <td colspan="2">
                    <label for="kq_beizhu"></label>
                    <textarea name="kq_beizhu" id="kq_beizhu" class="textArea" cols="45" rows="5"><?php echo $show_r['kq_beizhu']?></textarea>
                  </td>
                </tr>
              </tbody>
            </table>

            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100"></td>
                  <td>
                    <input name="submit" class="btn" value="提交" type="submit"></td>
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