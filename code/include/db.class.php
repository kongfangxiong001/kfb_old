<?php
class db{
	private static $_instance;
	private function __construct(){
		
	}
	
	public static function getInstance($dns,$dbuser,$dbpass){
		if(self::$_instance===null){
			try{
				self::$_instance = new PDO($dns,$dbuser,$dbpass);
			}catch(Exception $e){
				echo $e->getCode().":".$e->getMessage();
			}
		}
		return self::$_instance;
	}
}