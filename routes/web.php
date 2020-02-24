<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'HomeController@index')->name('home');

// Route::view('/home', 'home')->middleware('auth');

Route::view('/welcome', 'welcome');

Auth::routes();
/////////////////////////POST PAGE ROUTE CONTROLLER//////////////////
Route::get('/','PostController@post');
Route::post('/post','PostController@store');
Route::post('/post','PostController@create');
/////////////////////////USER DEFAULT PAGE ROUTE CONTROLLER//////////////////
Route::get('/news','NewsController@news');
/////////////////////////USER MEDIA PAGE ROUTE CONTROLLER//////////////////
Route::get('media', 'MediaController@index');
Route::get('embed', 'MediaController@embed');
Route::get('gallery', 'MediaController@gallery');
Route::get('video', 'MediaController@video');
Route::get('vr360', 'MediaController@vr360');
Route::get('audio', 'MediaController@audio');
Route::get('/media/{content}', 'MediaController@content');
/////////////////////////PERSONALISE PAGE ROUTE CONTROLLER//////////////////
Route::get('/personalise', 'SectionController@index');
Route::get('/personalise/{user}', 'SectionController@edit');
Route::patch('/personalise/{user}', 'SectionController@update');

/////////////////////////CHAT PAGE ROUTE CONTROLLER//////////////////
Route::get('chatroom','ChatController@chat');

/////////////////////////WALL PAGES ROUTE CONTROLLER//////////////////
Route::get('/wall/timeline','WallController@timeline');
Route::post('/wall/timeline','WallController@store');
Route::post('/wall/timeline','WallController@create');
Route::get('/wall/about','WallController@about');
Route::get('/wall/multimedia','WallController@multimedia');
Route::get('/wall/stories','WallController@stories');
Route::get('/wall/activity','WallController@activity');
Route::match(['get', 'post'], '/wall/{user}', 'WallController@upload_cover');
Route::match(['get', 'post'], '/wall/upload/{user}', 'WallController@upload_profile');
Route::delete('/wall/upload/{user}', 'WallController@deleteImageProfile');
Route::patch('/wall/{user}', 'WallController@update');
Route::patch('/wall/upload/{user}', 'WallController@update');
Route::delete('/wall/delete/{user}', 'WallController@delete');
/////////////////////////USER PAGES ROUTE CONTROLLER//////////////////
Route::get('/user','UserController@index');
Route::get('/user/about','UserController@about');
Route::get('/user/timeline','UserController@timeline');
Route::get('/user/multimedia','UserController@multimedia');
Route::get('/user/stories','UserController@stories');
Route::get('/user/activity','UserController@activity');
/////////////////////////USER PAGES ROUTE CONTROLLER//////////////////
Route::get('/extrovert','ExtrovertController@index');
Route::get('/enthusiast','EnthusiastController@index');
Route::get('/backpacker','BackpackerController@index');
Route::get('/gearhead','GearheadController@index');
/////////////////////////USER PAGES ROUTE CONTROLLER//////////////////
Route::get('/extrovert/{id}','ExtrovertController@news');
Route::get('/enthusiast/{id}','EnthusiastController@news');
Route::get('/backpacker/{id}','BackpackerController@news');
Route::get('/gearhead/{id}','GearheadController@news');
/////////////////////////COMMUNITY SECTION ROUTE CONTROLLER//////////////////
Route::get('/settings/profile','SettingsController@profile');
Route::get('/settings/upload','SettingsController@upload');
Route::get('/settings/page','SettingsController@page');
Route::get('/settings/security','SettingsController@security');
Route::get('/settings/policy','SettingsController@policy');
Route::get('/settings/ai','SettingsController@ai');
Route::get('/settings/notices-messages','SettingsController@notices');
Route::get('/settings/messages','SettingsController@message');
Route::get('/settings/requests','SettingsController@request');
Route::get('/settings/sitemap','SettingsController@sitemap');
Route::get('/settings/feedback','SettingsController@feedback');
Route::get('/settings/help','SettingsController@help');

