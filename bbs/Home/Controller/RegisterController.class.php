<?php 
namespace Home\Controller;
use Think\Controller;

class RegisterController extends Controller{
	public function register()
	{
		session_start();
		$_SESSION['uniqid']=sha1(uniqid(rand()));
		$this->assign("_SESSION['uniqid']",$_SESSION['uniqid']);
		$this->display('register');
		session_write_close();
	}
	public function checkse()
	{
		$string=$_POST['uniqid'];
	 	$res=_check($string,$_SESSION['uniqid']);
	 	if($res=='f'){
	 		echo '0';
	 	}else {
	 		echo '1';
	 	}
	}
	public function checkname()
	{	
		if(IS_POST){
			$user=M('guest');
			$username=$_POST['username'];
			$count=$user->where("tg_username='$username'")->count();
			if($count>0){
				echo "该用户名已被注册换一个吧！";
			}else{
				echo "恭喜可以注册啦！";
			}
		}else{
			$this->error('非法操作');
		}
	}
	public function sql()		//注册控制器并生成激活验证
	{
		if(IS_POST){
			$sql=M('guest');
			$pattern='/http:\/\/[\w.]*\//';
			$replace='/';
			$face=preg_replace($pattern, $replace, $_POST['face']);		
			$data['tg_uniqid']=$_POST['uniqid'];
			$_SESSION['tg_active']=$data['tg_active']=sha1(uniqid(rand()));
			$_SESSION['username']=$data['tg_username']=$_POST['username'];
			$data['tg_password']=sha1($_POST['pass']);
			$data['tg_sex']=$_POST['sex'];
			$data['tg_face']=$face;
			$data['tg_email']=$_POST['email'];
			$data['tg_reg_time']=date('Y-m-d H:i:s');
			$data['tg_last_time']=date('Y-m-d H:i:s');
			$data['tg_last_ip']=$_SERVER["REMOTE_ADDR"];
			$sql->add($data);			
		}else{
			$this->error('非法操作');
		}
	}
	public function _after_sql()
	{
		echo '<div style="width: 100%;text-align: center;">';
		echo "<a href='".__MODULE__."/Register/active' >{$_SESSION['tg_active']}</a>";
		echo '</div>';
	}	
	public function active()
	{
		$active=M('guest');
		$data['tg_active']='';
		$active->where("tg_active='$_SESSION[tg_active]'")->save($data);
		$res=$active->field('tg_id')->where("tg_username={$_SESSION['username']}")->find();
		$uid=$res['tg_id'];
		$add=M('infor');
		$data['infor_uid']=$uid;
		$add->add($data);
		header("location:".__MODULE__."/Index/index");
	}
}
