<?php 
header("Content-type:text/html;charset=utf-8");
require_once 'upload.func.php';
$fileInfo=$_FILES['myfile'];
$allowExt=array('jpg','html','text');
$newname=uploadFile($fileInfo,false,$allowExt);
echo $newname;
 ?>