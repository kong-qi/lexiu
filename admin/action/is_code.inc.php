<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
session_start();
if(strtoupper(trim($_POST['code'])) == strtoupper($_SESSION['code'])){
   echo "OK";
}else{
    echo  'NO';
}


?>