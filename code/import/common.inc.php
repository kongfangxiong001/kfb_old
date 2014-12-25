<?php
define("WEBROOT",substr(preg_replace("/\\\\/","/",dirname(__FILE__)),0,-strlen("include")));
define("INCLUDEROOT",WEBROOT."/include");
require_once INCLUDEROOT."/config.inc.php";
function autoload($class){
	require $class.".class.php";
}
spl_autoload_register("autoload");

header("Content-Type:text/html; charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
$db1 = db::getInstance(DSN,DBUSER,DBPASS);