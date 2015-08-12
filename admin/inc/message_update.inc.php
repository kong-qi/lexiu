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
if(!isset($_GET['id'])){
new Alert("非法操作","back");
exit();
}else{
$id=setdefensesql($_GET['id']);
}
//本页配置信息
$pagename="信息";
$btnaction="";//提交状态
if(!permission("news_edt")){
	new Alert("没有权限操作","back");
	exit();
	$actionurl="";
	$btnaction='disabled="disabled"';
}else{
	$actionurl="action/ac_update.php";
};
$actionmd5=md5("news_update");
$message="权限不够不能操作";//游客提示语

$sqlshow=$conn->selectall("".DB_EXT."news","where kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
$lanmuid=$show_r['kq_lmid'];
$lanmumsg=get_first_date('lanmu',"where id='".$lanmuid."'");
$pagename=$lanmumsg['kq_name'].'';

//是否开启相册
$istextpic='';
$istextpic=1;
  $advtime='';
if($lanmumsg['kq_model']==1){

    if($lanmumsg['kq_type']!='adv')
    {
      $advtime=1;
    }
}
?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div>
<div id="mainBox">
    <h3><a href="index.php?name=news&lmid=<?php echo $lanmuid;?>" class="actionBtn">返回列表</a><?php echo $pagename?>添加</h3>
    <div class="idTabs kq_li">
      <ul class="tab">
        <li><a  href="#"><?php echo $pagename?>添加</a></li>
         <?php
        if(MOBILE_EDT){
          echo '<li><a href="#">手机端内容</a></li>';
        }
        ?>
     	<li><a href="#">SEO设置</a></li>
     	<?php if($istextpic){?><li><a href="#">图片相册</a></li><?php }?>
      </ul>
     <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data"> <div class="kq_div">
      <div class="items">
	    <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
	    <input name="kq_lmid" type="hidden" value="<?php echo $lanmuid?>" />
	    <input name="id" type="hidden" value="<?php echo $id?>" />
    	<table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
	      	<tbody>
          

	      		<tr>
	        		<td align="right" width="160">信息标题：</td>
	        		<td width="754" colspan="2">
                <?php
                  if($lanmumsg['kq_type']=='gonggao')
                  {
                    echo '<textarea  name="kq_title" id="kq_title" cols="80" rows="5" class="textArea">'.$show_r['kq_title'].'</textarea>';
                  }else
                  {
                    echo ' <input name="kq_title" size="40" class="inpMain" value='.$show_r['kq_title'].'  type="text" id="kq_title">';
                  }
                ?>
	          	
	          		</td>
	      		</tr>
            <tr>
               <td align="right" width="160">城市选择：</td>
              <td>
                  <a href="javascript:void(0)" class="btn open_city">打开城市选择</a>
                  <div class="select_add">
                    <ul class="add_city">
                     <?php
                        if($show_r['kq_city'])
                        {
                          $city=get_first_date("city","where id='".$show_r['kq_city']."'");
                           echo "<li data-id='".$city['id']."' data-status='0'>".$city['kq_title'].'<input name="kq_city" value="'.$city['id'].'" type="hidden">'."</li>";
                        }
                     ?>
                    </ul>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                  <div class="select_city_list"  >
                    <div class="city_warp">
                      <p>
                        <span>输入城市立即搜索：</span> <input type="text" class="inpMain" id="select_city">
                      </p>
                      
                      <ul class="city_ul">
                        <?php
                          $city=get_first_date("city","where  kq_islast=0 limit 20","more");
                          foreach ($city as $key => $value) {
                            echo "<li data-id='".$value['id']."' data-status='0'>".$value['kq_title']."</li>";
                          }
                        ?>
                        <div class="clear"></div>
                      </ul>
                      <div class="clear"></div>
                    </div>
                  </div>
            </tr>
            <?php
            switch($lanmumsg['kq_type'])
            {
              case "adv":
              ?>
                <tr>
                    <td align="right">来源：</td>
                    <td colspan="2"><input name="kq_source" type="text" class="inpMain" id="kq_source" value="<?php echo $show_r['kq_source']?>" size="20" /></td>
                   </tr>
                <tr>
                    <td align="right">外部链接：</td>
                    <td colspan="2"><input name="kq_wburl" type="text" class="inpMain" id="kq_wburl" value="<?php echo $show_r['kq_wburl']?>" size="40" /></td>
                   </tr>
                <tr>
                    <td align="right">缩略图：</td>
                    <td colspan="2"><input name="kq_picurl" type="text" class="inpMain" id="kq_pic" value="<?php echo $show_r['kq_picurl']?>" size="40" />
                    <input name="submit2" class="btn" onclick="updatepic('kq_pic','ylpics','','','710','410',1)" value="点击上传" type="button" /></td>
                </tr>
                <tr>
                    <td align="right">图片预览：</td>
                    <td colspan="2" id="ylpics"><img src="<?php echo pic_url($show_r['kq_picurl']) ?>" height="100"  class="fmpic" /></td>
                </tr>
                  <tr>
                  <td align="right">搜索关键词：</td>
                  <td colspan="2"><input name="kq_guanjc" size="20" class="inpMain" type="text" id="kq_source" value="<?php echo $show_r['kq_guanjc']?>" /></td>
                </tr>
                <tr>
                  <td align="right">地址：</td>
                  <td colspan="2"><input name="kq_address" size="20" value="<?php echo $show_r['kq_address']?>" class="inpMain" type="text" id="kq_source" /></td>
                </tr>
                <tr>
                  <td align="right">电话：</td>
                  <td colspan="2"><input name="kq_tel" size="20" class="inpMain" value="<?php echo $show_r['kq_tel']?>" type="text" id="kq_source" /></td>
                </tr>
                <tr>
                  <td align="right">qq：</td>
                  <td colspan="2"><input name="kq_qq" size="20" class="inpMain" value="<?php echo $show_r['kq_qq']?>" type="text" id="kq_source" /></td>
                </tr>
                <tr>
                  <td align="right">微信：</td>
                  <td colspan="2"><input name="kq_weixin" size="20" class="inpMain" value="<?php echo $show_r['kq_weixin']?>" type="text" id="kq_source" /></td>
                </tr>
                <tr>
                    <td align="right">正文：</td>
                    <td colspan="2"><textarea  name="kq_content" id="kq_content" cols="80" rows="5"><?php echo htmlspecialchars($show_r['kq_content'])?></textarea></td>
                  </tr>
              <?php
              break;
              case "advlist":
              ?>
                  <tr>
                      <td align="right">来源：</td>
                      <td colspan="2"><input name="kq_source" type="text" class="inpMain" id="kq_source" value="<?php echo $show_r['kq_source']?>" size="20" /></td>
                  </tr>
                  <tr>
                      <td align="right">缩略图：</td>
                      <td colspan="2"><input name="kq_picurl" type="text" class="inpMain" id="kq_pic" value="<?php echo $show_r['kq_picurl']?>" size="40" />
                      <input name="submit2" class="btn" onclick="updatepic('kq_pic','ylpics','','','710','410',1)" value="点击上传" type="button" /></td>
                  </tr>
                  <tr>
                      <td align="right">图片预览：</td>
                      <td colspan="2" id="ylpics"><img src="<?php echo pic_url($show_r['kq_picurl']) ?>" height="100"  class="fmpic" /></td>
                  </tr>
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
                  <tr>
                    <td align="right">开始时间</td>
                    <td><input name="kq_sttime" size="40" value="<?php echo date('Y-m-d H:i:s',$show_r['kq_sttime'])?>" class="inpMain" type="text" id="kq_sttime" /></td>
                  </tr>
                  <tr>
                     <td align="right">开始时间</td>
                     <td><input name="kq_endtime" size="40" value="<?php echo date('Y-m-d H:i:s',$show_r['kq_endtime'])?>" class="inpMain" type="text" id="kq_endtime" /></td>
                  </tr>
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
              <?php
              break;
              case "gonggao":
              ?>
               

              <?php
              break;
              case "cx":
              
              ?>
             
              
              <?php 
              break;
              default:
                ?>
                  <tr>
                      <td align="right">缩略图：</td>
                      <td colspan="2"><input name="kq_picurl" type="text" class="inpMain" id="kq_pic" value="<?php echo $show_r['kq_picurl']?>" size="40" />
                      <input name="submit2" class="btn" onclick="updatepic('kq_pic','ylpics','','','710','410',1)" value="点击上传" type="button" /></td>
                  </tr>
                  <tr>
                      <td align="right">图片预览：</td>
                      <td colspan="2" id="ylpics"><img src="<?php echo pic_url($show_r['kq_picurl']) ?>" height="100"  class="fmpic" /></td>
                  </tr>
                  <tr>
                    <td align="right">正文：</td>
                    <td colspan="2"><textarea  name="kq_content" id="kq_content" cols="80" rows="5"><?php echo htmlspecialchars($show_r['kq_content'])?></textarea></td>
                  </tr>
              <?php
              break;
            }

            ?>

           

           
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
              <td colspan="2"><textarea  name="kq_mbcontent" id="kq_mbcontent" cols="80" rows="5"><?php echo htmlspecialchars($show_r['kq_mbcontent'])?></textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php }?>
      	<div class="hide">
           <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
         	<tbody>
             <tr>
                <td width="160" align="right">SEO关键词</td>
                <td><input name="kq_keyword" type="text" class="inpMain" id="kq_keyword" value="<?php echo $show_r['kq_keyword']?>" size="80" /></td>
              </tr>
              <tr>
                <td align="right">SEO描述</td>
                <td><textarea name="kq_description" cols="70" rows="5" class="textArea" id="kq_miaosu"><?php echo $show_r['kq_description']?></textarea></td>
              </tr>
            </tbody>
            </table>
        </div>
        <?php if($istextpic){?>
        <div class="hide">
           <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
              <tbody>
               <tr >
                 <td width="120" align="right">
                   图片预览：
                 </td>
                 <td>
                 <ul class="list_u_pic tbul">
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
               <tr>
                 <td></td>
                 <td><input name="submit3" class="btn uppic mlr10" onclick="updatepic('.tbul','','1','','500','400')"  value="点击上传图片" type="button" /></td>
               </tr>
              </tbody>
            </table>
        </div>
        <?php }?>
       	</div><!--kq-->
       	<table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
         <tbody>
           <tr>
          <td width="160"></td>
          <td>
           <input name="submit" class="btn newsbtn" value="提交" type="submit">
          </td>
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
        if($lanmumsg['kq_type']=='gitf'){
        ?>
        var editor3 = KindEditor.create('#kq_zhanzu',{
         
           width : '700px',
          imageTabIndex:1,
          fileManagerJson : 'kindeditor-4-10/php/file_manager_json.php',
          allowFileManager : true
        });
        var editor8 = KindEditor.create('#kq_guize',{
         
           width : '700px',
          imageTabIndex:1,
          fileManagerJson : 'kindeditor-4-10/php/file_manager_json.php',
          allowFileManager : true
        });
        <?php 
        }?>
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
          /*if(content=='')
          {
            alert('内容不能为空');
            return false;
          }*/

        });
      });
    </script>


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
<script src="js/search.js"></script>
<script>
   $(document).on('click', '.open_city', function(event) {
       $.layer({
           type: 1,
          shade: [0.5, '#000'],
           area: ['auto', 'auto'],
           title: false,
           border: [10, 0.3, '#000'],
           btns: 2,

           page: {dom : '.select_city_list'}
       });
       
       $(document).on('click', '.city_ul li', function(event) {
         var id=$(this).attr('data-id');
         var title=$(this).text();
         var status=$(this).attr('data-status');
         $(".select_add .add_city").empty().append('<li>'+title+'<input type="hidden" name="kq_city" value="'+id+'"></li>');
          
        
         
         
       });
   });
    $("#select_city").watch(function(value) {  
       var ul=$(".city_ul");
       $.get('ajax/city.php', {key:value},function(data) {
           ul.empty().append(data);
       });
   });  
    $(document).on('click', '.add_city li', function(event) {
       title=$(this).text();
       $(this).remove();
       
    });
</script>
