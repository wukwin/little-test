<?php 
header("Content-type:text/html;charset=utf-8");
require_once 'doAction2.php';
require_once 'fun.php';
$files=getFiles();
// print_r($files);
foreach ($files as $fileInfo) {
   $res= uploadFile($fileInfo);
   echo $res['mes'],'<br/>';
   $uploadfiles[]=$res['dest'];

}
$uploadfiles=array_values(array_filter($uploadfiles));
print_r($uploadfiles);