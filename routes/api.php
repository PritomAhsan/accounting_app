<?php

use App\Helpers\RoleName;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*========== script.js ============*/
/*========== Accounts Head ============*/
/*========== Assets ============*/

Route::get('/edit-asset/{id}', [
	'uses'          =>  'AssetController@editAssetInfo',
	'as'            =>  'edit-asset',
]);

Route::get( '/create-sub-asset-code/{id}', [
	'uses'       => 'AssetController@createSubAssetCode',
	'as'         => 'create-sub-asset-code',
] );

Route::get( '/edit-sub-asset/{id}', [
	'uses'       => 'AssetController@editSubAssetInfo',
	'as'         => 'edit-sub-asset',
] );

Route::get( '/create-asset-account-code/{id}', [
	'uses'       => 'ChartOfAccountController@createAssetAccountCode',
	'as'         => 'create-asset-account-code',
] );

/*========== Liabilities ============*/

Route::get( '/edit-liabilities/{id}', [
	'uses'       => 'LiabilitieController@editLiabilitieInfo',
	'as'         => 'edit-liabilities',
] );

Route::get( '/create-sub-liabilitie-code/{id}', [
	'uses'       => 'LiabilitieController@createSubLiabilitieCode',
	'as'         => 'create-sub-liabilitie-code',
] );

Route::get( '/edit-sub-liabilities/{id}', [
	'uses'       => 'LiabilitieController@editSubLiabilitieInfo',
	'as'         => 'edit-sub-liabilities',
] );

Route::get( '/create-liabilitie-account-code/{id}', [
	'uses'       => 'ChartOfAccountController@createLiabilitieAccountCode',
	'as'         => 'create-liabilitie-account-code',
] );

/*========== Owners Equity ============*/

Route::get( '/edit-owners-equity/{id}', [
	'uses'       => 'OwnersEquityController@editOwnersEquityInfo',
	'as'         => 'edit-owners-equity',
] );

Route::get( '/create-sub-owners-equity-code/{id}', [
	'uses'       => 'OwnersEquityController@createSubOwnersEquityCode',
	'as'         => 'create-sub-owners-equity-code',
] );

Route::get( '/edit-sub-owners-equity/{id}', [
	'uses'       => 'OwnersEquityController@editSubOwnersEquityInfo',
	'as'         => 'edit-sub-owners-equity',
] );

Route::get( '/create-owners-equity-account-code/{id}', [
	'uses'       => 'ChartOfAccountController@createOwnersEquityAccountCode',
	'as'         => 'create-owners-equity-account-code',
] );

/*========== Income ============*/

Route::get( '/edit-income/{id}', [
	'uses'       => 'IncomeController@editIncomeInfo',
	'as'         => 'edit-income',
] );

Route::get( '/create-sub-income-code/{id}', [
	'uses'       => 'IncomeController@createSubIncomeCode',
	'as'         => 'create-sub-income-code',
] );

Route::get( '/edit-sub-income/{id}', [
	'uses'       => 'IncomeController@editSubIncomeInfo',
	'as'         => 'edit-sub-income',
] );

Route::get( '/create-income-account-code/{id}', [
	'uses'       => 'ChartOfAccountController@createIncomeAccountCode',
	'as'         => 'create-income-account-code',
] );

/*========== Expense ============*/

Route::get( '/edit-expense/{id}', [
	'uses'       => 'ExpenseController@editExpenseInfo',
	'as'         => 'edit-expense',
] );

Route::get( '/create-sub-expense-code/{id}', [
	'uses'       => 'ExpenseController@createSubExpenseCode',
	'as'         => 'create-sub-expense-code',
] );

Route::get( '/edit-sub-expense/{id}', [
	'uses'       => 'ExpenseController@editSubExpenseInfo',
	'as'         => 'edit-sub-expense',
] );

Route::get( '/create-expense-account-code/{id}', [
	'uses'       => 'ChartOfAccountController@createExpenseAccountCode',
	'as'         => 'create-expense-account-code',
] );

/*========== chart of account ============*/

Route::get( '/asset-account-name-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@assetAccountNameUpdate',
	'as'         => 'asset-account-name-update',
] );

Route::get( '/asset-account-description-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@assetAccountDescriptionUpdate',
	'as'         => 'asset-account-description-update',
] );

Route::get( '/liabilitie-account-name-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@liabilitiesAccountNameUpdate',
	'as'         => 'liabilitie-account-name-update',
] );

Route::get( '/liabilitie-account-description-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@liabilitiesAccountDescriptionUpdate',
	'as'         => 'liabilitie-account-description-update',
] );