//////////////////////////////////////////////////////////////////////
/////////////////////////                     ////////////////////////
/////////////////////////                     ////////////////////////
/////////////////////////                     ////////////////////////
/////////////////////////                     ////////////////////////
//////////////////////////////////////////////////////////////////////

/////////////////////////USER PAGES ROUTE CONTROLLER//////////////////
Route::get('/login/master', 'Auth\LoginController@showMasterLoginForm');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/editor', 'Auth\LoginController@showEditorLoginForm');
Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
Route::get('/login/moderator', 'Auth\LoginController@showModeratorLoginForm');
Route::get('/login/adops', 'Auth\LoginController@showAdOpsLoginForm');

Route::get('/register/master', 'Auth\RegisterController@showMasterRegisterForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/editor', 'Auth\RegisterController@showEditorRegisterForm');
Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');
Route::get('/register/moderator', 'Auth\RegisterController@showModeratorRegisterForm');
Route::get('/register/adops', 'Auth\RegisterController@showAdOpsRegisterForm');

Route::post('/login/master', 'Auth\LoginController@masterLogin');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/editor', 'Auth\LoginController@editorLogin');
Route::post('/login/writer', 'Auth\LoginController@writerLogin');
Route::post('/login/moderator', 'Auth\LoginController@moderatorLogin');
Route::post('/login/adops', 'Auth\LoginController@adopsLogin');

Route::post('/register/master', 'Auth\RegisterController@createMaster');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/editor', 'Auth\RegisterController@createEditor');
Route::post('/register/writer', 'Auth\RegisterController@createWriter');
Route::post('/register/moderator', 'Auth\RegisterController@createModerator');
Route::post('/register/adops', 'Auth\RegisterController@createAdOps');

Route::get('/logout/master', 'Auth\LoginController@masterLogout');
Route::get('/logout/admin', 'Auth\LoginController@adminLogout');
Route::get('/logout/editor', 'Auth\LoginController@editorLogout');
Route::get('/logout/writer', 'Auth\LoginController@writerLogout');
Route::get('/logout/moderator', 'Auth\LoginController@moderatorLogout');
Route::get('/logout/adops', 'Auth\LoginController@adopsLogout');

/*
  |--------------------------------------------------------------------------
  | Admin Route
  |--------------------------------------------------------------------------
*/
/*|------------------------------ MODERATOR ---------------------------------|*/
Route::get('/admin/moderators/', 'AdminController@moderator');
Route::get('/admin/moderators/{id}','AdminController@moderator_profile');
/*|-------------------------------- EDITOR ----------------------------------|*/
Route::get('/admin/editors/', 'AdminController@editor');
Route::get('/admin/editors/{id}','AdminController@editor_profile');
/*|-------------------------------- WRITER ----------------------------------|*/
Route::get('/admin/writers/', 'AdminController@writer');
Route::get('/admin/writers/{id}','AdminController@writer_profile');
/*|-------------------------------- ADOPS -----------------------------------|*/
Route::get('/admin/adops/', 'AdminController@adop');
Route::get('/admin/adops/{id}','AdminController@adop_profile');
/*|-------------------------------- USERS -----------------------------------|*/
Route::get('/admin/users/', 'AdminController@user');
Route::get('/admin/users/{id}','AdminController@user_profile');
/*|------------------------------------------------------------------------|*/
Route::get('/admin/', 'AdminController@index');
Route::get('/admin/profile/{id}','AdminController@admin_profile');
/*|------------------------------------------------------------------------|*/
Route::get('/admin/news/', 'AdminController@news_pending');
Route::get('/admin/news/reviewed/', 'AdminController@news_reviewed');
Route::get('/admin/news/suspended/', 'AdminController@news_suspended');
Route::get('/admin/news/archived/', 'AdminController@news_archived');
Route::get('/admin/news/dashboard/{id}','AdminController@news_dashboard');
Route::get('/admin/news/preview/{id}','AdminController@news_preview');
Route::get('/admin/news/timeline/{id}','AdminController@news_timeline');
/*|------------------------------------------------------------------------|*/
Route::get('/admin/media/', 'AdminController@media_pending');
Route::get('/admin/media/reviewed', 'AdminController@media_reviewed');
Route::get('/admin/media/suspended', 'AdminController@media_suspended');
Route::get('/admin/media/archived', 'AdminController@media_archived');
Route::get('/admin/media/dashboard/{id}','AdminController@media_dashboard');
Route::get('/admin/media/preview/{id}','AdminController@media_preview');
Route::get('/admin/media/timeline/{id}','AdminController@media_timeline');
/*|------------------------------------------------------------------------|*/
Route::get('/admin/campaigns', 'AdminController@admin_active');
Route::get('/admin/campaigns/inactive', 'AdminController@admin_inactive');
Route::get('/admin/campaigns/archive', 'AdminController@admin_archive');
Route::get('/admin/campaigns/dashboard/{id}', 'AdminController@admin_dashboard');
Route::get('/admin/campaigns/preview/{id}', 'AdminController@admin_preview');

