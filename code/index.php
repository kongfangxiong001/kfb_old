<?php
include_once "./include/common.inc.php";

// $res = $db->query("select * from `user`");
$user  = new user();
// $user->addUser(array('name'=>'xiaohong','password'=>'xiaohong123456'));

// $pdo = new PDO(DSN,DBUSER,DBPASS);
// $pdo->prepare("select * from user");

// $user->login(array('name'=>'xiaohong','password'=>'xiaohong123456'));
print_r($_SESSION);
//LOCK TABLES/UNLOCK TABLES句法