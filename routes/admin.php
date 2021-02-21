<?php
//--------start-login---------
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::post('login', 'Auth\LoginController@login');
Route::get('register', 'Auth\LoginController@register')->name('admin.register');
// Route::post('register-store', 'Auth\LoginController@registerStore')->name('admin.register.store');
Route::get('otp-verify', 'Auth\LoginController@otpVerify')->name('admin.otp-verify');
Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::get('district-update', 'DashboardController@districtUpdate')->name('admin.district.update');
	Route::post('district-update-post', 'DashboardController@districtUpdatePost')->name('admin.district.update.post');
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
		Route::get('report-data/{from_date}/{to_date}', 'UserManagementController@reportDatewiseData')
		;
		Route::get('mapping-district-user', 'UserManagementController@mappingDistrictUser')->name('admin.user.mapping.district.user');
		Route::get('mapping-district-wise-list', 'UserManagementController@mappingDistrictWiseList')->name('admin.user.mapping.district.wise.list');
		Route::post('mapping-district-user-store', 'UserManagementController@mappingDistrictUserStore')->name('admin.user.mapping.district.user.store');

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
	//------Aadhaar-Print-------------	
		Route::get('adhaar','CardPrintController@adhaar')->name('admin.card.print.adhaar');
		Route::post('adhaar-store','CardPrintController@adhaarStore')->name('admin.card.print.adhaar.store');
		Route::get('adhaar-download','CardPrintController@adhaarStoreDownload')->name('admin.card.print.adhaar.download');
		Route::get('adhaar-print-purchase','CardPrintController@adhaarPrintPurchase')->name('admin.card.adhaar.print.purchase');
		Route::post('adhaar-print-purchase-store','CardPrintController@adhaarPrintPurchaseStore')->name('admin.card.adhaar.print.purchase.store');

		Route::get('adhaar-crop-image/{id}/{type}','CardPrintController@action_on_show_process_photo')->name('admin.card.adhaar.crop.image');

		Route::get('customize-original_p/{path}','CardPrintController@customizeOriginal_p')->name('admin.card.customize.original_p');

		Route::get('customize-result_p/{path}','CardPrintController@customizeResult_p')->name('admin.card.customize.result_p');

		Route::get('customize-action_process_photo/{ori}/{r_p}','CardPrintController@action_process_photo')->name('admin.card.customize.action_process_photo');

		Route::get('customize-action_apply_process_photo/{ori}/{r_p}','CardPrintController@action_apply_process_photo')->name('admin.card.customize.action_apply_process_photo');

		Route::get('customize-refresh-image/{ori}/{r_p}','CardPrintController@customizeRefreshImage')->name('admin.card.customize.refresh.image');
		 
	//------Pan-Card-Print-------------	
		Route::get('pancard','CardPrintController@pancard')->name('admin.card.print.pancard');
		Route::post('pancard-store','CardPrintController@pancardStore')->name('admin.card.print.pancard.store');
		Route::get('pancard-download','CardPrintController@pancardDownload')->name('admin.card.print.pancard.download');

		Route::get('pancard-print-purchase','CardPrintController@pancardPrintPurchase')->name('admin.card.pancard.print.purchase');
		Route::post('pancard-print-purchase-store','CardPrintController@pancardPrintPurchaseStore')->name('admin.card.pancard.print.purchase.store');


		Route::get('adhaar-print-feedback/{type}','CardPrintController@adhaarPrintFeedback')->name('admin.card.adhaar.print.feedback');
		Route::post('adhaar-print-feedback-store','CardPrintController@adhaarPrintFeedbackStore')->name('admin.card.adhaar.print.feedback.store');

		    
		
	});
	Route::prefix('product')->group(function () {
		Route::get('item-category', 'ProductController@itemCategory')->name('admin.product.item.category');
		Route::post('item-category-store/{id?}', 'ProductController@itemCategoryStore')->name('admin.product.item.category.store');
		Route::get('item-category-edit/{id?}', 'ProductController@itemCategoryEdit')->name('admin.product.item.category.edit');
		Route::get('item-category-status/{id}', 'ProductController@itemCategoryStatus')->name('admin.product.item.category.status');
		Route::get('item-category-delete/{id}', 'ProductController@itemCategoryDelete')->name('admin.product.item.category.delete');

		Route::get('add-item', 'ProductController@addItem')->name('admin.product.add.item');
		Route::post('add-item-store/{id?}', 'ProductController@addItemStore')->name('admin.product.add.item.store');
		Route::get('add-item-edit/{id?}', 'ProductController@addItemEdit')->name('admin.product.add.item.edit');
		Route::get('add-item-status/{id}', 'ProductController@addItemStatus')->name('admin.product.add.item.status');


		Route::get('add-item-image', 'ProductController@addItemImage')->name('admin.product.add.item.image');
		Route::post('add-item-image-store', 'ProductController@addItemImageStore')->name('admin.product.add.item.image.store');
		Route::get('add-item-image-show/{id}', 'ProductController@addItemImageShow')->name('admin.product.add.item.image.show');
		Route::get('add-item-image-delete/{id}', 'ProductController@addItemImageDelete')->name('admin.product.add.item.image.delete'); 
		
	});
	Route::prefix('cart')->group(function () {
	 	Route::get('product-list', 'ProductController@productList')->name('admin.product.list');
	 	Route::get('product-image/{id}', 'ProductController@productImage')->name('admin.product.item.image.show');
	 	Route::get('product-view/{id}', 'ProductController@productView')->name('admin.product.view');
	 	Route::get('cart-store/{id}', 'ProductController@cartStore')->name('admin.cart.store');
	 	Route::get('cart-count', 'ProductController@cartCount')->name('admin.cart.count');
	 	Route::get('cart-view', 'ProductController@cartView')->name('admin.cart.view');
	 	Route::get('cart-delete/{id}', 'ProductController@cartDelete')->name('admin.cart.delete');
	 	Route::get('cart-update/{id}/{type}', 'ProductController@cartUpdate')->name('admin.cart.update');
	 	Route::get('checkout/{amount}', 'ProductController@checkout')->name('admin.cart.checkout');
	 	Route::post('checkout-store', 'ProductController@checkoutStore')->name('admin.cart.checkout.store');
	});
});	   