Route::get('/admin/campaigns/programmatic', 'AdminController@admin_programmatic');
Route::get('/admin/campaigns/order', 'AdminController@admin_order');
Route::get('/admin/campaigns/inventory', 'AdminController@admin_inventory');
Route::get('/admin/campaigns/reporting', 'AdminController@admin_reporting');

Route::get('/admin/campaigns/advertiser', 'AdminController@admin_advertiser');
Route::get('/admin/campaigns/agency', 'AdminController@admin_agency');

/*|------------------------------ USERS STORY -------------------------------|*/
Route::get('/admin/community/', 'AdminController@story');
Route::get('/admin/community/profile/{id}', 'AdminController@user_story');
Route::get('/admin/community/preview/{id}', 'AdminController@preview_story');
/*|------------------------------ USERS POST --------------------------------|*/
Route::get('/admin/posts/', 'AdminController@post');
Route::get('/admin/posts/profile/{id}', 'AdminController@user_post');
Route::get('/admin/posts/preview/{id}', 'AdminController@preview_post');
/*|------------------------------ USERS MOOD --------------------------------|*/
Route::get('/admin/moods/', 'AdminController@mood');
Route::get('/admin/moods/profile/{id}', 'AdminController@user_mood');
Route::get('/admin/moods/preview/{id}', 'AdminController@preview_mood');
/*|---------------------------- USERS COMMENT -------------------------------|*/
Route::get('/admin/comments/', 'AdminController@comment');
Route::get('/admin/comments/profiel/{id}', 'AdminController@user_comment');
Route::get('/admin/comments/preview/{id}', 'AdminController@preview_comment');
/*|---------------------------- USERS MESSAGE -------------------------------|*/
Route::get('/admin/messages/', 'AdminController@message');
Route::get('/admin/messages/profile/{id}', 'AdminController@user_message');
Route::get('/admin/messages/preview/{id}', 'AdminController@preview_message');
/*|----------------------------- USERS EMAILS -------------------------------|*/
Route::get('/admin/emails/', 'AdminController@email');
Route::get('/admin/emails/profile/{id}', 'AdminController@user_email');
Route::get('/admin/emails/preview/{id}', 'AdminController@preview_email');
/*|---------------------------- USERS DOWNLOAD ------------------------------|*/
Route::get('/admin/downloads/', 'AdminController@load');
Route::get('/admin/downloads/profile/{id}', 'AdminController@user_load');
Route::get('/admin/downloads/preview/{id}', 'AdminController@preview_load');/*

/*
  |--------------------------------------------------------------------------
  | Writer Route
  |--------------------------------------------------------------------------
*/
/*|-------------------------------- EDITOR ----------------------------------|*/
Route::get('/writer/profile/{id}','WriterController@editor_profile');
/*|-------------------------------- WRITER ----------------------------------|*/
Route::get('/writer/writers/{id}','WriterController@writer_profile');
/*|--------------------------------- NEWS -----------------------------------|*/
Route::get('/writer', 'WriterController@index');
Route::get('/writer/news/add', 'WriterController@news_add');
Route::post('/writer/news', 'WriterController@news_store');
Route::get('/writer/news/', 'WriterController@news_pending');
Route::get('/writer/news/reviewed', 'WriterController@news_reviewed');
Route::get('/writer/news/suspended', 'WriterController@news_suspended');
Route::get('/writer/news/dashboard/{id}','WriterController@news_dashboard');
Route::get('/writer/news/preview/{id}','WriterController@news_preview');
Route::get('/writer/news/timeline/{id}','WriterController@news_timeline');

