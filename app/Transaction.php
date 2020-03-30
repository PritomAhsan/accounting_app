<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	/* Journal Transaction */

	public function saveJournalTransaction( $request, $selectedOption ) {
		$this->transaction_date    = $request->date;
		$this->payment_amount      = $selectedOption['debit'] == null ? $selectedOption['credit'] : $selectedOption['debit'];
		$this->payment_type        = 'journal-transaction';
		$this->payment_account     = $selectedOption['account_code'];
		$this->account_category    = 'Journal Transaction';
		$this->payment_description = $request->account_description;
		$this->save();
		$this->transaction_id = 'man-' . $this->id;
		$this->save();
	}

	/* Simple Transaction */

	public function saveSimpleInvoiceTransaction( $request, $voucher ) {
		$this->transaction_id      = 'inv-' . $request->invoice_id;
		$this->voucher_id          = $voucher->id;
		$this->transaction_date    = $request->payment_date;
		$this->payment_amount      = $request->payment_amount;
		$this->payment_type        = $request->payment_type;
		$this->payment_account     = $request->payment_account;
		$this->account_category    = 'Invoice Payment';
		$this->payment_description = $request->payment_description;
		$this->save();
	}

	public function saveSimpleBillTransaction( $request, $voucher ) {
		$this->transaction_id      = 'bil-' . $request->bill_id;
		$this->voucher_id          = $voucher->id;
		$this->transaction_date    = $request->payment_date;
		$this->payment_amount      = $request->payment_amount;
		$this->payment_type        = $request->payment_type;
		$this->payment_account     = $request->payment_account;
		$this->account_category    = 'Bill Payment';
		$this->payment_description = $request->payment_description;
		$this->save();
	}

	public function saveSimpleIncomeTransaction( $voucher, $request ) {
		$this->voucher_id          = $voucher->id;
		$this->transaction_date    = $request->incomeTransactionDate;
		$this->payment_amount      = $request->incomeTransactionPaymentAmount;
		$this->payment_type        = $request->incomeTransactionPaymentType;
		$this->payment_account     = $request->incomeTransactionPaymentAccountCode;
		$this->account_category    = $request->incomeTransactionCategoryId;
		$this->payment_description = $request->incomeTransactionPaymentDescription;
		$this->save();
		$this->transaction_id = 'inc-' . $this->id;
		$this->save();
	}

	public function saveSimpleExpenseTransaction( $voucher, $request ) {
		$this->voucher_id          = $voucher->id;
		$this->transaction_date    = $request->expenseTransactionDate;
		$this->payment_amount      = $request->expenseTransactionPaymentAmount;
		$this->payment_type        = $request->expenseTransactionPaymentType;
		$this->payment_account     = $request->expenseTransactionPaymentAccountCode;
		$this->account_category    = $request->expenseTransactionCategoryId;
		$this->payment_description = $request->expenseTransactionPaymentDescription;
		$this->save();
		$this->transaction_id = 'exp-' . $this->id;
		$this->save();
	}

	public function updateSimpleDocumentTransaction( $request ) {
		$this->transaction_date    = $request->transaction_date;
		$this->payment_amount      = $request->transaction_amount;
		$this->payment_type        = $request->payment_type;
		$this->payment_account     = $request->payment_account;
		$this->payment_description = $request->transaction_description;
		$this->save();
	}

	public function updateSimplePaymentTransaction( $request ) {
		$this->transaction_id      = $request->journal_id;
		$this->transaction_date    = $request->transaction_date;
		$this->payment_amount      = $request->transaction_amount;
		$this->payment_type        = $request->payment_type;
		$this->payment_account     = $request->payment_account;
		$this->account_category    = $request->account_category;
		$this->payment_description = $request->transaction_description;
		$this->save();
	}

	/* Voucher */
	public function savePaymentVoucherTransaction( $voucher, $request, $selectedOption ) {
		$this->transaction_id      = 'pav-' . $voucher->id;
		$this->voucher_id          = $voucher->id;
		$this->transaction_date    = $request->date;
		$this->payment_amount      = $selectedOption['debit'] == null ? $selectedOption['credit'] : $selectedOption['debit'];
		$this->payment_type        = $request->payment_type;
		$this->payment_account     = $selectedOption['account_code'];
		$this->account_category    = 'Payment Voucher';
		$this->payment_description = $request->description;
		$this->save();
	}

	public function saveCreditVoucherTransaction( $voucher, $request, $selectedOption ) {
		$this->transaction_id      = 'crv-' . $voucher->id;
		$this->voucher_id          = $voucher->id;
		$this->transaction_date    = $request->date;
		$this->payment_amount      = $selectedOption['debit'] == null ? $selectedOption['credit'] : $selectedOption['debit'];
		$this->payment_type        = $request->payment_type;
		$this->payment_account     = $selectedOption['account_code'];
		$this->account_category    = 'Credit Voucher';
		$this->payment_description = $request->description;
		$this->save();
	}

	public function saveJournalVoucherTransaction( $voucher, $request, $selectedOption ) {
		$this->voucher_id          = $voucher->id;
		$this->transaction_date    = $request->date;
		$this->payment_amount      = $selectedOption['debit'] == null ? $selectedOption['credit'] : $selectedOption['debit'];
		$this->payment_type        = 'journal-transaction';
		$this->payment_account     = $selectedOption['account_code'];
		$this->account_category    = 'Journal Transaction';
		$this->payment_description = $request->description;
		$this->save();
		$this->transaction_id = 'man-' . $this->id;
		$this->save();
	}
}
