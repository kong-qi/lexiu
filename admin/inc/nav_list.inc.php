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
$type='nav';
if(isset($_GET['type'])){
  $type=$_GET['type'];
}
//本页信息
$pagename="导航自定义";
$ykmessage="权限不够不能操作";//游客提示语
$addurl="nav_add";
$addname='';
$upurl="nav_update";
$dlurl=md5("nav_del");
$dlallturl=md5("nav_delall"); 
$pageurl="nav_list&type=".$type;//分页链接 
$sortrel=md5("nav_sort");
$sortrel2=md5("nav_sort2");
$sortrel3=md5("nav_sort3");
$list_sql=$conn->selectone("".DB_EXT."nav","*","where kq_type='".$type."' order by kq_sort desc, id desc limit ".($page-1)*$pagesize.",".$pagesize."");
$list_total=$conn->rows($conn->selectall("".DB_EXT."nav","where kq_type='".$type."' "));
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
  <p><?php echo $ykmessage?></p>
</div>
<?php
}
?>
<div id="mainBox">
  <h3><a href="index.php?name=<?php echo $addurl;?>" class="actionBtn add">添加<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>列表</h3>
  <div class="idTabs ">
      <ul class="tab">
        <li <?php echo $type=='nav'?'class="selected"':"";?>><a  href="index.php?name=nav_list&type=nav">主导航</li>
        <li <?php echo $type=='foot'?'class="selected"':"";?>><a href="index.php?name=nav_list&type=foot">底部导航</a></li>
        <li <?php echo $type=='top'?'class="selected"':"";?>><a href="index.php?name=nav_list&type=top">顶部</a></li>
      </ul>
    <div class="items_warp">
      
      <div id="list" class="items" >
          <form name="del" method="post" action="action/ac_dell.php?type=<?php echo $dlallturl?>" class="admin_form">
            <table id="kq" class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <th align="center" width="22"><input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox"></th>
                  <th align="center" width="40">排序</th>
                  <th align="center" width="40">编号</th>
                  <th align="left">导航名称</th>
                  <th align="left">上级名称</th>
                  <th align="center">链接地址</th>
                  <th align="center" width="120">操作</th>
                </tr>
                  <?php
                    if($list_total>0)
                    {
                       while($list_r=$conn->result($list_sql)){
                         $list_r=dell_slashes($list_r);
                         ?><tr>
                      <td align="center"><input name="checkbox[]" value="<?php echo $list_r['kq_uuid']?>" type="checkbox"></td>
                      <td align="center"><input name="sort[]" type="text" value="<?php echo $list_r['kq_sort']?>" class="inpMain" id="sort[]" size="5" /></td>
                      <td align="center"><?php echo $list_r['id']?></td>
                      <td><?php echo $list_r['kq_name']?></td>
                      <td>
                      <?php  
                      if($list_r['kq_fid']==0){
                        echo '根节点';
                      }else{
                         $fname=get_first_date("nav","where id='".$list_r['kq_fid']."'"); 
                         echo $fname['kq_name'];
                      }
                     
                      ?>
                      </td>
                      <td><?php echo $list_r['kq_wburl']==''?$list_r['kq_url']:$list_r['kq_wburl']?></td>
                      <td>
                        <?php  if($hasaccess){?>
                        <a href="index.php?name=<?php echo $upurl?>&amp;id=<?php echo $list_r['kq_uuid']?>"><span class="wenzhang">编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="action/ac_dell.php?type=<?php echo $dlurl?>&amp;id=<?php echo $list_r['kq_uuid']?>"><span class="delete">删除</span></a>
                        <?php }?>
                      </td></tr>
                      <?php     
                       }
                    }else
                    {
                      echo '<tr><td colspan="7" align="center">暂无记录</td></tr>';
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
      
      
    </div><!--items-->
    <div class="clear"></div>
    <div class="pager">
    <?php
      $subPages=new SubPages($pagesize,$list_total,$page,$sub_pages,"index.php?name=".$pageurl."&amp;page=",2);
    ?>
    </div>   
  </div>
</div>
