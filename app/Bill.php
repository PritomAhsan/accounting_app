<?php

namespace App;

use App\Helpers\Payment;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model {

	use Payment;

	public function getBillNumber() {
		$billNumber = 1;
		if ( ! empty( $this->bill_number ) ) {
			$billNumber += $this->bill_number;
		}

		return $billNumber;
	}

	public function deductFromTotalPrice( $amount ) {
		$this->bill_total_price = $this->bill_total_price - $amount;
		$this->save();
	}

	public function updateBillPaymentStatusToComplete() {
		if ( $this->bill_total_price == $this->paid_amount ) {
			$this->payment_status = 'Complete';
		}
		$this->save();
	}

	public function updateBillPaymentStatusToCompleteOrPending() {
		if ( $this->bill_total_price != $this->paid_amount ) {
			$this->payment_status = 'Pending';
		} else if ( $this->bill_total_price == $this->paid_amount ) {
			$this->payment_status = 'Complete';
		}
		$this->save();
	}

	public function saveBillInfo( $request ) {
		$this->vendor_id        = $request->vendor_id;
		$this->bill_number      = $request->bill_number;
		$this->bill_date        = $request->bill_date;
		$this->due_date         = $request->due_date;
		$this->bill_total_price = $request->bill_total_price;
		$this->save();
	}

	public function saveBill( $request ) {
		$this->saveBillInfo( $request );
		$this->saveBillDetails( $request );
	}

	public function saveBillDetails( $request ) {
		$vendor                   = Vendor::find( $request->vendor_id );
		$vendorLiabilitiesAccount = LiabilitieAccount::find( $vendor->vendor_liabilitie_id );

		$journalDebit = new Journal();
		$journalDebit->saveBillJournalDebit( $this, $vendorLiabilitiesAccount, $request );

		foreach ( $request->bill_item as $selectedOption ) {
			$billDetail = new BillDetail();
			$billDetail->saveBillDetail( $this, $selectedOption );

			$item           = Product::find( $billDetail->item_id );
			$expenseAccount = ExpenseAccount::find( $item->expense_account_id );

			$journalCredit = new Journal();
			$journalCredit->saveBillJournalCredit( $this, $expenseAccount, $billDetail );
		}
	}

	public function updateBill( $request ) {
		$this->saveBillInfo( $request );
		$this->updateBillDetails( $request );
	}

	public function updateBillDetails( $request ) {
		$vendor                   = Vendor::find( $request->vendor_id );
		$vendorLiabilitiesAccount = LiabilitieAccount::find( $vendor->vendor_liabilitie_id );

		$billJournal = Journal::where( 'journal_id', 'bil-' . $this->id )->first();
		$billJournal->updateBillJournal( $this, $vendorLiabilitiesAccount, $request );

		foreach ( $request->bill_item as $selectedOption ) {
			if ( isset( $selectedOption['bill_detail_id'] ) ) {
				$billDetail = BillDetail::find( $selectedOption['bill_detail_id'] );
				$billDetail->saveBillDetail( $this, $selectedOption );

				$item           = Product::find( $billDetail->item_id );
				$expenseAccount = ExpenseAccount::find( $item->expense_account_id );

				$journalCredits = Journal::where( 'journal_id', 'bil-' . $this->id )->get();
				foreach ( $journalCredits as $journalCredit ) {
					if ( $journalCredit->account_code == $expenseAccount->account_code ) {
						$journalCredit->updateBillJournalCredit( $this, $expenseAccount, $billDetail, $journalCredit );
					}
				}
			} else {
				$billDetail = new BillDetail();
				$billDetail->saveBillDetail( $this, $selectedOption );

				$item           = Product::find( $billDetail->item_id );
				$expenseAccount = ExpenseAccount::find( $item->expense_account_id );

				$journalCredit = new Journal();
				$journalCredit->saveBillJournalCredit( $this, $expenseAccount, $billDetail );
			}
		}
	}

}
