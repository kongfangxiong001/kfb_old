<?php
abstract class Go{
    public function my_go(){}
    public function hhhiii(){
        $res = $this->my_go();
        echo 'right||error';
        return $res;
    }
}
$Go->my_go();
class child_go extends Go{
    public function haha()
    {
        $this->hhhiii();
    }
    public function my_go(){
        echo "run my_go";
    }
}

$go_ins = new child_go;
$go_ins->haha();