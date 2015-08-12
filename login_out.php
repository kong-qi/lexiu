<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>退出登陆</title>
</head>
<body>
	
</body>
</html>
<?php
setcookie("user", "", time() - 24*7200);
setcookie("uid", "", time() - 24*7200);

?>
<script>
	alert('退出登陆成功');
	window.location.href="/";
</script>