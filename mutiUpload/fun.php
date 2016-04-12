<?php 

function getuniname(){

	return md5(uniqid(microtime(true),true));

}

function getext($filename){
	return strtolower(pathinfo($filename,PATHINFO_EXTENSION));
}