<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\Transaction;
use App\AssetAccount;
use App\ExpenseAccount;
use App\IncomeAccount;
use App\Journal;
use App\LiabilitieAccount;
use App\ManualJournal;
use App\OwnersEquityAccount;
use Illuminate\Http\Request;

class JournalTransactionController extends Controller {
	public function index() {
		$manualTransactions = ManualJournal::orderBy( 'id', 'desc' )->get();

		return view( 'transaction.journal-transaction', [
			'manualTransactions' => $manualTransactions
		] );
	}

	public function addJournalTransaction() {
		return view( 'transaction.add-journal-transaction', [
			'assetAccounts'        => AssetAccount::all(),
			'liabilitiesAccounts'  => LiabilitieAccount::all(),
			'incomeAccounts'       => IncomeAccount::all(),
			'expenseAccounts'      => ExpenseAccount::all(),
			'ownersEquityAccounts' => OwnersEquityAccount::all()
		] );
	}

	public function selectAssetAccount() {
		$assetAccounts = AssetAccount::all();

		return json_encode( $assetAccounts );
	}

	public function selectLiabilitiesAccount() {
		$liabilitiesAccounts = LiabilitieAccount::all();

		return json_encode( $liabilitiesAccounts );
	}

	public function selectJournalIncomeAccount() {
		$incomeAccounts = IncomeAccount::all();

		return json_encode( $incomeAccounts );
	}

	public function selectJournalExpenseAccount() {
		$expenseAccounts = ExpenseAccount::all();

		return json_encode( $expenseAccounts );
	}

	public function selectJournalOwnersEquityAccount() {
		$ownersEquityAccounts = OwnersEquityAccount::all();

		return json_encode( $ownersEquityAccounts );
	}

	public function newJournalTransaction( Request $request ) {

		$voucher = new Voucher();
		$voucher->saveJournalTransactionVoucher( $request );
		foreach ( $request->transaction as $selectedOption ) {
			if ( $selectedOption['account_code'] == '230301' || $selectedOption['account_code'] == '230302' || $selectedOption['account_code'] == '230303' || $selectedOption['account_code'] == '230401' ) {
				$transaction = new Transaction();
				$transaction->saveJournalTransaction( $request, $selectedOption );
				// dd($transaction);
			}

			$journal = new Journal();
			$journal->saveJournalTransactionJournal( $transaction, $request, $selectedOption );

		}

		return redirect( '/journal-transaction' );
	}

	public function editJournalTransaction( $id ) {
		return view( 'transaction.edit-journal-transaction', [
			'manualJournal'        => ManualJournal::find( $id ),
			'assetAccounts'        => AssetAccount::all(),
			'liabilitiesAccounts'  => LiabilitieAccount::all(),
			'incomeAccounts'       => IncomeAccount::all(),
			'expenseAccounts'      => ExpenseAccount::all(),
			'ownersEquityAccounts' => OwnersEquityAccount::all(),
			'journalRecords'       => Journal::where( 'journal_id', 'man-' . $id )->get()
		] );
	}

	public function updateJournalTransaction( Request $request ) {
		$existManualJournal = ManualJournal::find( $request->manual_journal_id );
		$existManualJournal->saveManualJournal( $request );

		$existJournals = Journal::where( 'journal_id', 'man-' . $existManualJournal->id )->get();
		foreach ( $request->transaction as $selectedOption ) {
			foreach ( $existJournals as $existJournal ) {
				if ( $existJournal->account_code == $selectedOption['account_code'] && $existJournal->journal_id == 'man-' . $existManualJournal->id ) {
					$existJournal->saveJournalTransactionExistingJournal( $existManualJournal, $request, $selectedOption );
				}
			}
		}

		$count = 0;
		foreach ( $request->transaction as $selectedOption ) {
			foreach ( $existJournals as $existJournal ) {
				if ( $existJournal->account_code != $selectedOption['account_code'] ) {
					$count = $count + 1;
				} else {
					$count = 0;
				}
			}

			if ( $count == $existJournals->count() ) {
				$journal = new Journal();
				$journal->saveJournalTransactionExistingJournal( $existManualJournal, $request, $selectedOption );

				$count = 0;
			}
		}

		return redirect( '/journal-transaction' );
	}

}
