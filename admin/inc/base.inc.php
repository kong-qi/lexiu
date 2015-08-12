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
if(!permission("root")){
	$actionurl="";
	$btnaction='disabled="disabled"';
  $hasaccess=0;
}else{
  $actionurl="action/ac_update.php";
  $hasaccess=1;
  $btnaction="";
}
$message="权限不够不能操作信息";//游客提示语
$id=setdefensesql("kongqi");
$sqlshow=$conn->selectall("".DB_EXT."config","where kq_basename='".$id."'");
$show_r=@dell_slashes($conn->result($sqlshow));
?>
<div id="urHere"> 管理中心<b>&gt;</b><strong>网站配置设定</strong> </div>   
<?php  if(!$hasaccess){?>
<div class="gonggao">
  <h3>温馨提示：</h3>
  <p><?php echo $message?></p>
</div>
<?php
}
?>
<div id="mainBox">
  <h3>系统设置</h3>
  <div class="idTabs kq_li">
    <ul class="tab">
      <li>
        <a  href="#">常规设置</a>
      </li>
      <li>
        <a href="#">客服设置</a>
      </li>
      <li>
        <a  href="#">其他设置</a>
      </li>
    </ul>
    <div class="items">
      <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
        <input name="type" type="hidden" value="<?php echo md5("base")?>" />
        <div class="kq_div">
          <div  id="main">
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <th width="131">名称</th>
                  <th>内容</th>
                </tr>
                <tr>
                  <td align="right">站点域名</td>
                  <td>
                    <input name="kq_url" value="<?php echo $show_r['kq_url']?>" size="80" class="inpMain" type="text" id="c_url" /></td>
                </tr>
                <tr>
                  <td align="right">站点名称</td>
                  <td>
                    <input name="kq_name" value="<?php echo $show_r['kq_name']?>" size="80" class="inpMain" type="text" id="c_name"></td>
                </tr>
                <tr>
                  <td align="right">站点标题</td>
                  <td>
                    <input name="kq_title" value="<?php echo $show_r['kq_title']?>" size="80" class="inpMain" type="text" id="c_title"></td>
                </tr>
                <tr>
                  <td align="right">站点关键字</td>
                  <td>
                    <input name="kq_keyword" value="<?php echo $show_r['kq_keyword']?>" size="80" class="inpMain" type="text" id="c_keyword"></td>
                </tr>
                <tr>
                  <td align="right">站点描述</td>
                  <td>
                    <input name="kq_description" value="<?php echo $show_r['kq_description']?>" size="80" class="inpMain" type="text" id="c_miaosu"></td>
                </tr>

                <tr>
                  <td align="right">是否关闭网站</td>
                  <td>
                    否
                    <input name="kq_closed" id="site_closed_0" value="0" <?php  echo_check($show_r['kq_closed'],'0')  ?>
                    type="radio">
                     是 
                    <input name="kq_closed" id="site_closed_1" value="1" type="radio" <?php  echo_check($show_r['kq_closed'],'1')  ?>
                    }>
                      
                  </td>
                </tr>
                <tr>
                <td align="right">是否伪静态</td>
                <td>
                  否 
                  <input name="kq_rewrite" id="site_closed_0" value="0" <?php  echo_check($show_r['kq_rewrite'],'0')  ?> type="radio">
                    是 
                  <input name="kq_rewrite" type="radio" id="site_closed_1" value="1" <?php  echo_check($show_r['kq_rewrite'],'1')  ?> >
                     
                </td>
              </tr>
              <tr>
              <td align="right">友情链接显示</td>
              <td>
                图片
                <input name="kq_link" id="site_closed_2" value="1" <?php  echo_check($show_r['kq_link'],'1')  ?> type="radio" />
                   文字
                <input name="kq_link" id="site_closed_3" value="2" <?php  echo_check($show_r['kq_link'],'2')  ?> type="radio" /></td>
            </tr>
            
            <tr>
              <td align="right">邮编</td>
              <td>
                <input name="kq_youbian" value="<?php echo $show_r['kq_youbian']?>" size="80" class="inpMain" type="text" id="c_youbian"></td>
            </tr>
            <tr>
              <td align="right">ICP备案证</td>
              <td>
                <input name="kq_icp" value="<?php echo $show_r['kq_icp']?>" size="80" class="inpMain" type="text" id="c_icp"></td>
            </tr>
            <tr>
              <td align="right">公司地址</td>
              <td>
                <input name="kq_address" value="<?php echo $show_r['kq_address']?>" size="80" class="inpMain" type="text" id="c_address" /></td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="hide">
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td width="15%" align="right">客服电话</td>
              <td colspan="2">
                <input name="kq_tel" value="<?php echo $show_r['kq_tel']?>" size="80" class="inpMain" type="text" id="c_tel"></td>
            </tr>
            <tr>
              <td align="right">客服手机</td>
              <td colspan="2">
                <input name="kq_phone" value="<?php echo $show_r['kq_phone']?>" size="80" class="inpMain" type="text" id="c_phone" /></td>
            </tr>
            <tr>
              <td align="right">联系人</td>
              <td colspan="2">
                <input name="kq_telname" value="<?php echo $show_r['kq_telname']?>" size="80" class="inpMain" type="text" id="c_telname" /></td>
            </tr>

            <tr>
              <td align="right">客服QQ号码</td>
              <td width="54%">
                <input name="kq_qq" value="<?php echo $show_r['kq_qq']?>" size="80" class="inpMain" type="text" id="kq_qq"></td>
              <td width="31%">多个下用&quot;,&quot;隔开（英文状态）</td>
            </tr>
            <tr>
              <td align="right">传真</td>
              <td colspan="2">
                <input name="kq_fax" value="<?php echo $show_r['kq_fax']?>" size="80" class="inpMain" type="text" id="kq_fax"></td>
            </tr>
            <tr>
              <td align="right">邮箱地址</td>
              <td colspan="2">
                <input name="kq_email" value="<?php echo $show_r['kq_email']?>" size="80" class="inpMain" type="text" id="kq_email" /></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="hide">
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
          <tbody>
          <tr>
            <td align="right">统计代码</td>
            <td>
              <textarea name="kq_tongji" cols="70" rows="5" class="textArea" id="kq_tongji"><?php echo $show_r['kq_tongji']?></textarea>
            </td>
          </tr>
          <tr>
            <td align="right">限制IP</td>
            <td>
              <textarea name="kq_closedip" cols="70" rows="5" class="textArea" id="kq_closedip"><?php echo $show_r['kq_closedip']?></textarea>
            </td>
          </tr>
          <tr>
            <td align="right">属性标签</td>
            <td>
              <textarea name="kq_shuxing" cols="70" rows="5" class="textArea" id="kq_shuxing"><?php echo $show_r['kq_shuxing']?></textarea>
            </td>
          </tr>
           <tr>
            <td align="right">开发人员设置</td>
            <td>
              <textarea name="kq_setlanmu" cols="70" rows="5" class="textArea" id="kq_setlanmu"><?php echo $show_r['kq_setlanmu']?></textarea>
              <span class="red">重要：非开发人员不要编辑。</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td width="131"></td>
        <td>
          <input name="submit" <?php echo $btnaction;?>class="btn" value="提交" type="submit"></td>
      </tr>
    </tbody>
  </table>
</form>
</div>
</div>
</div>
