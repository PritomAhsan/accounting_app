<?php

namespace App\Http\Controllers;

use App\Bill;
use App\LiabilitieAccount;
use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller {
	public function index() {
		$vendors = Vendor::all();

		return view( 'vendor.vendor-info', [ 'vendors' => $vendors ] );
	}

	public function createVendorInfo( Request $request ) {
		$vendor = new Vendor();
		$vendor->saveVendor( $request );

		return redirect( '/vendor-info' );
	}

	public function editVendorInfo( $id ) {
		$vendor = Vendor::find( $id );

		return json_encode( $vendor );
	}

	public function updateVendorInfo( Request $request ) {
		$vendor = Vendor::find( $request->vendor_id );
		$vendor->updateVendor( $request );

		return redirect( '/vendor-info' );
	}

	public function deleteVendorInfo( Request $request ) {
		$bill = Bill::where( 'vendor_id', $request->vendorId )->orderBy( 'id', 'desc' )->first();
		if ( $bill ) {
			$message = 'Sorry you can not delete this vendor. Some bill was created against this vendor.!!!';

			return json_encode( $message );
		} else {
			$vendor                   = Vendor::find( $request->vendorId );
			$vendorLiabilitiesAccount = LiabilitieAccount::find( $vendor->vendor_liabilitie_id );
			$vendorLiabilitiesAccount->delete();
			$vendor->delete();

			$message = 'Vendor info delete successfully !!!';

			return json_encode( $message );
		}
	}
}
