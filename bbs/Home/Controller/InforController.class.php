<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;


class InforController extends Controller{
	public function index()							//监测是否登录 没有登录则返到登录界面
	{
		if($_COOKIE['username']){
			$this->display('infor');
		}else{
			header("location:".__MODULE__."/Index/index");;
		}
	}
	public function myinfor()
	{	
		$infor=M('guest');
		$res=$infor->field('tg_username,tg_face,tg_email')->where("tg_username='{$_SESSION['username']}'")->find();
		$this->assign('res',$res);
		$this->display();
	}
	public function mytz()
	{
		$this->display();
	}
	public function myfri()
	{
		$this->display();
	}
	public function del()
	{
		
	}
}
