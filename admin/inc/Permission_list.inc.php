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
if (!isset($_GET['page'])){
     $page=1;
  }else{
     $page=intval($_GET['page']);
  }
 $list_sql=$conn->selectall("".DB_EXT."admingroup","order by id desc limit ".($page-1)*$pagesize.",".$pagesize."");
 $list_total=$conn->rows($conn->selectall("".DB_EXT."admingroup",""));
 //当前目录
 $pagename="管理权限";
 $addname='';
 $message="权限不够不能操作信息";//游客提示语
 //操作URL
 $addurl="permission_add";
 $upurl="permission_update";
 $dlurl=md5("permission_del");
 $dlallturl=md5("permission_delall");
 $sort="";
 $pageurl="permission_list";
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
<div id="urHere">管理中心<b>&gt;</b><strong><?php echo $pagename?>设置</strong></div>
<?php  if(!$hasaccess){?>
<div class="gonggao">
  <h3>温馨提示：</h3>
  <p><?php echo $message?></p>
</div>
<?php
}
?>
<div id="mainBox">
  <h3><a href="index.php?name=<?php echo $addurl;?>" class="actionBtn add">添加<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>列表</h3>
  <div id="list">
    <form name="del" method="post" action="action/ac_dell.php?type=<?php echo $dlallturl?>">
      <table id="kq" class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <th align="center" width="22"><input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox"></th>
            <th align="center" width="40">编号</th>
            <th align="left">权限名称</th>
            <th align="center" width="150">添加日期</th>
            <th align="center" width="120">操作</th>
          </tr>
          <?php
          if(!$list_total)
          {
            echo '<tr>
              <td colspan="5" align="center">暂无记录</td>
            </tr>';
          }else
          {
          while($list_r=$conn->result($list_sql))
          {
             $list_r=dell_slashes($list_r);
          ?>
            <tr>
              <td align="center"><input name="checkbox[]" value="<?php echo $list_r['kq_uuid']?>" type="checkbox"></td>
              <td align="center"><?php echo $list_r['id']?></td>
              <td><?php echo ($list_r['kq_name'])?></td>
              <td align="center"><?php echo date("Y-m-d ",($list_r['kq_ctime']))?></td>
              <td align="center"><?php
              if(!$hasaccess){
                echo "没有权限";
              }else
              {
              ?>
                <a href="index.php?name=<?php echo  $upurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
                <span class="wenzhang">编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="action/ac_dell.php?type=<?php echo $dlurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
                <span class="delete">删除</span>
                </a>
              <?php 
              }
              ?></td>
            </tr>
          <?php
            };
            };
          ?>
      </tbody>
      </table>
      <!-- 底部操作 -->
      <?php  if($hasaccess){?>
      <div class="action">
        <input name="submit" class="btn delall" value="删除" type="submit">
      </div>
      <?php }?>
    </form>
  </div><!-- list -->
  <div class="clear"></div>
  <div class="pager">
    <?php
      $subPages=new SubPages($pagesize,$list_total,$page,$sub_pages,"index.php?name=".$pageurl."&amp;page=",2)
    ?>
  </div>
</div><!-- mainBox -->
