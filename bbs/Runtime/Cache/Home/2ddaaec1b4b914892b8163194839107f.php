<?php if (!defined('THINK_PATH')) exit(); $start_time=round(_runtime(),4)?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>bbs登录</title>
	<link rel="stylesheet" href="/thinkphp/Public/Css/basic.css">
	<script src="/thinkphp/Public/Js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="/thinkphp/Public/Css/login.css">
	<script src="/thinkphp/Public/Js/login.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div id="header">
	<div class="logo">
		<span>我的论坛</span>
	</div>
	<div class="link">
		<?php _li() ?>
	</div>
</div>

	<div id='login'>
		<h2>会员登录</h2>
			<span id='info'></span>
			<form action="/thinkphp/index.php/Home/Index/index" method="post" name='login'/>
			<ul>
				<li><p>用户名：</p><input type="text" name="username" /></li>
				<li><p>密码：</p><input type="password" name="password" /></li>
				<li><p>验证码：</p><input type="text" name="check" class="check"/>
					<img src="/thinkphp/index.php/Home/Base/code" id="code" /><span class="state1"></span>
				<li><input type="button" class="but"value="登录"></li>
			</ul>
			</form>
	</div>

<div id="footer">
		<p>程序执行时间：<?php echo $end_time=round(_runtime(),4)?></p>
		<p>版权所有 翻版必究</p>
		<p>本程序由<span>星辰</span>提供，源代码可更改。联系方式：552090340@qq.com</p>
	</div>	
</body>
</html>