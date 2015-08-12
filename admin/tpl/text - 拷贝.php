<?php
define("KQ_WORK",true);
$pagemulu=substr(dirname($_SERVER['PHP_SELF']),1,strlen(dirname($_SERVER['PHP_SELF'])));
require_once("../inc/base.inc.php");
$lmid=isset($_GET['lmid'])?$_GET['lmid']:"30";
//$classid 为分类的非栏目的本ID,$classid_one 为终极栏目单个ID
$classid=$lmid;
$classid_one="";
$classbid="";
$page=isset($_GET['page'])?$_GET['page']:"1";
$page=setdefensesql($page);
$lmid=setdefensesql($lmid);
$nav="news";
$isexitclass="";
/*
是否伪静态
$listurl 列表分页链接
$pageurl 列表分页是否伪静态
$classurl 分类列表分页
$classhtml 分类列表分页伪静态
$lmidarraystr 分类的区域选择
$isfid 检测是否是FID

*/
$pagehtml="";
$classurl="";
$classhtml="";
if($kq_wjt){
	$listurl="http://".$_SERVER['HTTP_HOST']."/".$pagemulu."-".$lmid."-";
	$pagehtml=".html";
	$classurl="http://".$_SERVER['HTTP_HOST']."/".$pagemulu."-";
	$classhtml="-1.html";
	}else{
		$listurl="?lmid=".$lmid."&amp;page=";
		$classurl="http://".$_SERVER['HTTP_HOST']."/?lmid=";	
		}
$lmidarraystr="";
$isfid="";
//$exitslmsql 检查栏目是否有子栏目，如果有就输出他包含子栏目的ID
$exitslmsql=$conn->selectone(DB_EXT."lanmu","lm_id","where lm_fid='".$lmid."' and lm_islast='1'");

if($conn->rows($exitslmsql)){
	$isfid=1;
	$isexitclass=1;
	$lmid=sublmstr2($lmid);	
	//假如存在子栏目，这个时候$lmid=就为子栏目的ID集合
	}

function sublmstr($lmid){
	global $conn;
	$exitslmsql=$conn->selectone(DB_EXT."lanmu","lm_id","where lm_fid='".$lmid."' and lm_islast='1'");
	return $conn->rows($exitslmsql);
	}
	
function sublmstr2($lmid){
	global $conn,$lmidarraystr;
	$exitslmsql=$conn->selectone(DB_EXT."lanmu","lm_id","where lm_fid='".$lmid."' and lm_islast='1'");
	if($conn->rows($exitslmsql)){
			$lmidarray=get_data_limit(DB_EXT."lanmu","where lm_fid='".$lmid."'");
			if($lmidarray){
			foreach($lmidarray as $lmidarray_v){
				if(sublmstr($lmidarray_v['lm_id'])){
					sublmstr2($lmidarray_v['lm_id']);
					}else{
						if($lmidarray_v['lm_islast']){
							$lmidarraystr.=$lmidarray_v['lm_id'].",";
							}
					
					}
			}}
			return $lmid=substr($lmidarraystr,0,-1); 
			
	
	}
	
	};
//是否没有子分类的终极栏目，如果是$classid_one=$classid;$classid是本身的传过来的ID
$exitslmsql_one=$conn->selectone(DB_EXT."lanmu","lm_id","where lm_id='".$lmid."' and lm_islast='1' and lm_fid ='0'");			
if($conn->rows($exitslmsql_one)){
	$classid_one=$classid;
	}




$tkmsql=get_data_one(DB_EXT."lanmu","where lm_id='".$classid."'");
$classbid=$classid;

