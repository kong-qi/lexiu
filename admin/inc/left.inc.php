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
<div id="KQLeft"><!-- 后台菜单 -->
  <div id="menu">
  <!-- <ul class="top">
  <li><a href="?name=base" ><i class="home"></i><em>网站首页</em></a></li>
  </ul>-->
    <ul>
    <li <?php left_nav($name,'base');?>><a href="?name=base" ><i class="system"></i><em>网站设置</em></a></li>
    <li <?php left_nav($name,'class');?>><a href="?name=class_list" ><i class="nav"></i><em>栏目设置</em></a></li>
    <li <?php left_nav($name,'city');?>><a href="?name=city_list" ><i class="product"></i><em>城市管理</em></a></li>
    </ul>
    <ul>
    <li <?php left_nav($name,'news'); ?>><a href="?name=message_list" ><i class="page"></i><em>产品信息</em></a></li>
    <li <?php left_nav($name,'win');?>><a href="?name=win_list" ><i class="shop"></i><em>获奖名单</em></a></li> 
   <!--  <li <?php left_nav($name,'order');?>><a href="?name=order_list" ><i class="shop"></i><em>产品订单</em></a></li> 
   <li <?php left_nav($name,'zhaos');?>><a href="?name=zhaos_list" ><i class="product"></i><em>招商加盟</em></a></li>  -->
    </ul>

    <ul>
    <li <?php left_nav($name,'weijintai');?>><a href="?name=weijintai" ><i class="article"></i><em>伪静态规则</em></a></li>
    <li <?php left_nav($name,'nav'); ?>><a href="?name=nav_list" ><i class="article"></i><em>导航设置</em></a></li> 
    <li <?php left_nav($name,'index'); ?>><a href="?name=index_list" ><i class="article"></i><em>首页调用</em></a></li>
    <li <?php left_nav($name,'adv'); ?>><a href="?name=adv_list" ><i class="productCat"></i><em>广告管理</em></a></li>
    <li <?php left_nav($name,'user'); ?>><a href="?name=user_list" ><i class="link"></i><em>会员系统</em></a></li>
    <li <?php left_nav($name,'youlink'); ?>><a href="?name=youlink_list" ><i class="link"></i><em>友情链接</em></a></li>
    <li <?php left_nav($name,'fankui'); ?>><a href="?name=fankui_list" ><i class="articleCat"></i><em>反馈</em></a></li>
       <li <?php left_nav($name,'liuyan'); ?>><a href="?name=liuyan_list" ><i class="articleCat"></i><em>留言板</em></a></li>
    </ul>
    <ul>
    <li <?php left_nav($name,'admin');?>><a href="?name=admin_list" ><i class="manager"></i><em>网站管理员</em></a></li>
    <li <?php left_nav($name,'permission');?>><a href="?name=permission_list" ><i class="permission"></i><em>权限设置</em></a></li>
    <!-- <li <?php left_nav($name,'moban');?>><a href="?name=moban" ><i class="moban"></i><em>模板设置</em></a></li> -->
    </ul>
  </div>
</div>