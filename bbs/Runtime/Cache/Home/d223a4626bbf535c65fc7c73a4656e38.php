<?php if (!defined('THINK_PATH')) exit(); $start_time=round(_runtime(),4)?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>bbs注册</title>
	<link rel="stylesheet" href="/thinkphp/Public/Css/basic.css">
	<script src="/thinkphp/Public/Js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="/thinkphp/Public/Css/reg.css">
	<script src="/thinkphp/Public/Js/reg.js" type="text/javascript" charset="utf-8"></script>
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

<div id='reg'>
	<h2>会员注册</h2>
	<form  method="post" name="reg" action="/thinkphp/index.php/Home/Register/sql" >
	<input type="hidden" name="uniqid" value="<?php echo ($_SESSION['uniqid']); ?>">
	<h3>请填写已下内容</h3>
	<ul>
	<li><p>用户名：</p><input type="text" name="username" class="text"/><span class='state1'>*</span></li>
	<li><p>密码：</p><input type="password" name="pass" class="text"/><span class='state1'>*</span></li>
	<li><p>确认密码：</p><input type="password" name="repass"  class="text"/><span class='state1'>*</span></li>
	<li><p>电子邮箱：</p><input type="text" name="email" class="text"/><span class='state1'>*</span></li>
	<li><p>性别：</p><input type="radio" name="sex" value="男" checked="checked" class="sex" />男
					 <input type="radio" name="sex" value="女" class="sex" />女
	</li>
	<img src="/thinkphp/Public/Images/face/m3.jpg" alt="头像选择" id="img">
	<li><input type="hidden" name="face" value="/thinkphp/Public/Images/face/m3.jpg"></li>
	<li><p>验证码：</p><input type="text" name="check" class="check"/>
		<img src="/thinkphp/index.php/Home/Base/code" id="code" /><span class="state1"></span></li>
	<li><input type="button" name="sub" value="注册" class="sub"></li>
	<div id="show">
	<?php  $dir="/thinkphp/index.php/Home/Register/register"; $mood='tg_picture'; _page(12,$dir,$mood); ?>	
	</div>
	</form>
</div>

<div id="footer">
		<p>程序执行时间：<?php echo $end_time=round(_runtime(),4)?></p>
		<p>版权所有 翻版必究</p>
		<p>本程序由<span>星辰</span>提供，源代码可更改。联系方式：552090340@qq.com</p>
	</div>	
</body>
</html>