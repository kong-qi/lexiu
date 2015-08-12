<?php
define("KQ_WORK",true);
require_once("inc/base.inc.php");
//关键词
$title="";
$keyword="";
$description="";


//配置首页链接信息
$http=KQ_URL;
$httpqz="";
$httpqzt="";
$httphz="";
if($kq_wjt){
    $httpqz="-";
    $httpqzt="-";
    $httphz=".html";
}else{
  $httpqz="/index.php?lmid=";	
  $httpqzt="&amp;id=";	
}
$lmid='4';
if(isset($_GET['lmid'])){
	$lmid=setdefensesql($_GET['lmid']);
}
$id='';
if(isset($_GET['id'])){
	$id=setdefensesql($_GET['id']);
}
if($id)
{
	$help_firt=get_first_date('news',"where kq_checked='1'  and id='".$id."' ");
	if(count($help_firt)>0)
    {
        $lmid=$help_firt['kq_lmid'];
        $title=$help_firt['kq_title'];
        $keyword=$help_firt['kq_keyword'];
        $description=$help_firt['kq_description'];
    }
    

}else{
	$help_firt=get_first_date('news',"where kq_checked='1'  and kq_lmid='".$lmid."'   order by kq_sort desc limit 1");
    if(count($help_firt)>0)
    {
        $title=$help_firt['kq_title'];
        $keyword=$help_firt['kq_keyword'];
        $description=$help_firt['kq_description'];
    }
    
}

$help_list=get_first_date('news',"where kq_checked='1'  and kq_lmid='".$lmid."'   order by kq_sort desc",'more');


$advpid=$lmid;
$navname="help_".$lmid;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title?></title>
  <meta name="keywords" content="<?php echo $keyword;?>" />
  <meta name="description" content="<?php echo $description?>" />
 <?php require_once(KQ_PATH.'inc/style.inc.php');?>
</head>
<body>
<?php require_once(KQ_PATH.'inc/state.inc.php');?>
  <div class="warp">
    <!-- 头部 -->
    <?php require_once(KQ_PATH.'inc/header.inc.php');?>
    <!-- 中间内容 -->
    		<div class="help_warp ">
    			<div class="wm1000">
    			<div class="adv_top">
    				<?php
    				$advtop=get_first_date('adv',"where kq_position='".$advpid."' order by kq_sort desc  limit 1");
    				if(count($advtop)>0){
                      $blank=$advtop['kq_url']==''?'':'target="_blank"';
    				  echo '<a href="'.empty_url($advtop['kq_url']).'" '.$blank.'><img class="lazy" data-original="'.pic_url($advtop['kq_picurl']).'" alt=""></a>';
    				}
    				
    				?>
    			</div><!-- adv_top -->
    			<div class="help_cont">
    				<div class="left">
    					<ul class="help_list">
    						<?php
    							if(count($help_list)>0){
    								foreach ($help_list as $key => $value) {
    									echo '<li><a href="help-'.$value['kq_lmid'].'-'.$value['id'].'.html" title="'.$value['kq_title'].'">'.Strsub($value['kq_title'],14).'</a></li>';
    								}
    								
    							}
    						?>
    						
    						
    					</ul>
    				</div>
    				<div class="right">
    					<div class="msg_cont">
    						<div class="title">
    							<?php echo @$help_firt['kq_title']?>
    						</div>
    						<div class="msg_cont_p">
    							<?php echo @$help_firt['kq_content']?>
    						</div>
    					</div>
    				</div>
    				<div class="clear_float"></div>
    			</div>
    			
    			<div class="clear_float"></div>
    			</div>
    			<div class="clear_float"></div>
    		</div><!-- help_warp -->
    <!-- 底部 -->
    <?php require_once(KQ_PATH.'inc/footer.inc.php');?>
  </div>
</body>
</html>