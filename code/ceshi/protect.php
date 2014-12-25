<?php
class Cat{
    public function pub_fun()
    {
        echo 'I am pub_fun';
    }
    
    protected  function pro_fun()
    {
        $this->pri_fun();
        echo 'I am Pro_fun';
    } 
    
    private function pri_fun()
    {
        echo 'I am Pri_fun';
    }
}

class Hua_Cat extends Cat{
     public function run()
     {
        $this->pub_fun();
        $this->pro_fun();
//        $this->pri_fun();    
     }
}

$hua_Cat = new Hua_Cat();

$hua_Cat->run();

$cat = new Cat();
