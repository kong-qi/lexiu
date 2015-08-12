<link rel="stylesheet" href="kindeditor-4-10/themes/default/default.css" />
<script src="kindeditor-4-10/kindeditor.js"></script>
<script src="kindeditor-4-10/lang/zh_CN.js"></script>
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

if(!isset($_GET['lmid'])){
  new Alert("非法操作","back");
  exit(); 
}else{

  $id=setdefensesql($_GET['lmid']);

}


//本页配置信息
$pagename="信息";
$btnaction="";//提交状态		 
$message="权限不够不能操作";//游客提示语		
//信息内容初始化
$title='';
$intro='';
$laiyuan='';
$content='';
$mbcontent='';


$sqlshow=$conn->selectall("".DB_EXT."news","where kq_lmid='".$id."' limit 1");
if($conn->rows($sqlshow)){
  $show_r=dell_slashes($conn->result($sqlshow));
  $title=$show_r['kq_title'];
  $intro=$show_r['kq_intro'];
  $laiyuan=$show_r['kq_source'];
  $content=$show_r['kq_content'];
  $mbcontent=$show_r['kq_mbcontent'];
  $actionmd5=md5("danye_update");
  $actionurl="action/ac_update.php";

}else{
  $actionurl="action/ac_add.php";
  $actionmd5=md5("danye_add");
}
$editorpass=0;
if(permission("news_add") || !permission("news_edt")){
    $editorpass=1;    
  }else{
    $actionurl="";
    $btnaction='disabled="disabled"'; 
};

$lanmuid=$id;
$lanmumsg=get_first_date('lanmu',"where id='".$lanmuid."'");
$pagename=$lanmumsg['kq_name'].'单页';


?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?></strong> </div>
<?php  if(!$editorpass){?>
<div class="gonggao">
  <h3>温馨提示：</h3>
  <p><?php echo $message?></p>
</div>
<?php
}
?>
<div id="mainBox">
  <h3><?php echo $pagename?></h3>
  <div class="idTabs kq_li">
    <ul class="tab">
      <li><a  href="#"><?php echo $pagename?></a></li>
       <?php
        if(MOBILE_EDT){
          echo '<li><a href="#">手机端内容</a></li>';
        }
        ?>
    </ul>
    <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
      <div class="kq_div">
        <div class="items">
          <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
          <input name="kq_lmid" type="hidden" value="<?php echo $lanmuid?>" />
          <input name="id" type="hidden" value="<?php echo $id?>" />
          <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td align="right" width="160">信息标题：</td>
                <td width="754" colspan="2"><input name="kq_title" size="40" value="<?php echo $title==''?$lanmumsg['kq_name']:$title ; ?>" class="inpMain" type="text" id="kq_title"></td>
              </tr>
              <tr>
                <td align="right">来源：</td>
                <td colspan="2"><input name="kq_source" type="text" class="inpMain" id="ms_source" value="<?php echo $laiyuan==''?'':$laiyuan; ?>" size="20" /></td>
              </tr>
              <tr>
                <td align="right">简介：</td>
                <td colspan="2"><label for="ms_intro"></label>
                  <textarea name="kq_intro" id="ms_intro" class="textArea" cols="45" rows="5"><?php echo $intro==''?'':$intro;?></textarea></td>
              </tr>
              <tr>
                <td align="right">正文：</td>
                <td colspan="2"><textarea  name="kq_content" id="kq_content" cols="80" rows="5"><?php echo $content==''?'':@htmlspecialchars($content);?></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>
        
        <?php
        if(MOBILE_EDT){?>
      <div class="hide">
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
          <tbody>
           <tr>
              <td width="160" align="right">手机端内容</td>
              <td colspan="2"><textarea  name="kq_mbcontent" id="kq_mbcontent" cols="80" rows="5"><?php echo $mbcontent==''?'':@htmlspecialchars($mbcontent);?></textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php }?>
      </div>
      <!--kq-->
      <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td width="160"></td>
            <td><input name="submit" class="btn newsbtn" value="提交" type="submit"></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
<script>
      $(function() {
       
        var editor = KindEditor.create('#kq_content',{
         
           width : '700px',
          imageTabIndex:1,
          fileManagerJson : 'kindeditor-4-10/php/file_manager_json.php',
          allowFileManager : true
        });
        <?php
        if(MOBILE_EDT){
          ?>
          var editor1 = KindEditor.create('#kq_mbcontent',{
           
            imageTabIndex:1,
            width : '700px',
            fileManagerJson : 'kindeditor-4-10/php/file_manager_json.php',
            allowFileManager : true
          });
        <?php
        }
        ?>
        
        $(".newsbtn").click(function(event) {
          var title=$('#kq_title');
          var content= editor.html();
          if(title.val()=='')
          {
             Alert_msg(title,"标题不能为空");
             return false;
          }
          if(content=='')
          {
            alert('内容不能为空');
            return false;
          }

        });
      });
    </script>
