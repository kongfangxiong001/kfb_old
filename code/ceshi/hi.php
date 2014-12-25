<?php
//echo preg_replace('/(\\\\)/','/${1}1',"a:\b\c\d",1);



/* 一个unix样式的命令行过滤器，用于将段落开始部分的大写字母转换为小写。 */
//    $line = "<I>hello,world";
//    $line = preg_replace_callback(
//        '/<I>\s*\w/',
//       function ($matches){
//       		return strtolower($matches[0]);
//       },
//        $line
//     );
//
//echo $line;

//preg_reg
//$array = array(10.2,43,'ab',3.4,5.5);
//$fl_array = preg_grep("/^(\d+)?\.\d+$/", $array,1);
//print_r($fl_array);


//$keywords = '$40 for a {} \dg3/400';
//$keywords = preg_quote($keywords);
//echo $keywords; // 返回 \$40 for a g3\/400

//在这个例子中，preg_quote($word) 用于保持星号原文涵义，使其不使用正则表达式中的特殊语义。

//$textbody = "This book is *very* difficult to find.";
//$word = "*very*";
//$textbody = preg_replace ("/" . preg_quote($word) . "/",
//                          "<i>" . $word . "</i>",
//                          $textbody);
//echo $textbody;
    echo "hello,world;";
?>