Route::get( '/owners-equity-account-name-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@ownersEquityAccountNameUpdate',
	'as'         => 'owners-equity-account-name-update',
] );

Route::get( '/owners-equity-account-description-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@ownersEquityAccountDescriptionUpdate',
	'as'         => 'owners-equity-account-description-update',
] );

Route::get( '/income-account-name-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@incomeAccountNameUpdate',
	'as'         => 'income-account-name-update',
] );

Route::get( '/income-account-description-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@incomeAccountDescriptionUpdate',
	'as'         => 'income-account-description-update',
] );

Route::get( '/expense-account-name-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@expenseAccountNameUpdate',
	'as'         => 'expense-account-name-update',
] );

Route::get( '/expense-account-description-update/{value}/{id}', [
	'uses'       => 'ChartOfAccountController@expenseAccountDescriptionUpdate',
	'as'         => 'expense-account-description-update',
] );

/*========== Transaction ============*/

Route::get( '/select-transaction-info-by-id/{id}', [
	'uses'       => 'SimpleTransactionController@getTransactionInfoById',
	'as'         => 'select-transaction-info-by-id',
] );

/*========== Voucher ============*/
Route::get( '/select-voucher-info/{id}', [
	'uses'  => 'VoucherController@selectVoucherInfo',
	'as'    => 'select-voucher-info',
] );

/*===============invoice=================*/

Route::get( '/select-customer-info/{id}', [
	'uses'       => 'InvoiceController@selectCustomerInfo',
	'as'         => 'select-customer-info',
] );

Route::get( '/select-invoice-product-info/{id}', [
	'uses'       => 'InvoiceController@selectInvoiceProductInfo',
	'as'         => 'select-invoice-product-info',
] );

Route::get( '/check-customer-invoice/{customerId}/{invoiceId}', [
	'uses'       => 'InvoiceController@checkCustomerInvoice',
	'as'         => 'check-customer-invoice',
] );

Route::post( '/delete-invoice-details-info', [
	'uses'       => 'InvoiceController@deleteInvoiceDetailItem',
	'as'         => 'delete-invoice-details-info',
] );

Route::post( '/delete-invoice-info', [
	'uses'       => 'InvoiceController@deleteInvoiceInfo',
	'as'         => 'delete-invoice-info',
] );

/*=============== Bill ===================*/

Route::get( '/select-vendor-info/{id}', [
	'uses'       => 'BillController@selectVendorInfo',
	'as'         => 'select-vendor-info',
] );

Route::get( '/check-vendor-bill/{vendorId}/{billId}', [
	'uses'       => 'BillController@checkVendorBill',
	'as'         => 'check-vendor-bill',
] );

Route::get( '/select-bill-product-info/{id}', [
	'uses'       => 'BillController@selectBillProductInfo',
	'as'         => 'select-bill-product-info',
] );

Route::post( '/delete-bill-details-info', [
	'uses'       => 'BillController@deleteBillDetailsInfo',
	'as'         => 'delete-bill-details-info',
] );

Route::post( '/delete-bill-info', [
	'uses'       => 'BillController@deleteBillInfo',
	'as'         => 'delete-bill-info',
] );

/*========== Vendor ============*/

Route::get( '/edit-vendor/{id}', [
	'uses'       => 'VendorController@editVendorInfo',
	'as'         => 'edit-vendor',
] );

Route::post( '/delete-vendor', [
	'uses'       => 'VendorController@deleteVendorInfo',
	'as'         => 'delete-vendor',
] );

/*========== Customer ============*/

Route::get( '/edit-customer/{id}', [
	'uses'       => 'CustomerController@editCustomerInfo',
	'as'         => 'edit-customer',
] );

Route::post( '/delete-customer', [
	'uses'       => 'CustomerController@deleteCustomerInfo',
	'as'         => 'delete-customer',
] );

/*========== Product ============*/

Route::get( '/product-info-by-id/{id}', [
	'uses'       => 'ProductController@getProductInfoById',
	'as'         => 'product-info-by-id',
] );

Route::get( '/product-invoice-bill-status/{id}', [
	'uses'       => 'ProductController@productInvoiceBillStatus',
	'as'         => 'product-invoice-bill-status',
] );

Route::post( '/delete-product', [
	'uses'       => 'ProductController@deleteProductInfo',
	'as'         => 'delete-product',
] );

/*========== transaction.js ============*/
/*========== Transaction ============*/

