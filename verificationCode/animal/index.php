


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>checkimg</title>
	<style type="text/css">
	/*div{
		width: 400px;
		position: absolute;
		left: 400px;
		top:150px;
		border: 1px red solid;
	}
	#one{position: absolute;left:70px;}
	#two{position: absolute;left:70px;}
	#three{position: absolute;left:70px;}
	div a{position: absolute;left:140px;padding-top:5px; padding-bottom:5px;}
	#flush{position: absolute;left:220px;}
	#four{margin-left:70px;background: #2BD56F; border-radius:5px 5px 0 0;}*/
	</style>
</head>
<body>

<div>
<form Action="index.php" method="post">
<h1 style="text-align:center;">网站登录后台</h1>
	
	<!-- <p>用户名：<input type="text" name="username" id="one" /></p>
	<p>密码：<input type="password" name="password" id="two" /></p>
    php?r=echo rand(); ?>,访问PHP文件传随机数，为防止有的浏览器可能使用缓存而不刷新验证码 -->

	<p>验证码：<img id="change" border="1" src="imgCheck.php?r=<? echo rand(); ?>" width="300" height=300/></p>	
	<p><input type="text" name="autocode" /></p>
	<p><a href="javascript:;" onclick="document.getElementById('change').src='imgCheck.php?r='+Math.random()">换一个</a></p>

	<p><input type="submit" value="登录后台" id="four"></p>
	</form>
</div>
</body>
</html>
<?php 
header("Content-type: text/html; charset=utf-8");
if (isset($_POST['autocode'])) {
	session_start();

	if ($_POST['autocode']==$_SESSION['autocode']) {
			echo "right";
	}else{
		echo "wrong";
	}
	exit();

}

?>