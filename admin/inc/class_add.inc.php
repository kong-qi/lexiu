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

//本页配置信息
$pagename="分类";
$actionmd5=md5("class_add");
$btnaction="";//提交状态
 if(!permission("lanmu")){
  $actionurl="";
  $btnaction='disabled="disabled"';
  $hasaccess=0;
}else{
  $hasaccess=1;
  $actionurl="action/ac_add.php";
};
$backurl="class_list";
$addname='';		 

$message="权限不够不能操作";//游客提示语		 
$cofig=get_config();

$setlanmu=array();
if($cofig['kq_setlanmu']){
    $setlanmu=json_decode($cofig['kq_setlanmu'],true);
}
	
		 
 ?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div> 
<?php  if(!$hasaccess){?>
<div class="gonggao">
<h3>温馨提示：</h3>
<p><?php echo $message?></p>
</div>
<?php
}
?>
<div id="mainBox">
  <h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>添加</h3>
  <div class="idTabs kq_li">
    <ul class="tab">
      <li>
        <a  href="#">
          <?php echo $pagename?>添加</a>
      </li>
      <li>
        <a href="#">SEO设置</a>
      </li>
      <li>
        <a href="#">其他设置</a>
      </li>
    </ul>
    <form action="<?php echo $actionurl?>" method="post" enctype="multipart/form-data">
      <div class="kq_div">
        <div class="items">
          <input name="type" type="hidden" value="<?php echo $actionmd5?>" />
          <table class="tableBasic addclass" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td align="right" width="150">
                  <?php echo $pagename?>名字：</td>
                <td colspan="3">
                  <input name="kq_name" size="40" class="inpMain" type="text" id="kq_name"></td>
              </tr>
              <tr>
                <td align="right">英文名字</td>
                <td colspan="2">
                  <input name="kq_ename" type="text" class="inpMain" id="kq_ename" size="30" />
                </td>
              </tr>
              <tr>
                <td align="right">所属目录：</td>
                <td colspan="2">
                  <select name="kq_fid" id="kq_fid">
                    <option value="0">根目录</option>
                    <?php  get_tree_class(0,0,get_class_array())?>
                  </select>
                </td>
                 <td></td>
              </tr>
              <tr>
                <td align="right">特殊设置</td>
                <td colspan="2">
                <?php
                if(count($setlanmu)>0)
                {
                  foreach ($setlanmu as $key => $value) {
                    echo    '<label for="'.$key.'">'.$value.'</label><input name="kq_type" type="radio" id="'.$key.'" value="'.$key.'"  />';
                  }
                }
                ?>
                <label for="tongyong">
                通用</label><input name="kq_type" type="radio" id="tongyong" value="0" checked="checked" />

                </td>
               
              </tr>
              <tr class="model_tr">
                <td align="right">是否终极类目：</td>
                <td colspan="2">
                  是
                  <input name="kq_islast" type="radio" id="radio3" value="1" checked="checked" />
                  否
                  <input type="radio" name="kq_islast" id="radio4" value="0" />
                </td>
                <td width="497"><span class="red">终极栏目为最终的分类，不能再有子类。</span></td>
              </tr>
              <tr class="kq_show">
                <td align="right">URL地址（只限英文）</td>
                <td width="234">
                  <input name="kq_url" type="text" class="inpMain" id="kq_url" size="30" />
                </td>

              </tr>
              <tr>
                <td align="right">外部链接</td>
                <td colspan="2">
                  <input name="kq_wburl" type="text" class="inpMain" id="kq_wburl" size="60" />
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="hide">
          <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td width="160" align="right">SEO标题</td>
                <td>
                  <input name="kq_title" size="80" class="inpMain" type="text" id="kq_title"></td>
              </tr>
              <tr>
                <td align="right">SEO关键词</td>
                <td>
                  <input name="kq_keyword" size="80" class="inpMain" type="text" id="kq_keyword" />
                </td>
              </tr>
              <tr>
                <td align="right">SEO描述</td>
                <td>
                  <textarea name="kq_description" cols="70" rows="5" class="textArea" id="kq_description"></textarea>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="hide">
          <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td width="180" align="right">封面/图标图片</td>
                <td colspan="2">
                  <input name="kq_picurl" size="60" class="inpMain" type="text" id="kq_picurl">
                  <input name="submit2" onclick="updatepic('kq_picurl')" class="btn uppic" value="点击上传" type="button" />
                </td>
              </tr>
             
              <tr>
                <td align="right">绑定信息ID</td>
                <td colspan="2">
                  <input name="kq_cpid" type="text" class="inpMain" id="kq_ename" size="60" />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--kq-->
      <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td width="160"></td>
            <td>
              <input name="submit" class="btn classbtn" value="提交" type="submit"></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
       
<script>
  
  //栏目初始状态
  var islast=$(".addclass input[name='kq_islast']");
  if(islast.val()=='1'){
  $(".model_tr").after('<tr class="model_add"><td align="right" >模板选择：</td><td colspan="2">图文列表<input name="kq_model" type="radio" id="radio" value="1" checked="checked" />文章列表<input type="radio" name="kq_model" id="radio2" value="2" />单个页面<input type="radio" name="kq_model" id="radio5" value="3" /></td></tr>');
  }else{
    $(".model_tr").after('<tr><td align="right">根目封面显示</td><td colspan="2">图文<input name="kq_show" type="radio" id="radio" value="1" checked="checked" />文章<input type="radio" name="kq_show" id="radio2" value="2" />单页<input type="radio" name="kq_show" id="radio5" value="3" /></td><td>只对根目录有效，其他无效</td></tr>');
  }
  
  //单击选择状态
  islast.click(function(){
    var thisvalue=$(this).val();
      if(thisvalue=='1'){
      $(".model_add").remove();
      $(".model_tr").after('<tr class="model_add"><td align="right" >模板选择：</td><td colspan="2">图文列表<input name="kq_model" type="radio" id="radio" value="1" checked="checked" />文章列表<input type="radio" name="kq_model" id="radio2" value="2" />单个页面<input type="radio" name="kq_model" id="radio5" value="3" /></td></tr>');
  
      }else{
      $(".model_add").remove();
      
    $(".model_tr").after('<tr class="model_add"><td align="right">根目封面显示</td><td colspan="2">图文<input name="kq_show" type="radio" id="radio" value="1" checked="checked" />文章<input type="radio" name="kq_show" id="radio2" value="2" />单页<input type="radio" name="kq_show" id="radio5" value="3" /></td><td>只对根目录有效，其他无效</td></tr>');
    
  
    
      }
  
  
  });
  $(".btn").on('click',  function(event) {
    var name=$("#kq_name");
    var url=$("#kq_url");
    var lmwburl=$("#kq_wburl");
    var lmzz=/^[a-zA-Z0-9]+$/;
    if(name.val()==''){
      Alert_msg(name,"分类名称不能为空");
      return false;
    }
    if((url.val()=="") && (lmwburl.val()=="")){
        alert("URL地址或外部链接至少填一个");
        return false;
        }else{
          if((url.val()!="")){
            if(!lmzz.test(url.val())){
              Alert_msg(url,"目录必须为英文字符");
              return false;
              }
            }
          }
  });
</script>