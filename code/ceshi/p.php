<?php   
$str='中文a字1符';  
echo strlen($str);//字节个数 ,14
echo mb_strlen($str);
echo mb_strlen($str,'UTF-8');//选定内码为UTF-8,中文作为一个字节,6
echo mb_strlen($str,'gbk'); //8
echo mb_strlen($str,'gb2312'); //10

echo mb_internal_encoding();