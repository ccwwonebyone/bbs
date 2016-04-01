<?php 
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class UserController extends Controller{
	public function index()
	{
		$this->display();
	}
	public function model()
	{	
		/*$user=M('public');
		$string=file_get_contents("F:\phpstudy\WWW\pic.txt");
		$arr=explode(' ',$string);
		foreach ($arr as $key => $value) {
			$user->execute("update tg_public set tg_picture='$value' where id=$key+1 ");
		}
		unset($value);*/
		/*$page=$_GET['page']-1;
		$pagenum=12;
		$cou=$user->where('tg_id')->count();
		$arr=$user->field(array('tg_id','tg_picture'))->order('tg_id')->limit($page*$pagenum,$pagenum)->select();
		$count=count($arr);// 查询满足要求的总记录数
		$num=ceil($cou/$pagenum);
		for($j=0;$j<$count;$j++){
			echo "<img src='".$arr[$j]['tg_picture']."' alt='头像选择' class='chooseimg'>";
			}
		for ($i=1; $i <=$num ; $i++) { 
			echo "<a href=http://localhost/thinkphp/index.php/Home/User/model?page=".$i.">$i</a>";
		}*/
		
		$this->display('test');
	}
	public function checkname()
	{	
		_init();
		$user=M('guest');
		$username=$_POST['username'];
		$count=$user->where("tg_username='$username'")->count();
		if($count>0){
			echo "bad啊啊";
		}else{
			echo "good爱爱爱";
		}
		echo $username;
	}
	public function uniqid(){
		echo sha1(uniqid());
	}
	public function ni()
	{
		_init();
		echo '成功设置了编码';
	}
}
