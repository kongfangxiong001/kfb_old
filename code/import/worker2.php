<?php
/**
select count(*) from `pre_forum_thread` where authorid=1492
select * from `pre_forum_thread` where authorid=1492 and fid=37 limit 0,10

select * from `pre_forum_thread` t left join `pre_forum_post` p on t.tid=p.tid  where t.authorid=1492 and t.fid=2 limit 0,10

2	资料上传区	1	资料查询
36	公告发布区	2	网站公告
37	孔方兄社区	3	自由交流区

zhuchen  367
康子	601
duoduo	1492
*/
error_reporting(E_ALL^E_DEPRECATED);
header("Content-Type:text/html;charset=utf8");
$host = "localhost";
$user = "root";
$pass = "";
$newdb = "bbs_myafeier";
$olddb = "discuz";

require "ubb.php";

$attachTable = "pre_forum_attachment_";

$attachDir = "/../../uploads/attach/";

$new = mysql_connect($host,$user,$pass,true);
mysql_select_db($newdb,$new);
mysql_query("set names utf8",$new);


$old = mysql_connect($host,$user,$pass,true);
mysql_select_db($olddb,$old);
mysql_query("set names utf8",$old);
/**
 * 打开日志，将有文件的tid 写入
 */
$fp = fopen('log.txt','a+');

/**
 * @uid 导哪个用户的主题
 * @fid 导出 哪个版块
 * @inFid 导入版块
 * 
 */
//2	资料上传区	1	资料查询
//36	公告发布区	2	网站公告
//37	孔方兄社区	3	自由交流区

$uid = "367,1492";
$fid = 36;
$inFid = 2;
$ubb = new EncodeQ3boy();
$ubb->others = false;

$outSql = "select * from `pre_forum_thread` t left join `pre_forum_post` p on t.tid=p.tid  where t.authorid in ($uid) and t.fid=$fid and p.first=1";
$res = mysql_query($outSql,$old);
//循环主题帖
while($v = mysql_fetch_array($res,MYSQL_ASSOC)){
		$getAttach = "select * from `pre_forum_attachment` where `tid`={$v['tid']}";
		$threadAttach = mysql_query($getAttach);
		$attachmentArray = array();
		//主题贴内的附件
		while($t = mysql_fetch_array($threadAttach,MYSQL_ASSOC)){
				if($t['tableid']<0||$t['tableid']>9){
					
				}else{
					$tableid = $t['tableid'];
					$realTable = $attachTable.$tableid;
					//判断是否是图片
					$getAttachSql = "select * from `$realTable` where `aid`={$t['aid']}";
					$attachment = mysql_query($getAttachSql,$old);
					//对于单独一个附件
					while($a = mysql_fetch_array($attachment,MYSQL_ASSOC)){
						$attachUrl = $attachDir.$a['attachment'];
						if($a['isimage']){
							$attachmentArray[$a['aid']] = "<img src=\"$attachUrl\" alt=\"{$a['filename']}\"/>";
						}else{
							$attachmentArray[$a['aid']] = "<a href=\"$attachUrl\" alt=\"{$a['filename']}\">{$a['filename']}-下载</a>";
						}
					}
				}
		}
		$ubb->str = $v['message'];
		$v['message'] = $ubb->ubbEncode();
		preg_match_all('/\[attach\](\d+)\[\/attach\]/i', $v['message'], $match);
		foreach($match[1] as $key=>$value){
			$v['message'] = preg_replace('/\[attach\](\d+)\[\/attach\]/i', $attachmentArray[$value], $v['message']);
		}
		$inSql = "insert into `stb_forums`(`fid`,`cid`,`uid`,`title`,`content`,`addtime`)values({$v['tid']},$inFid,18014,'{$v['subject']}','{$v['message']}',{$v['dateline']})";
		if(!mysql_query($inSql,$new)){
			fwrite($file,$v['tid']."可能有问题\r\n");
			echo $v['tid']."<br/>|".$inSql."|<br/><br/>";
		}
}


