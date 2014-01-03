<?php
include "wechat.class.php";
$options = array(
		'token'=>'Hick185' //填写你设定的key
	);
$weObj = new Wechat($options);
$weObj->valid();
$getObj = $weObj->getRev();
$type = $getObj->getRevType();
switch($type) {
	case Wechat::MSGTYPE_TEXT:
			$get_text = $getObj->getRevContent();
			$sender = $getObj->getRevFrom();
			if('help' == $get_text || 'h' == $get_text)
			{
				$weObj->text("这里是帮助，暂时没有信息")->reply();
			}
			else
			{
				$items = array(
					array(
				   		'Title'=>'消息标题',
				   		'Description'=>'还有摘要信息！！！',
				   		'PicUrl'=>'http://www.webrube.com/img/copyleft.png',
				   		'Url'=>'http://www.webrube.com'
				   	),
				   	array(
				   		'Title'=>'msg 消息标题1',
				   		'Description'=>'还有摘要信息！！！2',
				   		'PicUrl'=>'http://www.webrube.com/img/copyleft.png',
				   		'Url'=>'http://www.webrube.com'
				   	),
	   			);

	   			$news = "\n* <a href='http://www.hickwu.com'>连接地址1</a> \n* <a href='http://www.hickwu.com'>连接地址2</a> \n";
	   			$keyword = "关键词订阅: \n- <a href='http://www.hickwu.com'>Python</a> \n- <a href='http://www.hickwu.com'>PHP</a> \n ";

				$ret = $weObj->text("你好，我是噜吧机器人 Hick, 你是 {$sender} 的是 {$get_text}， 支持链接不？ <a href='http://www.hickwu.com'>连接地址</a>  {$news}  {$keyword} ")->reply();
				// $ret = $weObj->news($items);
				error_log("###HICKDEBUG: " . var_export($ret, 1));
			}
			
			exit;
			break;
	case Wechat::MSGTYPE_EVENT:
			break;
	case Wechat::MSGTYPE_IMAGE:
			break;
	default:
			$weObj->text("输入 help 或者 h 可以查看帮助信息")->reply();
}
