<?php

namespace App\Http\Controllers;

use App\ExpenseAccount;
use App\LiabilitieAccount;
use App\Transaction;
use App\Vendor;
use Illuminate\Http\Request;
use App\Product;
use App\Bill;
use App\BillDetail;
use DB;
use App\Journal;
use App\AssetAccount;

class BillController extends Controller {
	public function index() {
		$assetCashAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 10 )->get();
		$assetBankAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 11 )->get();
		$assetCashBankAccounts = $assetCashAccounts->merge( $assetBankAccounts );
		$bills                 = DB::table( 'bills' )
		                           ->join( 'vendors', 'bills.vendor_id', '=', 'vendors.id' )
		                           ->select( 'bills.*', 'vendors.vendor_name' )
		                           ->orderBy( 'bills.id', 'desc' )
		                           ->get();

		return view( 'bill.bill-info', [
			'bills'                 => $bills,
			'assetCashBankAccounts' => $assetCashBankAccounts
		] );
	}

	public function createBillInfo() {
		$products = Product::where( 'buy_status', 1 )->get();
		$vendors  = Vendor::all();

		$lastBill   = Bill::orderBy( 'id', 'desc' )->first();
		$billNumber = $lastBill->getBillNumber();

		return view( 'bill.create-bill', [
			'products'   => $products,
			'vendors'    => $vendors,
			'billNumber' => $billNumber
		] );
	}

	public function selectVendorInfo( $id ) {
		$vendor = Vendor::find( $id );

		return json_encode( $vendor );
	}

	public function selectBillProductInfo( $id ) {
		$product = Product::find( $id );

		return json_encode( $product );
	}

	public function saveBillInfo( Request $request ) {
		$bill = new Bill();
		$bill->saveBill( $request );

		return redirect( '/create-bill' );
	}

	public function editBillInfo( $id ) {

		return view( 'bill.edit-bill', [
			'products'    => Product::where( 'buy_status', 1 )->get(),
			'vendors'     => Vendor::all(),
			'bill'        => Bill::find( $id ),
			'vendor'      => Vendor::find( Bill::find( $id )->vendor_id ),
			'billDetails' => BillDetail::where( 'bill_id', $id )->get()
		] );
	}

	public function checkVendorBill( $vendorId, $billId ) {
		$check       = 0;
		$vendorBills = Bill::where( 'id', $billId )
		                   ->where( 'vendor_id', $vendorId )
		                   ->get();
		if ( $vendorBills->isNotEmpty() ) {
			foreach ( $vendorBills as $vendorBill ) {
				if ( $vendorBill->paid_amount != 0.00 ) {
					$check = 1;
					break;
				}
			}
		}

		return json_encode( $check );
	}

	public function updateBillInfo( Request $request ) {
		$bill = Bill::find( $request->bill_id );
		$bill->updateBill( $request );

		return redirect( '/bill-info' );
	}

	public function deleteBillDetailsInfo( Request $request ) {
		$billDetail      = BillDetail::find( $request->editBillDetailsId );
		$billTransaction = Transaction::where( 'transaction_id', 'bil-' . $billDetail->bill_id )->orderBy( 'id', 'desc' )->first();
		if ( $billTransaction ) {
			$message = 'Sorry you can not delete this bill item. Some payment was created against this bill.!!!';

			return json_encode( $message );
		} else {
			$item                = Product::find( $billDetail->item_id );
			$expenseAccount      = ExpenseAccount::find( $item->expense_account_id );
			$billDetailsJournals = Journal::where( 'journal_id', 'bil-' . $billDetail->bill_id )->get();
			$debit               = 0;
			foreach ( $billDetailsJournals as $billDetailsJournal ) {
				if ( $billDetailsJournal->journal_id == 'bil-' . $billDetail->bill_id && $billDetailsJournal->account_code == $expenseAccount->account_code ) {
					$debit = $billDetailsJournal->debit;
					$billDetailsJournal->delete();
					break;
				}
			}
			$journal = Journal::where( 'journal_id', 'bil-' . $billDetail->bill_id )->orderBy( 'id', 'asc' )->first();
			$journal->deductFromCredit( $debit );

			$bill = Bill::find( $billDetail->bill_id );
			$bill->deductFromTotalPrice( $debit );

			$billDetail->delete();

			$message = 'Bill Details Item info delete successfully !!!';

			return json_encode( $message );
		}
	}

	public function deleteBillInfo( Request $request ) {
		$billTransaction = Transaction::where( 'transaction_id', 'bil-' . $request->billId )->orderBy( 'id', 'asc' )->first();
		if ( $billTransaction ) {
			$message = 'Sorry you can not delete this bill. Some payment was created against this bill.!!!';

			return json_encode( $message );
		} else {
			$billDetailItems = BillDetail::where( 'bill_id', $request->billId )->get();
			foreach ( $billDetailItems as $billDetailItem ) {
				$billDetailItem->delete();
			}

			$journals = Journal::where( 'journal_id', 'bil-' . $request->billId )->get();
			foreach ( $journals as $journal ) {
				$journal->delete();
			}

			$bill = Bill::find( $request->billId );
			$bill->delete();

			$message = 'Bill info delete successfully !!!';

			return json_encode( $message );
		}
	}
}
