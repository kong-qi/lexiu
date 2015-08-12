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
if(!isset($_GET['lmid'])){
  new Alert("非法操作","back");

}else{
  $lanmuid=$_GET['lmid'];//栏目ID
};

//本页信息
$message="游客身份不能操作信息";//游客提示语
$updateurl="news_update";
$addurl="";
$dlurl=md5("news_dell");
$dlallturl=md5("news_all");
$sortrel=md5("news_sort");
$pageurl="news&lmid=".$lanmuid;//分页链接
$show="";
$keywrod="";
$wherestr="";
$isok='';
$cityid='';


if(isset($_GET['show'])){
  $show=empty($_GET['show'])?"":$_GET['show'];
}
if(isset($_GET['isok'])){
  $isok=empty($_GET['isok'])?"":$_GET['isok'];
}
if(isset($_GET['keyword'])){
  $keywrod=empty($_GET['keyword'])?"":$_GET['keyword'];
}
if(isset($_GET['city'])){
  $cityid=$_GET['city'];
}

if($show)
{
    if($show==1){
       $wherestr.="and kq_checked='0'";
    }
    if($show==2){
       $wherestr.="and kq_checked='1'";
    }
       $pageurl.="&show=".$show;

}
if( $isok)
{
  $wherestr.="and kq_isok='".$isok."'";
}
if($cityid)
{
  $strcityid="'".implode("','", get_city_id($cityid))."'";
  $wherestr.="and kq_city in (".$strcityid.")";
}


if($keywrod){
   $wherestr.="and kq_title like '%".$keywrod."%' or id like '%".$keywrod."%'";
   $pageurl.="&keyword=".$keywrod;
}

$list_sql=$conn->selectone("".DB_EXT."news","*","where kq_lmid='".$lanmuid."' ".$wherestr." order by kq_sort desc,id desc limit ".($page-1)*$pagesize.",".$pagesize."");
$list_total=$conn->rows($conn->selectall("".DB_EXT."news","where kq_lmid='".$lanmuid."' ".$wherestr.""));
//获取当前栏目信息
$lanmumsg=get_first_date('lanmu',"where id='".$lanmuid."'");
//活动
$huodong=$lanmumsg['kq_type'];
$pagename=$lanmumsg['kq_name'].'';
//是否有权限
//编辑权限
$editorpass=0;
$delpass=0;
$updpass=0;
if(permission("news_add"))
{
  $editorpass=1;
}
if(permission("news_dl"))
{
  $delpass=1;
}
if(permission("news_edt"))
{
  $updpass=1;
}
$hasaccess=0;
if(permission("root"))
{
  $hasaccess=1;
}else
{
  $hasaccess=0;
}

$attr=get_config('kq_shuxing');
$attr=json_decode(($attr['kq_shuxing']),true);
//城市选择
$classarr=get_city_array('order by kq_sort desc');


$bid=$cityid;
?>

<!-- 当前位置 -->
<div id="urHere">
  管理中心 <b>&gt;</b> <strong><?php echo $pagename?></strong>
