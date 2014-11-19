<?php
include_once "../include/common.inc.php";
$action = $_POST['action'];
switch($action){
	case 'login':
			$param['name'] = $_POST['name'];
			$param['password'] = $_POST['password'];
			$user = new user();
			if($user->login($param)){
				showMsg("登录成功!","./center.php");
			}else{
				showMsg("登录失败，用户名或密码错误!");
			}
		break;
}
