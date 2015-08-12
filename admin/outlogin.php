
<?php
header("Content-type:text/html;charset=utf-8");
@session_start();
$_SESSION=array();
session_destroy();
setcookie(session_name(),'',time()-4000000000);
echo "<script>alert('退出成功');window.location.href='login.php';</script>";



?>