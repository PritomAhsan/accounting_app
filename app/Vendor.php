<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model {
	public function saveVendorInfo( $request ) {
		$this->vendor_name    = $request->vendor_name;
		$this->email_address  = $request->email_address;
		$this->phone_number   = $request->phone_number;
		$this->address        = $request->address;
		$this->account_number = $request->account_number;
		$this->save();
	}

	public function setVendorLiabilitieId( $vendorLiabilitiesAccount ) {
		$this->vendor_liabilitie_id = $vendorLiabilitiesAccount->id;
		$this->save();
	}

	public function saveVendor( $request ) {
		$this->saveVendorInfo( $request );
		$liabilitiesAccount       = LiabilitieAccount::where( 'liabilitie_id', 5 )->where( 'sub_liabilitie_id', 14 )->orderBy( 'id', 'desc' )->first();
		$vendorLiabilitiesAccount = new LiabilitieAccount();
		$vendorLiabilitiesAccount->saveVendorLiabilitieAccount( $this, $liabilitiesAccount );
		$this->setVendorLiabilitieId( $vendorLiabilitiesAccount );
	}

	public function updateVendor( $request ) {
		$this->saveVendorInfo( $request );
		$vendorLiabilitiesAccount = LiabilitieAccount::find( $this->vendor_liabilitie_id );
		$vendorLiabilitiesAccount->updateVendorLiabilitieAccount( $this );
	}
}
