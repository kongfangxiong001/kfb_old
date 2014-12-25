<?php
//	function test($filename, $extension)
//	{
//		if ( ! is_array($filename))
//		{
//			return array(strtolower(str_replace('.php', '', str_replace($extension, '', $filename)).$extension));
//		}
//	}
//$a = array();
//$a['id']='';
//echo isset($a['id']);
//unset($a['id']);
//echo array_key_exists('id',$a);
//echo empty($a['id']);

$url = 'http://test.kfxiong.com/apis/borrowdetail/readpermit';
$ids = explode(',','21653,21654');
$data = array('user_id'=>16922,'borrow_ids'=>$ids);
$data = http_build_query($data);
$opt = array(
	'http'=>array(
			'method'=>'POST',
			'header'=>"Content-type: application/x-www-form-urlencoded\r\n".
					  "Content-Lenth:".strlen($data)."\r\n",
			'content'=>$data
		)
);
$context = stream_context_create($opt);
@fopen($url,'rb',FALSE,$context);
//header( "HTTP/1.1 500 Moved Permanently");
echo http_response_code();
print_r($http_response_header);
$response_header = $http_response_header;
if(strpos($response_header[0],'200')){
	echo 'yes';
}