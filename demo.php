<?php
define("KQ_WORK",true);
require_once("inc/base.inc.php");

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
$over='';
if(isset($_GET['time'])){
  if($_GET['time']=='over'){
    $over=1;
  }
}
$id='1';
if(isset($_GET['id'])){
  $id=$_GET['id'];
}
$navname='index';
if($over){
 $navname='over'; 
}
if($over)
{
$huodong=get_first_date('news',"where kq_checked='1'  and kq_lmid='".$id."'  and kq_endtime<='".($ontime)."' order by kq_sort desc",'more');

}else{
$huodong=get_first_date('news',"where kq_checked='1'  and kq_lmid='".$id."' and kq_sttime<='".$ontime."' and kq_endtime>='".($ontime-30)."' order by kq_sort desc",'more');
}
$tadv=get_first_date('news',"where kq_checked='1' and kq_lmid='5' and kq_sttime<='".$ontime."' and kq_endtime>='".$ontime."' order by kq_sort desc",'more');

$user=get_first_date('user',"where kq_checked='1' order by id desc limit 100",'more');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/style.css">
	<?php require_once(KQ_PATH.'inc/style.inc.php');?>
</head>
<body>
<?php require_once(KQ_PATH.'inc/state.inc.php');?>
  <div class="warp">
    <!-- 头部 -->
    <?php require_once(KQ_PATH.'inc/header.inc.php');?>
	<div id="container">
		<div class="wm1000">
			<div class="adv_top">
				<img src="images/adv.jpg" alt="">
			</div><!-- adv_top -->
			<div class="clear_float"></div>
			<div class="left">
				 <div class="choujiang">
           			<?php
           			  if(count($huodong)>0){
           			  foreach ($huodong as $hdkey2 => $hd2_v) {
           			     
           			    ?>
								<div class="items">
						<div class="items_img">
							<img  class="lazy" data-original="images/dd.png" alt="">
						</div>
						<div id="time-1" class="items_time" data-time="2015-04-30 00:00:00" data-id="1"></div>
					</div><!-- items -->
           			 	<?php   

           			  	}
           			  }
           			?>
           			
            	
          		</div><!-- choujiang -->
				
			</div><!-- middle -->
			<div class="right">
				<div class="right_warp">
					
					<div class="adv_list">
					<ul class="adv_ul index_list_adv">
						<li><a href="javascript:void(0)"><img class="lazy" data-original="images/pic1.jpg" alt=""></a></li>
						<li><a href="javascript:void(0)"><img class="lazy" data-original="images/pic1.jpg" alt=""></a></li>
						<li><a href="javascript:void(0)"><img class="lazy" data-original="images/pic1.jpg" alt=""></a></li>
						<li><a href="javascript:void(0)"><img class="lazy" data-original="images/pic1.jpg" alt=""></a></li>
						<li><a href="javascript:void(0)"><img class="lazy" data-original="images/pic1.jpg" alt=""></a></li>
						<div class="clear_float"></div>
					</ul>
					</div>
					<div class="part part5">
						<h3><img src="images/guize.png" alt=""></h3>
						<div class="guize">
							<dl>
								<dt>1、	抢奖品活动面向所有人开放，自由参加。</dt>
							</dl>
							<dl>
								<dt>2、	抢奖品前请你：</dt>
								<dd>（1）手机加官网微信nnswws 方便你从微信公众号快速登陆网站。</dd>
								<dd>（2）用QQ号登陆网站一次，即可长期获得参加活动和中奖兑奖资格。</dd>
								
							</dl>
							<dl>
								<dt>3、抢奖品规则：</dt>
								<dd>（1）在进行中的活动页面，当倒计时显示为00:00:00时开始接听呼入的电话，打通电话并留下您的个人信息后视为抢奖品成功。</dd>
								<dd>（2）参加活动的奖品均有固定的数量，抢完为止。</dd>
								<dd>（3）本期奖品抢完后，呼入的电话不再接听，请关注下一轮活动。</dd>
								<dd>（4）活动结束后，抢到奖品的名单显示在该活动页面上。</dd>
							</dl>
								<dl>
								<dt>4、兑换奖品：</dt>
								<dd>（1）活动项目里有特别说明的按照该说明执行兑换。</dd>
								<dd>（2）活动项目里没有特别说明的，请在工作时间到公司办公室兑奖。</dd>
								<dd>（3）请您在7个工作日内兑奖，过期当弃奖处理，活动项目有特别说明的例外。</dd>
								<dd>（4）（4）兑奖服务电话：15278018938网站声明。</dd>
							</dl>
								<dl>
								<dt>5、特别说明：在法律允许的范围内，活动解析权贵南宁品三传媒广告有限公司所有。</dt>
								
							</dl>
						</div>
					</div>
				</div>
			</div>
			<div class="clear_float"></div>
		</div>
		<div class="clear_float"></div>
	</div>
	<div id="footer"></div>
</div>


</body>
<script>
  $(document).ready(function($){
    $(".lazy").show().lazyload({
      effect : "show"
    });
    $(".index_list_adv img").show().lazyload({
      effect : "show"
    });
  });
</script>
</html>