Route::get('/writer/news/edit/{id}', 'WriterController@news_edit');
Route::patch('/writer/news/{id}', 'WriterController@update');
Route::match(['get', 'patch'], '/writer/newsupload/{id}', 'WriterController@upload');
Route::delete('/writer/newsupload/{id}', 'WriterController@deleteImage');
/*|--------------------------------- MEDIA ----------------------------------|*/
Route::get('/writer/media/gallery','WriterController@gallery');
Route::get('/writer/media/video','WriterController@video');
Route::get('/writer/media/audio','WriterController@audio');
Route::get('/writer/media/vr','WriterController@vr');

Route::post('/writer/media/gallery','WriterController@edia_store');

Route::get('/writer/media/', 'WriterController@media_pending');
Route::get('/writer/media/reviewed', 'WriterController@media_reviewed');
Route::get('/writer/media/suspended', 'WriterController@media_suspended');

Route::get('/writer/media/dashboard/{id}','WriterController@media_dashboard');
Route::get('/writer/media/preview/{id}','WriterController@media_preview');
Route::get('/writer/media/timeline/{id}','WriterController@media_timeline');

Route::get('/writer/media/edit/{id}', 'WriterController@media_edit');
Route::patch('/writer/media/{id}', 'WriterController@update');
Route::match(['get', 'patch'], '/writer/media_upload/{id}', 'WriterController@upload');
Route::delete('/writer/media_upload/{id}', 'WriterController@deleteImage');

/*
  |--------------------------------------------------------------------------
  | Editor News Route
  |--------------------------------------------------------------------------
*/
Route::get('/editor/', 'EditorController@default');
Route::get('/editor/profile/{id}','EditorController@profile');

