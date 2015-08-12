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

<div id="KQHead">
  <div id="head">
    <div class="logo"><a href="#" ><img src="images/dclogo.gif" alt="logo"></a></div>
    <div class="nav">
      <ul>
        <li><a href="javascript:void(0)"  target="_top"><?php echo $_SESSION['name']?></a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>"  target="_blank">查看站点</a></li>
      
        <li class="noRight outlogin"><a href="#" >退出</a></li>
        <div class="clear"></div>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
  <div class="clear"></div>
<!-- KQHead 结束 -->