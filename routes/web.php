<?php

use App\Helpers\RoleName;


Route::get( "/404", "ErrorHandlerController@errorCode404" );
Route::get( "/405", "ErrorHandlerController@errorCode405" );

Route::get( '/', 'Auth\LoginController@showLoginForm' )->name( '/' );

Route::group( [ 'middleware' => 'admin' ], function () {
	/*========== Assets ============*/
	Route::get( '/view-asset', [
		'uses'       => 'AssetController@index',
		'as'         => 'view-asset',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'view-asset' )
	] );

	Route::post( '/new-asset', [
		'uses'       => 'AssetController@createAssetInfo',
		'as'         => 'new-asset',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'view-asset' )
	] );

	Route::post( '/update-asset', [
		'uses'       => 'AssetController@updateAssetInfo',
		'as'         => 'update-asset',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-asset' )
	] );

	Route::post( '/new-sub-asset', [
		'uses'       => 'AssetController@createSubAssetInfo',
		'as'         => 'new-sub-asset',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-sub-asset' )
	] );

	Route::post( '/update-sub-asset', [
		'uses'       => 'AssetController@updateSubAssetInfo',
		'as'         => 'update-sub-asset',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-sub-asset' )
	] );

	/*========== Assets ============*/

	/*========== Liabilities ============*/

	Route::get( '/view-liabilities', [
		'uses'       => 'LiabilitieController@index',
		'as'         => 'view-liabilities',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'view-liabilities' )
	] );

	Route::post( '/new-liabilities', [
		'uses'       => 'LiabilitieController@createLiabilitieInfo',
		'as'         => 'new-liabilities',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-liabilities' )
	] );

	Route::post( '/update-liabilities', [
		'uses'       => 'LiabilitieController@updateLiabilitieInfo',
		'as'         => 'update-liabilities',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-liabilities' )
	] );

	Route::post( '/new-sub-liabilities', [
		'uses'       => 'LiabilitieController@createSubLiabilitieInfo',
		'as'         => 'new-sub-liabilities',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-sub-liabilities' )
	] );

	Route::post( '/update-sub-liabilities', [
		'uses'       => 'LiabilitieController@updateSubLiabilitieInfo',
		'as'         => 'update-sub-liabilities',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-sub-liabilities' )
	] );

	/*========== Liabilities ============*/

	/*========== chart of account ============*/
	Route::get( '/chart-of-account', [
		'uses'       => 'ChartOfAccountController@index',
		'as'         => 'chart-of-account',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'chart-of-account' )
	] );

	Route::post( '/new-asset-account', [
		'uses'       => 'ChartOfAccountController@createAssetAccountInfo',
		'as'         => 'new-asset-account',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-asset-account' )
	] );

	Route::post( '/new-liabilitie-account', [
		'uses'       => 'ChartOfAccountController@createLiabilitieAccountInfo',
		'as'         => 'new-liabilitie-account',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-liabilitie-account' )
	] );

	Route::post( '/new-owners-equity-account', [
		'uses'       => 'ChartOfAccountController@createOwnersEquityAccountInfo',
		'as'         => 'new-owners-equity-account',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-owners-equity-account' )
	] );

	Route::post( '/new-income-account', [
		'uses'       => 'ChartOfAccountController@createIncomeAccountInfo',
		'as'         => 'new-income-account',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-income-account' )
	] );

	Route::post( '/new-expense-account', [
		'uses'       => 'ChartOfAccountController@createExpenseAccountInfo',
		'as'         => 'new-expense-account',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-expense-account' )
	] );

	/*========== chart of account ============*/

	/*========== Owners Equity ============*/

	Route::get( '/owners-equity', [
		'uses'       => 'OwnersEquityController@index',
		'as'         => 'owners-equity',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'owners-equity' )
	] );

	Route::post( '/new-owners-equity', [
		'uses'       => 'OwnersEquityController@createOwnersEquityInfo',
		'as'         => 'new-owners-equity',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-owners-equity' )
	] );

	Route::post( '/update-owners-equity', [
		'uses'       => 'OwnersEquityController@updateOwnersEquityInfo',
		'as'         => 'update-owners-equity',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-owners-equity' )
	] );


	Route::post( '/new-sub-owners-equity', [
		'uses'       => 'OwnersEquityController@createSubOwnersEquityInfo',
		'as'         => 'new-sub-owners-equity',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-sub-owners-equity' )
	] );

	Route::post( '/update-sub-owners-equity', [
		'uses'       => 'OwnersEquityController@updateSubOwnersEquityInfo',
		'as'         => 'update-sub-owners-equity',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-sub-owners-equity' )
	] );

	/*========== Owners Equity ============*/

	/*========== Income ============*/

	Route::get( '/view-income', [
		'uses'       => 'IncomeController@index',
		'as'         => 'view-income',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'view-income' )
	] );

	Route::post( '/new-income', [
		'uses'       => 'IncomeController@createIncomeInfo',
		'as'         => 'new-income',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-income' )
	] );

	Route::post( '/update-income', [
		'uses'       => 'IncomeController@updateIncomeInfo',
		'as'         => 'update-income',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-income' )
	] );

	Route::post( '/new-sub-income', [
		'uses'       => 'IncomeController@createSubIncomeInfo',
		'as'         => 'new-sub-income',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-sub-income' )
	] );

	Route::post( '/update-sub-income', [
		'uses'       => 'IncomeController@updateSubIncomeInfo',
		'as'         => 'update-sub-income',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-sub-income' )
	] );

	/*========== Income ============*/

	/*========== Expense ============*/

	Route::get( '/view-expense', [
		'uses'       => 'ExpenseController@index',
		'as'         => 'view-expense',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'view-expense' )
	] );

	Route::post( '/new-expense', [
		'uses'       => 'ExpenseController@createExpenseInfo',
		'as'         => 'new-expense',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-expense' )
	] );

	Route::post( '/update-expense', [
		'uses'       => 'ExpenseController@updateExpenseInfo',
		'as'         => 'update-expense',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-expense' )
	] );

	Route::post( '/new-sub-expense', [
		'uses'       => 'ExpenseController@createSubExpenseInfo',
		'as'         => 'new-sub-expense',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-sub-expense' )
	] );

	Route::post( '/update-sub-expense', [
		'uses'       => 'ExpenseController@updateSubExpenseInfo',
		'as'         => 'update-sub-expense',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-sub-expense' )
	] );

	/*========== Expense ============*/

	/*========== Invoice ============*/

	Route::get( '/invoice-info', [
		'uses'       => 'InvoiceController@index',
		'as'         => 'invoice-info',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'invoice-info' )
	] );

	Route::get( '/create-invoice', [
		'uses'       => 'InvoiceController@createInvoiceInfo',
		'as'         => 'create-invoice',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'create-invoice' )
	] );

	Route::get( '/get-all-invoice-product', [
		'uses'       => 'InvoiceController@getAllInvoiceProduct',
		'as'         => 'get-all-invoice-product',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'get-all-invoice-product' )
	] );

	Route::post( '/new-invoice', [
		'uses'       => 'InvoiceController@saveInvoiceInfo',
		'as'         => 'new-invoice',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-invoice' )
	] );

	Route::get( '/edit-invoice/{id}', [
		'uses'       => 'InvoiceController@editInvoiceInfo',
		'as'         => 'edit-invoice',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'edit-invoice' )
	] );

	Route::post( '/update-invoice', [
		'uses'       => 'InvoiceController@updateInvoiceInfo',
		'as'         => 'update-invoice',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-invoice' )
	] );

	/*========== Invoice ============*/

	/*========== Customer ============*/

	Route::get( '/customer-info', [
		'uses'       => 'CustomerController@index',
		'as'         => 'customer-info',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'customer-info' )
	] );

	Route::post( '/new-customer', [
		'uses'       => 'CustomerController@createCustomerInfo',
		'as'         => 'new-customer',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-customer' )
	] );

	Route::post( '/update-customer', [
		'uses'       => 'CustomerController@updateCustomerInfo',
		'as'         => 'update-customer',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-customer' )
	] );

	/*========== Customer ============*/

	/*========== Product ============*/

	Route::get( '/sales/product-info', [
		'uses'       => 'ProductController@index',
		'as'         => 'sales.product-info',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'sales.product-info' )
	] );

	Route::get( '/purchase/product-info', [
		'uses'       => 'ProductController@index',
		'as'         => 'purchase.product-info',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'purchase.product-info' )
	] );

	Route::post( '/new-product', [
		'uses'       => 'ProductController@createProductInfo',
		'as'         => 'new-product',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-product' )
	] );

	Route::post( '/update-product', [
		'uses'       => 'ProductController@updateProductInfo',
		'as'         => 'update-product',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-product' )
	] );

	/*========== Product ============*/

	/*========== Bill ============*/

	Route::get( '/bill-info', [
		'uses'       => 'BillController@index',
		'as'         => 'bill-info',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'bill-info' )
	] );

	Route::get( '/create-bill', [
		'uses'       => 'BillController@createBillInfo',
		'as'         => 'create-bill',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'create-bill' )
	] );

	Route::post( '/new-bill', [
		'uses'       => 'BillController@saveBillInfo',
		'as'         => 'new-bill',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-bill' )
	] );

	Route::get( '/edit-bill/{id}', [
		'uses'       => 'BillController@editBillInfo',
		'as'         => 'edit-bill',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'edit-bill' )
	] );

	Route::post( '/update-bill', [
		'uses'       => 'BillController@updateBillInfo',
		'as'         => 'update-bill',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-bill' )
	] );

	/*========== Bill ============*/

	/*========== Vendor ============*/

	Route::get( '/vendor-info', [
		'uses'       => 'VendorController@index',
		'as'         => 'vendor-info',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'vendor-info' )
	] );

	Route::post( '/new-vendor', [
		'uses'       => 'VendorController@createVendorInfo',
		'as'         => 'new-vendor',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-vendor' )
	] );

	Route::post( '/update-vendor', [
		'uses'       => 'VendorController@updateVendorInfo',
		'as'         => 'update-vendor',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-vendor' )
	] );

	/*========== Vendor ============*/

	/*========== Transaction ============*/

	Route::get( '/add-transaction', [
		'uses'       => 'SimpleTransactionController@index',
		'as'         => 'add-transaction',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'add-transaction' )
	] );

	Route::post( '/new-transaction', [
		'uses'       => 'SimpleTransactionController@newTransactionInfo',
		'as'         => 'new-transaction',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-transaction' )
	] );

	Route::post( '/update-transaction', [
		'uses'       => 'SimpleTransactionController@updateTransactionInfo',
		'as'         => 'update-transaction',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-transaction' )
	] );

	/*========== Transaction ============*/

	/*========== Journal Transaction ============*/

	Route::get( '/journal-transaction', [
		'uses'       => 'JournalTransactionController@index',
		'as'         => 'journal-transaction',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'journal-transaction' )
	] );

	Route::get( '/add-journal-transaction', [
		'uses'       => 'JournalTransactionController@addJournalTransaction',
		'as'         => 'add-journal-transaction',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'add-journal-transaction' )
	] );

	Route::post( '/new-journal-transaction', [
		'uses'       => 'JournalTransactionController@newJournalTransaction',
		'as'         => 'new-journal-transaction',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-journal-transaction' )
	] );

	Route::get( '/edit-manual-journal/{id}', [
		'uses'       => 'JournalTransactionController@editJournalTransaction',
		'as'         => 'edit-manual-journal',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'edit-manual-journal' )
	] );

	Route::post( '/update-journal-transaction', [
		'uses'       => 'JournalTransactionController@updateJournalTransaction',
		'as'         => 'update-journal-transaction',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-journal-transaction' )
	] );

	/*========== Journal Transaction ============*/

	/*========== Voucher ============*/

	/*========== All Voucher ============*/
	Route::get( '/voucher', [
		'uses'       => 'VoucherController@index',
		'as'         => 'voucher',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'voucher' )
	] );
	/*========== All Voucher ============*/

	Route::get( '/payment-voucher', [
		'uses'  => 'VoucherController@paymentVoucher',
		'as'    => 'payment-voucher',
		'roles' => RoleName::getRoleName( 'payment-voucher' )
	] );

	Route::post( '/new-payment-voucher', [
		'uses'  => 'VoucherController@newPaymentVoucher',
		'as'    => 'new-payment-voucher',
		'roles' => RoleName::getRoleName( 'new-payment-voucher' )
	] );

	Route::get( '/credit-voucher', [
		'uses'  => 'VoucherController@creditVoucher',
		'as'    => 'credit-voucher',
		'roles' => RoleName::getRoleName( 'credit-voucher' )
	] );

	Route::post( '/new-credit-voucher', [
		'uses'  => 'VoucherController@newCreditVoucher',
		'as'    => 'new-credit-voucher',
		'roles' => RoleName::getRoleName( 'new-credit-voucher' )
	] );

	Route::get( '/journal-voucher', [
		'uses'  => 'VoucherController@journalVoucher',
		'as'    => 'journal-voucher',
		'roles' => RoleName::getRoleName( 'journal-voucher' )
	] );

	Route::post( '/new-journal-voucher', [
		'uses'  => 'VoucherController@newJournalVoucher',
		'as'    => 'new-journal-voucher',
		'roles' => RoleName::getRoleName( 'new-journal-voucher' )
	] );

	Route::post( '/print-journal-voucher', [
		'uses'  => 'VoucherController@newJournalVoucher',
		'as'    => 'new-journal-voucher',
		'roles' => RoleName::getRoleName( 'new-journal-voucher' )
	] );

	Route::get( '/print/journal-voucher', [
		'uses'  => 'VoucherController@printJournalVoucher',
		'as'    => 'print-journal-voucher',
		'roles' => RoleName::getRoleName( 'print-journal-voucher' )
	] );

	Route::get( '/print-voucher/{id}', [
		'uses'  => 'VoucherController@printVoucherInfo',
		'as'    => 'print-voucher',
		'roles' => RoleName::getRoleName( 'print-voucher' )
	] );

	Route::get( '/edit-voucher/{id}', [
		'uses'  => 'VoucherController@editVoucherInfo',
		'as'    => 'edit-voucher',
		'roles' => RoleName::getRoleName( 'edit-voucher' )
	] );

	/*========== Voucher ============*/

	/*========== Report========Balance Sheet ============*/

	Route::get( '/balance-sheet', [
		'uses'       => 'BalanceSheetController@index',
		'as'         => 'balance-sheet',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'balance-sheet' )
	] );

	Route::get( '/account-transaction', [
		'uses'       => 'AccountTransactionController@index',
		'as'         => 'account-transaction',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'account-transaction' )
	] );

	/*========== Report========Balance Sheet ============*/

	/*========== User Info ============*/

	Route::get( '/add-user', [
		'uses'       => 'UserController@index',
		'as'         => 'add-user',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'add-user' )
	] );

	Route::post( '/new-user', [
		'uses'       => 'UserController@createUser',
		'as'         => 'new-user',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-user' )
	] );

	Route::get( '/manage-user', [
		'uses'       => 'UserController@manageUser',
		'as'         => 'manage-user',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'manage-user' )
	] );

	Route::get( '/edit-user/{id}', [
		'uses'       => 'UserController@editUser',
		'as'         => 'edit-user',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'edit-user' )
	] );

	Route::post( '/update-user', [
		'uses'       => 'UserController@updateUser',
		'as'         => 'update-user',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-user' )
	] );


	Route::get( '/add-role', [
		'uses'       => 'RoleController@index',
		'as'         => 'add-role',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'add-role' )
	] );

	Route::post( '/new-role', [
		'uses'       => 'RoleController@createRole',
		'as'         => 'new-role',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'new-role' )
	] );

	Route::get( '/manage-role', [
		'uses'       => 'RoleController@manageRole',
		'as'         => 'manage-role',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'manage-role' )
	] );

	Route::get( '/edit-role/{id}', [
		'uses'       => 'RoleController@editRole',
		'as'         => 'edit-role',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'edit-role' )
	] );

	Route::post( '/update-role', [
		'uses'       => 'RoleController@updateRole',
		'as'         => 'update-role',
		'middleware' => 'roles',
		'roles'      => RoleName::getRoleName( 'update-role' )
	] );

	/*========== User Info ============*/
} );

Auth::routes();
Route::get( '/home', 'HomeController@index' )->name( 'home' );

