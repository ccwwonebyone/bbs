<?php
return array(
	//'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息
	// 开启路由
	'URL_ROUTER_ON'   => true, 
	//URL模式，去掉index.php
    //'URL_MODEL'=>2,
	//数据库连接
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_USER'=>'root',
	'DB_PWD'=>'123456',
	'DB_NAME'=>'bbs',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'tg_',
	'DB_CHARSET'=> 'UTF8', 

	'AUTOLOAD_NAMESPACE' => array( 			//建立应用核心函数目录Lib
	   'Lib' => APP_PATH.'Lib',
	   )
);