<?php 
function connect(){

	mysql_connect("localhost","root","root") or die("数据库连接失败Error".mysql_errno().":".mysql_error());
	
}