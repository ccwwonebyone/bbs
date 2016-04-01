<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>个人信息</title>
	<link rel="stylesheet" href="/thinkphp/Public/Css/basic.css">
	<script src="/thinkphp/Public/Js/jquery.js" type="text/javascript" charset="utf-8"></script>
	
	<link rel="stylesheet" href="/thinkphp/Public/Css/infor/myinfor.css">
	<link rel="stylesheet" href="/thinkphp/Public/Css/infor/myfri.css">

	
	<script src="/thinkphp/Public/Js/infor/myfri.js" type="text/javascript" charset="utf-8" async defer></script>

</head>
<body style="margin: 0;">
	<h3>我的好友</h3>
	
	<div id="myfri">
	<h4>好友管理</h4>
	<?php _showfri(); ?>
	</div>

</body>
</html>