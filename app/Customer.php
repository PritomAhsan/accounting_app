<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

	public function saveCustomerInfo( $request ) {
		$this->company_name  = $request->company_name;
		$this->first_name    = $request->first_name;
		$this->last_name     = $request->last_name;
		$this->email_address = $request->email_address;
		$this->phone_number  = $request->phone_number;
		$this->address       = $request->address;
		$this->save();
	}

	public function setAssetAccountId( $customerAssetAccount ) {
		$this->asset_account_id = $customerAssetAccount->id;
		$this->save();
	}

	public function saveCustomer( $request ) {
		$this->saveCustomerInfo( $request );
		$assetAccount         = AssetAccount::where( 'asset_id', 3 )->where( 'sub_asset_id', 9 )->orderBy( 'id', 'desc' )->first();
		$customerAssetAccount = new AssetAccount();
		$customerAssetAccount->saveCustomerAssetAccount( $this, $assetAccount );
		$this->setAssetAccountId( $customerAssetAccount );
	}

	public function updateCustomer( $request ) {
		$this->saveCustomerInfo( $request );
		$customerAssetAccount = AssetAccount::find( $this->asset_account_id );
		$customerAssetAccount->updateCustomerAssetAccount( $this );
	}
}
