<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Voucher;
use Illuminate\Http\Request;
use DB;
use App\AssetAccount;
use App\LiabilitieAccount;
use App\OwnersEquityAccount;
use App\IncomeAccount;
use App\ExpenseAccount;
use App\Journal;
use PDF;


class VoucherController extends Controller {
	public function index() {
		return view( 'voucher.voucher', [
			'vouchers' => Voucher::all()
		] );
	}

	protected function getAssetCashBAnkAccount() {
		$assetCashAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 10 )->get();
		$assetBankAccounts     = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 11 )->get();
		$assetCashBankAccounts = $assetCashAccounts->merge( $assetBankAccounts );

		return $assetCashBankAccounts;
	}

	public function paymentVoucher() {

		return view( 'voucher.payment-voucher', [
			'assetAccounts'   => $this->getAssetCashBAnkAccount(),
			'expenseAccounts' => ExpenseAccount::all()
		] );
	}

	public function newPaymentVoucher( Request $request ) {
		$voucher = new Voucher();
		$voucher->savePaymentVoucher( $request );

		foreach ( $request->transaction as $selectedOption ) {
			/*$selectedOption['account_code'] is asset account code*/
			if ( substr( $selectedOption['account_code'], 0, 1 ) == 2 ) {
				$transaction = new Transaction();
				$transaction->savePaymentVoucherTransaction( $voucher, $request, $selectedOption );
			}
			$journal = new Journal();
			$journal->savePaymentVoucherJournal( $transaction, $voucher, $request, $selectedOption );
		}

		$pdf = PDF::loadView( 'voucher.print-payment-voucher', [
			'request' => $request,
			'voucher' => $voucher
		] );

		return $pdf->stream( 'payment-voucher-' . $voucher->id . '.pdf' );
		//return redirect('/payment-voucher');
	}

	public function creditVoucher() {
		return view( 'voucher.credit-voucher', [
			'assetAccounts'  => $this->getAssetCashBAnkAccount(),
			'incomeAccounts' => IncomeAccount::all()
		] );
	}

	public function newCreditVoucher( Request $request ) {
		$voucher = new Voucher();
		$voucher->saveCreditVoucher( $request );

		foreach ( $request->transaction as $selectedOption ) {
			/*$selectedOption['account_code'] is asset account code*/
			if ( substr( $selectedOption['account_code'], 0, 1 ) == 2 ) {
				$transaction = new Transaction();
				$transaction->saveCreditVoucherTransaction( $voucher, $request, $selectedOption );

			}
			$journal = new Journal();
			$journal->saveCreditVoucherJournal( $transaction, $voucher, $request, $selectedOption );

		}
		$pdf = PDF::loadView( 'voucher.print-credit-voucher', [
			'request' => $request,
			'voucher' => $voucher
		] );

		return $pdf->stream( 'credit-voucher-' . $voucher->id . '.pdf' );

		//return redirect('/credit-voucher');
	}

	public function journalVoucher() {
		return view( 'voucher.journal-voucher', [
			'assetAccounts'        => AssetAccount::all(),
			'liabilitiesAccounts'  => LiabilitieAccount::all(),
			'incomeAccounts'       => IncomeAccount::all(),
			'expenseAccounts'      => ExpenseAccount::all(),
			'ownersEquityAccounts' => OwnersEquityAccount::all()
		] );
	}

	public function newJournalVoucher( Request $request ) {
		$voucher = new Voucher();
		$voucher->saveJournalVoucher( $request );

		foreach ( $request->transaction as $selectedOption ) {
			if ( $selectedOption['account_code'] == '230301' || $selectedOption['account_code'] == '230302' || $selectedOption['account_code'] == '230303' || $selectedOption['account_code'] == '230401' ) {
				$transaction = new Transaction();
				$transaction->saveJournalVoucherTransaction( $voucher, $request, $selectedOption );
			}

			$journal = new Journal();
			$journal->saveJournalVoucherJournal( $transaction, $voucher, $request, $selectedOption );
		}

		$pdf = PDF::loadView( 'voucher.print-journal-voucher', [ 'request' => $request ] );

		return $pdf->stream( 'journal-voucher-' . $voucher->id . '.pdf' );

		//return redirect('/print/journal-voucher');
	}

	public function selectVoucherInfo( $id ) {
		$vouchers = Journal::where( 'voucher_id', $id )->get();

		return json_encode( $vouchers );
	}

	public function printVoucherInfo( $id ) {
		$voucher  = Voucher::find( $id );
		$vouchers = Journal::where( 'voucher_id', $id )->get();

		$pdf = PDF::loadView( 'voucher.print-voucher', [
			'vouchers' => $vouchers,
			'voucher'  => $voucher
		] );

		return $pdf->stream( 'voucher-' . $id . '.pdf' );
	}

	public function editVoucherInfo( $id ) {
		$voucher = Voucher::find( $id );

		if ( $voucher->voucher_type == 'Payment Voucher' ) {

			return view( 'voucher.edit-payment-voucher', [
				'assetAccounts'   => $this->getAssetCashBAnkAccount(),
				'expenseAccounts' => ExpenseAccount::all(),
				'vouchers'        => Journal::where( 'voucher_id', $id )->get()
			] );
		} else if ( $voucher->voucher_type == 'Credit Voucher' ) {
			return view( 'voucher.edit-credit-voucher' );
		} else if ( $voucher->voucher_type == 'Journal Voucher' ) {
			return view( 'voucher.edit-journal-voucher' );
		}

	}
}





