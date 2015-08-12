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
if(!isset($_GET['id'])){
  new Alert("非法操作","back");
  exit(); 
}else{
  $id=setdefensesql($_GET['id']);
}
if(!permission("order")){
  new Alert("没有权限操作","back");
  exit();
}	
$sqlshow=$conn->selectall("".DB_EXT."winmsg","where kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
//本页配置信息
$pagename="获奖";
$backurl="win_list";
$addname='';
$btnaction="";//提交状态
$actionurl="action/ac_update.php";
$actionmd5=md5("win_update");
 ?>

<div id="urHere">管理中心 <b>&gt;</b> <strong><?php echo $pagename?>更新</strong>
</div>
<div id="mainBox">
  <h3>
     <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>更新</h3>
  <div class="idTabs  kq_li">
    <ul class="tab">
      <li>
        <a  href="#main">订单更新</a>
      </li>
    </ul>
    <div class="items">
      <div class="kq_div">
        <div  id="main">
          <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <input name="id" type="hidden" value="<?php echo $id?>" />
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td align="right" width="100">
                    中奖项目标题</td>
                  <td colspan="2">
                    <input name="kq_title" readonly="true" value="<?php echo $show_r['kq_title']?>" size="40" class="inpMain" type="text" id="kq_name"></td>
                </tr>
                <tr>
                  <td align="right">
                    中奖用户</td>
                  <td colspan="2">
                     <input name="user_btn"  class="btn user_btn" value="添加中奖者" type="button">
                    <div class="win_user">
                      <ul class="user_add">
                        <?php
                         $userid=json_decode($show_r['kq_userid'],true);
                         $username=explode(",", $show_r['kq_username']);
                         foreach ($userid as $key => $v) {
                                echo '<li data-status="1" id="uid_'.$v.'" class="dell_u" data-id="'.$v.'" data-name="'.$username[$key].'">';
                                echo '<input type="hidden" name="kq_username[]" value="'.$username[$key].'">
                                 <input type="hidden" name="kq_userid[]" value="'.$username[$key].'">';
                                echo '<a href="javascript:void(0)" >'.$username[$key].'</a>';
                                echo '</li>';
                         }
                        ?>
                        
                       
                      </ul>
                      <div class="clear"></div>
                    </div>
                    
                </tr>
                <tr>
                  <td align="right">管理员备注：</td>
                  <td colspan="2">
                    <textarea name="kq_beizhu"  cols="70" rows="5" class="textArea" id="kq_liuyan"><?php echo $show_r['kq_beizhu']?></textarea>
                  </td>
                </tr>
                
              </tbody>
            </table> 

            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100"></td>
                  <td>
                    <input name="submit" class="btn" value="提交" type="submit"></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>

      </div>

    </div>

  </div>
</div>
<script>
  $(document).on('click', '.user_btn', function(event) {
    $.post('ajax/user.php',{action:'list'},function(data){
      pageuser=$.layer({
            type: 1,
            area: ['400', 'auto'],
            title: '添加用户',
            border: [10, 0.3, '#000'],
            shade: [0],
            moveType:1,
            zIndex: 19891016,
            page: {
               html: data
            }
        });
      //添加
      $(document).on('click', '.add_user_a', function(event) {
        var id=$(this).attr('data-id');
        var name=$(this).attr('data-name');
        var status=$(this).attr('data-status');
        var html=$(this).html();
        if(status=='1'){
          czid=$("#uid_"+id).attr('data-id');
          
          if(id==czid){
            alert('已经在里面了');
          }else{
            $(this).addClass('on');
            $(".user_add").append('<li id="uid_'+id+'" class="dell_u">'+html+'</li>');
            $(this).attr({'data-status':'0'})
          }
        
          
        }else{
           $(this).attr({'data-status':'1'})
           $(this).removeClass('on');
           $("#uid_"+id).remove();
        }
        
          
      });//add_user_a
      //删除
      $(document).on('click', '.dell_u', function(event) {
        $(this).remove();
      });
      //搜索
      $(document).on('click', '.search_user', function(event) {
        var key=$("#sukey");
        if(key.val()==''){
          alert('关键词不能为空');
          key.focus();
        }else
        {
           $.post('ajax/user.php',{action:'list',id:key.val()},function(data){
              $(".user_list_ul").empty();
              $(".user_list_ul").append(data);
           });//ajax
        }

      });

    });
    
  });
//删除
      $(document).on('click', '.dell_u', function(event) {
        $(this).remove();
      });
</script>