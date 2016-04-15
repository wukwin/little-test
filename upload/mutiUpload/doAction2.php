<?php
error_reporting(0);
//print_r($_FILES);
function getFiles(){
$i=0;
foreach($_FILES as $file)	
{
	
	if(is_string($file['name'])){

		$files[$i]=$file;
		$i++;
	}elseif (is_array($file['name'])){
		
			foreach($file['name'] as $key=>$val){
				$files[$i]['name']=$file['name'][$key];
				$files[$i]['type']=$file['type'][$key];
				$files[$i]['tmp_name']=$file['tmp_name'][$key];
				$files[$i]['error']=$file['error'][$key];
				$files[$i]['size']=$file['size'][$key];
				$i++;
		}
	}
	
}
return $files;
}

function uploadFile($fileInfo,$path='../',$flag=true,$allowExt=array('jpeg','jpg','html','txt'),$Maxsize=2097152){
	// $flag=true;
	// $allowExt=array('jpeg','jpg','html','txt');
	if ($fileInfo['error']===UPLOAD_ERR_OK) {
				if ($fileInfo['size']>$Maxsize) {
				$res['mes']=$fileInfo['name'].'上传文件过大';
		}
$ext=getext($fileInfo['name']);
if(!in_array($ext,$allowExt)){
	$res['mes']=$fileInfo['name'].'非法文件类型';
}
if($flag){
		if(!getimagesize($fileInfo['tmp_name'])){
			$res['mes']=$fileInfo['name'].'不是真实图片类型';
		}
	}
if (! is_uploaded_file ( $fileInfo ['tmp_name'] )) {
		$res['mes']=$fileInfo['name'].'文件不是通过HTTP POST方式上传上来的';
	}
	if(!empty($res)){return $res;}
	//$path='../';
	if (! file_exists ( $path )) {
		mkdir ( $path, 0777, true );
		chmod ( $path, 0777 );
	}
	$uniname=getuniname();
	$destination=$path.'/'.$uniname.'.'.$ext;
if (! @move_uploaded_file ( $fileInfo ['tmp_name'], $destination )) {
		$res['mes']= $fileInfo['name'].'文件移动失败' ;
	}
	$res['mes']=$fileInfo['name'].'文件上传成功';
	$res['dest']=isset($res['dest'])?$res['dest']:'null';
	$res['dest']=$destination;
	return $res;

	}else{
		switch ($fileInfo['error']) {
		 //匹配错误信息
        case 1:
            $res['mes'] = '上传文件超过了php配置文件中upload_max_file';
            break;
        case 2:
            $res['mes'] = '超过了表单max_file_size限制的大小';
            break;
        case 3:
            $res['mes'] = '文件部分被上传';
            break;
        case 4:
            $res['mes'] = '没有选择上传文件';
            break;
        case 6:
            $res['mes'] = '没有找到临时文件';
            break;
        case 7:
        case 8:
            $res['mes'] = '系统错误';
            break;
}
return $res;
	}
}

// header("Content-type:text/html;charset=utf-8");
// include_once 'upload.php';
// foreach ($_FILES as $fileInfo) {
// 	$row[]=uploadFile($fileInfo);//遍历的值就是每一个图片文件，可以直接传入函数得到地址
// }
// print_r($row);

// header("Content-type:text/html;charset=utf-8");
// require_once 'upload.php';
// $fileInfo=$_FILES['myfile'];
// //$allowExt=array('jpg','html','text');
// $newname=uploadFile($fileInfo);
// echo $newname;
 ?>