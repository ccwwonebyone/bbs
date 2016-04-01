<?php if (!defined('THINK_PATH')) exit(); $start_time=round(_runtime(),4)?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>个人中心</title>
	<link rel="stylesheet" href="/thinkphp/Public/Css/basic.css">
	<script src="/thinkphp/Public/Js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="/thinkphp/Public/Css/infor.css">
	<script src="/thinkphp/Public/Js/infor.js" type="text/javascript" charset="utf-8"></script>
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

<div id="infor">
	<div id="infor_list">
		<?php
 $db='pro'; $where='pro_id=6 AND pro_there=2'; $select='pro_name,pro_url'; _showli($db,$where,$select); ?>		
	</div>
	<div id="newpage">
	<iframe src="/thinkphp/index.php/Home/Infor/myinfor" scrolling="no" frameborder="0" height="100%"  width="100%" allowtransparency="true"  border="0" style="width:100%;padding: 0;"></iframe>
	</div>
</div>

<div id="footer">
		<p>程序执行时间：<?php echo $end_time=round(_runtime(),4)?></p>
		<p>版权所有 翻版必究</p>
		<p>本程序由<span>星辰</span>提供，源代码可更改。联系方式：552090340@qq.com</p>
	</div>	
</body>
</html>