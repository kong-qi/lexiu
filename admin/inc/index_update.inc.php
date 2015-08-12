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
if(!permission("root")){
  new Alert("没有权限操作","back");
}
$sqlshow=$conn->selectall("".DB_EXT."index","where kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
 //本页配置信息
$pagename="首页调用";
$addname='';    
$backurl="index_list";
$btnaction="";//提交状态
$actionurl="action/ac_update.php";
$actionmd5=md5("index_update");

 ?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div>
<div id="mainBox">
   <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>更新</h3>
  <div class="idTabs kq_li">
    <ul class="tab">
      <?php
      if($show_r['kq_type']=='cont'){
        echo '<li><a href="#main">内容类型</a></li>';
      }elseif($show_r['kq_type']=='code'){
        echo '<li><a href="#main">代码类型</a></li>';
      }elseif($show_r['kq_type']=='pic'){
        echo ' <li><a href="#main">图片类型</a></li>';
      }
      ?>
    </ul>
    <div class="kq_div">
    <?php
    if($show_r['kq_type']=='cont'){
      load_editor("#kq_content");
    ?>
      <div class="itmes " >
        <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
        <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
        <input name="id" type="hidden" value="<?php echo $id?>" />
        <input type="hidden" name="kq_type" value="cont">
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td align="right" width="100">名称：</td>
            <td ><input name="kq_title" value="<?php echo $show_r['kq_title']?>" size="40" class="inpMain" type="text" id="title"></td>
          </tr>
          
           <tr class="cont">
            <td align="right">内容：</td>
            <td>
              <textarea name="kq_content" cols="100" rows="5" class="textArea" id="kq_content"><?php echo htmlspecialchars($show_r['kq_content']);?></textarea>
            </td>
          </tr>
         
          
          <tr>
            <td colspan="2" ><input name="submit" class="btn indexbtn" value="提交" <?php echo $btnaction?>  type="submit"></td>
          </tr>
        </tbody>
        </table>
        </form>
      </div>
  <?php
}elseif($show_r['kq_type']=='code'){


  ?>
      <div >
        <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
        <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
        <input type="hidden" name="kq_type" value="code">
        <input name="id" type="hidden" value="<?php echo $id?>" />
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td align="right" width="100">名称：</td>
            <td ><input name="kq_title" size="40" value="<?php echo $show_r['kq_title']?>" class="inpMain" type="text" id="title"></td>
          </tr>
          <tr class="code">
            <td align="right">代码：</td>
            <td>
              <textarea name="kq_code" cols="70" rows="5" class="textArea" id="kq_code"><?php echo $show_r['kq_code'];?></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="2" ><input name="submit" class="btn indexbtn" value="提交" <?php echo $btnaction?>  type="submit"></td>
          </tr>
        </tbody>
        </table>
        </form>
      </div>
    <?php
  }elseif($show_r['kq_type']=='pic'){


    ?>
      <div >
        <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
        <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
        <input type="hidden" name="kq_type" value="pic">
        <input name="id" type="hidden" value="<?php echo $id?>" />
        <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td align="right" width="100">名称：</td>
            <td ><input name="kq_title" size="40" value="<?php echo $show_r['kq_title']?>" class="inpMain" type="text" id="title"></td>
          </tr>
          <tr>
            <td align="right">图片预览：</td>
            <td class="ylpics">
              <ul class="list_u_pic">
                <?php
                $picarray=json_decode($show_r['kq_thumbs']);
                if(count($picarray)>0){
                  foreach ($picarray as $key => $value) {
                    if($value){
                      echo '
                        <li class="itempic"><img class="fmpic" src="'.pic_url($value).'" height="80" alt=""><input type="hidden" value="'.$value.'" name="up_pic[]"> <div class="editro">
                          <a href="javascript:void(0)" class="up_pic">上移</a>
                          <a href="javascript:void(0)" class="botm_pic">下移</a>
                          <a href="javascript:void(0)" class="del_pic">删除</a>
                        </div></li>
                      ';
                      
                    }
                  }
                }
                ?>
                
              </ul>
              <div class="clear"></div>
             
            </td>
          </tr>
         
          <tr class="pic">
            <td align="right">
              图片：
            </td>
            <td>
           <input name="submit3" class="btn uppic mlr10" onclick="updatepic('.list_u_pic','','1')"  value="点击上传图片" type="button" />
            </td>
          </tr>
          <tr>
            <td colspan="2" ><input name="submit" class="btn indexbtn" value="提交" <?php echo $btnaction?>  type="submit"></td>
          </tr>
        </tbody>
        </table>
        </form>
      </div>
      <script>
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
  <?php
  }
  ?>
    </div>  
  </div>
</div>
<script>
  $(document).on('click', '.indexbtn', function(event) {
    var name=$('input[name="kq_title"]');
    if(name.val()==''){
      Alert_msg(name,'名称不能为空');
      return false;
    }
  });
</script>

