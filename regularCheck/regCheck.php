<?php  
header("Content-type: text/html; charset=utf-8");
require_once 'regularClass.php';


$regular=new regular();
if (!$regular->noEmpty($_POST['username'])) {
	exit("用户名是必须填写的");
}

// $regular->setFixMode('U');

// $r=$regular->isEmail('12345678@qqcom');

var_dump($r);