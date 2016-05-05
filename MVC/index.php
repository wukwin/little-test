<?php 
error_reporting(0);
// URL=index.php?constoller=$name&Method=
require_once 'function.php';

$controller=$_GET['controller'];
$method=$_GET['method'];
C($controller,$method);
