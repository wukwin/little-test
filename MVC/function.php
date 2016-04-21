<?php 



function C($name,$method)
 {
 	require_once 'lib/Controllertest/'.$name.'Controller.class.php';
	// $controller=$name.controller;
	// $obj=new $controller();
	// $obj->$method();
	eval('$obj=new '.$name.'Controller();$obj->'.$method.'();')
 } 

	C('test','show');

	function M($name){

		require_once 'lib/Model/'.$name.'Model.class.php';
		eval('$obj=new '.$name.'Model();')
		return $obj;
	}

		function V($name){

		require_once 'lib/View/'.$name.'View.class.php';
		eval('$obj=new '.$name.'View();');
		return $obj;
	}

?>