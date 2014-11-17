<?php
function __autoload($classname){
	$classpath="./include/".$classname.'.class.php';
	if(file_exists($classpath)){
		require_once($classpath);
	}else{
		echo 'class file'.$classpath.'not found!';
	}
}
