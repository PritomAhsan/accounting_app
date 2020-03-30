<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\Bill;
use App\ExpenseAccount;
use App\Invoice;
use App\Journal;
use App\LiabilitieAccount;
use App\OwnersEquityAccount;
use App\Transaction;
use Illuminate\Http\Request;
use App\AssetAccount;
use App\IncomeAccount;
use DB;

class SimpleTransactionController extends Controller {

	/*
        *Assets id 3 == Current Asset
        *Sub asset id 10 == Cash
        *Sub asset id 11 == Bank
    */
	public function index() {
		$transactions = DB::table( 'transactions' )
		                  ->join( 'asset_accounts', 'transactions.payment_account', '=', 'asset_accounts.account_code' )
		                  ->select( 'transactions.*', 'asset_accounts.account_name' )
		                  ->orderBy( 'transactions.id', 'desc' )
		                  ->get();

		$assetCashAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 10 )->get();
		$assetBankAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 11 )->get();
		$assetCashBankAccounts = $assetCashAccounts->merge( $assetBankAccounts );

		$assetAccounts        = AssetAccount::all();
		$liabilitiesAccounts  = LiabilitieAccount::all();
		$ownersEquityAccounts = OwnersEquityAccount::all();
		$incomeAccounts       = IncomeAccount::all();
		$expenseAccounts      = ExpenseAccount::all();


		return view( 'transaction.add-transaction', [
			'transactions'          => $transactions,
			'assetCashBankAccounts' => $assetCashBankAccounts,
			'assetAccounts'         => $assetAccounts,
			'liabilitiesAccounts'   => $liabilitiesAccounts,
			'ownersEquityAccounts'  => $ownersEquityAccounts,
			'incomeAccounts'        => $incomeAccounts,
			'expenseAccounts'       => $expenseAccounts
		] );
	}

	public function selectCashBankAccount() {
		$assetCashAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 10 )->get();
		$assetBankAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 11 )->get();
		$assetCashBankAccounts = $assetCashAccounts->merge( $assetBankAccounts );

		return json_encode( $assetCashBankAccounts );
	}

	public function selectIncomeAccount() {
		$incomeAccounts = IncomeAccount::all();

		return json_encode( $incomeAccounts );
	}

	public function selectOwnersEquityAccount() {
		$ownersEquityAccounts = OwnersEquityAccount::all();

		return json_encode( $ownersEquityAccounts );
	}

	public function selectExpenseAccount() {
		$expenseAccounts = ExpenseAccount::all();

		return json_encode( $expenseAccounts );
	}

	public function selectInvoiceInfo( $id ) {
		$invoice = Invoice::find( $id );

		return json_encode( $invoice );
	}

	public function selectBillInfo( $id ) {
		$bill = Bill::find( $id );

		return json_encode( $bill );
	}

	private function newInvoiceTransaction( $request, $voucher ) {
		$voucher->saveSimpleTransactionVoucherType( 'Invoice Voucher' );

		$transaction = new Transaction();
		$transaction->saveSimpleInvoiceTransaction( $request, $voucher );

		$journal = new Journal();
		$journal->saveSimpleTransactionInvoiceJournalCredit( $transaction, $voucher, $request );

		$invoice = Invoice::find( $request->invoice_id );
		$invoice->addToPaidAmount( $request->payment_amount );
		$invoice->updateInvoicePaymentStatusToComplete();

		$journal = new Journal();
		$journal->saveSimpleTransactionInvoiceJournalDebit( $transaction, $voucher, $request );
	}

	private function newBillTransaction( $request, $voucher ) {
		$voucher->saveSimpleTransactionVoucherType( 'Bill Voucher' );

		$transaction = new Transaction();
		$transaction->saveSimpleBillTransaction( $request, $voucher );

		$journal = new Journal();
		$journal->saveSimpleTransactionBillJournalCredit( $transaction, $voucher, $request );

		$bill = Bill::find( $request->bill_id );
		$bill->addToPaidAmount( $request->payment_amount );
		$bill->updateBillPaymentStatusToComplete();

		$journal = new Journal();
		$journal->saveSimpleTransactionBillJournalDebit( $transaction, $voucher, $request );
	}

	public function newIncomeTransaction( Request $request ) {
		$voucher = new Voucher();
		$voucher->saveSimpleTransactionIncomeVoucher( $request );

		$transaction = new Transaction();
		$transaction->saveSimpleIncomeTransaction( $voucher, $request );

		$creditJournal = new Journal();
		$creditJournal->saveSimpleTransactionIncomeJournalCredit( $transaction, $voucher, $request );

		$debitJournal = new Journal();
		$debitJournal->saveSimpleTransactionIncomeJournalDebit( $transaction, $voucher, $request );

		return json_encode( 'Income Transaction Successfully Complete' );
	}

	public function newExpenseTransaction( Request $request ) {
		$voucher = new Voucher();
		$voucher->saveSimpleTransactionExpenseVoucher( $request );

		$transaction = new Transaction();
		$transaction->saveSimpleExpenseTransaction( $voucher, $request );

		$creditJournal = new Journal();
		$creditJournal->saveSimpleTransactionExpenseJournalCredit( $transaction, $voucher, $request );

		$debitJournal = new Journal();
		$debitJournal->saveSimpleTransactionExpenseJournalDebit( $transaction, $voucher, $request );

		return json_encode( 'Expense Transaction Successfully Complete' );
	}

	private function updateInvoiceTransaction( $request ) {
		$voucher = Voucher::find( $request->voucher_id );
		$voucher->updateSimpleTransactionVoucherAmount( $request );

		$transaction = Transaction::find( $request->transaction_id );

		$invoice = Invoice::find( substr( $request->journal_id, 4, 1 ) );
		$invoice->deductFromPaidAmount( $transaction->payment_amount );

		$creditJournal = Journal::where( 'transaction_id', $request->transaction_id )->first();
		$creditJournal->updateSimpleTransactionInvoiceJournalCredit( $request );

		$transaction->updateSimpleInvoiceTransaction( $request );

		$invoice->addToPaidAmount( $request->transaction_amount );
		$invoice->updateInvoicePaymentStatusToPendingOrComplete();

		$debitJournal = Journal::where( 'transaction_id', $transaction->id )->orderBy( 'id', 'desc' )->first();
		$debitJournal->updateSimpleTransactionInvoiceJournalDebit( $request );
	}

	private function updateBillTransaction( $request ) {
		$voucher = Voucher::find( $request->voucher_id );
		$voucher->updateSimpleTransactionVoucherAmount( $request );

		$transaction = Transaction::find( $request->transaction_id );

		$bill = Bill::find( substr( $request->journal_id, 4, 1 ) );
		$bill->deductFromPaidAmount( $transaction->payment_amount );

		$journal = Journal::where( 'transaction_id', $request->transaction_id )->first();
		$journal->updateSimpleTransactionBillJournalCredit( $request );

		$transaction->updateSimpleDocumentTransaction( $request );

		$bill->addToPaidAmount( $request->transaction_amount );
		$bill->updateBillPaymentStatusToCompleteOrPending();

		$creditJournal = Journal::where( 'transaction_id', $transaction->id )->orderBy( 'id', 'desc' )->first();
		$creditJournal->updateSimpleTransactionBillJournalDebit( $request );
	}

	private function updateIncomeTransaction( $request ) {
		$voucher = Voucher::find( $request->voucher_id );
		$voucher->updateSimpleTransactionPaymentVoucher( $request );

		$transaction = Transaction::find( $request->transaction_id );
		$transaction->updateSimplePaymentTransaction( $request );

		$creditJournal = Journal::where( 'journal_id', $transaction->transaction_id )->first();
		$creditJournal->updateSimpleTransactionIncomeJournalCredit( $request );

		$debitJournal = Journal::where( 'journal_id', $transaction->transaction_id )->orderBy( 'id', 'desc' )->first();
		$debitJournal->updateSimpleTransactionIncomeJournalDebit( $request );
	}

	private function updateExpenseTransaction( $request ) {
		$voucher = Voucher::find( $request->voucher_id );
		$voucher->updateSimpleTransactionPaymentVoucher( $request );

		$transaction = Transaction::find( $request->transaction_id );
		$transaction->updateSimplePaymentTransaction( $request );

		$creditJournal = Journal::where( 'journal_id', $transaction->transaction_id )->first();
		$creditJournal->updateSimpleTransactionExpenseJournalCredit( $request );

		$debitJournal = Journal::where( 'journal_id', $transaction->transaction_id )->orderBy( 'id', 'desc' )->first();
		$debitJournal->updateSimpleTransactionExpenseJournalDebit( $request );
	}

	public function newTransactionInfo( Request $request ) {
		$voucher = new Voucher();
		$voucher->saveSimpleTransactionVoucher( $request );

		if ( $request->invoice_id ) {
			$this->newInvoiceTransaction( $request, $voucher );

			return redirect( '/invoice-info' );
		} else if ( $request->bill_id ) {
			$this->newBillTransaction( $request, $voucher );

			return redirect( '/bill-info' );
		}
	}

	public function updateTransactionInfo( Request $request ) {
		$transactionHead = TransactionId::getTransactionHead( $request->journal_id );
		switch ( $transactionHead ) {
			case 'inv' :
				$this->updateInvoiceTransaction( $request );
				break;
			case 'bil' :
				$this->updateBillTransaction( $request );
				break;
			case 'inc' :
				$this->updateIncomeTransaction( $request );
				break;
			case 'exp' :
				$this->updateExpenseTransaction( $request );
				break;
		}

		return redirect( '/transaction/add' )->with( 'message', 'Transaction info update successfully' );
	}

	public function getTransactionInfoById( $id ) {
		$transactionInfo = Transaction::find( $id );

		return json_encode( $transactionInfo );
	}

	public function verifiedTransactionInfoById( $id ) {
		$transaction                      = Transaction::find( $id );
		$transaction->verification_status = 1;
		$transaction->save();

		return json_encode( 'Transaction no ' . $id . ' verified successfully' );
	}

	public function notVerifiedTransactionInfoById( $id ) {
		$transaction                      = Transaction::find( $id );
		$transaction->verification_status = 0;
		$transaction->save();

		return json_encode( 'Transaction no ' . $id . ' not verified successfully' );
	}

	public function printSearchTableRow( $transaction ) {
		$result = '';
		$result .= "<tr>";
		$result .= "<td>$transaction->transaction_date</td>";
		$result .= "<td>";
		if ( TransactionId::getTransactionHead( $transaction->transaction_id ) == 'inc' ) {
			$result .= "Manual Income";
		} else if ( TransactionId::getTransactionHead( $transaction->transaction_id ) == 'exp' ) {
			$result .= "Manual Expense";
		} else if ( TransactionId::getTransactionHead( $transaction->transaction_id ) == 'inv' ) {
			$result .= "Invoice Transaction";
		} else if ( TransactionId::getTransactionHead( $transaction->transaction_id ) == 'bil' ) {
			$result .= "Bill Transaction";
		}
		$result .= "</td>";
		$result .= "<td>$transaction->payment_description</td>";
		$result .= "<td ";
		if ( TransactionId::getTransactionHead( $transaction->transaction_id ) == 'inc' ||
		     TransactionId::getTransactionHead( $transaction->transaction_id ) == 'inv' ) {
			$result .= "class='text-success'";
		} else {
			$result .= "class='text-danger'";
		}
		$result .= " >$transaction->payment_amount</td>";
		$result .= "<td>$transaction->account_category</td>";
		$result .= "<td>$transaction->account_name</td>";
		$result .= "<td>";
		$result .= "<div class='d-flex justify-content-center'>";
		if ( $transaction->verification_status == 0 ) {
			$result .= "<a href='javascript:void(0)'
							title='Verify' 
							id='$transaction->id'
	                        class='btn btn-warning btn-rounded btn-xs 
	                               p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2
	                               verified-transaction'
	                     >";
			$result .= "<i class='fa fa-12 fa-comment-o'></i>";
			$result .= "</a>";
		} else {
			$result .= "<a href='javascript:void(0)'
                            title='Verify'
                            id='$transaction->id'
                            class='btn btn-warning btn-rounded btn-xs
                            p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2
                            not-verified-transaction'
                        >";
			$result .= "<i class='fa fa-12 fa-comment'></i>";
			$result .= "</a>";
		}
		$result .= "<a href='javascript:void(0)'
						title='Edit'
						id='$transaction->id'
                        class='btn btn-info btn-rounded btn-xs
                        p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2
                        edit-transaction'
                    >";
		$result .= "<i class='fa fa-12 fa-edit'></i>";
		$result .= "</a>";
		$result .= "<a href='javascript:void(0)'
                        title='Delete'
                        class='btn btn-danger btn-rounded btn-xs
                        p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2'
                    >";
		$result .= "<i class='fa fa-12 fa-trash-o'></i>";
		$result .= "</a>";
		$result .= "</div>";
		$result .= "</td>";
		$result .= "</tr>";

		return $result;
	}

	public function getTransactionInfoBySearchItem( $searchItem ) {
		if ( $searchItem == 2 ) {
			$result       = '';
			$transactions = DB::table( 'transactions' )
			                  ->join( 'asset_accounts', 'transactions.payment_account', '=', 'asset_accounts.account_code' )
			                  ->select( 'transactions.*', 'asset_accounts.account_name' )
			                  ->orderBy( 'transactions.id', 'desc' )
			                  ->get();
			foreach ( $transactions as $transaction ) {
				$result .= $this->printSearchTableRow( $transaction );
			}

			return json_encode( $result );
		} else {
			$result       = '';
			$transactions = DB::table( 'transactions' )
			                  ->join( 'asset_accounts', 'transactions.payment_account', '=', 'asset_accounts.account_code' )
			                  ->select( 'transactions.*', 'asset_accounts.account_name' )
			                  ->where( 'transactions.verification_status', $searchItem )
			                  ->orderBy( 'transactions.id', 'desc' )
			                  ->get();
			foreach ( $transactions as $transaction ) {
				$result .= $this->printSearchTableRow( $transaction );
			}

			return json_encode( $result );
		}
	}

	public function getTransactionInfoBySearchType( $searchItem ) {
		if ( $searchItem == 2 ) {
			$result       = '';
			$transactions = DB::table( 'transactions' )
			                  ->join( 'asset_accounts', 'transactions.payment_account', '=', 'asset_accounts.account_code' )
			                  ->select( 'transactions.*', 'asset_accounts.account_name' )
			                  ->orderBy( 'transactions.id', 'desc' )
			                  ->get();
			foreach ( $transactions as $transaction ) {
				$result .= $this->printSearchTableRow( $transaction );
			}

			return json_encode( $result );
		} else {
			$result       = '';
			$transactions = DB::table( 'transactions' )
			                  ->join( 'asset_accounts', 'transactions.payment_account', '=', 'asset_accounts.account_code' )
			                  ->select( 'transactions.*', 'asset_accounts.account_name' )
			                  ->where( 'transactions.transaction_id', 'LIKE', '%' . $searchItem . '%' )
			                  ->orderBy( 'transactions.id', 'desc' )
			                  ->get();
			foreach ( $transactions as $transaction ) {
				$result .= $this->printSearchTableRow( $transaction );
			}

			return json_encode( $result );
		}
	}

	public function getTransactionInfoByAccountCategory( $searchItem ) {
		$result       = '';
		$transactions = DB::table( 'transactions' )
		                  ->join( 'asset_accounts', 'transactions.payment_account', '=', 'asset_accounts.account_code' )
		                  ->select( 'transactions.*', 'asset_accounts.account_name' )
		                  ->where( 'transactions.account_category', $searchItem )
		                  ->orderBy( 'transactions.id', 'desc' )
		                  ->get();
		foreach ( $transactions as $transaction ) {
			$result .= $this->printSearchTableRow( $transaction );
		}

		return json_encode( $result );
	}

	public function getTransactionInfoByPaymentAccount( $searchItem ) {
		$result       = '';
		$transactions = DB::table( 'transactions' )
		                  ->join( 'asset_accounts', 'transactions.payment_account', '=', 'asset_accounts.account_code' )
		                  ->select( 'transactions.*', 'asset_accounts.account_name' )
		                  ->where( 'transactions.payment_account', $searchItem )
		                  ->orderBy( 'transactions.id', 'desc' )
		                  ->get();
		foreach ( $transactions as $transaction ) {
			$result .= $this->printSearchTableRow( $transaction );
		}

		return json_encode( $result );
	}

	public function getTransactionInfoByDate( $startDate, $endDate ) {
		$result       = '';
		$transactions = DB::table( 'transactions' )
		                  ->join( 'asset_accounts', 'transactions.payment_account', '=', 'asset_accounts.account_code' )
		                  ->select( 'transactions.*', 'asset_accounts.account_name' )
		                  ->whereDate( 'transactions.transaction_date', '>=', $startDate )
		                  ->whereDate( 'transactions.transaction_date', '<=', $endDate )
		                  ->orderBy( 'transactions.id', 'desc' )
		                  ->get();
		foreach ( $transactions as $transaction ) {
			$result .= $this->printSearchTableRow( $transaction );
		}

		return json_encode( $result );
	}
}
