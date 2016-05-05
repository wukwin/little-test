<?php 
// 
// 数据库连接操作
function connect(){

	$link=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败Error".mysql_errno().":".mysql_error());
	mysql_set_charset(DB_CHARSET);
	mysql_select_db(DB_DBNAME) or die("指定数据库连接失败");
	return $link;
}
        
//数据库增删改查
function insert($table,$array){
	$key=join("",array_keys())
}