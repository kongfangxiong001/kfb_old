<?php
ini_set('unserialize_callback_func','my_func');
$serialized_object='O:1:"a":1:{s:5:"value";s:3:"100";}';

function my_func($classname){
	echo 'my_func run!';
	require "a.php";
}

unserialize($serialized_object);


