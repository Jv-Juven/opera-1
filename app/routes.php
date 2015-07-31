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
//纯页面跳转

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
	Route::get('getremind','UserPageController@getRemind');
	Route::post('post_remind','UserController@postRemind');
	Route::get('get_reset','UserPageController@getReset');
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
			//发表话题评论
			Route::post('topic_comment','UserController@topicComment');
			//发表话题评论的回复
			Route::post('comment_topiccomment', 'UserController@commentOfTopicComment');
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
		Route::get('appreciation_more','PerformancePageController@appreciationMore');
	});

	//招贤纳士
	Route::get('employment', 'EmployPageController@employment');
	Route::get('employment_more','EmployPageController@employmentMore');
});

//后台管理员路由
Route::controller('/login', 'AdminController');

//管理员路由
// Route::group(array('prefix' => 'admin','before' => 'auth.user.isAdmin'),function(){
// 	//后台首页
// 	Route::group(array('prefix'=>'home'),function(){
// 		Route::get('/','AdminPageController@poster');
// 		Route::get('poster','AdminPageController@poster');
// 		Route::post('add_poster','AdminHomeController@addPoster');
// 		Route::post('edit_poster','AdminHomeController@editPoster');
// 		Route::post('delete_poster', 'AdminHomeController@deletePoster');
// 		Route::get('contact_us', 'AdminPageController@contactUs');
// 		Route::post('contact_us', 'AdminHomeController@contactUs');
// 		Route::get('link', 'AdminPageController@link');
// 		Route::post('add_link', 'AdminHomeController@addLink');
// 		Route::post('edit_link', 'AdminHomeController@editLink');
// 		Route::post('delete_link','AdminHomeController@deleteLink');
// 	});

// 	//后台谈论模块news
// 	Route::group(array('prefix'=>'topic'),function(){
// 		//启蒙专栏
// 		Route::get('column', 'AdminPageController@column');
// 		Route::post('add_column', 'AdminTopicController@addColumn');
// 		Route::post('edit_column', 'AdminTopicController@editColumn');
// 		Route::post('delete_column', 'AdminTopicController@deleteColumn');
// 		//学会动态
// 		Route::get('society', 'AdminPageController@society');
// 		Route::post('add_society', 'AdminTopicController@addSociety');
// 		Route::post('edit_society', 'AdminTopicController@editSociety');
// 		Route::post('delete_society', 'AdminTopicController@deleteSociety');
// 		//协会动态
// 		Route::get('association', 'AdminPageController@association');
// 		Route::post('add_association', 'AdminTopicController@addAssociation');
// 		Route::post('edit_association', 'AdminTopicController@editAssociation');
// 		Route::post('delete_association', 'AdminTopicController@deleteAssociation');
// 	});

// 	//招贤纳士
// 	Route::group(array('prefix'=>'employ'),function(){
// 		Route::get('/','AdminPageController@employment');
// 		Route::post('add_employment', 'AdminEmployController@addEmployment');
// 		Route::post('edit_employment', 'AdminEmployController@editEmployment');
// 		Route::post('delete_employment', 'AdminEmployController@deleteEmployment');
// 	});

// 	//协会表演performance
// 	Route::group(array('prefix'=>'show'), function(){
// 		//戏剧百家
// 		Route::get('teacher', 'AdminPageController@teacher');
// 		Route::post('add_teacher', 'AdminShowController@addTeacher');
// 		Route::post('edit_teacher', 'AdminShowController@editTeacher');
// 		Route::post('delete_teacher', 'AdminShowController@deleteTeacher');
// 		//台前幕后
// 		Route::get('backstage', 'AdminPageController@backstage');
// 		Route::post('add_backstage', 'AdminShowController@addBackstage');
// 		Route::post('edit_backstage', 'AdminShowController@editBackstage');
// 		Route::post('delete_backstage', 'AdminShowController@deleteBackstage');
// 		//经典欣赏
// 		Route::get('appreciation', 'AdminPageController@appreciation');
// 		Route::post('add_appreciation', 'AdminShowController@addAppreciation');
// 		Route::post('edit_appreciation', 'AdminShowController@editAppreciation');
// 		Route::post('delete_appreciation', 'AdminShowController@deleteAppreciation');
// 	});
	
// 	//成绩查询
// 	Route::group(array('prefix'=>'score'), function(){
// 		Route::get('/', 'AdminPageController@score');
// 		Route::post('score', 'AdminScoreController@score');
// 		Route::post('delete_score', 'AdminScoreController@deleteScore');
// 	});	

// 	Route::group(array('prefix'=>'authentication'), function(){
// 		Route::get('/', 'AdminPageController@authentication');
// 		Route::post('add_authentication', 'AdminAuthenticationController@addAuthentication');
// 		Route::post('edit_authentication', 'AdminAuthenticationController@editAuthentication');
// 		Route::post('delete_authentication', 'AdminAuthenticationController@deleteAuthentication');
// 	});
// });



// Route::get('test', 'TestController@test');
// Route::post('test', 'TestController@postTest');
