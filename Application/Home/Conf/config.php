<?php
return array(
	//'配置项'=>'配置值'
	'WEB_NAME' =>'codeeye',
	'RECAPTCHAR'=>'6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
	'REGISTER_EXIST_ERROR'=>' have exsited ! please find your password!',
	'REGISTER_INPUT_ERROR'=>' INPUT ERROR!',
	'REGISTER_SUCCESS'=>' Register se! email get check code to confirm ',
	'REGISTER_FAIL'=>' CONTACT KEFU',

	'COOKIE_LATE' => ' login session is dead!',

	'Login_INFO' => 'Please login again!',
	'LOGIN_ERROR' => 'LOGIN FAILE!',
	'LOGIN_SUCCESS' => 'Login successfully!',

	'VERIYCODE_INPUT_ERROR' => 'VERIYCODE ERROR',
	'CARD_INPUT_ERROR' => 'CARD IS NOT EXIST!',
	'CARD_USED_ERROR' => 'CARD IS USED !',

	'FINDPWD_FAIL' => 'Find pwd fail! Email is not existed !',
	//邮箱配置
	'MAIL_HOST' =>'smtp.126.com',
	'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
	'MAIL_USERNAME' =>'xxxxx@126.com',
	'MAIL_FROM' =>'xxxxx@126.com',
	'MAIL_FROMNAME' =>'酷影HD',
	'MAIL_PASSWORD' =>'123456',
	'MAIL_CHARSET' =>'utf-8',
	'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件

	// thinksdk
	'LOAD_EXT_CONFIG'       => 'oauth', // 加载第三方登陆密钥及回调地址
	//*************************************第三方登录****************************************
	'QQ_APP_ID'             =>  '',     // QQ登录APP ID
	'QQ_APP_KEY'            =>  '',     // QQ登录APP KEY
	'WEIXIN_APP_ID'         =>  '',     // 微信登录APP ID
	'WEIXIN_SECRET'         =>  '',     // 微信登录SECRET
	'SINA_API_KEY'          =>  '',     // 新浪登录API KEY
	'SINA_SECRET'           =>  '',     // 新浪登录SECRET
	'DOUBAN_API_KEY'        =>  '',     // 豆瓣登录API KEY
	'DOUBAN_SECRET'         =>  '',     // 豆瓣登录SECRET
	'RENREN_API_KEY'        =>  '',     // 人人登录API KEY
	'RENREN_SECRET'         =>  '',     // 人人登录SECRET
	'KAIXIN_API_KEY'        =>  '',     // 开心网登录API KEY
	'KAIXIN_SECRET'         =>  '',     // 开心网登录SECRET
	'GITHUB_CLIENT_ID'      =>  '',     // github登录API KEY
	'GITHUB_CLIENT_SECRET'  =>  '',     // github登录SECRET
	'SOHU_API_KEY'          =>  '',     // 搜狐网登录API KEY
	'SOHU_SECRET'           =>  '',     // 搜狐网登录SECRT
	//***********************************其他第三方接口****************************************
);