Route::get( '/select-invoice-info/{id}', [
	'uses'       => 'SimpleTransactionController@selectInvoiceInfo',
	'as'         => 'select-invoice-info',
] );

Route::get( '/select-bill-info/{id}', [
	'uses'       => 'SimpleTransactionController@selectBillInfo',
	'as'         => 'select-bill-info',
] );

Route::get( '/select-income-account', [
	'uses'       => 'SimpleTransactionController@selectIncomeAccount',
	'as'         => 'select-income-account',
] );

Route::get( '/select-owners-equity-account', [
	'uses'       => 'SimpleTransactionController@selectOwnersEquityAccount',
	'as'         => 'select-owners-equity-account',
] );

Route::get( '/select-cash-bank-account', [
	'uses'       => 'SimpleTransactionController@selectCashBankAccount',
	'as'         => 'select-cash-bank-account',
] );

Route::post( '/new-income-transaction', [
	'uses'       => 'SimpleTransactionController@newIncomeTransaction',
	'as'         => 'new-income-transaction',
] );

Route::get( '/select-expense-account', [
	'uses'       => 'SimpleTransactionController@selectExpenseAccount',
	'as'         => 'select-expense-account',
] );

Route::post( '/new-expense-transaction', [
	'uses'       => 'SimpleTransactionController@newExpenseTransaction',
	'as'         => 'new-expense-transaction',
] );

Route::get( '/select-asset-account', [
	'uses'       => 'JournalTransactionController@selectAssetAccount',
	'as'         => 'select-asset-account',
] );

Route::get( '/select-liabilities-account', [
	'uses'       => 'JournalTransactionController@selectLiabilitiesAccount',
	'as'         => 'select-liabilities-account',
] );

Route::get( '/select-journal-income-account', [
	'uses'       => 'JournalTransactionController@selectJournalIncomeAccount',
	'as'         => 'select-journal-income-account',
] );

Route::get( '/select-journal-expense-account', [
	'uses'       => 'JournalTransactionController@selectJournalExpenseAccount',
	'as'         => 'select-journal-expense-account',
] );

Route::get( '/select-journal-owners-equity-account', [
	'uses'       => 'JournalTransactionController@selectJournalOwnersEquityAccount',
	'as'         => 'select-journal-owners-equity-account',
] );

Route::get( '/verified-transaction/{id}', [
	'uses'       => 'SimpleTransactionController@verifiedTransactionInfoById',
	'as'         => 'verified-transaction',
] );

Route::get( '/not-verified-transaction/{id}', [
	'uses'       => 'SimpleTransactionController@notVerifiedTransactionInfoById',
	'as'         => 'not-verified-transaction',
] );

Route::get( '/get-transaction-by-search-item/{searchItem}', [
	'uses'       => 'SimpleTransactionController@getTransactionInfoBySearchItem',
	'as'         => 'get-transaction-by-search-item',
] );

Route::get( '/get-transaction-by-search-type/{searchItem}', [
	'uses'       => 'SimpleTransactionController@getTransactionInfoBySearchType',
	'as'         => 'get-transaction-by-search-type',
] );

Route::get( '/get-transaction-by-account-category/{searchItem}', [
	'uses'       => 'SimpleTransactionController@getTransactionInfoByAccountCategory',
	'as'         => 'get-transaction-by-account-category',
] );

Route::get( '/get-transaction-by-payment-account/{searchItem}', [
	'uses'       => 'SimpleTransactionController@getTransactionInfoByPaymentAccount',
	'as'         => 'get-transaction-by-payment-account',
] );

Route::get( '/get-transaction-by-date/{startDate}/{endDate}', [
	'uses'       => 'SimpleTransactionController@getTransactionInfoByDate',
	'as'         => 'get-transaction-by-date',
] );

Route::get( '/get-transaction-by-account-code/{transactionAccountCode}/{transactionsStartDate}/{transactionsEndDate}', [
	'uses'       => 'AccountTransactionController@getTransactionsByAccountCode',
	'as'         => 'get-transaction-by-account-code',
] );

Route::get( '/get-account-name-by-code/{accountCode}', [
	'uses'       => 'AccountTransactionController@getAccountNameByAccountCode',
	'as'         => 'get-account-name-by-code',
] );


/*Route::group(['middleware' => 'admin'], function() {
	Route::get('/edit-asset/{id}', [
		'uses'          =>  'AssetController@editAssetInfo',
		'as'            =>  'edit-asset',
		'middleware'    =>  'roles',
		'roles'         =>  RoleName::getRoleName('edit-asset')
	]);
});*/
