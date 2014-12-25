<?php
class my_arr extends ArrayObject{
	public function append($str=""){
		echo 'a';
	}
}

$m_a = new my_arr();
$m_a->append("fourth");
$m_a->append("third");
$m_a->append("second");
$m_a->append("first");
foreach($m_a as $k=>$v){
	echo print_r($v."\r\n",true);
}
$m_a['hi'] = "hello,world";