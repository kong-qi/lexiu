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
 
 ?>
<div id="KQFooter">
 <div id="footer">
  <div class="line"></div>
  <ul>
   <li>COPYRIGHT © <?php echo strtolower($_SERVER['HTTP_HOST']);?> ALL RIGHTS RESERVED.页面执行时间
	<?php
	$etime=microtime(true);
	$total=$etime-$stime; 
	echo round($total,4)."秒";
	?>
   </li>
  </ul>
 </div>
</div>
<script language="javascript" src="js/verification.all.js"  charset="utf-8"></script>
