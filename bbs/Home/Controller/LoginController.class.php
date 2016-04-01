<?php
namespace Home\Controller;
use Think\Controller;
use Think\model;

class LoginController extends Controller{
	public function index()
	{
		$this->display('login');
	}
	public function checklogin()
	{
		if(IS_POST){
			_init();
			$check=M('guest');
			$_SESSION['name']=$username=$_POST['username'];
			$password=sha1($_POST['password']);
			$active=$check->where("tg_username='$username'")->getField('tg_active');
			if(empty($active))
			{
				$count=$check->where("tg_username='$username' AND tg_password='$password'")->count();
				if($count>0){ 
					echo '1';
				}else{
					echo '帐号密码错误';
				}
			}else{
				echo '3';
			}
		}else{
			$this->error('非法请求');
		}
	}
	public function active()	//输出激活验证
	{
		$active=M('guest');
		$_SESSION['tg_active']=$active->where("tg_username='{$_SESSION['name']}'")->getField('tg_active');
		echo '<div style="width: 100%;text-align: center;">';
		echo "<a href='".__MODULE__."/Register/active' >{$_SESSION['tg_active']}</a>";
		echo '</div>';
	}
	
}