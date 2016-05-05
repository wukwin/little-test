<?php 
function C($name,$method)
 {
 	require_once 'lib/Controller/'.$name.'Controller.class.php';
	$controller=$name.controller;
	$obj=new $controller();
	$obj->$method();
	
 } 

	 

	function M($name){

		require_once 'lib/Model/'.$name.'Model.class.php';

		$model = $name.'Model';
		return new $model(); 
		
	}

		function V($name){

		require_once 'lib/View/'.$name.'View.class.php';
		$model = $name.'View';
		return new $model(); 
	}
	function daddslashes($str)
	{	
		return (!get_magic_quotes_gpc())?addslashes($str):$str;
	}

?>