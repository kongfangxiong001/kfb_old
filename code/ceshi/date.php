<?php
$date = array(1418054400,1418803537,1418786376,1408841763);

foreach($date as $k=>$v){
	echo date('Y-m-d H:i:s'."\r\n",$v);
}