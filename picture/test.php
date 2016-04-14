<?php 


require  'image.class.php';
$src='004.jpg';
$image=new imageOperate($src);
$image->waterimg();
$content='I am so happy';
$image->fontMark($content);
$image->thumb(400,250);
$image->show();


