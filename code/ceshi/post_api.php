<?php
$fh = fopen('E:/post_api.txt','a+');
$post = print_r($_POST,true);
fwrite($fh,$post,strlen($post));
fclose($fh);