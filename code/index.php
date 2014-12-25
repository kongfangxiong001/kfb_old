<?php
//include_once "./include/common.inc.php";

// $res = $db->query("select * from `user`");
//$user  = new user();
// $user->addUser(array('name'=>'xiaohong','password'=>'xiaohong123456'));

// $pdo = new PDO(DSN,DBUSER,DBPASS);
// $pdo->prepare("select * from user");

// $user->login(array('name'=>'xiaohong','password'=>'xiaohong123456'));
//print_r($_SESSION);
//LOCK TABLES/UNLOCK TABLES句法

//$allot = new allot();
// echo $allot->getTotalEffective();
// echo $allot->getRate(30);
//echo $allot->getUserEffective(4);
//echo $redis->get('PHPREDIS_SESSION:' . session_id());
ini_set('session.save_handler','redis');
ini_set('session.save_path','tcp://127.0.0.1:6379');
ini_set('session.cookie_domain', '.kfxiong.com');

session_start();


$_SESSION['user_id'] = 1;
$_SESSION['username'] = iconv('UTF-8','GBK','xx');
//$_SESSION['has_a'] = '';
/**
 * 以下权限相关的需要在本地查询
 */

//$alist = explode(',','1,bb,3,4,5,7849247832');
//foreach($alist as $k){
//	echo is_numeric($k);
//}
//$_SESSION['group_type'] = '1';
//$_SESSION['gid'] = '2'; //权限
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
print_r($redis->get('PHPREDIS_SESSION:' . session_id()));
$redis->close();