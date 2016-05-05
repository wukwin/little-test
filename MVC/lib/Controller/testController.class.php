<?php 



//控制器

 class testController{


function show()
{
	

 	$testModel=M('test');
 	$data=$testModel->get();
 	$testView=V('test');
 	$testView->display($data);

}
 	
 }