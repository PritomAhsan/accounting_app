<?php

namespace App;

use App\Helpers\UpdateAccount;
use Illuminate\Database\Eloquent\Model;

class LiabilitieAccount extends Model {
	use UpdateAccount;
	/* Chart of Account */
	public function saveChartOfAccountLiabilitieAccount( $request ) {
		$this->liabilitie_id       = $request->liabilitie_id;
		$this->sub_liabilitie_id   = $request->sub_liabilitie_id;
		$this->account_name        = $request->account_name;
		$this->account_code        = $request->account_code;
		$this->account_description = $request->account_description;
		$this->save();
	}

	/* Vendor */

	public function saveVendorLiabilitieAccount( $vendor, $liabilitiesAccount ) {
		$this->liabilitie_id       = 5;
		$this->sub_liabilitie_id   = 14;
		$this->account_name        = $vendor->vendor_name;
		$this->account_code        = $liabilitiesAccount->account_code + 1;
		$this->account_description = $vendor->vendor_name . ' Account Description';
		$this->save();
	}

	public function updateVendorLiabilitieAccount( $vendor ) {
		$this->account_name        = $vendor->vendor_name;
		$this->account_description = $vendor->vendor_name . ' Account Description';
		$this->save();
	}

}
