<link rel="stylesheet" href="jqtreetable/stylesheets/jquery.treetable.css" />
<link rel="stylesheet" href="jqtreetable/stylesheets/jquery.treetable.theme.default.css" />
<script src="jqtreetable/javascripts/src/jquery.treetable.js"></script>
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
$pagename="栏目";
$ykmessage="权限不够不能操作信息";//游客提示语
$updateurl="class_update";
$dlurl=md5("class_del");
 $dlallturl=md5("class_all");	
$sortrel=md5("class_sort");
 //循环栏目
$classql=$conn->selectall("".DB_EXT."lanmu","order by kq_sort desc,id desc");	 
while($class_r=$conn->result($classql)){
$classarr[]=array(
	'id'=>$class_r['id'],
	'kq_fid'=>$class_r['kq_fid'],
	'kq_sort'=>$class_r['kq_sort'],
	'kq_uuid'=>$class_r['kq_uuid'],
	'kq_model'=>$class_r['kq_model'],
	'kq_islast'=>$class_r['kq_islast'],
	'kq_picurl'=>$class_r['kq_picurl'],
	'kq_name'=>$class_r['kq_name']
	);
}

//是否有权限
$hasaccess=0;
if(permission("lanmu"))
{
  $hasaccess=1;
}else
{
  $hasaccess=0;
}
 
 ?>

<!-- 当前位置 -->
<div id="urHere"> 管理中心<b>&gt;</b><strong><?php echo $pagename?></strong></div>
<?php  if(!$hasaccess){?>
<div class="gonggao">
<h3>温馨提示：</h3>
<p><?php echo $ykmessage?></p>
</div>  <?php
}
?>
   
   <div id="mainBox">
      <h3><a href="index.php?name=<?php echo "class_add";?>" class="actionBtn add">添加<?php echo $pagename?></a><?php echo $pagename?>列表</h3>
       	<form name="del" method="post" action="" class="admin_form">
 		<table id="kq" class=" tableBasic" cellpadding="8" width="100%">
	    	<tr>
	        	<th align="center" width="22"><input name="chkall" id="chkall" onclick="CheckAll(this.form)" value="check" type="checkbox"></th>
	        	<th align="center" width="40">排序</th>
	      		<th align="center" width="40">编号</th>
		        <th align="left">栏目名称</th>
		        <th align="center" width="100">封面图</th>
		        <th align="center" width="100">模板</th>
		        <th align="center" width="100">操作</th>
	      	</tr>
       		<?php classfl()?>
      	</table>
    	<?php  if($hasaccess){
    		?>
    	<div class="action"><input name="sortbtn" rel="<?php echo $sortrel?>" class="btn mr10" value="排序" type="submit"></div>
    	<?php }?>
    	</form>
    </div>
    <div class="clear"></div>

<?php
function classfl($fid=0){
    global $classarr,$dlurl,$updateurl,$hasaccess;   
    for($i=0;$i<count($classarr);$i++){        
           if($classarr[$i]['kq_fid']==$fid)
           {
           		//如果是根节点则输出 
		   		if($classarr[$i]['kq_fid']==0){
				   echo '<tr data-tt-id="'.$classarr[$i]['id'].'">';
				   echo '<td align="center"><input name="checkbox[]" value="'.$classarr[$i]['kq_uuid'].'" type="checkbox"></td>';
				   echo '<td align="center"><input name="sort[]" type="text" value="'.$classarr[$i]['kq_sort'].'" class="inpMain" id="sort[]" size="5" /></td> ';
				   echo '<td align="center">'.$classarr[$i]['id'].'</td>';
				   echo '<td>'.$classarr[$i]['kq_name'].'</td>';
				   //假如图标存在输出
			   		if($classarr[$i]['kq_picurl']!=''){
			   			echo '<td align="center" width="100"><img src="'.pic_url($classarr[$i]['kq_picurl']).'" width="100" class="fmpic" /></td>';
				   	}else{
					   echo '<td align="center" width="100"></td>';
					}
					//假如是最终分类
			    	if($classarr[$i]['kq_islast']==1){
			    		//判断是什么模型
				 		if($classarr[$i]['kq_model']==1){
					 		echo '<th align="center" width="100"><span class="tuwen">图文列表</span></th>';
					 	}
					  	if($classarr[$i]['kq_model']==2){
					 		echo '<th align="center" width="100"><span class="wenzhang">文章列表</span></th>';
					 	}
					   	if($classarr[$i]['kq_model']==3){
							 echo '<th align="center" width="100"><span class="danpage">单个页面</span></th>';
					 	}
					}else{
						 echo '<td align="center" width="100"></td>';
					}
			     	if($hasaccess){
			   			echo '<td align="center"><a href="index.php?name='.$updateurl.'&amp;id='.$classarr[$i]['kq_uuid'].'"><span class="wenzhang">编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="action/ac_dell.php?type='.$dlurl.'&amp;id='.$classarr[$i]['kq_uuid'].'"><span class="delete">删除</span></a>
        				</td>';
        			}else{
						echo '<td align="center">没有权限
       	 				</td>';
					}
       	 			echo "</tr>";   
			   	//如果不是根节点
			   	}
			   	else
			   	{
				     echo '<tr data-tt-id="'.$classarr[$i]['id'].'" data-tt-parent-id="'.$classarr[$i]['kq_fid'].'">';
					 echo '<td align="center"><input name="checkbox[]" value="'.$classarr[$i]['kq_uuid'].'" type="checkbox"></td>';
			     	 echo '<td align="center"><input name="sort[]" type="text" value="'.$classarr[$i]['kq_sort'].'" class="inpMain" id="sort[]" size="5" /></td>'; 
					 echo '<td align="center">'.$classarr[$i]['id'].'</td>';
					 echo '<td>'.$classarr[$i]['kq_name'].'</td>';
					//是否存在图标
				    if($classarr[$i]['kq_picurl']!=''){
				   		echo '<td align="center" width="100"><img src="'.pic_url($classarr[$i]['kq_picurl']).'" width="100" class="fmpic" /></td>';
				   	}else{
					   echo '<td align="center" width="100"></td>';
					}
					//判断根分类
				 	if($classarr[$i]['kq_islast']==1){
				 		if($classarr[$i]['kq_model']==1){
					 		echo '<th align="center" width="100"><span class="tuwen">图文列表</span></th>';
					 	}
					  	if($classarr[$i]['kq_model']==2){
					 		echo '<th align="center" width="100"><span class="wenzhang">文章列表</span></th>';
					 	}
					   	if($classarr[$i]['kq_model']==3){
					 		echo '<th align="center" width="100"><span class="danpage">单个页面</span></th>';
						}
					}else{
						 echo '<td align="center" width="100"></td>';
					}
			        if($hasaccess){
			   			echo '<td align="center"><a href="index.php?name='.$updateurl.'&amp;id='.$classarr[$i]['kq_uuid'].'"><span class="wenzhang">编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="action/ac_dell.php?type='.$dlurl.'&amp;id='.$classarr[$i]['kq_uuid'].'"><span class="delete">删除</span></a>
			        	</td>';
			    	}else{
						echo '<td align="center">没有权限
			        	</td>';
					}
        			echo "</tr>";   
				}
            	classfl($classarr[$i]['id']);   
			}  
	}  
} 
?> 
<script>
 $("#kq").treetable({ expandable: true ,clickableNodeNames:true,column:0,initialState:"expanded",column:"3"});
</script>
