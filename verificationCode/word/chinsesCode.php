<?php 




session_start();


$img=imagecreatetruecolor(140, 30);

$bgcolor=imagecolorallocate($img,255,255,255);

imagefill($img,0,0,$bgcolor);





/*for ($i=0; $i<4 ; $i++) { 
	$fontsize=6;
	$fontcolor=imagecolorallocate($img,rand(0,120),rand(0,120),rand(0,120));
	$fontcontent=rand(0,9);
	$x=$i*100/4+rand(5,10);
	$y=rand($i*2,10);
	imagestring($img,$fontsize,$x,$y,$fontcontent,$fontcolor);
	

}*/
$fontface='a.ttf';
$strdb=array('慕','课','网','赞');
$catch='';
for ($i=0; $i <4 ; $i++) { 
	$fontcolor=imagecolorallocate($img,rand(0,120),rand(0,120),rand(0,120));
	//str_split($strdb,3)更多的中文
	$cn=$strdb[$i];
	$catch .=$cn;
	imagettftext($img, mt_rand(20,24), mt_rand(-60,60), (40*$i+20), mt_rand(30,35), $fontcolor,$fontface, $cn);
}
$_SESSION['autocode']=$catch;
for ($i=0; $i <200 ; $i++) { 
	$pointcolor=imagecolorallocate($img,rand(50,200),rand(50,200),rand(50,200));
	imagesetpixel($img,rand(1,99),rand(1,29),$pointcolor);
}
for ($i=0; $i<3; $i++) { 
	$linecolor=imagecolorallocate($img,rand(80,220),rand(80,220),rand(80,220));
	imageline($img,rand(2,99),rand(1,29),rand(1,99),rand(1,29), $linecolor);
}

header("content-type:image/png");
imagepng($img);
imagedestroy($img);

//  ?>