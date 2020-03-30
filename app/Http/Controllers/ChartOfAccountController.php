<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetAccount;
use App\Expense;
use App\ExpenseAccount;
use App\Income;
use App\IncomeAccount;
use App\Liabilitie;
use App\LiabilitieAccount;
use App\OwnersEquity;
use App\OwnersEquityAccount;
use App\SubAsset;
use App\SubExpense;
use App\SubIncome;
use App\SubLiabilitie;
use App\SubOwnersEquity;
use Illuminate\Http\Request;

class ChartOfAccountController extends Controller {
	public function index() {
		return view( 'chart-of-account.chart-of-account', [
			'assets'               => Asset::all(),
			'subAssets'            => SubAsset::all(),
			'assetsAccounts'       => AssetAccount::all(),
			'liabilities'          => Liabilitie::all(),
			'subLiabilities'       => SubLiabilitie::all(),
			'liabilitieAccounts'   => LiabilitieAccount::all(),
			'ownersEquities'       => OwnersEquity::all(),
			'subOwnersEquities'    => SubOwnersEquity::all(),
			'ownersEquityAccounts' => OwnersEquityAccount::all(),
			'incomes'              => Income::all(),
			'subIncomes'           => SubIncome::all(),
			'incomeAccounts'       => IncomeAccount::all(),
			'expenses'             => Expense::all(),
			'subExpenses'          => SubExpense::all(),
			'expenseAccounts'      => ExpenseAccount::all()
		] );
	}

	public function createAssetAccountCode( $id ) {
		$subAsset     = SubAsset::find( $id );
		$assetAccount = AssetAccount::where( 'sub_asset_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $assetAccount ) {
			return $assetAccount->account_code + 1;
		} else {
			Return $subAsset->sub_asset_code . '01';
		}
	}


	public function createAssetAccountInfo( Request $request ) {
		$assetAccount = new AssetAccount();
		$assetAccount->saveChartOfAccountAssetAccount( $request );

		return redirect( '/chart-of-account' );
	}


	public function createLiabilitieAccountCode( $id ) {
		$subLiabilitie     = SubLiabilitie::find( $id );
		$liabilitieAccount = LiabilitieAccount::where( 'sub_liabilitie_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $liabilitieAccount ) {
			return $liabilitieAccount->account_code + 1;
		} else {
			return $subLiabilitie->sub_liabilitie_code . '01';
		}
	}

	public function createLiabilitieAccountInfo( Request $request ) {
		$liabilitieAccount = new LiabilitieAccount();
		$liabilitieAccount->saveChartOfAccountLiabilitieAccount( $request );

		return redirect( '/chart-of-account' );
	}

	public function createOwnersEquityAccountCode( $id ) {
		$subOwnerEquity     = SubOwnersEquity::find( $id );
		$ownerEquityAccount = OwnersEquityAccount::where( 'sub_owners_equity_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $ownerEquityAccount ) {
			return $ownerEquityAccount->account_code + 1;
		} else {
			return $subOwnerEquity->sub_owners_equity_code . '01';
		}
	}

	public function createOwnersEquityAccountInfo( Request $request ) {
		$ownersEquityAccount = new OwnersEquityAccount();
		$ownersEquityAccount->saveChartOfAccountOwnersEquityAccount( $request );

		return redirect( '/chart-of-account' );
	}


	public function createIncomeAccountCode( $id ) {
		$subIncome     = SubIncome::find( $id );
		$incomeAccount = IncomeAccount::where( 'sub_income_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $incomeAccount ) {
			return $incomeAccount->account_code + 1;
		} else {
			return $subIncome->sub_income_code . '01';
		}
	}

	public function createIncomeAccountInfo( Request $request ) {
		$incomeAccount = new IncomeAccount();
		$incomeAccount->saveChartOfAccountIncomeAccount( $request );

		return redirect( '/chart-of-account' );
	}


	public function createExpenseAccountCode( $id ) {
		$subExpense     = SubExpense::find( $id );
		$expenseAccount = ExpenseAccount::where( 'sub_expense_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $expenseAccount ) {
			return $expenseAccount->account_code + 1;
		} else {
			return $subExpense->sub_expense_code . '01';
		}
	}

	public function createExpenseAccountInfo( Request $request ) {
		$expenseAccount = new ExpenseAccount();
		$expenseAccount->saveChartOfAccountExpenseAccount( $request );

		return redirect( '/chart-of-account' );
	}

	public function assetAccountNameUpdate( $accountName, $id ) {
		$assetAccount = AssetAccount::find( $id );
		$assetAccount->updateName( $accountName );

		return 'Account Name Update Successfully';
	}

	public function assetAccountDescriptionUpdate( $accountDescription, $id ) {
		$assetAccount = AssetAccount::find( $id );
		$assetAccount->updateDescription( $accountDescription );

		return 'Account Description Update Successfully';
	}

	public function liabilitiesAccountNameUpdate( $accountName, $id ) {
		$liabilitiesAccount = LiabilitieAccount::find( $id );
		$liabilitiesAccount->updateName( $accountName );

		return 'Account Name Update Successfully';
	}

	public function liabilitiesAccountDescriptionUpdate( $accountDescription, $id ) {
		$liabilitiesAccount = LiabilitieAccount::find( $id );
		$liabilitiesAccount->updateDescription( $accountDescription );

		return 'Account Description Update Successfully';
	}

	public function ownersEquityAccountNameUpdate( $accountName, $id ) {
		$ownersEquityAccount = OwnersEquityAccount::find( $id );
		$ownersEquityAccount->updateName( $accountName );

		return 'Account Name Update Successfully';
	}

	public function ownersEquityAccountDescriptionUpdate( $accountDescription, $id ) {
		$ownersEquityAccount = OwnersEquityAccount::find( $id );
		$ownersEquityAccount->updateDescription( $accountDescription );

		return 'Account Description Update Successfully';
	}

	public function incomeAccountNameUpdate( $accountName, $id ) {
		$incomeAccount = IncomeAccount::find( $id );
		$incomeAccount->updateName( $accountName );

		return 'Account Name Update Successfully';
	}

	public function incomeAccountDescriptionUpdate( $accountDescription, $id ) {
		$incomeAccount = IncomeAccount::find( $id );
		$incomeAccount->updateDescription( $accountDescription );

		return 'Account Description Update Successfully';
	}

	public function expenseAccountNameUpdate( $accountName, $id ) {
		$expenseAccount = ExpenseAccount::find( $id );
		$expenseAccount->updateName( $accountName );

		return 'Account Name Update Successfully';
	}

	public function expenseAccountDescriptionUpdate( $accountDescription, $id ) {
		$expenseAccount = ExpenseAccount::find( $id );
		$expenseAccount->updateDescription( $accountDescription );

		return 'Account Description Update Successfully';
	}
}
