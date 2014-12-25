<?php
class Cat{
    private   $name;
    public   $age;
    public function set($property){
    	$this->name = $property['name'];
    	$this->age = $property['age'];
    }
    public function get(){
    	$attribute['name'] = $this->name;
    	$attribute['age'] = $this->age;
    	return $attribute;
    }
//    public function __sleep(){
//    	return array("name");
//    }
    public function __set($property,$value){}
    	
}


$cat = new Cat();
$cat->xiao = "haah";
$cat->set(array('name'=>'huahua','age'=>10));

print_r($cat);
$data = serialize($cat);
print_r($data);