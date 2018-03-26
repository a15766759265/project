<?php
return array(
	//'配置项'=>'配置值'
	// 添加数据库配置信息
	'DB_TYPE'=>'mysql',// 数据库类型
	'DB_HOST'=>'localhost',// 服务器地址
	'DB_NAME'=>'greencms',// 数据库名
	'DB_USER'=>'root',// 用户名
	'DB_PWD'=>'root',// 密码
	'DB_PORT'=>3306,// 端口
	'DB_PREFIX'=>'green_',// 数据库表前缀
	'DB_CHARSET'=>'utf8',// 数据库字符集
	//'TMPL_TEMPLATE_SUFFIX'=>'.tpl',  //配置模板的后缀
	'TMPL_PARSE_STRING'  =>array(
     '__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
	),
	 'LANG_SWITCH_ON'     =>     true,    //开启语言包功能        
        'LANG_AUTO_DETECT'     =>     true, // 自动侦测语言
        'DEFAULT_LANG'         =>     'zh-cn', // 默认语言        
        'LANG_LIST'            =>    'en-us,zh-cn,zh-tw', //必须写可允许的语言列表
        'VAR_LANGUAGE'     => 'hl', // 默认语言切换变量

);