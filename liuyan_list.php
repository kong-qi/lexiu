<?php
define("KQ_WORK",true);
require_once("inc/base.inc.php");
$ed='';
if(isset($_GET['ed']))
{
$ed=$_GET['ed'];
}
if(!isset($_COOKIE['uid'])){
	echo "<script>alert('请登陆后操作');window.location.href='/';</script>";
	exit();
}
$user=is_login($_COOKIE['uid']);
$wherestr="";

if(!isset($_GET['page'])){
  $page=1;
}else{

  $page=intval($_GET['page']);
}
$list_sql=$conn->selectone("".DB_EXT."liuyan","*","where kq_userid='".$user['id']."' ".$wherestr." order by kq_sort desc,id desc limit ".($page-1)*$pagesize.",".$pagesize."");
$list_total=$conn->rows($conn->selectall("".DB_EXT."liuyan","where kq_userid='".$user['id']."' ".$wherestr.""));

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title><?php echo $kq_title?></title>
  <meta name="keywords" content="<?php echo $kq_keyword?>" />
  <meta name="description" content="<?php echo $kq_description?>" />
 <?php require_once(KQ_PATH.'inc/style.inc.php');?>
</head>
<body>
    <?php require_once(KQ_PATH.'inc/state.inc.php');?>
  <div class="warp">
    <!-- 头部 -->
    <?php require_once(KQ_PATH.'inc/header.inc.php');?>
    <!-- 中间内容 -->
    		<div class="help_warp ">
    			<div class="wm1000">
    			<div class="help_cont">
    				<div class="left">
    				<?php require_once(KQ_PATH.'inc/user_left.inc.php');?>
    				</div>
    				<div class="right">
    					<div class="news_list_warp">
                <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th width="30">楼层</th>
                  <th width="200">信息标题</th>
                  <th width="150">留言内容</th>
                  <th width="60">发布时间</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                    if(!$list_total)
                    {
                        echo '<tr> <td colspan="4" align="center">暂无记录</td> </tr> '; 
                    }else
                    {
                      while($list_r=$conn->result($list_sql)){
                          $list_r=dell_slashes($list_r);
                          //找出信息
                          $newsmsg=get_first_date('news',"where id='".$list_r['kq_newsid']."'");
                          //
                          $giflanm=get_first_date('lanmu',"where id='".$newsmsg['kq_lmid']."'");

                          if($giflanm['kq_type']=='gitf')
                          {
                            $neurl='git-'.$list_r['kq_newsid'].".html";
                          }else
                          {
                            $neurl='show-'.$list_r['kq_newsid'].'.html';
                          }
                   
                  ?>
                  <tr>
                    <td align="center"><?php echo $list_r['kq_number']?></td>
                    <td class="td_title"><a href="<?php echo  $neurl?>" target="_blank" title="点击查看"><?php echo $list_r['kq_title']?></a> </td>
                    <td algin="center"><textarea name="textarea" style=" color:#333; font-size:12px" cols="40" rows="4" readonly="readonly" class="textArea" id="textarea"><?php echo $list_r['kq_content']?></textarea></td>
                    <td align="center"><?php echo date('Y-m-d H:i:s',$list_r['kq_ctime'])?></td>
                    
                   
                  </tr>
                  <?php }};?>
                </tbody>
                </table>
                <div class="pager">
                  <?php
                    $subPages=new SubPages($pagesize,$list_total,$page,$sub_pages,"user-ly-",2,".html")
                  ?>
                </div>     
              </div>

    				</div>
    				<div class="clear_float"></div>
    			</div>
    			
    			<div class="clear_float"></div>
    			</div>
    			<div class="clear_float"></div>
    		</div><!-- help_warp -->
    <!-- 底部 -->
    <?php require_once(KQ_PATH.'inc/footer.inc.php');?>
  </div>
</body>
  <script>
  	$(".user_up").on('click',  function(event) {
  		var name=$("input[name='kq_name']").val();
  		var qq=$("input[name='kq_qq']").val();
  		var sex=$("input[name='kq_sex']:checked").val();
  		var tel=$("input[name='kq_tel']").val();
  		var address=$("textarea[name='kq_address']").val();
  		
  			$.post('inc/action.php',{action:'user_up',kq_name:name,kq_qq:qq,kq_sex:sex,kq_tel:tel,kq_address:address},function(data){
  				
  				if(data){
  					alert('更新成功');
  					window.location.href='user.html';
  				}else{
  					alert('更新失败，再试一次');
  				}
  			});
  	});
  
  </script>
</html>
