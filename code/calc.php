<?php
/**
 * 计算用户收益，需要分页来做循环.用curl或者其他的方式发送请求，触发下一次循环。
 */
include_once "./include/common.inc.php";
$totalAllot = 99; //经过投资当天获得的总收益。
$allot = new allot();
$todayRate = $allot->getRate($totalAllot);


$page = $_POST['page'];
$pagesize = 100;
$user = new user();
$users = $user->getUserInfo($page, $pagesize);
foreach($users as $k=>$v){
	$userEffective = $allot->getUserEffective($v['user_id']);
	$userAllot = $userEffective*$todayRate;
	
	$allot->recordAllot($v['user_id'],$userAllot);
}

