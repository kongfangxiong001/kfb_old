<?php
define("WEBROOT",substr(preg_replace("/\\\\/","/",dirname(__FILE__)),0,-strlen("include")));
require_once "config.inc.php";
require_once "func.php";

if(!isset($_SESSION)){
	session_start();
}
date_default_timezone_set("Asia/Shanghai");
$db = db::getInstance(DSN,DBUSER,DBPASS);