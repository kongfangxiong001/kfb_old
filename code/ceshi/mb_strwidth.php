<?php
$str="我奇偶将佛啊奇偶感觉奥ijag";//11+4
header("Content-Type:text/html;charset=UTF-8");
//echo mb_strwidth($str);

function reverse($str)
{
        $ret="";
        $len=mb_strlen($str,"utf-8");
        echo $len;
        for($i=0;$i<$len;$i++){
        	$arr[]=mb_substr($str,$i,1,"utf-8");
        }
        return implode("",array_reverse($arr));
}
echo strrev($str);
//print_r(reverse($str));