<?php 

// 打开图片
//配置图片路径
$scr='001.jpg';
//获取图片信息
$info=getimagesize($scr);
$type=image_type_to_extension($info[2],false);
$fun="imagecreatefrom{$type}";
$image=$fun($scr);
// 操作图片

//设置字体路径
$font="msyh.ttf";
$content="你好，慕课";

//设置图片透明度
$col=imagecolorallocatealpha($image, 255, 255, 255, 50);
//写入文字
imagettftext($image, 20, 0, 150, 90, $col, $font, $content);
// 输出图片
//浏览器输出
header("content-type:".$info['mime']);
$func="image{$type}";
$func($image,"new.jpg");
// 销毁图片
imagedestroy($image);