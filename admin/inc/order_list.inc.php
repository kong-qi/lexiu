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
if(!isset($_GET['page'])){
$page=1;
}else{
 $page=intval($_GET['page']);
} 
   
//本页信息
$pagename="订单";
$message="权限不够不能操作";//游客提示语
$addurl="order_add";
 $addname='';
$upurl="order_update";
$dlurl=md5("order_del");
$dlallturl=md5("order_delall");  
$pageurl="order_list";//分页链接 
$sortrel=md5("order_sort");
$list_sql=$conn->selectone("".DB_EXT."order","*"," order by kq_sort desc, id desc limit ".($page-1)*$pagesize.",".$pagesize."");
$list_total=$conn->rows($conn->selectall("".DB_EXT."order",""));
//是否有权限
$hasaccess=0;
if(permission("root"))
{
  $hasaccess=1;
}else
{
  $hasaccess=0;
}
 
 ?>
<!-- 当前位置 -->
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?></strong></div>
   
<?php  if(!$hasaccess){?>
<div class="gonggao">
  <h3>温馨提示：</h3>
  <p><?php echo $message?></p>
</div>
<?php
}
?>
   
   <div id="mainBox">
    <h3><a href="index.php?name=<?php echo $addurl;?>" class="actionBtn add">手动添加<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>列表</h3>
    <div id="list">
    <form name="del" method="post" action="action/ac_dell.php?type=<?php echo $dlallturl?>" class="admin_form">
    <table id="kq" class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
      <tbody><tr>
        <th align="center" width="22"><input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox"></th>
        <th align="center" width="40">排序</th>
        <th align="center" width="30">编号</th>
        <th width="150" align="left">购买产品</th>
        <th width="80" align="left">联系人</th>
        <th width="90" align="center">电话</th>
        <th align="center" width="50">购买总价</th>
        <th align="center" width="50">购买数量</th>
        <th align="center" width="150">联系地址</th>
        <th align="center" width="80">订购日期</th>
        <th align="center" width="140">操作</th>
      </tr>
      <?php
        if(!$list_total){
          echo '<tr> <td colspan="10" align="center">暂无记录</td> </tr>'; 
        }else{
          while($list_r=$conn->result($list_sql)){
          $list_r=dell_slashes($list_r);
      ?>
      <tr>
        <td align="center"><input name="checkbox[]" value="<?php echo $list_r['kq_uuid']?>" type="checkbox"></td>
        <td align="center">
            <input name="sort[]" type="text" value="<?php echo $list_r['kq_sort']?>" class="inpMain" id="sort[]" size="5" /></td>
        <td align="center"><?php echo $list_r['id']?></td>
        <td><?php echo ($list_r['kq_title'])?></td>
        <td><?php echo ($list_r['kq_name'])?></td>
        <td align="center"><?php echo $list_r['kq_tel'];?></td>
        <td align="center"><?php echo $list_r['kq_total']?></td>
        <td align="center"><?php echo $list_r['kq_number']?></td>
        <td align="center"><label for="textarea"></label>
          <textarea name="textarea" style="background:#DBEAF9; color:#333; font-size:12px" cols="20" rows="4" readonly="readonly" class="textArea" id="textarea"><?php echo $list_r['kq_address']?></textarea></td>
        <td align="center"><?php echo date("Y-m-d ",$list_r['kq_ctime'])?></td>
        <td align="center">
        <?php
        if(!$hasaccess){
          echo "没有权限";
        }else{
        ?>
          <?php if($list_r['kq_beizhu']){
          ?>
        <a href="javascript:void(0)" class="zhaotip" rel="<?php echo $list_r['kq_beizhu']?>">
        <span class="wenzhang">查看备注</span></a>&nbsp;&nbsp;
          <?php }?>
        <a href="index.php?name=<?php echo $upurl?>&amp;id=<?php echo $list_r['kq_uuid']?>"><span class="wenzhang">编辑</span></a>&nbsp;&nbsp;
        <a href="action/ac_dell.php?type=<?php echo $dlurl?>&amp;id=<?php echo $list_r['kq_uuid']?>"><span class="delete">删除</span></a>
        <?php }?>
        </td>
      </tr>
      <?php
      };
      } 
      ?>
 
      </tbody>
    </table>
    <?php  if($hasaccess){?>
    <div class="action">
    <input name="submit" class="btn delall" value="删除" type="submit">
    <input name="sortbtn" rel="<?php echo $sortrel?>" class="btn mr10" value="排序" type="submit">
    </div>
    <?php }?>
    </form>
    </div>
    <div class="clear"></div>
    <div class="pager">
      <?php 
      $subPages=new SubPages($pagesize,$list_total,$page,$sub_pages,"index.php?name=".$pageurl."&amp;page=",2)
      ?>
   </div>
</div>
