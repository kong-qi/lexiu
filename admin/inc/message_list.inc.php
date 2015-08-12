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


//本页信息
$pagename="信息选择";
$message="游客身份不能操作信息";//游客提示语
$updateurl="news";
$dlurl=md5("class_dell");
$dlallturl=md5("class_all");	
$sortrel=md5("class_sort");
//是否有权限
$hasaccess=0;
if(permission("root"))
{
  $hasaccess=1;
}else
{
  $hasaccess=0;
}
//循环栏目
$classql=$conn->selectall("".DB_EXT."lanmu","order by kq_sort desc,id desc ");	 
while($class_r=$conn->result($classql)){
	$classarr[]=array($class_r['id'],$class_r['kq_fid'],$class_r['kq_name'],$class_r['kq_sort'],$class_r['kq_uuid'],$class_r['kq_model'],$class_r['kq_islast'],$class_r['kq_picurl']);
}
 
 ?>

<!-- 当前位置 -->   
<div id="urHere">
	管理中心 <b>&gt;</b> <strong><?php echo $pagename?></strong>
</div>

<div id="mainBox">
	<h3>
		<?php echo $pagename?>列表</h3>
	<div id="list">
		<form name="del" method="post" action="action/ac_dell.php?type=<?php echo $dlallturl?>
			" class="admin_form">
			<table id="kq" class=" tableBasic" cellpadding="10" width="100%">
				<tr>

					<th align="center" width="40">编号</th>
					<th align="left">栏目名称</th>

					<th align="center" width="100">模板</th>
					<th align="center" width="100">操作</th>
				</tr>
				<?php classfl()?></table>
		</form>
	</div>
	<div class="clear"></div>
</div>
<?php
function classfl($fid=0){
  
    global $classarr,$dlurl,$updateurl;   
 
    for($i=0;$i<count($classarr);$i++){        
           if($classarr[$i][1]==$fid){  
		 
		   if($classarr[$i][1]==0){
			   	echo '<tr data-tt-id="'.$classarr[$i][0].'">';
				echo '<td align="center">'.$classarr[$i][0].'</td>';
			   	echo '<td>'.$classarr[$i][2].'</td>';
			  	 if($classarr[$i][6]==1){
				 	if($classarr[$i][5]==1){
					 	echo '<th align="center" width="100"><span class="tuwen">图文列表</span></th>';
					}
					if($classarr[$i][5]==2){
					 	echo '<th align="center" width="100"><span class="wenzhang">文章列表</span></th>';
					}
					if($classarr[$i][5]==3){
					 	echo '<th align="center" width="100"><span class="danpage">单个页面</span></th>';
					}
				}else{
						 echo '<td align="center" width="100"></td>';
				}
			   	echo '<td align="center">';
			    if($classarr[$i][6]==1){
					if($classarr[$i][5]==3){
					 	echo '<a href="index.php?name=danye&amp;lmid='.$classarr[$i][0].'"><span class="goshow">进入信息</span></a>';
					
					}else{
						 echo '<a href="index.php?name='.$updateurl.'&amp;lmid='.$classarr[$i][0].'"><span class="goshow">进入信息</span></a>';
					}
				}
			  
        		echo '</td>';
       			echo "</tr>";   
                 
        
			}else{
				echo '<tr data-tt-id="'.$classarr[$i][0].'" data-tt-parent-id="'.$classarr[$i][1].'">';
				echo '<td align="center">'.$classarr[$i][0].'</td>';
				echo '<td>'.$classarr[$i][2].'</td>';
				if($classarr[$i][6]==1){
				 	if($classarr[$i][5]==1){
					 	echo '<th align="center" width="100"><span class="tuwen">图文列表</span></th>';
					}
					if($classarr[$i][5]==2){
						echo '<th align="center" width="100"><span class="wenzhang">文章列表</span></th>';
					}
					if($classarr[$i][5]==3){
					 	echo '<th align="center" width="100"><span class="danpage">单个页面</span></th>';
					}
				}else{
						 echo '<td align="center" width="100"></td>';
				}
			   	echo '<td align="center">';
			   	if($classarr[$i][6]){
			    	if($classarr[$i][5]==3){
						 echo '<a href="index.php?name=danye&amp;lmid='.$classarr[$i][0].'"><span class="goshow">进入信息</span></a>';
					
					}else{
						 echo '<a href="index.php?name='.$updateurl.'&amp;lmid='.$classarr[$i][0].'"><span class="goshow">进入信息</span></a>';
					}
			   }
        		echo "</td></tr>";   
				   
			}
		         
		  
            classfl($classarr[$i][0]);   
		}  
	}  
}   


?> 
   <script>
 $("#kq").treetable({ expandable: true ,clickableNodeNames:true,column:0,initialState:"expanded",column:"1"});
</script>
