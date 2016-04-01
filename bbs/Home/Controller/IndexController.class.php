<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index()
    {	
    	if($_POST['username']){                         //监测是否是提交的数据，保存cookie
	    	$update=M('guest');
            $res=$update->field('tg_id')->where("tg_username='{$_SESSION['username']}'")->find();
            $_SESSION['uid']=$res['tg_id'];      //获取登录帐号的id
	    	$data['tg_last_time']=date('Y-m-d H:i:s');
			$data['tg_last_ip']=$_SERVER["REMOTE_ADDR"];
			$update->where("tg_username='{$_POST['username']}'")->save($data);
            $_SESSION['username']=$_POST['username'];
	    	cookie('username',$_POST['username'],3600);
	    	cookie('password',sha1($_POST['password']),3600);
    	}
        if($_COOKIE['username']){
            $_SESSION['username']=$_COOKIE['username'];
        }
    	$this->display();
    }
    public function indexback()                    //清除cookie实现退出
    {
    	cookie('username',null);
    	cookie('password',null);
    	header("location:".__MODULE__."/Index/index");
    }
    public function add()
    {          
        if(isset($_GET['fri'])){
            $add=M('infor');        
            $res=$add->field('infor_fri')->where("infor_uid='{$_SESSION['uid']}'")->find();    //获取已有好友列表
            $friend=$res['infor_fri'];
            $friends=explode(',', $friend);
            if(!in_array($_GET['fri'], $friends)){          //监测是否已经添加其为好友
                $friend .=$_GET['fri'].',';
                $data['infor_fri']=$friend;
                $add->where("infor_uid='$id'")->save($data);
                echo 't';
            }else{
                echo 'f';
            }
        }else{
            $this->error('非法操作');
        }
    }
}