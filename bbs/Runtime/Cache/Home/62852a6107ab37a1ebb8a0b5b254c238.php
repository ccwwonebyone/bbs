<?php if (!defined('THINK_PATH')) exit();?><div style="width: 100%;text-align: center;">
	<span color="red">帐号激活后方可登录</span>
	<span>点击激活账户：</span><a href="/thinkphp/index.php/Home/Register/active"><?php echo ($_SESSION['tg_active']); ?></a>
</div>