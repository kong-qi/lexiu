<?php
define("KQ_WORK",true);
require_once("../inc/base.inc.php");
$lmid=isset($_GET['lmid'])?$_GET['lmid']:"__BID__";
$pagemulu=get_fid_url($lmid);
//$classid 为分类的非栏目的本ID,$classid_one 为终极栏目单个ID
$classid=$lmid;
$classid_one="";
$classbid="";
$page=isset($_GET['page'])?$_GET['page']:"1";
$page=setdefensesql($page);
$lmid=setdefensesql($lmid);
$nav="__NAV__";
$isexitclass="";
/*
是否伪静态
$listurl 列表分页链接
$pageurl 列表分页是否伪静态
$classurl 分类列表分页
$classhtml 分类列表分页伪静态
$lmidarraystr 分类的区域选择
$isfid 检测是否是FID
$isleft 是否存在左侧
*/
$danyehtml="";
$pagehtml="";
$classurl="";
$classhtml="";
$http="http://".$_SERVER['HTTP_HOST']."/";
$newsms=$http."show.php";
$newsmsqz="?lmid=";
$newsmsqzt="&amp;id=";
$newshtml="";
if($kq_wjt){
	$listurl="http://".$_SERVER['HTTP_HOST']."/".$pagemulu."-".$lmid."-";
	$pagehtml=".html";
	$classurl="http://".$_SERVER['HTTP_HOST']."/".$pagemulu."-";
	$classhtml="-1.html";
	$danyehtml=".html";
	$newsms=$http."show";
	$newsmsqz="-";
	$newsmsqzt="-";
	$newshtml=".html";
	}else{
		$listurl="http://".$_SERVER['HTTP_HOST']."/".$pagemulu."/index.php?lmid=".$lmid."&amp;page=";
		$classurl="http://".$_SERVER['HTTP_HOST']."/".$pagemulu."/index.php?lmid=";	
		$danyehtml=".php";
		}
$lmidarraystr="";
$isfid="";
$isleft="";
$islast="";
//$exitslmsql 检查栏目是否有子栏目，如果有就输出他包含子栏目的ID

$exitslmsql=$conn->selectone(DB_EXT."lanmu","lm_id","where lm_fid='".$lmid."' ");
if(@$conn->rows($exitslmsql)){
	$isfid=1;
	$isexitclass=1;
	$lmid=sublmstr2($lmid);	
	//假如存在子栏目，这个时候$lmid=就为子栏目的ID集合
	}
	
//是否没有子分类的终极栏目，如果是$classid_one=$classid;$classid是本身的传过来的ID
$exitslmsql_one=$conn->selectone(DB_EXT."lanmu","lm_id","where lm_id='".$lmid."' and lm_islast='1' and lm_fid ='0'");			
if(@$conn->rows($exitslmsql_one)){
	$classid_one=$classid;//没有分类，就是大分类终极分类
	$islast=1;
	$isleft=1;
	}

$tkmsql=get_data_one(DB_EXT."lanmu","where lm_id='".$classid."'");//本栏目的信息
$classbid=$classid;//本栏目ID



//查询FID
if($isfid){
	$blmmsg=get_data_one(DB_EXT."lanmu","where lm_id='".$classbid."'");
	$classwherestr="lm_fid='".$classbid."'";	
	
	$classbid=get_sub_fid($classbid);
	
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
$newstotal=@$conn->rows($newstotalsql);

if($pagemulu){
	$danyeext="http://".$_SERVER['HTTP_HOST']."/".$pagemulu."/";
	}else{
		$danyeext="http://".$_SERVER['HTTP_HOST']."/".$pagemulu;
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo empty($tkmsql['lm_title'])?$tkmsql['lm_name']:$tkmsql['lm_title'];?></title>
<meta name="keywords" content="<?php echo empty($tkmsql['lm_keyword'])?$tkmsql['lm_name']:$tkmsql['lm_keyword']; ?>" />
<meta name="description" content="<?php echo empty($tkmsql['lm_miaosu'])?$tkmsql['lm_name']:$tkmsql['lm_miaosu'];?>" />
<?php require(KQ_PATH."inc/style.inc.php");?>
</head>
<body <?php if ($isleft){echo 'class="noleft"';}?>>
<?php require(KQ_PATH."inc/state.inc.php");?>
<?php require(KQ_PATH."inc/header.inc.php");?>
<div class="two_banner_warp">
<div class="list_banner">
<img src="<?php echo $arraybanner[$rand];?>" alt="<?php echo $kq_name?>" />
</div>
</div><!--two_banner_warp-->
 <?php
include (KQ_PATH."tpl/picpage.tpl");	
				?>


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
$.post("/inc/action.php?action=<?php echo md5("tjqx")?>", { name: name, phone:tel,qq:qq,content:xqcont },
   function(data){
   if(data=="ok"){
		 alert("恭喜您提交需求成功，我们将会有工作人员与你取得联系");
		 }else{
			 alert("您已经成功提交过了，无需再提交，联系客服提交");
			 };
   });
	})
</script>