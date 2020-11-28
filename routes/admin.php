<?php
//--------start-login---------
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::post('login', 'Auth\LoginController@login');
Route::get('register', 'Auth\LoginController@register')->name('admin.register');
Route::post('register-store', 'Auth\LoginController@registerStore')->name('admin.register.store');
Route::get('otp-verify', 'Auth\LoginController@otpVerify')->name('admin.otp-verify');
Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	//-------start--UserManagement--------- 
	Route::prefix('UserManagement')->group(function () {
		Route::get('/', 'UserManagementController@index')->name('admin.user.index');
		Route::post('store', 'UserManagementController@store')->name('admin.user.post'); 
		Route::get('user-approval', 'UserManagementController@userApproval')->name('admin.user.approval'); 
		Route::get('user-approval-list', 'UserManagementController@userApprovalList')->name('admin.user.approval.list'); 
		Route::get('user-approval-form/{id}', 'UserManagementController@userApprovalForm')->name('admin.user.approval.form'); 
		Route::post('user-approval-store', 'UserManagementController@userApprovalStore')->name('admin.user.approval.store'); 
	});
	Route::prefix('wallet')->group(function () {
		Route::get('payment-option', 'WalletController@paymentOption')->name('admin.wallet.payment.option');
		Route::get('payment-option-change', 'WalletController@paymentOptionChange')->name('admin.wallet.payment.option.change');
		Route::post('payment-option-store', 'WalletController@paymentOptionStore')->name('admin.wallet.payment.option.store');
		Route::get('payment-option-status/{id}', 'WalletController@paymentOptionStatus')->name('admin.wallet.payment.option.status');
		Route::get('cashbook', 'WalletController@cashbook')->name('admin.wallet.cashbook');
		Route::post('cashbook-store', 'WalletController@cashbookStore')->name('admin.wallet.cashbook.store');
		Route::get('recharge-wallet', 'WalletController@rechargeWallet')->name('admin.wallet.recharge.wallet');
		Route::get('payment-option-show', 'WalletController@paymentOptionShow')->name('admin.wallet.payment.option.show');
		 
	});
	Route::prefix('CardPrint')->group(function () {
		Route::get('/', 'CardPrintController@index')->name('admin.card.print.index');
		Route::post('print', 'CardPrintController@print')->name('admin.card.print.print');
		
	});
});	   