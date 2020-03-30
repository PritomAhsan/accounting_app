<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetAccount;
use App\Customer;
use App\IncomeAccount;
use App\Invoice;
use App\InvoiceDetail;
use App\Journal;
use App\Product;
use Illuminate\Http\Request;
use DB;
use App\Transaction;

class InvoiceController extends Controller {
	public function index() {
		$assetCashAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 10 )->get();
		$assetBankAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 11 )->get();
		$assetCashBankAccounts = $assetCashAccounts->merge( $assetBankAccounts );

		$invoices = DB::table( 'invoices' )
		              ->join( 'customers', 'invoices.customer_id', '=', 'customers.id' )
		              ->select( 'invoices.*', 'customers.first_name', 'customers.last_name' )
		              ->orderBy( 'invoices.id', 'desc' )
		              ->get();

		return view( 'invoice.invoice-info', [
			'invoices'              => $invoices,
			'assetCashBankAccounts' => $assetCashBankAccounts
		] );
	}

	public function createInvoiceInfo() {
		$products      = Product::where( 'sell_status', 1 )->get();
		$customers     = Customer::all();
		$lastInvoice   = Invoice::orderBy( 'id', 'desc' )->first();
		$invoiceNumber = $lastInvoice->getInvoiceNumber();

		return view( 'invoice.create-invoice', [
			'products'      => $products,
			'customers'     => $customers,
			'invoiceNumber' => $invoiceNumber
		] );
	}

	public function getAllInvoiceProduct() {
		$products = Product::where( 'sell_status', 1 )->get();

		return json_encode( $products );
	}

	public function selectCustomerInfo( $id ) {
		$customer = Customer::find( $id );

		return json_encode( $customer );
	}

	public function selectInvoiceProductInfo( $id ) {
		$product = Product::find( $id );

		return json_encode( $product );
	}

	public function saveInvoiceInfo( Request $request ) {
		$invoice = new Invoice();
		$invoice->saveInvoice( $request );

		return redirect( '/create-invoice' );
	}

	public function editInvoiceInfo( $id ) {
		return view( 'invoice.edit-invoice', [
			'products'       => Product::where( 'sell_status', 1 )->get(),
			'customers'      => Customer::all(),
			'invoice'        => Invoice::find( $id ),
			'customer'       => Customer::find( Invoice::find( $id )->customer_id ),
			'invoiceDetails' => InvoiceDetail::where( 'invoice_id', $id )->get()
		] );
	}

	public function checkCustomerInvoice( $customerId, $invoiceId ) {
		$check            = 0;
		$customerInvoices = Invoice::where( 'id', $invoiceId )
		                           ->where( 'customer_id', $customerId )
		                           ->get();
		if ( $customerInvoices->isNotEmpty() ) {
			foreach ( $customerInvoices as $customerInvoice ) {
				if ( $customerInvoice->paid_amount != 0.00 ) {
					$check = 1;
					break;
				}
			}
		}

		return json_encode( $check );
	}

	public function updateInvoiceInfo( Request $request ) {
		$invoice = Invoice::find( $request->invoice_id );
		$invoice->updateInvoice( $request );

		return redirect( '/invoice-info' );
	}

	public function deleteInvoiceDetailItem( Request $request ) {
		$invoiceDetail      = InvoiceDetail::find( $request->editInvoiceDetailsId );
		$invoiceTransaction = Transaction::where( 'transaction_id', 'inv-' . $invoiceDetail->invoice_id )->orderBy( 'id', 'desc' )->first();
		if ( $invoiceTransaction ) {
			$message = 'Sorry you can not delete this invoice item. Some payment was created against this invoice.!!!';

			return json_encode( $message );
		} else {
			$item                   = Product::find( $invoiceDetail->item_id );
			$incomeAccount          = IncomeAccount::find( $item->income_account_id );
			$invoiceDetailsJournals = Journal::where( 'journal_id', 'inv-' . $invoiceDetail->invoice_id )->get();
			$credit                 = 0;
			foreach ( $invoiceDetailsJournals as $invoiceDetailsJournal ) {
				if ( $invoiceDetailsJournal->journal_id == 'inv-' . $invoiceDetail->invoice_id && $invoiceDetailsJournal->account_code == $incomeAccount->account_code ) {
					$credit = $invoiceDetailsJournal->credit;
					$invoiceDetailsJournal->delete();
					break;
				}
			}
			$journal = Journal::where( 'journal_id', 'inv-' . $invoiceDetail->invoice_id )->orderBy( 'id', 'asc' )->first();
			$journal->deductFromDebit( $credit );

			$invoice = Invoice::find( $invoiceDetail->invoice_id );
			$invoice->deductFromTotalPrice( $credit );

			$invoiceDetail->delete();

			$message = 'Invoice Details Item info delete successfully !!!';

			return json_encode( $message );
		}
	}

	public function deleteInvoiceInfo( Request $request ) {
		$invoiceTransaction = Transaction::where( 'transaction_id', 'inv-' . $request->invoiceId )->orderBy( 'id', 'asc' )->first();
		if ( $invoiceTransaction ) {
			$message = 'Sorry you can not delete this invoice. Some payment was created against this invoice.!!!';

			return json_encode( $message );
		} else {
			$invoiceDetailItems = InvoiceDetail::where( 'invoice_id', $request->invoiceId )->get();
			foreach ( $invoiceDetailItems as $invoiceDetailItem ) {
				$invoiceDetailItem->delete();
			}

			$journals = Journal::where( 'journal_id', 'inv-' . $request->invoiceId )->get();
			foreach ( $journals as $journal ) {
				$journal->delete();
			}

			$invoice = Invoice::find( $request->invoiceId );
			$invoice->delete();

			$message = 'Invoice info delete successfully !!!';

			return json_encode( $message );
		}
	}
}
