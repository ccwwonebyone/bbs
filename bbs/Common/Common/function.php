<?php 
//设置php文件编码
	function _init()
	{
	header('Content-type:text/html;charset=utf-8');
	}
//@access public 表示函数对外公开

function _runtime()
{
	$_mtime=explode(' ',microtime());	//microtime()获取时间戳	explode分隔
	return $_mtime[0];
}
//连接数据库
//可更改数据表
function _mysql_link($_DB_NAME='tg_guest'){
	@$_link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,$_DB_NAME);
	mysqli_query($_link,"SET NAMES UTF8");
}
//验证码函数
function _code($_width=75,$_height=25,$_range=4){
	session_start();
	//创建随机码
	for($i=1;$i<=$_range;$i++){
			@$_num .=dechex(mt_rand(0,15));
		}
	//保存在session中
	$_SESSION['code']=$_num;

	
	//创建一张图像
	$_img=imagecreatetruecolor($_width,$_height);

	//白色
	$_white=imagecolorallocate($_img,255,255,255);

	//填充
	imagefill($_img, 0, 0, $_white);


	$_block=imagecolorallocate($_img, 0, 0, 0);	

	//创建边框画一个矩形
	imagerectangle($_img, 0, 0, $_width-1, $_height-1,$_block );

	//随机画出6个线条
	for ($i=0; $i < 6; $i++) { 
		$_rnd_color=imagecolorallocate($_img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
		imageline($_img, mt_rand(0,$_width), mt_rand(0,$_height), mt_rand(0,$_width), mt_rand(0,$_height), $_rnd_color);
	}

	//随机雪花
	for ($i=0; $i < 100; $i++) { 
		$_rnd_color=imagecolorallocate($_img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
		imagestring($_img, 1, mt_rand(1,$_width),mt_rand(1,$_height),'*', $_rnd_color);
	}

	//输出验证码
	for ($i=0; $i <strlen($_SESSION['code']) ; $i++) {
		$_rnd_color=imagecolorallocate($_img, mt_rand(0,100), mt_rand(0,150), mt_rand(0,200));
		imagestring($_img, 5, $i*$_width/$_range+mt_rand(0,10),mt_rand(1,$_height/2),$_SESSION['code'][$i], $_rnd_color);
	}

	//输出图像
	header('Content-Type:image/png');
	imagepng($_img);
	//销毁
	imagedestroy($_img);
}

//验证函数
function _check($string,$check)
{
	if($string==$check)
	{
		return $res='t';
	}else{
		return $res='f';
	}
}
//返回目标文件夹中的文件数量
function _read($dir){
	$handle=opendir($dir);
	$i=0;
	while (false!==($file=readdir($handle))){
		if($file!=='.'&&$file!=='..'){
			$i++;
		}
	}
	closedir($handle);
	return $i;
}

/**
*分页函数
*传入页码，及控制器，
*统计内容
*$pagenum   每页的数量
*$dir  		页面url
*$mood 		需要分页的内容
**/
function _page($pagenum,$dir,$mood){
	$user=M('public');
	if(!isset($_GET['page'])){
		$_GET['page']=1;
	}
	$page=$_GET['page']-1;
	$cou=$user->where('tg_id')->count();
	$arr=$user->field(array('tg_id',$mood))->order('tg_id')->limit($page*$pagenum,$pagenum)->select();
	$count=count($arr);// 查询满足要求的总记录数
	$num=ceil($cou/$pagenum);
	for($j=0;$j<$count;$j++){
		echo "<img src='".$arr[$j][$mood]."' alt='头像选择' class='chooseimg'>";
		}
		echo "<ul>";
	for ($i=1; $i <=$num ; $i++) {
		if($_GET['page']==$i){
			echo "<li><a href='".$dir."?page=".$i."'  class='selected'>$i</a></li>";
		} else{
		echo "<li><a href='".$dir."?page=".$i."'>$i</a></li>";
		}
	}
	echo '</ul>';
}
/**
*菜单输入
*根据cookies
*
*
*
**/
function _li(){
	$li=M('pro');
	if(!$_COOKIE['username']){
		$res=$li->where('pro_id=1 OR pro_id=2')->order('pro_ord desc')->getField('pro_name,pro_url',true);
		}else{
			$res=$li->where('pro_id=1 OR pro_id=3')->order('pro_ord desc')->getField('pro_name,pro_url',true);
			}
	echo '<ul>';
	foreach ($res as $key => $value) {
		echo '<li><a href="'.$value.'">'.$key.'</a></li>';
	}
	echo '</ul>';
}
/**
*生成菜单超链接
*$db->数据表,$where->筛选条件,$select->选择内容
*html界面最好由ul包裹
**/
function _showli($dbname,$where,$select){
	$showli=M($dbname);
	$res=$showli->where($where)->order('pro_ord')->getField($select,true);
	echo '<ul>';
	foreach ($res as $key => $value) {
		echo '<li><a href="'.$value.'" class="chooseli">'.$key.'</a></li>';
		}
	echo '</ul>';
}

/**
*会员列表展示区
*
**/
function _showre(){
	$showre=M('guest');
	$res=$showre->field('tg_id,tg_username')->order('tg_reg_time desc')->limit(10)->select();  
    $id=$_SESSION['uid'];     //获取登录帐号的id
    $show=M('infor'); 
	echo '<ul>';
	foreach ($res as $value) {
			echo "<li><span>".$value['tg_username']."</span><span style='display:none'>".$value['tg_id']."</span>";
			if($_COOKIE['username']){				       
            	$res=$show->field('infor_fri')->where("infor_uid='$id'")->find();    //获取已有好友列表
            	$friend=$res['infor_fri'];
            	$friends=explode(',', $friend);
           		if(!in_array($value['tg_id'], $friends)){   
					echo "<img src='/thinkphp/public/images/jh.png' class='showre'>";
				}
			}
			echo "</li>";
	}
	echo '</ul>';
}
/**
*好友展示区
*
**/
function _showfri()
{
	$id=$_SESSION['uid'];
	$show=M('infor');        
    $res=$show->field('infor_fri')->where("infor_uid='$id'")->find();    //获取已有好友列表
    $friend=$res['infor_fri'];
    $friends=explode(',', $friend);
    $showre=M('guest');
    foreach ($friends as $value) {
    	$res=$showre->field('tg_username')->where("tg_id='$value'")->find();
    	$fri=$res['tg_username'];
    	if($fri){
    		echo '<li>';
			echo	"<span>$fri</span>";
			echo	"<a href=''>悄悄话</a>";
			echo	"<a href=''>送花</a>";
			echo	"<a href='/thinkphp/index/Home/Infor/del' >删除</a>";
			echo '</li>';
    	}
    	
    }
}

?>