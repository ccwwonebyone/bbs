<?php 
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller{
	public function code()				//生成验证码
	{
		_code();

	}
	public function checkcode()			//验证验证码
	{
		$string=$_POST['check'];
	 	$res=_check($string,$_SESSION['code']);
	 	if($res=='f'){
	 		echo "验证码错误";
	 	}else{
	 		echo '2';
	 	}
	}
	
}