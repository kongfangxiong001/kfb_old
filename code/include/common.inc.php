<?php
define("WEBROOT",substr(preg_replace("/\\\\/","/",dirname(__FILE__)),0,-strlen("include")));
define("INCLUDEROOT",WEBROOT."/include");
//ini_set('session.save_handler', 'redis');
//ini_set('session.save_path','tcp://127.0.0.1:6739');
ini_set('default_socket_timeout', -1); 
require_once INCLUDEROOT."/config.inc.php";
require_once INCLUDEROOT."/func.php";

if(!isset($_SESSION)){
	session_start();
}
header("Content-Type:text/html; charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
$db = db::getInstance(DSN,DBUSER,DBPASS);
