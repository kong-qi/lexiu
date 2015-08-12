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
$pagename="留言板";
$message="权限不够不能操作";//游客提示语
$upurl="liuyan_update";
$dlurl=md5("liuyan_del");
$dlallturl=md5("liuyan_delall");
$pageurl="liuyan";//分页链接
$sortrel=md5("liuyan_sort");
$updateurl="liuyan_update";
//是否有权限
$hasaccess=0;
if(permission("liuyan"))
{
  $hasaccess=1;
}else
{
  $hasaccess=0;
}
//搜索
$show='';
$keywrod='';
$wherestr="where kq_search='1'";
$qishu='';
$souid='';
$sonid='';
$sotitle='';
$solyid='';
$sony='';
//搜索
if(isset($_GET['show'])){
  $show=($_GET['show']);
}
if(isset($_GET['newsid'])){
  $sonid=($_GET['newsid']);
}
if(isset($_GET['userid'])){
  $souid=($_GET['userid']);
}
if(isset($_GET['title'])){
  $sotitle=($_GET['title']);
}

if(isset($_GET['qishu'])){
  $qishu=($_GET['qishu']);
}

if(isset($_GET['lyid'])){
  $solyid=($_GET['lyid']);
}
if(isset($_GET['neirong'])){
  $sony=($_GET['neirong']);
}

if($show)
{
  $status=$show;
  if($show==2){
     $status=1;
  }elseif($show==1){
    $status=0;
  }
  $wherestr.=" and kq_checked='".$status."'";
}
if($sonid)
{
   $wherestr.=" and kq_newsid = '".$sonid."'";
}
if($souid)
{
   $wherestr.=" and kq_userid ='".$souid."'";
}
if($qishu)
{
   $wherestr.=" and kq_qishu ='".$qishu."'";
}
if($sotitle)
{
   $wherestr.=" and kq_title like '%".$sotitle."%'";
}
if($sony)
{
   $wherestr.=" and kq_content like '%".$sony."%'";
}
if($solyid)
{
  $wherestr.=" and id='".$solyid."'";
}
echo $wherestr;
$url= $_SERVER["QUERY_STRING"];
/*if($show)
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
    $wherestr.="and (kq_name like '%".$keywrod."%' or kq_title like '%".$keywrod."%' or id = '".$keywrod."' or kq_userid = '".$keywrod."' or kq_newsid = '".$keywrod."')";
  }
  if($qishu)
  {
    $wherestr.="and kq_qishu ='".$qishu."'";
  }
}else
{
  if($keywrod)
  {
    $wherestr.="where kq_name like '%".$keywrod."%' or kq_title like '%".$keywrod."%' or id like '%".$keywrod."%' or kq_userid like '%".$keywrod."%' or kq_newsid like '%".$keywrod."%'";
    if($qishu)
    {
      $wherestr.="and kq_qishu ='".$qishu."'";
    }
  }else
  {
    if($qishu)
    {
      $wherestr.="where kq_qishu ='".$qishu."'";
    }
  }
}*/

