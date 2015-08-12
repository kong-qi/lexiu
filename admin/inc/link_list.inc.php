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
$pagename="友链";
$addurl="youlink_add";
$message="权限不够不能操作";//游客提示语
$updateurl="youlink_update";
$dlurl=md5("youlink_del");
$dlallturl=md5("youlink_delall");
$pageurl="youlink";//分页链接
$sortrel=md5("youlink_sort");
$sortrel2=md5("youlink_sort2");
$sortrel3=md5("youlink_sort3");
$list_sql=$conn->selectone("".DB_EXT."youlink","*"," order by  kq_sort desc,id desc limit ".($page-1)*$pagesize.",".$pagesize."");
$list_total=$conn->rows($conn->selectall("".DB_EXT."youlink",""));
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
  <h3>
    <a href="index.php?name=<?php echo $addurl;?>" class="actionBtn add">添加<?php echo $pagename?></a>
    <?php echo $pagename?>列表</h3>
  <div id="list">
    <form name="del" method="post" action="action/ac_dell.php?type=<?php echo $dlallturl?>" class="admin_form">
      <table id="kq" class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <th align="center" width="22">
            <input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox"></th>
            <th align="center" width="40">排序</th>
            <th align="center" width="40">编号</th>
            <th align="left">站点名称</th>
            <th align="center">站点网址</th>
            <th align="center" width="150">站点图片</th>
            <th align="center" width="30">PR值</th>
            <th align="center" width="50">nofflow</th>
            <th align="center" width="80">添加日期</th>
            <th align="center" width="120">操作</th>
          </tr>
          <?php
          if(!$list_total)
          {
              echo '<tr> <td colspan="5" align="center">暂无记录</td> </tr> '; 
          }else
          {
             while($list_r=$conn->result($list_sql)){
               $list_r=dell_slashes($list_r);
          ?>
        <tr>
          <td align="center">
            <input name="checkbox[]" value="<?php echo $list_r['kq_uuid']?>" type="checkbox"></td>
          <td align="center">
            <input name="sort[]" type="text" value="<?php echo $list_r['kq_sort']?>" class="inpMain" id="sort[]" size="5" /></td>
          <td align="center">
            <?php echo $list_r['id']?></td>
          <td>
            <?php echo ($list_r['kq_name'])?></td>
          <td align="center">
            <?php echo  http_url($list_r['kq_url']);    ?>
          </td>
          
          <td align="center">
            <img src='<?php echo pic_url($list_r['kq_pic']);?>' class="fmpic" width='120' height='80' /></td>
          <td align="center">
            <?php echo $list_r['kq_pr'];?></td>
          <td align="center">
            <?php echo_option($list_r['kq_follow'],array('否','是'));?>  
          </td>
          <td align="center">
            <?php echo date("Y-m-d ",$list_r['kq_ctime'])?></td>
          <td align="center">
            <?php
            if(!$hasaccess){
              echo "没有权限";
            }else{
            ?>
            <a href="index.php?name=<?php echo $updateurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
              <span class="wenzhang">编辑</span>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="action/ac_dell.php?type=<?php echo $dlurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
              <span class="delete">删除</span>
            </a>
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
      <input name="sortbtn2" type="submit" class="btn mr10" value="设置nofflow" rel="<?php echo $sortrel2?>" />
      <input name="sortbtn2" type="submit" class="btn mr10" value="取消nofflow" rel="<?php echo $sortrel3?>" />
    </div>
    <?php }?>
    </form>
  </div>
  <div class="clear"></div>
  <div class="pager">
  <?php
    $subPages=new SubPages($pagesize,$list_total,$page,$sub_pages,"index.php?name=".$pageurl."&amp;page=",2);
  ?>
  </div>
</div>
