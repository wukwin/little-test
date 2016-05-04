<?php 
//function verifyImage(){
	session_start();
    header("Content-type:text/html;charset=utf-8");
    
	require_once 'string.func.php';
	$width=80;
	$height=30;
	//创建画布
	$image= imagecreatetruecolor($width,$height);
	$white=imagecolorallocate($image,255,255,255);
	$black=imagecolorallocate($image,0,0,0);
	//填充矩形填充画布
	imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
	$type=3;$length=4;
	$chars=buildRandomString($type,$length);
	$session_name="verify";
	$_SESSION[$session_name]=$chars;
	$fontfiles=array("msyh.ttf","msyhbd.ttf","simfang.ttf","simhei.ttf","simkai.ttf");
    
	//mt_rand这个函数比rand速度要快4倍
	//echo substr("Hello world",6); 函数返回字符串的一部分。
	for ($i=0; $i < $length; $i++) {
		$size=mt_rand(14,18);
		$angle=mt_rand(-15,15);
		$x=5+$i*$size;
		$y=mt_rand(20,26);
		$fontfile="../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];
		$text=substr($chars,$i,1);

		$color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));

		imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
	}
	header("content-type:image/gif");
	imagegif($image);
	imagedestroy($image);
     

//}