<?php
$attributes['name'] = 'jack';
$attributes['rows'] = 100;
$attributes += array('rows' => 10, 'cols' => 50);
$person = array('username'=>'xiaoming','age'=>100);
$result = $attributes + $person;

print_r($result);