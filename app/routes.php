<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
////////////
// 前端测试路由 //
// ////////////
// Route::get('/',function(){
// 	return View::make('userCenter.zone');
// });
// // Route::get('/','UserPageController@login');



////////////
// 后端测试路由 //
////////////
Route::get('/','HomeController@showWelcome');

Route::group(array('prefix'=>'user'),function()
{
	Route::post('register', 'UserController@postRegister');
	Route::post('check_code', 'UserController@postCheckCode');
	//注册成功
	//Route::get('to_login', 'UserController@getToLogin');
	Route::get('login', 'UserPageController@login');
	Route::post('login', 'UserController@postLogin');
	Route::get('captcha','UserController@captcha');
	Route::post('check_captcha','UserController@checkCaptcha');
	//
	Route::post('resend_checkcode','UserController@resendCheckCode' );
	//点击忘记密码获取重置页
	Route::get('get_remind','UserPageController@getRemind');
	//往邮箱发送重置页
	Route::post('post_remind','UserController@postRemind');
	//获取输入密码页面
	Route::get('get_reset','UserPageController@getReset');
	//重置密码
	Route::post('post_reset', 'UserController@postReset');

	//空间首页
	Route::get('space_home', 'UserPageController@spaceHome');
	//话题动态
	Route::get('topic','UserPageController@topic');
	//相册和照片
	Route::get('album','UserPageController@album');
	Route::get('picture','UserPageController@picture');
	//获取留言
	Route::get('message', 'UserPageController@message');
	//获取留言回复
	Route::get('message_comment/{message_id}','UserPageController@messageComment');
	//获取个人资料
	Route::get('update', 'UserPageController@getUpdate');
	//报名静态页
	Route::get('auth','StaticPageController@auth');
	//分数查询静态页
	Route::get('inquiry','StaticPageController@inquiry');

	Route::group(array('before' => 'auth'), function()
	{
		Route::get('logout', 'UserController@getLogout');
		//在线报名
		Route::post('application', 'UserController@postApplication');
		//成绩成绩查询
		Route::post('score_inquiry', 'UserController@scoreInquiry');
		
		//个人中心
		Route::group(array('prefix'=>'personal'), function()
		{
			Route::get('is_own', 'UserController@isOwn');
			//发表话题
			Route::post('issue_topic', 'UserController@issueTopic');
			//发表留言
			Route::post('message', 'UserController@postMessage');
			Route::post('delete_message', 'UserController@deleteMessage');
			//发表回复
			Route::post('message_comment','UserController@postMessageComment');
			//发表话题评论
			Route::post('topic_comment','UserController@topicComment');
			//发表话题评论的回复
			Route::post('reply', 'UserController@reply');
			//更新个人资料
			Route::post('update', 'UserController@postUpdate');
			//更换头像
			Route::post('chang_image','UserController@changeImage');
			//新建相册
			Route::post('add_album','UserController@addAlbum');
			//删除相册
			Route::post('delete_album', 'UserController@deleteAlbum');
			//上传图片
			Route::post('upload_image', 'UserController@uploadImage');
			//删除照片
			Route::post('delete_image','UserController@deleteImage');
		});
		
	});
});

Route::group(array('prefix'=>'customer'), function()
{		
	//首页协会资讯更多
	Route::group(array('prefix'=>'news'),function()
	{	
		//资讯更多路由
		Route::get('/','ColumnPageController@getColumnInfo');
		//话题论谈
		Route::get('one_topic', 'ColumnPageController@getOneTopic');
		//更多话题评论
		Route::get('topic_comment','ColumnPageController@getTopicCommentMore');
		//启蒙专栏
		Route::get('column','ColumnPageController@getColumnInfo');
		Route::get('column_more','ColumnPageController@getColumnInfoMore');
		//学会动态
		Route::get('society', 'ColumnPageController@getSocietyInfo');
		Route::get('society_more', 'ColumnPageController@getSocietyInfoMore');
		//协会动态
		Route::get('association', 'ColumnPageController@getAssociationInfo');
		Route::get('association_more', 'ColumnPageController@getAssociationInfoMore');
	});

	//教师认证
	Route::group(array('prefix'=>'authentication'),function()
	{
		Route::get('identity/{identity?}','AuthenticationPageController@getSortOfIdentity');
		//根据用户所在城市定义
		Route::get('city/{area?}', 'AuthenticationPageController@getSortOfCity');
		//首字母拼音分类
		Route::get('username/{letter?}','AuthenticationPageController@getSortOfUsername');
	});

	//协会表演
	Route::group(array('prefix' => 'performance'),function()
	{	
		//协会表演更多
		//戏剧百家
		Route::get('teacher','PerformancePageController@teacher');
		Route::get('teacher_more', 'PerformancePageController@teacherMore');
		//台前幕后
		Route::get('backstage', 'PerformancePageController@backStage');
		Route::get('backstage_more', 'PerformancePageController@backStageMore');
		//经典欣赏
		Route::get('appreciation','PerformancePageController@appreciation');
		Route::post('appreciation_more','PerformancePageController@appreciationMore');
	});

	//招贤纳士
	Route::get('employment', 'EmployPageController@employment');
	Route::get('employment_more','EmployPageController@employmentMore');
});

Route::group(array('prefix' => 'qiniu'),function()
{
	Route::group(array('before' => 'auth'), function()
	{
		Route::get('getUpToken','UploadController@getUpToken');
	});
});

//后台管理员路由
Route::controller('/login', 'AdminController');

