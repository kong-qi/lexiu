<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Author" content="空气工作室-www.kong-qi.com" />
<title>空气管理系统</title>
<link rel="stylesheet" type="text/css" href="css/base.css" media="all">
<script language="javascript" src="js/jquery.js"></script>
</head>
<body>
<form action="action/ac_login.php" method="post" id="loginform">
<div id="login">
  <div class="dologo">
  <img src="images/logo.png" alt="空气工作室www.kong-qi.com" title="空气工作室www.kong-qi.com" />
  </div>
   <ul>  
   <li class="inpLi"><b>用户名：</b><input value="" name="username"  type="text" class="inpLogin"></li>
   <li class="inpLi"><b>密码：</b><input name="password"  type="password" class="inpLogin"></li>
   <li class="vcodePic">
   <div class="inpLi"><b>验证码：</b><input type="text" name="code" class="vcode"></div>
   <img id="captcha" src="class/class_code.inc.php" alt="CAPTCHA" border="1" onClick="this.src='class/class_code.inc.php?id='+Math.random()*1000;" title="看不清？点击更换另一个验证码">
     <div class="clear"></div>
   </li>
   <li><input name="submit" class="btn" value="登录" type="submit" ></li> 
  </ul>
</div>
</form>

<script language="javascript" src="js/user.js"></script>
</body>
</html>
