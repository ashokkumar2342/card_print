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
		Route::get('user-list', 'UserManagementController@userList')->name('admin.user.list');
		Route::get('user-list-status/{id}', 'UserManagementController@userListStatus')->name('admin.user.list.status');

		Route::get('user-approval', 'UserManagementController@userApproval')->name('admin.user.approval'); 
		Route::get('user-approval-list', 'UserManagementController@userApprovalList')->name('admin.user.approval.list'); 
		Route::get('user-approval-form/{id}', 'UserManagementController@userApprovalForm')->name('admin.user.approval.form'); 
		Route::post('user-approval-store', 'UserManagementController@userApprovalStore')->name('admin.user.approval.store'); 
		Route::get('user-report', 'UserManagementController@userReport')->name('admin.user.report'); 
		Route::post('user-report-generate', 'UserManagementController@userReportGenerate')->name('admin.user.report.generate'); 
		Route::get('report-date-wise', 'UserManagementController@reportDatewise')->name('admin.user.report.date.wise'); 
		Route::post('report-date-wise-show', 'UserManagementController@reportDatewiseShow')->name('admin.user.report.date.wise.show'); 
		Route::get('report-date-wise-download/{from_date}/{to_date}', 'UserManagementController@reportDatewiseDownload')->name('admin.user.report.date.wise.download');

		Route::get('modify-per-card', 'UserManagementController@modifyPerCard')->name('admin.user.modify.per.card'); 
		Route::post('modify-per-card-store', 'UserManagementController@modifyPerCardStore')->name('admin.user.modify.per.card.store'); 
	});
	Route::prefix('myaccount')->group(function () {
		Route::get('change-password', 'UserManagementController@changePassword')->name('admin.user.change.password');
		Route::post('change-password-store', 'UserManagementController@changePasswordStore')->name('admin.user.change.password.store'); 	 
		Route::get('reset-password', 'UserManagementController@resetPassword')->name('admin.user.reset.password'); 	 
		Route::post('reset-password-store', 'UserManagementController@resetPasswordStore')->name('admin.user.reset.password.store'); 	 
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
		Route::get('qrcode-show/{path}', 'WalletController@qrcodeShow')->name('admin.wallet.qrcode.show');
		Route::post('cashbook-report', 'WalletController@cashbookReport')->name('admin.wallet.cashbook.report');
		Route::get('recharge-request', 'WalletController@rechargeRequest')->name('admin.wallet.recharge.request');
		Route::get('recharge-request-approval/{id}', 'WalletController@rechargeRequestApproval')->name('admin.wallet.recharge.request.approval');
		Route::get('recharge-request-reject/{id}', 'WalletController@rechargeRequestReject')->name('admin.wallet.recharge.request.reject');
		Route::get('recharge-wallet-in-cash', 'WalletController@rechargeWalletInCash')->name('admin.wallet.recharge.wallet.in.cash');
		Route::post('recharge-wallet-in-cash-store', 'WalletController@rechargeWalletInCashStore')->name('admin.wallet.recharge.wallet.in.cash.store');
		 
	});
	Route::prefix('process-commission')->group(function () {
		Route::get('/', 'ProcessCommissionController@index')->name('admin.process.commission.index');
		Route::post('store', 'ProcessCommissionController@store')->name('admin.process.commission.store'); 
		
	});
	Route::prefix('voter-details')->group(function () {
		Route::get('/', 'VoterDetailsController@index')->name('admin.voter.details.index');
		Route::get('district-wise-acno', 'VoterDetailsController@districtWiseAcno')->name('admin.voter.details.district.wise.acno');
		Route::get('acno-wise-village', 'VoterDetailsController@acnoWiseVillage')->name('admin.voter.details.acno.wise.village'); 
		Route::post('voter-search', 'VoterDetailsController@voterSearch')->name('admin.voter.details.search');
		 
		
	});
	Route::prefix('CardPrint')->group(function () {
		Route::get('/', 'CardPrintController@index')->name('admin.card.print.index');
		Route::post('show', 'CardPrintController@show')->name('admin.card.print.show');
		Route::post('print', 'CardPrintController@print')->name('admin.card.print.print');
		
	});
});	   