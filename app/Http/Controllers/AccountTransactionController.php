<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Transaction;
use Illuminate\Http\Request;
use App\IncomeAccount;
use App\ExpenseAccount;
use App\OwnersEquityAccount;
use App\AssetAccount;
use App\LiabilitieAccount;

class AccountTransactionController extends Controller
{
	public function index() {
		$incomeAccounts         = IncomeAccount::all();
		$expenseAccounts        = ExpenseAccount::all();
		$ownersEquityAccounts   = OwnersEquityAccount::all();
		$assetAccounts          = AssetAccount::all();
		$liabilitiesAccounts    = LiabilitieAccount::all();

		return view('account-transaction.index', [
			'incomeAccounts'        =>  $incomeAccounts,
			'expenseAccounts'       =>  $expenseAccounts,
			'ownersEquityAccounts'  =>  $ownersEquityAccounts,
			'assetAccounts'         =>  $assetAccounts,
			'liabilitiesAccounts'   =>  $liabilitiesAccounts
		]);
	}

	public function getAccountNameByAccountCode($accountCode) {
		$incomeAccount = IncomeAccount::where('account_code', $accountCode)->first();
		if($incomeAccount) {
			return json_encode($incomeAccount);
		}
		$expenseAccount = ExpenseAccount::where('account_code', $accountCode)->first();
		if($expenseAccount) {
			return json_encode($expenseAccount);
		}
		$ownersEquityAccount = OwnersEquityAccount::where('account_code', $accountCode)->first();
		if($ownersEquityAccount) {
			return json_encode($ownersEquityAccount);
		}
		$assetAccount = AssetAccount::where('account_code', $accountCode)->first();
		if($assetAccount) {
			return json_encode($assetAccount);
		}
		$liabilitiesAccount = LiabilitieAccount::where('account_code', $accountCode)->first();
		if($liabilitiesAccount) {
			return json_encode($liabilitiesAccount);
		}
	}

	public function getTransactionsByAccountCode($transactionAccountCode, $transactionsStartDate, $transactionsEndDate) {
		$transactions = Journal::where('account_code', $transactionAccountCode)
		                       ->whereDate('journal_date','>=', $transactionsStartDate)
		                       ->whereDate('journal_date', '<=', $transactionsEndDate)
		                       ->get();
		return json_encode($transactions);
	}
}
