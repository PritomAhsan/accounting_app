<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model {

	/* Journal Transaction */

	public function saveJournalTransactionVoucher( $request ) {
		$this->voucher_type = 'Journal Transaction Voucher';
		$this->description  = $request->description;
		$this->voucher_date = $request->date;
		$this->total_amount = $request->total_debit;
		$this->save();
	}

	/* Simple Transaction */

	public function saveSimpleTransactionVoucher( $request ) {
		$this->description  = $request->payment_description;
		$this->voucher_date = $request->payment_date;
		$this->total_amount = $request->payment_amount;
		$this->save();
	}

	public function saveSimpleTransactionVoucherType( $voucherType ) {
		$this->voucher_type = $voucherType;
		$this->save();
	}

	public function updateSimpleTransactionVoucherAmount( $request ) {
		$this->total_amount = $request->transaction_amount;
		$this->save();
	}

	public function saveSimpleTransactionIncomeVoucher( $request ) {
		$this->voucher_type = 'Income Voucher';
		$this->description  = $request->incomeTransactionPaymentDescription;
		$this->voucher_date = $request->incomeTransactionDate;
		$this->total_amount = $request->incomeTransactionPaymentAmount;
		$this->save();
	}

	public function saveSimpleTransactionExpenseVoucher( $request ) {
		$this->voucher_type = 'Expense Voucher';
		$this->description  = $request->expenseTransactionPaymentDescription;
		$this->voucher_date = $request->expenseTransactionDate;
		$this->total_amount = $request->expenseTransactionPaymentAmount;
		$this->save();
	}

	public function updateSimpleTransactionPaymentVoucher( $request ) {
		$this->description  = $request->transaction_description;
		$this->voucher_date = $request->transaction_date;
		$this->total_amount = $request->transaction_amount;
		$this->save();
	}

	/* Voucher */

	public function saveVouherInfo( $request ) {
		$this->description  = $request->description;
		$this->voucher_date = $request->date;
		$this->total_amount = $request->total_debit;
		$this->save();
	}

	public function savePaymentVoucher( $request ) {
		$this->voucher_type = 'Payment Voucher';
		$this->saveVouherInfo( $request );
	}

	public function saveCreditVoucher( $request ) {
		$this->voucher_type = 'Credit Voucher';
		$this->saveVouherInfo( $request );
	}

	public function saveJournalVoucher( $request ) {
		$this->voucher_type = 'Journal Voucher';
		$this->saveVouherInfo( $request );
	}
}
