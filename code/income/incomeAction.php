<?php
include_once "../include/common.inc.php";
$action = $_POST['action'];
switch($action){
	case 'income':
			$param['user_id'] = $_SESSION['user_id'];
			$param['money'] = $_POST['money'];
			$income = new income();
			if($income->incomeMoney($param)){
				showMsg('转入成功', '/user/center.php');
			}
		break;
}
