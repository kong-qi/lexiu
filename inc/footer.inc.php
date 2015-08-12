<?php

if (!defined("KQ_WORK")){
	 exit("非法操作");
}

?>
<div id="footer">
  <div class="wm1000">
  <p>联系电话：<?php echo $kq_tel?> | QQ:<?php echo $kq_qq?></p>
  	<p> 地址：<?php echo $kq_address?> <?php echo $kq_name?>（备案：<?php echo $kq_icp?>） 版权所有 <a href="http://www.kong-qi.com" target="_blank">空气工作室</a> 提供商务支持</p>
  </div>
</div>
<?php echo $kq_tongji?>
<script>
	 toptime(".time");
	$(".wx").hover(function() {
		$(this).find('.wx_img').stop().fadeIn();
	}, function() {
		$(this).find('.wx_img').stop().fadeOut();
	});
	$(document).on('click', '.jy', function(event) {
		alert_box('<div class="jianyi"> <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%"> <tr> <td>建议主题</td> <td><input name="title" size="40" class="inpMain" id="kq_title" type="text"></td> </tr> <tr> <td>内容</td> <td><textarea name="content" cols="70" rows="5" class="textArea" id="kq_description"></textarea></td> </tr> <tr> <td colspan="2" align="center"><input name="submit" class="btn jianyibtn" value="提交" type="submit"></td> </tr> </table> </div>');
		$(document).on('click', '.jianyibtn', function(event) {
			var title=$("#kq_title").val();
			var content=$("#kq_description").val();
			$.post('inc/action.php',{action:'ly_add',kq_title:title,kq_content:content},function(data){
				
				if(data){
					
					$(".alert_box").hide();
					$(".alert_bg").remove();
					alert('反馈成功');
					
				
				}else{
					alert('反馈失败，再试一次');
				}
			});

		});
	});
	/*$(".user_sroll").kxbdMarquee({
		direction:'up'
	});*/
	$(".news_gg").kxbdMarquee({
		direction:'left'
	});
	$(document).ready(function($){
		$(".lazy").show().lazyload({
			effect : "show"
		});
		$(".index_list_adv img").show().lazyload({
			effect : "show"
		});
		$(".list_top_adv img").show().lazyload({
			effect : "show"
		});
	});
	
</script>
<?php
update();
?>