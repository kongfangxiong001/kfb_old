<?php
$group = "myconf.options.aaa.bbb";
list($group, $path) = explode('.', $group, 2);
echo $group."||".$path;