<?php
class cat{
    public function miao()
    {
        echo 'miao';
    }
}

$classe = new Reflection('cat');
$instance = $classe->newInstanceArgs();
$method = $class->getMethod('miao');
$method->invoke($instance);