$list_sql=$conn->selectone("".DB_EXT."liuyan","*", $wherestr." order by id desc limit ".($page-1)*$pagesize.",".$pagesize."");
$list_total=$conn->rows($conn->selectall("".DB_EXT."liuyan", $wherestr));
?>
<!-- 当前位置 -->
<div id="urHere">管理中心<b>&gt;</b><strong><?php echo $pagename?></strong></div>
<?php  if(!$hasaccess){
?>
<div class="gonggao">
<h3>温馨提示：</h3>
<p><?php echo $message?></p>
</div> 
<?php
}
?>
<div id="mainBox">
    <h3><!-- <a href="index.php?name=<?php echo "liuyan_add";?>" class="actionBtn add">添加<?php echo $pagename?></a> --><?php echo $pagename?>列表</h3>
    
    <div class="filter">
      
      <form name="filter" method="GET" action="index.php">
        <input name="name" type="hidden" value="liuyan_list" />
        <select name="show">
          <option value="0" <?php if($show==0){echo 'selected="selected"';}?>>不选择</option>
          <option value="1" <?php if($show==1){echo 'selected="selected"';}?>>隐藏</option>
          <option value="2"  <?php if($show==2){ echo 'selected="selected"';}?>>显示</option>
        </select>
        <label for="">留言编号</label>
        <input type="text" size="5" placeholder="留言编号" name="lyid" value="<?php echo $solyid==''?'':$solyid ?>"  class="inpMain"  />
        <label for="">信息id</label>
        <input type="text" size="5" placeholder="信息id" name="newsid" value="<?php echo $sonid==''?'':$sonid ?>"  class="inpMain"  />
        <label for="">用户id</label>
        <input type="text" size="5" placeholder="用户id" name="userid" value="<?php echo $souid==''?'':$souid ?>" id="textfield" class="inpMain"  />
        <label for="">期数</label>
        <input type="text" size="5" placeholder="期数" name="qishu" value="<?php echo $qishu==''?'':$qishu ;?>"  class="inpMain">
        <label for="">信息标题</label>
        <input type="text" size="30" name="title" placeholder="信息标题" value="<?php echo $sotitle==''?'':$sotitle ?>" id="textfield" class="inpMain"  />
		<label for="">留言内容</label>
        <input type="text" size="30" name="neirong" placeholder="信息标题" value="<?php echo $sony==''?'':$sony ?>" id="textfield" class="inpMain"  />
        
        <input  class="btnGray" value="筛选" type="submit"></form>
        
    </div>
    <div >
          <a href="ajax/liuyan.php?<?php echo $url?>" class="btn">下载表格</a>  先搜索后再下载，才能精确数据
        </div>
    <div id="list">
      <form name="del" method="post"  action="action/ac_dell.php?type=<?php echo $dlallturl?>" class="admin_form">
      <table id="kq" class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <th align="center" width="22"><input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox"></th>
            <th align="center" width="30">编号</th>
            <th align="center" width="30">楼层</th>
            <?php
            if($qishu)
            {
              echo '<th align="center" width="30">期数</th>';
            }
            ?>
            <th width="120" align="left">信息标题</th>
            <th width="100" align="center">留言者</th>
            <th align="center" width="200">留言内容</th>
            <th width="100" align="center">是否显示</th>
            <th align="center" width="80">留言日期</th>
            <th align="center" width="140">操作</th>
          </tr>
          <?php
            if(!$list_total)
            {
              echo '<tr> <td colspan="8" align="center">暂无记录</td> </tr>'; 
            }else{
              while($list_r=$conn->result($list_sql)){
              $list_r=dell_slashes($list_r);
          ?>
          <tr>
            <td align="center"><input name="checkbox[]" value="<?php echo $list_r['kq_uuid']?>" type="checkbox"></td>
            <td align="center"><?php echo $list_r['id']?></td>
            <td align="center"><span style="color:#f60"><?php echo $list_r['kq_number']?> 楼</span></td>
            <?php
            if($qishu)
            {
              echo '<td align="center" width="30"><span style="color:#f60">'.$list_r['kq_qishu'].'</span></td>';
            }
            ?>
            <td><?php echo ($list_r['kq_title'])?>(id:<?php echo $list_r['kq_newsid']?>)</td>
            <td align="center">
            <?php
              echo $list_r['kq_name'];
            ?>
            </td>
            <td align="center"><label for="textarea"></label>
              <textarea name="textarea" style="background:#DBEAF9; color:#333; font-size:12px" cols="40" rows="4" readonly="readonly" class="textArea" id="textarea"><?php echo $list_r['kq_content']?></textarea></td>
            <td align="center"><?php echo echo_option($list_r['kq_checked'],array('隐藏','显示'))?></td>
            <td align="center"><?php echo date("Y-m-d ",$list_r['kq_ctime'])?></td>
            <td align="center">
            <?php
            if(!$hasaccess){
              echo "没有权限";
            }else{
            ?>
            <?php 
            if(!has_date("lyreply","where kq_lyid='".$list_r['id']."'"))
            {
             /* echo ' <a href="javascript:void(0);" class="reply_add" data-id="'.$list_r['id'].'" ><span class="wenzhang">添加回复</span></a>';*/
            }else{
              /*echo ' <a href="javascript:void(0);" class="reply" data-id="'.$list_r['id'].'"><span class="wenzhang"  >查看回复</span></a>';*/
            }
            ?>
            <a href="index.php?name=<?php echo $updateurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
            <span class="wenzhang">编辑</span>
            </a>
            <a href="action/ac_dell.php?type=<?php echo $dlurl?>&amp;id=<?php echo $list_r['kq_uuid']?>">
            <span class="delete">删除</span></a>
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
      <?php  if($hasaccess){
        ?>
      <div class="action"><input name="submit" class="btn delall" value="删除" type="submit">
      <input name="sortbtn2" rel="<?php echo md5("liuyan_ok")?>" class="btn mr10" value="启用" type="submit">
      <input name="sortbtn2" rel="<?php echo md5("liuyan_no")?>" class="btn mr10" value="拉黑" type="submit">
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
$(".reply_add").on('click',  function(event) {
    var id=$(this).attr('data-id');
   
    var pageii = $.layer({
        type: 1,
        title: false,
        
        area: ['auto', 'auto'],
        border: [0], //去掉默认边框
       
        closeBtn: [0, false], //去掉默认关闭按钮
        shift: 'left', //从左动画弹出
        page: {
            html: '<div class="reply_warp "><h3>添加回复</h3><table class="tableBasic  "> <tr> <td width="80" align="center"><b>回复内容</b></td> <td><textarea name="" id="" cols="30" rows="5" class="textArea repcontent"></textarea></td> </tr> </table><button id="gobtn" class="btn mlr10" onclick="">立即回复</button><button id="pagebtn" class="btn" onclick="">关闭</button></div>'
        }
    });
    $("#gobtn").on('click',  function(event) {
      content=$(".repcontent").val();
     
      $.ajax({
          'url': 'ajax/reply.php',
          type:'post',
          data:{kq_lyid:id,kq_content:content,action:'add'},
          cache: false,
          dataType: 'json',
          success:function(data) {
              if(data.status){
                alert('回复成功');
                location.reload();
              }else{
                alert('回复失败，请重新回复');
              }
             
          }
      });
    });
    $('#pagebtn').on('click', function(){
      layer.close(pageii);
  });
});
$(".reply").on('click',  function(event) {
  var id=$(this).attr('data-id');
  
    $.ajax({
        'url': 'ajax/reply.php',
        type:'post',
        data:{id:id,action:'get'},
        cache: false,
        dataType: 'json',
        success:function(data) {
          content=data.kq_content;
          var pageii = $.layer({
              type: 1,
              title: false,
              area: ['auto', 'auto'],
              border: [0], //去掉默认边框
              closeBtn: [0, false], //去掉默认关闭按钮
              shift: 'left', //从左动画弹出
              page: {
                  html: '<div class="reply_warp "><h3>查看回复</h3><table class="tableBasic  "> <tr> <td width="80" align="center"><b>回复内容</b></td> <td><textarea name="" id="" read cols="30" rows="5" class="textArea ">'+content+'</textarea></td> </tr> </table><button id="pagebtn" class="btn" onclick="">关闭</button></div>'
              }
          });
           $('#pagebtn').on('click', function(){
              layer.close(pageii);
          });
           
        }
    });
   
});
function bluefoc(classid,keyvalue){
  $(classid).focus(function(event) {
      if($(this).val()==keyvalue){
        $(this).val("");
      }
    }).blur(function(event) {
      if($(this).val()==""){
        $(this).val(keyvalue);
      }
    });
};

</script>
