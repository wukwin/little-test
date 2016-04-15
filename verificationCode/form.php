<?php 
header("Content-type: text/html; charset=utf-8");
if (isset($_REQUEST['autocode'])) {
	session_start();

	if (strtolower($_REQUEST['autocode'])=$_SESSTION['autocode']) {
			echo "<font>right</font>";
	}else{
		echo "<font>wrong</font>";
	}
	exit();

}