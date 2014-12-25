<?php
//echo preg_match('/^\d+(?:,\d+)*\d*$/','12,2');
//echo preg_replace('/l(.*)e.*l\1e/','',"he love she,she love he.\n\r he like she,she like he",1);

//preg_match_all('/^he.*l(.*)e.*l\1e.*he$/m',"he love she,she love he\rhe1 like she,she like he",$match);
//print_r($match);
/**
 * preg_replace 
 * preg_replace_callback
 * preg_match
 * preg_match_all
 * preg_grep
 * preg_quote
 */
$pattern = "/(abc)\w{10}\\1/";
$subject = "abc0123456789abc,abc1111111111abc";
preg_match_all($pattern,$subject,$match,PREG_PATTERN_ORDER);

print_r($match);