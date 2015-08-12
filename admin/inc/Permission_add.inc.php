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
$pagename="管理权限";
$hasaccess=0;
$addname='';
$backurl="permission_list";
$actionmd5=md5("permission");
$btnaction="";//提交状态
$actionurl="action/ac_add.php";
if (!permission("root"))
{
    $actionurl="";
    $hasaccess=0;
    $btnaction='disabled="disabled"';
}else
{
  $hasaccess=1;
}

//权限提示语
$message="暂无添加权限";

 ?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>设定</strong> </div>
<?php  if (!$hasaccess){?>
<div class="gonggao">
  <h3>温馨提示：</h3>
  <p><?php echo $message?></p>
</div>
<?php
}
?>
<div id="mainBox">
  <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>设定</h3>
  <div class="idTabs">
    <ul class="tab">
      <li><a class="selected" href="#main"><?php echo $pagename?>设置</a></li>
    </ul>
    <div class="items">
      <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
        <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
        <div style="display: block;" id="main">
          <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <th>权限组命名：</th>
                <th colspan="3" align="left"><label for="select"></label>
                  <label for="gp_name"></label>
                  <input type="text" name="kq_name" id="gp_name" class="inpMain" /></th>
                <th align="left">全选操作</th>
                <th align="left"><input  id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox">
                  <label for="checkbox"></label></th>
              </tr>
              <tr>
                <th width="131">名称</th>
                <th>信息设定</th>
                <th width="131">名称</th>
                <th>其他设定</th>
                <th width="130">名称</th>
                <th>全局设定</th>
              </tr>
              <tr>
                <td align="right">添加信息</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_add" value="news_add" /></td>
                <td align="right">伪静态设置</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_weijingtai" value="wjt" /></td>
                <td align="right">只读操作</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_read" value="read" /></td>
              </tr>
              <tr>
                <td align="right">编辑信息</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_editor" value="news_edt" /></td>
                <td align="right">备份操作</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_bf" value="sqlbf" /></td>
                <td align="right">管理操作</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_admin" value="root" /></td>
              </tr>
              <tr>
                <td align="right">删除信息</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_delete" value="news_dl" /></td>
                <td align="right">留言操作</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_liuyan" value="liuyan" /></td>
                <td align="right">&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">友情链接</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_youlink" value="link" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">招商操作</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_zhaoshang" value="zhaoshang" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">栏目权限</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_liuyan2" value="lanmu" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">订单权限</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_liuyan3" value="order" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">广告权限</td>
                <td><input name="kq_group[]" type="checkbox" id="gp_liuyan3" value="adv" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table>
        </div>
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td width="131"></td>
              <td><input name="submit" class="btn" value="提交" type="submit"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<script>
  $(".btn").on('click', function(event) {
      var name=$("input[name='kq_name']");
      if(name.val()==""){
         Alert_msg(name,"权限名不能为空");
        return false;
       }
  });
</script>