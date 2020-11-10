<?php
//--------start-login---------
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::post('login', 'Auth\LoginController@login');
// Route::group(['middleware' => ''], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	//-------start--UserManagement--------- 
	Route::prefix('UserManagement')->group(function () {
		Route::get('/', 'UserManagementController@index')->name('admin.user.index');
		Route::post('store', 'UserManagementController@store')->name('admin.user.post');
		Route::get('usersPermissions', 'UserManagementController@usersPermissions')->name('admin.user.usersPermissions');
		Route::get('usersWiseMenuTable', 'UserManagementController@usersWiseMenuTable')->name('admin.user.usersWiseMenuTable');
		Route::post('usersPermissionStore', 'UserManagementController@usersPermissionStore')->name('admin.user.usersPermissionStore');
	});
	Route::prefix('CardPrint')->group(function () {
		Route::get('/', 'CardPrintController@index')->name('admin.card.print.index');
		Route::post('print', 'CardPrintController@print')->name('admin.card.print.print');
		
	});
// });	   