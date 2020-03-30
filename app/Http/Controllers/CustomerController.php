<?php

namespace App\Http\Controllers;

use App\AssetAccount;
use App\Customer;
use App\Invoice;
use Illuminate\Http\Request;

class CustomerController extends Controller {
	public function index() {
		$customers = Customer::all();

		return view( 'customer.customer-info', [
			'customers' => $customers
		] );
	}

	public function createCustomerInfo( Request $request ) {
		$customer = new Customer();
		$customer->saveCustomer( $request );

		return redirect( '/customer-info' );
	}

	public function editCustomerInfo( $id ) {
		$customer = Customer::find( $id );

		return json_encode( $customer );
	}


	public function updateCustomerInfo( Request $request ) {
		$customer = Customer::find( $request->customer_id );
		$customer->updateCustomer( $request );

		return redirect( '/customer-info' );
	}

	public function deleteCustomerInfo( Request $request ) {
		$invoice = Invoice::where( 'customer_id', $request->customerId )->orderBy( 'id', 'desc' )->first();
		if ( $invoice ) {
			$message = 'Sorry you can not delete this customer. Some invoice was created against this customer.!!!';

			return json_encode( $message );
		} else {
			$customer             = Customer::find( $request->customerId );
			$customerAssetAccount = AssetAccount::find( $customer->asset_account_id );
			$customerAssetAccount->delete();
			$customer->delete();

			$message = 'Customer info delete successfully !!!';

			return json_encode( $message );
		}
	}
}
