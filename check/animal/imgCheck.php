<?php 




session_start();

$table=array(

	'p1'=>'monkey',
	'p2'=>'dog',
	'p3'=>'cat',
	'p4'=>'sheep'
	);

$index=rand(1,4);
$value=$table['p'.$index];

$_SESSION['autocode']=$value;

$filename=dirname('_FILE_').'\\p'.$index.'.jpg';

$content=file_get_contents($filename);
header('content-type:image/jpg');
echo $content;













// $img=imagecreatetruecolor(140, 30);

// $bgcolor=imagecolorallocate($img,255,255,255);

// imagefill($img,0,0,$bgcolor);

// /*for ($i=0; $i<4 ; $i++) { 
// 	$fontsize=6;
// 	$fontcolor=imagecolorallocate($img,rand(0,120),rand(0,120),rand(0,120));
// 	$fontcontent=rand(0,9);
// 	$x=$i*100/4+rand(5,10);
// 	$y=rand($i*2,10);
// 	imagestring($img,$fontsize,$x,$y,$fontcontent,$fontcolor);
	

// }*/
// $catch='';
// for ($i=0; $i <4 ; $i++) { 
// 	$fontsize=6;
// 	$fontcolor=imagecolorallocate($img,rand(0,120),rand(0,120),rand(0,120));
// 	$data='abcdefghijklmnopqrstuvwxyz1234567890';
// 	$fontcontent=substr($data,rand(0,strlen($data)),1);
// 	$x=$i*100/4+rand(5,10);
// 	$y=rand($i*2,10);
// 	imagestring($img,$fontsize,$x,$y,$fontcontent,$fontcolor);
// 	$catch.=$fontcontent;
// }
// $_SESSION['autocode']=$catch;
// for ($i=0; $i <200 ; $i++) { 
// 	$pointcolor=imagecolorallocate($img,rand(50,200),rand(50,200),rand(50,200));
// 	imagesetpixel($img,rand(1,99),rand(1,29),$pointcolor);
// }
// for ($i=0; $i<3; $i++) { 
// 	$linecolor=imagecolorallocate($img,rand(80,220),rand(80,220),rand(80,220));
// 	imageline($img,rand(2,99),rand(1,29),rand(1,99),rand(1,29), $linecolor);
// }

// header("content-type:image/png");
// imagepng($img);
// imagedestroy($img);

//  ?>