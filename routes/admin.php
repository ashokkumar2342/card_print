<?php
//--------start-login---------
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::post('login', 'Auth\LoginController@login');
Route::get('loginWithOTP', 'Auth\LoginController@loginWithOTP')->name('admin.loginWithOTP');
Route::post('send-otp', 'Auth\LoginController@sendOtp')->name('admin.send.otp');
Route::get('otp-verify', 'Auth\LoginController@otpVerify')->name('admin.otp-verify');
// Route::group(['middleware' => ''], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	//-------start--UserManagement--------- 
	Route::prefix('UserManagement')->group(function () {
		Route::get('/', 'UserManagementController@index')->name('admin.user.index');
		Route::post('store', 'UserManagementController@store')->name('admin.user.post'); 
	});
	Route::prefix('wallet')->group(function () {
		Route::get('payment-option', 'WalletController@paymentOption')->name('admin.wallet.payment.option');
		Route::post('payment-option-store', 'WalletController@paymentOptionStore')->name('admin.wallet.payment.option.store');
		Route::get('cashbook', 'WalletController@cashbook')->name('admin.wallet.cashbook');
		Route::post('cashbook-store', 'WalletController@cashbookStore')->name('admin.wallet.cashbook.store');
		Route::get('recharge-wallet', 'WalletController@rechargeWallet')->name('admin.wallet.recharge.wallet');
		 
	});
	Route::prefix('CardPrint')->group(function () {
		Route::get('/', 'CardPrintController@index')->name('admin.card.print.index');
		Route::post('print', 'CardPrintController@print')->name('admin.card.print.print');
		
	});
// });	   