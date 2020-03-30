<?php

namespace App;

use App\Helpers\UpdateAccount;
use Illuminate\Database\Eloquent\Model;

class AssetAccount extends Model {
	use UpdateAccount;

	/* Chart of Account */

	public function saveChartOfAccountAssetAccount( $request ) {
		$this->asset_id            = $request->asset_id;
		$this->sub_asset_id        = $request->sub_asset_id;
		$this->account_name        = $request->account_name;
		$this->account_code        = $request->account_code;
		$this->account_description = $request->account_description;
		$this->save();
	}

	/* Customer */

	public function saveCustomerAssetAccount( $customer, $assetAccount ) {
		$this->asset_id            = 3;
		$this->sub_asset_id        = 9;
		$this->account_name        = $customer->first_name . ' ' . $customer->last_name;
		$this->account_code        = $assetAccount->account_code + 1;
		$this->account_description = $customer->first_name . ' ' . $customer->last_name . ' Account Description';
		$this->save();
	}

	public function updateCustomerAssetAccount( $customer ) {
		$this->account_name        = $customer->first_name . ' ' . $customer->last_name;
		$this->account_description = $customer->first_name . ' ' . $customer->last_name . ' Account Description';
		$this->save();
	}
}
