<?php 
header("Content-type:text/html;charset=utf-8");
//print_r($_FILES);
$fileInfo=$_FILES['myfile'];
$filename=$fileInfo['name'];
$type=$fileInfo['type'];
$tmp_name=$fileInfo['tmp_name'];
$size=$fileInfo['size'];
$error=$fileInfo['error'];
$Maxsize=2097152;
$allowExt=array('jpeg','jpg','png','gif');
$flag=true;
//move_uploaded_file($tmp_name, $filename);

	if ($fileInfo['error']==0){
		if ($fileInfo['size']>$Maxsize) {
			exit('上传文件太大');
		}
		$ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
		if(!in_array($ext, $allowExt)){
			exit('非法文件类型');
		}
		if (!is_uploaded_file($fileInfo['tmp_name'])) {
					exit('文件不是通过http post方式上传');
		}
		
		if($flag){
			if(!getimagesize($fileInfo['tmp_name'])){
				exit('不是真正的图片类型');
			}
		}

		//echo $uniname;exit;
		$path='';
		if (!file_exists($path)) {
			mkdir($path,0777,true);
			chmod($path, 0777);
		}

		$uniname=md5(uniqid(microtime(true),true)).'.'.$ext;
		$destination=$path.'/'.$uniname;
		if(@move_uploaded_file($fileInfo['tmp_name'],$destination)){

			echo "文件".$filename."上传成功";			
		}else{

			echo "文件".$filename."上传失败";
		}
}else{

		switch ($error) {
		 //匹配错误信息
        case 1:
            echo '上传文件超过了php配置文件中upload_max_file';
            break;
        case 2:
            echo '超过了表单max_file_size限制的大小';
            break;
        case 3:
            echo '文件部分被上传';
            break;
        case 4:
            echo '没有选择上传文件';
            break;
        case 6:
            echo '没有找到临时文件';
            break;
        case 7:
        case 8:
            echo '系统错误';
            break;
}
}
?>