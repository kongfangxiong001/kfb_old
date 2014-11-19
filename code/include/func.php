<?php
function __autoload($classname){
	$classpath= INCLUDEROOT."/".$classname.'.class.php';
	if(file_exists($classpath)){
		require_once($classpath);
	}else{
		echo 'class file'.$classpath.'not found!';
	}
}

function showMsg($msg,$url){
	echo $msg."&nbsp;&nbsp;<a href='$url'>跳转</a>";
}