/*|--------------------------------- NEWS -----------------------------------|*/
Route::get('/editor/news/', 'EditorController@news_pending');
Route::get('/editor/news/reviewed/', 'EditorController@news_reviewed');
Route::get('/editor/news/suspended/', 'EditorController@news_suspended');
Route::get('/editor/news/archived/', 'EditorController@news_archived');
Route::get('/editor/news/preview/{id}','EditorController@news_preview');
Route::get('/editor/news/publish/{id}','EditorController@news_publish');
Route::get('/editor/news/dashboard/{id}','EditorController@news_dashboard');
Route::get('/editor/news/timeline/{id}','EditorController@news_timeline');
Route::get('/editor/news/edit/{id}', 'EditorController@news_edit');
Route::patch('/editor/news/{id}', 'EditorController@update');
/*|------------------------------ MULTIMEDIA --------------------------------|*/
Route::get('/editor/media/', 'EditorController@media_pending');
Route::get('/editor/media/reviewed', 'EditorController@media_reviewed');
Route::get('/editor/media/suspended', 'EditorController@media_suspended');
Route::get('/editor/media/archived', 'EditorController@media_archived');
Route::get('/editor/media/dashboard/{id}','EditorController@media_dashboard');
Route::get('/editor/media/preview/{id}','EditorController@media_preview');
Route::get('/editor/media/timeline/{id}','EditorController@media_timeline');
Route::get('/editor/media/edit/{id}', 'EditorController@media_edit');
Route::patch('/editor/media/{id}', 'EditorController@update');
/*|------------------------------- WRITER -----------------------------------|*/
Route::get('/editor/writers/', 'EditorController@writer');
Route::get('/editor/writers/{id}','EditorController@writer_profile');
/*|-------------------------------- USERS -----------------------------------|*/
Route::get('/editor/users/', 'EditorController@user');
Route::get('/editor/users/{id}','EditorController@user_profile');
/*|------------------------------ USERS STORY -------------------------------|*/
Route::get('/editor/community/', 'EditorController@story');
Route::get('/editor/community/profile/{id}', 'EditorController@user_story');
Route::get('/editor/community/preview/{id}', 'EditorController@preview_story');
/*|------------------------------ USERS POST --------------------------------|*/
Route::get('/editor/posts/', 'EditorController@post');
Route::get('/editor/posts/profile/{id}', 'EditorController@user_post');
Route::get('/editor/posts/preview/{id}', 'EditorController@preview_post');
/*|------------------------------ USERS MOOD --------------------------------|*/
Route::get('/editor/moods/', 'EditorController@mood');
Route::get('/editor/moods/profile/{id}', 'EditorController@user_mood');
Route::get('/editor/moods/preview/{id}', 'EditorController@preview_mood');
/*|---------------------------- USERS COMMENT -------------------------------|*/
Route::get('/editor/comments/', 'EditorController@comment');
Route::get('/editor/comments/profiel/{id}', 'EditorController@user_comment');
Route::get('/editor/comments/preview/{id}', 'EditorController@preview_comment');
/*|---------------------------- USERS MESSAGE -------------------------------|*/
Route::get('/editor/messages/', 'EditorController@message');
Route::get('/editor/messages/profile/{id}', 'EditorController@user_message');
Route::get('/editor/messages/preview/{id}', 'EditorController@preview_message');
/*|----------------------------- USERS EMAILS -------------------------------|*/
Route::get('/editor/emails/', 'EditorController@email');
Route::get('/editor/emails/profile/{id}', 'EditorController@user_email');
Route::get('/editor/emails/preview/{id}', 'EditorController@preview_email');
/*|---------------------------- USERS DOWNLOAD ------------------------------|*/
Route::get('/editor/downloads/', 'EditorController@load');
Route::get('/editor/downloads/profile/{id}', 'EditorController@user_load');
Route::get('/editor/downloads/preview/{id}', 'EditorController@preview_load');

