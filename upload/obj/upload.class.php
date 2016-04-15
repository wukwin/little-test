<?php 

class upload{

	protected $fileName;
	protected $path;
	protected $imagflag;
	protected $allowExt;
	protected $allowMime;
	protected $Maxsize;
	protected $error;
	protected $ext;
	public function __construct($fileName='myFile',$path='../',$imagflag=true,$allowExt=array('jpeg','jpg','html','txt'),$allowMime=array('image/jpeg','image/jpg','image/gif'),$Maxsize=524880)
	 {
	 	$this-> fileName=$fileName;
	 	$this-> Maxsize=$Maxsize;
	 	$this-> allowMime=$allowMime;
	 	$this-> allowExt=$allowExt;
	 	$this-> imagflag=$imagflag;
	 	$this-> path=$path;
	 	$this-> fileInfo=$_FILES[$this->fileName];
	 }
	 protected function checkError()
	 {

	 	if (!is_null($this->fileInfo)) {
	 		
					 	if ($this->fileInfo['error']>0) {

					 		switch ($this->fileInfo['error']) {
						 //匹配错误信息
				        case 1:
				            $this->error = '上传文件超过了php配置文件中upload_max_file';
				            break;
				        case 2:
				            $this->error = '超过了表单max_file_size限制的大小';
				            break;
				        case 3:
				            $this->error = '文件部分被上传';
				            break;
				        case 4:
				            $this->error = '没有选择上传文件';
				            break;
				        case 6:
				            $this->error = '没有找到临时文件';
				            break;
				        case 7:
				        case 8:
				            $this->error = '系统错误';
				            break;
					 	}
					 	return false;
					 }else{
					 return true;
						}
					}else{
						$this->error='文件上传错误';
						return false;
					}
}

	protected function checkSize()
	{
		if ($this->fileInfo['size']>$this->Maxsize) {
			$this->error='文件上传过大';
			return false;
		}
		return true;
	}
	
	protected function checkExt()
	{
		$this->ext=strtolower(pathinfo($this->fileInfo['name'],PATHINFO_EXTENSION));
		if (!in_array($this->ext,$this->allowExt)) {
			$this->error='不允许的扩展名';
			return false;
		}
		return true;
	}
	protected function checkMime()
	{
		if (!in_array($this->fileInfo['type'],$this->allowMime)) {
			$this->error='不允许的文件类型';
			return false;
		}
		return true;
	}
	protected function checkTureImg()
	{
		if($this->imagflag){
		if (!@getimagesize($this->fileInfo['tmp_name'])) {
			$this->error='不是真实图片类型';
			return false;
		}
	}
		return true;
	}

	protected function checkHttpPost()
	{
		if (!is_uploaded_file($this->fileInfo['tmp_name'])) {
			$this->error='不是通过HTTP POST方式上传上来的';
			return false;
		}
		return true;
	}
	protected function showError()
	{
		exit('<span style="color=red">'.$this->error.'</span>');
	}
	protected function checkPath()
	{
		if(!file_exists($this->path)){
			mkdir($this->path,0777,true);
			//chmod($this->$path,0777);
		}
	}

	protected  function getUniName()
	{
		return md5(uniqid(microtime(true),true));
	}
	 public function uploadFile()
	 {
	 	if ($this->checkError()&&$this->checkSize()&&$this->checkExt()&&$this->checkMime()&&$this->checkTureImg()&&$this->checkHttpPost()){

	 		$this->checkPath();
	 		$this->uniname=$this->getUniName();
	 		$this->destination=$this->path.'/'.$this->uniname.'.'.$this->ext;
	 		if (@move_uploaded_file($this->fileInfo['tmp_name'],$this->destination)) {
	 			return $this->destination;
	 		}else{
	 			$this->error='文件移动失败';
	 			$this->showError();
	 		}

	 		
	 	}else{
	 		$this->showError();
	 	}
	 }
	 }

