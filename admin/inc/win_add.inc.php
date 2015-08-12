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
$id='';
if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }
	 

//本页配置信息
$pagename="获奖";
$addname='';    
$backurl="win_list";
$actionmd5=md5("win_add");
$btnaction="";//提交状态
if(!permission("root")){
	$actionurl="";
  $hasaccess=0;
	$btnaction='disabled="disabled"';
}else{
	$actionurl="action/ac_add.php";
  $hasaccess=1;
};
$news=get_first_date('news',"where id='".$id."'");
$message="没有权限，不能操作";//游客提示语		 
		 
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
  <h3>
    <a href="index.php?name=<?php echo $backurl;?>" class="actionBtn">
      <span class="iconfont">&#xe609;</span>
      返回
      <?php echo $addname==''?$pagename:$addname;?></a>
      <?php echo $pagename?>添加</h3>
  <div class="idTabs  kq_li">
    <ul class="tab">
      <li>
        <a  href="javascript:void(0)">
          <?php echo $pagename?></a>
      </li>
    </ul>
    <div class="items">
      <div class="kq_div">
        <div  id="main">
          <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
            <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
            <input type="hidden" name="kq_newsid" value="<?php echo $id?>">
            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td align="right" width="100">
                    中奖项目标题</td>
                  <td colspan="2">
                    <input name="kq_title" readonly="true" value="<?php echo $news['kq_title'] ?>" size="40" class="inpMain" type="text" id="kq_name"></td>
                </tr>
                <tr>
                  <td align="right">
                    中奖用户</td>
                  <td colspan="2">
                     <input name="user_btn"  class="btn user_btn" value="添加中奖者" type="button">
                    <div class="win_user">
                      <ul class="user_add">
                        
                        
                       
                      </ul>
                      <div class="clear"></div>
                    </div>
                    
                </tr>
                <tr>
                  <td align="right">管理员备注：</td>
                  <td colspan="2">
                    <textarea name="kq_beizhu" cols="70" rows="5" class="textArea" id="kq_liuyan"></textarea>
                  </td>
                </tr>
                
              </tbody>
            </table> 

            <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td width="100"></td>
                  <td>
                    <input name="submit" class="btn hjbtn" value="提交" type="submit"></td>
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
  $(".hjbtn").on("click",function(){
      
      var title=$("input[name='kq_title']");
  
    
     
      if(title.val()==""){
         Alert_msg(title,"产品名称不能为空");
         return false;
        }
     
    
  });
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
          $(this).addClass('on');
          $(".user_add").append('<li id="uid_'+id+'" class="dell_u">'+html+'</li>');
          $(this).attr({'data-status':'0'})
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
</script>