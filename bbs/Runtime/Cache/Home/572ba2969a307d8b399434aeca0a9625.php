<?php if (!defined('THINK_PATH')) exit(); $start_time=round(_runtime(),4)?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>bbs首页</title>
	<link rel="stylesheet" href="/thinkphp/Public/Css/basic.css">
	<script src="/thinkphp/Public/Js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="/thinkphp/Public/Css/index.css">
	
</head>
<body>
<div id="header">
	<div class="logo">
		<span>我的论坛</span>
	</div>
	<div class="link">
		<ul>
			<?php _li() ?>
		</ul>
	</div>
</div>
	
	<div id="list">
		<div class="list_list">
			<h2>帖子列表</h2>
		</div>
	</div>
	<div id="user">
		<div class="user_list">
			<h2>新进会员</h2>
		</div>
	</div>
	<div id="pics">
		<div class="pics_list">
			<h2>图片展示</h2>
		</div>
	</div>

<div id="footer">
		<p>程序执行时间：<?php echo $end_time=round(_runtime(),4)?></p>
		<p>版权所有 翻版必究</p>
		<p>本程序由<span>星辰</span>提供，源代码可更改。联系方式：552090340@qq.com</p>
	</div>	
</body>
</html>