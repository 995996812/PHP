<?php
return array(

	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE' => true, //显示页面信息,可以进行调试
	//连接数据库,做如下配置即可连接
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'db1',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tab_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

    'URL_MODEL' => 2, // URL模式
    'URL_CASE_INSENSITIVE' => true, // 默认false 表示URL区分大小写 true则表示不区分大小写
    'MODULE_ALLOW_LIST' => array('Home','Admin'),
    'DEFAULT_MODEL' => 'Home',
    
    'URL_ROUTER_ON'         =>  true,   // 是否开启URL路由
    'URL_ROUTE_RULES'       =>  array(
        'show' => 'index.php/Admin/goods/showlist',
    ), // 默认路由规则 针对模块

);