/*
  |--------------------------------------------------------------------------
  | Moderator Route
  |--------------------------------------------------------------------------
*/
Route::get('/moderator', 'ModeratorController@index');
/*|-------------------------------- USERS -----------------------------------|*/
Route::get('/moderator/users/', 'ModeratorController@user');
Route::get('/moderator/users/{id}','ModeratorController@user_profile');
/*|------------------------------ USERS STORY -------------------------------|*/
Route::get('/moderator/community/', 'ModeratorController@story');
Route::get('/moderator/community/profile/{id}', 'ModeratorController@user_story');
Route::get('/moderator/community/preview/{id}', 'ModeratorController@preview_story');
Route::get('/moderator/community/publish/{id}', 'ModeratorController@publish_story');
Route::patch('/moderator/community/{id}', 'ModeratorController@update');
Route::delete('/moderator/community/{id}', 'ModeratorController@delete');
/*|------------------------------ USERS POST --------------------------------|*/
Route::get('/moderator/posts/', 'ModeratorController@post');
Route::get('/moderator/posts/profile/{id}', 'ModeratorController@user_post');
Route::get('/moderator/posts/preview/{id}', 'ModeratorController@preview_post');
Route::get('/moderator/posts/publish/{id}', 'ModeratorController@publish');
Route::patch('/moderator/posts/{id}', 'ModeratorController@update');
Route::delete('/moderator/posts/{id}', 'ModeratorController@delete');
/*|------------------------------ USERS MOOD --------------------------------|*/
Route::get('/moderator/moods/', 'ModeratorController@mood');
Route::get('/moderator/moods/profile/{id}', 'ModeratorController@user_mood');
Route::get('/moderator/moods/preview/{id}', 'ModeratorController@preview_mood');
/*|---------------------------- USERS COMMENT -------------------------------|*/
Route::get('/moderator/comments/', 'ModeratorController@comment');
Route::get('/moderator/comments/profiel/{id}', 'ModeratorController@user_comment');
Route::get('/moderator/comments/preview/{id}', 'ModeratorController@preview_comment');
/*|---------------------------- USERS MESSAGE -------------------------------|*/
Route::get('/moderator/messages/', 'ModeratorController@message');
Route::get('/moderator/messages/profile/{id}', 'ModeratorController@user_message');
Route::get('/moderator/messages/preview/{id}', 'ModeratorController@preview_message');
/*|----------------------------- USERS EMAILS -------------------------------|*/
Route::get('/moderator/emails/', 'ModeratorController@email');
Route::get('/moderator/emails/profile/{id}', 'ModeratorController@user_email');
Route::get('/moderator/emails/preview/{id}', 'ModeratorController@preview_email');
/*|---------------------------- USERS DOWNLOAD ------------------------------|*/
Route::get('/moderator/downloads/', 'ModeratorController@load');
Route::get('/moderator/downloads/profile/{id}', 'ModeratorController@user_load');
Route::get('/moderator/downloads/preview/{id}', 'ModeratorController@preview_load');

/*
  |--------------------------------------------------------------------------
  | AdOps Route
  |--------------------------------------------------------------------------
*/
Route::get('/adops/', 'AdOpsController@index');
/*|-------------------------------- EDITOR ----------------------------------|*/
Route::get('/adops/profile/{id}','AdOpsController@editor_profile');
/*|-------------------------------- WRITER ----------------------------------|*/
Route::get('/adops/writers/{id}','AdOpsController@writer_profile');

/*
  |--------------------------------------------------------------------------
  |Campaigns Route
  |--------------------------------------------------------------------------
*/
  
Route::get('/campaigns', 'AdOpsController@index');
Route::get('/campaigns/active', 'AdOpsController@adops_active');
Route::get('/campaigns/inactive', 'AdOpsController@adops_inactive');
Route::get('/campaigns/archive', 'AdOpsController@adops_archive');
Route::get('/campaigns/dashboard/{id}', 'AdOpsController@adops_dashboard');
Route::get('/campaigns/preview/{id}', 'AdOpsController@adops_preview');

Route::get('/campaigns/programmatic', 'AdOpsController@adops_programmatic');
Route::get('/campaigns/orders', 'AdOpsController@adops_order');
Route::get('/campaigns/inventories', 'AdOpsController@adops_inventory');
Route::get('/campaigns/reports', 'AdOpsController@adops_report');
Route::get('/campaigns/advertiser', 'AdOpsController@adops_advertiser');
Route::get('/campaigns/agency', 'AdOpsController@adops_agency');
/*|------------------------------------------------------------------------|*/
Route::get('/campaigns/add', 'AdOpsController@add');
Route::post('/campaigns', 'AdOpsController@store');
Route::get('/campaigns/edit/{id}', 'AdOpsController@edit');
Route::patch('/campaigns/{id}', 'AdOpsController@update');
Route::get('/campaigns/publish/{id}', 'AdOpsController@publish');
Route::delete('/campaigns/{id}', 'AdOpsController@delete');
Route::match(['get', 'patch'], '/campaigns/upload/{id}', 'AdOpsController@upload');
Route::delete('/campaigns/upload/{id}', 'AdOpsController@deleteImage');
Route::match(['get', 'patch'], '/campaigns/uploadimg/{id}', 'AdOpsController@uploadImage');
