<?php

namespace App;

use App\Helpers\DebitCredit;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model {

	use DebitCredit;

	/* Bill */

	public function saveBillJournalDebit( $bill, $vendorLiabilitiesAccount, $request ) {
		$this->journal_id   = 'bil-' . $bill->id;
		$this->journal_date = $bill->bill_date;
		$this->account_code = $vendorLiabilitiesAccount->account_code;
		$this->description  = 'Bill No - ' . $bill->id . ' Description';
		$this->debit        = 0;
		$this->credit       = $request->bill_total_price;
		$this->save();
	}

	public function saveBillJournalCredit( $bill, $expenseAccount, $billDetail ) {
		$this->journal_id   = 'bil-' . $bill->id;
		$this->journal_date = $bill->bill_date;
		$this->account_code = $expenseAccount->account_code;
		$this->description  = $billDetail->item_description;
		$this->debit        = $billDetail->item_quantity * $billDetail->item_price;
		$this->credit       = 0;
		$this->save();
	}

	public function updateBillJournal( $bill, $vendorLiabilitiesAccount, $request ) {
		$this->journal_id   = 'bil-' . $bill->id;
		$this->journal_date = $bill->bill_date;
		$this->account_code = $vendorLiabilitiesAccount->account_code;
		$this->description  = 'Bill No - ' . $bill->id . ' Description';
		$this->debit        = $this->debit;
		$this->credit       = $request->bill_total_price;
		$this->save();
	}

	public function updateBillJournalCredit( $bill, $expenseAccount, $billDetail, $journalCredit ) {
		$this->journal_id   = 'bil-' . $bill->id;
		$this->journal_date = $bill->bill_date;
		$this->account_code = $expenseAccount->account_code;
		$this->description  = $billDetail->item_description;
		$this->debit        = $billDetail->item_quantity * $billDetail->item_price;
		$this->credit       = $journalCredit->credit;
		$this->save();
	}

	/* Invoice */

	public function saveInvoiceJournalDebit( $invoice, $customerAssetAccount, $request ) {
		$this->journal_id   = 'inv-' . $invoice->id;
		$this->journal_date = $invoice->invoice_date;
		$this->account_code = $customerAssetAccount->account_code;
		$this->description  = 'Invoice No - ' . $invoice->id . ' Description';
		$this->debit        = $request->invoice_total_price;
		$this->credit       = 0;
		$this->save();
	}

	public function saveInvoiceJournalCredit( $invoice, $incomeAccount, $invoiceDetail ) {
		$this->journal_id   = 'inv-' . $invoice->id;
		$this->journal_date = $invoice->invoice_date;
		$this->account_code = $incomeAccount->account_code;
		$this->description  = $invoiceDetail->item_description;
		$this->debit        = 0;
		$this->credit       = $invoiceDetail->item_quantity * $invoiceDetail->item_price;
		$this->save();
	}

	public function updateInvoiceJournal( $invoice, $customerAssetsAccount, $request ) {
		$this->journal_id   = 'inv-' . $invoice->id;
		$this->journal_date = $invoice->invoice_date;
		$this->account_code = $customerAssetsAccount->account_code;
		$this->description  = 'Invoice No - ' . $invoice->id . ' Description';
		$this->debit        = $request->invoice_total_price;
		$this->credit       = $this->credit;
		$this->save();
	}

	public function updateInvoiceJournalCredit( $invoice, $incomeAccount, $invoiceDetail ) {
		$this->journal_id   = 'inv-' . $invoice->id;
		$this->journal_date = $invoice->invoice_date;
		$this->account_code = $incomeAccount->account_code;
		$this->description  = $invoiceDetail->item_description;
		$this->debit        = $this->debit;
		$this->credit       = $invoiceDetail->item_quantity * $invoiceDetail->item_price;
		$this->save();
	}

	/* Journal Transaction */

	public function saveJournalTransactionJournal( $transaction, $request, $selectedOption ) {
		$this->transaction_id = isset( $transaction->id ) ? $transaction->id : null;
		$this->journal_id     = isset( $transaction->id ) ? 'man-' . $transaction->id : 'Manual Journal';
		$this->journal_date   = $request->date;
		$this->account_code   = $selectedOption['account_code'];
		$this->description    = $selectedOption['account_description'];
		$this->debit          = $selectedOption['debit'] == null ? 0 : $selectedOption['debit'];
		$this->credit         = $selectedOption['credit'] == null ? 0 : $selectedOption['credit'];
		$this->save();
	}

	public function saveJournalTransactionExistingJournal( $existManualJournal, $request, $selectedOption ) {
		$this->journal_id   = 'man-' . $existManualJournal->id;
		$this->journal_date = $request->date;
		$this->account_code = $selectedOption['account_code'];
		$this->description  = $selectedOption['account_description'];
		$this->debit        = $selectedOption['debit'] == null ? 0 : $selectedOption['debit'];
		$this->credit       = $selectedOption['credit'] == null ? 0 : $selectedOption['credit'];
		$this->save();
	}

	/* Simple Transaction */

	public function saveSimpleTransactionInvoiceJournalCredit( $transaction, $voucher, $request ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'inv-' . $request->invoice_id;
		$this->journal_date   = $request->payment_date;
		$this->account_code   = self::where( 'journal_id', 'inv-' . $request->invoice_id )->first()->account_code;
		$this->description    = 'Invoice No - ' . $request->invoice_id . ' Description';
		$this->debit          = 0;
		$this->credit         = $request->payment_amount;
		$this->save();
	}

	public function saveSimpleTransactionInvoiceJournalDebit( $transaction, $voucher, $request ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'inv-' . $request->invoice_id;
		$this->journal_date   = $request->payment_date;
		$this->account_code   = $request->payment_account;
		$this->description    = 'Invoice No - ' . $request->invoice_id . ' Description';
		$this->debit          = $request->payment_amount;
		$this->credit         = 0;
		$this->save();
	}

	public function saveSimpleTransactionBillJournalCredit( $transaction, $voucher, $request ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'inv-' . $request->invoice_id;
		$this->journal_date   = $request->payment_date;
		$this->account_code   = Journal::where( 'journal_id', 'bil-' . $request->bill_id )->first()->account_code;
		$this->description    = 'Invoice No - ' . $request->invoice_id . ' Description';
		$this->debit          = $request->payment_amount;
		$this->credit         = 0;
		$this->save();
	}

	public function saveSimpleTransactionBillJournalDebit( $transaction, $voucher, $request ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'bil-' . $request->bill_id;
		$this->journal_date   = $request->payment_date;
		$this->account_code   = $request->payment_account;
		$this->description    = 'bil No - ' . $request->bill_id . ' Description';
		$this->debit          = 0;
		$this->credit         = $request->payment_amount;
		$this->save();
	}

	public function saveSimpleTransactionIncomeJournalCredit( $transaction, $voucher, $request ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'inc-' . $transaction->id;
		$this->journal_date   = $request->incomeTransactionDate;
		$this->account_code   = $request->incomeTransactionCategoryId;
		$this->description    = 'Income No - ' . $transaction->id . ' Description';
		$this->debit          = 0;
		$this->credit         = $request->incomeTransactionPaymentAmount;
		$this->save();
	}

	public function saveSimpleTransactionIncomeJournalDebit( $transaction, $voucher, $request ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'inc-' . $transaction->id;
		$this->journal_date   = $request->incomeTransactionDate;
		$this->account_code   = $request->incomeTransactionPaymentAccountCode;
		$this->description    = 'Income No - ' . $transaction->id . ' Description';
		$this->debit          = $request->incomeTransactionPaymentAmount;
		$this->credit         = 0;
		$this->save();
	}

	public function saveSimpleTransactionExpenseJournalCredit( $transaction, $voucher, $request ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'exp-' . $transaction->id;
		$this->journal_date   = $request->expenseTransactionDate;
		$this->account_code   = $request->expenseTransactionCategoryId;
		$this->description    = 'Expense No - ' . $transaction->id . ' Description';
		$this->debit          = $request->expenseTransactionPaymentAmount;
		$this->credit         = 0;
		$this->save();
	}

	public function saveSimpleTransactionExpenseJournalDebit( $transaction, $voucher, $request ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'exp-' . $transaction->id;
		$this->journal_date   = $request->expenseTransactionDate;
		$this->account_code   = $request->expenseTransactionPaymentAccountCode;
		$this->description    = 'Expense No - ' . $transaction->id . ' Description';
		$this->debit          = 0;
		$this->credit         = $request->expenseTransactionPaymentAmount;
		$this->save();
	}

	public function updateSimpleTransactionInvoiceJournalCredit( $request ) {
		$this->journal_date = $request->transaction_date;
		$this->credit       = $request->transaction_amount;
		$this->save();
	}

	public function updateSimpleTransactionInvoiceJournalDebit( $request ) {
		$this->journal_date = $request->transaction_date;
		$this->account_code = $request->payment_account;
		$this->debit        = $request->transaction_amount;
		$this->save();
	}

	public function updateSimpleTransactionBillJournalCredit( $request ) {
		$this->journal_date = $request->transaction_date;
		$this->debit        = $request->transaction_amount;
	}

	public function updateSimpleTransactionBillJournalDebit( $request ) {
		$this->journal_date = $request->transaction_date;
		$this->account_code = $request->payment_account;
		$this->credit       = $request->transaction_amount;
		$this->save();
	}

	public function updateSimpleTransactionIncomeJournalCredit( $request ) {
		$this->journal_date = $request->transaction_date;
		$this->account_code = $request->account_category;
		$this->credit       = $request->transaction_amount;
		$this->save();
	}

	public function updateSimpleTransactionIncomeJournalDebit( $request ) {
		$this->journal_date = $request->transaction_date;
		$this->account_code = $request->payment_account;
		$this->debit        = $request->transaction_amount;
		$this->save();
	}

	public function updateSimpleTransactionExpenseJournalCredit( $request ) {
		$this->journal_date = $request->transaction_date;
		$this->account_code = $request->account_category;
		$this->debit        = $request->transaction_amount;
		$this->save();
	}

	public function updateSimpleTransactionExpenseJournalDebit( $request ) {
		$this->journal_date = $request->transaction_date;
		$this->account_code = $request->payment_account;
		$this->credit       = $request->transaction_amount;
		$this->save();
	}

	/* Voucher */
	public function savePaymentVoucherJournal( $transaction, $voucher, $request, $selectedOption ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'pav-' . $transaction->id;
		$this->journal_date   = $request->date;
		$this->account_code   = $selectedOption['account_code'];
		$this->description    = $selectedOption['account_description'];
		$this->debit          = $selectedOption['debit'] == null ? 0 : $selectedOption['debit'];
		$this->credit         = $selectedOption['credit'] == null ? 0 : $selectedOption['credit'];
		$this->save();
	}

	public function saveCreditVoucherJournal( $transaction, $voucher, $request, $selectedOption ) {
		$this->transaction_id = $transaction->id;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = 'crv-' . $transaction->id;
		$this->journal_date   = $request->date;
		$this->account_code   = $selectedOption['account_code'];
		$this->description    = $selectedOption['account_description'];
		$this->debit          = $selectedOption['debit'] == null ? 0 : $selectedOption['debit'];
		$this->credit         = $selectedOption['credit'] == null ? 0 : $selectedOption['credit'];
		$this->save();
	}

	public function saveJournalVoucherJournal( $transaction, $voucher, $request, $selectedOption ) {
		$this->transaction_id = isset( $transaction->id ) ? $transaction->id : null;
		$this->voucher_id     = $voucher->id;
		$this->journal_id     = isset( $transaction->id ) ? 'man-' . $transaction->id : 'Manual Journal';
		$this->journal_date   = $request->date;
		$this->account_code   = $selectedOption['account_code'];
		$this->description    = $selectedOption['account_description'];
		$this->debit          = $selectedOption['debit'] == null ? 0 : $selectedOption['debit'];
		$this->credit         = $selectedOption['credit'] == null ? 0 : $selectedOption['credit'];
		$this->save();
	}
}
