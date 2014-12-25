<?php
$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES,'UTF-8',FALSE);
$new2 = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES,'UTF-8',TRUE);
echo $new."\r\n";
echo $new2;