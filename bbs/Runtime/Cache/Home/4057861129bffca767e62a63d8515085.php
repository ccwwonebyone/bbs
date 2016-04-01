<?php if (!defined('THINK_PATH')) exit(); $start_time=round(_runtime(),4)?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>首页</title>
	<link rel="stylesheet" href="/thinkphp/Public/Css/basic.css">
	<script src="/thinkphp/Public/Js/jquery.js" type="text/javascript" charset="utf-8"></script>
	引入css
	引入js
</head>
<body>
<div id="header">
		<div class="logo">
			<span>我的论坛</span>
		</div>
		<div class="link">
			<ul>
				<li><a href="/thinkphp/index.php/Home/Index/index">首页</a></li>
				<li><a href="/thinkphp/index.php/Home/Register/register">注册</a></li>
				<li><a href="/thinkphp/index.php/Home/Login/login">登录</a></li>
				<li><a href="###">个人中心</a></li>
				<li><a href="###">网络</a></li>
				<li><a href="###">管理</a></li>
				<li><a href="###">退出</a></li>
			</ul>
		</div>
	</div>

<div id="footer">
		<p>程序执行时间：<?php echo $end_time=round(_runtime(),4)?></p>
		<p>版权所有 翻版必究</p>
		<p>本程序由<span>星辰</span>提供，源代码可更改。联系方式：552090340@qq.com</p>
	</div>	
</body>
</html>