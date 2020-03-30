<?php
/**
 * Created by PhpStorm.
 * User: Jahan
 * Date: 8/2/2018
 * Time: 1:38 PM
 */

namespace App\Helpers;


trait UpdateAccount {
	public function updateName( $accountName ) {
		$this->account_name	= $accountName;
		$this->save();
	}

	/*public function updateCode( $accountCode ) {
		$this->account_code	= $accountCode;
		$this->save();
	}*/

	public function updateDescription( $accountDescription ) {
		$this->account_description	= $accountDescription;
		$this->save();
	}
}