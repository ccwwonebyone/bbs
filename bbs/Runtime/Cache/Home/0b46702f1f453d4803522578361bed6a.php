<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>个人信息</title>
	<link rel="stylesheet" href="/thinkphp/Public/Css/basic.css">
	<script src="/thinkphp/Public/Js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="/thinkphp/Public/Css/infor/myinfor.css">
	
</head>
<body style="margin: 0;">
	<h3>个人信息</h3>
	
<div id="myinfor">
	<ul>
		<li><span>用户名：<?php echo ($res['tg_username']); ?></span></li>
		<img src="<?php echo ($res[tg_face]); ?>"><a href=""></a>
		<li><span>邮箱：<?php echo ($res['tg_email']); ?></span></li>
	</ul>
</div>

</body>
</html>