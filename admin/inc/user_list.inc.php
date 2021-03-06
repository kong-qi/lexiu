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
$pagename="会员";

$message="权限不够不能操作";//游客提示语
$upurl="user_update";
$dlurl=md5("user_del");
$dlallturl=md5("user_delall"); 
$pageurl="user_list";//分页链接 
$sortrel=md5("user_sort");
$addurl='user_add';
//是否有权限
$hasaccess=0;
if(permission("root"))
{
  $hasaccess=1;
}else
{
  $hasaccess=0;
}
$show='';
$keywrod='';
$wherestr='';
//搜索
if(isset($_GET['show'])){
  $show=($_GET['show']);
}
if(isset($_GET['keyword'])){
  $keywrod=($_GET['keyword']);
}
if($show)
{
   $status=$show;
  if($show==2){
     $status=1;
  }elseif($show==1){
    $status=0;
  }
  $wherestr="where kq_checked='".$status."'";
  if($keywrod)
  {
    $wherestr.="and (kq_name like '%".$keywrod."%' or kq_tel like '%".$keywrod."%' or kq_email like '%".$keywrod."%')";
  }
}else
{
  $wherestr="where kq_name like '%".$keywrod."%' or kq_tel like '%".$keywrod."%' or kq_email like '%".$keywrod."%'";
}



$list_sql=$conn->selectone("".DB_EXT."user","*",$wherestr." order by kq_sort desc, id desc limit ".($page-1)*$pagesize.",".$pagesize."");
$list_total=$conn->rows($conn->selectall(DB_EXT."user",""));

?>
<!-- 当前位置 -->
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?></strong></div>
<?php  if (!$hasaccess){?>
<div class="gonggao">
  <h3>温馨提示：</h3>
  <p><?php echo $message?></p>
</div>
<?php
}
?>
<div id="mainBox">
  <h3><a href="index.php?name=<?php echo $addurl;?>" class="actionBtn add">添加<?php echo $pagename?></a><?php echo $pagename?>列表</h3>
  <div class="filter">
    <form name="filter" method="GET" action="index.php">
      <input name="name" type="hidden" value="user_list" />
      <select name="show">
        <option value="0" <?php if($show==0){echo 'selected="selected"';}?>>不选择</option>
        <option value="1" <?php if($show==1){echo 'selected="selected"';}?>>拉黑</option>
        <option value="2"  <?php if($show==2){ echo 'selected="selected"';}?>>正常</option>
      </select>
      <input type="text" name="keyword" value="<?php echo $keywrod?>" id="textfield" class="inpMain"  />
      <input name="submit" class="btnGray" value="筛选" type="submit"></form>
  </div>
  <div id="list">
    <form name="del" method="post" action="action/ac_dell.php?type=<?php echo $dlallturl?>" class="admin_form">
      <table id="kq" class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <th align="center" width="22"><input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox"></th>
            <th align="center" width="40">排序</th>
            <th align="center" width="40">编号</th>
            <th align="left">用户名称</th>
             <th align="center" width="120">手机</th>
            <th align="center" width="150">是否拉黑</th>
            <th align="center" width="150">性别</th>
            <th align="center" width="150">注册日期</th>
            <th align="center" width="120">操作</th>
          </tr>
          <?php
          if(!$list_total)
          {
            echo '<tr><td colspan="8" align="center">暂无记录</td></tr>';
          }else
          {
            while($list_r=$conn->result($list_sql))
            {
            $list_r=dell_slashes($list_r);
          ?>
            <tr>
              <td align="center"><input name="checkbox[]" value="<?php echo $list_r['kq_uuid']?>" type="checkbox"></td>
              <td align="center"><input name="sort[]" type="text" value="<?php echo $list_r['kq_sort']?>" class="inpMain" id="sort[]" size="5" /></td>
              <td align="center"><?php echo $list_r['id']?></td>
              <td><?php echo stripslashes($list_r['kq_name'])?></td>
              <td align="center">
              <?php
                echo $list_r['kq_tel'];
              ?>
              
              </td>
              <td align="center">
              <?php
              echo_option($list_r['kq_checked'],array('拉黑','正常'));
              ?>
              
              </td>
              <td align="center"><?php echo  echo_option($list_r['kq_sex'],array('1'=>'男','2'=>'女'));?></td>
              <td align="center"><?php echo date("Y-m-d ",$list_r['kq_ctime'])?></td>
              <td align="center"><?php
              if(!$hasaccess){
                echo "没有权限";
              }else{
              ?>
              <a href="index.php?name=<?php echo $upurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
              <span class="wenzhang">编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="action/ac_dell.php?type=<?php echo $dlurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
              <span class="delete">删除</span>
              </a>
               <?php 
               }?>
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
        <input name="submit" class="btn delall" value="删除" type="submit" />
        <input name="sortbtn" type="submit" class="btn sortbtn" id="排序" rel="<?php echo $sortrel?>" value="排序" />
         <input name="sortbtn2" rel="<?php echo md5("user_ok")?>" class="btn mr10" value="启用" type="submit">
         <input name="sortbtn2" rel="<?php echo md5("user_no")?>" class="btn mr10" value="拉黑" type="submit">
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
<script>

</script>