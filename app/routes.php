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

Route::get('/','HomeController@showWelcome');

Route::group(array('prefix'=>'user'),function()
{
	Route::post('register', 'UserController@postRegister');
	Route::post('check_code', 'UserController@postCheckCode');
	//注册成功
	//Route::get('to_login', 'UserController@getToLogin');
	Route::get('login', 'UserController@login');
	Route::post('login', 'UserController@postLogin');
	Route::get('captcha','UserController@captcha');
	Route::post('check_captcha','UserController@checkCaptcha');
	Route::get('getremind','UserController@getRemind');
	Route::post('post_remind','UserController@postRemind');
	Route::get('get_reset','UserController@getReset');
	Route::post('post_reset', 'UserController@postReset');

	//空间首页
	Route::get('space_home/{user_id}', 'UserController@spaceHome');
	//话题动态
	Route::get('topic/{user_id}','UserController@topic');
	//相册和照片
	Route::get('album/{user_id}','UserController@album');
	Route::get('picture/{album_id}','UserController@picture');
	//获取留言
	Route::get('message/{user_id}', 'UserController@message');
	//获取留言回复
	Route::get('message_comment/{message_id}','UserController@messageComment');
	//获取个人资料
	Route::get('update/{user_id}', 'UserController@getUpdate');

	Route::group(array('before' => 'auth.user.isIn'), function()
	{
		Route::get('logout', 'UserController@getLogout');
		//在线报名
		Route::post('application', 'UserController@postApplication');
		//成绩成绩查询
		Route::post('score_inquiry', 'UserController@scoreInquiry');
		//个人中心
		Route::group(array('prefix'=>'personal'), function()
		{
			//发表留言
			Route::post('message', 'UserController@postMessage');
			//发表回复
			Route::post('message_comment','UserController@postMessageComment');
			//更新个人资料
			Route::post('update', 'UserController@postUpdate');
			//更换头像
			Route::post('chang_image','UserController@changeImage');
				
		});
		
	});
});

Route::group(array('prefix'=>'customer'), function()
{		
	//首页协会资讯更多
	Route::group(array('prefix'=>'news'),function()
	{	
		//资讯更多路由
		Route::get('/','ColumnController@getColumnInfo');
		//话题论谈
		Route::get('one_topic', 'ColumnController@getOneTopic');
		//更多话题评论
		Route::get('topic_comment','ColumnController@getTopicCommentMore');
		//启蒙专栏
		Route::get('column','ColumnController@getColumnInfo');
		Route::get('column_more','ColumnController@getColumnInfoMore');
		//学会动态
		Route::get('society', 'ColumnController@getSocietyInfo');
		Route::get('society_more', 'ColumnController@getSocietyInfoMore');
		//协会动态
		Route::get('association', 'ColumnController@getAssociationInfo');
		Route::get('association_more', 'ColumnController@getAssociationInfoMore');
	});

	//教师认证
	Route::group(array('prefix'=>'authentication'),function()
	{
		Route::get('/','AuthenticationController@getSortOfIdentity');
		//路由参数，定义用户的身份
		Route::get('identity/{identity}','AuthenticationController@getSortOfIdentity');
		//根据用户所在城市定义
		Route::get('city/{area}', 'AuthenticationController@getSortOfCity');
		//首字母拼音分类
		Route::get('username/{letter}','AuthenticationController@getSortOfUsername');
	});

	//协会表演
	Route::group(array('prefix' => 'performance'),function()
	{	
		//协会表演更多
		Route::get('/','PerformanceController@teacher');
		//戏剧百家
		Route::get('teacher','PerformanceController@teacher');
		Route::get('teachermore', 'PerformanceController@teacherMore');
		//台前幕后
		Route::get('backstage', 'PerformanceController@backStage');
		Route::get('backstageMore', 'PerformanceController@backStageMore');
		//经典欣赏
		Route::get('appreciation','PerformanceController@appreciation');
		Route::get('appreciationMore','PerformanceController@appreciationMore');
	});

	//招贤纳士
	Route::get('recruitment', 'RecruitController@getRecruitment');
});


Route::get('test/{id}', 'UserController@spaceHome');
Route::post('test', 'TestController@postTest');

