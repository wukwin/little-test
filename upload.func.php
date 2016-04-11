<?php 

//$fileInfo=$_FILES['myfile'];
function uploadFile($fileInfo,$flag=true,$allowExt=array('jpg','png','gif'),$Maxsize=2097152,$path='image/'){
if ($fileInfo['error']>0){

switch ($error) {
		 //匹配错误信息
        case 1:
            $mag = '上传文件超过了php配置文件中upload_max_file';
            break;
        case 2:
            $mag = '超过了表单max_file_size限制的大小';
            break;
        case 3:
            $mag = '文件部分被上传';
            break;
        case 4:
            $mag = '没有选择上传文件';
            break;
        case 6:
            $mag = '没有找到临时文件';
            break;
        case 7:
        case 8:
            $mag = '系统错误';
            break;
}
       exit($mag);
}


//检测文件类型
$ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
// $allowExt=array('jeg','png','gif');
// 
if(!is_array($allowExt)){
		exit('系统错误');
	}
if(!in_array($ext,$allowExt)){
	exit('非法文件类型');
}
//检测文件大小是否符合规范
//$Maxsize=2097152;
if ($fileInfo['size']>$Maxsize) {
	exit('上传文件过大');
}
//检测文件上传方式
if (!is_uploaded_file($fileInfo['tmp_name'])) {
					exit('文件不是通过http post方式上传');
		}

if($flag){
			if(!getimagesize($fileInfo['tmp_name'])){
				exit('不是真正的图片类型');
			}
		}

//$path='';

if (!file_exists($path)) {
			mkdir($path,0777,true);
			chmod($path, 0777);
		}
$uniname=md5(uniqid(microtime(true),true)).'.'.$ext;
$destination=$path.'/'.$uniname;
if(! @move_uploaded_file($fileInfo['tmp_name'],$destination)){

		exit("文件".$filename."上传失败");
		
}

return $destination;

}


