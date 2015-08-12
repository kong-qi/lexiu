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
if(!permission("lanmu")){
	new Alert("没有权限操作","back");
	exit();
}	
	 	
$sqlshow=$conn->selectall("".DB_EXT."lanmu","where kq_uuid='".$id."'");
$show_r=dell_slashes($conn->result($sqlshow));
$bid=$show_r['kq_fid'];

//本页配置信息
$pagename="栏目";
$backurl="class_list";
$addname='';
$ctionmd5=md5("class_update");
$btnaction="";//提交状态
$actionurl="action/ac_update.php";
$message="权限不够不能添加信息";//游客提示语
$classarr=get_class_array();
$cofig=get_config();
$setlanmu=array();
  if($cofig['kq_setlanmu']){
    $setlanmu=json_decode($cofig['kq_setlanmu'],true);
  }

 ?>
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?>添加</strong> </div> 
<div id="mainBox">
	<h3><a href="index.php?name=<?php echo $backurl;?>" class="actionBtn"><span class="iconfont">&#xe609;</span> 返回<?php echo $addname==''?$pagename:$addname;?></a><?php echo $pagename?>更新</h3>
	<div class="idTabs kq_li">
		<ul class="tab">
			<li>
				<a  href="#"><?php echo $pagename?>更新</a>
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
					<input name="id" type="hidden" value="<?php echo $id?>" />
					<input name="type" type="hidden" value="<?php echo $ctionmd5?>" />
					<table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td align="right" width="180">
									<?php echo $pagename?>名字：</td>
								<td colspan="3">
									<input name="kq_name" type="text" class="inpMain" id="kq_name" value="<?php echo $show_r['kq_name']?>" size="40"></td>
							</tr>
							<tr>
								<td align="right">英文名称</td>
								<td colspan="2">
								<input name="kq_ename" size="60" value="<?php echo $show_r['kq_ename']?>" class="inpMain" type="text" id="kq_ename" /></td>
							</tr>
							<tr>
								<td align="right">所属目录：</td>
								<td colspan="3">
									<select name="kq_fid" id="kq_fid">
										<option value="0">根目录</option>
										 <?php  classfl();?>
									</select>
								</td>
							</tr>
							<tr>
							  <td align="right">特殊设置</td>
							  <td colspan="2">

							    	<?php
							    	if(count($setlanmu)>0)
							    	{
							    	  foreach ($setlanmu as $key => $value) {
							    	  	$ischecked=$show_r['kq_type']==$key?'checked="checked"':'';
							    	    echo    '<label for="'.$key.'">'.$value.'</label><input name="kq_type" type="radio" id="'.$key.'" '.$ischecked.' value="'.$key.'"  />';
							    	  }
							    	}
							    	?>							    
							        通用<input name="kq_type" type="radio" id="radio3" value="0" <?php echo_check($show_r['kq_type'],'0')?>  />
							  </td>
							  
							</tr>
							<tr class="model_tr2">
								<td align="right">是否终极类目：</td>
								<td width="210">
									是
									<input name="kq_islast" type="radio" id="radio3" <?php echo_check($show_r['kq_islast'],'1')?> value="1" />
									否
									<input type="radio" name="kq_islast" id="radio4" <?php echo_check($show_r['kq_islast'],'0')?> value="0" /></td>
								<td colspan="2">终极目录为最终目录，不能有子栏目。</td>
							</tr>
							<tr >
								<td align="right">URL地址（只能字母）</td>
								<td>
									<input name="kq_url" type="text" value="<?php echo $show_r['kq_url'];?>" class="inpMain" id="kq_url" size="30" /></td>
								<td colspan="2"></td>
							</tr>
							<tr >
								<td align="right">外部链接</td>
								<td colspan="3">
									<input name="kq_wburl" value="<?php  echo $show_r['kq_wburl'];?>"  type="text" class="inpMain" id="kq_wburl" size="60" /></td>
							</tr>
						</tbody>
					</table>

				</div>
				<div class="hide">
					<table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td width="180" align="right">SEO标题</td>
								<td>
									<input name="kq_title" type="text" class="inpMain" id="kq_title" value="<?php echo $show_r['kq_title']?>" size="80"></td>
							</tr>
							<tr>
								<td align="right">SEO关键词</td>
								<td>
									<input name="kq_keyword" type="text" class="inpMain" id="kq_keyword" value="<?php echo $show_r['kq_keyword']?>" size="80" /></td>
							</tr>

							<tr>
								<td align="right">SEO描述</td>
								<td>
									<textarea name="kq_description" cols="70" rows="5" class="textArea" id="kq_miaosu">
										<?php echo $show_r['kq_description']?></textarea>
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
									<input name="kq_picurl" size="60" value="<?php echo trim($show_r['kq_picurl'])?>" class="inpMain" type="text" id="kq_picurl">
									<input name="submit2" class="btn uppic" value="点击上传" type="button" onclick="updatepic('kq_picurl','ylpics')" />
								</td>
							</tr>
							<tr>
								<td width="180" align="right" >封面/图标预览</td>
								<td colspan="2" id="ylpics">
									<img src="<?php echo pic_url($show_r['kq_picurl'])?>" alt="">
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
<script>
var islast=$("input[name='kq_islast']");
<?php 
if($show_r['kq_islast']==1){?>
	<?php if($show_r['kq_model']==1){
			  ?> 
			$(".model_tr2").after('<tr class="model_add"><td align="right" >模板选择：</td><td colspan="2">图文列表<input name="kq_model" checked="checked"  type="radio" id="radio" value="1" />文章列表<input type="radio" name="kq_model" id="radio2" value="2" />单个页面<input type="radio" name="kq_model" id="radio5" value="3" /></td></tr>');
	<?php }?>
	<?php if($show_r['kq_model']==2){
			  
	?> 
		$(".model_tr2").after('<tr class="model_add"><td align="right" >模板选择：</td><td colspan="2">图文列表<input name="kq_model"  type="radio" id="radio" value="1" />文章列表<input type="radio" name="kq_model" checked="checked"  id="radio2" value="2" />单个页面<input type="radio" name="kq_model" id="radio5" value="3" /></td></tr>');
	<?php }?>
	
	<?php if($show_r['kq_model']==3){
			  
	?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right" >模板选择：</td><td colspan="2">图文列表<input name="kq_model"   type="radio" id="radio" value="1" />文章列表<input type="radio" name="kq_model" id="radio2" value="2" />单个页面<input type="radio" checked="checked" name="kq_model" id="radio5" value="3" /></td></tr>');
	<?php } 
}else{?>
	<?php if($show_r['kq_show']==1){
			  ?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right">根目封面显示</td><td colspan="2">图文<input name="kq_show" type="radio" id="radio" value="1" checked="checked" />文章<input type="radio" name="kq_show" id="radio2" value="2" />单页<input type="radio" name="kq_show" id="radio5" value="3" /></td><td>只对根目录有效，其他无效</td></tr>');
	<?php
	 }
	 elseif($show_r['kq_show']==2){
			  
			  ?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right">根目封面显示</td><td colspan="2">图文<input name="kq_show" type="radio" id="radio" value="1"  />文章<input type="radio" name="kq_show" id="radio2" value="2" checked="checked" />单页<input type="radio" name="kq_show" id="radio5" value="3" /></td><td>只对根目录有效，其他无效</td></tr>');
	<?php 
	}else{
		if($show_r['kq_show']==3){
			  
			  ?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right">根目封面显示</td><td colspan="2">图文<input name="kq_show" type="radio" id="radio" value="1"  />文章<input type="radio" name="kq_show" id="radio2" value="2"  />单页<input type="radio" name="kq_show" id="radio5" value="3" checked="checked" /></td><td>只对根目录有效，其他无效</td></tr>');
	<?php }
	}
		?>
	<?php 
	
}?>
	
	
islast.click(function(){
	var thisvalue=$(this).val();
	if(thisvalue=='1'){
		$(".model_add").remove();
			 <?php if($show_r['kq_model']==1){
			  
			  ?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right" >模板选择：</td><td colspan="2">图文列表<input name="kq_model" checked="checked"  type="radio" id="radio" value="1" />文章列表<input type="radio" name="kq_model" id="radio2" value="2" />单个页面<input type="radio" name="kq_model" id="radio5" value="3" /></td></tr>');<?php }elseif($show_r['kq_model']==2){
			  
			  ?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right" >模板选择：</td><td colspan="2">图文列表<input name="kq_model"  type="radio" id="radio" value="1" />文章列表<input type="radio" name="kq_model" checked="checked"  id="radio2" value="2" />单个页面<input type="radio" name="kq_model" id="radio5" value="3" /></td></tr>');<?php }else{if($show_r['kq_model']==3){
			  
			  ?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right" >模板选择：</td><td colspan="2">图文列表<input name="kq_model"   type="radio" id="radio" value="1" />文章列表<input type="radio" name="kq_model" id="radio2" value="2" />单个页面<input type="radio" checked="checked" name="kq_model" id="radio5" value="3" /></td></tr>');<?php }else{
		?>
		$(".model_tr2").after('<tr class="model_add"><td align="right" >模板选择：</td><td colspan="2">图文列表<input name="kq_model" type="radio" id="radio" value="1" checked="checked" />文章列表<input type="radio" name="kq_model" id="radio2" value="2" />单个页面<input type="radio" name="kq_model" id="radio5" value="3" /></td></tr>');
		<?php 
		
		}
		}?>
		
		}else{
			$(".model_add").remove();
 <?php if($show_r['kq_show']==1){
			  ?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right">根目封面显示</td><td colspan="2">图文<input name="kq_show" type="radio" id="radio" value="1" checked="checked" />文章<input type="radio" name="kq_show" id="radio2" value="2" />单页<input type="radio" name="kq_show" id="radio5" value="3" /></td><td>只对根目录有效，其他无效</td></tr>');
	<?php }elseif($show_r['kq_show']==2){
			  
			  ?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right">根目封面显示</td><td colspan="2">图文<input name="kq_show" type="radio" id="radio" value="1"  />文章<input type="radio" name="kq_show" id="radio2" value="2" checked="checked" />单页<input type="radio" name="kq_show" id="radio5" value="3" /></td><td>只对根目录有效，其他无效</td></tr>');
	<?php }else{if($show_r['kq_show']==3){
			  
			  ?> 
	$(".model_tr2").after('<tr class="model_add"><td align="right">根目封面显示</td><td colspan="2">图文<input name="kq_show" type="radio" id="radio" value="1"  />文章<input type="radio" name="kq_show" id="radio2" value="2"  />单页<input type="radio" name="kq_show" id="radio5" value="3" checked="checked" /></td><td>只对根目录有效，其他无效</td></tr>');
	<?php }else{
		?>
	$(".model_tr2").after('<tr class="model_add"><td align="right">根目封面显示</td><td colspan="2">图文<input name="kq_show" type="radio" id="radio" value="1" checked="checked" />文章<input type="radio" name="kq_show" id="radio2" value="2"  />单页<input type="radio" name="kq_show" id="radio5" value="3"  /></td><td>只对根目录有效，其他无效</td></tr>');
		<?php 
		
		}
		}
		?>
			
			}
	
	
	}
	
	);//判断选择状态
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
      alert("根目录路径或外部链接至少填一个");
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