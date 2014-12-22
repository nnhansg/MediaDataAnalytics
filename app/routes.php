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

/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('comment', 'Comment');
Route::model('post', 'Post');
Route::model('role', 'Role');

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('comment', '[0-9]+');
Route::pattern('post', '[0-9]+');
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function () {

		# Comment Management
		Route::get('comments/{comment}/edit', 'AdminCommentsController@getEdit');
		Route::post('comments/{comment}/edit', 'AdminCommentsController@postEdit');
		Route::get('comments/{comment}/delete', 'AdminCommentsController@getDelete');
		Route::post('comments/{comment}/delete', 'AdminCommentsController@postDelete');
		Route::controller('comments', 'AdminCommentsController');

		# Blog Management
		Route::get('blogs/{post}/show', 'AdminBlogsController@getShow');
		Route::get('blogs/{post}/edit', 'AdminBlogsController@getEdit');
		Route::post('blogs/{post}/edit', 'AdminBlogsController@postEdit');
		Route::get('blogs/{post}/delete', 'AdminBlogsController@getDelete');
		Route::post('blogs/{post}/delete', 'AdminBlogsController@postDelete');
		Route::controller('blogs', 'AdminBlogsController');

		# User Management
		Route::get('users/{user}/show', 'AdminUsersController@getShow');
		Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
		Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
		Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
		Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
		Route::get('users/monitor', 'AdminUsersController@monitorUser');
		Route::controller('users', 'AdminUsersController');

		# User Role Management
		Route::get('roles/{role}/show', 'AdminRolesController@getShow');
		Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
		Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
		Route::get('roles/{role}/delete', 'AdminRolesController@getDelete');
		Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');
		Route::controller('roles', 'AdminRolesController');

		# Admin Dashboard
		Route::controller('/', 'AdminDashboardController');
	});

Route::group(array('prefix' => 'media'), function () {
		Route::get('/category/list', 'MediaCategoryController@getIndex');
		Route::get('/category/create', 'MediaCategoryController@getCreate');
		Route::get('/category/{category_id}/edit', 'MediaCategoryController@getEdit');
		Route::post('/category/{category_id}/edit', 'MediaCategoryController@postEdit');
		Route::get('/category/{category_id}/delete', 'MediaCategoryController@getDelete');
		Route::post('/category/{category_id}/delete', 'MediaCategoryController@postDelete');
		Route::get('/article/list', 'MediaArticleController@getIndex');
		Route::get('/article/create', 'MediaArticleController@getCreate');
		Route::get('/article/{article_id}/edit', 'MediaArticleController@getEdit');
		Route::post('/article/{article_id}/edit', 'MediaArticleController@postEdit');
		Route::get('/article/{article_id}/delete', 'MediaArticleController@getDelete');
		Route::post('/article/{article_id}/delete', 'MediaArticleController@postDelete');

		Route::get('/article/list-report', 'MediaArticleController@getListReport');
		Route::get('/article/listdata', 'MediaArticleController@getListData');
		Route::get('/article/listdetail/{article_id}', 'MediaArticleController@getListDetail');
		// Route::get('/article/list-report/{article_id}', 'MediaArticleController@getListReport');

		Route::get('/article/import', 'MediaArticleController@getImport');
		Route::post('/article/import', 'MediaArticleController@postImport');

		Route::get('/article/export-xls', 'MediaArticleController@getExportXLS');
		Route::post('/article/export-xls', 'MediaArticleController@postExportXLS');

		Route::get('export', 'MediaReportController@getExport');
		Route::post('export', 'MediaReportController@postExport');
		Route::get('export/download/{file}', 'MediaReportController@getExportDownload');

		Route::controller('category', 'MediaCategoryController');
		Route::controller('article', 'MediaArticleController');
	});
/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

// User reset routes
Route::get('user/reset/{token}', 'UserController@getReset');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset');
//:: User Account Routes ::
Route::post('user/{user}/edit', 'UserController@postEdit');

//:: User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');

//:: Application Routes ::

# Filter for detect language
Route::when('contact-us', 'detectLang');

# Contact Us Static Page
Route::get('contact-us', function () {
		// Return about us page
		return View::make('site/contact-us');
	});

# Posts - Second to last set, match slug
Route::get('{postSlug}', 'BlogController@getView');
Route::post('{postSlug}', 'BlogController@postView');

# Index Page - Last route, no matches
Route::get('/', array('before' => 'detectLang', 'uses' => 'BlogController@getIndex'));