//查询FID
if($isfid){
	
	$blmmsg=get_data_one(DB_EXT."lanmu","where lm_id='".$classid."'");
	$classwherestr="lm_fid='".$classid."'";
	$classid=$classid;//父栏目
	}else{
		$blmmsg=get_data_one(DB_EXT."lanmu","where lm_id='".$lmid."'");
		$blmmsg=get_data_one(DB_EXT."lanmu","where lm_id='".$blmmsg['lm_fid']."'");
		if($classid_one){
				$isexitclass=2;//说明也是有分类
				$classwherestr="lm_id='".$classid_one."'";
				$blmmsg=get_data_one(DB_EXT."lanmu","where lm_id='".$classid_one."'");
			}else{
				$classwherestr="lm_fid='".$blmmsg['lm_id']."'";
				$classid=$blmmsg['lm_id'];
			}
		
		}
if($isexitclass){
	if($isexitclass==1){
		$newsql=$conn->selectall(DB_EXT."news","where ms_lanmuid in(".$lmid.") order by ms_id desc limit ".$listnum."");
		}else{
			$newsql=$conn->selectall(DB_EXT."news","where ms_lanmuid in(".$lmid.") order by ms_id desc limit ".($page-1)*$qtpagesize.",".$qtpagesize."");

			}
	
	}else{		
$newsql=$conn->selectall(DB_EXT."news","where ms_lanmuid in(".$lmid.") order by ms_id desc limit ".($page-1)*$qtpagesize.",".$qtpagesize."");}
$newstotalsql=$conn->selectall(DB_EXT."news","where ms_lanmuid in(".$lmid.") ");
$newstotal=$conn->rows($newstotalsql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tkmsql['lm_title'];?></title>
<meta name="keywords" content="<?php echo $tkmsql['lm_keyword']?>" />
<meta name="description" content="<?php echo $tkmsql['lm_miaosu'];?>" />
<?php require(KQ_PATH."inc/style.inc.php");?>

</head>

<body>
<?php require(KQ_PATH."inc/state.inc.php");?>
<?php require(KQ_PATH."inc/header.inc.php");?>
<div class="two_banner_warp">
<div class="list_banner">
<img src="/image2/spuer_banenr.jpg" />
</div>
</div><!--two_banner_warp-->

<div id="part" class="partzx">
   <div class="part_cont">
      <h2><a href="<?php echo $classurl.$classid.$classhtml;?>"><?php echo $blmmsg['lm_name']?></a><em><?php echo $blmmsg['lm_enname']?></em></h2>
       <div class="zixun">
          <div class="zixun_l">
          <ul>
          <?php
		 
          $listclass=get_data_limit(DB_EXT."lanmu","where ".$classwherestr."");
		  foreach($listclass as $v){
			  if ($v['lm_id']==$lmid){
				  echo '<li><h3 class="news_on"><a href="'.$classurl.$v['lm_id'].$classhtml.'" >'.$v['lm_name'].'</a></h3></li>';
				  
				  }else{
				  echo '<li><h3 ><a href="'.$classurl.$v['lm_id'].$classhtml.'">'.$v['lm_name'].'</a></h3></li>';
				  }
			  
			  }
		  ?>
   
          </ul>
          
          
               </div><!--zixun_l-->
               <?php
			   
        if(!$isexitclass){
			//是单页时
          if($tkmsql['lm_model']==3 ){
		  
			  ?>
               <div class="zixun_r">
               <?php 
			  
			   $newssql_cont=get_data_one(DB_EXT."news","where ms_lanmuid='".$classbid."'")?>
              <div class="cont_title">
              <h1><?php echo $newssql_cont['ms_title']?> </h1>
              <p>来源：<?php echo "<a href='http://".str_replace("http://","",$kq_url)."'>".$kq_url."</a>";?> 编辑：<?php echo $kq_name?>- 时间：<?php echo date("Y-m-d h:i:s",$newssql_cont['ms_ctime'])?> </p>
                           </div>
             
             <div class="news_cont">
                <?php
                echo $newssql_cont['ms_content'];
				?>
             
             </div><!--news_cont-->
              
        
              <div class="cl"></div>
                </div>
          
                <?php }elseif($tkmsql['lm_model']==2 ){
				
				?>
                <div class="zixun_r">
              
              <ul class="newslist_ul">
              <?php
			  if(!$newstotal){
				  echo "<li><h4>暂无记录</h4></li>";
				  }else{
			  
              while($news_r=$conn->result($newsql)){
				 ?>
				 <li><h4><a href="#" target="_blank"><?php echo $news_r['ms_title']?></a></h4><span><?php echo date("Y-m-d",$news_r['ms_ctime'])?></span>
                <div class="cl"></div>
                </li>
				 
				 <?php
			  }
				  }
			  ?>
            
              </ul>
              
              <div class="page">
<?php
$pagestr=new SubPages($qtpagesize,$newstotal,$page,$qtpagesub,$listurl,2,$pagehtml);
?>
</div>
                </div><!--zixun_r-->
                <?php }}//结束是否是大分类
					else{
					if($isexitclass==1){
					?>
					<div class="zixun_r">
              
              <ul class="newslist_ul">
              <?php
			  if(!$newstotal){
				  echo "<li><h4>暂无记录</h4></li>";
				  }else{
			  
              while($news_r=$conn->result($newsql)){
				 ?>
				 <li><h4><a href="#" target="_blank"><?php echo $news_r['ms_title']?></a></h4><span><?php echo date("Y-m-d",$news_r['ms_ctime'])?></span>
                <div class="cl"></div>
                </li>
				 
				 <?php
			  }
				  }
			  ?>
            
              </ul>
              

                </div><!--zixun_r-->
					
					<?php	}//$isexitclass==1;
					if($isexitclass==2){
						
						?>
                         <div class="zixun_r">
              
              <ul class="newslist_ul">
              <?php
			  if(!$newstotal){
				  echo "<li><h4>暂无记录</h4></li>";
				  }else{
			  
              while($news_r=$conn->result($newsql)){
				 ?>
				 <li><h4><a href="#" target="_blank"><?php echo $news_r['ms_title']?></a></h4><span><?php echo date("Y-m-d",$news_r['ms_ctime'])?></span>
                <div class="cl"></div>
                </li>
				 
				 <?php
			  }
				  }
			  ?>
            
              </ul>
              
              <div class="page">
<?php
$pagestr=new SubPages($qtpagesize,$newstotal,$page,$qtpagesub,$listurl,2,$pagehtml);
?>
</div>
                </div><!--zixun_r-->
						<?php
                        }//$isexitclass==2
					
					}
					?>
                
       <div class="cl"></div>
       </div><!--zixun-->
       
  <div class="cl"></div>

    </div><!--part_cont-->

</div><!--prt1-->

<?php require_once(KQ_PATH."/inc/footer.inc.php");?>

</body>
</html>
<script type="text/javascript">
$(".xqbtn").click(function(){
	var name=$("#name").val();
	var tel=$("#phone").val();
	var qq=$("#qq").val();
	var xqcont=$("#qxcontent").val();
	if(name=="您的姓名"){
	name="";
	}else{
		name=name;
		}
	
	if(tel=="您的电话"){
	tel="";
	}else{
		tel=tel;
		}	
		
		if(qq=="您的QQ"){
	qq="";
	}else{
		qq=qq;
		}	
	if(xqcont=="您的需求"){
	xqcont="";
	}else{
		xqcont=xqcont;
		}
if(name==""){
	alert("您的姓名不能为空");
	return false;
	}
if(tel=="" && qq==""){
	alert("您的联系方式必须保留一个，以便我们跟方便联系您");
	return false;
	}			
$.post("inc/action.php?action=<?php echo md5("tjqx")?>", { name: name, phone:tel,qq:qq,content:xqcont },
   function(data){
   if(data=="ok"){
		 alert("恭喜您提交需求成功，我们将会有工作人员与你取得联系");
		 }else{
			 alert("您已经成功提交过了，无需再提交，联系客服提交");
			 };
			
   });
	
	
	
	})
</script>