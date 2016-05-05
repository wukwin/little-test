<?php 
session_start();
define("ROOT", dirname(__FILE__));//dirname(_file_)获得当前文件的绝对路径;file下划线有两个
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT.".core".PATH_SEPARATOR."/configs".PATH_SEPARATOR.get_include_path());
require_once 'mysql.func.php';
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'string.func.php';
require_once 'page.func.php';
require_once 'configs.php';


