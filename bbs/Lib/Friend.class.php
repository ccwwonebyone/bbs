<?php 
namespace Lib
use Think\Controller;
use Think\Model;

class Friend extends Controller{
	Protected function getfriend()
	{
		$add=M('infor');        
        $res=$add->field('infor_fri')->where("infor_uid='{$_SESSION['uid']}'")->find();    //获取已有好友列表
        $friend=$res['infor_fri'];
        return explode(',', $friend);
	}

	Protected function exist_getfriend($uid)
	{
		$friends=self::getfriend();
		if(in_array($uid, $friend)){
			return true;
		}else{
			return flase;
		}
	}

	public function addfriend()
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
	                return 't';
	            }else{
	                return 'f';
	            }
	        }else{
	            $this->error('非法操作');
	        }
	    }

	public function del( )
	{
		$id=$_SESSION['uid'];
		$friends=self::getfriend();
		if(self::exist_getfriend($uid)){

		}
	}

}
?>