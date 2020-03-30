<?php

use App\Helpers\RoleName;


Route::get("/404","ErrorHandlerController@errorCode404");
Route::get("/405","ErrorHandlerController@errorCode405");

Route::get('/','Auth\LoginController@showLoginForm')->name('/');

Route::group(['middleware' => 'admin'], function () {
	/*========== Assets ============*/
	Route::get('/view-asset', [
		'uses'          =>  'AssetController@index',
		'as'            =>  'view-asset',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('view-asset')
	]);

	Route::post('/new-asset', [
		'uses'          =>  'AssetController@createAssetInfo',
		'as'            =>  'new-asset',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('view-asset')
	]);

	Route::get('/edit-asset/{id}', [
		'uses'          =>  'AssetController@editAssetInfo',
		'as'            =>  'edit-asset',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-asset')
	]);

	Route::post('/update-asset', [
		'uses'          =>  'AssetController@updateAssetInfo',
		'as'            =>  'update-asset',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-asset')
	]);

	Route::get('/create-sub-asset-code/{id}', [
		'uses'          =>  'AssetController@createSubAssetCode',
		'as'            =>  'create-sub-asset-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-sub-asset-code')
	]);

	Route::post('/new-sub-asset', [
		'uses'          =>  'AssetController@createSubAssetInfo',
		'as'            =>  'new-sub-asset',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-sub-asset')
	]);

	Route::get('/edit-sub-asset/{id}', [
		'uses'          =>  'AssetController@editSubAssetInfo',
		'as'            =>  'edit-sub-asset',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-sub-asset')
	]);

	Route::post('/update-sub-asset', [
		'uses'          =>  'AssetController@updateSubAssetInfo',
		'as'            =>  'update-sub-asset',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-sub-asset')
	]);

	/*========== Assets ============*/

	/*========== Liabilities ============*/

	Route::get('/view-liabilities', [
		'uses'          =>  'LiabilitieController@index',
		'as'            =>  'view-liabilities',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('view-liabilities')
	]);

	Route::post('/new-liabilities', [
		'uses'          =>  'LiabilitieController@createLiabilitieInfo',
		'as'            =>  'new-liabilities',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-liabilities')
	]);

	Route::get('/edit-liabilities/{id}', [
		'uses'          =>  'LiabilitieController@editLiabilitieInfo',
		'as'            =>  'edit-liabilities',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-liabilities')
	]);

	Route::post('/update-liabilities', [
		'uses'          =>  'LiabilitieController@updateLiabilitieInfo',
		'as'            =>  'update-liabilities',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-liabilities')
	]);

	Route::get('/create-sub-liabilitie-code/{id}', [
		'uses'          =>  'LiabilitieController@createSubLiabilitieCode',
		'as'            =>  'create-sub-liabilitie-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-sub-liabilitie-code')
	]);

	Route::post('/new-sub-liabilities', [
		'uses'          =>  'LiabilitieController@createSubLiabilitieInfo',
		'as'            =>  'new-sub-liabilities',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-sub-liabilities')
	]);

	Route::get('/edit-sub-liabilities/{id}', [
		'uses'          =>  'LiabilitieController@editSubLiabilitieInfo',
		'as'            =>  'edit-sub-liabilities',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-sub-liabilities')
	]);

	Route::post('/update-sub-liabilities', [
		'uses'          =>  'LiabilitieController@updateSubLiabilitieInfo',
		'as'            =>  'update-sub-liabilities',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-sub-liabilities')
	]);

	/*========== Liabilities ============*/

	/*========== chart of account ============*/
	Route::get('/chart-of-account', [
		'uses'          =>  'ChartOfAccountController@index',
		'as'            =>  'chart-of-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('chart-of-account')
	]);

	Route::get('/create-asset-account-code/{id}', [
		'uses'          =>  'ChartOfAccountController@createAssetAccountCode',
		'as'            =>  'create-asset-account-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-asset-account-code')
	]);

	Route::post('/new-asset-account', [
		'uses'          =>  'ChartOfAccountController@createAssetAccountInfo',
		'as'            =>  'new-asset-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-asset-account')
	]);

	Route::get('/create-liabilitie-account-code/{id}', [
		'uses'          =>  'ChartOfAccountController@createLiabilitieAccountCode',
		'as'            =>  'create-liabilitie-account-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-liabilitie-account-code')
	]);

	Route::post('/new-liabilitie-account', [
		'uses'          =>  'ChartOfAccountController@createLiabilitieAccountInfo',
		'as'            =>  'new-liabilitie-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-liabilitie-account')
	]);

	Route::get('/create-owners-equity-account-code/{id}', [
		'uses'          =>  'ChartOfAccountController@createOwnersEquityAccountCode',
		'as'            =>  'create-owners-equity-account-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-owners-equity-account-code')
	]);

	Route::post('/new-owners-equity-account', [
		'uses'          =>  'ChartOfAccountController@createOwnersEquityAccountInfo',
		'as'            =>  'new-owners-equity-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-owners-equity-account')
	]);

	Route::get('/create-income-account-code/{id}', [
		'uses'          =>  'ChartOfAccountController@createIncomeAccountCode',
		'as'            =>  'create-income-account-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-income-account-code')
	]);

	Route::post('/new-income-account', [
		'uses'          =>  'ChartOfAccountController@createIncomeAccountInfo',
		'as'            =>  'new-income-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-income-account')
	]);

	Route::get('/create-expense-account-code/{id}', [
		'uses'          =>  'ChartOfAccountController@createExpenseAccountCode',
		'as'            =>  'create-expense-account-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-expense-account-code')
	]);

	Route::post('/new-expense-account', [
		'uses'          =>  'ChartOfAccountController@createExpenseAccountInfo',
		'as'            =>  'new-expense-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-expense-account')
	]);

	Route::get('/asset-account-name-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@assetAccountNameUpdate',
		'as'            =>  'asset-account-name-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('asset-account-name-update')
	]);

	Route::get('/asset-account-code-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@assetAccountCodeUpdate',
		'as'            =>  'asset-account-code-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('asset-account-code-update')
	]);

	Route::get('/asset-account-description-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@assetAccountDescriptionUpdate',
		'as'            =>  'asset-account-description-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('asset-account-description-update')
	]);

	Route::get('/liabilitie-account-name-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@liabilitiesAccountNameUpdate',
		'as'            =>  'liabilitie-account-name-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('liabilitie-account-name-update')
	]);

	Route::get('/liabilitie-account-description-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@liabilitiesAccountDescriptionUpdate',
		'as'            =>  'liabilitie-account-description-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('liabilitie-account-description-update')
	]);

	Route::get('/owners-equity-account-name-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@ownersEquityAccountNameUpdate',
		'as'            =>  'owners-equity-account-name-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('owners-equity-account-name-update')
	]);

	Route::get('/owners-equity-account-description-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@ownersEquityAccountDescriptionUpdate',
		'as'            =>  'owners-equity-account-description-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('owners-equity-account-description-update')
	]);

	Route::get('/income-account-name-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@incomeAccountNameUpdate',
		'as'            =>  'income-account-name-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('income-account-name-update')
	]);

	Route::get('/income-account-description-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@incomeAccountDescriptionUpdate',
		'as'            =>  'income-account-description-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('income-account-description-update')
	]);

	Route::get('/expense-account-name-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@expenseAccountNameUpdate',
		'as'            =>  'expense-account-name-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('expense-account-name-update')
	]);

	Route::get('/expense-account-description-update/{value}/{id}', [
		'uses'          =>  'ChartOfAccountController@expenseAccountDescriptionUpdate',
		'as'            =>  'expense-account-description-update',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('expense-account-description-update')
	]);

	/*========== chart of account ============*/

	/*========== Owners Equity ============*/

	Route::get('/owners-equity', [
		'uses'          =>  'OwnersEquityController@index',
		'as'            =>  'owners-equity',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('owners-equity')
	]);

	Route::post('/new-owners-equity', [
		'uses'          =>  'OwnersEquityController@createOwnersEquityInfo',
		'as'            =>  'new-owners-equity',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-owners-equity')
	]);

	Route::get('/edit-owners-equity/{id}', [
		'uses'          =>  'OwnersEquityController@editOwnersEquityInfo',
		'as'            =>  'edit-owners-equity',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-owners-equity')
	]);

	Route::post('/update-owners-equity', [
		'uses'          =>  'OwnersEquityController@updateOwnersEquityInfo',
		'as'            =>  'update-owners-equity',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-owners-equity')
	]);

	Route::get('/create-sub-owners-equity-code/{id}', [
		'uses'          =>  'OwnersEquityController@createSubOwnersEquityCode',
		'as'            =>  'create-sub-owners-equity-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-sub-owners-equity-code')
	]);

	Route::post('/new-sub-owners-equity', [
		'uses'          =>  'OwnersEquityController@createSubOwnersEquityInfo',
		'as'            =>  'new-sub-owners-equity',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-sub-owners-equity')
	]);

	Route::get('/edit-sub-owners-equity/{id}', [
		'uses'          =>  'OwnersEquityController@editSubOwnersEquityInfo',
		'as'            =>  'edit-sub-owners-equity',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-sub-owners-equity')
	]);

	Route::post('/update-sub-owners-equity', [
		'uses'          =>  'OwnersEquityController@updateSubOwnersEquityInfo',
		'as'            =>  'update-sub-owners-equity',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-sub-owners-equity')
	]);

	/*========== Owners Equity ============*/

	/*========== Income ============*/

	Route::get('/view-income', [
		'uses'          =>  'IncomeController@index',
		'as'            =>  'view-income',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('view-income')
	]);

	Route::post('/new-income', [
		'uses'          =>  'IncomeController@createIncomeInfo',
		'as'            =>  'new-income',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-income')
	]);

	Route::get('/edit-income/{id}', [
		'uses'          =>  'IncomeController@editIncomeInfo',
		'as'            =>  'edit-income',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-income')
	]);

	Route::post('/update-income', [
		'uses'          =>  'IncomeController@updateIncomeInfo',
		'as'            =>  'update-income',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-income')
	]);

	Route::get('/create-sub-income-code/{id}', [
		'uses'          =>  'IncomeController@createSubIncomeCode',
		'as'            =>  'create-sub-income-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-sub-income-code')
	]);

	Route::post('/new-sub-income', [
		'uses'          =>  'IncomeController@createSubIncomeInfo',
		'as'            =>  'new-sub-income',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-sub-income')
	]);

	Route::get('/edit-sub-income/{id}', [
		'uses'          =>  'IncomeController@editSubIncomeInfo',
		'as'            =>  'edit-sub-income',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-sub-income')
	]);

	Route::post('/update-sub-income', [
		'uses'          =>  'IncomeController@updateSubIncomeInfo',
		'as'            =>  'update-sub-income',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-sub-income')
	]);

	/*========== Income ============*/

	/*========== Expense ============*/

	Route::get('/view-expense', [
		'uses'          =>  'ExpenseController@index',
		'as'            =>  'view-expense',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('view-expense')
	]);

	Route::post('/new-expense', [
		'uses'          =>  'ExpenseController@createExpenseInfo',
		'as'            =>  'new-expense',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-expense')
	]);

	Route::get('/edit-expense/{id}', [
		'uses'          =>  'ExpenseController@editExpenseInfo',
		'as'            =>  'edit-expense',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-expense')
	]);

	Route::post('/update-expense', [
		'uses'          =>  'ExpenseController@updateExpenseInfo',
		'as'            =>  'update-expense',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-expense')
	]);


	Route::get('/create-sub-expense-code/{id}', [
		'uses'          =>  'ExpenseController@createSubExpenseCode',
		'as'            =>  'create-sub-expense-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-sub-expense-code')
	]);

	Route::post('/new-sub-expense', [
		'uses'          => 'ExpenseController@createSubExpenseInfo',
		'as'            => 'new-sub-expense',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-sub-expense')
	]);

	Route::get('/edit-sub-expense/{id}', [
		'uses'          =>  'ExpenseController@editSubExpenseInfo',
		'as'            =>  'edit-sub-expense',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-sub-expense')
	]);

	Route::post('/update-sub-expense', [
		'uses'          =>  'ExpenseController@updateSubExpenseInfo',
		'as'            =>  'update-sub-expense',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-sub-expense')
	]);

	/*========== Expense ============*/

	/*========== Invoice ============*/

	Route::get('/invoice-info', [
		'uses'           =>  'InvoiceController@index',
		'as'            =>  'invoice-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('invoice-info')
	]);

	Route::get('/invoice/create', [
		'uses'           =>  'InvoiceController@createInvoiceInfo',
		'as'            =>  'create-invoice',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-invoice')
	]);

	Route::get('/get-all-invoice-product', [
		'uses'           =>  'InvoiceController@getAllInvoiceProduct',
		'as'            =>  'get-all-invoice-product',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('get-all-invoice-product')
	]);

	Route::get('/select-customer-info/{id}', [
		'uses'           =>  'InvoiceController@selectCustomerInfo',
		'as'            =>  'select-customer-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-customer-info')
	]);

	Route::get('/select-invoice-product-info/{id}', [
		'uses'           =>  'InvoiceController@selectInvoiceProductInfo',
		'as'            =>  'select-invoice-product-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-invoice-product-info')
	]);

	Route::post('/new-invoice', [
		'uses'           =>  'InvoiceController@saveInvoiceInfo',
		'as'            =>  'new-invoice',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-invoice')
	]);

	Route::get('/edit-invoice/{id}', [
		'uses'           =>  'InvoiceController@editInvoiceInfo',
		'as'            =>  'edit-invoice',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-invoice')
	]);

	Route::get('/check-customer-invoice/{customerId}/{invoiceId}', [
		'uses'          =>  'InvoiceController@checkCustomerInvoice',
		'as'            =>  'check-customer-invoice',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('check-customer-invoice')
	]);

	Route::post('/update-invoice', [
		'uses'           =>  'InvoiceController@updateInvoiceInfo',
		'as'            =>  'update-invoice',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-invoice')
	]);

	Route::post('/delete-invoice-details-info', [
		'uses'           =>  'InvoiceController@deleteInvoiceDetailItem',
		'as'            =>  'delete-invoice-details-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('delete-invoice-details-info')
	]);

	Route::post('/delete-invoice-info', [
		'uses'           =>  'InvoiceController@deleteInvoiceInfo',
		'as'            =>  'delete-invoice-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('delete-invoice-info')
	]);

	/*========== Invoice ============*/

	/*========== Customer ============*/

	Route::get('/customer-info', [
		'uses'           =>  'CustomerController@index',
		'as'            =>  'customer-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('customer-info')
	]);

	Route::post('/new-customer', [
		'uses'           =>  'CustomerController@createCustomerInfo',
		'as'            =>  'new-customer',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-customer')
	]);

	Route::get('/edit-customer/{id}', [
		'uses'           =>  'CustomerController@editCustomerInfo',
		'as'            =>  'edit-customer',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-customer')
	]);

	Route::post('/update-customer', [
		'uses'          =>  'CustomerController@updateCustomerInfo',
		'as'            =>  'update-customer',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-customer')
	]);

	Route::post('/delete-customer', [
		'uses'          =>  'CustomerController@deleteCustomerInfo',
		'as'            =>  'delete-customer',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('delete-customer')
	]);

	/*========== Customer ============*/

	/*========== Product ============*/

	Route::get('/sales/product-info', [
		'uses'           =>  'ProductController@index',
		'as'            =>  'sales.product-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('sales.product-info')
	]);

	Route::get('/purchase/product-info', [
		'uses'           =>  'ProductController@index',
		'as'            =>  'purchase.product-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('purchase.product-info')
	]);

	Route::post('/new-product', [
		'uses'           =>  'ProductController@createProductInfo',
		'as'            =>  'new-product',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-product')
	]);
	Route::get('/product-info-by-id/{id}', [
		'uses'           =>  'ProductController@getProductInfoById',
		'as'            =>  'product-info-by-id',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('product-info-by-id')
	]);

	Route::get('/product-invoice-bill-status/{id}', [
		'uses'           =>  'ProductController@productInvoiceBillStatus',
		'as'            =>  'product-invoice-bill-status',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('product-invoice-bill-status')
	]);



	Route::post('/update-product', [
		'uses'           =>  'ProductController@updateProductInfo',
		'as'            =>  'update-product',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-product')
	]);

	Route::post('/delete-product', [
		'uses'           =>  'ProductController@deleteProductInfo',
		'as'            =>  'delete-product',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('delete-product')
	]);

	/*========== Product ============*/

	/*========== Bill ============*/

	Route::get('/bill-info', [
		'uses'          =>  'BillController@index',
		'as'            =>  'bill-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('bill-info')
	]);

	Route::get('/create-bill', [
		'uses'          =>  'BillController@createBillInfo',
		'as'            =>  'create-bill',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('create-bill')
	]);

	Route::get('/select-vendor-info/{id}', [
		'uses'          =>  'BillController@selectVendorInfo',
		'as'            =>  'select-vendor-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-vendor-info')
	]);

	Route::get('/select-bill-product-info/{id}', [
		'uses'          =>  'BillController@selectBillProductInfo',
		'as'            =>  'select-bill-product-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-bill-product-info')
	]);

	Route::post('/new-bill', [
		'uses'          =>  'BillController@saveBillInfo',
		'as'            =>  'new-bill',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-bill')
	]);

	Route::get('/edit-bill/{id}', [
		'uses'          =>  'BillController@editBillInfo',
		'as'            =>  'edit-bill',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-bill')
	]);

	Route::get('/check-vendor-bill/{vendorId}/{billId}', [
		'uses'          =>  'BillController@checkVendorBill',
		'as'            =>  'check-vendor-bill',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('check-vendor-bill')
	]);

	Route::post('/update-bill', [
		'uses'          =>  'BillController@updateBillInfo',
		'as'            =>  'update-bill',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-bill')
	]);

	Route::post('/delete-bill-details-info', [
		'uses'          =>  'BillController@deleteBillDetailsInfo',
		'as'            =>  'delete-bill-details-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('delete-bill-details-info')
	]);

	Route::post('/delete-bill-info', [
		'uses'          =>  'BillController@deleteBillInfo',
		'as'            =>  'delete-bill-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('delete-bill-info')
	]);

	/*========== Bill ============*/

	/*========== Vendor ============*/

	Route::get('/vendor-info', [
		'uses'          =>  'VendorController@index',
		'as'            =>  'vendor-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('vendor-info')
	]);

	Route::post('/new-vendor', [
		'uses'          =>  'VendorController@createVendorInfo',
		'as'            =>  'new-vendor',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-vendor')
	]);

	Route::get('/edit-vendor/{id}', [
		'uses'          =>  'VendorController@editVendorInfo',
		'as'            =>  'edit-vendor',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-vendor')
	]);

	Route::post('/update-vendor', [
		'uses'          =>  'VendorController@updateVendorInfo',
		'as'            =>  'update-vendor',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-vendor')
	]);

	Route::post('/delete-vendor', [
		'uses'          =>  'VendorController@deleteVendorInfo',
		'as'            =>  'delete-vendor',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('delete-vendor')
	]);

	/*========== Vendor ============*/

	/*========== Transaction ============*/

	Route::get('/transaction/add', [
		'uses'          =>  'SimpleTransactionController@index',
		'as'            =>  'add-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('add-transaction')
	]);

	Route::get('/select-income-account', [
		'uses'          =>  'SimpleTransactionController@selectIncomeAccount',
		'as'            =>  'select-income-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-income-account')
	]);

	Route::get('/select-owners-equity-account', [
		'uses'          =>  'SimpleTransactionController@selectOwnersEquityAccount',
		'as'            =>  'select-owners-equity-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-owners-equity-account')
	]);

	Route::get('/select-expense-account', [
		'uses'          =>  'SimpleTransactionController@selectExpenseAccount',
		'as'            =>  'select-expense-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-expense-account')
	]);

	Route::get('/select-cash-bank-account', [
		'uses'          =>  'SimpleTransactionController@selectCashBankAccount',
		'as'            =>  'select-cash-bank-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-cash-bank-account')
	]);

	Route::post('/new-income-transaction', [
		'uses'          =>  'SimpleTransactionController@newIncomeTransaction',
		'as'            =>  'new-income-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-income-transaction')
	]);

	Route::post('/new-expense-transaction', [
		'uses'          =>  'SimpleTransactionController@newExpenseTransaction',
		'as'            =>  'new-expense-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-expense-transaction')
	]);

	Route::get('/select-invoice-info/{id}', [
		'uses'          =>  'SimpleTransactionController@selectInvoiceInfo',
		'as'            =>  'select-invoice-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-invoice-info')
	]);

	Route::get('/select-bill-info/{id}', [
		'uses'          =>  'SimpleTransactionController@selectBillInfo',
		'as'            =>  'select-bill-info',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-bill-info')
	]);

	Route::post('/new-transaction', [
		'uses'          =>  'SimpleTransactionController@newTransactionInfo',
		'as'            =>  'new-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-transaction')
	]);

	Route::post('/update-transaction', [
		'uses'          =>  'SimpleTransactionController@updateTransactionInfo',
		'as'            =>  'update-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-transaction')
	]);

	Route::get('/select-transaction-info-by-id/{id}', [
		'uses'          =>  'SimpleTransactionController@getTransactionInfoById',
		'as'            =>  'select-transaction-info-by-id',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-transaction-info-by-id')
	]);

	Route::get('/verified-transaction/{id}', [
		'uses'          =>  'SimpleTransactionController@verifiedTransactionInfoById',
		'as'            =>  'verified-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('verified-transaction')
	]);

	Route::get('/not-verified-transaction/{id}', [
		'uses'          =>  'SimpleTransactionController@notVerifiedTransactionInfoById',
		'as'            =>  'not-verified-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('not-verified-transaction')
	]);

	Route::get('/get-transaction-by-search-item/{searchItem}', [
		'uses'          =>  'SimpleTransactionController@getTransactionInfoBySearchItem',
		'as'            =>  'get-transaction-by-search-item',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('get-transaction-by-search-item')
	]);

	Route::get('/get-transaction-by-search-type/{searchItem}', [
		'uses'          =>  'SimpleTransactionController@getTransactionInfoBySearchType',
		'as'            =>  'get-transaction-by-search-type',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('get-transaction-by-search-type')
	]);

	Route::get('/get-transaction-by-account-category/{searchItem}', [
		'uses'          =>  'SimpleTransactionController@getTransactionInfoByAccountCategory',
		'as'            =>  'get-transaction-by-account-category',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('get-transaction-by-account-category')
	]);

	Route::get('/get-transaction-by-payment-account/{searchItem}', [
		'uses'          =>  'SimpleTransactionController@getTransactionInfoByPaymentAccount',
		'as'            =>  'get-transaction-by-payment-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('get-transaction-by-payment-account')
	]);

	Route::get('/get-transaction-by-date/{startDate}/{endDate}', [
		'uses'          =>  'SimpleTransactionController@getTransactionInfoByDate',
		'as'            =>  'get-transaction-by-date',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('get-transaction-by-date')
	]);

	/*========== Transaction ============*/

	/*========== Journal Transaction ============*/

	Route::get('/journal-transaction', [
		'uses'           =>  'JournalTransactionController@index',
		'as'            =>  'journal-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('journal-transaction')
	]);

	Route::get('/add-journal-transaction', [
		'uses'          =>  'JournalTransactionController@addJournalTransaction',
		'as'            =>  'add-journal-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('add-journal-transaction')
	]);

	Route::get('/select-asset-account', [
		'uses'          =>  'JournalTransactionController@selectAssetAccount',
		'as'            =>  'select-asset-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-asset-account')
	]);

	Route::get('/select-liabilities-account', [
		'uses'          =>  'JournalTransactionController@selectLiabilitiesAccount',
		'as'            =>  'select-liabilities-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-liabilities-account')
	]);

	Route::get('/select-journal-income-account', [
		'uses'          =>  'JournalTransactionController@selectJournalIncomeAccount',
		'as'            =>  'select-journal-income-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-journal-income-account')
	]);

	Route::get('/select-journal-expense-account', [
		'uses'          =>  'JournalTransactionController@selectJournalExpenseAccount',
		'as'            =>  'select-journal-expense-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-journal-expense-account')
	]);

	Route::get('/select-journal-owners-equity-account', [
		'uses'          =>  'JournalTransactionController@selectJournalOwnersEquityAccount',
		'as'            =>  'select-journal-owners-equity-account',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('select-journal-owners-equity-account')
	]);

	Route::post('/new-journal-transaction', [
		'uses'          =>  'JournalTransactionController@newJournalTransaction',
		'as'            =>  'new-journal-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-journal-transaction')
	]);

	Route::get('/edit-manual-journal/{id}', [
		'uses'          =>  'JournalTransactionController@editJournalTransaction',
		'as'            =>  'edit-manual-journal',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-manual-journal')
	]);

	Route::post('/update-journal-transaction', [
		'uses'          =>  'JournalTransactionController@updateJournalTransaction',
		'as'            =>  'update-journal-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-journal-transaction')
	]);

	/*========== Journal Transaction ============*/

	/*========== Report========Balance Sheet ============*/

	Route::get('/balance-sheet', [
		'uses'          =>  'BalanceSheetController@index',
		'as'            =>  'balance-sheet',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('balance-sheet')
	]);

	Route::get('/account-transaction', [
		'uses'          =>  'AccountTransactionController@index',
		'as'            =>  'account-transaction',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('account-transaction')
	]);

	Route::get('/get-account-name-by-code/{accountCode}', [
		'uses'          =>  'AccountTransactionController@getAccountNameByAccountCode',
		'as'            =>  'get-account-name-by-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('get-account-name-by-code')
	]);

	Route::get('/get-transaction-by-account-code/{transactionAccountCode}/{transactionsStartDate}/{transactionsEndDate}', [
		'uses'          =>  'AccountTransactionController@getTransactionsByAccountCode',
		'as'            =>  'get-transaction-by-account-code',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('get-transaction-by-account-code')
	]);

	/*========== Report========Balance Sheet ============*/

	/*========== User Info ============*/

	Route::get('/add-user', [
		'uses'          =>  'UserController@index',
		'as'            =>  'add-user',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('add-user')
	]);

	Route::post('/new-user', [
		'uses'          =>  'UserController@createUser',
		'as'            =>  'new-user',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-user')
	]);

	Route::get('/manage-user', [
		'uses'          =>  'UserController@manageUser',
		'as'            =>  'manage-user',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('manage-user')
	]);

	Route::get('/edit-user/{id}', [
		'uses'          =>  'UserController@editUser',
		'as'            =>  'edit-user',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-user')
	]);

	Route::post('/update-user', [
		'uses'          =>  'UserController@updateUser',
		'as'            =>  'update-user',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-user')
	]);


	Route::get('/add-role', [
		'uses'          =>  'RoleController@index',
		'as'            =>  'add-role',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('add-role')
	]);

	Route::post('/new-role', [
		'uses'          =>  'RoleController@createRole',
		'as'            =>  'new-role',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('new-role')
	]);

	Route::get('/manage-role', [
		'uses'          =>  'RoleController@manageRole',
		'as'            =>  'manage-role',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('manage-role')
	]);

	Route::get('/edit-role/{id}', [
		'uses'          =>  'RoleController@editRole',
		'as'            =>  'edit-role',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-role')
	]);

	Route::post('/update-role', [
		'uses'          =>  'RoleController@updateRole',
		'as'            =>  'update-role',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('update-role')
	]);

	/*========== User Info ============*/
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