</div>
<div id="mainBox">
  <h3>
    <a href="index.php?name=<?php echo "news_add&lmid=".$lanmuid;?>" class="actionBtn add">添加<?php echo $pagename?></a>
    <?php echo $pagename?>列表</h3>
  <div class="filter">
    <form name="filter" method="GET" action="index.php">
      <input name="name" type="hidden" value="news" />
      <input name="lmid" type="hidden" value="<?php echo $lanmuid?>" />
      <select name="show">
        <option value="0" <?php if($show==0){echo 'selected="selected"';}?>>不选择</option>
        <option value="1" <?php if($show==1){echo 'selected="selected"';}?>>隐藏</option>
        <option value="2"  <?php if($show==2){ echo 'selected="selected"';}?>>显示</option>
      </select>
      <select name="city" id="kq_fid">
        <option value="0">全部城市</option>
         <?php  classfl();?>
      </select>
      <select name="isok">
        <?php
          if(count($attr)>0)
          {
            foreach ($attr as $key => $at_v) {
              if($key==$isok)
              {
                 echo ' <option value="'.$key.'" selected="selected">'.$at_v.'</option>'; 
              }else
              {
                 echo ' <option value="'.$key.'" >'.$at_v.'</option>'; 
              }
            }
          }
          
        ?>
       
      </select>
      <input type="text" name="keyword" value="<?php echo $keywrod?>" id="textfield" class="inpMain"  />
      <input name="submit" class="btnGray" value="筛选" type="submit"></form>
  </div>
  <div id="list">
    <form name="del" method="post" action="action/ac_dell.php?type=<?php echo $dlallturl?>" class="admin_form">
      <table id="kq" class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <th align="center" width="22">
              <input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox"></th>
            <th align="center" width="40">排序</th>
            <th align="center" width="40">编号</th>
            <th align="left">信息标题</th>
            <td align="center" width="100">所属城市</td>
            <th align="center" width="60">是否显示</th>
            <th  align="center" width="80">发布者</th>
            <?php
            if($lanmumsg['kq_model']==1)
            {
              echo '<th align="center" width="60">开始时间</th>
              <th align="center" width="60">结束时间</th>';
             // echo '<th align="center" width="150">缩略图</th>';
            }
            ?>
            <th align="center" width="100">添加日期</th>
            
            <th align="center" width="180">操作</th>
          </tr>
          <?php
            if(!$list_total)
            {
                echo '<tr> <td colspan="7" align="center">暂无记录</td> </tr> '; 
            }else
            {
               while($list_r=$conn->result($list_sql)){
                 $list_r=dell_slashes($list_r);
            ?>
          
          <tr>
            <td><input name="checkbox[]" value="<?php echo $list_r['kq_uuid']?>" type="checkbox"></td>
            <td><input name="sort[]" type="text" value="<?php echo $list_r['kq_sort']?>" class="inpMain" id="sort[]" size="5" /></td>
            <td><?php echo $list_r['id']?></td>
            <td><?php echo $list_r['kq_title']?><?php
           
              if($list_r['kq_index']==1)
              {
                echo '<span class="red mlt10">【首页推荐】</span>';
              }elseif($list_r['kq_index']==2)
              {
                echo '<span class="red mlt10">【右侧广告】</span>';
              }
            ?>
            <?php
            if($huodong=='adv')
            {
              attr_change($attr,$list_r['kq_isok']);

              
            }
            ?>
            </td>
            <td  align="center">
              <?php
                if($list_r['kq_city']!='')
                {
                  $city=get_first_date("city","where id='".$list_r['kq_city']."'");
                  echo '<span class="wenzhang">'.$city['kq_title'].'</span>';
                }
              ?>
              
            </td>
            <td align="center"> 
            <?php
              if($list_r['kq_checked'])
              {
                echo '<b style="color:#28B779">显示</b>';
              }
              else
              {
                echo '<b style="color:#f00">隐藏</b>';
              }
            ?>
            </td>
            <td align="center"><?php echo $list_r['kq_author']==''?'管理员':$list_r['kq_author'];?></td>
            <?php
            if($lanmumsg['kq_model']==1)
            {
            ?>
            <td align="center"><?php echo $list_r['kq_sttime']==''?'':date("Y-m-d H:i:s",$list_r['kq_sttime'])?></td>
            <td align="center"><?php echo $list_r['kq_endtime']==''?'':date("Y-m-d H:i:s",$list_r['kq_endtime'])?></td>
           <!--  <td><img src="<?php echo pic_url($list_r['kq_picurl'])?>" class="fmpic" alt="" width="120"></td> -->
            <?php
            }
            ?>
            <td> <?php echo date("Y-m-d ",$list_r['kq_ctime'])?></td>
            <td>

              <?php
                if($updpass)
                {
                  if($huodong=='adv'){
              ?>
              <link href="datepicker/jquery-ui.css" rel="stylesheet">
               <style>
              .ui-timepicker-div .ui-widget-header { margin-bottom: 8px;}
              .ui-timepicker-div dl { text-align: left; }
              .ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
              .ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
              .ui-timepicker-div td { font-size: 90%; }
              .ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
              .ui_tpicker_hour_label,.ui_tpicker_minute_label,.ui_tpicker_second_label,.ui_tpicker_millisec_label,.ui_tpicker_time_label{padding-left:20px;}
               </style>
              
              <?php

                if(count(get_first_date("winmsg","where kq_newsid='".$list_r['id']."' "))<=0)
                {
              ?>
              <a href="index.php?name=win_add&id=<?php echo $list_r['id']?>" class="win_btn" target="_blank"><span class="renbtn">发布中奖</span></a> &nbsp;&nbsp;&nbsp;&nbsp;
              <?php
              }else{
                echo '<span class="danpage">已经发奖</span>&nbsp;&nbsp;&nbsp;&nbsp';
                }
              }
              ?>
              <a href="index.php?name=<?php echo $updateurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
                <span class="wenzhang">编辑</span>
              </a>
              <?php
              };
              if($delpass)
              {

              ?>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="action/ac_dell.php?type=<?php echo $dlurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
                <span class="delete">删除</span>
              </a>
              <?php
              }
              if(!$updpass && !$delpass ){
                echo '没有权限';
              }
              ?>

            </td>
          </tr>
          <?php 
          }
          }?>
        </tbody> 
      </table>
      <?php  if($hasaccess){
      ?>
      <div class="action">
      <input name="submit" class="btn delall" value="删除" type="submit">
      <?php }?>
      <?php if($hasaccess){?>
      <input name="sortbtn" rel="<?php echo $sortrel?>" class="btn mr10" value="排序" type="submit">
      <input name="sortbtn2" rel="<?php echo md5("showmsg")?>" class="btn mr10" value="显示" type="submit">
      <input name="sortbtn2" rel="<?php echo md5("showmsg_no")?>" class="btn mr10" value="隐藏" type="submit">
      <input name="sortbtn2" rel="<?php echo md5("tindex")?>" class="btn mr10" value="推荐首页" type="submit">
      <input name="sortbtn2" rel="<?php echo md5("notindex")?>" class="btn mr10" value="取消推荐首页" type="submit">
      <input name="sortbtn2" rel="<?php echo md5("tleft")?>" class="btn mr10" value="推荐右侧广告" type="submit">
      <input name="sortbtn2" rel="<?php echo md5("notleft")?>" class="btn mr10" value="取消右侧广告" type="submit">
      <?php
      if($huodong=='adv'){
      ?>
      <select name="isok">
             <?php
               if(count($attr)>0)
               {
                 foreach ($attr as $key2 => $at_v2) {
                  
                      echo ' <option value="'.$key2.'" >'.$at_v2.'</option>'; 
                   
                 }
               }
               
             ?>
       </select>
      <input name="sortbtn2" rel="<?php echo md5("isok")?>" class="btn mr10" value="立即设置" type="submit">
      <?php
      }
      ?>
      </div>
      <?php if($huodong=='adv'){?>
      <div class="action" style="border:2px solid #0072C6; padding:10px;">
      开始时间：<input name="kq_sttime" size="20" class="inpMain" value="<?php echo date("Y-m-d H:i:s",time())?>" type="text" id="kq_sttime" />
     结束时间：<input name="kq_endtime" size="20" class="inpMain" type="text" id="kq_endtime" />
     <input name="sortbtn2" rel="<?php echo md5("indextime")?>" class="btn mr10" value="发布时间" type="submit">
     </div>
      <script src="datepicker/jquery-ui.js"></script>
      <script src="datepicker/timepicker.js"></script>  
      <script>
        $("#kq_sttime").datetimepicker({
            defaultDate: "+1w",
            dateFormat:'yy-mm-dd',
            changeMonth: true,
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
            $( "#kq_endtime" ).datetimepicker( "option", "minDate", selectedDate );
            $("#kq_endtime").datetimepicker( 'show' ) ;
            }
        });
      $("#kq_endtime").datetimepicker({
          defaultDate: "+1w",
          dateFormat:'yy-mm-dd',
          changeMonth: true,
          numberOfMonths: 3,
          onClose: function( selectedDate ) {
          $( "#kq_sttime" ).datetimepicker( "option", "maxDate", selectedDate );
          }
      });


      </script>
      <?php }};?>
    </form>
  </div>
  <div class="clear"></div>
  <div class="pager">
    <?php
      $subPages=new SubPages($pagesize,$list_total,$page,$sub_pages,"index.php?name=".$pageurl."&amp;page=",2)
    ?>
  </div>
 
</div>
<?php
function classfl($fid=0,$num=0){
  
    global $classarr,$bid;   
 
    for($i=0;$i<count($classarr);$i++){        
           if($classarr[$i][1]==$fid){       
          //本ID就选中父元素
        if($classarr[$i][0]==$bid){
             echo "<option value=".$classarr[$i][0]." selected='selected'>";  
                 echo str_repeat("&nbsp;&nbsp;", $num)."|-".$classarr[$i][2]."</option>";   
          }else{
               echo "<option value=".$classarr[$i][0].">";  
                 echo str_repeat("&nbsp;&nbsp;", $num)."|-".$classarr[$i][2]."</option>";   
            }
        
    
            classfl($classarr[$i][0],$num+2);   
    }  
    }  
  }   
?> 
