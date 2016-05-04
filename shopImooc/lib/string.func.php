	<?php 

	header("Content-type:text/html;charset=utf-8");
	function buildRandomString($type=3,$length=4){
		
	/**
	 * type是指选择哪种验证码类型
	 * range产生一个从低到高的数组
	 * array_merge把不同的数组拼接在一起
	 * join是explode的别名，把数组组合成字符串
	 * 
	 */
	
	if ($type==1) {
		$chars=join("",range(0,9));
	}elseif ($type==2) {
		$chars=join("",array_merge(range('a','z'),range('A','Z')));
	}elseif ($type=3) {
		$chars=join("",array_merge(range('a','z'),range('A','Z'),range(0,9)));
	}
	//如果length长度和字符串长度不相等，需要报错
	//str_shuffle()随机地打乱字符串中的所有字符。
	if ($length>strlen($chars)) {
		exit("字符串长度不够");
	}
	$chars=str_shuffle($chars);
	return substr($chars,0,$length);
	}