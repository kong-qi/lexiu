<?php
session_start();
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
//防止RSF攻击
$_SESSION['add_input']=md5(uniqid('', true));
//是否存在记录

$hasdata=get_first_date('news',"where kq_userid='".$user['id']."'");
if(count($hasdata)>0)
{
  echo "<script>alert('已经发布过了请删除后再发布');window.location.href='user-list.html'</script>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title><?php echo $kq_title?></title>
  <meta name="keywords" content="<?php echo $kq_keyword?>" />
  <meta name="description" content="<?php echo $kq_description?>" />
  <?php require_once(KQ_PATH.'inc/style.inc.php');?>
  <link rel="stylesheet" href="kindeditor-4-10/themes/default/default.css" />
  <script src="kindeditor-4-10/kindeditor.js"></script>
  <script src="kindeditor-4-10/lang/zh_CN.js"></script>
  <script language="javascript" src="layer/layer.min.js"></script>
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
    			     <div class="input_adv_warp">
                <h3>项目提交中心</h3>
                <form action="inc/action.php" method="post">
                <input name="chkfrom" type="hidden" value="<?php echo $_SESSION['add_input'];?>">
                <input name="action" type="hidden" value="<?php echo md5('user_add');?>">
               
                <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="90">项目标题：</td>
                      <td>
                        <input name="kq_title" size="40" class="inpMain" id="kq_title" type="text"></td>
                    </tr>
                     <tr>
                      <td width="90">搜索关键词：</td>
                      <td>
                        <input name="kq_guanjc" size="40" class="inpMain" id="kq_guanjc" type="text"><span style="margin-left:5px;color:#f60">每个关键字之间用","隔开</span> </td>
                    </tr>
                    <tr>
                      <td width="90">地址：</td>
                      <td>
                        <input name="kq_address" size="40" class="inpMain" id="kq_address" type="text"></td>
                    </tr>
                    <tr>
                      <td width="90">电话：</td>
                      <td>
                        <input name="kq_tel" size="40" class="inpMain" id="kq_tel" type="text"></td>
                    </tr>
                    <tr>
                      <td width="90">QQ：</td>
                      <td>
                        <input name="kq_qq" size="40" class="inpMain" id="kq_qq" type="text"></td>
                    </tr>
                    <tr>
                      <td width="90">微信：</td>
                      <td>
                        <input name="kq_weixin" size="40" class="inpMain" id="kq_weixin" type="text"></td>
                    </tr>
                    <tr>
                      <td width="90">项目分类：</td>
                      <td>
                      <select name="kq_lmid" id="kq_fid">
                        <?php  get_tree_class(0,0,get_class_array2("where id=1"))?>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td width="80">封面图片：</td>
                      <td>
                        <input name="kq_picurl" size="40" class="inpMain" id="kq_picurl" type="text">
                        <input name="submit" class="btn" onclick="updatepic('kq_picurl','ylpic','','','710','410',1)" value="上传图片" type="button">
                      </td>
                    </tr>
                    <tr>
                      <td width="80">封面预览：</td>
                      <td id="ylpic"></td>
                    </tr>
                    <tr>
                      <td width="80">内容图片：</td>
                      <td>
                         <ul class="list_u_pic tbul">
                         </ul>
                         <div class="clear_float"></div>
                        <input name="submit" class="btn" onclick="updatepic('.tbul','ylpic',1,'','500','400')" value="上传内容图片" type="button">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">项目内容：</td>
                      
                    </tr>

                    <tr>
                      <td colspan="2"><textarea name="kq_content" cols="70" rows="5" class="textArea" id="kq_content"></textarea></td>
                      
                    </tr>
                    <tr>
                      <td colspan="2" align="center">
                        <input name="submit" class="btn jianyibtn" value="立即发布" type="submit"></td>
                    </tr>
                  </tbody>
                </table>
                </form>
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
    var editor = KindEditor.create('#kq_content',{
        width : '600px',
        imageTabIndex:1,
        items : [
            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
            'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
            'insertunorderedlist', '|', 'emoticons', 'image', 'link'
        ]
        
    });
  	$(".jianyibtn").on('click',  function(event) {
  		  var title=$("#kq_title").val();
        var pic=$("#kq_picurl").val();
        if(title==''){
          alert('项目名称不能为空');

          return false;
        }
        if(pic==''){
          alert('图片必须传一张');
          return false;
        }
  	});
  $(document).on('click', '.up_pic', function(event) {
    
     
     var onthis = $(this).parents(".itempic");

     var getup = $(this).parents(".itempic").prev(".itempic");
    
     if(getup.html()!=null)
     {
      
      $(getup).before(onthis);
      
     }
    
  });
  //下移动
  $(document).on('click', '.botm_pic', function(event) {
    
     var onthis = $(this).parents(".itempic");
     var getup = $(this).parents(".itempic").next(".itempic");
     if(getup.html()!=null)
     {
     
      $(getup).after(onthis);
      
     }
    
  });
  //删除
  $(document).on('click', '.del_pic', function(event) {
     if(window.confirm('你确定要取消删除吗？')){
        var onthis = $(this).parents(".itempic");
        onthis.remove();
       return true;
      }else{
        
        return false;
      }
    
  });
  </script>
</html>
