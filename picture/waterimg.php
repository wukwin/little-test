<?php 

$scr="001.jpg";

$info=getimagesize($scr);

$type=image_type_to_extension($info[2],false);

$fun="imagecreatefrom{$type}";

$image=$fun($scr);

//水印图片
//
$imagemark='003.jpg';

$info2=getimagesize($scr);

$type2=image_type_to_extension($info2[2],false);

$fun2="imagecreatefrom{$type2}";

$water=$fun2($imagemark);

imagecopymerge($image, $water, 20, 30, 0, 0, $info2[0], $info[1], 10);

imagedestroy($water);

header("content-type:".$info['mime']);

$func="image{$type}";

$func($image);
//保存图片可以通过再次书写输出代码，带上新文件名
$func($image,'new4.'.$type);
imagedestroy($image);
