<?php 

class imageOperate{


private $info; 
private $image; 
public function __construct($src){

			$info=getimagesize($src);

			$this->info = array('width' =>$info[0],'height'=>$info[1],'type'=>image_type_to_extension($info[2],false),'mime'=>$info['mime']);

			$fun="imagecreatefrom{$this->info['type']}";

			$this->image=$fun($src);

}


public function thumb($width,$height)
{
	$image_thumb=imagecreatetruecolor($width, $height);

	imagecopyresampled($image_thumb, $this->image, 0, 0, 0, 0, $width, $height, $this->info['width'], $this->info['height']);

	imagedestroy($this->image);
	$this->image=$image_thumb;
}

public function fontMark($content,$font_url='msyh.ttf',$size=20,$local=array('x'=>90,'y'=>50),$angle=10,$color=array(0=>255,1=>255,2=>255,3=>20))
{


//设置图片透明度
$col=imagecolorallocatealpha($this->image, $color[0], $color[1], $color[2], $color[3]);
//写入文字
imagettftext($this->image, $size, $angle, $local['x'], $local['y'], $col, $font_url, $content);
// 输出图片
}

public function waterimg($source='003.jpg',$local=array('x'=>30,'y'=>40),$alpha=50)
{


$info=getimagesize($source);

$type=image_type_to_extension($info[2],false);

$fun="imagecreatefrom{$type}";

$water=$fun($source);

imagecopymerge($this->image, $water,$local['x'],$local['y'],0,0,$info[0], $info[1], $alpha);

imagedestroy($water);
}


public function show()
{

header("content-type:".$this->info['mime']);

$func="image{$this->info['type']}";

$func($this->image);	

}

public function save($imageName)
{
	$func="image{$this->info['type']}";
	$func($this->image,$imageName.'.'.$this->info['type']);
}

public function __destruct()
{
	imagedestroy($this->image);
}



}