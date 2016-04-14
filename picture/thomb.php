<?php 

$scr='001.jpg';

$info=getimagesize($scr);

$type=image_type_to_extension($info[2],false);

$fun="imagecreatefrom{$type}";

$image=$fun($scr);

//创建文件载体
$image_thumb=imagecreatetruecolor(300, 300);

imagecopyresampled($image_thumb, $image, 0, 0, 0, 0, 300, 300, $info[0], $info[1]);

imagedestroy($image);

header("content-type:".$info['mime']);

//注意要点，这里用单引号不会解析内容
$func="image{$type}";

$func($image_thumb);
$func($image,'new4.'.$type);
imagedestroy($image_thumb);

?>