<?php
//数据库连接
$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('test', $conn);
mysql_query("SET NAMES utf8");

/*
支持事务的表必须是InnoDB类型
一段事务中只能出现一次:
mysql_query('START TRANSACTION');//开始事务
mysql_query(' ROLLBACK ');//回滚事务
mysql_query('COMMIT');//提交事务

如果一段事务中出现多次回滚事务，则在，提交事务时只将第一次回滚前至开始事务后对数据库的所有操作取消，第一次回滚后至提交事务前所有对数据库操作仍将有效，所以一般将回滚语句仅放在提交事务语句前
如果一段事务无提交语句，则从开始事务时以下的所有对数据库操作虽执行（执行方法返回对错），但对数据库无影响，但是在执行下段开始事务语句时，前段事务自动提交
*/
//mysql_query('START TRANSACTION');
//$isBad = 10;
//$ins_testTable1 = "INSERT INTO user(username)VALUES('xioaming')";
//if(!mysql_query($ins_testTable1)){
//    $isBad=1;
//}
////插入语句字段名有错
//$ins_testTable2 = "INSERT INTO user(usernames)VALUES('xiaohong')";
//if(!mysql_query($ins_testTable2)){
//    $isBad=1;
//}
//if($isBad == 1){
//    echo $isBad;
//    mysql_query('rollback');
//}else{
//	mysql_query('commit');
//}
//mysql_close($conn);


mysql_query('set autocommit = 0');
$isBad = 10;
$ins_testTable1 = "INSERT INTO user(username)VALUES('xioaming')";
if(!mysql_query($ins_testTable1)){
    $isBad=1;
}
//插入语句字段名有错
$ins_testTable2 = "INSERT INTO user(usernames)VALUES('xiaohong')";
if(!mysql_query($ins_testTable2)){
    $isBad=1;
}
if($isBad == 1){
    echo $isBad;
    mysql_query('rollback');
}else{
    mysql_query('commit');
}
mysql_close($conn);
?>