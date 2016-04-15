<?php 
header("Content-type:text/html;charset=utf-8");
require_once 'upload.class.php';
$upload=new upload('myFile');
$dest=$upload->uploadFile();
echo $dest;