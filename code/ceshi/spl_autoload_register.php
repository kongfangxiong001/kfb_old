<?php
class func1{
	static function func2($classname){
	    require $classname.".php";
	}
}
spl_autoload_register(array('func1','func2'));
//spl_autoload_register('func2');
$cat = new Cat();