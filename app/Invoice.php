<?php

namespace App;

use App\Helpers\Payment;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

	use Payment;

	public function getInvoiceNumber() {
		$invoiceNumber = 1;
		if ( ! empty( $this->invoice_number ) ) {
			$invoiceNumber += $this->invoice_number;
		}

		return $invoiceNumber;
	}

	public function deductFromTotalPrice( $amount ) {
		$this->invoice_total_price = $this->invoice_total_price - $amount;
		$this->save();
	}

	public function updateInvoicePaymentStatusToComplete() {
		if ( $this->invoice_total_price == $this->paid_amount ) {
			$this->payment_status = 'Complete';
		}
		$this->save();
	}

	public function updateInvoicePaymentStatusToPendingOrComplete() {
		if ( $this->invoice_total_price != $this->paid_amount ) {
			$this->payment_status = 'Pending';
		} else if ( $this->invoice_total_price == $this->paid_amount ) {
			$this->payment_status = 'Complete';
		}
		$this->save();
	}

	public function saveInvoiceInfo( $request ) {
		$this->customer_id           = $request->customer_id;
		$this->invoice_number        = $request->invoice_number;
		$this->purchase_order_number = $request->purchase_order_number;
		$this->invoice_total_price   = $request->invoice_total_price;
		$this->invoice_date          = $request->invoice_date;
		$this->due_date              = $request->due_date;
		$this->save();
	}

	public function saveInvoiceDetails( $request ) {
		$customer             = Customer::find( $request->customer_id );
		$customerAssetAccount = AssetAccount::find( $customer->asset_account_id );

		$journalDebit = new Journal();
		$journalDebit->saveInvoiceJournalDebit( $this, $customerAssetAccount, $request );

		foreach ( $request->invoice_item as $selectedOption ) {
			$invoiceDetail = new InvoiceDetail();
			$invoiceDetail->saveInvoiceDetail( $this, $selectedOption );

			$item          = Product::find( $invoiceDetail->item_id );
			$incomeAccount = IncomeAccount::find( $item->income_account_id );

			$journalCredit = new Journal();
			$journalCredit->saveInvoiceJournalCredit( $this, $incomeAccount, $invoiceDetail );
		}
	}

	public function updateInvoiceDetailsInfo( $request ) {
		$customer              = Customer::find( $request->customer_id );
		$customerAssetsAccount = AssetAccount::find( $customer->asset_account_id );

		$invoiceJournal = Journal::where( 'journal_id', 'inv-' . $this->id )->first();
		$invoiceJournal->updateInvoiceJournal( $this, $customerAssetsAccount, $request );

		foreach ( $request->invoice_item as $selectedOption ) {
			if ( isset( $selectedOption['invoice_detail_id'] ) ) {
				$invoiceDetail = InvoiceDetail::find( $selectedOption['invoice_detail_id'] );
				$invoiceDetail->saveInvoiceDetail( $this, $selectedOption );

				$item          = Product::find( $invoiceDetail->item_id );
				$incomeAccount = IncomeAccount::find( $item->income_account_id );

				$journalCredits = Journal::where( 'journal_id', 'inv-' . $this->id )->get();
				foreach ( $journalCredits as $journalCredit ) {
					if ( $journalCredit->account_code == $incomeAccount->account_code ) {
						$journalCredit->updateInvoiceJournalCredit( $this, $incomeAccount, $invoiceDetail );
					}
				}
			} else {
				$invoiceDetail = new InvoiceDetail();
				$invoiceDetail->saveInvoiceDetail( $this, $selectedOption );

				$item          = Product::find( $invoiceDetail->item_id );
				$incomeAccount = IncomeAccount::find( $item->income_account_id );

				$journalCredit = new Journal();
				$journalCredit->saveInvoiceJournalCredit( $this, $incomeAccount, $invoiceDetail );
			}
		}
	}

	public function saveInvoice( $request ) {
		$this->saveInvoiceInfo( $request );
		$this->saveInvoiceDetails( $request );
	}

	public function updateInvoice( $request ) {
		$this->saveInvoice( $request );
		$this->updateInvoiceDetailsInfo( $request );
	}

}
