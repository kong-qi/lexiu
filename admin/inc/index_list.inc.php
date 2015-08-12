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


if(isset($_GET['type'])){
$type=$_GET['type'];
}

//本页信息
$pagename="首页调用";
$message="权限不够不能操作";//游客提示语
$updateurl="index_update";
$addurl="index_add";
$dlurl=md5("index_del");
$dlallturl=md5("index_delall"); 
$pageurl="index_list";//分页链接 
$sortrel=md5("index_sort");
$sortrel2=md5("index_sort2");
$sortrel3=md5("index_sort3");
$list_sql=$conn->selectone("".DB_EXT."index","*"," order by kq_sort desc, id desc limit ".($page-1)*$pagesize.",".$pagesize."");
$list_total=$conn->rows($conn->selectall("".DB_EXT."index",""));

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
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div> 
<?php  if(!$hasaccess){?>
<div class="gonggao">
<h3>温馨提示：</h3>
<p><?php echo $message?></p>
</div>  <?php
}
?>
<div id="mainBox">
    <h3><?php echo $pagename?><a href="index.php?name=<?php echo $addurl;?>" class="actionBtn add">添加调用</a></h3>
      <div id="list">
        <form name="del" method="post" action="action/ac_dell.php?type=<?php echo $dlallturl?>" class="admin_form">
          <table id="kq" class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <th align="center" width="22"><input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox"></th>
                <th align="center" width="40">编号</th>
                <th align="center" width="40">排序</th>
                <th align="left">名称</th>
                <th align="left">类型</th>
                <th align="center" width="120">操作</th>
              </tr>
              <?php
                if($list_total>0)
                {
                   while($list_r=$conn->result($list_sql)){
                     $list_r=dell_slashes($list_r);
                     ?><tr>
                  <td align="center"><input name="checkbox[]" value="<?php echo $list_r['kq_uuid']?>" type="checkbox"></td>
                  <td align="center">
                  <input name="sort[]" type="text" value="<?php echo $list_r['kq_sort']?>" class="inpMain" id="sort[]" size="5" /></td>
 
                  <td align="center"><?php echo $list_r['id']?></td>
                  <td><?php echo $list_r['kq_title']?></td>
                  <td>
                    <?php echo_option($list_r['kq_type'],array('cont'=>'内容类型','pic'=>'图片类型','code'=>'代码类型')) ?>
                  </td>
                 
                  <td>
                    <?php  if($hasaccess){?>
                    <a href="index.php?name=<?php echo $updateurl?>&amp;id=<?php echo $list_r['kq_uuid']?>"><span class="wenzhang">编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="action/ac_dell.php?type=<?php echo $dlurl?>&amp;id=<?php echo $list_r['kq_uuid']?>"><span class="delete">删除</span></a>
                    <?php }?>
                  </td></tr>
                  <?php     
                   }
                }else
                {
                  echo '<tr><td colspan="6" align="center">暂无记录</td></tr>';
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
